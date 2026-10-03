<?php
/**
 * TextlyPop — shared functions
 * Add every new tool to get_all_tools() as you build it
 */

if (!isset($GLOBALS['_csp_nonce'])) {
    $GLOBALS['_csp_nonce'] = base64_encode(random_bytes(16));
}
function csp_nonce(): string { return $GLOBALS['_csp_nonce']; }

function get_all_tools(): array {
    return [
        [
            'slug'     => 'word-counter',
            'name'     => 'Word counter',
            'desc'     => 'Count words, characters, sentences and paragraphs. Live as you type.',
            'category' => 'analyse',
            'keywords' => ['word counter','count words','word count','words counter'],
        ],
        [
            'slug'     => 'character-counter',
            'name'     => 'Character counter',
            'desc'     => 'Count characters with platform limits for Twitter, meta descriptions and more.',
            'category' => 'analyse',
            'keywords' => ['character counter','count characters','char count','letter counter'],
        ],
        [
            'slug'     => 'case-converter',
            'name'     => 'Case converter',
            'desc'     => 'Convert text to UPPER CASE, lower case, Title Case, Sentence case and more.',
            'category' => 'convert',
            'keywords' => ['case converter','uppercase','lowercase','title case','convert case'],
        ],
        [
            'slug'     => 'remove-line-breaks',
            'name'     => 'Remove line breaks',
            'desc'     => 'Strip line breaks from PDF pastes and copied text instantly.',
            'category' => 'clean',
            'keywords' => ['remove line breaks','delete line breaks','strip newlines','remove newlines'],
        ],
        [
            'slug'     => 'remove-extra-spaces',
            'name'     => 'Remove extra spaces',
            'desc'     => 'Collapse multiple spaces and trim leading or trailing whitespace.',
            'category' => 'clean',
            'keywords' => ['remove extra spaces','remove spaces','trim spaces','fix spaces','whitespace'],
        ],
        [
            'slug'     => 'duplicate-line-remover',
            'name'     => 'Duplicate line remover',
            'desc'     => 'Remove repeated lines from any list. Case-sensitive option included.',
            'category' => 'clean',
            'keywords' => ['duplicate line remover','remove duplicates','delete duplicate lines','unique lines'],
        ],
        [
            'slug'     => 'text-line-sorter',
            'name'     => 'Text line sorter',
            'desc'     => 'Sort lines alphabetically A-Z or Z-A, by length, or randomly.',
            'category' => 'format',
            'keywords' => ['sort lines','line sorter','alphabetical sort','sort text','sort list'],
        ],
        [
            'slug'     => 'find-and-replace',
            'name'     => 'Find and replace',
            'desc'     => 'Find any word or phrase and replace it. Supports regex.',
            'category' => 'clean',
            'keywords' => ['find and replace','search and replace','text replace','find replace'],
        ],
        [
            'slug'     => 'text-to-slug',
            'name'     => 'Text to slug',
            'desc'     => 'Convert any title into a clean SEO-friendly URL slug. Bulk mode included.',
            'category' => 'convert',
            'keywords' => ['text to slug','url slug generator','slug generator','permalink generator'],
        ],
        [
            'slug'     => 'word-frequency-counter',
            'name'     => 'Word frequency counter',
            'desc'     => 'See how often each word appears in your text. Find overused words instantly.',
            'category' => 'analyse',
            'keywords' => ['word frequency counter','word frequency','keyword density','word occurrence'],
        ],
        [
            'slug'     => 'lorem-ipsum-generator',
            'name'     => 'Lorem ipsum generator',
            'desc'     => 'Generate lorem ipsum placeholder text by paragraphs, sentences or words.',
            'category' => 'generate',
            'keywords' => ['lorem ipsum generator','placeholder text','dummy text','lorem ipsum'],
        ],
        [
            'slug'     => 'text-reverser',
            'name'     => 'Text reverser',
            'desc'     => 'Reverse entire text, reverse word order, or reverse each word individually.',
            'category' => 'convert',
            'keywords' => ['text reverser','reverse text','reverse words','backwards text'],
        ],
        [
            'slug'     => 'fancy-text-generator',
            'name'     => 'Fancy text generator',
            'desc'     => 'Convert text into 14 Unicode styles — bold, italic, cursive, bubble letters, strikethrough and more.',
            'category' => 'convert',
            'keywords' => ['fancy text generator','fancy font generator','unicode text','stylish text','bold text generator','cursive text generator','cool text generator'],
        ],
        [
            'slug'     => 'online-notepad',
            'name'     => 'Online notepad',
            'desc'     => 'A clean distraction-free notepad that saves your notes automatically.',
            'category' => 'generate',
            'keywords' => ['online notepad','notepad online','text editor online','free notepad'],
        ],
        [
            'slug'     => 'random-number-generator',
            'name'     => 'Random number generator',
            'desc'     => 'Generate random numbers between any range. Single or multiple numbers.',
            'category' => 'generate',
            'keywords' => ['random number generator','random number','generate random number'],
        ],
        [
            'slug'     => 'password-generator',
            'name'     => 'Password generator',
            'desc'     => 'Generate strong random passwords with custom length and character options.',
            'category' => 'generate',
            'keywords' => ['password generator','random password','strong password generator'],
        ],
        [
            'slug'     => 'binary-to-text',
            'name'     => 'Binary to text converter',
            'desc'     => 'Convert binary code to text and text to binary instantly.',
            'category' => 'convert',
            'keywords' => ['binary to text','text to binary','binary converter','binary decoder'],
        ],
        [
            'slug'     => 'morse-code-translator',
            'name'     => 'Morse code translator',
            'desc'     => 'Convert text to Morse code and Morse code back to text instantly.',
            'category' => 'convert',
            'keywords' => ['morse code translator','text to morse code','morse code converter'],
        ],
        [
            'slug'     => 'html-encoder-decoder',
            'name'     => 'HTML encoder / decoder',
            'desc'     => 'Encode special characters to HTML entities and decode them back.',
            'category' => 'convert',
            'keywords' => ['html encoder','html decoder','html entities','html encode decode'],
        ],
        [
            'slug'     => 'url-encoder-decoder',
            'name'     => 'URL encoder / decoder',
            'desc'     => 'Encode and decode URLs. Convert spaces and special characters to percent encoding.',
            'category' => 'convert',
            'keywords' => ['url encoder','url decoder','url encode','percent encoding','url encode decode'],
        ],
        [
            'slug'     => 'palindrome-checker',
            'name'     => 'Palindrome checker',
            'desc'     => 'Check if a word or phrase is a palindrome. Ignores spaces and punctuation.',
            'category' => 'analyse',
            'keywords' => ['palindrome checker','is this a palindrome','palindrome detector'],
        ],
        [
            'slug'     => 'reading-level-checker',
            'name'     => 'Reading level checker',
            'desc'     => 'Check the Flesch-Kincaid reading level and ease score of your text.',
            'category' => 'analyse',
            'keywords' => ['reading level checker','flesch kincaid','readability score','reading ease'],
        ],
        [
            'slug'     => 'sentence-counter',
            'name'     => 'Sentence counter',
            'desc'     => 'Count sentences, paragraphs and average sentence length in your text.',
            'category' => 'analyse',
            'keywords' => ['sentence counter','count sentences','paragraph counter','sentence length'],
        ],
        [
            'slug'     => 'vowel-counter',
            'name'     => 'Vowel and consonant counter',
            'desc'     => 'Count vowels, consonants, letters and non-letter characters in your text.',
            'category' => 'analyse',
            'keywords' => ['vowel counter','consonant counter','count vowels','count consonants'],
        ],
        [
            'slug'     => 'text-to-speech',
            'name'     => 'Text to speech',
            'desc'     => 'Convert text to speech instantly in your browser. No signup required.',
            'category' => 'convert',
            'keywords' => ['text to speech','text to speech online','tts','read text aloud'],
        ],
        [
            'slug'     => 'speech-to-text',
            'name'     => 'Speech to text',
            'desc'     => 'Convert speech to text using your microphone. Free browser-based transcription.',
            'category' => 'convert',
            'keywords' => ['speech to text','voice to text','speech recognition','transcribe audio'],
        ],
        [
            'slug'     => 'comma-separator',
            'name'     => 'Comma separator',
            'desc'     => 'Convert a list to comma-separated values or split CSV back into a list.',
            'category' => 'convert',
            'keywords' => ['comma separator','list to csv','comma separated values','list to comma'],
        ],
        [
            'slug'     => 'number-to-words',
            'name'     => 'Number to words',
            'desc'     => 'Convert numbers to words. Turn 1234 into one thousand two hundred thirty four.',
            'category' => 'convert',
            'keywords' => ['number to words','numbers to words converter','spell out numbers'],
        ],
        [
            'slug'     => 'text-to-hashtags',
            'name'     => 'Text to hashtags',
            'desc'     => 'Convert text into hashtags for social media. Remove spaces and add # prefix.',
            'category' => 'convert',
            'keywords' => ['text to hashtags','hashtag generator','convert text to hashtag'],
        ],
        [
            'slug'     => 'json-formatter',
            'name'     => 'JSON formatter',
            'desc'     => 'Format and validate JSON instantly. Minify or prettify JSON with one click.',
            'category' => 'format',
            'keywords' => ['json formatter','json validator','format json','prettify json','json beautifier'],
        ],
        [
            'slug'     => 'markdown-to-html',
            'name'     => 'Markdown to HTML',
            'desc'     => 'Convert Markdown to HTML instantly. Supports headings, lists, links and more.',
            'category' => 'convert',
            'keywords' => ['markdown to html','markdown converter','md to html','markdown parser'],
        ],
        [
            'slug'     => 'html-to-markdown',
            'name'     => 'HTML to Markdown',
            'desc'     => 'Convert HTML to Markdown instantly. Clean up HTML into readable Markdown.',
            'category' => 'convert',
            'keywords' => ['html to markdown','html to md','convert html to markdown'],
        ],
        [
            'slug'     => 'list-to-comma',
            'name'     => 'Line break to comma',
            'desc'     => 'Convert line-by-line lists to comma-separated text and back.',
            'category' => 'convert',
            'keywords' => ['line break to comma','list to comma','newline to comma','lines to csv'],
        ],
        [
            'slug'     => 'rhyme-finder',
            'name'     => 'Rhyme finder',
            'desc'     => 'Find words that rhyme with any word. Great for poetry and songwriting.',
            'category' => 'generate',
            'keywords' => ['rhyme finder','find rhymes','words that rhyme','rhyme generator'],
        ],
        [
            'slug'     => 'roman-numeral-converter',
            'name'     => 'Roman numeral converter',
            'desc'     => 'Convert between Arabic numbers and Roman numerals instantly.',
            'category' => 'convert',
            'keywords' => ['roman numeral converter','arabic to roman','roman to arabic','roman numerals'],
        ],
        [
            'slug'     => 'base-converter',
            'name'     => 'Base converter',
            'desc'     => 'Convert numbers between binary, octal, decimal and hexadecimal.',
            'category' => 'convert',
            'keywords' => ['base converter','number base converter','binary to decimal','hex converter'],
        ],
        [
            'slug'     => 'words-to-pages',
            'name'     => 'Words to pages',
            'desc'     => 'Convert word count to page count. Estimate pages for any font size and spacing.',
            'category' => 'analyse',
            'keywords' => ['words to pages','word count to pages','how many pages','words per page'],
        ],
        [
            'slug'     => 'text-diff-checker',
            'name'     => 'Text diff checker',
            'desc'     => 'Compare two pieces of text and highlight exactly what changed — line by line, word by word.',
            'category' => 'analyse',
            'keywords' => ['text diff','diff checker','compare two texts','text comparison','find differences','diff tool online'],
        ],
        [
            'slug'     => 'text-to-csv',
            'name'     => 'Text to CSV converter',
            'desc'     => 'Convert tab-separated, pipe-delimited or any text to properly formatted CSV. Handles quoting automatically.',
            'category' => 'convert',
            'keywords' => ['text to csv','convert to csv','tab to csv','tsv to csv','pipe delimited to csv','csv converter'],
        ],
        [
            'slug'     => 'qr-code-generator',
            'name'     => 'QR code generator',
            'desc'     => 'Create QR codes for URLs, text, email, phone, Wi-Fi and more. Download as PNG instantly.',
            'category' => 'generate',
            'keywords' => ['qr code generator','qr code','create qr code','generate qr code','qr generator','free qr code'],
        ],
        [
            'slug'     => 'base64-encoder-decoder',
            'name'     => 'Base64 encoder / decoder',
            'desc'     => 'Encode text to Base64 or decode Base64 back to text instantly. Supports UTF-8 and URL-safe Base64.',
            'category' => 'convert',
            'keywords' => ['base64 encoder','base64 decoder','base64 encode decode','base64 converter','text to base64','base64 to text','decode base64'],
        ],
        [
            'slug'     => 'uuid-generator',
            'name'     => 'UUID generator',
            'desc'     => 'Generate random version 4 UUIDs (GUIDs) instantly. Bulk generation, uppercase and no-hyphen options.',
            'category' => 'generate',
            'keywords' => ['uuid generator','guid generator','generate uuid','random uuid','uuid v4','unique id generator','uuid online'],
        ],
        [
            'slug'     => 'regex-tester',
            'name'     => 'Regex tester',
            'desc'     => 'Test and debug regular expressions with live match highlighting, capture groups and flags.',
            'category' => 'analyse',
            'keywords' => ['regex tester','regular expression tester','regex online','test regex','regexp tester','regex debugger','regex match'],
        ],
        [
            'slug'     => 'special-characters',
            'name'     => 'Special characters & symbols',
            'desc'     => 'Copy and paste special characters and symbols — arrows, currency, math, stars, hearts, accents and more. Click to copy.',
            'category' => 'generate',
            'keywords' => ['special characters','copy paste symbols','symbols copy paste','special characters copy paste','copy and paste symbols','cool symbols','text symbols','fancy symbols'],
        ],
        [
            'slug'     => 'pomodoro-timer',
            'name'     => 'Pomodoro timer',
            'desc'     => 'A focus timer with custom work and break lengths, auto-cycling, sound alerts and desktop notifications.',
            'category' => 'generate',
            'keywords' => ['pomodoro timer','pomodoro','focus timer','25 minute timer','productivity timer','study timer','tomato timer'],
        ],
        [
            'slug'     => 'color-converter',
            'name'     => 'Color converter',
            'desc'     => 'Convert colors between HEX, RGB and HSL with a live picker, alpha, shades and one-click copy.',
            'category' => 'convert',
            'keywords' => ['color converter','hex to rgb','rgb to hex','hex to hsl','hsl to rgb','rgb to hsl','color picker','color code'],
        ],
        [
            'slug'     => 'pdf-text-extractor',
            'name'     => 'PDF text extractor',
            'desc'     => 'Extract text from PDF files right in your browser — drag and drop, then copy or download. Private, no upload.',
            'category' => 'convert',
            'keywords' => ['pdf text extractor','pdf to text','extract text from pdf','pdf to text converter','copy text from pdf','read pdf text','pdf text'],
        ],
        [
            'slug'     => 'timezone-converter',
            'name'     => 'Time zone converter',
            'desc'     => 'Convert times between any time zones with automatic Daylight Saving, UTC offsets and day differences.',
            'category' => 'convert',
            'keywords' => ['time zone converter','timezone converter','convert time zones','utc converter','world clock','time difference','est to pst'],
        ],
        [
            'slug'     => 'date-age-calculator',
            'name'     => 'Date & age calculator',
            'desc'     => 'Find the exact difference between two dates and calculate age in years, months, days, weeks and hours.',
            'category' => 'analyse',
            'keywords' => ['date difference calculator','age calculator','days between dates','date calculator','how many days','time between dates','age in days'],
        ],
        [
            'slug'     => 'css-unit-converter',
            'name'     => 'CSS unit converter',
            'desc'     => 'Convert between px, rem, em, pt and percent with a configurable root font size. Instant two-way conversion.',
            'category' => 'convert',
            'keywords' => ['css unit converter','px to rem','rem to px','px to em','pt to px','px to pt','em to px','css units'],
        ],
        [
            'slug'     => 'flashcard-maker',
            'name'     => 'Flashcard maker',
            'desc'     => 'Create flashcards from a list or one at a time, study with flip cards and progress tracking, then export or print.',
            'category' => 'generate',
            'keywords' => ['flashcard maker','flashcards','online flashcards','create flashcards','study cards','flash card generator','revision cards','cue cards'],
        ],
        [
            'slug'     => 'serp-preview',
            'name'     => 'SERP preview tool',
            'desc'     => 'Preview how your title tag and meta description look in Google search results, with live pixel-width limits.',
            'category' => 'analyse',
            'keywords' => ['serp preview','google serp preview','serp simulator','snippet preview','title tag preview','meta description preview','seo preview tool','search result preview'],
        ],
        [
            'slug'     => 'schema-markup-generator',
            'name'     => 'Schema markup generator',
            'desc'     => 'Generate valid JSON-LD structured data for Article, FAQ, Product, LocalBusiness, Event, Recipe and more.',
            'category' => 'generate',
            'keywords' => ['schema markup generator','json-ld generator','structured data generator','schema generator','rich snippet generator','schema.org generator','faq schema generator','product schema','local business schema','article schema','breadcrumb schema','event schema generator'],
        ],
    ];
}

