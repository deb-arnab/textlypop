<?php
$tool_slug   = 'words-to-pages';
$tool_name   = 'Words to Pages';

$page_title  = 'Words to Pages Calculator — Convert Word Count to Pages Free | TextlyPop';
$meta_desc   = 'Convert word count to number of pages instantly. Choose font size, font type and spacing. Free online words to pages calculator for essays, books and documents.';
$canonical_url = 'https://textlypop.com/tools/words-to-pages';
$og_title    = 'Free Words to Pages Calculator — TextlyPop';
$og_desc     = $meta_desc;

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
$related = get_related_tools($tool_slug, 5);
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<meta name="tool-slug" content="<?= e($tool_slug) ?>">
<meta name="tool-name" content="<?= e($tool_name) ?>">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Words to Pages Calculator",
  "url": "https://textlypop.com/tools/words-to-pages",
  "description": "Convert word count to number of pages. Choose font size, font type and line spacing.",
  "applicationCategory": "UtilitiesApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How many pages is 1000 words?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "1000 words is approximately 2 pages single-spaced or 4 pages double-spaced using 12pt Times New Roman on standard A4 or letter paper. The exact number depends on your font, font size, line spacing, and margin settings."
      }
    },
    {
      "@type": "Question",
      "name": "How many words are on a page?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A standard page with 12pt Times New Roman, single spacing, and standard margins contains approximately 500 words. With double spacing that drops to around 250 words per page. Arial 12pt single-spaced fits slightly fewer words at around 480 per page."
      }
    },
    {
      "@type": "Question",
      "name": "How many pages is a 5000 word essay?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A 5000 word essay is approximately 10 pages single-spaced or 20 pages double-spaced using standard settings of 12pt Times New Roman with 1-inch margins."
      }
    },
    {
      "@type": "Question",
      "name": "How many pages is 500 words?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "500 words is approximately 1 page single-spaced or 2 pages double-spaced using 12pt font with standard margins."
      }
    },
    {
      "@type": "Question",
      "name": "How many words is a novel?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most novels are between 70,000 and 100,000 words. Genre fiction often falls between 80,000 and 90,000 words. Young adult novels typically run 50,000 to 80,000 words. Short novels and novellas are usually 20,000 to 50,000 words."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Words to Pages',
  'description' => 'Calculate how many pages your word count fills using TextlyPop words to pages calculator.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Enter your word count','text'=>'Type your word count into the input field or paste text into the text box to count automatically.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Choose your settings','text'=>'Select your font, font size, line spacing and page size to match your document settings.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Read the result','text'=>'The page count appears instantly and updates as you change any setting.'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type'=>'ListItem','position'=>1,'name'=>'TextlyPop','item'=>'https://textlypop.com'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Tools','item'=>'https://textlypop.com/#tools'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Words to Pages','item'=>'https://textlypop.com/tools/words-to-pages'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Words to pages calculator</h1>
    <p>Find out how many pages your word count fills. Choose your font, size, spacing and page format.</p>
  </div>

  <div class="wp-tool" id="wp-tool">

    <!-- Word count input -->
    <div class="wp-input-section">
      <div class="wp-count-row">
        <div class="wp-count-group">
          <label class="wp-label" for="wp-words">Word count</label>
          <input
            type="number"
            id="wp-words"
            class="wp-input-num"
            placeholder="e.g. 1000"
            min="1"
            max="1000000"
            aria-label="Number of words">
        </div>
        <span class="wp-or">or</span>
        <div class="wp-paste-group">
          <label class="wp-label" for="wp-paste">Paste your text to count automatically</label>
          <textarea
            id="wp-paste"
            class="wp-textarea"
            placeholder="Paste text here and word count fills in automatically…"
            aria-label="Paste text to count words"
            spellcheck="false"></textarea>
        </div>
      </div>
    </div>

    <!-- Settings -->
    <div class="wp-settings">

      <div class="wp-setting-group">
        <label class="wp-setting-label" for="wp-font">Font</label>
        <select id="wp-font" class="wp-select">
          <option value="times">Times New Roman</option>
          <option value="arial">Arial / Helvetica</option>
          <option value="calibri">Calibri</option>
          <option value="courier">Courier New</option>
          <option value="garamond">Garamond</option>
          <option value="georgia">Georgia</option>
        </select>
      </div>

      <div class="wp-setting-group">
        <label class="wp-setting-label" for="wp-size">Font size</label>
        <select id="wp-size" class="wp-select">
          <option value="10">10pt</option>
          <option value="11">11pt</option>
          <option value="12" selected>12pt</option>
          <option value="13">13pt</option>
          <option value="14">14pt</option>
        </select>
      </div>

      <div class="wp-setting-group">
        <label class="wp-setting-label" for="wp-spacing">Line spacing</label>
        <select id="wp-spacing" class="wp-select">
          <option value="single">Single</option>
          <option value="1.5">1.5 spacing</option>
          <option value="double" selected>Double</option>
        </select>
      </div>

      <div class="wp-setting-group">
        <label class="wp-setting-label" for="wp-page">Page size</label>
        <select id="wp-page" class="wp-select">
          <option value="letter" selected>Letter (8.5×11")</option>
          <option value="a4">A4 (8.27×11.7")</option>
        </select>
      </div>

    </div>

    <!-- Result -->
    <div class="wp-result" id="wp-result">
      <div class="wp-result-main">
        <div class="wp-pages-display" id="wp-pages-display">
          <span class="wp-pages-num" id="wp-pages-num">—</span>
          <span class="wp-pages-label" id="wp-pages-label">pages</span>
        </div>
        <div class="wp-result-meta" id="wp-result-meta"></div>
      </div>

      <div class="wp-result-breakdown" id="wp-result-breakdown"></div>
    </div>

    <!-- Reference table -->
    <div class="wp-reference">
      <div class="wp-ref-header">
        <span class="wp-ref-title">Quick reference — words per page</span>
        <button class="wp-ref-toggle" id="wp-ref-toggle">Show</button>
      </div>
      <div class="wp-ref-table-wrap hidden" id="wp-ref-table-wrap">
        <table class="wp-ref-table">
          <thead>
            <tr>
              <th>Word count</th>
              <th>Single-spaced</th>
              <th>Double-spaced</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>250 words</td><td>½ page</td><td>1 page</td></tr>
            <tr><td>500 words</td><td>1 page</td><td>2 pages</td></tr>
            <tr><td>750 words</td><td>1½ pages</td><td>3 pages</td></tr>
            <tr><td>1,000 words</td><td>2 pages</td><td>4 pages</td></tr>
            <tr><td>1,500 words</td><td>3 pages</td><td>6 pages</td></tr>
            <tr><td>2,000 words</td><td>4 pages</td><td>8 pages</td></tr>
            <tr><td>2,500 words</td><td>5 pages</td><td>10 pages</td></tr>
            <tr><td>3,000 words</td><td>6 pages</td><td>12 pages</td></tr>
            <tr><td>5,000 words</td><td>10 pages</td><td>20 pages</td></tr>
            <tr><td>7,500 words</td><td>15 pages</td><td>30 pages</td></tr>
            <tr><td>10,000 words</td><td>20 pages</td><td>40 pages</td></tr>
            <tr><td>20,000 words</td><td>40 pages</td><td>80 pages</td></tr>
            <tr><td>50,000 words</td><td>100 pages</td><td>200 pages</td></tr>
            <tr><td>80,000 words</td><td>160 pages</td><td>320 pages</td></tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Related tools:</span>
    <button class="send-to-btn" data-from="wp-paste" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="wp-paste" data-to-tool="reading-level-checker">Reading level</button>
    <button class="send-to-btn" data-from="wp-paste" data-to-tool="sentence-counter">Sentence counter</button>
  </div>

  <!-- Related tools -->
  <div class="related-tools mt-32">
    <h2>Related tools</h2>
    <div class="related-grid">
      <?php foreach ($related as $tool): ?>
        <a href="/tools/<?= e($tool['slug']) ?>" class="tool-card"
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
          <div class="tool-name"><?= e($tool['name']) ?></div>
          <div class="tool-desc"><?= e($tool['desc']) ?></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- SEO content -->
  <div class="tool-content mt-32">

    <h2>How the words to pages calculator works</h2>
    <p>The calculator uses the average words per page for each combination of font, font size, line spacing, and page size. These averages are based on standard 1-inch margins all around. Different fonts pack words differently — Times New Roman is slightly more compact than Arial at the same point size because it is a serif font with narrower letterforms. Courier New is a monospace font where every character takes the same width, resulting in fewer words per line than proportional fonts at the same size.</p>

    <h2>How many words per page by setting</h2>
    <p>With 12pt Times New Roman, single spacing, and standard margins on letter paper: approximately 500 words per page. Double spacing halves that to 250 words per page. At 12pt Arial single-spaced: approximately 480 words per page. At 12pt Courier New single-spaced: approximately 400 words per page because its wide monospace characters take more horizontal space. Larger font sizes reduce the word count — 14pt single-spaced fits roughly 400 words per page compared to 500 at 12pt.</p>

    <h2>Common word counts and their page equivalents</h2>
    <p>A typical short essay of 500 words fills one single-spaced page or two double-spaced pages. A 1,000-word article fills two single-spaced or four double-spaced pages. A 5,000-word academic paper fills ten single-spaced or twenty double-spaced pages. A 10,000-word dissertation chapter fills around twenty single-spaced pages. A full novel at 80,000 words would fill approximately 160 single-spaced pages or 320 double-spaced pages in manuscript format.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How many pages is 1000 words?</p>
      <p class="faq-a">1000 words is approximately 2 pages single-spaced or 4 pages double-spaced using 12pt Times New Roman with standard margins.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many words are on a page?</p>
      <p class="faq-a">A standard page with 12pt Times New Roman, single spacing, and standard margins contains approximately 500 words. Double spacing reduces this to around 250 words per page.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many pages is a 5000 word essay?</p>
      <p class="faq-a">A 5000 word essay is approximately 10 pages single-spaced or 20 pages double-spaced with 12pt Times New Roman and standard margins.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many pages is 500 words?</p>
      <p class="faq-a">500 words is approximately 1 page single-spaced or 2 pages double-spaced with standard settings.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many words is a novel?</p>
      <p class="faq-a">Most novels are 70,000 to 100,000 words. Genre fiction typically runs 80,000 to 90,000. Young adult novels are usually 50,000 to 80,000. Novellas are 20,000 to 50,000 words.</p>
    </div>

  </div>

</div>

<!-- Words to pages CSS -->
<style>
.wp-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Input section */
.wp-input-section {
  padding: 20px;
  border-bottom: 1px solid var(--border);
  background: var(--bg);
}

.wp-count-row {
  display: grid;
  grid-template-columns: 200px auto 1fr;
  gap: 16px;
  align-items: start;
}

.wp-count-group,
.wp-paste-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.wp-or {
  align-self: center;
  font-size: 0.875rem;
  color: var(--text-3);
  font-weight: 500;
  padding-top: 24px;
}

.wp-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.wp-input-num {
  padding: 10px 14px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 1.125rem;
  outline: none;
  width: 100%;
  text-align: center;
  transition: border-color var(--transition);
}

.wp-input-num:focus { border-color: var(--accent); }

.wp-textarea {
  width: 100%;
  min-height: 90px;
  padding: 10px 14px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  resize: vertical;
  outline: none;
  transition: border-color var(--transition);
  line-height: 1.6;
}

.wp-textarea:focus { border-color: var(--accent); }
.wp-textarea::placeholder { color: var(--text-3); }

/* Settings bar */
.wp-settings {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.wp-setting-group {
  display: flex;
  flex-direction: column;
  gap: 5px;
  padding: 14px 16px;
  border-right: 1px solid var(--border);
}

.wp-setting-group:last-child { border-right: none; }

.wp-setting-label {
  font-size: 0.7rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.wp-select {
  padding: 6px 10px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.875rem;
  outline: none;
  cursor: pointer;
  transition: border-color var(--transition);
  width: 100%;
}

.wp-select:focus { border-color: var(--accent); }

/* Result */
.wp-result {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  padding: 28px 24px;
  border-bottom: 1px solid var(--border);
  background: var(--accent-light);
  flex-wrap: wrap;
}

[data-theme="dark"] .wp-result { background: var(--accent-dim); }

.wp-result-main {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.wp-pages-display {
  display: flex;
  align-items: baseline;
  gap: 10px;
}

.wp-pages-num {
  font-size: clamp(2.5rem, 8vw, 4.5rem);
  font-weight: 800;
  color: var(--accent);
  line-height: 1;
  font-variant-numeric: tabular-nums;
  letter-spacing: -0.02em;
}

.wp-pages-label {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--accent-dark);
}

[data-theme="dark"] .wp-pages-label { color: #5DCAA5; }

.wp-result-meta {
  font-size: 0.9375rem;
  color: var(--text-2);
}

.wp-result-breakdown {
  display: flex;
  flex-direction: column;
  gap: 8px;
  min-width: 220px;
}

.wp-breakdown-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 16px;
  font-size: 0.875rem;
  padding: 7px 12px;
  background: var(--bg);
  border-radius: var(--radius-md);
  border: 1px solid var(--border);
}

.wp-breakdown-label { color: var(--text-3); }
.wp-breakdown-val   { font-weight: 600; color: var(--text); font-variant-numeric: tabular-nums; }

/* Reference table */
.wp-reference { border-top: 1px solid var(--border); background: var(--bg-2); }

.wp-ref-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
}

.wp-ref-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.wp-ref-toggle {
  font-size: 0.75rem;
  padding: 3px 10px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: transparent;
  color: var(--text-2);
  cursor: pointer;
  font-family: var(--font);
  transition: color var(--transition), border-color var(--transition);
}

.wp-ref-toggle:hover { color: var(--accent); border-color: var(--accent); }

.wp-ref-table-wrap {
  border-top: 1px solid var(--border);
  overflow-x: auto;
}

.wp-ref-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.875rem;
}

.wp-ref-table th {
  padding: 9px 16px;
  text-align: left;
  font-size: 0.7rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--text-3);
  background: var(--bg-3);
  border-bottom: 1px solid var(--border);
}

.wp-ref-table td {
  padding: 8px 16px;
  border-bottom: 1px solid var(--border);
  color: var(--text-2);
}

.wp-ref-table td:first-child { font-weight: 600; color: var(--text); }
.wp-ref-table tr:last-child td { border-bottom: none; }
.wp-ref-table tr:hover td { background: var(--bg-3); }

@media (max-width: 760px) {
  .wp-count-row { grid-template-columns: 1fr; }
  .wp-or { padding-top: 0; text-align: center; }
  .wp-settings { grid-template-columns: 1fr 1fr; }
  .wp-setting-group:nth-child(2) { border-right: none; }
  .wp-setting-group:nth-child(3),
  .wp-setting-group:nth-child(4) { border-top: 1px solid var(--border); }
  .wp-result { flex-direction: column; align-items: flex-start; }
  .wp-result-breakdown { min-width: 100%; }
}

@media (max-width: 480px) {
  .wp-settings { grid-template-columns: 1fr; }
  .wp-setting-group { border-right: none; border-top: 1px solid var(--border); }
  .wp-setting-group:first-child { border-top: none; }
}
</style>

<!-- Words to pages JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var wordsInput  = document.getElementById('wp-words');
  var pasteInput  = document.getElementById('wp-paste');
  var fontSel     = document.getElementById('wp-font');
  var sizeSel     = document.getElementById('wp-size');
  var spacingSel  = document.getElementById('wp-spacing');
  var pageSel     = document.getElementById('wp-page');
  var pagesNum    = document.getElementById('wp-pages-num');
  var pagesLabel  = document.getElementById('wp-pages-label');
  var resultMeta  = document.getElementById('wp-result-meta');
  var breakdown   = document.getElementById('wp-result-breakdown');
  var refToggle   = document.getElementById('wp-ref-toggle');
  var refWrap     = document.getElementById('wp-ref-table-wrap');

  /*
   * Words per page lookup table
   * Based on standard 1-inch margins, standard paragraph spacing
   * Values: { font: { size: { spacing: { page: wpp } } } }
   *
   * Reference sources: standard academic and publishing guidelines
   * Times NR is slightly more compact than Arial at same size
   * Courier is monospace — wider characters, fewer words per line
   */
  var WPP = {
    times: {
      10: { single: { letter: 600, a4: 620 }, '1.5': { letter: 400, a4: 415 }, double: { letter: 300, a4: 310 } },
      11: { single: { letter: 540, a4: 560 }, '1.5': { letter: 360, a4: 373 }, double: { letter: 270, a4: 280 } },
      12: { single: { letter: 500, a4: 520 }, '1.5': { letter: 333, a4: 347 }, double: { letter: 250, a4: 260 } },
      13: { single: { letter: 450, a4: 465 }, '1.5': { letter: 300, a4: 310 }, double: { letter: 225, a4: 233 } },
      14: { single: { letter: 400, a4: 415 }, '1.5': { letter: 267, a4: 277 }, double: { letter: 200, a4: 207 } },
    },
    arial: {
      10: { single: { letter: 580, a4: 600 }, '1.5': { letter: 387, a4: 400 }, double: { letter: 290, a4: 300 } },
      11: { single: { letter: 520, a4: 540 }, '1.5': { letter: 347, a4: 360 }, double: { letter: 260, a4: 270 } },
      12: { single: { letter: 480, a4: 500 }, '1.5': { letter: 320, a4: 333 }, double: { letter: 240, a4: 250 } },
      13: { single: { letter: 430, a4: 445 }, '1.5': { letter: 287, a4: 297 }, double: { letter: 215, a4: 223 } },
      14: { single: { letter: 380, a4: 395 }, '1.5': { letter: 253, a4: 263 }, double: { letter: 190, a4: 197 } },
    },
    calibri: {
      10: { single: { letter: 590, a4: 610 }, '1.5': { letter: 393, a4: 407 }, double: { letter: 295, a4: 305 } },
      11: { single: { letter: 530, a4: 550 }, '1.5': { letter: 353, a4: 367 }, double: { letter: 265, a4: 275 } },
      12: { single: { letter: 490, a4: 510 }, '1.5': { letter: 327, a4: 340 }, double: { letter: 245, a4: 255 } },
      13: { single: { letter: 440, a4: 455 }, '1.5': { letter: 293, a4: 303 }, double: { letter: 220, a4: 228 } },
      14: { single: { letter: 390, a4: 405 }, '1.5': { letter: 260, a4: 270 }, double: { letter: 195, a4: 203 } },
    },
    courier: {
      10: { single: { letter: 480, a4: 495 }, '1.5': { letter: 320, a4: 330 }, double: { letter: 240, a4: 248 } },
      11: { single: { letter: 430, a4: 445 }, '1.5': { letter: 287, a4: 297 }, double: { letter: 215, a4: 223 } },
      12: { single: { letter: 400, a4: 415 }, '1.5': { letter: 267, a4: 277 }, double: { letter: 200, a4: 207 } },
      13: { single: { letter: 355, a4: 368 }, '1.5': { letter: 237, a4: 245 }, double: { letter: 178, a4: 184 } },
      14: { single: { letter: 315, a4: 326 }, '1.5': { letter: 210, a4: 217 }, double: { letter: 157, a4: 163 } },
    },
    garamond: {
      10: { single: { letter: 640, a4: 660 }, '1.5': { letter: 427, a4: 440 }, double: { letter: 320, a4: 330 } },
      11: { single: { letter: 580, a4: 600 }, '1.5': { letter: 387, a4: 400 }, double: { letter: 290, a4: 300 } },
      12: { single: { letter: 540, a4: 560 }, '1.5': { letter: 360, a4: 373 }, double: { letter: 270, a4: 280 } },
      13: { single: { letter: 480, a4: 498 }, '1.5': { letter: 320, a4: 332 }, double: { letter: 240, a4: 249 } },
      14: { single: { letter: 430, a4: 445 }, '1.5': { letter: 287, a4: 297 }, double: { letter: 215, a4: 223 } },
    },
    georgia: {
      10: { single: { letter: 570, a4: 590 }, '1.5': { letter: 380, a4: 393 }, double: { letter: 285, a4: 295 } },
      11: { single: { letter: 510, a4: 530 }, '1.5': { letter: 340, a4: 353 }, double: { letter: 255, a4: 265 } },
      12: { single: { letter: 470, a4: 490 }, '1.5': { letter: 313, a4: 327 }, double: { letter: 235, a4: 245 } },
      13: { single: { letter: 420, a4: 435 }, '1.5': { letter: 280, a4: 290 }, double: { letter: 210, a4: 218 } },
      14: { single: { letter: 375, a4: 388 }, '1.5': { letter: 250, a4: 259 }, double: { letter: 188, a4: 194 } },
    },
  };

  function getWPP() {
    var font    = fontSel.value;
    var size    = parseInt(sizeSel.value);
    var spacing = spacingSel.value;
    var page    = pageSel.value;
    return WPP[font][size][spacing][page];
  }

  function formatPages(pages) {
    if (pages < 0.1) return '< 0.1';
    if (pages < 1)   return pages.toFixed(1);
    if (pages < 10)  return Math.round(pages * 10) / 10;
    return Math.round(pages).toLocaleString();
  }

  function calculate() {
    var words = parseInt(wordsInput.value);
    if (!words || words < 1) {
      pagesNum.textContent  = '—';
      pagesLabel.textContent = 'pages';
      resultMeta.textContent = '';
      breakdown.innerHTML   = '';
      return;
    }

    var wpp   = getWPP();
    var pages = words / wpp;

    /* Main result */
    pagesNum.textContent   = formatPages(pages);
    pagesLabel.textContent = pages === 1 ? 'page' : 'pages';

    var fontNames = {
      times: 'Times New Roman', arial: 'Arial', calibri: 'Calibri',
      courier: 'Courier New', garamond: 'Garamond', georgia: 'Georgia'
    };
    var spacingNames = { single: 'single-spaced', '1.5': '1.5-spaced', double: 'double-spaced' };

    resultMeta.textContent =
      words.toLocaleString() + ' words · ' +
      fontNames[fontSel.value] + ' ' + sizeSel.value + 'pt · ' +
      spacingNames[spacingSel.value];

    /* Breakdown cards */
    var chars    = Math.round(words * 5.1); /* avg 5.1 chars per word incl space */
    var readMins = Math.round(words / 200);  /* avg 200 wpm reading speed */
    var speakMins= Math.round(words / 130);  /* avg 130 wpm speaking speed */

    breakdown.innerHTML =
      card('Words per page', wpp.toLocaleString()) +
      card('Characters (est.)', chars.toLocaleString()) +
      card('Read time', readMins < 1 ? '< 1 min' : readMins + ' min') +
      card('Speaking time', speakMins < 1 ? '< 1 min' : speakMins + ' min');
  }

  function card(label, value) {
    return '<div class="wp-breakdown-item">' +
      '<span class="wp-breakdown-label">' + label + '</span>' +
      '<span class="wp-breakdown-val">' + value + '</span>' +
    '</div>';
  }

  /* Paste textarea → word count */
  pasteInput.addEventListener('input', function() {
    var text  = pasteInput.value.trim();
    var count = text ? text.split(/\s+/).filter(Boolean).length : 0;
    if (count > 0) {
      wordsInput.value = count;
      calculate();
    } else {
      wordsInput.value = '';
      calculate();
    }
  });

  /* Word count input */
  wordsInput.addEventListener('input', function() {
    if (wordsInput.value) pasteInput.value = '';
    calculate();
  });

  /* Settings */
  [fontSel, sizeSel, spacingSel, pageSel].forEach(function(sel) {
    sel.addEventListener('change', calculate);
  });

  /* Reference table */
  refToggle.addEventListener('click', function() {
    var hidden = refWrap.classList.toggle('hidden');
    refToggle.textContent = hidden ? 'Show' : 'Hide';
  });

  /* Init */
  calculate();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
