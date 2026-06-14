<?php
$tool_slug   = 'palindrome-checker';
$tool_name   = 'Palindrome Checker';

$page_title  = 'Palindrome Checker — Check if Text is a Palindrome Online Free | TextlyPop';
$meta_desc   = 'Check if a word, phrase or sentence is a palindrome instantly. Ignores spaces, punctuation and case. Free online palindrome checker. No signup required.';
$canonical_url = 'https://textlypop.com/tools/palindrome-checker';
$og_title    = 'Free Online Palindrome Checker — TextlyPop';
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
  "name": "Palindrome Checker",
  "url": "https://textlypop.com/tools/palindrome-checker",
  "description": "Check if a word, phrase or sentence is a palindrome. Ignores spaces, punctuation and case.",
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
      "name": "What is a palindrome?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A palindrome is a word, phrase, number, or sequence that reads the same forwards and backwards. Examples include the words racecar, level, and kayak, and the phrases 'A man a plan a canal Panama' and 'Never odd or even'."
      }
    },
    {
      "@type": "Question",
      "name": "Does the palindrome checker ignore spaces and punctuation?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. By default the checker ignores spaces, punctuation, and capitalization when determining if text is a palindrome. This means 'A man, a plan, a canal: Panama!' correctly checks as a palindrome. You can enable strict mode to check the exact characters as typed."
      }
    },
    {
      "@type": "Question",
      "name": "What are some famous palindromes?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Famous palindromes include words like racecar, level, madam, radar, and civic. Famous phrase palindromes include 'A man a plan a canal Panama', 'Never odd or even', 'Was it a car or a cat I saw', and 'Do geese see God'."
      }
    },
    {
      "@type": "Question",
      "name": "Can numbers be palindromes?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. A number is a palindrome if it reads the same forwards and backwards. Examples include 121, 1331, 12321, and 11. The palindrome checker works with numbers as well as text."
      }
    },
    {
      "@type": "Question",
      "name": "What is the longest palindrome word in English?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "One of the longest palindrome words in English is 'detartrated' at 11 letters. Other long palindrome words include 'rotavator' (9 letters), 'redivider' (9 letters), and 'racecar' (7 letters)."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Check if Text is a Palindrome',
  'description' => 'Check if a word, phrase or sentence reads the same forwards and backwards using TextlyPop palindrome checker.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Type or paste your text','text'=>'Enter the word, phrase, or sentence you want to check in the input box. The result updates instantly as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'View the result','text'=>'The tool shows whether your text is a palindrome with a clear yes or no result, the cleaned text used for comparison, and the reversed version.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Adjust options if needed','text'=>'By default spaces, punctuation, and capitalization are ignored. Enable Strict mode to check the exact characters as typed.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Try the examples','text'=>'Click any of the example palindromes to instantly check them and see how the tool works.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Palindrome Checker','item'=>'https://textlypop.com/tools/palindrome-checker'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Palindrome checker</h1>
    <p>Check if a word, phrase or sentence reads the same forwards and backwards. Results appear as you type.</p>
  </div>

  <div class="pc-tool" id="pc-tool">

    <!-- Input -->
    <div class="pc-input-wrap">
      <input
        type="text"
        id="pc-input"
        class="pc-input"
        placeholder="Type a word or phrase to check…"
        aria-label="Text to check for palindrome"
        autocomplete="off"
        spellcheck="false">

      <div class="pc-input-footer">
        <div class="pc-options" role="group" aria-label="Palindrome check options">
          <label class="pc-option">
            <input type="checkbox" id="pc-strict">
            <span>Strict mode — check exact characters</span>
          </label>
        </div>
        <button class="btn btn-clear" id="pc-clear-btn">Clear</button>
      </div>
    </div>

    <!-- Result -->
    <div class="pc-result" id="pc-result" aria-live="polite">

      <div class="pc-result-main hidden" id="pc-result-main">
        <div class="pc-verdict" id="pc-verdict">
          <div class="pc-verdict-icon" id="pc-verdict-icon" aria-hidden="true"></div>
          <div class="pc-verdict-text" id="pc-verdict-text"></div>
        </div>

        <div class="pc-comparison">
          <div class="pc-compare-row">
            <span class="pc-compare-label">Forward</span>
            <span class="pc-compare-value" id="pc-forward"></span>
          </div>
          <div class="pc-compare-row">
            <span class="pc-compare-label">Reversed</span>
            <span class="pc-compare-value" id="pc-reversed"></span>
          </div>
        </div>

        <div class="pc-meta" id="pc-meta"></div>
      </div>

      <div class="pc-empty" id="pc-empty">
        <div class="pc-empty-icon" aria-hidden="true">↔</div>
        <p>Type or paste any word, phrase or number above to check if it is a palindrome.</p>
      </div>

    </div>

    <!-- Examples -->
    <div class="pc-examples">
      <div class="pc-examples-label">Try an example:</div>
      <div class="pc-example-btns">
        <button class="pc-example" data-val="racecar">racecar</button>
        <button class="pc-example" data-val="level">level</button>
        <button class="pc-example" data-val="A man a plan a canal Panama">A man a plan a canal Panama</button>
        <button class="pc-example" data-val="Never odd or even">Never odd or even</button>
        <button class="pc-example" data-val="Was it a car or a cat I saw">Was it a car or a cat I saw</button>
        <button class="pc-example" data-val="hello">hello (not a palindrome)</button>
        <button class="pc-example" data-val="12321">12321</button>
        <button class="pc-example" data-val="Do geese see God">Do geese see God</button>
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

    <h2>What is a palindrome</h2>
    <p>A palindrome is a word, phrase, number, or sequence that reads the same forwards and backwards when you ignore spaces, punctuation, and capitalization. The word "racecar" is a palindrome because r-a-c-e-c-a-r reads identically from both ends. The phrase "A man a plan a canal Panama" is a palindrome because removing spaces and ignoring case gives you the same sequence of letters in both directions.</p>
    <p>Palindromes appear in mathematics, literature, music, and everyday language. They have been celebrated since ancient times — Greek and Latin writers composed palindromic poetry as demonstrations of linguistic skill. Today palindromes appear in word puzzles, brain teasers, programming exercises, and as a concept in DNA biology where certain DNA sequences read the same on both strands.</p>

    <h2>How the palindrome checker works</h2>
    <p>By default the checker strips all spaces and punctuation from your input and converts everything to lowercase before comparing the forward and reversed versions. This is the standard way to check palindromes because spaces and punctuation are not considered meaningful in classical palindrome definitions. "A man a plan a canal Panama" with spaces and punctuation removed becomes "amanaplanacanalpanama" which reads identically forwards and backwards.</p>
    <p>Enable Strict mode to check the exact characters as typed, including spaces, punctuation, and capitalization. In strict mode "racecar" is still a palindrome but "Racecar" is not, and "A man a plan a canal Panama" is not because of its spaces and mixed case.</p>

    <h2>Famous palindromes</h2>
    <p>The most famous single-word palindromes in English include racecar, level, madam, radar, civic, kayak, rotator, and noon. Famous phrase palindromes include "A man a plan a canal Panama" attributed to Leigh Mercer, "Never odd or even", "Was it a car or a cat I saw", "Do geese see God", and "Able was I ere I saw Elba" which is famously associated with Napoleon Bonaparte. The longest single-word palindromes in English include detartrated at 11 letters and redivider at 9 letters.</p>

    <h2>Palindromes in programming</h2>
    <p>Checking whether a string is a palindrome is one of the most common introductory programming exercises. It tests understanding of string manipulation, indexing, and comparison. The naive approach compares the string to its reverse. A more efficient approach uses two pointers starting at each end and moving toward the center, stopping if a mismatch is found. Palindrome checking appears in technical job interviews at software companies as a basic algorithm question.</p>

    <h2>Palindromic numbers</h2>
    <p>A palindromic number reads the same in both directions. Single digit numbers are all palindromes. Two-digit palindromes are 11, 22, 33 through 99. Three-digit palindromes include 101, 111, 121, 131 through 999. The palindrome checker works with numbers as well as words — enter any number to instantly check if it is palindromic.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is a palindrome?</p>
      <p class="faq-a">A palindrome reads the same forwards and backwards. Examples include the words racecar, level, and kayak, and phrases like "A man a plan a canal Panama" and "Never odd or even".</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the palindrome checker ignore spaces and punctuation?</p>
      <p class="faq-a">Yes by default. Spaces, punctuation, and capitalization are ignored so "A man, a plan, a canal: Panama!" correctly checks as a palindrome. Enable Strict mode to check exact characters.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What are some famous palindromes?</p>
      <p class="faq-a">Famous palindromes include racecar, level, madam, radar, and civic as words, and "A man a plan a canal Panama", "Never odd or even", and "Do geese see God" as phrases.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can numbers be palindromes?</p>
      <p class="faq-a">Yes. Numbers like 121, 1331, and 12321 are palindromes. The checker works with numbers as well as text.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the longest palindrome word in English?</p>
      <p class="faq-a">One of the longest is "detartrated" at 11 letters. Other long examples include "rotavator" and "redivider" at 9 letters each.</p>
    </div>

  </div>

</div>

<!-- Palindrome checker CSS -->
<style>
.pc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Input */
.pc-input-wrap {
  border-bottom: 1px solid var(--border);
}

.pc-input {
  width: 100%;
  padding: 18px 20px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 1.125rem;
  color: var(--text);
  outline: none;
}

.pc-input::placeholder { color: var(--text-3); }

.pc-input-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  gap: 10px;
}

