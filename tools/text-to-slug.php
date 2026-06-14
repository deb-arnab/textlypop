<?php
$tool_slug   = 'text-to-slug';
$tool_name   = 'Text to Slug';

$page_title  = 'Text to Slug Generator — Convert Title to URL Slug Free | TextlyPop';
$meta_desc   = 'Convert any title or text into a clean SEO-friendly URL slug instantly. Bulk mode for multiple titles. Custom separator, lowercase, remove stopwords. Free online slug generator.';
$canonical_url = 'https://textlypop.com/tools/text-to-slug';
$og_title    = 'Free Online URL Slug Generator — TextlyPop';
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
  "name": "Text to Slug Generator",
  "url": "https://textlypop.com/tools/text-to-slug",
  "description": "Convert any title or text into a clean SEO-friendly URL slug instantly. Bulk mode for multiple titles.",
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
      "name": "What is a URL slug?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A URL slug is the part of a web address that identifies a specific page in a human-readable format. For example in the URL example.com/blog/how-to-write-better the slug is 'how-to-write-better'. Slugs use lowercase letters, numbers, and hyphens — no spaces or special characters."
      }
    },
    {
      "@type": "Question",
      "name": "How do I create an SEO-friendly URL slug?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A good SEO slug is lowercase, uses hyphens between words, contains the primary keyword, and avoids unnecessary words. TextlyPop's slug generator handles all the technical formatting automatically — just paste your title and copy the result."
      }
    },
    {
      "@type": "Question",
      "name": "Should I remove stop words from my URL slug?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It depends. Removing stop words like 'the', 'a', 'and', 'of' makes slugs shorter and cleaner. For example 'how-to-write-better-content' instead of 'how-to-write-better-content-for-the-web'. However some stop words are part of your keyword phrase and should be kept. TextlyPop gives you the option to remove them or keep them."
      }
    },
    {
      "@type": "Question",
      "name": "Can I generate slugs for multiple titles at once?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Enable bulk mode and paste one title per line. Each line is converted to its own slug independently and the results appear one per line in the output, ready to copy."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use underscores instead of hyphens in slugs?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. TextlyPop lets you choose between hyphens and underscores as the word separator. Hyphens are recommended by Google for URLs. Underscores are sometimes used in older systems or specific frameworks that require them."
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
        ['name' => 'Type or paste your title', 'text' => 'Type or paste your page title or heading into the input field.'],
        ['name' => 'Configure options', 'text' => 'Choose your separator (hyphen or underscore), whether to force lowercase, and whether to remove common stop words.'],
        ['name' => 'Copy the slug', 'text' => 'Your URL slug is generated instantly below the input. Click Copy to copy it to your clipboard.'],
        ['name' => 'Use bulk mode for multiple titles', 'text' => 'Enable bulk mode to convert multiple titles at once — paste one title per line and get one slug per line in return.'],
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
  "name": "How to Convert a Title to a URL Slug",
  "description": "Convert any title into a clean SEO-friendly URL slug instantly.",
  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Type your title",
      "text": "Type or paste your page title into the input field."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "See the slug instantly",
      "text": "The URL slug is generated in real time as you type, shown in a preview with a sample URL."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Adjust options",
      "text": "Choose between hyphen or underscore separator, enable lowercase, or remove stop words using the options at the top."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Copy the slug",
      "text": "Click Copy slug to copy just the slug. For multiple titles enable Bulk mode and copy all slugs at once."
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
      "name": "Text to slug",
      "item": "https://textlypop.com/tools/text-to-slug"
    }
  ]
}
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Text to slug generator</h1>
    <p>Convert any title into a clean SEO-friendly URL slug instantly. Bulk mode for multiple titles.</p>
  </div>

  <div class="tts-tool" id="tts-tool">

    <!-- Options -->
    <div class="tts-options">

      <div class="tts-option-row">

        <!-- Separator -->
        <div class="tts-option-group">
          <span class="tts-option-label">Separator</span>
          <div class="tts-sep-btns" role="group" aria-label="Word separator">
            <button class="tts-sep-btn active" data-sep="-" aria-pressed="true">
              hyphen <em>hello-world</em>
            </button>
            <button class="tts-sep-btn" data-sep="_" aria-pressed="false">
              underscore <em>hello_world</em>
            </button>
          </div>
        </div>

        <!-- Checkboxes -->
        <div class="tts-checks" role="group" aria-label="Slug options">

          <label class="tts-check">
            <input type="checkbox" id="tts-lowercase" checked>
            <span class="tts-check-text">
              <strong>Lowercase</strong>
              <em>Force all letters to lowercase</em>
            </span>
          </label>

          <label class="tts-check">
            <input type="checkbox" id="tts-stopwords">
            <span class="tts-check-text">
              <strong>Remove stop words</strong>
              <em>Strip "a", "the", "and", "of"…</em>
            </span>
          </label>

          <label class="tts-check">
            <input type="checkbox" id="tts-bulk">
            <span class="tts-check-text">
              <strong>Bulk mode</strong>
              <em>One title per line, one slug per line</em>
            </span>
          </label>

        </div>

      </div>

    </div>

    <!-- Single mode -->
    <div id="tts-single-mode">

      <div class="tts-single-input-wrap">
        <input
          type="text"
          id="tts-single-input"
          class="tts-single-input"
          placeholder="Type or paste your title here…"
          autocomplete="off"
          spellcheck="false"
          aria-label="Title to convert to slug">
      </div>

      <div class="tts-single-output-wrap" id="tts-single-output-wrap">
        <div class="tts-slug-display" id="tts-slug-display" aria-live="polite">
          <span class="tts-slug-prefix">textlypop.com/blog/</span><span class="tts-slug-value" id="tts-slug-value"></span>
        </div>
        <button class="btn btn-primary" id="tts-copy-slug" aria-label="Copy slug">
          Copy slug
        </button>
      </div>

    </div>

    <!-- Bulk mode -->
    <div id="tts-bulk-mode" style="display:none">

      <div class="tts-panels">

        <div class="tts-panel">
          <div class="tts-panel-header">
            <span class="tts-panel-label">Input — one title per line</span>
            <button class="btn btn-clear" data-targets="tts-bulk-input,tts-bulk-output">Clear</button>
          </div>
          <textarea
            id="tts-bulk-input"
            class="tts-textarea"
            placeholder="How to Write Better Blog Posts&#10;10 Tips for Better SEO&#10;The Ultimate Guide to Content Marketing"
            aria-label="Titles to convert, one per line"
            data-save-key="text-to-slug-bulk"
            spellcheck="false"></textarea>
          <div class="tts-panel-footer">
            <span id="tts-bulk-input-count">0 titles</span>
          </div>
        </div>

        <div class="tts-panel">
          <div class="tts-panel-header">
            <span class="tts-panel-label">Output — slugs</span>
            <button class="btn btn-copy" data-target="tts-bulk-output">Copy all</button>
          </div>
          <textarea
            id="tts-bulk-output"
            class="tts-textarea tts-output-area"
            readonly
            placeholder="Slugs will appear here…"
            aria-label="Generated slugs"
            aria-live="polite"></textarea>
          <div class="tts-panel-footer">
            <span id="tts-bulk-output-count">0 slugs</span>
          </div>
        </div>

      </div>

    </div>

    <!-- Toolbar -->
    <div class="tts-toolbar">
      <div class="tts-toolbar-left">
        <span class="tts-toolbar-hint">Hyphens recommended by Google for URLs</span>
      </div>
      <button class="btn btn-copy" data-target="tts-bulk-output" id="tts-bulk-copy-btn" style="display:none">Copy all slugs</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send input to:</span>
    <button class="send-to-btn" data-from="tts-single-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="tts-single-input" data-to-tool="case-converter">Case converter</button>
    <button class="send-to-btn" data-from="tts-single-input" data-to-tool="find-and-replace">Find and replace</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">Shift</kbd> + <kbd class="kbd">C</kbd> copy slug
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

    <h2>How to convert a title to a URL slug</h2>
    <p>Type or paste your title into the input field. The slug is generated instantly as you type and shown in the preview below with a sample URL. Click Copy slug to copy just the slug to your clipboard. For multiple titles at once enable Bulk mode, paste one title per line, and copy all the generated slugs together.</p>

    <h2>What makes a good URL slug</h2>
    <p>A well-formed URL slug uses only lowercase letters, numbers, and hyphens. It contains no spaces, no special characters, no accented letters, and no punctuation. It is as short as possible while still being descriptive. It includes the primary keyword for the page. And it reads naturally when someone sees it in a browser address bar or shared link.</p>
    <p>Google recommends using hyphens rather than underscores as word separators in URLs. Hyphens are treated as word separators by search engines while underscores join words together — "slug-generator" is read as two words, "slug_generator" is read as one word "slug_generator".</p>

    <h2>Should you remove stop words from slugs?</h2>
    <p>Stop words are common words like "a", "an", "the", "and", "of", "in", "for", "to", "with". Removing them makes slugs shorter and keeps the focus on the meaningful keywords. "how-to-write-better-blog-posts" becomes "write-better-blog-posts" with stop words removed. Shorter is generally better for URLs — they are easier to share, easier to remember, and look cleaner. However if removing a stop word makes the slug ambiguous or changes its meaning, keep it.</p>

    <h2>Bulk slug generation</h2>
    <p>The bulk mode is built for content teams, SEO managers, and developers who need to generate multiple slugs at once. Paste a list of article titles, product names, or category names — one per line — and get a matching list of slugs instantly. Copy the entire output and paste it directly into your CMS, spreadsheet, or database.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is a URL slug?</p>
      <p class="faq-a">A URL slug is the part of a web address that identifies a specific page in a human-readable format. For example in the URL example.com/blog/how-to-write-better the slug is "how-to-write-better". Slugs use lowercase letters, numbers, and hyphens — no spaces or special characters.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I create an SEO-friendly URL slug?</p>
      <p class="faq-a">A good SEO slug is lowercase, uses hyphens between words, contains the primary keyword, and avoids unnecessary words. TextlyPop handles all the technical formatting automatically — just paste your title and copy the result.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Should I remove stop words from my URL slug?</p>
      <p class="faq-a">Generally yes. Removing stop words like "the", "a", "and", "of" makes slugs shorter and cleaner. However if a stop word is part of your target keyword phrase keep it. TextlyPop gives you the option either way.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I generate slugs for multiple titles at once?</p>
      <p class="faq-a">Yes. Enable bulk mode and paste one title per line. Each line is converted to its own slug and the results appear one per line in the output, ready to copy all at once.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use underscores instead of hyphens in slugs?</p>
      <p class="faq-a">Yes. Select the underscore separator option. Hyphens are recommended by Google for URLs but underscores are sometimes required by specific systems or frameworks.</p>
    </div>

  </div>

