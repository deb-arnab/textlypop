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
      "name": "How does the sentence counter work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The sentence counter detects sentences by looking for ending punctuation — periods, exclamation marks, and question marks. It handles common abbreviations, decimal numbers, and ellipses to avoid false counts. Results update instantly as you type."
      }
    },
    {
      "@type": "Question",
      "name": "What is the ideal sentence length for readability?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most readability guidelines recommend an average sentence length of 15 to 20 words for general web content. Shorter sentences of 10 to 15 words improve comprehension and are particularly important for mobile readers. Sentences over 30 words are generally considered too long for comfortable reading."
      }
    },
    {
      "@type": "Question",
      "name": "How many sentences should a paragraph have?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "For web content, paragraphs of 2 to 4 sentences work best. Long paragraphs of 6 or more sentences are harder to read on screen, especially on mobile. Short paragraphs create white space that makes text feel less intimidating and easier to scan."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between a sentence and a paragraph counter?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A sentence counter counts individual sentences ending with periods, question marks, or exclamation marks. A paragraph counter counts blocks of text separated by blank lines. Both metrics together give a complete picture of your text structure."
      }
    },
    {
      "@type": "Question",
      "name": "Can I count sentences in multiple paragraphs?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The sentence counter handles text of any length including multiple paragraphs. It counts all sentences across the entire text and also shows the per-paragraph breakdown in the stats."
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

    <h2>How the sentence counter works</h2>
    <p>The sentence counter detects sentences by identifying ending punctuation — periods, exclamation marks, and question marks. It intelligently handles common exceptions to avoid false counts. Abbreviations like Mr., Dr., and U.S.A. are recognized and not counted as sentence endings. Decimal numbers like 3.14 and 99.9 are handled correctly. Ellipses are treated as single sentence endings rather than three separate periods. The result is an accurate sentence count even for complex professional text.</p>

    <h2>Sentence length distribution</h2>
    <p>The distribution chart shows how your sentences break down by length category. Short sentences of 1 to 10 words are punchy and easy to read but too many can make text feel choppy. Medium sentences of 11 to 20 words carry most of the content in well-written prose and are the ideal target range. Long sentences of 21 to 30 words add complexity and nuance but should be used sparingly. Very long sentences of 31 or more words are difficult to follow and should almost always be broken into shorter ones.</p>
    <p>Good writing varies sentence length to create rhythm. A mix of short, medium, and occasional long sentences reads more naturally than text where every sentence is the same length. If your distribution shows mostly very long sentences, the reading level checker will likely show a high difficulty score — break them up to improve both readability and comprehension.</p>

    <h2>What is the ideal sentence length</h2>
    <p>Most readability guidelines recommend an average sentence length of 15 to 20 words for general web content. The US government's plain language guidelines recommend no more than 20 words per sentence. Hemingway's famous style averaged around 10 words per sentence. Academic writing often averages 25 to 30 words per sentence. For blog posts and marketing copy targeting a general US audience, aim for 15 to 18 words average with significant variation between sentences.</p>

    <h2>Paragraphs and sentence structure</h2>
    <p>For web content, paragraphs of 2 to 4 sentences work best. Long paragraphs of 6 or more sentences are harder to read on screen, especially on mobile devices where the viewport is narrow. Short paragraphs create visual white space that makes text feel less intimidating and easier to scan. If the sentence counter shows you have paragraphs averaging 6 or more sentences, consider splitting them to improve the mobile reading experience.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the sentence counter work?</p>
      <p class="faq-a">It detects sentences by looking for ending punctuation — periods, exclamation marks, and question marks — while handling abbreviations, decimal numbers, and ellipses to avoid false counts. Results update instantly as you type.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the ideal sentence length for readability?</p>
      <p class="faq-a">Most readability guidelines recommend 15 to 20 words average for general web content. Sentences over 30 words are generally too long for comfortable reading.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many sentences should a paragraph have?</p>
      <p class="faq-a">For web content, 2 to 4 sentences per paragraph works best. Long paragraphs are harder to read on screen, especially on mobile.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between a sentence and a paragraph counter?</p>
      <p class="faq-a">A sentence counter counts sentences ending with punctuation. A paragraph counter counts blocks of text separated by blank lines. Both together give a complete picture of your text structure.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I count sentences in multiple paragraphs?</p>
      <p class="faq-a">Yes. The counter handles text of any length including multiple paragraphs and shows a complete breakdown of all sentence statistics across the entire text.</p>
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
