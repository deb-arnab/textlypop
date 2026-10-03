<?php
$tool_slug   = 'qr-code-generator';
$tool_name   = 'QR Code Generator';

$page_title  = 'QR Code Generator — Create QR Codes Free Online | TextlyPop';
$meta_desc   = 'Free QR code generator. Create QR codes for URLs, text, email, phone, Wi-Fi and more. Instant preview. Download as PNG. No signup required.';
$canonical_url = 'https://textlypop.com/tools/qr-code-generator';
$og_title    = 'Free QR Code Generator — TextlyPop';
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
  "name": "QR Code Generator",
  "url": "https://textlypop.com/tools/qr-code-generator",
  "description": "Free QR code generator. Create QR codes for URLs, text, email, phone, Wi-Fi and more. Instant preview. Download as PNG.",
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
      "name": "How do I create a QR code online for free?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Type or paste the content you want to encode — a URL, plain text, email address or phone number — into the input box. The QR code preview updates instantly as you type, with no signup required. Scan the preview with your phone camera to verify it opens the right destination, then click Download PNG to save a high-resolution image ready for print materials, websites, presentations or documents."
      }
    },
    {
      "@type": "Question",
      "name": "What can I encode in a QR code?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Any text up to 2,953 characters. Website URLs are the most common, but you can also encode email addresses using mailto:, phone numbers using tel:, pre-filled SMS messages using sms:, Wi-Fi network credentials using the WIFI: format, and complete vCard contact details. Modern smartphones recognise all of these formats automatically when scanning — a Wi-Fi code offers to join the network, a tel: code offers to dial."
      }
    },
    {
      "@type": "Question",
      "name": "Which error correction level should I use?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Error correction determines how much of the code can be damaged while remaining scannable: Low recovers about 7%, Medium 15%, Quarter 25% and High 30%. Medium (M) is right for most uses. Choose High (H) for anything printed on surfaces that might get scratched, dirty or partially covered — packaging, stickers, outdoor signage — or when overlaying a logo on the centre of the code. Low (L) produces the smallest pattern but tolerates almost no damage."
      }
    },
    {
      "@type": "Question",
      "name": "What size should my QR code be for print?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Keep printed QR codes at least 2cm × 2cm (about 0.8 inches) for reliable scanning at arm's length — business cards typically use 2–3cm, while posters scanned from across a room need 5–10cm or more. A useful rule of thumb is a scanning distance to size ratio of about 10:1, and always leave a white quiet zone around the code. The downloaded PNG is high-resolution and prints crisply at any of these sizes."
      }
    },
    {
      "@type": "Question",
      "name": "Do QR codes expire?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The QR codes generated here are static: your text or URL is encoded directly into the pattern, so they never expire and keep working as long as the destination exists. Paid services often create dynamic QR codes that redirect through their servers and stop working when a subscription ends — static codes have no such dependency, though the content cannot be changed after printing."
      }
    },
    {
      "@type": "Question",
      "name": "Can I scan a QR code without a special app?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Every recent iPhone and Android phone scans QR codes directly from the built-in camera app — point the camera at the code and a notification appears with the link or action. iOS has supported this natively since iOS 11 (2017) and most Android phones since Android 9. Separate scanner apps are only needed on very old devices."
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
        ['name' => 'Enter your content', 'text' => 'Type or paste the URL, text, email or phone number you want to encode into the input box. The QR code preview updates instantly.'],
        ['name' => 'Choose error correction', 'text' => 'Select an error correction level. Medium (M) is the best choice for most uses. Use High (H) for print materials that may get damaged.'],
        ['name' => 'Preview the QR code', 'text' => 'The QR code appears in the preview area. Scan it with your phone camera to verify it works correctly before downloading.'],
        ['name' => 'Download as PNG', 'text' => 'Click Download PNG to save a high-resolution QR code image ready to use in documents, presentations, print materials, or websites.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>QR code generator</h1>
    <p>Create a QR code for any URL, text, email, or phone number. Instant preview — download as PNG.</p>
  </div>

  <div class="qr-tool">

    <!-- Input -->
    <div class="qr-input-section">
      <label class="qr-label" for="qr-input">Text or URL to encode</label>
      <textarea
        id="qr-input"
        class="qr-textarea"
        data-save-key="qr-code-generator"
        placeholder="https://example.com"
        spellcheck="false"
        maxlength="2953"
        aria-label="Text or URL to encode as QR code"
        rows="3"></textarea>
      <div class="qr-input-footer">
        <span id="qr-char-count" class="qr-char-count">0 / 2953 characters</span>
        <span id="qr-version-badge" class="qr-version-badge"></span>
      </div>
    </div>

    <!-- Quick-fill templates -->
    <div class="qr-templates">
      <span class="qr-templates-label">Quick fill:</span>
      <button class="qr-tpl-btn" data-tpl="url">URL</button>
      <button class="qr-tpl-btn" data-tpl="email">Email</button>
      <button class="qr-tpl-btn" data-tpl="phone">Phone</button>
      <button class="qr-tpl-btn" data-tpl="sms">SMS</button>
      <button class="qr-tpl-btn" data-tpl="wifi">Wi-Fi</button>
    </div>

    <!-- Options -->
    <div class="qr-options">

      <div class="qr-opt-group">
        <span class="qr-opt-label">Error correction</span>
        <div class="qr-pills" role="group" aria-label="Error correction level">
          <label class="qr-pill" title="7% damage recovery — smallest QR code">
            <input type="radio" name="qr-ec" value="L"> L — Low
          </label>
          <label class="qr-pill" title="15% damage recovery — recommended">
            <input type="radio" name="qr-ec" value="M" checked> M — Medium
          </label>
          <label class="qr-pill" title="25% damage recovery">
            <input type="radio" name="qr-ec" value="Q"> Q — Quarter
          </label>
          <label class="qr-pill" title="30% damage recovery — best for print">
            <input type="radio" name="qr-ec" value="H"> H — High
          </label>
        </div>
      </div>

    </div>

    <!-- Preview + Download -->
    <div class="qr-output-section">
      <div class="qr-preview-wrap" id="qr-preview-wrap" aria-label="QR code preview" aria-live="polite">
        <div class="qr-placeholder" id="qr-placeholder">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" aria-hidden="true">
            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
            <rect x="3" y="14" width="7" height="7"/>
            <rect x="5" y="5" width="3" height="3"/><rect x="16" y="5" width="3" height="3"/>
            <rect x="5" y="16" width="3" height="3"/>
            <line x1="14" y1="14" x2="14" y2="14"/><line x1="17" y1="14" x2="17" y2="14"/>
            <line x1="20" y1="14" x2="20" y2="14"/><line x1="14" y1="17" x2="14" y2="17"/>
            <line x1="17" y1="17" x2="20" y2="20"/>
          </svg>
          <span>Enter text above to generate QR code</span>
        </div>
        <div id="qr-svg-output" style="display:none"></div>
      </div>

      <div class="qr-actions">
        <button class="btn btn-primary" id="qr-download-btn" disabled>Download PNG</button>
        <button class="btn btn-ghost" id="qr-copy-btn" disabled>Copy image</button>
        <button class="btn btn-ghost" id="qr-clear-btn">Clear</button>
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

    <h2>About QR codes</h2>
    <p>A QR code (short for Quick Response code) is a two-dimensional barcode that stores text in a grid of black and white squares. Unlike a traditional barcode, which holds a dozen or so digits and must be scanned horizontally, a QR code stores up to 2,953 bytes of data — enough for a long URL, full contact details or even a short message — and can be read from any angle. Three large squares in the corners tell the scanner how the code is oriented, and built-in Reed–Solomon error correction lets a code stay readable even when part of it is scratched, smudged or covered by a logo.</p>

    <h2>The history of the QR code</h2>
    <p>The QR code was invented in 1994 by engineer Masahiro Hara at Denso Wave, a Japanese subsidiary of Toyota. His team needed a way to track car parts through manufacturing faster than conventional barcodes allowed, and reportedly took inspiration for the square grid from the board game Go. Denso Wave chose not to enforce its patent, which allowed the format to spread freely. Adoption exploded with the smartphone era — once phone cameras could scan codes natively, QR codes became the standard bridge between the physical and digital worlds, from restaurant menus and boarding passes to contactless payments used by billions of people.</p>

    <h2>What QR codes are used for today</h2>
    <p>The most common use is linking printed material to a website — posters, packaging, business cards and receipts. Beyond URLs, QR codes routinely carry Wi-Fi credentials so guests can join a network without typing a password, vCard contact details that add a person straight to the phone book, payment information for apps like Alipay, WeChat Pay and UPI, event tickets and boarding passes, and product traceability data in factories and supply chains — the job they were originally invented for.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I create a QR code online for free?</p>
      <p class="faq-a">Type or paste the content you want to encode — a URL, plain text, email address or phone number — into the input box above. The QR code preview updates instantly as you type; there is no generate button to press and no signup. Scan the preview with your phone camera to verify it opens the right destination, then click Download PNG to save a high-resolution image ready for print materials, websites, presentations or documents.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What can I encode in a QR code?</p>
      <p class="faq-a">Any text up to 2,953 characters. Website URLs are the most common, but you can also encode email addresses using the <code>mailto:</code> format, phone numbers using <code>tel:</code>, pre-filled SMS messages using <code>sms:</code>, Wi-Fi network credentials using the <code>WIFI:</code> format, and complete vCard contact details. Modern smartphones recognise all of these formats automatically when scanning — a Wi-Fi code offers to join the network, a tel: code offers to dial. The Quick fill buttons above the options insert a ready-made template for each type.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Which error correction level should I use?</p>
      <p class="faq-a">Error correction determines how much of the code can be damaged while remaining scannable: Low recovers about 7%, Medium 15%, Quarter 25% and High 30%. Medium (M) is the right choice for most uses because it balances resilience against code density. Choose High (H) for anything printed on surfaces that might get scratched, dirty or partially covered — product packaging, stickers, outdoor signage — or when you plan to overlay a logo on the centre of the code. Low (L) produces the smallest, least dense pattern but tolerates almost no damage, so reserve it for clean digital displays.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What size should my QR code be for print?</p>
      <p class="faq-a">Keep printed QR codes at least 2cm × 2cm (about 0.8 inches) for reliable scanning at arm's length — business cards typically use 2–3cm, while posters scanned from across a room need 5–10cm or more. A useful rule of thumb is a scanning distance to size ratio of about 10:1, so a code scanned from 1 metre away should be roughly 10cm wide. Also leave a white margin (the quiet zone) around the code. The Download PNG button produces a high-resolution image at 10 pixels per module, crisp enough to print at any of these sizes.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Do QR codes expire?</p>
      <p class="faq-a">The QR codes generated here are static: your text or URL is encoded directly into the pattern, so they never expire and keep working as long as the destination exists. Paid services often create dynamic QR codes that redirect through their own servers — those stop working when the subscription ends. Static codes have no such dependency, though the encoded content cannot be changed after printing, so double-check URLs before you download.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I scan a QR code without a special app?</p>
      <p class="faq-a">Yes. Every recent iPhone and Android phone scans QR codes directly from the built-in camera app — point the camera at the code and a notification appears with the link or action. iOS has supported this natively since iOS 11 (2017) and most Android phones since Android 9. Separate scanner apps are only needed on very old devices, and desktop users can scan codes with the camera in Google Lens or paste an image into an online decoder.</p>
    </div>

  </div>

</div>

<style>
/* ── QR tool wrapper ──────────────────────────────────────── */
.qr-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
  margin-bottom: 24px;
}

/* ── Input section ────────────────────────────────────────── */
.qr-input-section {
  padding: 16px 16px 0;
}

.qr-label {
  display: block;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  margin-bottom: 6px;
}

.qr-textarea {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.9rem;
  line-height: 1.5;
  resize: vertical;
  outline: none;
  transition: border-color var(--transition);
}

.qr-textarea:focus { border-color: var(--accent); }
.qr-textarea::placeholder { color: var(--text-3); font-family: var(--font); }

.qr-input-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 6px 2px 12px;
}

