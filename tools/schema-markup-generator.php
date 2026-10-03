<?php
$tool_slug   = 'schema-markup-generator';
$tool_name   = 'Schema Markup Generator';

$page_title  = 'Schema Markup Generator — Free JSON-LD Generator | TextlyPop';
$meta_desc   = 'Generate valid JSON-LD schema markup for Article, FAQ, Product, LocalBusiness, Event, Recipe and more. Fill in the form, copy the code. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/schema-markup-generator';
$og_title    = 'Free Schema Markup Generator — JSON-LD Structured Data';
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
  "name": "Schema Markup Generator",
  "url": "https://textlypop.com/tools/schema-markup-generator",
  "description": "Free schema markup generator that builds valid JSON-LD structured data for Article, FAQPage, Product, LocalBusiness, Event, Recipe, HowTo, VideoObject, JobPosting and more.",
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
      "name": "What is schema markup and does it affect rankings?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Schema markup is structured data added to a page in a vocabulary search engines agree on, describing what the page is about in machine-readable terms. It is not a ranking factor in itself — adding it does not move you up the results. What it does is make a page eligible for rich results such as star ratings, recipe cards, event listings and breadcrumbs, and it helps search engines and AI systems identify the entities on the page with confidence rather than inference."
      }
    },
    {
      "@type": "Question",
      "name": "Where do I put the JSON-LD code on my page?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste the whole script block into the HTML of the page it describes. Google reads JSON-LD from either the head or the body, so either is fine, and the head is the common convention. The data must match what visitors actually see on that page — markup describing content that is not present is a guidelines violation. On WordPress, most SEO plugins have a field for custom JSON-LD, or you can add it with a header-script plugin."
      }
    },
    {
      "@type": "Question",
      "name": "Do FAQ and HowTo schema still produce rich results?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Mostly no, as of Google's August 2023 change. FAQ rich results are now shown only for well-known authoritative government and health sites, and HowTo rich results were retired. The markup remains valid schema.org and still helps machines understand page structure, but you should not expect the SERP enhancement any more. Article, Product, Recipe, Event, Breadcrumb, LocalBusiness and VideoObject are the types where visible rich results are still routinely granted."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use more than one schema type on the same page?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, and it is normal. A single article page commonly carries Article, BreadcrumbList and Organization markup at once. You can either add several separate script blocks or combine them into one block using an array at the top level. Both are valid and Google treats them the same, so generate each type here and paste the blocks one after another."
      }
    },
    {
      "@type": "Question",
      "name": "Why does the Rich Results Test pass but no rich result appears?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Validity makes a page eligible for a rich result; it does not entitle it to one. Google decides case by case based on content quality, whether the markup matches the visible page, site-level trust and the query itself, and some types no longer produce enhancements at all. Rich results also take time to appear after a page is recrawled. Check the Enhancements reports in Search Console to see what Google has actually recognised on your site."
      }
    },
    {
      "@type": "Question",
      "name": "Is it safe to add review ratings to my schema?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Only when the ratings are real, collected from genuine customers and visible on the page itself. Inventing an aggregateRating, or marking up ratings that do not appear anywhere a visitor can see, breaches Google's structured data guidelines and is a common cause of manual actions that strip every rich result from a domain. If you have no reviews yet, leave the rating fields empty — the rest of the markup is still valid and useful without them."
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
        ['name' => 'Choose a schema type', 'text' => 'Pick the schema type that matches your page — Article, FAQPage, Product, LocalBusiness, Event, Recipe and more are available.'],
        ['name' => 'Fill in the fields', 'text' => 'Complete the form. Required fields are marked, and the JSON-LD output updates live as you type. Leave optional fields empty and they are omitted from the output.'],
        ['name' => 'Check the warnings', 'text' => 'The generator lists any required properties still missing so you can fix them before publishing.'],
        ['name' => 'Copy the code into your page', 'text' => 'Copy the generated script block and paste it into the HTML of the page it describes, then confirm it with Google\'s Rich Results Test.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Schema markup generator</h1>
    <p>Build valid JSON-LD structured data for any page. Choose a type, fill in the fields, and copy the generated code — everything runs in your browser.</p>
  </div>

  <div class="smg-tool" id="smg-tool">

    <!-- Form side -->
    <div class="smg-form-panel">

      <div class="smg-type-row">
        <label class="smg-label" for="smg-type">Schema type</label>
        <select id="smg-type" class="smg-select"></select>
        <p class="smg-type-note" id="smg-type-note"></p>
      </div>

      <div class="smg-fields" id="smg-fields"></div>

      <div class="smg-form-actions">
        <button class="btn btn-clear smg-sm" id="smg-reset" type="button">Reset fields</button>
      </div>

    </div>

    <!-- Output side -->
    <div class="smg-output-panel">

      <div class="smg-out-head">
        <span class="smg-out-title">JSON-LD output</span>
        <div class="smg-out-actions">
          <label class="smg-wrap-toggle">
            <input type="checkbox" id="smg-wrap" checked>
            <span>Script tag</span>
          </label>
          <button class="btn btn-ghost smg-sm" id="smg-download" type="button">Download</button>
          <button class="btn btn-primary smg-sm btn-copy" id="smg-copy" data-target="smg-output" type="button">Copy</button>
        </div>
      </div>

      <pre class="smg-output" id="smg-output" tabindex="0" aria-live="polite" aria-label="Generated JSON-LD"></pre>

      <div class="smg-validate" id="smg-validate" role="status"></div>

      <p class="smg-disclaimer">Your markup must describe content that is actually visible on the page. Verify the result with
        <a href="https://search.google.com/test/rich-results" target="_blank" rel="noopener nofollow">Google&rsquo;s Rich Results Test</a> or the
        <a href="https://validator.schema.org/" target="_blank" rel="noopener nofollow">Schema.org validator</a> before relying on it.</p>

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

    <h2>What structured data does</h2>
    <p>A web page tells a human reader what it is about through layout and context: a price looks like a price because of where it sits and the currency symbol in front of it. A machine has none of that. Structured data closes the gap by restating the same facts in a fixed vocabulary — this string is the product name, this number is the price, this date is when the event starts — so a search engine does not have to infer them from the HTML.</p>
    <p>Two consequences follow. The visible one is rich results: the star ratings, recipe cards, event listings and breadcrumb trails that occupy more space in the search results than a plain blue link. The less visible one matters more over time. Structured data states which entities a page is about unambiguously, which is how search engines and AI answer systems connect a page to a company, a person or a product rather than guessing from text. That identification work continues even for schema types that no longer earn a visual enhancement.</p>
    <p>What structured data does not do is improve rankings on its own. Google has been explicit on this point for years, and it is worth holding onto: marking up a thin page does not make it competitive. Schema makes a good page eligible for better presentation.</p>

    <h2>The history of schema.org and JSON-LD</h2>
    <p>Structured data on the web went through three awkward formats before settling. Microformats arrived around 2004, embedding meaning in ordinary HTML class attributes. RDFa followed in 2008 with far more expressive power and far more complexity, and HTML5 introduced microdata as a simpler middle ground. All three shared one flaw: the data was tangled into the markup, so changing a page's layout risked breaking its meaning.</p>
    <p>The vocabulary itself was unified on 2 June 2011, when Google, Bing and Yahoo jointly launched schema.org, with Yandex joining soon after. For the first time the major search engines agreed on one set of type and property names instead of each publishing its own. JSON-LD — a way of expressing the same vocabulary as a self-contained block of JSON rather than attributes sprinkled through the HTML — became a W3C Recommendation on 16 January 2014, and version 1.1 followed in July 2020. Google came to recommend JSON-LD over the alternatives precisely because it is detachable: the structured data sits in one script block, independent of the markup around it, which makes it far easier to generate, review and keep correct. That is the format this generator produces.</p>

    <h2>Schema types and what they are still good for</h2>
    <p>Google's rich result support has narrowed over time, most notably in August 2023 when FAQ rich results were restricted to authoritative government and health sites and HowTo rich results were retired altogether. The markup for those types remains valid schema.org and still helps machines read a page, but the SERP enhancement is gone. The table below reflects what each type realistically earns today.</p>
    <div class="table-scroll">
      <table class="seo-table">
        <thead>
          <tr><th>Type</th><th>Use it on</th><th>Rich result today</th></tr>
        </thead>
        <tbody>
          <tr><td>Article / BlogPosting</td><td>News, blog posts, guides</td><td>Yes — headline and image treatments</td></tr>
          <tr><td>Product</td><td>Product and shop pages</td><td>Yes — price, availability, ratings</td></tr>
          <tr><td>LocalBusiness</td><td>Premises customers visit</td><td>Yes — hours, address, map prominence</td></tr>
          <tr><td>Event</td><td>Gigs, classes, conferences</td><td>Yes — date and venue listings</td></tr>
          <tr><td>Recipe</td><td>Recipe pages</td><td>Yes — cards, times, ratings</td></tr>
          <tr><td>VideoObject</td><td>Pages hosting a video</td><td>Yes — video thumbnails and key moments</td></tr>
          <tr><td>BreadcrumbList</td><td>Any page inside a hierarchy</td><td>Yes — breadcrumb trail in place of the URL</td></tr>
          <tr><td>JobPosting</td><td>Vacancy pages</td><td>Yes — Google Jobs eligibility</td></tr>
          <tr><td>Organization / Person</td><td>Home, about and profile pages</td><td>Indirect — feeds knowledge panels</td></tr>
          <tr><td>WebSite</td><td>Homepage only</td><td>Indirect — sitelinks search box</td></tr>
          <tr><td>FAQPage</td><td>Genuine Q&amp;A sections</td><td>Restricted to authoritative health and government sites</td></tr>
          <tr><td>HowTo</td><td>Step-by-step instructions</td><td>Retired in 2023</td></tr>
        </tbody>
      </table>
    </div>

    <h2>Where the code goes and how to check it</h2>
    <p>The generated block is self-contained, so it can be pasted anywhere in the page's HTML. Google reads JSON-LD from both the head and the body; the head is the usual convention, and a header-injection field in your CMS or SEO plugin is the normal place to put it. Multiple types on one page are expected rather than a problem — an article inside a category commonly carries Article, BreadcrumbList and Organization markup together, either as separate script blocks or combined into a single top-level array.</p>
    <p>Two checks are worth doing every time. Run the page through Google's Rich Results Test, which reports whether the markup is both valid and eligible for an enhancement, and read the Enhancements section of Search Console after the page is recrawled, which shows what Google actually recognised on the live URL rather than what the code claims. The second catches the mismatch the first cannot: markup that is technically perfect but describes prices, ratings or dates that no longer match the page.</p>
    <p>Because JSON-LD is plain JSON, the neighbouring tools apply directly. The <a href="/tools/json-formatter">JSON formatter and validator</a> will pretty-print or check a block you have inherited from elsewhere, the <a href="/tools/serp-preview">SERP preview tool</a> shows how the title and description around your markup will read in the results, and <a href="/tools/text-to-slug">text to slug</a> helps build the clean URLs that breadcrumb markup describes.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is schema markup and does it affect rankings?</p>
      <p class="faq-a">Schema markup is structured data added to a page in a vocabulary search engines agree on, describing what the page is about in machine-readable terms. It is not a ranking factor in itself — adding it will not move a page up the results, and Google has said so consistently. What it does is make the page eligible for rich results such as star ratings, recipe cards and event listings, and it lets search engines and AI systems identify the entities on the page with confidence instead of inferring them from the text. The practical framing is that schema improves how a page is presented and understood, not where it sits.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Where do I put the JSON-LD code on my page?</p>
      <p class="faq-a">Paste the whole script block into the HTML of the page it describes. Google reads JSON-LD from either the head or the body, so either works, and the head is the usual convention. In WordPress, most SEO plugins offer a field for custom JSON-LD, or a header-script plugin will do it; in a hand-built site it goes straight into the template for that page type. The one hard rule is that the markup must describe content a visitor can actually see on that page — structured data about prices, ratings or dates that are not present on the page is a guidelines violation, regardless of whether it validates.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Do FAQ and HowTo schema still produce rich results?</p>
      <p class="faq-a">Largely no, following Google's August 2023 change. FAQ rich results are now shown only for well-known authoritative government and health sites, and HowTo rich results were retired entirely. Both types are still valid schema.org and still describe page structure usefully to machines, so there is no harm in using them, but you should not add them expecting the SERP enhancement that older guides promise. The types where visible rich results are still routinely granted are Article, Product, Recipe, Event, BreadcrumbList, LocalBusiness, VideoObject and JobPosting.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use more than one schema type on the same page?</p>
      <p class="faq-a">Yes, and most pages should. A blog post sitting inside a category typically carries Article markup for the post, BreadcrumbList for its position in the hierarchy, and Organization for the publisher — three types describing three different things about one page. You can add them as separate script blocks one after another, or combine them into a single block using a JSON array at the top level. Google treats both arrangements identically, so generate each type here and paste the blocks together. What you should not do is declare the same type twice with conflicting values, which forces a search engine to pick one.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does the Rich Results Test pass but no rich result appears?</p>
      <p class="faq-a">Validity makes a page eligible for a rich result; it does not entitle it to one. Google decides case by case, weighing content quality, whether the markup matches the visible page, the trust it extends to the site overall, and the query being searched — and for some types, FAQ and HowTo among them, no enhancement is offered any more regardless of validity. Timing accounts for many apparent failures too, since nothing can appear until the page has been recrawled, which takes days to weeks. The Enhancements reports in Search Console are the authoritative check: they show what Google recognised on the live URL rather than what your code claims.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is it safe to add review ratings to my schema?</p>
      <p class="faq-a">Only when the ratings are genuine, gathered from real customers, and visible on the page itself. Inventing an aggregateRating, or marking up ratings that appear nowhere a visitor can see, breaches Google's structured data guidelines and is one of the more common causes of a manual action — and that penalty typically strips rich results from the whole domain, not just the offending page. Self-serving reviews of your own business on your own site are disallowed as well. If you have no reviews yet, leave the rating fields empty; the remaining markup is perfectly valid without them, and you can add ratings later once there is something real to report.</p>
    </div>

  </div>

</div>

<style>
/* ── Schema markup generator ──────────────────────────────── */
.smg-tool {
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
  gap: 18px;
  align-items: start;
}

.smg-form-panel,
.smg-output-panel {
  min-width: 0;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
}

.smg-form-panel { padding: 16px; }

/* ── Type selector ── */
.smg-type-row { margin-bottom: 4px; }

.smg-label {
  display: block;
  font-size: 0.86rem;
  font-weight: 600;
  margin-bottom: 5px;
}

.smg-select,
.smg-input {
  width: 100%;
  padding: 8px 10px;
  font: inherit;
  font-size: 0.93rem;
  color: var(--text);
  background: var(--bg-2);
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
}

.smg-select:focus-visible,
.smg-input:focus-visible {
  outline: 2px solid var(--accent);
  outline-offset: 1px;
}

.smg-input.smg-area { resize: vertical; min-height: 68px; }

.smg-type-note {
  margin: 7px 0 0;
  font-size: 0.82rem;
  color: var(--text-2);
  line-height: 1.5;
}

/* ── Fields ── */
.smg-fields {
  display: flex;
  flex-direction: column;
  gap: 13px;
  margin-top: 16px;
  padding-top: 16px;
  border-top: 1px solid var(--border);
}

.smg-field { min-width: 0; }

.smg-field-label {
  display: flex;
  align-items: baseline;
  gap: 6px;
  font-size: 0.84rem;
  font-weight: 600;
  margin-bottom: 4px;
}

.smg-req {
  font-size: 0.72rem;
  font-weight: 600;
  color: var(--accent);
  text-transform: uppercase;
  letter-spacing: 0.03em;
}

.smg-hint {
  margin: 4px 0 0;
  font-size: 0.79rem;
  color: var(--text-2);
  line-height: 1.5;
}

/* Duration + paired inputs */
.smg-pair { display: flex; gap: 8px; align-items: center; }
.smg-pair .smg-input { width: auto; flex: 1 1 0; min-width: 0; }
.smg-pair-unit { font-size: 0.82rem; color: var(--text-2); white-space: nowrap; }

/* Repeating single values */
.smg-list { display: flex; flex-direction: column; gap: 7px; }

.smg-list-row { display: flex; gap: 7px; }
.smg-list-row .smg-input { flex: 1 1 auto; min-width: 0; }

.smg-icon-btn {
  flex: 0 0 auto;
  width: 30px;
  padding: 0;
  font: inherit;
  font-size: 1rem;
  line-height: 1;
  color: var(--text-2);
  background: var(--bg-2);
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  cursor: pointer;
}

.smg-icon-btn:hover { color: var(--accent); border-color: var(--accent); }

.smg-add {
  align-self: flex-start;
  padding: 5px 11px;
  font: inherit;
  font-size: 0.82rem;
  color: var(--text-2);
  background: var(--bg-2);
  border: 1px dashed var(--border-2);
  border-radius: var(--radius-sm);
  cursor: pointer;
}

.smg-add:hover { color: var(--accent); border-color: var(--accent); }

/* Repeating groups of fields */
.smg-group { display: flex; flex-direction: column; gap: 10px; }

.smg-group-card {
  padding: 11px;
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  background: var(--bg-2);
}

.smg-group-head {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 8px;
}

.smg-group-num {
  font-size: 0.78rem;
  font-weight: 600;
  color: var(--text-2);
  text-transform: uppercase;
  letter-spacing: 0.04em;
}

.smg-group-card .smg-field + .smg-field { margin-top: 9px; }
.smg-group-card .smg-input { background: var(--bg); }

/* Nested fieldset (address, offers…) */
.smg-sub {
  padding: 11px;
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  background: var(--bg-2);
}

.smg-sub-title {
  font-size: 0.78rem;
  font-weight: 600;
  color: var(--text-2);
  text-transform: uppercase;
  letter-spacing: 0.04em;
  margin-bottom: 9px;
}

.smg-sub .smg-field + .smg-field { margin-top: 9px; }
.smg-sub .smg-input { background: var(--bg); }

.smg-form-actions {
  margin-top: 16px;
  padding-top: 14px;
  border-top: 1px solid var(--border);
}

.smg-sm { padding: 6px 12px; font-size: 0.85rem; }

/* ── Output ── */
.smg-output-panel {
  position: sticky;
  top: 76px;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.smg-out-head {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  padding: 10px 12px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.smg-out-title { font-size: 0.86rem; font-weight: 600; }

.smg-out-actions { display: flex; align-items: center; gap: 8px; }

.smg-wrap-toggle {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 0.82rem;
  color: var(--text-2);
  cursor: pointer;
  white-space: nowrap;
}

.smg-output {
  margin: 0;
  padding: 13px;
  max-height: 460px;
  overflow: auto;
  font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
  font-size: 0.82rem;
  line-height: 1.6;
  white-space: pre;
  tab-size: 2;
}

.smg-output:focus-visible { outline: 2px solid var(--accent); outline-offset: -2px; }

/* JSON token colours */
.smg-k   { color: #0550ae; }
.smg-s   { color: #0a7d33; }
.smg-num { color: #a4360a; }
.smg-b,
.smg-n   { color: #8250df; }
.smg-p   { color: var(--text-2); }
.smg-tag { color: var(--text-2); font-style: italic; }

[data-theme="dark"] .smg-k   { color: #79c0ff; }
[data-theme="dark"] .smg-s   { color: #7ee787; }
[data-theme="dark"] .smg-num { color: #ffa657; }
[data-theme="dark"] .smg-b,
[data-theme="dark"] .smg-n   { color: #d2a8ff; }

/* ── Validation ── */
.smg-validate { padding: 0 12px; }

.smg-validate:not(:empty) {
  padding: 11px 12px;
  border-top: 1px solid var(--border);
}

.smg-ok,
.smg-warn {
  display: flex;
  gap: 7px;
  font-size: 0.84rem;
  line-height: 1.55;
}

.smg-ok { color: var(--text-2); }
.smg-warn { color: #b0450b; }
[data-theme="dark"] .smg-warn { color: #ffa657; }

.smg-warn-list { margin: 5px 0 0; padding-left: 18px; }
.smg-warn-list li { margin-bottom: 3px; }

.smg-disclaimer {
  margin: 0;
  padding: 11px 12px;
  font-size: 0.79rem;
  line-height: 1.55;
  color: var(--text-2);
  border-top: 1px solid var(--border);
}

/* ── Narrow screens ── */
@media (max-width: 900px) {
  .smg-tool { grid-template-columns: 1fr; }
  .smg-output-panel { position: static; }
  .smg-output { max-height: 340px; }
}
</style>

<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var typeSel  = document.getElementById('smg-type');
  var typeNote = document.getElementById('smg-type-note');
  var fieldsEl = document.getElementById('smg-fields');
  var outEl    = document.getElementById('smg-output');
  var valEl    = document.getElementById('smg-validate');
  var wrapChk  = document.getElementById('smg-wrap');
  var dlBtn    = document.getElementById('smg-download');
  var resetBtn = document.getElementById('smg-reset');

  if (!typeSel || !fieldsEl || !outEl) return;

  /* ── Option lists ─────────────────────────────────────────── */
  var AVAILABILITY = ['InStock', 'OutOfStock', 'PreOrder', 'BackOrder', 'Discontinued'];
  var DAYS = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
  var EMPLOYMENT = ['FULL_TIME', 'PART_TIME', 'CONTRACTOR', 'TEMPORARY', 'INTERN', 'VOLUNTEER', 'PER_DIEM', 'OTHER'];
  var SALARY_UNIT = ['HOUR', 'DAY', 'WEEK', 'MONTH', 'YEAR'];
  var EVENT_STATUS = ['EventScheduled', 'EventRescheduled', 'EventPostponed', 'EventMoved', 'EventCancelled'];
  var EVENT_MODE = ['OfflineEventAttendanceMode', 'OnlineEventAttendanceMode', 'MixedEventAttendanceMode'];
  var BIZ_TYPES = ['LocalBusiness', 'Restaurant', 'Store', 'ProfessionalService', 'MedicalBusiness',
    'HealthAndBeautyBusiness', 'AutomotiveBusiness', 'FinancialService', 'FoodEstablishment',
    'Hotel', 'RealEstateAgent', 'LegalService', 'HomeAndConstructionBusiness', 'EntertainmentBusiness'];

  /* Reusable field groups */
  function addressFields(prefix) {
    return [
      { k: prefix + 'street', l: 'Street address', t: 'text', ph: '12 Example Street' },
      { k: prefix + 'locality', l: 'City / town', t: 'text', ph: 'Manchester' },
      { k: prefix + 'region', l: 'Region / state', t: 'text', ph: 'Greater Manchester' },
      { k: prefix + 'postal', l: 'Postal code', t: 'text', ph: 'M1 2AB' },
      { k: prefix + 'country', l: 'Country code', t: 'text', ph: 'GB', hint: 'Two-letter ISO country code, e.g. GB, US, IN.' }
    ];
  }

  function buildAddress(v, prefix) {
    return clean({
      '@type': 'PostalAddress',
      streetAddress: v[prefix + 'street'],
      addressLocality: v[prefix + 'locality'],
      addressRegion: v[prefix + 'region'],
      postalCode: v[prefix + 'postal'],
      addressCountry: v[prefix + 'country']
    }, 1);
  }

  /* ── Schema type definitions ──────────────────────────────── */
  var TYPES = {
    article: {
      label: 'Article / Blog post',
      note: 'For news stories, blog posts and guides. Still earns headline and image treatments in search results.',
      fields: [
        { k: 'subtype', l: 'Article type', t: 'select', o: ['Article', 'BlogPosting', 'NewsArticle'] },
        { k: 'headline', l: 'Headline', t: 'text', req: true, ph: 'How to write title tags that rank', hint: 'Keep it under about 110 characters.' },
        { k: 'description', l: 'Description', t: 'area', ph: 'A short summary of the article.' },
        { k: 'url', l: 'Article URL', t: 'url', ph: 'https://example.com/blog/title-tags' },
        { k: 'image', l: 'Image URL', t: 'url', ph: 'https://example.com/images/cover.jpg', hint: 'Use a high-resolution image, ideally 1200px wide or more.' },
        { k: 'authorType', l: 'Author is a', t: 'select', o: ['Person', 'Organization'] },
        { k: 'author', l: 'Author name', t: 'text', req: true, ph: 'Jane Smith' },
        { k: 'authorUrl', l: 'Author profile URL', t: 'url', ph: 'https://example.com/about/jane' },
        { k: 'publisher', l: 'Publisher name', t: 'text', ph: 'Example Media' },
        { k: 'publisherLogo', l: 'Publisher logo URL', t: 'url', ph: 'https://example.com/logo.png' },
        { k: 'datePublished', l: 'Date published', t: 'date', req: true },
        { k: 'dateModified', l: 'Date modified', t: 'date' },
        { k: 'keywords', l: 'Keywords', t: 'list', ph: 'title tags' }
      ],
      build: function (v) {
        return clean({
          '@context': 'https://schema.org',
          '@type': v.subtype || 'Article',
          headline: v.headline,
          description: v.description,
          image: v.image,
          mainEntityOfPage: v.url ? { '@type': 'WebPage', '@id': v.url } : '',
          author: v.author ? clean({ '@type': v.authorType || 'Person', name: v.author, url: v.authorUrl }, 1) : '',
          publisher: v.publisher ? clean({
            '@type': 'Organization',
            name: v.publisher,
            logo: v.publisherLogo ? { '@type': 'ImageObject', url: v.publisherLogo } : ''
          }, 1) : '',
          datePublished: v.datePublished,
          dateModified: v.dateModified,
          keywords: v.keywords
        });
      }
    },

    faq: {
      label: 'FAQ page',
      note: 'Valid schema, but since August 2023 Google shows FAQ rich results only for authoritative health and government sites.',
      fields: [
        { k: 'url', l: 'Page URL', t: 'url', ph: 'https://example.com/faq' },
        {
          k: 'qa', l: 'Questions', t: 'group', req: true, addLabel: 'Add question', itemLabel: 'Question',
          f: [
            { k: 'q', l: 'Question', t: 'text', ph: 'Do you ship internationally?' },
            { k: 'a', l: 'Answer', t: 'area', ph: 'Yes — we ship to most countries, and postage is calculated at checkout.' }
          ]
        }
      ],
      build: function (v) {
        var list = (v.qa || []).filter(function (r) { return r.q && r.a; }).map(function (r) {
          return { '@type': 'Question', name: r.q, acceptedAnswer: { '@type': 'Answer', text: r.a } };
        });
        return clean({
          '@context': 'https://schema.org',
          '@type': 'FAQPage',
          '@id': v.url,
          mainEntity: list
        });
      }
    },

    howto: {
      label: 'HowTo (step-by-step)',
      note: 'Google retired HowTo rich results in 2023. The markup is still valid and still describes page structure to machines.',
      fields: [
        { k: 'name', l: 'Title', t: 'text', req: true, ph: 'How to change a bike tyre' },
        { k: 'description', l: 'Description', t: 'area', ph: 'A short summary of the task.' },
        { k: 'image', l: 'Image URL', t: 'url', ph: 'https://example.com/images/howto.jpg' },
        { k: 'totalTime', l: 'Total time', t: 'dur' },
        { k: 'supply', l: 'Supplies', t: 'list', ph: 'Replacement inner tube' },
        { k: 'tool', l: 'Tools', t: 'list', ph: 'Tyre levers' },
        {
          k: 'steps', l: 'Steps', t: 'group', req: true, addLabel: 'Add step', itemLabel: 'Step',
          f: [
            { k: 'name', l: 'Step name', t: 'text', ph: 'Remove the wheel' },
            { k: 'text', l: 'Instructions', t: 'area', ph: 'Open the quick release lever and lift the wheel clear of the forks.' },
            { k: 'image', l: 'Step image URL', t: 'url', ph: 'https://example.com/images/step-1.jpg' }
          ]
        }
      ],
      build: function (v) {
        var steps = (v.steps || []).filter(function (s) { return s.text || s.name; }).map(function (s, i) {
          return clean({ '@type': 'HowToStep', position: i + 1, name: s.name, text: s.text, image: s.image }, 1);
        });
        return clean({
          '@context': 'https://schema.org',
          '@type': 'HowTo',
          name: v.name,
          description: v.description,
          image: v.image,
          totalTime: v.totalTime,
          supply: (v.supply || []).map(function (s) { return { '@type': 'HowToSupply', name: s }; }),
          tool: (v.tool || []).map(function (s) { return { '@type': 'HowToTool', name: s }; }),
          step: steps
        });
      }
    },

    product: {
      label: 'Product',
      note: 'Price, availability and ratings can all appear in search results. Only fill in the rating if real reviews are visible on the page.',
      fields: [
        { k: 'name', l: 'Product name', t: 'text', req: true, ph: 'Acme Trail Backpack 30L' },
        { k: 'description', l: 'Description', t: 'area', ph: 'A lightweight 30-litre pack for day hikes.' },
        { k: 'image', l: 'Image URL', t: 'url', ph: 'https://example.com/images/backpack.jpg' },
        { k: 'brand', l: 'Brand', t: 'text', ph: 'Acme' },
        { k: 'sku', l: 'SKU', t: 'text', ph: 'ACM-BP-30' },
        { k: 'gtin', l: 'GTIN / barcode', t: 'text', ph: '01234567890128' },
        { k: 'price', l: 'Price', t: 'number', req: true, ph: '89.99', step: 'any' },
        { k: 'currency', l: 'Currency', t: 'text', req: true, ph: 'GBP', hint: 'Three-letter ISO currency code, e.g. GBP, USD, EUR.' },
        { k: 'availability', l: 'Availability', t: 'select', o: AVAILABILITY },
        { k: 'offerUrl', l: 'Product page URL', t: 'url', ph: 'https://example.com/shop/backpack' },
        { k: 'priceValidUntil', l: 'Price valid until', t: 'date' },
        {
          k: 'rating', l: 'Aggregate rating', t: 'sub', subTitle: 'Only if real reviews appear on the page',
          f: [
            { k: 'ratingValue', l: 'Average rating', t: 'number', ph: '4.6', step: 'any' },
            { k: 'reviewCount', l: 'Number of reviews', t: 'number', ph: '128' }
          ]
        }
      ],
      build: function (v) {
        var r = v.rating || {};
        return clean({
          '@context': 'https://schema.org',
          '@type': 'Product',
          name: v.name,
          description: v.description,
          image: v.image,
          brand: v.brand ? { '@type': 'Brand', name: v.brand } : '',
          sku: v.sku,
          gtin: v.gtin,
          offers: clean({
            '@type': 'Offer',
            price: num(v.price),
            priceCurrency: upper(v.currency),
            availability: v.availability ? 'https://schema.org/' + v.availability : '',
            url: v.offerUrl,
            priceValidUntil: v.priceValidUntil
          }, 1),
          aggregateRating: (r.ratingValue && r.reviewCount) ? {
            '@type': 'AggregateRating',
            ratingValue: num(r.ratingValue),
            reviewCount: num(r.reviewCount)
          } : ''
        });
      }
    },

    localbusiness: {
      label: 'Local business',
      note: 'For premises customers can visit. Opening hours, address and phone can all surface in search and Maps.',
      fields: [
        { k: 'subtype', l: 'Business type', t: 'select', o: BIZ_TYPES },
        { k: 'name', l: 'Business name', t: 'text', req: true, ph: 'Northern Roast Coffee' },
        { k: 'description', l: 'Description', t: 'area', ph: 'Independent coffee roaster and espresso bar.' },
        { k: 'url', l: 'Website URL', t: 'url', req: true, ph: 'https://example.com' },
        { k: 'image', l: 'Image URL', t: 'url', ph: 'https://example.com/images/shopfront.jpg' },
        { k: 'telephone', l: 'Telephone', t: 'text', ph: '+44 161 496 0000', hint: 'Include the country code.' },
        { k: 'priceRange', l: 'Price range', t: 'text', ph: '££' },
        { k: 'addr', l: 'Address', t: 'sub', subTitle: 'Postal address', req: true, f: addressFields('') },
        {
          k: 'geo', l: 'Coordinates', t: 'sub', subTitle: 'Geo coordinates (optional)',
          f: [
            { k: 'lat', l: 'Latitude', t: 'number', ph: '53.4808', step: 'any' },
            { k: 'lng', l: 'Longitude', t: 'number', ph: '-2.2426', step: 'any' }
          ]
        },
        {
          k: 'hours', l: 'Opening hours', t: 'group', addLabel: 'Add opening hours', itemLabel: 'Hours',
          f: [
            { k: 'day', l: 'Day', t: 'select', o: DAYS },
            { k: 'opens', l: 'Opens', t: 'time' },
            { k: 'closes', l: 'Closes', t: 'time' }
          ]
        },
        { k: 'sameAs', l: 'Social profiles', t: 'list', ph: 'https://facebook.com/example' }
      ],
      build: function (v) {
        var g = v.geo || {};
        var hours = (v.hours || []).filter(function (h) { return h.day && h.opens && h.closes; }).map(function (h) {
          return { '@type': 'OpeningHoursSpecification', dayOfWeek: 'https://schema.org/' + h.day, opens: h.opens, closes: h.closes };
        });
        return clean({
          '@context': 'https://schema.org',
          '@type': v.subtype || 'LocalBusiness',
          name: v.name,
          description: v.description,
          url: v.url,
          image: v.image,
          telephone: v.telephone,
          priceRange: v.priceRange,
          address: buildAddress(v.addr || {}, ''),
          geo: (g.lat && g.lng) ? { '@type': 'GeoCoordinates', latitude: num(g.lat), longitude: num(g.lng) } : '',
          openingHoursSpecification: hours,
          sameAs: v.sameAs
        });
      }
    },

    organization: {
      label: 'Organization',
      note: 'Put this on your homepage. It feeds knowledge panels and tells search engines which social profiles are yours.',
      fields: [
        { k: 'name', l: 'Organization name', t: 'text', req: true, ph: 'Example Ltd' },
        { k: 'url', l: 'Website URL', t: 'url', req: true, ph: 'https://example.com' },
        { k: 'logo', l: 'Logo URL', t: 'url', ph: 'https://example.com/logo.png' },
        { k: 'description', l: 'Description', t: 'area', ph: 'What the organization does.' },
        { k: 'email', l: 'Contact email', t: 'text', ph: 'hello@example.com' },
        { k: 'telephone', l: 'Contact telephone', t: 'text', ph: '+44 20 7000 0000' },
        { k: 'founded', l: 'Founding date', t: 'date' },
        { k: 'addr', l: 'Address', t: 'sub', subTitle: 'Postal address (optional)', f: addressFields('') },
        { k: 'sameAs', l: 'Social profiles', t: 'list', ph: 'https://linkedin.com/company/example', hint: 'One URL per row — LinkedIn, X, Facebook, Wikipedia and so on.' }
      ],
      build: function (v) {
        return clean({
          '@context': 'https://schema.org',
          '@type': 'Organization',
          name: v.name,
          url: v.url,
          logo: v.logo,
          description: v.description,
          foundingDate: v.founded,
          contactPoint: (v.email || v.telephone) ? clean({
            '@type': 'ContactPoint',
            contactType: 'customer support',
            email: v.email,
            telephone: v.telephone
          }, 1) : '',
          address: buildAddress(v.addr || {}, ''),
          sameAs: v.sameAs
        });
      }
    },

    person: {
      label: 'Person',
      note: 'For author bios and profile pages. Helps search engines tie a name to the right individual.',
      fields: [
        { k: 'name', l: 'Full name', t: 'text', req: true, ph: 'Jane Smith' },
        { k: 'url', l: 'Profile URL', t: 'url', ph: 'https://example.com/about/jane' },
        { k: 'image', l: 'Photo URL', t: 'url', ph: 'https://example.com/images/jane.jpg' },
        { k: 'jobTitle', l: 'Job title', t: 'text', ph: 'Head of Content' },
        { k: 'worksFor', l: 'Works for', t: 'text', ph: 'Example Ltd' },
        { k: 'description', l: 'Bio', t: 'area', ph: 'A short biography.' },
        { k: 'email', l: 'Email', t: 'text', ph: 'jane@example.com' },
        { k: 'sameAs', l: 'Profiles', t: 'list', ph: 'https://linkedin.com/in/janesmith' }
      ],
      build: function (v) {
        return clean({
          '@context': 'https://schema.org',
          '@type': 'Person',
          name: v.name,
          url: v.url,
          image: v.image,
          jobTitle: v.jobTitle,
          worksFor: v.worksFor ? { '@type': 'Organization', name: v.worksFor } : '',
          description: v.description,
          email: v.email,
          sameAs: v.sameAs
        });
      }
    },

    event: {
      label: 'Event',
      note: 'For gigs, classes and conferences. Dates and venue can appear directly in search results.',
      fields: [
        { k: 'name', l: 'Event name', t: 'text', req: true, ph: 'Autumn Coffee Tasting' },
        { k: 'description', l: 'Description', t: 'area', ph: 'What happens at the event.' },
        { k: 'image', l: 'Image URL', t: 'url', ph: 'https://example.com/images/event.jpg' },
        { k: 'url', l: 'Event page URL', t: 'url', ph: 'https://example.com/events/tasting' },
        { k: 'startDate', l: 'Start date and time', t: 'datetime', req: true },
        { k: 'endDate', l: 'End date and time', t: 'datetime' },
        { k: 'status', l: 'Event status', t: 'select', o: EVENT_STATUS },
        { k: 'mode', l: 'Attendance mode', t: 'select', o: EVENT_MODE },
        { k: 'venue', l: 'Venue name', t: 'text', req: true, ph: 'Northern Roast Coffee' },
        { k: 'venueUrl', l: 'Online event URL', t: 'url', ph: 'https://example.com/live', hint: 'For online or hybrid events only.' },
        { k: 'addr', l: 'Venue address', t: 'sub', subTitle: 'Venue address', f: addressFields('') },
        { k: 'performer', l: 'Performer / host', t: 'text', ph: 'Jane Smith' },
        { k: 'organizer', l: 'Organizer', t: 'text', ph: 'Example Ltd' },
        {
          k: 'offer', l: 'Tickets', t: 'sub', subTitle: 'Ticket offer (optional)',
          f: [
            { k: 'price', l: 'Price', t: 'number', ph: '15.00', step: 'any' },
            { k: 'currency', l: 'Currency', t: 'text', ph: 'GBP' },
            { k: 'url', l: 'Ticket URL', t: 'url', ph: 'https://example.com/tickets' },
            { k: 'availability', l: 'Availability', t: 'select', o: AVAILABILITY }
          ]
        }
      ],
      build: function (v) {
        var o = v.offer || {};
        var online = v.mode === 'OnlineEventAttendanceMode';
        return clean({
          '@context': 'https://schema.org',
          '@type': 'Event',
          name: v.name,
          description: v.description,
          image: v.image,
          url: v.url,
          startDate: v.startDate,
          endDate: v.endDate,
          eventStatus: v.status ? 'https://schema.org/' + v.status : '',
          eventAttendanceMode: v.mode ? 'https://schema.org/' + v.mode : '',
          location: online
            ? clean({ '@type': 'VirtualLocation', url: v.venueUrl || v.url }, 1)
            : clean({ '@type': 'Place', name: v.venue, address: buildAddress(v.addr || {}, '') }, 1),
          performer: v.performer ? { '@type': 'Person', name: v.performer } : '',
          organizer: v.organizer ? { '@type': 'Organization', name: v.organizer } : '',
          offers: (o.price || o.url) ? clean({
            '@type': 'Offer',
            price: num(o.price),
            priceCurrency: upper(o.currency),
            url: o.url,
            availability: o.availability ? 'https://schema.org/' + o.availability : ''
          }, 1) : ''
        });
      }
    },

    recipe: {
      label: 'Recipe',
      note: 'One of the richest result types — cards, cooking times and ratings all come from this markup.',
      fields: [
        { k: 'name', l: 'Recipe name', t: 'text', req: true, ph: 'Slow-roast tomato soup' },
        { k: 'description', l: 'Description', t: 'area', ph: 'A short introduction to the recipe.' },
        { k: 'image', l: 'Image URL', t: 'url', req: true, ph: 'https://example.com/images/soup.jpg' },
        { k: 'author', l: 'Author', t: 'text', ph: 'Jane Smith' },
        { k: 'datePublished', l: 'Date published', t: 'date' },
        { k: 'prepTime', l: 'Prep time', t: 'dur' },
        { k: 'cookTime', l: 'Cook time', t: 'dur' },
        { k: 'yield', l: 'Servings', t: 'text', ph: '4 servings' },
        { k: 'category', l: 'Category', t: 'text', ph: 'Soup' },
        { k: 'cuisine', l: 'Cuisine', t: 'text', ph: 'British' },
        { k: 'calories', l: 'Calories per serving', t: 'number', ph: '220' },
        { k: 'ingredients', l: 'Ingredients', t: 'list', req: true, ph: '1kg ripe tomatoes', addLabel: 'Add ingredient' },
        { k: 'instructions', l: 'Instructions', t: 'list', req: true, ph: 'Heat the oven to 160C.', addLabel: 'Add step' }
      ],
      build: function (v) {
        return clean({
          '@context': 'https://schema.org',
          '@type': 'Recipe',
          name: v.name,
          description: v.description,
          image: v.image,
          author: v.author ? { '@type': 'Person', name: v.author } : '',
          datePublished: v.datePublished,
          prepTime: v.prepTime,
          cookTime: v.cookTime,
          totalTime: addDur(v.prepTime, v.cookTime),
          recipeYield: v.yield,
          recipeCategory: v.category,
          recipeCuisine: v.cuisine,
          nutrition: v.calories ? { '@type': 'NutritionInformation', calories: v.calories + ' calories' } : '',
          recipeIngredient: v.ingredients,
          recipeInstructions: (v.instructions || []).map(function (s) { return { '@type': 'HowToStep', text: s }; })
        });
      }
    },

    breadcrumb: {
      label: 'Breadcrumb list',
      note: 'Replaces the plain URL in search results with a readable trail. Worth adding to any page inside a hierarchy.',
      fields: [
        {
          k: 'items', l: 'Breadcrumb trail', t: 'group', req: true, addLabel: 'Add level', itemLabel: 'Level',
          f: [
            { k: 'name', l: 'Name', t: 'text', ph: 'Home' },
            { k: 'url', l: 'URL', t: 'url', ph: 'https://example.com' }
          ]
        }
      ],
      build: function (v) {
        var list = (v.items || []).filter(function (r) { return r.name; }).map(function (r, i) {
          return clean({ '@type': 'ListItem', position: i + 1, name: r.name, item: r.url }, 1);
        });
        return clean({
          '@context': 'https://schema.org',
          '@type': 'BreadcrumbList',
          itemListElement: list
        });
      }
    },

    video: {
      label: 'Video',
      note: 'For pages that host a video. Enables video thumbnails in search and in the Video tab.',
      fields: [
        { k: 'name', l: 'Video title', t: 'text', req: true, ph: 'How to pour latte art' },
        { k: 'description', l: 'Description', t: 'area', req: true, ph: 'A short description of the video.' },
        { k: 'thumbnailUrl', l: 'Thumbnail URL', t: 'url', req: true, ph: 'https://example.com/images/thumb.jpg' },
        { k: 'uploadDate', l: 'Upload date', t: 'date', req: true },
        { k: 'duration', l: 'Duration', t: 'dur' },
        { k: 'contentUrl', l: 'Video file URL', t: 'url', ph: 'https://example.com/video/latte.mp4' },
        { k: 'embedUrl', l: 'Embed URL', t: 'url', ph: 'https://www.youtube.com/embed/xxxxxxxxxxx' }
      ],
      build: function (v) {
        return clean({
          '@context': 'https://schema.org',
          '@type': 'VideoObject',
          name: v.name,
          description: v.description,
          thumbnailUrl: v.thumbnailUrl,
          uploadDate: v.uploadDate,
          duration: v.duration,
          contentUrl: v.contentUrl,
          embedUrl: v.embedUrl
        });
      }
    },

    jobposting: {
      label: 'Job posting',
      note: 'Required for a vacancy to be eligible for Google Jobs. Remove the markup once the role closes.',
      fields: [
        { k: 'title', l: 'Job title', t: 'text', req: true, ph: 'Senior Content Editor' },
        { k: 'description', l: 'Job description', t: 'area', req: true, ph: 'Full HTML description of the role, responsibilities and requirements.' },
        { k: 'datePosted', l: 'Date posted', t: 'date', req: true },
        { k: 'validThrough', l: 'Closing date', t: 'date' },
        { k: 'org', l: 'Hiring organization', t: 'text', req: true, ph: 'Example Ltd' },
        { k: 'orgUrl', l: 'Organization URL', t: 'url', ph: 'https://example.com' },
        { k: 'employmentType', l: 'Employment type', t: 'select', o: EMPLOYMENT },
        { k: 'remote', l: 'Fully remote', t: 'check', hint: 'Adds TELECOMMUTE as the job location type.' },
        { k: 'addr', l: 'Job location', t: 'sub', subTitle: 'Job location', f: addressFields('') },
        {
          k: 'salary', l: 'Salary', t: 'sub', subTitle: 'Base salary (optional)',
          f: [
            { k: 'min', l: 'Minimum', t: 'number', ph: '38000', step: 'any' },
            { k: 'max', l: 'Maximum', t: 'number', ph: '46000', step: 'any' },
            { k: 'currency', l: 'Currency', t: 'text', ph: 'GBP' },
            { k: 'unit', l: 'Per', t: 'select', o: SALARY_UNIT }
          ]
        }
      ],
      build: function (v) {
        var s = v.salary || {};
        var value = clean({
          '@type': 'QuantitativeValue',
          minValue: num(s.min),
          maxValue: num(s.max),
          unitText: s.unit
        }, 1);
        return clean({
          '@context': 'https://schema.org',
          '@type': 'JobPosting',
          title: v.title,
          description: v.description,
          datePosted: v.datePosted,
          validThrough: v.validThrough,
          employmentType: v.employmentType,
          hiringOrganization: v.org ? clean({ '@type': 'Organization', name: v.org, sameAs: v.orgUrl }, 1) : '',
          jobLocationType: v.remote ? 'TELECOMMUTE' : '',
          jobLocation: clean({ '@type': 'Place', address: buildAddress(v.addr || {}, '') }, 1),
          baseSalary: (s.min || s.max) ? clean({
            '@type': 'MonetaryAmount',
            currency: upper(s.currency),
            value: value
          }, 1) : ''
        });
      }
    },

    website: {
      label: 'Website (with search box)',
      note: 'Homepage only. The search action makes a site eligible for the sitelinks search box.',
      fields: [
        { k: 'name', l: 'Site name', t: 'text', req: true, ph: 'Example' },
        { k: 'url', l: 'Homepage URL', t: 'url', req: true, ph: 'https://example.com' },
        { k: 'description', l: 'Description', t: 'area', ph: 'What the site offers.' },
        { k: 'searchUrl', l: 'Search URL pattern', t: 'text', ph: 'https://example.com/?s=', hint: 'The URL your site search uses, up to and including the = sign. Leave empty to omit the search action.' }
      ],
      build: function (v) {
        return clean({
          '@context': 'https://schema.org',
          '@type': 'WebSite',
          name: v.name,
          url: v.url,
          description: v.description,
          potentialAction: v.searchUrl ? {
            '@type': 'SearchAction',
            target: { '@type': 'EntryPoint', urlTemplate: v.searchUrl + '{search_term_string}' },
            'query-input': 'required name=search_term_string'
          } : ''
        });
      }
    },

    software: {
      label: 'Software / app',
      note: 'For apps and web tools. Only include a rating if real reviews are shown on the page.',
      fields: [
        { k: 'name', l: 'App name', t: 'text', req: true, ph: 'Example Notes' },
        { k: 'description', l: 'Description', t: 'area', ph: 'What the app does.' },
        { k: 'url', l: 'App URL', t: 'url', ph: 'https://example.com/app' },
        { k: 'category', l: 'Application category', t: 'select', o: ['WebApplication', 'BusinessApplication', 'DeveloperApplication', 'UtilitiesApplication', 'EducationalApplication', 'GameApplication', 'HealthApplication', 'FinanceApplication', 'DesignApplication'] },
        { k: 'os', l: 'Operating system', t: 'text', ph: 'Any' },
        { k: 'price', l: 'Price', t: 'number', ph: '0', step: 'any', hint: 'Use 0 for a free app.' },
        { k: 'currency', l: 'Currency', t: 'text', ph: 'USD' }
      ],
      build: function (v) {
        return clean({
          '@context': 'https://schema.org',
          '@type': 'SoftwareApplication',
          name: v.name,
          description: v.description,
          url: v.url,
          applicationCategory: v.category,
          operatingSystem: v.os,
          offers: (v.price !== '' && v.price != null) ? {
            '@type': 'Offer',
            price: num(v.price),
            priceCurrency: upper(v.currency) || 'USD'
          } : ''
        });
      }
    }
  };

  var ORDER = ['article', 'faq', 'howto', 'product', 'localbusiness', 'organization',
    'person', 'event', 'recipe', 'breadcrumb', 'video', 'jobposting', 'website', 'software'];

  /* ── Helpers ──────────────────────────────────────────────── */
  function isEmpty(x) {
    if (x === null || x === undefined || x === '') return true;
    if (Array.isArray(x)) return x.length === 0;
    if (typeof x === 'object') return Object.keys(x).length === 0;
    return false;
  }

  /* Drop empty properties. keep=1 means "an object of only @type is still empty". */
  function clean(obj, typeOnlyIsEmpty) {
    var out = {};
    Object.keys(obj).forEach(function (k) {
      var v = obj[k];
      if (Array.isArray(v)) v = v.filter(function (x) { return !isEmpty(x); });
      if (!isEmpty(v)) out[k] = v;
    });
    if (typeOnlyIsEmpty) {
      var keys = Object.keys(out).filter(function (k) { return k !== '@type'; });
      if (!keys.length) return '';
    }
    return out;
  }

  function num(x) {
    if (x === '' || x === null || x === undefined) return '';
    var n = Number(x);
    return isFinite(n) ? n : String(x);
  }

  function upper(x) { return x ? String(x).trim().toUpperCase() : ''; }

  /* ISO 8601 duration from hours + minutes */
  function toDur(h, m) {
    h = parseInt(h, 10) || 0;
    m = parseInt(m, 10) || 0;
    if (!h && !m) return '';
    return 'PT' + (h ? h + 'H' : '') + (m ? m + 'M' : '');
  }

  function parseDur(s) {
    var m = /^PT(?:(\d+)H)?(?:(\d+)M)?$/.exec(s || '');
    return m ? { h: m[1] || '', m: m[2] || '' } : { h: '', m: '' };
  }

  function addDur(a, b) {
    var x = parseDur(a), y = parseDur(b);
    var mins = (parseInt(x.h, 10) || 0) * 60 + (parseInt(x.m, 10) || 0)
             + (parseInt(y.h, 10) || 0) * 60 + (parseInt(y.m, 10) || 0);
    if (!mins) return '';
    return toDur(Math.floor(mins / 60), mins % 60);
  }

  function el(tag, cls, text) {
    var n = document.createElement(tag);
    if (cls) n.className = cls;
    if (text != null) n.textContent = text;
    return n;
  }

  /* ── Field rendering ──────────────────────────────────────── */
  var state = {};   // slot refs for the current type

  function inputFor(f) {
    var node;
    if (f.t === 'area') {
      node = el('textarea', 'smg-input smg-area');
      node.rows = 3;
    } else if (f.t === 'select') {
      node = el('select', 'smg-input');
      (f.o || []).forEach(function (o) {
        var opt = el('option', null, o);
        opt.value = o;
        node.appendChild(opt);
      });
    } else if (f.t === 'check') {
      node = el('input');
      node.type = 'checkbox';
    } else {
      node = el('input', 'smg-input');
      node.type = f.t === 'url' ? 'url'
        : f.t === 'date' ? 'date'
        : f.t === 'datetime' ? 'datetime-local'
        : f.t === 'time' ? 'time'
        : f.t === 'number' ? 'number'
        : 'text';
      if (f.t === 'number' && f.step) node.step = f.step;
    }
    if (f.ph && f.t !== 'select' && f.t !== 'check') node.placeholder = f.ph;
    if (f.t === 'url' || f.t === 'text') node.autocomplete = 'off';
    node.addEventListener('input', render);
    node.addEventListener('change', render);
    return node;
  }

  function labelRow(f) {
    var row = el('div', 'smg-field-label');
    row.appendChild(el('span', null, f.l));
    if (f.req) row.appendChild(el('span', 'smg-req', 'required'));
    return row;
  }

  /* A single scalar field */
  function renderScalar(f) {
    var wrap = el('div', 'smg-field');
    var input = inputFor(f);

    if (f.t === 'check') {
      var lab = el('label', 'smg-wrap-toggle');
      lab.appendChild(input);
      lab.appendChild(el('span', null, f.l));
      wrap.appendChild(lab);
    } else {
      wrap.appendChild(labelRow(f));
      wrap.appendChild(input);
    }
    if (f.hint) wrap.appendChild(el('p', 'smg-hint', f.hint));

    return { node: wrap, read: function () { return f.t === 'check' ? input.checked : input.value.trim(); },
             write: function (v) { if (f.t === 'check') input.checked = !!v; else input.value = v == null ? '' : v; } };
  }

  /* Hours + minutes → ISO duration */
  function renderDuration(f) {
    var wrap = el('div', 'smg-field');
    wrap.appendChild(labelRow(f));
    var pair = el('div', 'smg-pair');
    var h = el('input', 'smg-input'); h.type = 'number'; h.min = '0'; h.placeholder = '0';
    var m = el('input', 'smg-input'); m.type = 'number'; m.min = '0'; m.placeholder = '30';
    pair.appendChild(h); pair.appendChild(el('span', 'smg-pair-unit', 'hours'));
    pair.appendChild(m); pair.appendChild(el('span', 'smg-pair-unit', 'min'));
    [h, m].forEach(function (i) { i.addEventListener('input', render); });
    wrap.appendChild(pair);
    if (f.hint) wrap.appendChild(el('p', 'smg-hint', f.hint));
    return { node: wrap, read: function () { return toDur(h.value, m.value); },
             write: function (v) { var d = parseDur(v); h.value = d.h; m.value = d.m; } };
  }

  /* Repeating list of plain strings */
  function renderList(f) {
    var wrap = el('div', 'smg-field');
    wrap.appendChild(labelRow(f));
    var box = el('div', 'smg-list');
    var rows = [];

    function addRow(value) {
      var row = el('div', 'smg-list-row');
      var input = el('input', 'smg-input');
      input.type = 'text';
      input.autocomplete = 'off';
      if (f.ph) input.placeholder = f.ph;
      if (value) input.value = value;
      input.addEventListener('input', render);

      var del = el('button', 'smg-icon-btn', '×');
      del.type = 'button';
      del.setAttribute('aria-label', 'Remove ' + f.l);
      del.addEventListener('click', function () {
        var i = rows.indexOf(entry);
        if (i > -1) rows.splice(i, 1);
        box.removeChild(row);
        if (!rows.length) addRow('');
        render();
      });

      row.appendChild(input);
      row.appendChild(del);
      var entry = { row: row, input: input };
      rows.push(entry);
      box.insertBefore(row, addBtn);
    }

    var addBtn = el('button', 'smg-add', f.addLabel || ('Add ' + f.l.toLowerCase()));
    addBtn.type = 'button';
    addBtn.addEventListener('click', function () { addRow(''); render(); });
    box.appendChild(addBtn);

    wrap.appendChild(box);
    if (f.hint) wrap.appendChild(el('p', 'smg-hint', f.hint));

    addRow('');

    return {
      node: wrap,
      read: function () {
        return rows.map(function (r) { return r.input.value.trim(); }).filter(Boolean);
      },
      write: function (vals) {
        rows.slice().forEach(function (r) { box.removeChild(r.row); });
        rows.length = 0;
        (vals && vals.length ? vals : ['']).forEach(addRow);
      }
    };
  }

  /* Repeating group of fields */
  function renderGroup(f) {
    var wrap = el('div', 'smg-field');
    wrap.appendChild(labelRow(f));
    var box = el('div', 'smg-group');
    var cards = [];

    function renumber() {
      cards.forEach(function (c, i) { c.num.textContent = (f.itemLabel || 'Item') + ' ' + (i + 1); });
    }

    function addCard(values) {
      var card = el('div', 'smg-group-card');
      var head = el('div', 'smg-group-head');
      var numEl = el('span', 'smg-group-num', '');
      var del = el('button', 'smg-icon-btn', '×');
      del.type = 'button';
      del.setAttribute('aria-label', 'Remove');
      head.appendChild(numEl);
      head.appendChild(del);
      card.appendChild(head);

      var slots = {};
      f.f.forEach(function (sub) {
        var s = sub.t === 'dur' ? renderDuration(sub) : renderScalar(sub);
        slots[sub.k] = s;
        card.appendChild(s.node);
        if (values && values[sub.k] != null) s.write(values[sub.k]);
      });

      var entry = { card: card, num: numEl, slots: slots };
      del.addEventListener('click', function () {
        var i = cards.indexOf(entry);
        if (i > -1) cards.splice(i, 1);
        box.removeChild(card);
        if (!cards.length) addCard(null);
        renumber();
        render();
      });

      cards.push(entry);
      box.insertBefore(card, addBtn);
      renumber();
    }

    var addBtn = el('button', 'smg-add', f.addLabel || 'Add item');
    addBtn.type = 'button';
    addBtn.addEventListener('click', function () { addCard(null); render(); });
    box.appendChild(addBtn);

    wrap.appendChild(box);
    if (f.hint) wrap.appendChild(el('p', 'smg-hint', f.hint));

    addCard(null);

    return {
      node: wrap,
      read: function () {
        return cards.map(function (c) {
          var o = {};
          Object.keys(c.slots).forEach(function (k) { o[k] = c.slots[k].read(); });
          return o;
        }).filter(function (o) {
          return Object.keys(o).some(function (k) { return !isEmpty(o[k]); });
        });
      },
      write: function (vals) {
        cards.slice().forEach(function (c) { box.removeChild(c.card); });
        cards.length = 0;
        (vals && vals.length ? vals : [null]).forEach(addCard);
      }
    };
  }

  /* Nested fieldset */
  function renderSub(f) {
    var wrap = el('div', 'smg-field');
    var box = el('div', 'smg-sub');
    box.appendChild(el('div', 'smg-sub-title', f.subTitle || f.l));
    var slots = {};
    f.f.forEach(function (sub) {
      var s = sub.t === 'dur' ? renderDuration(sub) : renderScalar(sub);
      slots[sub.k] = s;
      box.appendChild(s.node);
    });
    wrap.appendChild(box);
    return {
      node: wrap,
      read: function () {
        var o = {};
        Object.keys(slots).forEach(function (k) { o[k] = slots[k].read(); });
        return o;
      },
      write: function (v) {
        if (!v) return;
        Object.keys(slots).forEach(function (k) { if (v[k] != null) slots[k].write(v[k]); });
      }
    };
  }

  function buildForm(key) {
    fieldsEl.textContent = '';
    state = {};
    var spec = TYPES[key];
    typeNote.textContent = spec.note || '';

    spec.fields.forEach(function (f) {
      var slot = f.t === 'list'  ? renderList(f)
               : f.t === 'group' ? renderGroup(f)
               : f.t === 'sub'   ? renderSub(f)
               : f.t === 'dur'   ? renderDuration(f)
               : renderScalar(f);
      state[f.k] = slot;
      fieldsEl.appendChild(slot.node);
    });
  }

  function readValues() {
    var v = {};
    Object.keys(state).forEach(function (k) { v[k] = state[k].read(); });
    return v;
  }

  /* ── JSON serialisation with tokens ───────────────────────── */
  function serialize(value) {
    var tokens = [], text = '';

    function push(cls, str) { tokens.push([cls, str]); text += str; }

    function pad(n) { return new Array(n + 1).join('  '); }

    function walk(v, depth) {
      if (v === null) { push('smg-n', 'null'); return; }

      if (Array.isArray(v)) {
        if (!v.length) { push('smg-p', '[]'); return; }
        push('smg-p', '[\n');
        v.forEach(function (item, i) {
          push('smg-p', pad(depth + 1));
          walk(item, depth + 1);
          push('smg-p', i < v.length - 1 ? ',\n' : '\n');
        });
        push('smg-p', pad(depth) + ']');
        return;
      }

      if (typeof v === 'object') {
        var keys = Object.keys(v);
        if (!keys.length) { push('smg-p', '{}'); return; }
        push('smg-p', '{\n');
        keys.forEach(function (k, i) {
          push('smg-p', pad(depth + 1));
          push('smg-k', JSON.stringify(k));
          push('smg-p', ': ');
          walk(v[k], depth + 1);
          push('smg-p', i < keys.length - 1 ? ',\n' : '\n');
        });
        push('smg-p', pad(depth) + '}');
        return;
      }

      if (typeof v === 'number')  { push('smg-num', String(v)); return; }
      if (typeof v === 'boolean') { push('smg-b', String(v)); return; }
      push('smg-s', JSON.stringify(String(v)));
    }

    walk(value, 0);
    return { tokens: tokens, text: text };
  }

  var OPEN_TAG  = '<script type="application/ld+json">\n';
  var CLOSE_TAG = '\n<\/script>';

  function paint(res, wrapped) {
    outEl.textContent = '';
    if (wrapped) outEl.appendChild(el('span', 'smg-tag', OPEN_TAG));
    res.tokens.forEach(function (t) { outEl.appendChild(el('span', t[0], t[1])); });
    if (wrapped) outEl.appendChild(el('span', 'smg-tag', CLOSE_TAG));
  }

  /* ── Validation ───────────────────────────────────────────── */
  function validate(key, v) {
    var missing = [];
    TYPES[key].fields.forEach(function (f) {
      if (!f.req) return;
      var val = v[f.k];
      if (f.t === 'sub') {
        var filled = val && Object.keys(val).some(function (k) { return !isEmpty(val[k]); });
        if (!filled) missing.push(f.l);
      } else if (isEmpty(val)) {
        missing.push(f.l);
      }
    });
    return missing;
  }

  function showValidation(missing) {
    valEl.textContent = '';
    if (!missing.length) {
      var ok = el('div', 'smg-ok');
      ok.appendChild(el('span', null, '✓'));
      ok.appendChild(el('span', null, 'All required properties are present. Confirm with the Rich Results Test before publishing.'));
      valEl.appendChild(ok);
      return;
    }
    var warn = el('div', 'smg-warn');
    var body = el('div');
    body.appendChild(el('strong', null,
      missing.length === 1 ? '1 required property is missing:' : missing.length + ' required properties are missing:'));
    var ul = el('ul', 'smg-warn-list');
    missing.forEach(function (m) { ul.appendChild(el('li', null, m)); });
    body.appendChild(ul);
    warn.appendChild(el('span', null, '⚠'));
    warn.appendChild(body);
    valEl.appendChild(warn);
  }

  /* ── Persistence ──────────────────────────────────────────── */
  var SKEY = 'tp-save-schema-markup';

  function save(key, v) {
    try {
      localStorage.setItem(SKEY, JSON.stringify({ type: key, values: v }));
    } catch (e) { /* private mode or storage disabled — not fatal */ }
  }

  function load() {
    try {
      var raw = localStorage.getItem(SKEY);
      return raw ? JSON.parse(raw) : null;
    } catch (e) { return null; }
  }

  function restore(v) {
    if (!v) return;
    Object.keys(state).forEach(function (k) {
      if (v[k] != null) {
        try { state[k].write(v[k]); } catch (e) { /* spec changed since save */ }
      }
    });
  }

  /* ── Main render ──────────────────────────────────────────── */
  var lastText = '';

  function render() {
    var key = typeSel.value;
    var v = readValues();
    var data = TYPES[key].build(v);
    var res = serialize(data);

    lastText = (wrapChk && wrapChk.checked) ? OPEN_TAG + res.text + CLOSE_TAG : res.text;
    paint(res, wrapChk && wrapChk.checked);
    showValidation(validate(key, v));
    save(key, v);
  }

  /* ── Wire up ──────────────────────────────────────────────── */
  ORDER.forEach(function (k) {
    var opt = el('option', null, TYPES[k].label);
    opt.value = k;
    typeSel.appendChild(opt);
  });

  typeSel.addEventListener('change', function () {
    buildForm(typeSel.value);
    render();
  });

  if (wrapChk) wrapChk.addEventListener('change', render);

  if (resetBtn) {
    resetBtn.addEventListener('click', function () {
      buildForm(typeSel.value);
      render();
    });
  }

  if (dlBtn) {
    dlBtn.addEventListener('click', function () {
      var blob = new Blob([lastText], { type: 'application/ld+json' });
      var url = URL.createObjectURL(blob);
      var a = el('a');
      a.href = url;
      a.download = typeSel.value + '-schema.jsonld';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      setTimeout(function () { URL.revokeObjectURL(url); }, 1000);
    });
  }

  var saved = load();
  typeSel.value = (saved && TYPES[saved.type]) ? saved.type : 'article';
  buildForm(typeSel.value);
  if (saved && saved.values) restore(saved.values);
  render();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
