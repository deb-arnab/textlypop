<?php
$tool_slug   = 'roman-numeral-converter';
$tool_name   = 'Roman Numeral Converter';

$page_title  = 'Roman Numeral Converter — Convert Roman Numerals Online Free | TextlyPop';
$meta_desc   = 'Convert between Arabic numbers and Roman numerals instantly. Type a number or Roman numeral and get the conversion in real time. Free online Roman numeral converter.';
$canonical_url = 'https://textlypop.com/tools/roman-numeral-converter';
$og_title    = 'Free Roman Numeral Converter — TextlyPop';
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
  "name": "Roman Numeral Converter",
  "url": "https://textlypop.com/tools/roman-numeral-converter",
  "description": "Convert between Arabic numbers and Roman numerals instantly.",
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
      "name": "How do I convert a number to Roman numerals?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Type any number between 1 and 3999 into the Arabic number field and the Roman numeral equivalent appears instantly. For example 2024 converts to MMXXIV."
      }
    },
    {
      "@type": "Question",
      "name": "What is 2024 in Roman numerals?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "2024 in Roman numerals is MMXXIV. MM = 2000, XX = 20, IV = 4."
      }
    },
    {
      "@type": "Question",
      "name": "What is XIV in numbers?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "XIV in numbers is 14. X = 10, IV = 4, so XIV = 10 + 4 = 14."
      }
    },
    {
      "@type": "Question",
      "name": "What are the basic Roman numeral symbols?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The seven basic Roman numeral symbols are I = 1, V = 5, X = 10, L = 50, C = 100, D = 500, and M = 1000. All Roman numerals are built from combinations of these seven symbols."
      }
    },
    {
      "@type": "Question",
      "name": "Why can Roman numerals only go up to 3999?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard Roman numerals go up to 3999 because MMM = 3000 is the highest thousands value using standard notation. Numbers 4000 and above would require a fourth M which is not part of standard Roman numeral rules."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Numbers to Roman Numerals',
  'description' => 'Convert between Arabic numbers and Roman numerals using TextlyPop Roman numeral converter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Choose direction','text'=>'Type in the Arabic number field to convert to Roman numerals, or type in the Roman numeral field to convert to a number.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'See the result','text'=>'The conversion appears instantly as you type. No button press needed.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Copy the result','text'=>'Click Copy next to either result to copy it to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Roman Numeral Converter','item'=>'https://textlypop.com/tools/roman-numeral-converter'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Roman numeral converter</h1>
    <p>Convert between Arabic numbers and Roman numerals instantly. Type either and get the other.</p>
  </div>

  <div class="rn-tool" id="rn-tool">

    <!-- Two-way converter -->
    <div class="rn-converter">

      <!-- Arabic → Roman -->
      <div class="rn-field">
        <label class="rn-label" for="rn-arabic">Arabic number</label>
        <div class="rn-input-wrap">
          <input
            type="number"
            id="rn-arabic"
            class="rn-input"
            placeholder="e.g. 2024"
            min="1"
            max="3999"
            aria-label="Arabic number to convert to Roman numerals">
        </div>
        <div class="rn-result-wrap">
          <div class="rn-result" id="rn-to-roman" aria-live="polite">—</div>
          <button class="btn btn-ghost rn-copy-btn" id="rn-copy-roman" title="Copy Roman numeral">Copy</button>
        </div>
        <div class="rn-hint" id="rn-arabic-hint">Enter a number between 1 and 3999</div>
      </div>

      <!-- Divider -->
      <div class="rn-divider" aria-hidden="true">
        <div class="rn-divider-line"></div>
        <span class="rn-divider-icon">⇄</span>
        <div class="rn-divider-line"></div>
      </div>

      <!-- Roman → Arabic -->
      <div class="rn-field">
        <label class="rn-label" for="rn-roman">Roman numeral</label>
        <div class="rn-input-wrap">
          <input
            type="text"
            id="rn-roman"
            class="rn-input rn-input-roman"
            placeholder="e.g. MMXXIV"
            maxlength="20"
            autocomplete="off"
            autocorrect="off"
            spellcheck="false"
            aria-label="Roman numeral to convert to Arabic number">
        </div>
        <div class="rn-result-wrap">
          <div class="rn-result" id="rn-to-arabic" aria-live="polite">—</div>
          <button class="btn btn-ghost rn-copy-btn" id="rn-copy-arabic" title="Copy number">Copy</button>
        </div>
        <div class="rn-hint" id="rn-roman-hint">Enter Roman numerals (I V X L C D M)</div>
      </div>

    </div>

    <!-- Quick examples -->
    <div class="rn-examples">
      <span class="rn-examples-label">Common conversions:</span>
      <div class="rn-example-chips">
        <button class="rn-example" data-arabic="1"    data-roman="I">I = 1</button>
        <button class="rn-example" data-arabic="4"    data-roman="IV">IV = 4</button>
        <button class="rn-example" data-arabic="9"    data-roman="IX">IX = 9</button>
        <button class="rn-example" data-arabic="14"   data-roman="XIV">XIV = 14</button>
        <button class="rn-example" data-arabic="40"   data-roman="XL">XL = 40</button>
        <button class="rn-example" data-arabic="50"   data-roman="L">L = 50</button>
        <button class="rn-example" data-arabic="90"   data-roman="XC">XC = 90</button>
        <button class="rn-example" data-arabic="100"  data-roman="C">C = 100</button>
        <button class="rn-example" data-arabic="400"  data-roman="CD">CD = 400</button>
        <button class="rn-example" data-arabic="500"  data-roman="D">D = 500</button>
        <button class="rn-example" data-arabic="900"  data-roman="CM">CM = 900</button>
        <button class="rn-example" data-arabic="1000" data-roman="M">M = 1000</button>
        <button class="rn-example" data-arabic="1999" data-roman="MCMXCIX">MCMXCIX = 1999</button>
        <button class="rn-example" data-arabic="2024" data-roman="MMXXIV">MMXXIV = 2024</button>
        <button class="rn-example" data-arabic="3999" data-roman="MMMCMXCIX">MMMCMXCIX = 3999</button>
      </div>
    </div>

    <!-- Reference table -->
    <div class="rn-reference">
      <div class="rn-ref-header">
        <span class="rn-ref-title">Roman numeral reference</span>
        <button class="rn-ref-toggle" id="rn-ref-toggle">Show</button>
      </div>
      <div class="rn-ref-grid hidden" id="rn-ref-grid">
        <div class="rn-ref-row rn-ref-head">
          <span>Symbol</span><span>Value</span><span>Symbol</span><span>Value</span>
        </div>
        <div class="rn-ref-row"><span class="rn-ref-sym">I</span><span>1</span><span class="rn-ref-sym">L</span><span>50</span></div>
        <div class="rn-ref-row"><span class="rn-ref-sym">IV</span><span>4</span><span class="rn-ref-sym">C</span><span>100</span></div>
        <div class="rn-ref-row"><span class="rn-ref-sym">V</span><span>5</span><span class="rn-ref-sym">CD</span><span>400</span></div>
        <div class="rn-ref-row"><span class="rn-ref-sym">IX</span><span>9</span><span class="rn-ref-sym">D</span><span>500</span></div>
        <div class="rn-ref-row"><span class="rn-ref-sym">X</span><span>10</span><span class="rn-ref-sym">CM</span><span>900</span></div>
        <div class="rn-ref-row"><span class="rn-ref-sym">XL</span><span>40</span><span class="rn-ref-sym">M</span><span>1000</span></div>
      </div>
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

  <!-- SEO content -->
  <div class="tool-content mt-32">

    <h2>How Roman numerals work</h2>
    <p>Roman numerals use seven symbols to represent numbers. The symbols are I (1), V (5), X (10), L (50), C (100), D (500), and M (1000). Numbers are formed by combining these symbols. Generally larger values are written before smaller ones and you add their values together — so VIII means 5 + 1 + 1 + 1 = 8 and LXII means 50 + 10 + 1 + 1 = 62.</p>
    <p>The subtractive principle handles the four values that would otherwise require four of the same symbol in a row. Instead of IIII for 4, Romans wrote IV meaning 5 minus 1. Instead of VIIII for 9, they wrote IX. The six subtractive combinations are IV (4), IX (9), XL (40), XC (90), CD (400), and CM (900). These are the building blocks that make the system work.</p>

    <h2>What is 2024 in Roman numerals</h2>
    <p>2024 in Roman numerals is MMXXIV. Breaking it down: MM = 2000, XX = 20, IV = 4. So 2024 = MM + XX + IV = MMXXIV. This is the format commonly used for copyright years, movie release years, and event dates where Roman numerals are traditionally used.</p>

    <h2>Common uses for Roman numerals today</h2>
    <p>Roman numerals appear in copyright notices on films, television shows, and books. Sporting events like the Super Bowl and Olympic Games use Roman numerals for edition numbers. Clock and watch faces frequently use Roman numerals for hours. Chapter and section numbers in books, legal documents, and formal outlines use Roman numerals. Monarchs and popes use Roman numerals to distinguish rulers with the same name — Henry VIII, Pope John Paul II. Architectural inscriptions and monuments display years in Roman numerals.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert a number to Roman numerals?</p>
      <p class="faq-a">Type any number between 1 and 3999 into the Arabic number field and the Roman numeral appears instantly. For example 2024 converts to MMXXIV.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is 2024 in Roman numerals?</p>
      <p class="faq-a">2024 in Roman numerals is MMXXIV. MM = 2000, XX = 20, IV = 4.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is XIV in numbers?</p>
      <p class="faq-a">XIV in numbers is 14. X = 10, IV = 4, so XIV = 10 + 4 = 14.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What are the basic Roman numeral symbols?</p>
      <p class="faq-a">I = 1, V = 5, X = 10, L = 50, C = 100, D = 500, M = 1000. All Roman numerals are built from these seven symbols.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why can Roman numerals only go up to 3999?</p>
      <p class="faq-a">Standard Roman numerals top out at 3999 (MMMCMXCIX) because MMM = 3000 is the maximum using standard notation. Numbers from 4000 up require non-standard extensions.</p>
    </div>

  </div>

</div>

<!-- Roman numeral CSS -->
<style>
.rn-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Converter layout */
.rn-converter {
  display: grid;
  grid-template-columns: 1fr auto 1fr;
  gap: 0;
  border-bottom: 1px solid var(--border);
}

.rn-field {
  padding: 28px 24px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.rn-label {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-3);
}

.rn-input-wrap { position: relative; }

.rn-input {
  width: 100%;
  padding: 12px 16px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font);
  font-size: 1.125rem;
  outline: none;
  transition: border-color var(--transition);
}

