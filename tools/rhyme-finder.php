<?php
$tool_slug   = 'rhyme-finder';
$tool_name   = 'Rhyme Finder';

$page_title  = 'Rhyme Finder — Find Words That Rhyme Online Free | TextlyPop';
$meta_desc   = 'Find words that rhyme with any word instantly. Perfect for poetry, songwriting, rap lyrics and creative writing. Free online rhyme finder. No signup required.';
$canonical_url = 'https://textlypop.com/tools/rhyme-finder';
$og_title    = 'Free Online Rhyme Finder — TextlyPop';
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
  "name": "Rhyme Finder",
  "url": "https://textlypop.com/tools/rhyme-finder",
  "description": "Find words that rhyme with any word instantly. Perfect for poetry, songwriting and creative writing.",
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
      "name": "How do I find words that rhyme?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Type any word into the search box and click Find Rhymes. The tool returns perfect rhymes first, followed by near rhymes that sound similar. Click any word to copy it."
      }
    },
    {
      "@type": "Question",
      "name": "What is a perfect rhyme?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A perfect rhyme is when two words share the same vowel sound and any following consonant sounds. Cat and bat, moon and soon, dope and hope are all perfect rhymes."
      }
    },
    {
      "@type": "Question",
      "name": "What is a near rhyme?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A near rhyme also called a slant rhyme or half rhyme is when two words sound similar but do not share an exact ending sound. Near rhymes are widely used in modern poetry, rap and songwriting when perfect rhymes are hard to find."
      }
    },
    {
      "@type": "Question",
      "name": "Why would I use a rhyme finder?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Rhyme finders help poets, songwriters, lyricists and rappers find words that fit a rhyme scheme quickly. They are also useful for word games, phonics learning, and anyone who needs to find rhyming options fast."
      }
    },
    {
      "@type": "Question",
      "name": "How many rhymes can I find?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The rhyme finder searches a database of hundreds of thousands of English words and returns up to 100 perfect rhymes and 100 near rhymes for any word."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Find Rhyming Words Online',
  'description' => 'Find words that rhyme with any word using TextlyPop rhyme finder.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Enter a word','text'=>'Type any word into the search box. Press Enter or click Find Rhymes.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Browse results','text'=>'Perfect rhymes appear first, followed by near rhymes. Each word shows its frequency score so common words appear first.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Click to copy','text'=>'Click any rhyming word to copy it to your clipboard.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Search from a result','text'=>'Double-click any result word to search for its rhymes instead.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Rhyme Finder','item'=>'https://textlypop.com/tools/rhyme-finder'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Rhyme finder</h1>
    <p>Find words that rhyme with any word. Perfect for poetry, songwriting, rap lyrics and creative writing.</p>
  </div>

  <div class="rf-tool" id="rf-tool">

    <!-- Search bar -->
    <div class="rf-search-wrap">
      <div class="rf-search-inner">
        <input
          type="text"
          id="rf-input"
          class="rf-input"
          placeholder="Enter a word… e.g. dope, love, night, dream"
          aria-label="Word to find rhymes for"
          autocomplete="off"
          autocorrect="off"
          spellcheck="false"
          maxlength="50">
        <button class="btn btn-primary rf-search-btn" id="rf-search-btn">
          Find rhymes
        </button>
      </div>
    </div>

    <!-- Results area -->
    <div class="rf-results" id="rf-results">

      <!-- Empty state -->
      <div class="rf-empty" id="rf-empty">
        <div class="rf-empty-icon" aria-hidden="true">🎵</div>
        <p>Enter any word to find rhymes</p>
        <div class="rf-quick-examples">
          <span class="rf-ex-label">Try:</span>
          <button class="rf-ex-btn" data-word="dope">dope</button>
          <button class="rf-ex-btn" data-word="love">love</button>
          <button class="rf-ex-btn" data-word="night">night</button>
          <button class="rf-ex-btn" data-word="dream">dream</button>
          <button class="rf-ex-btn" data-word="fire">fire</button>
          <button class="rf-ex-btn" data-word="heart">heart</button>
          <button class="rf-ex-btn" data-word="time">time</button>
          <button class="rf-ex-btn" data-word="rain">rain</button>
          <button class="rf-ex-btn" data-word="light">light</button>
          <button class="rf-ex-btn" data-word="soul">soul</button>
        </div>
      </div>

      <!-- Loading -->
      <div class="rf-loading hidden" id="rf-loading">
        <div class="rf-spinner" aria-hidden="true"></div>
        <p>Finding rhymes…</p>
      </div>

      <!-- Result content -->
      <div class="rf-result-content hidden" id="rf-result-content" aria-live="polite">
        <div class="rf-result-header">
          <div class="rf-result-title-wrap">
            <h2 class="rf-result-title">Rhymes for <span id="rf-result-word"></span></h2>
            <span class="rf-result-count" id="rf-result-count"></span>
          </div>
          <div class="rf-view-toggle" role="group" aria-label="View mode">
            <button class="rf-view-btn active" data-view="cloud" aria-pressed="true">Cloud</button>
            <button class="rf-view-btn" data-view="list" aria-pressed="false">List</button>
          </div>
        </div>

        <div id="rf-sections"></div>
      </div>

      <!-- No results -->
      <div class="rf-no-results hidden" id="rf-no-results">
        <p>No rhymes found for "<strong id="rf-no-word"></strong>". Try a different word.</p>
      </div>

      <!-- Error -->
      <div class="rf-error hidden" id="rf-error">
        <p>Could not fetch rhymes. Please check your connection and try again.</p>
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

    <h2>How rhyming works</h2>
    <p>Two words rhyme when they share the same vowel sound and any consonant sounds that follow it. The word "dope" ends in the sound "ope" — so cope, hope, rope, scope, slope, grope, and mope all rhyme with it perfectly. The consonant sounds before the vowel can be completely different. What matters is everything from the stressed vowel to the end of the word.</p>
    <p>Perfect rhymes share identical ending sounds. Near rhymes — also called slant rhymes or half rhymes — have similar but not identical sounds. Both types are widely used in poetry and songwriting. Near rhymes give writers more flexibility when perfect rhymes are hard to find or sound too forced within the context of a line.</p>

    <h2>Using rhymes in poetry and songwriting</h2>
    <p>Rhyme schemes give poems and songs structure and rhythm. A simple ABAB scheme alternates rhyming lines. A couplet scheme (AABB) pairs consecutive rhyming lines. In hip-hop and rap, multi-syllable rhymes where multiple syllables rhyme across words are especially valued. A rhyme finder helps identify options quickly so you can evaluate which word fits best within the meaning and meter of your line.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I find words that rhyme?</p>
      <p class="faq-a">Type any word and click Find Rhymes. Perfect rhymes appear first, followed by near rhymes. Click any word to copy it.</p>
    </div>
    <div class="faq-item">
      <p class="faq-q">What is a perfect rhyme?</p>
      <p class="faq-a">Two words share the same vowel sound and any following consonants. Cat and bat, dope and hope, moon and soon are perfect rhymes.</p>
    </div>
    <div class="faq-item">
      <p class="faq-q">What is a near rhyme?</p>
      <p class="faq-a">Similar but not identical ending sounds. Also called slant rhymes or half rhymes. Widely used in modern poetry and rap when perfect rhymes sound too forced.</p>
    </div>
    <div class="faq-item">
      <p class="faq-q">How many rhymes can I find?</p>
      <p class="faq-a">Up to 100 perfect rhymes and 100 near rhymes from a database of hundreds of thousands of English words.</p>
    </div>

  </div>

</div>

<!-- Rhyme finder CSS -->
<style>
.rf-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Search */
.rf-search-wrap {
  padding: 20px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.rf-search-inner {
  display: flex;
  gap: 10px;
  max-width: 640px;
  margin: 0 auto;
}

.rf-input {
  flex: 1;
  padding: 12px 16px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 1.0625rem;
  outline: none;
  transition: border-color var(--transition);
}

.rf-input:focus { border-color: var(--accent); }
.rf-input::placeholder { color: var(--text-3); }
.rf-search-btn { padding: 12px 24px; white-space: nowrap; }

/* Results area */
.rf-results { padding: 24px; min-height: 220px; }

/* Empty state */
.rf-empty { text-align: center; padding: 16px 0; }
.rf-empty-icon { font-size: 2.5rem; margin-bottom: 10px; }
.rf-empty p { color: var(--text-3); font-size: 1rem; margin-bottom: 16px; }

.rf-quick-examples {
  display: flex;
  align-items: center;
  gap: 8px;
  justify-content: center;
  flex-wrap: wrap;
}

.rf-ex-label {
  font-size: 0.8125rem;
  color: var(--text-3);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.rf-ex-btn {
  padding: 5px 14px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg-2);
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.875rem;
  cursor: pointer;
  transition: border-color var(--transition), color var(--transition), background var(--transition);
}

.rf-ex-btn:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .rf-ex-btn:hover { background: var(--accent-dim); }

/* Loading */
.rf-loading { text-align: center; padding: 40px 0; }
.rf-loading p { color: var(--text-3); margin-top: 12px; }

.rf-spinner {
  width: 32px;
  height: 32px;
  border: 3px solid var(--border-2);
  border-top-color: var(--accent);
  border-radius: 50%;
  animation: rfSpin 0.8s linear infinite;
  margin: 0 auto;
}

@keyframes rfSpin { to { transform: rotate(360deg); } }

/* Result header */
.rf-result-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 12px;
  margin-bottom: 20px;
  flex-wrap: wrap;
}

.rf-result-title-wrap { display: flex; align-items: baseline; gap: 10px; flex-wrap: wrap; }

.rf-result-title {
  font-size: 1.375rem;
  font-weight: 700;
  color: var(--text);
  margin: 0;
}

.rf-result-title span { color: var(--accent); }
.rf-result-count { font-size: 0.875rem; color: var(--text-3); white-space: nowrap; }

/* View toggle */
.rf-view-toggle {
  display: flex;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  overflow: hidden;
  flex-shrink: 0;
}

.rf-view-btn {
  padding: 5px 12px;
  border: none;
  background: transparent;
  color: var(--text-3);
  font-family: var(--font);
  font-size: 0.8125rem;
  cursor: pointer;
  transition: background var(--transition), color var(--transition);
}

.rf-view-btn:first-child { border-right: 1px solid var(--border-2); }
.rf-view-btn.active { background: var(--accent); color: #fff; }
.rf-view-btn:not(.active):hover { background: var(--bg-3); color: var(--text); }

/* Sections */
.rf-section { margin-bottom: 24px; }

.rf-section-header {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 12px;
}

.rf-section-title {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-3);
}

.rf-section-count {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 2px 8px;
  border-radius: 20px;
  font-size: 0.6875rem;
  font-weight: 600;
}

.rf-count-perfect { background: rgba(29,158,117,0.12); color: var(--accent); }
.rf-count-near    { background: rgba(214,158,46,0.12);  color: #b7791f; }
[data-theme="dark"] .rf-count-near { color: #d69e2e; }

/* Cloud view — word chips */
.rf-word-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.rf-word {
  display: inline-flex;
  align-items: center;
  padding: 6px 14px;
  border-radius: 20px;
  font-size: 0.9375rem;
  font-weight: 500;
  cursor: pointer;
  border: 1px solid transparent;
  transition: transform 0.1s ease, border-color var(--transition), background var(--transition), color var(--transition);
  user-select: none;
  font-family: var(--font);
  background: none;
}

.rf-word:hover { transform: translateY(-1px); }

.rf-word-perfect {
  background: var(--accent-light);
  color: var(--accent-dark);
  border-color: rgba(29,158,117,0.2);
}

[data-theme="dark"] .rf-word-perfect { background: var(--accent-dim); color: #5DCAA5; }
.rf-word-perfect:hover { border-color: var(--accent); }

.rf-word-near {
  background: rgba(214,158,46,0.08);
  color: #7b5b12;
  border-color: rgba(214,158,46,0.15);
}

[data-theme="dark"] .rf-word-near { background: rgba(214,158,46,0.1); color: #d69e2e; }
.rf-word-near:hover { border-color: #d69e2e; }

.rf-word.copied {
  background: var(--accent) !important;
  color: #fff !important;
  border-color: var(--accent) !important;
  transform: none;
}

/* List view */
.rf-word-list {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.rf-list-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 8px 12px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  cursor: pointer;
  font-family: var(--font);
  font-size: 0.9375rem;
  color: var(--text);
  transition: border-color var(--transition), background var(--transition);
  user-select: none;
}

.rf-list-item:hover { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .rf-list-item:hover { background: var(--accent-dim); }

.rf-list-word { font-weight: 500; }
.rf-list-score { font-size: 0.75rem; color: var(--text-3); }

.rf-list-item.copied { border-color: var(--accent); background: var(--accent) !important; }
.rf-list-item.copied .rf-list-word,
.rf-list-item.copied .rf-list-score { color: #fff; }

/* No results / error */
.rf-no-results, .rf-error {
  text-align: center;
  padding: 32px;
  color: var(--text-3);
  font-size: 0.9375rem;
}

@media (max-width: 480px) {
  .rf-search-inner { flex-direction: column; }
  .rf-search-btn { width: 100%; justify-content: center; }
  .rf-result-header { flex-direction: column; }
}
</style>

<!-- Rhyme finder JavaScript — uses Datamuse API -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var inputEl       = document.getElementById('rf-input');
  var searchBtn     = document.getElementById('rf-search-btn');
  var emptyEl       = document.getElementById('rf-empty');
  var loadingEl     = document.getElementById('rf-loading');
  var resultContent = document.getElementById('rf-result-content');
  var noResults     = document.getElementById('rf-no-results');
  var errorEl       = document.getElementById('rf-error');
  var resultWord    = document.getElementById('rf-result-word');
  var resultCount   = document.getElementById('rf-result-count');
  var sectionsEl    = document.getElementById('rf-sections');
  var noWord        = document.getElementById('rf-no-word');

  var currentView = 'cloud';
  var lastData    = null;
  var lastWord    = '';
  var controller  = null;

  /* ── Show/hide helpers ── */
  function showOnly(el) {
    [emptyEl, loadingEl, resultContent, noResults, errorEl].forEach(function(e) {
      e.classList.add('hidden');
    });
    el.classList.remove('hidden');
  }

  /* ── Fetch from Datamuse API ── */
  function fetchRhymes(word) {
    if (controller) controller.abort();

    showOnly(loadingEl);
    lastWord = word;

    /* Datamuse: rel_rhy = perfect rhymes, rel_nry = near rhymes */
    var perfectUrl = 'https://api.datamuse.com/words?rel_rhy=' + encodeURIComponent(word) + '&max=100';
    var nearUrl    = 'https://api.datamuse.com/words?rel_nry=' + encodeURIComponent(word) + '&max=100';

    var perfectData = [];
    var nearData    = [];
    var done        = 0;
    var failed      = false;

    function checkDone() {
      done++;
      if (done < 2) return;
      if (failed) { showOnly(errorEl); return; }
      lastData = { word: word, perfect: perfectData, near: nearData };
      renderResults(lastData);
    }

    fetch(perfectUrl)
      .then(function(r) { return r.json(); })
      .then(function(data) {
        perfectData = data || [];
        checkDone();
      })
      .catch(function() {
        failed = true;
        checkDone();
      });

    fetch(nearUrl)
      .then(function(r) { return r.json(); })
      .then(function(data) {
        nearData = (data || []).filter(function(w) {
          return !perfectData.some(function(p) { return p.word === w.word; });
        });
        checkDone();
      })
      .catch(function() {
        failed = true;
        checkDone();
      });
  }

  /* ── Render results ── */
  function renderResults(data) {
    var total = data.perfect.length + data.near.length;

    if (total === 0) {
      noWord.textContent = data.word;
      showOnly(noResults);
      return;
    }

    showOnly(resultContent);
    resultWord.textContent = data.word;
    resultCount.textContent = total + ' rhyme' + (total !== 1 ? 's' : '') + ' found';

    sectionsEl.innerHTML = '';

    var sections = [
      { label: 'Perfect rhymes', countClass: 'rf-count-perfect', words: data.perfect, cls: 'rf-word-perfect' },
      { label: 'Near rhymes',    countClass: 'rf-count-near',    words: data.near,    cls: 'rf-word-near'    },
    ];

    sections.forEach(function(sec) {
      if (!sec.words.length) return;

      var section = document.createElement('div');
      section.className = 'rf-section';

      var header = document.createElement('div');
      header.className = 'rf-section-header';
      header.innerHTML =
        '<span class="rf-section-title">' + sec.label + '</span>' +
        '<span class="rf-section-count ' + sec.countClass + '">' + sec.words.length + '</span>';
      section.appendChild(header);

      if (currentView === 'cloud') {
        section.appendChild(buildCloud(sec.words, sec.cls));
      } else {
        section.appendChild(buildList(sec.words, sec.cls));
      }

      sectionsEl.appendChild(section);
    });
  }

  /* ── Build cloud ── */
  function buildCloud(words, cls) {
    var grid = document.createElement('div');
    grid.className = 'rf-word-grid';

    words.forEach(function(item) {
      var btn = document.createElement('button');
      btn.className = 'rf-word ' + cls;
      btn.textContent = item.word;
      btn.title = 'Click to copy · Double-click to search';
      attachWordEvents(btn, item.word);
      grid.appendChild(btn);
    });

    return grid;
  }

  /* ── Build list ── */
  function buildList(words, cls) {
    var list = document.createElement('div');
    list.className = 'rf-word-list';

    words.forEach(function(item) {
      var row = document.createElement('button');
      row.className = 'rf-list-item';
      row.innerHTML =
        '<span class="rf-list-word">' + item.word + '</span>' +
        '<span class="rf-list-score">' + (item.score ? 'score ' + item.score : '') + '</span>';
      attachWordEvents(row, item.word);
      list.appendChild(row);
    });

    return list;
  }

  /* ── Word events: click=copy, dblclick=search ── */
  function attachWordEvents(el, word) {
    el.addEventListener('click', function() {
      navigator.clipboard.writeText(word).then(function() {
        el.classList.add('copied');
        var orig = el.querySelector('.rf-list-word') ? el.querySelector('.rf-list-word').textContent : el.textContent;
        if (el.querySelector('.rf-list-word')) {
          el.querySelector('.rf-list-word').textContent = '✓ Copied';
        } else {
          el.textContent = '✓';
        }
        setTimeout(function() {
          el.classList.remove('copied');
          if (el.querySelector('.rf-list-word')) {
            el.querySelector('.rf-list-word').textContent = word;
          } else {
            el.textContent = word;
          }
        }, 1400);
      });
    });

    el.addEventListener('dblclick', function(e) {
      e.preventDefault();
      inputEl.value = word;
      doSearch();
    });
  }

  /* ── View toggle ── */
  document.querySelectorAll('.rf-view-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.rf-view-btn').forEach(function(b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentView = btn.dataset.view;
      if (lastData) renderResults(lastData);
    });
  });

  /* ── Search ── */
  function doSearch() {
    var word = inputEl.value.trim().toLowerCase();
    if (!word) return;
    if (word === lastWord && resultContent && !resultContent.classList.contains('hidden')) return;
    fetchRhymes(word);
  }

  searchBtn.addEventListener('click', doSearch);

  inputEl.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') doSearch();
  });

  /* Example buttons */
  document.querySelectorAll('.rf-ex-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      inputEl.value = btn.dataset.word;
      doSearch();
    });
  });

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
