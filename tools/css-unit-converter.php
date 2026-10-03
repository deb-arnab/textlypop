<?php
$tool_slug   = 'css-unit-converter';
$tool_name   = 'CSS Unit Converter';

$page_title  = 'CSS Unit Converter — px, rem, em, pt & Percent | TextlyPop';
$meta_desc   = 'Convert between CSS units — px, rem, em, pt and percent — with a configurable root font size. Includes a px-to-rem reference table. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/css-unit-converter';
$og_title    = 'Free CSS Unit Converter — px, rem, em, pt — TextlyPop';
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
  "name": "CSS Unit Converter",
  "url": "https://textlypop.com/tools/css-unit-converter",
  "description": "Convert between CSS units — px, rem, em, pt and percent — with a configurable root font size and a px-to-rem reference table.",
  "applicationCategory": "DeveloperApplication",
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
      "name": "What is the difference between px, rem and em?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A px (pixel) is an absolute unit — 16px is always 16px regardless of any other setting. A rem is relative to the root font size, the font size set on the html element, which is 16px by default in every browser, so 1rem equals 16px unless you change the root. An em is also relative, but to the font size of the current element or its parent rather than the root, so its real value depends on where it sits in the document. In short, px is fixed, rem scales from one global setting, and em scales from its local context."
      }
    },
    {
      "@type": "Question",
      "name": "How do I convert px to rem?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Divide the pixel value by the root font size. With the default root of 16px, 24px ÷ 16 = 1.5rem, and 12px ÷ 16 = 0.75rem. To go the other way, multiply: 2rem × 16 = 32px. If your project sets a different root font size, change the root value in this converter and every result updates to match. The px-to-rem table further down the page lists the most common sizes at a 16px root so you can look them up at a glance."
      }
    },
    {
      "@type": "Question",
      "name": "Why does em depend on a parent or base font size?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The em unit is defined relative to the font size of the element it is used on, which is normally inherited from its parent. That makes em powerful for building components that scale as a whole — set padding in em and it grows with the text — but it also means there is no single fixed answer for what 1em is without knowing the context. This converter lets you set that context with the base font size field, so you can see exactly what 1.5em becomes for an element whose font size is, say, 20px."
      }
    },
    {
      "@type": "Question",
      "name": "What is the default root font size in browsers?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Every major browser uses a default root font size of 16px, applied to the html element unless a stylesheet or the user overrides it. This is why 1rem is almost always 16px and why designers reach for 16px as the baseline for body text. Importantly, users can change this default in their browser settings for readability, and rem-based layouts respect that choice while pixel values ignore it — which is a key accessibility reason to build with rem."
      }
    },
    {
      "@type": "Question",
      "name": "When should I use rem instead of px?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Use rem for anything that should scale with the user's preferred text size — font sizes, spacing, and layout dimensions — because rem honours the reader's browser settings and keeps a whole design proportional from a single root value. Reach for px when you genuinely need a fixed size that must not scale, such as a one-pixel border or a hairline divider. Many modern design systems set sizes in rem almost everywhere for accessibility and consistency, keeping px for the rare details that must stay exact."
      }
    },
    {
      "@type": "Question",
      "name": "How does pt relate to px?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A point (pt) is a print unit equal to 1/72 of an inch, while the CSS reference pixel is defined as 1/96 of an inch. That makes 1pt equal to 96/72, or 1.3333, pixels, and 1px equal to 0.75pt. So 12pt — a common document body size — works out to 16px, which is why 12pt and 16px both feel like standard reading sizes. Points mainly matter when you are producing print stylesheets or matching a design specified in a word processor; for screen work, px, rem and em are the natural choices."
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
        ['name' => 'Set the root font size', 'text' => 'Leave the root at the browser default of 16px, or set it to match your project.'],
        ['name' => 'Enter a value', 'text' => 'Type a value into any unit field — px, rem, em, pt or percent.'],
        ['name' => 'Read every unit', 'text' => 'All the other units update instantly from the value you entered.'],
        ['name' => 'Use the reference table', 'text' => 'Check the px-to-rem table for the most common sizes, or click a row to load it.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>CSS unit converter</h1>
    <p>Convert between px, rem, em, pt and percent instantly, with a configurable root font size. Edit any field and the rest follow.</p>
  </div>

  <div class="cu-tool" id="cu-tool">

    <!-- Base settings -->
    <div class="cu-settings">
      <div class="cu-set">
        <label class="cu-set-label" for="cu-root">Root font size</label>
        <div class="cu-set-input"><input type="number" id="cu-root" value="16" min="1" step="1"><span>px</span></div>
        <span class="cu-set-hint">Used for rem</span>
      </div>
      <div class="cu-set">
        <label class="cu-set-label" for="cu-base">Base / parent font size</label>
        <div class="cu-set-input"><input type="number" id="cu-base" value="16" min="1" step="1"><span>px</span></div>
        <span class="cu-set-hint">Used for em and %</span>
      </div>
    </div>

    <!-- Unit fields -->
    <div class="cu-fields">
      <div class="cu-field">
        <label class="cu-unit-label" for="cu-px">px</label>
        <input type="number" id="cu-px" class="cu-input" step="any" aria-label="Pixels">
        <button class="btn btn-copy cu-copy" data-target="cu-px">Copy</button>
      </div>
      <div class="cu-field">
        <label class="cu-unit-label" for="cu-rem">rem</label>
        <input type="number" id="cu-rem" class="cu-input" step="any" aria-label="rem">
        <button class="btn btn-copy cu-copy" data-target="cu-rem">Copy</button>
      </div>
      <div class="cu-field">
        <label class="cu-unit-label" for="cu-em">em</label>
        <input type="number" id="cu-em" class="cu-input" step="any" aria-label="em">
        <button class="btn btn-copy cu-copy" data-target="cu-em">Copy</button>
      </div>
      <div class="cu-field">
        <label class="cu-unit-label" for="cu-pt">pt</label>
        <input type="number" id="cu-pt" class="cu-input" step="any" aria-label="Points">
        <button class="btn btn-copy cu-copy" data-target="cu-pt">Copy</button>
      </div>
      <div class="cu-field">
        <label class="cu-unit-label" for="cu-pct">%</label>
        <input type="number" id="cu-pct" class="cu-input" step="any" aria-label="Percent">
        <button class="btn btn-copy cu-copy" data-target="cu-pct">Copy</button>
      </div>
    </div>

    <!-- Reference table -->
    <div class="cu-reference">
      <div class="cu-ref-head">
        <span class="cu-ref-title">px → rem reference <span class="cu-ref-hint">(at <span id="cu-ref-root">16</span>px root · click a row to load)</span></span>
      </div>
      <div class="cu-ref-table-wrap">
        <table class="cu-ref-table">
          <thead><tr><th>px</th><th>rem</th><th>em</th><th>pt</th></tr></thead>
          <tbody id="cu-ref-body"></tbody>
        </table>
      </div>
    </div>

    <div class="cu-toast" id="cu-toast" aria-live="polite"></div>

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

    <h2>About CSS units: px, rem, em, pt and %</h2>
    <p>Front-end developers convert between CSS units constantly, and the arithmetic is deceptively fiddly because some units are absolute and others are relative to a font size that can change. A pixel is fixed, a rem is measured against the page's root font size, an em is measured against its own element's font size, a point comes from the world of print, and a percentage is relative to a parent value. Getting these conversions right matters for building layouts that are both precise and accessible, and doing the sums in your head dozens of times a day is exactly the kind of small friction a converter removes. Enter a value in any unit here and the rest are worked out instantly, with the root and base font sizes fully under your control.</p>

    <h2>History of CSS units</h2>
    <p>Most of these units date back to the very first CSS specification, CSS1, published by the W3C in 1996, which already defined px, em, pt and percentages by drawing on decades of typographic tradition — the point in particular comes from print, where it has meant a fraction of an inch since the days of metal type. For years the pixel was tied to the physical screen, but as displays multiplied in density the specification redefined the CSS pixel as a reference unit equal to 1/96 of an inch, independent of any single device. The rem unit arrived much later, introduced in the CSS Values and Units Module Level 3 and gaining reliable browser support around 2011 and 2012. It was created to solve a real frustration with em — its compounding, context-dependent behaviour — by giving developers a relative unit anchored to a single, predictable root.</p>

    <h2>How to convert between CSS units</h2>
    <p>Every conversion here pivots through pixels. To turn rem into pixels you multiply by the root font size, so at the default 16px root, 1.5rem is 24px; to go back you divide. The em unit works the same way but against the base or parent font size rather than the root, which is why this tool gives you a separate control for it. Points are absolute: since a point is 1/72 of an inch and the CSS pixel is 1/96 of an inch, one point equals 96/72 — about 1.333 — pixels, and one pixel is 0.75 points. Percentages, in the font-size context, mirror em exactly, with 100% equal to 1em of the base size. Because everything routes through pixels, changing the root or base font size recalculates all the relative units at once.</p>

    <h2>When to use each CSS unit</h2>
    <p>The modern default for most sizing is rem, because it scales with the user's chosen browser font size and keeps an entire design proportional from one root value — a genuine accessibility benefit. Em is ideal for self-contained components whose padding, margins and icons should grow and shrink together with their text. Pixels remain the right tool when a size must be exact and must not scale, such as a hairline border. Points belong almost exclusively to print stylesheets and to matching designs handed over in points from a word processor or PDF. Percentages shine for fluid, container-relative sizing. Knowing which unit expresses your intent — and being able to convert freely between them — is part of writing CSS that is both robust and considerate of the reader.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is the difference between px, rem and em?</p>
      <p class="faq-a">A px (pixel) is an absolute unit — 16px is always 16px regardless of any other setting. A rem is relative to the root font size, the font size set on the <code>html</code> element, which is 16px by default in every browser, so 1rem equals 16px unless you change the root. An em is also relative, but to the font size of the current element or its parent rather than the root, so its real value depends on where it sits in the document. In short, px is fixed, rem scales from one global setting, and em scales from its local context.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I convert px to rem?</p>
      <p class="faq-a">Divide the pixel value by the root font size. With the default root of 16px, 24px ÷ 16 = 1.5rem, and 12px ÷ 16 = 0.75rem. To go the other way, multiply: 2rem × 16 = 32px. If your project sets a different root font size, change the root value in this converter and every result updates to match. The px-to-rem table above lists the most common sizes at a 16px root so you can look them up at a glance.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does em depend on a parent or base font size?</p>
      <p class="faq-a">The em unit is defined relative to the font size of the element it is used on, which is normally inherited from its parent. That makes em powerful for building components that scale as a whole — set padding in em and it grows with the text — but it also means there is no single fixed answer for what 1em is without knowing the context. This converter lets you set that context with the base font size field, so you can see exactly what 1.5em becomes for an element whose font size is, say, 20px.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the default root font size in browsers?</p>
      <p class="faq-a">Every major browser uses a default root font size of 16px, applied to the <code>html</code> element unless a stylesheet or the user overrides it. This is why 1rem is almost always 16px and why designers reach for 16px as the baseline for body text. Importantly, users can change this default in their browser settings for readability, and rem-based layouts respect that choice while pixel values ignore it — which is a key accessibility reason to build with rem.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">When should I use rem instead of px?</p>
      <p class="faq-a">Use rem for anything that should scale with the user's preferred text size — font sizes, spacing, and layout dimensions — because rem honours the reader's browser settings and keeps a whole design proportional from a single root value. Reach for px when you genuinely need a fixed size that must not scale, such as a one-pixel border or a hairline divider. Many modern design systems set sizes in rem almost everywhere for accessibility and consistency, keeping px for the rare details that must stay exact.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How does pt relate to px?</p>
      <p class="faq-a">A point (pt) is a print unit equal to 1/72 of an inch, while the CSS reference pixel is defined as 1/96 of an inch. That makes 1pt equal to 96/72, or 1.3333, pixels, and 1px equal to 0.75pt. So 12pt — a common document body size — works out to 16px, which is why 12pt and 16px both feel like standard reading sizes. Points mainly matter when you are producing print stylesheets or matching a design specified in a word processor; for screen work, px, rem and em are the natural choices.</p>
    </div>

  </div>

</div>

<!-- CSS unit converter styles -->
<style>
.cu-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
  overflow: hidden;
  position: relative;
}

/* Settings */
.cu-settings {
  display: flex;
  gap: 14px;
  padding: 16px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
  flex-wrap: wrap;
}

.cu-set { display: flex; flex-direction: column; gap: 5px; flex: 1; min-width: 180px; }

.cu-set-label { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-3); }

