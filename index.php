<?php
$page_title  = 'TextlyPop — Free Online Text Tools';
$meta_desc   = '35+ free browser-based text tools. Word counter, password generator, JSON formatter, text to speech and more. No signup. Instant results. Your text never leaves your device.';
$canonical_url = 'https://textlypop.com/';

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

$tools = get_all_tools();

// Group tools by category
$categories = [
  'all'      => 'All tools',
  'clean'    => 'Text cleaning',
  'convert'  => 'Conversion',
  'analyse'  => 'Analysis',
  'format'   => 'Formatting',
  'generate' => 'Generation',
];

// Whats new — manually curated newest 3 tools
$new_tools = array_slice(array_reverse($tools), 0, 3);
?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "TextlyPop",
  "url": "https://textlypop.com",
  "description": "35+ free browser-based text tools. Word counter, case converter, JSON formatter, password generator and more.",
  "potentialAction": {
    "@type": "SearchAction",
    "target": {
      "@type": "EntryPoint",
      "urlTemplate": "https://textlypop.com/?q={search_term_string}"
    },
    "query-input": "required name=search_term_string"
  }
}
</script>

<!-- Hero -->
<section class="hero">
  <h1>Text tools that <span>actually work</span></h1>
  <p class="hero-sub">35+ free browser-based tools. No signup. No slowness. Results as you type.</p>
  <div class="hero-search">
    <input
      type="text"
      id="hero-search"
      placeholder="What do you want to do? Try &ldquo;remove line breaks&rdquo;&hellip;"
      autocomplete="off"
      aria-label="Search tools">
  </div>
</section>

<!-- Recently used — rendered by JS from localStorage -->
<div class="recently-used hidden" id="recently-used-section">
  <div class="container">
    <p class="section-label">Recently used</p>
    <div class="recent-chips" id="recent-chips"></div>
  </div>
</div>

<!-- Category filters -->
<div class="category-filters">
  <?php foreach ($categories as $key => $label): ?>
    <button class="cat-btn <?= $key === 'all' ? 'active' : '' ?>"
            data-cat="<?= e($key) ?>">
      <?= e($label) ?>
    </button>
  <?php endforeach; ?>
</div>

<!-- Tools grid -->
<section class="tools-section" aria-label="All text tools">
  <div class="tools-grid" id="tools-grid">

    <?php foreach ($tools as $tool): ?>
      <a href="/tools/<?= e($tool['slug']) ?>"
         class="tool-card"
         data-tool-slug="<?= e($tool['slug']) ?>"
         data-tool-name="<?= e($tool['name']) ?>"
         data-tool-desc="<?= e($tool['desc']) ?>"
         data-tool-cat="<?= e($tool['category']) ?>">

        <div class="tool-icon" aria-hidden="true">
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
            <rect x="2" y="2" width="12" height="12" rx="2"/>
            <line x1="5" y1="6" x2="11" y2="6"/>
            <line x1="5" y1="9" x2="9" y2="9"/>
          </svg>
        </div>

        <?php if ($tool === $tools[0]): ?>
          <span class="tool-badge">Most popular</span>
        <?php endif; ?>

        <div class="tool-name"><?= e($tool['name']) ?></div>
        <div class="tool-desc"><?= e($tool['desc']) ?></div>
      </a>
    <?php endforeach; ?>

  </div>
</section>

<!-- Trust signals -->
<div class="trust-bar" role="complementary" aria-label="Trust signals">
  <div class="trust-bar-inner">
    <div class="trust-item"><span class="trust-dot" aria-hidden="true"></span>No signup required</div>
    <div class="trust-item"><span class="trust-dot" aria-hidden="true"></span>Works in your browser</div>
    <div class="trust-item"><span class="trust-dot" aria-hidden="true"></span>Free forever</div>
    <div class="trust-item"><span class="trust-dot" aria-hidden="true"></span>Your text never leaves your device</div>
    <div class="trust-item"><span class="trust-dot" aria-hidden="true"></span>Dark mode included</div>
  </div>
</div>

<!-- Whats new -->
<section class="whats-new">
  <h2>What&rsquo;s new</h2>
  <div class="new-list">
    <?php foreach ($new_tools as $tool): ?>
      <a href="/tools/<?= e($tool['slug']) ?>" class="new-item">
        <span class="new-badge">New</span>
        <span class="new-item-name"><?= e($tool['name']) ?></span>
        <span class="new-item-date">May 2026</span>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<script nonce="<?= csp_nonce() ?>">
// Show recently-used section only if localStorage has entries
document.addEventListener('DOMContentLoaded', function () {
  var recent = [];
  try { recent = JSON.parse(localStorage.getItem('tp-recent')) || []; } catch(e) {}
  if (recent.length > 0) {
    document.getElementById('recently-used-section').classList.remove('hidden');
  }
});
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
