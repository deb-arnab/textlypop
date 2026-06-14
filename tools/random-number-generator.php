<?php
$tool_slug   = 'random-number-generator';
$tool_name   = 'Random Number Generator';

$page_title  = 'Random Number Generator — Generate Random Numbers Online Free | TextlyPop';
$meta_desc   = 'Generate random numbers between any range instantly. Single numbers, multiple numbers, no repeats, dice rolls and more. Free online random number generator.';
$canonical_url = 'https://textlypop.com/tools/random-number-generator';
$og_title    = 'Free Random Number Generator — TextlyPop';
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
  "name": "Random Number Generator",
  "url": "https://textlypop.com/tools/random-number-generator",
  "description": "Generate random numbers between any range instantly. Single or multiple numbers, no repeats option.",
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
      "name": "How do I generate a random number between 1 and 10?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Set the minimum to 1 and the maximum to 10, then click Generate. The tool will produce a random number within that range. Click Generate again for a new random number."
      }
    },
    {
      "@type": "Question",
      "name": "Can I generate multiple random numbers at once?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Set the Count field to any number up to 1000 and click Generate. You can also enable the No repeats option to ensure each number in the set appears only once."
      }
    },
    {
      "@type": "Question",
      "name": "Is this random number generator truly random?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "TextlyPop uses the Web Crypto API (crypto.getRandomValues) when available, which provides cryptographically secure random numbers. This is significantly more random than standard Math.random() used by most online tools."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use this to simulate a dice roll?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Use the quick preset buttons for common dice — d6 sets the range to 1-6, d20 sets it to 1-20. Click Generate to roll. Set Count to match the number of dice you want to roll simultaneously."
      }
    },
    {
      "@type": "Question",
      "name": "Can I generate random numbers without repetition?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Enable the No repeats option and set Count to how many numbers you need. The generator ensures each number appears only once in the results, like drawing from a hat without replacement."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Generate Random Numbers Online',
  'description' => 'Generate random numbers between any range using TextlyPop random number generator.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Set your range','text'=>'Enter the minimum and maximum values for your random number range, or click a quick preset like d6 or d20.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Set the count','text'=>'Enter how many random numbers you want to generate. Leave it at 1 for a single number.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Choose options','text'=>'Enable No repeats to get unique numbers, or enable Sort results to display them in order.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Click Generate','text'=>'Click Generate or press Enter. Your random numbers appear instantly. Click Generate again for a new set.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Random Number Generator','item'=>'https://textlypop.com/tools/random-number-generator'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Random number generator</h1>
    <p>Generate random numbers between any range. Single numbers, multiple numbers, no repeats.</p>
  </div>

  <div class="rng-tool" id="rng-tool">

    <!-- Controls -->
    <div class="rng-controls">

      <!-- Quick presets -->
      <div class="rng-presets">
        <span class="rng-label">Quick presets:</span>
        <div class="rng-preset-btns">
          <button class="rng-preset" data-min="1" data-max="10">1 – 10</button>
          <button class="rng-preset" data-min="1" data-max="100">1 – 100</button>
          <button class="rng-preset" data-min="0" data-max="1">Coin flip</button>
          <button class="rng-preset" data-min="1" data-max="6">d6</button>
          <button class="rng-preset" data-min="1" data-max="10">d10</button>
          <button class="rng-preset" data-min="1" data-max="20">d20</button>
          <button class="rng-preset" data-min="1" data-max="100">d100</button>
        </div>
      </div>

      <!-- Range inputs -->
      <div class="rng-inputs">
        <div class="rng-input-group">
          <label class="rng-input-label" for="rng-min">Minimum</label>
          <input type="number" id="rng-min" class="rng-input" value="1" aria-label="Minimum value">
        </div>
        <div class="rng-separator">to</div>
        <div class="rng-input-group">
          <label class="rng-input-label" for="rng-max">Maximum</label>
          <input type="number" id="rng-max" class="rng-input" value="100" aria-label="Maximum value">
        </div>
        <div class="rng-input-group">
          <label class="rng-input-label" for="rng-count">Count</label>
          <input type="number" id="rng-count" class="rng-input rng-input-sm" value="1" min="1" max="1000" aria-label="How many numbers to generate">
        </div>
        <button class="btn btn-primary rng-generate-btn" id="rng-generate">Generate</button>
      </div>

      <!-- Options — only shown when Count > 1 -->
      <div class="rng-options hidden" id="rng-options-wrap" role="group" aria-label="Multiple number options">
        <span class="rng-label">Options:</span>
        <label class="rng-option">
          <input type="checkbox" id="rng-no-repeat">
          <span class="rng-option-text">
            <strong>No repeats</strong>
            <em>Each number appears only once</em>
          </span>
        </label>
        <label class="rng-option">
          <input type="checkbox" id="rng-sort">
          <span class="rng-option-text">
            <strong>Sort A–Z</strong>
            <em>Show results in ascending order</em>
          </span>
        </label>
        <label class="rng-option">
          <input type="checkbox" id="rng-show-sum">
          <span class="rng-option-text">
            <strong>Show sum</strong>
            <em>Add up all generated numbers</em>
          </span>
        </label>
      </div>

    </div>

    <!-- Result display -->
    <div class="rng-result-wrap" id="rng-result-wrap">

      <!-- Single number display -->
      <div class="rng-single" id="rng-single">
        <div class="rng-big-number" id="rng-big-number" aria-live="polite">—</div>
        <div class="rng-range-label" id="rng-range-label">between 1 and 100</div>
      </div>

      <!-- Multiple numbers display -->
      <div class="rng-multi hidden" id="rng-multi">
        <div class="rng-multi-header">
          <span class="rng-multi-label" id="rng-multi-label">Results</span>
          <button class="btn btn-ghost" id="rng-copy-multi">Copy</button>
        </div>
        <div class="rng-number-grid" id="rng-number-grid" aria-live="polite"></div>
        <div class="rng-multi-stats" id="rng-multi-stats"></div>
      </div>

    </div>

    <!-- Generate again bar -->
    <div class="rng-bottom">
      <button class="btn btn-primary" id="rng-again">Generate again</button>
      <span class="rng-history-label" id="rng-history"></span>
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

    <h2>How to generate random numbers online</h2>
    <p>Set your minimum and maximum values, choose how many numbers you want, and click Generate. Use the quick presets to jump straight to common ranges — 1 to 10, 1 to 100, standard dice from d6 to d100, and coin flip. The No repeats option ensures every number in your result set is unique. Sort results arranges them in ascending order. Show sum adds up all generated numbers and displays the total — useful for dice games and probability exercises.</p>

    <h2>Cryptographically secure randomness</h2>
    <p>TextlyPop uses the Web Crypto API's <code>crypto.getRandomValues()</code> function when available in your browser. This provides cryptographically secure random numbers — significantly more unpredictable than the standard <code>Math.random()</code> used by most online tools. Cryptographic randomness means the numbers cannot be predicted even if you know the previous results. This matters for any use case where true fairness is important, such as lotteries, giveaways, or statistical sampling.</p>

    <h2>Common uses for random number generation</h2>
    <p>Teachers use random number generators to call on students fairly, assign seats, or create randomized quizzes. Developers use them to test applications with random data inputs. Game players roll virtual dice for board games, tabletop RPGs, and decision making. Researchers and statisticians use random sampling to select participants from a population. Contest organizers pick winners fairly from a numbered list of entries. Anyone who needs to make a fair unbiased decision between numbered options benefits from a random number generator.</p>

    <h2>Dice rolling with this tool</h2>
    <p>Each standard dice type has a quick preset button. Click d6 and Generate for a standard six-sided die. Click d20 for a twenty-sided die used in tabletop RPGs. Set Count to match the number of dice you want to roll simultaneously — set Count to 3 and click d6 to roll 3d6. Enable Show sum to see the total roll value, which is how most dice games work. Enable No repeats when you need each die value to be different.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I generate a random number between 1 and 10?</p>
      <p class="faq-a">Click the "1 – 10" preset button, then click Generate. Or set minimum to 1, maximum to 10, and click Generate.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I generate multiple random numbers at once?</p>
      <p class="faq-a">Yes. Set the Count field to any number up to 1000 and click Generate. Enable No repeats to ensure each number appears only once.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is this random number generator truly random?</p>
      <p class="faq-a">TextlyPop uses the Web Crypto API which provides cryptographically secure random numbers — significantly more random than standard Math.random() used by most online tools.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use this to simulate a dice roll?</p>
      <p class="faq-a">Yes. Use the quick preset buttons — d6 sets the range to 1-6, d20 sets it to 1-20. Set Count to match how many dice to roll simultaneously.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I generate random numbers without repetition?</p>
      <p class="faq-a">Yes. Enable No repeats and set Count to how many numbers you need. Each number will appear only once in the results.</p>
    </div>

  </div>

</div>

<!-- Random number generator CSS -->
<style>
.rng-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.rng-controls {
  padding: 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.rng-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

/* Presets */
.rng-presets { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

.rng-preset-btns { display: flex; gap: 6px; flex-wrap: wrap; }

.rng-preset {
  padding: 5px 12px;
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

.rng-preset:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .rng-preset:hover { background: var(--accent-dim); }

/* Range inputs */
.rng-inputs {
  display: flex;
  align-items: flex-end;
  gap: 12px;
  flex-wrap: wrap;
}

.rng-input-group { display: flex; flex-direction: column; gap: 5px; }

.rng-input-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.rng-input {
  width: 110px;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 1rem;
  outline: none;
  transition: border-color var(--transition);
  text-align: center;
}

.rng-input-sm { width: 80px; }
.rng-input:focus { border-color: var(--accent); }

.rng-separator {
  font-size: 0.875rem;
  color: var(--text-3);
  padding-bottom: 10px;
}

.rng-generate-btn { align-self: flex-end; padding: 9px 28px; font-size: 0.9375rem; }

/* Options */
.rng-options { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }

.rng-option {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 140px;
  transition: border-color var(--transition), background var(--transition);
}

.rng-option:hover { border-color: var(--accent); }

.rng-option input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.rng-option:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .rng-option:has(input:checked) { background: var(--accent-dim); }

.rng-option-text { display: flex; flex-direction: column; gap: 1px; }
.rng-option-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.rng-option-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); }

/* Result area */
.rng-result-wrap {
  min-height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 32px 20px;
}

/* Single number */
.rng-single { text-align: center; }

.rng-big-number {
  font-size: clamp(4rem, 15vw, 8rem);
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
  font-variant-numeric: tabular-nums;
  letter-spacing: -0.02em;
  transition: transform 0.15s ease, opacity 0.15s ease;
}

.rng-big-number.pop {
  transform: scale(1.08);
}

.rng-range-label {
  font-size: 0.9375rem;
  color: var(--text-3);
  margin-top: 10px;
}

/* Multiple numbers */
.rng-multi { width: 100%; }

.rng-multi-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 14px;
}

.rng-multi-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.rng-number-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  justify-content: center;
}

