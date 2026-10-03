<?php
$tool_slug   = 'word-counter';
$tool_name   = 'Word Counter';

$page_title  = 'Word Counter — Count Words Online Free | TextlyPop';
$meta_desc   = 'Count words, characters, sentences, paragraphs and reading time instantly. Free online word counter. No signup. Results update as you type.';
$canonical_url = 'https://textlypop.com/tools/word-counter';
$og_title    = 'Free Online Word Counter — TextlyPop';
$og_desc     = $meta_desc;

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
$related = get_related_tools($tool_slug, 5);
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Tool tracking for recently used -->
<meta name="tool-slug" content="<?= e($tool_slug) ?>">
<meta name="tool-name" content="<?= e($tool_name) ?>">

<!-- Schema: WebApplication -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Word Counter",
  "url": "https://textlypop.com/tools/word-counter",
  "description": "Count words, characters, sentences, paragraphs and reading time instantly.",
  "applicationCategory": "UtilitiesApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" }
}
</script>

<!-- Schema: FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How does the word counter work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The counter splits your text on spaces and line breaks, treating each group of characters as one word, and simultaneously tallies characters, sentences and paragraphs — updating live as you type. Contractions like don't count as one word and hyphenated compounds also count as one, matching how word processors such as Microsoft Word count."
      }
    },
    {
      "@type": "Question",
      "name": "Does the word counter count characters with or without spaces?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Both, shown separately, because platforms measure differently. Twitter/X, Instagram captions and meta descriptions count spaces, so characters-with-spaces is the number that matters there. Characters-without-spaces is the traditional measure in some academic and translation contexts."
      }
    },
    {
      "@type": "Question",
      "name": "How is reading time calculated?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Reading time divides your word count by an assumed reading speed. Research puts average adult silent-reading speed at roughly 200–240 words per minute, so Average mode uses 200 WPM and Fast mode 300 WPM. Speaking time uses 130 WPM, which makes the tool useful for timing speeches: a 5-minute talk needs roughly 650 words."
      }
    },
    {
      "@type": "Question",
      "name": "What is the character limit for Twitter / X?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard accounts get 280 characters per post — doubled from the original 140 in 2017 — while paid subscribers can post up to 25,000. Links count as 23 characters regardless of length, and emojis often count as two. Select the Twitter preset to watch a live progress bar as you type."
      }
    },
    {
      "@type": "Question",
      "name": "How many words should a blog post or essay be?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It depends on the goal. Most blog posts perform well between 1,000 and 2,000 words, in-depth guides often run 2,500 words or more, and typical school essays range from 500 to 1,500 words. Paste your draft into the word counter to track your live word count, then use the reading time estimate to judge whether the length suits your audience."
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
        ['name' => 'Type or paste your text', 'text' => 'Type or paste your text into the input box. The word count updates instantly as you type — no button required.'],
        ['name' => 'Read the statistics', 'text' => 'View your word count, character count, sentence count, paragraph count, and estimated reading time in the stats bar below the text area.'],
        ['name' => 'Check platform limits', 'text' => 'Select a platform preset such as Twitter or Meta description to see a live progress bar showing how close you are to the character limit.'],
        ['name' => 'Copy or send your text', 'text' => 'Click Copy text to copy your input, or use the Send to buttons below to send your text to another tool.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How to Count Words Online",
  "description": "Count words, characters, sentences and reading time using TextlyPop word counter.",
  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Paste your text",
      "text": "Type or paste your text into the large text box on the page."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "View live stats",
      "text": "Word count, character count, sentence count, paragraph count and reading time all update instantly as you type."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Select a platform preset",
      "text": "Click any platform button such as Twitter or Meta description to see a live progress bar tracking your character count against the limit."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Copy or send your text",
      "text": "Click Copy text to copy your input, or use the Send to buttons to pass your text directly to another tool."
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "TextlyPop",
      "item": "https://textlypop.com"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Tools",
      "item": "https://textlypop.com/#tools"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "Word counter",
      "item": "https://textlypop.com/tools/word-counter"
    }
  ]
}
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <!-- Header -->
  <div class="tool-page-header">
    <h1>Word counter</h1>
    <p>Count words, characters, sentences and reading time. Results update as you type.</p>
  </div>

  <!-- Main tool -->
  <div class="wc-tool" id="wc-tool">

    <!-- Textarea -->
    <div class="wc-textarea-wrap">
      <textarea
        id="wc-input"
        class="wc-textarea"
        placeholder="Start typing or paste your text here…"
        aria-label="Text input for word counting"
        data-save-key="word-counter"
        spellcheck="true"></textarea>

      <div class="wc-textarea-footer">
        <div class="wc-reading-toggle" role="group" aria-label="Reading speed">
          <span class="wc-reading-label">Reading speed:</span>
          <button class="wc-speed-btn active" data-wpm="200" aria-pressed="true">Average</button>
          <button class="wc-speed-btn" data-wpm="300" aria-pressed="false">Fast</button>
        </div>
        <div class="wc-actions">
          <button class="btn btn-clear" data-targets="wc-input" aria-label="Clear text">Clear</button>
          <button class="btn btn-copy" data-target="wc-input" aria-label="Copy text">Copy text</button>
        </div>
      </div>
    </div>

    <!-- Stats bar -->
    <div class="wc-stats" role="region" aria-label="Text statistics" aria-live="polite">
      <div class="wc-stat">
        <span class="wc-stat-num" id="stat-words">0</span>
        <span class="wc-stat-label">Words</span>
      </div>
      <div class="wc-stat">
        <span class="wc-stat-num" id="stat-chars">0</span>
        <span class="wc-stat-label">Characters</span>
      </div>
      <div class="wc-stat">
        <span class="wc-stat-num" id="stat-chars-no-space">0</span>
        <span class="wc-stat-label">No spaces</span>
      </div>
      <div class="wc-stat">
        <span class="wc-stat-num" id="stat-sentences">0</span>
        <span class="wc-stat-label">Sentences</span>
      </div>
      <div class="wc-stat">
        <span class="wc-stat-num" id="stat-paragraphs">0</span>
        <span class="wc-stat-label">Paragraphs</span>
      </div>
      <div class="wc-stat">
        <span class="wc-stat-num" id="stat-reading">0 sec</span>
        <span class="wc-stat-label">Read time</span>
      </div>
      <div class="wc-stat">
        <span class="wc-stat-num" id="stat-speaking">0 sec</span>
        <span class="wc-stat-label">Speak time</span>
      </div>
    </div>

    <!-- Platform limits section -->
    <div class="wc-platforms">
      <div class="wc-platforms-header">
        <span class="wc-platforms-title">Platform limits</span>
        <span class="wc-platforms-hint">Select a platform to track your character count</span>
      </div>
      <div class="wc-platform-btns" role="group" aria-label="Platform character limits">
        <button class="wc-platform-btn" data-limit="280"   data-name="Twitter / X"          aria-pressed="false">Twitter / X <em>280</em></button>
        <button class="wc-platform-btn" data-limit="150"   data-name="Instagram bio"         aria-pressed="false">Instagram bio <em>150</em></button>
        <button class="wc-platform-btn" data-limit="155"   data-name="Meta description"      aria-pressed="false">Meta description <em>155</em></button>
        <button class="wc-platform-btn" data-limit="60"    data-name="SEO title"             aria-pressed="false">SEO title <em>60</em></button>
        <button class="wc-platform-btn" data-limit="100"   data-name="YouTube title"         aria-pressed="false">YouTube title <em>100</em></button>
        <button class="wc-platform-btn" data-limit="220"   data-name="LinkedIn headline"     aria-pressed="false">LinkedIn headline <em>220</em></button>
        <button class="wc-platform-btn" data-limit="80"    data-name="TikTok bio"            aria-pressed="false">TikTok bio <em>80</em></button>
        <button class="wc-platform-btn" data-limit="2200"  data-name="Instagram caption"     aria-pressed="false">Instagram caption <em>2200</em></button>
        <button class="wc-platform-btn" data-limit="63206" data-name="Facebook post"         aria-pressed="false">Facebook post <em>63K</em></button>
      </div>

      <!-- Progress bar — visible when platform selected -->
      <div class="wc-limit-bar hidden" id="wc-limit-bar" role="status" aria-live="polite">
        <div class="wc-limit-info">
          <span id="wc-limit-name">Twitter / X</span>
          <span id="wc-limit-count">0 / 280</span>
        </div>
        <div class="wc-limit-track" aria-hidden="true">
          <div class="wc-limit-fill" id="wc-limit-fill"></div>
        </div>
        <div class="wc-limit-msg" id="wc-limit-msg"></div>
      </div>
    </div>

  </div><!-- /wc-tool -->

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="wc-input" data-to-tool="case-converter">Case converter</button>
    <button class="send-to-btn" data-from="wc-input" data-to-tool="remove-line-breaks">Remove line breaks</button>
    <button class="send-to-btn" data-from="wc-input" data-to-tool="remove-extra-spaces">Remove extra spaces</button>
    <button class="send-to-btn" data-from="wc-input" data-to-tool="text-to-slug">Text to slug</button>
  </div>

  <!-- Keyboard shortcuts hint -->
  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">L</kbd> clear &nbsp;|&nbsp;
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">Shift</kbd> + <kbd class="kbd">C</kbd> copy
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

  <!-- SEO content -->
  <div class="tool-content mt-32">

    <h2>About word counting</h2>
    <p>A word count is the standard measure of text length in writing, publishing and education. Counting words has a surprisingly long commercial history: telegraph companies billed by the word in the 1800s, newspapers paid freelancers per word, and typesetters estimated column space from manuscript word counts long before computers existed. Today word counts govern everything from the 50,000 words of National Novel Writing Month to university essay limits and the terse constraints of social media. A word, for counting purposes, is any run of characters separated by spaces or line breaks — hyphenated compounds like "well-known" count as one.</p>

    <h2>Where word counts matter</h2>
    <p>Writers track word counts to hit targets for blog posts, articles and manuscripts. Students stay inside essay limits, where exceeding the allowance is often penalised. SEO professionals size meta descriptions and page titles. Social media managers check posts against platform limits before publishing. Translators and freelance writers quote and invoice by the word, which makes an accurate count a billing tool as much as a writing aid.</p>

    <h2>Staying inside a word limit</h2>
    <p>Most word counting is really limit checking: an essay capped at 2,000 words, an application answer capped at 500, an abstract capped at 250. Paste the draft above and the count updates as you type, so you can watch the number fall as you cut rather than re-checking after every edit. Counting words in a paragraph rather than a whole document works the same way — paste just that paragraph.</p>
    <p>Two details decide whether you are actually inside the limit. First, ask what the limit covers: titles, headings, footnotes, in-text citations, tables and bibliographies are included by some institutions and excluded by others, and the difference is easily several hundred words on a long essay. Second, expect small disagreements between tools. Counters differ on how they treat hyphenated compounds, numbers, em dashes and text inside brackets, so a document that reads 2,000 words here might read 1,996 or 2,004 elsewhere. Leaving a one-percent margin below a hard limit costs nothing and removes the risk entirely.</p>

    <h2>Word counts in Microsoft Word and Google Docs</h2>
    <p>Word processors keep their counts tucked away. In Microsoft Word the running total sits in the status bar at the bottom left, and clicking it opens a panel with characters, paragraphs and lines; if the bar is hidden, Review → Word Count opens the same panel, and selecting text first counts only the selection. Google Docs puts it under Tools → Word count, with a checkbox to display the count continuously while you type.</p>
    <p>Pasting into this counter is often quicker than hunting for either, and it is the only option when the text lives somewhere without a counter at all — an email, a CMS field, a form, a chat message or a code comment. The counts here follow the same convention word processors use, treating each run of characters between spaces as one word, so the numbers line up.</p>

    <h2>Character count vs word count</h2>
    <p>Character count includes every letter, space, and punctuation mark. Word count counts groups of characters separated by spaces. TextlyPop shows both characters with spaces and characters without spaces so you can see exactly which metric applies to your platform. Twitter uses characters with spaces. SEO title tags are measured in pixels but roughly 60 characters is the safe limit.</p>
    <p>Word count answers how long a text is, but it is rarely the only measure you want. To turn the count into pages for an assignment specified in pages, use the <a href="/tools/words-to-pages">words to pages calculator</a>. When a limit is expressed in characters rather than words, the <a href="/tools/character-counter">character counter</a> carries presets for the common platform limits. The <a href="/tools/sentence-counter">sentence counter</a> reports sentence count and average sentence length, the <a href="/tools/word-frequency-counter">word frequency counter</a> shows which words you lean on, and the <a href="/tools/reading-level-checker">reading level checker</a> turns those structural numbers into a readability grade.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the word counter work?</p>
      <p class="faq-a">The counter splits your text on spaces and line breaks, treating each resulting group of characters as one word, and simultaneously tallies characters, sentences and paragraphs. Everything updates live as you type or paste — there is no count button — and to check a platform limit, pick a preset below the stats and a progress bar shows how close you are, turning orange near the limit and red past it. Contractions like "don't" count as one word and hyphenated compounds like "state-of-the-art" also count as one, matching how word processors such as Microsoft Word count.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the word counter count characters with or without spaces?</p>
      <p class="faq-a">Both, shown separately in the stats bar, because different platforms measure differently. Twitter/X, Instagram captions and meta descriptions all count spaces, so "characters with spaces" is the number that matters there. "Characters without spaces" is the traditional measure in some academic and translation contexts, particularly in languages like Japanese where spacing conventions differ. Knowing which metric your target uses prevents the frustrating experience of a "600-character" text being rejected by a 600-character field.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How is reading time calculated?</p>
      <p class="faq-a">Reading time divides your word count by an assumed reading speed. Research puts the average adult silent-reading speed for non-fiction at roughly 200–240 words per minute, so the Average mode uses 200 WPM; Fast mode uses 300 WPM for skimming-speed readers. Speaking time uses 130 WPM — the comfortable pace for presentations and voiceovers — which makes the tool useful for timing speeches and scripts: a 5-minute talk needs roughly 650 words.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the character limit for Twitter / X?</p>
      <p class="faq-a">Standard accounts get 280 characters per post — doubled from the original 140 in 2017 — while paid subscribers can post up to 25,000 characters. Links are counted as 23 characters regardless of their real length, and emojis often count as two. Select the Twitter preset under the stats to watch a live progress bar as you type; staying under the limit yourself beats letting the platform truncate your post mid-sentence.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many words should a blog post or essay be?</p>
      <p class="faq-a">It depends on the goal. Most blog posts perform well between 1,000 and 2,000 words, in-depth guides often run 2,500 words or more, and typical school essays range from 500 to 1,500 words. Social media posts are far shorter — usually 40 to 80 words. Paste your draft into the word counter to track your live word count as you write, then use the reading time estimate to judge whether the length suits your audience.</p>
    </div>

  </div>

