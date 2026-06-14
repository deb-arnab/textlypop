<?php
$tool_slug   = 'remove-line-breaks';
$tool_name   = 'Remove Line Breaks';

$page_title  = 'Remove Line Breaks — Strip Line Breaks Online Free | TextlyPop';
$meta_desc   = 'Remove line breaks from text instantly. Clean up PDF pastes, copied text and paragraphs with unwanted line breaks. Free online tool. No signup required.';
$canonical_url = 'https://textlypop.com/tools/remove-line-breaks';
$og_title    = 'Remove Line Breaks Online Free — TextlyPop';
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
  "name": "Remove Line Breaks",
  "url": "https://textlypop.com/tools/remove-line-breaks",
  "description": "Remove line breaks from text instantly. Clean up PDF pastes and copied text with unwanted line breaks.",
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
      "name": "Why does my pasted text have line breaks everywhere?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "When you copy text from a PDF, Word document, or email, the formatting often includes hard line breaks at the end of each line. These are not paragraph breaks — they are leftover from the original document layout. This tool removes them so your text flows as one clean paragraph."
      }
    },
    {
      "@type": "Question",
      "name": "Will this tool remove paragraph breaks too?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "By default TextlyPop keeps paragraph breaks intact and only removes single line breaks within paragraphs. You can also choose to remove all line breaks including paragraph breaks using the options provided."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between a line break and a paragraph break?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A line break is a single newline character that moves text to the next line. A paragraph break is two newline characters in a row creating a visible gap between blocks of text. Most text processors treat them differently."
      }
    },
    {
      "@type": "Question",
      "name": "Can I remove line breaks and add a space instead?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. TextlyPop's remove line breaks tool replaces each line break with a space by default so words that were split across lines are joined correctly without running together."
      }
    },
    {
      "@type": "Question",
      "name": "Does this work for text copied from a PDF?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. PDF text is one of the most common sources of unwanted line breaks. When you copy text from a PDF the line endings from the original page layout are preserved. This tool removes them instantly."
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
        ['name' => 'Paste your text', 'text' => 'Paste the text with unwanted line breaks into the input box. This is common with text copied from PDFs, emails, and Word documents.'],
        ['name' => 'Choose a removal mode', 'text' => 'Select a mode: remove single line breaks only (preserving paragraphs), remove all line breaks, or remove only extra blank lines.'],
        ['name' => 'View the cleaned text', 'text' => 'The cleaned text appears instantly in the output panel.'],
        ['name' => 'Copy the result', 'text' => 'Click Copy to copy the cleaned text to your clipboard.'],
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
  "name": "How to Remove Line Breaks from Text",
  "description": "Remove unwanted line breaks from PDF pastes and copied text instantly.",
  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Paste your text",
      "text": "Paste your text with unwanted line breaks into the left input panel."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "Choose a removal mode",
      "text": "Select Single line breaks only to keep paragraph spacing, All line breaks to join everything, or Extra blank lines only to collapse excessive spacing."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Copy the result",
      "text": "The cleaned text appears instantly in the right output panel. Click Copy to copy it."
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
      "name": "Remove line breaks",
      "item": "https://textlypop.com/tools/remove-line-breaks"
    }
  ]
}
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Remove line breaks</h1>
    <p>Strip unwanted line breaks from PDF pastes, emails and copied text. Results appear instantly.</p>
  </div>

  <div class="rlb-tool" id="rlb-tool">

    <!-- Options bar -->
    <div class="rlb-options">
      <span class="rlb-options-label">Remove:</span>
      <div class="rlb-option-group" role="group" aria-label="Line break removal options">

        <label class="rlb-option">
          <input type="radio" name="rlb-mode" value="single" checked>
          <span class="rlb-option-text">
            <strong>Single line breaks only</strong>
            <em>Keeps paragraph spacing intact</em>
          </span>
        </label>

        <label class="rlb-option">
          <input type="radio" name="rlb-mode" value="all">
          <span class="rlb-option-text">
            <strong>All line breaks</strong>
            <em>Joins everything into one block</em>
          </span>
        </label>

        <label class="rlb-option">
          <input type="radio" name="rlb-mode" value="extra">
          <span class="rlb-option-text">
            <strong>Extra blank lines only</strong>
            <em>Removes consecutive empty lines</em>
          </span>
        </label>

      </div>
    </div>

    <!-- Split panels -->
    <div class="rlb-panels">

      <div class="rlb-panel">
        <div class="rlb-panel-header">
          <span class="rlb-panel-label">Input</span>
          <button class="btn btn-clear" data-targets="rlb-input,rlb-output">Clear</button>
        </div>
        <textarea
          id="rlb-input"
          class="rlb-textarea"
          placeholder="Paste your text with unwanted line breaks here…"
          aria-label="Text with line breaks to remove"
          data-save-key="remove-line-breaks"
          spellcheck="false"></textarea>
        <div class="rlb-panel-footer">
          <span id="rlb-input-lines">0 lines</span>
        </div>
      </div>

      <div class="rlb-panel">
        <div class="rlb-panel-header">
          <span class="rlb-panel-label">Output</span>
          <button class="btn btn-copy" data-target="rlb-output">Copy</button>
        </div>
        <textarea
          id="rlb-output"
          class="rlb-textarea rlb-output-area"
          readonly
          placeholder="Cleaned text will appear here…"
          aria-label="Text with line breaks removed"
          aria-live="polite"></textarea>
        <div class="rlb-panel-footer">
          <span id="rlb-output-lines">0 lines</span>
          <span id="rlb-removed-count" class="rlb-removed"></span>
        </div>
      </div>

    </div>

    <!-- Bottom toolbar -->
    <div class="rlb-toolbar">
      <button class="btn btn-ghost" id="rlb-swap-btn" title="Use output as new input">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Use as input
      </button>
      <button class="btn btn-copy" data-target="rlb-output">Copy result</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="rlb-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="rlb-output" data-to-tool="case-converter">Case converter</button>
    <button class="send-to-btn" data-from="rlb-output" data-to-tool="remove-extra-spaces">Remove extra spaces</button>
    <button class="send-to-btn" data-from="rlb-output" data-to-tool="text-to-slug">Text to slug</button>
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

    <h2>How to remove line breaks from text</h2>
    <p>Paste your text into the input box on the left. The tool processes it instantly and shows the cleaned result on the right. Choose between three modes depending on what you need: remove only single line breaks while keeping paragraph spacing, remove all line breaks to join everything into one block, or remove only consecutive blank lines while keeping the rest of the formatting intact.</p>

    <h2>Why text gets unwanted line breaks</h2>
    <p>The most common cause is copying text from a PDF. PDF files store text with hard line breaks at the end of every line based on the original page layout. When you copy that text and paste it anywhere else those line breaks come with it making the text look broken and fragmented. The same issue happens with text copied from emails, older Word documents, and certain websites that use hard returns instead of soft wrapping.</p>
    <p>Another common source is text that was formatted for a specific column width. If someone wrote text in a narrow editor or terminal and shared it with you, every line will end at the same character position with a hard break. This tool removes those breaks and lets the text reflow naturally.</p>

    <h2>Single line breaks vs paragraph breaks</h2>
    <p>A single line break moves the cursor to the next line but does not create visible separation between blocks of text. A paragraph break — two line breaks in a row — creates the visible gap between paragraphs you see in most documents. When cleaning up PDF text you usually want to remove the single line breaks within each paragraph but keep the paragraph breaks between sections. The default mode on this tool does exactly that.</p>

    <h2>When to remove all line breaks</h2>
    <p>Choose "All line breaks" when you need a single continuous block of text with no paragraph separation. This is useful when preparing text for a database field that doesn't support line breaks, when writing content for a system that will handle its own formatting, or when you need to paste text into a tool or API that expects a single line string.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">Why does my pasted text have line breaks everywhere?</p>
      <p class="faq-a">When you copy text from a PDF, Word document, or email, the formatting often includes hard line breaks at the end of each line. These are leftover from the original document layout. This tool removes them so your text flows as one clean paragraph.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Will this tool remove paragraph breaks too?</p>
      <p class="faq-a">By default TextlyPop keeps paragraph breaks intact and only removes single line breaks within paragraphs. You can also choose to remove all line breaks including paragraph breaks using the options at the top.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between a line break and a paragraph break?</p>
      <p class="faq-a">A line break is a single newline that moves text to the next line. A paragraph break is two newlines in a row creating a visible gap between blocks of text.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I remove line breaks and add a space instead?</p>
      <p class="faq-a">Yes. TextlyPop replaces each removed line break with a space so words that were split across lines are joined correctly without running together.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does this work for text copied from a PDF?</p>
      <p class="faq-a">Yes. PDF text is one of the most common sources of unwanted line breaks. When you copy text from a PDF the line endings from the original page layout are preserved. This tool removes them instantly.</p>
    </div>

  </div>

