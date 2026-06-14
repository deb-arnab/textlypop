<?php
$tool_slug   = 'duplicate-line-remover';
$tool_name   = 'Duplicate Line Remover';

$page_title  = 'Duplicate Line Remover — Remove Duplicate Lines Online Free | TextlyPop';
$meta_desc   = 'Remove duplicate lines from a list instantly. Paste one item per line — the tool keeps the first occurrence of each unique line and removes the rest. Free, no signup.';
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
        "text": "The tool compares your text line by line — each line break creates a new item to compare. It keeps only the first occurrence of each unique line and removes all subsequent identical lines. This means your text needs to have one item per line. If you have a paragraph with duplicate sentences, split it into one sentence per line first using the remove line breaks tool, then run deduplication."
      }
    },
    {
      "@type": "Question",
      "name": "Is the duplicate detection case sensitive?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "By default the tool is case insensitive so 'Apple' and 'apple' are treated as duplicates. Enable the case sensitive option to treat them as different lines and keep both."
      }
    },
    {
      "@type": "Question",
      "name": "Will blank lines be removed too?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You can choose. By default blank lines are kept as part of your list structure. Enable the remove blank lines option to strip all empty lines from the output at the same time."
      }
    },
    {
      "@type": "Question",
      "name": "What happens to the original order of my list?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The original order is preserved by default. Only duplicate lines are removed — the first occurrence of each line stays in its original position. You can optionally sort the output alphabetically after deduplication."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use this to find unique values in a list?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. This tool keeps one copy of every unique line in your list, which is exactly the same as finding all unique values. Paste your list and the output contains every unique item exactly once."
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

    <h2>How to remove duplicate lines from a list</h2>
    <p>Paste your list into the input box with one item per line — each line is compared independently. The tool instantly identifies every line that appears more than once and removes all occurrences after the first, preserving the original order of your list. This tool works on lines, not sentences within a paragraph — if you need to process a paragraph, first use the line breaks tool to split it into individual lines. The stats bar below the panels shows exactly how many lines you started with, how many are unique, and how many duplicates were removed.</p>
    <p>Use the options at the top to fine-tune the behaviour. Case sensitive mode treats "Apple" and "apple" as different items. Trim whitespace ignores leading and trailing spaces when comparing lines so "apple " and "apple" are treated as the same. Remove blank lines strips all empty lines at the same time. Sort output alphabetically reorders the deduplicated list from A to Z.</p>

    <h2>Common uses for duplicate line removal</h2>
    <p>Cleaning up email lists is one of the most frequent uses — pasting a list of email addresses and removing every duplicate in seconds. SEO professionals use it to deduplicate keyword lists before uploading to tools. Developers use it to find unique values in log output or configuration files. Data analysts paste spreadsheet columns and remove duplicates without needing Excel or a database query. Writers use it to deduplicate word lists and reference lists.</p>

    <h2>Case sensitive vs case insensitive deduplication</h2>
    <p>By default the tool treats lines as duplicates regardless of capitalization. "Apple", "APPLE" and "apple" are all considered the same line and only the first occurrence is kept. This is the right behaviour for most lists like email addresses and URLs where case does not matter. Enable case sensitive mode when your list contains items where capitalization is meaningful — for example a list of programming variables or commands where "getUserName" and "getusername" are genuinely different values.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the duplicate line remover work?</p>
      <p class="faq-a">The tool compares your text line by line — each line break creates a new item to compare. It keeps only the first occurrence of each unique line and removes all subsequent identical lines. This means your text needs to have one item per line. If you have a paragraph with duplicate sentences, split it into one sentence per line first using the remove line breaks tool, then run deduplication.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is the duplicate detection case sensitive?</p>
      <p class="faq-a">By default the tool is case insensitive so "Apple" and "apple" are treated as duplicates. Enable the case sensitive option to treat them as different lines and keep both.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Will blank lines be removed too?</p>
      <p class="faq-a">You can choose. By default blank lines are kept as part of your list structure. Enable the remove blank lines option to strip all empty lines from the output.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What happens to the original order of my list?</p>
      <p class="faq-a">The original order is preserved by default. Only duplicate lines are removed — the first occurrence of each line stays in its original position. You can optionally sort the output alphabetically after deduplication.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use this to find unique values in a list?</p>
      <p class="faq-a">Yes. This tool keeps one copy of every unique line in your list, which is exactly the same as finding all unique values. Paste your list and the output contains every unique item exactly once.</p>
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
