<?php
$tool_slug   = 'case-converter';
$tool_name   = 'Case Converter';

$page_title  = 'Case Converter — Convert Text Case Online Free | TextlyPop';
$meta_desc   = 'Convert text to UPPER CASE, lower case, Title Case, Sentence case, camelCase, snake_case, kebab-case and 12 more. Free online case converter. Instant results.';
$canonical_url = 'https://textlypop.com/tools/case-converter';
$og_title    = 'Free Online Case Converter — TextlyPop';
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
  "name": "Case Converter",
  "url": "https://textlypop.com/tools/case-converter",
  "description": "Convert text to UPPER CASE, lower case, Title Case, Sentence case, camelCase, snake_case, kebab-case and more.",
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
      "name": "What is title case?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Title case capitalizes the first letter of every major word. Small words like 'a', 'an', 'the', 'and', 'but', 'or', 'in', 'on', 'at' are kept lowercase unless they appear at the start of the title."
      }
    },
    {
      "@type": "Question",
      "name": "What is sentence case?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Sentence case capitalizes only the first letter of the first word in each sentence, and proper nouns. Everything else is lowercase. It is the standard format for most writing."
      }
    },
    {
      "@type": "Question",
      "name": "What is camelCase?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "camelCase joins words together with no spaces and capitalizes the first letter of each word except the first. For example: myVariableName. It is widely used in programming for variable names."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between snake_case and kebab-case?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "snake_case uses underscores between words and is commonly used in Python and database column names. kebab-case uses hyphens between words and is commonly used in URLs and CSS class names."
      }
    },
    {
      "@type": "Question",
      "name": "Can I convert multiple paragraphs at once?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. TextlyPop's case converter processes your entire text at once regardless of length. Paste any amount of text and click a conversion button to transform it instantly."
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
        ['name' => 'Type or paste your text', 'text' => 'Type or paste your text into the input box on the left.'],
        ['name' => 'Select a case style', 'text' => 'Click one of the case buttons to convert your text: UPPER CASE, lower case, Title Case, Sentence case, camelCase, snake_case, and more.'],
        ['name' => 'View the converted text', 'text' => 'The converted result appears instantly in the output panel on the right.'],
        ['name' => 'Copy or swap the result', 'text' => 'Click Copy to copy the result to your clipboard, or click Swap to use the output as your new input for further conversion.'],
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
  "name": "How to Convert Text Case Online",
  "description": "Convert text to UPPER CASE, lower case, Title Case, camelCase, snake_case and more.",
  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Paste your text",
      "text": "Type or paste your text into the left input panel."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "Click a case button",
      "text": "Select any of the 12 case conversion buttons at the top. The converted result appears instantly in the right output panel."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Use bulk mode",
      "text": "Enable Bulk mode to process each line of text independently \u2014 useful for converting lists."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Copy or chain conversions",
      "text": "Click Copy to copy the result, or click Use as input to run a second conversion on the already-converted text."
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
      "name": "Case converter",
      "item": "https://textlypop.com/tools/case-converter"
    }
  ]
}
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Case converter</h1>
    <p>Convert text to any case instantly. 12 conversion types including camelCase, snake_case and more.</p>
  </div>

  <div class="cv-tool" id="cv-tool">

    <!-- Case buttons — the star of this page -->
    <div class="cv-cases">
      <div class="cv-cases-grid" role="group" aria-label="Case conversion options">

        <button class="cv-case-btn" data-case="upper" aria-pressed="false">
          <span class="cv-case-label">UPPER CASE</span>
          <span class="cv-case-example">HELLO WORLD</span>
        </button>

        <button class="cv-case-btn" data-case="lower" aria-pressed="false">
          <span class="cv-case-label">lower case</span>
          <span class="cv-case-example">hello world</span>
        </button>

        <button class="cv-case-btn" data-case="title" aria-pressed="false">
          <span class="cv-case-label">Title Case</span>
          <span class="cv-case-example">Hello World</span>
        </button>

        <button class="cv-case-btn" data-case="sentence" aria-pressed="false">
          <span class="cv-case-label">Sentence case</span>
          <span class="cv-case-example">Hello world</span>
        </button>

        <button class="cv-case-btn" data-case="capitalized" aria-pressed="false">
          <span class="cv-case-label">Capitalized Case</span>
          <span class="cv-case-example">Hello World</span>
        </button>

        <button class="cv-case-btn" data-case="alternating" aria-pressed="false">
          <span class="cv-case-label">aLtErNaTiNg</span>
          <span class="cv-case-example">hElLo wOrLd</span>
        </button>

        <button class="cv-case-btn" data-case="inverse" aria-pressed="false">
          <span class="cv-case-label">iNVERSE cAsE</span>
          <span class="cv-case-example">hELLO wORLD</span>
        </button>

        <button class="cv-case-btn" data-case="camel" aria-pressed="false">
          <span class="cv-case-label">camelCase</span>
          <span class="cv-case-example">helloWorld</span>
        </button>

        <button class="cv-case-btn" data-case="pascal" aria-pressed="false">
          <span class="cv-case-label">PascalCase</span>
          <span class="cv-case-example">HelloWorld</span>
        </button>

        <button class="cv-case-btn" data-case="snake" aria-pressed="false">
          <span class="cv-case-label">snake_case</span>
          <span class="cv-case-example">hello_world</span>
        </button>

        <button class="cv-case-btn" data-case="kebab" aria-pressed="false">
          <span class="cv-case-label">kebab-case</span>
          <span class="cv-case-example">hello-world</span>
        </button>

        <button class="cv-case-btn" data-case="constant" aria-pressed="false">
          <span class="cv-case-label">CONSTANT_CASE</span>
          <span class="cv-case-example">HELLO_WORLD</span>
        </button>

      </div>
    </div>

    <!-- Input / Output panels -->
    <div class="cv-panels">

      <!-- Input -->
      <div class="cv-panel">
        <div class="cv-panel-header">
          <span class="cv-panel-label">Input</span>
          <button class="btn btn-clear" data-targets="cv-input,cv-output" aria-label="Clear all">Clear</button>
        </div>
        <textarea
          id="cv-input"
          class="cv-textarea"
          placeholder="Type or paste your text here…"
          aria-label="Text to convert"
          data-save-key="case-converter"
          spellcheck="false"></textarea>
        <div class="cv-panel-footer">
          <span class="cv-char-count" id="cv-input-count">0 characters</span>
        </div>
      </div>

      <!-- Output -->
      <div class="cv-panel">
        <div class="cv-panel-header">
          <span class="cv-panel-label">Output</span>
          <div class="cv-output-actions">
            <button class="btn btn-ghost" id="cv-swap-btn" aria-label="Use output as new input" title="Use output as input">
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
                <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
                <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
                <polyline points="12,1 14.5,4.5 11,4.5"/>
                <polyline points="4,15 1.5,11.5 5,11.5"/>
              </svg>
              Use as input
            </button>
            <button class="btn btn-copy" data-target="cv-output" aria-label="Copy converted text">Copy</button>
          </div>
        </div>
        <textarea
          id="cv-output"
          class="cv-textarea cv-output-area"
          readonly
          placeholder="Converted text will appear here…"
          aria-label="Converted text output"
          aria-live="polite"></textarea>
        <div class="cv-panel-footer">
          <span class="cv-active-case" id="cv-active-case">No conversion selected</span>
        </div>
      </div>

    </div>

    <!-- Active case indicator + bulk mode -->
    <div class="cv-toolbar">
      <div class="cv-bulk-wrap">
        <label class="cv-bulk-label" for="cv-bulk-toggle">
          <input type="checkbox" id="cv-bulk-toggle" aria-describedby="cv-bulk-desc">
          <span>Bulk mode</span>
        </label>
        <span class="cv-bulk-desc" id="cv-bulk-desc">Process each line separately</span>
      </div>
      <button class="btn btn-copy" data-target="cv-output" aria-label="Copy converted text">Copy result</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="cv-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="cv-output" data-to-tool="remove-extra-spaces">Remove extra spaces</button>
    <button class="send-to-btn" data-from="cv-output" data-to-tool="text-to-slug">Text to slug</button>
    <button class="send-to-btn" data-from="cv-output" data-to-tool="find-and-replace">Find and replace</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">L</kbd> clear &nbsp;|&nbsp;
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">Shift</kbd> + <kbd class="kbd">C</kbd> copy output
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

    <h2>How to use the case converter</h2>
    <p>Type or paste your text into the input box on the left. Then click any of the 12 conversion buttons at the top to instantly convert your text. The result appears in the output box on the right. Click Copy to copy the result, or click "Use as input" to run a second conversion on your already-converted text.</p>
    <p>Enable Bulk mode to process each line of your text independently — useful when converting a list of items where each line should be treated as a separate string.</p>

    <h2>Case conversion types explained</h2>
    <p>UPPER CASE converts every letter to uppercase. lower case converts every letter to lowercase. Title Case capitalizes the first letter of every major word while keeping small words like "a", "the", and "and" lowercase. Sentence case capitalizes only the first letter of each sentence.</p>
    <p>Capitalized Case capitalizes the first letter of every single word including small words. Alternating case switches between upper and lower for every character. Inverse case flips the case of every letter — uppercase becomes lowercase and vice versa.</p>
    <p>camelCase removes spaces and capitalizes the first letter of each word except the first — used in JavaScript and Java for variable names. PascalCase is like camelCase but capitalizes the first word too — used in class names. snake_case replaces spaces with underscores and lowercases everything — common in Python and databases. kebab-case replaces spaces with hyphens — used in URLs and CSS. CONSTANT_CASE is snake_case in all caps — used for constants in programming.</p>

    <h2>When to use each case type</h2>
    <ul>
      <li>UPPER CASE — headings, emphasis, acronyms, shouting in text</li>
      <li>lower case — casual writing, usernames, email addresses</li>
      <li>Title Case — article titles, book titles, headings in formal documents</li>
      <li>Sentence case — body text, social media posts, most general writing</li>
      <li>camelCase — JavaScript variables, Java methods, JSON keys</li>
      <li>PascalCase — class names in most programming languages</li>
      <li>snake_case — Python variables, database columns, file names</li>
      <li>kebab-case — URL slugs, CSS class names, HTML attributes</li>
      <li>CONSTANT_CASE — environment variables, constants in code</li>
    </ul>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is title case?</p>
      <p class="faq-a">Title case capitalizes the first letter of every major word. Small words like "a", "an", "the", "and", "but", "or", "in", "on", "at" are kept lowercase unless they appear at the start of the title.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is sentence case?</p>
      <p class="faq-a">Sentence case capitalizes only the first letter of the first word in each sentence, and proper nouns. Everything else is lowercase. It is the standard format for most writing.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is camelCase?</p>
      <p class="faq-a">camelCase joins words together with no spaces and capitalizes the first letter of each word except the first. For example: myVariableName. It is widely used in programming for variable and function names.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between snake_case and kebab-case?</p>
      <p class="faq-a">snake_case uses underscores between words and is commonly used in Python and database column names. kebab-case uses hyphens between words and is commonly used in URLs and CSS class names.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I convert multiple paragraphs at once?</p>
      <p class="faq-a">Yes. TextlyPop's case converter processes your entire text at once regardless of length. Paste any amount of text and click a conversion button to transform it instantly.</p>
    </div>

  </div>

