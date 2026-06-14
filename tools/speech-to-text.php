<?php
$tool_slug   = 'speech-to-text';
$tool_name   = 'Speech to Text';

$page_title  = 'Speech to Text — Convert Voice to Text Online Free | TextlyPop';
$meta_desc   = 'Convert speech to text using your microphone. Free browser-based voice transcription. No signup, no uploads, no data sent to servers. Works in Chrome and Edge.';
$canonical_url = 'https://textlypop.com/tools/speech-to-text';
$og_title    = 'Free Speech to Text — Voice Transcription Online | TextlyPop';
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
  "name": "Speech to Text",
  "url": "https://textlypop.com/tools/speech-to-text",
  "description": "Convert speech to text using your microphone. Free browser-based voice transcription. No data sent to servers.",
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
      "name": "How does the speech to text tool work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "TextlyPop uses the Web Speech Recognition API built into Chrome and Edge browsers. When you click Start and grant microphone permission, the browser listens to your speech and converts it to text in real time. No audio is recorded or sent to TextlyPop servers."
      }
    },
    {
      "@type": "Question",
      "name": "Which browsers support speech to text?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The Web Speech Recognition API is supported in Google Chrome and Microsoft Edge. It is not currently supported in Firefox or Safari. For best results use the latest version of Chrome or Edge."
      }
    },
    {
      "@type": "Question",
      "name": "Is my speech recorded or stored?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "TextlyPop does not record or store your speech. The speech recognition is handled by your browser using Google's speech recognition service for Chrome. Audio is sent to Google's servers for processing and is subject to Google's privacy policy. No data is sent to TextlyPop."
      }
    },
    {
      "@type": "Question",
      "name": "What languages are supported for speech recognition?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The speech to text tool supports dozens of languages including English, Spanish, French, German, Italian, Portuguese, Chinese, Japanese, Korean, Arabic, Hindi, and many more. Select your language from the dropdown before starting."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use speech to text for continuous transcription?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Enable continuous mode to keep the microphone active and transcribe everything you say without clicking Start for each phrase. The transcription builds up in the text box as you speak."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Speech to Text Online',
  'description' => 'Transcribe speech to text using your microphone with TextlyPop speech to text tool.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Select your language','text'=>'Choose your speaking language from the dropdown menu. English US is selected by default.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Click Start recording','text'=>'Click the Start button and allow microphone access when prompted by your browser.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Speak clearly','text'=>'Speak clearly into your microphone. The transcribed text appears in the output box in real time as you speak.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Copy or edit the result','text'=>'Click Stop when finished. Copy the transcribed text or continue editing it directly in the output box.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Speech to Text','item'=>'https://textlypop.com/tools/speech-to-text'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Speech to text</h1>
    <p>Convert your voice to text instantly. Speak into your microphone and watch the words appear.</p>
  </div>

  <!-- Unsupported browser message -->
  <div class="stt-unsupported hidden" id="stt-unsupported" role="alert">
    <div class="stt-unsupported-icon" aria-hidden="true">⚠</div>
    <div>
      <strong>Browser not supported</strong>
      <p>The Web Speech Recognition API requires Google Chrome or Microsoft Edge. Please open this page in Chrome or Edge to use speech to text.</p>
    </div>
  </div>

  <div class="stt-tool" id="stt-tool">

    <!-- Controls bar -->
    <div class="stt-controls">

      <div class="stt-control-group">
        <label class="stt-control-label" for="stt-lang">Language</label>
        <select id="stt-lang" class="stt-select" aria-label="Recognition language">
          <option value="en-US">English (US)</option>
          <option value="en-GB">English (UK)</option>
          <option value="en-AU">English (Australia)</option>
          <option value="es-ES">Spanish (Spain)</option>
          <option value="es-US">Spanish (US)</option>
          <option value="fr-FR">French</option>
          <option value="de-DE">German</option>
          <option value="it-IT">Italian</option>
          <option value="pt-BR">Portuguese (Brazil)</option>
          <option value="pt-PT">Portuguese (Portugal)</option>
          <option value="zh-CN">Chinese (Simplified)</option>
          <option value="zh-TW">Chinese (Traditional)</option>
          <option value="ja-JP">Japanese</option>
          <option value="ko-KR">Korean</option>
          <option value="ar-SA">Arabic</option>
          <option value="hi-IN">Hindi</option>
          <option value="ru-RU">Russian</option>
          <option value="nl-NL">Dutch</option>
          <option value="pl-PL">Polish</option>
          <option value="sv-SE">Swedish</option>
          <option value="tr-TR">Turkish</option>
        </select>
      </div>

      <div class="stt-option-group">
        <label class="stt-option">
          <input type="checkbox" id="stt-continuous" checked>
          <span class="stt-option-text">
            <strong>Continuous mode</strong>
            <em>Keep listening after each phrase</em>
          </span>
        </label>
        <label class="stt-option">
          <input type="checkbox" id="stt-interim" checked>
          <span class="stt-option-text">
            <strong>Show interim results</strong>
            <em>Display text while still speaking</em>
          </span>
        </label>
      </div>

    </div>

    <!-- Mic button + status -->
    <div class="stt-mic-wrap">
      <button class="stt-mic-btn" id="stt-mic-btn" aria-label="Start recording">
        <svg class="stt-mic-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
          <rect x="9" y="2" width="6" height="11" rx="3"/>
          <path d="M5 10a7 7 0 0 0 14 0"/>
          <line x1="12" y1="19" x2="12" y2="22"/>
          <line x1="8" y1="22" x2="16" y2="22"/>
        </svg>
        <div class="stt-mic-ring" id="stt-mic-ring" aria-hidden="true"></div>
      </button>

      <div class="stt-status-wrap">
        <div class="stt-status-dot" id="stt-status-dot" aria-hidden="true"></div>
        <span class="stt-status-text" id="stt-status-text">Click the microphone to start</span>
      </div>

      <div class="stt-confidence" id="stt-confidence"></div>
    </div>

    <!-- Output textarea -->
    <div class="stt-output-wrap">
      <div class="stt-output-header">
        <span class="stt-output-label">Transcription</span>
        <div class="stt-output-actions">
          <span class="stt-word-count" id="stt-word-count">0 words</span>
          <button class="btn btn-ghost" id="stt-clear-btn">Clear</button>
          <button class="btn btn-copy" data-target="stt-output">Copy</button>
        </div>
      </div>
      <textarea
        id="stt-output"
        class="stt-output"
        placeholder="Transcribed text will appear here as you speak…"
        aria-label="Transcribed text"
        aria-live="polite"
        spellcheck="true"></textarea>
      <div class="stt-interim" id="stt-interim" aria-live="polite"></div>
    </div>

  </div>

  <!-- Privacy note -->
  <div class="stt-privacy-note mt-16">
    <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
      <circle cx="8" cy="8" r="6"/>
      <line x1="8" y1="5" x2="8" y2="8"/>
      <circle cx="8" cy="11" r="0.5" fill="currentColor"/>
    </svg>
    <span>Audio is processed by your browser's speech engine (Google for Chrome). TextlyPop does not receive or store any audio or transcription data.</span>
  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="stt-output" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="stt-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="stt-output" data-to-tool="reading-level-checker">Reading level</button>
    <button class="send-to-btn" data-from="stt-output" data-to-tool="text-to-speech">Text to speech</button>
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

    <h2>How speech to text works in your browser</h2>
    <p>TextlyPop uses the Web Speech Recognition API that is built into Chrome and Edge browsers. When you click the microphone button and grant permission, your browser begins listening through your microphone. As you speak, the browser sends the audio to Google's speech recognition servers, which return the transcribed text. The text appears in the output box in real time. TextlyPop itself never receives your audio — it only reads the transcribed text that the browser returns.</p>

    <h2>Continuous mode vs single phrase</h2>
    <p>In continuous mode the microphone stays active after each phrase you complete. You can speak naturally in full sentences and paragraphs, pausing between thoughts, and the recognition keeps running. This is the best mode for dictation, note-taking, and transcribing longer content. With continuous mode off the recognition stops after you complete a single phrase or after a brief silence. This mode is useful when you only need to transcribe one sentence at a time.</p>

    <h2>Tips for accurate transcription</h2>
    <p>Speak clearly and at a natural pace — rushing reduces accuracy. Use a quiet environment with minimal background noise. Position your microphone close to your mouth. Speak in complete sentences rather than individual words — context helps the recognition engine make better predictions. Say punctuation marks out loud — "period", "comma", "question mark" — when you need them. In continuous mode, pause briefly between sentences to give the engine time to finalize each phrase before moving on.</p>

    <h2>Common uses for speech to text</h2>
    <p>Dictation for writers and bloggers who think faster than they type. Meeting and interview transcription directly into the browser. Note-taking during lectures or calls. Accessibility for users with motor impairments who find typing difficult. Language practice where hearing your own transcribed speech helps identify pronunciation issues. Draft writing where you want to capture ideas quickly without worrying about typing speed.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the speech to text tool work?</p>
      <p class="faq-a">TextlyPop uses the Web Speech Recognition API built into Chrome and Edge. Your browser listens to your speech and converts it to text in real time. No audio is recorded or sent to TextlyPop servers.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Which browsers support speech to text?</p>
      <p class="faq-a">Google Chrome and Microsoft Edge. Firefox and Safari do not currently support the Web Speech Recognition API.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my speech recorded or stored?</p>
      <p class="faq-a">TextlyPop does not record or store your speech. Audio is processed by Google's speech recognition service via Chrome. No data is sent to TextlyPop.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What languages are supported?</p>
      <p class="faq-a">Dozens of languages including English, Spanish, French, German, Italian, Portuguese, Chinese, Japanese, Korean, Arabic, Hindi, Russian and more. Select your language before starting.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use speech to text for continuous transcription?</p>
      <p class="faq-a">Yes. Enable continuous mode to keep the microphone active and transcribe everything you say without clicking Start for each phrase.</p>
    </div>

  </div>

</div>

<!-- Speech to text CSS -->
<style>
.stt-unsupported {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  background: var(--warning-light);
  border: 1px solid var(--warning);
  border-radius: var(--radius-md);
  padding: 16px;
  margin-bottom: 16px;
  color: var(--text);
}

.stt-unsupported-icon { font-size: 1.5rem; flex-shrink: 0; }
.stt-unsupported strong { display: block; margin-bottom: 4px; }
.stt-unsupported p { margin: 0; color: var(--text-2); font-size: 0.9rem; }

.stt-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Controls */
.stt-controls {
  display: flex;
  gap: 16px;
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
  align-items: flex-start;
}

.stt-control-group { display: flex; flex-direction: column; gap: 5px; }

.stt-control-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.stt-select {
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.875rem;
  outline: none;
  cursor: pointer;
  min-width: 200px;
}

.stt-option-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
  flex: 1;
}

