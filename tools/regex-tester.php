<?php
$tool_slug   = 'regex-tester';
$tool_name   = 'Regex Tester';

$page_title  = 'Regex Tester — Test Regular Expressions Online | TextlyPop';
$meta_desc   = 'Test and debug regular expressions online with live match highlighting, capture groups and flags. Free JavaScript regex tester. No signup required.';
$canonical_url = 'https://textlypop.com/tools/regex-tester';
$og_title    = 'Free Regex Tester — TextlyPop';
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
  "name": "Regex Tester",
  "url": "https://textlypop.com/tools/regex-tester",
  "description": "Test and debug regular expressions online with live match highlighting, capture groups and flags.",
  "applicationCategory": "DeveloperApplication",
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
      "name": "Which regex flavor does this tester use?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It uses the JavaScript (ECMAScript) regular expression engine built into your browser, the same one that runs inside every website and Node.js application. That means the syntax here matches what you would write in JavaScript exactly — lookaheads, named groups with (?<name>...), and Unicode property escapes with the u flag all work. It differs in small ways from PCRE, Python's re module or .NET regex, so a pattern copied from another language may need minor adjustments, most commonly around lookbehind support and possessive quantifiers, which JavaScript handles differently."
      }
    },
    {
      "@type": "Question",
      "name": "What do the g, i, m, s, u and y flags do?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Flags change how the whole pattern behaves. g (global) finds every match instead of stopping at the first. i (ignore case) makes letters case-insensitive. m (multiline) makes ^ and $ match at the start and end of each line rather than the whole string. s (dotall) lets the dot match newline characters too. u (unicode) enables full Unicode and property escapes. y (sticky) anchors each match to the exact position where the previous one ended. Toggle them on and off here to watch the highlighted matches update instantly."
      }
    },
    {
      "@type": "Question",
      "name": "How do capture groups work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Parentheses in a pattern create a capture group that remembers the part of the text it matched, so a pattern like (\\d{4})-(\\d{2})-(\\d{2}) pulls the year, month and day out of a date as groups 1, 2 and 3. This tester lists every group under each match so you can see exactly what was captured. Use (?<year>\\d{4}) to give a group a name, or (?:...) for a non-capturing group when you need to group part of a pattern without saving it."
      }
    },
    {
      "@type": "Question",
      "name": "Why does my regex match too much or too little?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The usual culprit is greedy quantifiers. By default * and + match as much as possible, so .* in a tag-stripping pattern will swallow everything up to the last closing bracket on the line. Add a question mark to make them lazy — .*? matches as little as possible — or replace the dot with a more specific character class like [^>]* that cannot cross the boundary you care about. Testing against realistic sample text here, with several edge cases pasted in, is the fastest way to see greedy behaviour and fix it."
      }
    },
    {
      "@type": "Question",
      "name": "Why am I getting an \"Invalid regular expression\" error?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The pattern is not valid JavaScript regex syntax, usually because a special character is unbalanced or unescaped. Unmatched parentheses or square brackets are the most common cause, followed by a trailing backslash or a quantifier with nothing before it. Characters with special meaning — . * + ? ( ) [ ] { } ^ $ | \\ / — must be escaped with a backslash when you want to match them literally, so to match a real dot you write \\. and to match a slash you write \\/. The error message from the browser appears below the pattern to help you locate the problem."
      }
    },
    {
      "@type": "Question",
      "name": "Is my test data kept private?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The pattern and the text you test against are processed entirely in your browser using the native RegExp engine, and nothing is ever sent to a server, logged or stored. That makes it safe to test regexes against real log files, production data or anything sensitive. You can confirm this by loading the page, disconnecting from the internet, and watching the tool keep working offline."
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
        ['name' => 'Enter your pattern', 'text' => 'Type your regular expression into the pattern field between the two slashes. The browser validates it as you type.'],
        ['name' => 'Choose flags', 'text' => 'Toggle the flags you need — g for all matches, i for case-insensitive, m for multiline and more.'],
        ['name' => 'Paste your test text', 'text' => 'Paste the text you want to test into the box below. Every match is highlighted live as you type.'],
        ['name' => 'Review the matches', 'text' => 'Read the match list to inspect each match and its capture groups, then copy the results if you need them.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Regex tester</h1>
    <p>Test and debug regular expressions with live match highlighting, capture groups and flags. Runs entirely in your browser.</p>
  </div>

  <div class="rx-tool" id="rx-tool">

    <!-- Pattern + flags -->
    <div class="rx-pattern-row">
      <div class="rx-pattern-wrap" id="rx-pattern-wrap">
        <span class="rx-delim">/</span>
        <input
          type="text"
          id="rx-pattern"
          class="rx-pattern"
          placeholder="\b\w+@\w+\.\w+\b"
          aria-label="Regular expression pattern"
          spellcheck="false"
          autocapitalize="off"
          autocomplete="off">
        <span class="rx-delim">/</span>
        <span class="rx-flags-display" id="rx-flags-display">g</span>
      </div>
    </div>

    <div class="rx-flags" role="group" aria-label="Regex flags">
      <label class="rx-flag" title="Global — find all matches">
        <input type="checkbox" value="g" checked> <span><strong>g</strong> global</span>
      </label>
      <label class="rx-flag" title="Ignore case">
        <input type="checkbox" value="i"> <span><strong>i</strong> ignore case</span>
      </label>
      <label class="rx-flag" title="Multiline — ^ and $ match each line">
        <input type="checkbox" value="m"> <span><strong>m</strong> multiline</span>
      </label>
      <label class="rx-flag" title="Dotall — . matches newlines">
        <input type="checkbox" value="s"> <span><strong>s</strong> dotall</span>
      </label>
      <label class="rx-flag" title="Unicode">
        <input type="checkbox" value="u"> <span><strong>u</strong> unicode</span>
      </label>
      <label class="rx-flag" title="Sticky — match from lastIndex only">
        <input type="checkbox" value="y"> <span><strong>y</strong> sticky</span>
      </label>
    </div>

    <!-- Error / status -->
    <div class="rx-status" id="rx-status" aria-live="polite"></div>

    <!-- Test string with highlight overlay -->
    <div class="rx-panel">
      <div class="rx-panel-header">
        <span class="rx-panel-label">Test string</span>
        <button class="btn btn-clear" data-targets="rx-input">Clear</button>
      </div>
      <div class="rx-editor" id="rx-editor">
        <div class="rx-backdrop" id="rx-backdrop" aria-hidden="true"><div class="rx-highlights" id="rx-highlights"></div></div>
        <textarea
          id="rx-input"
          class="rx-textarea"
          placeholder="Paste the text you want to test your regex against…"
          aria-label="Test string"
          data-save-key="regex-tester"
          spellcheck="false"></textarea>
      </div>
    </div>

    <!-- Results -->
    <div class="rx-results">
      <div class="rx-results-header">
        <span class="rx-match-count" id="rx-match-count">0 matches</span>
        <button class="btn btn-copy" data-target="rx-matches-output">Copy matches</button>
      </div>
      <div class="rx-match-list" id="rx-match-list"></div>
      <textarea id="rx-matches-output" class="rx-hidden-output" readonly aria-hidden="true" tabindex="-1"></textarea>
    </div>

    <!-- Cheat sheet -->
    <div class="rx-reference">
      <div class="rx-ref-header">
        <span class="rx-ref-title">Regex quick reference</span>
        <button class="rx-ref-toggle" id="rx-ref-toggle">Show</button>
      </div>
      <div class="rx-ref-table-wrap hidden" id="rx-ref-table-wrap">
        <table class="rx-ref-table">
          <thead>
            <tr><th>Token</th><th>Matches</th></tr>
          </thead>
          <tbody>
            <tr><td>.</td><td>Any character except newline</td></tr>
            <tr><td>\d</td><td>A digit (0–9)</td></tr>
            <tr><td>\w</td><td>A word character (letter, digit, underscore)</td></tr>
            <tr><td>\s</td><td>Any whitespace character</td></tr>
            <tr><td>\b</td><td>A word boundary</td></tr>
            <tr><td>^ &nbsp; $</td><td>Start / end of string (or line with m)</td></tr>
            <tr><td>*</td><td>0 or more of the previous token</td></tr>
            <tr><td>+</td><td>1 or more of the previous token</td></tr>
            <tr><td>?</td><td>0 or 1 (or makes a quantifier lazy)</td></tr>
            <tr><td>{2,5}</td><td>Between 2 and 5 of the previous token</td></tr>
            <tr><td>[abc]</td><td>Any one of a, b or c</td></tr>
            <tr><td>[^abc]</td><td>Any character except a, b or c</td></tr>
            <tr><td>(…)</td><td>Capture group</td></tr>
            <tr><td>(?:…)</td><td>Non-capturing group</td></tr>
            <tr><td>(?&lt;name&gt;…)</td><td>Named capture group</td></tr>
            <tr><td>a|b</td><td>a or b (alternation)</td></tr>
            <tr><td>(?=…)</td><td>Positive lookahead</td></tr>
            <tr><td>(?!…)</td><td>Negative lookahead</td></tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send matches to:</span>
    <button class="send-to-btn" data-from="rx-matches-output" data-to-tool="find-and-replace">Find and replace</button>
    <button class="send-to-btn" data-from="rx-matches-output" data-to-tool="duplicate-line-remover">Remove duplicates</button>
    <button class="send-to-btn" data-from="rx-matches-output" data-to-tool="word-counter">Word counter</button>
  </div>

  <p class="kbd-hint mt-8">
    <kbd class="kbd">Ctrl</kbd> + <kbd class="kbd">L</kbd> clear test string
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

    <h2>About regular expressions</h2>
    <p>A regular expression, or regex, is a compact pattern that describes a set of strings. Instead of searching for one fixed word, a regex lets you search for a shape — an email address, a phone number, a date, an HTML tag — and find every piece of text that fits it. That power is why regex appears in almost every programming language, in text editors and command-line tools like grep and sed, and in the search-and-replace boxes of professional software. The trade-off is that regex syntax is famously terse, so an interactive tester that highlights matches as you type is the fastest way to build a pattern correctly and understand why it does or does not match.</p>

    <h2>History of regular expressions</h2>
    <p>The idea began in 1951 with mathematician Stephen Cole Kleene, who formalised "regular sets" to describe patterns in the theory of computation — the asterisk quantifier is still called the Kleene star in his honour. Regular expressions moved from theory to practice in the late 1960s when Ken Thompson built them into the QED and ed editors and, soon after, the Unix grep command. The syntax most developers know today was shaped by Perl in the late 1980s, whose powerful extensions became the de facto standard and were later codified as PCRE (Perl Compatible Regular Expressions). JavaScript's regex engine, which powers this tester, follows the ECMAScript specification and is closely related to that Perl-derived tradition.</p>

    <h2>How regex flags work</h2>
    <p>Flags are single letters appended after the closing delimiter that change how the entire pattern is applied. The global flag (g) tells the engine to find every match rather than stopping at the first, which is what turns a search into a find-all. The ignore-case flag (i) makes letters match regardless of case. The multiline flag (m) changes the anchors ^ and $ so they match at the start and end of each line instead of the whole string, and the dotall flag (s) lets the dot match newline characters. The unicode flag (u) unlocks full Unicode handling and property escapes, and the sticky flag (y) forces each match to begin exactly where the last one ended. Toggling these on this page updates the highlighted results instantly, which makes flags much easier to learn by experiment than by reading.</p>

    <h2>Common regex use cases</h2>
    <p>Regular expressions are the standard tool for validating and extracting structured text: checking that an email address or postal code is well formed, pulling all the dates or dollar amounts out of a document, or stripping HTML tags from a block of content. Developers use them to search codebases, rewrite URLs on web servers, and parse log files, while writers and data-cleaners use them inside editors to reformat lists and fix inconsistent punctuation across thousands of lines at once. Because the same pattern can transform a whole file in one pass, getting the regex exactly right matters — and testing it against real, messy sample text before you run it is what prevents a pattern from quietly matching too much or too little.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">Which regex flavor does this tester use?</p>
      <p class="faq-a">It uses the JavaScript (ECMAScript) regular expression engine built into your browser, the same one that runs inside every website and Node.js application. That means the syntax here matches what you would write in JavaScript exactly — lookaheads, named groups with <code>(?&lt;name&gt;...)</code>, and Unicode property escapes with the <code>u</code> flag all work. It differs in small ways from PCRE, Python's <code>re</code> module or .NET regex, so a pattern copied from another language may need minor adjustments, most commonly around lookbehind support and possessive quantifiers, which JavaScript handles differently.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What do the g, i, m, s, u and y flags do?</p>
      <p class="faq-a">Flags change how the whole pattern behaves. <code>g</code> (global) finds every match instead of stopping at the first. <code>i</code> (ignore case) makes letters case-insensitive. <code>m</code> (multiline) makes <code>^</code> and <code>$</code> match at the start and end of each line rather than the whole string. <code>s</code> (dotall) lets the dot match newline characters too. <code>u</code> (unicode) enables full Unicode and property escapes. <code>y</code> (sticky) anchors each match to the exact position where the previous one ended. Toggle them on and off here to watch the highlighted matches update instantly.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do capture groups work?</p>
      <p class="faq-a">Parentheses in a pattern create a capture group that remembers the part of the text it matched, so a pattern like <code>(\d{4})-(\d{2})-(\d{2})</code> pulls the year, month and day out of a date as groups 1, 2 and 3. This tester lists every group under each match so you can see exactly what was captured. Use <code>(?&lt;year&gt;\d{4})</code> to give a group a name, or <code>(?:...)</code> for a non-capturing group when you need to group part of a pattern without saving it.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why does my regex match too much or too little?</p>
      <p class="faq-a">The usual culprit is greedy quantifiers. By default <code>*</code> and <code>+</code> match as much as possible, so <code>.*</code> in a tag-stripping pattern will swallow everything up to the last closing bracket on the line. Add a question mark to make them lazy — <code>.*?</code> matches as little as possible — or replace the dot with a more specific character class like <code>[^&gt;]*</code> that cannot cross the boundary you care about. Testing against realistic sample text here, with several edge cases pasted in, is the fastest way to see greedy behaviour and fix it.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why am I getting an "Invalid regular expression" error?</p>
      <p class="faq-a">The pattern is not valid JavaScript regex syntax, usually because a special character is unbalanced or unescaped. Unmatched parentheses or square brackets are the most common cause, followed by a trailing backslash or a quantifier with nothing before it. Characters with special meaning — <code>. * + ? ( ) [ ] { } ^ $ | \ /</code> — must be escaped with a backslash when you want to match them literally, so to match a real dot you write <code>\.</code> and to match a slash you write <code>\/</code>. The exact error message from the browser appears below the pattern to help you locate the problem.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my test data kept private?</p>
      <p class="faq-a">Yes. The pattern and the text you test against are processed entirely in your browser using the native RegExp engine, and nothing is ever sent to a server, logged or stored. That makes it safe to test regexes against real log files, production data or anything sensitive. You can confirm this by loading the page, disconnecting from the internet, and watching the tool keep working offline.</p>
    </div>

  </div>

</div>

<!-- Regex tester CSS -->
<style>
.rx-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

/* Pattern row */
.rx-pattern-row { padding: 16px 16px 10px; background: var(--bg-2); border-bottom: 1px solid var(--border); }

.rx-pattern-wrap {
  display: flex;
  align-items: center;
  gap: 2px;
  border: 1.5px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  padding: 0 12px;
  transition: border-color var(--transition);
}

.rx-pattern-wrap:focus-within { border-color: var(--accent); }
.rx-pattern-wrap.rx-invalid { border-color: var(--danger); }

.rx-delim { color: var(--text-3); font-family: var(--font-mono); font-size: 1.05rem; user-select: none; }

.rx-pattern {
  flex: 1;
  padding: 12px 4px;
  border: none;
  background: transparent;
  font-family: var(--font-mono);
  font-size: 0.95rem;
  color: var(--text);
  outline: none;
  min-width: 0;
}

.rx-flags-display {
  font-family: var(--font-mono);
  font-size: 0.95rem;
  color: var(--accent);
  font-weight: 600;
  min-width: 12px;
}

/* Flags */
.rx-flags {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  padding: 0 16px 14px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
}

.rx-flag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 10px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  cursor: pointer;
  font-size: 0.8125rem;
  color: var(--text-2);
  user-select: none;
  transition: border-color var(--transition), background var(--transition), color var(--transition);
}

.rx-flag input { display: none; }
.rx-flag strong { font-family: var(--font-mono); color: var(--text); }
.rx-flag:hover { border-color: var(--accent); }
.rx-flag:has(input:checked) { border-color: var(--accent); background: var(--accent-light); color: var(--accent-dark); }
.rx-flag:has(input:checked) strong { color: var(--accent-dark); }
[data-theme="dark"] .rx-flag:has(input:checked) { background: var(--accent-dim); color: #5DCAA5; }
[data-theme="dark"] .rx-flag:has(input:checked) strong { color: #5DCAA5; }

/* Status / error line */
.rx-status {
  padding: 0 16px;
  max-height: 0;
  overflow: hidden;
  font-size: 0.8125rem;
  font-family: var(--font-mono);
  color: var(--danger);
  transition: max-height var(--transition), padding var(--transition);
  background: var(--bg-2);
}

.rx-status.show { max-height: 80px; padding: 10px 16px; border-bottom: 1px solid var(--border); }

/* Editor with highlight overlay */
.rx-panel { display: flex; flex-direction: column; }

.rx-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 14px;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.rx-panel-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.rx-editor { position: relative; min-height: 200px; }

/* Shared metrics so backdrop and textarea align exactly */
.rx-backdrop,
.rx-textarea {
  margin: 0;
  padding: 14px;
  border: none;
  font-family: var(--font-mono);
  font-size: 0.875rem;
  line-height: 1.7;
  letter-spacing: normal;
  white-space: pre-wrap;
  overflow-wrap: break-word;
  word-break: break-word;
  box-sizing: border-box;
}

.rx-backdrop {
  position: absolute;
  inset: 0;
  overflow: auto;
  color: var(--text);
  background: var(--bg);
  pointer-events: none;
  z-index: 1;
}

.rx-highlights { min-height: 100%; }

.rx-textarea {
  position: relative;
  width: 100%;
  min-height: 200px;
  resize: vertical;
  color: transparent;
  background: transparent;
  caret-color: var(--text);
  outline: none;
  z-index: 2;
}

.rx-textarea::placeholder { color: var(--text-3); }

.rx-hl { background: var(--accent-light); color: var(--accent-dark); border-radius: 2px; }
[data-theme="dark"] .rx-hl { background: rgba(93, 202, 165, 0.28); color: #cdeee1; }
.rx-hl-alt { background: rgba(214, 158, 46, 0.28); color: inherit; border-radius: 2px; }
.rx-hl-zero { display: inline-block; width: 2px; margin: 0 -1px; background: var(--accent); vertical-align: text-bottom; height: 1em; }

/* Results */
.rx-results { border-top: 1px solid var(--border); background: var(--bg); }

.rx-results-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
}

.rx-match-count { font-size: 0.8125rem; font-weight: 600; color: var(--text-2); }

.rx-match-list { max-height: 340px; overflow-y: auto; }

.rx-match-item {
  padding: 10px 14px;
  border-bottom: 1px solid var(--border);
  font-size: 0.8125rem;
}

.rx-match-item:last-child { border-bottom: none; }

.rx-match-head {
  display: flex;
  align-items: baseline;
  gap: 10px;
  flex-wrap: wrap;
}

.rx-match-idx {
  font-size: 0.7rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--text-3);
  flex-shrink: 0;
}

.rx-match-text {
  font-family: var(--font-mono);
  color: var(--accent-dark);
  background: var(--accent-light);
  padding: 1px 6px;
  border-radius: 3px;
  word-break: break-all;
}

[data-theme="dark"] .rx-match-text { color: #5DCAA5; background: var(--accent-dim); }

.rx-match-pos { font-size: 0.75rem; color: var(--text-3); }

.rx-match-groups { margin-top: 6px; display: flex; flex-direction: column; gap: 3px; }

.rx-group {
  font-family: var(--font-mono);
  font-size: 0.78rem;
  color: var(--text-2);
  padding-left: 10px;
}

.rx-group-name { color: var(--text-3); }
.rx-group-val { color: var(--text); }
.rx-group-empty { color: var(--text-3); font-style: italic; }

.rx-empty-state {
  padding: 20px 14px;
  text-align: center;
  color: var(--text-3);
  font-size: 0.875rem;
}

.rx-hidden-output { position: absolute; left: -9999px; width: 1px; height: 1px; opacity: 0; }

/* Reference */
.rx-reference { border-top: 1px solid var(--border); background: var(--bg-2); }

.rx-ref-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
}

.rx-ref-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.rx-ref-toggle {
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

.rx-ref-toggle:hover { color: var(--accent); border-color: var(--accent); }

.rx-ref-table-wrap { overflow-x: auto; max-height: 340px; overflow-y: auto; border-top: 1px solid var(--border); }

.rx-ref-table { width: 100%; border-collapse: collapse; font-size: 0.8125rem; }

.rx-ref-table th {
  padding: 8px 14px;
  text-align: left;
  font-size: 0.7rem;
  font-weight: 600;
  color: var(--text-3);
  background: var(--bg-2);
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
}

.rx-ref-table td { padding: 7px 14px; border-bottom: 1px solid var(--border); color: var(--text); }
.rx-ref-table td:first-child { font-family: var(--font-mono); font-weight: 600; color: var(--accent); white-space: nowrap; }
.rx-ref-table tr:last-child td { border-bottom: none; }
.rx-ref-table tr:hover td { background: var(--bg-3); }

@media (max-width: 640px) {
  .rx-flag span { font-size: 0.75rem; }
}
</style>

<!-- Regex tester JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var patternEl   = document.getElementById('rx-pattern');
  var patternWrap = document.getElementById('rx-pattern-wrap');
  var flagsDisplay= document.getElementById('rx-flags-display');
  var flagBoxes   = document.querySelectorAll('.rx-flags input[type="checkbox"]');
  var statusEl    = document.getElementById('rx-status');
  var input       = document.getElementById('rx-input');
  var backdrop    = document.getElementById('rx-backdrop');
  var highlights  = document.getElementById('rx-highlights');
  var matchCount  = document.getElementById('rx-match-count');
  var matchList   = document.getElementById('rx-match-list');
  var matchesOut  = document.getElementById('rx-matches-output');
  var refToggle   = document.getElementById('rx-ref-toggle');
  var refWrap     = document.getElementById('rx-ref-table-wrap');

  function escapeHtml(s) {
    return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
  }

  function currentFlags() {
    var f = '';
    flagBoxes.forEach(function (b) { if (b.checked) f += b.value; });
    return f;
  }

  function buildRegex() {
    var src = patternEl.value;
    var flags = currentFlags();
    flagsDisplay.textContent = flags;
    if (!src) return { re: null, error: null, empty: true };
    try {
      return { re: new RegExp(src, flags), error: null, empty: false };
    } catch (e) {
      return { re: null, error: e.message, empty: false };
    }
  }

  function collectMatches(text, re) {
    var matches = [];
    var isGlobal = re.global || re.sticky;
    var guard = 0;
    if (isGlobal) {
      re.lastIndex = 0;
      var m;
      while ((m = re.exec(text)) !== null) {
        matches.push(m);
        if (m.index === re.lastIndex) re.lastIndex++;   // avoid zero-length loop
        if (++guard > 100000) break;
      }
    } else {
      var single = re.exec(text);
      if (single) matches.push(single);
    }
    return matches;
  }

  function renderHighlights(text, matches) {
    if (!matches.length) {
      highlights.innerHTML = escapeHtml(text) || '';
      return;
    }
    var out = '', last = 0;
    for (var i = 0; i < matches.length; i++) {
      var m = matches[i];
      var start = m.index;
      var end = m.index + m[0].length;
      if (start < last) continue;                       // skip overlaps defensively
      out += escapeHtml(text.slice(last, start));
      if (end > start) {
        var cls = (i % 2 === 0) ? 'rx-hl' : 'rx-hl rx-hl-alt';
        out += '<span class="' + cls + '">' + escapeHtml(text.slice(start, end)) + '</span>';
      } else {
        out += '<span class="rx-hl-zero"></span>';
      }
      last = end;
    }
    out += escapeHtml(text.slice(last));
    if (text.charAt(text.length - 1) === '\n') out += ' ';   // keep trailing line visible
    highlights.innerHTML = out;
  }

  function renderMatchList(matches) {
    if (!matches.length) {
      matchList.innerHTML = '<div class="rx-empty-state">No matches yet. Enter a pattern and some test text.</div>';
      matchesOut.value = '';
      return;
    }

    var html = '';
    for (var i = 0; i < matches.length; i++) {
      var m = matches[i];
      html += '<div class="rx-match-item">';
      html += '<div class="rx-match-head">';
      html += '<span class="rx-match-idx">Match ' + (i + 1) + '</span>';
      html += '<span class="rx-match-text">' + escapeHtml(m[0]) + '</span>';
      html += '<span class="rx-match-pos">index ' + m.index + '</span>';
      html += '</div>';

      var groupHtml = '';
      for (var g = 1; g < m.length; g++) {
        var val = m[g];
        groupHtml += '<div class="rx-group"><span class="rx-group-name">Group ' + g + ':</span> ' +
          (val === undefined
            ? '<span class="rx-group-empty">undefined</span>'
            : '<span class="rx-group-val">' + escapeHtml(val) + '</span>') +
          '</div>';
      }
      if (m.groups) {
        Object.keys(m.groups).forEach(function (name) {
          var gv = m.groups[name];
          groupHtml += '<div class="rx-group"><span class="rx-group-name">&lt;' + escapeHtml(name) + '&gt;:</span> ' +
            (gv === undefined
              ? '<span class="rx-group-empty">undefined</span>'
              : '<span class="rx-group-val">' + escapeHtml(gv) + '</span>') +
            '</div>';
        });
      }
      if (groupHtml) html += '<div class="rx-match-groups">' + groupHtml + '</div>';
      html += '</div>';
    }
    matchList.innerHTML = html;

    var joined = [];
    for (var j = 0; j < matches.length; j++) joined.push(matches[j][0]);
    matchesOut.value = joined.join('\n');
  }

  function setStatus(msg, isError) {
    if (!msg) {
      statusEl.classList.remove('show');
      statusEl.textContent = '';
      patternWrap.classList.remove('rx-invalid');
      return;
    }
    statusEl.textContent = msg;
    statusEl.classList.add('show');
    patternWrap.classList.toggle('rx-invalid', !!isError);
  }

  function run() {
    var text = input.value;
    var built = buildRegex();

    if (built.error) {
      setStatus('Invalid regular expression: ' + built.error, true);
      renderHighlights(text, []);
      matchList.innerHTML = '<div class="rx-empty-state">Fix the pattern to see matches.</div>';
      matchCount.textContent = '0 matches';
      matchesOut.value = '';
      return;
    }

    if (built.empty || !text) {
      setStatus('', false);
      renderHighlights(text, []);
      renderMatchList([]);
      matchCount.textContent = '0 matches';
      return;
    }

    setStatus('', false);
    var matches = collectMatches(text, built.re);
    renderHighlights(text, matches);
    renderMatchList(matches);
    matchCount.textContent = matches.length + (matches.length === 1 ? ' match' : ' matches');
  }

  /* Sync scroll between textarea and backdrop */
  input.addEventListener('scroll', function () {
    backdrop.scrollTop = input.scrollTop;
    backdrop.scrollLeft = input.scrollLeft;
  });

  patternEl.addEventListener('input', run);
  input.addEventListener('input', run);
  flagBoxes.forEach(function (b) { b.addEventListener('change', run); });

  refToggle.addEventListener('click', function () {
    var hidden = refWrap.classList.toggle('hidden');
    refToggle.textContent = hidden ? 'Show' : 'Hide';
  });

  /* Seed a helpful default so the tool is not blank on first visit */
  if (!patternEl.value && !input.value) {
    patternEl.value = '\\b\\w+@\\w+\\.\\w+\\b';
    input.value = 'Contact us at hello@textlypop.com or support@example.org for help.';
  }

  run();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
