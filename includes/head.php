<?php
// Shared <head> assets: fonts + stylesheet. Include inside <head> after the <title>.
// Fonts load without blocking the first paint (the text shows in a fallback font, then swaps).
$fontsUrl = 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Jost:wght@300;400;500;600&display=swap';
?>
  <meta name="theme-color" content="#A0430A">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="<?php echo $fontsUrl; ?>" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="<?php echo $fontsUrl; ?>"></noscript>
  <link rel="stylesheet" href="style.css">