.stt-option {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  transition: border-color var(--transition), background var(--transition);
}

.stt-option:hover { border-color: var(--accent); }
.stt-option:has(input:checked) { border-color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .stt-option:has(input:checked) { background: var(--accent-dim); }

.stt-option input[type="checkbox"] {
  margin-top: 2px;
  accent-color: var(--accent);
  flex-shrink: 0;
  cursor: pointer;
  width: 14px;
  height: 14px;
}

.stt-option-text { display: flex; flex-direction: column; gap: 1px; }
.stt-option-text strong { font-size: 0.8125rem; font-weight: 600; color: var(--text); }
.stt-option-text em { font-style: normal; font-size: 0.7rem; color: var(--text-3); }

/* Mic button */
.stt-mic-wrap {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 32px 16px;
  gap: 16px;
  border-bottom: 1px solid var(--border);
  background: var(--bg);
}

.stt-mic-btn {
  position: relative;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 2px solid var(--border-2);
  background: var(--bg-2);
  color: var(--text-2);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: border-color var(--transition), background var(--transition), color var(--transition), transform 0.1s ease;
}

.stt-mic-btn:hover { border-color: var(--accent); color: var(--accent); transform: scale(1.05); }

.stt-mic-btn.recording {
  border-color: #e53e3e;
  background: rgba(229,62,62,0.08);
  color: #e53e3e;
  animation: micPulse 1.5s ease-in-out infinite;
}

@keyframes micPulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.06); }
}

