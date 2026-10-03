<?php
$tool_slug   = 'find-and-replace';
$tool_name   = 'Find and Replace';

$page_title  = 'Find and Replace Text Online Free | TextlyPop';
$meta_desc   = 'Find and replace any word, phrase or pattern in your text instantly. Supports regex, case-sensitive matching and whole-word only. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/find-and-replace';
$og_title    = 'Free Online Find and Replace Tool — TextlyPop';
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
  "name": "Find and Replace",
  "url": "https://textlypop.com/tools/find-and-replace",
  "description": "Find and replace any word, phrase or pattern in your text instantly. Supports regex and case sensitive matching.",
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
      "name": "How do I find and replace text online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your text into the input panel, type the word or phrase to find, type the replacement — or leave it empty to delete matches — and click Replace all. The match counter shows how many occurrences exist before you commit, and Ctrl+Enter triggers the replacement from the keyboard."
      }
    },
    {
      "@type": "Question",
      "name": "Does this tool support regular expressions?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Enable Regex mode and the Find field accepts full regular expression patterns — \\d+ for digits, \\s+ for whitespace — while the Replace field supports backreferences like $1 and $2, so captured groups can be reused in the output. It is the same regex flavour JavaScript uses, so patterns from Stack Overflow work as-is."
      }
    },
    {
      "@type": "Question",
      "name": "Can I do a case sensitive find and replace?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. By default matching ignores capitalization, which suits prose editing. Enable Case sensitive when capitalization distinguishes meaning — replacing only the brand Apple while leaving the fruit alone, or editing code where userName and username are different identifiers."
      }
    },
    {
      "@type": "Question",
      "name": "What does whole word matching do?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It wraps your search term in word boundaries so only complete words match — searching cat skips catch, category and concatenate. This is the option that prevents the classic disaster of replacing 'man' with 'person' and producing 'perforpersonce'. Enable it whenever your search term could hide inside longer words."
      }
    },
    {
      "@type": "Question",
      "name": "Can I replace text with nothing to delete it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — leave the Replace field empty and every match is removed outright. Paired with regex mode it becomes a cleanup engine: delete everything in parentheses, remove all digits, or strip trailing punctuation from every line. Check the match count first so you know how many deletions you are about to make."
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
        ['name' => 'Paste your text', 'text' => 'Paste the text you want to edit into the input box.'],
        ['name' => 'Enter the search term', 'text' => 'Type the word, phrase, or regex pattern you want to find in the Find field.'],
        ['name' => 'Enter the replacement', 'text' => 'Type the replacement text in the Replace field. Leave it empty to delete all matches.'],
        ['name' => 'Replace and copy', 'text' => 'Click Replace All to apply the changes. The updated text appears in the output panel. Copy it using the Copy button.'],
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
  "name": "How to Find and Replace Text Online",
  "description": "Find any word or phrase and replace it instantly. Supports regex.",
  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Paste your text",
      "text": "Paste your text into the input panel on the left."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "Enter your search term",
      "text": "Type the word or phrase you want to find in the Find field. The match count updates live as you type."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Enter the replacement",
      "text": "Type your replacement text in the Replace with field. Leave it empty to delete all matches."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Click Replace all",
      "text": "Click Replace all or press Ctrl+Enter. The result appears with a count of replacements made."
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
      "name": "Find and replace",
      "item": "https://textlypop.com/tools/find-and-replace"
    }
  ]
}
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Find and replace</h1>
    <p>Find any word, phrase or pattern and replace it instantly. Supports regex and case sensitive matching.</p>
  </div>

  <div class="far-tool" id="far-tool">

    <!-- Find / Replace inputs -->
    <div class="far-controls">

      <div class="far-field-row">
        <div class="far-field">
          <label class="far-field-label" for="far-find">Find</label>
          <input
            type="text"
            id="far-find"
            class="far-input"
            placeholder="Word or phrase to find…"
            autocomplete="off"
            spellcheck="false"
            aria-label="Text to find">
          <span class="far-match-count" id="far-match-count"></span>
        </div>

        <div class="far-field">
          <label class="far-field-label" for="far-replace">Replace with</label>
          <input
            type="text"
            id="far-replace"
            class="far-input"
            placeholder="Replacement text (leave empty to delete)…"
            autocomplete="off"
            spellcheck="false"
            aria-label="Replacement text">
        </div>
      </div>

      <!-- Options -->
      <div class="far-options" role="group" aria-label="Find and replace options">

        <label class="far-option">
          <input type="checkbox" id="opt-case-sensitive">
          <span class="far-option-text">
            <strong>Case sensitive</strong>
            <em>Match exact uppercase/lowercase</em>
          </span>
        </label>

        <label class="far-option">
          <input type="checkbox" id="opt-whole-word">
          <span class="far-option-text">
            <strong>Whole word only</strong>
            <em>"cat" won't match "catch"</em>
          </span>
        </label>

        <label class="far-option">
          <input type="checkbox" id="opt-regex">
          <span class="far-option-text">
            <strong>Regex mode</strong>
            <em>Use regular expression patterns</em>
          </span>
        </label>

      </div>

      <!-- Action buttons -->
      <div class="far-actions">
        <button class="btn btn-primary" id="far-replace-btn">Replace all</button>
        <button class="btn btn-ghost" id="far-clear-btn">Clear all</button>
        <span class="far-result-msg" id="far-result-msg" aria-live="polite"></span>
      </div>

    </div>

    <!-- Text panels -->
    <div class="far-panels">

      <div class="far-panel">
        <div class="far-panel-header">
          <span class="far-panel-label">Input</span>
          <span class="far-input-count" id="far-input-count">0 characters</span>
        </div>
        <textarea
          id="far-input"
          class="far-textarea"
          placeholder="Paste your text here…"
          aria-label="Text to search and replace within"
          data-save-key="find-and-replace"
          spellcheck="false"></textarea>
      </div>

      <div class="far-panel">
        <div class="far-panel-header">
          <span class="far-panel-label">Output</span>
          <button class="btn btn-copy" data-target="far-output">Copy</button>
        </div>
        <textarea
          id="far-output"
          class="far-textarea far-output-area"
          readonly
          placeholder="Result will appear here after clicking Replace all…"
          aria-label="Text after find and replace"
          aria-live="polite"></textarea>
      </div>

    </div>

    <!-- Toolbar -->
    <div class="far-toolbar">
      <button class="btn btn-ghost" id="far-swap-btn" title="Use output as new input">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Use as input
      </button>
      <button class="btn btn-copy" data-target="far-output">Copy result</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="far-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="far-output" data-to-tool="case-converter">Case converter</button>
    <button class="send-to-btn" data-from="far-output" data-to-tool="remove-extra-spaces">Remove extra spaces</button>
    <button class="send-to-btn" data-from="far-output" data-to-tool="text-to-slug">Text to slug</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">Enter</kbd> replace all &nbsp;|&nbsp;
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

    <h2>The history of find and replace</h2>
    <p>Search-and-replace is nearly as old as interactive computing. It appeared in text editors of the 1960s like QED, where Ken Thompson — later a co-creator of Unix — implemented pattern matching based on "regular expressions", a notation mathematician Stephen Kleene had invented in the 1950s to describe patterns in symbol sequences. Thompson's 1968 work brought regex from theory into everyday editing, and both inventions became universal: every word processor since has shipped some form of Ctrl+H, and the same regex notation now works everywhere from this tool to Google Docs to production databases.</p>

    <h2>Where batch replacement saves time</h2>
    <p>The value of find and replace is doing in one action what manual editing does in hundreds. Writers rename a character or product across an entire manuscript. Data workers fix a repeated formatting mistake in an exported file — a wrong separator, an outdated company name, a misspelling copied into every row. Developers clean identifiers in code snippets and config files that live outside their editor. With regex enabled, whole categories of text can be transformed at once: every date reformatted, every phone number masked, every double hyphen turned into a proper dash.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I find and replace text online?</p>
      <p class="faq-a">Paste your text into the input panel, type the word or phrase to find, type the replacement — or leave it empty to delete matches — and click Replace all. The match counter under the Find field shows how many occurrences exist before you commit, which is a useful sanity check against replacing far more than you expected. The result appears in the output panel, and Ctrl+Enter triggers the replacement from the keyboard when you are iterating quickly.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does this tool support regular expressions?</p>
      <p class="faq-a">Yes. Enable Regex mode and the Find field accepts full regular expression patterns: <code>\d+</code> matches any run of digits, <code>\s+</code> any whitespace, <code>[aeiou]</code> any vowel. The Replace field supports backreferences, so captured groups can be reused in the output — find <code>(\w+)\s(\w+)</code> and replace with <code>$2 $1</code> to swap two words, or wrap every number in brackets by replacing <code>(\d+)</code> with <code>[$1]</code>. It is the same regex flavour JavaScript uses, so patterns from Stack Overflow work as-is.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I do a case sensitive find and replace?</p>
      <p class="faq-a">Yes. By default matching ignores capitalization — searching "apple" finds "Apple" and "APPLE" too, which suits most prose editing. Enable Case sensitive when capitalization distinguishes meaning: replacing only the standalone brand "Apple" while leaving the fruit alone, or editing code where "userName" and "username" are different identifiers. Combined with whole-word mode, you can make surgical replacements that touch nothing but the exact form you intend.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What does whole word matching do?</p>
      <p class="faq-a">It wraps your search term in word boundaries so only complete words match. Searching "cat" with whole word enabled finds "cat" and "cat." but skips "catch", "category" and "concatenate". This is the option that prevents the classic find-and-replace disaster — replacing "man" with "person" and producing "perforpersonce" out of "performance". Enable it whenever your search term is short enough to hide inside longer words.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I replace text with nothing to delete it?</p>
      <p class="faq-a">Yes — leave the Replace field empty and every match is removed outright. This is the fastest way to strip a recurring word, boilerplate phrase or unwanted symbol from a long document. Paired with regex mode it becomes a cleanup engine: delete everything in parentheses with <code>\([^)]*\)</code>, remove all digits with <code>\d</code>, or strip trailing punctuation from every line. Check the match count first so you know exactly how many deletions you are about to make.</p>
    </div>

  </div>

