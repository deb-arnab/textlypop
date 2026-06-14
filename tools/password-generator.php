<?php
$tool_slug   = 'password-generator';
$tool_name   = 'Password Generator';

$page_title  = 'Password Generator — Generate Strong Random Passwords Free | TextlyPop';
$meta_desc   = 'Generate strong, secure random passwords instantly. Custom length, uppercase, lowercase, numbers, symbols. Free online password generator. No signup required.';
$canonical_url = 'https://textlypop.com/tools/password-generator';
$og_title    = 'Free Strong Password Generator — TextlyPop';
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
  "name": "Password Generator",
  "url": "https://textlypop.com/tools/password-generator",
  "description": "Generate strong secure random passwords with custom length and character options. Cryptographically secure.",
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
      "name": "How do I generate a strong password?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Set the password length to at least 16 characters and enable uppercase letters, lowercase letters, numbers, and symbols. Click Generate. A strong password uses all character types and is at least 12 characters long."
      }
    },
    {
      "@type": "Question",
      "name": "Is this password generator secure?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. TextlyPop uses the Web Crypto API's crypto.getRandomValues() for cryptographically secure random password generation. Passwords are generated entirely in your browser and are never sent to any server or stored anywhere."
      }
    },
    {
      "@type": "Question",
      "name": "What makes a password strong?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A strong password is at least 12 characters long, uses a mix of uppercase letters, lowercase letters, numbers, and symbols, does not contain dictionary words or personal information, and is unique — not reused across multiple accounts."
      }
    },
    {
      "@type": "Question",
      "name": "Can I generate multiple passwords at once?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Set the Count field to generate up to 20 passwords at once with the same settings. Each password is independently generated using cryptographically secure randomness."
      }
    },
    {
      "@type": "Question",
      "name": "What do the password strength indicators mean?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "TextlyPop calculates password entropy in bits based on your character set size and password length. Weak is under 40 bits, Fair is 40-60 bits, Strong is 60-80 bits, and Very strong is over 80 bits. Higher entropy means more combinations an attacker would need to try."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Generate a Strong Password',
  'description' => 'Generate a secure random password using TextlyPop password generator.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Set password length','text'=>'Use the length slider or type a number between 4 and 128. For strong passwords use at least 16 characters.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Choose character types','text'=>'Enable the character types you want — uppercase letters, lowercase letters, numbers, and symbols. More types means a stronger password.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Click Generate','text'=>'Click Generate or press the refresh icon. Your password appears instantly with a strength indicator.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy your password','text'=>'Click Copy to copy the password to your clipboard. Store it in a password manager immediately.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Password Generator','item'=>'https://textlypop.com/tools/password-generator'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Password generator</h1>
    <p>Generate strong, secure random passwords instantly. Cryptographically secure. Never stored.</p>
  </div>

  <div class="pg-tool" id="pg-tool">

    <!-- Main password display -->
    <div class="pg-display">
      <div class="pg-password-wrap">
        <input
          type="text"
          id="pg-password"
          class="pg-password"
          readonly
          aria-label="Generated password"
          aria-live="polite">
        <button class="pg-refresh-btn" id="pg-refresh" title="Generate new password" aria-label="Generate new password">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
            <path d="M21 3v5h-5"/>
            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
            <path d="M8 16H3v5"/>
          </svg>
        </button>
      </div>

      <!-- Strength meter -->
      <div class="pg-strength-wrap">
        <div class="pg-strength-bar">
          <div class="pg-strength-fill" id="pg-strength-fill"></div>
        </div>
        <span class="pg-strength-label" id="pg-strength-label">—</span>
        <span class="pg-entropy-label" id="pg-entropy-label"></span>
      </div>

      <button class="btn btn-primary pg-copy-btn" id="pg-copy-btn">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <rect x="5" y="5" width="9" height="9" rx="1.5"/>
          <path d="M11 5V3.5A1.5 1.5 0 0 0 9.5 2h-6A1.5 1.5 0 0 0 2 3.5v6A1.5 1.5 0 0 0 3.5 11H5"/>
        </svg>
        Copy password
      </button>
    </div>

    <!-- Settings -->
    <div class="pg-settings">

      <!-- Length -->
      <div class="pg-setting-row">
        <div class="pg-setting-label-wrap">
          <label class="pg-setting-label" for="pg-length-input">Password length</label>
          <input type="number" id="pg-length-input" class="pg-length-num" value="16" min="4" max="128" aria-label="Password length">
        </div>
        <input type="range" id="pg-length-slider" class="pg-slider" min="4" max="64" value="16" aria-label="Password length slider">
      </div>

      <!-- Character types -->
      <div class="pg-char-types">
        <div class="pg-char-type" id="ct-upper">
          <div class="pg-char-type-left">
            <label class="pg-char-toggle">
              <input type="checkbox" id="pg-upper" checked>
              <span class="pg-char-type-name">Uppercase letters</span>
            </label>
            <span class="pg-char-example">A B C D E F</span>
          </div>
        </div>

        <div class="pg-char-type" id="ct-lower">
          <div class="pg-char-type-left">
            <label class="pg-char-toggle">
              <input type="checkbox" id="pg-lower" checked>
              <span class="pg-char-type-name">Lowercase letters</span>
            </label>
            <span class="pg-char-example">a b c d e f</span>
          </div>
        </div>

        <div class="pg-char-type" id="ct-numbers">
          <div class="pg-char-type-left">
            <label class="pg-char-toggle">
              <input type="checkbox" id="pg-numbers" checked>
              <span class="pg-char-type-name">Numbers</span>
            </label>
            <span class="pg-char-example">0 1 2 3 4 5</span>
          </div>
        </div>

        <div class="pg-char-type" id="ct-symbols">
          <div class="pg-char-type-left">
            <label class="pg-char-toggle">
              <input type="checkbox" id="pg-symbols" checked>
              <span class="pg-char-type-name">Symbols</span>
            </label>
            <span class="pg-char-example">! @ # $ % ^</span>
          </div>
        </div>

        <div class="pg-char-type" id="ct-noambig">
          <div class="pg-char-type-left">
            <label class="pg-char-toggle">
              <input type="checkbox" id="pg-noambig">
              <span class="pg-char-type-name">Exclude ambiguous characters</span>
            </label>
            <span class="pg-char-example">0 O o l 1 I</span>
          </div>
        </div>
      </div>

      <!-- Count + generate -->
      <div class="pg-bottom-row">
        <div class="pg-count-wrap">
          <label class="pg-setting-label" for="pg-count">Generate</label>
          <div class="pg-count-input-wrap">
            <input type="number" id="pg-count" class="pg-length-num" value="1" min="1" max="20" aria-label="Number of passwords to generate">
            <span class="pg-count-label">password(s)</span>
          </div>
        </div>
        <button class="btn btn-primary" id="pg-generate">Generate</button>
      </div>

    </div>

    <!-- Multiple passwords output -->
    <div class="pg-multi-wrap hidden" id="pg-multi-wrap">
      <div class="pg-multi-header">
        <span class="pg-multi-title" id="pg-multi-title">Generated passwords</span>
        <button class="btn btn-ghost" id="pg-copy-all">Copy all</button>
      </div>
      <div class="pg-multi-list" id="pg-multi-list"></div>
    </div>

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

  <!-- SEO + GEO content -->
  <div class="tool-content mt-32">

    <h2>How to create a strong password</h2>
    <p>A strong password has four properties. It is long — at least 16 characters. It uses multiple character types — uppercase letters, lowercase letters, numbers, and symbols combined. It does not contain dictionary words, names, or personal information. And it is unique — never reused across different accounts. TextlyPop's password generator handles the first two automatically. Use a password manager to store the result and ensure uniqueness across all your accounts.</p>

    <h2>Cryptographically secure generation</h2>
    <p>TextlyPop uses the Web Crypto API's <code>crypto.getRandomValues()</code> function to generate passwords. This is cryptographically secure randomness — the same standard used in encryption software and security applications. It is significantly more unpredictable than standard <code>Math.random()</code> which most online password generators use. Your passwords are generated entirely in your browser, never transmitted to any server, and never stored anywhere.</p>

    <h2>Understanding password entropy</h2>
    <p>Entropy measures how unpredictable a password is, expressed in bits. A password with 80 bits of entropy would require an attacker to try on average 2^79 combinations to crack — approximately 600 quadrillion guesses. TextlyPop calculates entropy based on your character set size multiplied by the length. Enabling more character types increases the character set, which increases entropy even at the same password length. A 16-character password using all four character types has approximately 105 bits of entropy.</p>

    <h2>When to exclude ambiguous characters</h2>
    <p>The ambiguous characters option removes characters that look similar in certain fonts — the number zero and the letter O, the number one and the letters l and I. This is useful when you need to type the password manually rather than copying and pasting, for example when entering a Wi-Fi password on a TV or game console. For passwords you will always paste, there is no reason to exclude them — keeping them in increases your character set and improves entropy.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I generate a strong password?</p>
      <p class="faq-a">Set length to at least 16 characters, enable all four character types — uppercase, lowercase, numbers, and symbols — then click Generate. The strength meter will show Very strong.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is this password generator secure?</p>
      <p class="faq-a">Yes. TextlyPop uses the Web Crypto API for cryptographically secure generation. Passwords are generated in your browser and never sent to any server.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What makes a password strong?</p>
      <p class="faq-a">At least 12 characters long, a mix of uppercase, lowercase, numbers and symbols, no dictionary words or personal information, and unique across all your accounts.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I generate multiple passwords at once?</p>
      <p class="faq-a">Yes. Set the Count field to up to 20 and click Generate. Each password is independently generated with cryptographically secure randomness.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What do the password strength indicators mean?</p>
      <p class="faq-a">Strength is calculated from password entropy in bits. Weak is under 40 bits, Fair is 40-60 bits, Strong is 60-80 bits, and Very strong is over 80 bits. Higher entropy means more combinations an attacker would need to try.</p>
    </div>

  </div>

</div>

<!-- Password generator CSS -->
<style>
.pg-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Main display */
.pg-display {
  padding: 24px;
  border-bottom: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  gap: 14px;
  align-items: center;
  background: var(--bg);
}

.pg-password-wrap {
  display: flex;
  align-items: center;
  width: 100%;
  max-width: 600px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  overflow: hidden;
  transition: border-color var(--transition);
}

.pg-password-wrap:focus-within { border-color: var(--accent); }

.pg-password {
  flex: 1;
  padding: 12px 14px;
  border: none;
  background: transparent;
  font-family: var(--font-mono);
  font-size: 1rem;
  color: var(--text);
  outline: none;
  letter-spacing: 0.05em;
  min-width: 0;
}

.pg-refresh-btn {
  padding: 0 14px;
  height: 46px;
  border: none;
  border-left: 1px solid var(--border);
  background: var(--bg-2);
  color: var(--text-3);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: color var(--transition), background var(--transition);
  flex-shrink: 0;
}

.pg-refresh-btn:hover { color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .pg-refresh-btn:hover { background: var(--accent-dim); }

.pg-refresh-btn.spinning svg {
  animation: spin 0.4s ease;
}

@keyframes spin {
  from { transform: rotate(0deg); }
  to   { transform: rotate(360deg); }
}

/* Strength meter */
.pg-strength-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
  width: 100%;
  max-width: 600px;
}

.pg-strength-bar {
  flex: 1;
  height: 6px;
  background: var(--bg-3);
  border-radius: 3px;
  overflow: hidden;
}

.pg-strength-fill {
  height: 100%;
  border-radius: 3px;
  width: 0%;
  transition: width 0.3s ease, background 0.3s ease;
}

.pg-strength-fill.weak    { background: #e53e3e; }
.pg-strength-fill.fair    { background: #d69e2e; }
.pg-strength-fill.strong  { background: #38a169; }
.pg-strength-fill.vstrong { background: var(--accent); }

.pg-strength-label {
  font-size: 0.8125rem;
  font-weight: 600;
  min-width: 70px;
  white-space: nowrap;
}

.pg-strength-label.weak    { color: #e53e3e; }
.pg-strength-label.fair    { color: #d69e2e; }
.pg-strength-label.strong  { color: #38a169; }
.pg-strength-label.vstrong { color: var(--accent); }

.pg-entropy-label {
  font-size: 0.75rem;
  color: var(--text-3);
  white-space: nowrap;
}

.pg-copy-btn {
  gap: 7px;
  padding: 9px 22px;
}

/* Settings */
.pg-settings {
  padding: 20px;
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 16px;
}

/* Length row */
.pg-setting-row {
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
}

.pg-setting-label-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
}

.pg-setting-label {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text-2);
  white-space: nowrap;
}

.pg-length-num {
  width: 64px;
  padding: 5px 8px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  font-weight: 600;
  outline: none;
  text-align: center;
  transition: border-color var(--transition);
}

.pg-length-num:focus { border-color: var(--accent); }

.pg-slider {
  flex: 1;
  min-width: 160px;
  accent-color: var(--accent);
  cursor: pointer;
  height: 4px;
}

/* Character types */
.pg-char-types {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.pg-char-type {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg);
  transition: border-color var(--transition), background var(--transition);
}

.pg-char-type:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .pg-char-type:has(input:checked) { background: var(--accent-dim); }

.pg-char-type-left {
  display: flex;
  align-items: center;
  gap: 14px;
  flex: 1;
}

.pg-char-toggle {
  display: flex;
  align-items: center;
  gap: 8px;
  cursor: pointer;
  user-select: none;
}

.pg-char-toggle input[type="checkbox"] {
  accent-color: var(--accent);
  width: 15px;
  height: 15px;
  cursor: pointer;
  flex-shrink: 0;
}

.pg-char-type-name {
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--text);
}

.pg-char-example {
  font-size: 0.8125rem;
  color: var(--text-3);
  font-family: var(--font-mono);
  margin-left: auto;
}

/* Bottom row */
.pg-bottom-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  flex-wrap: wrap;
}

.pg-count-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
}

.pg-count-input-wrap {
  display: flex;
  align-items: center;
  gap: 6px;
}

.pg-count-label { font-size: 0.875rem; color: var(--text-2); }

/* Multi output */
.pg-multi-wrap {
  border-top: 1px solid var(--border);
}

.pg-multi-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
}

.pg-multi-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.pg-multi-list {
  display: flex;
  flex-direction: column;
}

.pg-multi-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
  border-bottom: 1px solid var(--border);
  gap: 12px;
}

