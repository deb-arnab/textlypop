<?php
$tool_slug   = 'json-formatter';
$tool_name   = 'JSON Formatter';

$page_title  = 'JSON Formatter & Validator — Format JSON Online Free | TextlyPop';
$meta_desc   = 'Format, validate and minify JSON instantly. Prettify raw JSON with proper indentation or compress it for production. Free online JSON formatter. No signup required.';
$canonical_url = 'https://textlypop.com/tools/json-formatter';
$og_title    = 'Free JSON Formatter & Validator — TextlyPop';
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
  "name": "JSON Formatter",
  "url": "https://textlypop.com/tools/json-formatter",
  "description": "Format, validate and minify JSON instantly. Prettify or minify with one click.",
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
      "name": "How do I format JSON online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your JSON into the input box and click Format. The tool parses your JSON and outputs it with proper indentation and line breaks making it human-readable. You can choose between 2 spaces, 4 spaces, or tab indentation."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between prettify and minify?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Prettify adds indentation and line breaks making JSON readable by humans. Minify removes all unnecessary whitespace producing the most compact version for production use where file size matters. Use prettify for development and debugging, minify for APIs and production deployments."
      }
    },
    {
      "@type": "Question",
      "name": "Why is my JSON invalid?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Common JSON errors include trailing commas after the last item in an array or object, single quotes instead of double quotes for strings, missing quotes around property names, unescaped backslashes or special characters in strings, and missing or extra curly braces or square brackets."
      }
    },
    {
      "@type": "Question",
      "name": "Can I validate JSON without formatting it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The tool validates your JSON automatically as you type and shows any errors in the status bar. The error message includes the exact position of the first syntax error to help you locate and fix the problem."
      }
    },
    {
      "@type": "Question",
      "name": "What is JSON?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "JSON stands for JavaScript Object Notation. It is a lightweight text format for storing and transmitting structured data. JSON is the standard data format for APIs and web services and is supported natively by all modern programming languages."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Format and Validate JSON Online',
  'description' => 'Format, prettify, minify and validate JSON using TextlyPop JSON formatter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Paste your JSON','text'=>'Paste your raw or minified JSON into the input panel on the left. The validator checks it instantly as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Click Format','text'=>'Click the Format button to prettify your JSON with proper indentation. Choose 2 spaces, 4 spaces, or tabs from the indent selector.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Check the result','text'=>'The formatted JSON appears in the output panel with color-coded syntax highlighting. The status bar confirms valid JSON or shows the exact error location.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy or minify','text'=>'Click Copy to copy the formatted JSON. Click Minify to compress it for production use.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'JSON Formatter','item'=>'https://textlypop.com/tools/json-formatter'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page tool-page-wide">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>JSON formatter</h1>
    <p>Format, validate and minify JSON instantly. Paste raw JSON and get it prettified with one click.</p>
  </div>

  <div class="jf-tool" id="jf-tool">

    <!-- Toolbar -->
    <div class="jf-toolbar">
      <div class="jf-action-btns">
        <button class="btn btn-primary" id="jf-format-btn">
          <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
            <line x1="2" y1="4" x2="14" y2="4"/>
            <line x1="4" y1="8" x2="14" y2="8"/>
            <line x1="6" y1="12" x2="14" y2="12"/>
          </svg>
          Format / Prettify
        </button>
        <button class="btn btn-ghost" id="jf-minify-btn">
          <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
            <polyline points="4,6 2,8 4,10"/>
            <polyline points="12,6 14,8 12,10"/>
            <line x1="6" y1="8" x2="10" y2="8"/>
          </svg>
          Minify
        </button>
        <button class="btn btn-ghost" id="jf-clear-btn">Clear</button>
      </div>

      <div class="jf-indent-group">
        <span class="jf-indent-label">Indent:</span>
        <div class="jf-indent-btns" role="group" aria-label="Indentation style">
          <button class="jf-indent-btn active" data-indent="2" aria-pressed="true">2 spaces</button>
          <button class="jf-indent-btn" data-indent="4" aria-pressed="false">4 spaces</button>
          <button class="jf-indent-btn" data-indent="tab" aria-pressed="false">Tab</button>
        </div>
      </div>
    </div>

    <!-- Status bar -->
    <div class="jf-status" id="jf-status" role="status" aria-live="polite">
      <span class="jf-status-dot" id="jf-status-dot"></span>
      <span class="jf-status-text" id="jf-status-text">Paste JSON and click Format</span>
      <span class="jf-status-meta" id="jf-status-meta"></span>
    </div>

    <!-- Panels -->
    <div class="jf-panels">

      <div class="jf-panel">
        <div class="jf-panel-header">
          <span class="jf-panel-label">Input</span>
          <span class="jf-size" id="jf-input-size">0 bytes</span>
        </div>
        <textarea
          id="jf-input"
          class="jf-textarea jf-mono"
          placeholder='{"name": "TextlyPop", "type": "text tools", "free": true}'
          aria-label="JSON input"
          data-save-key="json-formatter"
          spellcheck="false"
          autocomplete="off"
          autocorrect="off"
          autocapitalize="off"></textarea>
      </div>

      <div class="jf-panel">
        <div class="jf-panel-header">
          <span class="jf-panel-label">Output</span>
          <div class="jf-panel-actions">
            <span class="jf-size" id="jf-output-size">0 bytes</span>
            <button class="btn btn-copy" data-target="jf-output">Copy</button>
          </div>
        </div>
        <textarea
          id="jf-output"
          class="jf-textarea jf-mono jf-output-area"
          readonly
          placeholder="Formatted JSON will appear here…"
          aria-label="Formatted JSON output"
          aria-live="polite"
          spellcheck="false"></textarea>
      </div>

    </div>

    <!-- Stats bar -->
    <div class="jf-stats" id="jf-stats" aria-live="polite">
      <span class="jf-stat" id="jf-stat-keys">— keys</span>
      <span class="jf-stat-sep">·</span>
      <span class="jf-stat" id="jf-stat-values">— values</span>
      <span class="jf-stat-sep">·</span>
      <span class="jf-stat" id="jf-stat-depth">— depth</span>
      <span class="jf-stat-sep">·</span>
      <span class="jf-stat" id="jf-stat-arrays">— arrays</span>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="jf-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="jf-output" data-to-tool="word-counter">Word counter</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">Enter</kbd> format &nbsp;|&nbsp;
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">Shift</kbd> + <kbd class="kbd">M</kbd> minify &nbsp;|&nbsp;
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">L</kbd> clear
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

    <h2>How to format JSON online</h2>
    <p>Paste your raw or minified JSON into the input panel and click Format / Prettify. The tool parses your JSON and outputs it with proper indentation, line breaks, and consistent spacing — making it immediately readable and easy to navigate. Choose between 2-space indentation (the most common standard), 4-space indentation (preferred in many style guides), or tab indentation depending on your project conventions.</p>

    <h2>Live JSON validation</h2>
    <p>The status bar validates your JSON automatically as you type, with no button press required. A green dot and checkmark indicates valid JSON. A red dot shows invalid JSON with the exact error message from the browser's JSON parser — including the position of the first syntax error. This lets you identify and fix problems before formatting. Common errors include trailing commas after the last item, single quotes instead of double quotes, unquoted property names, and unescaped backslashes in strings.</p>

    <h2>Minifying JSON for production</h2>
    <p>Click Minify to remove all whitespace from your JSON and produce the most compact possible output. The stats bar shows the size reduction. Minified JSON transmits faster over networks, uses less bandwidth for APIs, and reduces payload size for applications. For large JSON objects the size reduction from removing whitespace can be significant — a 100KB prettified file might minify to 60KB. Always keep a prettified version for development and use minified JSON for production API responses.</p>

    <h2>Understanding the JSON stats</h2>
    <p>The stats bar below the panels shows four metrics about your JSON structure. Keys shows the total number of property names across all objects. Values shows the total number of values including strings, numbers, booleans, nulls, arrays, and objects. Depth shows how many levels of nesting your JSON has — deeply nested JSON (depth 6+) can be a sign of overly complex data structures. Arrays shows how many array elements are present across all arrays in the document.</p>

    <h2>Common JSON errors and fixes</h2>
    <p>Trailing commas are the most common error — JSON does not allow a comma after the last item in an array or object. JavaScript allows this but JSON does not. Single quotes are invalid in JSON — all strings including property names must use double quotes. Undefined and NaN are not valid JSON values — use null instead. Comments are not supported in JSON — remove any // or /* */ style comments before parsing. Property names must always be quoted strings — {name: "value"} is invalid, {"name": "value"} is correct.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I format JSON online?</p>
      <p class="faq-a">Paste your JSON into the input panel and click Format. Choose your indentation style and the formatted result appears instantly in the output panel.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between prettify and minify?</p>
      <p class="faq-a">Prettify adds indentation and line breaks for human readability. Minify removes all whitespace for the smallest possible file size. Use prettify for development, minify for production.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why is my JSON invalid?</p>
      <p class="faq-a">Common causes: trailing commas, single quotes instead of double quotes, unquoted property names, unescaped backslashes, or missing/extra braces and brackets. The error message shows the exact position of the first problem.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I validate JSON without formatting it?</p>
      <p class="faq-a">Yes. The tool validates automatically as you type and shows errors in the status bar without you needing to click anything.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is JSON?</p>
      <p class="faq-a">JSON stands for JavaScript Object Notation. It is a lightweight text format for storing and transmitting structured data, and is the standard format for APIs and web services.</p>
    </div>

  </div>

</div>

<!-- JSON formatter CSS -->
<style>
.tool-page-wide { max-width: 1100px; }

.jf-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Toolbar */
.jf-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  gap: 12px;
  flex-wrap: wrap;
}

