<?php
$tool_slug   = 'text-to-hashtags';
$tool_name   = 'Text to Hashtags';

$page_title  = 'Text to Hashtags Generator — Convert Text to Hashtags Free | TextlyPop';
$meta_desc   = 'Convert any text or keywords into hashtags for Instagram, Twitter, TikTok and LinkedIn instantly. Free online hashtag generator. No signup required.';
$canonical_url = 'https://textlypop.com/tools/text-to-hashtags';
$og_title    = 'Free Text to Hashtags Generator — TextlyPop';
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
  "name": "Text to Hashtags",
  "url": "https://textlypop.com/tools/text-to-hashtags",
  "description": "Convert text or keywords into hashtags for social media instantly. Supports Instagram, Twitter, TikTok and LinkedIn.",
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
      "name": "How do I convert text to hashtags?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Enter your keywords or phrases — one per line or comma-separated — and the tool automatically adds the # prefix, removes spaces and special characters, and formats each one as a valid hashtag. Click any hashtag to copy it individually or use Copy all to copy all hashtags at once."
      }
    },
    {
      "@type": "Question",
      "name": "How many hashtags should I use on Instagram?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Instagram allows up to 30 hashtags per post. Research suggests 3 to 11 highly relevant hashtags typically outperform posts using all 30. Quality and relevance to your content matter more than quantity."
      }
    },
    {
      "@type": "Question",
      "name": "Should hashtags be lowercase or CamelCase?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Both work on all platforms. CamelCase like #DigitalMarketing is more readable for multi-word hashtags and helps screen readers pronounce them correctly. Lowercase like #digitalmarketing is more common but harder to read when multiple words are joined together."
      }
    },
    {
      "@type": "Question",
      "name": "How many hashtags should I use on Twitter?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Twitter and X recommend 1 to 2 hashtags per tweet for best engagement. Studies show that tweets with more than 2 hashtags see reduced engagement. Focus on one or two highly relevant tags rather than many generic ones."
      }
    },
    {
      "@type": "Question",
      "name": "What are stop words in hashtag generation?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Stop words are common filler words like a, the, and, or, is, in, on, at, to and so on. Removing them from hashtags keeps the tags focused on meaningful keywords. For example removing stop words from the phrase turns it into #PhotoOfThe into #Photo."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Text to Hashtags',
  'description' => 'Convert keywords and phrases to social media hashtags using TextlyPop text to hashtags generator.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Enter your keywords','text'=>'Type or paste your keywords or phrases into the input box. Enter one keyword per line or separate them with commas.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Choose formatting options','text'=>'Select lowercase or CamelCase formatting. Enable Remove stop words to strip common filler words and keep hashtags focused.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'View your hashtags','text'=>'Hashtags appear instantly below the input. Click any individual hashtag to copy it, or click Copy all to copy the full set.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Check platform limits','text'=>'The platform bar shows whether your hashtag count is within limits for Twitter, LinkedIn, and Instagram.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Text to Hashtags','item'=>'https://textlypop.com/tools/text-to-hashtags'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Text to hashtags</h1>
    <p>Convert any text or keywords into hashtags for Instagram, Twitter, TikTok and LinkedIn. Click any tag to copy it.</p>
  </div>

  <div class="th-tool" id="th-tool">

    <!-- Input -->
    <div class="th-input-wrap">
      <textarea
        id="th-input"
        class="th-textarea"
        placeholder="Enter keywords or phrases, one per line or comma-separated…

digital marketing
social media strategy
content creation
brand awareness"
        aria-label="Text to convert to hashtags"
        data-save-key="text-to-hashtags"
        spellcheck="false"></textarea>

      <div class="th-input-footer">
        <div class="th-options" role="group" aria-label="Hashtag formatting options">
          <label class="th-option">
            <input type="checkbox" id="th-lowercase" checked>
            <span class="th-option-text">
              <strong>Lowercase</strong>
              <em>#digitalmarketing</em>
            </span>
          </label>
          <label class="th-option">
            <input type="checkbox" id="th-camel">
            <span class="th-option-text">
              <strong>CamelCase</strong>
              <em>#DigitalMarketing</em>
            </span>
          </label>
          <label class="th-option">
            <input type="checkbox" id="th-remove-stops">
            <span class="th-option-text">
              <strong>Remove stop words</strong>
              <em>Skip a, the, and, is…</em>
            </span>
          </label>
        </div>
        <button class="btn btn-clear" data-targets="th-input">Clear</button>
      </div>
    </div>

    <!-- Output area -->
    <div class="th-output-wrap">
      <div class="th-output-header">
        <span class="th-output-label">Hashtags</span>
        <div class="th-output-actions">
          <span class="th-count" id="th-count">0 hashtags</span>
          <button class="btn btn-ghost" id="th-copy-all-btn">Copy all</button>
        </div>
      </div>

      <!-- Clickable tags -->
      <div class="th-tags" id="th-tags" aria-live="polite">
        <span class="th-empty-hint">Your hashtags will appear here — click any tag to copy it</span>
      </div>

      <!-- Plain text version -->
      <div class="th-plain-wrap" id="th-plain-wrap" aria-label="Hashtags as plain text">
        <div class="th-plain-header">
          <span class="th-plain-label">Plain text (paste ready)</span>
          <button class="btn btn-copy" id="th-copy-plain-btn">Copy</button>
        </div>
        <div class="th-plain-text" id="th-plain-text"></div>
      </div>
    </div>

    <!-- Platform info bar -->
    <div class="th-platform-bar" id="th-platform-bar">
      <span class="th-platform-label">Platform limits:</span>
      <div class="th-platform-chips" id="th-platform-chips"></div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="th-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="th-input" data-to-tool="case-converter">Case converter</button>
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

    <h2>How to convert text to hashtags</h2>
    <p>Enter your keywords or phrases into the input box — one per line or comma-separated. The tool strips spaces and special characters, adds the # symbol, and formats each phrase as a valid hashtag. Results appear instantly as you type. Click any individual hashtag to copy it to your clipboard, or use Copy all to grab the entire set as a space-separated string ready to paste directly into any social media post.</p>

    <h2>Lowercase vs CamelCase hashtags</h2>
    <p>Both formats work equally on all platforms — Instagram, Twitter, TikTok, and LinkedIn all treat #digitalmarketing and #DigitalMarketing as the same hashtag. CamelCase is recommended for multi-word hashtags because it significantly improves readability and is more accessible — screen readers can pronounce "DigitalMarketing" as two separate words whereas "digitalmarketing" is often read as a single meaningless string. For single-word hashtags like #photography the difference does not matter.</p>

    <h2>Removing stop words</h2>
    <p>Stop words are common English function words — a, the, and, or, in, on, at, is, was — that carry no meaningful content. Removing them from hashtags keeps the tags focused on your actual topic keywords. For example the phrase "tips for getting started with social media" becomes #tips #getting #started #social #media with stop words removed, rather than also including #for #with. Enable this option when converting natural language sentences to hashtags.</p>

    <h2>Hashtag limits by platform</h2>
    <p>Instagram allows up to 30 hashtags per post, though research consistently shows 3 to 11 well-chosen hashtags perform better than maxing out at 30. Twitter and X recommend 1 to 2 hashtags per tweet — using more is linked to lower engagement. TikTok allows up to 2200 characters in captions including hashtags, with no hard limit on hashtag count. LinkedIn posts perform best with 3 to 5 relevant professional hashtags. The platform indicator bar below your hashtags shows your current count relative to each platform's recommended limit.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert text to hashtags?</p>
      <p class="faq-a">Enter keywords or phrases one per line or comma-separated. The tool adds # and removes spaces and special characters instantly. Click any hashtag to copy it individually.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many hashtags should I use on Instagram?</p>
      <p class="faq-a">Instagram allows up to 30. Research suggests 3 to 11 highly relevant hashtags outperform using all 30. Quality and relevance matter more than quantity.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Should hashtags be lowercase or CamelCase?</p>
      <p class="faq-a">Both work. CamelCase is more readable for multi-word tags and is better for accessibility since screen readers can parse the words correctly.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many hashtags should I use on Twitter?</p>
      <p class="faq-a">Twitter and X recommend 1 to 2 hashtags per tweet. More than 2 is linked to reduced engagement. Focus on one or two highly relevant tags.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What are stop words in hashtag generation?</p>
      <p class="faq-a">Common filler words like a, the, and, or, in, is. Removing them keeps hashtags focused on meaningful keywords. Enable Remove stop words when converting full sentences to hashtags.</p>
    </div>

  </div>

</div>

<!-- Text to hashtags CSS -->
<style>
.th-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Input */
.th-textarea {
  width: 100%;
  min-height: 180px;
  padding: 16px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 1rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
  display: block;
}

.th-textarea::placeholder { color: var(--text-3); white-space: pre-line; }

.th-input-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  gap: 12px;
  flex-wrap: wrap;
}

