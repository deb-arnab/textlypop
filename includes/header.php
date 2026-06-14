<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$page_title    = $page_title    ?? 'TextlyPop — Free Online Text Tools';
$meta_desc     = $meta_desc     ?? 'TextlyPop offers 35+ free browser-based text tools. Word counter, case converter, JSON formatter, password generator and more. No signup. Instant results.';
$canonical_url = $canonical_url ?? 'https://textlypop.com' . strtok($_SERVER['REQUEST_URI'], '?');
$og_title      = $og_title      ?? $page_title;
$og_desc       = $og_desc       ?? $meta_desc;

header("Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-" . csp_nonce() . "'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self'; connect-src 'self' https://api.datamuse.com; frame-src 'none'; object-src 'none'; base-uri 'self'; form-action 'self'; frame-ancestors 'none'; upgrade-insecure-requests");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($page_title) ?></title>
<meta name="description" content="<?= e($meta_desc) ?>">
<link rel="canonical" href="<?= e($canonical_url) ?>">
<meta name="robots" content="index, follow">

<!-- Open Graph -->
<meta property="og:type"        content="website">
<meta property="og:title"       content="<?= e($og_title) ?>">
<meta property="og:description" content="<?= e($og_desc) ?>">
<meta property="og:url"         content="<?= e($canonical_url) ?>">
<meta property="og:image"       content="https://textlypop.com/assets/img/og-image.png">
<meta property="og:site_name"   content="TextlyPop">

<!-- Twitter Card -->
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:title"       content="<?= e($og_title) ?>">
<meta name="twitter:description" content="<?= e($og_desc) ?>">
<meta name="twitter:image"       content="https://textlypop.com/assets/img/og-image.png">

<!-- Favicon -->
<link rel="icon" type="image/svg+xml" href="/assets/img/favicon.svg">
<link rel="apple-touch-icon"          href="/assets/img/logo-icon-only.svg">

<!-- Stylesheet -->
<link rel="stylesheet" href="/assets/css/style.css">

<!-- Schema.org: Organization (homepage and all pages) -->
<script type="application/ld+json">
<?= get_organization_schema() ?>
</script>

<!-- Schema.org -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "TextlyPop",
  "url": "https://textlypop.com",
  "description": "Free online text tools. Word counter, case converter, remove line breaks and more.",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://textlypop.com/?search={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
</head>
<body>

