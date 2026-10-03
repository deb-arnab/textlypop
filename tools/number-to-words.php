<?php
$tool_slug   = 'number-to-words';
$tool_name   = 'Number to Words Converter';

$page_title  = 'Number to Words — Convert Numbers to Words | TextlyPop';
$meta_desc   = 'Convert numbers to words instantly. Turn 1234 into one thousand two hundred thirty-four. Supports up to trillions. Free online number to words converter.';
$canonical_url = 'https://textlypop.com/tools/number-to-words';
$og_title    = 'Free Number to Words Converter — TextlyPop';
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
  "name": "Number to Words Converter",
  "url": "https://textlypop.com/tools/number-to-words",
  "description": "Convert numbers to words instantly. Supports integers up to trillions and decimal numbers.",
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
      "name": "How do I convert a number to words?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Type or paste any number and the written form appears instantly — integers and decimals up to the trillions. Four modes cover the common conventions: standard words for prose, Currency for check amounts, Ordinal for rankings (21 → twenty-first), and Year for dates (1984 → nineteen eighty-four)."
      }
    },
    {
      "@type": "Question",
      "name": "How do you write 1000 in words?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "One thousand. 1001 is one thousand one, 1100 is one thousand one hundred, 1234 is one thousand two hundred thirty-four. Formal American style omits 'and' inside whole numbers, reserving it for the decimal point in currency amounts; British usage traditionally includes it."
      }
    },
    {
      "@type": "Question",
      "name": "How do you write 1000000 in words?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "One million — six zeros. Each new name adds three zeros: one billion (9 zeros), one trillion (12). Combinations read naturally once grouped: 1,500,000 is one million five hundred thousand. The converter handles the grouping automatically, which is where manual spelling usually goes wrong."
      }
    },
    {
      "@type": "Question",
      "name": "Can I convert decimal numbers to words?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. In standard mode the decimal part is read digit by digit after 'point' — 3.14 becomes three point one four. For money, Currency mode turns 1234.56 into one thousand two hundred thirty-four dollars and fifty-six cents, the format expected on a check."
      }
    },
    {
      "@type": "Question",
      "name": "Is one billion the same everywhere in the world?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Today, almost — but historically no. English now uses the short scale, where a billion is a thousand million. Britain used the long scale until 1974, where a billion meant a million million and 10⁹ was a milliard — a word still used in French and German. This converter uses the modern short scale throughout."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert a Number to Words',
  'description' => 'Convert any number to its word equivalent using TextlyPop number to words converter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Enter your number','text'=>'Type any number into the input field. The word equivalent appears instantly below as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Choose format options','text'=>'Select American or British English format, enable currency mode for dollar and cent amounts, or use ordinal mode for first, second, third style numbers.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Copy the result','text'=>'Click Copy to copy the words to your clipboard ready to paste into your document.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Number to Words Converter','item'=>'https://textlypop.com/tools/number-to-words'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Number to words converter</h1>
    <p>Convert any number to its word equivalent instantly. Supports integers, decimals and currency.</p>
  </div>

  <div class="ntw-tool" id="ntw-tool">

    <!-- Input -->
    <div class="ntw-input-wrap">
      <input
        type="text"
        id="ntw-input"
        class="ntw-input"
        placeholder="Enter a number… e.g. 1234 or 3.14"
        aria-label="Number to convert to words"
        autocomplete="off"
        inputmode="decimal">
      <button class="btn btn-clear" id="ntw-clear" aria-label="Clear">Clear</button>
    </div>

    <!-- Options -->
    <div class="ntw-options">
      <div class="ntw-opt-group" role="group" aria-label="Format options">
        <button class="ntw-opt-btn active" data-opt="standard" aria-pressed="true">Standard</button>
        <button class="ntw-opt-btn" data-opt="currency" aria-pressed="false">Currency ($)</button>
        <button class="ntw-opt-btn" data-opt="ordinal" aria-pressed="false">Ordinal (1st, 2nd…)</button>
        <button class="ntw-opt-btn" data-opt="year" aria-pressed="false">Year</button>
      </div>
      <label class="ntw-and-label">
        <input type="checkbox" id="ntw-use-and" checked>
        <span>Use "and" (one hundred and five)</span>
      </label>
    </div>

    <!-- Result -->
    <div class="ntw-result-wrap" id="ntw-result-wrap">
      <div class="ntw-result-empty" id="ntw-result-empty">
        <span class="ntw-result-hint">Enter a number above to see it in words</span>
      </div>
      <div class="ntw-result-main hidden" id="ntw-result-main">
        <div class="ntw-result-text" id="ntw-result-text" aria-live="polite"></div>
        <div class="ntw-result-actions">
          <span class="ntw-result-info" id="ntw-result-info"></span>
          <button class="btn btn-primary" id="ntw-copy-btn">Copy</button>
        </div>
      </div>
      <div class="ntw-error hidden" id="ntw-error" role="alert"></div>
    </div>

    <!-- Examples -->
    <div class="ntw-examples">
      <span class="ntw-examples-label">Try:</span>
      <div class="ntw-example-btns">
        <button class="ntw-example" data-val="42">42</button>
        <button class="ntw-example" data-val="100">100</button>
        <button class="ntw-example" data-val="1000">1,000</button>
        <button class="ntw-example" data-val="1234567">1,234,567</button>
        <button class="ntw-example" data-val="1000000000">1 billion</button>
        <button class="ntw-example" data-val="3.14">3.14</button>
        <button class="ntw-example" data-val="99.99">$99.99</button>
        <button class="ntw-example" data-val="-42">-42</button>
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

  <!-- SEO + GEO content -->
  <div class="tool-content mt-32">

    <h2>When to write numbers in words</h2>
    <p>Most writing style guides including AP Style, Chicago Manual of Style, and APA have rules about when to spell out numbers. AP Style spells out numbers one through nine and uses numerals for 10 and above. Chicago spells out numbers one through one hundred. In formal and legal writing numbers in contracts and checks are written in words to prevent alteration — a check for $1,234.56 also states "one thousand two hundred thirty-four dollars and fifty-six cents". Legal documents routinely spell out numbers to remove ambiguity.</p>

    <h2>Numbers written out in words</h2>
    <p>Paste any figure above to convert a number to words instantly, in standard, currency, ordinal or year form. The examples below show the pattern the converter follows, including the places where English spelling is less obvious than it looks — the hyphen in compound tens, the absence of "and" in US usage, and the way place values stack up at each comma.</p>
    <div class="table-scroll">
      <table class="seo-table">
        <thead>
          <tr><th>Number</th><th>In words</th></tr>
        </thead>
        <tbody>
          <tr><td>7</td><td>seven</td></tr>
          <tr><td>13</td><td>thirteen</td></tr>
          <tr><td>40</td><td>forty <em>(no u)</em></td></tr>
          <tr><td>45</td><td>forty-five <em>(hyphenated)</em></td></tr>
          <tr><td>100</td><td>one hundred</td></tr>
          <tr><td>250</td><td>two hundred fifty</td></tr>
          <tr><td>1,000</td><td>one thousand</td></tr>
          <tr><td>1,234</td><td>one thousand two hundred thirty-four</td></tr>
          <tr><td>10,000</td><td>ten thousand</td></tr>
          <tr><td>29,125</td><td>twenty-nine thousand one hundred twenty-five</td></tr>
          <tr><td>100,000</td><td>one hundred thousand</td></tr>
          <tr><td>1,000,000</td><td>one million</td></tr>
          <tr><td>1,500,000</td><td>one million five hundred thousand</td></tr>
          <tr><td>1,000,000,000</td><td>one billion</td></tr>
        </tbody>
      </table>
    </div>
    <p>Two conventions differ by region and are worth knowing before you copy a figure into a formal document. British usage inserts "and" before the final part — "one thousand two hundred <em>and</em> thirty-four" — where American usage omits it. And the hyphen is not optional: every compound number from twenty-one to ninety-nine takes one, so "forty-five" is correct and "forty five" is not.</p>

    <h2>Converting decimals and digits</h2>
    <p>Decimal numbers are read digit by digit after the point rather than as a whole number, which is why 3.14 is "three point one four" and not "three point fourteen". The rule exists to remove ambiguity: read as a whole number, 3.14 and 3.140 would sound identical despite differing in precision. Currency is the standard exception — 1234.56 becomes "one thousand two hundred thirty-four dollars and fifty-six cents", because the decimal part is a count of cents rather than a string of digits.</p>
    <p>Reading a figure strictly digit by digit is a separate convention used for phone numbers, reference codes, card numbers and years spoken aloud, where 2024 is "twenty twenty-four" rather than "two thousand twenty-four". Year mode handles that form.</p>

    <h2>Currency conversion</h2>
    <p>Enable currency mode to convert dollar amounts to their written form for checks, invoices, and legal documents. The amount 1234.56 becomes "one thousand two hundred thirty-four dollars and fifty-six cents". Amounts with no cents show as "and no cents" or simply omit the cent portion depending on convention. Currency mode handles values up to trillions making it suitable for both everyday checks and large commercial transactions.</p>

    <h2>Ordinal numbers</h2>
    <p>Ordinal numbers express position or rank — first, second, third, fourth. Switch to Ordinal mode to convert any number to its ordinal word form. 1 becomes first, 2 becomes second, 21 becomes twenty-first, 100 becomes one hundredth. Ordinal numbers are used in dates, rankings, sports results, and any context where position matters rather than quantity.</p>

    <h2>Year format</h2>
    <p>Years are read differently from regular numbers. 1984 is read as "nineteen eighty-four" not "one thousand nine hundred eighty-four". 2024 is "twenty twenty-four". Switch to Year mode to convert any four-digit year to its spoken form. Years from 1100 to 1999 and 2000 to 2099 follow different patterns which the converter handles automatically.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert a number to words?</p>
      <p class="faq-a">Type or paste any number and the written form appears instantly — integers and decimals up to the trillions. Four modes cover the common conventions: standard words for prose, Currency for check and invoice amounts, Ordinal for rankings (21 → twenty-first), and Year for dates (1984 → nineteen eighty-four). Pick the mode that matches your destination, because the same digits are written differently in each context.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do you write 1000 in words?</p>
      <p class="faq-a">One thousand. The pattern extends naturally: 1001 is one thousand one, 1100 is one thousand one hundred, and 1234 is one thousand two hundred thirty-four. Note that formal American style omits "and" inside whole numbers — "one thousand two hundred", not "one thousand and two hundred" — reserving "and" for the decimal point in currency amounts. British usage traditionally includes the "and", which is why you will see both forms in the wild.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do you write 1000000 in words?</p>
      <p class="faq-a">One million — six zeros. From there each new name adds three zeros: one billion (9 zeros), one trillion (12 zeros). Combinations read naturally once the groups are separated: 1,500,000 is one million five hundred thousand, and 2,048,730 is two million forty-eight thousand seven hundred thirty. The converter handles the grouping automatically, which is exactly where manual spelling of large numbers usually goes wrong.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I convert decimal numbers to words?</p>
      <p class="faq-a">Yes. In standard mode the decimal part is read digit by digit after the word "point" — 3.14 becomes three point one four, matching how numbers are spoken aloud in technical and scientific contexts. For money, switch to Currency mode instead: 1234.56 becomes one thousand two hundred thirty-four dollars and fifty-six cents, the exact format expected on the written line of a check or in a contract.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is one billion the same everywhere in the world?</p>
      <p class="faq-a">Today, almost — but historically no. English now uses the "short scale", where a billion is a thousand million (10⁹). Britain officially used the "long scale" until 1974, where a billion meant a million million (10¹²) and 10⁹ was called a milliard — a word still used in French, German and many other languages. This converter uses the modern short scale throughout, so one billion always means 1,000,000,000. Worth remembering when reading older British documents or translating financial text.</p>
    </div>

  </div>

</div>

<!-- Number to words CSS -->
<style>
.ntw-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.ntw-input-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg);
}

