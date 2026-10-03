<?php
$tool_slug   = 'text-to-speech';
$tool_name   = 'Text to Speech';

$page_title  = 'Text to Speech — Convert Text to Audio | TextlyPop';
$meta_desc   = 'Convert text to speech instantly in your browser. Choose voice, speed and pitch. Free online text to speech tool. No signup, no downloads required.';
$canonical_url = 'https://textlypop.com/tools/text-to-speech';
$og_title    = 'Free Online Text to Speech — TextlyPop';
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
  "name": "Text to Speech",
  "url": "https://textlypop.com/tools/text-to-speech",
  "description": "Convert text to speech instantly in your browser. Choose voice, speed and pitch. No downloads required.",
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
      "name": "How does the text to speech tool work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It uses the Web Speech Synthesis API built into every modern browser. When you press Play, the browser hands the text to the operating system's speech engine, which generates audio on your device in real time — no server round trip, no downloads. Your text stays private and playback starts instantly."
      }
    },
    {
      "@type": "Question",
      "name": "Can I download the speech as an MP3 file?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Not directly — the browser's speech API plays audio through your speakers but provides no file output. If you need an audio file, record system audio while the tool plays; Windows and macOS both support this through screen recording tools."
      }
    },
    {
      "@type": "Question",
      "name": "Can I adjust the reading speed?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — the speed slider runs from 0.5x to 2x, plus a pitch control. Slower rates suit dense technical material and language learning; faster rates work well for proofreading familiar text, where you are listening for flow rather than meaning."
      }
    },
    {
      "@type": "Question",
      "name": "Does this tool work offline?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — once the page has loaded, synthesis happens on your device. One nuance: some operating systems include online voices that stream from vendor servers. If a voice goes silent when you disconnect, switch to a standard system voice and playback works fully offline."
      }
    },
    {
      "@type": "Question",
      "name": "Can I read text aloud in languages other than English?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The voice selector lists every voice installed on your device, and most systems ship with voices for Spanish, French, German, Italian, Portuguese, Chinese, Japanese, Korean and many more. Pick a voice that matches the language of your text — using an English voice on foreign-language text produces mispronounced results."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Convert Text to Speech Online',
  'description' => 'Convert any text to spoken audio using TextlyPop text to speech tool.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Type or paste your text','text'=>'Enter the text you want to hear in the input box.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Choose a voice','text'=>'Select a voice from the dropdown. Available voices depend on your operating system and browser.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Adjust speed and pitch','text'=>'Use the speed slider to control reading rate and the pitch slider to adjust voice tone.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Click Play','text'=>'Click the Play button to hear your text read aloud. Use Pause and Stop to control playback.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Text to Speech','item'=>'https://textlypop.com/tools/text-to-speech'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Text to speech</h1>
    <p>Convert any text to spoken audio instantly. Uses your browser's built-in voices. No downloads needed.</p>
  </div>

  <!-- Browser support check -->
  <div class="tts-unsupported hidden" id="tts-unsupported" role="alert">
    <p>Your browser does not support the Web Speech API. Please try Chrome, Edge, or Safari to use this tool.</p>
  </div>

  <div class="tts-tool" id="tts-tool">

    <!-- Text input -->
    <div class="tts-input-wrap">
      <textarea
        id="tts-input"
        class="tts-textarea"
        placeholder="Type or paste the text you want to hear…"
        aria-label="Text to convert to speech"
        data-save-key="text-to-speech"
        spellcheck="true"></textarea>
      <div class="tts-input-footer">
        <span id="tts-word-count">0 words</span>
        <span id="tts-est-time" class="tts-est-time"></span>
        <button class="btn btn-clear" data-targets="tts-input">Clear</button>
      </div>
    </div>

    <!-- Controls -->
    <div class="tts-controls">

      <!-- Voice selector -->
      <div class="tts-control-group">
        <label class="tts-control-label" for="tts-voice">Voice</label>
        <select id="tts-voice" class="tts-select" aria-label="Select voice">
          <option value="">Loading voices…</option>
        </select>
      </div>

      <!-- Speed -->
      <div class="tts-control-group">
        <label class="tts-control-label" for="tts-rate">
          Speed <span id="tts-rate-val" class="tts-slider-val">1.0×</span>
        </label>
        <input type="range" id="tts-rate" class="tts-slider" min="0.5" max="2" step="0.1" value="1" aria-label="Reading speed">
      </div>

      <!-- Pitch -->
      <div class="tts-control-group">
        <label class="tts-control-label" for="tts-pitch">
          Pitch <span id="tts-pitch-val" class="tts-slider-val">1.0</span>
        </label>
        <input type="range" id="tts-pitch" class="tts-slider" min="0.5" max="2" step="0.1" value="1" aria-label="Voice pitch">
      </div>

    </div>

    <!-- Playback bar -->
    <div class="tts-playback">

      <div class="tts-play-controls">
        <button class="tts-btn-play" id="tts-play-btn" aria-label="Play text to speech" disabled>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M5 3 L19 12 L5 21 Z"/>
          </svg>
        </button>
        <button class="tts-btn-action hidden" id="tts-pause-btn" aria-label="Pause">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <rect x="6" y="4" width="4" height="16" rx="1"/>
            <rect x="14" y="4" width="4" height="16" rx="1"/>
          </svg>
        </button>
        <button class="tts-btn-action hidden" id="tts-resume-btn" aria-label="Resume">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M5 3 L19 12 L5 21 Z"/>
          </svg>
        </button>
        <button class="tts-btn-action hidden" id="tts-stop-btn" aria-label="Stop">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <rect x="4" y="4" width="16" height="16" rx="2"/>
          </svg>
        </button>
      </div>

      <div class="tts-progress-wrap">
        <div class="tts-progress-bar">
          <div class="tts-progress-fill" id="tts-progress-fill"></div>
        </div>
        <span class="tts-status" id="tts-status">Ready</span>
      </div>

    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="tts-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="tts-input" data-to-tool="reading-level-checker">Reading level</button>
    <button class="send-to-btn" data-from="tts-input" data-to-tool="find-and-replace">Find and replace</button>
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

    <h2>The history of speech synthesis</h2>
    <p>Machines have been learning to talk for nearly a century. Bell Labs demonstrated the Voder, the first electronic speech synthesizer, at the 1939 World's Fair — it required a trained human operator playing it like an organ. In 1961 an IBM 704 became the first computer to sing, performing "Daisy Bell" in a demo that inspired HAL 9000's dying song in <em>2001: A Space Odyssey</em>. Texas Instruments put synthesis in toy stores with the Speak &amp; Spell in 1978, and Stephen Hawking made a synthesized voice world-famous. The Web Speech API, introduced in 2012, built this capability directly into browsers — which is exactly what powers the tool above, using the neural voices modern operating systems now include.</p>

    <h2>Available voices and languages</h2>
    <p>The voices available to you depend on your operating system and browser. Windows provides voices through Microsoft's speech system. macOS and iOS provide voices through Apple's speech synthesis engine including high-quality neural voices on newer systems. Chrome on Windows typically offers the most voices including online Microsoft neural voices when connected to the internet. All voices installed on your system appear in the voice dropdown, grouped by language.</p>

    <h2>Common uses for text to speech</h2>
    <p>Writers use text to speech to proofread their work by ear — the ear catches awkward phrasing and repeated words that the eye misses when reading silently. Students with dyslexia or reading difficulties use it to access written content more easily. Language learners use it to hear correct pronunciation. Content creators use it to check how their scripts sound when read aloud. Accessibility professionals use it to test how web content reads for screen reader users. Developers use it to test voice interfaces and speech-driven applications.</p>

    <h2>Tips for best results</h2>
    <p>For the most natural-sounding speech, use proper punctuation — commas and periods cause the voice to pause naturally at the right moments. Avoid excessive abbreviations which may be read letter by letter. If a word is consistently mispronounced, try spelling it phonetically in the text. Slower reading speeds work better for complex technical content. Faster speeds work well for proofreading familiar text where you just want to hear the flow.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the text to speech tool work?</p>
      <p class="faq-a">It uses the Web Speech Synthesis API built into every modern browser. When you press Play, your browser hands the text to the operating system's speech engine, which generates the audio on your device in real time — no server round trip, no audio file downloads, no account. Because the synthesis is local, your text stays completely private and playback starts instantly even for long passages, since nothing has to be generated remotely and streamed back.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I download the speech as an MP3 file?</p>
      <p class="faq-a">Not directly — the browser's speech API plays audio through your speakers but deliberately provides no file output, so there is no download button any browser-based tool of this kind can honestly offer. If you need an audio file, the practical workaround is to record system audio while the tool plays: Windows and macOS both support this through screen recording or tools like OBS. For occasional voiceover needs, that captures the same voices you hear in the preview.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I adjust the reading speed?</p>
      <p class="faq-a">Yes — the speed slider runs from 0.5x to 2x, with 1x as natural pace, and a pitch control adjusts the voice's tone up or down. Speed is worth experimenting with per task: slower rates suit dense technical material and language learning, where you want time to absorb each word, while faster rates work well for proofreading familiar text, where you are listening for flow and repeated words rather than meaning. Changes apply immediately, even mid-playback on most systems.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does this tool work offline?</p>
      <p class="faq-a">Yes — once the page has loaded, synthesis happens on your device and needs no connection. One nuance: operating systems ship a mix of local voices and higher-quality "online" voices that stream from the vendor's servers (some Microsoft neural voices in Edge, for example). If a particular voice goes silent when you disconnect, switch to one of the standard system voices in the dropdown and playback works fully offline.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I read text aloud in languages other than English?</p>
      <p class="faq-a">Yes. The voice selector lists every voice installed on your device, and most systems ship with voices for Spanish, French, German, Italian, Portuguese, Chinese, Japanese, Korean and many more. Pick a voice that matches the language of your text — using an English voice on foreign-language text produces mispronounced results. Installing additional system voices makes them appear here automatically.</p>
    </div>

  </div>

</div>

<!-- Text to speech CSS -->
<style>
.tts-unsupported {
  background: var(--warning-light);
  border: 1px solid var(--warning);
  border-radius: var(--radius-md);
  padding: 14px 16px;
  margin-bottom: 16px;
  color: var(--warning);
  font-size: 0.9375rem;
}

.tts-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Textarea */
.tts-textarea {
  width: 100%;
  min-height: 220px;
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

.tts-textarea::placeholder { color: var(--text-3); }

.tts-input-footer {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.8125rem;
  color: var(--text-3);
}

.tts-est-time { color: var(--accent); font-weight: 500; }
.tts-input-footer .btn { margin-left: auto; }

/* Controls */
.tts-controls {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 16px;
  padding: 16px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
}

.tts-control-group { display: flex; flex-direction: column; gap: 6px; }

.tts-control-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.tts-slider-val {
  font-weight: 700;
  color: var(--accent);
  text-transform: none;
  letter-spacing: 0;
}

.tts-select {
  width: 100%;
  padding: 8px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.875rem;
  outline: none;
  cursor: pointer;
  transition: border-color var(--transition);
}

.tts-select:focus { border-color: var(--accent); }

.tts-slider {
  width: 100%;
  accent-color: var(--accent);
  cursor: pointer;
  height: 4px;
  margin-top: 4px;
}

/* Playback bar */
.tts-playback {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 14px 16px;
  background: var(--bg);
}

.tts-play-controls { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }

.tts-btn-play {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  border: none;
  background: var(--accent);
  color: white;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background var(--transition), transform 0.1s ease;
  flex-shrink: 0;
}

.tts-btn-play:hover:not(:disabled) { background: var(--accent-hover); transform: scale(1.05); }
.tts-btn-play:disabled { background: var(--bg-3); color: var(--text-3); cursor: not-allowed; transform: none; }

.tts-btn-action {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  border: 1px solid var(--border-2);
  background: var(--bg-2);
  color: var(--text-2);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: border-color var(--transition), color var(--transition);
}

.tts-btn-action:hover { border-color: var(--accent); color: var(--accent); }

.tts-progress-wrap { flex: 1; display: flex; flex-direction: column; gap: 6px; }

.tts-progress-bar {
  height: 6px;
  background: var(--bg-3);
  border-radius: 3px;
  overflow: hidden;
}

.tts-progress-fill {
  height: 100%;
  background: var(--accent);
  border-radius: 3px;
  width: 0%;
  transition: width 0.2s linear;
}

.tts-status {
  font-size: 0.8125rem;
  color: var(--text-3);
}

.tts-status.speaking { color: var(--accent); font-weight: 500; }
.tts-status.paused   { color: var(--warning); font-weight: 500; }

@media (max-width: 640px) {
  .tts-controls { grid-template-columns: 1fr; }
  .tts-btn-play { width: 44px; height: 44px; }
}
</style>

<!-- Text to speech JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  /* Check support */
  if (!('speechSynthesis' in window)) {
    document.getElementById('tts-unsupported').classList.remove('hidden');
    document.getElementById('tts-tool').classList.add('hidden');
    return;
  }

  var synth     = window.speechSynthesis;
  var input     = document.getElementById('tts-input');
  var voiceSel  = document.getElementById('tts-voice');
  var rateSlider= document.getElementById('tts-rate');
  var pitchSlider=document.getElementById('tts-pitch');
  var rateVal   = document.getElementById('tts-rate-val');
  var pitchVal  = document.getElementById('tts-pitch-val');
  var playBtn   = document.getElementById('tts-play-btn');
  var pauseBtn  = document.getElementById('tts-pause-btn');
  var resumeBtn = document.getElementById('tts-resume-btn');
  var stopBtn   = document.getElementById('tts-stop-btn');
  var progress  = document.getElementById('tts-progress-fill');
  var statusEl  = document.getElementById('tts-status');
  var wordCount = document.getElementById('tts-word-count');
  var estTime   = document.getElementById('tts-est-time');

  var voices    = [];
  var utterance = null;
  var charIndex = 0;
  var totalChars= 0;

  /* ── Load voices ── */
  function loadVoices() {
    voices = synth.getVoices();
    if (!voices.length) return;

    voiceSel.innerHTML = '';

    /* Group by language */
    var groups = {};
    voices.forEach(function(v, i) {
      var lang = v.lang.split('-')[0];
      if (!groups[lang]) groups[lang] = [];
      groups[lang].push({ voice: v, index: i });
    });

    /* English first */
    var langOrder = Object.keys(groups).sort(function(a, b) {
      if (a === 'en') return -1;
      if (b === 'en') return 1;
      return a.localeCompare(b);
    });

    langOrder.forEach(function(lang) {
      var group = document.createElement('optgroup');
      group.label = lang.toUpperCase();
      groups[lang].forEach(function(item) {
        var opt = document.createElement('option');
        opt.value = item.index;
        opt.textContent = item.voice.name + (item.voice.default ? ' (default)' : '');
        group.appendChild(opt);
      });
      voiceSel.appendChild(group);
    });

    /* Select first English voice */
    var firstEn = voices.findIndex(function(v){ return v.lang.startsWith('en'); });
    if (firstEn >= 0) voiceSel.value = firstEn;
  }

  loadVoices();
  if (synth.onvoiceschanged !== undefined) {
    synth.onvoiceschanged = loadVoices;
  }

  /* ── Update word count + estimated time ── */
  function updateStats() {
    var text = input.value.trim();
    var words = text ? text.split(/\s+/).filter(Boolean).length : 0;
    wordCount.textContent = words.toLocaleString() + ' word' + (words !== 1 ? 's' : '');

    if (words > 0) {
      var rate = parseFloat(rateSlider.value);
      var wpm  = Math.round(130 * rate);
      var mins = Math.ceil(words / wpm);
      estTime.textContent = '~' + mins + ' min at ' + rate + '×';
    } else {
      estTime.textContent = '';
    }

    playBtn.disabled = !text;
  }

  /* ── Play ── */
  function play() {
    var text = input.value.trim();
    if (!text) return;

    synth.cancel();

    utterance = new SpeechSynthesisUtterance(text);
    utterance.rate  = parseFloat(rateSlider.value);
    utterance.pitch = parseFloat(pitchSlider.value);

    var vIdx = parseInt(voiceSel.value);
    if (!isNaN(vIdx) && voices[vIdx]) {
      utterance.voice = voices[vIdx];
    }

    totalChars = text.length;

    utterance.onstart = function() {
      statusEl.textContent = 'Speaking…';
      statusEl.className   = 'tts-status speaking';
      playBtn.classList.add('hidden');
      pauseBtn.classList.remove('hidden');
      stopBtn.classList.remove('hidden');
    };

    utterance.onboundary = function(e) {
      if (e.name === 'word') {
        var pct = Math.min(100, ((e.charIndex / totalChars) * 100));
        progress.style.width = pct + '%';
      }
    };

    utterance.onend = function() {
      reset();
      progress.style.width = '100%';
      setTimeout(function(){ progress.style.width = '0%'; }, 800);
    };

    utterance.onerror = function(e) {
      if (e.error !== 'interrupted') {
        statusEl.textContent = 'Error: ' + e.error;
        statusEl.className = 'tts-status';
      }
      reset();
    };

    synth.speak(utterance);
  }

  function pause() {
    synth.pause();
    statusEl.textContent = 'Paused';
    statusEl.className   = 'tts-status paused';
    pauseBtn.classList.add('hidden');
    resumeBtn.classList.remove('hidden');
  }

  function resume() {
    synth.resume();
    statusEl.textContent = 'Speaking…';
    statusEl.className   = 'tts-status speaking';
    resumeBtn.classList.add('hidden');
    pauseBtn.classList.remove('hidden');
  }

  function stop() {
    synth.cancel();
    reset();
  }

  function reset() {
    statusEl.textContent = 'Ready';
    statusEl.className   = 'tts-status';
    playBtn.classList.remove('hidden');
    pauseBtn.classList.add('hidden');
    resumeBtn.classList.add('hidden');
    stopBtn.classList.add('hidden');
  }

  /* ── Events ── */
  playBtn.addEventListener('click', play);
  pauseBtn.addEventListener('click', pause);
  resumeBtn.addEventListener('click', resume);
  stopBtn.addEventListener('click', stop);
  input.addEventListener('input', updateStats);

  rateSlider.addEventListener('input', function() {
    rateVal.textContent = parseFloat(rateSlider.value).toFixed(1) + '×';
    updateStats();
  });

  pitchSlider.addEventListener('input', function() {
    pitchVal.textContent = parseFloat(pitchSlider.value).toFixed(1);
  });

  /* Stop speech when leaving page */
  window.addEventListener('beforeunload', function() { synth.cancel(); });

  updateStats();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