<header class="site-header" id="site-header">
  <div class="header-inner">

    <a href="/" class="logo" aria-label="TextlyPop — free text tools">
      <img src="/assets/img/logo.svg"
           data-light="/assets/img/logo.svg"
           data-dark="/assets/img/logo-dark.svg"
           alt="TextlyPop"
           width="150" height="37"
           class="logo-img">
    </a>

    <div class="header-search-wrap">
      <div class="header-search">
        <svg class="search-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
          <circle cx="6.5" cy="6.5" r="4" stroke="currentColor" stroke-width="1.5"/>
          <line x1="9.5" y1="9.5" x2="13.5" y2="13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <input type="text" id="header-search" placeholder="Search 35+ tools..." autocomplete="off" aria-label="Search tools" aria-controls="search-results">
        <div class="search-results" id="search-results" role="listbox" aria-live="polite"></div>
      </div>
    </div>

    <div class="header-controls">
      <button class="theme-toggle" id="theme-toggle" aria-label="Toggle dark mode" title="Toggle dark mode">
        <svg class="icon-sun" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
          <circle cx="12" cy="12" r="4"/>
          <line x1="12" y1="2"    x2="12" y2="5"/>
          <line x1="12" y1="19"   x2="12" y2="22"/>
          <line x1="4.22"  y1="4.22"  x2="6.34"  y2="6.34"/>
          <line x1="17.66" y1="17.66" x2="19.78" y2="19.78"/>
          <line x1="2"  y1="12" x2="5"  y2="12"/>
          <line x1="19" y1="12" x2="22" y2="12"/>
          <line x1="4.22"  y1="19.78" x2="6.34"  y2="17.66"/>
          <line x1="17.66" y1="6.34"  x2="19.78" y2="4.22"/>
        </svg>
        <svg class="icon-moon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
          <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
        </svg>
      </button>

      <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Open navigation menu" aria-expanded="false" aria-controls="mobile-nav">
        <span></span><span></span><span></span>
      </button>
    </div>

  </div>

  <nav class="mobile-nav" id="mobile-nav" aria-label="Mobile navigation" aria-hidden="true">

    <div class="mobile-nav-search">
      <input type="text" id="mobile-nav-search-input" placeholder="Search all tools…" autocomplete="off" aria-label="Search tools">
    </div>

    <div class="mobile-nav-section expanded">
      <button class="mobile-nav-heading" aria-expanded="true">Popular tools<svg class="nav-chevron" viewBox="0 0 16 16" aria-hidden="true"><path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      <ul>
        <li><a href="/tools/word-counter">Word counter</a></li>
        <li><a href="/tools/character-counter">Character counter</a></li>
        <li><a href="/tools/case-converter">Case converter</a></li>
        <li><a href="/tools/password-generator">Password generator</a></li>
        <li><a href="/tools/lorem-ipsum-generator">Lorem ipsum generator</a></li>
        <li><a href="/tools/json-formatter">JSON formatter</a></li>
        <li><a href="/tools/online-notepad">Online notepad</a></li>
      </ul>
    </div>

    <div class="mobile-nav-section">
      <button class="mobile-nav-heading" aria-expanded="false">Text cleaning<svg class="nav-chevron" viewBox="0 0 16 16" aria-hidden="true"><path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      <ul>
        <li><a href="/tools/remove-line-breaks">Remove line breaks</a></li>
        <li><a href="/tools/remove-extra-spaces">Remove extra spaces</a></li>
        <li><a href="/tools/duplicate-line-remover">Duplicate line remover</a></li>
        <li><a href="/tools/find-and-replace">Find and replace</a></li>
        <li><a href="/tools/text-line-sorter">Text line sorter</a></li>
      </ul>
    </div>

    <div class="mobile-nav-section">
      <button class="mobile-nav-heading" aria-expanded="false">Analysis<svg class="nav-chevron" viewBox="0 0 16 16" aria-hidden="true"><path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      <ul>
        <li><a href="/tools/word-frequency-counter">Word frequency counter</a></li>
        <li><a href="/tools/reading-level-checker">Reading level checker</a></li>
        <li><a href="/tools/sentence-counter">Sentence counter</a></li>
        <li><a href="/tools/vowel-counter">Vowel &amp; consonant counter</a></li>
        <li><a href="/tools/words-to-pages">Words to pages</a></li>
        <li><a href="/tools/palindrome-checker">Palindrome checker</a></li>
        <li><a href="/tools/text-diff-checker">Text diff checker</a></li>
      </ul>
    </div>

    <div class="mobile-nav-section">
      <button class="mobile-nav-heading" aria-expanded="false">Conversion<svg class="nav-chevron" viewBox="0 0 16 16" aria-hidden="true"><path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      <ul>
        <li><a href="/tools/text-to-slug">Text to slug</a></li>
        <li><a href="/tools/text-to-hashtags">Text to hashtags</a></li>
        <li><a href="/tools/comma-separator">Comma separator</a></li>
        <li><a href="/tools/list-to-comma">Line break to comma</a></li>
        <li><a href="/tools/number-to-words">Number to words</a></li>
        <li><a href="/tools/roman-numeral-converter">Roman numeral converter</a></li>
        <li><a href="/tools/base-converter">Base converter</a></li>
        <li><a href="/tools/binary-to-text">Binary to text</a></li>
        <li><a href="/tools/morse-code-translator">Morse code translator</a></li>
        <li><a href="/tools/markdown-to-html">Markdown to HTML</a></li>
        <li><a href="/tools/html-to-markdown">HTML to Markdown</a></li>
        <li><a href="/tools/html-encoder-decoder">HTML encoder / decoder</a></li>
        <li><a href="/tools/url-encoder-decoder">URL encoder / decoder</a></li>
        <li><a href="/tools/text-to-csv">Text to CSV converter</a></li>
      </ul>
    </div>

    <div class="mobile-nav-section">
      <button class="mobile-nav-heading" aria-expanded="false">Generation<svg class="nav-chevron" viewBox="0 0 16 16" aria-hidden="true"><path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      <ul>
        <li><a href="/tools/random-number-generator">Random number generator</a></li>
        <li><a href="/tools/rhyme-finder">Rhyme finder</a></li>
        <li><a href="/tools/text-reverser">Text reverser</a></li>
        <li><a href="/tools/fancy-text-generator">Fancy text generator</a></li>
      </ul>
    </div>

    <div class="mobile-nav-section">
      <button class="mobile-nav-heading" aria-expanded="false">Speech<svg class="nav-chevron" viewBox="0 0 16 16" aria-hidden="true"><path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      <ul>
        <li><a href="/tools/text-to-speech">Text to speech</a></li>
        <li><a href="/tools/speech-to-text">Speech to text</a></li>
      </ul>
    </div>

    <div class="mobile-nav-section">
      <button class="mobile-nav-heading" aria-expanded="false">TextlyPop<svg class="nav-chevron" viewBox="0 0 16 16" aria-hidden="true"><path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      <ul>
        <li><a href="/">All tools</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/privacy">Privacy policy</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </div>

  </nav>
</header>

<main id="main-content">
