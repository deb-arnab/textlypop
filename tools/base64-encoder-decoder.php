<?php
$tool_slug   = 'base64-encoder-decoder';
$tool_name   = 'Base64 Encoder / Decoder';

$page_title  = 'Base64 Encoder & Decoder — Encode or Decode | TextlyPop';
$meta_desc   = 'Encode text to Base64 or decode Base64 back to text instantly. Supports UTF-8 and URL-safe Base64. Free online Base64 encoder and decoder. No signup required.';
$canonical_url = 'https://textlypop.com/tools/base64-encoder-decoder';
$og_title    = 'Free Base64 Encoder / Decoder — TextlyPop';
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
  "name": "Base64 Encoder / Decoder",
  "url": "https://textlypop.com/tools/base64-encoder-decoder",
  "description": "Encode text to Base64 or decode Base64 back to text instantly. Supports UTF-8 and URL-safe Base64.",
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
      "name": "Why is my Base64-encoded string about 33% longer than the original text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Base64 encodes every 3 bytes of input as 4 output characters, because each character can only represent 6 bits of data and 3 bytes is 24 bits — exactly four 6-bit groups. That 3-to-4 ratio is a fixed 33% size increase before padding is even considered. It is the unavoidable cost of representing arbitrary binary data using only 64 printable ASCII characters, which is why Base64 is used for compatibility rather than compression."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between standard Base64 and URL-safe Base64?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "They use almost the same 64-character alphabet but swap two symbols. Standard Base64 uses + and / for the values 62 and 63, which are both reserved characters inside URLs and file paths — a + can be read as a space and a / as a path separator. URL-safe Base64 replaces them with - and _, and the trailing = padding is usually stripped, so the result can be dropped directly into a URL, filename or cookie without further escaping. JSON Web Tokens (JWTs) and many web APIs use the URL-safe variant for exactly this reason."
      }
    },
    {
      "@type": "Question",
      "name": "Why do Base64 strings end with one or two equals signs?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The equals sign is padding, added when the input length is not a multiple of 3 bytes. One trailing byte produces two padding characters and two trailing bytes produce one, keeping the output length a multiple of 4 as the format requires. Padding carries no data — it only signals how many of the final 4 characters are meaningful — which is why URL-safe Base64 and some other implementations omit it entirely and calculate the original length from context instead."
      }
    },
    {
      "@type": "Question",
      "name": "Is Base64 encoding a form of encryption?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. Base64 is an encoding, not encryption — it has no secret key and anyone can decode it instantly using this tool or a single line of code in any language. It is sometimes mistaken for security because it turns readable text into unfamiliar-looking characters, but that is only a side effect of representing binary data as text. Passwords, tokens or personal data should never be considered protected just because they are Base64-encoded; use real encryption if confidentiality matters."
      }
    },
    {
      "@type": "Question",
      "name": "Why does decoding produce an error or garbled text instead of my original message?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The most common cause is pasting an incomplete string — a Base64 string cut off mid-copy loses the trailing padding and characters needed to reconstruct the original bytes. Mixing standard and URL-safe characters, stray whitespace inside the string, or accidentally including surrounding quotes from a JSON file can also break decoding. If the string decodes without error but the text looks garbled, the original bytes likely were not UTF-8 text at all — they may be an image, a compressed file or another binary format that this tool renders as text with replacement characters."
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
        ['name' => 'Select encode or decode', 'text' => 'Click Encode to convert plain text into Base64, or Decode to convert a Base64 string back into readable text.'],
        ['name' => 'Choose an alphabet', 'text' => 'Select Standard for the classic +/ alphabet, or URL-safe for the -_ alphabet used in URLs, filenames and JSON Web Tokens.'],
        ['name' => 'Paste your text or Base64 string', 'text' => 'Paste your content into the input box. The conversion happens instantly as you type, with full support for UTF-8 text and emoji.'],
        ['name' => 'Copy the result', 'text' => 'Click Copy to copy the encoded or decoded output to your clipboard.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Base64 encoder / decoder</h1>
    <p>Encode text to Base64 or decode Base64 back to readable text. Supports UTF-8 and URL-safe Base64. Instant results.</p>
  </div>

  <div class="b64-tool" id="b64-tool">

    <!-- Mode + options -->
    <div class="b64-controls">
      <div class="b64-mode-group" role="group" aria-label="Conversion mode">
        <button class="b64-mode-btn active" data-mode="encode" aria-pressed="true">
          <span class="b64-mode-icon">A → B64</span>
          <span class="b64-mode-name">Encode</span>
        </button>
        <button class="b64-mode-btn" data-mode="decode" aria-pressed="false">
          <span class="b64-mode-icon">B64 → A</span>
          <span class="b64-mode-name">Decode</span>
        </button>
      </div>

      <div class="b64-variant-opts" id="b64-variant-opts">
        <div class="b64-variant-group" role="group" aria-label="Base64 alphabet">
          <button class="b64-variant-btn active" data-variant="standard" aria-pressed="true">
            <strong>Standard</strong>
            <span>Uses + and /</span>
          </button>
          <button class="b64-variant-btn" data-variant="urlsafe" aria-pressed="false">
            <strong>URL-safe</strong>
            <span>Uses - and _</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Panels -->
    <div class="b64-panels">
      <div class="b64-panel">
        <div class="b64-panel-header">
          <span class="b64-panel-label" id="b64-input-label">Text input</span>
          <button class="btn btn-clear" data-targets="b64-input,b64-output">Clear</button>
        </div>
        <textarea
          id="b64-input"
          class="b64-textarea b64-mono"
          placeholder="Hello, world!"
          aria-label="Text or Base64 to encode or decode"
          data-save-key="base64-encoder-decoder"
          spellcheck="false"></textarea>
        <div class="b64-panel-footer">
          <span id="b64-input-count">0 characters</span>
        </div>
      </div>

      <div class="b64-panel">
        <div class="b64-panel-header">
          <span class="b64-panel-label" id="b64-output-label">Base64 output</span>
          <button class="btn btn-copy" data-target="b64-output">Copy</button>
        </div>
        <textarea
          id="b64-output"
          class="b64-textarea b64-mono b64-output-area"
          readonly
          placeholder="Encoded Base64 will appear here…"
          aria-label="Encoded or decoded result"
          aria-live="polite"></textarea>
        <div class="b64-panel-footer">
          <span id="b64-output-info" class="b64-output-info"></span>
        </div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="b64-toolbar">
      <button class="btn btn-ghost" id="b64-swap-btn">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Swap
      </button>
      <button class="btn btn-copy" data-target="b64-output">Copy result</button>
    </div>

    <!-- Quick reference -->
    <div class="b64-reference">
      <div class="b64-ref-header">
        <span class="b64-ref-title">Base64 character set</span>
        <button class="b64-ref-toggle" id="b64-ref-toggle">Show</button>
      </div>
      <div class="b64-ref-table-wrap hidden" id="b64-ref-table-wrap">
        <table class="b64-ref-table">
          <thead>
            <tr><th>Value range</th><th>Characters</th><th>Notes</th></tr>
          </thead>
          <tbody>
            <tr><td>0–25</td><td>A–Z</td><td>First 26 symbols</td></tr>
            <tr><td>26–51</td><td>a–z</td><td>Next 26 symbols</td></tr>
            <tr><td>52–61</td><td>0–9</td><td>Digits</td></tr>
            <tr><td>62</td><td>+ (standard) / - (URL-safe)</td><td>63rd symbol</td></tr>
            <tr><td>63</td><td>/ (standard) / _ (URL-safe)</td><td>64th symbol</td></tr>
            <tr><td>padding</td><td>=</td><td>Standard only — usually omitted in URL-safe</td></tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="b64-output" data-to-tool="url-encoder-decoder">URL encoder</button>
    <button class="send-to-btn" data-from="b64-output" data-to-tool="json-formatter">JSON formatter</button>
    <button class="send-to-btn" data-from="b64-output" data-to-tool="word-counter">Word counter</button>
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

    <h2>About Base64 encoding</h2>
    <p>Base64 is a binary-to-text encoding scheme that represents any sequence of bytes using only 64 printable ASCII characters — the letters A–Z and a–z, the digits 0–9, and two symbols. It exists because many systems, especially older text-based protocols like email, were built to carry only readable 7-bit ASCII characters and would corrupt or reject raw binary data such as images or encrypted keys. Base64 sidesteps that limitation by repacking every 3 bytes of binary data into 4 text characters, so the result travels safely through systems that only understand text, at the cost of being about a third larger than the original data.</p>

    <h2>History of Base64 encoding</h2>
    <p>Base64-style encoding traces back to Privacy-Enhanced Mail (PEM), described in RFC 989 in 1987, which needed a way to carry encrypted binary data — keys, signatures, certificates — through email systems built only for plain ASCII text. The specific 64-character alphabet used today was standardized as part of MIME (Multipurpose Internet Mail Extensions) by Nathaniel Borenstein and Ned Freed, first published as RFC 1521 in 1993 and refined in RFC 2045 in 1996, so that email attachments such as images and documents could travel safely over text-only mail servers. The name "Base64" simply describes its 64-symbol alphabet, the same naming convention behind Base16 (hexadecimal) and Base32 encoding.</p>

    <h2>How Base64 encoding works</h2>
    <p>Base64 groups input data into chunks of 3 bytes, which is exactly 24 bits. Each chunk is split into four 6-bit groups, and since 2 to the power of 6 equals 64, each 6-bit group maps directly onto one of the 64 alphabet characters. When the input length is not a multiple of 3 bytes, the final chunk is padded with zero bits and the output is padded with one or two equals signs to keep the result a multiple of 4 characters. This fixed, reversible mapping is what makes Base64 fast to encode and decode without needing to understand the content of the data at all.</p>

    <h2>What Base64 encoding is used for</h2>
    <p>Base64 is everywhere in modern web development. Data URIs embed small images and fonts directly inside CSS or HTML using Base64, avoiding an extra network request. JSON Web Tokens (JWTs) use URL-safe Base64 to encode their header and payload segments so they can be passed safely in URLs and HTTP headers. Email attachments are still transmitted as Base64 under the MIME standard, HTTP Basic Authentication encodes the username and password pair in Base64 before sending it in a request header, and APIs frequently Base64-encode binary files — images, PDFs, certificates — so they fit inside text-only JSON or XML payloads.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">Why is my Base64-encoded string about 33% longer than the original text?</p>
      <p class="faq-a">Base64 encodes every 3 bytes of input as 4 output characters, because each output character can only represent 6 bits of data and 3 bytes is 24 bits — exactly four 6-bit groups. That 3-to-4 ratio is a fixed 33% size increase before padding is even considered. It is the unavoidable cost of representing arbitrary binary data using only 64 printable ASCII characters, which is why Base64 is used for compatibility with text-only systems rather than for compression.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between standard Base64 and URL-safe Base64?</p>
      <p class="faq-a">They use almost the same 64-character alphabet but swap two symbols. Standard Base64 uses <code>+</code> and <code>/</code> for the values 62 and 63, which are both reserved characters inside URLs and file paths — a <code>+</code> can be read as a space and a <code>/</code> as a path separator. URL-safe Base64 replaces them with <code>-</code> and <code>_</code>, and the trailing <code>=</code> padding is usually stripped, so the result can be dropped directly into a URL, filename or cookie without further escaping. JSON Web Tokens and many web APIs use the URL-safe variant for exactly this reason.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why do Base64 strings end with one or two equals signs?</p>
      <p class="faq-a">The equals sign is padding, added when the input length is not a multiple of 3 bytes. One trailing byte produces two padding characters and two trailing bytes produce one, keeping the output length a multiple of 4 as the format requires. Padding carries no data — it only signals how many of the final 4 characters are meaningful — which is why URL-safe Base64 and some other implementations omit it entirely and recover the original length from context instead.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is Base64 encoding a form of encryption?</p>
      <p class="faq-a">No. Base64 is an encoding, not encryption — it has no secret key, and anyone can decode it instantly using this tool or a single line of code in any programming language. It is sometimes mistaken for security because it turns readable text into unfamiliar-looking characters, but that is only a side effect of representing binary data as text. Passwords, tokens or personal data should never be considered protected just because they are Base64-encoded; use real encryption if confidentiality actually matters.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does decoding produce an error or garbled text instead of my original message?</p>
      <p class="faq-a">The most common cause is pasting an incomplete string — a Base64 string cut off mid-copy loses the trailing padding and characters needed to reconstruct the original bytes. Mixing standard and URL-safe characters, stray whitespace inside the string, or accidentally including surrounding quotes copied from a JSON file can also break decoding. If the string decodes without error but the text looks garbled, the original bytes likely were not UTF-8 text at all — they may be an image, a compressed file or another binary format that this tool renders as text with replacement characters.</p>
    </div>

  </div>

</div>

<!-- Base64 encoder CSS -->
<style>
.b64-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.b64-controls {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.b64-mode-group { display: flex; gap: 8px; flex-shrink: 0; }

.b64-mode-btn {
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

.b64-mode-btn:hover { border-color: var(--accent); }
.b64-mode-btn.active { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .b64-mode-btn.active { background: var(--accent-dim); }

.b64-mode-icon {
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--accent);
}

.b64-mode-name { font-size: 0.875rem; font-weight: 500; color: var(--text); }

/* Variant buttons */
.b64-variant-opts { display: flex; align-items: center; gap: 8px; flex: 1; }

.b64-variant-group { display: flex; gap: 6px; }

.b64-variant-btn {
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

.b64-variant-btn strong { font-size: 0.875rem; font-weight: 600; color: var(--text); display: block; }
.b64-variant-btn span   { font-size: 0.7rem; color: var(--text-3); font-family: var(--font-mono); }
.b64-variant-btn:hover  { border-color: var(--accent); }
.b64-variant-btn.active { border-color: var(--accent); background: var(--accent-light); }
.b64-variant-btn.active strong { color: var(--accent-dark); }
[data-theme="dark"] .b64-variant-btn.active { background: var(--accent-dim); }
[data-theme="dark"] .b64-variant-btn.active strong { color: #5DCAA5; }

/* Panels */
.b64-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 220px;
  border-bottom: 1px solid var(--border);
}

.b64-panel { display: flex; flex-direction: column; }
.b64-panel:first-child { border-right: 1px solid var(--border); }

.b64-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.b64-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.b64-textarea {
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

.b64-mono { font-family: var(--font-mono); font-size: 0.875rem; word-break: break-all; }
.b64-textarea::placeholder { color: var(--text-3); font-family: var(--font); word-break: normal; }
.b64-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .b64-output-area { color: #5DCAA5; background: var(--accent-dim); }

.b64-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.b64-output-info.success { color: var(--accent); font-weight: 500; }
.b64-output-info.error   { color: var(--danger); font-weight: 500; }

/* Toolbar */
.b64-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  border-top: 1px solid var(--border);
}

/* Reference */
.b64-reference { border-top: 1px solid var(--border); background: var(--bg-2); }

.b64-ref-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
}

.b64-ref-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.b64-ref-toggle {
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

.b64-ref-toggle:hover { color: var(--accent); border-color: var(--accent); }

.b64-ref-table-wrap {
  overflow-x: auto;
  max-height: 320px;
  overflow-y: auto;
  border-top: 1px solid var(--border);
}

.b64-ref-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.8125rem;
}

.b64-ref-table th {
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

.b64-ref-table td {
  padding: 7px 14px;
  border-bottom: 1px solid var(--border);
  color: var(--text);
}

.b64-ref-table td:nth-child(2) { font-family: var(--font-mono); font-weight: 600; color: var(--accent); }
.b64-ref-table tr:last-child td { border-bottom: none; }
.b64-ref-table tr:hover td { background: var(--bg-3); }

@media (max-width: 640px) {
  .b64-panels { grid-template-columns: 1fr; }
  .b64-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .b64-controls { flex-direction: column; align-items: stretch; }
  .b64-variant-btn { min-width: auto; flex: 1; }
}
</style>

<!-- Base64 encoder JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input       = document.getElementById('b64-input');
  var output      = document.getElementById('b64-output');
  var inputLabel  = document.getElementById('b64-input-label');
  var outputLabel = document.getElementById('b64-output-label');
  var inputCount  = document.getElementById('b64-input-count');
  var outputInfo  = document.getElementById('b64-output-info');
  var swapBtn     = document.getElementById('b64-swap-btn');
  var variantOpts = document.getElementById('b64-variant-opts');
  var refToggle   = document.getElementById('b64-ref-toggle');
  var refWrap     = document.getElementById('b64-ref-table-wrap');

  var currentMode    = 'encode';
  var currentVariant = 'standard';

  function toUrlSafe(b64) {
    return b64.replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
  }

  function fromUrlSafe(str) {
    var s = str.replace(/-/g, '+').replace(/_/g, '/');
    while (s.length % 4 !== 0) s += '=';
    return s;
  }

  function encode(text, variant) {
    try {
      var bytes = new TextEncoder().encode(text);
      var binary = '';
      for (var i = 0; i < bytes.length; i++) binary += String.fromCharCode(bytes[i]);
      var b64 = btoa(binary);
      if (variant === 'urlsafe') b64 = toUrlSafe(b64);
      return { result: b64, error: null };
    } catch (e) {
      return { result: '', error: e.message };
    }
  }

  function decode(text) {
    try {
      var cleaned = text.trim().replace(/\s+/g, '');
      if (!/^[A-Za-z0-9+/_-]*={0,2}$/.test(cleaned)) {
        return { result: '', error: 'Contains characters outside the Base64 alphabet' };
      }
      var normalized = (cleaned.indexOf('-') !== -1 || cleaned.indexOf('_') !== -1)
        ? fromUrlSafe(cleaned)
        : cleaned;
      var binary = atob(normalized);
      var bytes = new Uint8Array(binary.length);
      for (var i = 0; i < binary.length; i++) bytes[i] = binary.charCodeAt(i);
      var text2 = new TextDecoder('utf-8', { fatal: true }).decode(bytes);
      return { result: text2, error: null };
    } catch (e) {
      return { result: '', error: 'Invalid Base64 input — check for missing characters or padding' };
    }
  }

  function process() {
    var text = input.value;
    inputCount.textContent = text.length.toLocaleString() + ' character' + (text.length !== 1 ? 's' : '');
    outputInfo.className = 'b64-output-info';

    if (!text) {
      output.value = '';
      outputInfo.textContent = '';
      return;
    }

    if (currentMode === 'encode') {
      var res = encode(text, currentVariant);
      if (res.error) {
        outputInfo.textContent = 'Error: ' + res.error;
        outputInfo.className = 'b64-output-info error';
        output.value = '';
      } else {
        output.value = res.result;
        var diff = res.result.length - text.length;
        outputInfo.textContent = diff + ' characters added (' + res.result.length + ' total)';
        outputInfo.className = 'b64-output-info success';
      }
    } else {
      var dres = decode(text);
      if (dres.error) {
        outputInfo.textContent = 'Error: ' + dres.error;
        outputInfo.className = 'b64-output-info error';
        output.value = '';
      } else {
        output.value = dres.result;
        outputInfo.textContent = dres.result.length.toLocaleString() + ' character' + (dres.result.length !== 1 ? 's' : '') + ' decoded';
        outputInfo.className = 'b64-output-info success';
      }
    }
  }

  function setMode(mode) {
    currentMode = mode;
    document.querySelectorAll('.b64-mode-btn').forEach(function (btn) {
      var active = btn.dataset.mode === mode;
      btn.classList.toggle('active', active);
      btn.setAttribute('aria-pressed', active ? 'true' : 'false');
    });

    if (mode === 'encode') {
      inputLabel.textContent  = 'Text input';
      outputLabel.textContent = 'Base64 output';
      input.placeholder       = 'Hello, world!';
      output.placeholder      = 'Encoded Base64 will appear here…';
      variantOpts.style.display = '';
    } else {
      inputLabel.textContent  = 'Base64 input';
      outputLabel.textContent = 'Decoded text';
      input.placeholder       = 'SGVsbG8sIHdvcmxkIQ==';
      output.placeholder      = 'Decoded text will appear here…';
      variantOpts.style.display = 'none';
    }

    input.value  = '';
    output.value = '';
    outputInfo.textContent = '';
    inputCount.textContent = '0 characters';
  }

  /* Mode buttons */
  document.querySelectorAll('.b64-mode-btn').forEach(function (btn) {
    btn.addEventListener('click', function () { setMode(btn.dataset.mode); });
  });

  /* Variant buttons */
  document.querySelectorAll('.b64-variant-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('.b64-variant-btn').forEach(function (b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentVariant = btn.dataset.variant;
      process();
    });
  });

  input.addEventListener('input', process);

  swapBtn.addEventListener('click', function () {
    if (!output.value.trim()) return;
    var outVal  = output.value;
    var newMode = currentMode === 'encode' ? 'decode' : 'encode';
    setMode(newMode);
    input.value = outVal;
    process();
  });

  refToggle.addEventListener('click', function () {
    var hidden = refWrap.classList.toggle('hidden');
    refToggle.textContent = hidden ? 'Show' : 'Hide';
  });

  setMode('encode');

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
