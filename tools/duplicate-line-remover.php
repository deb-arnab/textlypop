<?php
$tool_slug   = 'duplicate-line-remover';
$tool_name   = 'Duplicate Line Remover';

$page_title  = 'Duplicate Line Remover — Remove Repeated Lines | TextlyPop';
$meta_desc   = 'Remove duplicate lines from any list instantly. Paste one item per line and keep only the unique ones, in their original order. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/duplicate-line-remover';
$og_title    = 'Free Duplicate Line Remover — TextlyPop';
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
  "name": "Duplicate Line Remover",
  "url": "https://textlypop.com/tools/duplicate-line-remover",
  "description": "Remove duplicate lines from any list instantly. Case-sensitive option, keep or remove blank lines.",
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
      "name": "How does the duplicate line remover work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The tool compares your text line by line and keeps only the first occurrence of each unique line, removing every identical line that follows. The stats bar shows lines in, unique lines and duplicates removed. Because comparison is per line, split paragraph text into one item per line first before deduplicating."
      }
    },
    {
      "@type": "Question",
      "name": "Is the duplicate detection case sensitive?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "By default, no — Apple, APPLE and apple all count as the same item, which suits email addresses and most everyday lists. Enable case sensitive mode for lists where capitalization is meaningful, like code identifiers. The trim whitespace option ensures items with stray trailing spaces still match."
      }
    },
    {
      "@type": "Question",
      "name": "Will blank lines be removed too?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Only if you choose. By default blank lines are preserved as list structure. Enable remove blank lines to strip all empty lines in the same pass — usually what you want when preparing a list for import into a system that expects one clean item per row."
      }
    },
    {
      "@type": "Question",
      "name": "What happens to the original order of my list?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It is preserved — each unique line keeps the position of its first appearance, and only later repeats vanish, unlike spreadsheet workflows that often force a sort first. If you want alphabetical output, enable the sort option as a final step."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use this to find unique values in a list?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — keeping one copy of every distinct line is identical to extracting unique values, the same result as Excel's Remove Duplicates or SQL's SELECT DISTINCT. The stats bar tells you how many distinct items exist, making it the fastest way to answer how many different X are in this data."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= get_howto_schema(
    $tool_name,
    $meta_desc,
    [
        ['name' => 'Paste your list', 'text' => 'Paste your list into the input box with one item per line. Each line is treated as a separate entry.'],
        ['name' => 'Configure options', 'text' => 'Choose your options: enable case sensitive matching, remove blank lines, trim whitespace from each line, or sort the output alphabetically.'],
        ['name' => 'View the deduplicated list', 'text' => 'Duplicate lines are removed instantly. Only the first occurrence of each unique line is kept in the output.'],
        ['name' => 'Copy the result', 'text' => 'Click Copy to copy the deduplicated list to your clipboard.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How to Remove Duplicate Lines from a List",
  "description": "Remove repeated lines from any list. Paste one item per line.",
  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Paste your list",
      "text": "Paste your list into the left input panel with one item per line."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "Configure options",
      "text": "Enable case sensitive matching, remove blank lines, trim whitespace, or sort output alphabetically using the checkboxes."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "View the results",
      "text": "The deduplicated list appears instantly. The stats bar shows total lines, unique lines, duplicates removed, and blank lines."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Copy the result",
      "text": "Click Copy to copy the cleaned list to your clipboard."
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "TextlyPop",
      "item": "https://textlypop.com"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Tools",
      "item": "https://textlypop.com/#tools"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "Duplicate line remover",
      "item": "https://textlypop.com/tools/duplicate-line-remover"
    }
  ]
}
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Duplicate line remover</h1>
    <p>Paste a list with one item per line. Duplicate lines are removed instantly — the first occurrence of each unique line is kept.</p>
  </div>

  <div class="dlr-tool" id="dlr-tool">

    <!-- Options -->
    <div class="dlr-options">
      <span class="dlr-options-label">Options:</span>
      <div class="dlr-checks" role="group" aria-label="Duplicate removal options">

        <label class="dlr-check">
          <input type="checkbox" id="opt-case-sensitive">
          <span class="dlr-check-text">
            <strong>Case sensitive</strong>
            <em>"Apple" and "apple" are different</em>
          </span>
        </label>

        <label class="dlr-check">
          <input type="checkbox" id="opt-remove-blanks">
          <span class="dlr-check-text">
            <strong>Remove blank lines</strong>
            <em>Strip all empty lines from output</em>
          </span>
        </label>

        <label class="dlr-check">
          <input type="checkbox" id="opt-trim-lines">
          <span class="dlr-check-text">
            <strong>Trim whitespace</strong>
            <em>Ignore leading and trailing spaces</em>
          </span>
        </label>

        <label class="dlr-check">
          <input type="checkbox" id="opt-sort-output">
          <span class="dlr-check-text">
            <strong>Sort output A–Z</strong>
            <em>Alphabetically sort after deduplication</em>
          </span>
        </label>

      </div>
    </div>

    <!-- Panels -->
    <div class="dlr-panels">

      <div class="dlr-panel">
        <div class="dlr-panel-header">
          <span class="dlr-panel-label">Input</span>
          <button class="btn btn-clear" data-targets="dlr-input,dlr-output">Clear</button>
        </div>
        <textarea
          id="dlr-input"
          class="dlr-textarea"
          placeholder="Paste your list here — one item per line…"
          aria-label="List with duplicate lines to remove"
          data-save-key="duplicate-line-remover"
          spellcheck="false"></textarea>
        <div class="dlr-panel-footer">
          <span id="dlr-input-count">0 lines</span>
        </div>
      </div>

      <div class="dlr-panel">
        <div class="dlr-panel-header">
          <span class="dlr-panel-label">Output</span>
          <button class="btn btn-copy" data-target="dlr-output">Copy</button>
        </div>
        <textarea
          id="dlr-output"
          class="dlr-textarea dlr-output-area"
          readonly
          placeholder="Deduplicated list will appear here…"
          aria-label="List with duplicates removed"
          aria-live="polite"></textarea>
        <div class="dlr-panel-footer">
          <span id="dlr-output-count">0 lines</span>
          <span id="dlr-removed-count" class="dlr-removed"></span>
        </div>
      </div>

    </div>

    <!-- Stats row -->
    <div class="dlr-stats" role="region" aria-label="Deduplication statistics" aria-live="polite">
      <div class="dlr-stat">
        <span class="dlr-stat-num" id="dlr-stat-total">0</span>
        <span class="dlr-stat-label">Total lines</span>
      </div>
      <div class="dlr-stat">
        <span class="dlr-stat-num" id="dlr-stat-unique">0</span>
        <span class="dlr-stat-label">Unique lines</span>
      </div>
      <div class="dlr-stat">
        <span class="dlr-stat-num" id="dlr-stat-dupes">0</span>
        <span class="dlr-stat-label">Duplicates removed</span>
      </div>
      <div class="dlr-stat">
        <span class="dlr-stat-num" id="dlr-stat-blanks">0</span>
        <span class="dlr-stat-label">Blank lines</span>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="dlr-toolbar">
      <button class="btn btn-ghost" id="dlr-swap-btn" title="Use output as new input">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Use as input
      </button>
      <button class="btn btn-copy" data-target="dlr-output">Copy result</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="dlr-output" data-to-tool="text-line-sorter">Text line sorter</button>
    <button class="send-to-btn" data-from="dlr-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="dlr-output" data-to-tool="remove-extra-spaces">Remove extra spaces</button>
    <button class="send-to-btn" data-from="dlr-output" data-to-tool="find-and-replace">Find and replace</button>
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

  <!-- SEO content -->
  <div class="tool-content mt-32">

    <h2>About deduplication</h2>
    <p>Removing duplicates is one of the oldest jobs in computing. Unix has shipped a dedicated command for it — <code>uniq</code> — since the 1970s, and "dedupe the list" remains a daily task in data work half a century later because duplicates creep in everywhere: mailing lists merged from two sources, keyword research exported from three tools, log files repeating the same warning thousands of times. Duplicates are more than clutter — they skew counts, inflate email costs, and violate the uniqueness constraints databases depend on. A line-based deduplicator is the plain-text version of that database discipline: every line is an item, and every item appears exactly once.</p>

    <h2>How to remove duplicate lines from a list</h2>
    <p>Paste your list with one item per line and the tool keeps the first occurrence of each distinct line and deletes every later repeat, leaving the original order intact. That ordering matters more than it sounds: sorting a list to group duplicates together — the usual manual workaround, and what the classic Unix <code>uniq</code> requires — destroys whatever sequence the list was in. Here nothing moves.</p>
    <p>Two settings decide what counts as a duplicate. <strong>Case sensitivity</strong> determines whether "Apple" and "apple" are the same item; for email addresses and keywords they usually are, for identifiers and code they usually are not. <strong>Trimming whitespace</strong> decides whether a line with a trailing space matches the same line without one — almost always yes, since invisible padding from a spreadsheet copy is the single most common reason a duplicate survives deduplication and appears not to have been removed.</p>

    <h2>Common uses for duplicate line removal</h2>
    <p>Cleaning up email lists is one of the most frequent uses — pasting a list of email addresses and removing every duplicate in seconds. SEO professionals use it to deduplicate keyword lists before uploading to tools. Developers use it to find unique values in log output or configuration files. Data analysts paste spreadsheet columns and remove duplicates without needing Excel or a database query. Writers use it to deduplicate word lists and reference lists.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the duplicate line remover work?</p>
      <p class="faq-a">The tool compares your text line by line — each line break creates a new item — and keeps only the first occurrence of each unique line, removing every identical line that follows. The stats bar shows how many lines you started with, how many are unique, and how many duplicates were removed, so you can sanity-check the result at a glance. Because comparison is per line, paragraph text should be split into one item per line first (the remove line breaks tool does this) before deduplicating.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is the duplicate detection case sensitive?</p>
      <p class="faq-a">By default, no — "Apple", "APPLE" and "apple" all count as the same item and only the first survives, which is the right behaviour for email addresses, domains and most everyday lists. Enable the case sensitive option when capitalization is meaningful, such as lists of code identifiers where "getUserName" and "getusername" are genuinely different values. The trim whitespace option works alongside it, so "apple " with a stray trailing space still matches "apple" instead of slipping through as unique.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Will blank lines be removed too?</p>
      <p class="faq-a">Only if you choose. By default blank lines are preserved as part of your list's structure — useful when empty lines separate groups of items you want to keep visually distinct. Enable remove blank lines to strip all empty lines in the same pass as deduplication, which is usually what you want when preparing a list for import into another system that expects one clean item per row.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What happens to the original order of my list?</p>
      <p class="faq-a">It is preserved. Each unique line keeps the position of its first appearance, and only the later repeats vanish — so a curated list stays in its curated order after cleanup. This differs from spreadsheet dedupe workflows that often force a sort first. If you do want alphabetical output, enable the sort option and the deduplicated list is reordered A to Z as a final step.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use this to find unique values in a list?</p>
      <p class="faq-a">Yes — keeping one copy of every distinct line is mathematically identical to extracting the unique values, the same result as Excel's Remove Duplicates or SQL's SELECT DISTINCT, but without opening either. Paste a spreadsheet column or log output, and the output panel is your unique-value set while the stats bar tells you how many distinct items exist. It is often the fastest way to answer "how many different X are in this data?"</p>
    </div>

  </div>

