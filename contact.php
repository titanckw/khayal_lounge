<?php
$activePage = 'contact';
require_once 'includes/icons.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars(trim($_POST['name'] ?? ''));
  $email = htmlspecialchars(trim($_POST['email'] ?? ''));
  $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
  $message = htmlspecialchars(trim($_POST['message'] ?? ''));

  if ($name && $email && $message) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 'Please enter a valid email address.';
    } else {
      $to = 'info@khayal-lounge.co.ke';
      $subject = "Website Contact: $name";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
      $headers = "From: noreply@khayal-lounge.co.ke\r\nReply-To: $email\r\nX-Mailer: PHP/" . phpversion();
      if (mail($to, $subject, $body, $headers)) {
        $success = true;
      } else {
        $error = 'Sorry, we could not send your message. Please try calling us directly.';
      }
    }
  } else {
    $error = 'Please fill in your name, email, and message.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact - Khayal</title>
<?php include 'includes/head.php'; ?>
</head>

<body>

  <?php include 'includes/nav.php'; ?>

  <div class="page-hero">
    <h1>Contact Us</h1>
    <p>Get in touch with Khayal</p>
  </div>

  <div class="contact-grid">
    <div class="contact-info">
      <h2>Get in Touch</h2>
      <div class="contact-block">
        <h4>Call Us</h4>
        <a href="tel:+254706540367"><?php echo icon('phone'); ?> +254 706 540367</a>
      </div>
      <div class="contact-block">
        <h4>Email Us</h4>
        <a href="mailto:info@khayal-lounge.co.ke"><?php echo icon('mail'); ?> info@khayal-lounge.co.ke</a>
      </div>
      <div class="contact-block">
        <h4>Visit Us</h4>
        <a href="https://maps.app.goo.gl/MVTEsyfsCYEMwdAc8?g_st=aw" target="_blank" rel="noopener"><?php echo icon('map-pin'); ?> View on Google Maps</a>
      </div>
      <div class="contact-block">
        <h4>Hours</h4>
        <p><?php echo icon('clock'); ?> Open Daily: 07:00 AM – 11:00 PM</p>
      </div>
    </div>

    <div class="contact-form">
      <h2>Send us a Message</h2>

      <?php if ($success): ?>
        <div class="form-alert form-alert-success" role="status">
          <?php echo icon('check'); ?> Thank you! Your message has been sent. We'll get back to you soon.
        </div>
      <?php elseif ($error): ?>
        <div class="form-alert form-alert-error" role="alert">
          <?php echo icon('alert'); ?> <?php echo $error; ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="contact.php">
        <div class="form-group">
          <label>Name *</label>
          <input type="text" name="name" placeholder="Your name"
            value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required />
        </div>
        <div class="form-group">
          <label>Email *</label>
          <input type="email" name="email" placeholder="your@email.com"
            value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required />
        </div>
        <div class="form-group">
          <label>Phone (Optional)</label>
          <input type="tel" name="phone" placeholder="+254..."
            value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" />
        </div>
        <div class="form-group">
          <label>Message *</label>
          <textarea name="message"
            placeholder="How can we help you?"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
        </div>
        <button type="submit" class="btn-primary" style="border:none;cursor:pointer">Send Message</button>
      </form>
    </div>
  </div>

  <div class="map-section">
    <h2>Find Our Location</h2>
    <div class="map-embed">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7295873149455!2d36.737103274965826!3d-1.3385408986487717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1b00343f3d3b%3A0xcb38335eab62cab8!2sKhayal%20Lounge%20Ke!5e0!3m2!1sen!2ske!4v1773299257272!5m2!1sen!2ske"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

  <script>function toggleMenu() { document.getElementById('mobileMenu').classList.toggle('open'); }</script>
</body>

</html>