</div>

<!-- Case converter CSS -->
<style>
.cv-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Case buttons grid */
.cv-cases {
  padding: 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.cv-cases-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
  gap: 8px;
}

.cv-case-btn {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 3px;
  padding: 10px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  text-align: left;
  transition: border-color var(--transition), background var(--transition), transform 0.1s ease;
}

.cv-case-btn:hover {
  border-color: var(--accent);
  transform: translateY(-1px);
}

.cv-case-btn.active {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .cv-case-btn.active { background: var(--accent-dim); }

.cv-case-label {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text);
  line-height: 1.2;
}

.cv-case-btn.active .cv-case-label { color: var(--accent-dark); }
[data-theme="dark"] .cv-case-btn.active .cv-case-label { color: #5DCAA5; }

.cv-case-example {
  font-size: 0.75rem;
  color: var(--text-3);
  font-family: var(--font-mono);
}

/* Input / Output panels */
.cv-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 200px;
  border-bottom: 1px solid var(--border);
}

.cv-panel {
  display: flex;
  flex-direction: column;
}

.cv-panel:first-child { border-right: 1px solid var(--border); }

.cv-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  gap: 8px;
  flex-wrap: wrap;
}

.cv-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.cv-output-actions { display: flex; gap: 6px; align-items: center; }

