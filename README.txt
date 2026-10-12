# Khayal Website — Shared Hosting Package

## Upload
1. Upload the entire contents of this folder (including the hidden .htaccess file) to public_html via File Manager or FTP.
2. Needs PHP 7.4+ (any shared host).

## Brand colours (style.css, top of file)
--brand   #A0430A   buttons, headings, brand-coloured sections
--bg      #DFE8E7   page background
--brand-deep / --brand-darkest are darker shades of --brand (button hover, footer).
Change the colour once in :root and the whole site follows.

## Images
All photos are WebP, in several sizes, so phones download small files and desktops download larger ones.
They're output with the helper in includes/img.php:

    <?php echo img('chicken-mandi', 'Chicken Mandi', '(max-width:600px) 100vw, 285px'); ?>

Image names and sizes are listed in includes/image-manifest.php.
To ADD a photo: resize/convert it to WebP at the widths you want (e.g. 400 and 800 wide), name the files
  my-dish-400.webp and my-dish-800.webp, put them in /images/, and add a line to image-manifest.php
  ('my-dish' => ['widths' => [400, 800], 'w' => 800, 'h' => <height of the 800 file>]).
Original full-size photos are NOT included in this package (they were ~95 MB) — keep them in your own archive.

## Guest reviews
Visitors submit a review on menu.php (bottom of the page). It is saved instantly and shows at the top of reviews.php.
- Reviews are stored in data/reviews.json. The data/ folder must be writable by PHP (permissions 755, or 775/777 if your
  host requires it). If a review ever fails to save, that's the first thing to check.
- Visitor emails are NOT saved on the site; they're only emailed to info@khayal-lounge.co.ke with each new review.
- To remove a review: open data/reviews.json in File Manager and delete that review's block { ... } (keep the commas right).
- Spam protection: hidden trap field, per-visit form token, minimum fill-in time, and one review per minute per visitor.
- data/.htaccess stops visitors opening the file directly (Apache/LiteSpeed).

## Icons
Icons are inline SVG (no extra downloads). Use <?php echo icon('phone'); ?> and <?php echo star_rating(4); ?>.
The available icons are listed in includes/icons.php.

## Files
index.php, menu.php, drinks.php, reviews.php, contact.php   pages
includes/nav.php, footer.php                   shared navigation / footer
includes/head.php                              shared <head> (fonts, stylesheet)
includes/img.php, image-manifest.php           image helper
includes/icons.php                             icon set
includes/reviews.php                           saving/validating reviews
data/reviews.json                              the saved reviews
style.css                                      all styles
.htaccess                                      compression + browser caching (Apache/LiteSpeed)

## Forms
The contact form and new-review notifications email info@khayal-lounge.co.ke using PHP mail(). If emails don't arrive, check your host's
mail log or ask them about SMTP.
