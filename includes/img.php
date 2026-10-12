<?php
/**
 * Responsive image helper.
 *
 *   img('chicken-mandi', 'Chicken Mandi', '(max-width:600px) 100vw, 285px');
 *   img('hero', 'Khayal Restaurant', '100vw', ['priority' => true]);
 *
 * Looks up the WebP sizes generated for an image (see image-manifest.php), outputs
 * srcset/sizes so each device downloads only the size it needs, adds width/height
 * so the page doesn't jump while loading, and lazy-loads unless told otherwise.
 */
function img($name, $alt, $sizes = '100vw', $opts = [])
{
    static $manifest = null;
    if ($manifest === null) {
        $manifest = require __DIR__ . '/image-manifest.php';
    }
    if (!isset($manifest[$name])) {
        return '';
    }
    $m = $manifest[$name];

    $srcset = [];
    foreach ($m['widths'] as $w) {
        $srcset[] = "images/{$name}-{$w}.webp {$w}w";
    }

    $priority = !empty($opts['priority']);
    $attrs  = 'src="images/' . $name . '-' . $m['w'] . '.webp"';
    $attrs .= ' srcset="' . implode(', ', $srcset) . '"';
    $attrs .= ' sizes="' . htmlspecialchars($sizes) . '"';
    $attrs .= ' width="' . $m['w'] . '" height="' . $m['h'] . '"';
    $attrs .= ' alt="' . htmlspecialchars($alt) . '"';
    $attrs .= ' decoding="async"';
    if ($priority) {
        $attrs .= ' fetchpriority="high"';
    } elseif (!empty($opts['eager'])) {
        $attrs .= ' loading="eager"';
    } else {
        $attrs .= ' loading="lazy"';
    }
    if (!empty($opts['class'])) {
        $attrs .= ' class="' . htmlspecialchars($opts['class']) . '"';
    }
    return "<img $attrs />";
}

/** The <link rel="preload"> tag for the hero image, so it starts downloading right away. */
function preload_img($name, $sizes = '100vw')
{
    static $manifest = null;
    if ($manifest === null) {
        $manifest = require __DIR__ . '/image-manifest.php';
    }
    if (!isset($manifest[$name])) {
        return '';
    }
    $srcset = [];
    foreach ($manifest[$name]['widths'] as $w) {
        $srcset[] = "images/{$name}-{$w}.webp {$w}w";
    }
    return '<link rel="preload" as="image" type="image/webp" fetchpriority="high" imagesrcset="'
        . implode(', ', $srcset) . '" imagesizes="' . htmlspecialchars($sizes) . '">';
}
