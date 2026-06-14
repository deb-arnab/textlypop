<?php
$tool_slug   = 'html-encoder-decoder';
$tool_name   = 'HTML Encoder / Decoder';

$page_title  = 'HTML Encoder Decoder — Encode HTML Entities Online Free | TextlyPop';
$meta_desc   = 'Encode special characters to HTML entities and decode HTML entities back to text. Free online HTML encoder and decoder. No signup required.';
$canonical_url = 'https://textlypop.com/tools/html-encoder-decoder';
$og_title    = 'Free HTML Encoder / Decoder — TextlyPop';
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
  "name": "HTML Encoder / Decoder",
  "url": "https://textlypop.com/tools/html-encoder-decoder",
  "description": "Encode special characters to HTML entities and decode HTML entities back to readable text.",
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
      "name": "What is HTML encoding?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "HTML encoding converts special characters into HTML entities so they display correctly in web browsers. For example the less-than sign < becomes &lt; and the ampersand & becomes &amp;. Without encoding these characters would be interpreted as HTML markup and cause display errors."
      }
    },
    {
      "@type": "Question",
      "name": "When do I need to encode HTML?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You need to encode HTML when displaying user-generated content, code snippets, or any text containing special characters inside a web page. Unencoded special characters can break your HTML structure or create security vulnerabilities like cross-site scripting (XSS)."
      }
    },
    {
      "@type": "Question",
      "name": "What is the HTML entity for an ampersand?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The HTML entity for an ampersand is &amp;. When you write &amp; in HTML the browser displays it as the & character. Similarly < is &lt;, > is &gt;, double quotes are &quot;, and single quotes are &#39;."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between HTML encoding and URL encoding?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "HTML encoding converts special characters to HTML entities for use inside HTML documents. URL encoding converts characters to percent-encoded format for use in URLs. They serve different purposes — use HTML encoding for web page content and URL encoding for web addresses."
      }
    },
    {
      "@type": "Question",
      "name": "Does this tool encode all special characters?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "By default TextlyPop encodes the five critical HTML characters — ampersand, less-than, greater-than, double quote, and single quote. Enable the Encode all non-ASCII option to also encode extended characters like accented letters, symbols, and emoji as numeric HTML entities."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Encode and Decode HTML Entities Online',
  'description' => 'Convert special characters to HTML entities and back using TextlyPop HTML encoder decoder.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Select encode or decode','text'=>'Click Encode to convert special characters to HTML entities, or Decode to convert HTML entities back to readable text.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Paste your text','text'=>'Paste your HTML or plain text into the input box on the left. The conversion happens instantly as you type.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Choose encoding options','text'=>'Select whether to encode only critical characters or all non-ASCII characters using the options provided.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy the result','text'=>'Click Copy to copy the encoded or decoded text to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'HTML Encoder / Decoder','item'=>'https://textlypop.com/tools/html-encoder-decoder'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>HTML encoder / decoder</h1>
    <p>Encode special characters to HTML entities or decode entities back to readable text. Instant results.</p>
  </div>

  <div class="he-tool" id="he-tool">

    <!-- Mode toggle + options -->
    <div class="he-controls">
      <div class="he-mode-group" role="group" aria-label="Conversion mode">
        <button class="he-mode-btn active" data-mode="encode" aria-pressed="true">
          <span class="he-mode-icon">&lt; → &amp;</span>
          <span class="he-mode-name">Encode</span>
        </button>
        <button class="he-mode-btn" data-mode="decode" aria-pressed="false">
          <span class="he-mode-icon">&amp; → &lt;</span>
          <span class="he-mode-name">Decode</span>
        </button>
      </div>

      <div class="he-options" id="he-encode-options" role="group" aria-label="Encoding options">
        <label class="he-option">
          <input type="checkbox" id="he-all-chars">
          <span class="he-option-text">
            <strong>Encode all non-ASCII</strong>
            <em>Include accented letters, symbols, emoji</em>
          </span>
        </label>
        <label class="he-option">
          <input type="checkbox" id="he-numeric" checked>
          <span class="he-option-text">
            <strong>Use named entities</strong>
            <em>&amp;amp; instead of &amp;#38;</em>
          </span>
        </label>
      </div>
    </div>

    <!-- Panels -->
    <div class="he-panels">
      <div class="he-panel">
        <div class="he-panel-header">
          <span class="he-panel-label" id="he-input-label">Text / HTML input</span>
          <button class="btn btn-clear" data-targets="he-input,he-output">Clear</button>
        </div>
        <textarea
          id="he-input"
          class="he-textarea"
          placeholder="Paste your text or HTML here…"
          aria-label="Text to encode or decode"
          data-save-key="html-encoder-decoder"
          spellcheck="false"></textarea>
        <div class="he-panel-footer">
          <span id="he-input-count">0 characters</span>
        </div>
      </div>

      <div class="he-panel">
        <div class="he-panel-header">
          <span class="he-panel-label" id="he-output-label">Encoded output</span>
          <button class="btn btn-copy" data-target="he-output">Copy</button>
        </div>
        <textarea
          id="he-output"
          class="he-textarea he-output-area"
          readonly
          placeholder="Result will appear here…"
          aria-label="Encoded or decoded output"
          aria-live="polite"></textarea>
        <div class="he-panel-footer">
          <span id="he-output-info" class="he-output-info"></span>
        </div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="he-toolbar">
      <button class="btn btn-ghost" id="he-swap-btn">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Swap
      </button>
      <button class="btn btn-copy" data-target="he-output">Copy result</button>
    </div>

    <!-- Quick reference -->
    <div class="he-reference">
      <div class="he-ref-header">
        <span class="he-ref-title">Common HTML entities reference</span>
        <button class="he-ref-toggle" id="he-ref-toggle">Show</button>
      </div>
      <div class="he-ref-table-wrap hidden" id="he-ref-table-wrap">
        <table class="he-ref-table">
          <thead>
            <tr><th>Character</th><th>Named entity</th><th>Numeric entity</th><th>Description</th></tr>
          </thead>
          <tbody>
            <tr><td>&amp;</td><td>&amp;amp;</td><td>&amp;#38;</td><td>Ampersand</td></tr>
            <tr><td>&lt;</td><td>&amp;lt;</td><td>&amp;#60;</td><td>Less-than sign</td></tr>
            <tr><td>&gt;</td><td>&amp;gt;</td><td>&amp;#62;</td><td>Greater-than sign</td></tr>
            <tr><td>&quot;</td><td>&amp;quot;</td><td>&amp;#34;</td><td>Double quotation mark</td></tr>
            <tr><td>&#39;</td><td>&amp;#39;</td><td>&amp;#39;</td><td>Single quotation mark</td></tr>
            <tr><td>&nbsp;</td><td>&amp;nbsp;</td><td>&amp;#160;</td><td>Non-breaking space</td></tr>
            <tr><td>&copy;</td><td>&amp;copy;</td><td>&amp;#169;</td><td>Copyright sign</td></tr>
            <tr><td>&reg;</td><td>&amp;reg;</td><td>&amp;#174;</td><td>Registered trademark</td></tr>
            <tr><td>&trade;</td><td>&amp;trade;</td><td>&amp;#8482;</td><td>Trademark symbol</td></tr>
            <tr><td>&euro;</td><td>&amp;euro;</td><td>&amp;#8364;</td><td>Euro sign</td></tr>
            <tr><td>&pound;</td><td>&amp;pound;</td><td>&amp;#163;</td><td>Pound sign</td></tr>
            <tr><td>&yen;</td><td>&amp;yen;</td><td>&amp;#165;</td><td>Yen sign</td></tr>
            <tr><td>&mdash;</td><td>&amp;mdash;</td><td>&amp;#8212;</td><td>Em dash</td></tr>
            <tr><td>&ndash;</td><td>&amp;ndash;</td><td>&amp;#8211;</td><td>En dash</td></tr>
            <tr><td>&hellip;</td><td>&amp;hellip;</td><td>&amp;#8230;</td><td>Ellipsis</td></tr>
            <tr><td>&laquo;</td><td>&amp;laquo;</td><td>&amp;#171;</td><td>Left double angle quote</td></tr>
            <tr><td>&raquo;</td><td>&amp;raquo;</td><td>&amp;#187;</td><td>Right double angle quote</td></tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="he-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="he-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="he-output" data-to-tool="url-encoder-decoder">URL encoder</button>
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

    <h2>What are HTML entities and why do they matter</h2>
    <p>HTML entities are special codes that represent characters which have meaning in HTML markup. The five most critical characters are the ampersand (&amp;), less-than sign (&lt;), greater-than sign (&gt;), double quote (&quot;), and single quote (&#39;). These characters are used to define HTML tags and attributes, so when you want to display them as literal text rather than HTML syntax you must encode them as entities. Without encoding, a less-than sign could be interpreted as the start of an HTML tag and break your page layout.</p>

    <h2>When to encode HTML</h2>
    <p>Encode HTML whenever you are inserting text into an HTML document that might contain special characters. The most common scenarios are displaying user-generated content such as comments or form submissions, showing code snippets on a page, inserting data from a database into HTML, and generating HTML programmatically. Failing to encode user input is one of the most common sources of cross-site scripting (XSS) vulnerabilities — a security flaw where malicious users inject scripts into your page through unencoded input.</p>

    <h2>Named entities vs numeric entities</h2>
    <p>HTML entities can be written in two formats. Named entities use a descriptive name — &amp;amp; for ampersand, &amp;lt; for less-than, &amp;copy; for the copyright symbol. Numeric entities use the Unicode code point — &amp;#38; for ampersand, &amp;#60; for less-than, &amp;#169; for copyright. Named entities are more readable but not all characters have named versions. Numeric entities work for any Unicode character. Both formats produce identical results in the browser.</p>

    <h2>Decoding HTML entities</h2>
    <p>HTML decoding converts entities back to their original characters. This is useful when you receive HTML-encoded text from an API or database and need to display or process the plain text version. Switch to Decode mode and paste your encoded HTML — all entities including both named entities like &amp;amp; and numeric entities like &amp;#38; are converted back to their characters.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is HTML encoding?</p>
      <p class="faq-a">HTML encoding converts special characters into HTML entities so they display correctly in browsers. The less-than sign becomes &amp;lt; and the ampersand becomes &amp;amp;. Without encoding these characters would be interpreted as HTML markup.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">When do I need to encode HTML?</p>
      <p class="faq-a">When displaying user-generated content, code snippets, or text containing special characters in a web page. Unencoded special characters can break HTML structure or create XSS security vulnerabilities.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the HTML entity for an ampersand?</p>
      <p class="faq-a">The HTML entity for an ampersand is &amp;amp;. Similarly &lt; is &amp;lt;, &gt; is &amp;gt;, double quotes are &amp;quot;, and single quotes are &amp;#39;.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between HTML encoding and URL encoding?</p>
      <p class="faq-a">HTML encoding converts characters to HTML entities for use inside HTML documents. URL encoding converts characters to percent-encoded format for use in URLs. Use HTML encoding for web page content and URL encoding for web addresses.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does this tool encode all special characters?</p>
      <p class="faq-a">By default it encodes the five critical HTML characters. Enable Encode all non-ASCII to also encode extended characters like accented letters, symbols, and emoji as numeric entities.</p>
    </div>

  </div>

</div>

<!-- HTML encoder CSS -->
<style>
.he-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.he-controls {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.he-mode-group { display: flex; gap: 8px; flex-shrink: 0; }

.he-mode-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 9px 16px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  transition: border-color var(--transition), background var(--transition);
}

.he-mode-btn:hover { border-color: var(--accent); }
.he-mode-btn.active { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .he-mode-btn.active { background: var(--accent-dim); }

.he-mode-icon {
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--accent);
}

.he-mode-name { font-size: 0.875rem; font-weight: 500; color: var(--text); }

.he-options { display: flex; gap: 8px; flex-wrap: wrap; flex: 1; }

.he-option {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 160px;
  transition: border-color var(--transition), background var(--transition);
}

.he-option:hover { border-color: var(--accent); }

.he-option input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.he-option:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .he-option:has(input:checked) { background: var(--accent-dim); }

.he-option-text { display: flex; flex-direction: column; gap: 1px; }
.he-option-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.he-option-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); }

