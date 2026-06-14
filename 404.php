<?php
$page_title = '404 — Page Not Found | TextlyPop';
$meta_desc  = 'This page could not be found. Browse all free text tools on TextlyPop.';
http_response_code(404);
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<div class="not-found text-center">
  <h1>404</h1>
  <h2>Page not found</h2>
  <p>The page you&rsquo;re looking for doesn&rsquo;t exist or may have moved.</p>
  <a href="/" class="btn btn-primary">Browse all tools</a>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