.stt-mic-ring {
  position: absolute;
  inset: -8px;
  border-radius: 50%;
  border: 2px solid transparent;
  transition: border-color var(--transition);
  pointer-events: none;
}

.stt-mic-btn.recording .stt-mic-ring {
  border-color: rgba(229,62,62,0.3);
  animation: ringPulse 1.5s ease-in-out infinite;
}

@keyframes ringPulse {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.15); opacity: 0.4; }
}

.stt-status-wrap {
  display: flex;
  align-items: center;
  gap: 8px;
}

.stt-status-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--text-3);
  transition: background var(--transition);
  flex-shrink: 0;
}

.stt-status-dot.listening { background: #e53e3e; animation: dotBlink 1s ease-in-out infinite; }
.stt-status-dot.success   { background: var(--accent); }

@keyframes dotBlink {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.3; }
}

.stt-status-text {
  font-size: 0.9375rem;
  color: var(--text-2);
}

.stt-confidence {
  font-size: 0.75rem;
  color: var(--text-3);
  min-height: 1em;
}

/* Output */
.stt-output-wrap {
  display: flex;
  flex-direction: column;
}

.stt-output-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
  gap: 8px;
}

.stt-output-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.stt-output-actions { display: flex; align-items: center; gap: 8px; }
.stt-word-count { font-size: 0.75rem; color: var(--text-3); }