/* Panels */
.he-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 220px;
  border-bottom: 1px solid var(--border);
}

.he-panel { display: flex; flex-direction: column; }
.he-panel:first-child { border-right: 1px solid var(--border); }

.he-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.he-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.he-textarea {
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

.he-textarea::placeholder { color: var(--text-3); font-family: var(--font); }
.he-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .he-output-area { color: #5DCAA5; background: var(--accent-dim); }

.he-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.he-output-info.success { color: var(--accent); font-weight: 500; }

/* Toolbar */
.he-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  border-top: 1px solid var(--border);
}

/* Reference table */
.he-reference { border-top: 1px solid var(--border); background: var(--bg-2); }

.he-ref-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
}

.he-ref-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.he-ref-toggle {
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

.he-ref-toggle:hover { color: var(--accent); border-color: var(--accent); }

.he-ref-table-wrap {
  overflow-x: auto;
  max-height: 320px;
  overflow-y: auto;
  border-top: 1px solid var(--border);
}

.he-ref-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.8125rem;
}

.he-ref-table th {
  padding: 8px 14px;
  text-align: left;
  font-size: 0.7rem;
  font-weight: 600;
  color: var(--text-3);
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
}

.he-ref-table td {
  padding: 7px 14px;
  border-bottom: 1px solid var(--border);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.8rem;
}

