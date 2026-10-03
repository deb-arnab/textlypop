<?php
$tool_slug   = 'serp-preview';
$tool_name   = 'SERP Preview Tool';

$page_title  = 'SERP Preview Tool — Google Search Result Preview | TextlyPop';
$meta_desc   = 'See how your title tag, URL and meta description will look in Google search results on desktop and mobile, with live pixel width and limits. Free.';
$canonical_url = 'https://textlypop.com/tools/serp-preview';
$og_title    = 'Free SERP Preview Tool — TextlyPop';
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
  "name": "SERP Preview Tool",
  "url": "https://textlypop.com/tools/serp-preview",
  "description": "Free SERP preview tool that shows how a title tag, URL and meta description will appear in search results on desktop and mobile, with live pixel-width measurement.",
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
      "name": "How long should a title tag and meta description be?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Search results are cut off by width rather than by a character count, so the practical targets are roughly 580 pixels for a desktop title and about 920 pixels for a desktop description. In everyday terms that works out at around 50 to 60 characters for the title and 140 to 160 characters for the description, but a title full of capitals or wide letters such as W and M will be truncated sooner than one made of narrow letters like i and l. The meters in this tool measure the real rendered width as you type, so aim to stay inside the green band rather than counting characters, and put the words that matter most near the start where they survive any truncation."
      }
    },
    {
      "@type": "Question",
      "name": "Why does Google show a different title from the one I wrote?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Since an update rolled out in August 2021, Google treats the title tag as a strong signal rather than a fixed instruction, and it rewrites the displayed title for a significant share of results. It usually does this when the title is excessively long, when it is stuffed with keywords or repeated boilerplate, when it is a generic placeholder like Home, or when the page has an H1 or anchor text that describes the content better for the query that was typed. Descriptions are rewritten even more often, because Google frequently pulls a passage from the page body that contains the words the searcher used. Writing a concise, accurate, non-repetitive title is the most reliable way to keep your own wording."
      }
    },
    {
      "@type": "Question",
      "name": "Does the meta description affect rankings?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Not directly. Google confirmed years ago that the meta description tag is not a ranking factor, and keywords placed in it do not lift a page up the results. What it does affect is the click-through rate, and that is worth real traffic: the description is your advertisement in the results list, and a clear, specific one that matches what the searcher asked for will win clicks from a vague one sitting in the same position. Treat it as sales copy with a length limit — say what the page delivers, be concrete, and avoid repeating the title word for word."
      }
    },
    {
      "@type": "Question",
      "name": "Why does this tool measure pixels instead of characters?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Because search results are laid out in a proportional font, where every character has its own width. In Arial, a lowercase l is roughly a quarter the width of an uppercase W, so two titles of exactly sixty characters can end up dramatically different lengths on screen — one fits comfortably while the other is cut off mid-word. Character counts are a rough proxy that was never accurate; measuring the text with the same font and size the results page uses tells you what will actually be visible. This tool draws your text to an off-screen canvas in Arial at the sizes search results use and reads back the exact width, which is the same technique the established SERP preview tools rely on."
      }
    },
    {
      "@type": "Question",
      "name": "How accurate is this preview compared with the real search results?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It is a close approximation, not a guarantee. The widths and font sizes used here match what desktop and mobile results currently render at, so the truncation point is usually within a character or two of the real thing. What no preview tool can reproduce is Google's own judgement: it may rewrite your title or description, swap in a passage from the page, show a date, a rating, sitelinks, an image thumbnail or breadcrumb variations, and it tests layout changes continuously. Use the preview to catch text that is obviously too long, too vague or truncated in an unfortunate place, and treat the exact pixel figure as a guide rather than a promise."
      }
    },
    {
      "@type": "Question",
      "name": "Should I put my brand name in the title tag?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Usually yes, at the end, separated by a dash or a pipe — it builds recognition and helps people spot you in a crowded results page. The cost is the width it consumes, so a long company name on a page with an already long title may push the useful words out of view. Two common fixes are to shorten the brand to its most recognisable form and to drop it entirely on pages where the query is purely informational and every pixel is needed for the topic. The homepage is the exception, where leading with the brand makes sense because the brand is what the page is about."
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
        ['name' => 'Enter your page URL', 'text' => 'Paste the full URL so the preview can show the domain and breadcrumb path exactly as search results do.'],
        ['name' => 'Write the title tag', 'text' => 'Type your title and watch the pixel meter — stay inside the limit so it is not cut off.'],
        ['name' => 'Write the meta description', 'text' => 'Add the description and keep it within the width shown, putting the key message first.'],
        ['name' => 'Check desktop and mobile', 'text' => 'Switch between the desktop and mobile views, then copy the finished HTML tags into your page.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>SERP preview tool</h1>
    <p>See how your title tag, URL and meta description will appear in search results — on desktop and mobile — with live pixel-width limits as you type.</p>
  </div>

  <div class="sp-tool" id="sp-tool">

    <!-- Editor -->
    <div class="sp-fields">

      <label class="sp-field">
        <span class="sp-label">Page URL</span>
        <input type="text" id="sp-url" class="sp-input" placeholder="https://example.com/blog/how-to-write-title-tags"
               data-save-key="serp-url" autocomplete="off" spellcheck="false">
      </label>

      <div class="sp-field">
        <div class="sp-field-head">
          <label class="sp-label" for="sp-title">Title tag</label>
          <span class="sp-counts"><span id="sp-title-chars">0</span> chars &middot; <span id="sp-title-px">0</span> / <span id="sp-title-max">580</span> px</span>
        </div>
        <input type="text" id="sp-title" class="sp-input" placeholder="How to write title tags that rank — Example Blog"
               data-save-key="serp-title" autocomplete="off">
        <div class="sp-meter"><div class="sp-meter-fill" id="sp-title-meter"></div></div>
        <p class="sp-note" id="sp-title-note"></p>
      </div>

      <div class="sp-field">
        <div class="sp-field-head">
          <label class="sp-label" for="sp-desc">Meta description</label>
          <span class="sp-counts"><span id="sp-desc-chars">0</span> chars &middot; <span id="sp-desc-px">0</span> / <span id="sp-desc-max">920</span> px</span>
        </div>
        <textarea id="sp-desc" class="sp-input sp-area" rows="3" placeholder="A practical guide to writing title tags that stay within Google's pixel limit, with examples and a checklist."
                  data-save-key="serp-desc"></textarea>
        <div class="sp-meter"><div class="sp-meter-fill" id="sp-desc-meter"></div></div>
        <p class="sp-note" id="sp-desc-note"></p>
      </div>

      <div class="sp-options">
        <label class="sp-inline">
          <span class="sp-label">Show date</span>
          <input type="date" id="sp-date" class="sp-input sp-date">
        </label>
        <div class="sp-opt-actions">
          <button class="btn btn-ghost sp-sm" id="sp-copy-tags">Copy HTML tags</button>
          <button class="btn btn-clear sp-sm" id="sp-clear">Clear</button>
        </div>
      </div>

    </div>

    <!-- Preview -->
    <div class="sp-preview">

      <div class="sp-device" role="group" aria-label="Preview device">
        <button class="sp-device-btn active" id="sp-device-desktop" data-device="desktop" aria-pressed="true">Desktop</button>
        <button class="sp-device-btn" id="sp-device-mobile" data-device="mobile" aria-pressed="false">Mobile</button>
      </div>

      <div class="sp-stage sp-stage-desktop" id="sp-stage">
        <div class="sp-result" id="sp-result">

          <div class="sp-site">
            <span class="sp-favicon" id="sp-favicon" aria-hidden="true">E</span>
            <span class="sp-site-text">
              <span class="sp-site-name" id="sp-site-name">Example</span>
              <span class="sp-site-url" id="sp-site-url">https://example.com &rsaquo; blog</span>
            </span>
          </div>

          <div class="sp-title" id="sp-preview-title">How to write title tags that rank — Example Blog</div>

          <div class="sp-desc" id="sp-preview-desc"><span class="sp-date" id="sp-preview-date"></span><span id="sp-preview-desc-text">A practical guide to writing title tags that stay within Google's pixel limit, with examples and a checklist.</span></div>

        </div>
      </div>

      <p class="sp-disclaimer">An approximation of a typical search result. Search engines may rewrite your title or description, or add dates, ratings and sitelinks.</p>

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

    <h2>About the search result snippet</h2>
    <p>A SERP — a search engine results page — is a list of snippets, and a snippet is only three lines long: a title, a URL line, and a short description. Those three lines are the entire shop window for a page that may have taken weeks to write. A SERP preview tool renders them the way the results page will, so you can see the thing a searcher actually sees before it goes live rather than guessing from a character counter in a content management system. The most common problems it catches are simple and expensive: a title cut off halfway through the words that mattered, a description that trails away mid-sentence, a brand name eating a third of the available space, or two pages whose snippets are so similar that a searcher cannot tell which one answers their question. Fixing any of those costs a minute of editing and can change how many people click.</p>

    <h2>History of the search snippet</h2>
    <p>The description meta tag predates Google itself — it was already in use with mid-1990s engines such as AltaVista and Infoseek, which read it directly as the summary and, in some cases, as a ranking input, a trust that was thoroughly abused by keyword stuffing. Google launched in 1998 with the ten-blue-links layout that still underpins the results page, and by the mid-2000s it had made the snippet dynamic, often assembling the description from the passage of the page that matched the query instead of the tag. Rich snippets arrived in 2009, letting structured data add ratings, prices and breadcrumbs, and favicons joined mobile results in 2019 and desktop in early 2020. Lengths have moved too: in December 2017 Google briefly stretched descriptions to around 320 characters before reverting to roughly 160 in May 2018, and in August 2021 it began rewriting displayed titles far more aggressively, drawing on H1s and anchor text when it judged a title unhelpful. The one constant is that the snippet keeps getting less literal — which is exactly why previewing what you control is still worth doing.</p>

    <h2>How title and description lengths are measured</h2>
    <p>Results are rendered in a proportional typeface, so the cut-off point depends on the width of your letters, not the number of them. An uppercase W is around four times the width of a lowercase l in Arial, which means two sixty-character titles can differ by well over a hundred pixels on screen. That is why this tool measures rather than counts: your text is drawn to an off-screen canvas in the same font and size the results page uses, and the meter reports the exact rendered width against the limit. The working limits are about 580 pixels for a desktop title and 920 pixels for a desktop description, with mobile allowing more total width because the text wraps over additional lines. Character counts are still shown because they are a familiar sanity check, but when the two disagree, trust the pixels.</p>

    <h2>What a SERP preview is used for</h2>
    <p>SEO specialists use it when writing or auditing metadata in bulk, pasting each title and description in to confirm nothing truncates before the point is made. Content writers and editors use it as the final check before publishing, the same way they would preview a subject line before sending an email. Developers use it while building templates, testing the longest realistic product name or article headline against the limit so that a pattern like "{product} — {category} — {store}" does not collapse on the longest items in the catalogue. It is equally useful for comparison: preview your snippet next to the wording of the results currently ranking for your query and it becomes obvious whether yours is more specific, or just more of the same.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How long should a title tag and meta description be?</p>
      <p class="faq-a">Search results are cut off by width rather than by a character count, so the practical targets are roughly 580 pixels for a desktop title and about 920 pixels for a desktop description. In everyday terms that works out at around 50 to 60 characters for the title and 140 to 160 characters for the description, but a title full of capitals or wide letters such as W and M will be truncated sooner than one made of narrow letters like i and l. The meters in this tool measure the real rendered width as you type, so aim to stay inside the green band rather than counting characters, and put the words that matter most near the start where they survive any truncation.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does Google show a different title from the one I wrote?</p>
      <p class="faq-a">Since an update rolled out in August 2021, Google treats the title tag as a strong signal rather than a fixed instruction, and it rewrites the displayed title for a significant share of results. It usually does this when the title is excessively long, when it is stuffed with keywords or repeated boilerplate, when it is a generic placeholder like Home, or when the page has an H1 or anchor text that describes the content better for the query that was typed. Descriptions are rewritten even more often, because Google frequently pulls a passage from the page body that contains the words the searcher used. Writing a concise, accurate, non-repetitive title is the most reliable way to keep your own wording.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the meta description affect rankings?</p>
      <p class="faq-a">Not directly. Google confirmed years ago that the meta description tag is not a ranking factor, and keywords placed in it do not lift a page up the results. What it does affect is the click-through rate, and that is worth real traffic: the description is your advertisement in the results list, and a clear, specific one that matches what the searcher asked for will win clicks from a vague one sitting in the same position. Treat it as sales copy with a length limit — say what the page delivers, be concrete, and avoid repeating the title word for word.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does this tool measure pixels instead of characters?</p>
      <p class="faq-a">Because search results are laid out in a proportional font, where every character has its own width. In Arial, a lowercase l is roughly a quarter the width of an uppercase W, so two titles of exactly sixty characters can end up dramatically different lengths on screen — one fits comfortably while the other is cut off mid-word. Character counts are a rough proxy that was never accurate; measuring the text with the same font and size the results page uses tells you what will actually be visible. This tool draws your text to an off-screen canvas in Arial at the sizes search results use and reads back the exact width, which is the same technique the established SERP preview tools rely on.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How accurate is this preview compared with the real search results?</p>
      <p class="faq-a">It is a close approximation, not a guarantee. The widths and font sizes used here match what desktop and mobile results currently render at, so the truncation point is usually within a character or two of the real thing. What no preview tool can reproduce is Google's own judgement: it may rewrite your title or description, swap in a passage from the page, show a date, a rating, sitelinks, an image thumbnail or breadcrumb variations, and it tests layout changes continuously. Use the preview to catch text that is obviously too long, too vague or truncated in an unfortunate place, and treat the exact pixel figure as a guide rather than a promise.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Should I put my brand name in the title tag?</p>
      <p class="faq-a">Usually yes, at the end, separated by a dash or a pipe — it builds recognition and helps people spot you in a crowded results page. The cost is the width it consumes, so a long company name on a page with an already long title may push the useful words out of view. Two common fixes are to shorten the brand to its most recognisable form and to drop it entirely on pages where the query is purely informational and every pixel is needed for the topic. The homepage is the exception, where leading with the brand makes sense because the brand is what the page is about.</p>
    </div>

  </div>

</div>

<!-- SERP preview CSS -->
<style>
.sp-tool {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 18px;
  align-items: start;
}

/* ── Editor ── */
.sp-fields {
  display: flex;
  flex-direction: column;
  gap: 16px;
  padding: 18px 16px;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
}

.sp-field { display: block; }

.sp-field-head {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  gap: 10px;
}

.sp-label {
  display: block;
  margin-bottom: 5px;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.sp-counts {
  font-size: 0.75rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
  white-space: nowrap;
}

.sp-input {
  width: 100%;
  padding: 9px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  outline: none;
  transition: border-color var(--transition);
}

.sp-input:focus { border-color: var(--accent); }
.sp-input::placeholder { color: var(--text-3); }
.sp-area { resize: vertical; line-height: 1.5; min-height: 78px; }

/* Width meters */
.sp-meter {
  height: 4px;
  margin-top: 7px;
  border-radius: 2px;
  background: var(--bg-3);
  overflow: hidden;
}

.sp-meter-fill {
  height: 100%;
  width: 0;
  border-radius: 2px;
  background: var(--accent);
  transition: width var(--transition), background var(--transition);
}

.sp-meter-fill.warn { background: var(--warning); }
.sp-meter-fill.over { background: var(--danger); }

.sp-note { margin: 6px 0 0; font-size: 0.8125rem; color: var(--text-3); min-height: 1.2em; }
.sp-note.warn { color: var(--warning); }
.sp-note.over { color: var(--danger); }
.sp-note.ok   { color: var(--success); }

.sp-options {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 12px;
  padding-top: 14px;
  border-top: 1px solid var(--border);
  flex-wrap: wrap;
}

.sp-inline { display: block; }
.sp-date { width: auto; min-width: 150px; cursor: pointer; }
.sp-opt-actions { display: flex; gap: 6px; flex-wrap: wrap; }
.sp-sm { font-size: 0.8125rem; padding: 6px 12px; }

/* ── Preview ── */
.sp-preview {
  position: sticky;
  top: calc(var(--header-h) + 16px);
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.sp-device { display: flex; gap: 6px; }

.sp-device-btn {
  padding: 6px 16px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.8125rem;
  font-weight: 500;
  cursor: pointer;
  transition: background var(--transition), border-color var(--transition), color var(--transition);
}

.sp-device-btn:hover { border-color: var(--accent); }
.sp-device-btn.active { background: var(--accent); border-color: var(--accent); color: #fff; }

.sp-stage {
  padding: 18px 16px;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
}

/* The result itself uses Arial at search-result sizes so the preview matches the measurements */
.sp-result { font-family: Arial, Helvetica, sans-serif; max-width: 600px; }

.sp-site { display: flex; align-items: center; gap: 10px; margin-bottom: 4px; }

.sp-favicon {
  flex: none;
  width: 26px;
  height: 26px;
  border-radius: 50%;
  border: 1px solid var(--border);
  background: var(--bg-3);
  color: var(--text-2);
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sp-site-text { display: flex; flex-direction: column; min-width: 0; }
.sp-site-name { font-size: 14px; line-height: 1.3; color: var(--text); }

.sp-site-url {
  font-size: 12px;
  line-height: 1.3;
  color: var(--text-2);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.sp-title {
  font-size: 20px;
  line-height: 1.3;
  color: #1a0dab;
  margin: 2px 0 3px;
  cursor: pointer;
  word-break: break-word;
}

.sp-title:hover { text-decoration: underline; }
[data-theme="dark"] .sp-title { color: #8ab4f8; }

.sp-desc {
  font-size: 14px;
  line-height: 1.58;
  color: var(--text-2);
  word-break: break-word;
}

[data-theme="dark"] .sp-desc { color: #bdc1c6; }

.sp-date { color: var(--text-3); }
.sp-desc-empty { color: var(--text-3); font-style: italic; }

/* Mobile rendering */
.sp-stage-mobile { padding: 16px 12px; }

.sp-stage-mobile .sp-result {
  max-width: 400px;
  margin: 0 auto;
  padding: 14px 14px 16px;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg-2);
}

.sp-stage-mobile .sp-title { font-size: 18px; line-height: 1.35; }
.sp-stage-mobile .sp-desc { font-size: 14px; }

.sp-disclaimer { margin: 0; font-size: 0.75rem; color: var(--text-3); line-height: 1.5; }

@media (max-width: 860px) {
  .sp-tool { grid-template-columns: 1fr; }
  .sp-preview { position: static; }
}
</style>

<!-- SERP preview JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var urlInput   = document.getElementById('sp-url');
  var titleInput = document.getElementById('sp-title');
  var descInput  = document.getElementById('sp-desc');
  var dateInput  = document.getElementById('sp-date');

  var titleChars = document.getElementById('sp-title-chars');
  var titlePx    = document.getElementById('sp-title-px');
  var titleMax   = document.getElementById('sp-title-max');
  var titleMeter = document.getElementById('sp-title-meter');
  var titleNote  = document.getElementById('sp-title-note');

  var descChars  = document.getElementById('sp-desc-chars');
  var descPx     = document.getElementById('sp-desc-px');
  var descMax    = document.getElementById('sp-desc-max');
  var descMeter  = document.getElementById('sp-desc-meter');
  var descNote   = document.getElementById('sp-desc-note');

  var stage      = document.getElementById('sp-stage');
  var favicon    = document.getElementById('sp-favicon');
  var siteName   = document.getElementById('sp-site-name');
  var siteUrl    = document.getElementById('sp-site-url');
  var outTitle   = document.getElementById('sp-preview-title');
  var outDesc    = document.getElementById('sp-preview-desc');
  var outDescTxt = document.getElementById('sp-preview-desc-text');
  var outDate    = document.getElementById('sp-preview-date');

  var deviceBtns = document.querySelectorAll('.sp-device-btn');
  var copyBtn    = document.getElementById('sp-copy-tags');
  var clearBtn   = document.getElementById('sp-clear');

  /* Rendered widths of a search result, measured in Arial at the sizes the
     results page uses. Mobile allows more total width because text wraps
     over more lines. */
  var LIMITS = {
    desktop: { title: 580,  titleFont: '20px Arial', desc: 920,  descFont: '14px Arial' },
    mobile:  { title: 920,  titleFont: '18px Arial', desc: 1030, descFont: '14px Arial' }
  };

  var device = 'desktop';

  var ctx = document.createElement('canvas').getContext('2d');

  function widthOf(text, font) {
    ctx.font = font;
    return ctx.measureText(text).width;
  }

  /* Cut text to a pixel budget, ending with an ellipsis like search results do */
  function truncateToWidth(text, font, max) {
    if (widthOf(text, font) <= max) return { text: text, cut: false };

    var ell = '…';
    var lo = 0, hi = text.length;
    while (lo < hi) {
      var mid = Math.ceil((lo + hi) / 2);
      if (widthOf(text.slice(0, mid) + ell, font) <= max) lo = mid;
      else hi = mid - 1;
    }
    // Prefer breaking on a word boundary when one is close by
    var cut = text.slice(0, lo);
    var space = cut.lastIndexOf(' ');
    if (space > lo - 15 && space > 0) cut = cut.slice(0, space);
    return { text: cut.replace(/[\s,;:.\-]+$/, '') + ell, cut: true };
  }

  function setMeter(fill, note, px, max, kind, minChars, chars) {
    var pct = max ? Math.min(100, (px / max) * 100) : 0;
    fill.style.width = pct + '%';
    fill.classList.remove('warn', 'over');
    note.classList.remove('warn', 'over', 'ok');

    if (px > max) {
      fill.classList.add('over');
      note.classList.add('over');
      note.textContent = 'Too long — this ' + kind + ' will be cut off in results.';
    } else if (px > max * 0.92) {
      fill.classList.add('warn');
      note.classList.add('warn');
      note.textContent = 'Close to the limit — a slightly wider font could truncate it.';
    } else if (!chars) {
      note.textContent = '';
    } else if (chars < minChars) {
      note.classList.add('warn');
      note.textContent = 'Quite short — there is room to say more.';
    } else {
      note.classList.add('ok');
      note.textContent = 'Good length.';
    }
  }

  /* Break a URL into the site name and the "domain › path › path" line */
  function parseUrl(raw) {
    var value = (raw || '').trim();
    if (!value) return null;
    if (!/^https?:\/\//i.test(value)) value = 'https://' + value;

    var url;
    try { url = new URL(value); } catch (e) { return null; }
    if (!url.hostname || url.hostname.indexOf('.') === -1) return null;

    var host  = url.hostname.replace(/^www\./i, '');
    var parts = url.pathname.split('/').filter(Boolean).map(function (p) {
      return decodeURIComponent(p).replace(/\.(html?|php|aspx?)$/i, '');
    });

    var label = host.split('.')[0];
    return {
      host:  host,
      name:  label.charAt(0).toUpperCase() + label.slice(1),
      crumb: url.protocol + '//' + host + (parts.length ? ' › ' + parts.join(' › ') : '')
    };
  }

  function formatDate(value) {
    if (!value) return '';
    var parts = value.split('-');
    if (parts.length !== 3) return '';
    var d = new Date(Number(parts[0]), Number(parts[1]) - 1, Number(parts[2]));
    if (isNaN(d.getTime())) return '';
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    return months[d.getMonth()] + ' ' + d.getDate() + ', ' + d.getFullYear();
  }

  function render() {
    var limits = LIMITS[device];

    /* Site + URL line */
    var parsed = parseUrl(urlInput.value);
    if (parsed) {
      siteName.textContent = parsed.name;
      siteUrl.textContent  = parsed.crumb;
      favicon.textContent  = parsed.host.charAt(0);
    } else {
      siteName.textContent = 'Example';
      siteUrl.textContent  = 'https://example.com';
      favicon.textContent  = 'E';
    }

    /* Title */
    var titleText = titleInput.value.trim();
    var titleShown = titleText || 'Your page title will appear here';
    var tw = widthOf(titleShown, limits.titleFont);

    titleChars.textContent = titleText.length;
    titlePx.textContent    = Math.round(titleText ? tw : 0);
    titleMax.textContent   = limits.title;
    setMeter(titleMeter, titleNote, titleText ? tw : 0, limits.title, 'title', 30, titleText.length);

    var tTrim = truncateToWidth(titleShown, limits.titleFont, limits.title);
    outTitle.textContent = tTrim.text;

    /* Date prefix eats into the description's width budget */
    var dateText = formatDate(dateInput.value);
    outDate.textContent = dateText ? dateText + ' — ' : '';
    var datePx = dateText ? widthOf(dateText + ' — ', limits.descFont) : 0;

    /* Description */
    var descText  = descInput.value.trim().replace(/\s+/g, ' ');
    var descShown = descText || 'Your meta description will appear here. Aim for a clear, specific summary of what the page delivers.';
    var dw = widthOf(descShown, limits.descFont);

    descChars.textContent = descText.length;
    descPx.textContent    = Math.round(descText ? dw + datePx : 0);
    descMax.textContent   = limits.desc;
    setMeter(descMeter, descNote, descText ? dw + datePx : 0, limits.desc, 'description', 70, descText.length);

    var dTrim = truncateToWidth(descShown, limits.descFont, limits.desc - datePx);
    outDescTxt.textContent = dTrim.text;

    outTitle.classList.toggle('sp-desc-empty', !titleText);
    outDescTxt.classList.toggle('sp-desc-empty', !descText);
  }

  /* ── Device switch ── */
  deviceBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      device = btn.dataset.device;
      deviceBtns.forEach(function (b) {
        var on = b === btn;
        b.classList.toggle('active', on);
        b.setAttribute('aria-pressed', on ? 'true' : 'false');
      });
      stage.classList.toggle('sp-stage-desktop', device === 'desktop');
      stage.classList.toggle('sp-stage-mobile', device === 'mobile');
      render();
    });
  });

  /* ── Copy the finished tags ── */
  function escapeAttr(str) {
    return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  copyBtn.addEventListener('click', function () {
    var title = titleInput.value.trim();
    var desc  = descInput.value.trim().replace(/\s+/g, ' ');
    if (!title && !desc) return;

    var tags = '<title>' + escapeAttr(title) + '</title>\n' +
               '<meta name="description" content="' + escapeAttr(desc) + '">';

    navigator.clipboard.writeText(tags).then(function () {
      var original = copyBtn.textContent;
      copyBtn.textContent = 'Copied!';
      copyBtn.classList.add('copied');
      setTimeout(function () {
        copyBtn.textContent = original;
        copyBtn.classList.remove('copied');
      }, 2000);
    });
  });

  clearBtn.addEventListener('click', function () {
    [urlInput, titleInput, descInput, dateInput].forEach(function (el) {
      el.value = '';
      el.dispatchEvent(new Event('input'));   // clears the auto-saved copy too
    });
    render();
  });

  [urlInput, titleInput, descInput, dateInput].forEach(function (el) {
    el.addEventListener('input', render);
    el.addEventListener('change', render);
  });

  /* Fonts can finish loading after first paint — re-measure once they do */
  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(render);
  }

  render();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
