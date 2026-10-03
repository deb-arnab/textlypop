<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$page_title    = '35+ Free Online Text Tools — No Signup, 100% Private | TextlyPop';
$meta_desc     = '35+ free online text tools: word counter, case converter, remove line breaks, JSON formatter, password and QR code generators and more. 100% browser-based — no signup, your text never leaves your device.';
$canonical_url = 'https://textlypop.com/';

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

$tools      = get_all_tools();
$categories = get_categories();
$by_cat     = get_tools_by_category();
$popular    = get_popular_tools();

// Newest tools (last entries in get_all_tools)
$new_tools = array_slice(array_reverse($tools), 0, 3);
$new_slugs = array_column($new_tools, 'slug');

// One distinctive icon per category (16x16, stroked)
$cat_icons = [
  'popular'  => '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 1.8l1.9 3.9 4.3.6-3.1 3 .7 4.2L8 11.5l-3.8 2 .7-4.2-3.1-3 4.3-.6z"/></svg>',
  'new'      => '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v3M8 11v3M2 8h3M11 8h3M4 4l2 2M10 10l2 2M12 4l-2 2M6 10l-2 2"/></svg>',
  'clean'    => '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6.5 2.5l7 7-3 3-7-7z"/><path d="M3.5 5.5l3-3"/><path d="M2 14h6"/></svg>',
  'analyse'  => '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><line x1="3.5" y1="13" x2="3.5" y2="9"/><line x1="8" y1="13" x2="8" y2="3"/><line x1="12.5" y1="13" x2="12.5" y2="6.5"/></svg>',
  'convert'  => '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5.5h10m0 0L10.5 3M13 5.5L10.5 8"/><path d="M13 10.5H3m0 0L5.5 8M3 10.5L5.5 13"/></svg>',
  'format'   => '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><line x1="3" y1="4" x2="13" y2="4"/><line x1="3" y1="8" x2="10" y2="8"/><line x1="3" y1="12" x2="12" y2="12"/></svg>',
  'generate' => '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 2.5l4 4L5 15H1v-4z"/><path d="M12.5 1l.6 1.4L14.5 3l-1.4.6-.6 1.4-.6-1.4L10.5 3l1.4-.6z"/></svg>',
];

// Quick task shortcuts — verb-first, the most common jobs people arrive with
$quick_tasks = [
  ['Count words',          'word-counter'],
  ['Remove line breaks',   'remove-line-breaks'],
  ['Convert text case',    'case-converter'],
  ['Format JSON',          'json-formatter'],
  ['Generate a password',  'password-generator'],
  ['Create a QR code',     'qr-code-generator'],
];

// Homepage FAQ — rendered as an accordion and as FAQPage schema
$faqs = [
  [
    'q' => 'Are TextlyPop text tools really free?',
    'a' => 'Yes. All 35+ tools are completely free with no signup, no account and no hidden limits. Open a tool, paste your text and get results instantly.',
  ],
  [
    'q' => 'Is my text uploaded to a server?',
    'a' => 'No. Every tool runs entirely in your browser using JavaScript. Your text never leaves your device, which makes TextlyPop safe for private notes, work documents and sensitive data.',
  ],
  [
    'q' => 'How do I find the right tool?',
    'a' => 'Type what you want to do into the search bar — for example "remove line breaks" or "make a QR code" — or browse by category: Text cleaning, Analysis, Conversion, Formatting or Generators.',
  ],
  [
    'q' => 'Do the tools work on mobile?',
    'a' => 'Yes. Every tool works on phones and tablets in any modern browser — no app to install. Dark mode is included, too.',
  ],
  [
    'q' => 'How often are new tools added?',
    'a' => 'Regularly. The collection keeps growing — check the New tools section on this page, and use the contact page to suggest a tool you need.',
  ],
];

$faq_schema = [
  '@context'   => 'https://schema.org',
  '@type'      => 'FAQPage',
  'mainEntity' => array_map(fn($f) => [
    '@type'          => 'Question',
    'name'           => $f['q'],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
  ], $faqs),
];

$itemlist_schema = [
  '@context'        => 'https://schema.org',
  '@type'           => 'ItemList',
  'name'            => 'TextlyPop free online text tools',
  'itemListElement' => array_map(fn($t, $i) => [
    '@type'    => 'ListItem',
    'position' => $i + 1,
    'name'     => $t['name'],
    'url'      => 'https://textlypop.com/tools/' . $t['slug'],
  ], $tools, array_keys($tools)),
];

