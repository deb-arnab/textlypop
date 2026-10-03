<?php
$tool_slug   = 'lorem-ipsum-generator';
$tool_name   = 'Lorem Ipsum Generator';

$page_title  = 'Lorem Ipsum Generator — Placeholder Text | TextlyPop';
$meta_desc   = 'Generate lorem ipsum placeholder text instantly. Choose paragraphs, sentences or words. Classic lorem ipsum or random Latin. Free online generator, no signup.';
$canonical_url = 'https://textlypop.com/tools/lorem-ipsum-generator';
$og_title    = 'Free Lorem Ipsum Generator — TextlyPop';
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
  "name": "Lorem Ipsum Generator",
  "url": "https://textlypop.com/tools/lorem-ipsum-generator",
  "description": "Generate lorem ipsum placeholder text instantly by paragraphs, sentences or words.",
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
      "name": "What does lorem ipsum actually mean?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Nothing coherent — and that is the point. The words are a scrambled fragment of Cicero's sentence 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet…', roughly 'Nor is there anyone who loves pain itself because it is pain'. The placeholder version chops words in half and reorders them, so it reads like Latin without being translatable."
      }
    },
    {
      "@type": "Question",
      "name": "Is lorem ipsum real Latin?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It is corrupted Latin. The vocabulary is genuine — scholar Richard McClintock proved it derives from Cicero's De Finibus — but the standard passage breaks words apart ('lorem' is the tail end of 'dolorem') and shuffles the grammar, so a Latin reader cannot make sense of it."
      }
    },
    {
      "@type": "Question",
      "name": "Can I generate lorem ipsum by word count?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Select Words as the unit, enter the exact number you need and click Generate — useful when a design spec calls for a specific amount of text. Sentences and Paragraphs modes work the same way for those units, and Regenerate produces a fresh variation without changing your settings."
      }
    },
    {
      "@type": "Question",
      "name": "Does the generated text always start with Lorem ipsum dolor sit amet?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "By default, yes — the recognisable opening instantly signals placeholder text. Disable the Start with Lorem ipsum option to get fully random Latin from the first word, for example when generating several distinct blocks that should not all begin identically."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use lorem ipsum text in commercial projects?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, without restriction. The underlying text is a 2,000-year-old work long in the public domain, with no license, attribution requirement or trademark. Just remember to replace it before launch — shipping lorem ipsum to production is one of the most common publishing mistakes on the web."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Generate Lorem Ipsum Placeholder Text',
  'description' => 'Generate lorem ipsum placeholder text by paragraphs, sentences or words using TextlyPop.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Choose your unit','text'=>'Select whether you want to generate Paragraphs, Sentences, or Words using the unit buttons at the top.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Set the amount','text'=>'Enter the number of paragraphs, sentences or words you need in the quantity field.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Click Generate','text'=>'Click the Generate button. Your lorem ipsum placeholder text appears instantly in the output box.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy the text','text'=>'Click Copy to copy all generated text to your clipboard, ready to paste into your design or document.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Lorem Ipsum Generator','item'=>'https://textlypop.com/tools/lorem-ipsum-generator'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Lorem ipsum generator</h1>
    <p>Generate placeholder text instantly by paragraphs, sentences or words. Classic or randomized.</p>
  </div>

  <div class="li-tool" id="li-tool">

    <!-- Controls -->
    <div class="li-controls">

      <div class="li-control-row">

        <!-- Unit selector -->
        <div class="li-unit-group">
          <span class="li-control-label">Generate</span>
          <div class="li-unit-btns" role="group" aria-label="Generation unit">
            <button class="li-unit-btn active" data-unit="paragraphs" aria-pressed="true">Paragraphs</button>
            <button class="li-unit-btn" data-unit="sentences" aria-pressed="false">Sentences</button>
            <button class="li-unit-btn" data-unit="words" aria-pressed="false">Words</button>
          </div>
        </div>

        <!-- Quantity -->
        <div class="li-qty-group">
          <label class="li-control-label" for="li-qty">Amount</label>
          <input type="number" id="li-qty" class="li-qty-input" value="3" min="1" max="100" aria-label="Amount to generate">
        </div>

        <!-- Generate button -->
        <button class="btn btn-primary li-generate-btn" id="li-generate">Generate</button>

      </div>

      <!-- Options -->
      <div class="li-options" role="group" aria-label="Lorem ipsum options">
        <label class="li-option">
          <input type="checkbox" id="li-classic" checked>
          <span class="li-option-text">
            <strong>Start with "Lorem ipsum"</strong>
            <em>Begin with the classic opening</em>
          </span>
        </label>
        <label class="li-option">
          <input type="checkbox" id="li-html">
          <span class="li-option-text">
            <strong>Wrap in &lt;p&gt; tags</strong>
            <em>Output HTML paragraph elements</em>
          </span>
        </label>
        <label class="li-option">
          <input type="checkbox" id="li-allcaps">
          <span class="li-option-text">
            <strong>ALL CAPS</strong>
            <em>Uppercase all generated text</em>
          </span>
        </label>
      </div>

    </div>

    <!-- Output -->
    <div class="li-output-wrap">
      <div class="li-output-header">
        <span class="li-output-stats" id="li-output-stats">Ready to generate</span>
        <div class="li-output-actions">
          <button class="btn btn-ghost" id="li-regenerate" title="Generate new random text">Regenerate</button>
          <button class="btn btn-copy" id="li-copy-btn">Copy</button>
        </div>
      </div>
      <textarea
        id="li-output"
        class="li-output-textarea"
        readonly
        placeholder="Click Generate to create placeholder text…"
        aria-label="Generated lorem ipsum text"
        aria-live="polite"></textarea>
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

    <h2>About lorem ipsum placeholder text</h2>
    <p>Lorem ipsum is the standard placeholder text of the design, publishing and web development industries. Designers drop it into mockups to fill space before real content is ready, because its distribution of letters and word lengths closely mimics natural English — so layouts, typography and spacing can be judged realistically. Crucially, it is meaningless to readers: real placeholder sentences pull a reviewer's attention to the words, while neutral Latin keeps the focus on the design itself.</p>

    <h2>The history of lorem ipsum</h2>
    <p>The passage comes from <em>De Finibus Bonorum et Malorum</em> ("On the Ends of Good and Evil"), a treatise on ethics written by the Roman statesman Cicero in 45 BC — the source was identified in the 1980s by Latin scholar Richard McClintock, who traced the unusual word "consectetur" back to the original. An unknown printer scrambled the passage into specimen text in the 1500s, and it survived five centuries of typesetting to go mainstream twice more: on Letraset dry-transfer sheets in the 1960s, and in Aldus PageMaker, the desktop publishing software that shipped it as default dummy text in the 1980s.</p>

    <h2>Paragraph vs sentence vs word generation</h2>
    <p>Paragraphs are best for testing multi-paragraph layouts, blog post templates, and article designs. Each generated paragraph contains four to six sentences of varied length, giving a realistic text block. Sentences are best when you need a specific amount of text for a single content area like a card description or button label. Words give you precise control over the total word count — useful when a designer specifies "this area needs 50 words of placeholder text."</p>

    <h2>Using lorem ipsum in web development</h2>
    <p>Enable the Wrap in p tags option to get output wrapped in HTML paragraph elements, ready to paste directly into your HTML file or template. This saves the extra step of adding paragraph tags manually. For React or other component frameworks you may need to convert the p tags to JSX format, but the text content itself copies cleanly.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What does lorem ipsum actually mean?</p>
      <p class="faq-a">Nothing coherent — and that is the point. The words are a scrambled fragment of Cicero's original sentence "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet…", which translates roughly as "Nor is there anyone who loves pain itself because it is pain". The placeholder version chops words in half and reorders them, so it reads like Latin without actually being translatable, keeping readers from being distracted by meaning.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is lorem ipsum real Latin?</p>
      <p class="faq-a">It is corrupted Latin. The vocabulary is genuine — scholar Richard McClintock proved it derives from Cicero's <em>De Finibus</em> — but the standard passage breaks words apart ("lorem" is the tail end of "dolorem") and shuffles the grammar, so a Latin reader cannot make sense of it. Generated filler like this tool produces recombines the same authentic-looking vocabulary into new random sentences with realistic lengths.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I generate lorem ipsum by word count?</p>
      <p class="faq-a">Yes. Select Words as the unit, enter the exact number you need and click Generate. This is the mode to use when a design spec says something like "this area holds roughly 50 words" — you get precisely that many, rather than trimming a paragraph by hand. Sentences and Paragraphs modes work the same way when you need text measured in those units instead, and Regenerate produces a fresh variation without touching your settings.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the generated text always start with "Lorem ipsum dolor sit amet"?</p>
      <p class="faq-a">By default, yes — the recognisable opening is kept because designers and clients expect it, and it instantly signals "this is placeholder text, not final copy". If you would rather have fully random Latin from the first word — for example when generating several distinct blocks that should not all begin identically — disable the Start with Lorem ipsum option before generating.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use lorem ipsum text in commercial projects?</p>
      <p class="faq-a">Yes, without restriction. The underlying text is a 2,000-year-old work whose copyright expired long before copyright law existed, and the scrambled placeholder form has been passed freely through the printing industry for five centuries. There is no license, no attribution requirement and no trademark. Just remember to replace it before launch — shipping lorem ipsum to production is one of the most common publishing mistakes on the web.</p>
    </div>

  </div>

</div>

<!-- Lorem ipsum CSS -->
<style>
.li-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.li-controls {
  padding: 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.li-control-row {
  display: flex;
  align-items: flex-end;
  gap: 16px;
  flex-wrap: wrap;
}

.li-control-label {
  display: block;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  margin-bottom: 6px;
}

.li-unit-group { display: flex; flex-direction: column; }

.li-unit-btns {
  display: flex;
  gap: 6px;
}

.li-unit-btn {
  padding: 7px 16px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.875rem;
  font-weight: 500;
  cursor: pointer;
  transition: border-color var(--transition), background var(--transition), color var(--transition);
}

.li-unit-btn:hover { border-color: var(--accent); color: var(--accent); }
.li-unit-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }

.li-qty-group { display: flex; flex-direction: column; }

.li-qty-input {
  width: 80px;
  padding: 7px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  outline: none;
  transition: border-color var(--transition);
  text-align: center;
}

.li-qty-input:focus { border-color: var(--accent); }

.li-generate-btn { align-self: flex-end; padding: 8px 24px; }

/* Options */
.li-options {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.li-option {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  flex: 1;
  min-width: 150px;
  transition: border-color var(--transition), background var(--transition);
}

.li-option:hover { border-color: var(--accent); }

.li-option input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.li-option:has(input:checked) {
  border-color: var(--accent);
  background: var(--accent-light);
}

[data-theme="dark"] .li-option:has(input:checked) { background: var(--accent-dim); }

.li-option-text { display: flex; flex-direction: column; gap: 1px; }
.li-option-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.li-option-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); }