</div><!-- /tool-page -->

<!-- Word counter specific CSS -->
<style>
.wc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.wc-textarea-wrap { position: relative; }

.wc-textarea {
  width: 100%;
  min-height: 260px;
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

.wc-textarea::placeholder { color: var(--text-3); }

.wc-textarea-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 8px;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.wc-reading-toggle { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }

.wc-reading-label { font-size: 0.8rem; color: var(--text-3); white-space: nowrap; }

.wc-speed-btn {
  font-size: 0.8rem;
  padding: 4px 10px;
  border-radius: 20px;
  border: 1px solid var(--border-2);
  background: transparent;
  color: var(--text-2);
  cursor: pointer;
  font-family: var(--font);
  transition: background var(--transition), color var(--transition), border-color var(--transition);
}

.wc-speed-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }
.wc-speed-btn:not(.active):hover { border-color: var(--accent); color: var(--accent); }

.wc-actions { display: flex; gap: 6px; }

/* Stats bar */
.wc-stats {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  border-top: 1px solid var(--border);
}

.wc-stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 14px 8px;
  border-right: 1px solid var(--border);
  text-align: center;
}

.wc-stat:last-child { border-right: none; }

.wc-stat-num {
  font-size: 1.375rem;
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
  margin-bottom: 4px;
  transition: transform 0.1s ease;
}

