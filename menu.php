<?php $activePage = 'menu'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Our Menu - Khayal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <?php include 'includes/nav.php'; ?>

  <!-- PAGE HERO — brown bg, left aligned -->
  <div class="page-hero">
    <h1>Our Menu</h1>
    <p>Discover our authentic halal cuisine</p>
  </div>

  <!-- MENU CONTENT -->
  <section class="section" style="padding-top:3rem">
    <div class="section-inner">

      <!-- Search bar -->
      <div class="menu-search">
        <input type="text" id="searchInput" placeholder="Search menu items..." oninput="searchMenu()" />
      </div>

      <!-- Filter tabs -->
      <div class="filter-tabs" style="max-width:900px;margin:0 auto 2.5rem;justify-content:flex-start">
        <button class="filter-tab active" onclick="filter('all', this)">All Items</button>
        <button class="filter-tab" onclick="filter('mandi', this)">Mandi &amp; Hanidh</button>
        <button class="filter-tab" onclick="filter('burger', this)">Burgers</button>
        <button class="filter-tab" onclick="filter('sandwich', this)">Sandwiches</button>
        <button class="filter-tab" onclick="filter('side', this)">Sides</button>
        <button class="filter-tab" onclick="filter('soup', this)">Soups</button>
      </div>

      <!-- Menu grid -->
      <div class="menu-grid" id="menuGrid">
        <div class="menu-item" data-cat="mandi" data-name="chicken mandi">
          <img src="images/fragrant-rice-with-chicken-mandi.jpg" alt="Chicken Mandi" />
          <div class="menu-item-body">
            <h3>Chicken Mandi</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Tender chicken slow-cooked with aromatic basmati rice, carrots, and traditional spices</p>
          </div>
        </div>
        <div class="menu-item" data-cat="mandi" data-name="full goat mandi">
          <img src="images/full-goat-mandi-with-rice.jpg" alt="Full Goat Mandi" />
          <div class="menu-item-body">
            <h3>Full Goat Mandi</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Premium goat meat slow-cooked with fragrant rice and special spice blend</p>
          </div>
        </div>
        <div class="menu-item" data-cat="mandi" data-name="beef hanidh">
          <img src="images/beef-laham-hanidh-meat-dish.jpg" alt="Beef Hanidh" />
          <div class="menu-item-body">
            <h3>Goat Hanidh</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Laham Hanidh - goat meat cooked in traditional underground oven style</p>
          </div>
        </div>
        <div class="menu-item" data-cat="burger" data-name="khayal deluxe burger">
          <img src="images/food-dsc0506.jpg" alt="Khayal Deluxe Burger" />
          <div class="menu-item-body">
            <h3>Fish Fingers</h3>
            <p>Crispy, golden and tender fish fingers served with Tarta sauce and choice of your accompaniment</p>
          </div>
        </div>
        <div class="menu-item" data-cat="burger" data-name="spicy chicken burger">
          <img src="images/club-sandwich.png" alt="Spicy Chicken Burger" />
          <div class="menu-item-body">
            <h3>Club Sandwich</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Classic layers of toasted bread, sliced grilled chicken breast, sliced beef, ripe tomatoes, onions all bound together with mustard mayonnaise</p>
          </div>
        </div>
        <div class="menu-item" data-cat="sandwich" data-name="mixed grill sandwich">
          <img src="images/mixed-grill-sandwich.png" alt="Mixed Grill Sandwich" />
          <div class="menu-item-body">
            <h3>BBQ Sandwich</h3>
            <p>Crispy macom, juicy tomato sliced, fresh lettuce and creamy mayonnaise on a toasted bread with cheddar cheese.</p>
          </div>
        </div>
        <div class="menu-item" data-cat="sandwich" data-name="spiced lamb sandwich">
          <img src="images/food-dsc0484.jpg" alt="Spiced Lamb Sandwich" />
          <div class="menu-item-body">
            <h3>Jerky Chicken</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Smoky, spicy chicken on bone served with salsa and your choice of accompaniment</p>
          </div>
        </div>
        <div class="menu-item" data-cat="side" data-name="hummus greens salad">
          <img src="images/hummus-salad.jpg" alt="Hummus &amp; Greens Salad" />
          <div class="menu-item-body">
            <h3>Cobb Salad</h3>
            <p>Fresh lettuce, boiled egg, macon, tomatoes, avocado, sweetcorn and feta cheese dressed with honey lime dressing</p>
          </div>
        </div>
        <div class="menu-item" data-cat="side" data-name="fragrant rice pilaf">
          <img src="images/food-dsc0427.jpg" alt="Fragrant Rice Pilaf" />
          <div class="menu-item-body">
            <h3>Mushroom Beef Steak</h3>
            <p>Grilled juicy steak cooked to perfection served with mushroom sauce and choice of accompaniment</p>
          </div>
        </div>
        <div class="menu-item" data-cat="soup" data-name="traditional lentil soup">
          <img src="images/platter-2.jpeg" alt="Traditional Lentil Soup" />
          <div class="menu-item-body">
            <h3>Platter</h3>
            <p>Platter for 2 people</p>
          </div>
        </div>
        <div class="menu-item" data-cat="soup" data-name="spiced tomato soup">
          <img src="images/food-dsc0468.jpg" alt="Spiced Tomato Soup" />
          <div class="menu-item-body">
            <h3>Plantains</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Deep fried plantains served with a side of salad</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CUSTOMER REVIEWS — brown bg -->
  <section class="reviews-section">
    <div class="section-inner">
      <h2 class="section-title" style="text-align:left;color:#fff;margin-bottom:1.5rem">Customer Reviews</h2>
      <div class="reviews-grid">
        <div class="review-card">
          <div class="stars">★★★★★</div>
          <p>"Amazing food! Will definitely come back."</p>
          <strong>John Doe</strong>
        </div>
        <div class="review-card">
          <div class="stars">★★★★★</div>
          <p>"Best halal restaurant in town!"</p>
          <strong>Sarah Ahmed</strong>
        </div>
      </div>

      <!-- Leave a review form — white card -->
      <div class="review-form-wrap">
        <h3>Leave a Review</h3>
        <?php
        $reviewSuccess = false;
        $reviewError   = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_submit'])) {
            $rName   = htmlspecialchars(trim($_POST['review_name'] ?? ''));
            $rEmail  = htmlspecialchars(trim($_POST['review_email'] ?? ''));
            $rRating = htmlspecialchars(trim($_POST['review_rating'] ?? ''));
            $rText   = htmlspecialchars(trim($_POST['review_text'] ?? ''));
            if ($rName && $rEmail && $rText) {
                $to      = 'info@khayal-lounge.co.ke';
                $subject = "New Review from $rName";
                $body    = "Name: $rName\nEmail: $rEmail\nRating: $rRating\n\nReview:\n$rText";
                $headers = "From: noreply@khayal-lounge.co.ke\r\nReply-To: $rEmail";
                mail($to, $subject, $body, $headers);
                $reviewSuccess = true;
            } else {
                $reviewError = 'Please fill in all required fields.';
            }
        }
        ?>
        <?php if ($reviewSuccess): ?>
          <p style="color:#4caf50;font-weight:600;margin-bottom:1rem">Thank you for your review!</p>
        <?php elseif ($reviewError): ?>
          <p style="color:#e53935;margin-bottom:1rem"><?php echo $reviewError; ?></p>
        <?php endif; ?>
        <form method="POST" action="menu.php#reviews">
          <div class="form-row">
            <div class="form-group">
              <label>Name *</label>
              <input type="text" name="review_name" placeholder="Your name" required />
            </div>
            <div class="form-group">
              <label>Email *</label>
              <input type="email" name="review_email" placeholder="Your email" required />
            </div>
          </div>
          <div class="form-group">
            <label>Rating</label>
            <select name="review_rating">
              <option>5 Stars - Excellent</option>
              <option>4 Stars - Very Good</option>
              <option>3 Stars - Good</option>
              <option>2 Stars - Fair</option>
              <option>1 Star - Poor</option>
            </select>
          </div>
          <div class="form-group">
            <label>Review *</label>
            <textarea name="review_text" placeholder="Share your experience..."></textarea>
          </div>
          <button type="submit" name="review_submit" class="submit-btn-full">Submit Review</button>
        </form>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <script>
    function toggleMenu() { document.getElementById('mobileMenu').classList.toggle('open'); }

    function filter(cat, btn) {
      document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
      btn.classList.add('active');
      document.querySelectorAll('.menu-item').forEach(item => {
        item.style.display = (cat === 'all' || item.dataset.cat === cat) ? '' : 'none';
      });
    }

    function searchMenu() {
      const q = document.getElementById('searchInput').value.toLowerCase();
      document.querySelectorAll('.menu-item').forEach(item => {
        item.style.display = item.dataset.name.includes(q) ? '' : 'none';
      });
    }
  </script>
</body>
</html>
