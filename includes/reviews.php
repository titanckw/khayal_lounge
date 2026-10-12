<?php
/**
 * Guest reviews: saved in data/reviews.json (newest first) and shown on reviews.php.
 * Visitor emails are NOT stored - they are only emailed to the restaurant.
 */
define('REVIEWS_FILE', __DIR__ . '/../data/reviews.json');
define('REVIEWS_NOTIFY_EMAIL', 'info@khayal-lounge.co.ke');

function reviews_all()
{
    if (!is_readable(REVIEWS_FILE)) {
        return [];
    }
    $data = json_decode((string) file_get_contents(REVIEWS_FILE), true);
    return is_array($data) ? $data : [];
}

function reviews_stats($reviews)
{
    $n = count($reviews);
    if ($n === 0) {
        return ['count' => 0, 'average' => 0];
    }
    $sum = 0;
    foreach ($reviews as $r) {
        $sum += (int) $r['rating'];
    }
    return ['count' => $n, 'average' => round($sum / $n, 1)];
}

/** Adds a review at the top of the list. The file is locked so two visitors can't overwrite each other. */
function reviews_add($name, $rating, $text)
{
    $dir = dirname(REVIEWS_FILE);
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    $fh = @fopen(REVIEWS_FILE, 'c+');
    if (!$fh) {
        return false;
    }
    flock($fh, LOCK_EX);
    $list = json_decode((string) stream_get_contents($fh), true);
    if (!is_array($list)) {
        $list = [];
    }
    array_unshift($list, [
        'id'     => bin2hex(random_bytes(6)),
        'name'   => $name,
        'rating' => $rating,
        'text'   => $text,
        'date'   => date('c'),
    ]);
    $list = array_slice($list, 0, 500); // keep the file small
    ftruncate($fh, 0);
    rewind($fh);
    fwrite($fh, json_encode($list, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    fflush($fh);
    flock($fh, LOCK_UN);
    fclose($fh);
    return true;
}

function reviews_len($s)
{
    return function_exists('mb_strlen') ? mb_strlen($s) : strlen($s);
}

function reviews_cut($s, $max)
{
    return function_exists('mb_substr') ? mb_substr($s, 0, $max) : substr($s, 0, $max);
}

/**
 * Handles the review form. Returns ['ok' => bool, 'error' => string].
 * Needs session_start() to have been called (used for the spam checks).
 */
function reviews_handle_submission($post)
{
    // Spam checks: hidden honeypot field, valid form token, not submitted instantly, not flooding
    if (!empty($post['website'])) {
        return ['ok' => true, 'error' => '']; // a bot: pretend it worked, save nothing
    }
    if (empty($post['token']) || empty($_SESSION['review_token']) || !hash_equals($_SESSION['review_token'], $post['token'])) {
        return ['ok' => false, 'error' => 'Your session expired. Please try submitting again.'];
    }
    $shownAt = $_SESSION['review_form_time'] ?? time();
    if (time() - $shownAt < 3) {
        return ['ok' => false, 'error' => 'That was quick! Please take a moment and try again.'];
    }
    if (!empty($_SESSION['review_last']) && time() - $_SESSION['review_last'] < 60) {
        return ['ok' => false, 'error' => 'Thanks - you just sent a review. Please wait a minute before sending another.'];
    }

    $name   = trim(preg_replace('/\s+/', ' ', (string) ($post['review_name'] ?? '')));
    $email  = trim((string) ($post['review_email'] ?? ''));
    $rating = (int) ($post['review_rating'] ?? 5);
    $text   = trim((string) ($post['review_text'] ?? ''));
    $text   = preg_replace("/\r\n?/", "\n", $text);
    $text   = preg_replace("/\n{3,}/", "\n\n", $text);

    if ($name === '' || $email === '' || $text === '') {
        return ['ok' => false, 'error' => 'Please fill in your name, email and review.'];
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['ok' => false, 'error' => 'Please enter a valid email address.'];
    }
    if ($rating < 1 || $rating > 5) {
        $rating = 5;
    }
    if (reviews_len($text) < 5) {
        return ['ok' => false, 'error' => 'Please write a little more about your visit.'];
    }
    $name = reviews_cut($name, 60);
    $text = reviews_cut($text, 1000);

    if (!reviews_add($name, $rating, $text)) {
        return ['ok' => false, 'error' => 'Sorry, we could not save your review right now. Please try again later.'];
    }

    // Let the restaurant know (the email address is only sent here, never shown on the site)
    $subject = 'New website review from ' . str_replace(["\r", "\n"], ' ', $name);
    $body    = "Name: $name\nEmail: $email\nRating: $rating/5\n\nReview:\n$text";
    $headers = "From: noreply@khayal-lounge.co.ke\r\nReply-To: $email";
    @mail(REVIEWS_NOTIFY_EMAIL, $subject, $body, $headers);

    $_SESSION['review_last'] = time();
    unset($_SESSION['review_token']);
    return ['ok' => true, 'error' => ''];
}
