<?php
$tool_slug   = 'vowel-counter';
$tool_name   = 'Vowel and Consonant Counter';

$page_title  = 'Vowel and Consonant Counter — Count Vowels Online Free | TextlyPop';
$meta_desc   = 'Count vowels, consonants, letters, numbers and special characters in your text instantly. Free online vowel counter. Results update as you type. No signup required.';
$canonical_url = 'https://textlypop.com/tools/vowel-counter';
$og_title    = 'Free Vowel and Consonant Counter — TextlyPop';
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
  "name": "Vowel and Consonant Counter",
  "url": "https://textlypop.com/tools/vowel-counter",
  "description": "Count vowels, consonants, letters, numbers and special characters in your text instantly.",
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
      "name": "What are vowels in English?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The vowels in English are A, E, I, O, U and sometimes Y. TextlyPop counts A, E, I, O, U as standard vowels. The letter Y can act as either a vowel or consonant depending on its position in a word."
      }
    },
    {
      "@type": "Question",
      "name": "What are consonants?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Consonants are all letters of the alphabet that are not vowels. In English there are 21 consonants: B, C, D, F, G, H, J, K, L, M, N, P, Q, R, S, T, V, W, X, Y, Z. The letter Y is typically counted as a consonant in this tool."
      }
    },
    {
      "@type": "Question",
      "name": "Why would I need to count vowels?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Vowel counting is used in linguistics and language learning, poetry and creative writing to analyze sound patterns, Scrabble and word games where vowel distribution matters, and educational exercises for children learning phonics and letter recognition."
      }
    },
    {
      "@type": "Question",
      "name": "Does the counter include uppercase and lowercase vowels?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The vowel and consonant counter treats uppercase and lowercase letters equally. Both A and a are counted as vowels, and both B and b are counted as consonants."
      }
    },
    {
      "@type": "Question",
      "name": "What percentage of letters are typically vowels in English text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "In typical English text approximately 38 to 40 percent of letters are vowels. The most common vowel is E followed by A, O, I, and U. If your text has a significantly different vowel percentage it may affect how natural it sounds when read aloud."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Count Vowels and Consonants Online',
  'description' => 'Count vowels, consonants and letters in any text using TextlyPop vowel and consonant counter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Paste your text','text'=>'Type or paste your text into the input box. The vowel and consonant counts update instantly as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'View the breakdown','text'=>'See the count of vowels, consonants, total letters, numbers, spaces and special characters side by side.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Check individual letter counts','text'=>'The frequency table below shows how many times each individual letter appears in your text, sorted by frequency.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Toggle Y as vowel','text'=>'Use the option to count Y as a vowel or consonant depending on your needs.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Vowel and Consonant Counter','item'=>'https://textlypop.com/tools/vowel-counter'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Vowel and consonant counter</h1>
    <p>Count vowels, consonants, letters, numbers and special characters. Results update as you type.</p>
  </div>

  <div class="vc-tool" id="vc-tool">

    <!-- Textarea -->
    <div class="vc-input-wrap">
      <textarea
        id="vc-input"
        class="vc-textarea"
        placeholder="Type or paste your text here…"
        aria-label="Text to count vowels and consonants in"
        data-save-key="vowel-counter"
        spellcheck="true"></textarea>
      <div class="vc-input-footer">
        <label class="vc-option">
          <input type="checkbox" id="vc-y-vowel">
          <span>Count Y as a vowel</span>
        </label>
        <button class="btn btn-clear" data-targets="vc-input">Clear</button>
      </div>
    </div>

    <!-- Stats -->
    <div class="vc-stats" role="region" aria-label="Character statistics" aria-live="polite">
      <div class="vc-stat vc-stat-vowel">
        <span class="vc-stat-num" id="vc-vowels">0</span>
        <span class="vc-stat-label">Vowels</span>
        <span class="vc-stat-pct" id="vc-vowel-pct">—</span>
      </div>
      <div class="vc-stat vc-stat-consonant">
        <span class="vc-stat-num" id="vc-consonants">0</span>
        <span class="vc-stat-label">Consonants</span>
        <span class="vc-stat-pct" id="vc-consonant-pct">—</span>
      </div>
      <div class="vc-stat">
        <span class="vc-stat-num" id="vc-letters">0</span>
        <span class="vc-stat-label">Total letters</span>
        <span class="vc-stat-pct" id="vc-letter-pct">—</span>
      </div>
      <div class="vc-stat">
        <span class="vc-stat-num" id="vc-numbers">0</span>
        <span class="vc-stat-label">Numbers</span>
        <span class="vc-stat-pct" id="vc-number-pct">—</span>
      </div>
      <div class="vc-stat">
        <span class="vc-stat-num" id="vc-spaces">0</span>
        <span class="vc-stat-label">Spaces</span>
        <span class="vc-stat-pct" id="vc-space-pct">—</span>
      </div>
      <div class="vc-stat">
        <span class="vc-stat-num" id="vc-special">0</span>
        <span class="vc-stat-label">Special chars</span>
        <span class="vc-stat-pct" id="vc-special-pct">—</span>
      </div>
    </div>

    <!-- Vowel / consonant ratio bar -->
    <div class="vc-ratio-wrap" id="vc-ratio-wrap">
      <div class="vc-ratio-bar" aria-hidden="true">
        <div class="vc-ratio-vowel" id="vc-ratio-vowel" style="width:50%"></div>
        <div class="vc-ratio-consonant" id="vc-ratio-consonant" style="width:50%"></div>
      </div>
      <div class="vc-ratio-labels">
        <span class="vc-ratio-label-v">Vowels <span id="vc-ratio-v-pct">—</span></span>
        <span class="vc-ratio-label-c">Consonants <span id="vc-ratio-c-pct">—</span></span>
      </div>
    </div>

    <!-- Individual letter frequency -->
    <div class="vc-letter-freq">
      <div class="vc-freq-header">
        <span class="vc-freq-title">Individual letter frequency</span>
        <button class="vc-freq-toggle" id="vc-freq-toggle">Show</button>
      </div>
      <div class="vc-freq-grid hidden" id="vc-freq-grid" aria-live="polite"></div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="vc-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="vc-input" data-to-tool="word-frequency-counter">Word frequency</button>
    <button class="send-to-btn" data-from="vc-input" data-to-tool="character-counter">Character counter</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">L</kbd> clear
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

    <h2>Vowels and consonants in English</h2>
    <p>English has 26 letters divided into vowels and consonants. The standard vowels are A, E, I, O, and U. All remaining 21 letters are consonants. The letter Y is a special case — it functions as a vowel in words like "gym", "myth", and "sky" where it makes a vowel sound, but as a consonant in words like "yes" and "yellow" where it makes the Y sound. This tool lets you choose whether to count Y as a vowel or consonant.</p>

    <h2>Why vowel counting matters</h2>
    <p>In typical English text approximately 38 to 40 percent of letters are vowels, with E being the most frequent letter overall. Analyzing vowel distribution is useful in several contexts. Linguists and language learners study vowel patterns to understand phonology. Poets and creative writers analyze sound patterns in their work — vowel-heavy text tends to flow more smoothly while consonant clusters create harder sounds. Word game players including Scrabble enthusiasts track vowel distribution when planning moves. Teachers use vowel counting exercises to help children learn phonics.</p>

    <h2>Letter frequency in English</h2>
    <p>The most common letters in English text in order are E, T, A, O, I, N, S, H, R, D, L, C, U, M, W, F, G, Y, P, B, V, K, J, X, Q, Z. The individual letter frequency table below your text shows how your writing compares to typical English distribution. Text with unusual letter frequencies can appear in encoded messages, constrained writing exercises, or specialized technical content.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What are vowels in English?</p>
      <p class="faq-a">The vowels in English are A, E, I, O, U and sometimes Y. This tool counts A, E, I, O, U as standard vowels. Enable "Count Y as a vowel" to include Y in the vowel count.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What are consonants?</p>
      <p class="faq-a">Consonants are all letters that are not vowels. In English there are 21 consonants: B, C, D, F, G, H, J, K, L, M, N, P, Q, R, S, T, V, W, X, Y, Z.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why would I need to count vowels?</p>
      <p class="faq-a">Vowel counting is used in linguistics, poetry analysis, word games, and educational phonics exercises. It helps analyze sound patterns and letter distribution in text.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the counter include uppercase and lowercase vowels?</p>
      <p class="faq-a">Yes. Both uppercase and lowercase letters are counted equally. A and a are both counted as vowels, B and b are both counted as consonants.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What percentage of letters are typically vowels in English text?</p>
      <p class="faq-a">In typical English text approximately 38 to 40 percent of letters are vowels. The most common vowel is E followed by A, O, I, and U.</p>
    </div>

  </div>

</div>

<!-- Vowel counter CSS -->
<style>
.vc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.vc-textarea {
  width: 100%;
  min-height: 200px;
  padding: 16px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 1rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
  display: block;
}

.vc-textarea::placeholder { color: var(--text-3); }

.vc-input-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.vc-option {
  display: flex;
  align-items: center;
  gap: 7px;
  font-size: 0.875rem;
  color: var(--text-2);
  cursor: pointer;
  user-select: none;
}

.vc-option input[type="checkbox"] {
  accent-color: var(--accent);
  width: 14px;
  height: 14px;
  cursor: pointer;
}

/* Stats grid */
.vc-stats {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}

.vc-stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 14px 8px;
  border-right: 1px solid var(--border);
  text-align: center;
  gap: 3px;
}

