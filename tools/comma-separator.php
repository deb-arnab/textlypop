<?php
$tool_slug   = 'comma-separator';
$tool_name   = 'Comma Separator';

$page_title  = 'Comma Separator — List to Comma Separated Values | TextlyPop';
$meta_desc   = 'Convert a list to comma separated values or split CSV back into a list. Custom separator, remove duplicates, sort output. Free online comma separator tool.';
$canonical_url = 'https://textlypop.com/tools/comma-separator';
$og_title    = 'Free Comma Separator Tool — TextlyPop';
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
  "name": "Comma Separator",
  "url": "https://textlypop.com/tools/comma-separator",
  "description": "Convert a list to comma separated values or split CSV back into a list. Custom separator and sorting options.",
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
      "name": "How do I convert a list to comma separated values?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your list — one item per line — in List to CSV mode and the joined result appears instantly. By default a space follows each comma for readability; toggle it off for tight formatting. The output is ready for tag fields, SQL IN clauses, keyword uploaders or anywhere that expects values on one line."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use a separator other than a comma?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — semicolons, pipes, tabs, spaces, or any custom character. The presets match real conventions: semicolons for European-locale spreadsheets, pipes for database exports, tabs for TSV that pastes straight into spreadsheet columns."
      }
    },
    {
      "@type": "Question",
      "name": "Can I split a comma separated list back into individual lines?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Switch to CSV to List mode and each value lands on its own line with whitespace trimmed automatically — 'apple , banana , cherry' splits into three clean items. Handy when a database query or API response hands you one long string."
      }
    },
    {
      "@type": "Question",
      "name": "Can I remove duplicates from the list?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Enable Remove duplicates and repeated values are dropped during conversion. Combined with Sort A–Z, a messy pasted list comes out deduplicated, alphabetized and joined in one step — a common cleanup when merging keyword or email lists from several sources."
      }
    },
    {
      "@type": "Question",
      "name": "What is a CSV file?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "CSV stands for Comma Separated Values — a plain text format where each row is a line and each value is separated by a comma. Every spreadsheet, database and programming language can read it, making CSV the universal medium for moving data between systems since the 1970s."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert a List to Comma Separated Values',
  'description' => 'Convert a line-by-line list to comma separated values using TextlyPop comma separator.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Choose conversion direction','text'=>'Select List to CSV to join lines with a separator, or CSV to List to split a separated string into individual lines.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Paste your input','text'=>'Paste your list or CSV text into the input box on the left. The conversion happens instantly.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Choose your separator','text'=>'Select comma, semicolon, pipe, tab, or enter a custom separator character.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy the result','text'=>'Click Copy to copy the converted output to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Comma Separator','item'=>'https://textlypop.com/tools/comma-separator'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Comma separator</h1>
    <p>Convert a list to comma-separated values or split CSV back into a list. Custom separator, sort and deduplicate.</p>
  </div>

  <div class="cs-tool" id="cs-tool">

    <!-- Mode + options -->
    <div class="cs-controls">

      <div class="cs-mode-group" role="group" aria-label="Conversion mode">
        <button class="cs-mode-btn active" data-mode="join" aria-pressed="true">
          <span class="cs-mode-icon">≡ → ,</span>
          <span class="cs-mode-name">List to CSV</span>
        </button>
        <button class="cs-mode-btn" data-mode="split" aria-pressed="false">
          <span class="cs-mode-icon">, → ≡</span>
          <span class="cs-mode-name">CSV to list</span>
        </button>
      </div>

      <!-- Separator -->
      <div class="cs-sep-group">
        <span class="cs-control-label">Separator</span>
        <div class="cs-sep-btns" role="group" aria-label="Separator character">
          <button class="cs-sep-btn active" data-sep="," aria-pressed="true">Comma ,</button>
          <button class="cs-sep-btn" data-sep=";" aria-pressed="false">Semicolon ;</button>
          <button class="cs-sep-btn" data-sep="|" aria-pressed="false">Pipe |</button>
          <button class="cs-sep-btn" data-sep="\t" aria-pressed="false">Tab</button>
          <button class="cs-sep-btn" data-sep=" " aria-pressed="false">Space</button>
        </div>
        <div class="cs-custom-sep">
          <input type="text" id="cs-custom-sep" class="cs-custom-input" placeholder="Custom…" maxlength="5" aria-label="Custom separator">
        </div>
      </div>

      <!-- Options -->
      <div class="cs-options" role="group" aria-label="Output options">
        <label class="cs-option">
          <input type="checkbox" id="cs-space-after" checked>
          <span class="cs-option-text">
            <strong>Space after separator</strong>
            <em>a, b, c instead of a,b,c</em>
          </span>
        </label>
        <label class="cs-option">
          <input type="checkbox" id="cs-trim">
          <span class="cs-option-text">
            <strong>Trim whitespace</strong>
            <em>Remove leading and trailing spaces</em>
          </span>
        </label>
        <label class="cs-option">
          <input type="checkbox" id="cs-remove-blanks" checked>
          <span class="cs-option-text">
            <strong>Remove blank lines</strong>
            <em>Skip empty items</em>
          </span>
        </label>
        <label class="cs-option">
          <input type="checkbox" id="cs-dedup">
          <span class="cs-option-text">
            <strong>Remove duplicates</strong>
            <em>Keep only unique values</em>
          </span>
        </label>
        <label class="cs-option">
          <input type="checkbox" id="cs-sort">
          <span class="cs-option-text">
            <strong>Sort A–Z</strong>
            <em>Alphabetically sort output</em>
          </span>
        </label>
        <label class="cs-option">
          <input type="checkbox" id="cs-quotes">
          <span class="cs-option-text">
            <strong>Wrap in quotes</strong>
            <em>"a", "b", "c"</em>
          </span>
        </label>
      </div>

    </div>

    <!-- Panels -->
    <div class="cs-panels">
      <div class="cs-panel">
        <div class="cs-panel-header">
          <span class="cs-panel-label" id="cs-input-label">List input — one item per line</span>
          <button class="btn btn-clear" data-targets="cs-input,cs-output">Clear</button>
        </div>
        <textarea
          id="cs-input"
          class="cs-textarea"
          placeholder="apple&#10;banana&#10;cherry&#10;date"
          aria-label="List to convert"
          data-save-key="comma-separator"
          spellcheck="false"></textarea>
        <div class="cs-panel-footer">
          <span id="cs-input-count">0 items</span>
        </div>
      </div>

      <div class="cs-panel">
        <div class="cs-panel-header">
          <span class="cs-panel-label" id="cs-output-label">CSV output</span>
          <button class="btn btn-copy" data-target="cs-output">Copy</button>
        </div>
        <textarea
          id="cs-output"
          class="cs-textarea cs-output-area"
          readonly
          placeholder="Result will appear here…"
          aria-label="Converted output"
          aria-live="polite"></textarea>
        <div class="cs-panel-footer">
          <span id="cs-output-count">0 items</span>
          <span id="cs-output-info" class="cs-output-info"></span>
        </div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="cs-toolbar">
      <button class="btn btn-ghost" id="cs-swap-btn">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Swap
      </button>
      <button class="btn btn-copy" data-target="cs-output">Copy result</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="cs-output" data-to-tool="duplicate-line-remover">Duplicate remover</button>
    <button class="send-to-btn" data-from="cs-output" data-to-tool="text-line-sorter">Line sorter</button>
    <button class="send-to-btn" data-from="cs-output" data-to-tool="find-and-replace">Find and replace</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">L</kbd> clear &nbsp;|&nbsp;
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">Shift</kbd> + <kbd class="kbd">C</kbd> copy output
  </p>

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

  <!-- SEO + GEO content -->
  <div class="tool-content mt-32">

    <h2>About delimited lists</h2>
    <p>Lists live in two shapes: vertical, with one item per line, and horizontal, with items joined by a separator. Humans read vertical lists more easily, which is why spreadsheets, checklists and databases present data that way — but software interfaces constantly demand the horizontal form. Tag fields, recipient boxes, SQL <code>IN</code> clauses, ad platform keyword uploads and configuration values all expect "apple, banana, cherry" on a single line. Converting between the two shapes is trivial for three items and miserable for three hundred, which is exactly the gap a list-to-comma converter fills — in both directions, with the separator of your choice.</p>

    <h2>Comma separated, comma delimited and CSV</h2>
    <p>Three phrases get used interchangeably and mean almost the same thing. <strong>Comma separated</strong> describes the shape of the text: values with a comma between them. <strong>Comma delimited</strong> is the same idea named after the delimiter doing the separating, and is the wording most database and export tools prefer. <strong>CSV</strong> is the file format built on that shape, where each line is a record and each comma marks a new field. In everyday use, when someone asks you to separate by comma, convert to comma separated values, or send a comma delimited list, they want exactly what this tool produces.</p>
    <p>The distinction only starts to matter once your values contain commas of their own. "Smith, John" as a single value has to be wrapped in quotes or it reads as two fields — which is why the quote-wrapping option exists here, and why pasting raw text into a spreadsheet sometimes splits a column in unexpected places.</p>
    <div class="table-scroll">
      <table class="seo-table">
        <thead>
          <tr><th>Separator</th><th>Written as</th><th>Where it is expected</th></tr>
        </thead>
        <tbody>
          <tr><td>Comma</td><td><code>a, b, c</code></td><td>Tag fields, SQL <code>IN</code> clauses, keyword uploads, CSV files</td></tr>
          <tr><td>Semicolon</td><td><code>a; b; c</code></td><td>European spreadsheet locales, email recipient fields in Outlook</td></tr>
          <tr><td>Pipe</td><td><code>a|b|c</code></td><td>Database exports and log files, where values often contain commas</td></tr>
          <tr><td>Tab</td><td><code>a→b→c</code></td><td>TSV files and anything pasted straight into spreadsheet columns</td></tr>
          <tr><td>Space</td><td><code>a b c</code></td><td>Command-line arguments and simple config values</td></tr>
        </tbody>
      </table>
    </div>

    <h2>Common use cases</h2>
    <p>SEO professionals convert keyword lists to comma-separated format for uploading to Google Ads, SEMrush, or Ahrefs. Developers convert arrays of values to strings for use in SQL IN clauses — "WHERE id IN (1, 2, 3, 4, 5)". Data analysts format lists for pasting into spreadsheet cells or database import tools. Marketers format email lists, product lists, and tag lists for various CRM and marketing platforms that require comma-separated input.</p>
    <p>Which tool to reach for depends on how much cleaning the list needs. This comma separator is the full workbench: it deduplicates, sorts and quote-wraps while it converts. When the job is a plain join or split with nothing to tidy, <a href="/tools/list-to-comma">line break to comma</a> does it in one paste. For building an actual spreadsheet file with rows and columns rather than a single delimited line, use <a href="/tools/text-to-csv">text to CSV</a>. And when the input arrived with repeats or ragged spacing, <a href="/tools/duplicate-line-remover">duplicate line remover</a> and <a href="/tools/remove-extra-spaces">remove extra spaces</a> are the usual first passes.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert a list to comma separated values?</p>
      <p class="faq-a">Paste your list — one item per line — into the left panel in List to CSV mode, and the joined result appears instantly on the right. By default a space follows each comma for readability ("apple, banana, cherry"); toggle it off when a system wants tight formatting with no spaces. The output is ready to paste into a tag field, an SQL IN clause, a keyword uploader or anywhere else that expects values on one line.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use a separator other than a comma?</p>
      <p class="faq-a">Yes — semicolons, pipes, tabs, spaces, or any custom character you type. The presets match real conventions: semicolons are what European-locale spreadsheets expect, pipes are common in database exports because data often contains commas, and joining with tabs produces TSV that pastes straight into spreadsheet columns. The same separator choice applies in reverse when splitting text back into a list.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I split a comma separated list back into individual lines?</p>
      <p class="faq-a">Yes. Switch to CSV to List mode, paste the comma-separated text, and each value lands on its own line with surrounding whitespace trimmed automatically — "apple , banana , cherry" splits into three clean items, not three items with stray spaces. This direction is handy when a database query, API response or spreadsheet formula hands you one long string and you need to work through the items individually.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I remove duplicates from the list?</p>
      <p class="faq-a">Yes. Enable Remove duplicates and repeated values are dropped during conversion, keeping the first occurrence of each. Combine it with Sort A–Z and a messy pasted list comes out deduplicated, alphabetized and joined in one step — a common cleanup when merging keyword lists or email addresses from several sources. For heavier list surgery, the dedicated duplicate line remover offers case-sensitivity controls too.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is a CSV file?</p>
      <p class="faq-a">CSV stands for Comma Separated Values — a plain text format where each row is a line and each value in the row is separated by a comma. Because it is plain text, every spreadsheet, database and programming language can read it, making CSV the universal medium for moving data between systems since the 1970s. This tool produces the single-row flavour of CSV; for converting whole tables with quoting rules, use the dedicated text to CSV converter.</p>
    </div>

  </div>

</div>

<!-- Comma separator CSS -->
<style>
.cs-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.cs-controls {
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.cs-mode-group { display: flex; gap: 8px; }

.cs-mode-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  transition: border-color var(--transition), background var(--transition);
}

.cs-mode-btn:hover { border-color: var(--accent); }
.cs-mode-btn.active { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .cs-mode-btn.active { background: var(--accent-dim); }

.cs-mode-icon {
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--accent);
}

.cs-mode-name { font-size: 0.875rem; font-weight: 500; color: var(--text); }

/* Separator row */
.cs-sep-group {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}

.cs-control-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

.cs-sep-btns { display: flex; gap: 6px; flex-wrap: wrap; }

.cs-sep-btn {
  padding: 5px 12px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.8125rem;
  cursor: pointer;
  transition: border-color var(--transition), background var(--transition), color var(--transition);
}

.cs-sep-btn:hover { border-color: var(--accent); color: var(--accent); }
.cs-sep-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }

