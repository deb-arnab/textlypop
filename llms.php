<?php
/**
 * TextlyPop — Dynamic llms.txt
 * Served at /llms.txt via .htaccess rewrite.
 * Auto-includes every tool registered in get_all_tools(), grouped by category.
 * Add a tool to functions.php and it appears here instantly.
 *
 * Format follows the llms.txt convention — see https://llmstxt.org
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

header('Content-Type: text/plain; charset=utf-8');

$base       = 'https://textlypop.com';
$categories = get_categories();
$grouped    = get_tools_by_category();

/* Emit raw UTF-8 text — this is a plain-text file, not HTML, so no escaping. */
$out  = "# TextlyPop\n\n";
$out .= "> TextlyPop is a free collection of 35+ privacy-first online text tools. Every tool runs entirely in your browser — nothing is uploaded to a server, no account is required, and there are no ads or paywalls.\n\n";
$out .= "TextlyPop provides single-purpose utilities for writing, development and everyday tasks: counting and analysing text, cleaning and reformatting it, converting between formats, colours, units and time zones, and generating passwords, QR codes, UUIDs and more. All processing happens client-side in JavaScript, so user data never leaves the device. Each tool page includes a short how-to, a detailed FAQ, and related-tool links.\n\n";

foreach ($categories as $key => $meta) {
    if (empty($grouped[$key])) {
        continue;
    }
    $out .= '## ' . $meta['title'] . "\n\n";
    $out .= $meta['blurb'] . "\n\n";
    foreach ($grouped[$key] as $tool) {
        $out .= '- [' . $tool['name'] . '](' . $base . '/tools/' . $tool['slug'] . '): ' . $tool['desc'] . "\n";
    }
    $out .= "\n";
}

$out .= "## About\n\n";
$out .= '- [About TextlyPop](' . $base . "/about): Who makes TextlyPop and the privacy-first, no-signup philosophy behind the tools.\n";
$out .= '- [Privacy policy](' . $base . "/privacy): How TextlyPop handles data — in short, everything runs locally in the browser.\n";
$out .= '- [Contact](' . $base . "/contact): Get in touch with the TextlyPop team.\n\n";

$out .= "## Notes\n\n";
$out .= "- All tools are free and work without an account or installation.\n";
$out .= "- Processing is client-side; text, files, colours and dates entered into a tool are not sent to any server.\n";
$out .= "- Sitemap: {$base}/sitemap.xml\n";

echo $out;