.vc-stat:last-child { border-right: none; }

.vc-stat-vowel    { background: rgba(29,158,117,0.08); }
.vc-stat-consonant{ background: rgba(56,161,105,0.06); }

.vc-stat-num {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
  font-variant-numeric: tabular-nums;
}

.vc-stat-label {
  font-size: 0.6875rem;
  color: var(--text-3);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-weight: 500;
}

.vc-stat-pct {
  font-size: 0.75rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
}

/* Ratio bar */
.vc-ratio-wrap {
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.vc-ratio-bar {
  display: flex;
  height: 10px;
  border-radius: 5px;
  overflow: hidden;
  margin-bottom: 8px;
}

.vc-ratio-vowel {
  background: var(--accent);
  transition: width 0.3s ease;
}

.vc-ratio-consonant {
  background: #38a169;
  transition: width 0.3s ease;
}

.vc-ratio-labels {
  display: flex;
  justify-content: space-between;
}

.vc-ratio-label-v,
.vc-ratio-label-c {
  font-size: 0.8125rem;
  color: var(--text-2);
}

.vc-ratio-label-v span { color: var(--accent); font-weight: 600; }
.vc-ratio-label-c span { color: #38a169; font-weight: 600; }

/* Letter frequency */
.vc-letter-freq { border-top: 1px solid var(--border); }

.vc-freq-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
}

.vc-freq-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.vc-freq-toggle {
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

.vc-freq-toggle:hover { color: var(--accent); border-color: var(--accent); }

.vc-freq-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(64px, 1fr));
  gap: 1px;
  background: var(--border);
  border-top: 1px solid var(--border);
  padding: 1px;
}

