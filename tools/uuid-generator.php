<?php
$tool_slug   = 'uuid-generator';
$tool_name   = 'UUID Generator';

$page_title  = 'UUID Generator — Random UUID & GUID v4 | TextlyPop';
$meta_desc   = 'Generate random version 4 UUIDs (GUIDs) instantly. Bulk generation, uppercase and no-hyphen options. Free online UUID generator. No signup required.';
$canonical_url = 'https://textlypop.com/tools/uuid-generator';
$og_title    = 'Free UUID / GUID Generator — TextlyPop';
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
  "name": "UUID Generator",
  "url": "https://textlypop.com/tools/uuid-generator",
  "description": "Generate random version 4 UUIDs (GUIDs) instantly. Bulk generation, uppercase and no-hyphen options. Cryptographically secure.",
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
      "name": "What is a UUID and how is it different from a GUID?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A UUID (Universally Unique Identifier) is a 128-bit value written as 32 hexadecimal digits in five hyphen-separated groups, such as 550e8400-e29b-41d4-a716-446655440000. GUID (Globally Unique Identifier) is Microsoft's name for the very same thing — the two terms are interchangeable, though GUID is more common in .NET and Windows contexts while UUID is standard everywhere else. Both follow the same format and can be used wherever the other is expected."
      }
    },
    {
      "@type": "Question",
      "name": "What is a version 4 UUID?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Version 4 is the random UUID: 122 of its 128 bits are filled with random data, while the remaining 6 bits are fixed to mark the version (4) and variant. This tool generates version 4 UUIDs, which are the most widely used kind because they need no central authority, no network access and no timestamp — just a good source of randomness. You can spot a version 4 UUID by the digit 4 at the start of the third group."
      }
    },
    {
      "@type": "Question",
      "name": "Are randomly generated UUIDs really unique?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Not guaranteed unique, but unique enough that collisions are effectively impossible in practice. With 122 random bits there are about 5.3 undecillion possible version 4 UUIDs. You would need to generate roughly 2.7 quintillion of them before there was even a one-in-a-billion chance of any two matching. For virtually every application — database keys, session tokens, file names — treating them as unique is completely safe."
      }
    },
    {
      "@type": "Question",
      "name": "Are these UUIDs safe to use as secrets or security tokens?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "This generator uses the browser's cryptographically secure crypto.getRandomValues(), so version 4 UUIDs produced here are unpredictable and generated entirely on your device. They are suitable as hard-to-guess identifiers such as password-reset links or invitation tokens. That said, a UUID carries only 122 bits of entropy and is designed as an identifier, not a credential — for high-value secrets, a dedicated token of appropriate length is still the better choice."
      }
    },
    {
      "@type": "Question",
      "name": "Why would I remove the hyphens or use uppercase UUIDs?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The hyphens are purely cosmetic — the canonical format includes them, but the 32 hex digits carry all the meaning, so removing them saves space in URLs, filenames or compact database columns. Uppercase is common in Microsoft and Windows systems, where GUIDs are often shown in capitals and sometimes wrapped in braces. Both options here change only the presentation; the underlying value is identical, so a hyphen-free lowercase UUID and its uppercase braced form refer to the same identifier."
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
        ['name' => 'Choose how many UUIDs', 'text' => 'Set the count field to generate a single UUID or up to 100 at once with the same formatting options.'],
        ['name' => 'Set formatting options', 'text' => 'Toggle uppercase to produce capitalised UUIDs, and toggle hyphens off for a compact 32-character form.'],
        ['name' => 'Click Generate', 'text' => 'Click Generate to create fresh version 4 UUIDs instantly using cryptographically secure randomness.'],
        ['name' => 'Copy the result', 'text' => 'Click Copy to copy a single UUID, or Copy all to copy the whole list to your clipboard.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>UUID generator</h1>
    <p>Generate random version 4 UUIDs (GUIDs) instantly. Cryptographically secure. Bulk generation supported.</p>
  </div>

  <div class="uu-tool" id="uu-tool">

    <!-- Main UUID display -->
    <div class="uu-display">
      <div class="uu-value-wrap">
        <input
          type="text"
          id="uu-value"
          class="uu-value"
          readonly
          aria-label="Generated UUID"
          aria-live="polite">
        <button class="uu-refresh-btn" id="uu-refresh" title="Generate new UUID" aria-label="Generate new UUID">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
            <path d="M21 3v5h-5"/>
            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
            <path d="M8 16H3v5"/>
          </svg>
        </button>
      </div>

      <button class="btn btn-primary uu-copy-btn" id="uu-copy-btn">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <rect x="5" y="5" width="9" height="9" rx="1.5"/>
          <path d="M11 5V3.5A1.5 1.5 0 0 0 9.5 2h-6A1.5 1.5 0 0 0 2 3.5v6A1.5 1.5 0 0 0 3.5 11H5"/>
        </svg>
        Copy UUID
      </button>
    </div>

    <!-- Settings -->
    <div class="uu-settings">

      <!-- Format options -->
      <div class="uu-char-types">
        <div class="uu-char-type">
          <div class="uu-char-type-left">
            <label class="uu-char-toggle">
              <input type="checkbox" id="uu-uppercase">
              <span class="uu-char-type-name">Uppercase</span>
            </label>
            <span class="uu-char-example">A B C D E F</span>
          </div>
        </div>

        <div class="uu-char-type">
          <div class="uu-char-type-left">
            <label class="uu-char-toggle">
              <input type="checkbox" id="uu-hyphens" checked>
              <span class="uu-char-type-name">Include hyphens</span>
            </label>
            <span class="uu-char-example">8-4-4-4-12</span>
          </div>
        </div>

        <div class="uu-char-type">
          <div class="uu-char-type-left">
            <label class="uu-char-toggle">
              <input type="checkbox" id="uu-braces">
              <span class="uu-char-type-name">Wrap in braces</span>
            </label>
            <span class="uu-char-example">{ … }</span>
          </div>
        </div>
      </div>

      <!-- Count + generate -->
      <div class="uu-bottom-row">
        <div class="uu-count-wrap">
          <label class="uu-setting-label" for="uu-count">Generate</label>
          <div class="uu-count-input-wrap">
            <input type="number" id="uu-count" class="uu-count-num" value="1" min="1" max="100" aria-label="Number of UUIDs to generate">
            <span class="uu-count-label">UUID(s)</span>
          </div>
        </div>
        <button class="btn btn-primary" id="uu-generate">Generate</button>
      </div>

    </div>

    <!-- Multiple UUIDs output -->
    <div class="uu-multi-wrap hidden" id="uu-multi-wrap">
      <div class="uu-multi-header">
        <span class="uu-multi-title" id="uu-multi-title">Generated UUIDs</span>
        <button class="btn btn-ghost" id="uu-copy-all">Copy all</button>
      </div>
      <div class="uu-multi-list" id="uu-multi-list"></div>
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

  <!-- SEO + GEO content -->
  <div class="tool-content mt-32">

    <h2>About the UUID</h2>
    <p>A UUID, or Universally Unique Identifier, is a 128-bit label used to identify information without a central coordinating authority. It is written as 32 hexadecimal digits split into five groups separated by hyphens — 8-4-4-4-12, as in <code>550e8400-e29b-41d4-a716-446655440000</code>. The whole point of a UUID is that two parties can each generate one independently, with no shared database and no network connection, and be practically certain the values will never collide. That makes UUIDs the default choice for database primary keys, distributed systems, message identifiers, and any situation where an auto-incrementing number would force everything through a single bottleneck.</p>

    <h2>History of the UUID</h2>
    <p>UUIDs grew out of the Apollo Network Computing System in the 1980s and were later standardized as part of the Open Software Foundation's Distributed Computing Environment (DCE) in the early 1990s. The format was formally documented for the wider internet in RFC 4122 in 2005, which defined the five versions and the layout still in use today. Microsoft adopted the same 128-bit structure under the name GUID for its COM and Windows technologies, which is why the two terms describe identical values. In 2024, RFC 9562 refreshed the standard and added newer time-ordered versions such as UUIDv7, but the random version 4 remains the most widely generated.</p>

    <h2>Why version 4 UUIDs are used most</h2>
    <p>Of the several UUID versions, version 4 — the random UUID — is by far the most common in everyday software. It fills 122 of its 128 bits with random data and reserves the rest to mark the version and variant, so generating one needs nothing more than a good source of randomness. Unlike version 1, it does not embed a timestamp or the machine's MAC address, so it leaks no information about when or where it was created. That privacy, combined with the fact that any device can produce one offline, is why frameworks, databases and languages from PostgreSQL to Python default to version 4 when you ask for a UUID.</p>

    <h2>How this UUID generator works</h2>
    <p>Every UUID on this page is generated in your browser using the Web Crypto API's <code>crypto.getRandomValues()</code>, a cryptographically secure source of randomness, and never touches a server. The tool sets the version and variant bits exactly as RFC 4122 requires, so each result is a valid version 4 UUID. Formatting options — uppercase, removing hyphens, or wrapping the value in braces for Windows-style GUIDs — change only how the identifier is displayed, not the underlying 128-bit value. Use the count field to produce up to 100 at once, then copy an individual UUID or the whole batch.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is a UUID and how is it different from a GUID?</p>
      <p class="faq-a">A UUID (Universally Unique Identifier) is a 128-bit value written as 32 hexadecimal digits in five hyphen-separated groups, such as <code>550e8400-e29b-41d4-a716-446655440000</code>. GUID (Globally Unique Identifier) is Microsoft's name for the very same thing — the two terms are interchangeable, though GUID is more common in .NET and Windows contexts while UUID is standard everywhere else. Both follow the identical format and can be used wherever the other is expected, which is why this tool offers the uppercase and brace options often seen in Windows systems.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is a version 4 UUID?</p>
      <p class="faq-a">Version 4 is the random UUID: 122 of its 128 bits are filled with random data, while the remaining 6 bits are fixed to mark the version (the digit 4) and the variant. This tool generates version 4 UUIDs, the most widely used kind, because they need no central authority, no network access and no timestamp — just a good source of randomness. You can recognise a version 4 UUID by the digit 4 at the start of the third group and an 8, 9, a or b at the start of the fourth.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Are randomly generated UUIDs really unique?</p>
      <p class="faq-a">Not mathematically guaranteed, but unique enough that collisions are effectively impossible in practice. With 122 random bits there are about 5.3 undecillion possible version 4 UUIDs. You would need to generate roughly 2.7 quintillion of them before there was even a one-in-a-billion chance of any two matching — more than any real system will ever create. For virtually every application, from database keys to session identifiers to file names, treating them as unique is completely safe.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Are these UUIDs safe to use as secrets or security tokens?</p>
      <p class="faq-a">This generator uses the browser's cryptographically secure <code>crypto.getRandomValues()</code>, so the version 4 UUIDs produced here are unpredictable and generated entirely on your device. They are suitable as hard-to-guess identifiers such as password-reset links or invitation tokens. That said, a UUID carries only 122 bits of entropy and is designed as an identifier rather than a credential — for high-value secrets, a dedicated random token of appropriate length is still the better choice.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why would I remove the hyphens or use uppercase UUIDs?</p>
      <p class="faq-a">The hyphens are purely cosmetic — the canonical format includes them, but the 32 hex digits carry all the meaning, so removing them saves a few characters in URLs, filenames or compact database columns. Uppercase is common in Microsoft and Windows environments, where GUIDs are often displayed in capitals and wrapped in braces. Both options here change only the presentation; the underlying value is identical, so a hyphen-free lowercase UUID and its uppercase braced form refer to exactly the same identifier.</p>
    </div>

  </div>

</div>

<!-- UUID generator CSS -->
<style>
.uu-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Main display */
.uu-display {
  padding: 24px;
  border-bottom: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  gap: 14px;
  align-items: center;
  background: var(--bg);
}

.uu-value-wrap {
  display: flex;
  align-items: center;
  width: 100%;
  max-width: 600px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  overflow: hidden;
  transition: border-color var(--transition);
}

.uu-value-wrap:focus-within { border-color: var(--accent); }

.uu-value {
  flex: 1;
  padding: 12px 14px;
  border: none;
  background: transparent;
  font-family: var(--font-mono);
  font-size: 1rem;
  color: var(--text);
  outline: none;
  letter-spacing: 0.03em;
  min-width: 0;
}

.uu-refresh-btn {
  padding: 0 14px;
  height: 46px;
  border: none;
  border-left: 1px solid var(--border);
  background: var(--bg-2);
  color: var(--text-3);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: color var(--transition), background var(--transition);
  flex-shrink: 0;
}

.uu-refresh-btn:hover { color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .uu-refresh-btn:hover { background: var(--accent-dim); }

.uu-refresh-btn.spinning svg { animation: uu-spin 0.4s ease; }

@keyframes uu-spin {
  from { transform: rotate(0deg); }
  to   { transform: rotate(360deg); }
}

.uu-copy-btn {
  gap: 7px;
  padding: 9px 22px;
}

/* Settings */
.uu-settings {
  padding: 20px;
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.uu-setting-label {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text-2);
  white-space: nowrap;
}

/* Format options */
.uu-char-types {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.uu-char-type {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg);
  transition: border-color var(--transition), background var(--transition);
}

.uu-char-type:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .uu-char-type:has(input:checked) { background: var(--accent-dim); }

.uu-char-type-left {
  display: flex;
  align-items: center;
  gap: 14px;
  flex: 1;
}

.uu-char-toggle {
  display: flex;
  align-items: center;
  gap: 8px;
  cursor: pointer;
  user-select: none;
}

.uu-char-toggle input[type="checkbox"] {
  accent-color: var(--accent);
  width: 15px;
  height: 15px;
  cursor: pointer;
  flex-shrink: 0;
}

.uu-char-type-name {
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--text);
}

.uu-char-example {
  font-size: 0.8125rem;
  color: var(--text-3);
  font-family: var(--font-mono);
  margin-left: auto;
}

/* Bottom row */
.uu-bottom-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  flex-wrap: wrap;
}

.uu-count-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
}

