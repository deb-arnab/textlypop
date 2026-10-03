<?php
$tool_slug   = 'text-to-csv';
$tool_name   = 'Text to CSV Converter';

$page_title  = 'Text to CSV Converter — Convert a List to CSV | TextlyPop';
$meta_desc   = 'Convert text, a list, or tab, space and pipe-delimited data into properly formatted CSV. Quoting handled automatically. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/text-to-csv';
$og_title    = 'Free Text to CSV Converter — TextlyPop';
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
  "name": "Text to CSV Converter",
  "url": "https://textlypop.com/tools/text-to-csv",
  "description": "Convert tab-separated, space-separated, pipe-delimited or any text to properly formatted CSV. Handles quoting automatically.",
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
      "name": "How do I convert text to CSV?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your delimited text and pick the character that currently separates your columns — Tab, Pipe, Semicolon, Space or a custom character. The CSV output appears instantly with quoting applied wherever the data needs it, so fields containing commas survive intact. Copy the result or download it as a .csv file."
      }
    },
    {
      "@type": "Question",
      "name": "How do I convert tab-separated text to CSV?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Select Tab as the input delimiter and paste — copying any range of cells from Excel or Google Sheets puts tab-separated text on your clipboard. The invisible tabs become explicit, correctly quoted commas in one paste."
      }
    },
    {
      "@type": "Question",
      "name": "Does the tool handle commas inside field values?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — this is the part naive converters get wrong. Following RFC 4180, any field containing the separator, a double quote or a newline is wrapped in double quotes, and quotes inside a field are escaped by doubling. A value like Portland, OR stays one column instead of splitting into two."
      }
    },
    {
      "@type": "Question",
      "name": "Can I convert pipe-delimited or semicolon-delimited text to CSV?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Select Pipe for database and ERP exports, or Semicolon for files produced by European spreadsheet locales — where Excel uses semicolons because the comma is the decimal separator. Any other character can be typed into the Custom field."
      }
    },
    {
      "@type": "Question",
      "name": "Can I download the CSV output?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Download CSV saves the result as a .csv file generated entirely in your browser — the data never touches a server. The file opens directly in Excel, Google Sheets or LibreOffice and imports cleanly into databases, since the output follows RFC 4180 conventions."
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
        ['name' => 'Paste your text', 'text' => 'Paste your tab-separated, pipe-delimited, or other delimited text into the input panel on the left.'],
        ['name' => 'Choose the input delimiter', 'text' => 'Select the character that separates columns in your text — Tab, Space, Pipe, Semicolon, or a custom character.'],
        ['name' => 'Check the CSV output', 'text' => 'The properly formatted CSV appears instantly in the right panel. Fields containing commas or quotes are wrapped in double quotes automatically.'],
        ['name' => 'Copy or download', 'text' => 'Click Copy to copy the CSV to your clipboard, or click Download CSV to save a .csv file ready to open in Excel or Google Sheets.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Text to CSV converter</h1>
    <p>Convert tab-separated, pipe-delimited or any text into properly formatted CSV. Quoting handled automatically.</p>
  </div>

  <!-- Options bar -->
  <div class="tcsv-options">

    <div class="tcsv-opt-group">
      <span class="tcsv-opt-label">Input delimiter</span>
      <div class="tcsv-pills" role="group" aria-label="Input delimiter">
        <label class="tcsv-pill">
          <input type="radio" name="in-delim" value="tab" checked> Tab
        </label>
        <label class="tcsv-pill">
          <input type="radio" name="in-delim" value="comma"> Comma
        </label>
        <label class="tcsv-pill">
          <input type="radio" name="in-delim" value="space"> Space
        </label>
        <label class="tcsv-pill">
          <input type="radio" name="in-delim" value="pipe"> Pipe
        </label>
        <label class="tcsv-pill">
          <input type="radio" name="in-delim" value="semicolon"> Semicolon
        </label>
        <label class="tcsv-pill tcsv-pill-custom">
          <input type="radio" name="in-delim" value="custom"> Custom:
          <input type="text" id="custom-delim" class="tcsv-custom-input" maxlength="4" placeholder="|" aria-label="Custom delimiter character">
        </label>
      </div>
    </div>

    <div class="tcsv-opt-group">
      <span class="tcsv-opt-label">Output separator</span>
      <div class="tcsv-pills" role="group" aria-label="Output separator">
        <label class="tcsv-pill">
          <input type="radio" name="out-sep" value="comma" checked> Comma
        </label>
        <label class="tcsv-pill">
          <input type="radio" name="out-sep" value="semicolon"> Semicolon
        </label>
        <label class="tcsv-pill">
          <input type="radio" name="out-sep" value="tab"> Tab
        </label>
      </div>
    </div>

    <div class="tcsv-opt-group tcsv-checks">
      <label class="tcsv-check">
        <input type="checkbox" id="opt-trim" checked>
        <span>Trim whitespace</span>
      </label>
      <label class="tcsv-check">
        <input type="checkbox" id="opt-quote-all">
        <span>Quote all fields</span>
      </label>
      <label class="tcsv-check">
        <input type="checkbox" id="opt-skip-empty" checked>
        <span>Skip empty lines</span>
      </label>
    </div>

  </div>

  <!-- Workspace -->
  <div class="tool-workspace">
    <div class="tool-workspace-inner">

      <div class="workspace-panel">
        <div class="panel-label">
          <span class="panel-label-text">Input text</span>
          <span class="tcsv-stat" id="tcsv-stat-in">0 rows</span>
        </div>
        <textarea
          id="tcsv-input"
          class="tcsv-textarea"
          data-save-key="text-to-csv"
          placeholder="Paste your tab-separated, pipe-delimited or other text here…"
          spellcheck="false"
          aria-label="Text to convert to CSV"></textarea>
      </div>

      <div class="workspace-panel">
        <div class="panel-label">
          <span class="panel-label-text">CSV output</span>
          <button class="btn btn-copy" data-target="tcsv-output">Copy</button>
        </div>
        <textarea
          id="tcsv-output"
          class="tcsv-textarea tcsv-output"
          readonly
          placeholder="CSV output will appear here…"
          aria-label="CSV output"
          aria-live="polite"></textarea>
      </div>

    </div>
  </div>

  <!-- Toolbar -->
  <div class="tcsv-toolbar">
    <div class="tcsv-toolbar-left">
      <button class="btn btn-ghost" id="tcsv-clear-btn">Clear</button>
      <button class="btn btn-ghost" id="tcsv-download-btn" disabled>Download CSV</button>
    </div>
    <span class="tcsv-dims" id="tcsv-dims"></span>
  </div>

  <!-- Send to -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="tcsv-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="tcsv-output" data-to-tool="duplicate-line-remover">Remove duplicates</button>
    <button class="send-to-btn" data-from="tcsv-output" data-to-tool="text-line-sorter">Sort lines</button>
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

    <h2>The history of the CSV format</h2>
    <p>Comma-separated values are older than almost everything else in computing still in daily use — IBM's Fortran compiler supported comma-delimited input in 1972, back when data arrived on punched cards. Remarkably, the format ran for over three decades on convention alone: RFC 4180, the document that finally standardized CSV's quoting rules, was not published until 2005. That informality is both CSV's weakness (every application had its own dialect) and its strength — it is plain text, readable by humans and every program ever written, which is why it remains the lingua franca of data exchange half a century on.</p>

    <h2>Converting a list or a TXT file to CSV</h2>
    <p>Most of what people call converting a list to CSV is one of two jobs, and they need different handling. If every item belongs in its own row as a single column — a list of emails, SKUs or names, one per line — paste it as is and the output is a valid single-column CSV, with any value containing a comma quoted automatically so it does not split. If each line already holds several fields separated by tabs, spaces or pipes, set the input delimiter to match and each line becomes a proper multi-column row.</p>
    <p>A TXT file converts the same way: open it, copy the contents, paste them in. The file extension carries no formatting of its own, so what matters is only how the values inside are separated. Two habits save trouble afterwards — keep the header row at the top so the columns are labelled when the file is opened in a spreadsheet, and check any line that looks short in the output, since a missing delimiter is the usual reason a row lands with fewer fields than its neighbours.</p>
    <p>For the closely related jobs, <a href="/tools/comma-separator">comma separator</a> produces one delimited line rather than a table of rows, and <a href="/tools/list-to-comma">line break to comma</a> is the fastest route when you simply want a column joined into a single comma-separated string. Running <a href="/tools/duplicate-line-remover">duplicate line remover</a> first is worth the extra step when the list was assembled from several sources.</p>

    <h2>Why delimiters differ between systems</h2>
    <p>Not all "CSV" actually uses commas. Spreadsheets copy cells to the clipboard as tab-separated text. Many database and ERP exports use the pipe character (<code>|</code>) precisely because real-world data is full of commas. And in much of Europe, Excel saves "CSV" with semicolons — because those locales use the comma as the decimal separator in numbers, so 3,14 would otherwise split into two fields. This converter accepts all of these as input (plus any custom character) and produces standard comma-separated output with correct quoting.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert text to CSV?</p>
      <p class="faq-a">Paste your delimited text into the input panel and pick the character that currently separates your columns — Tab, Pipe, Semicolon, Space or a custom character. The CSV output appears instantly with quoting applied wherever the data needs it, so fields containing commas survive intact. Copy the result to the clipboard or click Download CSV to save a file that opens directly in any spreadsheet application.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I convert tab-separated text to CSV?</p>
      <p class="faq-a">Select Tab as the input delimiter and paste — that covers the single most common case, because copying any range of cells from Excel or Google Sheets puts tab-separated text on your clipboard. The tab characters are invisible, which is why pasted spreadsheet data looks vaguely aligned but breaks when fed to tools expecting commas. One paste here and the invisible tabs become explicit, correctly quoted commas.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the tool handle commas inside field values?</p>
      <p class="faq-a">Yes — this is the part naive converters get wrong. Following RFC 4180, any field containing the separator, a double quote or a newline is wrapped in double quotes, and quote characters inside a field are escaped by doubling them ("Widget ""Pro""" for a field containing quotes). A value like <code>Portland, OR</code> therefore stays one column instead of splitting into two. Enable Quote all fields if a legacy system on the receiving end insists on quotes around everything.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I convert pipe-delimited or semicolon-delimited text to CSV?</p>
      <p class="faq-a">Yes. Select Pipe for the <code>|</code>-separated exports common from databases and ERP systems, or Semicolon for files produced by European spreadsheet locales, and the tool splits on that character and reassembles standard CSV. For anything unusual — a caret, a tilde, a fixed unusual character from a legacy feed — type it into the Custom field and the conversion works the same way.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I download the CSV output?</p>
      <p class="faq-a">Yes. Download CSV saves the result as a .csv file generated entirely in your browser — the data never touches a server. The file opens directly in Excel, Google Sheets, LibreOffice Calc or Numbers, and imports cleanly into databases and analytics tools, since the output follows the RFC 4180 conventions those programs expect. For quick pastes into an email or script, the Copy button grabs the same output without creating a file.</p>
    </div>

  </div>

</div>

<style>
/* ── Options bar ──────────────────────────────────────────── */
.tcsv-options {
  display: flex;
  flex-wrap: wrap;
  gap: 16px 24px;
  padding: 14px 16px;
  background: var(--bg-2);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  margin-bottom: 12px;
}

.tcsv-opt-group {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
}

.tcsv-opt-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

/* Pill radio buttons */
.tcsv-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 4px;
}

.tcsv-pill {
  display: flex;
  align-items: center;
  gap: 4px;
  padding: 4px 10px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  font-size: 0.8125rem;
  cursor: pointer;
  background: var(--bg);
  color: var(--text-2);
  transition: background var(--transition), border-color var(--transition), color var(--transition);
  user-select: none;
}

.tcsv-pill input[type="radio"] { display: none; }

.tcsv-pill:has(input:checked) {
  background: var(--accent);
  border-color: var(--accent);
  color: #fff;
}

.tcsv-pill-custom { gap: 6px; }

.tcsv-custom-input {
  width: 46px;
  padding: 2px 6px;
  border: 1px solid rgba(255,255,255,0.4);
  border-radius: 4px;
  background: rgba(255,255,255,0.15);
  color: inherit;
  font-size: 0.8125rem;
  font-family: var(--font-mono);
  outline: none;
}

.tcsv-pill:not(:has(input:checked)) .tcsv-custom-input {
  border-color: var(--border-2);
  background: var(--bg-2);
  color: var(--text);
}

/* Checkboxes */
.tcsv-checks { gap: 12px; }

.tcsv-check {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.8125rem;
  color: var(--text-2);
  cursor: pointer;
  user-select: none;
}

.tcsv-check input[type="checkbox"] {
  width: 15px;
  height: 15px;
  accent-color: var(--accent);
  cursor: pointer;
}

/* ── Textareas ────────────────────────────────────────────── */
.tcsv-textarea {
  flex: 1;
  width: 100%;
  padding: 12px 14px;
  border: none;
  resize: none;
  background: var(--bg);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.875rem;
  line-height: 1.6;
  outline: none;
  min-height: 280px;
}

.tcsv-output { color: var(--text-2); }

/* ── Stats in panel labels ────────────────────────────────── */
.tcsv-stat {
  font-size: 0.75rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
}

/* ── Toolbar ──────────────────────────────────────────────── */
.tcsv-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: -12px;
  margin-bottom: 8px;
}

