<?php
$tool_slug   = 'online-notepad';
$tool_name   = 'Online Notepad';

$page_title  = 'Online Notepad — Free Browser Notepad That Saves Automatically | TextlyPop';
$meta_desc   = 'A clean distraction-free online notepad that saves your notes automatically to your browser. No signup, no account, no cloud. Your notes stay on your device.';
$canonical_url = 'https://textlypop.com/tools/online-notepad';
$og_title    = 'Free Online Notepad — Auto-Saves to Your Browser | TextlyPop';
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
  "name": "Online Notepad",
  "url": "https://textlypop.com/tools/online-notepad",
  "description": "A clean distraction-free online notepad that saves your notes automatically to your browser. No signup required.",
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
      "name": "Does the online notepad save automatically?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. TextlyPop's online notepad saves everything you type automatically to your browser's localStorage. Your notes are still there when you close the tab and come back later, with no account or signup required."
      }
    },
    {
      "@type": "Question",
      "name": "Are my notes private?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Your notes are saved only in your browser's localStorage on your own device. They are never sent to any server, never stored in a cloud database, and never accessible to anyone else. Clearing your browser data will erase them."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use multiple notepads?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. TextlyPop's online notepad supports multiple named notes. Create a new note using the New note button, switch between notes using the tabs, and rename or delete notes as needed."
      }
    },
    {
      "@type": "Question",
      "name": "Can I download my notes?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Click the Download button to save your current note as a plain text .txt file to your device. This gives you a permanent backup of your note outside the browser."
      }
    },
    {
      "@type": "Question",
      "name": "What happens if I clear my browser data?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Clearing your browser's localStorage or cookies will erase your saved notes. Download any important notes as text files before clearing browser data to avoid losing them."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Use the Online Notepad',
  'description' => 'Take and save notes in your browser using TextlyPop online notepad.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Start typing','text'=>'Click anywhere in the notepad area and start typing. Your notes save automatically as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Create multiple notes','text'=>'Click New note to create a new note tab. Switch between notes by clicking their tabs.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Rename a note','text'=>'Double-click any note tab to rename it. Press Enter to confirm the new name.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Download or copy','text'=>'Click Download to save your note as a .txt file, or Copy to copy all text to your clipboard.'],
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
    ['@type'=>'ListItem','position'=>3,'name'=>'Online Notepad','item'=>'https://textlypop.com/tools/online-notepad'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page tool-page-wide">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Online notepad</h1>
    <p>A clean notepad that saves automatically to your browser. No account. No cloud. Just type.</p>
  </div>

  <div class="np-tool" id="np-tool">

    <!-- Toolbar -->
    <div class="np-toolbar">
      <div class="np-tabs" id="np-tabs" role="tablist" aria-label="Notes"></div>
      <button class="np-new-btn" id="np-new-btn" title="Create new note" aria-label="Create new note">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <line x1="8" y1="2" x2="8" y2="14"/>
          <line x1="2" y1="8" x2="14" y2="8"/>
        </svg>
        New note
      </button>
    </div>

    <!-- Note area -->
    <div class="np-editor-wrap">
      <textarea
        id="np-editor"
        class="np-editor"
        placeholder="Start typing your note here… Everything saves automatically."
        aria-label="Note editor"
        spellcheck="true"></textarea>
    </div>

    <!-- Status bar -->
    <div class="np-statusbar">
      <div class="np-status-left">
        <span class="np-save-status" id="np-save-status">
          <span class="np-save-dot"></span>
          Saved
        </span>
        <span class="np-stats" id="np-stats">0 words &nbsp;·&nbsp; 0 characters</span>
      </div>
      <div class="np-status-right">
        <button class="btn btn-ghost np-action-btn" id="np-copy-btn">Copy all</button>
        <button class="btn btn-ghost np-action-btn" id="np-download-btn">
          <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
            <line x1="8" y1="1" x2="8" y2="11"/>
            <polyline points="4,7 8,11 12,7"/>
            <line x1="2" y1="15" x2="14" y2="15"/>
          </svg>
          Download
        </button>

      </div>
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

    <h2>A notepad that remembers everything</h2>
    <p>TextlyPop's online notepad saves every keystroke automatically to your browser's localStorage. Close the tab, shut down your computer, come back tomorrow — your notes are exactly where you left them. No account to create, no password to remember, no cloud subscription to manage. The notepad works entirely in your browser and your text never leaves your device.</p>

    <h2>Multiple notes with tabs</h2>
    <p>Create as many separate notes as you need using the New note button. Each note gets its own tab at the top. Double-click any tab to rename it — give your notes meaningful names like "Meeting notes", "Shopping list", or "Draft ideas". Switch between notes instantly by clicking their tabs. Each note saves independently so your content is always organized and accessible.</p>

    <h2>Why use a browser-based notepad?</h2>
    <p>A browser notepad is available on any device that has a browser, with no installation required. It is faster to open than a desktop application — just bookmark the page and it opens in one click. Unlike cloud note apps there is no subscription, no data collection, and no risk of your private notes being stored on someone else's server. For quick temporary notes, meeting transcriptions, draft ideas, or any text you need to capture fast, a browser notepad is the most frictionless option available.</p>

    <h2>Download your notes as text files</h2>
    <p>While your notes persist in localStorage, clearing your browser data would erase them. The Download button saves your current note as a plain .txt file to your device, giving you a permanent backup that exists independently of the browser. Download important notes regularly if you plan to keep them long-term.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">Does the online notepad save automatically?</p>
      <p class="faq-a">Yes. Everything you type saves automatically to your browser's localStorage. Your notes are still there when you close the tab and come back, with no account required.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Are my notes private?</p>
      <p class="faq-a">Yes. Notes are saved only in your browser on your own device. They are never sent to any server and never accessible to anyone else.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use multiple notepads?</p>
      <p class="faq-a">Yes. Create multiple named notes using the New note button and switch between them using the tabs at the top of the notepad.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I download my notes?</p>
      <p class="faq-a">Yes. Click Download to save your current note as a plain text .txt file to your device as a permanent backup.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What happens if I clear my browser data?</p>
      <p class="faq-a">Clearing your browser's localStorage will erase saved notes. Download important notes as text files before clearing browser data.</p>
    </div>

  </div>

</div>

<!-- Online notepad CSS -->
<style>
.tool-page-wide { max-width: 960px; }

.np-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Toolbar with tabs */
.np-toolbar {
  display: flex;
  align-items: center;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
  min-height: 44px;
  overflow-x: auto;
}

.np-tabs {
  display: flex;
  align-items: stretch;
  flex: 1;
  overflow-x: auto;
  scrollbar-width: none;
}

.np-tabs::-webkit-scrollbar { display: none; }

.np-tab {
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 0 14px;
  min-height: 44px;
  border-right: 1px solid var(--border);
  font-size: 0.8125rem;
  color: var(--text-3);
  cursor: pointer;
  white-space: nowrap;
  background: transparent;
  border-top: none;
  border-bottom: none;
  border-left: none;
  font-family: var(--font);
  transition: color var(--transition), background var(--transition);
  position: relative;
  flex-shrink: 0;
}

.np-tab:hover { color: var(--text); background: var(--bg-3); }

.np-tab.active {
  color: var(--text);
  background: var(--bg);
  font-weight: 500;
  border-bottom: 2px solid var(--accent);
}

.np-tab-name {
  outline: none;
  background: transparent;
  border: none;
  font-family: var(--font);
  font-size: 0.8125rem;
  color: inherit;
  cursor: pointer;
  min-width: 60px;
  max-width: 120px;
}

.np-tab-name:focus {
  background: var(--bg-2);
  border-radius: 3px;
  padding: 1px 4px;
  cursor: text;
}

.np-tab-close {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: none;
  background: transparent;
  color: var(--text-3);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  line-height: 1;
  padding: 0;
  opacity: 0;
  transition: opacity var(--transition), background var(--transition);
}

.np-tab:hover .np-tab-close,
.np-tab.active .np-tab-close { opacity: 1; }

.np-tab-close:hover { background: var(--bg-3); color: var(--danger); }

.np-new-btn {
  display: flex;
  align-items: center;
  gap: 5px;
  padding: 0 14px;
  min-height: 44px;
  border: none;
  border-left: 1px solid var(--border);
  background: transparent;
  color: var(--text-3);
  font-family: var(--font);
  font-size: 0.8125rem;
  cursor: pointer;
  white-space: nowrap;
  transition: color var(--transition), background var(--transition);
  flex-shrink: 0;
}

.np-new-btn:hover { color: var(--accent); background: var(--accent-light); }
[data-theme="dark"] .np-new-btn:hover { background: var(--accent-dim); }

/* Editor */
.np-editor-wrap { position: relative; }

.np-editor {
  width: 100%;
  min-height: 420px;
  padding: 20px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 1rem;
  color: var(--text);
  line-height: 1.8;
  resize: vertical;
  outline: none;
  display: block;
}

.np-editor::placeholder { color: var(--text-3); }

/* Status bar */
.np-statusbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 8px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  flex-wrap: wrap;
  gap: 8px;
}

