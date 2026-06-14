<?php
$page_title  = 'Privacy Policy — TextlyPop';
$meta_desc   = 'TextlyPop privacy policy. We do not collect, store, or share your text. All tools run in your browser.';
$canonical_url = 'https://textlypop.com/privacy';
$og_title      = 'Privacy Policy — TextlyPop';
$og_desc       = 'TextlyPop privacy policy. All tools run in your browser. Your text is never sent to a server, stored, or shared with anyone.';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<div class="tool-page">
  <div class="tool-page-header">
    <h1>Privacy policy</h1>
    <p>Last updated: May 2026</p>
  </div>

  <div class="tool-content">
    <h2>Your text stays on your device</h2>
    <p>All TextlyPop tools run entirely in your browser using JavaScript. Text you enter is never transmitted to our servers, never stored in a database, and never shared with third parties.</p>

    <h2>What we store locally</h2>
    <p>TextlyPop uses your browser's localStorage to save:</p>
    <ul>
      <li>Your dark/light mode preference</li>
      <li>Your recently used tools (up to 5)</li>
      <li>Auto-saved tool input so you can pick up where you left off</li>
    </ul>
    <p>This data lives only in your browser. We have no access to it. You can clear it any time by clearing your browser's localStorage.</p>

    <h2>Analytics</h2>
    <p>TextlyPop uses privacy-respecting analytics to understand which tools are most useful. No personally identifiable information is collected. No cookies are set for tracking purposes.</p>

    <h2>Advertising</h2>
    <p>TextlyPop displays ads through Google AdSense. Google may use cookies to show relevant ads based on your browsing history. You can opt out of personalised advertising at <a href="https://adssettings.google.com" rel="noopener">adssettings.google.com</a>.</p>

    <h2>Contact</h2>
    <p>If you have questions about this privacy policy, please <a href="/contact">contact us</a>.</p>
  </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
