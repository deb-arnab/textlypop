<?php
$tool_slug   = 'morse-code-translator';
$tool_name   = 'Morse Code Translator';

$page_title  = 'Morse Code Translator — Convert Text to Morse Code Free | TextlyPop';
$meta_desc   = 'Translate text to Morse code and Morse code back to text instantly. Includes audio playback. Free online Morse code translator. No signup required.';
$canonical_url = 'https://textlypop.com/tools/morse-code-translator';
$og_title    = 'Free Morse Code Translator — TextlyPop';
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
  "name": "Morse Code Translator",
  "url": "https://textlypop.com/tools/morse-code-translator",
  "description": "Translate text to Morse code and Morse code back to text instantly. Includes audio playback.",
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
      "name": "How do I convert text to Morse code?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Select Text to Morse mode, type or paste your text into the input box, and the Morse code appears instantly. Each letter is separated by a space and each word is separated by a forward slash."
      }
    },
    {
      "@type": "Question",
      "name": "What do dots and dashes mean in Morse code?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A dot represents a short signal and a dash represents a long signal. Each letter of the alphabet has a unique pattern of dots and dashes. For example A is dot-dash, B is dash-dot-dot-dot, and SOS is dot-dot-dot dash-dash-dash dot-dot-dot."
      }
    },
    {
      "@type": "Question",
      "name": "What is SOS in Morse code?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "SOS in Morse code is ... --- ... which means three dots, three dashes, three dots. It is the international distress signal and was chosen because it is easy to transmit and recognize."
      }
    },
    {
      "@type": "Question",
      "name": "Can I listen to the Morse code audio?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. After converting text to Morse code, click the Play audio button to hear the Morse code played back as beeps using the Web Audio API. Dots are short beeps and dashes are long beeps."
      }
    },
    {
      "@type": "Question",
      "name": "What characters are supported in Morse code?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard international Morse code supports all 26 letters of the alphabet, digits 0-9, and common punctuation including period, comma, question mark, exclamation mark, and apostrophe. Characters not in the Morse code standard are skipped."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Translate Text to Morse Code',
  'description' => 'Convert text to Morse code and play it as audio using TextlyPop Morse code translator.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Choose conversion direction','text'=>'Select Text to Morse to convert text into Morse code, or Morse to Text to decode Morse code back into readable text.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Type or paste your input','text'=>'Enter your text or Morse code in the input box. The conversion happens instantly as you type.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Play the audio','text'=>'Click Play audio to hear your Morse code played as beeps using the Web Audio API. Adjust speed with the WPM control.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy the result','text'=>'Click Copy to copy the Morse code or decoded text to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Morse Code Translator','item'=>'https://textlypop.com/tools/morse-code-translator'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Morse code translator</h1>
    <p>Convert text to Morse code or decode Morse code back to text. Play audio to hear the beeps.</p>
  </div>

  <div class="mc-tool" id="mc-tool">

    <!-- Mode toggle -->
    <div class="mc-modes">
      <div class="mc-mode-group" role="group" aria-label="Translation direction">
        <button class="mc-mode-btn active" data-mode="txt2mc" aria-pressed="true">
          <span class="mc-mode-icon">A → ·−</span>
          <span class="mc-mode-name">Text to Morse</span>
        </button>
        <button class="mc-mode-btn" data-mode="mc2txt" aria-pressed="false">
          <span class="mc-mode-icon">·− → A</span>
          <span class="mc-mode-name">Morse to text</span>
        </button>
      </div>

      <!-- Audio controls -->
      <div class="mc-audio-controls">
        <button class="btn btn-ghost mc-play-btn" id="mc-play-btn" disabled>
          <svg width="13" height="13" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
            <path d="M3 2 L13 8 L3 14 Z"/>
          </svg>
          Play audio
        </button>
        <button class="btn btn-ghost mc-stop-btn hidden" id="mc-stop-btn">
          <svg width="13" height="13" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
            <rect x="3" y="3" width="10" height="10" rx="1"/>
          </svg>
          Stop
        </button>
        <div class="mc-speed-wrap">
          <label class="mc-speed-label" for="mc-wpm">Speed:</label>
          <select id="mc-wpm" class="mc-speed-select" aria-label="Morse code speed">
            <option value="5">Slow (5 WPM)</option>
            <option value="13" selected>Normal (13 WPM)</option>
            <option value="20">Fast (20 WPM)</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Panels -->
    <div class="mc-panels">

      <div class="mc-panel">
        <div class="mc-panel-header">
          <span class="mc-panel-label" id="mc-input-label">Text input</span>
          <button class="btn btn-clear" data-targets="mc-input,mc-output">Clear</button>
        </div>
        <textarea
          id="mc-input"
          class="mc-textarea"
          placeholder="Type your text here…"
          aria-label="Text to translate"
          data-save-key="morse-code-translator"
          spellcheck="false"></textarea>
        <div class="mc-panel-footer">
          <span id="mc-input-info">Letters, numbers and punctuation supported</span>
        </div>
      </div>

      <div class="mc-panel">
        <div class="mc-panel-header">
          <span class="mc-panel-label" id="mc-output-label">Morse code output</span>
          <button class="btn btn-copy" data-target="mc-output">Copy</button>
        </div>
        <textarea
          id="mc-output"
          class="mc-textarea mc-output-area mc-mono"
          readonly
          placeholder="Morse code will appear here…"
          aria-label="Translated Morse code"
          aria-live="polite"></textarea>
        <div class="mc-panel-footer">
          <span id="mc-output-info" class="mc-output-info"></span>
        </div>
      </div>

    </div>

    <!-- Audio progress bar -->
    <div class="mc-audio-progress hidden" id="mc-audio-progress">
      <div class="mc-progress-bar">
        <div class="mc-progress-fill" id="mc-progress-fill"></div>
      </div>
      <span class="mc-progress-label" id="mc-progress-label">Playing…</span>
    </div>

    <!-- Toolbar -->
    <div class="mc-toolbar">
      <button class="btn btn-ghost" id="mc-swap-btn">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M1 8 C1 4.13 4.13 1 8 1 C10.76 1 13.15 2.52 14.37 4.77"/>
          <path d="M15 8 C15 11.87 11.87 15 8 15 C5.24 15 2.85 13.48 1.63 11.23"/>
          <polyline points="12,1 14.5,4.5 11,4.5"/>
          <polyline points="4,15 1.5,11.5 5,11.5"/>
        </svg>
        Swap
      </button>
      <button class="btn btn-copy" data-target="mc-output">Copy result</button>
    </div>

    <!-- Quick reference -->
    <div class="mc-reference">
      <div class="mc-ref-header">
        <span class="mc-ref-title">Morse code reference chart</span>
        <button class="mc-ref-toggle" id="mc-ref-toggle">Show</button>
      </div>
      <div class="mc-ref-grid hidden" id="mc-ref-grid"></div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send output to:</span>
    <button class="send-to-btn" data-from="mc-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="mc-output" data-to-tool="find-and-replace">Find and replace</button>
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

    <h2>How Morse code works</h2>
    <p>Morse code represents letters and numbers as sequences of short and long signals called dots and dashes. A dot is a short signal and a dash is a long signal — three times the length of a dot. Letters within a word are separated by a pause equal to three dots. Words are separated by a pause equal to seven dots. This system was invented by Samuel Morse and Alfred Vail in the 1830s for use with the electric telegraph.</p>
    <p>In this translator dots are shown as a period character and dashes as a hyphen. Letters within a word are separated by spaces and words are separated by a forward slash. For example "Hello World" becomes ".... . .-.. .-.. --- / .-- --- .-. .-.. -.. ".</p>

    <h2>What is SOS in Morse code</h2>
    <p>SOS is the internationally recognized distress signal in Morse code. It is written as ... --- ... meaning three dots, three dashes, three dots. SOS was chosen as the universal distress signal in 1906 not because it stands for any particular phrase but because it is the simplest pattern to transmit and recognize under difficult conditions. It is sometimes remembered as "Save Our Ship" or "Save Our Souls" but these are retroactive interpretations.</p>

    <h2>Learning Morse code</h2>
    <p>The best way to learn Morse code is through audio — hearing the rhythm of dots and dashes rather than reading them visually. Use the Play audio feature to listen to any text converted to Morse code. Start with simple words at slow speed and gradually increase. Most people find it easier to learn common letters first — E (one dot), T (one dash), I (two dots), A (dot dash) — before moving to more complex patterns.</p>

    <h2>Common uses for Morse code today</h2>
    <p>Amateur radio operators still use Morse code and a license exam often tests Morse proficiency. Aviation uses Morse code to identify navigational beacons. Military and emergency communications retain Morse code as a backup system. Assistive technology uses Morse code input for people with limited mobility. Puzzle makers and escape room designers use Morse code as an encoding system for clues and challenges.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert text to Morse code?</p>
      <p class="faq-a">Select Text to Morse mode and type or paste your text. The Morse code appears instantly. Letters are separated by spaces and words by a forward slash.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What do dots and dashes mean in Morse code?</p>
      <p class="faq-a">A dot is a short signal and a dash is a long signal three times the length of a dot. Each letter has a unique pattern — A is dot-dash, B is dash-dot-dot-dot.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is SOS in Morse code?</p>
      <p class="faq-a">SOS is ... --- ... — three dots, three dashes, three dots. It is the international distress signal chosen for its simplicity.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I listen to the Morse code audio?</p>
      <p class="faq-a">Yes. Click Play audio after converting text to hear the Morse code as beeps. Choose Slow, Normal, or Fast speed using the speed selector.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What characters are supported?</p>
      <p class="faq-a">All 26 letters, digits 0-9, and common punctuation including period, comma, question mark, exclamation mark, and apostrophe. Unsupported characters are skipped.</p>
    </div>

  </div>

</div>

<!-- Morse code CSS -->
<style>
.mc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.mc-modes {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
}

.mc-mode-group { display: flex; gap: 8px; }

.mc-mode-btn {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 9px 16px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-family: var(--font);
  transition: border-color var(--transition), background var(--transition);
}

.mc-mode-btn:hover { border-color: var(--accent); }
.mc-mode-btn.active { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .mc-mode-btn.active { background: var(--accent-dim); }

.mc-mode-icon {
  font-family: var(--font-mono);
  font-size: 0.9375rem;
  font-weight: 700;
  color: var(--accent);
  letter-spacing: 0.04em;
}

.mc-mode-name { font-size: 0.875rem; font-weight: 500; color: var(--text); }

.mc-audio-controls { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }

.mc-play-btn { gap: 6px; }
.mc-stop-btn { gap: 6px; }

.mc-speed-wrap { display: flex; align-items: center; gap: 6px; }

.mc-speed-label { font-size: 0.8125rem; color: var(--text-3); white-space: nowrap; }

.mc-speed-select {
  padding: 5px 8px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.8125rem;
  outline: none;
  cursor: pointer;
}

/* Panels */
.mc-panels {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 220px;
  border-bottom: 1px solid var(--border);
}

.mc-panel { display: flex; flex-direction: column; }
.mc-panel:first-child { border-right: 1px solid var(--border); }

.mc-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.mc-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.mc-textarea {
  flex: 1;
  width: 100%;
  min-height: 200px;
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

.mc-mono { font-family: var(--font-mono); font-size: 1.1rem; letter-spacing: 0.08em; line-height: 2; }
.mc-textarea::placeholder { color: var(--text-3); font-family: var(--font); font-size: 0.9375rem; letter-spacing: normal; }
.mc-output-area { color: var(--accent-dark); background: var(--accent-light); cursor: default; }
[data-theme="dark"] .mc-output-area { color: #5DCAA5; background: var(--accent-dim); }

.mc-panel-footer {
  padding: 7px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.75rem;
  color: var(--text-3);
}

.mc-output-info.success { color: var(--accent); font-weight: 500; }
.mc-output-info.error   { color: var(--danger); font-weight: 500; }

/* Audio progress */
.mc-audio-progress {
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--accent-light);
  display: flex;
  align-items: center;
  gap: 12px;
}

[data-theme="dark"] .mc-audio-progress { background: var(--accent-dim); }

.mc-progress-bar {
  flex: 1;
  height: 4px;
  background: var(--bg-3);
  border-radius: 2px;
  overflow: hidden;
}

.mc-progress-fill {
  height: 100%;
  background: var(--accent);
  border-radius: 2px;
  width: 0%;
  transition: width 0.1s linear;
}

.mc-progress-label { font-size: 0.75rem; color: var(--accent); font-weight: 500; white-space: nowrap; }

/* Toolbar */
.mc-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  border-top: 1px solid var(--border);
}

/* Reference chart */
.mc-reference { border-top: 1px solid var(--border); background: var(--bg-2); }

.mc-ref-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
}

.mc-ref-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.mc-ref-toggle {
  font-size: 0.75rem;
  padding: 3px 10px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: transparent;
  color: var(--text-2);
  cursor: pointer;
  font-family: var(--font);
  transition: color var(--transition), border-color var(--transition);
}

.mc-ref-toggle:hover { color: var(--accent); border-color: var(--accent); }

.mc-ref-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
  gap: 1px;
  background: var(--border);
  border-top: 1px solid var(--border);
  max-height: 300px;
  overflow-y: auto;
}