.pc-options { display: flex; gap: 16px; }

.pc-option {
  display: flex;
  align-items: center;
  gap: 7px;
  font-size: 0.875rem;
  color: var(--text-2);
  cursor: pointer;
  user-select: none;
}

.pc-option input[type="checkbox"] {
  accent-color: var(--accent);
  width: 14px;
  height: 14px;
  cursor: pointer;
}

/* Result area */
.pc-result {
  min-height: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 32px 24px;
}

.pc-result-main { width: 100%; max-width: 520px; margin: 0 auto; }

/* Verdict */
.pc-verdict {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 24px;
}

.pc-verdict-icon {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.75rem;
  flex-shrink: 0;
  transition: background var(--transition);
}

.pc-verdict-icon.yes { background: var(--success-light); }
.pc-verdict-icon.no  { background: var(--danger-light); }

.pc-verdict-text {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.pc-verdict-main {
  font-size: 1.375rem;
  font-weight: 700;
  line-height: 1.2;
}

.pc-verdict-main.yes { color: var(--accent); }
.pc-verdict-main.no  { color: var(--danger); }

.pc-verdict-sub {
  font-size: 0.9375rem;
  color: var(--text-2);
}

/* Comparison */
.pc-comparison {
  display: flex;
  flex-direction: column;
  gap: 8px;
  padding: 16px;
  background: var(--bg-2);
  border-radius: var(--radius-md);
  border: 1px solid var(--border);
  margin-bottom: 12px;
}

.pc-compare-row {
  display: flex;
  align-items: baseline;
  gap: 12px;
}

.pc-compare-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  min-width: 60px;
  flex-shrink: 0;
}

