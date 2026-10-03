# TextlyPop

Free browser-based text tools. No signup. No ads. Your text never leaves your device.

**Live site → [textlypop.com](https://textlypop.com)**

---

## What it is

TextlyPop is a collection of 35+ free text tools built with PHP and vanilla JavaScript. Every tool runs entirely client-side — nothing is sent to a server. The site is fast, mobile-friendly, and optimised for search.

There is no build step, no package manager and no framework. A tool is one PHP file containing its own markup, inline `<style>` and inline `<script>`; shared behaviour lives in `assets/js/main.js` and shared data in `includes/functions.php`.

---

## Tools

Grouped by the `category` field in the tool registry, which is what drives the homepage, the sitemap and `/llms.txt`.

**Text cleaning** (`clean`)
- Remove line breaks
- Remove extra spaces
- Duplicate line remover
- Find and replace

**Analysis** (`analyse`)
- Word counter
- Character counter
- Word frequency counter
- Sentence counter
- Vowel and consonant counter
- Reading level checker (Flesch Kincaid)
- Words to pages
- Palindrome checker
- Text diff checker
- Regex tester
- Date & age calculator
- SERP preview tool

**Conversion** (`convert`)
- Case converter
- Text to slug
- Text to hashtags
- Text reverser
- Fancy text generator
- Comma separator
- Line break to comma
- Text to CSV converter
- Number to words
- Roman numeral converter
- Base converter
- Binary to text converter
- Morse code translator
- Markdown to HTML
- HTML to Markdown
- HTML encoder / decoder
- URL encoder / decoder
- Base64 encoder / decoder
- Color converter
- CSS unit converter
- PDF text extractor
- Time zone converter
- Text to speech
- Speech to text

**Formatting** (`format`)
- Text line sorter
- JSON formatter

**Generators** (`generate`)
- Password generator
- Random number generator
- UUID generator
- QR code generator
- Lorem ipsum generator
- Rhyme finder
- Special characters & symbols
- Schema markup generator
- Online notepad
- Pomodoro timer
- Flashcard maker

---

## Tech stack

- **Backend** — PHP 8+, no framework
- **Frontend** — Vanilla JS, no build step. Three vendored libraries in `assets/js/vendor/` (`pdf.min.js` and `pdf.worker.min.js` for the PDF text extractor, `qrcode.min.js` for the QR generator); everything else is hand-written
- **CSS** — Custom design system with CSS variables, light/dark mode via `data-theme`
- **Structured data** — JSON-LD on every tool page: `WebApplication`, `FAQPage`, `HowTo` and `BreadcrumbList`, plus a sitewide `Organization`. The homepage adds `WebSite` (with `SearchAction`) and `ItemList`
- **Security** — CSP with a per-request nonce on every inline script (set in `header.php`), `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`, `Permissions-Policy`. HSTS and the HTTPS redirect are present in `.htaccess` but commented out — uncomment them on the live server once HTTPS is confirmed
- **Sitemap** — Dynamic `sitemap.php`, served at `/sitemap.xml`, generated from the tool registry. `lastmod` comes from real file modification times, not the current date
- **llms.txt** — Dynamic `llms.php`, served at `/llms.txt`, also generated from the registry

---

## Project structure

```
public/
├── index.php               # Homepage: tool grid, categories, FAQ
├── about.php               # Static pages
├── contact.php
├── privacy.php
├── 404.php
├── sitemap.php             # XML sitemap, served at /sitemap.xml
├── llms.php                # llms.txt, served at /llms.txt
├── robots.txt
├── .htaccess               # Clean URLs, security headers, caching, rewrites
├── assets/
│   ├── css/style.css       # Full design system
│   ├── js/
│   │   ├── main.js         # Theme, search, mobile nav, copy, clear, auto-save, send-to
│   │   └── vendor/         # pdf.js, qrcode.js
│   └── img/
├── includes/
│   ├── functions.php       # Tool registry, categories, related map, CSP nonce, schema helpers
│   ├── header.php          # <head>, CSP header, site header, mobile nav
│   └── footer.php
└── tools/
    └── *.php               # One self-contained file per tool
```

---

## Tool page anatomy

Every tool page follows the same order. Keep it — the content structure is deliberate, not incidental.

1. **PHP head** — `$tool_slug`, `$tool_name`, `$page_title`, `$meta_desc`, `$canonical_url`, `$og_title`, then `require` functions and header
2. **JSON-LD blocks** — `WebApplication`, `FAQPage`, `HowTo` (via `get_howto_schema()`), `BreadcrumbList` (via `get_breadcrumb_schema()`)
3. **Breadcrumb + `<h1>` + one-line intro**
4. **Tool workspace** — the interactive part
5. **Related tools** — from `get_related_tools($tool_slug, 5)`
6. **Body content** — short encyclopedic sections with **declarative** H2s ("How X works", "The history of X"). Never phrase an H2 as a question that an FAQ entry already asks
7. **FAQ** — unique long-tail questions with detailed multi-sentence answers, in `.faq-item` / `.faq-q` / `.faq-a` markup. **Must stay in sync with the `FAQPage` JSON-LD at the top of the file** — edit both together
8. **Inline `<style>`**, then **inline `<script nonce="<?= csp_nonce() ?>">`** — the nonce is required or CSP will block the script
9. `require` footer

Shared behaviour you get for free, by convention:

| Markup | Behaviour |
|---|---|
| `.btn-copy[data-target="id"]` | Copies that element's value or text |
| `.btn-clear[data-targets="id,id"]` | Clears those inputs and fires `input` |
| `input`/`textarea` with `data-save-key="..."` | Auto-saves to `localStorage` and restores on load |
| `.send-to-btn[data-from][data-to-tool]` | Sends text to another tool |

---

## Adding a new tool

1. Create `tools/your-tool-slug.php`, following the anatomy above — copy the closest existing tool as a template
2. Register it in `get_all_tools()` in `includes/functions.php` (`slug`, `name`, `desc`, `category`, `keywords`)
3. Add an entry to `get_related_map()` for the new slug, and add it to a few existing tools' lists so links point both ways
4. Add it to the `TOOLS` array in `assets/js/main.js`, plus any `SYNONYMS` worth mapping — **this is a separate hardcoded list and is easy to forget; the header search will not find the tool without it**
5. Add an `<li>` link to the relevant section of the mobile nav in `includes/header.php`

`sitemap.php` and `llms.php` pick the tool up automatically from the registry. Nothing else needs changing.

To check step 4 did not get missed:

```bash
php -r 'require "includes/functions.php";
  preg_match_all("~slug: .([a-z0-9-]+).~", file_get_contents("assets/js/main.js"), $m);
  print_r(array_diff(array_column(get_all_tools(), "slug"), $m[1]));'
```

---

## Writing conventions

- **Never print an exact tool count** anywhere in site copy — always "35+ free tools". Tools are added regularly and a hardcoded number goes stale
- **`<title>` ≤ 60 characters** including the ` | TextlyPop` suffix, or it truncates in search results
- **Meta description 140–160 characters**, leading with the wording people actually search for
- **One `<h1>` per page**, matching the tool's primary term
- Don't describe a feature the tool does not have — the body copy and FAQ are checked against the actual UI labels

---

## Local development

Requires a local PHP server — [Local by WP Engine](https://localwp.com/), Laragon, XAMPP, or PHP's built-in server.

```bash
git clone https://github.com/deb-arnab/textlypop.git
cd textlypop
php -S localhost:8000
```

Clean URLs (`/tools/word-counter` instead of `/tools/word-counter.php`) come from `.htaccess`, so they need Apache. Under `php -S` the rewrite rules are ignored and you will need the `.php` extension in the URL.

---

## License

Copyright (c) 2025 Arnab Deb. Source available for viewing and personal reference only — not for redistribution or commercial use. See [LICENSE](LICENSE) for details.