.jf-action-btns { display: flex; gap: 8px; flex-wrap: wrap; }

.jf-indent-group { display: flex; align-items: center; gap: 8px; }

.jf-indent-label {
  font-size: 0.8125rem;
  color: var(--text-3);
  white-space: nowrap;
}

.jf-indent-btns { display: flex; gap: 4px; }

.jf-indent-btn {
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

.jf-indent-btn:hover { border-color: var(--accent); color: var(--accent); }
.jf-indent-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }

/* Status bar */
.jf-status {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 16px;
  border-bottom: 1px solid var(--border);
  font-size: 0.875rem;
  background: var(--bg-2);
  min-height: 42px;
  transition: background var(--transition);
}

.jf-status.valid { background: var(--accent-light); }
.jf-status.error { background: rgba(229,62,62,0.07); }
[data-theme="dark"] .jf-status.valid { background: var(--accent-dim); }
[data-theme="dark"] .jf-status.error { background: rgba(229,62,62,0.12); }

.jf-status-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--text-3);
  flex-shrink: 0;
  transition: background var(--transition);
}

.jf-status.valid .jf-status-dot { background: var(--accent); }
.jf-status.error .jf-status-dot { background: var(--danger); }

.jf-status-text {
  color: var(--text-2);
  flex: 1;
}

