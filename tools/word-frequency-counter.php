<?php
$tool_slug   = 'word-frequency-counter';
$tool_name   = 'Word Frequency Counter';

$page_title  = 'Word & Keyword Frequency Counter | TextlyPop';
$meta_desc   = 'Count how often each word appears in your text. Find your most used words, measure keyword frequency and density, and spot repetition. Free, instant, no signup.';
$canonical_url = 'https://textlypop.com/tools/word-frequency-counter';
$og_title    = 'Free Word Frequency Counter — TextlyPop';
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
  "name": "Word Frequency Counter",
  "url": "https://textlypop.com/tools/word-frequency-counter",
  "description": "Count how often each word appears in your text. Find overused words and check keyword density.",
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
      "name": "How do I find the most repeated words in my text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your text and the frequency table appears instantly, sorted with the most-used words at the top — each row shows the word, its count, and its percentage of the total. Click column headers to re-sort, use the filter box to jump to a specific word, and enable Ignore stop words so 'the' and 'and' don't dominate the list."
      }
    },
    {
      "@type": "Question",
      "name": "Does keyword density still matter for SEO?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "As a ranking formula, no — modern search engines evaluate relevance with language models. But density still matters as a diagnostic: a primary keyword far above 2–3% of total words reads as stuffed, while a target term that barely appears may not signal the topic clearly. Use the percentage column to catch both extremes."
      }
    },
    {
      "@type": "Question",
      "name": "What is Zipf's law in simple terms?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Zipf's law says the most common word in a text appears about twice as often as the runner-up, three times as often as the third-place word, and so on. It holds across languages, authors and eras. Paste any long text with stop words included and the pattern emerges in the percentage column."
      }
    },
    {
      "@type": "Question",
      "name": "How many words can this tool analyze?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "There is no fixed limit. Analysis runs entirely in your browser, so full articles, theses and book-length manuscripts process in well under a second on a typical laptop — and the text never leaves your machine."
      }
    },
    {
      "@type": "Question",
      "name": "Are 'Word' and 'word' counted as the same word?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "By default, yes — counting is case-insensitive. Enable the Case sensitive option when capitalization matters, such as distinguishing the name Bill from the noun bill. Different word forms are always counted separately: run, runs and running are three entries, since the tool counts exact words rather than stems."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Count Word Frequency Online',
  'description' => 'Analyze how often each word appears in your text using TextlyPop word frequency counter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Paste your text','text'=>'Type or paste your text into the input box. The analysis updates automatically as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'View the frequency table','text'=>'The results table shows every unique word with its count and percentage of total words, sorted by frequency.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Filter stop words','text'=>'Enable Ignore stop words to remove common words like "the" and "and", leaving only meaningful content words.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Sort and export','text'=>'Click any column header to sort by word, count, or percentage. Use the Copy results button to copy the table data.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Word Frequency Counter','item'=>'https://textlypop.com/tools/word-frequency-counter'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Word frequency counter</h1>
    <p>Find out how often each word appears in your text. Spot overused words and check keyword density instantly.</p>
  </div>

  <div class="wf-tool" id="wf-tool">

    <!-- Input -->
    <div class="wf-input-wrap">
      <textarea
        id="wf-input"
        class="wf-textarea"
        placeholder="Paste your text here to analyze word frequency…"
        aria-label="Text to analyze for word frequency"
        data-save-key="word-frequency-counter"
        spellcheck="false"></textarea>

      <div class="wf-input-footer">
        <div class="wf-options" role="group" aria-label="Word frequency options">
          <label class="wf-option">
            <input type="checkbox" id="wf-ignore-stops" checked>
            <span>Ignore stop words</span>
          </label>
          <label class="wf-option">
            <input type="checkbox" id="wf-case-sensitive">
            <span>Case sensitive</span>
          </label>
          <label class="wf-option">
            <input type="checkbox" id="wf-ignore-numbers">
            <span>Ignore numbers</span>
          </label>
        </div>
        <div class="wf-input-actions">
          <button class="btn btn-clear" data-targets="wf-input">Clear</button>
        </div>
      </div>
    </div>

    <!-- Stats summary -->
    <div class="wf-summary" id="wf-summary" role="region" aria-label="Analysis summary" aria-live="polite">
      <div class="wf-summary-stat">
        <span class="wf-summary-num" id="wf-total-words">0</span>
        <span class="wf-summary-label">Total words</span>
      </div>
      <div class="wf-summary-stat">
        <span class="wf-summary-num" id="wf-unique-words">0</span>
        <span class="wf-summary-label">Unique words</span>
      </div>
      <div class="wf-summary-stat">
        <span class="wf-summary-num" id="wf-top-word">—</span>
        <span class="wf-summary-label">Most used word</span>
      </div>
      <div class="wf-summary-stat">
        <span class="wf-summary-num" id="wf-top-count">0</span>
        <span class="wf-summary-label">Times used</span>
      </div>
    </div>

    <!-- Results table -->
    <div class="wf-results" id="wf-results">
      <div class="wf-results-header">
        <span class="wf-results-title">Word frequency results</span>
        <div class="wf-results-actions">
          <input type="text" class="wf-search" id="wf-filter" placeholder="Filter words…" aria-label="Filter results">
          <button class="btn btn-ghost" id="wf-copy-btn">Copy results</button>
        </div>
      </div>

      <div class="wf-table-wrap">
        <table class="wf-table" id="wf-table" aria-label="Word frequency table">
          <thead>
            <tr>
              <th class="wf-th sortable active asc" data-col="word">#</th>
              <th class="wf-th sortable" data-col="word">Word</th>
              <th class="wf-th sortable" data-col="count">Count</th>
              <th class="wf-th sortable" data-col="pct">Percentage</th>
              <th class="wf-th">Bar</th>
            </tr>
          </thead>
          <tbody id="wf-tbody">
            <tr class="wf-empty-row">
              <td colspan="5">Paste text above to see word frequency results.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="wf-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="wf-input" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="wf-input" data-to-tool="case-converter">Case converter</button>
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

    <h2>About word frequency analysis</h2>
    <p>Counting how often each word appears in a text is one of the oldest forms of textual analysis — medieval scholars spent lifetimes compiling concordances of the Bible by hand, indexing every occurrence of every word. The field's most famous discovery is Zipf's law, named after linguist George Kingsley Zipf, who observed in the 1930s that a text's most common word appears roughly twice as often as the second most common, three times as often as the third, and so on. English follows the pattern faithfully: "the" alone accounts for about 7% of all words in typical prose. A frequency counter turns this analysis from a lifetime's work into an instant table.</p>

    <h2>Why word frequency analysis matters for writers</h2>
    <p>Overusing the same word repeatedly makes writing feel repetitive and flat. Word frequency analysis reveals patterns in your writing that are difficult to spot by reading alone. You might discover you use the word "very" fourteen times in a five hundred word article, or that "however" appears in every other paragraph. Seeing the frequency data makes these patterns obvious and actionable — you can use the find and replace tool to substitute varied alternatives.</p>

    <h2>Word frequency for SEO and keyword density</h2>
    <p>Search engines analyze the words on a page to understand what it is about. Keyword density — the percentage of times a target keyword appears relative to total word count — is one signal search engines use to determine relevance. The percentage column in TextlyPop's word frequency counter is your keyword density for each word. Most SEO professionals recommend keeping primary keyword density between one and two percent. Higher than three percent risks appearing as keyword stuffing which search engines penalize.</p>
    <p>Disable the Ignore stop words option to see the full picture including all common words, which gives you the most accurate percentage calculations for SEO purposes. Enable it when you want to focus only on meaningful content words.</p>

    <h2>Keyword frequency and word repetition</h2>
    <p>Keyword frequency is the raw count of how many times a term appears; keyword density is that count expressed as a percentage of total words. This tool reports both at once, so a page of 1,200 words in which a phrase appears 14 times shows as 14 and 1.2%. Sorting by count puts your most used words at the top, which is the quickest way to see what a piece is genuinely about rather than what you intended it to be about.</p>
    <p>Writers use the same view for the opposite purpose. Unintentional repetition is almost invisible while drafting and obvious to a reader: the same adjective three times in a paragraph, a verbal tic like "actually" or "however" running through a whole chapter, or a name repeated where a pronoun would read better. A frequency list surfaces every one of these in a single pass, and the count next to each word tells you how hard the fix needs to be.</p>
    <p>One limit is worth knowing. This is a word frequency counter, not a phrase frequency counter: it counts single words, so a two-word term is reported as its two parts rather than as one unit. When you need the count for an exact phrase, the <a href="/tools/find-and-replace">find and replace</a> tool reports how many matches it finds for whatever string you search for.</p>

    <h2>What are stop words</h2>
    <p>Stop words are common English words that appear in almost every piece of writing — "the", "a", "an", "and", "or", "but", "in", "on", "at", "to", "for", "of", "with", "is", "was", "are", "were". Because they appear so frequently they are usually not meaningful for analysis purposes. Filtering them out reveals the words that actually define the topic and tone of your writing. TextlyPop filters over 40 common stop words when the option is enabled.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I find the most repeated words in my text?</p>
      <p class="faq-a">Paste your text and the frequency table appears instantly, sorted with the most-used words at the top. Each row shows the word, its raw count, and the percentage of your total word count it represents. Click any column header to re-sort alphabetically or by count, and type into the filter box to jump straight to a specific word. For a writer's overused-word check, enable Ignore stop words first — otherwise "the" and "and" will dominate the top of every list.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does keyword density still matter for SEO?</p>
      <p class="faq-a">As a ranking formula, no — modern search engines evaluate topical relevance with language models, not by counting keyword repetitions. But density still matters as a diagnostic: if your primary keyword sits far above 2–3% of total words, the page likely reads as stuffed and unnatural, which both readers and Google's spam systems dislike. Conversely, if the term you want to rank for barely appears, the page may not signal its topic clearly. Use the percentage column to catch both extremes, then write for the reader.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is Zipf's law in simple terms?</p>
      <p class="faq-a">Zipf's law says word frequency follows a predictable curve: the most common word appears about twice as often as the runner-up, three times as often as the third-place word, and so on down the ranks. It holds across languages, authors and eras — from Shakespeare to tweets — and nobody fully agrees on why. Paste any long text into the counter with stop words included and you can watch the pattern emerge in the percentage column yourself.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many words can this tool analyze?</p>
      <p class="faq-a">There is no fixed limit. Analysis runs entirely in your browser, so capacity depends on your device rather than a server quota — full articles, essays, theses and even book-length manuscripts process in well under a second on a typical laptop. Because nothing is uploaded, analyzing a 100,000-word document is no different from analyzing a paragraph, and the text never leaves your machine.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Are "Word" and "word" counted as the same word?</p>
      <p class="faq-a">By default, yes — counting is case-insensitive, so "The", "the" and "THE" merge into one row, which is what you want for almost all writing and SEO analysis. Enable the Case sensitive option when capitalization itself matters, such as distinguishing the name "Bill" from the noun "bill" or auditing brand-name capitalization. Note that different word forms are always counted separately: "run", "runs" and "running" are three entries, since the tool counts exact words rather than word stems.</p>
    </div>

  </div>

</div>

<!-- Word frequency CSS -->
<style>
.wf-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.wf-textarea {
  width: 100%;
  min-height: 180px;
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

.wf-textarea::placeholder { color: var(--text-3); }

.wf-input-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 10px;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.wf-options {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
}

.wf-option {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.875rem;
  color: var(--text-2);
  cursor: pointer;
  user-select: none;
}

.wf-option input[type="checkbox"] {
  accent-color: var(--accent);
  width: 14px;
  height: 14px;
  cursor: pointer;
}

.wf-input-actions { display: flex; gap: 6px; }

/* Summary stats */
.wf-summary {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
  background: var(--accent-light);
}

[data-theme="dark"] .wf-summary { background: var(--accent-dim); }

.wf-summary-stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 14px 8px;
  border-right: 1px solid var(--border);
  text-align: center;
}

.wf-summary-stat:last-child { border-right: none; }

.wf-summary-num {
  font-size: 1.375rem;
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
  margin-bottom: 4px;
  font-variant-numeric: tabular-nums;
}

.wf-summary-label {
  font-size: 0.6875rem;
  color: var(--text-3);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-weight: 500;
}

/* Results */
.wf-results { border-top: 1px solid var(--border); }

.wf-results-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  gap: 10px;
  flex-wrap: wrap;
}