</div>

<!-- Text to slug CSS -->
<style>
.tts-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Options */
.tts-options {
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.tts-option-row {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  align-items: flex-start;
}

.tts-option-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.tts-option-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.tts-sep-btns {
  display: flex;
  gap: 6px;
}

.tts-sep-btn {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 2px;
  padding: 8px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  font-size: 0.8125rem;
  font-weight: 500;
  color: var(--text-2);
  transition: border-color var(--transition), background var(--transition);
  min-width: 110px;
}

.tts-sep-btn em {
  font-style: normal;
  font-size: 0.75rem;
  color: var(--text-3);
  font-family: var(--font-mono);
}

.tts-sep-btn:hover { border-color: var(--accent); }
.tts-sep-btn.active { border-color: var(--accent); background: var(--accent-light); color: var(--accent-dark); }
[data-theme="dark"] .tts-sep-btn.active { background: var(--accent-dim); color: #5DCAA5; }
.tts-sep-btn.active em { color: var(--accent); }

.tts-checks {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  flex: 1;
  align-items: flex-end;
}

.tts-check {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 130px;
  transition: border-color var(--transition), background var(--transition);
}

.tts-check:hover { border-color: var(--accent); }

.tts-check input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.tts-check:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .tts-check:has(input:checked) { background: var(--accent-dim); }

.tts-check-text { display: flex; flex-direction: column; gap: 1px; }
.tts-check-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.tts-check-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); }