.th-options { display: flex; gap: 8px; flex-wrap: wrap; }

.th-option {
  display: flex;
  align-items: flex-start;
  gap: 7px;
  padding: 7px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  transition: border-color var(--transition), background var(--transition);
}

.th-option:hover { border-color: var(--accent); }
.th-option:has(input:checked) { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .th-option:has(input:checked) { background: var(--accent-dim); }

.th-option input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.th-option-text { display: flex; flex-direction: column; gap: 1px; }
.th-option-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.th-option-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); font-family: var(--font-mono); }

/* Output */
.th-output-wrap { border-top: 1px solid var(--border); }

.th-output-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  gap: 10px;
  flex-wrap: wrap;
}

.th-output-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.th-output-actions { display: flex; align-items: center; gap: 10px; }
.th-count { font-size: 0.8125rem; color: var(--text-3); font-variant-numeric: tabular-nums; }

/* Tags grid */
.th-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  padding: 16px;
  min-height: 80px;
  align-items: flex-start;
  align-content: flex-start;
}

.th-empty-hint {
  color: var(--text-3);
  font-size: 0.9375rem;
  align-self: center;
}

.th-tag {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 6px 14px;
  background: var(--accent-light);
  color: var(--accent-dark);
  border-radius: 20px;
  font-size: 0.875rem;
  font-weight: 500;
  cursor: pointer;
  user-select: all;
  border: 1px solid transparent;
  transition: background var(--transition), border-color var(--transition), transform 0.1s ease;
  position: relative;
}