.wf-results-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.wf-results-actions { display: flex; gap: 8px; align-items: center; }

.wf-search {
  padding: 5px 10px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.8125rem;
  outline: none;
  width: 140px;
  transition: border-color var(--transition);
}

.wf-search:focus { border-color: var(--accent); }
.wf-search::placeholder { color: var(--text-3); }

.wf-table-wrap {
  overflow-x: auto;
  max-height: 420px;
  overflow-y: auto;
}

.wf-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.875rem;
}

.wf-th {
  padding: 9px 14px;
  text-align: left;
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--text-3);
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
  white-space: nowrap;
  position: sticky;
  top: 0;
  z-index: 1;
}

.wf-th.sortable { cursor: pointer; user-select: none; }
.wf-th.sortable:hover { color: var(--accent); }
.wf-th.active { color: var(--accent); }
.wf-th.active.asc::after  { content: ' ↑'; }
.wf-th.active.desc::after { content: ' ↓'; }

.wf-table tbody tr {
  border-bottom: 1px solid var(--border);
  transition: background var(--transition);
}

.wf-table tbody tr:last-child { border-bottom: none; }
.wf-table tbody tr:hover { background: var(--bg-2); }

.wf-table td {
  padding: 8px 14px;
  color: var(--text);
  vertical-align: middle;
}

