<?php
$tool_slug   = 'base-converter';
$tool_name   = 'Base Converter';

$page_title  = 'Base Converter — Convert Binary Octal Decimal Hex Online Free | TextlyPop';
$meta_desc   = 'Convert numbers between binary, octal, decimal and hexadecimal instantly. Free online number base converter. No signup required.';
$canonical_url = 'https://textlypop.com/tools/base-converter';
$og_title    = 'Free Number Base Converter — TextlyPop';
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
  "name": "Base Converter",
  "url": "https://textlypop.com/tools/base-converter",
  "description": "Convert numbers between binary, octal, decimal and hexadecimal instantly.",
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
      "name": "How do I convert decimal to binary?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Type your decimal number into the Decimal field and the binary equivalent appears instantly. For example 255 in decimal is 11111111 in binary."
      }
    },
    {
      "@type": "Question",
      "name": "What is hexadecimal?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Hexadecimal is a base-16 number system that uses digits 0-9 and letters A-F. It is widely used in programming, web colors, and computer memory addresses because it compactly represents binary data. Each hex digit represents exactly four binary bits."
      }
    },
    {
      "@type": "Question",
      "name": "What is 255 in hexadecimal?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "255 in hexadecimal is FF. In binary it is 11111111. In octal it is 377. The decimal value 255 is significant because it is the maximum value of a single byte (8 bits) and is commonly seen in IP addresses, color values, and memory limits."
      }
    },
    {
      "@type": "Question",
      "name": "What is binary?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Binary is a base-2 number system that uses only the digits 0 and 1. It is the fundamental language of computers because digital circuits can easily represent two states — on and off, high and low voltage, true and false. Every decimal number can be represented in binary."
      }
    },
    {
      "@type": "Question",
      "name": "What is octal?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Octal is a base-8 number system that uses digits 0-7. It was historically used in computing as a shorthand for binary, since each octal digit represents exactly three binary bits. Octal is still used in Unix and Linux file permissions."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Numbers Between Bases',
  'description' => 'Convert numbers between binary, octal, decimal and hexadecimal using TextlyPop base converter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Type your number','text'=>'Enter a number in any of the four fields — binary, octal, decimal, or hexadecimal. All other fields update instantly.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'View all conversions','text'=>'All four base representations appear simultaneously. No button press needed.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Copy any result','text'=>'Click Copy next to any field to copy that representation to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Base Converter','item'=>'https://textlypop.com/tools/base-converter'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Base converter</h1>
    <p>Convert numbers between binary, octal, decimal and hexadecimal. Type in any field and all others update instantly.</p>
  </div>

  <div class="bc-tool" id="bc-tool">

    <!-- Four base fields -->
    <div class="bc-fields">

      <div class="bc-field" id="bc-field-bin">
        <div class="bc-field-header">
          <div class="bc-field-label-wrap">
            <span class="bc-base-badge">Base 2</span>
            <label class="bc-label" for="bc-bin">Binary</label>
          </div>
          <span class="bc-chars">Digits: 0, 1</span>
        </div>
        <div class="bc-input-row">
          <input
            type="text"
            id="bc-bin"
            class="bc-input bc-mono"
            placeholder="e.g. 11111111"
            autocomplete="off"
            autocorrect="off"
            spellcheck="false"
            aria-label="Binary number"
            data-base="2"
            data-chars="01">
          <button class="bc-copy-btn" data-target="bc-bin" title="Copy binary">
            <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true"><rect x="5" y="5" width="9" height="9" rx="1.5"/><path d="M11 5V3.5A1.5 1.5 0 0 0 9.5 2h-6A1.5 1.5 0 0 0 2 3.5v6A1.5 1.5 0 0 0 3.5 11H5"/></svg>
            Copy
          </button>
        </div>
        <div class="bc-field-info" id="bc-info-bin"></div>
      </div>

      <div class="bc-field" id="bc-field-oct">
        <div class="bc-field-header">
          <div class="bc-field-label-wrap">
            <span class="bc-base-badge">Base 8</span>
            <label class="bc-label" for="bc-oct">Octal</label>
          </div>
          <span class="bc-chars">Digits: 0–7</span>
        </div>
        <div class="bc-input-row">
          <input
            type="text"
            id="bc-oct"
            class="bc-input bc-mono"
            placeholder="e.g. 377"
            autocomplete="off"
            autocorrect="off"
            spellcheck="false"
            aria-label="Octal number"
            data-base="8"
            data-chars="01234567">
          <button class="bc-copy-btn" data-target="bc-oct" title="Copy octal">
            <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true"><rect x="5" y="5" width="9" height="9" rx="1.5"/><path d="M11 5V3.5A1.5 1.5 0 0 0 9.5 2h-6A1.5 1.5 0 0 0 2 3.5v6A1.5 1.5 0 0 0 3.5 11H5"/></svg>
            Copy
          </button>
        </div>
        <div class="bc-field-info" id="bc-info-oct"></div>
      </div>

      <div class="bc-field bc-field-active" id="bc-field-dec">
        <div class="bc-field-header">
          <div class="bc-field-label-wrap">
            <span class="bc-base-badge bc-badge-primary">Base 10</span>
            <label class="bc-label" for="bc-dec">Decimal</label>
          </div>
          <span class="bc-chars">Digits: 0–9</span>
        </div>
        <div class="bc-input-row">
          <input
            type="text"
            id="bc-dec"
            class="bc-input bc-mono"
            placeholder="e.g. 255"
            autocomplete="off"
            autocorrect="off"
            spellcheck="false"
            aria-label="Decimal number"
            data-base="10"
            data-chars="0123456789">
          <button class="bc-copy-btn" data-target="bc-dec" title="Copy decimal">
            <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true"><rect x="5" y="5" width="9" height="9" rx="1.5"/><path d="M11 5V3.5A1.5 1.5 0 0 0 9.5 2h-6A1.5 1.5 0 0 0 2 3.5v6A1.5 1.5 0 0 0 3.5 11H5"/></svg>
            Copy
          </button>
        </div>
        <div class="bc-field-info" id="bc-info-dec"></div>
      </div>

      <div class="bc-field" id="bc-field-hex">
        <div class="bc-field-header">
          <div class="bc-field-label-wrap">
            <span class="bc-base-badge">Base 16</span>
            <label class="bc-label" for="bc-hex">Hexadecimal</label>
          </div>
          <span class="bc-chars">Digits: 0–9, A–F</span>
        </div>
        <div class="bc-input-row">
          <input
            type="text"
            id="bc-hex"
            class="bc-input bc-mono"
            placeholder="e.g. FF"
            autocomplete="off"
            autocorrect="off"
            spellcheck="false"
            aria-label="Hexadecimal number"
            data-base="16"
            data-chars="0123456789ABCDEFabcdef">
          <button class="bc-copy-btn" data-target="bc-hex" title="Copy hex">
            <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true"><rect x="5" y="5" width="9" height="9" rx="1.5"/><path d="M11 5V3.5A1.5 1.5 0 0 0 9.5 2h-6A1.5 1.5 0 0 0 2 3.5v6A1.5 1.5 0 0 0 3.5 11H5"/></svg>
            Copy
          </button>
        </div>
        <div class="bc-field-info" id="bc-info-hex"></div>
      </div>

    </div>

    <!-- Error bar -->
    <div class="bc-error hidden" id="bc-error" role="alert">
      <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
        <circle cx="8" cy="8" r="6"/><line x1="8" y1="5" x2="8" y2="8.5"/><circle cx="8" cy="11" r="0.5" fill="currentColor"/>
      </svg>
      <span id="bc-error-msg"></span>
    </div>

    <!-- Bit breakdown -->
    <div class="bc-bits-wrap" id="bc-bits-wrap">
      <div class="bc-bits-header">
        <span class="bc-bits-title">Bit breakdown</span>
        <span class="bc-bits-meta" id="bc-bits-meta"></span>
      </div>
      <div class="bc-bits" id="bc-bits" aria-label="Binary bit representation"></div>
    </div>

    <!-- Quick examples -->
    <div class="bc-examples">
      <span class="bc-ex-label">Try:</span>
      <button class="bc-ex-btn" data-dec="0">0</button>
      <button class="bc-ex-btn" data-dec="1">1</button>
      <button class="bc-ex-btn" data-dec="10">10</button>
      <button class="bc-ex-btn" data-dec="42">42</button>
      <button class="bc-ex-btn" data-dec="127">127</button>
      <button class="bc-ex-btn" data-dec="128">128</button>
      <button class="bc-ex-btn" data-dec="255">255 (FF)</button>
      <button class="bc-ex-btn" data-dec="256">256</button>
      <button class="bc-ex-btn" data-dec="1024">1024</button>
      <button class="bc-ex-btn" data-dec="65535">65535 (FFFF)</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send to:</span>
    <button class="send-to-btn" data-from="bc-bin" data-to-tool="binary-to-text">Binary to text</button>
  </div>

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

    <h2>Number bases explained</h2>
    <p>A number base or radix defines how many unique digits a number system uses. Decimal uses ten digits (0–9) and is the system humans use every day. Binary uses two digits (0 and 1) and is the native language of computers. Octal uses eight digits (0–7) and was historically used in computing as a shorthand for binary. Hexadecimal uses sixteen digits (0–9 plus A–F) and is widely used in programming for its compact representation of binary data.</p>

    <h2>Why programmers use hexadecimal</h2>
    <p>Every hexadecimal digit represents exactly four binary bits. This makes hex a natural shorthand for binary — the eight-bit byte 11111111 becomes simply FF in hex, and 10110100 becomes B4. Web colors use hex — #FF5733 is a shade of orange. Memory addresses in low-level programming are written in hex. CPU registers, network packet data, and file format specifications all use hexadecimal because it is far more compact than binary while maintaining a direct relationship with the underlying bit patterns.</p>

    <h2>Binary and computer science</h2>
    <p>Binary is fundamental to how all digital computers work. Every piece of data — text, images, audio, video, programs — is ultimately stored as a sequence of 0s and 1s. A single binary digit is a bit. Eight bits make a byte, which can represent 256 different values (0 through 255). Understanding binary is essential for computer science, networking, cryptography, and low-level programming. The bit breakdown section on this tool shows exactly which bits are set for any number you enter.</p>

    <h2>Octal and Unix permissions</h2>
    <p>Octal is still actively used in Unix and Linux systems for file permissions. The chmod command uses octal notation — chmod 755 grants read, write, execute to the owner and read, execute to group and others. Each permission triplet (read, write, execute) maps perfectly to three binary bits, and three bits is exactly one octal digit. So 7 in octal is 111 in binary meaning all three permissions granted, and 5 is 101 meaning read and execute but not write.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert decimal to binary?</p>
      <p class="faq-a">Type your decimal number into the Decimal field and the binary equivalent appears instantly. For example 255 in decimal is 11111111 in binary.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is hexadecimal?</p>
      <p class="faq-a">A base-16 number system using digits 0-9 and letters A-F. Each hex digit represents exactly four binary bits. Widely used in programming, web colors, and memory addresses.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is 255 in hexadecimal?</p>
      <p class="faq-a">255 in hex is FF. In binary it is 11111111. In octal it is 377. It is the maximum value of a single byte.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is binary?</p>
      <p class="faq-a">A base-2 number system using only 0 and 1. The fundamental language of computers because digital circuits naturally represent two states — on and off.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is octal?</p>
      <p class="faq-a">A base-8 number system using digits 0-7. Each octal digit represents exactly three binary bits. Still used in Unix and Linux file permissions.</p>
    </div>

  </div>

</div>

<!-- Base converter CSS -->
<style>
.bc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Fields grid */
.bc-fields {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0;
}

.bc-field {
  padding: 20px;
  border-right: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  gap: 10px;
  transition: background var(--transition);
}

.bc-field:nth-child(2n) { border-right: none; }
.bc-field:nth-child(3),
.bc-field:nth-child(4) { border-bottom: none; }

.bc-field-active { background: var(--accent-light); }
[data-theme="dark"] .bc-field-active { background: var(--accent-dim); }

.bc-field-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 8px;
}

