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
    ];
}

function get_tool(string $slug): ?array {
    foreach (get_all_tools() as $tool) {
        if ($tool['slug'] === $slug) return $tool;
    }
    return null;
}

function get_related_tools(string $current_slug, int $limit = 5): array {
    $related = [];
    foreach (get_all_tools() as $tool) {
        if ($tool['slug'] === $current_slug) continue;
        $related[] = $tool;
        if (count($related) >= $limit) break;
    }
    return $related;
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

