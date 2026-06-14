<?php
$tool_slug   = 'fancy-text-generator';
$tool_name   = 'Fancy Text Generator';

$page_title  = 'Fancy Text Generator — Bold, Italic, Cursive & 14 Unicode Styles | TextlyPop';
$meta_desc   = 'Convert normal text into fancy Unicode styles instantly — bold, italic, cursive, bubble letters, fraktur, strikethrough, upside down and more. Perfect for Instagram bios, Twitter names, and Discord.';
$canonical_url = 'https://textlypop.com/tools/fancy-text-generator';
$og_title    = 'Free Fancy Text Generator — 14 Unicode Styles | TextlyPop';
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
  "name": "Fancy Text Generator",
  "url": "https://textlypop.com/tools/fancy-text-generator",
  "description": "Convert normal text into 14 Unicode styles — bold, italic, cursive, bubble letters, fraktur, double struck, strikethrough, upside down and more.",
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
      "name": "How do I make fancy text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Type or paste your text into the input box and all 14 Unicode styles update instantly below. Click Copy next to any style to copy it to your clipboard, then paste it anywhere."
      }
    },
    {
      "@type": "Question",
      "name": "Where can I use fancy text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Fancy Unicode text works on any platform that supports Unicode — Instagram bios, Twitter display names, Discord usernames and server names, TikTok bios, YouTube channel names, Facebook posts, WhatsApp messages, Reddit posts, and most modern websites and apps."
      }
    },
    {
      "@type": "Question",
      "name": "Why does fancy text work on Instagram and Discord?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The stylized characters are standard Unicode code points — specific characters like 𝐁 (Mathematical Bold Capital B) that happen to look bold, italic, or cursive. Because they are real text characters, not images or fonts, they paste and display anywhere Unicode text is accepted."
      }
    },
    {
      "@type": "Question",
      "name": "Will fancy text look the same on all devices?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Bold, italic, bubble, and wide styles are supported on virtually all modern devices. Fraktur and Double Struck may appear as squares on very old or limited devices. Strikethrough and underline use combining Unicode characters and work reliably on most platforms."
      }
    },
    {
      "@type": "Question",
      "name": "Is fancy text searchable on Instagram?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Not reliably. Instagram search indexes the underlying Unicode code points, not the visual appearance — a bold B and a plain B are different characters. The visual display in bios and display names works correctly, but searchability by the styled form is not guaranteed."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= get_howto_schema(
    'How to Generate Fancy Text',
    'Convert normal text into stylised Unicode variants using the TextlyPop Fancy Text Generator.',
    [
        ['name' => 'Type your text', 'text' => 'Click the input box and type or paste the text you want to convert. All 14 Unicode styles update instantly as you type.'],
        ['name' => 'Browse the styles', 'text' => 'Scroll through the style cards — Bold, Italic, Cursive, Bubble Letters, Fraktur, Strikethrough, Upside Down and more. Each card shows your text in that style.'],
        ['name' => 'Copy the result', 'text' => 'Click the Copy button on any style card to copy that version of your text to your clipboard.'],
        ['name' => 'Paste anywhere', 'text' => 'Paste the copied fancy text into Instagram, Twitter, Discord, TikTok, or any other platform that accepts Unicode text.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Fancy text generator</h1>
    <p>Type your text and get it converted into 14 Unicode styles instantly — bold, italic, cursive, bubble letters, fraktur, strikethrough, upside down and more.</p>
  </div>

  <div class="ftg-tool" id="ftg-tool">

    <!-- Input -->
    <div class="ftg-input-wrap">
      <div class="ftg-input-header">
        <label for="ftg-input" class="ftg-input-label">Your text</label>
        <div class="ftg-input-actions">
          <span class="ftg-count" id="ftg-count">0 characters</span>
          <button class="btn btn-clear" data-targets="ftg-input">Clear</button>
        </div>
      </div>
      <textarea
        id="ftg-input"
        class="ftg-input"
        placeholder="Type or paste your text — all 14 styles update instantly…"
        data-save-key="fancy-text-generator"
        spellcheck="true"
        rows="3"
        aria-label="Text to convert to fancy Unicode styles"></textarea>
    </div>

    <!-- Hint bar -->
    <div class="ftg-hint" role="note">
      <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
        <circle cx="8" cy="8" r="6"/>
        <line x1="8" y1="5" x2="8" y2="8"/>
        <circle cx="8" cy="11" r="0.5" fill="currentColor"/>
      </svg>
      Click <strong>Copy</strong> on any style to copy it — paste it into Instagram, Discord, Twitter, or anywhere
    </div>

    <!-- Style cards grid -->
    <div class="ftg-grid" id="ftg-grid" role="list" aria-label="Fancy text styles">

      <?php
      $ftg_styles = [
        ['id' => 'bold',          'name' => 'Bold',          'example' => '𝐁𝐨𝐥𝐝'],
        ['id' => 'italic',        'name' => 'Italic',        'example' => '𝐼𝑡𝑎𝑙𝑖𝑐'],
        ['id' => 'bold-italic',   'name' => 'Bold Italic',   'example' => '𝑩𝒐𝒍𝒅 𝑰𝒕𝒂𝒍𝒊𝒄'],
        ['id' => 'cursive',       'name' => 'Cursive',       'example' => '𝒞𝓊𝓇𝓈𝒾𝓋𝑒'],
        ['id' => 'bold-cursive',  'name' => 'Bold Cursive',  'example' => '𝓑𝓸𝓵𝓭 𝓒𝓾𝓻𝓼𝓲𝓿𝓮'],
        ['id' => 'fraktur',       'name' => 'Fraktur',       'example' => '𝔉𝔯𝔞𝔨𝔱𝔲𝔯'],
        ['id' => 'double-struck', 'name' => 'Double Struck', 'example' => '𝔻𝕠𝕦𝕓𝕝𝕖 𝕊𝕥𝕣𝕦𝕔𝕜'],
        ['id' => 'monospace',     'name' => 'Monospace',     'example' => '𝙼𝚘𝚗𝚘𝚜𝚙𝚊𝚌𝚎'],
        ['id' => 'bubble',        'name' => 'Bubble',        'example' => 'Ⓑⓤⓑⓑⓛⓔ'],
        ['id' => 'strikethrough', 'name' => 'Strikethrough', 'example' => 'S̶t̶r̶i̶k̶e̶t̶h̶r̶o̶u̶g̶h̶'],
        ['id' => 'underline',     'name' => 'Underline',     'example' => 'U̲n̲d̲e̲r̲l̲i̲n̲e̲'],
        ['id' => 'small-caps',    'name' => 'Small Caps',    'example' => 'Sᴍᴀʟʟ Cᴀᴘs'],
        ['id' => 'wide',          'name' => 'Wide',          'example' => 'Ｗｉｄｅ'],
        ['id' => 'upside-down',   'name' => 'Upside Down',   'example' => 'uʍop ǝpᴉsd∩'],
      ];
      ?>

      <?php foreach ($ftg_styles as $s): ?>
      <div class="ftg-card" role="listitem">
        <div class="ftg-card-header">
          <span class="ftg-card-name"><?= e($s['name']) ?></span>
          <button class="ftg-copy-btn" data-target="ftg-<?= e($s['id']) ?>" aria-label="Copy <?= e($s['name']) ?> style">Copy</button>
        </div>
        <div class="ftg-card-text is-placeholder" id="ftg-<?= e($s['id']) ?>" aria-live="polite"><?= $s['example'] ?></div>
      </div>
      <?php endforeach; ?>

    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="ftg-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="ftg-input" data-to-tool="case-converter">Case converter</button>
    <button class="send-to-btn" data-from="ftg-input" data-to-tool="find-and-replace">Find and replace</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">L</kbd> clear
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

    <h2>What is a fancy text generator?</h2>
    <p>A fancy text generator converts ordinary letters and numbers into Unicode equivalents that look like different fonts — bold, italic, cursive, bubble letters, and more. These stylised characters are actual Unicode code points defined in the Mathematical Alphanumeric Symbols and Enclosed Alphanumerics blocks. Because they are standard text characters and not images or custom fonts, they paste and display correctly on any platform that renders Unicode text.</p>

    <h2>How Unicode fancy text works</h2>
    <p>Standard Latin letters A through Z are Unicode code points 65 to 90. The Unicode standard also defines parallel sets of characters that look like styled versions of those letters. Mathematical Bold Capital A is code point 119808 (𝐀). Mathematical Script Capital A is code point 119964 (𝒜). Enclosed Alphanumeric Ⓐ is code point 9398. When you type A into this tool and choose Bold, the output character is 𝐀 — a completely different Unicode character that happens to look like a bold A. Platforms like Instagram, Discord, and Twitter render it correctly because they support full Unicode text rendering.</p>

    <h2>The 14 styles explained</h2>
    <p><strong>Bold</strong> uses Mathematical Bold characters. The most universally supported fancy style — works reliably on every major platform. <strong>Italic</strong> uses Mathematical Italic characters, also widely supported. <strong>Bold Italic</strong> combines both for emphasis. <strong>Cursive</strong> uses Mathematical Script characters for a handwritten look. <strong>Bold Cursive</strong> uses the heavier Mathematical Bold Script variant, popular for Instagram bios.</p>
    <p><strong>Fraktur</strong> uses the traditional Germanic blackletter characters. <strong>Double Struck</strong> is the blackboard bold used in mathematics for number sets like ℝ and ℕ. <strong>Monospace</strong> uses fixed-width Mathematical Monospace characters, good for code-style text. <strong>Bubble</strong> wraps each letter in a circle using the Enclosed Alphanumerics block — popular for usernames.</p>
    <p><strong>Strikethrough</strong> and <strong>Underline</strong> apply Unicode combining diacritics after each character so they work on any base text in any style. <strong>Small Caps</strong> replaces lowercase letters with their small capital equivalents for a typographic look. <strong>Wide</strong> uses Fullwidth Latin characters for a spaced-out aesthetic. <strong>Upside Down</strong> maps each character to its 180-degree rotated equivalent and reverses the string so it reads correctly when physically flipped.</p>

    <h2>Best uses for fancy text</h2>
    <p>Instagram bios benefit from bold or cursive text that stands out in profile search results and headers without requiring any special permissions. Twitter display names in bold catch attention in timelines and notifications. Discord supports Unicode in server names, channel names, usernames, and status messages — aesthetic servers frequently use fraktur or double-struck text. TikTok bios have no native formatting so Unicode bold headings are the primary way to create visual structure. Bloggers and newsletter writers use fancy text in headings shared as screenshots. Puzzle makers use upside-down and bubble text in riddles and escape room clues.</p>

    <h2>Platform compatibility</h2>
    <p>Bold, italic, and bubble styles render correctly on virtually every modern device including iOS, Android, Windows, and macOS. Fraktur and Double Struck may show as empty squares on older Android devices using limited system fonts or basic SMS clients. Combining character styles (Strikethrough and Underline) work on most platforms but may render inconsistently in some email clients. The Wide style uses Fullwidth characters that are well supported but may look unusual in right-to-left text contexts. Test any style by pasting it into your target platform before publishing to confirm it renders as expected.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I make fancy text?</p>
      <p class="faq-a">Type or paste your text into the input box and all 14 styles appear instantly. Click Copy on any style card to copy it to your clipboard, then paste it wherever you need it.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Where can I use fancy text?</p>
      <p class="faq-a">Anywhere that accepts Unicode text — Instagram bios, Twitter names, Discord usernames, TikTok bios, YouTube channel names, WhatsApp messages, Facebook posts, Reddit, and most websites and apps.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does fancy text work on Instagram and Discord?</p>
      <p class="faq-a">The styled characters are standard Unicode code points — specific characters that look bold, italic, or cursive. Because they are real text characters and not images or fonts, they paste and display correctly anywhere Unicode text is supported.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Will fancy text look the same on all devices?</p>
      <p class="faq-a">Most styles render consistently on modern devices. Fraktur and Double Struck may appear as squares on very old or limited devices. Strikethrough and underline are reliable across most platforms.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is fancy text searchable on Instagram?</p>
      <p class="faq-a">Not reliably. Instagram sees the underlying Unicode code points, not the visual appearance. A bold B (𝐁) and a plain B are different characters. The visual display in bios works correctly but search by the styled form is inconsistent.</p>
    </div>

  </div>

</div>

<style>
.ftg-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Input */
.ftg-input-wrap {
  border-bottom: 1px solid var(--border);
}

.ftg-input-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
  gap: 12px;
}

.ftg-input-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.ftg-input-actions {
  display: flex;
  align-items: center;
  gap: 12px;
}

.ftg-count {
  font-size: 0.8125rem;
  color: var(--text-3);
}

.ftg-input {
  width: 100%;
  min-height: 80px;
  padding: 14px 16px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 1rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
  box-sizing: border-box;
}

.ftg-input::placeholder { color: var(--text-3); }

/* Hint bar */
.ftg-hint {
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 9px 16px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
  font-size: 0.8125rem;
  color: var(--text-3);
}

/* Style card grid */
.ftg-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
}

.ftg-card {
  border-bottom: 1px solid var(--border);
  border-right: 1px solid var(--border);
}

.ftg-card:nth-child(even) { border-right: none; }
.ftg-card:nth-last-child(-n+2) { border-bottom: none; }

.ftg-card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
}

.ftg-card-name {
  font-size: 0.6875rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  color: var(--text-3);
}

.ftg-copy-btn {
  padding: 2px 10px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.75rem;
  font-weight: 500;
  cursor: pointer;
  transition: border-color var(--transition), color var(--transition), background var(--transition);
  white-space: nowrap;
}

.ftg-copy-btn:hover { border-color: var(--accent); color: var(--accent); }

.ftg-copy-btn.copied {
  border-color: var(--accent);
  background: var(--accent-light);
  color: var(--accent-dark);
}
[data-theme="dark"] .ftg-copy-btn.copied { background: var(--accent-dim); color: #5DCAA5; }

.ftg-card-text {
  padding: 12px 14px;
  font-size: 1.0625rem;
  color: var(--text);
  line-height: 1.6;
  min-height: 50px;
  word-break: break-word;
  overflow-wrap: break-word;
  user-select: all;
  cursor: text;
}

.ftg-card-text.is-placeholder { color: var(--text-3); font-size: 0.9375rem; }

@media (max-width: 620px) {
  .ftg-grid { grid-template-columns: 1fr; }
  .ftg-card { border-right: none; }
  .ftg-card:nth-last-child(-n+2) { border-bottom: 1px solid var(--border); }
  .ftg-card:last-child { border-bottom: none; }
}
</style>

<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input   = document.getElementById('ftg-input');
  var countEl = document.getElementById('ftg-count');

  /* ── Unicode lookup tables ─────────────────────────────────────
     Array.from() handles surrogate pairs so SMP chars count as 1  */
  var SCRIPT_UP  = '𝒜ℬ𝒞𝒟ℰℱ𝒢ℋℐ𝒥𝒦ℒℳ𝒩𝒪𝒫𝒬ℛ𝒮𝒯𝒰𝒱𝒲𝒳𝒴𝒵';
  var SCRIPT_LO  = '𝒶𝒷𝒸𝒹ℯ𝒻ℊ𝒽𝒾𝒿𝓀𝓁𝓂𝓃ℴ𝓅𝓆𝓇𝓈𝓉𝓊𝓋𝓌𝓍𝓎𝓏';
  var FRAK_UP    = '𝔄𝔅ℭ𝔇𝔈𝔉𝔊ℌℑ𝔍𝔎𝔏𝔐𝔑𝔒𝔓𝔔ℜ𝔖𝔗𝔘𝔙𝔚𝔛𝔜ℨ';
  var FRAK_LO    = '𝔞𝔟𝔠𝔡𝔢𝔣𝔤𝔥𝔦𝔧𝔨𝔩𝔪𝔫𝔬𝔭𝔮𝔯𝔰𝔱𝔲𝔳𝔴𝔵𝔶𝔷';
  var DBL_UP     = '𝔸𝔹ℂ𝔻𝔼𝔽𝔾ℍ𝕀𝕁𝕂𝕃𝕄ℕ𝕆ℙℚℝ𝕊𝕋𝕌𝕍𝕎𝕏𝕐ℤ';
  var DBL_LO     = '𝕒𝕓𝕔𝕕𝕖𝕗𝕘𝕙𝕚𝕛𝕜𝕝𝕞𝕟𝕠𝕡𝕢𝕣𝕤𝕥𝕦𝕧𝕨𝕩𝕪𝕫';
  var SCAP_LO    = 'ᴀʙᴄᴅᴇꜰɢʜɪᴊᴋʟᴍɴᴏᴘqʀꜱᴛᴜᴠᴡxʏᴢ';
  var FLIP_UP    = '∀qƆpƎⅎ⅁HIɾʞ˥WNOԀQᴚS⊥∩∧MX⅄Z';
  var FLIP_LO    = 'ɐqɔpǝɟƃɥᴉɾʞlɯuodbɹsʇnʌʍxʎz';

  /* lookup: index into a multi-codepoint string by alphabet position */
  function tbl(t, c, base) {
    var a = Array.from(t), i = c.codePointAt(0) - base;
    return (i >= 0 && i < a.length) ? a[i] : c;
  }

  /* offset: sequential Unicode block */
  function ofs(c, base, charBase) {
    return String.fromCodePoint(base + c.codePointAt(0) - charBase);
  }

  /* per-character converters */
  function cBold(c) {
    var n = c.codePointAt(0);
    if (n >= 65  && n <= 90)  return ofs(c, 0x1D400, 65);
    if (n >= 97  && n <= 122) return ofs(c, 0x1D41A, 97);
    if (n >= 48  && n <= 57)  return ofs(c, 0x1D7CE, 48);
    return c;
  }

  function cItalic(c) {
    var n = c.codePointAt(0);
    if (n >= 65  && n <= 90)  return ofs(c, 0x1D434, 65);
    if (n === 104) return 'ℎ';          /* h → planck constant ℎ */
    if (n >= 97  && n <= 122) return ofs(c, 0x1D44E, 97);
    return c;
  }

  function cBoldItalic(c) {
    var n = c.codePointAt(0);
    if (n >= 65  && n <= 90)  return ofs(c, 0x1D468, 65);
    if (n >= 97  && n <= 122) return ofs(c, 0x1D482, 97);
    return c;
  }

  function cScript(c)     { var n = c.codePointAt(0); return (n>=65&&n<=90) ? tbl(SCRIPT_UP,c,65) : (n>=97&&n<=122) ? tbl(SCRIPT_LO,c,97) : c; }
  function cFraktur(c)    { var n = c.codePointAt(0); return (n>=65&&n<=90) ? tbl(FRAK_UP,c,65)   : (n>=97&&n<=122) ? tbl(FRAK_LO,c,97)   : c; }
  function cDblStruck(c)  { var n = c.codePointAt(0); return (n>=65&&n<=90) ? tbl(DBL_UP,c,65) : (n>=97&&n<=122) ? tbl(DBL_LO,c,97) : (n>=48&&n<=57) ? ofs(c,0x1D7D8,48) : c; }
  function cSmCaps(c)     { var n = c.codePointAt(0); return (n>=97&&n<=122) ? tbl(SCAP_LO,c,97) : c; }

  function cBoldScript(c) {
    var n = c.codePointAt(0);
    if (n >= 65  && n <= 90)  return ofs(c, 0x1D4D0, 65);
    if (n >= 97  && n <= 122) return ofs(c, 0x1D4EA, 97);
    return c;
  }

  function cMono(c) {
    var n = c.codePointAt(0);
    if (n >= 65  && n <= 90)  return ofs(c, 0x1D670, 65);
    if (n >= 97  && n <= 122) return ofs(c, 0x1D68A, 97);
    if (n >= 48  && n <= 57)  return ofs(c, 0x1D7F6, 48);
    return c;
  }

  function cBubble(c) {
    var n = c.codePointAt(0);
    if (n >= 65  && n <= 90)  return ofs(c, 0x24B6, 65);
    if (n >= 97  && n <= 122) return ofs(c, 0x24D0, 97);
    if (n === 48) return '⓪';
    if (n >= 49  && n <= 57)  return ofs(c, 0x2460, 49);
    return c;
  }

  function cWide(c) {
    var n = c.codePointAt(0);
    if (n >= 65  && n <= 90)  return ofs(c, 0xFF21, 65);
    if (n >= 97  && n <= 122) return ofs(c, 0xFF41, 97);
    if (n >= 48  && n <= 57)  return ofs(c, 0xFF10, 48);
    if (n === 32) return '　';
    return c;
  }

  /* whole-string converters */
  function sStrike(str)    { return Array.from(str).map(function(c){ return c+'̶'; }).join(''); }
  function sUnderline(str) { return Array.from(str).map(function(c){ return c+'̲'; }).join(''); }

  function sUpsideDown(str) {
    return Array.from(str).map(function(c) {
      var n = c.codePointAt(0);
      if (n >= 65 && n <= 90)  return tbl(FLIP_UP, c, 65);
      if (n >= 97 && n <= 122) return tbl(FLIP_LO, c, 97);
      return c;
    }).reverse().join('');
  }

  function perChar(fn) {
    return function(str) { return Array.from(str).map(fn).join(''); };
  }

  /* style definitions */
  var STYLES = [
    { id: 'bold',          fn: perChar(cBold) },
    { id: 'italic',        fn: perChar(cItalic) },
    { id: 'bold-italic',   fn: perChar(cBoldItalic) },
    { id: 'cursive',       fn: perChar(cScript) },
    { id: 'bold-cursive',  fn: perChar(cBoldScript) },
    { id: 'fraktur',       fn: perChar(cFraktur) },
    { id: 'double-struck', fn: perChar(cDblStruck) },
    { id: 'monospace',     fn: perChar(cMono) },
    { id: 'bubble',        fn: perChar(cBubble) },
    { id: 'strikethrough', fn: sStrike },
    { id: 'underline',     fn: sUnderline },
    { id: 'small-caps',    fn: perChar(cSmCaps) },
    { id: 'wide',          fn: perChar(cWide) },
    { id: 'upside-down',   fn: sUpsideDown },
  ];

  /* placeholder text shown when input is empty */
  var PLACEHOLDERS = {
    'bold':          '𝐁𝐨𝐥𝐝',
    'italic':        '𝐼𝑡𝑎𝑙𝑖𝑐',
    'bold-italic':   '𝑩𝒐𝒍𝒅 𝑰𝒕𝒂𝒍𝒊𝒄',
    'cursive':       '𝒞𝓊𝓇𝓈𝒾𝓋𝑒',
    'bold-cursive':  '𝓑𝓸𝓵𝓭 𝓒𝓾𝓻𝓼𝓲𝓿𝓮',
    'fraktur':       '𝔉𝔯𝔞𝔨𝔱𝔲𝔯',
    'double-struck': '𝔻𝕠𝕦𝕓𝕝𝕖 𝕊𝕥𝕣𝕦𝕔𝕜',
    'monospace':     '𝙼𝚘𝚗𝚘𝚜𝚙𝚊𝚌𝚎',
    'bubble':        'Ⓑⓤⓑⓑⓛⓔ',
    'strikethrough': 'S̶t̶r̶i̶k̶e̶t̶h̶r̶o̶u̶g̶h̶',
    'underline':     'U̲n̲d̲e̲r̲l̲i̲n̲e̲',
    'small-caps':    'Sᴍᴀʟʟ Cᴀᴘs',
    'wide':          'Ｗｉｄｅ',
    'upside-down':   'uʍop ǝpᴉsd∩',
  };

  /* ── Update all cards ── */
  function update() {
    var text = input.value;
    var len  = Array.from(text).length;
    countEl.textContent = len.toLocaleString() + ' character' + (len !== 1 ? 's' : '');

    STYLES.forEach(function(style) {
      var el = document.getElementById('ftg-' + style.id);
      if (!el) return;
      if (text) {
        el.textContent = style.fn(text);
        el.classList.remove('is-placeholder');
      } else {
        el.textContent = PLACEHOLDERS[style.id] || '';
        el.classList.add('is-placeholder');
      }
    });
  }

  /* ── Copy buttons ── */
  document.querySelectorAll('.ftg-copy-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var el = document.getElementById(btn.dataset.target);
      if (!el || el.classList.contains('is-placeholder')) return;
      var text = el.textContent;
      if (!text) return;

      function onCopied() {
        var orig = btn.textContent;
        btn.textContent = 'Copied!';
        btn.classList.add('copied');
        setTimeout(function() {
          btn.textContent = orig;
          btn.classList.remove('copied');
        }, 2000);
      }

      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(onCopied).catch(fallback);
      } else {
        fallback();
      }

      function fallback() {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.style.cssText = 'position:fixed;opacity:0;top:0;left:0';
        document.body.appendChild(ta);
        ta.select();
        try { document.execCommand('copy'); onCopied(); } catch(e) {}
        document.body.removeChild(ta);
      }
    });
  });

  input.addEventListener('input', update);
  update();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
