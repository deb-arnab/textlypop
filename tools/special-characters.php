<?php
$tool_slug   = 'special-characters';
$tool_name   = 'Special Characters & Symbols';

$page_title  = 'Special Characters & Symbols — Copy and Paste | TextlyPop';
$meta_desc   = 'A full special characters list to copy and paste — arrows, currency, maths, stars, accents and Greek letters, with names and Alt codes. Free.';
$canonical_url = 'https://textlypop.com/tools/special-characters';
$og_title    = 'Special Characters & Symbols — Copy and Paste | TextlyPop';
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
  "name": "Special Characters & Symbols Copy Paste",
  "url": "https://textlypop.com/tools/special-characters",
  "description": "Copy and paste special characters and symbols — arrows, currency, math operators, stars, hearts, bullets, accented and Greek letters. Click any symbol to copy.",
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
      "name": "How do I copy and paste a special character?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Click any symbol in the grid above and it is copied to your clipboard instantly — there is no need to select it or press Ctrl+C. Then paste it wherever you need with Ctrl+V (Cmd+V on a Mac), whether that is a document, a social media bio, a design tool or a spreadsheet. Use the search box to find a symbol by name, such as arrow, heart or degree, and the recently copied row remembers the symbols you have used so you can grab them again with one click."
      }
    },
    {
      "@type": "Question",
      "name": "Will these symbols display correctly everywhere I paste them?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most will, because these are standard Unicode characters that virtually every modern device and font supports — arrows, currency signs, accented letters and common punctuation are almost universally safe. Rarer decorative symbols depend on the font installed where you paste them: if a glyph is missing, you may see a blank box or a fallback shape instead. When appearance matters, test the symbol in the exact place it will appear, and prefer the more common variants for things like usernames or printed documents."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between a special character and an emoji?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Both are Unicode characters, but emoji are defined to render as small colour pictures, while the symbols here are monochrome text glyphs that take on the colour and font of the surrounding text. A heart symbol like ♥ inherits your text styling and can be bolded or coloured with CSS, whereas the emoji heart is a fixed colour image. Text symbols are usually the better choice for professional documents, code, and anywhere you want the character to blend in with the text rather than stand out as a picture."
      }
    },
    {
      "@type": "Question",
      "name": "How can I type these symbols without this tool?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "There are several ways. On Windows you can hold Alt and type a numeric code on the numpad (Alt+0169 gives ©), or use the Character Map app. On a Mac, many symbols have Option-key shortcuts (Option+G gives ©) and the Character Viewer opens with Control+Command+Space. Every character also has a Unicode code point, so in many apps you can type the hex value and press Alt+X. These methods work but require memorising codes, which is exactly why a click-to-copy grid is faster for occasional use."
      }
    },
    {
      "@type": "Question",
      "name": "Why does a symbol look different on another device?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A Unicode character defines meaning, not appearance — the actual shape you see is drawn by whatever font is rendering it. The same star or arrow can look noticeably different between Windows, macOS, Android and iOS because each system ships different default fonts, and a website can override them again with its own font choice. This is normal and expected; the underlying character is identical everywhere, so it will still be recognised, searched and processed correctly even when it is drawn in a slightly different style."
      }
    },
    {
      "@type": "Question",
      "name": "Are these symbols safe to use in usernames, domains and passwords?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Use them with care. Many platforms allow symbols in display names and bios, where they are harmless and eye-catching. But domains and logins are stricter, and some symbols are visually confusable with ordinary letters — a technique called a homoglyph attack — so security-sensitive fields often reject or normalise them. Passwords can technically include symbols, but a character that is hard to type on a phone keyboard or a foreign layout can lock you out, so stick to widely supported characters there and keep decorative symbols for text where appearance is the goal."
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
        ['name' => 'Find a symbol', 'text' => 'Browse the categories or use the search box to find a symbol by name, such as arrow, euro or heart.'],
        ['name' => 'Click to copy', 'text' => 'Click any symbol tile and it is copied to your clipboard instantly, with a Copied confirmation.'],
        ['name' => 'Paste it anywhere', 'text' => 'Paste the symbol with Ctrl+V or Cmd+V into a document, social bio, design tool or message.'],
        ['name' => 'Reuse recent symbols', 'text' => 'The recently copied row keeps the symbols you have used so you can copy them again with one click.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Special characters &amp; symbols</h1>
    <p>Click any symbol to copy it instantly — then paste it anywhere. Arrows, currency, math, stars, hearts, accents and more.</p>
  </div>

  <div class="sc-tool" id="sc-tool">

    <!-- Toolbar -->
    <div class="sc-toolbar">
      <div class="sc-search-wrap">
        <svg class="sc-search-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
          <circle cx="6.5" cy="6.5" r="4" stroke="currentColor" stroke-width="1.5"/>
          <line x1="9.5" y1="9.5" x2="13.5" y2="13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <input type="text" id="sc-search" class="sc-search" placeholder="Search symbols — arrow, heart, euro, degree…" autocomplete="off" spellcheck="false" aria-label="Search symbols">
      </div>
      <span class="sc-count" id="sc-count"></span>
    </div>

    <!-- Category pills -->
    <div class="sc-pills" id="sc-pills" role="tablist" aria-label="Symbol categories"></div>

    <!-- Recently copied -->
    <div class="sc-recent hidden" id="sc-recent">
      <span class="sc-recent-label">Recently copied</span>
      <div class="sc-recent-row" id="sc-recent-row"></div>
    </div>

    <!-- Symbol sections (built by JS) -->
    <div class="sc-sections" id="sc-sections"></div>

    <!-- No results -->
    <div class="sc-noresults hidden" id="sc-noresults">No symbols match your search. Try a different word.</div>

    <!-- Copy toast -->
    <div class="sc-toast" id="sc-toast" aria-live="polite"></div>

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

    <h2>About special characters and symbols</h2>
    <p>Special characters are the letters, marks and signs that sit outside the plain A–Z keys on a standard keyboard — arrows, currency signs, mathematical operators, accented letters, bullets, stars and thousands more. They exist because written language needs far more than the hundred-odd characters a keyboard can hold: a physicist needs π and ∑, a European writer needs é and ü, a designer needs • and →, and a shop needs € and £. Every one of these is a Unicode character with a unique code point, which is what lets you copy a symbol here and paste it into an email, a spreadsheet or a website and have it arrive intact.</p>

    <h2>History of Unicode and special characters</h2>
    <p>Early computers used ASCII, published in 1963, which defined just 128 characters — enough for English text but nothing else, no accents, no currency beyond the dollar, no arrows. As computing spread worldwide, dozens of incompatible extensions appeared, and text created in one system turned to garbage in another. Unicode was created to fix this: the Unicode Consortium was founded in 1991 and released Unicode 1.0 that same year, assigning every character in every writing system a single unambiguous number. It has grown to encompass more than 150,000 characters, and in 2010 Unicode 6.0 formally added emoji, cementing the standard as the universal foundation for text — which is why a symbol copied from this page looks and behaves the same across virtually every modern device.</p>

    <h2>How to type special characters</h2>
    <p>Beyond copying from a grid like this one, every operating system offers a way to insert symbols directly. Windows supports Alt codes — holding the Alt key and typing a number on the numeric keypad, such as Alt+0169 for the copyright sign — as well as the built-in Character Map utility. macOS uses Option-key combinations for common symbols and a Character Viewer opened with Control+Command+Space. On both systems, and in many individual applications, each character can also be entered by its Unicode code point in hexadecimal. These methods are powerful once memorised, but for the occasional arrow or accented letter, clicking a tile and pasting is simply faster.</p>

    <h2>Special character names and codes</h2>
    <p>Special symbols are easier to find when you know what they are called, and the name is often what a style guide or a form validation message refers to. The list below covers the marks asked about most often, with the Windows Alt code and the HTML entity for each.</p>
    <div class="table-scroll">
      <table class="seo-table">
        <thead>
          <tr><th>Symbol</th><th>Name</th><th>Alt code</th><th>HTML entity</th></tr>
        </thead>
        <tbody>
          <tr><td>&amp;</td><td>Ampersand</td><td>Alt+38</td><td><code>&amp;amp;</code></td></tr>
          <tr><td>*</td><td>Asterisk</td><td>Alt+42</td><td><code>&amp;ast;</code></td></tr>
          <tr><td>~</td><td>Tilde</td><td>Alt+126</td><td><code>&amp;tilde;</code></td></tr>
          <tr><td>•</td><td>Bullet</td><td>Alt+0149</td><td><code>&amp;bull;</code></td></tr>
          <tr><td>—</td><td>Em dash</td><td>Alt+0151</td><td><code>&amp;mdash;</code></td></tr>
          <tr><td>–</td><td>En dash</td><td>Alt+0150</td><td><code>&amp;ndash;</code></td></tr>
          <tr><td>…</td><td>Ellipsis</td><td>Alt+0133</td><td><code>&amp;hellip;</code></td></tr>
          <tr><td>©</td><td>Copyright sign</td><td>Alt+0169</td><td><code>&amp;copy;</code></td></tr>
          <tr><td>®</td><td>Registered sign</td><td>Alt+0174</td><td><code>&amp;reg;</code></td></tr>
          <tr><td>™</td><td>Trade mark sign</td><td>Alt+0153</td><td><code>&amp;trade;</code></td></tr>
          <tr><td>°</td><td>Degree sign</td><td>Alt+0176</td><td><code>&amp;deg;</code></td></tr>
          <tr><td>±</td><td>Plus-minus sign</td><td>Alt+0177</td><td><code>&amp;plusmn;</code></td></tr>
          <tr><td>×</td><td>Multiplication sign</td><td>Alt+0215</td><td><code>&amp;times;</code></td></tr>
          <tr><td>÷</td><td>Division sign</td><td>Alt+0247</td><td><code>&amp;divide;</code></td></tr>
          <tr><td>€</td><td>Euro sign</td><td>Alt+0128</td><td><code>&amp;euro;</code></td></tr>
          <tr><td>£</td><td>Pound sign</td><td>Alt+0163</td><td><code>&amp;pound;</code></td></tr>
          <tr><td>¥</td><td>Yen sign</td><td>Alt+0165</td><td><code>&amp;yen;</code></td></tr>
          <tr><td>§</td><td>Section sign</td><td>Alt+0167</td><td><code>&amp;sect;</code></td></tr>
          <tr><td>¶</td><td>Pilcrow (paragraph sign)</td><td>Alt+0182</td><td><code>&amp;para;</code></td></tr>
          <tr><td>†</td><td>Dagger</td><td>Alt+0134</td><td><code>&amp;dagger;</code></td></tr>
          <tr><td>‰</td><td>Per mille sign</td><td>Alt+0137</td><td><code>&amp;permil;</code></td></tr>
          <tr><td>«&nbsp;»</td><td>Guillemets</td><td>Alt+0171 / 0187</td><td><code>&amp;laquo;</code> <code>&amp;raquo;</code></td></tr>
          <tr><td>“&nbsp;”</td><td>Curly double quotes</td><td>Alt+0147 / 0148</td><td><code>&amp;ldquo;</code> <code>&amp;rdquo;</code></td></tr>
          <tr><td>→</td><td>Rightwards arrow</td><td>—</td><td><code>&amp;rarr;</code></td></tr>
          <tr><td>★</td><td>Black star</td><td>—</td><td><code>&amp;#9733;</code></td></tr>
        </tbody>
      </table>
    </div>
    <p>Special letters — the accented and non-Latin ones — follow the same pattern: é is Alt+0233, ñ is Alt+0241, ü is Alt+0252. Alt codes require the numeric keypad, so on a laptop without one, copying from the grid above is usually the only practical route.</p>

    <h2>What special characters are used for</h2>
    <p>The uses are as varied as writing itself. Designers and social media users decorate bios, captions and headings with stars, hearts and arrows to draw the eye. Writers reach for proper typographic marks — em dashes, curly quotes, ellipses and the degree sign — that make text look professionally set rather than typed. Students and academics need mathematical and Greek symbols for equations, and multilingual writers need accented and non-Latin letters to spell names and words correctly. Developers use box-drawing characters and bullets in comments and command-line output. In every case, the symbol carries meaning or style that plain keyboard text cannot, and a reliable copy-and-paste source removes the friction of finding it.</p>
    <p>Related tools cover the neighbouring jobs. The <a href="/tools/fancy-text-generator">fancy text generator</a> converts whole words into Unicode styles — bold, italic, cursive and more — for bios and captions where formatting is not available. <a href="/tools/html-encoder-decoder">HTML encoder / decoder</a> converts symbols to and from the entity codes in the table above, which is what you need when a character breaks a web page. The <a href="/tools/character-counter">character counter</a> is worth checking before posting, because many symbols count as more than one character against a platform limit.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I copy and paste a special character?</p>
      <p class="faq-a">Click any symbol in the grid above and it is copied to your clipboard instantly — there is no need to select it or press Ctrl+C. Then paste it wherever you need with Ctrl+V (Cmd+V on a Mac), whether that is a document, a social media bio, a design tool or a spreadsheet. Use the search box to find a symbol by name, such as arrow, heart or degree, and the recently copied row remembers the symbols you have used so you can grab them again with one click.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Will these symbols display correctly everywhere I paste them?</p>
      <p class="faq-a">Most will, because these are standard Unicode characters that virtually every modern device and font supports — arrows, currency signs, accented letters and common punctuation are almost universally safe. Rarer decorative symbols depend on the font installed where you paste them: if a glyph is missing, you may see a blank box or a fallback shape instead. When appearance matters, test the symbol in the exact place it will appear, and prefer the more common variants for things like usernames or printed documents.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between a special character and an emoji?</p>
      <p class="faq-a">Both are Unicode characters, but emoji are defined to render as small colour pictures, while the symbols here are monochrome text glyphs that take on the colour and font of the surrounding text. A heart symbol like ♥ inherits your text styling and can be bolded or coloured with CSS, whereas the emoji heart is a fixed colour image. Text symbols are usually the better choice for professional documents, code, and anywhere you want the character to blend in with the text rather than stand out as a picture.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How can I type these symbols without this tool?</p>
      <p class="faq-a">There are several ways. On Windows you can hold Alt and type a numeric code on the numpad (Alt+0169 gives ©), or use the Character Map app. On a Mac, many symbols have Option-key shortcuts (Option+G gives ©) and the Character Viewer opens with Control+Command+Space. Every character also has a Unicode code point, so in many apps you can type the hex value and press Alt+X. These methods work but require memorising codes, which is exactly why a click-to-copy grid is faster for occasional use.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does a symbol look different on another device?</p>
      <p class="faq-a">A Unicode character defines meaning, not appearance — the actual shape you see is drawn by whatever font is rendering it. The same star or arrow can look noticeably different between Windows, macOS, Android and iOS because each system ships different default fonts, and a website can override them again with its own font choice. This is normal and expected; the underlying character is identical everywhere, so it will still be recognised, searched and processed correctly even when it is drawn in a slightly different style.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Are these symbols safe to use in usernames, domains and passwords?</p>
      <p class="faq-a">Use them with care. Many platforms allow symbols in display names and bios, where they are harmless and eye-catching. But domains and logins are stricter, and some symbols are visually confusable with ordinary letters — a technique called a homoglyph attack — so security-sensitive fields often reject or normalise them. Passwords can technically include symbols, but a character that is hard to type on a phone keyboard or a foreign layout can lock you out, so stick to widely supported characters there and keep decorative symbols for text where appearance is the goal.</p>
    </div>

  </div>

</div>

<!-- Special characters CSS -->
<style>
.sc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
  position: relative;
}

/* Toolbar */
.sc-toolbar {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.sc-search-wrap {
  position: relative;
  flex: 1;
  display: flex;
  align-items: center;
}

.sc-search-icon {
  position: absolute;
  left: 12px;
  color: var(--text-3);
  pointer-events: none;
}

.sc-search {
  width: 100%;
  padding: 10px 12px 10px 36px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  outline: none;
  transition: border-color var(--transition);
}

.sc-search:focus { border-color: var(--accent); }
.sc-search::placeholder { color: var(--text-3); }

.sc-count { font-size: 0.75rem; color: var(--text-3); white-space: nowrap; flex-shrink: 0; }

/* Pills */
.sc-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  padding: 12px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.sc-pill {
  padding: 5px 12px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg);
  color: var(--text-2);
  font-size: 0.8125rem;
  font-family: var(--font);
  cursor: pointer;
  white-space: nowrap;
  transition: background var(--transition), border-color var(--transition), color var(--transition);
}

.sc-pill:hover { border-color: var(--accent); color: var(--accent); }
.sc-pill.active { background: var(--accent); border-color: var(--accent); color: #fff; }

/* Recently copied */
.sc-recent {
  padding: 12px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg);
}

.sc-recent-label {
  display: block;
  font-size: 0.7rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  margin-bottom: 8px;
}

.sc-recent-row { display: flex; flex-wrap: wrap; gap: 6px; }

/* Sections */
.sc-section { padding: 4px 16px 8px; }
.sc-section.hidden { display: none; }

.sc-section-title {
  font-size: 0.72rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  padding: 14px 2px 8px;
}

.sc-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(46px, 1fr));
  gap: 6px;
}