/**
 * Render one homepage tool card.
 */
function render_home_card(array $tool, array $cat_icons, array $new_slugs): void {
  $cat  = $tool['category'];
  $icon = $cat_icons[$cat] ?? $cat_icons['convert'];
  ?>
  <a href="/tools/<?= e($tool['slug']) ?>"
     class="tool-card"
     data-tool-slug="<?= e($tool['slug']) ?>"
     data-tool-name="<?= e($tool['name']) ?>"
     data-tool-desc="<?= e($tool['desc']) ?>"
     data-tool-cat="<?= e($cat) ?>">
    <div class="tool-icon cat-<?= e($cat) ?>" aria-hidden="true"><?= $icon ?></div>
    <div class="tool-card-body">
      <div class="tool-name">
        <?= e($tool['name']) ?>
        <?php if (in_array($tool['slug'], $new_slugs, true)): ?><span class="new-badge">New</span><?php endif; ?>
      </div>
      <div class="tool-desc"><?= e($tool['desc']) ?></div>
    </div>
  </a>
  <?php
}
?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "TextlyPop",
  "url": "https://textlypop.com",
  "description": "35+ free online text tools. Word counter, case converter, JSON formatter, password generator, QR code generator and more. No signup, 100% browser-based.",
  "potentialAction": {
    "@type": "SearchAction",
    "target": {
      "@type": "EntryPoint",
      "urlTemplate": "https://textlypop.com/?search={search_term_string}"
    },
    "query-input": "required name=search_term_string"
  }
}
</script>

<script type="application/ld+json">
<?= json_encode($itemlist_schema, JSON_UNESCAPED_SLASHES) ?>
</script>

<!-- Hero -->
<section class="hero">
  <h1>Free online text tools that <span>actually work</span></h1>
  <p class="hero-sub">TextlyPop gives you 35+ free, browser-based tools to count, clean, convert and generate text — no signup, instant results, and your text never leaves your device.</p>
  <div class="hero-tasks" aria-label="Quick tasks">
    <span class="hero-tasks-label">Quick tasks:</span>
    <?php foreach ($quick_tasks as [$label, $slug]): ?>
      <a href="/tools/<?= e($slug) ?>"><?= e($label) ?></a>
    <?php endforeach; ?>
  </div>
</section>

<!-- Recently used — rendered by JS from localStorage -->
<div class="recently-used hidden" id="recently-used-section">
  <div class="container">
    <p class="section-label">Recently used</p>
    <div class="recent-chips" id="recent-chips"></div>
  </div>
</div>

<!-- Category hub -->
<section class="category-hub" aria-label="Browse tools by category">
  <div class="category-hub-inner">
    <h2 class="hub-title">Browse by category</h2>
    <div class="hub-grid">
      <?php foreach ($categories as $key => $meta): if (empty($by_cat[$key])) continue; ?>
        <a href="#cat-<?= e($key) ?>" class="hub-card cat-<?= e($key) ?>">
          <div class="hub-icon" aria-hidden="true"><?= $cat_icons[$key] ?></div>
          <div class="hub-name"><?= e($meta['label']) ?></div>
          <p class="hub-blurb"><?= e($meta['blurb']) ?></p>
          <span class="hub-count"><?= count($by_cat[$key]) ?> tools</span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Sticky category nav -->
<div class="filter-bar" id="filter-bar">
  <div class="category-filters" aria-label="Filter tools by category">
    <button class="cat-btn active" data-cat="home">Popular &amp; new</button>
    <?php foreach ($categories as $key => $meta): if (empty($by_cat[$key])) continue; ?>
      <button class="cat-btn" data-cat="<?= e($key) ?>"><?= e($meta['label']) ?></button>
    <?php endforeach; ?>
  </div>
</div>

<!-- Category tool lists are collapsed by default (JS reveals them); show all without JS -->
<noscript><style>.tool-category.cat-hidden { display: block !important; }</style></noscript>

