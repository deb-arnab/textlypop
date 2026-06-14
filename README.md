# TextlyPop

Free browser-based text tools. No signup. No ads. Your text never leaves your device.

**Live site → [textlypop.com](https://textlypop.com)**

---

## What it is

TextlyPop is a collection of 35+ free text tools built with PHP and vanilla JavaScript. Every tool runs entirely client-side — nothing is sent to a server. The site is fast, mobile-friendly, and optimised for search.

---

## Tools

**Text cleaning**
- Remove line breaks
- Remove extra spaces
- Duplicate line remover
- Find and replace
- Text line sorter

**Analysis**
- Word counter
- Character counter
- Sentence counter
- Word frequency counter
- Vowel & consonant counter
- Reading level checker (Flesch-Kincaid)
- Palindrome checker
- Words to pages
- Text diff checker

**Conversion**
- Case converter
- Text to slug
- Text to hashtags
- Comma separator
- Line break to comma
- Number to words
- Roman numeral converter
- Base converter
- Binary to text
- Morse code translator
- Markdown to HTML
- HTML to Markdown
- HTML encoder / decoder
- URL encoder / decoder
- Text to CSV converter

**Generation**
- Lorem ipsum generator
- Password generator
- Random number generator
- Fancy text generator
- Rhyme finder
- Text reverser
- Online notepad

**Speech**
- Text to speech
- Speech to text

---

## Tech stack

- **Backend** — PHP 8+ (no framework)
- **Frontend** — Vanilla JS, no dependencies
- **CSS** — Custom design system with CSS variables, light/dark mode
- **SEO** — Schema.org JSON-LD (WebApplication, FAQPage, HowTo, BreadcrumbList) on every tool page
- **Security** — CSP nonces on all inline scripts, HSTS, X-Content-Type-Options, X-Frame-Options
- **Sitemap** — Dynamic `sitemap.php` auto-generates from the tool registry

---

## Project structure

```
public/
├── index.php               # Homepage with tool grid
├── sitemap.php             # Auto-generated XML sitemap
├── robots.txt
├── .htaccess               # Security headers, clean URLs
├── assets/
│   ├── css/style.css       # Full design system
│   ├── js/main.js          # Theme, search, mobile nav, auto-save, send-to
│   └── img/
├── includes/
│   ├── functions.php       # Tool registry, CSP nonce, schema helpers
│   ├── header.php          # Site header, mobile nav
│   └── footer.php
└── tools/
    └── *.php               # One file per tool
```

---

## Adding a new tool

1. Create `tools/your-tool-slug.php` — follow any existing tool as a template
2. Add the tool to `get_all_tools()` in `includes/functions.php`
3. Add it to the TOOLS array and SYNONYMS in `assets/js/main.js`
4. Add a `<li>` link in the relevant section in `includes/header.php` (mobile nav)

The sitemap picks it up automatically. No other files need changing.

---

## Local development

Requires a local PHP server (e.g. [Local by WP Engine](https://localwp.com/), Laragon, XAMPP, or `php -S localhost:8000`).

```bash
git clone https://github.com/deb-arnab/textlypop.git
cd textlypop
php -S localhost:8000
```

---

## License

Copyright (c) 2025 Arnab Deb. Source available for viewing and personal reference only — not for redistribution or commercial use. See [LICENSE](LICENSE) for details.
