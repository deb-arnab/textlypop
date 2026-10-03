<?php
$tool_slug   = 'binary-to-text';
$tool_name   = 'Binary to Text Converter';

$page_title  = 'Binary to Text — Convert Binary to Letters | TextlyPop';
$meta_desc   = 'Convert binary code to text and text to binary instantly. Free binary translator for 8-bit ASCII, with a binary-to-letters reference table. No signup required.';
$canonical_url = 'https://textlypop.com/tools/binary-to-text';
$og_title    = 'Free Binary to Text Converter — TextlyPop';
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
  "name": "Binary to Text Converter",
  "url": "https://textlypop.com/tools/binary-to-text",
  "description": "Convert binary code to readable text and text to binary instantly. Supports 8-bit ASCII binary.",
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
      "name": "How do I convert binary to text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Select Binary to Text mode and paste your binary. The tool reads groups of 8 bits, converts each to its decimal value and looks it up in the ASCII table — instantly as you type. Groups that decode outside the printable range are flagged rather than silently garbled, making single-digit typos easy to spot."
      }
    },
    {
      "@type": "Question",
      "name": "Why do computers use binary instead of decimal?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Because hardware is built from switches with two reliable states: on and off. Two states are cheap to distinguish and immune to electrical noise, while a ten-state component would misread constantly. Every higher representation — text, images, audio — is layered on those two states. Leibniz worked out binary arithmetic in 1703; engineering caught up 250 years later."
      }
    },
    {
      "@type": "Question",
      "name": "What format should my binary input be in?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Groups of 8 digits separated by spaces — 01001000 01100101 — is the convention, but unspaced input works too: continuous binary is grouped into 8-bit chunks automatically. The total digit count must be a multiple of eight; a missing digit shifts every following character, the most common cause of a garbled result."
      }
    },
    {
      "@type": "Question",
      "name": "Can I convert text to binary?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Switch to Text to Binary mode and each character is written out as a full 8-bit byte, padded with leading zeros — A becomes 01000001. The output round-trips perfectly: paste it back in Binary to Text mode and you get your original text."
      }
    },
    {
      "@type": "Question",
      "name": "What is the binary code for Hello?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Hello in binary is 01001000 01100101 01101100 01101100 01101111 — the ASCII codes 72, 101, 108, 108, 111. Note the capital H differs from lowercase h (01101000) by a single bit: case lives in bit six of every ASCII letter."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Binary to Text Online',
  'description' => 'Convert binary code to readable text using TextlyPop binary to text converter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Select conversion direction','text'=>'Click Binary to Text to convert binary code to readable text, or Text to Binary to convert text into binary code.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Paste your input','text'=>'Paste your binary code or text into the input box on the left. The conversion happens instantly as you type.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'View the result','text'=>'The converted output appears in the right panel. Any invalid binary characters are highlighted with an error message.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy the result','text'=>'Click Copy to copy the converted text or binary to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Binary to Text Converter','item'=>'https://textlypop.com/tools/binary-to-text'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Binary to text converter</h1>
    <p>Convert binary code to readable text or text to binary instantly. Supports 8-bit ASCII encoding.</p>
  </div>

  <div class="bt-tool" id="bt-tool">

    <!-- Mode toggle -->
    <div class="bt-modes">
      <div class="bt-mode-group" role="group" aria-label="Conversion direction">
        <button class="bt-mode-btn active" data-mode="bin2txt" aria-pressed="true">
          <span class="bt-mode-icon">01 → A</span>
          <span class="bt-mode-name">Binary to text</span>
        </button>
        <button class="bt-mode-btn" data-mode="txt2bin" aria-pressed="false">
          <span class="bt-mode-icon">A → 01</span>
          <span class="bt-mode-name">Text to binary</span>
        </button>
      </div>
      <span class="bt-encoding-note">8-bit ASCII encoding</span>
    </div>

    <!-- Panels -->
    <div class="bt-panels">

      <div class="bt-panel">
        <div class="bt-panel-header">
          <span class="bt-panel-label" id="bt-input-label">Binary input</span>
          <button class="btn btn-clear" data-targets="bt-input,bt-output">Clear</button>
        </div>
        <textarea
          id="bt-input"
          class="bt-textarea bt-mono"
          placeholder="01001000 01100101 01101100 01101100 01101111"
          aria-label="Binary code input"
          data-save-key="binary-to-text"
          spellcheck="false"></textarea>
        <div class="bt-panel-footer">
          <span id="bt-input-info">Enter binary code (groups of 8 bits separated by spaces)</span>
        </div>
      </div>

      <div class="bt-panel">
        <div class="bt-panel-header">
          <span class="bt-panel-label" id="bt-output-label">Text output</span>
          <button class="btn btn-copy" data-target="bt-output">Copy</button>
        </div>
        <textarea
          id="bt-output"
          class="bt-textarea bt-output-area"
          readonly
          placeholder="Converted text will appear here…"
          aria-label="Converted output"
          aria-live="polite"></textarea>
        <div class="bt-panel-footer">
          <span id="bt-output-info" class="bt-output-info"></span>
        </div>
      </div>

    </div>

    <!-- Error bar -->
    <div class="bt-error hidden" id="bt-error" role="alert">
      <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
        <circle cx="8" cy="8" r="6"/>
        <line x1="8" y1="5" x2="8" y2="8"/>
        <circle cx="8" cy="11" r="0.5" fill="currentColor"/>
      </svg>
      <span id="bt-error-msg"></span>
    </div>

    <!-- Toolbar -->
    <div class="bt-toolbar">
      <button class="btn btn-ghost" id="bt-swap-btn" title="Swap input and output">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Swap
      </button>
      <button class="btn btn-copy" data-target="bt-output">Copy result</button>
    </div>

    <!-- Quick reference table -->
    <div class="bt-reference">
      <div class="bt-reference-header">
        <span class="bt-reference-title">Quick reference — common characters</span>
        <button class="bt-ref-toggle" id="bt-ref-toggle">Show</button>
      </div>
      <div class="bt-ref-table-wrap hidden" id="bt-ref-table-wrap">
        <table class="bt-ref-table">
          <thead>
            <tr><th>Char</th><th>Decimal</th><th>Binary</th></tr>
          </thead>
          <tbody id="bt-ref-tbody"></tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="bt-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="bt-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="bt-output" data-to-tool="case-converter">Case converter</button>
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

    <h2>How binary code represents text</h2>
    <p>Computers store everything as binary — sequences of 0s and 1s called bits. To represent text, computers use a standard called ASCII (American Standard Code for Information Interchange) which assigns a unique number to each character. The letter A is 65, B is 66, and so on. In binary, 65 is written as 01000001 — eight digits representing one character, called a byte. Every letter, number, and symbol has its own 8-bit binary code, and this tool translates between the two representations instantly, in both directions.</p>

    <h2>A short history of binary text encoding</h2>
    <p>Binary arithmetic was described by the philosopher Gottfried Leibniz in 1703, more than two centuries before any machine could use it. The link to text came with telegraph codes and then, decisively, with ASCII — standardized in 1963 to end the chaos of every computer maker inventing its own character numbering. ASCII's 128 characters covered English, and its layout was clever enough that Unicode's UTF-8 encoding, designed in 1992 and now used by essentially the entire web, kept ASCII intact as its first 128 characters. The bytes this tool produces for plain English text are therefore identical in ASCII and UTF-8 — a 60-year-old encoding decision still visible in every modern file.</p>

    <h2>Binary to letters reference table</h2>
    <p>Every letter has one fixed 8-bit code, so binary can be decoded by hand with the table below. Uppercase and lowercase are different characters with different codes — they differ by exactly one bit, the third from the left, which is why <code>01000001</code> is A and <code>01100001</code> is a.</p>
    <div class="table-scroll">
      <table class="seo-table">
        <thead>
          <tr><th>Letter</th><th>Binary</th><th>Decimal</th><th>Letter</th><th>Binary</th><th>Decimal</th></tr>
        </thead>
        <tbody>
          <?php for ($i = 0; $i < 26; $i++): $u = 65 + $i; $l = 97 + $i; ?>
          <tr>
            <td><?= chr($u) ?></td><td><code><?= sprintf('%08b', $u) ?></code></td><td><?= $u ?></td>
            <td><?= chr($l) ?></td><td><code><?= sprintf('%08b', $l) ?></code></td><td><?= $l ?></td>
          </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div>
    <p>The space character is <code>00100000</code> (32), and the digits 0 to 9 run from <code>00110000</code> (48) to <code>00111001</code> (57). To decode binary code to text by hand, split the string into groups of eight, convert each group to its decimal value, then look the value up. To go the other way, look up each letter and concatenate the codes. Reading a long message that way is slow, which is what the converter above is for — but doing one word manually is the quickest way to make the encoding click.</p>

    <h2>Common uses for binary conversion</h2>
    <p>Computer science students use binary converters to understand how computers represent data at the hardware level. Developers use binary when working with bitwise operations, network protocols, file formats, and low-level programming. Security researchers analyze binary data in network packets and executable files. Puzzle enthusiasts and escape room designers use binary encoding as a cipher for clues and messages.</p>
    <p>A binary translator is one of several ways the same text can be re-expressed. The <a href="/tools/base-converter">base converter</a> moves numbers between binary, octal, decimal and hexadecimal when the input is a number rather than a message. <a href="/tools/morse-code-translator">Morse code</a> is the other classic character encoding and is the usual companion in puzzle and escape-room work. For encodings that carry data rather than conceal it, <a href="/tools/base64-encoder-decoder">Base64</a> packs binary into text-safe characters, and <a href="/tools/url-encoder-decoder">URL encoding</a> and <a href="/tools/html-encoder-decoder">HTML entity encoding</a> escape characters that would otherwise break a link or a page.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert binary to text?</p>
      <p class="faq-a">Select Binary to Text mode and paste your binary. The tool reads the input in groups of 8 bits, converts each group to its decimal value, and looks that value up in the ASCII table to produce the character — all instantly as you type. Groups that decode to values outside the printable range (32–126) are flagged rather than silently turned into garbage, which makes it easy to spot a typo of a single 0 or 1 in a long string.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why do computers use binary instead of decimal?</p>
      <p class="faq-a">Because hardware is built from switches, and a switch has two reliable states: on and off, high voltage and low. Distinguishing two states is cheap and immune to electrical noise, while a ten-state "decimal transistor" would misread constantly as components heat up and age. Every higher representation — decimal numbers, text, images, audio — is layered on top of those two states. Leibniz worked out binary arithmetic in 1703; engineering simply caught up with the mathematics 250 years later.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What format should my binary input be in?</p>
      <p class="faq-a">The conventional format is groups of 8 digits separated by spaces — <code>01001000 01100101</code> — which is how binary text is usually written and shared. Unspaced input works too: the tool groups a continuous run of 0s and 1s into 8-bit chunks from left to right automatically. What matters is that the total digit count is a multiple of eight; a missing digit shifts every following character, which is the most common cause of a garbled result.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I convert text to binary?</p>
      <p class="faq-a">Yes. Switch to Text to Binary mode and each character of your input is looked up in the ASCII table and written out as a full 8-bit byte, padded with leading zeros where needed — the letter A becomes 01000001, not 1000001. Groups are space-separated for readability, and the output round-trips perfectly: paste it back in Binary to Text mode and you get your original text.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the binary code for Hello?</p>
      <p class="faq-a">Hello in binary is <code>01001000 01100101 01101100 01101100 01101111</code>. Reading the groups in order: 01001000 is 72, the ASCII code for H; 01100101 is 101 for e; the two identical groups 01101100 are 108 for the double l; and 01101111 is 111 for o. Note the capital H differs from lowercase h (01101000) by a single bit — case lives in bit six of every ASCII letter.</p>
    </div>

  </div>

</div>

<!-- Binary to text CSS -->
<style>
.bt-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.bt-modes {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.bt-mode-group { display: flex; gap: 8px; }

.bt-mode-btn {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 9px 16px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  transition: border-color var(--transition), background var(--transition);
}

.bt-mode-btn:hover { border-color: var(--accent); }
.bt-mode-btn.active { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .bt-mode-btn.active { background: var(--accent-dim); }

.bt-mode-icon {
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--accent);
}

.bt-mode-name {
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--text);
}

.bt-encoding-note {
  font-size: 0.75rem;
  color: var(--text-3);
  white-space: nowrap;
}

/* Panels */
.bt-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 220px;
  border-bottom: 1px solid var(--border);
}