</div>

<!-- Remove line breaks CSS -->
<style>
.rlb-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Options bar */
.rlb-options {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.rlb-options-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  padding-top: 3px;
  white-space: nowrap;
}

.rlb-option-group {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  flex: 1;
}

.rlb-option {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 9px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 160px;
  transition: border-color var(--transition), background var(--transition);
}

.rlb-option:hover { border-color: var(--accent); }

.rlb-option input[type="radio"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
}

.rlb-option:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .rlb-option:has(input:checked) { background: var(--accent-dim); }

.rlb-option-text {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.rlb-option-text strong {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text);
}

.rlb-option-text em {
  font-style: normal;
  font-size: 0.75rem;
  color: var(--text-3);
}

/* Panels */
.rlb-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 240px;
  border-bottom: 1px solid var(--border);
}

.rlb-panel { display: flex; flex-direction: column; }
.rlb-panel:first-child { border-right: 1px solid var(--border); }

.rlb-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.rlb-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.rlb-textarea {
  flex: 1;
  width: 100%;
  min-height: 220px;
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

.rlb-textarea::placeholder { color: var(--text-3); }
.rlb-output-area {
  color: var(--accent-dark);
  background: var(--accent-light);
  cursor: default;
}
[data-theme="dark"] .rlb-output-area { color: #5DCAA5; background: var(--accent-dim); }

.rlb-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
  gap: 8px;
}

.rlb-removed {
  font-weight: 600;
  color: var(--accent);
}

/* Toolbar */
.rlb-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
}

