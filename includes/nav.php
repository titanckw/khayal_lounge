<?php
require_once __DIR__ . '/img.php';
require_once __DIR__ . '/icons.php';
// Pass $activePage before including this file, e.g. $activePage = 'home';
function navLink($href, $label, $page, $activePage) {
    $class = ($page === $activePage) ? ' class="active"' : '';
    echo "<a href=\"$href\"$class>$label</a>";
}
?>
<?php echo icons_sprite(); ?>
<nav class="navbar">
  <a href="index.php" class="logo">
    <?php echo img('logo', 'Khayal', '78px', ['eager' => true]); ?>
  </a>
  <div class="nav-links">
    <?php navLink('index.php',   'Home',       'home',    $activePage); ?>
    <?php navLink('menu.php',    'Food Menu',  'menu',    $activePage); ?>
    <?php navLink('drinks.php',  'Drinks',     'drinks',  $activePage); ?>
    <?php navLink('reviews.php', 'Reviews',    'reviews', $activePage); ?>
    <?php navLink('contact.php', 'Contact',    'contact', $activePage); ?>
  </div>
  <a href="tel:+254706540367" class="btn-order">Order Now</a>
  <button class="hamburger" onclick="toggleMenu()" aria-label="Open menu"><?php echo icon('menu'); ?></button>
</nav>
<div class="mobile-menu" id="mobileMenu">
  <?php navLink('index.php',   'Home',       'home',    $activePage); ?>
  <?php navLink('menu.php',    'Food Menu',  'menu',    $activePage); ?>
  <?php navLink('drinks.php',  'Drinks',     'drinks',  $activePage); ?>
  <?php navLink('reviews.php', 'Reviews',    'reviews', $activePage); ?>
  <?php navLink('contact.php', 'Contact',    'contact', $activePage); ?>
  <a href="tel:+254706540367" class="btn-order" style="width:fit-content">Order Now</a>
</div>
