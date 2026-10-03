<?php
$tool_slug   = 'remove-line-breaks';
$tool_name   = 'Remove Line Breaks';

$page_title  = 'Remove Line Breaks from Text — Free Online | TextlyPop';
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
        "text": "Because the source document stored a hard line break at the end of every visual line. PDFs are the worst offender — they record text position by page layout — but emails, older Word documents and text written in narrow editors do the same. Paste the text here and the breaks are stripped instantly so it can reflow naturally."
      }
    },
    {
      "@type": "Question",
      "name": "Will this tool remove paragraph breaks too?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Only if you ask it to. The default mode removes single line breaks inside paragraphs while preserving the blank-line gaps between paragraphs. Switch to All line breaks to join everything into one continuous block, or use the blank-lines mode to collapse runs of empty lines."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between a line break and a paragraph break?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A line break is a single newline character — text moves to the next line with no visible gap. A paragraph break is two newlines in a row, producing the empty line readers perceive as a paragraph boundary. That distinction is what lets the default mode clean PDF text while keeping paragraph structure."
      }
    },
    {
      "@type": "Question",
      "name": "Can I remove line breaks and add a space instead?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "That happens automatically. Each removed break is replaced with a single space, so a sentence split across two lines rejoins correctly rather than gluing words together, and existing spaces are not doubled."
      }
    },
    {
      "@type": "Question",
      "name": "Does this work for text copied from a PDF?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — PDF cleanup is this tool's most common job. The PDF format fixes every character's position on the page, so copied text inherits a hard break at the end of each printed line. Paste it here with the default mode and the layout breaks disappear while paragraph structure is kept."
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

    <h2>About line breaks</h2>
    <p>The line break is a leftover from mechanical typewriters. Ending a line required two physical actions — returning the carriage to the left margin and rolling the paper up one line — which early computers encoded as two separate characters: carriage return (CR) and line feed (LF). The split survives today: Windows ends lines with the CRLF pair, while Unix, macOS and the web use a lone LF. Because different programs and formats handle these invisible characters differently, text that looked fine in one place routinely arrives elsewhere with hard breaks scattered through every paragraph — the exact problem this tool exists to fix, handling both conventions automatically.</p>

    <h2>When to remove all line breaks</h2>
    <p>Choose "All line breaks" when you need a single continuous block of text with no paragraph separation. This is useful when preparing text for a database field that doesn't support line breaks, when writing content for a system that will handle its own formatting, or when you need to paste text into a tool or API that expects a single line string.</p>

    <h2>Line break remover modes</h2>
    <p>Not every line break is unwanted, so there are three ways to delete them. <strong>Single line breaks only</strong> is the default and the mode most people want after copying from a PDF: it joins the hard-wrapped lines inside each paragraph while keeping the blank lines between paragraphs, so the text reflows properly instead of collapsing. <strong>All line breaks</strong> strips every one and joins the text into a single continuous block, which is what a database field or a single-line API parameter needs. <strong>Extra blank lines only</strong> leaves the structure alone and just removes consecutive empty lines, clearing the gaps that accumulate in pasted text.</p>
    <p>One invisible detail explains most confusing results. A line break is stored as an actual character — <code>\n</code> on Mac and Linux, <code>\r\n</code> on Windows — and text copied from a Windows source carries both. Stripping newlines here handles either convention, which is why a paste from Notepad and a paste from a web page both come out clean. If the text also arrived with ragged spacing, <a href="/tools/remove-extra-spaces">remove extra spaces</a> is the natural second pass, and <a href="/tools/list-to-comma">line break to comma</a> is the tool to use when the breaks should become separators rather than disappear.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">Why does my pasted text have line breaks everywhere?</p>
      <p class="faq-a">Because the source document stored a hard line break at the end of every visual line. PDFs are the worst offender — they record text position by page layout, so copying preserves each line ending — but emails, older Word documents and text written in narrow editors or terminals do the same. Those breaks made sense in the original layout; pasted anywhere else, they chop paragraphs into fragments. Paste the text here and the breaks are stripped instantly so it can reflow naturally.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Will this tool remove paragraph breaks too?</p>
      <p class="faq-a">Only if you ask it to. The default mode removes single line breaks inside paragraphs while preserving the blank-line gaps that separate paragraphs — which is what you want when cleaning up a PDF paste. Switch to "All line breaks" to join everything into one continuous block, or use the blank-lines mode to collapse runs of empty lines while leaving the rest of the formatting untouched.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between a line break and a paragraph break?</p>
      <p class="faq-a">A line break is a single newline character: text moves to the next line with no visible gap. A paragraph break is two newlines in a row, producing the empty line readers perceive as a paragraph boundary. The distinction is what makes smart cleanup possible — when fixing PDF text you want the single breaks inside paragraphs gone but the double breaks between sections kept, and the default mode makes exactly that distinction.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I remove line breaks and add a space instead?</p>
      <p class="faq-a">That happens automatically. Each removed break is replaced with a single space, so a sentence split across two lines rejoins as "line one line two" rather than "line oneline two". If a line already ends in a space, the tool avoids doubling it — the result is clean prose you can paste straight into a document without hunting for glued-together or double-spaced words.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does this work for text copied from a PDF?</p>
      <p class="faq-a">Yes — PDF cleanup is this tool's most common job. The PDF format fixes every character's position on the page, so the copied text inherits a hard break at the end of each printed line, and often stray hyphens where words were split. Paste the copied text here, use the default mode to keep paragraph structure, and the layout breaks disappear. For hyphenated word splits, a pass through the find and replace tool afterwards finishes the job.</p>
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
