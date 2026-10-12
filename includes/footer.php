<?php
require_once __DIR__ . '/img.php';
require_once __DIR__ . '/icons.php';
?>
<footer class="footer">
  <div class="footer-inner">
    <div class="footer-logo">
      <?php echo img('logo-light', 'Khayal', '114px'); ?>
    </div>
    <div class="footer-col">
      <h4>Quick Links</h4>
      <a href="index.php">Home</a>
      <a href="menu.php">Menu</a>
      <a href="drinks.php">Drinks</a>
      <a href="reviews.php">Reviews</a>
      <a href="contact.php">Contact</a>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <a href="tel:+254706540367"><?php echo icon('phone'); ?> +254 706 540367</a>
      <a href="mailto:info@khayal-lounge.co.ke"><?php echo icon('mail'); ?> info@khayal-lounge.co.ke</a>
      <a href="https://maps.app.goo.gl/MVTEsyfsCYEMwdAc8?g_st=aw" target="_blank" rel="noopener"><?php echo icon('map-pin'); ?> Visit on Maps</a>
    </div>
    <div class="footer-col">
      <h4>Follow Us</h4>
      <div class="footer-social">
        <a href="#" title="Facebook" aria-label="Facebook"><?php echo icon('facebook'); ?></a>
        <a href="#" title="Instagram" aria-label="Instagram"><?php echo icon('instagram'); ?></a>
        <a href="#" title="TikTok" aria-label="TikTok"><?php echo icon('tiktok'); ?></a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© <?php echo date('Y'); ?> Khayal. All rights reserved.</p>
  </div>
</footer>