/**
 * Category metadata, in homepage display order.
 * Keys match the 'category' field on each tool.
 */
function get_categories(): array {
    return [
        'clean'    => [
            'label' => 'Text cleaning',
            'title' => 'Text cleaning tools',
            'blurb' => 'Fix messy text — remove line breaks, extra spaces and duplicate lines.',
        ],
        'analyse'  => [
            'label' => 'Analysis',
            'title' => 'Text analysis & counting tools',
            'blurb' => 'Count words and characters, check readability and compare texts.',
        ],
        'convert'  => [
            'label' => 'Conversion',
            'title' => 'Text conversion tools',
            'blurb' => 'Convert case, slugs, Markdown, CSV, Morse code, binary and more.',
        ],
        'format'   => [
            'label' => 'Formatting',
            'title' => 'Text formatting tools',
            'blurb' => 'Sort, prettify and structure your text and data.',
        ],
        'generate' => [
            'label' => 'Generators',
            'title' => 'Password, QR code & text generators',
            'blurb' => 'Create strong passwords, QR codes, placeholder text and more.',
        ],
    ];
}

/**
 * Tools grouped by category, in get_categories() order.
 */
function get_tools_by_category(): array {
    $grouped = [];
    foreach (get_categories() as $key => $meta) {
        $grouped[$key] = [];
    }
    foreach (get_all_tools() as $tool) {
        $grouped[$tool['category']][] = $tool;
    }
    return array_filter($grouped);
}

