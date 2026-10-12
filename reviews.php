<?php
$activePage = 'reviews';
require_once 'includes/img.php';
require_once 'includes/icons.php';
require_once 'includes/reviews.php';

$reviews = reviews_all();
$googleReviews = require 'includes/google-reviews.php';
$stats   = reviews_stats($reviews);
$thanks  = isset($_GET['thanks']);

function review_initials($name)
{
    $parts = preg_split('/\s+/', trim($name));
    $out = '';
    foreach (array_slice($parts, 0, 2) as $p) {
        $out .= function_exists('mb_substr') ? mb_strtoupper(mb_substr($p, 0, 1)) : strtoupper(substr($p, 0, 1));
    }
    return $out !== '' ? $out : '?';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Guest Reviews - Khayal</title>
<?php include 'includes/head.php'; ?>
</head>

<body>

  <?php include 'includes/nav.php'; ?>

  <div class="page-hero">
    <h1>Guest Reviews</h1>
    <p>What our guests say about dining at Khayal</p>
  </div>

  <section class="section" id="reviews">
    <div class="section-inner">

      <?php if ($thanks): ?>
        <div class="form-alert form-alert-success" role="status">
          <?php echo icon('check'); ?> Thank you! Your review has been added below.
        </div>
      <?php endif; ?>

      <div class="reviews-summary">
        <?php if ($stats['count'] > 0): ?>
          <div class="reviews-score">
            <span class="reviews-score-number"><?php echo number_format($stats['average'], 1); ?></span>
            <div>
              <?php echo star_rating((int) round($stats['average'])); ?>
              <span class="reviews-score-count">Based on <?php echo $stats['count']; ?> review<?php echo $stats['count'] === 1 ? '' : 's'; ?></span>
            </div>
          </div>
        <?php else: ?>
          <p class="reviews-score-count">No reviews yet &mdash; be the first to share your experience.</p>
        <?php endif; ?>
        <a href="menu.php#review-form" class="btn-primary"><?php echo icon('message'); ?> Write a Review</a>
      </div>

      <?php if ($stats['count'] > 0): ?>
        <div class="reviews-source-head">
          <h2>From our website guests</h2>
        </div>
        <div class="guest-reviews-grid">
          <?php foreach ($reviews as $r): ?>
            <article class="guest-review">
              <header class="guest-review-head">
                <span class="review-avatar"><?php echo htmlspecialchars(review_initials($r['name'])); ?></span>
                <div>
                  <strong><?php echo htmlspecialchars($r['name']); ?></strong>
                  <span class="review-ago"><?php echo htmlspecialchars(date('j M Y', strtotime($r['date']))); ?></span>
                </div>
              </header>
              <?php echo star_rating((int) $r['rating']); ?>
              <p><?php echo nl2br(htmlspecialchars($r['text'])); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Real reviews from Google -->
      <div class="reviews-source-head" id="google-reviews">
        <img src="https://www.google.com/favicon.ico" alt="" width="20" height="20" loading="lazy" />
        <h2>Real reviews from Google</h2>
      </div>
      <div class="guest-reviews-grid">
        <?php foreach ($googleReviews as $g): ?>
          <article class="guest-review">
            <header class="guest-review-head">
              <span class="review-avatar"><?php echo htmlspecialchars(review_initials($g['name'])); ?></span>
              <div>
                <strong><?php echo htmlspecialchars($g['name']); ?></strong>
                <span class="review-ago"><?php echo htmlspecialchars($g['ago']); ?></span>
              </div>
            </header>
            <?php echo star_rating((int) $g['stars']); ?>
            <p><?php echo nl2br(htmlspecialchars($g['text'])); ?></p>
            <p class="review-scores"><?php echo $g['scores']; ?></p>
          </article>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <script>function toggleMenu() { document.getElementById('mobileMenu').classList.toggle('open'); }</script>
</body>

</html>
