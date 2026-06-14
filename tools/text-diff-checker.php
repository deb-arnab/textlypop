<?php
$tool_slug   = 'text-diff-checker';
$tool_name   = 'Text Diff Checker';

$page_title  = 'Text Diff Checker — Compare Two Texts Online Free | TextlyPop';
$meta_desc   = 'Compare two pieces of text and see exactly what changed. Highlights added, removed and modified lines with word-level precision. Free, instant, no signup.';
$canonical_url = 'https://textlypop.com/tools/text-diff-checker';
$og_title    = 'Free Online Text Diff Checker — TextlyPop';
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
  "name": "Text Diff Checker",
  "url": "https://textlypop.com/tools/text-diff-checker",
  "description": "Compare two pieces of text side by side and see exactly what changed. Highlights added, removed and modified lines with word-level precision.",
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
      "name": "How does the text diff checker work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste your original text in the left panel and your revised text in the right panel. The diff checker uses a longest-common-subsequence algorithm to find what changed. Added lines are highlighted green, removed lines red, and modified lines show the exact words that changed within the line. The result updates automatically as you type."
      }
    },
    {
      "@type": "Question",
      "name": "What does the diff checker highlight?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Lines that were added appear with a green background and a + symbol. Lines that were removed appear with a red background and a - symbol. Lines that were modified show both the old and new version, with the specific changed words highlighted in a darker shade so you can see exactly what was edited."
      }
    },
    {
      "@type": "Question",
      "name": "Can I compare documents, essays or config files?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The tool works on any plain text — essays, emails, code, config files, JSON, CSV, Markdown or any other text format. For best results paste plain text without formatting. The tool handles up to 3000 lines per side."
      }
    },
    {
      "@type": "Question",
      "name": "Is my text sent to a server?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. All comparison happens entirely in your browser using JavaScript. Your text is never uploaded to any server and never leaves your device. The tool works offline once the page is loaded."
      }
    },
    {
      "@type": "Question",
      "name": "How do I copy or save the diff result?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Click the Copy diff button above the result panel. This copies the diff in unified format — each line prefixed with + for additions and - for removals — ready to paste into a document, email or issue tracker."
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
        ['name' => 'Paste the original text', 'text' => 'Paste the first version of your text into the Original panel on the left.'],
        ['name' => 'Paste the modified text', 'text' => 'Paste the revised version of your text into the Modified panel on the right.'],
        ['name' => 'Read the diff result', 'text' => 'The diff result appears automatically below. Green lines with + were added, red lines with - were removed, and highlighted words show what changed within a line.'],
        ['name' => 'Copy the result', 'text' => 'Click Copy diff to copy the result in unified format, or use Swap to reverse the comparison direction.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Text diff checker</h1>
    <p>Paste two versions of any text and see exactly what changed — line by line, word by word.</p>
  </div>

  <!-- Two input panels -->
  <div class="tool-workspace diff-workspace">
    <div class="tool-workspace-inner">

      <div class="workspace-panel">
        <div class="panel-label">
          <span class="panel-label-text">Original</span>
          <span class="diff-lc" id="orig-line-count">0 lines</span>
        </div>
        <textarea
          id="diff-original"
          class="diff-textarea"
          data-save-key="diff-original"
          placeholder="Paste the original text here…"
          spellcheck="false"
          aria-label="Original text"></textarea>
      </div>

      <div class="workspace-panel">
        <div class="panel-label">
          <span class="panel-label-text">Modified</span>
          <span class="diff-lc" id="mod-line-count">0 lines</span>
        </div>
        <textarea
          id="diff-modified"
          class="diff-textarea"
          data-save-key="diff-modified"
          placeholder="Paste the modified text here…"
          spellcheck="false"
          aria-label="Modified text"></textarea>
      </div>

    </div>
  </div>

  <!-- Action bar -->
  <div class="diff-bar">
    <div class="diff-actions">
      <button class="btn btn-ghost" id="diff-swap-btn" title="Swap original and modified">
        <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
          <path d="M3 5h10M3 5l3-3M3 5l3 3M13 11H3M13 11l-3-3M13 11l-3 3"/>
        </svg>
        Swap
      </button>
      <button class="btn btn-ghost" id="diff-clear-btn">Clear</button>
    </div>
    <div class="diff-stats" id="diff-stats" style="display:none" aria-live="polite">
      <span class="ds-added"   id="diff-stat-added"></span>
      <span class="ds-sep">·</span>
      <span class="ds-removed" id="diff-stat-removed"></span>
      <span class="ds-sep">·</span>
      <span class="ds-unchanged" id="diff-stat-unchanged"></span>
    </div>
  </div>

  <!-- Diff output -->
  <div class="diff-output-wrap" id="diff-output-wrap" style="display:none">
    <div class="diff-output-hdr">
      <span class="diff-output-title">Diff result</span>
      <button class="btn btn-ghost btn-sm" id="diff-copy-btn">Copy diff</button>
    </div>
    <div class="diff-output" id="diff-output" role="region" aria-label="Diff result" aria-live="polite"></div>
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

    <h2>How to compare two texts online</h2>
    <p>Paste the first version of your text into the Original panel on the left and your revised version into the Modified panel on the right. The diff result appears immediately below — no button required. Added lines are highlighted green with a <code>+</code> prefix, removed lines are highlighted red with a <code>-</code> prefix, and modified lines show both the old and new version with the specific words that changed highlighted within each line.</p>

    <h2>Line-level and word-level differences</h2>
    <p>The diff checker compares text at two levels of detail. At the line level it identifies which lines were added, removed, or modified. When a line is modified rather than completely replaced, the tool also runs a word-level comparison on that specific line pair, highlighting exactly which words changed inside it. This makes it easy to spot a single word correction in a long paragraph without reading the whole line twice.</p>

    <h2>Who uses a text diff checker</h2>
    <p>Writers use the diff checker to compare draft versions of an essay or article and see what they or an editor changed. Developers use it to compare config files, documentation, or any text that is not in version control. Students use it to compare their submission against a revised or corrected version. Translators use it to track changes in the source document between review cycles. Anyone who has two versions of a text and wants to know exactly what is different will find it useful.</p>

    <h2>Reading the diff result</h2>
    <p>Each line in the result is prefixed with a symbol and colour. A green line starting with <code>+</code> is a line that exists only in the Modified version — it was added. A red line starting with <code>-</code> is a line that exists only in the Original version — it was removed. Lines without a prefix are unchanged and appear in both versions. When a line is modified, the old version appears as a red <code>-</code> line and the new version appears as a green <code>+</code> line directly below it, with the changed words highlighted in a stronger colour inside each line.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the text diff checker work?</p>
      <p class="faq-a">The tool uses a longest-common-subsequence algorithm to find the minimum set of changes needed to turn the original text into the modified text. Added lines appear green, removed lines appear red, and modified lines show word-level highlights. The result updates automatically as you type.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What does the diff checker highlight?</p>
      <p class="faq-a">Added lines are highlighted green with a + prefix. Removed lines are highlighted red with a - prefix. Modified lines show both versions with the specific changed words highlighted in a darker shade so you can see exactly what was edited without reading the entire line.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I compare documents, essays or config files?</p>
      <p class="faq-a">Yes. The tool works on any plain text — essays, emails, code, config files, JSON, CSV, Markdown or any other text format. Paste plain text for best results. The tool handles up to 3000 lines per side.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my text sent to a server?</p>
      <p class="faq-a">No. All comparison happens entirely in your browser. Your text is never uploaded and never leaves your device. The tool works offline once the page is loaded.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I copy or save the diff result?</p>
      <p class="faq-a">Click Copy diff above the result panel. This copies the diff in unified format — each line prefixed with + for additions and - for removals — ready to paste into a document, email or issue tracker.</p>
    </div>

  </div>

</div>

<style>
/* ── Diff workspace ───────────────────────────────────────── */
.diff-workspace .tool-workspace-inner { min-height: 280px; }

.diff-textarea {
  flex: 1;
  width: 100%;
  padding: 12px 14px;
  border: none;
  resize: none;
  background: var(--bg);
  color: var(--text);
  font-family: var(--font-mono);
  font-size: 0.875rem;
  line-height: 1.6;
  outline: none;
  min-height: 280px;
}

.diff-lc {
  font-size: 0.75rem;
  color: var(--text-3);
  font-variant-numeric: tabular-nums;
}

/* ── Action bar ───────────────────────────────────────────── */
.diff-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 16px;
}

.diff-actions { display: flex; gap: 8px; }

.diff-stats {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.875rem;
}

.ds-added   { color: var(--diff-ins-fg); font-weight: 600; }
.ds-removed { color: var(--diff-del-fg); font-weight: 600; }
.ds-unchanged { color: var(--text-3); }
.ds-sep { color: var(--text-3); }

/* ── Diff output panel ────────────────────────────────────── */
.diff-output-wrap {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  margin-bottom: 24px;
}

.diff-output-hdr {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
}

.diff-output-title {
  font-size: 0.8125rem;
  font-weight: 600;
  color: var(--text-2);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.diff-output {
  font-family: var(--font-mono);
  font-size: 0.8125rem;
  line-height: 1.65;
  max-height: 480px;
  overflow-y: auto;
  overflow-x: auto;
  padding: 6px 0;
  background: var(--bg);
}

/* ── Diff colours ─────────────────────────────────────────── */
:root {
  --diff-ins-bg: rgba(29, 158, 117, 0.10);
  --diff-ins-fg: #0f6e56;
  --diff-del-bg: rgba(229, 62, 62, 0.10);
  --diff-del-fg: #b91c1c;
  --diff-ins-hl: rgba(29, 158, 117, 0.28);
  --diff-del-hl: rgba(229, 62, 62, 0.28);
}
[data-theme="dark"] {
  --diff-ins-bg: rgba(29, 158, 117, 0.12);
  --diff-ins-fg: #6ee7b7;
  --diff-del-bg: rgba(229, 62, 62, 0.12);
  --diff-del-fg: #fca5a5;
  --diff-ins-hl: rgba(29, 158, 117, 0.35);
  --diff-del-hl: rgba(229, 62, 62, 0.35);
}

/* ── Diff lines ───────────────────────────────────────────── */
.dl {
  display: flex;
  align-items: baseline;
  gap: 0;
  padding: 1px 14px 1px 0;
  white-space: pre-wrap;
  word-break: break-all;
  min-width: 0;
}

.dl-gutter {
  display: inline-block;
  width: 28px;
  min-width: 28px;
  text-align: center;
  font-weight: 700;
  user-select: none;
  flex-shrink: 0;
}

.dl-text { flex: 1; min-width: 0; }

.dl-eq   { color: var(--text-3); }
.dl-del  { background: var(--diff-del-bg); color: var(--diff-del-fg); }
.dl-ins  { background: var(--diff-ins-bg); color: var(--diff-ins-fg); }

.dl-del .dl-gutter { color: var(--diff-del-fg); }
.dl-ins .dl-gutter { color: var(--diff-ins-fg); }

/* word-level highlights */
.dl mark.wd-del {
  background: var(--diff-del-hl);
  color: inherit;
  border-radius: 2px;
  padding: 0 1px;
}
.dl mark.wd-ins {
  background: var(--diff-ins-hl);
  color: inherit;
  border-radius: 2px;
  padding: 0 1px;
}

.dl-identical {
  padding: 14px 16px;
  color: var(--text-3);
  font-style: italic;
  font-family: var(--font);
  font-size: 0.9rem;
}

/* ── Mobile ───────────────────────────────────────────────── */
@media (max-width: 600px) {
  .diff-bar { flex-direction: column; align-items: flex-start; }
}
</style>

<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  /* ── HTML escape ── */
  function esc(s) {
    return String(s)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;');
  }

  /* ── LCS diff on an array of strings ── */
  function lcs(a, b) {
    var m = a.length, n = b.length;
    if (m === 0 && n === 0) return [];

    var dp = [];
    for (var i = 0; i <= m; i++) { dp[i] = new Array(n + 1).fill(0); }
    for (var i = 1; i <= m; i++) {
      for (var j = 1; j <= n; j++) {
        dp[i][j] = a[i - 1] === b[j - 1]
          ? dp[i - 1][j - 1] + 1
          : Math.max(dp[i - 1][j], dp[i][j - 1]);
      }
    }

    var ops = [], ii = m, jj = n;
    while (ii > 0 || jj > 0) {
      if (ii > 0 && jj > 0 && a[ii - 1] === b[jj - 1]) {
        ops.unshift({ t: 'eq',  v: a[ii - 1] }); ii--; jj--;
      } else if (jj > 0 && (ii === 0 || dp[ii][jj - 1] >= dp[ii - 1][jj])) {
        ops.unshift({ t: 'ins', v: b[jj - 1] }); jj--;
      } else {
        ops.unshift({ t: 'del', v: a[ii - 1] }); ii--;
      }
    }
    return ops;
  }

  /* ── Tokenise a line into words + whitespace chunks ── */
  function tok(s) { return s.match(/\S+|\s+/g) || []; }

  /* ── Word-level diff HTML for one side of a modified line pair ── */
  function wordHtml(oldLine, newLine, side) {
    var ta = tok(oldLine), tb = tok(newLine);
    if (ta.length * tb.length > 40000) {
      return esc(side === 'del' ? oldLine : newLine);
    }
    var ops = lcs(ta, tb);
    if (side === 'del') {
      return ops.filter(function (o) { return o.t !== 'ins'; }).map(function (o) {
        return o.t === 'del'
          ? '<mark class="wd-del">' + esc(o.v) + '</mark>'
          : esc(o.v);
      }).join('');
    } else {
      return ops.filter(function (o) { return o.t !== 'del'; }).map(function (o) {
        return o.t === 'ins'
          ? '<mark class="wd-ins">' + esc(o.v) + '</mark>'
          : esc(o.v);
      }).join('');
    }
  }

  /* ── Line count label ── */
  function setLineCount(id, text) {
    var n = text ? text.split('\n').length : 0;
    document.getElementById(id).textContent = n + (n === 1 ? ' line' : ' lines');
  }

  /* ── Main diff runner ── */
  var timer = null;

  function runDiff() {
    var origTA  = document.getElementById('diff-original');
    var modTA   = document.getElementById('diff-modified');
    var outDiv  = document.getElementById('diff-output');
    var outWrap = document.getElementById('diff-output-wrap');
    var stats   = document.getElementById('diff-stats');

    var original = origTA.value;
    var modified = modTA.value;

    setLineCount('orig-line-count', original);
    setLineCount('mod-line-count', modified);

    if (!original && !modified) {
      outWrap.style.display = 'none';
      stats.style.display   = 'none';
      return;
    }

    var oldLines = original.split('\n');
    var newLines = modified.split('\n');

    if (oldLines.length > 3000 || newLines.length > 3000) {
      outDiv.textContent = 'Text too large for live diff (max 3 000 lines per side).';
      outWrap.style.display = '';
      stats.style.display   = 'none';
      return;
    }

    /* Line-level diff */
    var ops = lcs(oldLines, newLines);

    /* Group adjacent del+ins as a modification pair */
    var blocks = [], i = 0;
    while (i < ops.length) {
      var op = ops[i];
      if (op.t === 'del' && i + 1 < ops.length && ops[i + 1].t === 'ins') {
        blocks.push({ t: 'mod', old: op.v, 'new': ops[i + 1].v });
        i += 2;
      } else {
        blocks.push(op);
        i++;
      }
    }

    /* Render */
    var added = 0, removed = 0, unchanged = 0, parts = [];

    blocks.forEach(function (b) {
      if (b.t === 'eq') {
        unchanged++;
        parts.push(
          '<div class="dl dl-eq">' +
            '<span class="dl-gutter"> </span>' +
            '<span class="dl-text">' + esc(b.v) + '</span>' +
          '</div>'
        );
      } else if (b.t === 'del') {
        removed++;
        parts.push(
          '<div class="dl dl-del">' +
            '<span class="dl-gutter">-</span>' +
            '<span class="dl-text">' + esc(b.v) + '</span>' +
          '</div>'
        );
      } else if (b.t === 'ins') {
        added++;
        parts.push(
          '<div class="dl dl-ins">' +
            '<span class="dl-gutter">+</span>' +
            '<span class="dl-text">' + esc(b.v) + '</span>' +
          '</div>'
        );
      } else if (b.t === 'mod') {
        removed++; added++;
        parts.push(
          '<div class="dl dl-del">' +
            '<span class="dl-gutter">-</span>' +
            '<span class="dl-text">' + wordHtml(b.old, b['new'], 'del') + '</span>' +
          '</div>' +
          '<div class="dl dl-ins">' +
            '<span class="dl-gutter">+</span>' +
            '<span class="dl-text">' + wordHtml(b.old, b['new'], 'ins') + '</span>' +
          '</div>'
        );
      }
    });

    if (added === 0 && removed === 0) {
      outDiv.innerHTML = '<div class="dl dl-identical">Texts are identical — no differences found.</div>';
    } else {
      outDiv.innerHTML = parts.join('');
    }

    outWrap.style.display = '';
    document.getElementById('diff-stat-added').textContent     = '+' + added     + ' added';
    document.getElementById('diff-stat-removed').textContent   = '-' + removed   + ' removed';
    document.getElementById('diff-stat-unchanged').textContent = unchanged + ' unchanged';
    stats.style.display = 'flex';
  }

  function schedule() {
    clearTimeout(timer);
    timer = setTimeout(runDiff, 320);
  }

  /* ── Event wiring ── */
  document.getElementById('diff-original').addEventListener('input', schedule);
  document.getElementById('diff-modified').addEventListener('input', schedule);

  document.getElementById('diff-swap-btn').addEventListener('click', function () {
    var origTA = document.getElementById('diff-original');
    var modTA  = document.getElementById('diff-modified');
    var tmp = origTA.value;
    origTA.value = modTA.value;
    modTA.value  = tmp;
    runDiff();
  });

  document.getElementById('diff-clear-btn').addEventListener('click', function () {
    document.getElementById('diff-original').value       = '';
    document.getElementById('diff-modified').value       = '';
    document.getElementById('diff-output-wrap').style.display = 'none';
    document.getElementById('diff-stats').style.display       = 'none';
    setLineCount('orig-line-count', '');
    setLineCount('mod-line-count', '');
  });

  document.getElementById('diff-copy-btn').addEventListener('click', function () {
    var lines = document.querySelectorAll('#diff-output .dl');
    var text = Array.from(lines).map(function (line) {
      var gutter  = (line.querySelector('.dl-gutter').textContent || ' ').trim();
      var content = line.querySelector('.dl-text').textContent || '';
      return (gutter || ' ') + ' ' + content;
    }).join('\n');

    var btn = document.getElementById('diff-copy-btn');
    var reset = function () { btn.textContent = 'Copy diff'; };

    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(text).then(function () {
        btn.textContent = 'Copied!';
        setTimeout(reset, 2000);
      }).catch(function () {
        fallbackCopy(text, btn, reset);
      });
    } else {
      fallbackCopy(text, btn, reset);
    }
  });

  function fallbackCopy(text, btn, reset) {
    var ta = document.createElement('textarea');
    ta.value = text;
    ta.style.position = 'fixed';
    ta.style.opacity  = '0';
    document.body.appendChild(ta);
    ta.select();
    try { document.execCommand('copy'); btn.textContent = 'Copied!'; } catch (e) { btn.textContent = 'Copy failed'; }
    document.body.removeChild(ta);
    setTimeout(reset, 2000);
  }

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