.ntw-input {
  flex: 1;
  padding: 12px 16px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 1.125rem;
  outline: none;
  transition: border-color var(--transition);
}

.ntw-input:focus { border-color: var(--accent); background: var(--bg); }
.ntw-input::placeholder { color: var(--text-3); font-family: var(--font); font-size: 0.9375rem; }

/* Options */
.ntw-options {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.ntw-opt-group { display: flex; gap: 6px; flex-wrap: wrap; }

.ntw-opt-btn {
  padding: 6px 14px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.8125rem;
  font-weight: 500;
  cursor: pointer;
  transition: border-color var(--transition), background var(--transition), color var(--transition);
}

.ntw-opt-btn:hover { border-color: var(--accent); color: var(--accent); }
.ntw-opt-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }

.ntw-and-label {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.8125rem;
  color: var(--text-2);
  cursor: pointer;
  user-select: none;
  margin-left: auto;
}

.ntw-and-label input[type="checkbox"] {
  accent-color: var(--accent);
  width: 14px;
  height: 14px;
  cursor: pointer;
}

/* Result */
.ntw-result-wrap {
  min-height: 120px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 24px 20px;
}

.ntw-result-empty { text-align: center; }

.ntw-result-hint {
  font-size: 0.9375rem;
  color: var(--text-3);
}

