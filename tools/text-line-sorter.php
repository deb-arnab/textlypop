<?php
$tool_slug   = 'text-line-sorter';
$tool_name   = 'Text Line Sorter';

$page_title  = 'Text Line Sorter — Sort Lines Alphabetically | TextlyPop';
$meta_desc   = 'Sort lines of text alphabetically A-Z or Z-A, by length, numerically, or randomly. Reverse, trim and remove blanks. Free online line sorter. No signup required.';
$canonical_url = 'https://textlypop.com/tools/text-line-sorter';
$og_title    = 'Free Online Text Line Sorter — TextlyPop';
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
  "name": "Text Line Sorter",
  "url": "https://textlypop.com/tools/text-line-sorter",
  "description": "Sort lines alphabetically A-Z or Z-A, by length, numerically, or randomly. Free online tool.",
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
      "name": "How do I sort lines of text alphabetically?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your list — one item per line — and click A-Z; the sorted result appears instantly, with Z-A giving reverse order. Enable trim whitespace so items with stray leading spaces do not cluster at the top, and remove blank lines so gaps disappear from the output."
      }
    },
    {
      "@type": "Question",
      "name": "Can I sort lines by length?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — shortest first or longest first. Menus look deliberate arranged in a visual taper, and sorting longest-first is the quickest way to find outliers in a list: over-long product titles, meta descriptions that will truncate, or the one absurdly long line breaking a layout."
      }
    },
    {
      "@type": "Question",
      "name": "Does the sorter handle numbers correctly?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, in numeric mode. Plain alphabetical sorting compares characters one at a time, filing '10' before '2' and producing the notorious 1, 10, 11, 2, 20 sequence. Numeric sort parses each line's numeric value instead, yielding the natural 1, 2, 10, 11, 20 order — use it for prices, IDs, versions and quantities."
      }
    },
    {
      "@type": "Question",
      "name": "Can I randomize the order of lines?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Random shuffle rearranges all lines into a new random order on every click. Shuffling is the fair-play tool of list processing: randomizing student name lists, question order, or draw entrants without bias from the original order."
      }
    },
    {
      "@type": "Question",
      "name": "Is the sorting case sensitive?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "By default, no — 'apple' and 'Apple' sort side by side, matching dictionary-style ordering. Case sensitive mode follows raw character codes instead, where all uppercase letters precede lowercase (ASCII order) — matching how Unix sort or a programming language would order the same lines."
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
        ['name' => 'Paste your list', 'text' => 'Paste your list into the input box with one item per line.'],
        ['name' => 'Click a sort mode', 'text' => 'Choose how to sort: A-Z alphabetical, Z-A reverse, shortest first, longest first, numeric, or random shuffle.'],
        ['name' => 'View the sorted list', 'text' => 'The sorted lines appear instantly in the output panel.'],
        ['name' => 'Copy the result', 'text' => 'Click Copy to copy the sorted list to your clipboard, or click Reshuffle to get a new random order.'],
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
  "name": "How to Sort Lines of Text Online",
  "description": "Sort lines alphabetically, by length, numerically, or randomly.",
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
      "name": "Select a sort mode",
      "text": "Click A-Z for alphabetical, Z-A for reverse, Shortest or Longest for length sorting, Numeric for number sorting, or Random shuffle to randomize."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Apply extra options",
      "text": "Use the checkboxes to enable case sensitive sorting, remove blank lines, trim whitespace, or reverse the final result."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Copy the result",
      "text": "The sorted list appears instantly in the right panel. Click Copy to copy it."
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
      "name": "Text line sorter",
      "item": "https://textlypop.com/tools/text-line-sorter"
    }
  ]
}
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Text line sorter</h1>
    <p>Sort any list of lines alphabetically, by length, numerically, or randomly. Instant results.</p>
  </div>

  <div class="tls-tool" id="tls-tool">

    <!-- Sort mode buttons -->
    <div class="tls-modes">
      <span class="tls-modes-label">Sort by:</span>
      <div class="tls-mode-group" role="group" aria-label="Sort mode options">

        <button class="tls-mode-btn active" data-mode="az" aria-pressed="true">
          <span class="tls-mode-icon">A→Z</span>
          <span class="tls-mode-name">Alphabetical</span>
        </button>

        <button class="tls-mode-btn" data-mode="za" aria-pressed="false">
          <span class="tls-mode-icon">Z→A</span>
          <span class="tls-mode-name">Reverse alpha</span>
        </button>

        <button class="tls-mode-btn" data-mode="shortest" aria-pressed="false">
          <span class="tls-mode-icon">↑</span>
          <span class="tls-mode-name">Shortest first</span>
        </button>

        <button class="tls-mode-btn" data-mode="longest" aria-pressed="false">
          <span class="tls-mode-icon">↓</span>
          <span class="tls-mode-name">Longest first</span>
        </button>

        <button class="tls-mode-btn" data-mode="numeric" aria-pressed="false">
          <span class="tls-mode-icon">1→9</span>
          <span class="tls-mode-name">Numeric</span>
        </button>

        <button class="tls-mode-btn" data-mode="random" aria-pressed="false">
          <span class="tls-mode-icon">⇄</span>
          <span class="tls-mode-name">Random shuffle</span>
        </button>

      </div>
    </div>

    <!-- Extra options -->
    <div class="tls-options">
      <div class="tls-checks" role="group" aria-label="Sort options">

        <label class="tls-check">
          <input type="checkbox" id="tls-case-sensitive">
          <span class="tls-check-text">
            <strong>Case sensitive</strong>
            <em>Uppercase before lowercase</em>
          </span>
        </label>

        <label class="tls-check">
          <input type="checkbox" id="tls-remove-blanks">
          <span class="tls-check-text">
            <strong>Remove blank lines</strong>
            <em>Strip empty lines before sorting</em>
          </span>
        </label>

        <label class="tls-check">
          <input type="checkbox" id="tls-trim">
          <span class="tls-check-text">
            <strong>Trim whitespace</strong>
            <em>Remove leading and trailing spaces</em>
          </span>
        </label>

        <label class="tls-check">
          <input type="checkbox" id="tls-reverse">
          <span class="tls-check-text">
            <strong>Reverse result</strong>
            <em>Flip the final sorted order</em>
          </span>
        </label>

      </div>
    </div>

    <!-- Panels -->
    <div class="tls-panels">

      <div class="tls-panel">
        <div class="tls-panel-header">
          <span class="tls-panel-label">Input</span>
          <button class="btn btn-clear" data-targets="tls-input,tls-output">Clear</button>
        </div>
        <textarea
          id="tls-input"
          class="tls-textarea"
          placeholder="Paste your list here — one item per line…"
          aria-label="Lines to sort"
          data-save-key="text-line-sorter"
          spellcheck="false"></textarea>
        <div class="tls-panel-footer">
          <span id="tls-input-count">0 lines</span>
        </div>
      </div>

      <div class="tls-panel">
        <div class="tls-panel-header">
          <span class="tls-panel-label">Output</span>
          <button class="btn btn-copy" data-target="tls-output">Copy</button>
        </div>
        <textarea
          id="tls-output"
          class="tls-textarea tls-output-area"
          readonly
          placeholder="Sorted lines will appear here…"
          aria-label="Sorted lines"
          aria-live="polite"></textarea>
        <div class="tls-panel-footer">
          <span id="tls-output-count">0 lines</span>
          <span id="tls-active-mode" class="tls-active-mode">A–Z</span>
        </div>
      </div>

    </div>

    <!-- Toolbar -->
    <div class="tls-toolbar">
      <button class="btn btn-ghost" id="tls-swap-btn" title="Use output as new input">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Use as input
      </button>
      <button class="btn btn-ghost" id="tls-reshuffle-btn" style="display:none">
        Reshuffle
      </button>
      <button class="btn btn-copy" data-target="tls-output">Copy result</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="tls-output" data-to-tool="duplicate-line-remover">Duplicate remover</button>
    <button class="send-to-btn" data-from="tls-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="tls-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="tls-output" data-to-tool="remove-extra-spaces">Remove extra spaces</button>
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

    <h2>About sorting</h2>
    <p>Putting things in order is one of humanity's oldest information technologies. Alphabetization was already in use at the Library of Alexandria over two thousand years ago, where the scholar Callimachus catalogued 120,000 scrolls in his <em>Pinakes</em>. Mechanical sorting arrived with Herman Hollerith's punched-card machines, built to tame the 1890 US census — the company he founded became IBM. And in computer science, sorting is the canonical problem: more algorithmic research has gone into sorting than almost any other task, precisely because ordered data is the foundation of fast searching. This tool applies all of that heritage to the humble everyday list.</p>

    <h2>Sort modes explained</h2>
    <p>Alphabetical A to Z sorts lines from the beginning of the alphabet to the end using standard dictionary ordering. Z to A is the reverse. Shortest first puts the briefest lines at the top of the list — useful for formatting menus, navigation items, or any list where you want a clean visual progression from short to long. Longest first does the opposite and is useful when you want the most detailed entries at the top.</p>
    <p>Numeric sort is essential when your list contains numbers. Standard alphabetical sorting would order "1, 10, 2, 20, 3" because it compares characters one at a time. Numeric sort correctly orders them as "1, 2, 3, 10, 20" by their actual numeric value. Random shuffle randomizes the order completely — useful for randomizing a list of names, options, or items when you need an unbiased order.</p>

    <h2>Sorting lines alphabetically</h2>
    <p>To alphabetize a list, paste it with one item per line and choose A to Z. Sorting compares the whole line from its first character, so leading spaces, bullet characters, quotation marks and numbering all affect where a line lands — a list where some entries start with a space will look scrambled rather than sorted. Trimming the lines first fixes it, and the trim option here does that in the same pass.</p>
    <p>Two behaviours are worth knowing before you trust the output. Sorting is character-based, so "iPhone" and "iphone" may separate depending on the case setting, and names beginning with "Mc" or "de" sort by their literal characters rather than by the conventions a library catalogue would use. And anything that looks like a number needs numeric sort rather than alphabetical: compared character by character, 10 comes before 2, because 1 comes before 2.</p>

    <h2>Common uses for line sorting</h2>
    <p>Writers sort lists of items alphabetically before adding them to articles or reference sections. Developers sort import statements, CSS properties, or configuration keys to keep code organized. SEO professionals sort keyword lists by length or alphabetically before uploading to tools. Data analysts sort exported data before processing. Teachers randomize lists of student names for fair assignment of tasks.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I sort lines of text alphabetically?</p>
      <p class="faq-a">Paste your list — one item per line — and click A-Z; the sorted result appears instantly, with Z-A giving reverse order. Two options are worth enabling for messy real-world lists: trim whitespace, so items with stray leading spaces do not all cluster at the top, and remove blank lines, so gaps in the pasted list disappear from the output. This beats sorting in a spreadsheet when the list lives in a document or code file rather than a table.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I sort lines by length?</p>
      <p class="faq-a">Yes — shortest first or longest first. Length sorting has surprisingly practical uses: menus and navigation labels look deliberate when arranged in a smooth visual taper, CSS and code style guides sometimes order properties by length, and sorting longest-first is the quickest way to find the outliers in a list — the over-long product titles, the meta descriptions that will truncate, the one absurdly long line breaking your layout.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the sorter handle numbers correctly?</p>
      <p class="faq-a">Yes, in numeric mode. Plain alphabetical sorting compares characters one at a time — lexicographic order — which files "10" before "2" because the character 1 precedes 2, producing the notorious "1, 10, 11, 2, 20" sequence familiar from badly sorted file lists. Numeric sort parses each line's numeric value instead, yielding the natural 1, 2, 10, 11, 20 order. Use it whenever your lines start with or consist of numbers: prices, IDs, versions, quantities.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I randomize the order of lines?</p>
      <p class="faq-a">Yes. Random shuffle rearranges all lines into a new random order on every click, so hitting Reshuffle repeatedly deals fresh arrangements without re-pasting. Shuffling is the fair-play tool of list processing: teachers randomize student name lists for presentations, researchers randomize question order, and anyone running a draw can shuffle entrants and take the top of the list as winners without any bias creeping in from the original order.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is the sorting case sensitive?</p>
      <p class="faq-a">By default, no — "apple" and "Apple" sort side by side, which matches what people expect from a dictionary-style ordering. Enable case sensitive mode and sorting follows raw character codes instead, where all uppercase letters precede all lowercase ones (ASCII order): "Zebra" then sorts before "apple". That mode matters when your list is code, where identifiers differing only by case are genuinely different, or when you need output to match how Unix sort or a programming language would order the same lines.</p>
    </div>

  </div>