.qr-char-count {
  font-size: 0.75rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
}

.qr-version-badge {
  font-size: 0.75rem;
  color: var(--accent);
  font-weight: 600;
}

/* ── Quick-fill templates ─────────────────────────────────── */
.qr-templates {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 6px;
  padding: 0 16px 14px;
  border-bottom: 1px solid var(--border);
}

.qr-templates-label {
  font-size: 0.75rem;
  color: var(--text-3);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
}

.qr-tpl-btn {
  padding: 3px 10px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text-2);
  font-size: 0.8rem;
  cursor: pointer;
  transition: background var(--transition), border-color var(--transition), color var(--transition);
  font-family: var(--font);
}

.qr-tpl-btn:hover {
  background: var(--accent-light);
  border-color: var(--accent);
  color: var(--accent);
}

/* ── Options ──────────────────────────────────────────────── */
.qr-options {
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  display: flex;
  flex-wrap: wrap;
  gap: 12px 24px;
  align-items: center;
}

.qr-opt-group {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
}

.qr-opt-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

.qr-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 4px;
}

.qr-pill {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 4px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  font-size: 0.8125rem;
  cursor: pointer;
  background: var(--bg);
  color: var(--text-2);
  transition: background var(--transition), border-color var(--transition), color var(--transition);
  user-select: none;
}