/* Single mode */
.tts-single-input-wrap {
  padding: 16px 16px 0;
}

.tts-single-input {
  width: 100%;
  padding: 12px 16px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font);
  font-size: 1rem;
  outline: none;
  transition: border-color var(--transition);
}

.tts-single-input:focus { border-color: var(--accent); background: var(--bg); }
.tts-single-input::placeholder { color: var(--text-3); }

.tts-single-output-wrap {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 16px 16px;
  flex-wrap: wrap;
}

.tts-slug-display {
  flex: 1;
  display: flex;
  align-items: center;
  background: var(--bg-2);
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  padding: 10px 14px;
  font-family: var(--font-mono);
  font-size: 0.9rem;
  min-height: 42px;
  overflow-x: auto;
  white-space: nowrap;
}

.tts-slug-prefix { color: var(--text-3); flex-shrink: 0; }

.tts-slug-value {
  color: var(--accent);
  font-weight: 600;
}

/* Bulk mode panels */
.tts-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 240px;
  border-top: 1px solid var(--border);
}

.tts-panel { display: flex; flex-direction: column; }
.tts-panel:first-child { border-right: 1px solid var(--border); }

.tts-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.tts-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.tts-textarea {
  flex: 1;
  width: 100%;
  min-height: 220px;
  padding: 14px;
  border: none;
  background: transparent;
  font-family: var(--font-mono);
  font-size: 0.875rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
}

