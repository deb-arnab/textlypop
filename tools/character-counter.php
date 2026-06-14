<?php
$tool_slug   = 'character-counter';
$tool_name   = 'Character Counter';

$page_title  = 'Character Counter — Count Characters Online Free | TextlyPop';
$meta_desc   = 'Count characters instantly with platform limits for Twitter, Instagram, meta descriptions, YouTube and more. Free online character counter. No signup required.';
$canonical_url = 'https://textlypop.com/tools/character-counter';
$og_title    = 'Free Online Character Counter — TextlyPop';
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
  "name": "Character Counter",
  "url": "https://textlypop.com/tools/character-counter",
  "description": "Count characters instantly with platform limits for Twitter, Instagram, meta descriptions and more.",
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
      "name": "Does the character counter include spaces?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The default character count includes spaces. TextlyPop also shows characters without spaces separately so you can see both counts at the same time."
      }
    },
    {
      "@type": "Question",
      "name": "How many characters does Twitter allow?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Twitter / X allows 280 characters per tweet. Select the Twitter preset to see a live progress bar tracking your character count against the limit."
      }
    },
    {
      "@type": "Question",
      "name": "What is the ideal length for a Google meta description?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Google typically displays meta descriptions up to 155 to 160 characters. Keeping your meta description under 155 characters prevents it from being cut off in search results."
      }
    },
    {
      "@type": "Question",
      "name": "How many characters can an Instagram bio have?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Instagram allows up to 150 characters in a bio. Select the Instagram bio preset to track your count against this limit in real time."
      }
    },
    {
      "@type": "Question",
      "name": "Is my text stored or sent to a server?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. All character counting happens in your browser using JavaScript. Your text is never sent to any server and is not stored anywhere except locally in your browser."
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
        ['name' => 'Type or paste your text', 'text' => 'Type or paste your text into the input box. The character count updates instantly as you type.'],
        ['name' => 'View the character counts', 'text' => 'See your character count with and without spaces. Toggle between the two counts using the options provided.'],
        ['name' => 'Select a platform preset', 'text' => 'Choose a platform preset such as Twitter, Instagram bio, or Meta description to see a live progress bar tracking your count against the limit.'],
        ['name' => 'Copy your text', 'text' => 'Click Copy to copy your input text, or clear the box using the Clear button.'],
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
  "name": "How to Count Characters Online",
  "description": "Count characters with platform limits for Twitter, Instagram, meta descriptions and more.",
  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Paste your text",
      "text": "Type or paste your text into the text box on the page."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "Select a platform",
      "text": "Click any platform button at the top to track your character count against that platform's limit."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Watch the progress bar",
      "text": "The progress bar turns orange when you reach 85% of the limit and red when you exceed it."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Toggle spaces",
      "text": "Use the With spaces or Without spaces toggle to switch the main counter between counting modes."
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
      "name": "Character counter",
      "item": "https://textlypop.com/tools/character-counter"
    }
  ]
}
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Character counter</h1>
    <p>Count characters instantly. Select a platform to track against its limit in real time.</p>
  </div>

  <div class="cc-tool" id="cc-tool">

    <!-- Platform presets — shown ABOVE textarea, star of this page -->
    <div class="cc-platforms">
      <div class="cc-platforms-header">
        <span class="cc-platforms-title">Select a platform limit</span>
      </div>
      <div class="cc-platform-grid" role="group" aria-label="Platform character limits">
        <button class="cc-platform-btn" data-limit="280"    data-name="Twitter / X"       data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">Twitter / X</span>
          <span class="cc-platform-limit">280</span>
        </button>
        <button class="cc-platform-btn" data-limit="150"    data-name="Instagram bio"     data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">Instagram bio</span>
          <span class="cc-platform-limit">150</span>
        </button>
        <button class="cc-platform-btn" data-limit="2200"   data-name="Instagram caption" data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">Instagram caption</span>
          <span class="cc-platform-limit">2,200</span>
        </button>
        <button class="cc-platform-btn" data-limit="155"    data-name="Meta description"  data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">Meta description</span>
          <span class="cc-platform-limit">155</span>
        </button>
        <button class="cc-platform-btn" data-limit="60"     data-name="SEO title"         data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">SEO title</span>
          <span class="cc-platform-limit">60</span>
        </button>
        <button class="cc-platform-btn" data-limit="100"    data-name="YouTube title"     data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">YouTube title</span>
          <span class="cc-platform-limit">100</span>
        </button>
        <button class="cc-platform-btn" data-limit="5000"   data-name="YouTube description" data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">YouTube description</span>
          <span class="cc-platform-limit">5,000</span>
        </button>
        <button class="cc-platform-btn" data-limit="220"    data-name="LinkedIn headline" data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">LinkedIn headline</span>
          <span class="cc-platform-limit">220</span>
        </button>
        <button class="cc-platform-btn" data-limit="2000"   data-name="LinkedIn post"     data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">LinkedIn post</span>
          <span class="cc-platform-limit">2,000</span>
        </button>
        <button class="cc-platform-btn" data-limit="80"     data-name="TikTok bio"        data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">TikTok bio</span>
          <span class="cc-platform-limit">80</span>
        </button>
        <button class="cc-platform-btn" data-limit="2200"   data-name="TikTok caption"    data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">TikTok caption</span>
          <span class="cc-platform-limit">2,200</span>
        </button>
        <button class="cc-platform-btn" data-limit="63206"  data-name="Facebook post"     data-unit="chars" aria-pressed="false">
          <span class="cc-platform-name">Facebook post</span>
          <span class="cc-platform-limit">63,206</span>
        </button>
      </div>

      <!-- Active limit bar — hidden until platform selected -->
      <div class="cc-limit-active hidden" id="cc-limit-active" role="status" aria-live="polite">
        <div class="cc-limit-top">
          <span class="cc-limit-platform" id="cc-limit-platform">Twitter / X</span>
          <span class="cc-limit-numbers" id="cc-limit-numbers">0 / 280</span>
          <span class="cc-limit-remaining" id="cc-limit-remaining">280 remaining</span>
        </div>
        <div class="cc-limit-track" aria-hidden="true">
          <div class="cc-limit-fill" id="cc-limit-fill"></div>
        </div>
      </div>
    </div>

    <!-- Textarea -->
    <div class="cc-textarea-wrap">
      <textarea
        id="cc-input"
        class="cc-textarea"
        placeholder="Start typing or paste your text here…"
        aria-label="Text input for character counting"
        data-save-key="character-counter"
        spellcheck="true"></textarea>

      <div class="cc-textarea-footer">
        <div class="cc-spaces-toggle" role="group" aria-label="Space counting mode">
          <span class="cc-toggle-label">Count spaces:</span>
          <button class="cc-mode-btn active" data-mode="with" aria-pressed="true">With spaces</button>
          <button class="cc-mode-btn" data-mode="without" aria-pressed="false">Without spaces</button>
        </div>
        <div class="cc-actions">
          <button class="btn btn-clear" data-targets="cc-input" aria-label="Clear text">Clear</button>
          <button class="btn btn-copy" data-target="cc-input" aria-label="Copy text">Copy text</button>
        </div>
      </div>
    </div>

    <!-- Stats bar -->
    <div class="cc-stats" role="region" aria-label="Character statistics" aria-live="polite">
      <div class="cc-stat cc-stat-main">
        <span class="cc-stat-num" id="stat-main-count">0</span>
        <span class="cc-stat-label" id="stat-main-label">Characters</span>
      </div>
      <div class="cc-stat">
        <span class="cc-stat-num" id="stat-no-spaces">0</span>
        <span class="cc-stat-label" id="stat-secondary-label">No spaces</span>
      </div>
      <div class="cc-stat">
        <span class="cc-stat-num" id="stat-words">0</span>
        <span class="cc-stat-label">Words</span>
      </div>
      <div class="cc-stat">
        <span class="cc-stat-num" id="stat-lines">0</span>
        <span class="cc-stat-label">Lines</span>
      </div>
      <div class="cc-stat">
        <span class="cc-stat-num" id="stat-sentences">0</span>
        <span class="cc-stat-label">Sentences</span>
      </div>
      <div class="cc-stat">
        <span class="cc-stat-num" id="stat-paragraphs">0</span>
        <span class="cc-stat-label">Paragraphs</span>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="cc-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="cc-input" data-to-tool="case-converter">Case converter</button>
    <button class="send-to-btn" data-from="cc-input" data-to-tool="remove-extra-spaces">Remove extra spaces</button>
    <button class="send-to-btn" data-from="cc-input" data-to-tool="text-to-slug">Text to slug</button>
  </div>

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

    <h2>How to use the character counter</h2>
    <p>Type or paste your text into the box above. The character count updates instantly as you type. To check against a platform limit, click any platform button at the top — a live progress bar will track your count against that limit, turning orange when you reach 85% and red if you go over.</p>
    <p>Use the "With spaces" and "Without spaces" toggle to switch between counting modes. Some platforms count spaces, others do not.</p>

    <h2>Platform character limits reference</h2>
    <p>Different platforms enforce different character limits. Here are the most common ones:</p>
    <ul>
      <li>Twitter / X: 280 characters per tweet</li>
      <li>Instagram bio: 150 characters</li>
      <li>Instagram caption: 2,200 characters (first 125 shown before "more")</li>
      <li>Meta description: 155 characters before Google truncates</li>
      <li>SEO title tag: 60 characters before Google truncates</li>
      <li>YouTube title: 100 characters (first 70 shown in search results)</li>
      <li>YouTube description: 5,000 characters (first 157 shown)</li>
      <li>LinkedIn headline: 220 characters</li>
      <li>LinkedIn post: 2,000 characters before "see more"</li>
      <li>TikTok bio: 80 characters</li>
      <li>TikTok caption: 2,200 characters</li>
      <li>Facebook post: 63,206 characters</li>
    </ul>

    <h2>Characters with spaces vs without spaces</h2>
    <p>Most platforms count characters including spaces. Twitter, Instagram, and LinkedIn all count spaces as characters. However, some applications and character limit requirements exclude spaces. TextlyPop shows both counts simultaneously so you always have the right number regardless of which method your platform uses.</p>

    <h2>Why character count matters for SEO</h2>
    <p>Google truncates meta descriptions longer than approximately 155 characters and page titles longer than approximately 60 characters in search results. Writing within these limits ensures your full message appears in search results without being cut off. A truncated meta description looks unprofessional and reduces click-through rates. Use the meta description and SEO title presets to write within the optimal range every time.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">Does the character counter include spaces?</p>
      <p class="faq-a">Yes by default. TextlyPop also shows characters without spaces separately. Use the toggle above the text area to switch the main counter between with spaces and without spaces modes.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many characters does Twitter allow?</p>
      <p class="faq-a">Twitter / X allows 280 characters per tweet. Select the Twitter preset to see a live progress bar tracking your character count against the limit in real time.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the ideal length for a Google meta description?</p>
      <p class="faq-a">Google typically displays meta descriptions up to 155 to 160 characters. Keeping your meta description under 155 characters prevents it from being cut off in search results.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many characters can an Instagram bio have?</p>
      <p class="faq-a">Instagram allows up to 150 characters in a bio. Select the Instagram bio preset to track your count against this limit in real time.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my text stored or sent to a server?</p>
      <p class="faq-a">No. All character counting happens in your browser using JavaScript. Your text is never sent to any server and is not stored anywhere except locally in your own browser.</p>
    </div>

  </div>