.ntw-result-main { width: 100%; }

.ntw-result-text {
  font-size: clamp(1.1rem, 3vw, 1.5rem);
  font-weight: 600;
  color: var(--accent);
  line-height: 1.4;
  margin-bottom: 16px;
  word-break: break-word;
}

.ntw-result-actions {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  flex-wrap: wrap;
}

.ntw-result-info {
  font-size: 0.8125rem;
  color: var(--text-3);
}

.ntw-error {
  color: var(--danger);
  font-size: 0.9375rem;
  text-align: center;
  padding: 12px;
}

/* Examples */
.ntw-examples {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 12px 16px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.ntw-examples-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

.ntw-example-btns { display: flex; gap: 6px; flex-wrap: wrap; }

.ntw-example {
  padding: 4px 12px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font-mono);
  font-size: 0.8125rem;
  cursor: pointer;
  transition: border-color var(--transition), color var(--transition), background var(--transition);
}

.ntw-example:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .ntw-example:hover { background: var(--accent-dim); }
</style>

<!-- Number to words JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('ntw-input');
  var clearBtn   = document.getElementById('ntw-clear');
  var resultEmpty= document.getElementById('ntw-result-empty');
  var resultMain = document.getElementById('ntw-result-main');
  var resultText = document.getElementById('ntw-result-text');
  var resultInfo = document.getElementById('ntw-result-info');
  var errorEl    = document.getElementById('ntw-error');
  var copyBtn    = document.getElementById('ntw-copy-btn');
  var useAnd     = document.getElementById('ntw-use-and');

  var currentOpt = 'standard';

  var ONES = ['','one','two','three','four','five','six','seven','eight','nine',
    'ten','eleven','twelve','thirteen','fourteen','fifteen','sixteen',
    'seventeen','eighteen','nineteen'];
  var TENS = ['','','twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety'];
  var ORDINAL_ONES = ['','first','second','third','fourth','fifth','sixth','seventh',
    'eighth','ninth','tenth','eleventh','twelfth','thirteenth','fourteenth',
    'fifteenth','sixteenth','seventeenth','eighteenth','nineteenth'];
  var ORDINAL_TENS = ['','','twentieth','thirtieth','fortieth','fiftieth',
    'sixtieth','seventieth','eightieth','ninetieth'];

  function convertHundreds(n, useAndWord) {
    var result = '';
    if (n >= 100) {
      result += ONES[Math.floor(n/100)] + ' hundred';
      n %= 100;
      if (n > 0) result += (useAndWord ? ' and ' : ' ');
    }
    if (n >= 20) {
      result += TENS[Math.floor(n/10)];
      if (n % 10 > 0) result += '-' + ONES[n % 10];
    } else if (n > 0) {
      result += ONES[n];
    }
    return result;
  }

  function numberToWords(n, useAndWord) {
    if (n === 0) return 'zero';
    if (n < 0) return 'negative ' + numberToWords(-n, useAndWord);

    var chunks = [
      { val: 1e12, name: 'trillion' },
      { val: 1e9,  name: 'billion'  },
      { val: 1e6,  name: 'million'  },
      { val: 1e3,  name: 'thousand' },
    ];

    var parts = [];
    for (var i = 0; i < chunks.length; i++) {
      if (n >= chunks[i].val) {
        var q = Math.floor(n / chunks[i].val);
        parts.push(convertHundreds(q, useAndWord) + ' ' + chunks[i].name);
        n %= chunks[i].val;
      }
    }

    if (n > 0) {
      if (parts.length && useAndWord && n < 100) {
        parts.push('and ' + convertHundreds(n, useAndWord));
      } else {
        parts.push(convertHundreds(n, useAndWord));
      }
    }

    return parts.join(', ').replace(/, and /, ' and ');
  }

  function toOrdinal(n) {
    if (n <= 0 || !Number.isInteger(n)) return null;
    if (n < 20) return ORDINAL_ONES[n];
    var tens = Math.floor(n / 10);
    var ones = n % 10;
    if (ones === 0) return ORDINAL_TENS[tens];
    return TENS[tens] + '-' + ORDINAL_ONES[ones];
  }

  function numberToOrdinal(n) {
    if (n < 0) return null;
    if (n === 0) return 'zeroth';
    var chunks = [
      { val: 1e12, name: 'trillion' },
      { val: 1e9,  name: 'billion'  },
      { val: 1e6,  name: 'million'  },
      { val: 1e3,  name: 'thousand' },
    ];

    for (var i = 0; i < chunks.length; i++) {
      if (n >= chunks[i].val) {
        var q = Math.floor(n / chunks[i].val);
        var r = n % chunks[i].val;
        var prefix = convertHundreds(q, false) + ' ' + chunks[i].name;
        if (r === 0) return prefix + 'th';
        return prefix + ' ' + numberToOrdinal(r);
      }
    }

    /* Under 1000 */
    if (n >= 100) {
      var h = Math.floor(n / 100);
      var rem = n % 100;
      if (rem === 0) return ONES[h] + ' hundredth';
      return ONES[h] + ' hundred ' + numberToOrdinal(rem);
    }

    var result = toOrdinal(n);
    return result || numberToWords(n, false) + 'th';
  }

  function yearToWords(n) {
    if (n < 1000 || n > 9999) return numberToWords(n, false);
    var century = Math.floor(n / 100);
    var remainder = n % 100;
    if (remainder === 0) {
      if (century % 10 === 0) return numberToWords(Math.floor(century/10), false) + ' hundred';
      return numberToWords(century, false) + ' hundred';
    }
    if (remainder < 10) {
      return numberToWords(century, false) + ' oh ' + ONES[remainder];
    }
    return numberToWords(century, false) + ' ' + numberToWords(remainder, false);
  }

  function convert() {
    var raw = input.value.replace(/,/g, '').trim();

    if (!raw) {
      showEmpty();
      return;
    }

    var num = parseFloat(raw);

    if (isNaN(num)) {
      showError('Please enter a valid number.');
      return;
    }

    if (Math.abs(num) > 999999999999999) {
      showError('Number too large. Maximum supported value is 999 trillion.');
      return;
    }

    errorEl.classList.add('hidden');
    var useAndWord = useAnd.checked;
    var result, info;

    try {
      if (currentOpt === 'currency') {
        var dollars = Math.floor(Math.abs(num));
        var cents   = Math.round((Math.abs(num) - dollars) * 100);
        var dollarWords = numberToWords(dollars, useAndWord);
        var centWords   = cents > 0 ? numberToWords(cents, useAndWord) + ' cent' + (cents !== 1 ? 's' : '') : 'no cents';
        result = (num < 0 ? 'negative ' : '') + dollarWords + ' dollar' + (dollars !== 1 ? 's' : '') + ' and ' + centWords;
        info = '$' + Math.abs(num).toFixed(2);

      } else if (currentOpt === 'ordinal') {
        if (!Number.isInteger(num) || num < 0) {
          showError('Ordinal mode requires a positive whole number.');
          return;
        }
        result = numberToOrdinal(num);
        info = num.toLocaleString();

      } else if (currentOpt === 'year') {
        if (!Number.isInteger(num)) {
          showError('Year mode requires a whole number.');
          return;
        }
        result = yearToWords(Math.abs(num));
        if (num < 0) result = 'before common era ' + result;
        info = num.toString();

      } else {
        /* Standard */
        var intPart = Math.trunc(num);
        var decStr  = raw.includes('.') ? raw.split('.')[1] : null;

        result = numberToWords(intPart, useAndWord);

        if (decStr) {
          var digitWords = decStr.split('').map(function(d){ return ONES[parseInt(d)] || 'zero'; });
          result += ' point ' + digitWords.join(' ');
        }

        info = num.toLocaleString();
      }

      showResult(result, info);
    } catch(e) {
      showError('Could not convert this number. Please check the input.');
    }
  }

  function showResult(text, info) {
    resultEmpty.classList.add('hidden');
    errorEl.classList.add('hidden');
    resultMain.classList.remove('hidden');
    resultText.textContent = text;
    resultInfo.textContent = info;
  }

  function showEmpty() {
    resultEmpty.classList.remove('hidden');
    resultMain.classList.add('hidden');
    errorEl.classList.add('hidden');
  }

  function showError(msg) {
    resultEmpty.classList.add('hidden');
    resultMain.classList.add('hidden');
    errorEl.classList.remove('hidden');
    errorEl.textContent = msg;
  }

  /* Events */
  input.addEventListener('input', convert);

  clearBtn.addEventListener('click', function() {
    input.value = '';
    showEmpty();
    input.focus();
  });

  document.querySelectorAll('.ntw-opt-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.ntw-opt-btn').forEach(function(b){ b.classList.remove('active'); b.setAttribute('aria-pressed','false'); });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed','true');
      currentOpt = btn.dataset.opt;
      convert();
    });
  });

  useAnd.addEventListener('change', convert);

  copyBtn.addEventListener('click', function() {
    var text = resultText.textContent;
    if (!text) return;
    navigator.clipboard.writeText(text).then(function() {
      copyBtn.textContent = 'Copied!';
      setTimeout(function(){ copyBtn.textContent = 'Copy'; }, 2000);
    });
  });

  document.querySelectorAll('.ntw-example').forEach(function(btn) {
    btn.addEventListener('click', function() {
      input.value = btn.dataset.val.replace(/[,$]/g,'');
      convert();
      input.focus();
    });
  });

  input.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') convert();
  });

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