.rn-input:focus { border-color: var(--accent); background: var(--bg); }
.rn-input::placeholder { color: var(--text-3); font-size: 0.9375rem; }

.rn-input-roman {
  font-family: var(--font-mono);
  letter-spacing: 0.08em;
  text-transform: uppercase;
  font-size: 1.0625rem;
}

/* Result display */
.rn-result-wrap {
  display: flex;
  align-items: center;
  gap: 12px;
  min-height: 56px;
}

.rn-result {
  flex: 1;
  font-size: clamp(1.5rem, 4vw, 2.5rem);
  font-weight: 700;
  color: var(--accent);
  font-family: var(--font-mono);
  letter-spacing: 0.04em;
  line-height: 1.2;
  word-break: break-all;
  transition: transform 0.15s ease, opacity 0.15s ease;
}

.rn-result.pop { transform: scale(1.04); }
.rn-result.error { color: var(--danger); font-size: 0.9375rem; font-family: var(--font); font-weight: 500; }

.rn-copy-btn {
  flex-shrink: 0;
  font-size: 0.8125rem;
  padding: 5px 12px;
  opacity: 0;
  pointer-events: none;
  transition: opacity var(--transition);
}

.rn-result-wrap:has(.rn-result:not(:empty)) .rn-copy-btn,
.rn-copy-btn.visible { opacity: 1; pointer-events: auto; }

