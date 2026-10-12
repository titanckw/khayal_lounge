<?php
$activePage = 'home';
require_once 'includes/img.php';
require_once 'includes/icons.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Khayal - Home of Halal Food</title>
  <?php echo preload_img('hero'); ?>

<?php include 'includes/head.php'; ?>
</head>

<body>

  <?php include 'includes/nav.php'; ?>

  <!-- HERO: two-column — text left, interior photo right -->
  <section class="hero">
    <div class="hero-image-wrap">
      <?php echo img('hero', 'Khayal Restaurant', '100vw', ['priority' => true]); ?>
      <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
      <span class="badge">100% Halal Certified</span>
      <h1>Welcome to Khayal</h1>
      <p>Experience authentic Kenyan-Arabic fusion cuisine. Every dish is crafted with traditional methods and the
        finest halal ingredients.</p>
      <a href="menu.php" class="btn-primary">Explore Menu <?php echo icon('arrow-right'); ?></a>
    </div>
    <div class="hero-interior">
      <?php echo img('interior', 'Our Restaurant Interior', '45vw'); ?>
    </div>
  </section>

  <!-- SIGNATURE DISHES -->
  <section class="section">
    <div class="section-inner">
      <h2 class="section-title">Signature Dishes</h2>
      <p class="section-sub">Discover our most beloved dishes, prepared with traditional recipes passed down through
        generations.</p>
      <div class="dishes-grid">
        <div class="dish-card">
          <?php echo img('chicken-mandi', 'Chicken Mandi', '(max-width:600px) 100vw, (max-width:1024px) 50vw, 285px'); ?>
          <div class="dish-card-body">
            <h3>Chicken Mandi</h3>
            <p>Tender chicken slow-cooked with aromatic rice and traditional spices</p>
          </div>
        </div>
        <div class="dish-card">
          <?php echo img('laham-hanidh', 'Laham Hanidh', '(max-width:600px) 100vw, (max-width:1024px) 50vw, 285px'); ?>
          <div class="dish-card-body">
            <h3>Laham Hanidh</h3>
            <p>Premium beef cooked in underground oven with herbs and spices</p>
          </div>
        </div>
        <div class="dish-card">
          <?php echo img('goat-mandi', 'Full Goat Mandi', '(max-width:600px) 100vw, (max-width:1024px) 50vw, 285px'); ?>
          <div class="dish-card-body">
            <h3>Full Goat Mandi</h3>
            <p>Succulent goat meat with perfectly seasoned rice pilaf</p>
          </div>
        </div>
        <div class="dish-card">
          <?php echo img('fish', 'Rustica Fish', '(max-width:600px) 100vw, (max-width:1024px) 50vw, 285px'); ?>
          <div class="dish-card-body">
            <h3>Rustica Fish</h3>
            <p>Fresh fish grilled to perfection with Mediterranean spices</p>
          </div>
        </div>
      </div>
      <div class="center">
        <a href="menu.php" class="btn-link">View Full Menu <?php echo icon('arrow-right'); ?></a>
      </div>
    </div>
  </section>

  <!-- OUR STORY — brown bg -->
  <section class="story-section">
    <div class="story-inner">
      <div class="story-text">
        <h2 class="section-title left">Our Story</h2>
        <p>At Khayal, we believe that authentic halal food is more than just a meal—it's a celebration of culture,
          tradition, and quality. Every ingredient is carefully sourced, and every dish is prepared with the utmost
          respect for our guests.</p>
        <p>Our commitment to 100% halal certification ensures that every customer can dine with confidence, knowing that
          their meal meets the highest standards.</p>
        <div class="story-pillars">
          <div class="pillar">
            <div class="pillar-icon-wrap"><?php echo icon('award'); ?></div>
            <div class="pillar-text">
              <strong>Premium Quality</strong>
              <span>Only the finest halal ingredients</span>
            </div>
          </div>
          <div class="pillar">
            <div class="pillar-icon-wrap"><?php echo icon('map-pin'); ?></div>
            <div class="pillar-text">
              <strong>Local Heritage</strong>
              <span>Kenyan-Arabic fusion traditions</span>
            </div>
          </div>
          <div class="pillar">
            <div class="pillar-icon-wrap"><?php echo icon('clock'); ?></div>
            <div class="pillar-text">
              <strong>Fresh Daily</strong>
              <span>Prepared to order with care</span>
            </div>
          </div>
        </div>
      </div>
      <div class="story-image">
        <?php echo img('interior', 'Our Restaurant', '(max-width:900px) 100vw, 550px'); ?>
      </div>
    </div>
  </section>

  <!-- GOOGLE REVIEWS SLIDER -->
  <section class="testimonials-section">
    <div class="section-inner">
      <h2 class="section-title">What Our Guests Say</h2>
      <p class="section-sub" style="margin-top:-0.5rem;margin-bottom:2rem;">
        <img src="https://www.google.com/favicon.ico" alt="Google" width="16" height="16" loading="lazy"
          style="width:16px;height:16px;vertical-align:middle;margin-right:6px;">
        Real reviews from Google
      </p>
      <div class="reviews-slider-wrap">
        <div class="reviews-slider-track">
            <?php
            $reviews = require 'includes/google-reviews.php';
            // Duplicate for seamless infinite scroll
            $all = array_merge($reviews, $reviews);
            foreach ($all as $r):
              $initials = implode('', array_map(fn($w) => strtoupper($w[0]), array_slice(explode(' ', $r['name']), 0, 2)));
              ?>
              <div class="review-slide">
                <div class="review-slide-header">
                  <div class="review-avatar">
                    <?php echo $initials; ?>
                  </div>
                  <div>
                    <strong>
                      <?php echo htmlspecialchars($r['name']); ?>
                    </strong>
                    <span class="review-ago">
                      <?php echo $r['ago']; ?>
                    </span>
                  </div>
                  <img src="https://www.google.com/favicon.ico" alt="Google" class="review-google-icon" width="18" height="18" loading="lazy" />
                </div>
                <div class="review-stars">
                  <?php echo star_rating($r['stars']); ?>
                </div>
                <p class="review-text">"
                  <?php echo htmlspecialchars($r['text']); ?>"
                </p>
                <p class="review-scores">
                  <?php echo $r['scores']; ?>
                </p>
              </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>


  <!-- CTA — orange bg -->
  <section class="cta-section">
    <div class="cta-inner">
      <h2>Ready to Taste Authenticity?</h2>
      <p>Reserve your table or order online for delivery and pickup.</p>
      <div class="cta-buttons">
        <a href="tel:+254706540367" class="btn-outline">Call to Order</a>
        <a href="contact.php" class="btn-dark">Reserve Table</a>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <script>
    function toggleMenu() {
      document.getElementById('mobileMenu').classList.toggle('open');
    }
  </script>
</body>

</html>