.jf-status.valid .jf-status-text { color: var(--accent-dark); font-weight: 500; }
[data-theme="dark"] .jf-status.valid .jf-status-text { color: #5DCAA5; }
.jf-status.error .jf-status-text { color: var(--danger); font-weight: 500; }

.jf-status-meta {
  font-size: 0.75rem;
  color: var(--text-3);
  white-space: nowrap;
}

/* Panels */
.jf-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 360px;
  border-bottom: 1px solid var(--border);
}

.jf-panel { display: flex; flex-direction: column; }
.jf-panel:first-child { border-right: 1px solid var(--border); }

.jf-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.jf-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.jf-panel-actions { display: flex; align-items: center; gap: 10px; }

.jf-size {
  font-size: 0.75rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
}

.jf-textarea {
  flex: 1;
  width: 100%;
  min-height: 340px;
  padding: 14px;
  border: none;
  background: transparent;
  font-size: 0.875rem;
  color: var(--text);
  line-height: 1.65;
  resize: vertical;
  outline: none;
  tab-size: 2;
}

.jf-mono { font-family: var(--font-mono); }
.jf-textarea::placeholder { color: var(--text-3); font-family: var(--font); }

.jf-output-area {
  color: var(--accent-dark);
  background: var(--accent-light);
  cursor: default;
}

[data-theme="dark"] .jf-output-area {
  color: #5DCAA5;
  background: var(--accent-dim);
}

/* Stats bar */
.jf-stats {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 9px 16px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.8125rem;
  flex-wrap: wrap;
}

.jf-stat { color: var(--text-2); }
.jf-stat-sep { color: var(--border-2); }

@media (max-width: 768px) {
  .jf-panels { grid-template-columns: 1fr; }
  .jf-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .jf-textarea { min-height: 220px; }
}
</style>