.pc-compare-value {
  font-family: var(--font-mono);
  font-size: 0.9375rem;
  color: var(--text);
  word-break: break-all;
  letter-spacing: 0.04em;
}

.pc-compare-value.match   { color: var(--accent); }
.pc-compare-value.nomatch { color: var(--danger); }

.pc-meta {
  font-size: 0.8125rem;
  color: var(--text-3);
  text-align: center;
}

/* Empty state */
.pc-empty {
  text-align: center;
  max-width: 360px;
}

.pc-empty-icon {
  font-size: 3rem;
  color: var(--text-3);
  margin-bottom: 12px;
  opacity: 0.4;
}

.pc-empty p { color: var(--text-3); font-size: 0.9375rem; }

/* Examples */
.pc-examples {
  border-top: 1px solid var(--border);
  padding: 14px 16px;
  background: var(--bg-2);
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}

.pc-examples-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
  flex-shrink: 0;
}

.pc-example-btns { display: flex; gap: 6px; flex-wrap: wrap; }

.pc-example {
  font-size: 0.8125rem;
  padding: 5px 12px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg);
  color: var(--text-2);
  cursor: pointer;
  font-family: var(--font);
  transition: border-color var(--transition), color var(--transition), background var(--transition);
  white-space: nowrap;
}