[data-theme="dark"] .th-tag { background: var(--accent-dim); color: #5DCAA5; }

.th-tag:hover { background: #b8e8d4; border-color: var(--accent); transform: translateY(-1px); }
[data-theme="dark"] .th-tag:hover { background: rgba(29,158,117,0.2); }

.th-tag.copied { background: var(--accent); color: #fff; }

/* Plain text output */
.th-plain-wrap {
  border-top: 1px solid var(--border);
  background: var(--bg-2);
}

.th-plain-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 8px 14px;
  border-bottom: 1px solid var(--border);
}

.th-plain-label {
  font-size: 0.75rem;
  color: var(--text-3);
  font-weight: 500;
}

.th-plain-text {
  padding: 12px 14px;
  font-size: 0.875rem;
  color: var(--accent-dark);
  word-break: break-all;
  line-height: 1.8;
  min-height: 44px;
  font-family: var(--font-mono);
}

[data-theme="dark"] .th-plain-text { color: #5DCAA5; }

/* Platform bar */
.th-platform-bar {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.th-platform-label {
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--text-3);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  white-space: nowrap;
}

.th-platform-chips { display: flex; gap: 6px; flex-wrap: wrap; }

.th-chip {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 3px 10px;
  border-radius: 20px;
  font-size: 0.75rem;
  font-weight: 500;
}

.th-chip.ok   { background: rgba(29,158,117,0.12); color: var(--accent); }
.th-chip.over { background: rgba(229,62,62,0.1);   color: var(--danger); }

@media (max-width: 640px) {
  .th-option-text em { display: none; }
}
</style>

<!-- Text to hashtags JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('th-input');
  var tagsEl     = document.getElementById('th-tags');
  var plainText  = document.getElementById('th-plain-text');
  var countEl    = document.getElementById('th-count');
  var copyAllBtn = document.getElementById('th-copy-all-btn');
  var copyPlain  = document.getElementById('th-copy-plain-btn');
  var platChips  = document.getElementById('th-platform-chips');

  var optLower   = document.getElementById('th-lowercase');
  var optCamel   = document.getElementById('th-camel');
  var optStops   = document.getElementById('th-remove-stops');

  /* Common English stop words */
  var STOPS = new Set([
    'a','an','the','and','or','but','nor','so','yet','for','of','in','on',
    'at','to','by','up','as','is','are','was','were','be','been','being',
    'have','has','had','do','does','did','will','would','could','should',
    'may','might','must','shall','can','need','dare','it','its','this',
    'that','these','those','i','my','me','we','our','you','your','he',
    'she','him','her','they','them','their','what','which','who','with',
    'from','into','onto','upon','about','above','below','between','through',
    'during','before','after','if','then','than','not','no','get','just','also'
  ]);

  function toHashtag(phrase) {
    /* Clean the phrase */
    var words = phrase
      .toLowerCase()
      .replace(/[^a-z0-9\s]/g, ' ')
      .trim()
      .split(/\s+/)
      .filter(Boolean);

    if (optStops.checked) {
      words = words.filter(function(w) { return !STOPS.has(w); });
    }

    if (!words.length) return null;

    var tag;
    if (optCamel.checked) {
      tag = words.map(function(w) {
        return w.charAt(0).toUpperCase() + w.slice(1);
      }).join('');
    } else {
      tag = words.join('');
      if (!optLower.checked) tag = tag.charAt(0).toUpperCase() + tag.slice(1);
    }

    return '#' + tag;
  }

  function process() {
    var raw = input.value;

    if (!raw.trim()) {
      tagsEl.innerHTML = '<span class="th-empty-hint">Your hashtags will appear here — click any tag to copy it</span>';
      plainText.textContent = '';
      countEl.textContent = '0 hashtags';
      platChips.innerHTML = '';
      return;
    }

    /* Split on newlines or commas */
    var items = raw
      .split(/[\n,]+/)
      .map(function(s) { return s.trim(); })
      .filter(Boolean);

    /* Generate hashtags */
    var tags = items.map(toHashtag).filter(Boolean);

    /* Deduplicate case-insensitively */
    var seen = {};
    tags = tags.filter(function(t) {
      var key = t.toLowerCase();
      if (seen[key]) return false;
      seen[key] = true;
      return true;
    });

    var count = tags.length;
    countEl.textContent = count + ' hashtag' + (count !== 1 ? 's' : '');

    /* Render clickable tags */
    tagsEl.innerHTML = '';
    tags.forEach(function(tag) {
      var btn = document.createElement('span');
      btn.className = 'th-tag';
      btn.textContent = tag;
      btn.title = 'Click to copy';
      btn.setAttribute('role', 'button');
      btn.setAttribute('tabindex', '0');

      function copyTag() {
        navigator.clipboard.writeText(tag).then(function() {
          btn.textContent = '✓ Copied';
          btn.classList.add('copied');
          setTimeout(function() {
            btn.textContent = tag;
            btn.classList.remove('copied');
          }, 1500);
        });
      }

      btn.addEventListener('click', copyTag);
      btn.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') copyTag();
      });
      tagsEl.appendChild(btn);
    });

    /* Plain text */
    var plainStr = tags.join(' ');
    plainText.textContent = plainStr;

    /* Platform chips */
    var platforms = [
      { name: 'Twitter/X',  limit: 2,  rec: true },
      { name: 'LinkedIn',   limit: 5,  rec: true },
      { name: 'TikTok',     limit: 20, rec: false },
      { name: 'Instagram',  limit: 30, rec: false },
    ];

    platChips.innerHTML = platforms.map(function(p) {
      var ok = count <= p.limit;
      return '<span class="th-chip ' + (ok ? 'ok' : 'over') + '">' +
        (ok ? '✓' : '✗') + ' ' + p.name +
        ' (' + count + '/' + p.limit + ')' +
        '</span>';
    }).join('');
  }

  /* Copy all */
  copyAllBtn.addEventListener('click', function() {
    var text = plainText.textContent;
    if (!text) return;
    navigator.clipboard.writeText(text).then(function() {
      copyAllBtn.textContent = 'Copied!';
      setTimeout(function() { copyAllBtn.textContent = 'Copy all'; }, 2000);
    });
  });

  copyPlain.addEventListener('click', function() {
    var text = plainText.textContent;
    if (!text) return;
    navigator.clipboard.writeText(text).then(function() {
      copyPlain.textContent = 'Copied!';
      setTimeout(function() { copyPlain.textContent = 'Copy'; }, 2000);
    });
  });

  /* CamelCase and lowercase are mutually exclusive */
  optCamel.addEventListener('change', function() {
    if (optCamel.checked) optLower.checked = false;
    process();
  });

  optLower.addEventListener('change', function() {
    if (optLower.checked) optCamel.checked = false;
    process();
  });

  optStops.addEventListener('change', process);
  input.addEventListener('input', process);

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
