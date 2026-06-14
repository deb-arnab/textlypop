<?php
$tool_slug   = 'text-reverser';
$tool_name   = 'Text Reverser';

$page_title  = 'Text Reverser — Reverse Text Online Free | TextlyPop';
$meta_desc   = 'Reverse text instantly. Reverse entire text, reverse word order, or reverse each word individually. Free online text reverser. No signup required.';
$canonical_url = 'https://textlypop.com/tools/text-reverser';
$og_title    = 'Free Online Text Reverser — TextlyPop';
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
  "name": "Text Reverser",
  "url": "https://textlypop.com/tools/text-reverser",
  "description": "Reverse text instantly. Reverse entire text, word order, or each word individually.",
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
      "name": "How do I reverse text online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your text into the input box and the reversed version appears instantly in the output panel. Choose between reversing all characters, reversing word order, or reversing each individual word."
      }
    },
    {
      "@type": "Question",
      "name": "What is the difference between reversing text and reversing word order?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Reversing all characters flips every single character in the text so 'Hello World' becomes 'dlroW olleH'. Reversing word order keeps each word intact but puts them in reverse sequence so 'Hello World' becomes 'World Hello'. Reversing each word flips the characters within each word but keeps word order so 'Hello World' becomes 'olleH dlroW'."
      }
    },
    {
      "@type": "Question",
      "name": "Can I reverse text line by line?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Enable the Line by line option to process each line of your text independently. Each line is reversed according to your selected mode, and line breaks are preserved in the output."
      }
    },
    {
      "@type": "Question",
      "name": "Why would someone need to reverse text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Text reversal has many uses. Developers use it to test string manipulation functions. Puzzle makers create word puzzles and riddles. Students study palindromes. Designers create mirror text effects. Social media users create reversed text for stylistic posts. Cryptography enthusiasts use simple reversal as a basic cipher."
      }
    },
    {
      "@type": "Question",
      "name": "Does this tool work with numbers and special characters?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The text reverser works with all characters including numbers, punctuation, symbols, and special characters. Every character in your input is treated equally during reversal."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Reverse Text Online',
  'description' => 'Reverse text characters, word order, or individual words using TextlyPop text reverser.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Paste your text','text'=>'Type or paste your text into the input box on the left.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Choose a reversal mode','text'=>'Select Reverse all characters to flip every character, Reverse word order to reverse the sequence of words, or Reverse each word to flip characters within each word.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'View the result','text'=>'The reversed text appears instantly in the output panel on the right as you type.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy the result','text'=>'Click Copy to copy the reversed text to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Text Reverser','item'=>'https://textlypop.com/tools/text-reverser'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Text reverser</h1>
    <p>Reverse entire text, reverse word order, or reverse each word individually. Results appear as you type.</p>
  </div>

  <div class="tr-tool" id="tr-tool">

    <!-- Mode selector -->
    <div class="tr-modes">
      <span class="tr-modes-label">Reverse mode:</span>
      <div class="tr-mode-group" role="group" aria-label="Reversal mode">

        <button class="tr-mode-btn active" data-mode="chars" aria-pressed="true">
          <span class="tr-mode-name">Reverse all characters</span>
          <span class="tr-mode-example">Hello → olleH</span>
        </button>

        <button class="tr-mode-btn" data-mode="words" aria-pressed="false">
          <span class="tr-mode-name">Reverse word order</span>
          <span class="tr-mode-example">Hello World → World Hello</span>
        </button>

        <button class="tr-mode-btn" data-mode="each" aria-pressed="false">
          <span class="tr-mode-name">Reverse each word</span>
          <span class="tr-mode-example">Hello World → olleH dlroW</span>
        </button>

      </div>

      <label class="tr-line-option">
        <input type="checkbox" id="tr-line-by-line">
        <span>Line by line</span>
      </label>
    </div>

    <!-- Panels -->
    <div class="tr-panels">

      <div class="tr-panel">
        <div class="tr-panel-header">
          <span class="tr-panel-label">Input</span>
          <button class="btn btn-clear" data-targets="tr-input,tr-output">Clear</button>
        </div>
        <textarea
          id="tr-input"
          class="tr-textarea"
          placeholder="Type or paste your text here…"
          aria-label="Text to reverse"
          data-save-key="text-reverser"
          spellcheck="false"></textarea>
        <div class="tr-panel-footer">
          <span id="tr-input-count">0 characters</span>
        </div>
      </div>

      <div class="tr-panel">
        <div class="tr-panel-header">
          <span class="tr-panel-label">Output</span>
          <button class="btn btn-copy" data-target="tr-output">Copy</button>
        </div>
        <textarea
          id="tr-output"
          class="tr-textarea tr-output-area"
          readonly
          placeholder="Reversed text will appear here…"
          aria-label="Reversed text"
          aria-live="polite"></textarea>
        <div class="tr-panel-footer">
          <span class="tr-active-mode" id="tr-active-mode">Reversing all characters</span>
        </div>
      </div>

    </div>

    <!-- Toolbar -->
    <div class="tr-toolbar">
      <button class="btn btn-ghost" id="tr-swap-btn" title="Use output as new input">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Use as input
      </button>
      <button class="btn btn-copy" data-target="tr-output">Copy result</button>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="tr-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="tr-output" data-to-tool="case-converter">Case converter</button>
    <button class="send-to-btn" data-from="tr-output" data-to-tool="find-and-replace">Find and replace</button>
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

  <!-- SEO + GEO content -->
  <div class="tool-content mt-32">

    <h2>How to reverse text online</h2>
    <p>Paste your text into the input box on the left. The reversed version appears instantly in the output panel on the right as you type — no button required. Choose your reversal mode from the three options at the top. Use the Line by line option to process each line of your text independently, preserving line breaks in the output.</p>

    <h2>Three reversal modes explained</h2>
    <p>Reverse all characters flips every single character in your entire text from last to first. The word "Hello" becomes "olleH" and a full sentence reads completely backwards. This is the most common form of text reversal and what most people mean when they say they want to reverse text.</p>
    <p>Reverse word order keeps each individual word intact but reverses the sequence in which they appear. "The quick brown fox" becomes "fox brown quick The". Each word is still readable but the sentence reads from right to left. This is useful for creating mirror sentence effects or for certain programming exercises.</p>
    <p>Reverse each word flips the characters within each word individually but keeps the words in their original positions. "Hello World" becomes "olleH dlroW". The word order stays the same but each word itself is reversed. This mode is commonly used in coding challenges and puzzles.</p>

    <h2>Common uses for text reversal</h2>
    <p>Developers use text reversal to test string manipulation functions and algorithms — reversing a string is one of the most common programming exercises and interview questions. Puzzle makers create word puzzles, riddles, and brain teasers using reversed text. Students studying palindromes — words and phrases that read the same forwards and backwards — use reversal to verify their examples. Designers create mirror text effects for logos, artwork, and creative typography. Social media users create reversed text for stylistic or cryptic posts.</p>

    <h2>Palindrome testing</h2>
    <p>A palindrome reads the same forwards and backwards — words like "racecar", "level", and "kayak", or phrases like "A man a plan a canal Panama". To check if a word or phrase is a palindrome using the text reverser, paste it into the input and compare the output to the original. If they match (ignoring spaces and punctuation) it is a palindrome. For dedicated palindrome detection visit our Palindrome checker tool.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I reverse text online?</p>
      <p class="faq-a">Paste your text into the input box and the reversed version appears instantly. Choose between reversing all characters, reversing word order, or reversing each individual word.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the difference between reversing text and reversing word order?</p>
      <p class="faq-a">Reversing all characters flips every character so "Hello World" becomes "dlroW olleH". Reversing word order keeps each word intact but reverses their sequence so "Hello World" becomes "World Hello".</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I reverse text line by line?</p>
      <p class="faq-a">Yes. Enable the Line by line option to process each line independently. Each line is reversed according to your selected mode and line breaks are preserved.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why would someone need to reverse text?</p>
      <p class="faq-a">Common uses include testing string functions in programming, creating puzzles and riddles, studying palindromes, making mirror text effects for design, and creating stylistic social media posts.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does this tool work with numbers and special characters?</p>
      <p class="faq-a">Yes. The text reverser works with all characters including numbers, punctuation, symbols, and special characters.</p>
    </div>

  </div>

</div>

<!-- Text reverser CSS -->
<style>
.tr-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.tr-modes {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.tr-modes-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  white-space: nowrap;
}

.tr-mode-group {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  flex: 1;
}

.tr-mode-btn {
  display: flex;
  flex-direction: column;
  gap: 3px;
  padding: 9px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  text-align: left;
  flex: 1;
  min-width: 160px;
  transition: border-color var(--transition), background var(--transition);
}

.tr-mode-btn:hover { border-color: var(--accent); }
.tr-mode-btn.active { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .tr-mode-btn.active { background: var(--accent-dim); }

.tr-mode-name {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text);
}

.tr-mode-btn.active .tr-mode-name { color: var(--accent-dark); }
[data-theme="dark"] .tr-mode-btn.active .tr-mode-name { color: #5DCAA5; }

.tr-mode-example {
  font-size: 0.75rem;
  color: var(--text-3);
  font-family: var(--font-mono);
}

.tr-line-option {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.875rem;
  color: var(--text-2);
  cursor: pointer;
  white-space: nowrap;
  user-select: none;
}

.tr-line-option input[type="checkbox"] {
  accent-color: var(--accent);
  width: 14px;
  height: 14px;
  cursor: pointer;
}

/* Panels */
.tr-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 240px;
  border-bottom: 1px solid var(--border);
}

.tr-panel { display: flex; flex-direction: column; }
.tr-panel:first-child { border-right: 1px solid var(--border); }

.tr-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.tr-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.tr-textarea {
  flex: 1;
  width: 100%;
  min-height: 220px;
  padding: 14px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 0.9375rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
}

.tr-textarea::placeholder { color: var(--text-3); }
.tr-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .tr-output-area { color: #5DCAA5; background: var(--accent-dim); }

.tr-panel-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.tr-active-mode { color: var(--accent); font-weight: 500; }

.tr-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
}

@media (max-width: 640px) {
  .tr-panels { grid-template-columns: 1fr; }
  .tr-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .tr-mode-btn { min-width: 100%; }
}
</style>

<!-- Text reverser JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input      = document.getElementById('tr-input');
  var output     = document.getElementById('tr-output');
  var inputCount = document.getElementById('tr-input-count');
  var activeMode = document.getElementById('tr-active-mode');
  var swapBtn    = document.getElementById('tr-swap-btn');
  var lineByLine = document.getElementById('tr-line-by-line');

  var currentMode = 'chars';

  var modeNames = {
    chars: 'Reversing all characters',
    words: 'Reversing word order',
    each:  'Reversing each word'
  };

  function reverseChars(text) {
    return text.split('').reverse().join('');
  }

  function reverseWords(text) {
    return text.trim().split(/\s+/).reverse().join(' ');
  }

  function reverseEachWord(text) {
    return text.replace(/\S+/g, function(word) {
      return word.split('').reverse().join('');
    });
  }

  function applyMode(text) {
    if (currentMode === 'chars')  return reverseChars(text);
    if (currentMode === 'words')  return reverseWords(text);
    if (currentMode === 'each')   return reverseEachWord(text);
    return text;
  }

  function process() {
    var text = input.value;
    var result;

    if (!text) {
      output.value = '';
      inputCount.textContent = '0 characters';
      return;
    }

    if (lineByLine.checked) {
      result = text.split('\n').map(applyMode).join('\n');
    } else {
      result = applyMode(text);
    }

    output.value = result;
    inputCount.textContent = text.length.toLocaleString() + ' character' + (text.length !== 1 ? 's' : '');
    activeMode.textContent = modeNames[currentMode];
  }

  /* Mode buttons */
  document.querySelectorAll('.tr-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.tr-mode-btn').forEach(function(b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-pressed', 'true');
      currentMode = btn.dataset.mode;
      process();
    });
  });

  input.addEventListener('input', process);
  lineByLine.addEventListener('change', process);

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    input.value = output.value;
    output.value = '';
    process();
    input.focus();
  });

  process();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