.wc-stat-num.bump { transform: scale(1.15); }

.wc-stat-label {
  font-size: 0.6875rem;
  color: var(--text-3);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-weight: 500;
}

/* Platform limits */
.wc-platforms {
  border-top: 1px solid var(--border);
  padding: 14px 16px;
  background: var(--bg-2);
}

.wc-platforms-header {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
  flex-wrap: wrap;
}

.wc-platforms-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.wc-platforms-hint { font-size: 0.75rem; color: var(--text-3); }

.wc-platform-btns {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
}

.wc-platform-btn {
  font-size: 0.8rem;
  padding: 5px 11px;
  border-radius: 20px;
  border: 1px solid var(--border-2);
  background: var(--bg);
  color: var(--text-2);
  cursor: pointer;
  font-family: var(--font);
  transition: background var(--transition), color var(--transition), border-color var(--transition);
  display: flex;
  align-items: center;
  gap: 4px;
}

.wc-platform-btn em {
  font-style: normal;
  font-size: 0.7rem;
  color: var(--text-3);
}

.wc-platform-btn:hover { border-color: var(--accent); color: var(--accent); }

.wc-platform-btn.active {
  background: var(--accent);
  color: #fff;
  border-color: var(--accent);
}

.wc-platform-btn.active em { color: rgba(255,255,255,0.75); }