</div>

<!-- Find and replace CSS -->
<style>
.far-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Controls section */
.far-controls {
  padding: 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.far-field-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
}

.far-field { position: relative; display: flex; flex-direction: column; gap: 5px; }

.far-field-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.far-input {
  width: 100%;
  padding: 9px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.9rem;
  outline: none;
  transition: border-color var(--transition);
}

.far-input:focus { border-color: var(--accent); }
.far-input::placeholder { color: var(--text-3); font-family: var(--font); }

.far-match-count {
  font-size: 0.75rem;
  color: var(--accent);
  font-weight: 600;
  min-height: 1.2em;
}

.far-match-count.no-match { color: var(--danger); }

/* Options */
.far-options {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.far-option {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 140px;
  transition: border-color var(--transition), background var(--transition);
}

.far-option:hover { border-color: var(--accent); }

.far-option input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.far-option:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .far-option:has(input:checked) { background: var(--accent-dim); }

.far-option-text { display: flex; flex-direction: column; gap: 1px; }
.far-option-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.far-option-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); }

/* Action row */
.far-actions {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}

.far-result-msg {
  font-size: 0.8125rem;
  color: var(--accent);
  font-weight: 500;
}

.far-result-msg.error { color: var(--danger); }

/* Panels */
.far-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 260px;
  border-bottom: 1px solid var(--border);
}

