<?php
$tool_slug   = 'url-encoder-decoder';
$tool_name   = 'URL Encoder / Decoder';

$page_title  = 'URL Encoder Decoder — Encode and Decode URLs Online Free | TextlyPop';
$meta_desc   = 'Encode and decode URLs instantly. Convert spaces and special characters to percent encoding and back. Free online URL encoder and decoder. No signup required.';
$canonical_url = 'https://textlypop.com/tools/url-encoder-decoder';
$og_title    = 'Free URL Encoder / Decoder — TextlyPop';
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
  "name": "URL Encoder / Decoder",
  "url": "https://textlypop.com/tools/url-encoder-decoder",
  "description": "Encode and decode URLs instantly. Convert spaces and special characters to percent encoding and back.",
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
      "name": "What is URL encoding?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "URL encoding converts characters that are not allowed in URLs into a percent-encoded format. A space becomes %20, an ampersand becomes %26, and so on. This ensures URLs are valid and can be transmitted correctly over the internet."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between encodeURI and encodeURIComponent?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "encodeURI encodes a complete URL and preserves characters that have special meaning in URL structure like slashes, question marks, and hash signs. encodeURIComponent encodes a URL component like a query parameter value and encodes those structural characters too. Use encodeURIComponent when encoding individual parameter values."
      }
    },
    {
      "@type": "Question",
      "name": "Why does a space become %20 in a URL?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Spaces are not valid characters in URLs. The percent encoding %20 represents the space character using its ASCII code (32) in hexadecimal (20). Some systems also use a plus sign + to represent spaces in query strings, which is why you sometimes see both formats."
      }
    },
    {
      "@type": "Question",
      "name": "When should I use URL encoding?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Use URL encoding when building URLs that contain user input, special characters, or non-ASCII characters. Common cases include search query parameters, form submissions, API request parameters, and any URL that contains characters outside the safe set of letters, numbers, hyphens, underscores, periods, and tildes."
      }
    },
    {
      "@type": "Question",
      "name": "What characters do not need to be URL encoded?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The unreserved characters in URLs that never need encoding are letters A-Z and a-z, digits 0-9, and the four special characters hyphen, underscore, period, and tilde. All other characters should be percent-encoded when used in URL components."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Encode and Decode URLs Online',
  'description' => 'Convert URLs and query parameters to percent encoding and back using TextlyPop URL encoder decoder.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Select encode or decode','text'=>'Click Encode to convert special characters to percent encoding, or Decode to convert percent-encoded URLs back to readable text.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Choose encoding mode','text'=>'Select Full URL mode to preserve URL structure characters like slashes and question marks, or Component mode to encode everything including structural characters.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Paste your URL or text','text'=>'Paste your URL or text into the input box. The conversion happens instantly as you type.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy the result','text'=>'Click Copy to copy the encoded or decoded URL to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'URL Encoder / Decoder','item'=>'https://textlypop.com/tools/url-encoder-decoder'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>URL encoder / decoder</h1>
    <p>Encode URLs and query parameters to percent encoding or decode them back to readable text. Instant results.</p>
  </div>

  <div class="ue-tool" id="ue-tool">

    <!-- Mode + options -->
    <div class="ue-controls">
      <div class="ue-mode-group" role="group" aria-label="Conversion mode">
        <button class="ue-mode-btn active" data-mode="encode" aria-pressed="true">
          <span class="ue-mode-icon">A → %</span>
          <span class="ue-mode-name">Encode</span>
        </button>
        <button class="ue-mode-btn" data-mode="decode" aria-pressed="false">
          <span class="ue-mode-icon">% → A</span>
          <span class="ue-mode-name">Decode</span>
        </button>
      </div>

      <div class="ue-encode-opts" id="ue-encode-opts">
        <div class="ue-enc-type-group" role="group" aria-label="Encoding type">
          <button class="ue-enc-btn active" data-enc="uri" aria-pressed="true">
            <strong>Full URL</strong>
            <span>Preserves / ? # & =</span>
          </button>
          <button class="ue-enc-btn" data-enc="component" aria-pressed="false">
            <strong>Component</strong>
            <span>Encodes everything</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Panels -->
    <div class="ue-panels">
      <div class="ue-panel">
        <div class="ue-panel-header">
          <span class="ue-panel-label" id="ue-input-label">URL / text input</span>
          <button class="btn btn-clear" data-targets="ue-input,ue-output">Clear</button>
        </div>
        <textarea
          id="ue-input"
          class="ue-textarea ue-mono"
          placeholder="https://example.com/search?q=hello world&lang=en"
          aria-label="URL or text to encode or decode"
          data-save-key="url-encoder-decoder"
          spellcheck="false"></textarea>
        <div class="ue-panel-footer">
          <span id="ue-input-count">0 characters</span>
        </div>
      </div>

      <div class="ue-panel">
        <div class="ue-panel-header">
          <span class="ue-panel-label" id="ue-output-label">Encoded output</span>
          <button class="btn btn-copy" data-target="ue-output">Copy</button>
        </div>
        <textarea
          id="ue-output"
          class="ue-textarea ue-mono ue-output-area"
          readonly
          placeholder="Encoded URL will appear here…"
          aria-label="Encoded or decoded URL"
          aria-live="polite"></textarea>
        <div class="ue-panel-footer">
          <span id="ue-output-info" class="ue-output-info"></span>
        </div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="ue-toolbar">
      <button class="btn btn-ghost" id="ue-swap-btn">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Swap
      </button>
      <button class="btn btn-copy" data-target="ue-output">Copy result</button>
    </div>

    <!-- Quick reference -->
    <div class="ue-reference">
      <div class="ue-ref-header">
        <span class="ue-ref-title">Common percent-encoded characters</span>
        <button class="ue-ref-toggle" id="ue-ref-toggle">Show</button>
      </div>
      <div class="ue-ref-table-wrap hidden" id="ue-ref-table-wrap">
        <table class="ue-ref-table">
          <thead>
            <tr><th>Character</th><th>Encoded</th><th>Description</th></tr>
          </thead>
          <tbody>
            <tr><td>Space</td><td>%20</td><td>Space character</td></tr>
            <tr><td>!</td><td>%21</td><td>Exclamation mark</td></tr>
            <tr><td>"</td><td>%22</td><td>Double quote</td></tr>
            <tr><td>#</td><td>%23</td><td>Hash / number sign</td></tr>
            <tr><td>$</td><td>%24</td><td>Dollar sign</td></tr>
            <tr><td>%</td><td>%25</td><td>Percent sign</td></tr>
            <tr><td>&amp;</td><td>%26</td><td>Ampersand</td></tr>
            <tr><td>'</td><td>%27</td><td>Single quote / apostrophe</td></tr>
            <tr><td>(</td><td>%28</td><td>Left parenthesis</td></tr>
            <tr><td>)</td><td>%29</td><td>Right parenthesis</td></tr>
            <tr><td>+</td><td>%2B</td><td>Plus sign</td></tr>
            <tr><td>,</td><td>%2C</td><td>Comma</td></tr>
            <tr><td>/</td><td>%2F</td><td>Forward slash (preserved in Full URL mode)</td></tr>
            <tr><td>:</td><td>%3A</td><td>Colon (preserved in Full URL mode)</td></tr>
            <tr><td>;</td><td>%3B</td><td>Semicolon</td></tr>
            <tr><td>=</td><td>%3D</td><td>Equals sign (preserved in Full URL mode)</td></tr>
            <tr><td>?</td><td>%3F</td><td>Question mark (preserved in Full URL mode)</td></tr>
            <tr><td>@</td><td>%40</td><td>At sign (preserved in Full URL mode)</td></tr>
            <tr><td>[</td><td>%5B</td><td>Left square bracket</td></tr>
            <tr><td>]</td><td>%5D</td><td>Right square bracket</td></tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="ue-output" data-to-tool="html-encoder-decoder">HTML encoder</button>
    <button class="send-to-btn" data-from="ue-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="ue-output" data-to-tool="word-counter">Word counter</button>
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

    <h2>What is URL encoding and why is it needed</h2>
    <p>URLs can only contain a limited set of characters from the ASCII character set. Letters, numbers, hyphens, underscores, periods, and tildes are safe. Everything else must be percent-encoded — replaced with a percent sign followed by two hexadecimal digits representing the character's ASCII code. A space becomes %20, an ampersand becomes %26, and a forward slash in a query parameter becomes %2F. Without this encoding, URLs containing special characters would be malformed and browsers or servers might misinterpret them.</p>

    <h2>Full URL mode vs Component mode</h2>
    <p>Full URL mode — equivalent to JavaScript's encodeURI — encodes a complete URL while preserving characters that have structural meaning in URL syntax. Slashes, question marks, hash signs, ampersands, and equals signs are left unencoded because they are needed to structure the URL itself. Use this when encoding an entire URL that already has its structure in place.</p>
    <p>Component mode — equivalent to JavaScript's encodeURIComponent — encodes everything including structural characters. A forward slash becomes %2F, a question mark becomes %3F, and so on. Use this when encoding individual URL components like query parameter values, where the structural characters in the value must be encoded so they are not confused with URL delimiters. This is the most commonly needed mode for developers building API requests and form submissions.</p>

    <h2>Common URL encoding use cases</h2>
    <p>Search query parameters containing spaces and special characters must be URL encoded before being appended to a URL. A search for "café au lait" in a query string becomes caf%C3%A9%20au%20lait. Form data submitted via GET requests is URL-encoded automatically by the browser but developers working with APIs often need to encode values manually. Authentication tokens, redirect URLs passed as parameters, and file paths with spaces all require URL encoding.</p>

    <h2>Decoding URL-encoded strings</h2>
    <p>URL decoding converts percent-encoded sequences back to their original characters. Switch to Decode mode and paste any URL-encoded string. Both %20 space encoding and + space encoding (used in HTML form data) are handled correctly. This is useful when reading encoded URLs from server logs, debugging API requests, or when you receive encoded data and need to read its original content.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is URL encoding?</p>
      <p class="faq-a">URL encoding converts characters that are not allowed in URLs into a percent-encoded format. A space becomes %20, an ampersand becomes %26. This ensures URLs are valid and transmit correctly.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between encodeURI and encodeURIComponent?</p>
      <p class="faq-a">encodeURI encodes a complete URL and preserves structural characters like slashes and question marks. encodeURIComponent encodes a URL component and encodes those structural characters too. Use encodeURIComponent for individual parameter values.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does a space become %20 in a URL?</p>
      <p class="faq-a">Spaces are not valid in URLs. %20 represents the space character using its ASCII code 32 in hexadecimal. Some query strings use + for spaces instead, which is why you see both formats.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">When should I use URL encoding?</p>
      <p class="faq-a">When building URLs that contain user input, special characters, or non-ASCII characters. Common cases include search parameters, API requests, form submissions, and any URL with characters outside letters, numbers, hyphens, underscores, periods, and tildes.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What characters do not need to be URL encoded?</p>
      <p class="faq-a">The unreserved characters that never need encoding are letters A-Z and a-z, digits 0-9, and the four characters hyphen, underscore, period, and tilde. All others should be percent-encoded in URL components.</p>
    </div>

  </div>

</div>

<!-- URL encoder CSS -->
<style>
.ue-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.ue-controls {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.ue-mode-group { display: flex; gap: 8px; flex-shrink: 0; }

.ue-mode-btn {
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

.ue-mode-btn:hover { border-color: var(--accent); }
.ue-mode-btn.active { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .ue-mode-btn.active { background: var(--accent-dim); }

.ue-mode-icon {
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--accent);
}

.ue-mode-name { font-size: 0.875rem; font-weight: 500; color: var(--text); }

/* Encoding type buttons */
.ue-encode-opts { display: flex; align-items: center; gap: 8px; flex: 1; }

.ue-enc-type-group { display: flex; gap: 6px; }

.ue-enc-btn {
  display: flex;
  flex-direction: column;
  gap: 2px;
  padding: 8px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  text-align: left;
  transition: border-color var(--transition), background var(--transition);
  min-width: 130px;
}

.ue-enc-btn strong { font-size: 0.875rem; font-weight: 600; color: var(--text); display: block; }
.ue-enc-btn span   { font-size: 0.7rem; color: var(--text-3); font-family: var(--font-mono); }
.ue-enc-btn:hover  { border-color: var(--accent); }
.ue-enc-btn.active { border-color: var(--accent); background: var(--accent-light); }
.ue-enc-btn.active strong { color: var(--accent-dark); }
[data-theme="dark"] .ue-enc-btn.active { background: var(--accent-dim); }
[data-theme="dark"] .ue-enc-btn.active strong { color: #5DCAA5; }

/* Panels */
.ue-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 220px;
  border-bottom: 1px solid var(--border);
}

.ue-panel { display: flex; flex-direction: column; }
.ue-panel:first-child { border-right: 1px solid var(--border); }

.ue-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.ue-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.ue-textarea {
  flex: 1;
  width: 100%;
  min-height: 200px;
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

.ue-mono { font-family: var(--font-mono); font-size: 0.875rem; word-break: break-all; }
.ue-textarea::placeholder { color: var(--text-3); font-family: var(--font); word-break: normal; }
.ue-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .ue-output-area { color: #5DCAA5; background: var(--accent-dim); }

.ue-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.ue-output-info.success { color: var(--accent); font-weight: 500; }
.ue-output-info.error   { color: var(--danger); font-weight: 500; }

/* Toolbar */
.ue-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  border-top: 1px solid var(--border);
}

/* Reference */
.ue-reference { border-top: 1px solid var(--border); background: var(--bg-2); }

.ue-ref-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
}

.ue-ref-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.ue-ref-toggle {
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

.ue-ref-toggle:hover { color: var(--accent); border-color: var(--accent); }

.ue-ref-table-wrap {
  overflow-x: auto;
  max-height: 320px;
  overflow-y: auto;
  border-top: 1px solid var(--border);
}

.ue-ref-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.8125rem;
}

.ue-ref-table th {
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

.ue-ref-table td {
  padding: 7px 14px;
  border-bottom: 1px solid var(--border);
  color: var(--text);
}

.ue-ref-table td:nth-child(2) { font-family: var(--font-mono); font-weight: 600; color: var(--accent); }
.ue-ref-table tr:last-child td { border-bottom: none; }
.ue-ref-table tr:hover td { background: var(--bg-3); }

@media (max-width: 640px) {
  .ue-panels { grid-template-columns: 1fr; }
  .ue-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .ue-controls { flex-direction: column; align-items: stretch; }
  .ue-enc-btn { min-width: auto; flex: 1; }
}
</style>

<!-- URL encoder JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('ue-input');
  var output     = document.getElementById('ue-output');
  var inputLabel = document.getElementById('ue-input-label');
  var outputLabel= document.getElementById('ue-output-label');
  var inputCount = document.getElementById('ue-input-count');
  var outputInfo = document.getElementById('ue-output-info');
  var swapBtn    = document.getElementById('ue-swap-btn');
  var encodeOpts = document.getElementById('ue-encode-opts');
  var refToggle  = document.getElementById('ue-ref-toggle');
  var refWrap    = document.getElementById('ue-ref-table-wrap');

  var currentMode = 'encode';
  var currentEnc  = 'uri';

  function encode(text) {
    try {
      var result = currentEnc === 'uri'
        ? encodeURI(text)
        : encodeURIComponent(text);
      var changed = result !== text;
      return { result: result, error: null, changed: changed };
    } catch(e) {
      return { result: '', error: e.message, changed: false };
    }
  }

  function decode(text) {
    try {
      /* Handle both %20 and + space encoding */
      var result = decodeURIComponent(text.replace(/\+/g, ' '));
      return { result: result, error: null };
    } catch(e) {
      /* Try partial decode */
      try {
        var partial = text.replace(/%[0-9A-Fa-f]{2}/g, function(match) {
          try { return decodeURIComponent(match); } catch(e) { return match; }
        });
        return { result: partial, error: 'Some sequences could not be decoded' };
      } catch(e2) {
        return { result: '', error: e.message };
      }
    }
  }

  function process() {
    var text = input.value;
    inputCount.textContent = text.length.toLocaleString() + ' character' + (text.length !== 1 ? 's' : '');
    outputInfo.className = 'ue-output-info';

    if (!text) {
      output.value = '';
      outputInfo.textContent = '';
      return;
    }

    if (currentMode === 'encode') {
      var res = encode(text);
      if (res.error) {
        outputInfo.textContent = 'Error: ' + res.error;
        outputInfo.className = 'ue-output-info error';
        output.value = '';
      } else {
        output.value = res.result;
        var diff = res.result.length - text.length;
        outputInfo.textContent = res.changed
          ? diff + ' characters added (' + res.result.length + ' total)'
          : 'No encoding needed — all characters are URL-safe';
        outputInfo.className = 'ue-output-info success';
      }
    } else {
      var res = decode(text);
      if (res.error && !res.result) {
        outputInfo.textContent = 'Error: ' + res.error;
        outputInfo.className = 'ue-output-info error';
        output.value = '';
      } else {
        output.value = res.result;
        var decoded = text.length - res.result.length;
        outputInfo.textContent = res.error
          ? res.error
          : res.result.length + ' characters decoded';
        outputInfo.className = res.error ? 'ue-output-info error' : 'ue-output-info success';
      }
    }
  }

  function setMode(mode) {
    currentMode = mode;
    document.querySelectorAll('.ue-mode-btn').forEach(function(btn) {
      var active = btn.dataset.mode === mode;
      btn.classList.toggle('active', active);
      btn.setAttribute('aria-pressed', active ? 'true' : 'false');
    });

    if (mode === 'encode') {
      inputLabel.textContent  = 'URL / text input';
      outputLabel.textContent = 'Encoded output';
      input.placeholder       = 'https://example.com/search?q=hello world&lang=en';
      output.placeholder      = 'Encoded URL will appear here…';
      encodeOpts.style.display = '';
    } else {
      inputLabel.textContent  = 'Encoded URL input';
      outputLabel.textContent = 'Decoded output';
      input.placeholder       = 'https://example.com/search?q=hello%20world&lang=en';
      output.placeholder      = 'Decoded URL will appear here…';
      encodeOpts.style.display = 'none';
    }

    input.value  = '';
    output.value = '';
    outputInfo.textContent = '';
    inputCount.textContent = '0 characters';
  }

  /* Mode buttons */
  document.querySelectorAll('.ue-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() { setMode(btn.dataset.mode); });
  });

  /* Encoding type buttons */
  document.querySelectorAll('.ue-enc-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.ue-enc-btn').forEach(function(b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentEnc = btn.dataset.enc;
      process();
    });
  });

  input.addEventListener('input', process);

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

  setMode('encode');

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