</div>

<!-- Text line sorter CSS -->
<style>
.tls-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Sort modes */
.tls-modes {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.tls-modes-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  padding-top: 6px;
  white-space: nowrap;
}

.tls-mode-group {
  display: flex;
  gap: 6px;
  flex-wrap: wrap;
  flex: 1;
}

.tls-mode-btn {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 3px;
  padding: 8px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  min-width: 80px;
  transition: border-color var(--transition), background var(--transition), transform 0.1s ease;
}

.tls-mode-btn:hover { border-color: var(--accent); transform: translateY(-1px); }

.tls-mode-btn.active {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .tls-mode-btn.active { background: var(--accent-dim); }

.tls-mode-icon {
  font-size: 1rem;
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
}

.tls-mode-btn.active .tls-mode-icon { color: var(--accent-dark); }
[data-theme="dark"] .tls-mode-btn.active .tls-mode-icon { color: #5DCAA5; }

.tls-mode-name {
  font-size: 0.7rem;
  color: var(--text-3);
  white-space: nowrap;
}

/* Options */
.tls-options {
  padding: 10px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.tls-checks {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.tls-check {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 7px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 140px;
  transition: border-color var(--transition), background var(--transition);
}

.tls-check:hover { border-color: var(--accent); }

.tls-check input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.tls-check:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .tls-check:has(input:checked) { background: var(--accent-dim); }

.tls-check-text {
  display: flex;
  flex-direction: column;
  gap: 1px;
}

.tls-check-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.tls-check-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); }

/* Panels */
.tls-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 240px;
  border-bottom: 1px solid var(--border);
}

.tls-panel { display: flex; flex-direction: column; }
.tls-panel:first-child { border-right: 1px solid var(--border); }

.tls-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.tls-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.tls-textarea {
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

.tls-textarea::placeholder { color: var(--text-3); }
.tls-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .tls-output-area { color: #5DCAA5; background: var(--accent-dim); }

.tls-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.tls-active-mode { font-weight: 600; color: var(--accent); }

.tls-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  gap: 8px;
}

@media (max-width: 640px) {
  .tls-panels { grid-template-columns: 1fr; }
  .tls-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .tls-mode-btn { min-width: 70px; }
  .tls-check { min-width: 100%; }
}
</style>

<!-- Text line sorter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input       = document.getElementById('tls-input');
  var output      = document.getElementById('tls-output');
  var inputCount  = document.getElementById('tls-input-count');
  var outputCount = document.getElementById('tls-output-count');
  var activeMode  = document.getElementById('tls-active-mode');
  var swapBtn     = document.getElementById('tls-swap-btn');
  var reshuffleBtn= document.getElementById('tls-reshuffle-btn');

  var optCase    = document.getElementById('tls-case-sensitive');
  var optBlanks  = document.getElementById('tls-remove-blanks');
  var optTrim    = document.getElementById('tls-trim');
  var optReverse = document.getElementById('tls-reverse');

  var currentMode = 'az';

  var modeNames = {
    az: 'A–Z', za: 'Z–A', shortest: 'Shortest first',
    longest: 'Longest first', numeric: 'Numeric', random: 'Random shuffle'
  };

  /* Fisher-Yates shuffle */
  function shuffle(arr) {
    var a = arr.slice();
    for (var i = a.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var tmp = a[i]; a[i] = a[j]; a[j] = tmp;
    }
    return a;
  }

  function getKey(line) {
    var k = optTrim.checked ? line.trim() : line;
    return optCase.checked ? k : k.toLowerCase();
  }

  function process() {
    var text  = input.value;
    var lines = text.split('\n');

    if (optBlanks.checked) {
      lines = lines.filter(function(l){ return l.trim() !== ''; });
    }

    var result;

    if (currentMode === 'az') {
      result = lines.slice().sort(function(a, b) {
        return getKey(a).localeCompare(getKey(b));
      });
    } else if (currentMode === 'za') {
      result = lines.slice().sort(function(a, b) {
        return getKey(b).localeCompare(getKey(a));
      });
    } else if (currentMode === 'shortest') {
      result = lines.slice().sort(function(a, b) {
        return a.length - b.length || getKey(a).localeCompare(getKey(b));
      });
    } else if (currentMode === 'longest') {
      result = lines.slice().sort(function(a, b) {
        return b.length - a.length || getKey(a).localeCompare(getKey(b));
      });
    } else if (currentMode === 'numeric') {
      result = lines.slice().sort(function(a, b) {
        var na = parseFloat(a);
        var nb = parseFloat(b);
        if (!isNaN(na) && !isNaN(nb)) return na - nb;
        if (!isNaN(na)) return -1;
        if (!isNaN(nb)) return 1;
        return getKey(a).localeCompare(getKey(b));
      });
    } else {
      result = shuffle(lines);
    }

    if (optReverse.checked) result = result.reverse();

    var outCount = result.length;
    output.value = result.join('\n');
    inputCount.textContent  = lines.length.toLocaleString() + ' line' + (lines.length !== 1 ? 's' : '');
    outputCount.textContent = outCount.toLocaleString() + ' line' + (outCount !== 1 ? 's' : '');
    activeMode.textContent  = modeNames[currentMode];
  }

  /* Mode buttons */
  document.querySelectorAll('.tls-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.tls-mode-btn').forEach(function(b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentMode = btn.dataset.mode;
      reshuffleBtn.style.display = currentMode === 'random' ? 'inline-flex' : 'none';
      process();
    });
  });

  /* Options */
  [optCase, optBlanks, optTrim, optReverse].forEach(function(cb) {
    cb.addEventListener('change', process);
  });

  /* Input */
  input.addEventListener('input', process);

  /* Swap */
  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    input.value = output.value;
    output.value = '';
    process();
    input.focus();
  });

  /* Reshuffle */
  reshuffleBtn.addEventListener('click', process);

  process();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