/* Tiles */
.sc-tile {
  aspect-ratio: 1 / 1;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-size: 1.3rem;
  line-height: 1;
  cursor: pointer;
  padding: 0;
  transition: background var(--transition), border-color var(--transition), transform 0.08s ease;
  font-family: var(--font);
}

.sc-tile:hover { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .sc-tile:hover { background: var(--accent-dim); }
.sc-tile:active { transform: scale(0.92); }
.sc-tile.hidden { display: none; }

.sc-tile.copied {
  background: var(--accent);
  border-color: var(--accent);
  color: #fff;
}

.sc-recent-row .sc-tile { font-size: 1.15rem; }

/* No results */
.sc-noresults {
  padding: 32px 16px;
  text-align: center;
  color: var(--text-3);
  font-size: 0.9375rem;
}

/* Toast */
.sc-toast {
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

.sc-toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

@media (max-width: 640px) {
  .sc-grid { grid-template-columns: repeat(auto-fill, minmax(42px, 1fr)); }
  .sc-tile { font-size: 1.15rem; }
  .sc-count { display: none; }
}
</style>

<!-- Special characters JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  /* Symbol library: [character, name] per category. All standard Unicode text glyphs. */
  var CATEGORIES = [
    { id: 'popular', name: 'Popular', items: [
      ["©","copyright"],["®","registered"],["™","trademark"],["°","degree"],["•","bullet"],["…","ellipsis"],
      ["—","em dash"],["–","en dash"],["·","middle dot"],["✓","check mark"],["✗","cross mark"],["★","star"],
      ["♥","heart"],["→","right arrow"],["€","euro"],["£","pound"],["¥","yen"],["§","section"],["¶","pilcrow"],
      ["№","numero"],["½","one half"],["×","multiply"],["÷","divide"],["±","plus minus"],["≈","approximately"],
      ["≠","not equal"],["«","left guillemet"],["»","right guillemet"],["“","left double quote"],["”","right double quote"],
      ["‘","left single quote"],["’","right single quote"],["†","dagger"],["‡","double dagger"],["‰","per mille"],
      ["¡","inverted exclamation"],["¿","inverted question"],["✔","check"],["✘","cross"],["☑","checkbox"]
    ]},
    { id: 'arrows', name: 'Arrows', items: [
      ["←","left arrow"],["→","right arrow"],["↑","up arrow"],["↓","down arrow"],["↔","left right arrow"],["↕","up down arrow"],
      ["↖","up left arrow"],["↗","up right arrow"],["↘","down right arrow"],["↙","down left arrow"],
      ["⇐","left double arrow"],["⇒","right double arrow"],["⇑","up double arrow"],["⇓","down double arrow"],["⇔","left right double arrow"],
      ["➜","arrow"],["➔","arrow"],["➤","arrowhead"],["➥","arrow"],["⟶","long right arrow"],["⟵","long left arrow"],["⟷","long left right arrow"],
      ["↩","arrow return left"],["↪","arrow return right"],["⤴","arrow up curve"],["⤵","arrow down curve"],["↻","clockwise arrow"],["↺","anticlockwise arrow"],
      ["⇄","left right arrows"],["⇅","up down arrows"],["⇆","left right arrows"],["▲","up triangle"],["▼","down triangle"],["◄","left triangle"],["►","right triangle"],
      ["‹","single left angle"],["›","single right angle"]
    ]},
    { id: 'currency', name: 'Currency', items: [
      ["$","dollar"],["€","euro"],["£","pound"],["¥","yen"],["¢","cent"],["₹","rupee"],["₽","ruble"],["₩","won"],
      ["₪","shekel"],["₫","dong"],["₴","hryvnia"],["₦","naira"],["₱","peso"],["฿","baht"],["₡","colon"],["₲","guarani"],
      ["₵","cedi"],["₸","tenge"],["₺","lira"],["₼","manat"],["₾","lari"],["₭","kip"],["₮","tugrik"],["¤","currency sign"],["ƒ","florin"],["৳","taka"]
    ]},
    { id: 'math', name: 'Math', items: [
      ["+","plus"],["−","minus"],["×","multiply"],["÷","divide"],["=","equals"],["≠","not equal"],["≈","approximately"],["≡","identical"],
      ["±","plus minus"],["∓","minus plus"],["∞","infinity"],["√","square root"],["∛","cube root"],["∑","sum"],["∏","product"],
      ["∫","integral"],["∂","partial"],["∇","nabla"],["∆","delta"],["∝","proportional"],["∅","empty set"],["∈","element of"],["∉","not element of"],
      ["⊂","subset"],["⊃","superset"],["⊆","subset equal"],["⊇","superset equal"],["∪","union"],["∩","intersection"],
      ["≤","less equal"],["≥","greater equal"],["≪","much less"],["≫","much greater"],["∴","therefore"],["∵","because"],["⋅","dot operator"],
      ["°","degree"],["′","prime"],["″","double prime"],["π","pi"],["∠","angle"],["⊥","perpendicular"],["∥","parallel"],["¬","not"],
      ["∧","and"],["∨","or"],["⊕","circled plus"],["⊗","circled times"],["%","percent"],["‰","per mille"],["⌈","left ceiling"],["⌉","right ceiling"],["⌊","left floor"],["⌋","right floor"]
    ]},
    { id: 'punctuation', name: 'Punctuation', items: [
      ["&","ampersand"],["@","at sign"],["#","hash"],["§","section"],["¶","pilcrow"],["†","dagger"],["‡","double dagger"],
      ["•","bullet"],["‣","triangular bullet"],["·","middle dot"],["…","ellipsis"],["‥","two dot leader"],["—","em dash"],["–","en dash"],["‐","hyphen"],
      ["¡","inverted exclamation"],["¿","inverted question"],["‽","interrobang"],["※","reference mark"],["°","degree"],["´","acute accent"],["`","grave accent"],
      ["¨","diaeresis"],["¯","macron"],["|","vertical bar"],["¦","broken bar"],["/","slash"],["\\","backslash"],["~","tilde"],["⁓","swung dash"],["_","underscore"],
      ["*","asterisk"],["⁂","asterism"],["‴","triple prime"],["№","numero"]
    ]},
    { id: 'quotes', name: 'Quotes & brackets', items: [
      ["“","left double quote"],["”","right double quote"],["‘","left single quote"],["’","right single quote"],["«","left guillemet"],["»","right guillemet"],
      ["‹","single left angle quote"],["›","single right angle quote"],["„","low double quote"],["‚","low single quote"],["\"","straight double quote"],["'","straight single quote"],
      ["「","corner bracket left"],["」","corner bracket right"],["『","white corner bracket left"],["』","white corner bracket right"],
      ["【","black lenticular left"],["】","black lenticular right"],["〈","angle bracket left"],["〉","angle bracket right"],["《","double angle left"],["》","double angle right"],
      ["⟨","math angle left"],["⟩","math angle right"],["(","left paren"],[")","right paren"],["[","left bracket"],["]","right bracket"],["{","left brace"],["}","right brace"],
      ["⌜","top left corner"],["⌝","top right corner"],["⌞","bottom left corner"],["⌟","bottom right corner"]
    ]},
    { id: 'stars', name: 'Stars & asterisks', items: [
      ["★","black star"],["☆","white star"],["✦","four point star"],["✧","white four point star"],["✩","star"],["✪","circled star"],["✫","star"],["✬","star"],["✭","star"],["✮","star"],["✯","star"],["✰","star"],
      ["✱","asterisk"],["✲","asterisk"],["✳","asterisk"],["✴","star"],["✵","star"],["✶","six point star"],["✷","star"],["✸","star"],["✹","star"],["✺","star"],["❂","circled star"],["❃","florette"],["❋","flower"],["❊","flower"],["⋆","star operator"],["∗","asterisk operator"],["⭐","glowing star"]
    ]},
    { id: 'checks', name: 'Checks & crosses', items: [
      ["✓","check mark"],["✔","heavy check"],["☑","checkbox checked"],["✅","white check"],["✗","ballot x"],["✘","heavy ballot x"],["✕","multiplication x"],["✖","heavy multiplication x"],["☒","checkbox x"],["❌","cross mark"],["❎","cross mark button"],["⊘","circled slash"],["✚","heavy plus"],["✛","open centre cross"],["✜","heavy open cross"]
    ]},
    { id: 'shapes', name: 'Hearts & shapes', items: [
      ["♥","black heart"],["♡","white heart"],["❤","red heart"],["❥","rotated heart"],["❣","heart exclamation"],["❦","floral heart"],["❧","rotated floral heart"],
      ["♦","diamond"],["♢","white diamond"],["♠","spade"],["♣","club"],["●","black circle"],["○","white circle"],["◎","bullseye"],["◐","half circle left"],["◑","half circle right"],
      ["■","black square"],["□","white square"],["▪","small black square"],["▫","small white square"],["◆","black diamond"],["◇","white diamond"],["◈","diamond in diamond"],
      ["▲","black up triangle"],["△","white up triangle"],["▼","black down triangle"],["▽","white down triangle"],["◀","black left triangle"],["▶","black right triangle"],
      ["◢","lower right triangle"],["◣","lower left triangle"],["◤","upper left triangle"],["◥","upper right triangle"],["⬟","black pentagon"],["⬠","white pentagon"]
    ]},
    { id: 'lines', name: 'Bullets & lines', items: [
      ["•","bullet"],["◦","white bullet"],["‣","triangular bullet"],["⁃","hyphen bullet"],["∙","bullet operator"],["▪","black small square"],["▫","white small square"],
      ["─","light horizontal"],["━","heavy horizontal"],["│","light vertical"],["┃","heavy vertical"],["═","double horizontal"],["║","double vertical"],
      ["┌","corner down right"],["┐","corner down left"],["└","corner up right"],["┘","corner up left"],["├","tee right"],["┤","tee left"],["┬","tee down"],["┴","tee up"],["┼","cross"],
      ["╭","arc down right"],["╮","arc down left"],["╯","arc up left"],["╰","arc up right"],["┅","dashed horizontal"],["┈","dotted horizontal"]
    ]},
    { id: 'accents', name: 'Accented letters', items: [
      ["à","a grave"],["á","a acute"],["â","a circumflex"],["ã","a tilde"],["ä","a umlaut"],["å","a ring"],["ā","a macron"],["ą","a ogonek"],
      ["ç","c cedilla"],["ć","c acute"],["č","c caron"],["é","e acute"],["è","e grave"],["ê","e circumflex"],["ë","e umlaut"],["ē","e macron"],["ę","e ogonek"],
      ["í","i acute"],["ì","i grave"],["î","i circumflex"],["ï","i umlaut"],["ī","i macron"],["ñ","n tilde"],["ń","n acute"],
      ["ó","o acute"],["ò","o grave"],["ô","o circumflex"],["õ","o tilde"],["ö","o umlaut"],["ø","o slash"],["ō","o macron"],
      ["ú","u acute"],["ù","u grave"],["û","u circumflex"],["ü","u umlaut"],["ū","u macron"],["ý","y acute"],["ÿ","y umlaut"],
      ["æ","ae"],["œ","oe"],["ß","sharp s"],["đ","d stroke"],["ł","l stroke"],["š","s caron"],["ž","z caron"],
      ["À","A grave"],["Á","A acute"],["Â","A circumflex"],["Ä","A umlaut"],["Å","A ring"],["Ç","C cedilla"],["É","E acute"],["È","E grave"],["Ê","E circumflex"],
      ["Ñ","N tilde"],["Ó","O acute"],["Ö","O umlaut"],["Ø","O slash"],["Ü","U umlaut"],["Æ","AE"],["Œ","OE"]
    ]},
    { id: 'greek', name: 'Greek letters', items: [
      ["α","alpha"],["β","beta"],["γ","gamma"],["δ","delta"],["ε","epsilon"],["ζ","zeta"],["η","eta"],["θ","theta"],["ι","iota"],["κ","kappa"],["λ","lambda"],["μ","mu"],
      ["ν","nu"],["ξ","xi"],["ο","omicron"],["π","pi"],["ρ","rho"],["σ","sigma"],["ς","final sigma"],["τ","tau"],["υ","upsilon"],["φ","phi"],["χ","chi"],["ψ","psi"],["ω","omega"],
      ["Α","Alpha"],["Β","Beta"],["Γ","Gamma"],["Δ","Delta"],["Ε","Epsilon"],["Ζ","Zeta"],["Η","Eta"],["Θ","Theta"],["Ι","Iota"],["Κ","Kappa"],["Λ","Lambda"],["Μ","Mu"],
      ["Ν","Nu"],["Ξ","Xi"],["Ο","Omicron"],["Π","Pi"],["Ρ","Rho"],["Σ","Sigma"],["Τ","Tau"],["Υ","Upsilon"],["Φ","Phi"],["Χ","Chi"],["Ψ","Psi"],["Ω","Omega"]
    ]},
    { id: 'numbers', name: 'Numbers & fractions', items: [
      ["½","one half"],["⅓","one third"],["⅔","two thirds"],["¼","one quarter"],["¾","three quarters"],["⅕","one fifth"],["⅖","two fifths"],["⅗","three fifths"],["⅘","four fifths"],
      ["⅙","one sixth"],["⅚","five sixths"],["⅛","one eighth"],["⅜","three eighths"],["⅝","five eighths"],["⅞","seven eighths"],["⅐","one seventh"],["⅑","one ninth"],["↉","zero thirds"],
      ["⁰","superscript 0"],["¹","superscript 1"],["²","superscript 2"],["³","superscript 3"],["⁴","superscript 4"],["⁵","superscript 5"],["⁶","superscript 6"],["⁷","superscript 7"],["⁸","superscript 8"],["⁹","superscript 9"],
      ["₀","subscript 0"],["₁","subscript 1"],["₂","subscript 2"],["₃","subscript 3"],["₄","subscript 4"],["⁺","superscript plus"],["⁻","superscript minus"],
      ["①","circled 1"],["②","circled 2"],["③","circled 3"],["④","circled 4"],["⑤","circled 5"],["⑥","circled 6"],["⑦","circled 7"],["⑧","circled 8"],["⑨","circled 9"],["⑩","circled 10"],
      ["Ⅰ","roman 1"],["Ⅱ","roman 2"],["Ⅲ","roman 3"],["Ⅳ","roman 4"],["Ⅴ","roman 5"],["Ⅵ","roman 6"],["Ⅶ","roman 7"],["Ⅷ","roman 8"],["Ⅸ","roman 9"],["Ⅹ","roman 10"]
    ]},
    { id: 'misc', name: 'Music & misc', items: [
      ["♩","quarter note"],["♪","eighth note"],["♫","beamed notes"],["♬","beamed sixteenth notes"],["♭","flat"],["♮","natural"],["♯","sharp"],
      ["☺","smiling face"],["☻","black smiling face"],["☹","frowning face"],["☀","sun"],["☁","cloud"],["☂","umbrella"],["☃","snowman"],["☄","comet"],
      ["☎","telephone"],["☏","white telephone"],["✉","envelope"],["✂","scissors"],["✏","pencil"],["✒","nib"],["✎","pencil"],
      ["⌘","command"],["⌥","option"],["⇧","shift"],["⌫","delete left"],["⏎","return"],["⌦","delete right"],
      ["⚠","warning"],["☢","radioactive"],["☣","biohazard"],["☯","yin yang"],["☮","peace"],["⚡","lightning"],["✈","airplane"],["⚓","anchor"],["⚙","gear"],
      ["⌛","hourglass"],["⌚","watch"],["⏳","hourglass flowing"],["⏰","alarm clock"],["☘","shamrock"],["⚑","flag"],["⚐","white flag"],["♻","recycle"],["⚕","medical"],["⚖","scales"]
    ]}
  ];

  var sections   = document.getElementById('sc-sections');
  var pillsWrap   = document.getElementById('sc-pills');
  var searchEl    = document.getElementById('sc-search');
  var countEl     = document.getElementById('sc-count');
  var toast       = document.getElementById('sc-toast');
  var noResults   = document.getElementById('sc-noresults');
  var recentWrap  = document.getElementById('sc-recent');
  var recentRow   = document.getElementById('sc-recent-row');

  var RECENT_KEY = 'tp-sym-recent';
  var activePill = 'all';
  var toastTimer = null;
  var totalCount = 0;

  /* Build a tile button safely via DOM (no HTML injection of characters) */
  function makeTile(ch, name) {
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'sc-tile';
    btn.textContent = ch;
    btn.title = name;
    btn.setAttribute('aria-label', name + ' — click to copy');
    btn.dataset.char = ch;
    btn.dataset.name = name.toLowerCase();
    return btn;
  }

  /* Build all sections and pills */
  function build() {
    var allPill = makePill('all', 'All');
    allPill.classList.add('active');
    pillsWrap.appendChild(allPill);

    CATEGORIES.forEach(function (cat) {
      pillsWrap.appendChild(makePill(cat.id, cat.name));

      var section = document.createElement('div');
      section.className = 'sc-section';
      section.dataset.cat = cat.id;

      var title = document.createElement('div');
      title.className = 'sc-section-title';
      title.textContent = cat.name;
      section.appendChild(title);

      var grid = document.createElement('div');
      grid.className = 'sc-grid';
      cat.items.forEach(function (it) {
        grid.appendChild(makeTile(it[0], it[1]));
        totalCount++;
      });
      section.appendChild(grid);
      sections.appendChild(section);
    });

    countEl.textContent = totalCount + ' symbols';
  }

  function makePill(id, label) {
    var b = document.createElement('button');
    b.type = 'button';
    b.className = 'sc-pill';
    b.textContent = label;
    b.dataset.cat = id;
    b.setAttribute('role', 'tab');
    b.addEventListener('click', function () {
      activePill = id;
      searchEl.value = '';
      pillsWrap.querySelectorAll('.sc-pill').forEach(function (p) {
        p.classList.toggle('active', p.dataset.cat === id);
      });
      applyFilter();
    });
    return b;
  }

  /* Copy handling via delegation */
  function copyChar(ch, tile) {
    var done = function () {
      showToast('Copied  ' + ch);
      if (tile) {
        tile.classList.add('copied');
        setTimeout(function () { tile.classList.remove('copied'); }, 550);
      }
      addRecent(ch);
    };
    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(ch).then(done, function () { fallbackCopy(ch, done); });
    } else {
      fallbackCopy(ch, done);
    }
  }

  function fallbackCopy(ch, done) {
    var ta = document.createElement('textarea');
    ta.value = ch;
    ta.style.position = 'fixed';
    ta.style.left = '-9999px';
    document.body.appendChild(ta);
    ta.focus();
    ta.select();
    try { document.execCommand('copy'); done(); } catch (e) {}
    document.body.removeChild(ta);
  }

  sections.addEventListener('click', function (e) {
    var tile = e.target.closest('.sc-tile');
    if (tile) copyChar(tile.dataset.char, tile);
  });

  recentRow.addEventListener('click', function (e) {
    var tile = e.target.closest('.sc-tile');
    if (tile) copyChar(tile.dataset.char, tile);
  });

  function showToast(msg) {
    toast.textContent = msg;
    toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () { toast.classList.remove('show'); }, 1400);
  }

  /* Recently copied */
  function getRecent() {
    try { return JSON.parse(localStorage.getItem(RECENT_KEY)) || []; } catch (e) { return []; }
  }

  function addRecent(ch) {
    var list = getRecent().filter(function (c) { return c !== ch; });
    list.unshift(ch);
    list = list.slice(0, 24);
    try { localStorage.setItem(RECENT_KEY, JSON.stringify(list)); } catch (e) {}
    renderRecent();
  }

  function renderRecent() {
    var list = getRecent();
    if (!list.length) { recentWrap.classList.add('hidden'); return; }
    recentWrap.classList.remove('hidden');
    recentRow.innerHTML = '';
    list.forEach(function (ch) {
      recentRow.appendChild(makeTile(ch, 'recently copied'));
    });
  }

  /* Filtering: search overrides pill; pill shows one category */
  function applyFilter() {
    var q = searchEl.value.trim().toLowerCase();
    var anyVisible = false;

    document.querySelectorAll('.sc-section').forEach(function (section) {
      var cat = section.dataset.cat;
      var sectionHasVisible = false;

      section.querySelectorAll('.sc-tile').forEach(function (tile) {
        var show;
        if (q) {
          show = tile.dataset.name.indexOf(q) !== -1 || tile.dataset.char === q;
        } else {
          show = (activePill === 'all' || activePill === cat);
        }
        tile.classList.toggle('hidden', !show);
        if (show) sectionHasVisible = true;
      });

      section.classList.toggle('hidden', !sectionHasVisible);
      if (sectionHasVisible) anyVisible = true;
    });

    noResults.classList.toggle('hidden', anyVisible);
  }

  searchEl.addEventListener('input', function () {
    if (searchEl.value.trim()) {
      activePill = 'all';
      pillsWrap.querySelectorAll('.sc-pill').forEach(function (p) {
        p.classList.toggle('active', p.dataset.cat === 'all');
      });
    }
    applyFilter();
  });

  build();
  renderRecent();
  applyFilter();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
