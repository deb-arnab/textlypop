<?php
$tool_slug   = 'word-cloud-generator';
$tool_name   = 'Word Cloud Generator';

$page_title  = 'Word Cloud Generator — Free Word Cloud Maker | TextlyPop';
$meta_desc   = 'Paste any text and generate a word cloud instantly. Words sized by frequency, with colour, font and rotation options. Download as PNG or SVG. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/word-cloud-generator';
$og_title    = 'Free Word Cloud Generator — Make a Word Cloud from Text';
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
  "name": "Word Cloud Generator",
  "url": "https://textlypop.com/tools/word-cloud-generator",
  "description": "Free word cloud generator that turns any text into a word cloud, sizing each word by how often it appears, with colour, font and rotation options and PNG or SVG download.",
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
      "name": "How do I make a word cloud from text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste or type your text into the box and the cloud draws itself — there is no button to press. The tool splits the text into words, counts how often each one appears, discards common filler words, and sizes the rest so the most frequent words are the largest. Adjust the word limit, colours, font and rotation to taste, then download the result as a PNG for slides or an SVG for print."
      }
    },
    {
      "@type": "Question",
      "name": "Why are some words missing from my word cloud?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Four filters can remove a word. Stop words such as 'the' and 'and' are discarded by default; words shorter than the minimum length are skipped; only the top N most frequent words are drawn, so rarer ones fall outside the limit; and anything you add to the custom ignore list is excluded. A word can also be dropped simply because the canvas ran out of room, which the skipped count tells you about — raising the word limit or lowering the maximum font size usually fixes it."
      }
    },
    {
      "@type": "Question",
      "name": "What are stop words and should I remove them?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Stop words are the structural words every English text is full of — the, and, of, to, is, that. In ordinary prose 'the' alone accounts for roughly 7% of all words, so leaving them in produces a cloud dominated by words that say nothing about the subject. Removing them is the right default for almost every purpose. The one reason to keep them is linguistic or stylistic analysis, where the ratio of function words is the thing you are actually measuring."
      }
    },
    {
      "@type": "Question",
      "name": "Can I download the word cloud for a presentation or print?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, in two formats. PNG exports at twice the on-screen size, which is enough for slides, documents and social posts, and a transparent background option lets it sit on a coloured slide without a white box around it. SVG is vector, so it scales to any size without blurring and the words remain editable text in Illustrator, Figma or Inkscape — that is the one to choose for posters or anything going to print."
      }
    },
    {
      "@type": "Question",
      "name": "Does a bigger word mean a more important word?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It means a more frequent word, which is not the same thing. A word cloud has no notion of meaning, context or sentiment: it cannot tell praise from complaint, it splits related words like 'run' and 'running' into separate entries, and long words occupy more space than short ones at the same font size, which exaggerates them visually. Word clouds are good at giving a quick impression of subject matter and poor at supporting any precise claim — for that, read the frequency counts rather than the picture."
      }
    },
    {
      "@type": "Question",
      "name": "Is my text uploaded anywhere?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. The counting, layout and rendering all happen in your browser using JavaScript and a canvas element, and nothing is sent to a server at any point. Your draft is kept in your browser's local storage so it survives a page reload, and clearing the box or your browser data removes it. That makes the tool safe for confidential material such as interview transcripts, survey responses or unpublished work."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= get_howto_schema(
    $tool_name,
    $meta_desc,
    [
        ['name' => 'Paste your text', 'text' => 'Paste or type your text into the input box. The word cloud is drawn automatically as you type — no button required.'],
        ['name' => 'Tune which words appear', 'text' => 'Set the word limit, minimum word length and custom ignore list, and choose whether to strip common stop words such as "the" and "and".'],
        ['name' => 'Choose the look', 'text' => 'Pick a colour palette, font, rotation style and background. Press Reshuffle for a different arrangement of the same words.'],
        ['name' => 'Download the image', 'text' => 'Download as PNG for slides and documents, or as SVG for print and further editing in a vector editor.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Word cloud generator</h1>
    <p>Turn any text into a word cloud, with each word sized by how often it appears. Everything runs in your browser — download as PNG or SVG when you are happy with it.</p>
  </div>

  <div class="wc-tool" id="wc-tool">

    <!-- Controls -->
    <div class="wc-panel wc-controls">

      <div class="wc-field">
        <div class="wc-field-head">
          <label class="wc-label" for="wc-input">Your text</label>
          <span class="wc-counts"><span id="wc-total">0</span> words &middot; <span id="wc-unique">0</span> unique</span>
        </div>
        <textarea id="wc-input" class="wc-textarea" rows="8"
                  placeholder="Paste a document, article, survey responses, reviews, transcript…"
                  data-save-key="word-cloud" spellcheck="false"></textarea>
        <div class="wc-input-actions">
          <button class="btn btn-ghost wc-sm" id="wc-sample" type="button">Load sample text</button>
          <button class="btn btn-clear wc-sm" data-targets="wc-input" type="button">Clear</button>
        </div>
      </div>

      <div class="wc-opt-grid">

        <label class="wc-opt">
          <span class="wc-opt-label">Max words</span>
          <select id="wc-max" class="wc-select">
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100" selected>100</option>
            <option value="150">150</option>
            <option value="200">200</option>
          </select>
        </label>

        <label class="wc-opt">
          <span class="wc-opt-label">Min word length</span>
          <select id="wc-minlen" class="wc-select">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3" selected>3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </label>

        <label class="wc-opt">
          <span class="wc-opt-label">Palette</span>
          <select id="wc-palette" class="wc-select">
            <option value="ocean" selected>Ocean</option>
            <option value="sunset">Sunset</option>
            <option value="forest">Forest</option>
            <option value="berry">Berry</option>
            <option value="vivid">Vivid</option>
            <option value="mono">Monochrome</option>
          </select>
        </label>

        <label class="wc-opt">
          <span class="wc-opt-label">Font</span>
          <select id="wc-font" class="wc-select">
            <option value="sans" selected>Sans serif</option>
            <option value="serif">Serif</option>
            <option value="mono">Monospace</option>
            <option value="impact">Heavy / display</option>
          </select>
        </label>

        <label class="wc-opt">
          <span class="wc-opt-label">Rotation</span>
          <select id="wc-rotate" class="wc-select">
            <option value="none" selected>Horizontal only</option>
            <option value="mixed">Mixed</option>
            <option value="right">Some vertical</option>
          </select>
        </label>

        <label class="wc-opt">
          <span class="wc-opt-label">Background</span>
          <select id="wc-bg" class="wc-select">
            <option value="transparent" selected>Transparent</option>
            <option value="light">White</option>
            <option value="dark">Dark</option>
          </select>
        </label>

      </div>

      <div class="wc-field">
        <label class="wc-label" for="wc-ignore">Also ignore these words</label>
        <input type="text" id="wc-ignore" class="wc-input" autocomplete="off"
               placeholder="company, product, 2026" data-save-key="word-cloud-ignore">
        <p class="wc-hint">Comma separated. Useful for words you already know dominate the text.</p>
      </div>

      <div class="wc-checks">
        <label class="wc-check">
          <input type="checkbox" id="wc-stops" checked>
          <span>Ignore common stop words</span>
        </label>
        <label class="wc-check">
          <input type="checkbox" id="wc-numbers" checked>
          <span>Ignore numbers</span>
        </label>
        <label class="wc-check">
          <input type="checkbox" id="wc-case" checked>
          <span>Merge upper and lower case</span>
        </label>
      </div>

    </div>

    <!-- Cloud -->
    <div class="wc-panel wc-output">

      <div class="wc-out-head">
        <span class="wc-out-title">Word cloud</span>
        <div class="wc-out-actions">
          <button class="btn btn-ghost wc-sm" id="wc-reshuffle" type="button">Reshuffle</button>
          <button class="btn btn-ghost wc-sm" id="wc-svg" type="button">SVG</button>
          <button class="btn btn-primary wc-sm" id="wc-png" type="button">Download PNG</button>
        </div>
      </div>

      <div class="wc-stage" id="wc-stage">
        <canvas id="wc-canvas" class="wc-canvas" role="img" aria-label="Word cloud of your text"></canvas>
        <p class="wc-empty" id="wc-empty">Paste some text to build your word cloud.</p>
      </div>

      <p class="wc-status" id="wc-status" role="status"></p>

      <div class="wc-top" id="wc-top-wrap" hidden>
        <div class="wc-top-head">
          <span class="wc-top-title">Most frequent words</span>
          <button class="btn btn-ghost wc-sm" id="wc-copy-list" type="button">Copy list as CSV</button>
        </div>
        <div class="table-scroll">
          <table class="seo-table wc-top-table">
            <thead><tr><th>#</th><th>Word</th><th>Count</th><th>Share</th></tr></thead>
            <tbody id="wc-top-body"></tbody>
          </table>
        </div>
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

    <h2>How a word cloud is built</h2>
    <p>Three steps turn a block of prose into a picture. First the text is tokenised — split into words at spaces and punctuation, with apostrophes kept so "don't" survives as one word. Then each distinct word is counted, after discarding the filler the count would otherwise be swamped by: stop words, numbers, anything below the minimum length, and whatever you have added to the ignore list. Finally the surviving words are sorted by count, the most frequent kept, and each assigned a font size scaled from its count.</p>
    <p>The size mapping is less obvious than it looks. Scaling font size in direct proportion to count makes the largest word overwhelm everything when one term dominates, so this tool scales by the square root of the count instead. That makes the <em>area</em> a word occupies roughly proportional to its frequency, which is closer to how the eye actually compares the words on screen.</p>
    <p>Placement is the last problem, and the interesting one. Each word is positioned by starting at the centre of the canvas and walking outwards along a spiral, testing at every step whether its bounding box overlaps anything already placed, and settling in the first gap that fits. Because the biggest words go first, they claim the middle and the smaller ones fill in around them — which is what produces the characteristic dense, roughly oval shape. When a word cannot find a gap anywhere on the spiral it is skipped, and the count beneath the cloud tells you how many were dropped.</p>

    <h2>The history of word clouds</h2>
    <p>The idea of sizing words by frequency to make a picture predates the web. In 1976 the social psychologist Stanley Milgram ran an experiment asking residents to name Paris landmarks, then drew a map of the city with each name set in a size proportional to how many people had mentioned it — a weighted word visualisation in all but name. The web version arrived with social bookmarking: Flickr's tag cloud in 2004, followed quickly by Delicious and Technorati, made the "tag cloud" one of the defining visual motifs of Web 2.0, and for a few years no site was complete without one.</p>
    <p>What people picture today, though, is Wordle — not the 2021 guessing game, but the 2008 visualisation tool written by Jonathan Feinberg at IBM Research. Feinberg's version abandoned the alphabetical, line-wrapped layout of tag clouds in favour of tightly interlocked words at varied angles and colours, and it was attractive enough that the aesthetic escaped data visualisation entirely into classrooms, conference slides and newspaper graphics. The spiral placement approach this tool uses descends from that lineage, by way of Jason Davies' open-source d3-cloud implementation.</p>

    <h2>What word clouds are good and bad at</h2>
    <p>Word clouds are excellent at one thing: giving a viewer an immediate, pre-verbal sense of what a body of text is about. For a quick read on a set of survey responses, the themes in customer reviews, the vocabulary of a draft, or the subject of a document you have not read, nothing conveys the gist faster. They are also genuinely good at surfacing surprises — a term you did not expect to be prominent is obvious at a glance in a way it never is in a column of numbers.</p>
    <p>They are correspondingly poor at anything precise, and it is worth knowing why before you put one in front of an audience. Frequency is not importance: a word repeated because of a quirk of phrasing looks exactly like a word repeated because it matters. There is no sentiment or context, so a cloud of complaints and a cloud of compliments about the same product look much the same. Word forms fragment, splitting "manage", "manages", "managing" and "management" into four smaller entries that understate a single theme. Long words take more space than short ones at identical font sizes, so they read as more prominent than they are. And comparing two clouds is close to meaningless, because the layout is partly random and the size scale is relative to each cloud's own maximum. Data journalists have been making this criticism for well over a decade, and it is fair.</p>
    <p>The practical conclusion is to treat the cloud as an opening illustration rather than evidence. When you need to state something exact — this term appeared 47 times, that one 12 — read it off the frequency table under the cloud, or use the <a href="/tools/word-frequency-counter">word frequency counter</a>, which gives every word with counts and percentages.</p>

    <h2>Settings that change what you see</h2>
    <p>Four controls do most of the work. <strong>Stop words</strong> should normally stay on; with them off, "the" and "and" will dominate any English text and tell you nothing. <strong>Max words</strong> trades detail for legibility — 25 gives a bold, readable headline graphic, while 200 gives texture at the cost of a crowd of unreadable small words. <strong>Minimum word length</strong> is the quickest way to clear out residue like "it" and "is" that slipped past the stop list. And the <strong>ignore list</strong> is the one people reach for last and should reach for first: in a set of reviews for one product, the product's own name is usually the biggest word and the least informative, and removing it lets everything else become visible.</p>
    <p>For appearance, the heavy display font produces the familiar poster look, mixed rotation packs words more tightly at some cost to readability, and a transparent background is what you want when the cloud is going onto a coloured slide rather than a white page.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I make a word cloud from text?</p>
      <p class="faq-a">Paste or type your text into the box and the cloud draws itself — there is no generate button to press. The tool splits the text into words, counts how often each appears, discards common filler words, and sizes the rest so the most frequent are the largest. From there you can set the word limit, pick a palette and font, choose how much rotation you want, and press Reshuffle to try a different arrangement of the same words. When it looks right, download it as a PNG for slides and documents or an SVG for print.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why are some words missing from my word cloud?</p>
      <p class="faq-a">Four filters can remove a word, and one layout limit can too. Stop words such as "the" and "and" are discarded by default; words shorter than the minimum length are skipped; only the top N most frequent words are drawn, so rarer words fall outside the limit you set; and anything in the custom ignore list is excluded. Beyond those, a word can be dropped because the canvas simply ran out of space for it — the status line under the cloud reports how many were skipped for that reason, and raising the word limit, shortening the text or choosing a narrower font usually makes room.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What are stop words and should I remove them?</p>
      <p class="faq-a">Stop words are the structural words that every English text is full of — the, and, of, to, is, that, it. In ordinary prose "the" alone accounts for roughly 7% of all words, so leaving stop words in produces a cloud whose largest entries are words that say nothing whatsoever about the subject. Removing them is the right default for essentially every practical use. The exception is linguistic or stylistic analysis, where the proportion of function words is the thing being measured — authorship attribution studies, for instance, rely heavily on exactly those words.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I download the word cloud for a presentation or print?</p>
      <p class="faq-a">Yes, in two formats chosen for different jobs. <strong>PNG</strong> exports at twice the size shown on screen, which is ample for slides, documents, blog posts and social images, and the transparent background option means it can sit on a coloured slide without a white rectangle around it. <strong>SVG</strong> is a vector file, so it scales to any size — a poster, a banner, a printed report — with no blurring at all, and the words stay editable text when opened in Illustrator, Figma or Inkscape, so a designer can restyle or recolour it afterwards.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does a bigger word mean a more important word?</p>
      <p class="faq-a">It means a more frequent word, which is a different claim. A word cloud has no notion of meaning, context or sentiment, so it cannot distinguish praise from complaint, and a word that recurs because of a habit of phrasing looks identical to one that recurs because it matters. Related forms also fragment — "manage", "manages" and "management" become three separate smaller words rather than one theme — and because longer words occupy more area at the same font size, they read as more prominent than their count justifies. Use the cloud for a fast impression of subject matter, and the frequency table beneath it whenever you need to say something precise.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my text uploaded anywhere?</p>
      <p class="faq-a">No. The word counting, the layout calculation and the drawing all happen inside your browser, using JavaScript and an HTML canvas, and no part of your text is ever sent to a server. The only copy kept anywhere is in your own browser's local storage, which is what lets your draft survive a page reload; clearing the text box or clearing your browser data removes it. That makes the tool safe for material you could not paste into a hosted service — interview transcripts, raw survey responses, internal documents or unpublished writing.</p>
    </div>

  </div>

</div>

<style>
/* ── Word cloud generator ─────────────────────────────────── */
.wc-tool {
  display: grid;
  grid-template-columns: minmax(0, 360px) minmax(0, 1fr);
  gap: 18px;
  align-items: start;
}

.wc-panel {
  min-width: 0;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
}

.wc-controls { padding: 16px; }

.wc-field + .wc-field,
.wc-field + .wc-opt-grid,
.wc-opt-grid + .wc-field,
.wc-field + .wc-checks { margin-top: 14px; }

.wc-label {
  display: block;
  font-size: 0.86rem;
  font-weight: 600;
  margin-bottom: 5px;
}

.wc-field-head {
  display: flex;
  justify-content: space-between;
  align-items: baseline;
  gap: 8px;
  margin-bottom: 5px;
}

.wc-field-head .wc-label { margin-bottom: 0; }

.wc-counts { font-size: 0.8rem; color: var(--text-2); white-space: nowrap; }

.wc-textarea,
.wc-input,
.wc-select {
  width: 100%;
  padding: 8px 10px;
  font: inherit;
  font-size: 0.93rem;
  color: var(--text);
  background: var(--bg-2);
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
}

.wc-textarea { resize: vertical; min-height: 110px; line-height: 1.55; }

.wc-textarea:focus-visible,
.wc-input:focus-visible,
.wc-select:focus-visible { outline: 2px solid var(--accent); outline-offset: 1px; }

.wc-input-actions {
  display: flex;
  justify-content: space-between;
  gap: 8px;
  margin-top: 8px;
}

.wc-hint {
  margin: 5px 0 0;
  font-size: 0.79rem;
  color: var(--text-2);
  line-height: 1.5;
}

.wc-opt-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
}

.wc-opt { display: block; min-width: 0; }

.wc-opt-label {
  display: block;
  font-size: 0.8rem;
  font-weight: 600;
  color: var(--text-2);
  margin-bottom: 4px;
}

.wc-checks {
  display: flex;
  flex-direction: column;
  gap: 8px;
  padding-top: 14px;
  border-top: 1px solid var(--border);
}

.wc-check,
.wc-top-title {
  display: flex;
  align-items: center;
  gap: 7px;
  font-size: 0.86rem;
  cursor: pointer;
}

.wc-sm { padding: 6px 12px; font-size: 0.85rem; }

/* ── Cloud output ── */
.wc-output { display: flex; flex-direction: column; overflow: hidden; }

.wc-out-head {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  padding: 10px 12px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.wc-out-title { font-size: 0.86rem; font-weight: 600; }
.wc-out-actions { display: flex; gap: 8px; flex-wrap: wrap; }

.wc-stage {
  position: relative;
  padding: 10px;
  /* Chequerboard shows through a transparent cloud background */
  background-image:
    linear-gradient(45deg, var(--bg-2) 25%, transparent 25%, transparent 75%, var(--bg-2) 75%),
    linear-gradient(45deg, var(--bg-2) 25%, transparent 25%, transparent 75%, var(--bg-2) 75%);
  background-size: 18px 18px;
  background-position: 0 0, 9px 9px;
}

.wc-canvas {
  display: block;
  width: 100%;
  height: auto;
  border-radius: var(--radius-sm);
}

.wc-empty {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0;
  padding: 16px;
  text-align: center;
  font-size: 0.9rem;
  color: var(--text-2);
}

.wc-status {
  margin: 0;
  padding: 9px 12px;
  font-size: 0.8rem;
  line-height: 1.5;
  color: var(--text-2);
  border-top: 1px solid var(--border);
  min-height: 1em;
}

/* ── Top words table ── */
.wc-top { border-top: 1px solid var(--border); padding: 12px; }

.wc-top-head {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  margin-bottom: 10px;
}

.wc-top-title { font-weight: 600; cursor: default; }

.wc-top .table-scroll { margin-bottom: 0; max-height: 240px; overflow-y: auto; }
.wc-top-table { min-width: 300px; font-size: 0.88rem; }
.wc-top-table td:first-child { color: var(--text-2); width: 1%; white-space: nowrap; }
.wc-top-swatch {
  display: inline-block;
  width: 9px;
  height: 9px;
  border-radius: 2px;
  margin-right: 7px;
  vertical-align: baseline;
}

/* ── Narrow screens ── */
@media (max-width: 900px) {
  .wc-tool { grid-template-columns: 1fr; }
}

@media (max-width: 420px) {
  .wc-opt-grid { grid-template-columns: 1fr; }
}
</style>

<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input    = document.getElementById('wc-input');
  var canvas   = document.getElementById('wc-canvas');
  var stage    = document.getElementById('wc-stage');
  var emptyEl  = document.getElementById('wc-empty');
  var statusEl = document.getElementById('wc-status');
  var totalEl  = document.getElementById('wc-total');
  var uniqueEl = document.getElementById('wc-unique');
  var topWrap  = document.getElementById('wc-top-wrap');
  var topBody  = document.getElementById('wc-top-body');

  if (!input || !canvas || !stage) return;

  var ctx = canvas.getContext('2d');

  var optMax     = document.getElementById('wc-max');
  var optMinLen  = document.getElementById('wc-minlen');
  var optPalette = document.getElementById('wc-palette');
  var optFont    = document.getElementById('wc-font');
  var optRotate  = document.getElementById('wc-rotate');
  var optBg      = document.getElementById('wc-bg');
  var optIgnore  = document.getElementById('wc-ignore');
  var optStops   = document.getElementById('wc-stops');
  var optNumbers = document.getElementById('wc-numbers');
  var optCase    = document.getElementById('wc-case');

  /* Same stop list as the word frequency counter, so the two tools agree */
  var STOPS = new Set([
    'a','an','the','and','or','but','in','on','at','to','for','of','with',
    'by','from','is','was','are','were','be','been','being','has','have','had',
    'do','does','did','will','would','could','should','may','might','shall',
    'can','not','no','nor','so','yet','as','if','then','than','that','this',
    'these','those','it','its','up','out','about','into','more','also','most',
    'just','their','there','they','them','what','which','who','whom','whose',
    'when','where','why','how','all','each','every','both','few','other','some',
    'such','only','own','same','too','very','i','me','my','we','our','you',
    'your','he','him','his','she','her','us','am','because','while','after',
    'before','over','under','again','once','here','any','through','during'
  ]);

  var FONTS = {
    sans:   '"Helvetica Neue", Helvetica, Arial, sans-serif',
    serif:  'Georgia, "Times New Roman", Times, serif',
    mono:   'ui-monospace, Menlo, Consolas, "Courier New", monospace',
    impact: 'Impact, "Arial Black", "Helvetica Neue", sans-serif'
  };

  var WEIGHTS = { sans: '700', serif: '700', mono: '600', impact: '400' };

  /* Palettes run strongest → lightest; words are coloured by frequency rank */
  var PALETTES = {
    ocean:  ['#0b3d5c', '#105f86', '#1680ad', '#2a9fcd', '#5bbbdd', '#93d2e8'],
    sunset: ['#7a1f12', '#a8341a', '#cc5520', '#e3802f', '#efa652', '#f6c986'],
    forest: ['#173d22', '#235c30', '#2f7d3f', '#49a055', '#78bf7e', '#a9d9ab'],
    berry:  ['#3f1240', '#64205f', '#8a2f7c', '#ad4a97', '#c878b5', '#dfa8d2'],
    vivid:  ['#1f4ed8', '#c2185b', '#00897b', '#ef6c00', '#6a1b9a', '#2e7d32'],
    mono:   ['#111111', '#333333', '#555555', '#777777', '#999999', '#b5b5b5']
  };

  var MONO_DARK = ['#f0f6fc', '#d4dae1', '#b4bcc5', '#949da8', '#767f8a', '#5c646e'];

  var SAMPLE = 'Climate policy is no longer a question of whether to act but of how fast and who pays. '
    + 'Every climate model points the same way: emissions must fall this decade, and energy systems must change faster than any '
    + 'energy transition in history. Renewable energy is now the cheapest electricity in most markets, which turns the problem '
    + 'from cost into speed. Grids need rebuilding, storage needs scaling, and planning rules written for a fossil energy system '
    + 'still slow every wind and solar project down. Policy can fix planning. Policy can fund grids. Policy cannot change physics, '
    + 'and the carbon budget is finite. Adaptation matters too, because some warming is already locked in: cities need shade and '
    + 'drainage, farms need drought-tolerant crops, and coasts need defences. The countries facing the worst climate damage emitted '
    + 'the least carbon, which is why finance dominates every negotiation. Rich economies promised climate finance and delivered '
    + 'slowly. Developing economies want energy growth without the emissions path the rich world took. Technology helps, finance '
    + 'decides, and politics sets the pace.';

  /* ── Seeded RNG so a redraw is stable until you reshuffle ── */
  var seed = 20260101;

  function rng() {
    seed = (seed + 0x6D2B79F5) | 0;
    var t = seed;
    t = Math.imul(t ^ (t >>> 15), t | 1);
    t ^= t + Math.imul(t ^ (t >>> 7), t | 61);
    return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
  }

  /* ── Counting ─────────────────────────────────────────────── */
  function countWords(text) {
    var minLen   = parseInt(optMinLen.value, 10) || 1;
    var mergeCase = optCase.checked;

    var custom = new Set(
      (optIgnore.value || '').toLowerCase().split(',')
        .map(function (s) { return s.trim(); })
        .filter(Boolean)
    );

    var raw = text.replace(/[^\w\s'’-]/g, ' ').split(/\s+/);
    var total = 0;
    var freq = Object.create(null);

    for (var i = 0; i < raw.length; i++) {
      var w = raw[i].replace(/^['’-]+|['’-]+$/g, '');
      if (!w) continue;
      total++;

      var lower = w.toLowerCase();
      if (optNumbers.checked && /^\d+$/.test(w)) continue;
      if (w.length < minLen) continue;
      if (optStops.checked && STOPS.has(lower)) continue;
      if (custom.has(lower)) continue;

      var key = mergeCase ? lower : w;
      freq[key] = (freq[key] || 0) + 1;
    }

    var list = Object.keys(freq).map(function (k) { return { word: k, count: freq[k] }; });
    list.sort(function (a, b) { return b.count - a.count || a.word.localeCompare(b.word); });

    return { total: total, unique: list.length, list: list };
  }

  /* ── Layout: spiral placement with bounding-box collision ── */
  function layout(words, W, H) {
    if (!words.length) return [];

    var fam    = FONTS[optFont.value] || FONTS.sans;
    var weight = WEIGHTS[optFont.value] || '700';
    var rotMode = optRotate.value;

    var maxCount = words[0].count;
    var minCount = words[words.length - 1].count;

    /* Scale by sqrt so area, not height, tracks frequency */
    var area    = W * H;
    var maxSize = Math.max(26, Math.min(0.17 * Math.sqrt(area), H * 0.34));
    var minSize = Math.max(9, maxSize * 0.11);

    function sizeFor(count) {
      if (maxCount === minCount) return (maxSize + minSize) / 2;
      var t = (Math.sqrt(count) - Math.sqrt(minCount)) / (Math.sqrt(maxCount) - Math.sqrt(minCount));
      return minSize + t * (maxSize - minSize);
    }

    var placed = [];
    var cx = W / 2, cy = H / 2;
    var PAD = 2;

    function hits(r) {
      for (var i = 0; i < placed.length; i++) {
        var p = placed[i];
        if (r.x < p.x + p.w && r.x + r.w > p.x && r.y < p.y + p.h && r.y + r.h > p.y) return true;
      }
      return false;
    }

    function tryPlace(word, size, rotated) {
      ctx.font = weight + ' ' + size + 'px ' + fam;
      var m = ctx.measureText(word);
      var asc  = m.actualBoundingBoxAscent;
      var desc = m.actualBoundingBoxDescent;
      if (typeof asc !== 'number' || typeof desc !== 'number') { asc = size * 0.72; desc = size * 0.2; }

      var tw = m.width;
      var th = asc + desc;
      var bw = (rotated ? th : tw) + PAD * 2;
      var bh = (rotated ? tw : th) + PAD * 2;

      if (bw > W || bh > H) return null;

      /* Jitter the spiral's start angle so repeated words don't stack identically */
      var a0 = rng() * Math.PI * 2;

      for (var step = 0; step < 4200; step++) {
        var t = step * 0.18;
        var r = 2.1 * t;
        var x = cx + r * Math.cos(t + a0);
        var y = cy + r * Math.sin(t + a0) * 0.58;

        var rect = { x: x - bw / 2, y: y - bh / 2, w: bw, h: bh };
        if (rect.x < 0 || rect.y < 0 || rect.x + bw > W || rect.y + bh > H) continue;
        if (hits(rect)) continue;

        placed.push(rect);
        return { word: word, size: size, rotated: rotated, tw: tw, asc: asc, th: th,
                 cx: x, cy: y };
      }
      return null;
    }

    var out = [], skipped = 0;

    for (var i = 0; i < words.length; i++) {
      var w = words[i];
      var rotated = rotMode === 'none' ? false
        : rotMode === 'mixed' ? rng() < 0.38
        : rng() < 0.18;

      var size = sizeFor(w.count);
      var res = tryPlace(w.word, size, rotated);

      /* One shrink retry, then one orientation flip, before giving up */
      if (!res) res = tryPlace(w.word, Math.max(minSize, size * 0.7), rotated);
      if (!res) res = tryPlace(w.word, Math.max(minSize, size * 0.7), !rotated);
      if (!res) { skipped++; continue; }

      res.rank = i;
      res.count = w.count;
      out.push(res);
    }

    out.skipped = skipped;
    return out;
  }

  /* ── Colour ───────────────────────────────────────────────── */
  function paletteFor() {
    var name = optPalette.value;
    if (name === 'mono') {
      var dark = optBg.value === 'dark'
        || (optBg.value === 'transparent' && document.documentElement.getAttribute('data-theme') === 'dark');
      return dark ? MONO_DARK : PALETTES.mono;
    }
    return PALETTES[name] || PALETTES.ocean;
  }

  function colorFor(rank, total, pal) {
    if (total <= 1) return pal[0];
    var i = Math.floor((rank / total) * pal.length);
    return pal[Math.min(i, pal.length - 1)];
  }

  function bgFill() {
    if (optBg.value === 'light') return '#ffffff';
    if (optBg.value === 'dark') return '#0d1117';
    return null;
  }

  /* ── Drawing ──────────────────────────────────────────────── */
  function draw(c, items, W, H, scale) {
    c.setTransform(1, 0, 0, 1, 0, 0);
    c.clearRect(0, 0, W * scale, H * scale);
    c.scale(scale, scale);

    var bg = bgFill();
    if (bg) { c.fillStyle = bg; c.fillRect(0, 0, W, H); }

    var fam    = FONTS[optFont.value] || FONTS.sans;
    var weight = WEIGHTS[optFont.value] || '700';
    var pal    = paletteFor();

    c.textAlign = 'center';
    c.textBaseline = 'middle';

    items.forEach(function (it) {
      c.save();
      c.translate(it.cx, it.cy);
      if (it.rotated) c.rotate(-Math.PI / 2);
      c.font = weight + ' ' + it.size + 'px ' + fam;
      c.fillStyle = colorFor(it.rank, items.length, pal);
      c.fillText(it.word, 0, 0);
      c.restore();
    });
  }

  /* ── SVG export ───────────────────────────────────────────── */
  function esc(s) {
    return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;')
      .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  function toSvg(items, W, H) {
    var fam = (FONTS[optFont.value] || FONTS.sans).replace(/"/g, "'");
    var weight = WEIGHTS[optFont.value] || '700';
    var pal = paletteFor();
    var bg = bgFill();

    var parts = [];
    parts.push('<svg xmlns="http://www.w3.org/2000/svg" width="' + W + '" height="' + H +
               '" viewBox="0 0 ' + W + ' ' + H + '">');
    if (bg) parts.push('<rect width="' + W + '" height="' + H + '" fill="' + bg + '"/>');

    items.forEach(function (it) {
      var fill = colorFor(it.rank, items.length, pal);
      var tf = 'translate(' + it.cx.toFixed(1) + ' ' + it.cy.toFixed(1) + ')' +
               (it.rotated ? ' rotate(-90)' : '');
      parts.push('<text transform="' + tf + '" text-anchor="middle" dominant-baseline="central"' +
                 ' font-family="' + esc(fam) + '" font-weight="' + weight + '"' +
                 ' font-size="' + it.size.toFixed(1) + '" fill="' + fill + '">' +
                 esc(it.word) + '</text>');
    });

    parts.push('</svg>');
    return parts.join('\n');
  }

  /* ── Download helper (same pattern as the other tools) ────── */
  function saveBlob(blob, filename) {
    var url = URL.createObjectURL(blob);
    var a = document.createElement('a');
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    setTimeout(function () { URL.revokeObjectURL(url); }, 1000);
  }

  /* ── Top words table ──────────────────────────────────────── */
  function renderTop(items, totalCounted) {
    topBody.textContent = '';
    if (!items.length) { topWrap.hidden = true; return; }
    topWrap.hidden = false;

    var pal = paletteFor();
    items.slice(0, 15).forEach(function (it, i) {
      var tr = document.createElement('tr');

      var td0 = document.createElement('td');
      td0.textContent = String(i + 1);

      var td1 = document.createElement('td');
      var sw = document.createElement('span');
      sw.className = 'wc-top-swatch';
      sw.style.background = colorFor(it.rank, items.length, pal);
      td1.appendChild(sw);
      td1.appendChild(document.createTextNode(it.word));

      var td2 = document.createElement('td');
      td2.textContent = String(it.count);

      var td3 = document.createElement('td');
      td3.textContent = totalCounted ? ((it.count / totalCounted) * 100).toFixed(1) + '%' : '—';

      tr.appendChild(td0); tr.appendChild(td1); tr.appendChild(td2); tr.appendChild(td3);
      topBody.appendChild(tr);
    });
  }

  /* ── Main render ──────────────────────────────────────────── */
  var lastItems = [], lastW = 0, lastH = 0, lastCounted = 0;

  function render() {
    var text = input.value || '';
    var counted = countWords(text);

    totalEl.textContent  = counted.total.toLocaleString();
    uniqueEl.textContent = counted.unique.toLocaleString();

    var W = Math.max(280, Math.floor(stage.clientWidth - 20));
    var H = Math.max(240, Math.round(W * 0.66));

    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    canvas.width  = Math.round(W * dpr);
    canvas.height = Math.round(H * dpr);
    canvas.style.height = H + 'px';

    lastW = W; lastH = H; lastCounted = counted.total;

    if (!counted.list.length) {
      lastItems = [];
      ctx.setTransform(1, 0, 0, 1, 0, 0);
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      emptyEl.hidden = false;
      emptyEl.textContent = text.trim()
        ? 'No words left after filtering. Try a lower minimum length, or turn off stop words.'
        : 'Paste some text to build your word cloud.';
      statusEl.textContent = '';
      canvas.setAttribute('aria-label', 'Empty word cloud');
      renderTop([], 0);
      return;
    }

    emptyEl.hidden = true;

    var max = parseInt(optMax.value, 10) || 100;
    var words = counted.list.slice(0, max);

    var savedSeed = seed;
    var items = layout(words, W, H);
    seed = savedSeed;                 // keep the layout stable across option tweaks

    lastItems = items;
    draw(ctx, items, W, H, dpr);

    var msg = 'Showing ' + items.length + ' of ' + counted.unique.toLocaleString() + ' unique words';
    if (items.skipped) msg += ' · ' + items.skipped + ' skipped for lack of space';
    statusEl.textContent = msg + '.';

    canvas.setAttribute('aria-label',
      'Word cloud. Most frequent words: ' +
      items.slice(0, 8).map(function (i) { return i.word; }).join(', ') + '.');

    renderTop(items, counted.total);
  }

  /* ── Events ───────────────────────────────────────────────── */
  var raf = null;
  function schedule() {
    if (raf) cancelAnimationFrame(raf);
    raf = requestAnimationFrame(function () { raf = null; render(); });
  }

  input.addEventListener('input', schedule);
  [optMax, optMinLen, optPalette, optFont, optRotate, optBg, optStops, optNumbers, optCase]
    .forEach(function (el) { if (el) el.addEventListener('change', schedule); });
  if (optIgnore) optIgnore.addEventListener('input', schedule);

  var reshuffle = document.getElementById('wc-reshuffle');
  if (reshuffle) {
    reshuffle.addEventListener('click', function () {
      seed = (Date.now() ^ (Math.random() * 1e9)) | 0;
      render();
    });
  }

  var sampleBtn = document.getElementById('wc-sample');
  if (sampleBtn) {
    sampleBtn.addEventListener('click', function () {
      input.value = SAMPLE;
      input.dispatchEvent(new Event('input'));
    });
  }

  var pngBtn = document.getElementById('wc-png');
  if (pngBtn) {
    pngBtn.addEventListener('click', function () {
      if (!lastItems.length) return;
      var scale = 2;
      var off = document.createElement('canvas');
      off.width  = lastW * scale;
      off.height = lastH * scale;
      draw(off.getContext('2d'), lastItems, lastW, lastH, scale);
      off.toBlob(function (blob) {
        if (blob) saveBlob(blob, 'word-cloud.png');
      }, 'image/png');
    });
  }

  var svgBtn = document.getElementById('wc-svg');
  if (svgBtn) {
    svgBtn.addEventListener('click', function () {
      if (!lastItems.length) return;
      var svg = toSvg(lastItems, lastW, lastH);
      saveBlob(new Blob([svg], { type: 'image/svg+xml' }), 'word-cloud.svg');
    });
  }

  var copyBtn = document.getElementById('wc-copy-list');
  if (copyBtn) {
    copyBtn.addEventListener('click', function () {
      if (!lastItems.length) return;
      var rows = ['word,count,share'];
      lastItems.forEach(function (it) {
        var share = lastCounted ? ((it.count / lastCounted) * 100).toFixed(2) : '0';
        rows.push('"' + it.word.replace(/"/g, '""') + '",' + it.count + ',' + share);
      });
      navigator.clipboard.writeText(rows.join('\n')).then(function () {
        var original = copyBtn.textContent;
        copyBtn.textContent = 'Copied!';
        setTimeout(function () { copyBtn.textContent = original; }, 2000);
      });
    });
  }

  /* Redraw on resize — width drives the canvas size */
  var resizeTimer = null;
  var lastWidth = stage.clientWidth;
  window.addEventListener('resize', function () {
    if (stage.clientWidth === lastWidth) return;
    lastWidth = stage.clientWidth;
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(render, 180);
  });

  /* Monochrome palette follows the site theme */
  var themeBtn = document.getElementById('theme-toggle');
  if (themeBtn) themeBtn.addEventListener('click', function () { setTimeout(render, 30); });

  /* Fonts can land after first paint — re-measure once they do */
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(render);

  render();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