.bt-panel { display: flex; flex-direction: column; }
.bt-panel:first-child { border-right: 1px solid var(--border); }

.bt-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.bt-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.bt-textarea {
  flex: 1;
  width: 100%;
  min-height: 200px;
  padding: 14px;
  border: none;
  background: transparent;
  font-size: 0.9375rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
  font-family: var(--font);
}

.bt-mono { font-family: var(--font-mono); font-size: 0.875rem; letter-spacing: 0.04em; }
.bt-textarea::placeholder { color: var(--text-3); font-family: var(--font); }
.bt-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .bt-output-area { color: #5DCAA5; background: var(--accent-dim); }

.bt-panel-footer {
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.bt-output-info.error { color: var(--danger); font-weight: 500; }
.bt-output-info.success { color: var(--accent); font-weight: 500; }

/* Error bar */
.bt-error {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 14px;
  background: var(--danger-light);
  border-top: 1px solid rgba(229,62,62,0.2);
  color: var(--danger);
  font-size: 0.875rem;
}

/* Toolbar */
.bt-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  border-top: 1px solid var(--border);
}

/* Reference table */
.bt-reference {
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.bt-reference-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
}

.bt-reference-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.bt-ref-toggle {
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

.bt-ref-toggle:hover { color: var(--accent); border-color: var(--accent); }

.bt-ref-table-wrap {
  overflow-x: auto;
  max-height: 280px;
  overflow-y: auto;
  border-top: 1px solid var(--border);
}

.bt-ref-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.8125rem;
}

.bt-ref-table th {
  padding: 7px 14px;
  text-align: left;
  font-size: 0.7rem;
  font-weight: 600;
  color: var(--text-3);
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
}

.bt-ref-table td {
  padding: 6px 14px;
  border-bottom: 1px solid var(--border);
  color: var(--text);
}

.bt-ref-table tr:last-child td { border-bottom: none; }
.bt-ref-table tr:hover td { background: var(--bg-3); }
.bt-ref-table .bt-td-bin { font-family: var(--font-mono); font-size: 0.8rem; color: var(--accent); }

@media (max-width: 640px) {
  .bt-panels { grid-template-columns: 1fr; }
  .bt-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .bt-mode-btn { padding: 8px 12px; }
  .bt-mode-name { display: none; }
}
</style>

<!-- Binary to text JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('bt-input');
  var output     = document.getElementById('bt-output');
  var inputLabel = document.getElementById('bt-input-label');
  var outputLabel= document.getElementById('bt-output-label');
  var inputInfo  = document.getElementById('bt-input-info');
  var outputInfo = document.getElementById('bt-output-info');
  var errorBar   = document.getElementById('bt-error');
  var errorMsg   = document.getElementById('bt-error-msg');
  var swapBtn    = document.getElementById('bt-swap-btn');
  var refToggle  = document.getElementById('bt-ref-toggle');
  var refTableWrap = document.getElementById('bt-ref-table-wrap');
  var refTbody   = document.getElementById('bt-ref-tbody');

  var currentMode = 'bin2txt';

  /* ── Reference table data ── */
  var REF_CHARS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789 !@#$%^&*()_+-=[]{}|;:,.<>?'.split('');

  function buildRefTable() {
    refTbody.innerHTML = REF_CHARS.map(function(ch) {
      var code = ch.charCodeAt(0);
      var bin  = code.toString(2).padStart(8, '0');
      return '<tr><td>' + (ch === ' ' ? '<em>space</em>' : ch) + '</td><td>' + code + '</td><td class="bt-td-bin">' + bin + '</td></tr>';
    }).join('');
  }

  /* ── Binary to text ── */
  function binToText(bin) {
    /* Strip everything except 0 and 1 and spaces */
    var clean = bin.replace(/[^01\s]/g, '').trim();
    /* Remove spaces and group into 8-bit chunks */
    var bits  = clean.replace(/\s+/g, '');

    if (!bits) return { result: '', chars: 0, error: null };
    if (bits.length % 8 !== 0) {
      return { result: '', chars: 0, error: 'Binary input length (' + bits.length + ' bits) is not a multiple of 8. Each character needs exactly 8 bits.' };
    }

    var result = '';
    var errors = [];
    for (var i = 0; i < bits.length; i += 8) {
      var byte   = bits.slice(i, i + 8);
      var code   = parseInt(byte, 2);
      if (code < 32 || code > 126) {
        if (code === 10 || code === 13) {
          result += '\n';
        } else {
          errors.push('Byte ' + (i/8 + 1) + ' (' + byte + ' = ' + code + ') is not a printable ASCII character');
          result += '?';
        }
      } else {
        result += String.fromCharCode(code);
      }
    }

    return {
      result: result,
      chars: bits.length / 8,
      error: errors.length ? errors[0] : null
    };
  }

  /* ── Text to binary ── */
  function textToBin(text) {
    var result = text.split('').map(function(ch) {
      return ch.charCodeAt(0).toString(2).padStart(8, '0');
    }).join(' ');

    return { result: result, chars: text.length, error: null };
  }

  /* ── Process ── */
  function process() {
    var text = input.value;
    errorBar.classList.add('hidden');
    outputInfo.className = 'bt-output-info';

    if (!text.trim()) {
      output.value = '';
      outputInfo.textContent = '';
      return;
    }

    var res;
    if (currentMode === 'bin2txt') {
      res = binToText(text);
    } else {
      res = textToBin(text);
    }

    output.value = res.result;

    if (res.error) {
      errorBar.classList.remove('hidden');
      errorMsg.textContent = res.error;
      outputInfo.textContent = 'Partial conversion — see error above';
      outputInfo.className = 'bt-output-info error';
    } else if (res.chars > 0) {
      outputInfo.textContent = res.chars.toLocaleString() + ' character' + (res.chars !== 1 ? 's' : '') + ' converted';
      outputInfo.className = 'bt-output-info success';
    }
  }

  /* ── Set mode ── */
  function setMode(mode) {
    currentMode = mode;

    document.querySelectorAll('.bt-mode-btn').forEach(function(btn) {
      var active = btn.dataset.mode === mode;
      btn.classList.toggle('active', active);
      btn.setAttribute('aria-pressed', active ? 'true' : 'false');
    });

    if (mode === 'bin2txt') {
      inputLabel.textContent  = 'Binary input';
      outputLabel.textContent = 'Text output';
      input.placeholder       = '01001000 01100101 01101100 01101100 01101111';
      output.placeholder      = 'Converted text will appear here…';
      inputInfo.textContent   = 'Enter binary code (groups of 8 bits separated by spaces)';
      input.classList.add('bt-mono');
      output.classList.remove('bt-mono');
    } else {
      inputLabel.textContent  = 'Text input';
      outputLabel.textContent = 'Binary output';
      input.placeholder       = 'Hello World';
      output.placeholder      = 'Binary code will appear here…';
      inputInfo.textContent   = 'Enter any text to convert to binary';
      input.classList.remove('bt-mono');
      output.classList.add('bt-mono');
    }

    input.value  = '';
    output.value = '';
    outputInfo.textContent = '';
    errorBar.classList.add('hidden');
  }

  /* ── Events ── */
  document.querySelectorAll('.bt-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      setMode(btn.dataset.mode);
    });
  });

  input.addEventListener('input', process);

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    var newMode = currentMode === 'bin2txt' ? 'txt2bin' : 'bin2txt';
    var outVal  = output.value;
    setMode(newMode);
    input.value = outVal;
    process();
  });

  /* Reference table toggle */
  refToggle.addEventListener('click', function() {
    var hidden = refTableWrap.classList.toggle('hidden');
    refToggle.textContent = hidden ? 'Show' : 'Hide';
    if (!hidden && !refTbody.innerHTML) buildRefTable();
  });

  /* Init */
  setMode('bin2txt');

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