/* Limit progress bar */
.wc-limit-bar {
  margin-top: 12px;
  padding: 12px 14px;
  background: var(--bg);
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
}

.wc-limit-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 8px;
  font-size: 0.875rem;
}

#wc-limit-name { font-weight: 600; color: var(--text); }
#wc-limit-count { color: var(--text-2); font-variant-numeric: tabular-nums; }

.wc-limit-track {
  height: 6px;
  background: var(--bg-3);
  border-radius: 3px;
  overflow: hidden;
}

.wc-limit-fill {
  height: 100%;
  border-radius: 3px;
  background: var(--accent);
  width: 0%;
  transition: width 0.15s ease, background 0.15s ease;
}

.wc-limit-fill.warn { background: #d69e2e; }
.wc-limit-fill.over { background: #e53e3e; }

.wc-limit-msg {
  margin-top: 6px;
  font-size: 0.8rem;
  color: var(--text-3);
  min-height: 1em;
}

.wc-limit-msg.warn { color: #d69e2e; }
.wc-limit-msg.over { color: #e53e3e; font-weight: 500; }

/* Mobile responsive */
@media (max-width: 640px) {
  .wc-stats {
    grid-template-columns: repeat(4, 1fr);
  }

  .wc-stat:nth-child(4) { border-right: none; }
  .wc-stat:nth-child(5),
  .wc-stat:nth-child(6),
  .wc-stat:nth-child(7) { border-top: 1px solid var(--border); }

  .wc-stat-num { font-size: 1.125rem; }
}

@media (max-width: 380px) {
  .wc-stats { grid-template-columns: repeat(2, 1fr); }
  .wc-stat:nth-child(2n) { border-right: none; }
  .wc-stat:nth-child(n+3) { border-top: 1px solid var(--border); }
  .wc-stat:nth-child(4) { border-right: 1px solid var(--border); }
}
</style>

<!-- Word counter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('wc-input');
  var statWords  = document.getElementById('stat-words');
  var statChars  = document.getElementById('stat-chars');
  var statNoSp   = document.getElementById('stat-chars-no-space');
  var statSent   = document.getElementById('stat-sentences');
  var statPara   = document.getElementById('stat-paragraphs');
  var statRead   = document.getElementById('stat-reading');
  var statSpeak  = document.getElementById('stat-speaking');

  var limitBar   = document.getElementById('wc-limit-bar');
  var limitName  = document.getElementById('wc-limit-name');
  var limitCount = document.getElementById('wc-limit-count');
  var limitFill  = document.getElementById('wc-limit-fill');
  var limitMsg   = document.getElementById('wc-limit-msg');

  var currentWPM   = 200;
  var currentLimit = null;
  var currentLimitName = '';

  /* ── Count logic ── */
  function countWords(text) {
    if (!text.trim()) return 0;
    return text.trim().split(/\s+/).filter(function(w){ return w.length > 0; }).length;
  }

  function countSentences(text) {
    if (!text.trim()) return 0;
    var matches = text.match(/[^.!?]*[.!?]+/g);
    return matches ? matches.length : (text.trim().length > 0 ? 1 : 0);
  }

  function countParagraphs(text) {
    if (!text.trim()) return 0;
    return text.trim().split(/\n\s*\n/).filter(function(p){ return p.trim().length > 0; }).length;
  }

  function formatTime(seconds) {
    if (seconds === 0) return '0 sec';
    if (seconds < 60) return Math.round(seconds) + ' sec';
    var m = Math.floor(seconds / 60);
    var s = Math.round(seconds % 60);
    if (s === 0) return m + ' min';
    return m + ' min ' + s + ' sec';
  }

  /* ── Bump animation ── */
  function bump(el) {
    el.classList.remove('bump');
    void el.offsetWidth; // force reflow
    el.classList.add('bump');
    setTimeout(function(){ el.classList.remove('bump'); }, 120);
  }

  /* ── Update all stats ── */
  function update() {
    var text  = input.value;
    var words = countWords(text);
    var chars = text.length;
    var noSp  = text.replace(/\s/g, '').length;
    var sents = countSentences(text);
    var paras = countParagraphs(text);
    var readSec  = words > 0 ? (words / currentWPM) * 60 : 0;
    var speakSec = words > 0 ? (words / 130) * 60 : 0;

    statWords.textContent = words.toLocaleString();
    statChars.textContent = chars.toLocaleString();
    statNoSp.textContent  = noSp.toLocaleString();
    statSent.textContent  = sents.toLocaleString();
    statPara.textContent  = paras.toLocaleString();
    statRead.textContent  = formatTime(readSec);
    statSpeak.textContent = formatTime(speakSec);

    bump(statWords);

    /* Platform limit */
    if (currentLimit !== null) {
      var pct = Math.min((chars / currentLimit) * 100, 100);
      var remaining = currentLimit - chars;

      limitFill.style.width = pct + '%';
      limitCount.textContent = chars.toLocaleString() + ' / ' + currentLimit.toLocaleString();

      limitFill.classList.remove('warn', 'over');
      limitMsg.classList.remove('warn', 'over');

      if (chars > currentLimit) {
        limitFill.classList.add('over');
        limitMsg.classList.add('over');
        limitMsg.textContent = Math.abs(remaining).toLocaleString() + ' characters over the limit';
      } else if (pct >= 85) {
        limitFill.classList.add('warn');
        limitMsg.classList.add('warn');
        limitMsg.textContent = remaining.toLocaleString() + ' characters remaining';
      } else {
        limitMsg.textContent = remaining.toLocaleString() + ' characters remaining';
      }
    }
  }

  /* ── Input event ── */
  input.addEventListener('input', update);

  /* ── Reading speed toggle ── */
  document.querySelectorAll('.wc-speed-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.wc-speed-btn').forEach(function(b){
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentWPM = parseInt(btn.dataset.wpm, 10);
      update();
    });
  });

  /* ── Platform buttons ── */
  document.querySelectorAll('.wc-platform-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var wasActive = btn.classList.contains('active');

      document.querySelectorAll('.wc-platform-btn').forEach(function(b){
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });

      if (wasActive) {
        /* Deselect */
        currentLimit = null;
        limitBar.classList.add('hidden');
      } else {
        btn.classList.add('active');
        btn.setAttribute('aria-pressed', 'true');
        currentLimit     = parseInt(btn.dataset.limit, 10);
        currentLimitName = btn.dataset.name;
        limitName.textContent = currentLimitName;
        limitBar.classList.remove('hidden');
        update();
      }
    });
  });

  /* ── Initial run (in case localStorage restored text) ── */
  update();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