.qr-pill input[type="radio"] { display: none; }

.qr-pill:has(input:checked) {
  background: var(--accent);
  border-color: var(--accent);
  color: #fff;
}

/* ── Preview area ─────────────────────────────────────────── */
.qr-output-section {
  padding: 24px 16px 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
}

.qr-preview-wrap {
  display: flex;
  align-items: center;
  justify-content: center;
  background: #ffffff;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  padding: 20px;
  min-height: 280px;
  min-width: 280px;
}

.qr-placeholder {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 12px;
  color: var(--text-3);
  font-size: 0.875rem;
  text-align: center;
  max-width: 200px;
}

#qr-svg-output svg {
  display: block;
  width: 240px;
  height: 240px;
}

/* ── Action buttons ───────────────────────────────────────── */
.qr-actions {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  justify-content: center;
}

/* ── Mobile ───────────────────────────────────────────────── */
@media (max-width: 480px) {
  .qr-options { flex-direction: column; align-items: flex-start; }
  .qr-preview-wrap { min-width: 240px; }
  #qr-svg-output svg { width: 200px; height: 200px; }
}
</style>

<!-- QR code library (MIT, Kazuhiko Arase) -->
<script src="/assets/js/vendor/qrcode.min.js"></script>

<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var inputTA   = document.getElementById('qr-input');
  var svgOut    = document.getElementById('qr-svg-output');
  var placeholder = document.getElementById('qr-placeholder');
  var dlBtn     = document.getElementById('qr-download-btn');
  var copyBtn   = document.getElementById('qr-copy-btn');
  var clearBtn  = document.getElementById('qr-clear-btn');
  var charCount = document.getElementById('qr-char-count');
  var vBadge    = document.getElementById('qr-version-badge');

  var dataUrl = null;
  var timer   = null;

  /* ── Templates ── */
  var TEMPLATES = {
    url:   'https://',
    email: 'mailto:you@example.com',
    phone: 'tel:+1234567890',
    sms:   'sms:+1234567890?body=Hello',
    wifi:  'WIFI:T:WPA;S:NetworkName;P:Password;;'
  };

  document.querySelectorAll('.qr-tpl-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      inputTA.value = TEMPLATES[btn.dataset.tpl] || '';
      inputTA.focus();
      inputTA.setSelectionRange(inputTA.value.length, inputTA.value.length);
      generate();
    });
  });

  /* ── Generate ── */
  function generate() {
    var text = inputTA.value;
    var ec   = document.querySelector('input[name="qr-ec"]:checked').value;
    var len  = text.length;

    charCount.textContent = len + ' / 2953 characters';
    charCount.style.color = len > 2500 ? 'var(--danger)' : '';

    if (!text.trim()) {
      svgOut.style.display    = 'none';
      placeholder.style.display = '';
      placeholder.textContent = 'Enter text above to generate QR code';
      dlBtn.disabled  = true;
      copyBtn.disabled = true;
      vBadge.textContent = '';
      dataUrl = null;
      return;
    }

    try {
      var qr = qrcode(0, ec);
      qr.addData(text);
      qr.make();

      var moduleCount = qr.getModuleCount();
      var version = (moduleCount - 17) / 4;
      vBadge.textContent = 'Version ' + version;

      /* SVG preview — scalable, no fixed size */
      var svgStr = qr.createSvgTag({ cellSize: 4, margin: 4, scalable: true });
      svgOut.innerHTML = svgStr;
      svgOut.style.display = '';
      placeholder.style.display = 'none';

      /* High-res PNG data URL for download */
      dataUrl = qr.createDataURL(10, 40); /* 10px/cell, 40px margin */

      dlBtn.disabled  = false;
      copyBtn.disabled = false;
    } catch (err) {
      svgOut.style.display = 'none';
      placeholder.style.display = '';
      placeholder.textContent = 'Text too long for a QR code at this error correction level. Try Low (L) or shorten the text.';
      vBadge.textContent = '';
      dlBtn.disabled  = true;
      copyBtn.disabled = true;
      dataUrl = null;
    }
  }

  function schedule() {
    clearTimeout(timer);
    timer = setTimeout(generate, 280);
  }

  /* ── Download ── */
  dlBtn.addEventListener('click', function () {
    if (!dataUrl) return;
    var a = document.createElement('a');
    a.href     = dataUrl;
    a.download = 'qr-code.png';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  });

  /* ── Copy image ── */
  copyBtn.addEventListener('click', function () {
    if (!dataUrl) return;
    var btn = copyBtn;

    /* Convert data URL → Blob → ClipboardItem */
    fetch(dataUrl)
      .then(function (r) { return r.blob(); })
      .then(function (blob) {
        return navigator.clipboard.write([new ClipboardItem({ 'image/png': blob })]);
      })
      .then(function () {
        btn.textContent = 'Copied!';
        setTimeout(function () { btn.textContent = 'Copy image'; }, 2000);
      })
      .catch(function () {
        /* Fallback: open PNG in new tab so user can right-click save */
        var w = window.open();
        if (w) {
          w.document.write('<title>QR Code</title><img src="' + dataUrl + '" style="max-width:100%">');
        }
      });
  });

  /* ── Clear ── */
  clearBtn.addEventListener('click', function () {
    inputTA.value = '';
    generate();
    inputTA.focus();
  });

  /* ── Option changes ── */
  inputTA.addEventListener('input', schedule);
  document.querySelectorAll('input[name="qr-ec"]').forEach(function (r) {
    r.addEventListener('change', generate);
  });

  /* Initial render (handles auto-save restore) */
  generate();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
