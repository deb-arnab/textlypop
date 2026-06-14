<?php
$tool_slug   = 'list-to-comma';
$tool_name   = 'Line Break to Comma';

$page_title  = 'Line Break to Comma — Convert List to Comma Separated Text Free | TextlyPop';
$meta_desc   = 'Convert line-by-line lists to comma-separated text and back. Remove line breaks and join with any separator. Free online tool. No signup required.';
$canonical_url = 'https://textlypop.com/tools/list-to-comma';
$og_title    = 'Free Line Break to Comma Converter — TextlyPop';
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
  "name": "Line Break to Comma Converter",
  "url": "https://textlypop.com/tools/list-to-comma",
  "description": "Convert line-by-line lists to comma-separated text and back. Remove line breaks and join with any separator.",
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
        "text": "Paste your list with one item per line into the input box. The tool joins all lines with a comma and space producing a single comma-separated string. Results appear instantly as you type."
      }
    },
    {
      "@type": "Question",
      "name": "Can I convert comma separated text back to a list?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Switch to Comma to Lines mode and paste your comma-separated text. Each value is split onto its own line. Leading and trailing spaces are trimmed automatically."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use a different separator?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. You can choose comma, semicolon, pipe, space or enter any custom separator character. The separator is used both when joining lines and when splitting back."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between this tool and the comma separator?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "This tool is specifically designed for converting between line-separated and delimiter-separated formats quickly, with a focus on simplicity. The comma separator tool has more advanced options like deduplication, sorting and quote wrapping."
      }
    },
    {
      "@type": "Question",
      "name": "Can I remove blank lines from the list?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Enable the Remove blank lines option to skip empty lines when converting. This is useful when your input list has gaps between items."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Line Breaks to Commas',
  'description' => 'Convert a line-by-line list to comma-separated text using TextlyPop line break to comma converter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Choose direction','text'=>'Select Lines to Comma to join lines with a separator, or Comma to Lines to split a separated string into individual lines.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Paste your text','text'=>'Paste your list or separated text into the input box on the left. The conversion happens instantly.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Choose a separator','text'=>'Select comma, semicolon, pipe, space or enter a custom separator.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Line Break to Comma','item'=>'https://textlypop.com/tools/list-to-comma'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Line break to comma</h1>
    <p>Convert line-by-line lists to comma-separated text or split comma-separated values back to lines.</p>
  </div>

  <div class="ltc-tool" id="ltc-tool">

    <!-- Mode + separator controls -->
    <div class="ltc-controls">

      <div class="ltc-mode-group" role="group" aria-label="Conversion direction">
        <button class="ltc-mode-btn active" data-mode="join" aria-pressed="true">
          <span class="ltc-mode-icon">≡ → ,</span>
          <span class="ltc-mode-name">Lines to comma</span>
        </button>
        <button class="ltc-mode-btn" data-mode="split" aria-pressed="false">
          <span class="ltc-mode-icon">, → ≡</span>
          <span class="ltc-mode-name">Comma to lines</span>
        </button>
      </div>

      <div class="ltc-sep-row">
        <span class="ltc-control-label">Separator:</span>
        <div class="ltc-sep-btns" role="group" aria-label="Separator">
          <button class="ltc-sep-btn active" data-sep="," aria-pressed="true">Comma ,</button>
          <button class="ltc-sep-btn" data-sep=";" aria-pressed="false">Semicolon ;</button>
          <button class="ltc-sep-btn" data-sep="|" aria-pressed="false">Pipe |</button>
          <button class="ltc-sep-btn" data-sep=" " aria-pressed="false">Space</button>
          <button class="ltc-sep-btn" data-sep="\t" aria-pressed="false">Tab</button>
        </div>
        <input type="text" id="ltc-custom-sep" class="ltc-custom-input" placeholder="Custom…" maxlength="5" aria-label="Custom separator">
      </div>

      <div class="ltc-opt-row">
        <label class="ltc-option">
          <input type="checkbox" id="ltc-space-after" checked>
          <span>Space after separator</span>
        </label>
        <label class="ltc-option">
          <input type="checkbox" id="ltc-trim" checked>
          <span>Trim whitespace</span>
        </label>
        <label class="ltc-option">
          <input type="checkbox" id="ltc-remove-blanks" checked>
          <span>Remove blank lines</span>
        </label>
      </div>

    </div>

    <!-- Panels -->
    <div class="ltc-panels">

      <div class="ltc-panel">
        <div class="ltc-panel-header">
          <span class="ltc-panel-label" id="ltc-input-label">Lines input</span>
          <div class="ltc-panel-actions">
            <span class="ltc-count" id="ltc-input-count">0 lines</span>
            <button class="btn btn-clear" data-targets="ltc-input,ltc-output">Clear</button>
          </div>
        </div>
        <textarea
          id="ltc-input"
          class="ltc-textarea ltc-mono"
          placeholder="apple&#10;banana&#10;cherry&#10;date"
          aria-label="Input text"
          data-save-key="list-to-comma"
          spellcheck="false"></textarea>
      </div>

      <div class="ltc-panel">
        <div class="ltc-panel-header">
          <span class="ltc-panel-label" id="ltc-output-label">Comma output</span>
          <div class="ltc-panel-actions">
            <span class="ltc-count" id="ltc-output-count">0 items</span>
            <button class="btn btn-copy" data-target="ltc-output">Copy</button>
          </div>
        </div>
        <textarea
          id="ltc-output"
          class="ltc-textarea ltc-mono ltc-output-area"
          readonly
          placeholder="Result will appear here…"
          aria-label="Converted output"
          aria-live="polite"></textarea>
      </div>

    </div>

    <!-- Toolbar -->
    <div class="ltc-toolbar">
      <button class="btn btn-ghost" id="ltc-swap-btn">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Swap
      </button>
      <button class="btn btn-copy" data-target="ltc-output">Copy result</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="ltc-output" data-to-tool="duplicate-line-remover">Duplicate remover</button>
    <button class="send-to-btn" data-from="ltc-output" data-to-tool="text-line-sorter">Line sorter</button>
    <button class="send-to-btn" data-from="ltc-output" data-to-tool="word-counter">Word counter</button>
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

    <h2>What this tool does</h2>
    <p>The line break to comma converter takes a list with one item per line and joins all the lines together with a comma or any separator you choose. The reverse direction takes a comma-separated string and splits it back into individual lines. Both conversions happen instantly as you type with no button press required.</p>

    <h2>Common use cases</h2>
    <p>Developers frequently need to paste a column of values from a spreadsheet into a SQL query as a comma-separated list — this tool handles that in one step. SEO professionals convert keyword lists from one-per-line format to comma-separated for uploading to tools. Data analysts format lists for use in filter inputs, search forms, and configuration files. Email marketers convert address lists between formats for different mailing platforms.</p>

    <h2>Lines to comma vs comma separator</h2>
    <p>This tool is intentionally simple — fast conversion between two common formats. For more advanced options like deduplication, sorting, quote wrapping, and multi-separator support visit the Comma separator tool. Both tools serve different needs depending on how much control you need over the output.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert a list to comma separated values?</p>
      <p class="faq-a">Paste your list with one item per line into the left panel. The comma-separated result appears instantly on the right.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I convert comma separated text back to a list?</p>
      <p class="faq-a">Yes. Switch to Comma to Lines mode and paste your comma-separated text. Each value splits onto its own line.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use a different separator?</p>
      <p class="faq-a">Yes. Choose comma, semicolon, pipe, space, tab, or enter any custom separator character using the controls above the panels.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I remove blank lines from the list?</p>
      <p class="faq-a">Yes. The Remove blank lines option is enabled by default and skips empty lines when converting.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between this and the comma separator tool?</p>
      <p class="faq-a">This tool is fast and simple. The comma separator tool has advanced options like deduplication, sorting, and quote wrapping.</p>
    </div>

  </div>

</div>

<!-- Line break to comma CSS -->
<style>
.ltc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.ltc-controls {
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.ltc-mode-group { display: flex; gap: 8px; }

.ltc-mode-btn {
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

.ltc-mode-btn:hover { border-color: var(--accent); }
.ltc-mode-btn.active { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .ltc-mode-btn.active { background: var(--accent-dim); }

.ltc-mode-icon {
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--accent);
}

.ltc-mode-name { font-size: 0.875rem; font-weight: 500; color: var(--text); }

.ltc-sep-row {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}

.ltc-control-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

.ltc-sep-btns { display: flex; gap: 6px; flex-wrap: wrap; }

.ltc-sep-btn {
  padding: 5px 12px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.8125rem;
  cursor: pointer;
  transition: border-color var(--transition), background var(--transition), color var(--transition);
  white-space: nowrap;
}

.ltc-sep-btn:hover { border-color: var(--accent); color: var(--accent); }
.ltc-sep-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }

.ltc-custom-input {
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

.ltc-custom-input:focus { border-color: var(--accent); }
.ltc-custom-input::placeholder { color: var(--text-3); font-family: var(--font); }

.ltc-opt-row {
  display: flex;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}

.ltc-option {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.875rem;
  color: var(--text-2);
  cursor: pointer;
  user-select: none;
}

.ltc-option input[type="checkbox"] {
  accent-color: var(--accent);
  width: 14px;
  height: 14px;
  cursor: pointer;
}

/* Panels */
.ltc-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 240px;
  border-bottom: 1px solid var(--border);
}

.ltc-panel { display: flex; flex-direction: column; }
.ltc-panel:first-child { border-right: 1px solid var(--border); }

.ltc-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  gap: 8px;
}

.ltc-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.ltc-panel-actions { display: flex; align-items: center; gap: 8px; }
.ltc-count { font-size: 0.75rem; color: var(--text-3); font-variant-numeric: tabular-nums; }

.ltc-textarea {
  flex: 1;
  width: 100%;
  min-height: 220px;
  padding: 14px;
  border: none;
  background: transparent;
  font-size: 0.9375rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
}

.ltc-mono { font-family: var(--font-mono); font-size: 0.875rem; }
.ltc-textarea::placeholder { color: var(--text-3); font-family: var(--font); }
.ltc-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .ltc-output-area { color: #5DCAA5; background: var(--accent-dim); }

.ltc-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
}

@media (max-width: 640px) {
  .ltc-panels { grid-template-columns: 1fr; }
  .ltc-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .ltc-mode-btn { flex: 1; justify-content: center; }
}
</style>

<!-- Line break to comma JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input       = document.getElementById('ltc-input');
  var output      = document.getElementById('ltc-output');
  var inputLabel  = document.getElementById('ltc-input-label');
  var outputLabel = document.getElementById('ltc-output-label');
  var inputCount  = document.getElementById('ltc-input-count');
  var outputCount = document.getElementById('ltc-output-count');
  var customSep   = document.getElementById('ltc-custom-sep');
  var swapBtn     = document.getElementById('ltc-swap-btn');

  var optSpace    = document.getElementById('ltc-space-after');
  var optTrim     = document.getElementById('ltc-trim');
  var optBlanks   = document.getElementById('ltc-remove-blanks');

  var currentMode = 'join';
  var currentSep  = ',';

  function getSep() {
    if (customSep.value) return customSep.value;
    return currentSep === '\\t' ? '\t' : currentSep;
  }

  function process() {
    var text = input.value;
    var sep  = getSep();
    var spaceAfter = optSpace.checked && sep !== '\t' && sep !== ' ';

    if (!text.trim()) {
      output.value = '';
      inputCount.textContent  = '0 ' + (currentMode === 'join' ? 'lines' : 'chars');
      outputCount.textContent = '0 items';
      return;
    }

    if (currentMode === 'join') {
      var lines = text.split('\n');
      if (optTrim.checked)   lines = lines.map(function(l) { return l.trim(); });
      if (optBlanks.checked) lines = lines.filter(function(l) { return l.length > 0; });

      var joiner = spaceAfter ? sep + ' ' : sep;
      var result = lines.join(joiner);

      output.value = result;
      inputCount.textContent  = lines.length + ' line' + (lines.length !== 1 ? 's' : '');
      outputCount.textContent = lines.length + ' item' + (lines.length !== 1 ? 's' : '');

    } else {
      /* Split mode */
      var parts = text.split(sep);
      if (optTrim.checked)   parts = parts.map(function(p) { return p.trim(); });
      if (optBlanks.checked) parts = parts.filter(function(p) { return p.length > 0; });

      var result = parts.join('\n');
      output.value = result;
      inputCount.textContent  = parts.length + ' item' + (parts.length !== 1 ? 's' : '');
      outputCount.textContent = parts.length + ' line' + (parts.length !== 1 ? 's' : '');
    }
  }

  function setMode(mode) {
    currentMode = mode;
    document.querySelectorAll('.ltc-mode-btn').forEach(function(b) {
      var active = b.dataset.mode === mode;
      b.classList.toggle('active', active);
      b.setAttribute('aria-pressed', active ? 'true' : 'false');
    });

    if (mode === 'join') {
      inputLabel.textContent   = 'Lines input';
      outputLabel.textContent  = 'Comma output';
      input.placeholder        = 'apple\nbanana\ncherry\ndate';
      output.placeholder       = 'Result will appear here…';
    } else {
      inputLabel.textContent   = 'Comma input';
      outputLabel.textContent  = 'Lines output';
      input.placeholder        = 'apple, banana, cherry, date';
      output.placeholder       = 'Result will appear here…';
    }

    process();
  }

  /* Mode buttons */
  document.querySelectorAll('.ltc-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() { setMode(btn.dataset.mode); });
  });

  /* Separator buttons */
  document.querySelectorAll('.ltc-sep-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.ltc-sep-btn').forEach(function(b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentSep = btn.dataset.sep;
      customSep.value = '';
      process();
    });
  });

  customSep.addEventListener('input', function() {
    if (customSep.value) {
      document.querySelectorAll('.ltc-sep-btn').forEach(function(b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      currentSep = '';
    }
    process();
  });

  [optSpace, optTrim, optBlanks].forEach(function(cb) {
    cb.addEventListener('change', process);
  });

  input.addEventListener('input', process);

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    var outVal  = output.value;
    var newMode = currentMode === 'join' ? 'split' : 'join';
    input.value = outVal;
    output.value = '';
    setMode(newMode);
  });

  process();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