.rn-hint {
  font-size: 0.75rem;
  color: var(--text-3);
}

/* Divider */
.rn-divider {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px 0;
  border-left: 1px solid var(--border);
  border-right: 1px solid var(--border);
  width: 52px;
  gap: 8px;
}

.rn-divider-line {
  flex: 1;
  width: 1px;
  background: var(--border-2);
}

.rn-divider-icon {
  font-size: 1.25rem;
  color: var(--text-3);
}

/* Examples */
.rn-examples {
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}

.rn-examples-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

.rn-example-chips { display: flex; flex-wrap: wrap; gap: 6px; }

.rn-example {
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

.rn-example:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .rn-example:hover { background: var(--accent-dim); }

/* Reference table */
.rn-reference { border-top: 1px solid var(--border); background: var(--bg-2); }

.rn-ref-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
}

.rn-ref-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.rn-ref-toggle {
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

.rn-ref-toggle:hover { color: var(--accent); border-color: var(--accent); }

.rn-ref-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  border-top: 1px solid var(--border);
  gap: 0;
}

.rn-ref-row {
  display: contents;
}

.rn-ref-row > span {
  padding: 9px 16px;
  border-bottom: 1px solid var(--border);
  font-size: 0.875rem;
  color: var(--text-2);
  border-right: 1px solid var(--border);
}

