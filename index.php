<?php $activePage = 'home'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Khayal - Home of Halal Food</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Jost:wght@300;400;500;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php include 'includes/nav.php'; ?>

  <!-- HERO: two-column — text left, interior photo right -->
  <section class="hero">
    <div class="hero-image-wrap">
      <img src="images/hero-image.jpeg" alt="Khayal Restaurant" />
      <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
      <span class="badge">100% Halal Certified</span>
      <h1>Welcome to Khayal</h1>
      <p>Experience authentic Kenyan-Arabic fusion cuisine. Every dish is crafted with traditional methods and the
        finest halal ingredients.</p>
      <a href="menu.php" class="btn-primary">Explore Menu &rarr;</a>
    </div>
    <div class="hero-interior">
      <img src="images/dsc-1751.jpg" alt="Our Restaurant Interior" />
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
          <img src="images/fragrant-rice-with-chicken-mandi.jpg" alt="Chicken Mandi" />
          <div class="dish-card-body">
            <h3>Chicken Mandi</h3>
            <p>Tender chicken slow-cooked with aromatic rice and traditional spices</p>
          </div>
        </div>
        <div class="dish-card">
          <img src="images/beef-laham-hanidh-meat-dish.jpg" alt="Laham Hanidh" />
          <div class="dish-card-body">
            <h3>Laham Hanidh</h3>
            <p>Premium beef cooked in underground oven with herbs and spices</p>
          </div>
        </div>
        <div class="dish-card">
          <img src="images/full-goat-mandi-with-rice.jpg" alt="Full Goat Mandi" />
          <div class="dish-card-body">
            <h3>Full Goat Mandi</h3>
            <p>Succulent goat meat with perfectly seasoned rice pilaf</p>
          </div>
        </div>
        <div class="dish-card">
          <img src="images/food-dsc0437.jpg" alt="Rustica Fish" />
          <div class="dish-card-body">
            <h3>Rustica Fish</h3>
            <p>Fresh fish grilled to perfection with Mediterranean spices</p>
          </div>
        </div>
      </div>
      <div class="center">
        <a href="menu.php" class="btn-link">View Full Menu &rarr;</a>
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
            <div class="pillar-icon-wrap">⭐</div>
            <div class="pillar-text">
              <strong>Premium Quality</strong>
              <span>Only the finest halal ingredients</span>
            </div>
          </div>
          <div class="pillar">
            <div class="pillar-icon-wrap">📍</div>
            <div class="pillar-text">
              <strong>Local Heritage</strong>
              <span>Kenyan-Arabic fusion traditions</span>
            </div>
          </div>
          <div class="pillar">
            <div class="pillar-icon-wrap">🕐</div>
            <div class="pillar-text">
              <strong>Fresh Daily</strong>
              <span>Prepared to order with care</span>
            </div>
          </div>
        </div>
      </div>
      <div class="story-image">
        <img src="images/dsc-1751.jpg" alt="Our Restaurant" />
      </div>
    </div>
  </section>

  <!-- GOOGLE REVIEWS SLIDER -->
  <section class="testimonials-section">
    <div class="section-inner">
      <h2 class="section-title">What Our Guests Say</h2>
      <p class="section-sub" style="margin-top:-0.5rem;margin-bottom:2rem;">
        <img src="https://www.google.com/favicon.ico" alt="Google"
          style="width:16px;height:16px;vertical-align:middle;margin-right:6px;">
        Real reviews from Google
      </p>
      <div class="reviews-slider-wrap">
        <div class="reviews-slider-track">
            <?php
            $reviews = [
              [
                'name' => 'Wambui Githanga',
                'ago' => '3 weeks ago',
                'stars' => 5,
                'text' => 'The food, the ambience and customer service was phenomenal. I highly recommend 💯🙌🔥',
                'scores' => 'Food: 5/5 &nbsp;|&nbsp; Service: 5/5 &nbsp;|&nbsp; Atmosphere: 5/5',
              ],
              [
                'name' => 'Taka Wafula',
                'ago' => 'a month ago',
                'stars' => 5,
                'text' => 'Hands down one of the best meals I\'ve had in a while. I walked in not knowing what to expect and left already planning my next visit. The ambiance was cozy and lively perfect for catching up. We started with some milkshakes I haven\'t heard of before and it set the tone for the whole meal. Everything came out fresh, well-paced and tasted like care went into it. Service was super warm and attentive without hovering. Also, the dessert? Chef\'s kiss. If you\'ve been scrolling past this place, stop sleeping on it. Go in with an appetite.',
                'scores' => 'Food: 5/5 &nbsp;|&nbsp; Service: 5/5 &nbsp;|&nbsp; Atmosphere: 5/5',
              ],
              [
                'name' => 'Kizito Asudo',
                'ago' => '3 months ago',
                'stars' => 5,
                'text' => 'Serene environment with really good food.',
                'scores' => 'Food: 5/5 &nbsp;|&nbsp; Service: 5/5 &nbsp;|&nbsp; Atmosphere: 5/5',
              ],
              [
                'name' => 'John-Mark',
                'ago' => 'a month ago',
                'stars' => 5,
                'text' => 'Love this place and i will be back again.',
                'scores' => 'Food: 5/5 &nbsp;|&nbsp; Service: 5/5 &nbsp;|&nbsp; Atmosphere: 5/5',
              ],
            ];
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
                  <img src="https://www.google.com/favicon.ico" alt="Google" class="review-google-icon" />
                </div>
                <div class="review-stars">
                  <?php echo str_repeat('★', $r['stars']) . str_repeat('☆', 5 - $r['stars']); ?>
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

  <style>
    .reviews-slider-wrap {
      overflow: hidden;
      position: relative;
      width: 100%;
    }

    .reviews-slider-wrap::before,
    .reviews-slider-wrap::after {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      width: 80px;
      z-index: 2;
      pointer-events: none;
    }

    .reviews-slider-wrap::before {
      left: 0;
      background: linear-gradient(to right, var(--bg, #0e0b07), transparent);
    }

    .reviews-slider-wrap::after {
      right: 0;
      background: linear-gradient(to left, var(--bg, #0e0b07), transparent);
    }

    .reviews-slider-track {
      display: flex;
      gap: 1.5rem;
      width: max-content;
      animation: slide-reviews 32s linear infinite;
    }

    .reviews-slider-track:hover {
      animation-play-state: paused;
    }

    @keyframes slide-reviews {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    .review-slide {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      padding: 1.5rem;
      width: 320px;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
      gap: 0.6rem;
    }

    .review-slide-header {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .review-avatar {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: var(--gold, #c9a84c);
      color: #0e0b07;
      font-weight: 700;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-family: 'Jost', sans-serif;
    }

    .review-slide-header>div {
      flex: 1;
    }

    .review-slide-header strong {
      display: block;
      color: var(--cream, #f5f0e8);
      font-size: 0.95rem;
      font-family: 'Jost', sans-serif;
    }

    .review-ago {
      font-size: 0.78rem;
      color: var(--muted, #8a7a65);
    }

    .review-google-icon {
      width: 18px;
      height: 18px;
      flex-shrink: 0;
    }

    .review-stars {
      color: #f5c518;
      font-size: 1rem;
      letter-spacing: 2px;
    }

    .review-text {
      font-size: 0.88rem;
      color: var(--muted, #8a7a65);
      line-height: 1.6;
      display: -webkit-box;
      -webkit-line-clamp: 5;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .review-scores {
      font-size: 0.78rem;
      color: var(--gold, #c9a84c);
      background: rgba(201, 168, 76, 0.08);
      border-radius: 6px;
      padding: 0.4rem 0.6rem;
      margin-top: auto;
    }
  </style>

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