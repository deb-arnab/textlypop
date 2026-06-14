<?php
$tool_slug   = 'markdown-to-html';
$tool_name   = 'Markdown to HTML';

$page_title  = 'Markdown to HTML Converter — Convert Markdown Online Free | TextlyPop';
$meta_desc   = 'Convert Markdown to HTML instantly. Supports headings, bold, italic, lists, links, images, code blocks and tables. Free online Markdown to HTML converter.';
$canonical_url = 'https://textlypop.com/tools/markdown-to-html';
$og_title    = 'Free Markdown to HTML Converter — TextlyPop';
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
  "name": "Markdown to HTML Converter",
  "url": "https://textlypop.com/tools/markdown-to-html",
  "description": "Convert Markdown to HTML instantly. Supports all common Markdown syntax including headings, lists, links, code and tables.",
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
      "name": "How do I convert Markdown to HTML?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your Markdown text into the input panel and the HTML output appears instantly on the right. Click the Preview tab to see how the HTML renders in a browser."
      }
    },
    {
      "@type": "Question",
      "name": "What Markdown syntax is supported?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "TextlyPop supports all standard Markdown including headings with #, bold with ** or __, italic with * or _, inline code with backticks, fenced code blocks, unordered and ordered lists, blockquotes, horizontal rules, links, images, and tables."
      }
    },
    {
      "@type": "Question",
      "name": "What is Markdown?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Markdown is a lightweight markup language created by John Gruber in 2004. It uses plain text formatting syntax that converts to HTML. It is widely used for writing documentation, README files, blog posts, and developer tools."
      }
    },
    {
      "@type": "Question",
      "name": "Can I preview the rendered HTML?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Click the Preview tab above the output panel to see a live rendered preview of how your Markdown will look in a browser. Switch back to the HTML tab to see the raw HTML code."
      }
    },
    {
      "@type": "Question",
      "name": "Does this support GitHub Flavored Markdown?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. TextlyPop supports GitHub Flavored Markdown extensions including fenced code blocks with language hints, tables, and strikethrough text with double tildes."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Markdown to HTML',
  'description' => 'Convert Markdown text to HTML using TextlyPop Markdown to HTML converter.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Paste your Markdown','text'=>'Type or paste your Markdown text into the input panel on the left.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'View HTML or preview','text'=>'The HTML tab shows raw HTML output. Click Preview to see a rendered visual preview in your browser.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Copy the HTML','text'=>'Click Copy HTML to copy the raw HTML output to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Markdown to HTML','item'=>'https://textlypop.com/tools/markdown-to-html'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page tool-page-wide">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Markdown to HTML</h1>
    <p>Convert Markdown to HTML instantly. Supports headings, lists, tables, code blocks, links and more.</p>
  </div>

  <div class="md-tool" id="md-tool">

    <div class="md-panels">

      <!-- Input panel -->
      <div class="md-panel">
        <div class="md-panel-header">
          <span class="md-panel-label">Markdown input</span>
          <div class="md-panel-actions">
            <span class="md-stat" id="md-stat">0 words</span>
            <button class="btn btn-clear" id="md-clear-btn">Clear</button>
          </div>
        </div>
        <textarea
          id="md-input"
          class="md-textarea md-mono"
          placeholder="# Hello World

Type your **Markdown** here and see it convert to HTML instantly.

## Features supported
- Headings (H1–H6)
- **Bold** and *italic*
- [Links](https://example.com)
- \`Inline code\` and code blocks
- Lists, tables, blockquotes and more"
          aria-label="Markdown input"
          data-save-key="markdown-to-html"
          spellcheck="false"></textarea>
      </div>

      <!-- Output panel -->
      <div class="md-panel">
        <div class="md-panel-header">
          <span class="md-panel-label">Output</span>
          <div class="md-panel-actions">
            <div class="md-view-tabs" role="tablist">
              <button class="md-tab active" data-tab="html" role="tab" aria-selected="true">HTML</button>
              <button class="md-tab" data-tab="preview" role="tab" aria-selected="false">Preview</button>
            </div>
            <button class="btn btn-copy" id="md-copy-btn">Copy HTML</button>
          </div>
        </div>

        <div class="md-output-wrap">
          <textarea
            id="md-output"
            class="md-textarea md-mono md-output-area"
            readonly
            placeholder="HTML output will appear here…"
            aria-label="HTML output"
            aria-live="polite"
            spellcheck="false"></textarea>

          <div class="md-preview hidden" id="md-preview" aria-label="Rendered preview"></div>
        </div>
      </div>

    </div>

    <!-- Options bar -->
    <div class="md-options">
      <span class="md-options-label">Options:</span>
      <label class="md-option">
        <input type="checkbox" id="md-wrap-article" checked>
        <span>Wrap in &lt;article&gt;</span>
      </label>
      <label class="md-option">
        <input type="checkbox" id="md-blank-links" checked>
        <span>Links open in new tab</span>
      </label>
      <label class="md-option">
        <input type="checkbox" id="md-smart-quotes">
        <span>Smart quotes</span>
      </label>
    </div>

    <!-- Cheat sheet -->
    <div class="md-cheatsheet">
      <div class="md-cs-header">
        <span class="md-cs-title">Markdown cheat sheet</span>
        <button class="md-cs-toggle" id="md-cs-toggle">Show</button>
      </div>
      <div class="md-cs-grid hidden" id="md-cs-grid">
        <div class="md-cs-item"><code># Heading 1</code><span>→ &lt;h1&gt;</span></div>
        <div class="md-cs-item"><code>## Heading 2</code><span>→ &lt;h2&gt;</span></div>
        <div class="md-cs-item"><code>**bold**</code><span>→ &lt;strong&gt;</span></div>
        <div class="md-cs-item"><code>*italic*</code><span>→ &lt;em&gt;</span></div>
        <div class="md-cs-item"><code>~~strike~~</code><span>→ &lt;del&gt;</span></div>
        <div class="md-cs-item"><code>`code`</code><span>→ &lt;code&gt;</span></div>
        <div class="md-cs-item"><code>[text](url)</code><span>→ &lt;a&gt;</span></div>
        <div class="md-cs-item"><code>![alt](url)</code><span>→ &lt;img&gt;</span></div>
        <div class="md-cs-item"><code>- item</code><span>→ &lt;ul&gt;&lt;li&gt;</span></div>
        <div class="md-cs-item"><code>1. item</code><span>→ &lt;ol&gt;&lt;li&gt;</span></div>
        <div class="md-cs-item"><code>&gt; quote</code><span>→ &lt;blockquote&gt;</span></div>
        <div class="md-cs-item"><code>---</code><span>→ &lt;hr&gt;</span></div>
        <div class="md-cs-item"><code>```lang</code><span>→ &lt;pre&gt;&lt;code&gt;</span></div>
        <div class="md-cs-item"><code>| col | col |</code><span>→ &lt;table&gt;</span></div>
      </div>
    </div>

  </div>

  <!-- Send to another tool — from INPUT (markdown), not output (html) -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send Markdown to:</span>
    <button class="send-to-btn" data-from="md-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="md-input" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="md-input" data-to-tool="html-to-markdown">HTML to Markdown</button>
  </div>

  <!-- Separate row for sending HTML output -->
  <div class="send-to-wrap mt-8">
    <span class="send-to-label">Send HTML to:</span>
    <button class="send-to-btn" data-from="md-output" data-to-tool="html-encoder-decoder">HTML encoder</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">L</kbd> clear &nbsp;|&nbsp;
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">Enter</kbd> — copy HTML
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
    <h2>What is Markdown</h2>
    <p>Markdown is a lightweight markup language created by John Gruber in 2004. It uses simple plain text formatting that converts cleanly to HTML. The goal was to make writing for the web as easy as writing a plain text email — using intuitive characters like asterisks for bold and hashes for headings that look natural even before conversion. Today Markdown is the standard format for GitHub README files, documentation systems, blog platforms, and developer tools.</p>

    <h2>Supported Markdown syntax</h2>
    <p>This converter supports all standard CommonMark Markdown plus GitHub Flavored Markdown extensions. Headings use one to six hash symbols. Bold uses double asterisks or underscores. Italic uses single asterisks or underscores. Strikethrough uses double tildes. Inline code uses backticks. Fenced code blocks use triple backticks with an optional language identifier. Unordered lists use hyphens, asterisks or plus signs. Ordered lists use numbers followed by periods. Blockquotes use the greater-than symbol. Tables use pipe characters.</p>

    <h2>Frequently asked questions</h2>
    <div class="faq-item">
      <p class="faq-q">How do I convert Markdown to HTML?</p>
      <p class="faq-a">Paste your Markdown into the input panel and the HTML appears instantly. Switch to Preview tab to see it rendered in a browser.</p>
    </div>
    <div class="faq-item">
      <p class="faq-q">What Markdown syntax is supported?</p>
      <p class="faq-a">All standard Markdown including headings, bold, italic, strikethrough, code, code blocks, lists, blockquotes, links, images, tables, and horizontal rules.</p>
    </div>
    <div class="faq-item">
      <p class="faq-q">Can I preview the rendered HTML?</p>
      <p class="faq-a">Yes. Click the Preview tab to see a live rendered preview of how your Markdown looks in a browser.</p>
    </div>
  </div>

</div>

<style>
.md-tool { border: 1px solid var(--border); border-radius: var(--radius-lg); overflow: hidden; background: var(--bg); }

.md-panels { display: grid; grid-template-columns: 1fr 1fr; min-height: 400px; border-bottom: 1px solid var(--border); }
.md-panel { display: flex; flex-direction: column; }
.md-panel:first-child { border-right: 1px solid var(--border); }

.md-panel-header {
  display: flex; align-items: center; justify-content: space-between;
  padding: 9px 14px; border-bottom: 1px solid var(--border);
  background: var(--bg-2); gap: 10px; flex-wrap: wrap;
}

.md-panel-label { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-3); }
.md-panel-actions { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.md-stat { font-size: 0.75rem; color: var(--text-3); }

.md-view-tabs { display: flex; border: 1px solid var(--border-2); border-radius: var(--radius-sm); overflow: hidden; }
.md-tab { padding: 4px 12px; border: none; background: transparent; color: var(--text-3); font-family: var(--font); font-size: 0.8125rem; cursor: pointer; transition: background var(--transition), color var(--transition); }
.md-tab:first-child { border-right: 1px solid var(--border-2); }
.md-tab:hover { color: var(--text); background: var(--bg-3); }
.md-tab.active { background: var(--accent); color: #fff; }

.md-output-wrap { flex: 1; display: flex; flex-direction: column; }

.md-textarea {
  flex: 1; width: 100%; min-height: 360px; padding: 14px; border: none;
  background: transparent; font-size: 0.9375rem; color: var(--text);
  line-height: 1.7; resize: vertical; outline: none;
}
.md-mono { font-family: var(--font-mono); font-size: 0.875rem; }
.md-textarea::placeholder { color: var(--text-3); font-family: var(--font); font-size: 0.875rem; }
.md-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .md-output-area { color: #5DCAA5; background: var(--accent-dim); }

/* Preview */
.md-preview {
  flex: 1; padding: 20px; min-height: 360px; overflow-y: auto;
  background: var(--bg); color: var(--text); font-family: var(--font);
  font-size: 1rem; line-height: 1.75;
}
.md-preview h1,.md-preview h2,.md-preview h3,.md-preview h4,.md-preview h5,.md-preview h6 { color: var(--text); margin: 1.25em 0 0.5em; line-height: 1.3; }
.md-preview h1 { font-size: 1.75rem; border-bottom: 1px solid var(--border); padding-bottom: 0.3em; }
.md-preview h2 { font-size: 1.375rem; border-bottom: 1px solid var(--border); padding-bottom: 0.3em; }
.md-preview h3 { font-size: 1.125rem; }
.md-preview p { margin: 0.75em 0; }
.md-preview ul,.md-preview ol { padding-left: 1.5em; margin: 0.5em 0; }
.md-preview li { margin: 0.25em 0; }
.md-preview code { font-family: var(--font-mono); font-size: 0.875em; background: var(--bg-3); padding: 0.15em 0.4em; border-radius: 3px; }
.md-preview pre { background: var(--bg-3); border-radius: var(--radius-md); padding: 14px; overflow-x: auto; margin: 1em 0; }
.md-preview pre code { background: none; padding: 0; font-size: 0.85rem; }
.md-preview blockquote { border-left: 3px solid var(--accent); margin: 1em 0; padding: 0.5em 1em; background: var(--accent-light); border-radius: 0 var(--radius-sm) var(--radius-sm) 0; }
[data-theme="dark"] .md-preview blockquote { background: var(--accent-dim); }
.md-preview blockquote p { margin: 0; }
.md-preview a { color: var(--accent); text-decoration: underline; }
.md-preview hr { border: none; border-top: 1px solid var(--border); margin: 1.5em 0; }
.md-preview table { width: 100%; border-collapse: collapse; margin: 1em 0; }
.md-preview th,.md-preview td { border: 1px solid var(--border); padding: 8px 12px; text-align: left; }
.md-preview th { background: var(--bg-2); font-weight: 600; }
.md-preview tr:nth-child(even) td { background: var(--bg-2); }
.md-preview img { max-width: 100%; height: auto; border-radius: var(--radius-sm); }
.md-preview del { text-decoration: line-through; color: var(--text-3); }

/* Options */
.md-options {
  display: flex; align-items: center; gap: 8px; padding: 11px 16px;
  border-top: 1px solid var(--border); background: var(--bg-2); flex-wrap: wrap;
}
.md-options-label { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-3); white-space: nowrap; }
.md-option {
  display: flex; align-items: center; gap: 6px; font-size: 0.8125rem;
  color: var(--text-2); cursor: pointer; user-select: none;
  padding: 4px 10px; border: 1px solid var(--border-2); border-radius: 20px;
  background: var(--bg); transition: border-color var(--transition), background var(--transition);
}
.md-option:hover { border-color: var(--accent); }
.md-option:has(input:checked) { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .md-option:has(input:checked) { background: var(--accent-dim); }
.md-option input[type="checkbox"] { accent-color: var(--accent); width: 13px; height: 13px; cursor: pointer; }

/* Cheat sheet */
.md-cheatsheet { border-top: 1px solid var(--border); background: var(--bg-2); }
.md-cs-header { display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; }
.md-cs-title { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-3); }
.md-cs-toggle { font-size: 0.75rem; padding: 3px 10px; border: 1px solid var(--border-2); border-radius: 20px; background: transparent; color: var(--text-2); cursor: pointer; font-family: var(--font); transition: color var(--transition), border-color var(--transition); }
.md-cs-toggle:hover { color: var(--accent); border-color: var(--accent); }
.md-cs-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1px; background: var(--border); border-top: 1px solid var(--border); }
.md-cs-item { display: flex; align-items: center; justify-content: space-between; padding: 8px 14px; background: var(--bg); gap: 8px; }
.md-cs-item code { font-family: var(--font-mono); font-size: 0.8125rem; color: var(--accent); background: var(--accent-light); padding: 2px 6px; border-radius: 3px; }
[data-theme="dark"] .md-cs-item code { background: var(--accent-dim); }
.md-cs-item span { font-family: var(--font-mono); font-size: 0.75rem; color: var(--text-3); white-space: nowrap; }

@media (max-width: 768px) {
  .md-panels { grid-template-columns: 1fr; }
  .md-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .md-textarea, .md-preview { min-height: 240px; }
}
</style>

<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var mdInput  = document.getElementById('md-input');
  var mdOutput = document.getElementById('md-output');
  var mdPrev   = document.getElementById('md-preview');
  var mdStat   = document.getElementById('md-stat');
  var copyBtn  = document.getElementById('md-copy-btn');
  var clearBtn = document.getElementById('md-clear-btn');
  var csToggle = document.getElementById('md-cs-toggle');
  var csGrid   = document.getElementById('md-cs-grid');

  var optWrap   = document.getElementById('md-wrap-article');
  var optLinks  = document.getElementById('md-blank-links');
  var optSmartQ = document.getElementById('md-smart-quotes');

  var currentTab = 'html';

  function escapeHtml(text) {
    return text
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  function parseMarkdown(md) {
    var html = md;

    /* Fenced code blocks first — protect from other rules */
    var codeBlocks = [];
    html = html.replace(/```(\w*)\n([\s\S]*?)```/gm, function(_, lang, code) {
      var langClass = lang ? ' class="language-' + lang + '"' : '';
      var placeholder = '\x00CODE' + codeBlocks.length + '\x00';
      codeBlocks.push('<pre><code' + langClass + '>' + escapeHtml(code.trim()) + '</code></pre>');
      return placeholder;
    });

    /* Inline code */
    html = html.replace(/`([^`\n]+)`/g, function(_, code) {
      return '<code>' + escapeHtml(code) + '</code>';
    });

    /* Headings */
    html = html.replace(/^###### (.+)$/gm, '<h6>$1</h6>');
    html = html.replace(/^##### (.+)$/gm,  '<h5>$1</h5>');
    html = html.replace(/^#### (.+)$/gm,   '<h4>$1</h4>');
    html = html.replace(/^### (.+)$/gm,    '<h3>$1</h3>');
    html = html.replace(/^## (.+)$/gm,     '<h2>$1</h2>');
    html = html.replace(/^# (.+)$/gm,      '<h1>$1</h1>');

    /* Horizontal rules */
    html = html.replace(/^[ \t]*(-{3,}|\*{3,}|_{3,})[ \t]*$/gm, '<hr>');

    /* Blockquotes */
    html = html.replace(/^> (.+)$/gm, '<blockquote><p>$1</p></blockquote>');

    /* Bold + italic combined */
    html = html.replace(/\*{3}(.+?)\*{3}/g, '<strong><em>$1</em></strong>');
    html = html.replace(/_{3}(.+?)_{3}/g,   '<strong><em>$1</em></strong>');
    /* Bold */
    html = html.replace(/\*{2}(.+?)\*{2}/g, '<strong>$1</strong>');
    html = html.replace(/_{2}(.+?)_{2}/g,   '<strong>$1</strong>');
    /* Italic */
    html = html.replace(/\*([^*\n]+)\*/g,   '<em>$1</em>');
    html = html.replace(/_([^_\n]+)_/g,     '<em>$1</em>');
    /* Strikethrough */
    html = html.replace(/~~(.+?)~~/g, '<del>$1</del>');

    /* Images before links */
    html = html.replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1">');

    /* Links */
    var target = optLinks.checked ? ' target="_blank" rel="noopener noreferrer"' : '';
    html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2"' + target + '>$1</a>');

    /* Tables */
    html = html.replace(/((?:\|.+\|\n)+)/gm, function(block) {
      var rows = block.trim().split('\n');
      if (rows.length < 2) return block;
      var isSep = /^\|[\s\-:|]+\|$/.test(rows[1]);
      if (!isSep) return block;

      var headerCells = rows[0].split('|').filter(function(c){ return c.trim(); });
      var headers = '<thead><tr>' + headerCells.map(function(c){ return '<th>' + c.trim() + '</th>'; }).join('') + '</tr></thead>';
      var bodyRows = rows.slice(2).map(function(row){
        var cells = row.split('|').filter(function(c){ return c.trim() !== undefined && c !== ''; });
        return '<tr>' + cells.map(function(c){ return '<td>' + c.trim() + '</td>'; }).join('') + '</tr>';
      }).join('\n');
      return '\n<table>\n' + headers + '\n<tbody>\n' + bodyRows + '\n</tbody>\n</table>\n';
    });

    /* Unordered lists */
    html = html.replace(/((?:^[ \t]*[-*+] .+\n?)+)/gm, function(list) {
      var items = list.trim().split('\n').map(function(item){
        return '<li>' + item.replace(/^[ \t]*[-*+] /, '').trim() + '</li>';
      }).join('\n');
      return '\n<ul>\n' + items + '\n</ul>\n';
    });

    /* Ordered lists */
    html = html.replace(/((?:^[ \t]*\d+\. .+\n?)+)/gm, function(list) {
      var items = list.trim().split('\n').map(function(item){
        return '<li>' + item.replace(/^[ \t]*\d+\. /, '').trim() + '</li>';
      }).join('\n');
      return '\n<ol>\n' + items + '\n</ol>\n';
    });

    /* Restore code blocks */
    codeBlocks.forEach(function(block, i) {
      html = html.replace('\x00CODE' + i + '\x00', '\n' + block + '\n');
    });

    /* Wrap remaining text lines in <p> */
    var lines = html.split('\n');
    var result = [];
    var i = 0;
    while (i < lines.length) {
      var line = lines[i].trim();
      if (!line) {
        result.push('');
      } else if (/^<(h[1-6]|ul|ol|li|blockquote|pre|hr|table|thead|tbody|tr|th|td|img|article)[\s>]/.test(line) || line === '</ul>' || line === '</ol>' || line === '</table>' || line === '</thead>' || line === '</tbody>') {
        result.push(line);
      } else {
        result.push('<p>' + line + '</p>');
      }
      i++;
    }
    html = result.join('\n');

    /* Smart quotes */
    if (optSmartQ.checked) {
      html = html.replace(/"([^"<>]+)"/g, '\u201c$1\u201d');
      html = html.replace(/'([^'<>]+)'/g, '\u2018$1\u2019');
    }

    /* Clean up excess blank lines */
    html = html.replace(/\n{3,}/g, '\n\n').trim();

    /* Wrap in article */
    if (optWrap.checked) {
      html = '<article>\n' + html + '\n</article>';
    }

    return html;
  }

  /* Strip executable content before injecting into the preview pane.
     Covers: script/iframe/object/embed elements, on* event handlers,
     javascript: URLs. Uses DOMParser so the browser never executes anything. */
  function sanitize(html) {
    var doc = new DOMParser().parseFromString(html, 'text/html');
    ['script','iframe','object','embed','form','meta','base','link'].forEach(function(tag) {
      doc.querySelectorAll(tag).forEach(function(el) { el.remove(); });
    });
    doc.querySelectorAll('*').forEach(function(el) {
      Array.from(el.attributes).forEach(function(attr) {
        if (/^on/i.test(attr.name)) {
          el.removeAttribute(attr.name);
        } else if (/^(href|src|action|formaction|data)$/i.test(attr.name) &&
                   /^\s*javascript:/i.test(attr.value)) {
          el.removeAttribute(attr.name);
        }
      });
    });
    return doc.body.innerHTML;
  }

  function convert() {
    var md   = mdInput.value;
    var html = md.trim() ? parseMarkdown(md) : '';

    mdOutput.value = html;

    if (currentTab === 'preview') {
      mdPrev.innerHTML = sanitize(html);
    }

    var words = md.trim() ? md.trim().split(/\s+/).filter(Boolean).length : 0;
    mdStat.textContent = words.toLocaleString() + ' word' + (words !== 1 ? 's' : '');
  }

  /* Tab switching */
  document.querySelectorAll('.md-tab').forEach(function(tab) {
    tab.addEventListener('click', function() {
      document.querySelectorAll('.md-tab').forEach(function(t) {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('active');
      tab.setAttribute('aria-selected', 'true');
      currentTab = tab.dataset.tab;

      if (currentTab === 'preview') {
        mdOutput.classList.add('hidden');
        mdPrev.classList.remove('hidden');
        mdPrev.innerHTML = sanitize(mdOutput.value);
      } else {
        mdPrev.classList.add('hidden');
        mdOutput.classList.remove('hidden');
      }
    });
  });

  /* Copy HTML output */
  copyBtn.addEventListener('click', function() {
    var text = mdOutput.value;
    if (!text) return;
    navigator.clipboard.writeText(text).then(function() {
      copyBtn.textContent = 'Copied!';
      setTimeout(function() { copyBtn.textContent = 'Copy HTML'; }, 2000);
    });
  });

  /* Clear */
  clearBtn.addEventListener('click', function() {
    mdInput.value = '';
    mdOutput.value = '';
    mdPrev.innerHTML = '';
    mdStat.textContent = '0 words';
    mdInput.focus();
  });

  /* Options */
  [optWrap, optLinks, optSmartQ].forEach(function(cb) {
    cb.addEventListener('change', convert);
  });

  /* Cheat sheet */
  csToggle.addEventListener('click', function() {
    var hidden = csGrid.classList.toggle('hidden');
    csToggle.textContent = hidden ? 'Show' : 'Hide';
  });

  mdInput.addEventListener('input', convert);
  convert();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
