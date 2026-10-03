<?php
$tool_slug   = 'pdf-text-extractor';
$tool_name   = 'PDF Text Extractor';

$page_title  = 'PDF Text Extractor — Copy Text from a PDF | TextlyPop';
$meta_desc   = 'Extract text from a PDF in your browser. Drag and drop a file, then copy or download the text. Your file never leaves your device. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/pdf-text-extractor';
$og_title    = 'Free PDF Text Extractor — TextlyPop';
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
  "name": "PDF Text Extractor",
  "url": "https://textlypop.com/tools/pdf-text-extractor",
  "description": "Extract text from PDF files instantly in your browser. Drag and drop a PDF, then copy or download the text. Your file never leaves your device.",
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
      "name": "How do I extract text from a PDF?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Drag a PDF onto the drop zone above, or click it to choose a file from your device. The tool reads the PDF page by page and pulls out all the selectable text, showing progress as it works. When it finishes, the full text appears in the box below, where you can copy it to your clipboard or download it as a plain .txt file. There is nothing to install and no account to create — it works the moment the page loads."
      }
    },
    {
      "@type": "Question",
      "name": "Why did my PDF return no text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The most common reason is that the PDF is a scanned document — a photograph or scan of a page saved as an image inside the PDF. There is no real text in the file for the extractor to read, only a picture of text, so nothing comes out. Turning a scanned image back into text requires optical character recognition (OCR), which this tool does not perform. A quick way to tell in advance is to open the PDF in a reader and try to select a word with your cursor: if you cannot highlight the text, it is an image and there is nothing to extract."
      }
    },
    {
      "@type": "Question",
      "name": "Is my PDF uploaded anywhere, and is it private?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Your PDF is never uploaded. All the processing happens locally in your own browser using a bundled copy of the open-source PDF.js engine, so the file and its text never travel to a server, are never logged, and are never seen by anyone else. This is a genuine difference from most online PDF-to-text sites, which send your document to their servers to process it. Because everything runs on your device, the tool also keeps working if you disconnect from the internet after the page has loaded, which makes it safe for confidential contracts, statements and records."
      }
    },
    {
      "@type": "Question",
      "name": "Can it handle password-protected PDFs?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, as long as you know the password. If you open a protected PDF, the tool asks you to enter its password and then unlocks and extracts the text exactly as it would for any other file. The password is used only in your browser to open the document and is never stored or transmitted. If a PDF is protected in a way that forbids copying its content, or you do not have the password, the text cannot be extracted."
      }
    },
    {
      "@type": "Question",
      "name": "Does it keep the original formatting, tables and images?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It extracts the text content and preserves the reading order and line breaks, but it does not reproduce visual formatting such as fonts, colours, columns or page layout, and it does not extract images. Tables are pulled out as text row by row, which keeps the words but not the grid structure, so complex multi-column layouts may need a little tidying afterwards. If you need to clean up the result, you can send it straight to tools like find and replace or the word counter."
      }
    },
    {
      "@type": "Question",
      "name": "Is there a file size or page limit?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "There is no fixed limit, because the work is done by your own device rather than a server with quotas. In practice the ceiling is your device's memory: very large PDFs with hundreds of pages take longer and use more memory, and an extremely large file could be slow on an older phone. Most documents — reports, ebooks, contracts, research papers — extract in a few seconds. The tool shows page-by-page progress so you can see it working through a long document."
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
        ['name' => 'Add your PDF', 'text' => 'Drag a PDF onto the drop zone or click it to choose a file from your device. Nothing is uploaded.'],
        ['name' => 'Let it read the pages', 'text' => 'The tool extracts text from each page in turn, showing progress as it goes.'],
        ['name' => 'Review the text', 'text' => 'The extracted text appears in the box below with a word and character count.'],
        ['name' => 'Copy or download', 'text' => 'Copy the text to your clipboard or download it as a plain .txt file.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>PDF text extractor</h1>
    <p>Pull the text out of any PDF, right in your browser. Drag and drop a file, then copy or download the text. Your PDF is never uploaded — everything happens on your device.</p>
  </div>

  <div class="pe-tool" id="pe-tool">

    <!-- Drop zone -->
    <div class="pe-drop" id="pe-drop" role="button" tabindex="0" aria-label="Choose or drop a PDF file">
      <svg class="pe-drop-icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
        <polyline points="14 2 14 8 20 8"/>
        <line x1="12" y1="18" x2="12" y2="12"/>
        <polyline points="9 15 12 12 15 15"/>
      </svg>
      <p class="pe-drop-title">Drop a PDF here or <span class="pe-drop-link">browse</span></p>
      <p class="pe-drop-sub">Your file stays on your device — nothing is uploaded</p>
      <input type="file" id="pe-file" accept="application/pdf,.pdf" hidden>
    </div>

    <!-- Password prompt (hidden until needed) -->
    <div class="pe-password hidden" id="pe-password">
      <label for="pe-password-input">This PDF is password-protected. Enter its password to continue:</label>
      <div class="pe-password-row">
        <input type="password" id="pe-password-input" class="pe-password-input" autocomplete="off" placeholder="PDF password">
        <button class="btn btn-primary" id="pe-password-btn">Unlock</button>
      </div>
      <p class="pe-password-err hidden" id="pe-password-err">Incorrect password — please try again.</p>
    </div>

    <!-- Progress -->
    <div class="pe-progress hidden" id="pe-progress">
      <div class="pe-spinner" aria-hidden="true"></div>
      <span id="pe-progress-text">Reading PDF…</span>
    </div>

    <!-- Error -->
    <div class="pe-error hidden" id="pe-error" role="alert"></div>

    <!-- Result -->
    <div class="pe-result hidden" id="pe-result">
      <div class="pe-result-bar">
        <div class="pe-file-info">
          <span class="pe-file-name" id="pe-file-name"></span>
          <span class="pe-stats" id="pe-stats"></span>
        </div>
        <div class="pe-actions">
          <label class="pe-opt"><input type="checkbox" id="pe-opt-pages" checked> <span>Page markers</span></label>
          <label class="pe-opt"><input type="checkbox" id="pe-opt-trim" checked> <span>Trim blank lines</span></label>
        </div>
      </div>
      <textarea id="pe-output" class="pe-output" spellcheck="false" aria-label="Extracted text"></textarea>
      <div class="pe-buttons">
        <button class="btn btn-primary" id="pe-copy">Copy text</button>
        <button class="btn btn-ghost" id="pe-download">Download .txt</button>
        <button class="btn btn-ghost" id="pe-reset">Extract another</button>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16" id="pe-send-wrap" style="display:none;">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="pe-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="pe-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="pe-output" data-to-tool="text-to-csv">Text to CSV</button>
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

  <!-- SEO + GEO content -->
  <div class="tool-content mt-32">

    <h2>About extracting text from PDFs</h2>
    <p>The PDF is the world's standard format for finished documents — contracts, invoices, reports, ebooks and research papers all travel as PDFs because they look identical on every device. That fidelity comes at a cost: a PDF is designed to be displayed, not edited, so getting the plain text back out of one is not as simple as copying from a web page. A text extractor reads the document's internal structure, finds the characters and their positions, and reassembles them into ordinary text you can paste into an editor, search, translate or feed into another tool. This extractor does all of that in your browser, which means your document never has to be handed to a third-party server just to read its words.</p>

    <h2>History of the PDF</h2>
    <p>The PDF was created by Adobe co-founder John Warnock, who in 1991 circulated an internal paper describing "The Camelot Project" — a way to capture documents from any application and view or print them on any machine exactly as intended. That idea became the Portable Document Format, and Adobe released PDF 1.0 in 1993. For years it was a proprietary format that needed Adobe's own software, but it spread far beyond that, and in 2008 Adobe released PDF as an open standard, ISO 32000, so anyone could build software that reads and writes it. That openness is why free, independent libraries can parse PDFs today, and it is what makes an in-browser extractor like this one possible.</p>

    <h2>How PDF text extraction works</h2>
    <p>Inside a text-based PDF, every page is described by a content stream that lists the characters to draw, the font to use, and the exact coordinates where each piece of text belongs. Extraction works by walking through those instructions, decoding the character codes back into readable letters, and using the positions to rebuild lines and reading order. This is why a PDF exported from a word processor or design program extracts cleanly — the real text is right there in the file. A scanned PDF is completely different: it contains only a photograph of the page, with no character data at all, so there is nothing to decode. Recovering text from an image requires optical character recognition, a separate and much heavier process that this tool does not perform.</p>

    <h2>When text extraction works and when it does not</h2>
    <p>Extraction works reliably for any PDF that was generated digitally — exported from Word, Google Docs, LaTeX, a design tool, or a web page saved to PDF. The text comes out in reading order with its line breaks intact, ready to copy or clean up. It will not work on scanned or photographed documents, because those hold images rather than text, and it may produce imperfect results on PDFs with heavy multi-column layouts or complex tables, where the reading order of the original is ambiguous. A fast way to check whether a PDF has extractable text is to open it in any reader and try to select a sentence with your cursor: if the text highlights, this tool can extract it; if it does not, the page is an image.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I extract text from a PDF?</p>
      <p class="faq-a">Drag a PDF onto the drop zone above, or click it to choose a file from your device. The tool reads the PDF page by page and pulls out all the selectable text, showing progress as it works. When it finishes, the full text appears in the box below, where you can copy it to your clipboard or download it as a plain .txt file. There is nothing to install and no account to create — it works the moment the page loads.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why did my PDF return no text?</p>
      <p class="faq-a">The most common reason is that the PDF is a scanned document — a photograph or scan of a page saved as an image inside the PDF. There is no real text in the file for the extractor to read, only a picture of text, so nothing comes out. Turning a scanned image back into text requires optical character recognition (OCR), which this tool does not perform. A quick way to tell in advance is to open the PDF in a reader and try to select a word with your cursor: if you cannot highlight the text, it is an image and there is nothing to extract.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my PDF uploaded anywhere, and is it private?</p>
      <p class="faq-a">Your PDF is never uploaded. All the processing happens locally in your own browser using a bundled copy of the open-source PDF.js engine, so the file and its text never travel to a server, are never logged, and are never seen by anyone else. This is a genuine difference from most online PDF-to-text sites, which send your document to their servers to process it. Because everything runs on your device, the tool also keeps working if you disconnect from the internet after the page has loaded, which makes it safe for confidential contracts, statements and records.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can it handle password-protected PDFs?</p>
      <p class="faq-a">Yes, as long as you know the password. If you open a protected PDF, the tool asks you to enter its password and then unlocks and extracts the text exactly as it would for any other file. The password is used only in your browser to open the document and is never stored or transmitted. If a PDF is protected in a way that forbids copying its content, or you do not have the password, the text cannot be extracted.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does it keep the original formatting, tables and images?</p>
      <p class="faq-a">It extracts the text content and preserves the reading order and line breaks, but it does not reproduce visual formatting such as fonts, colours, columns or page layout, and it does not extract images. Tables are pulled out as text row by row, which keeps the words but not the grid structure, so complex multi-column layouts may need a little tidying afterwards. If you need to clean up the result, you can send it straight to tools like find and replace or the word counter.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is there a file size or page limit?</p>
      <p class="faq-a">There is no fixed limit, because the work is done by your own device rather than a server with quotas. In practice the ceiling is your device's memory: very large PDFs with hundreds of pages take longer and use more memory, and an extremely large file could be slow on an older phone. Most documents — reports, ebooks, contracts, research papers — extract in a few seconds. The tool shows page-by-page progress so you can see it working through a long document.</p>
    </div>

  </div>

</div>

<!-- PDF text extractor CSS -->
<style>
.pe-tool { display: flex; flex-direction: column; gap: 16px; }

/* Drop zone */
.pe-drop {
  border: 2px dashed var(--border-2);
  border-radius: var(--radius-lg);
  background: var(--bg-2);
  padding: 40px 20px;
  text-align: center;
  cursor: pointer;
  transition: border-color var(--transition), background var(--transition);
}

.pe-drop:hover, .pe-drop:focus-visible { border-color: var(--accent); background: var(--accent-light); outline: none; }
[data-theme="dark"] .pe-drop:hover, [data-theme="dark"] .pe-drop:focus-visible { background: var(--accent-dim); }
.pe-drop.pe-dragover { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .pe-drop.pe-dragover { background: var(--accent-dim); }

.pe-drop-icon { color: var(--text-3); margin-bottom: 12px; }
.pe-drop:hover .pe-drop-icon, .pe-drop.pe-dragover .pe-drop-icon { color: var(--accent); }

.pe-drop-title { font-size: 1.0625rem; font-weight: 600; color: var(--text); margin: 0 0 4px; }
.pe-drop-link { color: var(--accent); text-decoration: underline; }
.pe-drop-sub { font-size: 0.8125rem; color: var(--text-3); margin: 0; }

/* Password */
.pe-password {
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  padding: 16px;
  font-size: 0.9375rem;
  color: var(--text-2);
}

.pe-password-row { display: flex; gap: 8px; margin-top: 10px; flex-wrap: wrap; }

.pe-password-input {
  flex: 1;
  min-width: 180px;
  padding: 10px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  outline: none;
}

.pe-password-input:focus { border-color: var(--accent); }
.pe-password-err { color: var(--danger); font-size: 0.8125rem; margin: 8px 0 0; }

/* Progress */
.pe-progress {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 16px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  font-size: 0.9375rem;
  color: var(--text-2);
}

.pe-spinner {
  width: 20px;
  height: 20px;
  border: 2.5px solid var(--border-2);
  border-top-color: var(--accent);
  border-radius: 50%;
  animation: pe-spin 0.7s linear infinite;
  flex-shrink: 0;
}

@keyframes pe-spin { to { transform: rotate(360deg); } }

/* Error */
.pe-error {
  padding: 14px 16px;
  border: 1px solid var(--danger);
  border-radius: var(--radius-md);
  background: rgba(229, 62, 62, 0.08);
  color: var(--danger);
  font-size: 0.9375rem;
}

/* Result */
.pe-result {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.pe-result-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding: 10px 14px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
  flex-wrap: wrap;
}

.pe-file-info { display: flex; flex-direction: column; gap: 2px; min-width: 0; }
.pe-file-name { font-size: 0.875rem; font-weight: 600; color: var(--text); word-break: break-all; }
.pe-stats { font-size: 0.75rem; color: var(--text-3); }

.pe-actions { display: flex; gap: 14px; flex-shrink: 0; }
.pe-opt { display: flex; align-items: center; gap: 6px; font-size: 0.8125rem; color: var(--text-2); cursor: pointer; }
.pe-opt input { accent-color: var(--accent); width: 14px; height: 14px; cursor: pointer; }

.pe-output {
  width: 100%;
  min-height: 320px;
  max-height: 560px;
  padding: 14px;
  border: none;
  background: var(--bg);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.875rem;
  line-height: 1.6;
  resize: vertical;
  outline: none;
  box-sizing: border-box;
  white-space: pre-wrap;
  word-break: break-word;
}

.pe-buttons {
  display: flex;
  gap: 8px;
  padding: 12px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

@media (max-width: 560px) {
  .pe-result-bar { flex-direction: column; align-items: flex-start; }
  .pe-buttons .btn { flex: 1; justify-content: center; }
}
</style>

<!-- PDF.js (vendored, self-hosted — no external requests) -->
<script src="/assets/js/vendor/pdf.min.js"></script>

<!-- PDF text extractor JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  if (!window.pdfjsLib) {
    document.getElementById('pe-error').textContent = 'The PDF engine failed to load. Please refresh the page.';
    document.getElementById('pe-error').classList.remove('hidden');
    return;
  }
  pdfjsLib.GlobalWorkerOptions.workerSrc = '/assets/js/vendor/pdf.worker.min.js';

  var drop      = document.getElementById('pe-drop');
  var fileInput = document.getElementById('pe-file');
  var pwWrap    = document.getElementById('pe-password');
  var pwInput   = document.getElementById('pe-password-input');
  var pwBtn     = document.getElementById('pe-password-btn');
  var pwErr     = document.getElementById('pe-password-err');
  var progress  = document.getElementById('pe-progress');
  var progressText = document.getElementById('pe-progress-text');
  var errorEl   = document.getElementById('pe-error');
  var result    = document.getElementById('pe-result');
  var fileName  = document.getElementById('pe-file-name');
  var statsEl   = document.getElementById('pe-stats');
  var output    = document.getElementById('pe-output');
  var optPages  = document.getElementById('pe-opt-pages');
  var optTrim   = document.getElementById('pe-opt-trim');
  var copyBtn   = document.getElementById('pe-copy');
  var dlBtn     = document.getElementById('pe-download');
  var resetBtn  = document.getElementById('pe-reset');
  var sendWrap  = document.getElementById('pe-send-wrap');

  var currentBuffer = null;   // ArrayBuffer of the loaded file
  var currentName   = '';
  var extractedPages = [];    // [{page, text}]

  /* ── UI helpers ── */
  function show(el)  { el.classList.remove('hidden'); }
  function hide(el)  { el.classList.add('hidden'); }

  function resetUI() {
    hide(pwWrap); hide(progress); hide(errorEl); hide(result);
    sendWrap.style.display = 'none';
    pwErr.classList.add('hidden');
    pwInput.value = '';
  }

  function showError(msg) {
    hide(progress); hide(pwWrap);
    errorEl.textContent = msg;
    show(errorEl);
  }

  /* ── File intake ── */
  function handleFile(file) {
    if (!file) return;
    var isPdf = file.type === 'application/pdf' || /\.pdf$/i.test(file.name);
    if (!isPdf) { showError('That does not look like a PDF file. Please choose a .pdf document.'); return; }

    resetUI();
    currentName = file.name;
    var reader = new FileReader();
    reader.onload = function (e) {
      currentBuffer = e.target.result;
      extract(null);
    };
    reader.onerror = function () { showError('Could not read that file. Please try again.'); };
    reader.readAsArrayBuffer(file);
  }

  /* ── Extraction ── */
  function extract(password) {
    hide(errorEl); hide(result); hide(pwWrap);
    show(progress);
    progressText.textContent = 'Opening PDF…';

    /* pdf.js consumes the ArrayBuffer, so pass a fresh copy each attempt */
    var params = { data: currentBuffer.slice(0), isEvalSupported: false };
    if (password) params.password = password;

    var task = pdfjsLib.getDocument(params);

    task.promise.then(function (pdf) {
      hide(pwWrap);
      extractedPages = [];
      var total = pdf.numPages;

      function readPage(p) {
        progressText.textContent = 'Reading page ' + p + ' of ' + total + '…';
        return pdf.getPage(p).then(function (page) {
          return page.getTextContent();
        }).then(function (content) {
          var text = '';
          content.items.forEach(function (item) {
            if (typeof item.str === 'string') text += item.str;
            if (item.hasEOL) text += '\n';
          });
          extractedPages.push({ page: p, text: text });
          if (p < total) return readPage(p + 1);
        });
      }

      return readPage(1).then(function () {
        hide(progress);
        renderResult();
      });
    }).catch(function (err) {
      if (err && err.name === 'PasswordException') {
        hide(progress);
        show(pwWrap);
        /* code 2 = incorrect password on retry */
        if (err.code === 2) { pwErr.classList.remove('hidden'); }
        pwInput.focus();
      } else {
        showError('Sorry, this PDF could not be read. It may be corrupted or use an unsupported format. (' + (err && err.message ? err.message : 'unknown error') + ')');
      }
    });
  }

  /* ── Assemble output text ── */
  function buildText() {
    var withPages = optPages.checked;
    var parts = extractedPages.map(function (pg) {
      var body = pg.text;
      return withPages ? ('——— Page ' + pg.page + ' ———\n' + body) : body;
    });
    var text = parts.join(withPages ? '\n\n' : '\n');
    if (optTrim.checked) {
      text = text.replace(/[ \t]+\n/g, '\n')         // trailing spaces
                 .replace(/\n{3,}/g, '\n\n')          // collapse blank runs
                 .replace(/^\s+|\s+$/g, '');          // outer whitespace
    }
    return text;
  }

  function renderResult() {
    var text = buildText();
    output.value = text;

    var trimmed = text.trim();
    if (!trimmed) {
      showError('No selectable text was found in this PDF. It is most likely a scanned or image-only document, which needs OCR to read — this tool extracts real text only.');
      return;
    }

    var words = (trimmed.match(/\S+/g) || []).length;
    var chars = text.length;
    fileName.textContent = currentName;
    statsEl.textContent = extractedPages.length + ' page' + (extractedPages.length === 1 ? '' : 's') +
      ' · ' + words.toLocaleString() + ' words · ' + chars.toLocaleString() + ' characters';
    show(result);
    sendWrap.style.display = 'flex';
  }

  /* Re-render when options change */
  [optPages, optTrim].forEach(function (el) {
    el.addEventListener('change', function () {
      if (extractedPages.length) renderResult();
    });
  });

  /* ── Password submit ── */
  pwBtn.addEventListener('click', function () {
    var pw = pwInput.value;
    if (pw) extract(pw);
  });
  pwInput.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') { e.preventDefault(); pwBtn.click(); }
  });

  /* ── Drop zone events ── */
  drop.addEventListener('click', function () { fileInput.click(); });
  drop.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); fileInput.click(); }
  });
  fileInput.addEventListener('change', function () {
    if (fileInput.files && fileInput.files[0]) handleFile(fileInput.files[0]);
    fileInput.value = '';
  });

  ['dragenter', 'dragover'].forEach(function (ev) {
    drop.addEventListener(ev, function (e) { e.preventDefault(); drop.classList.add('pe-dragover'); });
  });
  ['dragleave', 'drop'].forEach(function (ev) {
    drop.addEventListener(ev, function (e) { e.preventDefault(); drop.classList.remove('pe-dragover'); });
  });
  drop.addEventListener('drop', function (e) {
    if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
  });

  /* ── Result actions ── */
  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    navigator.clipboard.writeText(output.value).then(function () {
      copyBtn.textContent = 'Copied!';
      setTimeout(function () { copyBtn.textContent = 'Copy text'; }, 2000);
    });
  });

  dlBtn.addEventListener('click', function () {
    if (!output.value) return;
    var blob = new Blob([output.value], { type: 'text/plain;charset=utf-8' });
    var url = URL.createObjectURL(blob);
    var a = document.createElement('a');
    a.href = url;
    a.download = (currentName.replace(/\.pdf$/i, '') || 'extracted') + '.txt';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    setTimeout(function () { URL.revokeObjectURL(url); }, 1000);
  });

  resetBtn.addEventListener('click', function () {
    currentBuffer = null;
    currentName = '';
    extractedPages = [];
    output.value = '';
    resetUI();
    drop.focus();
  });

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