/* Mobile */
@media (max-width: 640px) {
  .rlb-panels { grid-template-columns: 1fr; }
  .rlb-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .rlb-option { min-width: 100%; }
}
</style>

<!-- Remove line breaks JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input       = document.getElementById('rlb-input');
  var output      = document.getElementById('rlb-output');
  var inputLines  = document.getElementById('rlb-input-lines');
  var outputLines = document.getElementById('rlb-output-lines');
  var removedCount= document.getElementById('rlb-removed-count');
  var swapBtn     = document.getElementById('rlb-swap-btn');

  function getMode() {
    var checked = document.querySelector('input[name="rlb-mode"]:checked');
    return checked ? checked.value : 'single';
  }

  function countLines(text) {
    if (!text) return 0;
    return text.split('\n').length;
  }

  function process() {
    var text = input.value;
    var mode = getMode();
    var result;
    var inLineCount  = countLines(text);

    if (!text) {
      output.value = '';
      inputLines.textContent  = '0 lines';
      outputLines.textContent = '0 lines';
      removedCount.textContent = '';
      return;
    }

    if (mode === 'single') {
      /* Remove single line breaks but keep double (paragraph) breaks */
      result = text
        .replace(/\r\n/g, '\n')           // normalize Windows line endings
        .replace(/([^\n])\n([^\n])/g, '$1 $2'); // single \n → space
    } else if (mode === 'all') {
      /* Remove ALL line breaks */
      result = text
        .replace(/\r\n/g, '\n')
        .replace(/\n+/g, ' ')
        .trim();
    } else {
      /* Remove only extra/consecutive blank lines */
      result = text
        .replace(/\r\n/g, '\n')
        .replace(/\n{3,}/g, '\n\n')       // collapse 3+ newlines to 2
        .trim();
    }

    var outLineCount = countLines(result);
    var removed = Math.max(0, inLineCount - outLineCount);

    output.value = result;
    inputLines.textContent  = inLineCount.toLocaleString() + ' line' + (inLineCount !== 1 ? 's' : '');
    outputLines.textContent = outLineCount.toLocaleString() + ' line' + (outLineCount !== 1 ? 's' : '');
    removedCount.textContent = removed > 0 ? removed.toLocaleString() + ' removed' : '';
  }

  /* Events */
  input.addEventListener('input', process);

  document.querySelectorAll('input[name="rlb-mode"]').forEach(function(radio) {
    radio.addEventListener('change', process);
  });

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    input.value = output.value;
    output.value = '';
    process();
    input.focus();
  });

  /* Initial run */
  process();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