/**
 * Curated most-popular tools for the homepage top row.
 */
function get_popular_tools(): array {
    $slugs = [
        'text-to-csv',
        'online-notepad',
        'qr-code-generator',
        'reading-level-checker',
        'case-converter',
        'morse-code-translator',
        'html-to-markdown',
        'comma-separator',
    ];
    $tools = [];
    foreach ($slugs as $slug) {
        $tool = get_tool($slug);
        if ($tool) $tools[] = $tool;
    }
    return $tools;
}

function get_tool(string $slug): ?array {
    foreach (get_all_tools() as $tool) {
        if ($tool['slug'] === $slug) return $tool;
    }
    return null;
}

/**
 * Curated related tools per slug, ordered by relevance to the user's intent.
 * Tools missing from this map fall back to same-category suggestions,
 * so new tools get sensible related links before they are curated.
 */
function get_related_map(): array {
    return [
        'word-counter'            => ['character-counter', 'sentence-counter', 'words-to-pages', 'reading-level-checker', 'word-frequency-counter'],
        'character-counter'       => ['word-counter', 'serp-preview', 'sentence-counter', 'text-to-hashtags', 'case-converter'],
        'case-converter'          => ['text-to-slug', 'fancy-text-generator', 'find-and-replace', 'remove-extra-spaces', 'text-reverser'],
        'remove-line-breaks'      => ['remove-extra-spaces', 'duplicate-line-remover', 'list-to-comma', 'find-and-replace', 'text-line-sorter'],
        'remove-extra-spaces'     => ['remove-line-breaks', 'duplicate-line-remover', 'find-and-replace', 'case-converter', 'word-counter'],
        'duplicate-line-remover'  => ['text-line-sorter', 'remove-line-breaks', 'remove-extra-spaces', 'comma-separator', 'word-frequency-counter'],
        'text-line-sorter'        => ['duplicate-line-remover', 'comma-separator', 'list-to-comma', 'find-and-replace', 'remove-line-breaks'],
        'find-and-replace'        => ['regex-tester', 'remove-extra-spaces', 'remove-line-breaks', 'case-converter', 'text-diff-checker'],
        'text-to-slug'            => ['case-converter', 'serp-preview', 'url-encoder-decoder', 'text-to-hashtags', 'remove-extra-spaces'],
        'word-frequency-counter'  => ['word-counter', 'reading-level-checker', 'character-counter', 'sentence-counter', 'duplicate-line-remover'],
        'lorem-ipsum-generator'   => ['word-counter', 'words-to-pages', 'random-number-generator', 'online-notepad', 'password-generator'],
        'text-reverser'           => ['palindrome-checker', 'fancy-text-generator', 'case-converter', 'morse-code-translator', 'binary-to-text'],
        'fancy-text-generator'    => ['special-characters', 'text-reverser', 'case-converter', 'text-to-hashtags', 'lorem-ipsum-generator'],
        'online-notepad'          => ['pomodoro-timer', 'flashcard-maker', 'word-counter', 'character-counter', 'find-and-replace'],
        'random-number-generator' => ['password-generator', 'lorem-ipsum-generator', 'base-converter', 'number-to-words', 'roman-numeral-converter'],
        'password-generator'      => ['random-number-generator', 'qr-code-generator', 'online-notepad', 'url-encoder-decoder', 'lorem-ipsum-generator'],
        'binary-to-text'          => ['base-converter', 'base64-encoder-decoder', 'morse-code-translator', 'html-encoder-decoder', 'url-encoder-decoder'],
        'morse-code-translator'   => ['binary-to-text', 'text-reverser', 'base-converter', 'fancy-text-generator', 'text-to-speech'],
        'html-encoder-decoder'    => ['url-encoder-decoder', 'base64-encoder-decoder', 'html-to-markdown', 'markdown-to-html', 'json-formatter'],
        'url-encoder-decoder'     => ['html-encoder-decoder', 'base64-encoder-decoder', 'text-to-slug', 'json-formatter', 'base-converter'],
        'palindrome-checker'      => ['text-reverser', 'vowel-counter', 'rhyme-finder', 'word-counter', 'character-counter'],
        'reading-level-checker'   => ['word-counter', 'sentence-counter', 'word-frequency-counter', 'words-to-pages', 'character-counter'],
        'sentence-counter'        => ['word-counter', 'reading-level-checker', 'character-counter', 'words-to-pages', 'word-frequency-counter'],
        'vowel-counter'           => ['character-counter', 'word-counter', 'palindrome-checker', 'sentence-counter', 'rhyme-finder'],
        'text-to-speech'          => ['speech-to-text', 'reading-level-checker', 'word-counter', 'morse-code-translator', 'online-notepad'],
        'speech-to-text'          => ['text-to-speech', 'online-notepad', 'word-counter', 'find-and-replace', 'remove-extra-spaces'],
        'comma-separator'         => ['list-to-comma', 'text-to-csv', 'duplicate-line-remover', 'text-line-sorter', 'remove-line-breaks'],
        'number-to-words'         => ['roman-numeral-converter', 'random-number-generator', 'base-converter', 'words-to-pages', 'word-counter'],
        'text-to-hashtags'        => ['character-counter', 'text-to-slug', 'case-converter', 'word-frequency-counter', 'fancy-text-generator'],
        'json-formatter'          => ['schema-markup-generator', 'text-to-csv', 'html-encoder-decoder', 'url-encoder-decoder', 'markdown-to-html'],
        'markdown-to-html'        => ['html-to-markdown', 'html-encoder-decoder', 'json-formatter', 'text-to-slug', 'word-counter'],
        'html-to-markdown'        => ['markdown-to-html', 'html-encoder-decoder', 'find-and-replace', 'remove-extra-spaces', 'pdf-text-extractor'],
        'list-to-comma'           => ['comma-separator', 'text-to-csv', 'text-line-sorter', 'duplicate-line-remover', 'remove-line-breaks'],
        'rhyme-finder'            => ['palindrome-checker', 'vowel-counter', 'word-counter', 'text-to-speech', 'fancy-text-generator'],
        'roman-numeral-converter' => ['number-to-words', 'base-converter', 'random-number-generator', 'binary-to-text', 'word-counter'],
        'base-converter'          => ['color-converter', 'binary-to-text', 'roman-numeral-converter', 'number-to-words', 'timezone-converter'],
        'words-to-pages'          => ['word-counter', 'sentence-counter', 'reading-level-checker', 'character-counter', 'lorem-ipsum-generator'],
        'text-diff-checker'       => ['find-and-replace', 'duplicate-line-remover', 'json-formatter', 'word-counter', 'remove-extra-spaces'],
        'text-to-csv'             => ['comma-separator', 'list-to-comma', 'json-formatter', 'text-line-sorter', 'duplicate-line-remover'],
        'qr-code-generator'       => ['password-generator', 'url-encoder-decoder', 'text-to-slug', 'text-to-hashtags', 'random-number-generator'],
        'base64-encoder-decoder'  => ['url-encoder-decoder', 'html-encoder-decoder', 'binary-to-text', 'json-formatter', 'text-to-csv'],
        'uuid-generator'          => ['password-generator', 'random-number-generator', 'base64-encoder-decoder', 'text-to-slug', 'qr-code-generator'],
        'regex-tester'            => ['find-and-replace', 'text-diff-checker', 'json-formatter', 'word-frequency-counter', 'character-counter'],
        'special-characters'      => ['fancy-text-generator', 'html-encoder-decoder', 'text-to-hashtags', 'case-converter', 'lorem-ipsum-generator'],
        'pomodoro-timer'          => ['online-notepad', 'flashcard-maker', 'word-counter', 'words-to-pages', 'reading-level-checker'],
        'color-converter'         => ['css-unit-converter', 'base-converter', 'json-formatter', 'html-encoder-decoder', 'url-encoder-decoder'],
        'pdf-text-extractor'      => ['html-to-markdown', 'word-counter', 'text-to-csv', 'character-counter', 'find-and-replace'],
        'timezone-converter'      => ['base-converter', 'color-converter', 'pomodoro-timer', 'number-to-words', 'date-age-calculator'],
        'date-age-calculator'     => ['timezone-converter', 'pomodoro-timer', 'number-to-words', 'base-converter', 'roman-numeral-converter'],
        'css-unit-converter'      => ['color-converter', 'base-converter', 'json-formatter', 'html-encoder-decoder', 'url-encoder-decoder'],
        'flashcard-maker'         => ['online-notepad', 'pomodoro-timer', 'text-to-csv', 'comma-separator', 'word-counter'],
        'serp-preview'            => ['schema-markup-generator', 'character-counter', 'text-to-slug', 'word-counter', 'reading-level-checker'],
        'schema-markup-generator' => ['serp-preview', 'json-formatter', 'text-to-slug', 'html-encoder-decoder', 'url-encoder-decoder'],
    ];
}