</div>

<!-- Character counter CSS -->
<style>
.cc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Platform grid at top */
.cc-platforms {
  padding: 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.cc-platforms-header { margin-bottom: 12px; }

.cc-platforms-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.cc-platform-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(148px, 1fr));
  gap: 6px;
}

.cc-platform-btn {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  transition: border-color var(--transition), background var(--transition);
  text-align: left;
}

.cc-platform-btn:hover { border-color: var(--accent); }

.cc-platform-btn.active {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .cc-platform-btn.active { background: var(--accent-dim); }

.cc-platform-name {
  font-size: 0.8125rem;
  font-weight: 500;
  color: var(--text);
}

.cc-platform-btn.active .cc-platform-name { color: var(--accent-dark); }
[data-theme="dark"] .cc-platform-btn.active .cc-platform-name { color: #5DCAA5; }

.cc-platform-limit {
  font-size: 0.75rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
  margin-left: 6px;
}

.cc-platform-btn.active .cc-platform-limit { color: var(--accent); }

/* Active limit bar */
.cc-limit-active {
  margin-top: 12px;
  padding: 12px 14px;
  background: var(--bg);
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
}

.cc-limit-top {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 8px;
  flex-wrap: wrap;
}

.cc-limit-platform {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text);
}

.cc-limit-numbers {
  font-size: 0.875rem;
  color: var(--text-2);
  font-variant-numeric: tabular-nums;
  margin-left: auto;
}

.cc-limit-remaining {
  font-size: 0.8rem;
  color: var(--text-3);
  white-space: nowrap;
}

.cc-limit-remaining.warn { color: #d69e2e; font-weight: 500; }
.cc-limit-remaining.over { color: #e53e3e; font-weight: 600; }

.cc-limit-track {
  height: 8px;
  background: var(--bg-3);
  border-radius: 4px;
  overflow: hidden;
}

.cc-limit-fill {
  height: 100%;
  border-radius: 4px;
  background: var(--accent);
  width: 0%;
  transition: width 0.12s ease, background 0.12s ease;
}

.cc-limit-fill.warn { background: #d69e2e; }
.cc-limit-fill.over { background: #e53e3e; width: 100% !important; }

/* Textarea */
.cc-textarea-wrap { position: relative; }

.cc-textarea {
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

.cc-textarea::placeholder { color: var(--text-3); }

.cc-textarea-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 8px;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.cc-spaces-toggle { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
.cc-toggle-label { font-size: 0.8rem; color: var(--text-3); white-space: nowrap; }

.cc-mode-btn {
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

.cc-mode-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }
.cc-mode-btn:not(.active):hover { border-color: var(--accent); color: var(--accent); }

.cc-actions { display: flex; gap: 6px; }

/* Stats bar */
.cc-stats {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  border-top: 1px solid var(--border);
}

.cc-stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 16px 8px;
  border-right: 1px solid var(--border);
  text-align: center;
}

.cc-stat:last-child { border-right: none; }

.cc-stat-main { background: var(--accent-light); }
[data-theme="dark"] .cc-stat-main { background: var(--accent-dim); }

.cc-stat-num {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
  margin-bottom: 5px;
  font-variant-numeric: tabular-nums;
  transition: transform 0.1s ease;
}

.cc-stat-main .cc-stat-num { font-size: 2rem; }

.cc-stat-num.bump { transform: scale(1.12); }

.cc-stat-label {
  font-size: 0.6875rem;
  color: var(--text-3);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-weight: 500;
}

/* Mobile */
@media (max-width: 640px) {
  .cc-platform-grid { grid-template-columns: repeat(2, 1fr); }

  .cc-stats { grid-template-columns: repeat(3, 1fr); }
  .cc-stat:nth-child(3) { border-right: none; }
  .cc-stat:nth-child(4),
  .cc-stat:nth-child(5),
  .cc-stat:nth-child(6) { border-top: 1px solid var(--border); }

  .cc-stat-main .cc-stat-num { font-size: 1.5rem; }
}

@media (max-width: 380px) {
  .cc-platform-grid { grid-template-columns: 1fr; }
}
</style>

<!-- Character counter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input        = document.getElementById('cc-input');
  var statMain     = document.getElementById('stat-main-count');
  var statMainLbl  = document.getElementById('stat-main-label');
  var statNoSp     = document.getElementById('stat-no-spaces');
  var statNoSpLbl  = document.getElementById('stat-secondary-label');
  var statWords    = document.getElementById('stat-words');
  var statLines    = document.getElementById('stat-lines');
  var statSent     = document.getElementById('stat-sentences');
  var statPara     = document.getElementById('stat-paragraphs');

  var limitActive  = document.getElementById('cc-limit-active');
  var limitPlatform= document.getElementById('cc-limit-platform');
  var limitNumbers = document.getElementById('cc-limit-numbers');
  var limitRemain  = document.getElementById('cc-limit-remaining');
  var limitFill    = document.getElementById('cc-limit-fill');

  var countMode    = 'with'; // 'with' or 'without' spaces
  var currentLimit = null;
  var currentLimitName = '';

  function countWords(text) {
    if (!text.trim()) return 0;
    return text.trim().split(/\s+/).filter(function(w){ return w.length > 0; }).length;
  }

  function countLines(text) {
    if (!text) return 0;
    return text.split('\n').length;
  }

  function countSentences(text) {
    if (!text.trim()) return 0;
    var m = text.match(/[^.!?]*[.!?]+/g);
    return m ? m.length : (text.trim().length > 0 ? 1 : 0);
  }

  function countParagraphs(text) {
    if (!text.trim()) return 0;
    return text.trim().split(/\n\s*\n/).filter(function(p){ return p.trim().length > 0; }).length;
  }

  function bump(el) {
    el.classList.remove('bump');
    void el.offsetWidth;
    el.classList.add('bump');
    setTimeout(function(){ el.classList.remove('bump'); }, 120);
  }

  function update() {
    var text     = input.value;
    var withSp   = text.length;
    var withoutSp= text.replace(/\s/g, '').length;
    var mainCount= countMode === 'with' ? withSp : withoutSp;
    var words    = countWords(text);
    var lines    = countLines(text);
    var sents    = countSentences(text);
    var paras    = countParagraphs(text);

    statMain.textContent    = mainCount.toLocaleString();
    statMainLbl.textContent = countMode === 'with' ? 'Characters' : 'No spaces';
    statNoSp.textContent    = countMode === 'with' ? withoutSp.toLocaleString() : withSp.toLocaleString();
    statNoSpLbl.textContent = countMode === 'with' ? 'No spaces' : 'With spaces';
    statWords.textContent   = words.toLocaleString();
    statLines.textContent   = lines.toLocaleString();
    statSent.textContent    = sents.toLocaleString();
    statPara.textContent    = paras.toLocaleString();

    bump(statMain);

    /* Platform limit */
    if (currentLimit !== null) {
      var chars     = withSp; // platforms count with spaces
      var pct       = Math.min((chars / currentLimit) * 100, 100);
      var remaining = currentLimit - chars;

      limitPlatform.textContent = currentLimitName;
      limitNumbers.textContent  = chars.toLocaleString() + ' / ' + currentLimit.toLocaleString();

      limitFill.style.width = pct + '%';
      limitFill.classList.remove('warn', 'over');
      limitRemain.classList.remove('warn', 'over');

      if (chars > currentLimit) {
        limitFill.classList.add('over');
        limitRemain.classList.add('over');
        limitRemain.textContent = Math.abs(remaining).toLocaleString() + ' over the limit';
      } else if (pct >= 85) {
        limitFill.classList.add('warn');
        limitRemain.classList.add('warn');
        limitRemain.textContent = remaining.toLocaleString() + ' remaining';
      } else {
        limitRemain.textContent = remaining.toLocaleString() + ' remaining';
      }
    }
  }

  /* Input */
  input.addEventListener('input', update);

  /* Space mode toggle */
  document.querySelectorAll('.cc-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.cc-mode-btn').forEach(function(b){
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      countMode = btn.dataset.mode;
      update();
    });
  });

  /* Platform buttons */
  document.querySelectorAll('.cc-platform-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var wasActive = btn.classList.contains('active');

      document.querySelectorAll('.cc-platform-btn').forEach(function(b){
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });

      if (wasActive) {
        currentLimit = null;
        limitActive.classList.add('hidden');
      } else {
        btn.classList.add('active');
        btn.setAttribute('aria-pressed', 'true');
        currentLimit     = parseInt(btn.dataset.limit, 10);
        currentLimitName = btn.dataset.name;
        limitActive.classList.remove('hidden');
        update();
      }
    });
  });

  /* Initial run */
  update();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
