<?php
$tool_slug   = 'color-converter';
$tool_name   = 'Color Converter';

$page_title  = 'HEX to RGB & HSL Color Converter — Free Online | TextlyPop';
$meta_desc   = 'Convert colors between HEX, RGB and HSL instantly. Live picker, alpha support, tints and shades, plus WCAG contrast checking. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/color-converter';
$og_title    = 'Free HEX / RGB / HSL Color Converter — TextlyPop';
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
  "name": "Color Converter",
  "url": "https://textlypop.com/tools/color-converter",
  "description": "Convert colors between HEX, RGB and HSL instantly. Live color picker, alpha support, tints and shades, WCAG contrast and one-click copy.",
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
      "name": "What is the difference between HEX, RGB and HSL?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "All three describe the same colours in different notations. RGB defines a colour by how much red, green and blue light it mixes, each from 0 to 255. HEX is the same RGB values written as a six-digit hexadecimal number, so rgb(255, 87, 51) becomes #FF5733 — it is more compact and is the traditional way to write colours in HTML and CSS. HSL takes a completely different angle, describing a colour by its hue (its position on the colour wheel from 0 to 360 degrees), saturation (how vivid it is) and lightness (how bright it is), which makes it far more intuitive to adjust by hand."
      }
    },
    {
      "@type": "Question",
      "name": "How do I convert a HEX colour to RGB?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A HEX colour is just RGB written in base 16. The six digits are three pairs — red, green and blue — and each pair is a number from 00 to FF, which is 0 to 255 in ordinary decimal. So #FF5733 splits into FF, 57 and 33, which convert to 255, 87 and 51, giving rgb(255, 87, 51). This converter does it instantly in both directions: type or paste a HEX value and the RGB and HSL fields update immediately, and editing any field converts back to the others."
      }
    },
    {
      "@type": "Question",
      "name": "What is the alpha channel and how do rgba and 8-digit hex work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Alpha is opacity — how see-through a colour is — ranging from 0 (fully transparent) to 1 (fully opaque). In CSS you add it as a fourth value with rgba() or hsla(), for example rgba(255, 87, 51, 0.5) for a half-transparent orange. Modern browsers also accept an eight-digit hex code where the last two digits are the alpha in hexadecimal, so #FF573380 is the same colour at 50% opacity. Drag the opacity slider in this tool and all three formats update to include the alpha value automatically."
      }
    },
    {
      "@type": "Question",
      "name": "Why does HSL make colours easier to adjust?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Because its three numbers map onto how people actually think about colour. To make a colour lighter or darker you change only the lightness; to make it more muted or more vivid you change only the saturation; and to shift it to a neighbouring colour you rotate the hue. Doing the same things in RGB or HEX means recalculating all three channels at once, which is unintuitive. This is why HSL is popular for building colour palettes, generating tints and shades, and creating hover states that are a few percent lighter or darker than the base."
      }
    },
    {
      "@type": "Question",
      "name": "Which colour format should I use in CSS?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "All of them work in every modern browser, so it is mostly a matter of what you are doing. HEX is compact and universally recognised, which is why it dominates design tools and static colour values. RGB and RGBA are handy when you need transparency or are working with values that come from an image or script. HSL and HSLA are the best choice when you want to adjust a colour programmatically or keep a palette consistent, because tweaking one channel produces a predictable result. A common workflow is to design in HEX and switch to HSL when you need to create variations."
      }
    },
    {
      "@type": "Question",
      "name": "Is this converter accurate and does my data stay private?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes on both counts. The conversions use the exact standard formulas for translating between RGB, hexadecimal and HSL, so the values match what browsers and design software produce. Everything runs entirely in your browser with no server involved, so the colours you enter are never uploaded, logged or stored, and the tool keeps working even if you go offline after the page has loaded. The contrast readout uses the official WCAG relative-luminance formula to help you check whether text will be readable on the colour."
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
        ['name' => 'Pick or paste a colour', 'text' => 'Use the colour picker, or paste a HEX, RGB or HSL value into its field.'],
        ['name' => 'Read every format', 'text' => 'The HEX, RGB and HSL fields update instantly, showing the same colour in all three notations.'],
        ['name' => 'Adjust opacity and shades', 'text' => 'Drag the opacity slider for alpha, or click a tint or shade swatch to jump to a lighter or darker variation.'],
        ['name' => 'Copy the value', 'text' => 'Click the copy button next to any format to copy a ready-to-use CSS colour value to your clipboard.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Color converter</h1>
    <p>Convert any color between HEX, RGB and HSL. Pick a color or paste a value — every format updates live, with alpha, tints and shades, and one-click copy.</p>
  </div>

  <div class="cc-tool" id="cc-tool">

    <!-- Preview -->
    <div class="cc-preview-wrap">
      <div class="cc-preview" id="cc-preview">
        <span class="cc-preview-hex" id="cc-preview-hex">#FF5733</span>
      </div>
      <div class="cc-picker-row">
        <label class="cc-picker-label" for="cc-picker">
          <input type="color" id="cc-picker" value="#ff5733" aria-label="Color picker">
          <span>Pick a color</span>
        </label>
        <span class="cc-contrast" id="cc-contrast"></span>
      </div>
    </div>

    <!-- Format fields -->
    <div class="cc-fields">
      <div class="cc-field">
        <label class="cc-field-label" for="cc-hex">HEX</label>
        <input type="text" id="cc-hex" class="cc-input" spellcheck="false" autocomplete="off" aria-label="HEX color value">
        <button class="btn btn-copy cc-copy" data-target="cc-hex">Copy</button>
      </div>
      <div class="cc-field">
        <label class="cc-field-label" for="cc-rgb">RGB</label>
        <input type="text" id="cc-rgb" class="cc-input" spellcheck="false" autocomplete="off" aria-label="RGB color value">
        <button class="btn btn-copy cc-copy" data-target="cc-rgb">Copy</button>
      </div>
      <div class="cc-field">
        <label class="cc-field-label" for="cc-hsl">HSL</label>
        <input type="text" id="cc-hsl" class="cc-input" spellcheck="false" autocomplete="off" aria-label="HSL color value">
        <button class="btn btn-copy cc-copy" data-target="cc-hsl">Copy</button>
      </div>
    </div>

    <!-- Alpha -->
    <div class="cc-alpha">
      <label class="cc-alpha-label" for="cc-alpha">Opacity</label>
      <input type="range" id="cc-alpha" class="cc-alpha-slider" min="0" max="100" value="100" aria-label="Opacity">
      <span class="cc-alpha-val" id="cc-alpha-val">100%</span>
    </div>

    <!-- Tints & shades -->
    <div class="cc-variations">
      <span class="cc-var-label">Tints &amp; shades <span class="cc-var-hint">(click to use)</span></span>
      <div class="cc-shades" id="cc-shades"></div>
    </div>

    <!-- Copy toast -->
    <div class="cc-toast" id="cc-toast" aria-live="polite"></div>

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

    <h2>About color models: HEX, RGB and HSL</h2>
    <p>Every color on a screen is ultimately a mixture of red, green and blue light, but there are several ways to write that mixture down. RGB states the amount of each primary directly, as three numbers from 0 to 255. HEX encodes those same three numbers in hexadecimal, packing them into the familiar six-character code that begins with a hash. HSL describes the color instead by its hue, saturation and lightness — a model designed to match how humans perceive and reason about color. Because all three notations point to the same underlying color, converting between them is lossless, and being fluent in all three lets you copy a value from a design tool, adjust it logically, and drop it into code without friction.</p>

    <h2>History of color on the web</h2>
    <p>The RGB model comes from the additive theory of color worked out in the 19th century and used in every television and monitor since. Hexadecimal color notation arrived with the early web in the mid-1990s, when HTML and CSS needed a compact, unambiguous way to specify the millions of colors a screen could display, and the three-byte hex triplet fit perfectly. HSL and its close relative HSV were devised separately in the 1970s by computer-graphics researchers — Alvy Ray Smith described HSV in 1978 — to give artists a more intuitive way to choose colors than juggling raw RGB values. HSL only became a first-class citizen of the web much later, when the CSS Color Module Level 3 standardised the <code>hsl()</code> and <code>hsla()</code> functions, giving developers the perceptual model natively in the browser.</p>

    <h2>How to convert between HEX, RGB and HSL</h2>
    <p>Converting HEX to RGB is simply reading each pair of hex digits as a number from 0 to 255. Going from RGB to HSL is more involved: you find the largest and smallest of the three channels, derive lightness from their average, saturation from their spread, and hue from which channel is the maximum and by how much the others differ. The math is well defined and always reversible, but doing it by hand is tedious and error-prone, which is exactly what a converter is for. Enter a value in any of the three fields here and the other two are recalculated instantly using the standard formulas, so you never have to run the arithmetic yourself.</p>

    <h2>When to use each color format</h2>
    <p>HEX is the lingua franca of design: compact, easy to paste, and understood by every tool, which makes it the natural home for brand colors and static values. RGB and RGBA shine when you need transparency or are pulling color data from images, canvases or scripts where values arrive as separate numbers. HSL and HSLA are the format of choice for anything systematic — building a palette, generating hover and active states a few percent lighter or darker, or letting a theme rotate through hues — because changing one channel produces a predictable, isolated effect. Knowing when to reach for each, and being able to switch between them freely, is what this converter is built to make effortless.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is the difference between HEX, RGB and HSL?</p>
      <p class="faq-a">All three describe the same colours in different notations. RGB defines a colour by how much red, green and blue light it mixes, each from 0 to 255. HEX is the same RGB values written as a six-digit hexadecimal number, so <code>rgb(255, 87, 51)</code> becomes <code>#FF5733</code> — more compact and the traditional way to write colours in HTML and CSS. HSL takes a completely different angle, describing a colour by its hue (its position on the colour wheel from 0 to 360 degrees), saturation (how vivid it is) and lightness (how bright it is), which makes it far more intuitive to adjust by hand.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I convert a HEX colour to RGB?</p>
      <p class="faq-a">A HEX colour is just RGB written in base 16. The six digits are three pairs — red, green and blue — and each pair is a number from 00 to FF, which is 0 to 255 in ordinary decimal. So <code>#FF5733</code> splits into FF, 57 and 33, which convert to 255, 87 and 51, giving <code>rgb(255, 87, 51)</code>. This converter does it instantly in both directions: type or paste a HEX value and the RGB and HSL fields update immediately, and editing any field converts back to the others.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the alpha channel and how do rgba and 8-digit hex work?</p>
      <p class="faq-a">Alpha is opacity — how see-through a colour is — ranging from 0 (fully transparent) to 1 (fully opaque). In CSS you add it as a fourth value with <code>rgba()</code> or <code>hsla()</code>, for example <code>rgba(255, 87, 51, 0.5)</code> for a half-transparent orange. Modern browsers also accept an eight-digit hex code where the last two digits are the alpha in hexadecimal, so <code>#FF573380</code> is the same colour at 50% opacity. Drag the opacity slider in this tool and all three formats update to include the alpha value automatically.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does HSL make colours easier to adjust?</p>
      <p class="faq-a">Because its three numbers map onto how people actually think about colour. To make a colour lighter or darker you change only the lightness; to make it more muted or more vivid you change only the saturation; and to shift it to a neighbouring colour you rotate the hue. Doing the same things in RGB or HEX means recalculating all three channels at once, which is unintuitive. This is why HSL is popular for building colour palettes, generating tints and shades, and creating hover states that are a few percent lighter or darker than the base.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Which colour format should I use in CSS?</p>
      <p class="faq-a">All of them work in every modern browser, so it is mostly a matter of what you are doing. HEX is compact and universally recognised, which is why it dominates design tools and static colour values. RGB and RGBA are handy when you need transparency or are working with values that come from an image or script. HSL and HSLA are the best choice when you want to adjust a colour programmatically or keep a palette consistent, because tweaking one channel produces a predictable result. A common workflow is to design in HEX and switch to HSL when you need to create variations.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is this converter accurate and does my data stay private?</p>
      <p class="faq-a">Yes on both counts. The conversions use the exact standard formulas for translating between RGB, hexadecimal and HSL, so the values match what browsers and design software produce. Everything runs entirely in your browser with no server involved, so the colours you enter are never uploaded, logged or stored, and the tool keeps working even if you go offline after the page has loaded. The contrast readout uses the official WCAG relative-luminance formula to help you check whether text will be readable on the colour.</p>
    </div>

  </div>

</div>

<!-- Color converter CSS -->
<style>
.cc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
  overflow: hidden;
  position: relative;
}

/* Preview */
.cc-preview-wrap { border-bottom: 1px solid var(--border); }

/* Checkerboard shows through transparent colours */
.cc-preview {
  height: 150px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-image:
    linear-gradient(45deg, var(--bg-3) 25%, transparent 25%),
    linear-gradient(-45deg, var(--bg-3) 25%, transparent 25%),
    linear-gradient(45deg, transparent 75%, var(--bg-3) 75%),
    linear-gradient(-45deg, transparent 75%, var(--bg-3) 75%);
  background-size: 20px 20px;
  background-position: 0 0, 0 10px, 10px -10px, -10px 0;
  position: relative;
}

.cc-preview::after {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--cc-color, #FF5733);
}

.cc-preview-hex {
  position: relative;
  z-index: 1;
  font-family: var(--font-mono);
  font-size: 1.5rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  color: var(--cc-text, #fff);
  text-transform: uppercase;
}

.cc-picker-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding: 12px 16px;
  background: var(--bg-2);
  flex-wrap: wrap;
}

.cc-picker-label {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-size: 0.875rem;
  color: var(--text-2);
  cursor: pointer;
}

.cc-picker-label input[type="color"] {
  width: 40px;
  height: 32px;
  padding: 0;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: none;
  cursor: pointer;
}

.cc-contrast { font-size: 0.8125rem; color: var(--text-3); }

/* Fields */
.cc-fields { padding: 16px; display: flex; flex-direction: column; gap: 10px; }

.cc-field { display: flex; align-items: center; gap: 10px; }

.cc-field-label {
  width: 44px;
  flex-shrink: 0;
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.cc-input {
  flex: 1;
  min-width: 0;
  padding: 10px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.9375rem;
  outline: none;
  transition: border-color var(--transition);
}

.cc-input:focus { border-color: var(--accent); }
.cc-input.cc-error { border-color: var(--danger); }

.cc-copy { flex-shrink: 0; }

/* Alpha */
.cc-alpha {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 0 16px 16px;
}

.cc-alpha-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  flex-shrink: 0;
}

.cc-alpha-slider { flex: 1; accent-color: var(--accent); cursor: pointer; height: 4px; }
.cc-alpha-val { font-size: 0.8125rem; color: var(--text-2); font-variant-numeric: tabular-nums; width: 44px; text-align: right; }

/* Variations */
.cc-variations { padding: 14px 16px; border-top: 1px solid var(--border); background: var(--bg-2); }

.cc-var-label {
  display: block;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  margin-bottom: 10px;
}

.cc-var-hint { text-transform: none; letter-spacing: 0; font-weight: 400; color: var(--text-3); }

.cc-shades { display: flex; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border); }

