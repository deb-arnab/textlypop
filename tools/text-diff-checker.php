<?php
$tool_slug   = 'text-diff-checker';
$tool_name   = 'Text Diff Checker';

$page_title  = 'Compare Two Texts — Free Text Compare Tool | TextlyPop';
$meta_desc   = 'Compare two texts online and see exactly what changed. Free text comparison tool that highlights added, removed and modified lines word by word. No signup.';
$canonical_url = 'https://textlypop.com/tools/text-diff-checker';
$og_title    = 'Compare Two Texts Online — Free Text Compare Tool';
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
        "text": "Paste the original text in the left panel and the revised version in the right, and the comparison runs automatically. A longest-common-subsequence algorithm — the approach the classic Unix diff tool pioneered — computes the minimum set of insertions and deletions between the two texts, so the result pinpoints only the lines and words that actually differ."
      }
    },
    {
      "@type": "Question",
      "name": "What do the colours in the diff result mean?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Green lines with a + prefix were added; red lines with a - prefix were removed; unprefixed lines are unchanged. When a line was edited rather than replaced, the old and new versions appear as a red/green pair with the specific changed words highlighted, so a one-word correction stands out in a long paragraph."
      }
    },
    {
      "@type": "Question",
      "name": "Can I compare documents, essays or config files?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — anything that is plain text: essays, emails, contracts, source code, config files, JSON, CSV or Markdown, up to 3,000 lines per side. Paste formatted documents as text; the formatting is dropped but the words compare cleanly."
      }
    },
    {
      "@type": "Question",
      "name": "Can I use the diff checker to detect plagiarism?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A diff checker is not a plagiarism detector, but it is ideal for closely comparing two versions of the same document — a submitted essay against an earlier draft, or an edited article against the original. It highlights every insertion, deletion and change, which is often more precise than a similarity score when you need to see exactly what was modified."
      }
    },
    {
      "@type": "Question",
      "name": "How do I copy or save the diff result?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Click Copy diff to copy the comparison in unified diff format — added lines prefixed with +, removed lines with -. This is the same convention used by Git and code review tools, so the output pastes cleanly into an email, issue tracker or review comment, and anyone technical will read it without explanation."
      }
    },
    {
      "@type": "Question",
      "name": "How do I compare two texts for differences online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Paste the first version into the left panel and the second into the right — the comparison runs on its own, with no button to press and no file upload. Green marks text that appears only in the second version, red marks text that appears only in the first, and unmarked lines are identical in both. The whole comparison happens inside your browser, so no copy of your text is stored anywhere."
      }
    },
    {
      "@type": "Question",
      "name": "Can I compare two strings or two lines rather than whole documents?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, and short comparisons are where word-level highlighting is most useful. Paste one string into each panel and the tool marks the exact characters and words that differ instead of just reporting that the two lines are not equal. This is the quickest way to spot a transposed digit, a trailing space that breaks a lookup, or a smart quote that has replaced a straight one."
      }
    },
    {
      "@type": "Question",
      "name": "Does the tool measure text similarity as a percentage?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No — it reports the differences themselves rather than a similarity score. A percentage tells you two documents are 94% alike but not which 6% changed, whereas the diff shows every insertion and deletion so you can judge whether the changes are trivial or substantive. If the two texts are identical the result comes back empty."
      }
    },
    {
      "@type": "Question",
      "name": "Why does the diff show changes when the texts look the same?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Almost always because of invisible characters: trailing spaces, a tab where the other version has spaces, non-breaking spaces pasted from a web page, curly quotation marks from Word, or Windows line endings meeting Unix line endings. These count as real differences even though they render identically. Removing extra spaces from both versions before comparing normalises most of them."
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
    <h1>Text compare and diff checker</h1>
    <p>Compare two texts and see exactly what changed — line by line, word by word. Paste the original on the left and the revised version on the right.</p>
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

    <h2>What a text comparison tool shows you</h2>
    <p>A text comparison tool answers one question: what is different between these two versions? Paste the original into the left panel and the revised version into the right, and the comparison runs automatically. Every line that exists only in the second version is marked as an addition, every line that exists only in the first is marked as a removal, and lines that were edited rather than replaced are shown as a pair with the individual changed words highlighted inside them. Nothing is uploaded — the comparison runs in your browser, which is why it is instant and why confidential contracts, medical notes or unreleased copy are safe to compare here.</p>
    <p>That makes it equally useful whether you want to compare two texts word for word, compare two paragraphs after an edit, or compare two strings of code. The tool handles up to 3,000 lines per side, so a full chapter, a long config file or an entire terms-of-service document all fit comfortably.</p>

    <h2>How to find the difference between two texts</h2>
    <p>Comparing by eye fails quickly. Two versions of a paragraph that differ by one word look identical during a read-through, and the difference you are hunting for is usually the one you skim past. A diff does the comparison mechanically: it finds the longest sequence of lines the two texts share, then reports everything outside that sequence as inserted or deleted. Because it looks for the <em>minimum</em> set of edits, a single new sentence in paragraph three is reported as one addition rather than flagging every paragraph after it as changed.</p>
    <p>The practical workflow is the same regardless of what you are checking. Put the older or official version on the left, put the newer or received version on the right, and read the coloured result from the top. Use Swap if you loaded them the wrong way round — the changes invert, so an addition becomes a deletion. Copy diff gives you the result in unified diff format, the same <code>+</code>/<code>-</code> convention Git and code review tools use, which pastes cleanly into an email or an issue tracker.</p>

    <h2>Text comparison terms explained</h2>
    <p>Search results for text comparison use several names for overlapping ideas. They are worth separating, because they answer different questions:</p>
    <div class="table-scroll">
      <table class="seo-table">
        <thead>
          <tr><th>Term</th><th>What it means</th><th>What it answers</th></tr>
        </thead>
        <tbody>
          <tr><td>Diff</td><td>The list of insertions and deletions that turns one text into the other</td><td>What exactly changed, and where</td></tr>
          <tr><td>String compare</td><td>A character-by-character check of two short pieces of text</td><td>Are these two strings identical or not</td></tr>
          <tr><td>Text match</td><td>A check for whether one text contains or equals another</td><td>Do these texts correspond</td></tr>
          <tr><td>Text similarity</td><td>A score, usually a percentage, of how alike two texts are overall</td><td>How close are they, roughly</td></tr>
          <tr><td>Paragraph comparison</td><td>A diff applied to prose rather than code, usually with word-level highlighting</td><td>Which sentences an editor touched</td></tr>
        </tbody>
      </table>
    </div>
    <p>This tool is a diff, which is the most informative of the five: a similarity percentage tells you two documents are 94% alike, but a diff shows you the 6% and lets you decide whether it matters. If you only need to know whether two texts are byte-identical, the diff result will simply come back empty.</p>

    <h2>The history of diff</h2>
    <p>Comparing two versions of a text automatically is a 1970s invention. The original <code>diff</code> program was written by Douglas McIlroy at Bell Labs in 1974 for Unix, built on what became the Hunt–McIlroy algorithm for finding the longest common subsequence between two files. The idea proved foundational: every version control system since — from RCS through Subversion to Git — is essentially machinery built around diffs, storing and displaying changes rather than whole copies. The green-for-added, red-for-removed convention that this tool uses comes straight from that lineage and is now the universal visual language of change tracking, from GitHub pull requests to Wikipedia edit histories.</p>

    <h2>Line-level and word-level differences</h2>
    <p>The diff checker compares text at two levels of detail. At the line level it identifies which lines were added, removed, or modified. When a line is modified rather than completely replaced, the tool also runs a word-level comparison on that specific line pair, highlighting exactly which words changed inside it. This makes it easy to spot a single word correction in a long paragraph without reading the whole line twice.</p>

    <h2>Who uses a text diff checker</h2>
    <p>Writers use the diff checker to compare draft versions of an essay or article and see what they or an editor changed. Developers use it to compare config files, documentation, or any text that is not in version control. Students use it to compare their submission against a revised or corrected version. Translators use it to track changes in the source document between review cycles. Anyone who has two versions of a text and wants to know exactly what is different will find it useful.</p>
    <p>Legal and contract review is a heavy user: comparing a returned contract against the version you sent catches the clause that was quietly reworded. Content teams compare a page before and after a rewrite to build a changelog. QA testers compare expected output against actual output. Academics compare a manuscript against the copy-edited proof before signing it off.</p>
    <p>Comparison is often the second step rather than the first. If the two texts arrived with inconsistent formatting, running both through <a href="/tools/remove-extra-spaces">remove extra spaces</a> or <a href="/tools/remove-line-breaks">remove line breaks</a> first strips out cosmetic differences so the diff reports only real edits. If you want length rather than difference, the <a href="/tools/word-counter">word counter</a> gives word and character totals for each version, and the <a href="/tools/duplicate-line-remover">duplicate line remover</a> is the better choice when the question is which lines repeat within one list rather than how two lists differ.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How does the text diff checker work?</p>
      <p class="faq-a">Paste the original text in the left panel and the revised version in the right, and the comparison runs automatically — no button needed. Under the hood, a longest-common-subsequence algorithm computes the minimum set of insertions and deletions that turns one text into the other, the same approach the classic Unix diff tool pioneered. That minimality matters: instead of flagging everything after the first change, the result pinpoints only the lines and words that actually differ.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What do the colours in the diff result mean?</p>
      <p class="faq-a">Green lines with a <code>+</code> prefix exist only in the modified version — they were added. Red lines with a <code>-</code> prefix exist only in the original — they were removed. Unprefixed lines are unchanged. When a line was edited rather than replaced, the old and new versions appear as a red/green pair with the specific changed words highlighted in a stronger shade inside each line, so you can spot a one-word correction in a long paragraph without re-reading the whole thing.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I compare documents, essays or config files?</p>
      <p class="faq-a">Yes — anything that is plain text: essays, emails, contracts, source code, config files, JSON, CSV or Markdown, up to 3,000 lines per side. Formatted documents like Word files should be pasted as text; the formatting is dropped but the words compare cleanly. Line-based comparison works best when the text has natural line breaks, so for one long paragraph the word-level highlighting inside the modified line does the heavy lifting.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I use the diff checker to detect plagiarism?</p>
      <p class="faq-a">A diff checker is not a plagiarism detector, but it is ideal for closely comparing two versions of the same document — a submitted essay against an earlier draft, a contract against the previous revision, or an edited article against the original. It highlights every insertion, deletion and change line by line, which is often more precise than a similarity score when you need to see exactly what was modified.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I copy or save the diff result?</p>
      <p class="faq-a">Click Copy diff above the result panel to copy the comparison in unified diff format — each added line prefixed with <code>+</code> and each removed line with <code>-</code>. This is the same plain-text convention used by Git and code review tools, so the output pastes cleanly into an email, a document, an issue tracker or a code review comment, and anyone technical will read it without explanation. For a permanent record, paste it into a text file and save it alongside the documents you compared.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I compare two texts for differences online?</p>
      <p class="faq-a">Paste the first version into the left panel and the second into the right — the comparison runs on its own, with no button to press and no file upload. Read the result from the top: green marks text that appears only in the second version, red marks text that appears only in the first, and unmarked lines are identical in both. Because the whole comparison happens inside your browser, there is no size limit imposed by a server and no copy of your text stored anywhere; closing the tab is all it takes to discard it.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I compare two strings or two lines rather than whole documents?</p>
      <p class="faq-a">Yes, and short comparisons are where word-level highlighting is most useful. Paste one string into each panel and the tool marks the exact characters and words that differ instead of just reporting that the two lines are not equal. This is the quickest way to spot a transposed digit in a reference number, a trailing space that breaks a lookup, or a smart quote that has replaced a straight one — differences that are effectively invisible when you read the two strings side by side.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the tool measure text similarity as a percentage?</p>
      <p class="faq-a">No — it reports the differences themselves rather than a similarity score, which is usually the more useful answer. A percentage tells you two documents are 94% alike but not which 6% changed, whereas the diff shows you every insertion and deletion so you can judge whether the changes are trivial or substantive. If the two texts are identical the result comes back empty, which is the unambiguous version of a 100% match.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does the diff show changes when the texts look the same?</p>
      <p class="faq-a">Almost always because of invisible characters. Trailing spaces at the end of a line, a tab where the other version has spaces, non-breaking spaces pasted in from a web page, curly quotation marks pasted in from Word, or Windows line endings meeting Unix line endings all count as real differences even though they render identically. Running both versions through <a href="/tools/remove-extra-spaces">remove extra spaces</a> before comparing normalises most of these and leaves only the edits you actually care about.</p>
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