.rng-number-chip {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 52px;
  padding: 8px 14px;
  background: var(--accent-light);
  color: var(--accent-dark);
  border-radius: var(--radius-md);
  font-size: 1rem;
  font-weight: 600;
  font-variant-numeric: tabular-nums;
  animation: chipPop 0.2s ease forwards;
}

[data-theme="dark"] .rng-number-chip { background: var(--accent-dim); color: #5DCAA5; }

@keyframes chipPop {
  from { transform: scale(0.8); opacity: 0; }
  to   { transform: scale(1);   opacity: 1; }
}

.rng-multi-stats {
  margin-top: 14px;
  font-size: 0.875rem;
  color: var(--text-3);
  text-align: center;
}

.rng-multi-stats strong { color: var(--accent); }

/* Bottom bar */
.rng-bottom {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 12px 16px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.rng-history-label {
  font-size: 0.8125rem;
  color: var(--text-3);
}

@media (max-width: 640px) {
  .rng-inputs { flex-direction: column; align-items: stretch; }
  .rng-input, .rng-input-sm { width: 100%; }
  .rng-generate-btn { width: 100%; justify-content: center; }
  .rng-separator { display: none; }
  .rng-option { min-width: 100%; }
  .rng-big-number { font-size: 5rem; }
}
</style>

<!-- Random number generator JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var minInput    = document.getElementById('rng-min');
  var maxInput    = document.getElementById('rng-max');
  var countInput  = document.getElementById('rng-count');
  var generateBtn = document.getElementById('rng-generate');
  var againBtn    = document.getElementById('rng-again');
  var bigNum      = document.getElementById('rng-big-number');
  var rangeLabel  = document.getElementById('rng-range-label');
  var singleEl    = document.getElementById('rng-single');
  var multiEl     = document.getElementById('rng-multi');
  var multiLabel  = document.getElementById('rng-multi-label');
  var numGrid     = document.getElementById('rng-number-grid');
  var multiStats  = document.getElementById('rng-multi-stats');
  var copyMulti   = document.getElementById('rng-copy-multi');
  var historyEl   = document.getElementById('rng-history');

  var optNoRepeat = document.getElementById('rng-no-repeat');
  var optSort     = document.getElementById('rng-sort');
  var optSum      = document.getElementById('rng-show-sum');

  var lastResults = [];
  var history     = [];

  /* ── Crypto-secure random integer ── */
  function secureRandInt(min, max) {
    var range = max - min + 1;
    if (window.crypto && window.crypto.getRandomValues) {
      var arr = new Uint32Array(1);
      var limit = Math.floor(0xFFFFFFFF / range) * range;
      do {
        window.crypto.getRandomValues(arr);
      } while (arr[0] >= limit);
      return min + (arr[0] % range);
    }
    return Math.floor(Math.random() * range) + min;
  }

  /* ── Generate ── */
  function generate() {
    var min   = parseInt(minInput.value);
    var max   = parseInt(maxInput.value);
    var count = Math.max(1, Math.min(1000, parseInt(countInput.value) || 1));

    if (isNaN(min) || isNaN(max)) return;
    if (min > max) { var t = min; min = max; max = t; minInput.value = min; maxInput.value = max; }

    var noRepeat = optNoRepeat.checked;
    var range = max - min + 1;

    /* Clamp count if no-repeat requested */
    if (noRepeat && count > range) {
      count = range;
      countInput.value = count;
    }

    var results = [];

    if (noRepeat) {
      /* Fisher-Yates partial shuffle */
      var pool = [];
      for (var i = min; i <= max; i++) pool.push(i);
      for (var i = 0; i < count; i++) {
        var j = i + secureRandInt(0, pool.length - i - 1);
        var tmp = pool[i]; pool[i] = pool[j]; pool[j] = tmp;
      }
      results = pool.slice(0, count);
    } else {
      for (var i = 0; i < count; i++) {
        results.push(secureRandInt(min, max));
      }
    }

    if (optSort.checked) results.sort(function(a, b){ return a - b; });

    lastResults = results;

    /* History (last 5 single results) */
    if (count === 1) {
      history.unshift(results[0]);
      history = history.slice(0, 5);
      if (history.length > 1) {
        historyEl.textContent = 'Previous: ' + history.slice(1).join(', ');
      } else {
        historyEl.textContent = '';
      }
    } else {
      historyEl.textContent = '';
    }

    renderResults(results, min, max, count);
  }

  /* ── Render ── */
  function renderResults(results, min, max, count) {
    if (count === 1) {
      singleEl.classList.remove('hidden');
      multiEl.classList.add('hidden');

      /* Pop animation */
      bigNum.classList.remove('pop');
      void bigNum.offsetWidth;
      bigNum.textContent = results[0].toLocaleString();
      bigNum.classList.add('pop');
      setTimeout(function(){ bigNum.classList.remove('pop'); }, 150);

      rangeLabel.textContent = 'between ' + min.toLocaleString() + ' and ' + max.toLocaleString();

    } else {
      singleEl.classList.add('hidden');
      multiEl.classList.remove('hidden');

      multiLabel.textContent = results.length.toLocaleString() + ' numbers between ' + min.toLocaleString() + ' and ' + max.toLocaleString();

      numGrid.innerHTML = results.map(function(n, i) {
        return '<span class="rng-number-chip" style="animation-delay:' + (i * 20) + 'ms">' + n.toLocaleString() + '</span>';
      }).join('');

      /* Stats */
      if (optSum.checked) {
        var sum = results.reduce(function(a, b){ return a + b; }, 0);
        var avg = (sum / results.length).toFixed(2);
        multiStats.innerHTML = 'Sum: <strong>' + sum.toLocaleString() + '</strong> &nbsp;·&nbsp; Average: <strong>' + avg + '</strong>';
      } else {
        multiStats.textContent = '';
      }
    }
  }

  /* ── Copy multiple results ── */
  copyMulti.addEventListener('click', function() {
    if (!lastResults.length) return;
    navigator.clipboard.writeText(lastResults.join(', ')).then(function() {
      copyMulti.textContent = 'Copied!';
      setTimeout(function(){ copyMulti.textContent = 'Copy'; }, 2000);
    });
  });

  /* ── Presets ── */
  document.querySelectorAll('.rng-preset').forEach(function(btn) {
    btn.addEventListener('click', function() {
      minInput.value = btn.dataset.min;
      maxInput.value = btn.dataset.max;
      countInput.value = 1;
      generate();
    });
  });

  /* ── Show/hide options based on count ── */
  var optionsWrap = document.getElementById('rng-options-wrap');

  function updateOptionsVisibility() {
    var count = parseInt(countInput.value) || 1;
    if (count > 1) {
      optionsWrap.classList.remove('hidden');
    } else {
      optionsWrap.classList.add('hidden');
    }
  }

  countInput.addEventListener('input', updateOptionsVisibility);

  /* ── Events ── */
  generateBtn.addEventListener('click', generate);
  againBtn.addEventListener('click', generate);

  [minInput, maxInput, countInput].forEach(function(inp) {
    inp.addEventListener('keydown', function(e) {
      if (e.key === 'Enter') generate();
    });
  });

  /* ── Initialize ── */
  updateOptionsVisibility();
  generate();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
