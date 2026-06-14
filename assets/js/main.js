/* ============================================================
   TextlyPop — main.js
   Handles: theme, search, mobile nav, copy buttons,
            localStorage persistence, recently used tools,
            send-to-tool, keyboard shortcuts
   ============================================================ */

(function () {
  'use strict';

  /* ── Tool data (mirrors functions.php, used for client-side search) ── */
  const TOOLS = [
    { slug: 'word-counter',        name: 'Word counter',        desc: 'Count words, characters, sentences and paragraphs.' },
    { slug: 'character-counter',   name: 'Character counter',   desc: 'Count characters with platform limits.' },
    { slug: 'case-converter',      name: 'Case converter',      desc: 'Convert to UPPER, lower, Title, Sentence case.' },
    { slug: 'remove-line-breaks',  name: 'Remove line breaks',  desc: 'Strip line breaks from copied text instantly.' },
    { slug: 'remove-extra-spaces', name: 'Remove extra spaces', desc: 'Collapse multiple spaces and trim whitespace.' },
    { slug: 'duplicate-line-remover', name: 'Duplicate line remover', desc: 'Remove repeated lines from any list.' },
    { slug: 'text-line-sorter',    name: 'Text line sorter',    desc: 'Sort lines A-Z, Z-A, by length, or randomly.' },
    { slug: 'find-and-replace',    name: 'Find and replace',    desc: 'Find any word and replace it. Supports regex.' },
    { slug: 'text-to-slug',           name: 'Text to slug',              desc: 'Convert any title into a URL slug.' },
    { slug: 'word-frequency-counter', name: 'Word frequency counter',    desc: 'See how often each word appears in your text.' },
    { slug: 'lorem-ipsum-generator',  name: 'Lorem ipsum generator',     desc: 'Generate lorem ipsum placeholder text.' },
    { slug: 'text-reverser',          name: 'Text reverser',             desc: 'Reverse text, word order, or each word.' },
    { slug: 'fancy-text-generator',  name: 'Fancy text generator',     desc: 'Convert text into bold, italic, cursive, bubble and more Unicode styles.' },
    { slug: 'online-notepad',         name: 'Online notepad',            desc: 'Distraction-free notepad that saves automatically.' },
    { slug: 'random-number-generator',name: 'Random number generator',   desc: 'Generate random numbers between any range.' },
    { slug: 'password-generator',     name: 'Password generator',        desc: 'Generate strong random passwords.' },
    { slug: 'binary-to-text',         name: 'Binary to text converter',  desc: 'Convert binary to text and text to binary.' },
    { slug: 'morse-code-translator',  name: 'Morse code translator',     desc: 'Convert text to Morse code and back.' },
    { slug: 'html-encoder-decoder',   name: 'HTML encoder / decoder',    desc: 'Encode and decode HTML entities.' },
    { slug: 'url-encoder-decoder',    name: 'URL encoder / decoder',     desc: 'Encode and decode URLs and percent encoding.' },
    { slug: 'palindrome-checker',        name: 'Palindrome checker',           desc: 'Check if a word or phrase is a palindrome.' },
    { slug: 'reading-level-checker',     name: 'Reading level checker',        desc: 'Check Flesch-Kincaid reading level and ease score.' },
    { slug: 'sentence-counter',          name: 'Sentence counter',             desc: 'Count sentences, paragraphs and average sentence length.' },
    { slug: 'vowel-counter',             name: 'Vowel and consonant counter',  desc: 'Count vowels, consonants and letters in your text.' },
    { slug: 'text-to-speech',            name: 'Text to speech',               desc: 'Convert text to speech in your browser instantly.' },
    { slug: 'speech-to-text',            name: 'Speech to text',               desc: 'Convert speech to text using your microphone.' },
    { slug: 'comma-separator',           name: 'Comma separator',              desc: 'Convert a list to comma-separated values and back.' },
    { slug: 'number-to-words',           name: 'Number to words',              desc: 'Convert numbers to words. 1234 to one thousand two hundred.' },
    { slug: 'text-to-hashtags',          name: 'Text to hashtags',             desc: 'Convert text into hashtags for social media.' },
    { slug: 'json-formatter',            name: 'JSON formatter',               desc: 'Format and validate JSON. Prettify or minify instantly.' },
    { slug: 'markdown-to-html',          name: 'Markdown to HTML',             desc: 'Convert Markdown to HTML instantly.' },
    { slug: 'html-to-markdown',          name: 'HTML to Markdown',             desc: 'Convert HTML to clean Markdown instantly.' },
    { slug: 'list-to-comma',             name: 'Line break to comma',          desc: 'Convert line-by-line lists to comma-separated text.' },
    { slug: 'rhyme-finder',              name: 'Rhyme finder',                 desc: 'Find words that rhyme with any word.' },
    { slug: 'roman-numeral-converter',   name: 'Roman numeral converter',      desc: 'Convert between Arabic numbers and Roman numerals.' },
    { slug: 'base-converter',            name: 'Base converter',               desc: 'Convert numbers between binary, octal, decimal and hex.' },
    { slug: 'words-to-pages',            name: 'Words to pages',               desc: 'Convert word count to estimated page count.' },
    { slug: 'text-diff-checker',         name: 'Text diff checker',            desc: 'Compare two pieces of text and highlight exactly what changed.' },
    { slug: 'text-to-csv',              name: 'Text to CSV converter',        desc: 'Convert tab-separated, pipe-delimited or any text to properly formatted CSV.' },
  ];

  /* Synonym map for smarter search */
  const SYNONYMS = {
    'erase': 'remove', 'delete': 'remove', 'strip': 'remove',
    'capital': 'case', 'uppercase': 'case converter', 'lowercase': 'case converter',
    'blank': 'line', 'empty': 'line', 'newline': 'line break',
    'url': 'slug', 'permalink': 'slug', 'link': 'slug',
    'alphabetical': 'sort', 'alphabetically': 'sort', 'order': 'sort',
    'search': 'find', 'lookup': 'find',
    'whitespace': 'spaces', 'trim': 'spaces',
    'duplicate': 'duplicate', 'repeated': 'duplicate', 'unique': 'duplicate',
    'cool text': 'fancy', 'unicode font': 'fancy', 'stylish': 'fancy', 'cursive': 'fancy', 'bold text': 'fancy',
    'diff': 'diff checker', 'compare': 'diff checker', 'difference': 'diff checker', 'changes': 'diff checker',
    'tsv': 'csv converter', 'tab separated': 'csv converter', 'pipe delimited': 'csv converter', 'spreadsheet': 'csv converter',
  };

  /* ── Theme ───────────────────────────────────────────────── */
  const THEME_KEY = 'tp-theme';

  function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem(THEME_KEY, theme);
    updateLogoSrc(theme);
  }

  function updateLogoSrc(theme) {
    document.querySelectorAll('.logo-img').forEach(img => {
      const src = theme === 'dark' ? img.dataset.dark : img.dataset.light;
      if (src) img.src = src;
    });
  }

  function initTheme() {
    const saved = localStorage.getItem(THEME_KEY);
    const preferred = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    applyTheme(saved || preferred);

    const btn = document.getElementById('theme-toggle');
    if (btn) {
      btn.addEventListener('click', () => {
        const current = document.documentElement.getAttribute('data-theme');
        applyTheme(current === 'dark' ? 'light' : 'dark');
      });
    }
  }

  /* ── Mobile nav ──────────────────────────────────────────── */
  function initMobileNav() {
    const btn = document.getElementById('mobile-menu-btn');
    const nav = document.getElementById('mobile-nav');
    if (!btn || !nav) return;

    function setOpen(open) {
      nav.classList.toggle('open', open);
      btn.setAttribute('aria-expanded', open);
      nav.setAttribute('aria-hidden', !open);
      document.body.classList.toggle('nav-open', open);
    }

    btn.addEventListener('click', () => setOpen(!nav.classList.contains('open')));

    document.addEventListener('click', e => {
      if (!btn.contains(e.target) && !nav.contains(e.target)) setOpen(false);
    });
  }

  function initNavAccordion() {
    document.querySelectorAll('.mobile-nav-heading').forEach(heading => {
      const section = heading.closest('.mobile-nav-section');
      if (!section) return;
      heading.addEventListener('click', () => {
        const expanded = section.classList.toggle('expanded');
        heading.setAttribute('aria-expanded', expanded);
      });
    });
  }

  /* ── Search ──────────────────────────────────────────────── */
  function searchTools(query) {
    if (!query || query.trim().length < 1) return [];
    let q = query.toLowerCase().trim();

    // Apply synonyms
    for (const [k, v] of Object.entries(SYNONYMS)) {
      if (q.includes(k)) { q = q.replace(k, v); break; }
    }

    return TOOLS.filter(t =>
      t.name.toLowerCase().includes(q) ||
      t.desc.toLowerCase().includes(q) ||
      t.slug.includes(q.replace(/\s+/g, '-'))
    ).slice(0, 6);
  }

  function renderResults(results, container) {
    if (!results.length) {
      container.innerHTML = '<div class="search-no-results">No tools found. Try different words.</div>';
    } else {
      container.innerHTML = results.map(t => `
        <a href="/tools/${t.slug}" class="search-result-item" role="option">
          <strong>${t.name}</strong>
          <span>${t.desc}</span>
        </a>
      `).join('');
    }
    container.classList.add('open');
  }

  function initSearch() {
    // Header search
    const headerInput = document.getElementById('header-search');
    const headerResults = document.getElementById('search-results');

    if (headerInput && headerResults) {
      headerInput.addEventListener('input', () => {
        const q = headerInput.value.trim();
        if (!q) { headerResults.classList.remove('open'); return; }
        renderResults(searchTools(q), headerResults);
      });

      document.addEventListener('click', e => {
        if (!headerInput.contains(e.target) && !headerResults.contains(e.target)) {
          headerResults.classList.remove('open');
        }
      });

      headerInput.addEventListener('keydown', e => {
        if (e.key === 'Escape') { headerResults.classList.remove('open'); headerInput.blur(); }
      });
    }

    // Homepage hero search — filters the tool grid
    const heroInput = document.getElementById('hero-search');
    if (heroInput) {
      heroInput.addEventListener('input', () => filterToolGrid(heroInput.value));

      // Check for ?search= param on load
      const params = new URLSearchParams(window.location.search);
      const s = params.get('search');
      if (s) { heroInput.value = s; filterToolGrid(s); }
    }
  }

  function filterToolGrid(query) {
    const cards = document.querySelectorAll('[data-tool-slug]');
    if (!cards.length) return;

    let q = query.toLowerCase().trim();
    for (const [k, v] of Object.entries(SYNONYMS)) {
      if (q.includes(k)) { q = q.replace(k, v); break; }
    }

    cards.forEach(card => {
      const name = (card.dataset.toolName || '').toLowerCase();
      const slug = (card.dataset.toolSlug || '').toLowerCase();
      const desc = (card.dataset.toolDesc || '').toLowerCase();
      const match = !q || name.includes(q) || slug.includes(q.replace(/\s+/g, '-')) || desc.includes(q);
      card.style.display = match ? '' : 'none';
    });
  }

  /* ── Mobile nav search ── */
  function initMobileNavSearch() {
    var mobileSearch = document.getElementById('mobile-nav-search-input');
    if (!mobileSearch) return;

    mobileSearch.addEventListener('input', function() {
      var q = mobileSearch.value.toLowerCase().trim();
      var sections = document.querySelectorAll('.mobile-nav-section');

      if (!q) {
        // Restore CSS class-based accordion control
        sections.forEach(function(s) {
          s.style.display = '';
          var ul = s.querySelector('ul');
          if (ul) ul.style.display = '';
          s.querySelectorAll('li').forEach(function(li) { li.style.display = ''; });
        });
        return;
      }

      sections.forEach(function(section) {
        var links = section.querySelectorAll('li');
        var ul = section.querySelector('ul');
        var anyVisible = false;
        links.forEach(function(li) {
          var text = li.textContent.toLowerCase();
          var show = text.includes(q);
          li.style.display = show ? '' : 'none';
          if (show) anyVisible = true;
        });
        section.style.display = anyVisible ? '' : 'none';
        // Inline-force the ul open when it has matches (overrides accordion CSS)
        if (ul) ul.style.display = anyVisible ? 'block' : '';
      });
    });
  }

  /* ── Category filters ────────────────────────────────────── */
  function initCategoryFilters() {
    document.querySelectorAll('.cat-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const cat = btn.dataset.cat;
        document.querySelectorAll('[data-tool-slug]').forEach(card => {
          const cardCat = card.dataset.toolCat || 'all';
          card.style.display = (cat === 'all' || cardCat === cat) ? '' : 'none';
        });

        // Clear search
        const heroInput = document.getElementById('hero-search');
        if (heroInput) heroInput.value = '';
      });
    });
  }

  /* ── Recently used ───────────────────────────────────────── */
  const RECENT_KEY = 'tp-recent';
  const RECENT_MAX = 5;

  function getRecent() {
    try { return JSON.parse(localStorage.getItem(RECENT_KEY)) || []; }
    catch { return []; }
  }

  function addToRecent(slug, name) {
    let recent = getRecent().filter(r => r.slug !== slug);
    recent.unshift({ slug, name });
    recent = recent.slice(0, RECENT_MAX);
    localStorage.setItem(RECENT_KEY, JSON.stringify(recent));
  }

  function renderRecentChips() {
    const wrap = document.getElementById('recent-chips');
    if (!wrap) return;

    const recent = getRecent();
    if (!recent.length) {
      wrap.closest('.recently-used')?.classList.add('hidden');
      return;
    }

    wrap.innerHTML = recent.map(r => `
      <a href="/tools/${r.slug}" class="recent-chip">
        <span class="recent-chip-dot"></span>
        ${r.name}
      </a>
    `).join('');
  }

  /* Track visits to tool pages */
  function trackToolVisit() {
    const meta = document.querySelector('meta[name="tool-slug"]');
    const metaName = document.querySelector('meta[name="tool-name"]');
    if (meta && metaName) {
      addToRecent(meta.content, metaName.content);
    }
  }

  /* ── Copy button ─────────────────────────────────────────── */
  function initCopyButtons() {
    document.querySelectorAll('.btn-copy[data-target]').forEach(btn => {
      btn.addEventListener('click', () => {
        const targetEl = document.getElementById(btn.dataset.target);
        if (!targetEl) return;

        const text = targetEl.tagName === 'TEXTAREA' || targetEl.tagName === 'INPUT'
          ? targetEl.value
          : targetEl.textContent;

        navigator.clipboard.writeText(text).then(() => {
          const original = btn.textContent;
          btn.textContent = 'Copied!';
          btn.classList.add('copied');
          setTimeout(() => {
            btn.textContent = original;
            btn.classList.remove('copied');
          }, 2000);
        });
      });
    });
  }

  /* ── Clear button ────────────────────────────────────────── */
  function initClearButtons() {
    document.querySelectorAll('.btn-clear[data-targets]').forEach(btn => {
      btn.addEventListener('click', () => {
        btn.dataset.targets.split(',').forEach(id => {
          const el = document.getElementById(id.trim());
          if (!el) return;
          if (el.tagName === 'TEXTAREA' || el.tagName === 'INPUT') {
            el.value = '';
            el.dispatchEvent(new Event('input'));
          } else {
            el.textContent = '';
          }
        });
      });
    });
  }

  /* ── localStorage auto-save for tool inputs ──────────────── */
  function initAutoSave() {
    const inputs = document.querySelectorAll('textarea[data-save-key], input[data-save-key]');
    inputs.forEach(el => {
      const key = 'tp-save-' + el.dataset.saveKey;

      // Restore saved value
      const saved = localStorage.getItem(key);
      if (saved) {
        el.value = saved;
        el.dispatchEvent(new Event('input')); // trigger tool logic
      }

      // Save on input
      el.addEventListener('input', () => {
        localStorage.setItem(key, el.value);
      });
    });
  }

  /* ── Send to tool ────────────────────────────────────────── */
  function initSendToTool() {
    document.querySelectorAll('.send-to-btn[data-from][data-to-tool]').forEach(btn => {
      btn.addEventListener('click', () => {
        const sourceEl = document.getElementById(btn.dataset.from);
        if (!sourceEl) return;

        const text = (sourceEl.tagName === 'TEXTAREA' || sourceEl.tagName === 'INPUT')
          ? sourceEl.value
          : sourceEl.textContent;

        if (!text.trim()) {
          const orig = btn.textContent;
          btn.textContent = 'Add text first';
          btn.disabled = true;
          setTimeout(() => { btn.textContent = orig; btn.disabled = false; }, 2000);
          return;
        }

        const targetSlug = btn.dataset.toTool;
        localStorage.setItem('tp-send-' + targetSlug, text);
        window.location.href = '/tools/' + targetSlug + '?from=send';
      });
    });
  }

  /* Receive sent text on target tool page */
  function receiveSentText() {
    const params = new URLSearchParams(window.location.search);
    if (params.get('from') !== 'send') return;

    const meta = document.querySelector('meta[name="tool-slug"]');
    if (!meta) return;

    const key = 'tp-send-' + meta.content;
    const text = localStorage.getItem(key);
    if (!text) return;

    const inputEl = document.querySelector('textarea[data-save-key], input[data-save-key]');
    if (inputEl) {
      inputEl.value = text;
      inputEl.dispatchEvent(new Event('input'));
    }

    localStorage.removeItem(key);
  }

  /* ── Keyboard shortcuts ──────────────────────────────────── */
  function initKeyboardShortcuts() {
    document.addEventListener('keydown', e => {
      // Ctrl+L — clear all
      if (e.ctrlKey && e.key === 'l') {
        e.preventDefault();
        document.querySelectorAll('.btn-clear[data-targets]').forEach(btn => btn.click());
      }

      // Ctrl+Shift+C — copy output
      if (e.ctrlKey && e.shiftKey && e.key === 'C') {
        e.preventDefault();
        document.querySelector('.btn-copy[data-target="output"]')?.click();
      }

      // Escape — close search dropdown
      if (e.key === 'Escape') {
        document.getElementById('search-results')?.classList.remove('open');
      }
    });
  }

  /* ── Share results ───────────────────────────────────────── */
  function initShareButton() {
    const btn = document.getElementById('share-result-btn');
    if (!btn) return;

    btn.addEventListener('click', () => {
      const url = window.location.href.split('?')[0];
      const output = document.getElementById('output');
      if (!output) return;

      const text = (output.tagName === 'TEXTAREA' ? output.value : output.textContent).slice(0, 200);
      const shareUrl = url + '?result=' + encodeURIComponent(text);

      navigator.clipboard.writeText(shareUrl).then(() => {
        btn.textContent = 'Link copied!';
        setTimeout(() => { btn.textContent = 'Share result'; }, 2000);
      });
    });
  }

  /* ── Init everything ─────────────────────────────────────── */
  function init() {
    initTheme();
    initMobileNav();
    initNavAccordion();
    initSearch();
    initCategoryFilters();
    renderRecentChips();
    trackToolVisit();
    initCopyButtons();
    initClearButtons();
    initAutoSave();
    initSendToTool();
    receiveSentText();
    initKeyboardShortcuts();
    initShareButton();
    initMobileNavSearch();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