.far-panel { display: flex; flex-direction: column; }
.far-panel:first-child { border-right: 1px solid var(--border); }

.far-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.far-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.far-input-count { font-size: 0.75rem; color: var(--text-3); }

.far-textarea {
  flex: 1;
  width: 100%;
  min-height: 240px;
  padding: 14px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 0.9375rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
}

.far-textarea::placeholder { color: var(--text-3); }
.far-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .far-output-area { color: #5DCAA5; background: var(--accent-dim); }

/* Toolbar */
.far-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
}

/* Regex error state */
.far-input.regex-error { border-color: var(--danger); background: var(--danger-light); }

@media (max-width: 640px) {
  .far-field-row { grid-template-columns: 1fr; }
  .far-panels { grid-template-columns: 1fr; }
  .far-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .far-option { min-width: 100%; }
}
</style>

<!-- Find and replace JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var findInput    = document.getElementById('far-find');
  var replaceInput = document.getElementById('far-replace');
  var textInput    = document.getElementById('far-input');
  var output       = document.getElementById('far-output');
  var matchCount   = document.getElementById('far-match-count');
  var inputCount   = document.getElementById('far-input-count');
  var resultMsg    = document.getElementById('far-result-msg');
  var replaceBtn   = document.getElementById('far-replace-btn');
  var clearBtn     = document.getElementById('far-clear-btn');
  var swapBtn      = document.getElementById('far-swap-btn');

  var optCase      = document.getElementById('opt-case-sensitive');
  var optWhole     = document.getElementById('opt-whole-word');
  var optRegex     = document.getElementById('opt-regex');

  /* ── Build regex from current find input ── */
  function buildRegex(preview) {
    var pattern = findInput.value;
    if (!pattern) return null;

    var flags = 'g';
    if (!optCase.checked) flags += 'i';

    try {
      if (optRegex.checked) {
        if (optWhole.checked) pattern = '\\b(?:' + pattern + ')\\b';
        findInput.classList.remove('regex-error');
        return new RegExp(pattern, flags);
      } else {
        /* Escape special regex chars for literal matching */
        pattern = pattern.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        if (optWhole.checked) pattern = '\\b' + pattern + '\\b';
        return new RegExp(pattern, flags);
      }
    } catch (e) {
      if (!preview) {
        findInput.classList.add('regex-error');
        resultMsg.textContent = 'Invalid regex: ' + e.message;
        resultMsg.className = 'far-result-msg error';
      }
      return null;
    }
  }

  /* ── Update live match count as user types find field ── */
  function updateMatchCount() {
    findInput.classList.remove('regex-error');
    var text = textInput.value;
    var pattern = findInput.value;

    if (!pattern || !text) {
      matchCount.textContent = '';
      matchCount.className = 'far-match-count';
      return;
    }

    var rx = buildRegex(true);
    if (!rx) {
      matchCount.textContent = 'Invalid pattern';
      matchCount.className = 'far-match-count no-match';
      return;
    }

    var matches = text.match(rx);
    var count = matches ? matches.length : 0;

    if (count === 0) {
      matchCount.textContent = 'No matches found';
      matchCount.className = 'far-match-count no-match';
    } else {
      matchCount.textContent = count.toLocaleString() + ' match' + (count !== 1 ? 'es' : '') + ' found';
      matchCount.className = 'far-match-count';
    }
  }

  /* ── Update input character count ── */
  function updateInputCount() {
    var n = textInput.value.length;
    inputCount.textContent = n.toLocaleString() + ' character' + (n !== 1 ? 's' : '');
    updateMatchCount();
  }

  /* ── Replace all ── */
  function doReplace() {
    var text    = textInput.value;
    var replace = replaceInput.value;
    var pattern = findInput.value;

    resultMsg.textContent = '';
    resultMsg.className = 'far-result-msg';
    findInput.classList.remove('regex-error');

    if (!text) {
      resultMsg.textContent = 'Paste some text first.';
      resultMsg.className = 'far-result-msg error';
      return;
    }

    if (!pattern) {
      resultMsg.textContent = 'Enter something to find.';
      resultMsg.className = 'far-result-msg error';
      return;
    }

    var rx = buildRegex(false);
    if (!rx) return;

    var matches = text.match(rx);
    var count = matches ? matches.length : 0;

    if (count === 0) {
      resultMsg.textContent = 'No matches found — nothing was replaced.';
      resultMsg.className = 'far-result-msg error';
      output.value = '';
      return;
    }

    var result = text.replace(rx, replace);
    output.value = result;

    var action = replace === '' ? 'deleted' : 'replaced';
    resultMsg.textContent = count.toLocaleString() + ' occurrence' + (count !== 1 ? 's' : '') + ' ' + action + '.';
    resultMsg.className = 'far-result-msg';
  }

  /* ── Events ── */
  textInput.addEventListener('input', updateInputCount);
  findInput.addEventListener('input', updateMatchCount);
  replaceBtn.addEventListener('click', doReplace);

  [optCase, optWhole, optRegex].forEach(function(cb) {
    cb.addEventListener('change', updateMatchCount);
  });

  /* Ctrl+Enter to replace */
  document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'Enter') {
      e.preventDefault();
      doReplace();
    }
  });

  clearBtn.addEventListener('click', function() {
    findInput.value = '';
    replaceInput.value = '';
    textInput.value = '';
    output.value = '';
    matchCount.textContent = '';
    resultMsg.textContent = '';
    inputCount.textContent = '0 characters';
    findInput.classList.remove('regex-error');
  });

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    textInput.value = output.value;
    output.value = '';
    resultMsg.textContent = '';
    updateInputCount();
    textInput.focus();
  });

  updateInputCount();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