.bc-field-label-wrap {
  display: flex;
  align-items: center;
  gap: 8px;
}

.bc-base-badge {
  display: inline-flex;
  align-items: center;
  padding: 2px 8px;
  border-radius: 20px;
  font-size: 0.6875rem;
  font-weight: 700;
  background: var(--bg-3);
  color: var(--text-3);
  white-space: nowrap;
}

.bc-badge-primary {
  background: rgba(29,158,117,0.15);
  color: var(--accent);
}

.bc-label {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text);
  cursor: text;
}

.bc-chars {
  font-size: 0.7rem;
  color: var(--text-3);
  white-space: nowrap;
}

/* Input row */
.bc-input-row {
  display: flex;
  align-items: center;
  gap: 8px;
}

.bc-input {
  flex: 1;
  padding: 10px 12px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-size: 1rem;
  outline: none;
  min-width: 0;
  transition: border-color var(--transition), background var(--transition);
}

.bc-input:focus {
  border-color: var(--accent);
  background: var(--bg);
}

.bc-input.error { border-color: var(--danger); }
.bc-input::placeholder { color: var(--text-3); }
.bc-mono { font-family: var(--font-mono); letter-spacing: 0.04em; }

.bc-copy-btn {
  display: flex;
  align-items: center;
  gap: 5px;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text-3);
  font-family: var(--font);
  font-size: 0.8125rem;
  cursor: pointer;
  white-space: nowrap;
  flex-shrink: 0;
  transition: border-color var(--transition), color var(--transition), background var(--transition);
}