.cu-set-input {
  display: flex;
  align-items: center;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  overflow: hidden;
  transition: border-color var(--transition);
}
.cu-set-input:focus-within { border-color: var(--accent); }
.cu-set-input input {
  flex: 1;
  min-width: 0;
  padding: 9px 12px;
  border: none;
  background: transparent;
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.9375rem;
  outline: none;
}
.cu-set-input span { padding: 0 12px; color: var(--text-3); font-family: var(--font-mono); font-size: 0.85rem; border-left: 1px solid var(--border); }

.cu-set-hint { font-size: 0.75rem; color: var(--text-3); }

/* Unit fields */
.cu-fields { padding: 16px; display: flex; flex-direction: column; gap: 10px; }

.cu-field { display: flex; align-items: center; gap: 10px; }

.cu-unit-label {
  width: 44px;
  flex-shrink: 0;
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--accent);
  text-align: right;
}

.cu-input {
  flex: 1;
  min-width: 0;
  padding: 11px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 1rem;
  outline: none;
  transition: border-color var(--transition);
}
.cu-input:focus { border-color: var(--accent); }
.cu-copy { flex-shrink: 0; }

/* Reference */
.cu-reference { border-top: 1px solid var(--border); background: var(--bg-2); }
.cu-ref-head { padding: 12px 16px; }
.cu-ref-title { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-3); }
.cu-ref-hint { text-transform: none; letter-spacing: 0; font-weight: 400; }