.uu-count-input-wrap {
  display: flex;
  align-items: center;
  gap: 6px;
}

.uu-count-num {
  width: 64px;
  padding: 5px 8px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  font-weight: 600;
  outline: none;
  text-align: center;
  transition: border-color var(--transition);
}

.uu-count-num:focus { border-color: var(--accent); }
.uu-count-label { font-size: 0.875rem; color: var(--text-2); }

/* Multi output */
.uu-multi-wrap { border-top: 1px solid var(--border); }

.uu-multi-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
}

.uu-multi-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.uu-multi-list {
  display: flex;
  flex-direction: column;
  max-height: 420px;
  overflow-y: auto;
}

.uu-multi-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
  border-bottom: 1px solid var(--border);
  gap: 12px;
}

.uu-multi-item:last-child { border-bottom: none; }

.uu-multi-val {
  font-family: var(--font-mono);
  font-size: 0.9rem;
  color: var(--text);
  flex: 1;
  word-break: break-all;
}

.uu-multi-copy {
  font-size: 0.75rem;
  padding: 3px 8px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: transparent;
  color: var(--text-3);
  cursor: pointer;
  font-family: var(--font);
  flex-shrink: 0;
  transition: color var(--transition), border-color var(--transition);
}

.uu-multi-copy:hover { color: var(--accent); border-color: var(--accent); }
.uu-multi-copy.copied { color: var(--accent); border-color: var(--accent); }