.mc-ref-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 8px 4px;
  background: var(--bg);
  text-align: center;
  gap: 3px;
  cursor: pointer;
  transition: background var(--transition);
}

.mc-ref-item:hover { background: var(--accent-light); }
[data-theme="dark"] .mc-ref-item:hover { background: var(--accent-dim); }

.mc-ref-char {
  font-size: 1rem;
  font-weight: 700;
  color: var(--text);
}

.mc-ref-code {
  font-family: var(--font-mono);
  font-size: 0.7rem;
  color: var(--accent);
  letter-spacing: 0.06em;
}

@media (max-width: 640px) {
  .mc-panels { grid-template-columns: 1fr; }
  .mc-panel:first-child { border-right: none; border-bottom: 1px solid var(--border); }
  .mc-mode-name { display: none; }
  .mc-audio-controls { width: 100%; }
}
</style>

<!-- Morse code JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  /* ── Morse code table ── */
  var MORSE = {
    'A':'.-','B':'-...','C':'-.-.','D':'-..','E':'.','F':'..-.','G':'--.','H':'....','I':'..','J':'.---',
    'K':'-.-','L':'.-..','M':'--','N':'-.','O':'---','P':'.--.','Q':'--.-','R':'.-.','S':'...','T':'-',
    'U':'..-','V':'...-','W':'.--','X':'-..-','Y':'-.--','Z':'--..',
    '0':'-----','1':'.----','2':'..---','3':'...--','4':'....-','5':'.....','6':'-....','7':'--...','8':'---..','9':'----.',
    '.':'.-.-.-',',':'--..--','?':'..--..','!':'-.-.--',"'":'.----.','(':'-.--.',')':'-.--.-',
    '&':'.-...',':':'---...',';':'-.-.-.','=':'-...-','+':'.-.-.', '-':'-....-','_':'..--.-',
    '"':'.-..-.','$':'...-..-','@':'.--.-.','/'  : '-..-.', ' ': '/'
  };

  /* Build reverse lookup */
  var REVERSE = {};
  Object.keys(MORSE).forEach(function(ch) {
    if (ch !== ' ') REVERSE[MORSE[ch]] = ch;
  });

  var input      = document.getElementById('mc-input');
  var output     = document.getElementById('mc-output');
  var inputLabel = document.getElementById('mc-input-label');
  var outputLabel= document.getElementById('mc-output-label');
  var inputInfo  = document.getElementById('mc-input-info');
  var outputInfo = document.getElementById('mc-output-info');
  var playBtn    = document.getElementById('mc-play-btn');
  var stopBtn    = document.getElementById('mc-stop-btn');
  var wpmSelect  = document.getElementById('mc-wpm');
  var swapBtn    = document.getElementById('mc-swap-btn');
  var audioProgress = document.getElementById('mc-audio-progress');
  var progressFill  = document.getElementById('mc-progress-fill');
  var progressLabel = document.getElementById('mc-progress-label');
  var refToggle  = document.getElementById('mc-ref-toggle');
  var refGrid    = document.getElementById('mc-ref-grid');

  var currentMode = 'txt2mc';
  var audioCtx    = null;
  var stopAudio   = false;
  var isPlaying   = false;

  /* ── Text to Morse ── */
  function textToMorse(text) {
    var skipped = 0;
    var result = text.toUpperCase().split('').map(function(ch) {
      if (MORSE[ch] !== undefined) return MORSE[ch];
      skipped++;
      return null;
    }).filter(function(x){ return x !== null; }).join(' ')
      .replace(/ \/ /g, ' / ');
    return { result: result, skipped: skipped };
  }

  /* ── Morse to Text ── */
  function morseToText(morse) {
    var errors = 0;
    var words = morse.trim().split(/\s*\/\s*/);
    var result = words.map(function(word) {
      return word.trim().split(/\s+/).map(function(code) {
        if (!code) return '';
        var ch = REVERSE[code];
        if (ch === undefined) { errors++; return '?'; }
        return ch;
      }).join('');
    }).join(' ');
    return { result: result, errors: errors };
  }

  /* ── Process ── */
  function process() {
    var text = input.value;
    outputInfo.className = 'mc-output-info';

    if (!text.trim()) {
      output.value = '';
      outputInfo.textContent = '';
      playBtn.disabled = true;
      return;
    }

    if (currentMode === 'txt2mc') {
      var res = textToMorse(text);
      output.value = res.result;
      if (res.skipped > 0) {
        outputInfo.textContent = res.skipped + ' unsupported character' + (res.skipped !== 1 ? 's' : '') + ' skipped';
        outputInfo.className = 'mc-output-info error';
      } else {
        var charCount = text.replace(/ /g,'').length;
        outputInfo.textContent = charCount + ' character' + (charCount !== 1 ? 's' : '') + ' translated';
        outputInfo.className = 'mc-output-info success';
      }
      playBtn.disabled = !res.result;
    } else {
      var res = morseToText(text);
      output.value = res.result;
      if (res.errors > 0) {
        outputInfo.textContent = res.errors + ' unrecognized code' + (res.errors !== 1 ? 's' : '') + ' (shown as ?)';
        outputInfo.className = 'mc-output-info error';
      } else {
        outputInfo.textContent = res.result.length + ' character' + (res.result.length !== 1 ? 's' : '') + ' decoded';
        outputInfo.className = 'mc-output-info success';
      }
      playBtn.disabled = true;
    }
  }

  /* ── Audio playback ── */
  function getMorseTiming() {
    var wpm = parseInt(wpmSelect.value) || 13;
    var dotDuration = 1200 / wpm;
    return {
      dot:      dotDuration,
      dash:     dotDuration * 3,
      elemGap:  dotDuration,
      charGap:  dotDuration * 3,
      wordGap:  dotDuration * 7,
    };
  }

  async function playMorse() {
    var morseStr = output.value;
    if (!morseStr.trim() || isPlaying) return;

    if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();

    stopAudio = false;
    isPlaying = true;
    playBtn.classList.add('hidden');
    stopBtn.classList.remove('hidden');
    audioProgress.classList.remove('hidden');

    var timing = getMorseTiming();
    var freq   = 600;
    var tokens = morseStr.split('');
    var total  = tokens.length;
    var done   = 0;

    var t = audioCtx.currentTime + 0.05;

    function scheduleBeep(duration) {
      var osc  = audioCtx.createOscillator();
      var gain = audioCtx.createGain();
      osc.connect(gain);
      gain.connect(audioCtx.destination);
      osc.frequency.value = freq;
      osc.type = 'sine';
      gain.gain.setValueAtTime(0, t);
      gain.gain.linearRampToValueAtTime(0.5, t + 0.005);
      gain.gain.setValueAtTime(0.5, t + duration / 1000 - 0.005);
      gain.gain.linearRampToValueAtTime(0, t + duration / 1000);
      osc.start(t);
      osc.stop(t + duration / 1000);
      t += duration / 1000;
    }

    for (var i = 0; i < tokens.length; i++) {
      if (stopAudio) break;
      var ch = tokens[i];
      if (ch === '.') {
        scheduleBeep(timing.dot);
        t += timing.elemGap / 1000;
      } else if (ch === '-') {
        scheduleBeep(timing.dash);
        t += timing.elemGap / 1000;
      } else if (ch === ' ') {
        /* Check if next non-space is / (word gap) or letter (char gap) */
        if (tokens[i + 1] === '/') {
          t += timing.wordGap / 1000;
          i++;
          if (tokens[i + 1] === ' ') i++;
        } else {
          t += (timing.charGap - timing.elemGap) / 1000;
        }
      }
      done++;
      progressFill.style.width = ((done / total) * 100) + '%';
      progressLabel.textContent = Math.round((done / total) * 100) + '%';
    }

    /* Wait for audio to finish */
    var remaining = (t - audioCtx.currentTime) * 1000;
    await new Promise(function(resolve){ setTimeout(resolve, Math.max(0, remaining) + 200); });

    isPlaying = false;
    stopAudio = false;
    playBtn.classList.remove('hidden');
    stopBtn.classList.add('hidden');
    audioProgress.classList.add('hidden');
    progressFill.style.width = '0%';
  }

  /* ── Mode switching ── */
  function setMode(mode) {
    currentMode = mode;
    document.querySelectorAll('.mc-mode-btn').forEach(function(btn) {
      var active = btn.dataset.mode === mode;
      btn.classList.toggle('active', active);
      btn.setAttribute('aria-pressed', active ? 'true' : 'false');
    });

    if (mode === 'txt2mc') {
      inputLabel.textContent  = 'Text input';
      outputLabel.textContent = 'Morse code output';
      input.placeholder       = 'Type your text here…';
      output.placeholder      = 'Morse code will appear here…';
      inputInfo.textContent   = 'Letters, numbers and punctuation supported';
      output.classList.add('mc-mono');
    } else {
      inputLabel.textContent  = 'Morse code input';
      outputLabel.textContent = 'Text output';
      input.placeholder       = '.... . .-.. .-.. --- / .-- --- .-. .-.. -..';
      output.placeholder      = 'Decoded text will appear here…';
      inputInfo.textContent   = 'Separate letters with spaces, words with /';
      output.classList.remove('mc-mono');
    }

    input.value  = '';
    output.value = '';
    outputInfo.textContent = '';
    playBtn.disabled = true;
  }

  /* ── Reference chart ── */
  function buildRefGrid() {
    var items = Object.keys(MORSE).filter(function(k){ return k !== ' '; });
    refGrid.innerHTML = items.map(function(ch) {
      return '<div class="mc-ref-item" title="Click to translate ' + ch + '" data-ch="' + ch + '">' +
        '<span class="mc-ref-char">' + ch + '</span>' +
        '<span class="mc-ref-code">' + MORSE[ch] + '</span>' +
        '</div>';
    }).join('');

    refGrid.querySelectorAll('.mc-ref-item').forEach(function(item) {
      item.addEventListener('click', function() {
        setMode('txt2mc');
        input.value += item.dataset.ch;
        process();
        input.focus();
      });
    });
  }

  /* ── Events ── */
  document.querySelectorAll('.mc-mode-btn').forEach(function(btn) {
    btn.addEventListener('click', function() { setMode(btn.dataset.mode); });
  });

  input.addEventListener('input', process);

  playBtn.addEventListener('click', playMorse);

  stopBtn.addEventListener('click', function() {
    stopAudio = true;
    isPlaying = false;
    if (audioCtx) audioCtx.close().then(function(){ audioCtx = null; });
    playBtn.classList.remove('hidden');
    stopBtn.classList.add('hidden');
    audioProgress.classList.add('hidden');
    progressFill.style.width = '0%';
  });

  swapBtn.addEventListener('click', function() {
    if (!output.value.trim()) return;
    var outVal  = output.value;
    var newMode = currentMode === 'txt2mc' ? 'mc2txt' : 'txt2mc';
    setMode(newMode);
    input.value = outVal;
    process();
  });

  refToggle.addEventListener('click', function() {
    var hidden = refGrid.classList.toggle('hidden');
    refToggle.textContent = hidden ? 'Show' : 'Hide';
    if (!hidden && !refGrid.innerHTML) buildRefGrid();
  });

  /* ── Init ── */
  setMode('txt2mc');

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
