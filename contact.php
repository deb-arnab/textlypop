<?php
$page_title  = 'Contact TextlyPop';
$meta_desc   = 'Get in touch with TextlyPop. Report a bug, suggest a new tool, or ask a question.';
$canonical_url = 'https://textlypop.com/contact';
$og_title      = 'Contact TextlyPop — Bug Reports and Tool Suggestions';
$og_desc       = 'Get in touch with TextlyPop. Report a bug, suggest a new text tool, or ask a question. Email hello@textlypop.com.';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<div class="tool-page">
  <div class="tool-page-header">
    <h1>Contact</h1>
    <p>Bug report, tool suggestion, or general question — we read everything.</p>
  </div>

  <div class="tool-content">
    <p>To get in touch, email us at <a href="mailto:hello@textlypop.com">hello@textlypop.com</a></p>
    <p>We typically respond within 1-2 business days.</p>

    <h2>Suggest a tool</h2>
    <p>Have an idea for a text tool that would be useful? We'd love to hear it. Email us with the tool name and a short description of what it should do.</p>

    <h2>Report a bug</h2>
    <p>If a tool isn't working correctly, please let us know which tool, what browser you're using, and what you expected to happen vs. what actually happened.</p>
  </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