function get_related_tools(string $current_slug, int $limit = 5): array {
    $current = get_tool($current_slug);
    $picked  = [];

    // 1. Curated relationships first
    foreach (get_related_map()[$current_slug] ?? [] as $slug) {
        if (count($picked) >= $limit) break;
        if ($slug === $current_slug || isset($picked[$slug])) continue;
        $tool = get_tool($slug);
        if ($tool) $picked[$slug] = $tool;
    }

    // 2. Fill from the same category
    if ($current) {
        foreach (get_all_tools() as $tool) {
            if (count($picked) >= $limit) break;
            if ($tool['slug'] === $current_slug || isset($picked[$tool['slug']])) continue;
            if ($tool['category'] === $current['category']) $picked[$tool['slug']] = $tool;
        }
    }

    // 3. Top up with anything left
    foreach (get_all_tools() as $tool) {
        if (count($picked) >= $limit) break;
        if ($tool['slug'] === $current_slug || isset($picked[$tool['slug']])) continue;
        $picked[$tool['slug']] = $tool;
    }

    return array_values($picked);
}

function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
/**
 * Generate HowTo schema for a tool page
 * Add this to every tool page for GEO and rich results
 *
 * @param string $tool_name   e.g. "Word Counter"
 * @param string $description Short description of the tool
 * @param array  $steps       Array of ['name' => '', 'text' => ''] steps
 */