<div class="tools-home" id="tools">

  <!-- Most popular -->
  <section class="tool-category" data-cat-section="popular" aria-label="Most popular text tools">
    <div class="cat-header">
      <div class="cat-header-icon cat-popular" aria-hidden="true"><?= $cat_icons['popular'] ?></div>
      <div class="cat-header-text">
        <h2>Most popular text tools</h2>
        <p class="cat-blurb">The tools people reach for every day.</p>
      </div>
    </div>
    <div class="cat-grid">
      <?php foreach ($popular as $tool) render_home_card($tool, $cat_icons, $new_slugs); ?>
    </div>
  </section>

  <!-- New tools -->
  <section class="tool-category" data-cat-section="new" aria-label="Recently added tools">
    <div class="cat-header">
      <div class="cat-header-icon cat-popular" aria-hidden="true"><?= $cat_icons['new'] ?></div>
      <div class="cat-header-text">
        <h2>New tools</h2>
        <p class="cat-blurb">Fresh additions — new tools land here regularly.</p>
      </div>
    </div>
    <div class="cat-grid">
      <?php foreach ($new_tools as $tool) render_home_card($tool, $cat_icons, $new_slugs); ?>
    </div>
  </section>

  <!-- Category sections -->
  <?php foreach ($categories as $key => $meta): if (empty($by_cat[$key])) continue; ?>
    <section class="tool-category cat-hidden" id="cat-<?= e($key) ?>" data-cat-section="<?= e($key) ?>" aria-label="<?= e($meta['title']) ?>">
      <div class="cat-header">
        <div class="cat-header-icon cat-<?= e($key) ?>" aria-hidden="true"><?= $cat_icons[$key] ?></div>
        <div class="cat-header-text">
          <h2><?= e($meta['title']) ?></h2>
          <p class="cat-blurb"><?= e($meta['blurb']) ?></p>
        </div>
      </div>
      <div class="cat-grid">
        <?php foreach ($by_cat[$key] as $tool) render_home_card($tool, $cat_icons, $new_slugs); ?>
      </div>
    </section>
  <?php endforeach; ?>

  <!-- Empty state for search -->
  <div class="no-results hidden" id="no-results">
    <p>No tools match <strong>&ldquo;<span id="no-results-q"></span>&rdquo;</strong>.</p>
    <button class="btn btn-ghost" id="clear-search-btn">Clear search</button>
  </div>

</div>

<!-- Why TextlyPop -->
<section class="features" aria-label="Why use TextlyPop">
  <div class="features-inner">
    <h2>Why use TextlyPop&rsquo;s free text tools?</h2>
    <p class="features-intro">TextlyPop is a growing collection of free online text tools for writers, students, developers and marketers. Count words and characters, convert text case, remove line breaks and duplicate lines, format and validate JSON, convert Markdown to HTML, and generate strong passwords, QR codes and lorem ipsum — all in one place, with new tools added regularly.</p>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon cat-clean" aria-hidden="true">
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 1.5l5 2v4c0 3.2-2.1 5.6-5 7-2.9-1.4-5-3.8-5-7v-4z"/><path d="M5.8 8l1.6 1.6L10.5 6.4"/></svg>
        </div>
        <h3>Private by design</h3>
        <p>Every tool runs locally in your browser. Your text is never uploaded, stored or shared with anyone.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon cat-format" aria-hidden="true">
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8.8 1.5L3 9h4l-.8 5.5L12 7H8z"/></svg>
        </div>
        <h3>Instant results</h3>
        <p>No page reloads, no waiting for a server. Results update live as you type.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon cat-analyse" aria-hidden="true">
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="8" r="6.5"/><path d="M5.5 8.2l1.7 1.7 3.3-3.6"/></svg>
        </div>
        <h3>Free forever, no signup</h3>
        <p>Every tool is free to use with no account, no limits and nothing getting in your way.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon cat-generate" aria-hidden="true">
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1.5" y="3" width="13" height="8.5" rx="1.5"/><path d="M5.5 14h5"/></svg>
        </div>
        <h3>Works on any device</h3>
        <p>Use the tools on desktop, tablet or phone in any modern browser — dark mode included.</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="home-faq" aria-label="Frequently asked questions">
  <h2>Frequently asked questions</h2>
  <?php foreach ($faqs as $faq): ?>
    <div class="faq-item">
      <h3 class="faq-q"><?= e($faq['q']) ?></h3>
      <p class="faq-a"><?= e($faq['a']) ?></p>
    </div>
  <?php endforeach; ?>
</section>

<script type="application/ld+json">
<?= json_encode($faq_schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

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
