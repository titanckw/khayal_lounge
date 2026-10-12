<?php $activePage = 'drinks'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Drinks - Khayal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Jost:wght@300;400;500;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php include 'includes/nav.php'; ?>

  <div class="page-hero">
    <h1>Drinks</h1>
    <p>Refreshing beverages to complement your meal</p>
  </div>

  <section class="section">
    <div class="section-inner">
      <h2 class="section-title">Our Beverages</h2>
      <p class="section-sub">All our drinks are non-alcoholic and crafted to complement our halal cuisine.</p>
      <div class="drinks-grid">
        <?php
        $drinks = [
          'dsc0016',
          'dsc0027',
          'dsc0035',
          'dsc0046',
          'dsc0051',
          'dsc0052',
          'dsc0058',
          'dsc0061',
          'dsc0066',
          'dsc0068',
          'dsc0075',
          'dsc0078',
          'dsc0082',
          'dsc0088',
          'dsc0094',
          'dsc0100',
          'dsc0104',
          'dsc0132',
          'dsc0136',
          'dsc0163',
          'dsc0167',
          'dsc0173',
          'dsc0176',
          'dsc0180',
          'dsc0187',
          'dsc0192',
          'dsc0198',
          'dsc0217',
          'dsc0225',
          'dsc0233',
          'dsc0240',
          'dsc0246',
          'dsc0275',
        ];
        foreach ($drinks as $d): ?>
          <div class="menu-item">
            <img src="images/<?php echo $d; ?>.jpg" alt="Drink" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <script>function toggleMenu() { document.getElementById('mobileMenu').classList.toggle('open'); }</script>
</body>

</html>