.wf-td-rank { color: var(--text-3); font-size: 0.75rem; width: 40px; }
.wf-td-word { font-weight: 500; font-family: var(--font-mono); }
.wf-td-count { color: var(--accent); font-weight: 600; font-variant-numeric: tabular-nums; }
.wf-td-pct { color: var(--text-2); font-variant-numeric: tabular-nums; }

.wf-bar-cell { width: 120px; }

.wf-bar {
  height: 6px;
  background: var(--bg-3);
  border-radius: 3px;
  overflow: hidden;
}

.wf-bar-fill {
  height: 100%;
  background: var(--accent);
  border-radius: 3px;
  transition: width 0.2s ease;
}

.wf-empty-row td {
  padding: 32px 14px;
  text-align: center;
  color: var(--text-3);
  font-size: 0.9375rem;
}

/* Mobile */
@media (max-width: 640px) {
  .wf-summary { grid-template-columns: repeat(2, 1fr); }
  .wf-summary-stat:nth-child(2) { border-right: none; }
  .wf-summary-stat:nth-child(3),
  .wf-summary-stat:nth-child(4) { border-top: 1px solid var(--border); }
  .wf-bar-cell { display: none; }
}
</style>

<!-- Word frequency JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('wf-input');
  var filterInput= document.getElementById('wf-filter');
  var tbody      = document.getElementById('wf-tbody');
  var totalEl    = document.getElementById('wf-total-words');
  var uniqueEl   = document.getElementById('wf-unique-words');
  var topWordEl  = document.getElementById('wf-top-word');
  var topCountEl = document.getElementById('wf-top-count');
  var copyBtn    = document.getElementById('wf-copy-btn');

  var optStops   = document.getElementById('wf-ignore-stops');
  var optCase    = document.getElementById('wf-case-sensitive');
  var optNums    = document.getElementById('wf-ignore-numbers');

  var sortCol = 'count';
  var sortDir = 'desc';
  var currentData = [];

  /* 40+ common English stop words */
  var STOPS = new Set([
    'a','an','the','and','or','but','in','on','at','to','for','of','with',
    'by','from','is','was','are','were','be','been','has','have','had',
    'do','does','did','will','would','could','should','may','might','shall',
    'can','not','no','nor','so','yet','as','if','then','than','that','this',
    'these','those','it','its','up','out','about','into','than','more','also',
    'just','been','being','their','there','they','what','which','who','whom',
    'when','where','why','how','all','each','every','both','few','more','most',
    'other','some','such','only','own','same','too','very','i','me','my','we',
    'our','you','your','he','him','his','she','her','they','them','us'
  ]);

  function analyze() {
    var text = input.value;

    if (!text.trim()) {
      currentData = [];
      renderTable([]);
      totalEl.textContent    = '0';
      uniqueEl.textContent   = '0';
      topWordEl.textContent  = '—';
      topCountEl.textContent = '0';
      return;
    }

    /* Tokenize */
    var words = text
      .replace(/[^\w\s']/g, ' ')
      .split(/\s+/)
      .filter(function(w){ return w.length > 0; });

    var total = words.length;

    /* Build frequency map */
    var freq = {};
    words.forEach(function(w) {
      if (optNums.checked && /^\d+$/.test(w)) return;
      var key = optCase.checked ? w : w.toLowerCase();
      key = key.replace(/^'+|'+$/g, ''); // strip surrounding apostrophes
      if (!key) return;
      if (optStops.checked && STOPS.has(key.toLowerCase())) return;
      freq[key] = (freq[key] || 0) + 1;
    });

    /* Convert to array */
    var data = Object.keys(freq).map(function(word) {
      return {
        word: word,
        count: freq[word],
        pct: ((freq[word] / total) * 100).toFixed(2)
      };
    });

    /* Sort */
    data = sortData(data);
    currentData = data;

    /* Stats */
    var top = data[0] || { word: '—', count: 0 };
    totalEl.textContent    = total.toLocaleString();
    uniqueEl.textContent   = data.length.toLocaleString();
    topWordEl.textContent  = top.word;
    topCountEl.textContent = top.count.toLocaleString();

    renderTable(data);
  }

  function sortData(data) {
    return data.slice().sort(function(a, b) {
      var va = sortCol === 'word' ? a.word : sortCol === 'count' ? a.count : parseFloat(a.pct);
      var vb = sortCol === 'word' ? b.word : sortCol === 'count' ? b.count : parseFloat(b.pct);
      if (sortCol === 'word') {
        return sortDir === 'asc' ? va.localeCompare(vb) : vb.localeCompare(va);
      }
      return sortDir === 'asc' ? va - vb : vb - va;
    });
  }

  function renderTable(data) {
    var filter = filterInput.value.toLowerCase().trim();
    var filtered = filter
      ? data.filter(function(r){ return r.word.toLowerCase().includes(filter); })
      : data;

    if (!filtered.length) {
      tbody.innerHTML = '<tr class="wf-empty-row"><td colspan="5">' +
        (data.length ? 'No words match your filter.' : 'Paste text above to see word frequency results.') +
        '</td></tr>';
      return;
    }

    var maxCount = filtered[0] ? Math.max.apply(null, filtered.map(function(r){ return r.count; })) : 1;

    tbody.innerHTML = filtered.map(function(row, i) {
      var barPct = ((row.count / maxCount) * 100).toFixed(1);
      return '<tr>' +
        '<td class="wf-td-rank">' + (i + 1) + '</td>' +
        '<td class="wf-td-word">' + escapeHtml(row.word) + '</td>' +
        '<td class="wf-td-count">' + row.count.toLocaleString() + '</td>' +
        '<td class="wf-td-pct">' + row.pct + '%</td>' +
        '<td class="wf-bar-cell"><div class="wf-bar"><div class="wf-bar-fill" style="width:' + barPct + '%"></div></div></td>' +
        '</tr>';
    }).join('');
  }

  function escapeHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }

  /* Sort headers */
  document.querySelectorAll('.wf-th.sortable').forEach(function(th) {
    th.addEventListener('click', function() {
      var col = th.dataset.col;
      if (sortCol === col) {
        sortDir = sortDir === 'asc' ? 'desc' : 'asc';
      } else {
        sortCol = col;
        sortDir = col === 'word' ? 'asc' : 'desc';
      }
      document.querySelectorAll('.wf-th').forEach(function(h){
        h.classList.remove('active','asc','desc');
      });
      th.classList.add('active', sortDir);
      currentData = sortData(currentData);
      renderTable(currentData);
    });
  });

  /* Filter */
  filterInput.addEventListener('input', function() {
    renderTable(currentData);
  });

  /* Copy results */
  copyBtn.addEventListener('click', function() {
    if (!currentData.length) return;
    var filter = filterInput.value.toLowerCase().trim();
    var rows = filter
      ? currentData.filter(function(r){ return r.word.toLowerCase().includes(filter); })
      : currentData;
    var text = 'Word\tCount\tPercentage\n' +
      rows.map(function(r){ return r.word + '\t' + r.count + '\t' + r.pct + '%'; }).join('\n');
    navigator.clipboard.writeText(text).then(function() {
      copyBtn.textContent = 'Copied!';
      setTimeout(function(){ copyBtn.textContent = 'Copy results'; }, 2000);
    });
  });

  /* Options */
  [optStops, optCase, optNums].forEach(function(cb) {
    cb.addEventListener('change', analyze);
  });

  input.addEventListener('input', analyze);

  analyze();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