<!-- JSON formatter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input     = document.getElementById('jf-input');
  var output    = document.getElementById('jf-output');
  var formatBtn = document.getElementById('jf-format-btn');
  var minifyBtn = document.getElementById('jf-minify-btn');
  var clearBtn  = document.getElementById('jf-clear-btn');

  var statusEl  = document.getElementById('jf-status');
  var statusDot = document.getElementById('jf-status-dot');
  var statusTxt = document.getElementById('jf-status-text');
  var statusMeta= document.getElementById('jf-status-meta');

  var inputSize = document.getElementById('jf-input-size');
  var outputSize= document.getElementById('jf-output-size');

  var statKeys  = document.getElementById('jf-stat-keys');
  var statVals  = document.getElementById('jf-stat-values');
  var statDepth = document.getElementById('jf-stat-depth');
  var statArrays= document.getElementById('jf-stat-arrays');

  var currentIndent = 2;

  /* ── Bytes formatter ── */
  function fmtBytes(str) {
    if (!str) return '0 bytes';
    var b = new Blob([str]).size;
    if (b < 1024) return b + ' bytes';
    if (b < 1024 * 1024) return (b / 1024).toFixed(1) + ' KB';
    return (b / (1024 * 1024)).toFixed(2) + ' MB';
  }

  /* ── Analyze JSON structure ── */
  function analyzeJSON(obj, depth) {
    depth = depth || 0;
    var stats = { keys: 0, values: 0, maxDepth: depth, arrays: 0 };

    if (Array.isArray(obj)) {
      stats.arrays = obj.length;
      obj.forEach(function(item) {
        var sub = analyzeJSON(item, depth + 1);
        stats.values += sub.values || 1;
        stats.maxDepth = Math.max(stats.maxDepth, sub.maxDepth);
        stats.arrays  += sub.arrays;
      });
    } else if (obj !== null && typeof obj === 'object') {
      Object.keys(obj).forEach(function(key) {
        stats.keys++;
        var val = obj[key];
        if (val !== null && typeof val === 'object') {
          var sub = analyzeJSON(val, depth + 1);
          stats.keys    += sub.keys;
          stats.values  += sub.values;
          stats.maxDepth = Math.max(stats.maxDepth, sub.maxDepth);
          stats.arrays  += sub.arrays;
        } else {
          stats.values++;
        }
      });
    } else {
      stats.values = 1;
    }

    return stats;
  }

  /* ── Validate on input ── */
  function validate(raw) {
    if (!raw.trim()) {
      setStatus('', 'Paste JSON and click Format', '');
      clearStats();
      return null;
    }

    try {
      var parsed = JSON.parse(raw);
      var stats  = analyzeJSON(parsed);
      setStatus('valid', '✓ Valid JSON', fmtBytes(raw));
      updateStats(stats);
      return parsed;
    } catch(e) {
      setStatus('error', '✗ ' + e.message, '');
      clearStats();
      return null;
    }
  }

  function setStatus(type, text, meta) {
    statusEl.className = 'jf-status ' + (type || '');
    statusTxt.textContent = text;
    statusMeta.textContent = meta || '';
  }

  function updateStats(s) {
    statKeys.textContent   = s.keys.toLocaleString() + ' key' + (s.keys !== 1 ? 's' : '');
    statVals.textContent   = s.values.toLocaleString() + ' value' + (s.values !== 1 ? 's' : '');
    statDepth.textContent  = 'depth ' + s.maxDepth;
    statArrays.textContent = s.arrays.toLocaleString() + ' array item' + (s.arrays !== 1 ? 's' : '');
  }

  function clearStats() {
    statKeys.textContent = statVals.textContent = statDepth.textContent = statArrays.textContent = '—';
  }

  /* ── Format ── */
  function format() {
    var raw    = input.value.trim();
    var parsed = validate(raw);
    if (!parsed && raw) return;

    inputSize.textContent = fmtBytes(raw);

    if (!raw) { output.value = ''; outputSize.textContent = '0 bytes'; return; }
    if (!parsed) { output.value = ''; outputSize.textContent = '0 bytes'; return; }

    var indent = currentIndent === 'tab' ? '\t' : currentIndent;
    var pretty = JSON.stringify(parsed, null, indent);
    output.value = pretty;
    outputSize.textContent = fmtBytes(pretty);

    var stats = analyzeJSON(parsed);
    setStatus('valid',
      '✓ Valid JSON — formatted',
      fmtBytes(raw) + ' → ' + fmtBytes(pretty)
    );
    updateStats(stats);
  }

  /* ── Minify ── */
  function minify() {
    var raw    = input.value.trim();
    if (!raw) return;

    try {
      var parsed = JSON.parse(raw);
      var mini   = JSON.stringify(parsed);
      output.value = mini;
      inputSize.textContent  = fmtBytes(raw);
      outputSize.textContent = fmtBytes(mini);

      var saved = ((1 - mini.length / raw.length) * 100).toFixed(0);
      setStatus('valid',
        '✓ Minified — ' + saved + '% smaller',
        fmtBytes(raw) + ' → ' + fmtBytes(mini)
      );
    } catch(e) {
      setStatus('error', '✗ ' + e.message, '');
    }
  }

  /* ── Events ── */
  formatBtn.addEventListener('click', format);
  minifyBtn.addEventListener('click', minify);

  clearBtn.addEventListener('click', function() {
    input.value  = '';
    output.value = '';
    inputSize.textContent  = '0 bytes';
    outputSize.textContent = '0 bytes';
    setStatus('', 'Paste JSON and click Format', '');
    clearStats();
  });

  input.addEventListener('input', function() {
    inputSize.textContent = fmtBytes(input.value);
    validate(input.value);
  });

  /* Indent buttons */
  document.querySelectorAll('.jf-indent-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.jf-indent-btn').forEach(function(b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentIndent = btn.dataset.indent === 'tab' ? 'tab' : parseInt(btn.dataset.indent);
    });
  });

  /* Keyboard shortcuts */
  document.addEventListener('keydown', function(e) {
    if (e.ctrlKey || e.metaKey) {
      if (e.key === 'Enter') { e.preventDefault(); format(); }
      if (e.shiftKey && e.key === 'M') { e.preventDefault(); minify(); }
    }
  });

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
