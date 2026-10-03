<?php
$tool_slug   = 'sentence-counter';
$tool_name   = 'Sentence Counter';

$page_title  = 'Sentence Counter — Count Sentences Online Free | TextlyPop';
$meta_desc   = 'Count sentences, paragraphs, lines and average sentence length instantly. Free online sentence counter. Results update as you type. No signup required.';
$canonical_url = 'https://textlypop.com/tools/sentence-counter';
$og_title    = 'Free Online Sentence Counter — TextlyPop';
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
  "name": "Sentence Counter",
  "url": "https://textlypop.com/tools/sentence-counter",
  "description": "Count sentences, paragraphs, lines and average sentence length instantly. Results update as you type.",
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
      "name": "How does the sentence counter detect sentences?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It scans for ending punctuation — periods, exclamation marks and question marks — while skipping the cases that fool naive counters. Abbreviations like Mr., Dr. and U.S.A. are not treated as sentence endings, decimal numbers are handled correctly, and an ellipsis counts as a single ending. The result is an accurate count even in complex professional text."
      }
    },
    {
      "@type": "Question",
      "name": "What is the ideal sentence length for readability?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Aim for an average of 15 to 20 words for general web content — the range recommended by most readability guidelines, including the US government's plain-language standards. Hemingway averaged around 10 words; academic writing often runs 25 to 30. Anything past 30 words is hard to follow on first read, and varying sentence length matters as much as the average."
      }
    },
    {
      "@type": "Question",
      "name": "How many sentences should a paragraph have?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "For screens, two to four sentences per paragraph works best. Paragraphs of six or more sentences form dense walls of text that are especially punishing on mobile. Short paragraphs create white space that makes a page approachable and scannable — print tolerates longer paragraphs, the web rewards shorter ones."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between a sentence counter and a paragraph counter?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A sentence counter counts units of thought ending in terminal punctuation; a paragraph counter counts blocks separated by blank lines. This tool reports both plus average sentences per paragraph — the structural metric that reveals whether long text is well-organised or just long."
      }
    },
    {
      "@type": "Question",
      "name": "Can I count sentences in multiple paragraphs at once?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Paste an entire essay, article or chapter and the counter processes all of it — total sentences, paragraph count and per-paragraph averages, so you can spot outliers like one paragraph carrying ten sentences while the rest carry three."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Count Sentences Online',
  'description' => 'Count sentences, paragraphs and average sentence length using TextlyPop sentence counter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Paste your text','text'=>'Type or paste your text into the input box. The sentence count updates instantly as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'View the stats','text'=>'See sentence count, paragraph count, word count, average words per sentence, and longest and shortest sentences.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Check sentence length distribution','text'=>'The distribution chart shows how many short, medium, and long sentences your text contains.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Use the insights to improve','text'=>'If your average sentence length is over 20 words, look for long sentences to break up. If it is under 10, vary your rhythm with some longer sentences.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Sentence Counter','item'=>'https://textlypop.com/tools/sentence-counter'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Sentence counter</h1>
    <p>Count sentences, paragraphs and average sentence length. Results update as you type.</p>
  </div>

  <div class="sc-tool" id="sc-tool">

    <!-- Textarea -->
    <div class="sc-input-wrap">
      <textarea
        id="sc-input"
        class="sc-textarea"
        placeholder="Type or paste your text here…"
        aria-label="Text to count sentences in"
        data-save-key="sentence-counter"
        spellcheck="true"></textarea>
      <div class="sc-input-footer">
        <button class="btn btn-clear" data-targets="sc-input">Clear</button>
        <button class="btn btn-copy" data-target="sc-input">Copy text</button>
      </div>
    </div>

    <!-- Stats bar -->
    <div class="sc-stats" role="region" aria-label="Text statistics" aria-live="polite">
      <div class="sc-stat">
        <span class="sc-stat-num" id="sc-sentences">0</span>
        <span class="sc-stat-label">Sentences</span>
      </div>
      <div class="sc-stat">
        <span class="sc-stat-num" id="sc-paragraphs">0</span>
        <span class="sc-stat-label">Paragraphs</span>
      </div>
      <div class="sc-stat">
        <span class="sc-stat-num" id="sc-words">0</span>
        <span class="sc-stat-label">Words</span>
      </div>
      <div class="sc-stat">
        <span class="sc-stat-num" id="sc-chars">0</span>
        <span class="sc-stat-label">Characters</span>
      </div>
      <div class="sc-stat">
        <span class="sc-stat-num" id="sc-avg-words">0</span>
        <span class="sc-stat-label">Avg words/sentence</span>
      </div>
      <div class="sc-stat">
        <span class="sc-stat-num" id="sc-avg-chars">0</span>
        <span class="sc-stat-label">Avg chars/sentence</span>
      </div>
    </div>

    <!-- Sentence length distribution -->
    <div class="sc-distribution" id="sc-distribution">
      <div class="sc-dist-header">
        <span class="sc-dist-title">Sentence length distribution</span>
        <span class="sc-dist-hint" id="sc-dist-hint">Paste text to see distribution</span>
      </div>
      <div class="sc-dist-bars" id="sc-dist-bars" aria-label="Sentence length distribution chart">
        <div class="sc-dist-group">
          <div class="sc-dist-bar-wrap">
            <div class="sc-dist-bar sc-dist-short" id="sc-bar-short" style="height:0%"></div>
          </div>
          <div class="sc-dist-count" id="sc-count-short">0</div>
          <div class="sc-dist-label">Short<br><em>1–10 words</em></div>
        </div>
        <div class="sc-dist-group">
          <div class="sc-dist-bar-wrap">
            <div class="sc-dist-bar sc-dist-medium" id="sc-bar-medium" style="height:0%"></div>
          </div>
          <div class="sc-dist-count" id="sc-count-medium">0</div>
          <div class="sc-dist-label">Medium<br><em>11–20 words</em></div>
        </div>
        <div class="sc-dist-group">
          <div class="sc-dist-bar-wrap">
            <div class="sc-dist-bar sc-dist-long" id="sc-bar-long" style="height:0%"></div>
          </div>
          <div class="sc-dist-count" id="sc-count-long">0</div>
          <div class="sc-dist-label">Long<br><em>21–30 words</em></div>
        </div>
        <div class="sc-dist-group">
          <div class="sc-dist-bar-wrap">
            <div class="sc-dist-bar sc-dist-vlong" id="sc-bar-vlong" style="height:0%"></div>
          </div>
          <div class="sc-dist-count" id="sc-count-vlong">0</div>
          <div class="sc-dist-label">Very long<br><em>31+ words</em></div>
        </div>
      </div>

      <!-- Longest / shortest -->
      <div class="sc-extremes hidden" id="sc-extremes">
        <div class="sc-extreme">
          <span class="sc-extreme-label">Shortest sentence</span>
          <span class="sc-extreme-val" id="sc-shortest"></span>
        </div>
        <div class="sc-extreme">
          <span class="sc-extreme-label">Longest sentence</span>
          <span class="sc-extreme-val" id="sc-longest"></span>
        </div>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="sc-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="sc-input" data-to-tool="reading-level-checker">Reading level</button>
    <button class="send-to-btn" data-from="sc-input" data-to-tool="find-and-replace">Find and replace</button>
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

    <h2>About sentence length and readability</h2>
    <p>Sentence length is one of the strongest predictors of how easy text is to read — it sits at the heart of every major readability formula, from Flesch–Kincaid to the Gunning Fog Index. English prose has also been getting steadily shorter: scholars who studied historical writing found average sentences of 40 to 60 words in Elizabethan times, around 30 in the Victorian era, and closer to 15 to 20 in modern journalism. Counting sentences, measuring their average length and seeing their distribution tells you more about how your writing <em>feels</em> to a reader than a word count alone ever can.</p>

    <h2>How many words are in a sentence</h2>
    <p>There is no rule, but there are well-established norms. Modern English prose averages 15 to 20 words per sentence, and that is the range plain-language guidance — including the US government's own standards — recommends for anything written for a general audience. Below about 10 the writing starts to feel clipped; above 25 the reader has to hold too much in mind before reaching the verb. Academic and legal writing routinely averages 25 to 30 words, which is a large part of why it reads as heavy going.</p>
    <p>The average matters less than the spread, though. Text where every sentence is 18 words long is monotonous even at a perfect average, while prose that mixes a 30-word sentence with a 4-word one has rhythm. This is why the counter reports the distribution alongside the average words per sentence, plus your longest and shortest sentence — the average tells you whether you are in range, and the distribution tells you whether you are varying.</p>
    <div class="table-scroll">
      <table class="seo-table">
        <thead>
          <tr><th>Average words per sentence</th><th>Reads as</th><th>Typical of</th></tr>
        </thead>
        <tbody>
          <tr><td>Under 10</td><td>Clipped, staccato</td><td>Children's books, advertising copy</td></tr>
          <tr><td>11–15</td><td>Brisk and clear</td><td>Popular journalism, plain-language writing</td></tr>
          <tr><td>16–20</td><td>Comfortable</td><td>Most web content, general non-fiction</td></tr>
          <tr><td>21–25</td><td>Demanding</td><td>Broadsheet features, trade publications</td></tr>
          <tr><td>Over 25</td><td>Heavy going</td><td>Academic papers, legal and technical writing</td></tr>
        </tbody>
      </table>
    </div>

    <h2>Sentence length distribution</h2>
    <p>The distribution chart shows how your sentences break down by length category. Short sentences of 1 to 10 words are punchy and easy to read but too many can make text feel choppy. Medium sentences of 11 to 20 words carry most of the content in well-written prose and are the ideal target range. Long sentences of 21 to 30 words add complexity and nuance but should be used sparingly. Very long sentences of 31 or more words are difficult to follow and should almost always be broken into shorter ones.</p>
    <p>Good writing varies sentence length to create rhythm. A mix of short, medium, and occasional long sentences reads more naturally than text where every sentence is the same length. If your distribution shows mostly very long sentences, the <a href="/tools/reading-level-checker">reading level checker</a> will likely show a high difficulty score — break them up to improve both readability and comprehension.</p>
    <p>Sentence count is one of several length measures worth reading together. The <a href="/tools/word-counter">word counter</a> reports words, characters and reading time; <a href="/tools/words-to-pages">words to pages</a> turns the total into a page estimate for an assignment specified in pages; and the <a href="/tools/word-frequency-counter">word frequency counter</a> catches the words you repeat once the structure is sound.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the sentence counter detect sentences?</p>
      <p class="faq-a">It scans for ending punctuation — periods, exclamation marks and question marks — while intelligently skipping the cases that fool naive counters. Abbreviations like Mr., Dr. and U.S.A. are recognised and not treated as sentence endings, decimal numbers like 3.14 are handled correctly, and an ellipsis counts as a single ending rather than three periods. The result is an accurate count even in complex professional text, updated live as you type.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the ideal sentence length for readability?</p>
      <p class="faq-a">Aim for an average of 15 to 20 words for general web content — the range recommended by most readability guidelines, including the US government's plain-language standards, which cap sentences at 20 words. For context, Hemingway's famously terse style averaged around 10 words, while academic writing often runs 25 to 30. Anything past 30 words is hard to follow on first read, and the average matters less than variation: mixing short, medium and occasional long sentences is what gives prose its rhythm.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many sentences should a paragraph have?</p>
      <p class="faq-a">For screens, two to four sentences per paragraph works best. Long paragraphs of six or more sentences form dense walls of text that are especially punishing on mobile, where a single paragraph can fill the entire viewport. Short paragraphs create white space that makes a page feel approachable and lets readers scan for the point they need. Print tolerates longer paragraphs; the web rewards shorter ones.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between a sentence counter and a paragraph counter?</p>
      <p class="faq-a">A sentence counter counts units of thought ending in terminal punctuation; a paragraph counter counts blocks of text separated by blank lines. This tool reports both, plus the average sentences per paragraph — the structural metric editors care about most, because it reveals whether long text is actually well-organised or just long. Word and character counts round out the picture, but sentence-level structure is what distinguishes readable writing from dense writing.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I count sentences in multiple paragraphs at once?</p>
      <p class="faq-a">Yes. Paste an entire essay, article or chapter and the counter processes all of it — there is no length limit that matters in practice. You get the total sentence count across the whole text, the paragraph count, and the per-paragraph averages, so you can spot outliers like a single paragraph carrying ten sentences while the rest carry three.</p>
    </div>

  </div>

</div>

<!-- Sentence counter CSS -->
<style>
.sc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.sc-textarea {
  width: 100%;
  min-height: 220px;
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

.sc-textarea::placeholder { color: var(--text-3); }

.sc-input-footer {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 8px;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

/* Stats bar */
.sc-stats {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
  background: var(--accent-light);
}

[data-theme="dark"] .sc-stats { background: var(--accent-dim); }

.sc-stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 16px 8px;
  border-right: 1px solid var(--border);
  text-align: center;
}

.sc-stat:last-child { border-right: none; }

.sc-stat-num {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
  margin-bottom: 5px;
  font-variant-numeric: tabular-nums;
  transition: transform 0.1s ease;
}

.sc-stat-num.bump { transform: scale(1.12); }

.sc-stat-label {
  font-size: 0.6875rem;
  color: var(--text-3);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-weight: 500;
  line-height: 1.3;
}

/* Distribution chart */
.sc-distribution {
  padding: 16px;
  border-top: 1px solid var(--border);
}

.sc-dist-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 16px;
  flex-wrap: wrap;
  gap: 6px;
}

.sc-dist-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.sc-dist-hint { font-size: 0.75rem; color: var(--text-3); }

.sc-dist-bars {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 12px;
  align-items: end;
  height: 140px;
  margin-bottom: 8px;
}

.sc-dist-group {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  height: 100%;
}

.sc-dist-bar-wrap {
  flex: 1;
  width: 100%;
  display: flex;
  align-items: flex-end;
  justify-content: center;
}

.sc-dist-bar {
  width: 70%;
  border-radius: 4px 4px 0 0;
  transition: height 0.4s ease;
  min-height: 2px;
}

.sc-dist-short  { background: var(--accent); }
.sc-dist-medium { background: #38a169; }
.sc-dist-long   { background: #d69e2e; }
.sc-dist-vlong  { background: #e53e3e; }

.sc-dist-count {
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--text);
  font-variant-numeric: tabular-nums;
}

.sc-dist-label {
  font-size: 0.6875rem;
  color: var(--text-3);
  text-align: center;
  line-height: 1.4;
}

.sc-dist-label em { font-style: normal; display: block; }

/* Extremes */
.sc-extremes {
  margin-top: 12px;
  display: flex;
  flex-direction: column;
  gap: 8px;
  padding: 12px 14px;
  background: var(--bg-2);
  border-radius: var(--radius-md);
  border: 1px solid var(--border);
}

.sc-extreme { display: flex; flex-direction: column; gap: 3px; }

.sc-extreme-label {
  font-size: 0.7rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--text-3);
}

.sc-extreme-val {
  font-size: 0.875rem;
  color: var(--text);
  font-style: italic;
  line-height: 1.4;
}

/* Mobile */
@media (max-width: 640px) {
  .sc-stats { grid-template-columns: repeat(3, 1fr); }
  .sc-stat:nth-child(3) { border-right: none; }
  .sc-stat:nth-child(n+4) { border-top: 1px solid var(--border); }
  .sc-dist-bars { height: 100px; }
}
</style>

<!-- Sentence counter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input = document.getElementById('sc-input');

  var statSentences = document.getElementById('sc-sentences');
  var statParagraphs= document.getElementById('sc-paragraphs');
  var statWords     = document.getElementById('sc-words');
  var statChars     = document.getElementById('sc-chars');
  var statAvgWords  = document.getElementById('sc-avg-words');
  var statAvgChars  = document.getElementById('sc-avg-chars');

  var barShort  = document.getElementById('sc-bar-short');
  var barMedium = document.getElementById('sc-bar-medium');
  var barLong   = document.getElementById('sc-bar-long');
  var barVlong  = document.getElementById('sc-bar-vlong');

  var countShort  = document.getElementById('sc-count-short');
  var countMedium = document.getElementById('sc-count-medium');
  var countLong   = document.getElementById('sc-count-long');
  var countVlong  = document.getElementById('sc-count-vlong');

  var distHint  = document.getElementById('sc-dist-hint');
  var extremes  = document.getElementById('sc-extremes');
  var shortest  = document.getElementById('sc-shortest');
  var longest   = document.getElementById('sc-longest');

  function getSentences(text) {
    if (!text.trim()) return [];

    /* Protect abbreviations and decimals */
    var protected_text = text
      .replace(/\b(Mr|Mrs|Ms|Dr|Prof|Sr|Jr|vs|etc|Inc|Ltd|Corp|St|Ave|Blvd|Dept|approx|est|vol|no|pp|fig|cf|e\.g|i\.e)\./gi, '$1ABBR')
      .replace(/(\d+)\.(\d+)/g, '$1DECIMAL$2')
      .replace(/\.{2,}/g, 'ELLIPSIS');

    var raw = protected_text.match(/[^.!?]+[.!?]+(?:\s|$)|[^.!?]+$/g);
    if (!raw) return [];

    return raw
      .map(function(s) { return s.replace(/ABBR/g,'.').replace(/DECIMAL/g,'.').replace(/ELLIPSIS/g,'…').trim(); })
      .filter(function(s) { return s.length > 0; });
  }

  function countWords(s) {
    return s.trim().split(/\s+/).filter(Boolean).length;
  }

  function bump(el) {
    el.classList.remove('bump');
    void el.offsetWidth;
    el.classList.add('bump');
    setTimeout(function(){ el.classList.remove('bump'); }, 120);
  }

  function analyze() {
    var text = input.value;

    if (!text.trim()) {
      reset();
      return;
    }

    var sentences  = getSentences(text);
    var sentCount  = sentences.length;
    var paraCount  = text.trim().split(/\n\s*\n/).filter(function(p){ return p.trim().length > 0; }).length;
    var words      = text.trim().split(/\s+/).filter(Boolean).length;
    var chars      = text.length;
    var avgWords   = sentCount > 0 ? (words / sentCount).toFixed(1) : 0;
    var avgChars   = sentCount > 0 ? Math.round(chars / sentCount) : 0;

    /* Distribution */
    var short = 0, medium = 0, long = 0, vlong = 0;
    var minWords = Infinity, maxWords = 0;
    var shortestSent = '', longestSent = '';

    sentences.forEach(function(s) {
      var wc = countWords(s);
      if (wc < minWords) { minWords = wc; shortestSent = s; }
      if (wc > maxWords) { maxWords = wc; longestSent = s; }
      if (wc <= 10)      short++;
      else if (wc <= 20) medium++;
      else if (wc <= 30) long++;
      else               vlong++;
    });

    var maxCount = Math.max(short, medium, long, vlong, 1);

    /* Update stats */
    statSentences.textContent  = sentCount.toLocaleString();
    statParagraphs.textContent = paraCount.toLocaleString();
    statWords.textContent      = words.toLocaleString();
    statChars.textContent      = chars.toLocaleString();
    statAvgWords.textContent   = avgWords;
    statAvgChars.textContent   = avgChars.toLocaleString();
    bump(statSentences);

    /* Distribution bars */
    barShort.style.height  = ((short  / maxCount) * 100) + '%';
    barMedium.style.height = ((medium / maxCount) * 100) + '%';
    barLong.style.height   = ((long   / maxCount) * 100) + '%';
    barVlong.style.height  = ((vlong  / maxCount) * 100) + '%';

    countShort.textContent  = short;
    countMedium.textContent = medium;
    countLong.textContent   = long;
    countVlong.textContent  = vlong;

    distHint.textContent = sentCount + ' sentence' + (sentCount !== 1 ? 's' : '') + ' analyzed';

    /* Extremes */
    if (sentCount >= 2) {
      extremes.classList.remove('hidden');
      shortest.textContent = shortestSent.length > 80 ? shortestSent.slice(0, 80) + '…' : shortestSent;
      longest.textContent  = longestSent.length  > 80 ? longestSent.slice(0, 80)  + '…' : longestSent;
    } else {
      extremes.classList.add('hidden');
    }
  }

  function reset() {
    statSentences.textContent = statParagraphs.textContent = statWords.textContent = '0';
    statChars.textContent = statAvgWords.textContent = statAvgChars.textContent = '0';
    [barShort, barMedium, barLong, barVlong].forEach(function(b){ b.style.height = '0%'; });
    [countShort, countMedium, countLong, countVlong].forEach(function(c){ c.textContent = '0'; });
    distHint.textContent = 'Paste text to see distribution';
    extremes.classList.add('hidden');
  }

  input.addEventListener('input', analyze);
  analyze();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