/* Output */
.li-output-wrap { display: flex; flex-direction: column; }

.li-output-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  gap: 10px;
  flex-wrap: wrap;
}

.li-output-stats {
  font-size: 0.75rem;
  color: var(--text-3);
}

.li-output-actions { display: flex; gap: 6px; }

.li-output-textarea {
  width: 100%;
  min-height: 280px;
  padding: 16px;
  border: none;
  background: var(--accent-light);
  color: var(--accent-dark);
  font-family: var(--font);
  font-size: 0.9375rem;
  line-height: 1.8;
  resize: vertical;
  outline: none;
  cursor: default;
}

[data-theme="dark"] .li-output-textarea {
  background: var(--accent-dim);
  color: #5DCAA5;
}

.li-output-textarea::placeholder { color: var(--text-3); }

@media (max-width: 640px) {
  .li-control-row { flex-direction: column; align-items: stretch; }
  .li-generate-btn { width: 100%; justify-content: center; }
  .li-option { min-width: 100%; }
}
</style>

<!-- Lorem ipsum JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  /* Full lorem ipsum word pool */
  var WORDS = [
    'lorem','ipsum','dolor','sit','amet','consectetur','adipiscing','elit',
    'sed','do','eiusmod','tempor','incididunt','ut','labore','et','dolore',
    'magna','aliqua','enim','ad','minim','veniam','quis','nostrud','exercitation',
    'ullamco','laboris','nisi','aliquip','ex','ea','commodo','consequat','duis',
    'aute','irure','in','reprehenderit','voluptate','velit','esse','cillum',
    'fugiat','nulla','pariatur','excepteur','sint','occaecat','cupidatat','non',
    'proident','sunt','culpa','qui','officia','deserunt','mollit','anim','id','est',
    'laborum','perspiciatis','unde','omnis','iste','natus','error','accusantium',
    'doloremque','laudantium','totam','rem','aperiam','eaque','ipsa','quae','ab',
    'inventore','veritatis','quasi','architecto','beatae','vitae','dicta','explicabo',
    'nemo','ipsam','voluptatem','quia','voluptas','aspernatur','odit','fugit',
    'consequuntur','magni','dolores','eos','ratione','sequi','nesciunt','neque',
    'porro','quisquam','dolorem','adipisci','numquam','eius','modi','tempora',
    'quaerat','quam','minima','nostrum','exercitationem','ullam','corporis','suscipit',
    'laboriosam','aliquid','commodi','consequatur','quidem','rerum','facilis',
    'expedita','distinctio','libero','tempore','cum','soluta','nobis','eligendi',
    'optio','cumque','impedit','quo','minus','maxime','placeat','facere','possimus',
    'assumenda','repellendus','temporibus','autem','quibusdam','officiis','debitis',
    'reiciendis','voluptatibus','maiores','alias','perferendis','doloribus','asperiores',
    'repellat','harum','quidem','rerum','facilis','expedita'
  ];

  var CLASSIC_OPEN = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

  var currentUnit = 'paragraphs';

  function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }

  function randomWord() {
    return WORDS[Math.floor(Math.random() * WORDS.length)];
  }

  function generateSentence() {
    var len = rand(8, 18);
    var words = [];
    for (var i = 0; i < len; i++) words.push(randomWord());
    return capitalize(words.join(' ')) + '.';
  }

  function generateParagraph(isFirst) {
    var sentCount = rand(4, 6);
    var sentences = [];
    for (var i = 0; i < sentCount; i++) {
      sentences.push(generateSentence());
    }
    var para = sentences.join(' ');
    if (isFirst && document.getElementById('li-classic').checked) {
      para = CLASSIC_OPEN + ' ' + sentences.slice(1).join(' ');
    }
    return para;
  }

  function generate() {
    var qty    = Math.max(1, Math.min(100, parseInt(document.getElementById('li-qty').value) || 3));
    var useHtml= document.getElementById('li-html').checked;
    var allCaps= document.getElementById('li-allcaps').checked;
    var output = document.getElementById('li-output');
    var stats  = document.getElementById('li-output-stats');

    var result = '';
    var wordCount = 0;

    if (currentUnit === 'paragraphs') {
      var paras = [];
      for (var i = 0; i < qty; i++) {
        var para = generateParagraph(i === 0);
        paras.push(para);
        wordCount += para.split(/\s+/).length;
      }
      if (useHtml) {
        result = paras.map(function(p){ return '<p>' + p + '</p>'; }).join('\n\n');
      } else {
        result = paras.join('\n\n');
      }
      stats.textContent = qty + ' paragraph' + (qty !== 1 ? 's' : '') + ' — ' + wordCount.toLocaleString() + ' words';

    } else if (currentUnit === 'sentences') {
      var sents = [];
      for (var i = 0; i < qty; i++) {
        var sent = (i === 0 && document.getElementById('li-classic').checked)
          ? CLASSIC_OPEN
          : generateSentence();
        sents.push(sent);
        wordCount += sent.split(/\s+/).length;
      }
      result = sents.join(' ');
      if (useHtml) result = '<p>' + result + '</p>';
      stats.textContent = qty + ' sentence' + (qty !== 1 ? 's' : '') + ' — ' + wordCount.toLocaleString() + ' words';

    } else {
      /* Words mode */
      var words = [];
      if (document.getElementById('li-classic').checked) {
        var classicWords = CLASSIC_OPEN.replace(/[.,]/g,'').split(' ');
        for (var i = 0; i < Math.min(qty, classicWords.length); i++) {
          words.push(classicWords[i]);
        }
      }
      while (words.length < qty) words.push(randomWord());
      words = words.slice(0, qty);
      result = capitalize(words.join(' ')) + '.';
      if (useHtml) result = '<p>' + result + '</p>';
      stats.textContent = qty + ' word' + (qty !== 1 ? 's' : '');
    }

    if (allCaps) result = result.toUpperCase();
    output.value = result;
  }

  /* Copy button */
  document.getElementById('li-copy-btn').addEventListener('click', function() {
    var output = document.getElementById('li-output');
    if (!output.value) return;
    navigator.clipboard.writeText(output.value).then(function() {
      document.getElementById('li-copy-btn').textContent = 'Copied!';
      setTimeout(function(){ document.getElementById('li-copy-btn').textContent = 'Copy'; }, 2000);
    });
  });

  /* Unit buttons */
  document.querySelectorAll('.li-unit-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.li-unit-btn').forEach(function(b){
        b.classList.remove('active');
        b.setAttribute('aria-pressed','false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed','true');
      currentUnit = btn.dataset.unit;
    });
  });

  /* Generate and regenerate */
  document.getElementById('li-generate').addEventListener('click', generate);
  document.getElementById('li-regenerate').addEventListener('click', generate);

  /* Enter key on qty input */
  document.getElementById('li-qty').addEventListener('keydown', function(e) {
    if (e.key === 'Enter') generate();
  });

  /* Generate on load */
  generate();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