.tcsv-toolbar-left { display: flex; gap: 8px; }

.tcsv-dims {
  font-size: 0.8125rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
}

/* ── Mobile ───────────────────────────────────────────────── */
@media (max-width: 600px) {
  .tcsv-options { flex-direction: column; }
  .tcsv-opt-group { flex-direction: column; align-items: flex-start; }
  .tcsv-toolbar { flex-direction: column; align-items: flex-start; }
}
</style>

<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  /* ── Refs ── */
  var inputTA   = document.getElementById('tcsv-input');
  var outputTA  = document.getElementById('tcsv-output');
  var statIn    = document.getElementById('tcsv-stat-in');
  var dimSpan   = document.getElementById('tcsv-dims');
  var dlBtn     = document.getElementById('tcsv-download-btn');
  var clearBtn  = document.getElementById('tcsv-clear-btn');

  /* ── Encode one CSV field (RFC 4180) ── */
  function encodeField(value, sep, quoteAll) {
    var needs = quoteAll ||
      value.indexOf(sep)  !== -1 ||
      value.indexOf('"')  !== -1 ||
      value.indexOf('\n') !== -1 ||
      value.indexOf('\r') !== -1;
    if (needs) return '"' + value.replace(/"/g, '""') + '"';
    return value;
  }

  /* ── Resolve input delimiter ── */
  function getInDelim() {
    var checked = document.querySelector('input[name="in-delim"]:checked');
    var val = checked ? checked.value : 'tab';
    if (val === 'tab')       return '\t';
    if (val === 'comma')     return ',';
    if (val === 'space')     return ' ';
    if (val === 'pipe')      return '|';
    if (val === 'semicolon') return ';';
    if (val === 'custom') {
      var cv = document.getElementById('custom-delim').value;
      return cv.length ? cv[0] : '\t';
    }
    return '\t';
  }

  /* ── Resolve output separator ── */
  function getOutSep() {
    var checked = document.querySelector('input[name="out-sep"]:checked');
    var val = checked ? checked.value : 'comma';
    if (val === 'semicolon') return ';';
    if (val === 'tab')       return '\t';
    return ',';
  }

  /* ── Main conversion ── */
  function convert() {
    var raw       = inputTA.value;
    var trim      = document.getElementById('opt-trim').checked;
    var quoteAll  = document.getElementById('opt-quote-all').checked;
    var skipEmpty = document.getElementById('opt-skip-empty').checked;
    var inDelim   = getInDelim();
    var outSep    = getOutSep();

    var lines = raw.split('\n');
    var maxCols = 0;
    var rows = [];

    for (var i = 0; i < lines.length; i++) {
      var line = lines[i];
      if (inDelim === ' ') {
        /* space mode: split on any run of spaces */
        var trimmed = trim ? line.trim() : line;
        if (skipEmpty && trimmed === '') continue;
        var fields = trimmed === '' ? [''] : trimmed.split(/\s+/);
        rows.push(fields);
        if (fields.length > maxCols) maxCols = fields.length;
      } else {
        var parts = line.split(inDelim);
        if (trim) parts = parts.map(function (f) { return f.trim(); });
        if (skipEmpty && parts.every(function (f) { return f === ''; })) continue;
        rows.push(parts);
        if (parts.length > maxCols) maxCols = parts.length;
      }
    }

    /* Update input stat */
    statIn.textContent = rows.length + (rows.length === 1 ? ' row' : ' rows');

    if (rows.length === 0) {
      outputTA.value = '';
      dimSpan.textContent = '';
      dlBtn.disabled = true;
      return;
    }

    /* Build CSV */
    var csv = rows.map(function (fields) {
      return fields.map(function (f) {
        return encodeField(f, outSep, quoteAll);
      }).join(outSep);
    }).join('\n');

    outputTA.value = csv;
    dimSpan.textContent = rows.length + ' rows × ' + maxCols + ' columns';
    dlBtn.disabled = false;
  }

  /* ── Download ── */
  dlBtn.addEventListener('click', function () {
    var csv = outputTA.value;
    if (!csv) return;
    var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    var url  = URL.createObjectURL(blob);
    var a    = document.createElement('a');
    a.href     = url;
    a.download = 'output.csv';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
  });

  /* ── Clear ── */
  clearBtn.addEventListener('click', function () {
    inputTA.value  = '';
    outputTA.value = '';
    statIn.textContent  = '0 rows';
    dimSpan.textContent = '';
    dlBtn.disabled = true;
  });

  /* ── Selecting custom delimiter auto-focuses the text input ── */
  document.querySelectorAll('input[name="in-delim"]').forEach(function (radio) {
    radio.addEventListener('change', function () {
      if (radio.value === 'custom') {
        document.getElementById('custom-delim').focus();
      }
      convert();
    });
  });

  document.getElementById('custom-delim').addEventListener('input', function () {
    var customRadio = document.querySelector('input[name="in-delim"][value="custom"]');
    if (customRadio) customRadio.checked = true;
    convert();
  });

  document.querySelectorAll('input[name="out-sep"]').forEach(function (r) {
    r.addEventListener('change', convert);
  });

  ['opt-trim', 'opt-quote-all', 'opt-skip-empty'].forEach(function (id) {
    document.getElementById(id).addEventListener('change', convert);
  });

  inputTA.addEventListener('input', convert);

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