.bc-copy-btn:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .bc-copy-btn:hover { background: var(--accent-dim); }
.bc-copy-btn.copied { border-color: var(--accent); color: var(--accent); }

.bc-field-info {
  font-size: 0.75rem;
  color: var(--text-3);
  min-height: 1em;
  font-variant-numeric: tabular-nums;
}

.bc-field-info.error { color: var(--danger); }

/* Error bar */
.bc-error {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 16px;
  background: rgba(229,62,62,0.07);
  border-top: 1px solid rgba(229,62,62,0.2);
  color: var(--danger);
  font-size: 0.875rem;
}

/* Bit breakdown */
.bc-bits-wrap {
  padding: 14px 16px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.bc-bits-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 10px;
}

.bc-bits-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.bc-bits-meta {
  font-size: 0.75rem;
  color: var(--text-3);
}

.bc-bits {
  display: flex;
  flex-wrap: wrap;
  gap: 4px;
  min-height: 32px;
}

.bc-bit {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 2px;
}

.bc-bit-val {
  width: 28px;
  height: 28px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 4px;
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
  border: 1px solid var(--border);
  transition: background var(--transition), color var(--transition);
}

.bc-bit-val.on  { background: var(--accent); color: #fff; border-color: var(--accent); }
.bc-bit-val.off { background: var(--bg-3); color: var(--text-3); }

.bc-bit-pos {
  font-size: 0.5625rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
}

/* Group separator between nibbles */
.bc-bit-group-sep {
  width: 6px;
  align-self: center;
}

/* Examples */
.bc-examples {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 12px 16px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.bc-ex-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

.bc-ex-btn {
  padding: 4px 12px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font-mono);
  font-size: 0.8125rem;
  cursor: pointer;
  transition: border-color var(--transition), color var(--transition), background var(--transition);
  white-space: nowrap;
}

.bc-ex-btn:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .bc-ex-btn:hover { background: var(--accent-dim); }

@media (max-width: 600px) {
  .bc-fields { grid-template-columns: 1fr; }
  .bc-field { border-right: none; border-bottom: 1px solid var(--border); }
  .bc-field:last-child { border-bottom: none; }
}
</style>

<!-- Base converter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var fields = [
    { id: 'bc-bin', base: 2,  infoId: 'bc-info-bin', name: 'Binary' },
    { id: 'bc-oct', base: 8,  infoId: 'bc-info-oct', name: 'Octal'  },
    { id: 'bc-dec', base: 10, infoId: 'bc-info-dec', name: 'Decimal' },
    { id: 'bc-hex', base: 16, infoId: 'bc-info-hex', name: 'Hex'    },
  ];

  var errorBar  = document.getElementById('bc-error');
  var errorMsg  = document.getElementById('bc-error-msg');
  var bitsWrap  = document.getElementById('bc-bits-wrap');
  var bitsEl    = document.getElementById('bc-bits');
  var bitsMeta  = document.getElementById('bc-bits-meta');

  var activeId  = null; /* which field is being typed in */

  /* ── Validate chars for a given base ── */
  function validChars(str, base) {
    var charset = '0123456789abcdef'.slice(0, base);
    return str.toLowerCase().split('').every(function(c){ return charset.includes(c); });
  }

  /* ── Build bit breakdown ── */
  function renderBits(num) {
    if (num === null || isNaN(num) || num < 0) {
      bitsWrap.style.display = 'none';
      return;
    }

    bitsWrap.style.display = '';
    var bin    = num.toString(2);
    var bits   = num === 0 ? 8 : Math.max(8, Math.ceil(bin.length / 8) * 8);
    var padded = bin.padStart(bits, '0');

    bitsMeta.textContent = bits + ' bits — ' +
      (num !== 0 ? padded.split('').filter(function(b){ return b==='1'; }).length + ' set' : '0 set');

    bitsEl.innerHTML = '';
    for (var i = 0; i < padded.length; i++) {
      if (i > 0 && i % 4 === 0) {
        var sep = document.createElement('div');
        sep.className = 'bc-bit-group-sep';
        bitsEl.appendChild(sep);
      }
      var bit  = document.createElement('div');
      bit.className = 'bc-bit';
      var val  = document.createElement('div');
      val.className = 'bc-bit-val ' + (padded[i] === '1' ? 'on' : 'off');
      val.textContent = padded[i];
      var pos  = document.createElement('div');
      pos.className = 'bc-bit-pos';
      pos.textContent = bits - i - 1;
      bit.appendChild(val);
      bit.appendChild(pos);
      bitsEl.appendChild(bit);
    }
  }

  /* ── Convert from active field to all others ── */
  function convert(sourceId, sourceBase) {
    var sourceEl = document.getElementById(sourceId);
    var raw      = sourceEl.value.trim();

    /* Highlight active field */
    fields.forEach(function(f) {
      document.getElementById('bc-field-' + f.id.split('-')[1]).classList.remove('bc-field-active');
    });
    document.getElementById('bc-field-' + sourceId.split('-')[1]).classList.add('bc-field-active');

    /* Clear all other fields and info */
    fields.forEach(function(f) {
      if (f.id !== sourceId) {
        document.getElementById(f.id).value = '';
        document.getElementById(f.infoId).textContent = '';
        document.getElementById(f.infoId).className = 'bc-field-info';
      }
    });

    errorBar.classList.add('hidden');

    if (!raw) {
      renderBits(null);
      return;
    }

    /* Validate chars */
    if (!validChars(raw, sourceBase)) {
      errorMsg.textContent = 'Invalid character for base-' + sourceBase + ' — check your input.';
      errorBar.classList.remove('hidden');
      sourceEl.classList.add('error');
      renderBits(null);
      return;
    }

    sourceEl.classList.remove('error');

    /* Parse to decimal */
    var decimal = parseInt(raw, sourceBase);

    if (isNaN(decimal) || decimal < 0) {
      errorMsg.textContent = 'Could not parse this number.';
      errorBar.classList.remove('hidden');
      renderBits(null);
      return;
    }

    if (decimal > Number.MAX_SAFE_INTEGER) {
      errorMsg.textContent = 'Number too large for safe conversion.';
      errorBar.classList.remove('hidden');
      renderBits(null);
      return;
    }

    /* Fill all other fields */
    fields.forEach(function(f) {
      if (f.id === sourceId) {
        /* Info for source field */
        document.getElementById(f.infoId).textContent = 'Decimal value: ' + decimal.toLocaleString();
        return;
      }

      var converted;
      if (f.base === 2)  converted = decimal.toString(2);
      if (f.base === 8)  converted = decimal.toString(8);
      if (f.base === 10) converted = decimal.toString(10);
      if (f.base === 16) converted = decimal.toString(16).toUpperCase();

      document.getElementById(f.id).value = converted;

      /* Info text */
      var info = document.getElementById(f.infoId);
      if (f.base === 2)  info.textContent = converted.length + ' bits';
      if (f.base === 8)  info.textContent = converted.length + ' digit' + (converted.length !== 1 ? 's' : '');
      if (f.base === 10) info.textContent = decimal.toLocaleString();
      if (f.base === 16) info.textContent = converted.length + ' nibble' + (converted.length !== 1 ? 's' : '') + ' (' + (converted.length * 4) + ' bits)';
    });

    renderBits(decimal);
  }

  /* ── Wire up inputs ── */
  fields.forEach(function(f) {
    var el = document.getElementById(f.id);

    el.addEventListener('input', function() {
      /* Auto-uppercase hex */
      if (f.base === 16) el.value = el.value.toUpperCase();
      activeId = f.id;
      convert(f.id, f.base);
    });

    el.addEventListener('focus', function() {
      document.getElementById('bc-field-' + f.id.split('-')[1]).classList.add('bc-field-active');
    });
  });

  /* ── Copy buttons ── */
  document.querySelectorAll('.bc-copy-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var target = document.getElementById(btn.dataset.target);
      if (!target || !target.value) return;
      navigator.clipboard.writeText(target.value).then(function() {
        btn.classList.add('copied');
        var orig = btn.querySelector('svg').outerHTML + ' Copy';
        btn.innerHTML = btn.querySelector('svg').outerHTML + ' Copied!';
        setTimeout(function() {
          btn.innerHTML = orig;
          btn.classList.remove('copied');
        }, 2000);
      });
    });
  });

  /* ── Examples ── */
  document.querySelectorAll('.bc-ex-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var decEl = document.getElementById('bc-dec');
      decEl.value = btn.dataset.dec;
      activeId = 'bc-dec';
      convert('bc-dec', 10);
      decEl.focus();
    });
  });

  /* ── Init ── */
  bitsWrap.style.display = 'none';

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
