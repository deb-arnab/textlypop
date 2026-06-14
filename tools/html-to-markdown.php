<?php
$tool_slug   = 'html-to-markdown';
$tool_name   = 'HTML to Markdown';

$page_title  = 'HTML to Markdown Converter — Convert HTML to Markdown Online Free | TextlyPop';
$meta_desc   = 'Convert HTML to clean Markdown instantly. Paste any HTML and get readable Markdown. Supports headings, lists, tables, links, images and code blocks. Free online tool.';
$canonical_url = 'https://textlypop.com/tools/html-to-markdown';
$og_title    = 'Free HTML to Markdown Converter — TextlyPop';
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
  "name": "HTML to Markdown Converter",
  "url": "https://textlypop.com/tools/html-to-markdown",
  "description": "Convert HTML to clean readable Markdown instantly. Supports all common HTML elements.",
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
      "name": "How do I convert HTML to Markdown?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your HTML into the input panel and the Markdown output appears instantly on the right. The converter strips HTML tags and replaces them with equivalent Markdown syntax."
      }
    },
    {
      "@type": "Question",
      "name": "Why would I convert HTML to Markdown?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Common reasons include migrating content to Markdown-based documentation systems, converting blog posts for static site generators like Jekyll or Hugo, cleaning up HTML copied from the web, and preparing content for GitHub README files."
      }
    },
    {
      "@type": "Question",
      "name": "What HTML elements are supported?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The converter supports h1 through h6 headings, paragraphs, strong, b, em, i, del, inline code, pre and code blocks, unordered and ordered lists, blockquotes, links, images, horizontal rules, and tables."
      }
    },
    {
      "@type": "Question",
      "name": "What happens to HTML that has no Markdown equivalent?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Elements like div, span, section, header and footer are stripped while preserving their text content. Class names, IDs, and style attributes are removed to produce clean Markdown output."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use this to clean up copied web content?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Paste HTML from any webpage and the converter produces clean Markdown by removing all surrounding markup. Useful for extracting article content you want to reuse in a clean format."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert HTML to Markdown',
  'description' => 'Convert HTML code to clean Markdown using TextlyPop HTML to Markdown converter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Paste your HTML','text'=>'Paste any HTML code into the input panel on the left. The Markdown output updates instantly as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'View the Markdown','text'=>'Clean Markdown appears in the output panel. HTML elements are converted to their Markdown equivalents.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Copy the result','text'=>'Click Copy to copy the Markdown to your clipboard.'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type'=>'ListItem','position'=>1,'name'=>'TextlyPop','item'=>'https://textlypop.com'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Tools','item'=>'https://textlypop.com/#tools'],
    ['@type'=>'ListItem','position'=>3,'name'=>'HTML to Markdown','item'=>'https://textlypop.com/tools/html-to-markdown'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page tool-page-wide">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>HTML to Markdown</h1>
    <p>Convert HTML to clean readable Markdown instantly. Strips HTML tags and preserves content structure.</p>
  </div>

  <div class="hm-tool" id="hm-tool">

    <div class="hm-panels">

      <!-- Input -->
      <div class="hm-panel">
        <div class="hm-panel-header">
          <span class="hm-panel-label">HTML input</span>
          <div class="hm-panel-actions">
            <span class="hm-stat" id="hm-in-stat">0 chars</span>
            <button class="btn btn-clear" id="hm-clear-btn">Clear</button>
          </div>
        </div>
        <textarea
          id="hm-input"
          class="hm-textarea hm-mono"
          placeholder="<h1>Hello World</h1>
<p>Paste any <strong>HTML</strong> here and it converts to <em>Markdown</em> instantly.</p>
<ul>
  <li>Headings h1–h6</li>
  <li>Bold and italic</li>
  <li>Links and images</li>
  <li>Lists and tables</li>
  <li>Code blocks</li>
</ul>"
          aria-label="HTML to convert to Markdown"
          data-save-key="html-to-markdown"
          spellcheck="false"></textarea>
      </div>

      <!-- Output -->
      <div class="hm-panel">
        <div class="hm-panel-header">
          <span class="hm-panel-label">Markdown output</span>
          <div class="hm-panel-actions">
            <span class="hm-stat" id="hm-out-stat">0 chars</span>
            <button class="btn btn-copy" id="hm-copy-btn">Copy</button>
          </div>
        </div>
        <textarea
          id="hm-output"
          class="hm-textarea hm-mono hm-output-area"
          readonly
          placeholder="Clean Markdown will appear here…"
          aria-label="Markdown output"
          aria-live="polite"
          spellcheck="false"></textarea>
      </div>

    </div>

    <!-- Options -->
    <div class="hm-options">
      <span class="hm-options-label">Options:</span>
      <label class="hm-option">
        <input type="checkbox" id="hm-setext">
        <span>Setext headings</span>
      </label>
      <label class="hm-option">
        <input type="checkbox" id="hm-collapse-ws" checked>
        <span>Collapse whitespace</span>
      </label>
    </div>

    <!-- Toolbar -->
    <div class="hm-toolbar">
      <div class="hm-toolbar-note">
        <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true"><circle cx="8" cy="8" r="6"/><line x1="8" y1="5" x2="8" y2="8"/><circle cx="8" cy="11" r="0.5" fill="currentColor"/></svg>
        Use the Send output to buttons below to pass Markdown to other tools
      </div>
      <button class="btn btn-copy" id="hm-copy-btn-2">Copy Markdown</button>
    </div>

  </div>

  <!-- Send output to other tools — uses main.js initSendToTool via data-from/data-to-tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send Markdown output to:</span>
    <button class="send-to-btn" data-from="hm-output" data-to-tool="markdown-to-html">Markdown to HTML</button>
    <button class="send-to-btn" data-from="hm-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="hm-output" data-to-tool="find-and-replace">Find and replace</button>
  </div>

  <div class="send-to-wrap mt-8">
    <span class="send-to-label">Send HTML input to:</span>
    <button class="send-to-btn" data-from="hm-input" data-to-tool="html-encoder-decoder">HTML encoder</button>
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

  <div class="tool-content mt-32">
    <h2>Why convert HTML to Markdown</h2>
    <p>Markdown is more readable than HTML in raw form, easier to write and edit by hand, and is the standard format for developer documentation, README files, and many content management systems. Converting HTML to Markdown lets you move content from websites, legacy CMS exports, or HTML editors into a Markdown-based workflow. Static site generators like Jekyll, Hugo, and Gatsby all work natively with Markdown.</p>

    <h2>What gets converted</h2>
    <p>All common HTML elements with Markdown equivalents are handled. Heading tags h1 through h6 become hash symbols. Bold tags become double asterisks. Italic tags become single asterisks. Strikethrough becomes double tildes. Code tags become backticks. Pre and code blocks become fenced code blocks. Anchor tags become Markdown links. Image tags become Markdown image syntax. Lists, tables, blockquotes, and horizontal rules all convert correctly.</p>

    <h2>What gets stripped</h2>
    <p>HTML elements with no Markdown equivalent — div, span, section, aside, nav, header, footer — are stripped with their text content preserved. Class names, IDs, and style attributes are removed, giving clean Markdown focused on content structure.</p>

    <h2>Frequently asked questions</h2>
    <div class="faq-item">
      <p class="faq-q">How do I convert HTML to Markdown?</p>
      <p class="faq-a">Paste your HTML into the input panel and clean Markdown appears instantly. HTML tags are converted to Markdown syntax and unsupported tags are stripped while preserving text.</p>
    </div>
    <div class="faq-item">
      <p class="faq-q">What HTML elements are supported?</p>
      <p class="faq-a">h1-h6, p, strong, b, em, i, del, code, pre, ul, ol, li, a, img, blockquote, hr, and table elements are all converted to their Markdown equivalents.</p>
    </div>
    <div class="faq-item">
      <p class="faq-q">Can I use this to clean up copied web content?</p>
      <p class="faq-a">Yes. Paste HTML from any webpage and the converter produces clean Markdown by removing all surrounding markup.</p>
    </div>
  </div>

</div>

<style>
.hm-tool { border: 1px solid var(--border); border-radius: var(--radius-lg); overflow: hidden; background: var(--bg); }

.hm-panels { display: grid; grid-template-columns: 1fr 1fr; min-height: 380px; border-bottom: 1px solid var(--border); }
.hm-panel { display: flex; flex-direction: column; }
.hm-panel:first-child { border-right: 1px solid var(--border); }

.hm-panel-header { display: flex; align-items: center; justify-content: space-between; padding: 9px 14px; border-bottom: 1px solid var(--border); background: var(--bg-2); gap: 10px; flex-wrap: wrap; }
.hm-panel-label { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-3); }
.hm-panel-actions { display: flex; align-items: center; gap: 8px; }
.hm-stat { font-size: 0.75rem; color: var(--text-3); font-variant-numeric: tabular-nums; }

.hm-textarea { flex: 1; width: 100%; min-height: 340px; padding: 14px; border: none; background: transparent; font-size: 0.9375rem; color: var(--text); line-height: 1.7; resize: vertical; outline: none; }
.hm-mono { font-family: var(--font-mono); font-size: 0.875rem; }
.hm-textarea::placeholder { color: var(--text-3); font-family: var(--font); font-size: 0.875rem; }
.hm-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .hm-output-area { color: #5DCAA5; background: var(--accent-dim); }

.hm-options { display: flex; align-items: center; gap: 8px; padding: 11px 16px; border-top: 1px solid var(--border); background: var(--bg-2); flex-wrap: wrap; }
.hm-options-label { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-3); white-space: nowrap; }
.hm-option { display: flex; align-items: center; gap: 6px; font-size: 0.8125rem; color: var(--text-2); cursor: pointer; user-select: none; padding: 4px 10px; border: 1px solid var(--border-2); border-radius: 20px; background: var(--bg); transition: border-color var(--transition), background var(--transition); }
.hm-option:hover { border-color: var(--accent); }
.hm-option:has(input:checked) { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .hm-option:has(input:checked) { background: var(--accent-dim); }
.hm-option input[type="checkbox"] { accent-color: var(--accent); width: 13px; height: 13px; cursor: pointer; }

.hm-toolbar { display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; background: var(--bg-2); border-top: 1px solid var(--border); gap: 12px; flex-wrap: wrap; }
.hm-toolbar-note { font-size: 0.8125rem; color: var(--text-3); display: flex; align-items: center; gap: 6px; }

@media (max-width: 768px) {
  .hm-panels { grid-template-columns: 1fr; }
  .hm-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .hm-textarea { min-height: 220px; }
}
</style>

<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input    = document.getElementById('hm-input');
  var output   = document.getElementById('hm-output');
  var inStat   = document.getElementById('hm-in-stat');
  var outStat  = document.getElementById('hm-out-stat');
  var copyBtn  = document.getElementById('hm-copy-btn');
  var copyBtn2 = document.getElementById('hm-copy-btn-2');
  var clearBtn = document.getElementById('hm-clear-btn');

  var optSetext    = document.getElementById('hm-setext');
  var optCollapseWs= document.getElementById('hm-collapse-ws');

  /* ── DOM-based HTML → Markdown ── */
  function htmlToMarkdown(html) {
    var tmp = new DOMParser().parseFromString(html, 'text/html').body;

    function processNode(node) {
      if (node.nodeType === Node.TEXT_NODE) {
        var text = node.textContent;
        if (optCollapseWs.checked) text = text.replace(/\s+/g, ' ');
        return text;
      }
      if (node.nodeType !== Node.ELEMENT_NODE) return '';

      var tag      = node.tagName.toLowerCase();
      var children = Array.from(node.childNodes).map(processNode).join('');

      switch (tag) {
        case 'h1':
          if (optSetext.checked) {
            var t1 = children.trim();
            return '\n' + t1 + '\n' + '='.repeat(Math.max(t1.length, 3)) + '\n\n';
          }
          return '\n# ' + children.trim() + '\n\n';
        case 'h2':
          if (optSetext.checked) {
            var t2 = children.trim();
            return '\n' + t2 + '\n' + '-'.repeat(Math.max(t2.length, 3)) + '\n\n';
          }
          return '\n## ' + children.trim() + '\n\n';
        case 'h3': return '\n### ' + children.trim() + '\n\n';
        case 'h4': return '\n#### ' + children.trim() + '\n\n';
        case 'h5': return '\n##### ' + children.trim() + '\n\n';
        case 'h6': return '\n###### ' + children.trim() + '\n\n';

        case 'p':  return '\n' + children.trim() + '\n\n';
        case 'br': return '\n';

        case 'strong': case 'b': return '**' + children.trim() + '**';
        case 'em':     case 'i': return '*' + children.trim() + '*';
        case 'del':    case 's': return '~~' + children.trim() + '~~';

        case 'code':
          if (node.parentElement && node.parentElement.tagName.toLowerCase() === 'pre') {
            return node.textContent;
          }
          return '`' + children + '`';

        case 'pre': {
          var codeEl = node.querySelector('code');
          var lang = '';
          if (codeEl) {
            var cls = codeEl.className || '';
            var m = cls.match(/language-(\w+)/);
            if (m) lang = m[1];
          }
          var codeText = codeEl ? codeEl.textContent : node.textContent;
          return '\n```' + lang + '\n' + codeText.trim() + '\n```\n\n';
        }

        case 'a': {
          var href  = node.getAttribute('href') || '';
          var title = node.getAttribute('title');
          var tStr  = title ? ' "' + title + '"' : '';
          var inner = children.trim();
          if (!inner) inner = href;
          return '[' + inner + '](' + href + tStr + ')';
        }

        case 'img': {
          var src = node.getAttribute('src') || '';
          var alt = node.getAttribute('alt') || '';
          return '![' + alt + '](' + src + ')';
        }

        case 'ul': {
          var items = Array.from(node.children)
            .filter(function(c){ return c.tagName.toLowerCase() === 'li'; })
            .map(function(li){ return '- ' + processNode(li).trim().replace(/\n+/g, ' '); });
          return '\n' + items.join('\n') + '\n\n';
        }

        case 'ol': {
          var items = Array.from(node.children)
            .filter(function(c){ return c.tagName.toLowerCase() === 'li'; })
            .map(function(li, i){ return (i + 1) + '. ' + processNode(li).trim().replace(/\n+/g, ' '); });
          return '\n' + items.join('\n') + '\n\n';
        }

        case 'li': return children;

        case 'blockquote': {
          var inner = children.trim().split('\n').map(function(l){ return '> ' + l; }).join('\n');
          return '\n' + inner + '\n\n';
        }

        case 'hr': return '\n---\n\n';

        case 'table': return convertTable(node);

        /* Skip content entirely */
        case 'script': case 'style': case 'noscript':
        case 'meta':   case 'link':  case 'head':
          return '';

        /* Strip tag, keep text */
        default: return children;
      }
    }

    function convertTable(tableEl) {
      var rows = Array.from(tableEl.querySelectorAll('tr'));
      if (!rows.length) return '';

      var mdRows = rows.map(function(row) {
        var cells = Array.from(row.querySelectorAll('th, td'));
        return '| ' + cells.map(function(cell) {
          return processNode(cell).trim().replace(/\|/g, '\\|').replace(/\n/g, ' ');
        }).join(' | ') + ' |';
      });

      var colCount = rows[0].querySelectorAll('th, td').length;
      var sep = '| ' + Array(colCount).fill('---').join(' | ') + ' |';
      mdRows.splice(1, 0, sep);

      return '\n' + mdRows.join('\n') + '\n\n';
    }

    var result = Array.from(tmp.childNodes).map(processNode).join('');
    result = result.replace(/\n{3,}/g, '\n\n').trim();
    return result;
  }

  function convert() {
    var html = input.value;
    var inLen = html.length;
    inStat.textContent = inLen.toLocaleString() + ' char' + (inLen !== 1 ? 's' : '');

    if (!html.trim()) {
      output.value = '';
      outStat.textContent = '0 chars';
      return;
    }

    var md = htmlToMarkdown(html);
    output.value = md;
    outStat.textContent = md.length.toLocaleString() + ' char' + (md.length !== 1 ? 's' : '');
  }

  function doCopy(btn) {
    var text = output.value;
    if (!text) return;
    navigator.clipboard.writeText(text).then(function() {
      var orig = btn.textContent;
      btn.textContent = 'Copied!';
      setTimeout(function() { btn.textContent = orig; }, 2000);
    });
  }

  input.addEventListener('input', convert);
  [optSetext, optCollapseWs].forEach(function(cb) { cb.addEventListener('change', convert); });

  copyBtn.addEventListener('click', function() { doCopy(copyBtn); });
  copyBtn2.addEventListener('click', function() { doCopy(copyBtn2); });

  clearBtn.addEventListener('click', function() {
    input.value = '';
    output.value = '';
    inStat.textContent = '0 chars';
    outStat.textContent = '0 chars';
    input.focus();
  });

  convert();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