.cs-custom-input {
  width: 90px;
  padding: 5px 10px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.875rem;
  outline: none;
  transition: border-color var(--transition);
}

.cs-custom-input:focus { border-color: var(--accent); }
.cs-custom-input::placeholder { color: var(--text-3); font-family: var(--font); }

/* Options */
.cs-options {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.cs-option {
  display: flex;
  align-items: flex-start;
  gap: 7px;
  padding: 7px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 140px;
  transition: border-color var(--transition), background var(--transition);
}

.cs-option:hover { border-color: var(--accent); }
.cs-option:has(input:checked) { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .cs-option:has(input:checked) { background: var(--accent-dim); }

.cs-option input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.cs-option-text { display: flex; flex-direction: column; gap: 1px; }
.cs-option-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.cs-option-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); }

/* Panels */
.cs-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 220px;
  border-bottom: 1px solid var(--border);
}

.cs-panel { display: flex; flex-direction: column; }
.cs-panel:first-child { border-right: 1px solid var(--border); }

.cs-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.cs-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.cs-textarea {
  flex: 1;
  width: 100%;
  min-height: 200px;
  padding: 14px;
  border: none;
  background: transparent;
  font-family: var(--font-mono);
  font-size: 0.875rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
}

.cs-textarea::placeholder { color: var(--text-3); white-space: pre-line; }
.cs-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .cs-output-area { color: #5DCAA5; background: var(--accent-dim); }

.cs-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.cs-output-info { color: var(--accent); font-weight: 500; }

.cs-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
}