.cv-textarea {
  flex: 1;
  width: 100%;
  min-height: 180px;
  padding: 14px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 0.9375rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
}

.cv-textarea::placeholder { color: var(--text-3); }
.cv-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .cv-output-area { color: #5DCAA5; background: var(--accent-dim); }

.cv-panel-footer {
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.cv-char-count { font-size: 0.75rem; color: var(--text-3); }

.cv-active-case {
  font-size: 0.75rem;
  color: var(--accent);
  font-weight: 500;
}

/* Toolbar */
.cv-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  gap: 12px;
  flex-wrap: wrap;
}

.cv-bulk-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
}

.cv-bulk-label {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.875rem;
  color: var(--text-2);
  cursor: pointer;
  user-select: none;
}

.cv-bulk-label input[type="checkbox"] { cursor: pointer; width: 14px; height: 14px; accent-color: var(--accent); }

.cv-bulk-desc { font-size: 0.75rem; color: var(--text-3); }

/* Mobile */
@media (max-width: 640px) {
  .cv-cases-grid { grid-template-columns: repeat(2, 1fr); }

  .cv-panels {
    grid-template-columns: 1fr;
  }

  .cv-panel:first-child {
    border-right: none;
    border-bottom: 1px solid var(--border);
  }
}

@media (max-width: 380px) {
  .cv-cases-grid { grid-template-columns: 1fr; }
}
</style>