.cu-ref-table-wrap { overflow-x: auto; max-height: 320px; overflow-y: auto; border-top: 1px solid var(--border); }
.cu-ref-table { width: 100%; border-collapse: collapse; font-family: var(--font-mono); font-size: 0.85rem; }
.cu-ref-table th {
  padding: 8px 16px; text-align: left; font-size: 0.7rem; font-weight: 600; color: var(--text-3);
  background: var(--bg-2); border-bottom: 1px solid var(--border); position: sticky; top: 0;
  text-transform: uppercase; letter-spacing: 0.05em; font-family: var(--font);
}
.cu-ref-table td { padding: 7px 16px; border-bottom: 1px solid var(--border); color: var(--text); }
.cu-ref-table tbody tr { cursor: pointer; transition: background var(--transition); }
.cu-ref-table tbody tr:hover td { background: var(--accent-light); }
[data-theme="dark"] .cu-ref-table tbody tr:hover td { background: var(--accent-dim); }
.cu-ref-table td:first-child { color: var(--accent); font-weight: 600; }
.cu-ref-table tr:last-child td { border-bottom: none; }

/* Toast */
.cu-toast {
  position: fixed; left: 50%; bottom: 28px; transform: translateX(-50%) translateY(20px);
  background: var(--text); color: var(--bg); padding: 9px 18px; border-radius: 24px;
  font-size: 0.875rem; font-weight: 500; opacity: 0; pointer-events: none;
  transition: opacity var(--transition), transform var(--transition); z-index: 200;
  box-shadow: 0 6px 24px rgba(0,0,0,0.18);
}
.cu-toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