.np-status-left { display: flex; align-items: center; gap: 16px; }
.np-status-right { display: flex; align-items: center; gap: 6px; }

.np-save-status {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.75rem;
  color: var(--text-3);
}

.np-save-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: var(--accent);
  transition: background var(--transition);
}

.np-save-status.saving .np-save-dot { background: var(--warning); }
.np-save-status.saving { color: var(--warning); }

.np-stats { font-size: 0.75rem; color: var(--text-3); }

.np-action-btn {
  font-size: 0.8rem;
  padding: 4px 10px;
}


@media (max-width: 640px) {
  .np-editor { min-height: 300px; }
  .np-status-right { flex-wrap: wrap; }
}
</style>

<!-- Online notepad JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var STORAGE_KEY = 'tp-notepad-v1';
  var editor      = document.getElementById('np-editor');
  var tabsEl      = document.getElementById('np-tabs');
  var newBtn      = document.getElementById('np-new-btn');
  var saveStatus  = document.getElementById('np-save-status');
  var statsEl     = document.getElementById('np-stats');
  var copyBtn     = document.getElementById('np-copy-btn');
  var downloadBtn = document.getElementById('np-download-btn');

  var saveTimer   = null;
  var activeId    = null;

  /* ── State management ── */
  function loadState() {
    try {
      var raw = localStorage.getItem(STORAGE_KEY);
      if (raw) return JSON.parse(raw);
    } catch(e) {}
    return {
      activeId: 'note-1',
      notes: {
        'note-1': { name: 'My note', content: '', updated: Date.now() }
      }
    };
  }

  function saveState(state) {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(state));
    } catch(e) {}
  }

  var state = loadState();

  /* ── Render tabs ── */
  function renderTabs() {
    tabsEl.innerHTML = '';
    Object.keys(state.notes).forEach(function(id) {
      var note = state.notes[id];
      var tab  = document.createElement('div');
      tab.className = 'np-tab' + (id === activeId ? ' active' : '');
      tab.setAttribute('role', 'tab');
      tab.setAttribute('aria-selected', id === activeId ? 'true' : 'false');
      tab.dataset.id = id;

      var nameEl = document.createElement('span');
      nameEl.className = 'np-tab-name';
      nameEl.textContent = note.name;
      nameEl.title = 'Double-click to rename';

      var closeEl = document.createElement('button');
      closeEl.className = 'np-tab-close';
      closeEl.innerHTML = '&times;';
      closeEl.title = 'Close note';
      closeEl.setAttribute('aria-label', 'Close ' + note.name);

      tab.appendChild(nameEl);
      tab.appendChild(closeEl);
      tabsEl.appendChild(tab);

      /* Switch tab */
      tab.addEventListener('click', function(e) {
        if (e.target === closeEl) return;
        switchNote(id);
      });

      /* Rename on double-click */
      nameEl.addEventListener('dblclick', function(e) {
        e.stopPropagation();
        var input = document.createElement('input');
        input.type = 'text';
        input.value = note.name;
        input.className = 'np-tab-name';
        input.style.cssText = 'width:' + Math.max(60, note.name.length * 8) + 'px';
        tab.replaceChild(input, nameEl);
        input.focus();
        input.select();

        function finishRename() {
          var newName = input.value.trim() || 'Untitled';
          state.notes[id].name = newName;
          saveState(state);
          renderTabs();
        }

        input.addEventListener('blur', finishRename);
        input.addEventListener('keydown', function(e) {
          if (e.key === 'Enter') { e.preventDefault(); input.blur(); }
          if (e.key === 'Escape') { input.value = note.name; input.blur(); }
        });
      });

      /* Close */
      closeEl.addEventListener('click', function(e) {
        e.stopPropagation();
        deleteNote(id);
      });
    });
  }

  /* ── Switch note ── */
  function switchNote(id) {
    /* Save current note before switching */
    if (activeId && state.notes[activeId]) {
      state.notes[activeId].content = editor.value;
    }
    /* Guard: make sure target note exists */
    if (!state.notes[id]) return;
    activeId = id;
    state.activeId = id;
    editor.value = state.notes[id].content;
    saveState(state);
    renderTabs();
    updateStats();
    editor.focus();
  }

  /* ── Create new note ── */
  function createNote() {
    var id = 'note-' + Date.now();
    state.notes[id] = { name: 'New note', content: '', updated: Date.now() };
    saveState(state);
    switchNote(id);
  }

  /* ── Delete note ── */
  function deleteNote(id) {
    var allIds = Object.keys(state.notes);
    var noteCount = allIds.length;

    /* Only one note left — just clear content, never remove the tab */
    if (noteCount === 1) {
      state.notes[id].content = '';
      editor.value = '';
      saveState(state);
      updateStats();
      return;
    }

    /* Find which note to switch to BEFORE deleting */
    var currentIndex = allIds.indexOf(id);
    var nextIndex = currentIndex > 0 ? currentIndex - 1 : 1;
    var nextId = allIds[nextIndex];

    /* Save current editor content to next note before switching */
    /* (do NOT save to the note being deleted) */
    activeId = nextId;
    state.activeId = nextId;
    editor.value = state.notes[nextId].content;

    /* Now safe to delete */
    delete state.notes[id];
    saveState(state);
    renderTabs();
    updateStats();
    editor.focus();
  }

  /* ── Auto-save ── */
  function triggerSave() {
    saveStatus.className = 'np-save-status saving';
    saveStatus.querySelector('.np-save-dot').style.background = '';
    saveStatus.lastChild.textContent = ' Saving…';

    clearTimeout(saveTimer);
    saveTimer = setTimeout(function() {
      state.notes[activeId].content  = editor.value;
      state.notes[activeId].updated  = Date.now();
      saveState(state);
      saveStatus.className = 'np-save-status';
      saveStatus.lastChild.textContent = ' Saved';
    }, 600);
  }

  /* ── Update stats ── */
  function updateStats() {
    var text  = editor.value;
    var words = text.trim() ? text.trim().split(/\s+/).length : 0;
    var chars = text.length;
    statsEl.textContent = words.toLocaleString() + ' word' + (words !== 1 ? 's' : '') +
      ' \u00b7 ' + chars.toLocaleString() + ' character' + (chars !== 1 ? 's' : '');
  }

  /* ── Events ── */
  editor.addEventListener('input', function() {
    triggerSave();
    updateStats();
  });

  newBtn.addEventListener('click', createNote);

  copyBtn.addEventListener('click', function() {
    if (!editor.value) return;
    navigator.clipboard.writeText(editor.value).then(function() {
      copyBtn.textContent = 'Copied!';
      setTimeout(function(){ copyBtn.textContent = 'Copy all'; }, 2000);
    });
  });

  downloadBtn.addEventListener('click', function() {
    var text = editor.value;
    if (!text.trim()) {
      alert('Nothing to download — your note is empty.');
      return;
    }
    var name = (state.notes[activeId].name || 'note').replace(/[^a-z0-9]+/gi, '-').replace(/^-+|-+$/g,'').toLowerCase() || 'note';
    var blob = new Blob([text], { type: 'text/plain;charset=utf-8' });
    var url  = URL.createObjectURL(blob);
    var a    = document.createElement('a');
    a.href     = url;
    a.download = name + '.txt';
    document.body.appendChild(a);
    a.click();
    setTimeout(function() {
      document.body.removeChild(a);
      URL.revokeObjectURL(url);
    }, 100);
  });

  /* ── Initialize ── */
  activeId = state.activeId || Object.keys(state.notes)[0];
  if (!state.notes[activeId]) {
    activeId = Object.keys(state.notes)[0];
  }
  editor.value = state.notes[activeId].content;
  renderTabs();
  updateStats();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