.pc-example:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .pc-example:hover { background: var(--accent-dim); }

@media (max-width: 640px) {
  .pc-result { padding: 24px 16px; }
  .pc-verdict-icon { width: 44px; height: 44px; font-size: 1.375rem; }
  .pc-verdict-main { font-size: 1.125rem; }
}
</style>

<!-- Palindrome checker JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input    = document.getElementById('pc-input');
  var strict   = document.getElementById('pc-strict');
  var clearBtn = document.getElementById('pc-clear-btn');

  var resultMain   = document.getElementById('pc-result-main');
  var emptyState   = document.getElementById('pc-empty');
  var verdictIcon  = document.getElementById('pc-verdict-icon');
  var verdictText  = document.getElementById('pc-verdict-text');
  var forwardEl    = document.getElementById('pc-forward');
  var reversedEl   = document.getElementById('pc-reversed');
  var metaEl       = document.getElementById('pc-meta');

  function clean(text) {
    return text.toLowerCase().replace(/[^a-z0-9]/g, '');
  }

  function check() {
    var raw = input.value;

    if (!raw.trim()) {
      resultMain.classList.add('hidden');
      emptyState.classList.remove('hidden');
      return;
    }

    var isStrict = strict.checked;
    var forward  = isStrict ? raw : clean(raw);
    var reversed = forward.split('').reverse().join('');
    var isPalin  = forward === reversed && forward.length > 0;

    resultMain.classList.remove('hidden');
    emptyState.classList.add('hidden');

    /* Verdict icon */
    verdictIcon.textContent = isPalin ? '✓' : '✗';
    verdictIcon.className   = 'pc-verdict-icon ' + (isPalin ? 'yes' : 'no');

    /* Verdict text */
    var mainText = isPalin
      ? '"' + raw + '" is a palindrome!'
      : '"' + raw + '" is not a palindrome';

    var subText = isPalin
      ? 'It reads the same forwards and backwards.'
      : 'It reads differently when reversed.';

    if (forward.length === 0) {
      mainText = 'Nothing to check after removing spaces and punctuation.';
      subText  = '';
    }

    verdictText.innerHTML =
      '<div class="pc-verdict-main ' + (isPalin ? 'yes' : 'no') + '">' + escapeHtml(mainText) + '</div>' +
      (subText ? '<div class="pc-verdict-sub">' + escapeHtml(subText) + '</div>' : '');

    /* Comparison */
    forwardEl.textContent  = forward  || '(empty)';
    reversedEl.textContent = reversed || '(empty)';
    forwardEl.className  = 'pc-compare-value ' + (isPalin ? 'match' : '');
    reversedEl.className = 'pc-compare-value ' + (isPalin ? 'match' : 'nomatch');

    /* Meta info */
    if (!isStrict && raw !== forward) {
      metaEl.textContent = 'Checked after removing spaces and punctuation (' + forward.length + ' characters)';
    } else {
      metaEl.textContent = forward.length + ' character' + (forward.length !== 1 ? 's' : '') + ' checked';
    }
  }

  function escapeHtml(s) {
    return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
  }

  /* Events */
  input.addEventListener('input', check);
  strict.addEventListener('change', check);

  clearBtn.addEventListener('click', function() {
    input.value = '';
    check();
    input.focus();
  });

  /* Example buttons */
  document.querySelectorAll('.pc-example').forEach(function(btn) {
    btn.addEventListener('click', function() {
      input.value = btn.dataset.val;
      check();
      input.focus();
    });
  });

  /* Init */
  check();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