function get_howto_schema(string $tool_name, string $description, array $steps): string {
    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'HowTo',
        'name'        => $tool_name,
        'description' => $description,
        'step'        => array_map(function($step, $i) {
            return [
                '@type'    => 'HowToStep',
                'position' => $i + 1,
                'name'     => $step['name'],
                'text'     => $step['text'],
            ];
        }, $steps, array_keys($steps)),
    ];
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

/**
 * Generate BreadcrumbList schema for a tool page
 *
 * @param string $tool_name Tool display name
 * @param string $tool_slug Tool URL slug
 */
function get_breadcrumb_schema(string $tool_name, string $tool_slug): string {
    $schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'TextlyPop',
                'item'     => 'https://textlypop.com',
            ],
            [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => 'Tools',
                'item'     => 'https://textlypop.com/#tools',
            ],
            [
                '@type'    => 'ListItem',
                'position' => 3,
                'name'     => $tool_name,
                'item'     => 'https://textlypop.com/tools/' . $tool_slug,
            ],
        ],
    ];
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

/**
 * Render HTML breadcrumb navigation
 * Place this just above the <h1> on every tool page
 *
 * @param string $tool_name Tool display name
 */
function render_breadcrumb(string $tool_name): void {
    echo '<nav class="tool-breadcrumb" aria-label="Breadcrumb">';
    echo '<ol class="breadcrumb-list">';
    echo '<li class="breadcrumb-item"><a href="/">TextlyPop</a></li>';
    echo '<li class="breadcrumb-item"><a href="/#tools">Tools</a></li>';
    echo '<li class="breadcrumb-item" aria-current="page">' . htmlspecialchars($tool_name) . '</li>';
    echo '</ol>';
    echo '</nav>';
}

/**
 * Generate Organization schema — add once to homepage header
 */
function get_organization_schema(): string {
    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'Organization',
        'name'        => 'TextlyPop',
        'url'         => 'https://textlypop.com',
        'logo'        => 'https://textlypop.com/assets/img/logo.svg',
        'description' => 'Free browser-based text tools. Word counter, case converter, remove line breaks and more. No signup. Your text never leaves your device.',
        'contactPoint' => [
            '@type'       => 'ContactPoint',
            'contactType' => 'customer support',
            'email'       => 'hello@textlypop.com',
        ],
    ];
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