@media (max-width: 480px) {
  .cu-unit-label { width: 34px; }
  .cu-copy { padding: 8px 12px; }
}
</style>

<!-- CSS unit converter script -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var rootEl = document.getElementById('cu-root');
  var baseEl = document.getElementById('cu-base');
  var pxEl   = document.getElementById('cu-px');
  var remEl  = document.getElementById('cu-rem');
  var emEl   = document.getElementById('cu-em');
  var ptEl   = document.getElementById('cu-pt');
  var pctEl  = document.getElementById('cu-pct');
  var refBody = document.getElementById('cu-ref-body');
  var refRoot = document.getElementById('cu-ref-root');
  var toast  = document.getElementById('cu-toast');

  var PT_PER_PX = 72 / 96;   // 1px = 0.75pt
  var px = 16;               // canonical value in pixels

  function root() { var v = parseFloat(rootEl.value); return v > 0 ? v : 16; }
  function base() { var v = parseFloat(baseEl.value); return v > 0 ? v : 16; }

  /* Format: up to 4 decimals, trailing zeros trimmed */
  function fmt(n) {
    if (!isFinite(n)) return '';
    var r = Math.round(n * 10000) / 10000;
    return String(r);
  }

  function toPx(unit, v) {
    switch (unit) {
      case 'px':  return v;
      case 'rem': return v * root();
      case 'em':  return v * base();
      case 'pt':  return v / PT_PER_PX;
      case 'pct': return v / 100 * base();
    }
    return v;
  }

  function fromPx(unit, p) {
    switch (unit) {
      case 'px':  return p;
      case 'rem': return p / root();
      case 'em':  return p / base();
      case 'pt':  return p * PT_PER_PX;
      case 'pct': return p / base() * 100;
    }
    return p;
  }

  function renderFields(exclude) {
    if (exclude !== 'cu-px')  pxEl.value  = fmt(px);
    if (exclude !== 'cu-rem') remEl.value = fmt(fromPx('rem', px));
    if (exclude !== 'cu-em')  emEl.value  = fmt(fromPx('em', px));
    if (exclude !== 'cu-pt')  ptEl.value  = fmt(fromPx('pt', px));
    if (exclude !== 'cu-pct') pctEl.value = fmt(fromPx('pct', px));
  }

  function wire(el, unit) {
    el.addEventListener('input', function () {
      if (el.value.trim() === '') { return; }
      var v = parseFloat(el.value);
      if (isNaN(v)) return;
      px = toPx(unit, v);
      renderFields(el.id);
      buildReference();
    });
  }

  wire(pxEl, 'px');
  wire(remEl, 'rem');
  wire(emEl, 'em');
  wire(ptEl, 'pt');
  wire(pctEl, 'pct');

  [rootEl, baseEl].forEach(function (el) {
    el.addEventListener('input', function () {
      renderFields(null);
      buildReference();
    });
  });

  /* Reference table */
  var COMMON = [8, 10, 12, 14, 16, 18, 20, 24, 28, 32, 36, 40, 48, 56, 64, 72, 96];

  function buildReference() {
    refRoot.textContent = fmt(root());
    var rows = COMMON.map(function (p) {
      return '<tr data-px="' + p + '">' +
        '<td>' + p + 'px</td>' +
        '<td>' + fmt(p / root()) + 'rem</td>' +
        '<td>' + fmt(p / base()) + 'em</td>' +
        '<td>' + fmt(p * PT_PER_PX) + 'pt</td>' +
        '</tr>';
    }).join('');
    refBody.innerHTML = rows;
  }

  refBody.addEventListener('click', function (e) {
    var tr = e.target.closest('tr');
    if (!tr) return;
    px = parseFloat(tr.dataset.px);
    renderFields(null);
    showToast(fmt(px) + 'px loaded');
  });

  /* Copy */
  function showToast(msg) {
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(function () { toast.classList.remove('show'); }, 1400);
  }

  document.querySelectorAll('.cu-copy').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var el = document.getElementById(btn.dataset.target);
      if (el && el.value) showToast('Copied ' + el.value);
    });
  });

  /* Init */
  renderFields(null);
  buildReference();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