</div>

<!-- Duplicate line remover CSS -->
<style>
.dlr-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.dlr-options {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.dlr-options-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  padding-top: 3px;
  white-space: nowrap;
}

.dlr-checks {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  flex: 1;
}

.dlr-check {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 9px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 150px;
  transition: border-color var(--transition), background var(--transition);
}

.dlr-check:hover { border-color: var(--accent); }

.dlr-check input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.dlr-check:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .dlr-check:has(input:checked) { background: var(--accent-dim); }

.dlr-check-text {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.dlr-check-text strong {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text);
}

.dlr-check-text em {
  font-style: normal;
  font-size: 0.75rem;
  color: var(--text-3);
}

/* Panels */
.dlr-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 240px;
  border-bottom: 1px solid var(--border);
}

.dlr-panel { display: flex; flex-direction: column; }
.dlr-panel:first-child { border-right: 1px solid var(--border); }

.dlr-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.dlr-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.dlr-textarea {
  flex: 1;
  width: 100%;
  min-height: 220px;
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

.dlr-textarea::placeholder { color: var(--text-3); }
.dlr-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .dlr-output-area { color: #5DCAA5; background: var(--accent-dim); }

.dlr-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.dlr-removed { font-weight: 600; color: var(--accent); }

/* Stats row */
.dlr-stats {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  border-bottom: 1px solid var(--border);
}

.dlr-stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 14px 8px;
  border-right: 1px solid var(--border);
  text-align: center;
}

.dlr-stat:last-child { border-right: none; }

.dlr-stat-num {
  font-size: 1.375rem;
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
  margin-bottom: 4px;
  font-variant-numeric: tabular-nums;
}

.dlr-stat-label {
  font-size: 0.6875rem;
  color: var(--text-3);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-weight: 500;
}

/* Toolbar */
.dlr-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
}