.he-ref-table td:first-child { font-size: 1rem; font-family: var(--font); }
.he-ref-table td:last-child { font-family: var(--font); color: var(--text-2); }
.he-ref-table tr:last-child td { border-bottom: none; }
.he-ref-table tr:hover td { background: var(--bg-3); }

@media (max-width: 640px) {
  .he-panels { grid-template-columns: 1fr; }
  .he-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .he-option { min-width: 100%; }
  .he-controls { flex-direction: column; align-items: stretch; }
}
</style>

<!-- HTML encoder JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('he-input');
  var output     = document.getElementById('he-output');
  var inputLabel = document.getElementById('he-input-label');
  var outputLabel= document.getElementById('he-output-label');
  var inputCount = document.getElementById('he-input-count');
  var outputInfo = document.getElementById('he-output-info');
  var swapBtn    = document.getElementById('he-swap-btn');
  var refToggle  = document.getElementById('he-ref-toggle');
  var refWrap    = document.getElementById('he-ref-table-wrap');
  var encodeOpts = document.getElementById('he-encode-options');

  var optAllChars = document.getElementById('he-all-chars');
  var optNamed    = document.getElementById('he-numeric');

  var currentMode = 'encode';

  /* Named entity map */
  var NAMED = {
    38: 'amp', 60: 'lt', 62: 'gt', 34: 'quot',
    160: 'nbsp', 169: 'copy', 174: 'reg', 8482: 'trade',
    8364: 'euro', 163: 'pound', 165: 'yen',
    8212: 'mdash', 8211: 'ndash', 8230: 'hellip',
    171: 'laquo', 187: 'raquo', 39: null
  };

  function encodeChar(code, useNamed) {
    if (useNamed && NAMED[code] !== undefined && NAMED[code] !== null) {
      return '&' + NAMED[code] + ';';
    }
    return '&#' + code + ';';
  }

  function encode(text) {
    var useNamed  = optNamed.checked;
    var allChars  = optAllChars.checked;
    var encoded   = 0;
    var result = '';

    for (var i = 0; i < text.length; i++) {
      var code = text.charCodeAt(i);
      var ch   = text[i];

      /* Always encode critical 5 */
      if (code === 38 || code === 60 || code === 62 || code === 34 || code === 39) {
        result += encodeChar(code, useNamed);
        encoded++;
      } else if (allChars && (code > 127)) {
        result += encodeChar(code, useNamed);
        encoded++;
      } else {
        result += ch;
      }
    }

    return { result: result, encoded: encoded };
  }

  function decode(text) {
    var decoded  = 0;
    /* Decode named entities */
    var result = text.replace(/&([a-zA-Z]+);/g, function(match, name) {
      var tmp = document.createElement('textarea');
      tmp.innerHTML = match;
      var val = tmp.value;
      if (val !== match) { decoded++; return val; }
      return match;
    });
    /* Decode numeric entities (decimal) */
    result = result.replace(/&#(\d+);/g, function(match, num) {
      decoded++;
      return String.fromCharCode(parseInt(num, 10));
    });
    /* Decode numeric entities (hex) */
    result = result.replace(/&#x([0-9a-fA-F]+);/g, function(match, hex) {
      decoded++;
      return String.fromCharCode(parseInt(hex, 16));
    });

    return { result: result, decoded: decoded };
  }

  function process() {
    var text = input.value;
    inputCount.textContent = text.length.toLocaleString() + ' character' + (text.length !== 1 ? 's' : '');
    outputInfo.className = 'he-output-info';

    if (!text) {
      output.value = '';
      outputInfo.textContent = '';
      return;
    }

    if (currentMode === 'encode') {
      var res = encode(text);
      output.value = res.result;
      outputInfo.textContent = res.encoded + ' character' + (res.encoded !== 1 ? 's' : '') + ' encoded';
      outputInfo.className = 'he-output-info success';
    } else {
      var res = decode(text);
      output.value = res.result;
      outputInfo.textContent = res.decoded + ' entit' + (res.decoded !== 1 ? 'ies' : 'y') + ' decoded';
      outputInfo.className = 'he-output-info success';
    }
  }

  function setMode(mode) {
    currentMode = mode;
    document.querySelectorAll('.he-mode-btn').forEach(function(btn) {
      var active = btn.dataset.mode === mode;
      btn.classList.toggle('active', active);
      btn.setAttribute('aria-pressed', active ? 'true' : 'false');
    });

    if (mode === 'encode') {
      inputLabel.textContent  = 'Text / HTML input';
      outputLabel.textContent = 'Encoded output';
      input.placeholder       = 'Paste your text or HTML here…';
      output.placeholder      = 'Encoded HTML entities will appear here…';
      encodeOpts.style.display = '';
    } else {
      inputLabel.textContent  = 'Encoded HTML input';
      outputLabel.textContent = 'Decoded text output';
      input.placeholder       = 'Paste HTML with entities here… e.g. &amp;lt;p&amp;gt;';
      output.placeholder      = 'Decoded text will appear here…';
      encodeOpts.style.display = 'none';
    }

    input.value  = '';
    output.value = '';
    outputInfo.textContent = '';
    inputCount.textContent = '0 characters';
  }

  /* Events */
  document.querySelectorAll('.he-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() { setMode(btn.dataset.mode); });
  });

  input.addEventListener('input', process);
  [optAllChars, optNamed].forEach(function(cb) { cb.addEventListener('change', process); });

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    var outVal  = output.value;
    var newMode = currentMode === 'encode' ? 'decode' : 'encode';
    setMode(newMode);
    input.value = outVal;
    process();
  });

  refToggle.addEventListener('click', function() {
    var hidden = refWrap.classList.toggle('hidden');
    refToggle.textContent = hidden ? 'Show' : 'Hide';
  });

  /* Init */
  setMode('encode');

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