.rn-ref-row > span:nth-child(2),
.rn-ref-row > span:last-child { border-right: none; }

.rn-ref-head > span {
  font-size: 0.7rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  background: var(--bg-3);
}

.rn-ref-sym {
  font-family: var(--font-mono);
  font-weight: 700;
  color: var(--accent) !important;
  font-size: 1rem !important;
}

@media (max-width: 600px) {
  .rn-converter { grid-template-columns: 1fr; }
  .rn-divider { flex-direction: row; width: 100%; height: 40px; padding: 0 20px; border-left: none; border-right: none; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
  .rn-divider-line { flex: 1; height: 1px; width: auto; }
  .rn-field { padding: 20px 16px; }
}
</style>

<!-- Roman numeral JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var arabicInput = document.getElementById('rn-arabic');
  var romanInput  = document.getElementById('rn-roman');
  var toRoman     = document.getElementById('rn-to-roman');
  var toArabic    = document.getElementById('rn-to-arabic');
  var copyRoman   = document.getElementById('rn-copy-roman');
  var copyArabic  = document.getElementById('rn-copy-arabic');
  var arabicHint  = document.getElementById('rn-arabic-hint');
  var romanHint   = document.getElementById('rn-roman-hint');
  var refToggle   = document.getElementById('rn-ref-toggle');
  var refGrid     = document.getElementById('rn-ref-grid');

  /* ── Conversion tables ── */
  var VALS = [
    [1000,'M'],[900,'CM'],[500,'D'],[400,'CD'],
    [100,'C'],[90,'XC'],[50,'L'],[40,'XL'],
    [10,'X'],[9,'IX'],[5,'V'],[4,'IV'],[1,'I']
  ];

  var ROMAN_VALS = {
    I:1, V:5, X:10, L:50, C:100, D:500, M:1000
  };

  /* ── Arabic → Roman ── */
  function toRomanNumeral(n) {
    if (!Number.isInteger(n) || n < 1 || n > 3999) return null;
    var result = '';
    for (var i = 0; i < VALS.length; i++) {
      while (n >= VALS[i][0]) {
        result += VALS[i][1];
        n -= VALS[i][0];
      }
    }
    return result;
  }

  /* ── Roman → Arabic ── */
  function fromRomanNumeral(str) {
    str = str.toUpperCase().trim();
    if (!str) return null;
    if (!/^[IVXLCDM]+$/.test(str)) return null;

    var result = 0;
    for (var i = 0; i < str.length; i++) {
      var curr = ROMAN_VALS[str[i]];
      var next = ROMAN_VALS[str[i + 1]];
      if (!curr) return null;
      if (next && curr < next) {
        result -= curr;
      } else {
        result += curr;
      }
    }

    /* Validate by converting back — catches invalid sequences like IIII */
    if (toRomanNumeral(result) !== str) return null;
    return result;
  }

  /* ── Animate pop ── */
  function pop(el) {
    el.classList.remove('pop');
    void el.offsetWidth;
    el.classList.add('pop');
    setTimeout(function(){ el.classList.remove('pop'); }, 150);
  }

  /* ── Copy helper ── */
  function copyText(btn, text) {
    if (!text || text === '—') return;
    navigator.clipboard.writeText(text).then(function() {
      var orig = btn.textContent;
      btn.textContent = 'Copied!';
      setTimeout(function(){ btn.textContent = orig; }, 2000);
    });
  }

  /* ── Arabic input handler ── */
  arabicInput.addEventListener('input', function() {
    var val = parseInt(arabicInput.value);
    toRoman.className = 'rn-result';

    if (!arabicInput.value.trim()) {
      toRoman.textContent = '—';
      copyRoman.classList.remove('visible');
      arabicHint.textContent = 'Enter a number between 1 and 3999';
      return;
    }

    if (isNaN(val) || val < 1 || val > 3999) {
      toRoman.textContent = 'Enter 1 – 3999';
      toRoman.classList.add('error');
      copyRoman.classList.remove('visible');
      arabicHint.textContent = 'Valid range is 1 to 3999';
      return;
    }

    var roman = toRomanNumeral(val);
    toRoman.textContent = roman;
    pop(toRoman);
    copyRoman.classList.add('visible');
    arabicHint.textContent = val.toLocaleString() + ' in Roman numerals';
  });

  /* ── Roman input handler ── */
  romanInput.addEventListener('input', function() {
    romanInput.value = romanInput.value.toUpperCase().replace(/[^IVXLCDM]/g, '');
    var val = romanInput.value;
    toArabic.className = 'rn-result';

    if (!val) {
      toArabic.textContent = '—';
      copyArabic.classList.remove('visible');
      romanHint.textContent = 'Enter Roman numerals (I V X L C D M)';
      return;
    }

    var num = fromRomanNumeral(val);
    if (num === null) {
      toArabic.textContent = 'Invalid Roman numeral';
      toArabic.classList.add('error');
      copyArabic.classList.remove('visible');
      romanHint.textContent = 'Check your Roman numeral — use I V X L C D M only';
      return;
    }

    toArabic.textContent = num.toLocaleString();
    pop(toArabic);
    copyArabic.classList.add('visible');
    romanHint.textContent = val + ' = ' + num.toLocaleString();
  });

  /* ── Copy buttons ── */
  copyRoman.addEventListener('click', function() {
    copyText(copyRoman, toRoman.textContent);
  });

  copyArabic.addEventListener('click', function() {
    copyText(copyArabic, toArabic.textContent.replace(/,/g,''));
  });

  /* ── Example chips ── */
  document.querySelectorAll('.rn-example').forEach(function(btn) {
    btn.addEventListener('click', function() {
      arabicInput.value = btn.dataset.arabic;
      romanInput.value  = '';
      arabicInput.dispatchEvent(new Event('input'));
      arabicInput.focus();
    });
  });

  /* ── Reference toggle ── */
  refToggle.addEventListener('click', function() {
    var hidden = refGrid.classList.toggle('hidden');
    refToggle.textContent = hidden ? 'Show' : 'Hide';
  });

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
