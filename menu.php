<?php
$activePage = 'menu';
require_once 'includes/img.php';
require_once 'includes/icons.php';
require_once 'includes/reviews.php';
session_start(['cache_limiter' => '']);   // no cache headers added by the session, so the page stays cacheable

$reviewError = '';
$old = ['name' => '', 'email' => '', 'rating' => '5', 'text' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_submit'])) {
    $result = reviews_handle_submission($_POST);
    if ($result['ok']) {
        header('Location: reviews.php?thanks=1#reviews');   // straight to the reviews page, where it now appears
        exit;
    }
    $reviewError = $result['error'];
    $old = [
        'name'   => (string) ($_POST['review_name'] ?? ''),
        'email'  => (string) ($_POST['review_email'] ?? ''),
        'rating' => (string) ($_POST['review_rating'] ?? '5'),
        'text'   => (string) ($_POST['review_text'] ?? ''),
    ];
}

// Fresh token + timestamp for the spam checks
$_SESSION['review_token'] = bin2hex(random_bytes(16));
$_SESSION['review_form_time'] = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Our Menu - Khayal</title>
<?php include 'includes/head.php'; ?>
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
        <?php echo icon('search', 'search-icon'); ?>
        <input type="text" id="searchInput" placeholder="Search menu items..." oninput="searchMenu()" aria-label="Search menu items" />
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
          <?php echo img('chicken-mandi', 'Chicken Mandi', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Chicken Mandi</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Tender chicken slow-cooked with aromatic basmati rice, carrots, and traditional spices</p>
          </div>
        </div>
        <div class="menu-item" data-cat="mandi" data-name="full goat mandi">
          <?php echo img('goat-mandi', 'Full Goat Mandi', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Full Goat Mandi</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Premium goat meat slow-cooked with fragrant rice and special spice blend</p>
          </div>
        </div>
        <div class="menu-item" data-cat="mandi" data-name="goat hanidh">
          <?php echo img('laham-hanidh', 'Goat Hanidh', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Goat Hanidh</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Laham Hanidh - goat meat cooked in traditional underground oven style</p>
          </div>
        </div>
        <div class="menu-item" data-cat="burger" data-name="fish fingers">
          <?php echo img('fish-fingers', 'Fish Fingers', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Fish Fingers</h3>
            <p>Crispy, golden and tender fish fingers served with Tarta sauce and choice of your accompaniment</p>
          </div>
        </div>
        <div class="menu-item" data-cat="burger" data-name="club sandwich">
          <?php echo img('club-sandwich', 'Club Sandwich', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Club Sandwich</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Classic layers of toasted bread, sliced grilled chicken breast, sliced beef, ripe tomatoes, onions all bound together with mustard mayonnaise</p>
          </div>
        </div>
        <div class="menu-item" data-cat="sandwich" data-name="bbq sandwich">
          <?php echo img('bbq-sandwich', 'BBQ Sandwich', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>BBQ Sandwich</h3>
            <p>Crispy macom, juicy tomato sliced, fresh lettuce and creamy mayonnaise on a toasted bread with cheddar cheese.</p>
          </div>
        </div>
        <div class="menu-item" data-cat="sandwich" data-name="jerky chicken">
          <?php echo img('jerky-chicken', 'Jerky Chicken', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Jerky Chicken</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Smoky, spicy chicken on bone served with salsa and your choice of accompaniment</p>
          </div>
        </div>
        <div class="menu-item" data-cat="side" data-name="cobb salad">
          <?php echo img('cobb-salad', 'Cobb Salad', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Cobb Salad</h3>
            <p>Fresh lettuce, boiled egg, macon, tomatoes, avocado, sweetcorn and feta cheese dressed with honey lime dressing</p>
          </div>
        </div>
        <div class="menu-item" data-cat="side" data-name="mushroom beef steak">
          <?php echo img('beef-steak', 'Mushroom Beef Steak', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Mushroom Beef Steak</h3>
            <p>Grilled juicy steak cooked to perfection served with mushroom sauce and choice of accompaniment</p>
          </div>
        </div>
        <div class="menu-item" data-cat="soup" data-name="platter">
          <?php echo img('platter', 'Platter', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Platter</h3>
            <p>Platter for 2 people</p>
          </div>
        </div>
        <div class="menu-item" data-cat="soup" data-name="plantains">
          <?php echo img('plantains', 'Plantains', '(max-width:600px) 100vw, 390px'); ?>
          <div class="menu-item-body">
            <h3>Plantains</h3>
            <span class="spicy-tag">Spicy</span>
            <p>Deep fried plantains served with a side of salad</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- LEAVE A REVIEW — brand bg, white form card. Submitted reviews appear on reviews.php -->
  <section class="reviews-section" id="review-form">
    <div class="section-inner">
      <h2 class="section-title" style="text-align:left;color:#fff;margin-bottom:0.5rem">Leave a Review</h2>
      <p class="review-intro">Enjoyed your meal? Tell us about it &mdash; your review will appear on our
        <a href="reviews.php">guest reviews page</a> straight away.</p>

      <div class="review-form-wrap">
        <h3>Share Your Experience</h3>
        <?php if ($reviewError): ?>
          <div class="form-alert form-alert-error"><?php echo icon('alert'); ?> <?php echo htmlspecialchars($reviewError); ?></div>
        <?php endif; ?>
        <form method="POST" action="menu.php#review-form">
          <input type="hidden" name="token" value="<?php echo $_SESSION['review_token']; ?>" />
          <!-- hidden field: only spam bots fill this in -->
          <div class="hp-field" aria-hidden="true">
            <label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off" /></label>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="review_name">Name *</label>
              <input type="text" id="review_name" name="review_name" placeholder="Your name" maxlength="60" required
                value="<?php echo htmlspecialchars($old['name']); ?>" />
            </div>
            <div class="form-group">
              <label for="review_email">Email * <span class="field-note">(private &mdash; never shown)</span></label>
              <input type="email" id="review_email" name="review_email" placeholder="Your email" required
                value="<?php echo htmlspecialchars($old['email']); ?>" />
            </div>
          </div>
          <div class="form-group">
            <label for="review_rating">Rating</label>
            <select id="review_rating" name="review_rating">
              <?php foreach ([5 => 'Excellent', 4 => 'Very Good', 3 => 'Good', 2 => 'Fair', 1 => 'Poor'] as $n => $label): ?>
                <option value="<?php echo $n; ?>"<?php echo ((int) $old['rating'] === $n) ? ' selected' : ''; ?>><?php echo $n . ($n === 1 ? ' Star' : ' Stars') . ' - ' . $label; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="review_text">Review *</label>
            <textarea id="review_text" name="review_text" placeholder="Share your experience..." maxlength="1000" required><?php echo htmlspecialchars($old['text']); ?></textarea>
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