@media (max-width: 640px) {
  .dlr-panels { grid-template-columns: 1fr; }
  .dlr-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .dlr-check { min-width: 100%; }
  .dlr-stats { grid-template-columns: repeat(2, 1fr); }
  .dlr-stat:nth-child(2) { border-right: none; }
  .dlr-stat:nth-child(3),
  .dlr-stat:nth-child(4) { border-top: 1px solid var(--border); }
}
</style>

<!-- Duplicate line remover JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('dlr-input');
  var output     = document.getElementById('dlr-output');
  var inputCount = document.getElementById('dlr-input-count');
  var outputCount= document.getElementById('dlr-output-count');
  var removedEl  = document.getElementById('dlr-removed-count');
  var statTotal  = document.getElementById('dlr-stat-total');
  var statUnique = document.getElementById('dlr-stat-unique');
  var statDupes  = document.getElementById('dlr-stat-dupes');
  var statBlanks = document.getElementById('dlr-stat-blanks');
  var swapBtn    = document.getElementById('dlr-swap-btn');

  var optCase    = document.getElementById('opt-case-sensitive');
  var optBlanks  = document.getElementById('opt-remove-blanks');
  var optTrim    = document.getElementById('opt-trim-lines');
  var optSort    = document.getElementById('opt-sort-output');

  function process() {
    var text  = input.value;
    var lines = text.split('\n');
    var total  = lines.length;
    var blanks = lines.filter(function(l){ return l.trim() === ''; }).length;

    if (!text) {
      output.value = '';
      inputCount.textContent = '0 lines';
      outputCount.textContent = '0 lines';
      removedEl.textContent = '';
      statTotal.textContent = statUnique.textContent = statDupes.textContent = statBlanks.textContent = '0';
      return;
    }

    var seen   = {};
    var result = [];
    var dupes  = 0;

    lines.forEach(function(line) {
      /* Optionally remove blank lines */
      if (optBlanks.checked && line.trim() === '') return;

      var key = optTrim.checked ? line.trim() : line;
      if (!optCase.checked) key = key.toLowerCase();

      if (seen[key]) {
        dupes++;
      } else {
        seen[key] = true;
        result.push(line);
      }
    });

    /* Optionally sort A-Z */
    if (optSort.checked) {
      result.sort(function(a, b) {
        var ka = optCase.checked ? a : a.toLowerCase();
        var kb = optCase.checked ? b : b.toLowerCase();
        return ka.localeCompare(kb);
      });
    }

    var unique = result.length;
    output.value = result.join('\n');

    inputCount.textContent  = total.toLocaleString() + ' line' + (total !== 1 ? 's' : '');
    outputCount.textContent = unique.toLocaleString() + ' line' + (unique !== 1 ? 's' : '');
    removedEl.textContent   = dupes > 0 ? dupes.toLocaleString() + ' duplicate' + (dupes !== 1 ? 's' : '') + ' removed' : '';

    statTotal.textContent  = total.toLocaleString();
    statUnique.textContent = unique.toLocaleString();
    statDupes.textContent  = dupes.toLocaleString();
    statBlanks.textContent = blanks.toLocaleString();
  }

  input.addEventListener('input', process);
  [optCase, optBlanks, optTrim, optSort].forEach(function(cb) {
    cb.addEventListener('change', process);
  });

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    input.value = output.value;
    output.value = '';
    process();
    input.focus();
  });

  process();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
