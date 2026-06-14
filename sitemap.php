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
$today    = date('Y-m-d');
$tools    = get_all_tools();

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <!-- Homepage -->
  <url>
    <loc><?= $base ?>/</loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>

  <!-- Static pages -->
  <url>
    <loc><?= $base ?>/about</loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
  </url>

  <url>
    <loc><?= $base ?>/privacy</loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <url>
    <loc><?= $base ?>/contact</loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <!-- Tool pages — auto-generated from functions.php -->
  <?php foreach ($tools as $tool): ?>
  <url>
    <loc><?= $base ?>/tools/<?= htmlspecialchars($tool['slug']) ?></loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <?php endforeach; ?>

</urlset>
