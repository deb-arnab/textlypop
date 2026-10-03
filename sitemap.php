<?php
/**
 * TextlyPop — Dynamic Sitemap
 * Automatically includes every tool registered in get_all_tools()
 * Add a tool to functions.php and it appears here instantly
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

header('Content-Type: application/xml; charset=utf-8');
// Sitemap is intentionally not indexed as a page but must be readable by crawlers

$base     = 'https://textlypop.com';
$tools    = get_all_tools();

/**
 * Real last-modified date for a page, from the file's mtime.
 * Stamping today's date on every URL at every crawl makes lastmod meaningless
 * to search engines — they learn to ignore it. Falling back to the file date
 * means a URL only claims to have changed when the file behind it actually did.
 */
$lastmod = function (string $relPath): string {
    $full = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($relPath, '/');
    $ts   = is_file($full) ? filemtime($full) : false;
    return date('Y-m-d', $ts !== false ? $ts : time());
};

// Tool pages share the shared includes, so a change to those touches every page.
$sharedTs = max(
    array_map(
        fn($p) => is_file($_SERVER['DOCUMENT_ROOT'] . $p) ? filemtime($_SERVER['DOCUMENT_ROOT'] . $p) : 0,
        ['/includes/functions.php', '/includes/header.php', '/includes/footer.php']
    )
);

$toolLastmod = function (string $slug) use ($sharedTs): string {
    $full = $_SERVER['DOCUMENT_ROOT'] . '/tools/' . $slug . '.php';
    $ts   = is_file($full) ? filemtime($full) : 0;
    return date('Y-m-d', max($ts, $sharedTs) ?: time());
};

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <!-- Homepage -->
  <url>
    <loc><?= $base ?>/</loc>
    <lastmod><?= $lastmod('index.php') ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>

  <!-- Static pages -->
  <url>
    <loc><?= $base ?>/about</loc>
    <lastmod><?= $lastmod('about.php') ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
  </url>

  <url>
    <loc><?= $base ?>/privacy</loc>
    <lastmod><?= $lastmod('privacy.php') ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <url>
    <loc><?= $base ?>/contact</loc>
    <lastmod><?= $lastmod('contact.php') ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <!-- Tool pages — auto-generated from functions.php -->
  <?php foreach ($tools as $tool): ?>
  <url>
    <loc><?= $base ?>/tools/<?= htmlspecialchars($tool['slug']) ?></loc>
    <lastmod><?= $toolLastmod($tool['slug']) ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <?php endforeach; ?>

</urlset>