<!-- Case converter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('cv-input');
  var output     = document.getElementById('cv-output');
  var inputCount = document.getElementById('cv-input-count');
  var activeCase = document.getElementById('cv-active-case');
  var bulkToggle = document.getElementById('cv-bulk-toggle');
  var swapBtn    = document.getElementById('cv-swap-btn');

  var currentCase = null;

  /* ── Small words for Title Case ── */
  var SMALL = new Set([
    'a','an','the','and','but','or','for','nor','on','at',
    'to','by','in','of','up','as','is','it','be'
  ]);

  /* ── Conversion functions ── */
  var converters = {

    upper: function(text) {
      return text.toUpperCase();
    },

    lower: function(text) {
      return text.toLowerCase();
    },

    title: function(text) {
      return text.replace(/\S+/g, function(word, offset) {
        var clean = word.toLowerCase();
        /* Always capitalize first word and words after sentence-ending punctuation */
        if (offset === 0 || /[.!?]\s*$/.test(text.slice(0, offset))) {
          return clean.charAt(0).toUpperCase() + clean.slice(1);
        }
        if (SMALL.has(clean)) return clean;
        return clean.charAt(0).toUpperCase() + clean.slice(1);
      });
    },

    sentence: function(text) {
      return text.toLowerCase().replace(/(^\s*\w|[.!?]\s+\w)/g, function(c) {
        return c.toUpperCase();
      });
    },

    capitalized: function(text) {
      return text.replace(/\b\w/g, function(c) { return c.toUpperCase(); });
    },

    alternating: function(text) {
      var i = 0;
      return text.replace(/[a-zA-Z]/g, function(c) {
        return (i++ % 2 === 0) ? c.toLowerCase() : c.toUpperCase();
      });
    },

    inverse: function(text) {
      return text.replace(/[a-zA-Z]/g, function(c) {
        return c === c.toUpperCase() ? c.toLowerCase() : c.toUpperCase();
      });
    },

    camel: function(text) {
      var words = text.trim().split(/[\s\-_]+/).filter(Boolean);
      return words.map(function(w, i) {
        var clean = w.toLowerCase();
        return i === 0 ? clean : clean.charAt(0).toUpperCase() + clean.slice(1);
      }).join('');
    },

    pascal: function(text) {
      return text.trim().split(/[\s\-_]+/).filter(Boolean).map(function(w) {
        var clean = w.toLowerCase();
        return clean.charAt(0).toUpperCase() + clean.slice(1);
      }).join('');
    },

    snake: function(text) {
      return text.trim()
        .replace(/([a-z])([A-Z])/g, '$1 $2')
        .replace(/[\s\-]+/g, '_')
        .replace(/[^a-zA-Z0-9_]/g, '')
        .toLowerCase();
    },

    kebab: function(text) {
      return text.trim()
        .replace(/([a-z])([A-Z])/g, '$1 $2')
        .replace(/[\s_]+/g, '-')
        .replace(/[^a-zA-Z0-9\-]/g, '')
        .toLowerCase();
    },

    constant: function(text) {
      return text.trim()
        .replace(/([a-z])([A-Z])/g, '$1 $2')
        .replace(/[\s\-]+/g, '_')
        .replace(/[^a-zA-Z0-9_]/g, '')
        .toUpperCase();
    }
  };

  var caseNames = {
    upper: 'UPPER CASE', lower: 'lower case', title: 'Title Case',
    sentence: 'Sentence case', capitalized: 'Capitalized Case',
    alternating: 'aLtErNaTiNg', inverse: 'iNVERSE cAsE',
    camel: 'camelCase', pascal: 'PascalCase', snake: 'snake_case',
    kebab: 'kebab-case', constant: 'CONSTANT_CASE'
  };

  /* ── Convert text ── */
  function convert() {
    if (!currentCase) return;
    var fn   = converters[currentCase];
    var text = input.value;

    if (!text.trim()) { output.value = ''; return; }

    var bulk = bulkToggle.checked;
    var result;

    if (bulk) {
      /* Process each line separately */
      result = text.split('\n').map(function(line) {
        return line.trim() ? fn(line) : line;
      }).join('\n');
    } else {
      result = fn(text);
    }

    output.value = result;
    activeCase.textContent = 'Converted to: ' + caseNames[currentCase];
  }

  /* ── Update input char count ── */
  function updateCount() {
    var n = input.value.length;
    inputCount.textContent = n.toLocaleString() + ' character' + (n !== 1 ? 's' : '');
    convert();
  }

  /* ── Case buttons ── */
  document.querySelectorAll('.cv-case-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var wasActive = btn.classList.contains('active');

      document.querySelectorAll('.cv-case-btn').forEach(function(b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });

      if (wasActive) {
        currentCase = null;
        output.value = '';
        activeCase.textContent = 'No conversion selected';
      } else {
        btn.classList.add('active');
        btn.setAttribute('aria-pressed', 'true');
        currentCase = btn.dataset.case;
        convert();
      }
    });
  });

  /* ── Input ── */
  input.addEventListener('input', updateCount);

  /* ── Bulk toggle ── */
  bulkToggle.addEventListener('change', convert);

  /* ── Swap — use output as new input ── */
  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    input.value = output.value;
    output.value = '';
    currentCase = null;
    activeCase.textContent = 'No conversion selected';
    document.querySelectorAll('.cv-case-btn').forEach(function(b) {
      b.classList.remove('active');
      b.setAttribute('aria-pressed', 'false');
    });
    updateCount();
    input.focus();
  });

  /* ── Keyboard shortcut: Ctrl+Shift+C copies output ── */
  document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.shiftKey && e.key === 'C') {
      e.preventDefault();
      if (output.value) {
        navigator.clipboard.writeText(output.value);
      }
    }
  });

  /* ── Initial count ── */
  updateCount();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
