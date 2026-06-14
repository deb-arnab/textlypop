<?php
$tool_slug   = 'text-to-csv';
$tool_name   = 'Text to CSV Converter';

$page_title  = 'Text to CSV Converter — Convert Text to CSV Online Free | TextlyPop';
$meta_desc   = 'Convert tab-separated, space-separated, pipe-delimited or any text to properly formatted CSV. Handles quoting automatically. Free online text to CSV converter.';
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
        "text": "Paste your text into the input panel, choose the delimiter that currently separates your columns (tab, space, pipe, semicolon or custom), and the CSV output appears instantly. The tool handles quoting automatically — any field that contains a comma, double quote or newline is wrapped in double quotes per the CSV standard."
      }
    },
    {
      "@type": "Question",
      "name": "How do I convert tab-separated text to CSV?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Select Tab as the input delimiter and Comma as the output delimiter. Paste your tab-separated text and the CSV result appears immediately. This is the most common conversion — data pasted from Excel or Google Sheets is tab-separated by default."
      }
    },
    {
      "@type": "Question",
      "name": "Does the tool handle commas inside field values?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The tool follows RFC 4180 — the CSV standard. Any field that contains a comma, a double quote character, or a newline is automatically wrapped in double quotes. Double quote characters inside a field are escaped by doubling them."
      }
    },
    {
      "@type": "Question",
      "name": "Can I convert pipe-delimited or semicolon-delimited text to CSV?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Select Pipe or Semicolon as the input delimiter. The tool splits each row on that character and reassembles it in CSV format. You can also type any custom delimiter character in the Custom field."
      }
    },
    {
      "@type": "Question",
      "name": "Can I download the CSV output?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Click the Download CSV button to save the result as a .csv file ready to open in Excel, Google Sheets, or any spreadsheet application."
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

    <h2>How to convert text to CSV</h2>
    <p>Paste your delimited text into the input panel and choose the character that separates your columns — Tab is the most common (Excel and Google Sheets copy data as tab-separated by default). The CSV output appears instantly in the right panel with fields properly quoted wherever needed. Click Copy or Download CSV to use the result in your spreadsheet, database, or wherever CSV is expected.</p>

    <h2>Converting tab-separated text to CSV</h2>
    <p>Tab-separated values (TSV) are what you get when you copy a range of cells from Excel or Google Sheets and paste into a text editor. The columns are separated by tab characters that are invisible but present. Select Tab as the input delimiter and Comma as the output separator to produce standard CSV. If any cell contained a comma the tool will automatically wrap it in double quotes so the column structure is preserved correctly.</p>

    <h2>Pipe and semicolon delimited data</h2>
    <p>Many data exports from databases, ERP systems, and legacy applications use pipe (<code>|</code>) or semicolon (<code>;</code>) as the delimiter instead of a tab or comma — often because the data itself contains commas. Select Pipe or Semicolon as the input delimiter to split on that character. If none of the presets match your file you can type any custom delimiter character into the Custom field.</p>

    <h2>How CSV quoting works</h2>
    <p>The CSV standard (RFC 4180) requires that a field be wrapped in double quotes if it contains the output separator, a double quote character, or a newline. This tool applies those rules automatically. If a field contains double quotes they are escaped by doubling them — <code>"</code> becomes <code>""</code> inside a quoted field. Enable Quote all fields to wrap every field in double quotes regardless, which some legacy systems require.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert text to CSV?</p>
      <p class="faq-a">Paste your delimited text, choose the input delimiter (Tab, Pipe, Semicolon, Space or Custom), and the CSV appears instantly. Copy or download the result.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I convert tab-separated text to CSV?</p>
      <p class="faq-a">Select Tab as the input delimiter. Data copied from Excel or Google Sheets is tab-separated by default — paste it in and the CSV is ready immediately.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the tool handle commas inside field values?</p>
      <p class="faq-a">Yes. Fields containing the separator, double quotes, or newlines are automatically wrapped in double quotes per the RFC 4180 CSV standard. Double quotes inside a field are escaped as "".</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I convert pipe-delimited or semicolon-delimited text to CSV?</p>
      <p class="faq-a">Yes. Select Pipe or Semicolon as the input delimiter, or type any character into the Custom field. The tool splits columns on that character and outputs standard CSV.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I download the CSV output?</p>
      <p class="faq-a">Yes. Click Download CSV to save a .csv file ready to open in Excel, Google Sheets, LibreOffice Calc or any other spreadsheet application.</p>
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