.vc-freq-cell {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 8px 4px;
  background: var(--bg);
  text-align: center;
  gap: 3px;
}

.vc-freq-cell.is-vowel { background: rgba(29,158,117,0.06); }
[data-theme="dark"] .vc-freq-cell.is-vowel { background: rgba(29,158,117,0.1); }

.vc-freq-letter {
  font-size: 1rem;
  font-weight: 700;
  color: var(--text);
}

.vc-freq-cell.is-vowel .vc-freq-letter { color: var(--accent); }

.vc-freq-count {
  font-size: 0.8125rem;
  font-weight: 600;
  color: var(--text-2);
  font-variant-numeric: tabular-nums;
}

.vc-freq-count.zero { color: var(--text-3); font-weight: 400; }

.vc-freq-bar {
  width: 100%;
  height: 3px;
  background: var(--bg-3);
  border-radius: 2px;
  overflow: hidden;
}

.vc-freq-bar-fill {
  height: 100%;
  background: var(--accent);
  border-radius: 2px;
  transition: width 0.3s ease;
}

.vc-freq-cell.is-vowel .vc-freq-bar-fill { background: var(--accent); }
.vc-freq-cell:not(.is-vowel) .vc-freq-bar-fill { background: #38a169; }

/* Mobile */
@media (max-width: 640px) {
  .vc-stats { grid-template-columns: repeat(3, 1fr); }
  .vc-stat:nth-child(3) { border-right: none; }
  .vc-stat:nth-child(n+4) { border-top: 1px solid var(--border); }
  .vc-freq-grid { grid-template-columns: repeat(auto-fill, minmax(52px, 1fr)); }
}
</style>

<!-- Vowel counter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input     = document.getElementById('vc-input');
  var yVowel    = document.getElementById('vc-y-vowel');
  var freqToggle= document.getElementById('vc-freq-toggle');
  var freqGrid  = document.getElementById('vc-freq-grid');

  var statVowels     = document.getElementById('vc-vowels');
  var statConsonants = document.getElementById('vc-consonants');
  var statLetters    = document.getElementById('vc-letters');
  var statNumbers    = document.getElementById('vc-numbers');
  var statSpaces     = document.getElementById('vc-spaces');
  var statSpecial    = document.getElementById('vc-special');

  var pctVowel     = document.getElementById('vc-vowel-pct');
  var pctConsonant = document.getElementById('vc-consonant-pct');
  var pctLetter    = document.getElementById('vc-letter-pct');
  var pctNumber    = document.getElementById('vc-number-pct');
  var pctSpace     = document.getElementById('vc-space-pct');
  var pctSpecial   = document.getElementById('vc-special-pct');

  var ratioVowel   = document.getElementById('vc-ratio-vowel');
  var ratioConsonant = document.getElementById('vc-ratio-consonant');
  var ratioVPct    = document.getElementById('vc-ratio-v-pct');
  var ratioCPct    = document.getElementById('vc-ratio-c-pct');

  var freqGridBuilt = false;

  var ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
  var BASE_VOWELS = new Set(['A','E','I','O','U']);

  function getVowels() {
    var v = new Set(BASE_VOWELS);
    if (yVowel.checked) v.add('Y');
    return v;
  }

  function pct(num, total) {
    if (!total) return '—';
    return ((num / total) * 100).toFixed(1) + '%';
  }

  function analyze() {
    var text   = input.value;
    var total  = text.length;
    var VOWELS = getVowels();

    var vowels = 0, consonants = 0, letters = 0, numbers = 0, spaces = 0, special = 0;
    var freq   = {};
    ALPHABET.forEach(function(l){ freq[l] = 0; });

    for (var i = 0; i < text.length; i++) {
      var ch = text[i];
      var up = ch.toUpperCase();

      if (/[A-Za-z]/.test(ch)) {
        letters++;
        freq[up] = (freq[up] || 0) + 1;
        if (VOWELS.has(up)) vowels++;
        else consonants++;
      } else if (/[0-9]/.test(ch)) {
        numbers++;
      } else if (ch === ' ' || ch === '\t' || ch === '\n' || ch === '\r') {
        spaces++;
      } else {
        special++;
      }
    }

    /* Update stats */
    statVowels.textContent     = vowels.toLocaleString();
    statConsonants.textContent = consonants.toLocaleString();
    statLetters.textContent    = letters.toLocaleString();
    statNumbers.textContent    = numbers.toLocaleString();
    statSpaces.textContent     = spaces.toLocaleString();
    statSpecial.textContent    = special.toLocaleString();

    pctVowel.textContent     = pct(vowels, total);
    pctConsonant.textContent = pct(consonants, total);
    pctLetter.textContent    = pct(letters, total);
    pctNumber.textContent    = pct(numbers, total);
    pctSpace.textContent     = pct(spaces, total);
    pctSpecial.textContent   = pct(special, total);

    /* Ratio bar */
    if (letters > 0) {
      var vPct = ((vowels / letters) * 100).toFixed(1);
      var cPct = ((consonants / letters) * 100).toFixed(1);
      ratioVowel.style.width     = vPct + '%';
      ratioConsonant.style.width = cPct + '%';
      ratioVPct.textContent = vPct + '%';
      ratioCPct.textContent = cPct + '%';
    } else {
      ratioVowel.style.width = ratioConsonant.style.width = '50%';
      ratioVPct.textContent = ratioCPct.textContent = '—';
    }

    /* Update freq grid if visible */
    if (!freqGrid.classList.contains('hidden')) {
      updateFreqGrid(freq, VOWELS);
    } else {
      freqGrid.dataset.dirty = '1';
    }
    freqGrid.dataset.freq   = JSON.stringify(freq);
    freqGrid.dataset.vowels = JSON.stringify([...VOWELS]);
  }

  function updateFreqGrid(freq, VOWELS) {
    var maxCount = Math.max(1, ...Object.values(freq));
    var sorted = ALPHABET.slice().sort(function(a,b){ return (freq[b]||0)-(freq[a]||0); });

    if (!freqGridBuilt) {
      freqGrid.innerHTML = sorted.map(function(letter) {
        var count = freq[letter] || 0;
        var isVowel = VOWELS.has(letter);
        var barW = ((count / maxCount) * 100).toFixed(1);
        return '<div class="vc-freq-cell' + (isVowel ? ' is-vowel' : '') + '" data-letter="' + letter + '">' +
          '<span class="vc-freq-letter">' + letter + '</span>' +
          '<span class="vc-freq-count' + (count === 0 ? ' zero' : '') + '">' + count + '</span>' +
          '<div class="vc-freq-bar"><div class="vc-freq-bar-fill" style="width:' + barW + '%"></div></div>' +
          '</div>';
      }).join('');
      freqGridBuilt = true;
    } else {
      /* Update existing cells */
      sorted.forEach(function(letter, idx) {
        var cell = freqGrid.querySelector('[data-letter="' + letter + '"]');
        if (!cell) return;
        var count  = freq[letter] || 0;
        var barW   = ((count / maxCount) * 100).toFixed(1);
        var isVowel= VOWELS.has(letter);
        cell.className = 'vc-freq-cell' + (isVowel ? ' is-vowel' : '');
        cell.querySelector('.vc-freq-count').textContent = count;
        cell.querySelector('.vc-freq-count').className   = 'vc-freq-count' + (count === 0 ? ' zero' : '');
        cell.querySelector('.vc-freq-bar-fill').style.width = barW + '%';
      });

      /* Re-sort cells in DOM */
      sorted.forEach(function(letter) {
        var cell = freqGrid.querySelector('[data-letter="' + letter + '"]');
        if (cell) freqGrid.appendChild(cell);
      });
    }
    freqGrid.dataset.dirty = '0';
  }

  /* Events */
  input.addEventListener('input', analyze);
  yVowel.addEventListener('change', function() {
    freqGridBuilt = false;
    analyze();
  });

  freqToggle.addEventListener('click', function() {
    var hidden = freqGrid.classList.toggle('hidden');
    freqToggle.textContent = hidden ? 'Show' : 'Hide';
    if (!hidden && freqGrid.dataset.dirty === '1') {
      var freq   = JSON.parse(freqGrid.dataset.freq   || '{}');
      var vArr   = JSON.parse(freqGrid.dataset.vowels || '[]');
      var VOWELS = new Set(vArr);
      updateFreqGrid(freq, VOWELS);
    }
  });

  /* Init */
  freqGrid.dataset.dirty = '0';
  freqGrid.dataset.freq  = '{}';
  freqGrid.dataset.vowels= '[]';
  analyze();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