@media (max-width: 640px) {
  .uu-display { padding: 16px; }
  .uu-char-example { display: none; }
  .uu-bottom-row { flex-direction: column; align-items: stretch; }
  .uu-bottom-row .btn { width: 100%; justify-content: center; }
}
</style>

<!-- UUID generator JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var valueEl    = document.getElementById('uu-value');
  var refreshBtn = document.getElementById('uu-refresh');
  var copyBtn    = document.getElementById('uu-copy-btn');
  var generateBtn= document.getElementById('uu-generate');
  var countInput = document.getElementById('uu-count');
  var multiWrap  = document.getElementById('uu-multi-wrap');
  var multiList  = document.getElementById('uu-multi-list');
  var multiTitle = document.getElementById('uu-multi-title');
  var copyAllBtn = document.getElementById('uu-copy-all');

  var optUpper   = document.getElementById('uu-uppercase');
  var optHyphens = document.getElementById('uu-hyphens');
  var optBraces  = document.getElementById('uu-braces');

  /* Cryptographically secure version 4 UUID */
  function rawUuid() {
    if (window.crypto && window.crypto.randomUUID) {
      return window.crypto.randomUUID();
    }
    var bytes = new Uint8Array(16);
    if (window.crypto && window.crypto.getRandomValues) {
      window.crypto.getRandomValues(bytes);
    } else {
      for (var i = 0; i < 16; i++) bytes[i] = Math.floor(Math.random() * 256);
    }
    /* Set version (4) and variant (10xx) bits per RFC 4122 */
    bytes[6] = (bytes[6] & 0x0f) | 0x40;
    bytes[8] = (bytes[8] & 0x3f) | 0x80;

    var hex = [];
    for (var j = 0; j < 256; j++) hex[j] = (j + 0x100).toString(16).substr(1);
    var b = bytes;
    return hex[b[0]] + hex[b[1]] + hex[b[2]] + hex[b[3]] + '-' +
           hex[b[4]] + hex[b[5]] + '-' +
           hex[b[6]] + hex[b[7]] + '-' +
           hex[b[8]] + hex[b[9]] + '-' +
           hex[b[10]] + hex[b[11]] + hex[b[12]] + hex[b[13]] + hex[b[14]] + hex[b[15]];
  }

  function formatUuid() {
    var u = rawUuid();
    if (!optHyphens.checked) u = u.replace(/-/g, '');
    if (optUpper.checked)    u = u.toUpperCase();
    if (optBraces.checked)   u = '{' + u + '}';
    return u;
  }

  function generate() {
    var count = Math.max(1, Math.min(100, parseInt(countInput.value) || 1));

    var first = formatUuid();
    valueEl.value = first;

    if (count > 1) {
      multiWrap.classList.remove('hidden');
      multiTitle.textContent = count + ' generated UUIDs';
      var all = [first];
      for (var i = 1; i < count; i++) all.push(formatUuid());

      multiList.innerHTML = all.map(function (u) {
        return '<div class="uu-multi-item">' +
          '<span class="uu-multi-val">' + escapeHtml(u) + '</span>' +
          '<button class="uu-multi-copy" data-uuid="' + escapeAttr(u) + '">Copy</button>' +
          '</div>';
      }).join('');

      multiList.querySelectorAll('.uu-multi-copy').forEach(function (btn) {
        btn.addEventListener('click', function () {
          navigator.clipboard.writeText(btn.dataset.uuid).then(function () {
            btn.textContent = 'Copied!';
            btn.classList.add('copied');
            setTimeout(function () { btn.textContent = 'Copy'; btn.classList.remove('copied'); }, 2000);
          });
        });
      });

      copyAllBtn.dataset.all = all.join('\n');
    } else {
      multiWrap.classList.add('hidden');
    }

    refreshBtn.classList.add('spinning');
    setTimeout(function () { refreshBtn.classList.remove('spinning'); }, 400);
  }

  function escapeHtml(s) { return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;'); }
  function escapeAttr(s) { return s.replace(/"/g, '&quot;'); }

  /* Copy main UUID */
  copyBtn.addEventListener('click', function () {
    if (!valueEl.value) return;
    navigator.clipboard.writeText(valueEl.value).then(function () {
      copyBtn.innerHTML = '<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="2,8 6,12 14,4"/></svg> Copied!';
      setTimeout(function () {
        copyBtn.innerHTML = '<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><rect x="5" y="5" width="9" height="9" rx="1.5"/><path d="M11 5V3.5A1.5 1.5 0 0 0 9.5 2h-6A1.5 1.5 0 0 0 2 3.5v6A1.5 1.5 0 0 0 3.5 11H5"/></svg> Copy UUID';
      }, 2000);
    });
  });

  /* Copy all */
  copyAllBtn.addEventListener('click', function () {
    var all = copyAllBtn.dataset.all;
    if (!all) return;
    navigator.clipboard.writeText(all).then(function () {
      copyAllBtn.textContent = 'Copied!';
      setTimeout(function () { copyAllBtn.textContent = 'Copy all'; }, 2000);
    });
  });

  refreshBtn.addEventListener('click', generate);
  generateBtn.addEventListener('click', generate);

  [optUpper, optHyphens, optBraces, countInput].forEach(function (el) {
    el.addEventListener('change', generate);
  });

  /* Init */
  generate();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