.cc-shade {
  flex: 1;
  height: 46px;
  border: none;
  padding: 0;
  cursor: pointer;
  transition: transform 0.08s ease;
  position: relative;
}

.cc-shade:hover { transform: scaleY(1.12); z-index: 1; }
.cc-shade:active { transform: scaleY(1.12) scale(0.97); }

/* Toast */
.cc-toast {
  position: fixed;
  left: 50%;
  bottom: 28px;
  transform: translateX(-50%) translateY(20px);
  background: var(--text);
  color: var(--bg);
  padding: 9px 18px;
  border-radius: 24px;
  font-size: 0.875rem;
  font-weight: 500;
  opacity: 0;
  pointer-events: none;
  transition: opacity var(--transition), transform var(--transition);
  z-index: 200;
  box-shadow: 0 6px 24px rgba(0,0,0,0.18);
}

.cc-toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

@media (max-width: 480px) {
  .cc-field-label { width: 38px; }
  .cc-copy { padding: 8px 12px; }
}
</style>

<!-- Color converter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var tool     = document.getElementById('cc-tool');
  var preview  = document.getElementById('cc-preview');
  var previewHex = document.getElementById('cc-preview-hex');
  var picker   = document.getElementById('cc-picker');
  var hexEl    = document.getElementById('cc-hex');
  var rgbEl    = document.getElementById('cc-rgb');
  var hslEl    = document.getElementById('cc-hsl');
  var alphaEl  = document.getElementById('cc-alpha');
  var alphaVal = document.getElementById('cc-alpha-val');
  var contrastEl = document.getElementById('cc-contrast');
  var shadesEl = document.getElementById('cc-shades');
  var toast    = document.getElementById('cc-toast');

  var color = { r: 255, g: 87, b: 51, a: 1 };
  var toastTimer = null;

  /* ── Conversions ── */
  function clamp(v, min, max) { return Math.max(min, Math.min(max, v)); }

  function toHex2(n) {
    var h = clamp(Math.round(n), 0, 255).toString(16);
    return h.length === 1 ? '0' + h : h;
  }

  function rgbToHsl(r, g, b) {
    r /= 255; g /= 255; b /= 255;
    var max = Math.max(r, g, b), min = Math.min(r, g, b);
    var h, s, l = (max + min) / 2;
    if (max === min) { h = s = 0; }
    else {
      var d = max - min;
      s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
      switch (max) {
        case r: h = (g - b) / d + (g < b ? 6 : 0); break;
        case g: h = (b - r) / d + 2; break;
        default: h = (r - g) / d + 4;
      }
      h /= 6;
    }
    return { h: Math.round(h * 360), s: Math.round(s * 100), l: Math.round(l * 100) };
  }

  function hslToRgb(h, s, l) {
    h /= 360; s /= 100; l /= 100;
    var r, g, b;
    if (s === 0) { r = g = b = l; }
    else {
      var hue2rgb = function (p, q, t) {
        if (t < 0) t += 1;
        if (t > 1) t -= 1;
        if (t < 1 / 6) return p + (q - p) * 6 * t;
        if (t < 1 / 2) return q;
        if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
        return p;
      };
      var q = l < 0.5 ? l * (1 + s) : l + s - l * s;
      var p = 2 * l - q;
      r = hue2rgb(p, q, h + 1 / 3);
      g = hue2rgb(p, q, h);
      b = hue2rgb(p, q, h - 1 / 3);
    }
    return { r: Math.round(r * 255), g: Math.round(g * 255), b: Math.round(b * 255) };
  }

  /* ── Formatting ── */
  function aStr() { return String(Math.round(color.a * 100) / 100); }

  function formatHex() {
    var base = '#' + toHex2(color.r) + toHex2(color.g) + toHex2(color.b);
    if (color.a < 1) base += toHex2(color.a * 255);
    return base.toUpperCase();
  }

  function formatRgb() {
    return color.a < 1
      ? 'rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', ' + aStr() + ')'
      : 'rgb(' + color.r + ', ' + color.g + ', ' + color.b + ')';
  }

  function formatHsl() {
    var h = rgbToHsl(color.r, color.g, color.b);
    return color.a < 1
      ? 'hsla(' + h.h + ', ' + h.s + '%, ' + h.l + '%, ' + aStr() + ')'
      : 'hsl(' + h.h + ', ' + h.s + '%, ' + h.l + '%)';
  }

  function cssColor() {
    return 'rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', ' + aStr() + ')';
  }

  /* ── Parsing ── */
  function parseHex(str) {
    var m = str.trim().replace(/^#/, '');
    if (!/^([0-9a-f]{3}|[0-9a-f]{4}|[0-9a-f]{6}|[0-9a-f]{8})$/i.test(m)) return null;
    if (m.length === 3) m = m[0] + m[0] + m[1] + m[1] + m[2] + m[2];
    if (m.length === 4) m = m[0] + m[0] + m[1] + m[1] + m[2] + m[2] + m[3] + m[3];
    var r = parseInt(m.slice(0, 2), 16);
    var g = parseInt(m.slice(2, 4), 16);
    var b = parseInt(m.slice(4, 6), 16);
    var a = m.length === 8 ? parseInt(m.slice(6, 8), 16) / 255 : 1;
    return { r: r, g: g, b: b, a: a };
  }

  function nums(str) {
    var m = str.replace(/[^0-9.,%\-]/g, ' ').match(/-?[0-9.]+/g);
    return m ? m.map(Number) : [];
  }

  function parseRgb(str) {
    var n = nums(str);
    if (n.length < 3) return null;
    if (n.slice(0, 3).some(function (v) { return isNaN(v); })) return null;
    return {
      r: clamp(Math.round(n[0]), 0, 255),
      g: clamp(Math.round(n[1]), 0, 255),
      b: clamp(Math.round(n[2]), 0, 255),
      a: n.length >= 4 && !isNaN(n[3]) ? clamp(n[3], 0, 1) : 1
    };
  }

  function parseHsl(str) {
    var n = nums(str);
    if (n.length < 3) return null;
    if (n.slice(0, 3).some(function (v) { return isNaN(v); })) return null;
    var rgb = hslToRgb(
      ((Math.round(n[0]) % 360) + 360) % 360,
      clamp(n[1], 0, 100),
      clamp(n[2], 0, 100)
    );
    rgb.a = n.length >= 4 && !isNaN(n[3]) ? clamp(n[3], 0, 1) : 1;
    return rgb;
  }

  /* ── WCAG contrast ── */
  function lin(c) { c /= 255; return c <= 0.03928 ? c / 12.92 : Math.pow((c + 0.055) / 1.055, 2.4); }
  function lum(r, g, b) { return 0.2126 * lin(r) + 0.7152 * lin(g) + 0.0722 * lin(b); }
  function ratio(a, b) { var hi = Math.max(a, b), lo = Math.min(a, b); return (hi + 0.05) / (lo + 0.05); }

  function bestText() {
    var L = lum(color.r, color.g, color.b);
    var white = ratio(L, 1), black = ratio(L, 0);
    return white >= black
      ? { color: '#ffffff', label: 'White text', ratio: white }
      : { color: '#000000', label: 'Black text', ratio: black };
  }

  /* ── Shades ── */
  function mix(a, b, t) { return Math.round(a + (b - a) * t); }

  function buildShades() {
    var steps = [
      ['#ffffff', 0.8], ['#ffffff', 0.6], ['#ffffff', 0.4], ['#ffffff', 0.2],
      null,
      ['#000000', 0.2], ['#000000', 0.4], ['#000000', 0.6], ['#000000', 0.8]
    ];
    shadesEl.innerHTML = '';
    steps.forEach(function (step) {
      var r = color.r, g = color.g, b = color.b;
      if (step) {
        var tgt = parseHex(step[0]);
        r = mix(color.r, tgt.r, step[1]);
        g = mix(color.g, tgt.g, step[1]);
        b = mix(color.b, tgt.b, step[1]);
      }
      var hex = ('#' + toHex2(r) + toHex2(g) + toHex2(b)).toUpperCase();
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'cc-shade';
      btn.style.background = hex;
      btn.title = hex + (step ? '' : ' (base)');
      btn.setAttribute('aria-label', 'Use ' + hex);
      btn.dataset.r = r; btn.dataset.g = g; btn.dataset.b = b;
      shadesEl.appendChild(btn);
    });
  }

  /* ── Render ── */
  function render(exclude) {
    var hex = formatHex();
    if (exclude !== 'cc-hex') hexEl.value = hex;
    if (exclude !== 'cc-rgb') rgbEl.value = formatRgb();
    if (exclude !== 'cc-hsl') hslEl.value = formatHsl();

    picker.value = '#' + toHex2(color.r) + toHex2(color.g) + toHex2(color.b);
    alphaEl.value = Math.round(color.a * 100);
    alphaVal.textContent = Math.round(color.a * 100) + '%';

    tool.style.setProperty('--cc-color', cssColor());

    var bt = bestText();
    tool.style.setProperty('--cc-text', bt.color);
    previewHex.textContent = hex;
    contrastEl.textContent = bt.label + ' · ' + bt.ratio.toFixed(2) + ':1';

    buildShades();
  }

  function setColor(c, exclude) {
    color.r = c.r; color.g = c.g; color.b = c.b;
    if (c.a !== undefined) color.a = c.a;
    render(exclude);
  }

  /* ── Field handlers: update others live, normalise on blur ── */
  function wireField(el, parser) {
    el.addEventListener('input', function () {
      var parsed = parser(el.value);
      if (parsed) {
        el.classList.remove('cc-error');
        setColor(parsed, el.id);
      } else {
        el.classList.add('cc-error');
      }
    });
    el.addEventListener('blur', function () {
      el.classList.remove('cc-error');
      render();
    });
  }

  wireField(hexEl, parseHex);
  wireField(rgbEl, parseRgb);
  wireField(hslEl, parseHsl);

  picker.addEventListener('input', function () {
    var c = parseHex(picker.value);
    if (c) { c.a = color.a; setColor(c); }
  });

  alphaEl.addEventListener('input', function () {
    color.a = clamp(parseInt(alphaEl.value, 10) / 100, 0, 1);
    render();
  });

  /* ── Copy feedback + shade selection ── */
  function showToast(msg) {
    toast.textContent = msg;
    toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () { toast.classList.remove('show'); }, 1400);
  }

  document.querySelectorAll('.cc-copy').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var el = document.getElementById(btn.dataset.target);
      if (el) showToast('Copied ' + el.value);
    });
  });

  shadesEl.addEventListener('click', function (e) {
    var s = e.target.closest('.cc-shade');
    if (!s) return;
    setColor({ r: +s.dataset.r, g: +s.dataset.g, b: +s.dataset.b });
    showToast('Using ' + formatHex());
  });

  /* ── Init ── */
  render();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