.stt-output {
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

.stt-interim {
  padding: 0 14px 12px;
  font-size: 0.9375rem;
  color: var(--text-3);
  font-style: italic;
  min-height: 24px;
  line-height: 1.6;
}

/* Privacy note */
.stt-privacy-note {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  font-size: 0.8125rem;
  color: var(--text-3);
  line-height: 1.5;
}

.stt-privacy-note svg { flex-shrink: 0; margin-top: 1px; }

@media (max-width: 640px) {
  .stt-controls { flex-direction: column; }
  .stt-select { min-width: 100%; }
}
</style>

<!-- Speech to text JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

  if (!SpeechRecognition) {
    document.getElementById('stt-unsupported').classList.remove('hidden');
    document.getElementById('stt-tool').classList.add('hidden');
    return;
  }

  var micBtn     = document.getElementById('stt-mic-btn');
  var statusDot  = document.getElementById('stt-status-dot');
  var statusText = document.getElementById('stt-status-text');
  var confidence = document.getElementById('stt-confidence');
  var output     = document.getElementById('stt-output');
  var interim    = document.getElementById('stt-interim');
  var wordCount  = document.getElementById('stt-word-count');
  var clearBtn   = document.getElementById('stt-clear-btn');
  var langSel    = document.getElementById('stt-lang');
  var optContinuous = document.getElementById('stt-continuous');
  var optInterim    = document.getElementById('stt-interim-cb') || document.getElementById('stt-interim');

  var recognition = null;
  var isListening = false;
  var finalText   = '';

  function updateWordCount() {
    var text  = output.value.trim();
    var words = text ? text.split(/\s+/).filter(Boolean).length : 0;
    wordCount.textContent = words.toLocaleString() + ' word' + (words !== 1 ? 's' : '');
  }

  function startListening() {
    recognition = new SpeechRecognition();
    recognition.lang       = langSel.value;
    recognition.continuous = optContinuous.checked;
    recognition.interimResults = document.getElementById('stt-interim-check') ?
      document.getElementById('stt-interim-check').checked : true;

    finalText = output.value;

    recognition.onstart = function() {
      isListening = true;
      micBtn.classList.add('recording');
      statusDot.className = 'stt-status-dot listening';
      statusText.textContent = 'Listening…';
    };

    recognition.onresult = function(e) {
      var interimStr = '';
      var finalStr   = '';

      for (var i = e.resultIndex; i < e.results.length; i++) {
        var transcript = e.results[i][0].transcript;
        if (e.results[i].isFinal) {
          finalStr += transcript + ' ';
          var conf = Math.round(e.results[i][0].confidence * 100);
          if (conf > 0) confidence.textContent = 'Confidence: ' + conf + '%';
        } else {
          interimStr += transcript;
        }
      }

      if (finalStr) {
        finalText += finalStr;
        output.value = finalText;
        updateWordCount();
      }

      interim.textContent = interimStr;
      statusDot.className = 'stt-status-dot success';
    };

    recognition.onend = function() {
      interim.textContent = '';
      if (isListening && optContinuous.checked) {
        /* Restart automatically in continuous mode */
        try { recognition.start(); } catch(e) {}
      } else {
        stopListening();
      }
    };

    recognition.onerror = function(e) {
      var msg = {
        'no-speech':         'No speech detected. Try speaking louder.',
        'audio-capture':     'Microphone not found. Check your microphone.',
        'not-allowed':       'Microphone access denied. Allow microphone permission.',
        'network':           'Network error. Check your internet connection.',
        'aborted':           '',
      };
      if (e.error !== 'aborted') {
        statusText.textContent = msg[e.error] || 'Error: ' + e.error;
      }
      stopListening();
    };

    try {
      recognition.start();
    } catch(e) {
      statusText.textContent = 'Could not start recognition. Try refreshing.';
    }
  }

  function stopListening() {
    isListening = false;
    if (recognition) {
      try { recognition.stop(); } catch(e) {}
    }
    micBtn.classList.remove('recording');
    statusDot.className = 'stt-status-dot';
    statusText.textContent = 'Click the microphone to start';
    interim.textContent = '';
  }

  micBtn.addEventListener('click', function() {
    if (isListening) {
      stopListening();
    } else {
      startListening();
    }
  });

  clearBtn.addEventListener('click', function() {
    output.value = '';
    finalText = '';
    interim.textContent = '';
    confidence.textContent = '';
    updateWordCount();
  });

  output.addEventListener('input', function() {
    finalText = output.value;
    updateWordCount();
  });

  /* Stop on page unload */
  window.addEventListener('beforeunload', stopListening);

  updateWordCount();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