@media (max-width: 640px) {
  .cs-panels { grid-template-columns: 1fr; }
  .cs-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .cs-option { min-width: 100%; }
}
</style>

<!-- Comma separator JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('cs-input');
  var output     = document.getElementById('cs-output');
  var inputLabel = document.getElementById('cs-input-label');
  var outputLabel= document.getElementById('cs-output-label');
  var inputCount = document.getElementById('cs-input-count');
  var outputCount= document.getElementById('cs-output-count');
  var outputInfo = document.getElementById('cs-output-info');
  var customSep  = document.getElementById('cs-custom-sep');
  var swapBtn    = document.getElementById('cs-swap-btn');

  var optSpace   = document.getElementById('cs-space-after');
  var optTrim    = document.getElementById('cs-trim');
  var optBlanks  = document.getElementById('cs-remove-blanks');
  var optDedup   = document.getElementById('cs-dedup');
  var optSort    = document.getElementById('cs-sort');
  var optQuotes  = document.getElementById('cs-quotes');

  var currentMode = 'join';
  var currentSep  = ',';

  function getSep() {
    if (customSep.value) return customSep.value;
    if (currentSep === '\\t') return '\t';
    return currentSep;
  }

  function process() {
    var text = input.value;
    var sep  = getSep();
    var spaceAfter = optSpace.checked && sep !== '\t' && sep !== ' ';

    if (!text.trim()) {
      output.value = '';
      inputCount.textContent  = '0 items';
      outputCount.textContent = '0 items';
      outputInfo.textContent  = '';
      return;
    }

    var items, result, count;

    if (currentMode === 'join') {
      /* List → CSV */
      items = text.split('\n');

      if (optTrim.checked) items = items.map(function(i){ return i.trim(); });
      if (optBlanks.checked) items = items.filter(function(i){ return i.trim() !== ''; });
      if (optDedup.checked) {
        var seen = {};
        items = items.filter(function(i) {
          var key = i.toLowerCase();
          if (seen[key]) return false;
          seen[key] = true;
          return true;
        });
      }
      if (optSort.checked) items = items.slice().sort(function(a,b){ return a.toLowerCase().localeCompare(b.toLowerCase()); });
      if (optQuotes.checked) items = items.map(function(i){ return '"' + i.replace(/"/g,'""') + '"'; });

      var joiner = spaceAfter ? sep + ' ' : sep;
      result = items.join(joiner);
      count  = items.length;

      inputCount.textContent  = text.split('\n').filter(function(l){ return l.trim(); }).length.toLocaleString() + ' items';
      outputCount.textContent = count.toLocaleString() + ' item' + (count !== 1 ? 's' : '');

    } else {
      /* CSV → List */
      var splitSep = sep;
      items = text.split(splitSep);

      if (optTrim.checked || true) items = items.map(function(i){ return i.trim().replace(/^["']|["']$/g,''); });
      if (optBlanks.checked) items = items.filter(function(i){ return i.trim() !== ''; });
      if (optDedup.checked) {
        var seen = {};
        items = items.filter(function(i) {
          var key = i.toLowerCase();
          if (seen[key]) return false;
          seen[key] = true;
          return true;
        });
      }
      if (optSort.checked) items = items.slice().sort(function(a,b){ return a.toLowerCase().localeCompare(b.toLowerCase()); });

      result = items.join('\n');
      count  = items.length;

      inputCount.textContent  = '1 CSV string';
      outputCount.textContent = count.toLocaleString() + ' line' + (count !== 1 ? 's' : '');
    }

    output.value = result;
    outputInfo.textContent = optDedup.checked ? '' : '';
  }

  /* Mode */
  document.querySelectorAll('.cs-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.cs-mode-btn').forEach(function(b){ b.classList.remove('active'); b.setAttribute('aria-pressed','false'); });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed','true');
      currentMode = btn.dataset.mode;

      if (currentMode === 'join') {
        inputLabel.textContent  = 'List input — one item per line';
        outputLabel.textContent = 'CSV output';
        input.placeholder = 'apple\nbanana\ncherry\ndate';
        output.placeholder = 'Result will appear here…';
      } else {
        inputLabel.textContent  = 'CSV input';
        outputLabel.textContent = 'List output — one item per line';
        input.placeholder = 'apple, banana, cherry, date';
        output.placeholder = 'Result will appear here…';
      }
      process();
    });
  });

  /* Separator */
  document.querySelectorAll('.cs-sep-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.cs-sep-btn').forEach(function(b){ b.classList.remove('active'); b.setAttribute('aria-pressed','false'); });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed','true');
      currentSep = btn.dataset.sep;
      customSep.value = '';
      process();
    });
  });

  customSep.addEventListener('input', function() {
    if (customSep.value) {
      document.querySelectorAll('.cs-sep-btn').forEach(function(b){ b.classList.remove('active'); b.setAttribute('aria-pressed','false'); });
      currentSep = '';
    }
    process();
  });

  /* Options */
  [optSpace, optTrim, optBlanks, optDedup, optSort, optQuotes].forEach(function(cb) {
    cb.addEventListener('change', process);
  });

  input.addEventListener('input', process);

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    var outVal  = output.value;
    var newMode = currentMode === 'join' ? 'split' : 'join';
    document.querySelector('.cs-mode-btn[data-mode="' + newMode + '"]').click();
    input.value = outVal;
    process();
  });

  process();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