.pg-multi-item:last-child { border-bottom: none; }

.pg-multi-pw {
  font-family: var(--font-mono);
  font-size: 0.9rem;
  color: var(--text);
  flex: 1;
  word-break: break-all;
}

.pg-multi-copy {
  font-size: 0.75rem;
  padding: 3px 8px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: transparent;
  color: var(--text-3);
  cursor: pointer;
  font-family: var(--font);
  flex-shrink: 0;
  transition: color var(--transition), border-color var(--transition);
}

.pg-multi-copy:hover { color: var(--accent); border-color: var(--accent); }
.pg-multi-copy.copied { color: var(--accent); border-color: var(--accent); }

@media (max-width: 640px) {
  .pg-display { padding: 16px; }
  .pg-char-example { display: none; }
  .pg-bottom-row { flex-direction: column; align-items: stretch; }
  .pg-bottom-row .btn { width: 100%; justify-content: center; }
}
</style>

<!-- Password generator JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var passwordEl  = document.getElementById('pg-password');
  var refreshBtn  = document.getElementById('pg-refresh');
  var copyBtn     = document.getElementById('pg-copy-btn');
  var generateBtn = document.getElementById('pg-generate');
  var slider      = document.getElementById('pg-length-slider');
  var lengthInput = document.getElementById('pg-length-input');
  var countInput  = document.getElementById('pg-count');
  var strengthFill= document.getElementById('pg-strength-fill');
  var strengthLbl = document.getElementById('pg-strength-label');
  var entropyLbl  = document.getElementById('pg-entropy-label');
  var multiWrap   = document.getElementById('pg-multi-wrap');
  var multiList   = document.getElementById('pg-multi-list');
  var multiTitle  = document.getElementById('pg-multi-title');
  var copyAllBtn  = document.getElementById('pg-copy-all');

  var optUpper   = document.getElementById('pg-upper');
  var optLower   = document.getElementById('pg-lower');
  var optNumbers = document.getElementById('pg-numbers');
  var optSymbols = document.getElementById('pg-symbols');
  var optNoAmbig = document.getElementById('pg-noambig');

  var UPPER   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  var LOWER   = 'abcdefghijklmnopqrstuvwxyz';
  var NUMBERS = '0123456789';
  var SYMBOLS = '!@#$%^&*()_+-=[]{}|;:,.<>?';
  var AMBIG   = /[0OoIl1]/g;

  /* Crypto-secure random */
  function secureRand(max) {
    if (window.crypto && window.crypto.getRandomValues) {
      var arr = new Uint32Array(1);
      var limit = Math.floor(0xFFFFFFFF / max) * max;
      do { window.crypto.getRandomValues(arr); } while (arr[0] >= limit);
      return arr[0] % max;
    }
    return Math.floor(Math.random() * max);
  }

  function buildCharset() {
    var charset = '';
    if (optUpper.checked)   charset += UPPER;
    if (optLower.checked)   charset += LOWER;
    if (optNumbers.checked) charset += NUMBERS;
    if (optSymbols.checked) charset += SYMBOLS;
    if (optNoAmbig.checked) charset = charset.replace(AMBIG, '');
    return charset;
  }

  function generateOne(length, charset) {
    if (!charset) return '';
    var pw = '';
    /* Guarantee at least one char from each enabled type */
    var required = [];
    if (optUpper.checked)   required.push(UPPER.replace(AMBIG,'')[secureRand(UPPER.replace(AMBIG,'').length || UPPER.length)]);
    if (optLower.checked)   required.push(LOWER.replace(AMBIG,'')[secureRand(LOWER.replace(AMBIG,'').length || LOWER.length)]);
    if (optNumbers.checked) required.push(NUMBERS.replace(AMBIG,'')[secureRand(NUMBERS.replace(AMBIG,'').length || NUMBERS.length)]);
    if (optSymbols.checked) required.push(SYMBOLS[secureRand(SYMBOLS.length)]);

    for (var i = required.length; i < length; i++) {
      required.push(charset[secureRand(charset.length)]);
    }

    /* Shuffle using Fisher-Yates */
    for (var i = required.length - 1; i > 0; i--) {
      var j = secureRand(i + 1);
      var tmp = required[i]; required[i] = required[j]; required[j] = tmp;
    }

    return required.slice(0, length).join('');
  }

  function calcEntropy(length, charsetSize) {
    if (!charsetSize) return 0;
    return Math.floor(length * Math.log2(charsetSize));
  }

  function updateStrength(entropy) {
    var label, cls, pct;
    if (entropy < 40)      { label = 'Weak';       cls = 'weak';    pct = 20; }
    else if (entropy < 60) { label = 'Fair';        cls = 'fair';    pct = 45; }
    else if (entropy < 80) { label = 'Strong';      cls = 'strong';  pct = 70; }
    else                   { label = 'Very strong'; cls = 'vstrong'; pct = 100; }

    strengthFill.className = 'pg-strength-fill ' + cls;
    strengthFill.style.width = pct + '%';
    strengthLbl.className = 'pg-strength-label ' + cls;
    strengthLbl.textContent = label;
    entropyLbl.textContent = entropy + ' bits';
  }

  function generate() {
    var charset = buildCharset();
    if (!charset) {
      passwordEl.value = 'Enable at least one character type';
      strengthLbl.textContent = '—';
      strengthFill.style.width = '0%';
      entropyLbl.textContent = '';
      return;
    }

    var length = Math.max(4, Math.min(128, parseInt(lengthInput.value) || 16));
    var count  = Math.max(1, Math.min(20, parseInt(countInput.value) || 1));

    /* Generate first password for main display */
    var pw = generateOne(length, charset);
    passwordEl.value = pw;

    /* Strength */
    var entropy = calcEntropy(length, charset.length);
    updateStrength(entropy);

    /* Multiple passwords */
    if (count > 1) {
      multiWrap.classList.remove('hidden');
      multiTitle.textContent = count + ' generated passwords';
      var all = [pw];
      for (var i = 1; i < count; i++) {
        all.push(generateOne(length, charset));
      }
      multiList.innerHTML = all.map(function(p, idx) {
        return '<div class="pg-multi-item">' +
          '<span class="pg-multi-pw">' + escapeHtml(p) + '</span>' +
          '<button class="pg-multi-copy" data-pw="' + escapeAttr(p) + '">Copy</button>' +
          '</div>';
      }).join('');

      /* Copy individual */
      multiList.querySelectorAll('.pg-multi-copy').forEach(function(btn) {
        btn.addEventListener('click', function() {
          navigator.clipboard.writeText(btn.dataset.pw).then(function() {
            btn.textContent = 'Copied!';
            btn.classList.add('copied');
            setTimeout(function(){ btn.textContent = 'Copy'; btn.classList.remove('copied'); }, 2000);
          });
        });
      });

      /* Store all for copy-all */
      copyAllBtn.dataset.all = all.join('\n');
    } else {
      multiWrap.classList.add('hidden');
    }

    /* Spin the refresh icon */
    refreshBtn.classList.add('spinning');
    setTimeout(function(){ refreshBtn.classList.remove('spinning'); }, 400);
  }

  function escapeHtml(s) { return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }
  function escapeAttr(s) { return s.replace(/"/g,'&quot;'); }

  /* Sync slider and number input */
  slider.addEventListener('input', function() {
    lengthInput.value = slider.value;
    generate();
  });

  lengthInput.addEventListener('input', function() {
    var v = Math.max(4, Math.min(128, parseInt(lengthInput.value) || 16));
    slider.value = Math.min(v, 64);
    generate();
  });

  /* Copy main password */
  copyBtn.addEventListener('click', function() {
    if (!passwordEl.value) return;
    navigator.clipboard.writeText(passwordEl.value).then(function() {
      copyBtn.innerHTML = '<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="2,8 6,12 14,4"/></svg> Copied!';
      setTimeout(function(){
        copyBtn.innerHTML = '<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><rect x="5" y="5" width="9" height="9" rx="1.5"/><path d="M11 5V3.5A1.5 1.5 0 0 0 9.5 2h-6A1.5 1.5 0 0 0 2 3.5v6A1.5 1.5 0 0 0 3.5 11H5"/></svg> Copy password';
      }, 2000);
    });
  });

  /* Copy all */
  copyAllBtn.addEventListener('click', function() {
    var all = copyAllBtn.dataset.all;
    if (!all) return;
    navigator.clipboard.writeText(all).then(function() {
      copyAllBtn.textContent = 'Copied!';
      setTimeout(function(){ copyAllBtn.textContent = 'Copy all'; }, 2000);
    });
  });

  /* Refresh button */
  refreshBtn.addEventListener('click', generate);
  generateBtn.addEventListener('click', generate);

  /* Char type changes */
  [optUpper, optLower, optNumbers, optSymbols, optNoAmbig, countInput].forEach(function(el) {
    el.addEventListener('change', generate);
  });

  /* Init */
  generate();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