.tts-textarea::placeholder { color: var(--text-3); white-space: pre-line; }
.tts-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .tts-output-area { color: #5DCAA5; background: var(--accent-dim); }

.tts-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

/* Toolbar */
.tts-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.tts-toolbar-hint { font-size: 0.75rem; color: var(--text-3); }

@media (max-width: 640px) {
  .tts-option-row { flex-direction: column; }
  .tts-panels { grid-template-columns: 1fr; }
  .tts-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .tts-check { min-width: 100%; }
  .tts-single-output-wrap { flex-direction: column; align-items: stretch; }
}
</style>

<!-- Text to slug JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var singleInput  = document.getElementById('tts-single-input');
  var slugValue    = document.getElementById('tts-slug-value');
  var copySlugBtn  = document.getElementById('tts-copy-slug');
  var bulkInput    = document.getElementById('tts-bulk-input');
  var bulkOutput   = document.getElementById('tts-bulk-output');
  var bulkInCount  = document.getElementById('tts-bulk-input-count');
  var bulkOutCount = document.getElementById('tts-bulk-output-count');
  var singleMode   = document.getElementById('tts-single-mode');
  var bulkModeEl   = document.getElementById('tts-bulk-mode');
  var bulkCopyBtn  = document.getElementById('tts-bulk-copy-btn');

  var optLower     = document.getElementById('tts-lowercase');
  var optStop      = document.getElementById('tts-stopwords');
  var optBulk      = document.getElementById('tts-bulk');

  var currentSep   = '-';

  /* Common English stop words */
  var STOPWORDS = new Set([
    'a','an','the','and','or','but','in','on','at','to','for',
    'of','with','by','from','is','was','are','were','be','been',
    'has','have','had','do','does','did','will','would','could',
    'should','may','might','shall','can','not','no','nor','so',
    'yet','both','either','neither','as','if','then','than',
    'that','this','these','those','it','its','up','out','about'
  ]);

  /* ── Core slug function ── */
  function toSlug(text) {
    var sep = currentSep;
    var result = text;

    /* Lowercase first if option enabled */
    if (optLower.checked) result = result.toLowerCase();

    /* Normalize accented characters */
    result = result.normalize('NFD').replace(/[\u0300-\u036f]/g, '');

    /* Remove stop words if option enabled */
    if (optStop.checked) {
      result = result.split(/\s+/).filter(function(word) {
        return !STOPWORDS.has(word.toLowerCase());
      }).join(' ');
    }

    /* Replace spaces and special chars with separator */
    result = result
      .replace(/[^a-zA-Z0-9\s\-_]/g, '')  /* remove special chars */
      .trim()
      .replace(/[\s\-_]+/g, sep);           /* spaces/dashes to separator */

    /* If not lowercase, just ensure no uppercase bleed through */
    if (optLower.checked) result = result.toLowerCase();

    /* Remove leading/trailing separators */
    var escapedSep = sep.replace(/[-]/g, '\\-');
    result = result.replace(new RegExp('^[' + escapedSep + ']+|[' + escapedSep + ']+$', 'g'), '');

    return result;
  }

  /* ── Single mode ── */
  function updateSingle() {
    var slug = toSlug(singleInput.value);
    slugValue.textContent = slug;
  }

  /* ── Bulk mode ── */
  function updateBulk() {
    var lines = bulkInput.value.split('\n');
    var nonEmpty = lines.filter(function(l){ return l.trim() !== ''; });
    var slugs = nonEmpty.map(toSlug);

    bulkOutput.value = slugs.join('\n');
    bulkInCount.textContent  = nonEmpty.length.toLocaleString() + ' title' + (nonEmpty.length !== 1 ? 's' : '');
    bulkOutCount.textContent = slugs.length.toLocaleString() + ' slug' + (slugs.length !== 1 ? 's' : '');
  }

  /* ── Toggle bulk/single mode ── */
  function toggleMode() {
    var isBulk = optBulk.checked;
    singleMode.style.display  = isBulk ? 'none' : 'block';
    bulkModeEl.style.display  = isBulk ? 'block' : 'none';
    bulkCopyBtn.style.display = isBulk ? 'inline-flex' : 'none';
    if (isBulk) updateBulk();
  }

  /* ── Copy slug button ── */
  copySlugBtn.addEventListener('click', function() {
    var slug = slugValue.textContent;
    if (!slug) return;
    navigator.clipboard.writeText(slug).then(function() {
      copySlugBtn.textContent = 'Copied!';
      setTimeout(function(){ copySlugBtn.textContent = 'Copy slug'; }, 2000);
    });
  });

  /* ── Separator buttons ── */
  document.querySelectorAll('.tts-sep-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.tts-sep-btn').forEach(function(b){
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentSep = btn.dataset.sep;
      updateSingle();
      if (optBulk.checked) updateBulk();
    });
  });

  /* ── Option checkboxes ── */
  [optLower, optStop].forEach(function(cb) {
    cb.addEventListener('change', function() {
      updateSingle();
      if (optBulk.checked) updateBulk();
    });
  });

  optBulk.addEventListener('change', toggleMode);

  /* ── Inputs ── */
  singleInput.addEventListener('input', updateSingle);
  bulkInput.addEventListener('input', updateBulk);

  /* ── Ctrl+Shift+C copies the slug in single mode ── */
  document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.shiftKey && e.key === 'C') {
      e.preventDefault();
      if (!optBulk.checked) {
        copySlugBtn.click();
      } else {
        var allSlugs = bulkOutput.value;
        if (allSlugs) navigator.clipboard.writeText(allSlugs);
      }
    }
  });

  /* ── Initial state ── */
  updateSingle();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
