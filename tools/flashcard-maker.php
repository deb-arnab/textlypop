<?php
$tool_slug   = 'flashcard-maker';
$tool_name   = 'Flashcard Maker';

$page_title  = 'Flashcard Maker — Free Online Flashcards | TextlyPop';
$meta_desc   = 'Build a deck card by card or paste a list, then study with flip cards, shuffle and progress tracking. Saves in your browser. Exports to CSV. No signup.';
$canonical_url = 'https://textlypop.com/tools/flashcard-maker';
$og_title    = 'Free Online Flashcard Maker — TextlyPop';
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
  "name": "Flashcard Maker",
  "url": "https://textlypop.com/tools/flashcard-maker",
  "description": "Free online flashcard maker. Build a deck card by card or import a list, study with flip cards and progress tracking, then export to CSV or print.",
  "applicationCategory": "EducationalApplication",
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
      "name": "Are my flashcards saved if I close the tab?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Your deck is written to your browser's local storage every time you change it, so closing the tab or shutting the computer down will not lose your cards — reopening the page brings the same deck back, along with which cards you had already marked as known. Because the storage lives in the browser rather than on a server, the deck is tied to that one browser on that one device: it will not appear in a different browser, in a private window, or on your phone, and clearing your browsing data will erase it. If a deck matters to you, use the Export CSV button to keep a copy you can re-import later or open in a spreadsheet."
      }
    },
    {
      "@type": "Question",
      "name": "Can I import a word list I already have?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, and it is usually the fastest way to build a deck. Open the Import a list panel and paste one card per line, with the front and back separated by a tab, a comma, a hyphen, a colon or a pipe. Leave the separator on Auto-detect and the importer works out which one you used, line by line. Copying two columns straight out of Excel, Google Sheets or Numbers pastes as tab-separated text, so a vocabulary list or a glossary you already keep in a spreadsheet becomes a deck in one step. You can add the imported lines to the deck you already have or replace it entirely."
      }
    },
    {
      "@type": "Question",
      "name": "What do the Got it and Review again buttons do?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "They sort the deck into cards you have learned and cards you still need. Got it marks the current card as known and moves on; Review again clears that mark so the card stays in the queue. The counter at the top shows how many cards are still outstanding, and ticking Only unfinished cards drops everything you have marked as known out of the rotation so you spend your time on the material that is not sticking yet. Marks are saved with the deck, so you can stop mid-session and pick up where you left off, and the Reset progress button clears every mark when you want a fresh pass through the whole deck."
      }
    },
    {
      "@type": "Question",
      "name": "How many flashcards should I study in one session?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Short, frequent sessions beat long ones. Most people do well with twenty to thirty cards in a sitting of ten to twenty minutes, repeated daily, rather than a single marathon review the night before a test — the spacing between sessions is what moves material into long-term memory. If a deck is large, split it into smaller decks by topic and rotate through them across the week. When a particular card keeps failing, it is usually a sign the card is trying to hold too much at once and should be broken into two or three simpler cards."
      }
    },
    {
      "@type": "Question",
      "name": "Can I print the flashcards to cut out?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The Print button lays the deck out as a grid of cards with the front on the top half and the back on the bottom half, divided by a dashed fold line. Print the page, cut along the outer borders and fold each card in half and you have a physical set with the prompt on one side and the answer on the other. The rest of the page — header, navigation and the article below the tool — is hidden from the printout, so you only use paper on the cards themselves. Choosing Save as PDF instead of a printer in the print dialog gives you a shareable copy of the deck."
      }
    },
    {
      "@type": "Question",
      "name": "What makes a good flashcard?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The strongest cards ask for exactly one piece of information. A card whose back holds a paragraph is really several cards stacked together, and you will never be sure which part you actually recalled; splitting it lets you see precisely what you know. Write the front as a specific question or cue rather than a bare topic, avoid wording that lets you guess the answer from the shape of the prompt, and give the answer in your own words so you are recalling meaning rather than matching a memorised sentence. Adding a short piece of context — an example sentence, a formula, a date — helps the memory attach to something, as long as the card still tests a single fact."
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
        ['name' => 'Name your deck', 'text' => 'Give the deck a title so you recognise it when you come back to it later.'],
        ['name' => 'Add your cards', 'text' => 'Type a front and a back and press Add card, or paste a whole list and import it in one go.'],
        ['name' => 'Study the deck', 'text' => 'Switch to the Study tab, click a card to flip it, and mark each card as Got it or Review again.'],
        ['name' => 'Keep or share the deck', 'text' => 'Your deck saves automatically in the browser. Export it as CSV for a backup, or print it as fold-over cards.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Flashcard maker</h1>
    <p>Build a deck by typing cards or pasting a list, then study with flip cards, shuffle and progress tracking. Everything stays in your browser.</p>
  </div>

  <div class="fc-tool" id="fc-tool">

    <!-- Tabs -->
    <div class="fc-tabs" role="tablist" aria-label="Flashcard mode">
      <button class="fc-tab active" id="fc-tab-build" data-tab="build" role="tab" aria-selected="true" aria-controls="fc-panel-build">Build deck</button>
      <button class="fc-tab" id="fc-tab-study" data-tab="study" role="tab" aria-selected="false" aria-controls="fc-panel-study">Study</button>
    </div>

    <!-- ── Build panel ── -->
    <section class="fc-panel" id="fc-panel-build" role="tabpanel" aria-labelledby="fc-tab-build">

      <label class="fc-deck-title-wrap">
        <span class="fc-label">Deck title</span>
        <input type="text" id="fc-deck-title" class="fc-input" maxlength="80" placeholder="e.g. Spanish verbs, Biology chapter 4" autocomplete="off">
      </label>

      <div class="fc-add">
        <div class="fc-add-fields">
          <label class="fc-field">
            <span class="fc-label">Front (question or term)</span>
            <textarea id="fc-front" class="fc-input fc-area" rows="2" placeholder="What does &ldquo;ephemeral&rdquo; mean?"></textarea>
          </label>
          <label class="fc-field">
            <span class="fc-label">Back (answer or definition)</span>
            <textarea id="fc-back" class="fc-input fc-area" rows="2" placeholder="Lasting for a very short time"></textarea>
          </label>
        </div>
        <div class="fc-add-actions">
          <button class="btn btn-primary" id="fc-add">Add card</button>
          <span class="fc-hint">Ctrl + Enter adds the card</span>
        </div>
      </div>

      <!-- Bulk import -->
      <div class="fc-import">
        <button class="fc-import-toggle" id="fc-import-toggle" aria-expanded="false" aria-controls="fc-import-body">
          <svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M8 2v7"/><path d="M5 6l3 3 3-3"/><path d="M2.5 11.5v1a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-1"/>
          </svg>
          Import a list
        </button>

        <div class="fc-import-body hidden" id="fc-import-body">
          <p class="fc-hint">One card per line, front and back separated by a tab, comma, hyphen, colon or pipe. Two columns copied from a spreadsheet paste as tab-separated text and work as they are.</p>
          <textarea id="fc-import-text" class="fc-input fc-area fc-import-area" rows="6" placeholder="casa &mdash; house&#10;perro &mdash; dog&#10;libro &mdash; book"></textarea>
          <div class="fc-import-controls">
            <label class="fc-inline-field">
              <span class="fc-label">Separator</span>
              <select id="fc-import-sep" class="fc-input fc-select">
                <option value="auto" selected>Auto-detect</option>
                <option value="tab">Tab</option>
                <option value="comma">Comma</option>
                <option value="dash">Hyphen or dash</option>
                <option value="colon">Colon</option>
                <option value="pipe">Pipe</option>
              </select>
            </label>
            <button class="btn btn-primary" id="fc-import-add">Add to deck</button>
            <button class="btn btn-ghost" id="fc-import-replace">Replace deck</button>
          </div>
        </div>
      </div>

      <!-- Deck toolbar -->
      <div class="fc-deck-bar">
        <span class="fc-deck-count" id="fc-deck-count">0 cards</span>
        <div class="fc-deck-actions">
          <button class="btn btn-ghost fc-sm" id="fc-shuffle-deck">Shuffle</button>
          <button class="btn btn-ghost fc-sm" id="fc-export">Export CSV</button>
          <button class="btn btn-ghost fc-sm" id="fc-print">Print</button>
          <button class="btn btn-clear fc-sm" id="fc-clear">Clear deck</button>
        </div>
      </div>

      <p class="fc-empty" id="fc-empty">No cards yet. Add one above, or import a list to get started.</p>
      <ol class="fc-list" id="fc-list"></ol>

    </section>

    <!-- ── Study panel ── -->
    <section class="fc-panel hidden" id="fc-panel-study" role="tabpanel" aria-labelledby="fc-tab-study">

      <div class="fc-study-head">
        <span class="fc-progress-text" id="fc-progress-text">0 / 0</span>
        <span class="fc-progress-text fc-known" id="fc-known-text">0 known</span>
      </div>
      <div class="fc-progress-track" role="progressbar" aria-label="Cards marked as known" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" id="fc-progress-bar">
        <div class="fc-progress-fill" id="fc-progress-fill"></div>
      </div>

      <button type="button" class="fc-card" id="fc-card" aria-label="Flashcard — click to flip">
        <span class="fc-card-inner" id="fc-card-inner">
          <span class="fc-face fc-face-front">
            <span class="fc-face-tag">Front</span>
            <span class="fc-face-text" id="fc-card-front">Add some cards to start studying</span>
          </span>
          <span class="fc-face fc-face-back">
            <span class="fc-face-tag">Back</span>
            <span class="fc-face-text" id="fc-card-back"></span>
          </span>
        </span>
      </button>

      <p class="fc-status" id="fc-status" aria-live="polite">Click the card, or press Space, to flip it.</p>

      <div class="fc-study-controls">
        <button class="btn btn-ghost" id="fc-prev" aria-label="Previous card">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        </button>
        <button class="btn btn-ghost fc-again" id="fc-again">Review again</button>
        <button class="btn btn-primary" id="fc-know">Got it</button>
        <button class="btn btn-ghost" id="fc-next" aria-label="Next card">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
        </button>
      </div>

      <div class="fc-study-options">
        <label class="fc-toggle"><input type="checkbox" id="fc-opt-shuffle"> <span>Shuffle order</span></label>
        <label class="fc-toggle"><input type="checkbox" id="fc-opt-back"> <span>Show back first</span></label>
        <label class="fc-toggle"><input type="checkbox" id="fc-opt-unfinished"> <span>Only unfinished cards</span></label>
        <button class="btn btn-ghost fc-sm" id="fc-reset-progress">Reset progress</button>
      </div>

      <p class="fc-hint fc-keys">Keyboard: <kbd>Space</kbd> flip &middot; <kbd>&larr;</kbd> <kbd>&rarr;</kbd> move &middot; <kbd>1</kbd> review again &middot; <kbd>2</kbd> got it</p>

    </section>

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

  <!-- SEO + GEO content -->
  <div class="tool-content mt-32">

    <h2>About flashcards</h2>
    <p>A flashcard is the smallest possible study tool: a prompt on one side, the answer on the other, and nothing else to hide behind. Its power comes from what happens in the gap between the two. Reading a page of notes feels productive but mostly rehearses recognition — you see the material and it looks familiar. A flashcard forces retrieval instead: you have to produce the answer from memory before you turn the card over, and that act of pulling information out is what strengthens the memory, a phenomenon psychologists call the testing effect. The flip also gives you honest feedback within a second, so you find out immediately whether you actually knew something or only felt like you did. This maker keeps that simplicity intact while removing the paper: cards live in your browser, the deck reshuffles on demand, and the tool remembers which cards you have already conquered so your attention goes to the ones you have not.</p>

    <h2>History of flashcards</h2>
    <p>Flashcards are older than most of the technology used to study them. The first set widely credited as flashcards appeared in 1834, when the English author Favell Lee Mortimer published <em>Reading Disentangled</em>, a boxed collection of phonics cards designed to teach children to read one sound at a time. The scientific case for the method arrived later: in 1885 the German psychologist Hermann Ebbinghaus published his experiments on memory, mapping the forgetting curve that shows how quickly newly learned material decays and demonstrating that repetitions spread over time hold far better than the same effort crammed into one sitting. In 1972 the German science journalist Sebastian Leitner turned that finding into a practical system in his book <em>So lernt man lernen</em>, describing a set of numbered boxes in which a card you answer correctly moves to a box reviewed less often while a card you miss falls back to the first box. Computers picked the idea up in the 1980s with Piotr Woźniak's SuperMemo, the first program to schedule reviews algorithmically, and the open-source Anki, released in 2006, carried spaced repetition to a mass audience of language learners and medical students.</p>

    <h2>How spaced repetition strengthens recall</h2>
    <p>Spaced repetition is the deliberate use of Ebbinghaus's finding: review a fact just as you are about to forget it and the memory is reinforced far more than by reviewing it while it is still fresh. Each successful recall at a longer interval flattens the forgetting curve a little more, so the gaps between reviews can grow from a day to a week to a month. The Leitner box is the manual version of this idea, and marking a card as known here works the same way — it lifts the card out of the current rotation so the deck in front of you keeps narrowing to the material that is genuinely unresolved. The mechanism that makes it work is effortful retrieval: an answer that comes back slowly and with difficulty does more for long-term memory than one that arrives instantly, which is why it is worth pausing on a hard card before flipping it rather than turning it over the moment you feel stuck.</p>

    <h2>What flashcards are used for</h2>
    <p>Language learners are the classic case, drilling vocabulary, gendered articles, irregular verbs and character readings where there is no rule to derive the answer from and the only route is memory. Medical and law students use them for the enormous volume of discrete facts their exams demand — drug dosages, anatomical structures, case names and statutes — and often build decks collaboratively across a cohort. Beyond formal study, flashcards suit anything that is a lookup rather than a judgement: keyboard shortcuts, command-line flags, chemical symbols, historical dates, musical key signatures, capital cities, the names of colleagues before a conference. They suit memorising a speech or lines in a script, too. Where flashcards are a poor fit is material whose value lies in connection rather than recall — an argument you need to be able to construct, or a process you need to be able to carry out — which is better served by working through problems than by flipping cards.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">Are my flashcards saved if I close the tab?</p>
      <p class="faq-a">Yes. Your deck is written to your browser's local storage every time you change it, so closing the tab or shutting the computer down will not lose your cards — reopening the page brings the same deck back, along with which cards you had already marked as known. Because the storage lives in the browser rather than on a server, the deck is tied to that one browser on that one device: it will not appear in a different browser, in a private window, or on your phone, and clearing your browsing data will erase it. If a deck matters to you, use the Export CSV button to keep a copy you can re-import later or open in a spreadsheet.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I import a word list I already have?</p>
      <p class="faq-a">Yes, and it is usually the fastest way to build a deck. Open the Import a list panel and paste one card per line, with the front and back separated by a tab, a comma, a hyphen, a colon or a pipe. Leave the separator on Auto-detect and the importer works out which one you used, line by line. Copying two columns straight out of Excel, Google Sheets or Numbers pastes as tab-separated text, so a vocabulary list or a glossary you already keep in a spreadsheet becomes a deck in one step. You can add the imported lines to the deck you already have or replace it entirely.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What do the Got it and Review again buttons do?</p>
      <p class="faq-a">They sort the deck into cards you have learned and cards you still need. Got it marks the current card as known and moves on; Review again clears that mark so the card stays in the queue. The counter at the top shows how many cards are still outstanding, and ticking Only unfinished cards drops everything you have marked as known out of the rotation so you spend your time on the material that is not sticking yet. Marks are saved with the deck, so you can stop mid-session and pick up where you left off, and the Reset progress button clears every mark when you want a fresh pass through the whole deck.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How many flashcards should I study in one session?</p>
      <p class="faq-a">Short, frequent sessions beat long ones. Most people do well with twenty to thirty cards in a sitting of ten to twenty minutes, repeated daily, rather than a single marathon review the night before a test — the spacing between sessions is what moves material into long-term memory. If a deck is large, split it into smaller decks by topic and rotate through them across the week. When a particular card keeps failing, it is usually a sign the card is trying to hold too much at once and should be broken into two or three simpler cards.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I print the flashcards to cut out?</p>
      <p class="faq-a">Yes. The Print button lays the deck out as a grid of cards with the front on the top half and the back on the bottom half, divided by a dashed fold line. Print the page, cut along the outer borders and fold each card in half and you have a physical set with the prompt on one side and the answer on the other. The rest of the page — header, navigation and the article below the tool — is hidden from the printout, so you only use paper on the cards themselves. Choosing Save as PDF instead of a printer in the print dialog gives you a shareable copy of the deck.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What makes a good flashcard?</p>
      <p class="faq-a">The strongest cards ask for exactly one piece of information. A card whose back holds a paragraph is really several cards stacked together, and you will never be sure which part you actually recalled; splitting it lets you see precisely what you know. Write the front as a specific question or cue rather than a bare topic, avoid wording that lets you guess the answer from the shape of the prompt, and give the answer in your own words so you are recalling meaning rather than matching a memorised sentence. Adding a short piece of context — an example sentence, a formula, a date — helps the memory attach to something, as long as the card still tests a single fact.</p>
    </div>

  </div>

</div>

<!-- Print sheet (populated on demand) -->
<div class="fc-print-sheet" id="fc-print-sheet" aria-hidden="true"></div>

<!-- Flashcard maker CSS -->
<style>
.fc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
  overflow: hidden;
}

/* Tabs */
.fc-tabs {
  display: flex;
  gap: 4px;
  padding: 10px 14px 0;
  border-bottom: 1px solid var(--border);
  background: var(--bg-2);
}

.fc-tab {
  padding: 9px 18px;
  border: 1px solid transparent;
  border-bottom: none;
  border-radius: var(--radius-sm) var(--radius-sm) 0 0;
  background: transparent;
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.9375rem;
  font-weight: 500;
  cursor: pointer;
  transition: color var(--transition), background var(--transition);
}

.fc-tab:hover { color: var(--accent); }

.fc-tab.active {
  background: var(--bg);
  border-color: var(--border);
  color: var(--text);
  margin-bottom: -1px;
  padding-bottom: 10px;
}

.fc-panel { padding: 18px 16px 20px; }

/* Shared field styles */
.fc-label {
  display: block;
  margin-bottom: 5px;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.fc-input {
  width: 100%;
  padding: 9px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  outline: none;
  transition: border-color var(--transition);
}

.fc-input:focus { border-color: var(--accent); }
.fc-input::placeholder { color: var(--text-3); }

.fc-area { resize: vertical; line-height: 1.5; min-height: 62px; }
.fc-select { cursor: pointer; }

.fc-deck-title-wrap { display: block; margin-bottom: 16px; }

.fc-hint { font-size: 0.8125rem; color: var(--text-3); margin: 0; }

/* Add card */
.fc-add {
  padding: 14px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
}

.fc-add-fields { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.fc-field { display: block; }
.fc-field .fc-input { background: var(--bg); }

.fc-add-actions {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-top: 12px;
  flex-wrap: wrap;
}

/* Import */
.fc-import { margin-top: 14px; }

.fc-import-toggle {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  padding: 6px 14px;
  border: 1px solid var(--border-2);
  border-radius: 20px;
  background: transparent;
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.8125rem;
  cursor: pointer;
  transition: color var(--transition), border-color var(--transition);
}

.fc-import-toggle:hover { color: var(--accent); border-color: var(--accent); }

.fc-import-body {
  margin-top: 12px;
  padding: 14px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.fc-import-area { background: var(--bg); font-family: var(--font-mono); font-size: 0.875rem; }

.fc-import-controls {
  display: flex;
  align-items: flex-end;
  gap: 10px;
  flex-wrap: wrap;
}

.fc-inline-field { display: block; }
.fc-inline-field .fc-input { background: var(--bg); width: auto; min-width: 160px; }

/* Deck toolbar */
.fc-deck-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  margin-top: 20px;
  padding-top: 14px;
  border-top: 1px solid var(--border);
  flex-wrap: wrap;
}

.fc-deck-count { font-size: 0.875rem; font-weight: 600; color: var(--text); }
.fc-deck-actions { display: flex; gap: 6px; flex-wrap: wrap; }
.fc-sm { font-size: 0.8125rem; padding: 6px 12px; }

/* Card list */
.fc-empty {
  margin: 18px 0 0;
  padding: 24px 16px;
  border: 1px dashed var(--border-2);
  border-radius: var(--radius-md);
  text-align: center;
  font-size: 0.9375rem;
  color: var(--text-3);
}

.fc-list { list-style: none; margin: 14px 0 0; padding: 0; display: flex; flex-direction: column; gap: 8px; }

.fc-row {
  display: grid;
  grid-template-columns: 28px 1fr 1fr 32px;
  align-items: center;
  gap: 8px;
  padding: 8px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
}

.fc-row.is-known { border-color: var(--success); background: var(--success-light); }
[data-theme="dark"] .fc-row.is-known { background: var(--accent-dim); }

.fc-row-num {
  font-size: 0.8125rem;
  color: var(--text-3);
  text-align: center;
  font-variant-numeric: tabular-nums;
}

.fc-row .fc-input { background: var(--bg); padding: 7px 10px; font-size: 0.875rem; }

.fc-row-del {
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid transparent;
  border-radius: var(--radius-sm);
  background: transparent;
  color: var(--text-3);
  cursor: pointer;
  transition: color var(--transition), border-color var(--transition);
}

.fc-row-del:hover { color: var(--danger); border-color: var(--danger); }

/* ── Study ── */
.fc-study-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  margin-bottom: 6px;
}

.fc-progress-text { font-size: 0.8125rem; color: var(--text-2); font-variant-numeric: tabular-nums; }
.fc-known { color: var(--accent); font-weight: 600; }

.fc-progress-track {
  height: 6px;
  border-radius: 3px;
  background: var(--bg-3);
  overflow: hidden;
}

.fc-progress-fill {
  height: 100%;
  width: 0;
  background: var(--accent);
  border-radius: 3px;
  transition: width var(--transition);
}

.fc-card {
  display: block;
  width: 100%;
  margin: 18px 0 0;
  padding: 0;
  border: none;
  background: transparent;
  perspective: 1400px;
  cursor: pointer;
  font-family: var(--font);
}

.fc-card-inner {
  position: relative;
  display: block;
  width: 100%;
  min-height: 230px;
  transform-style: preserve-3d;
  transition: transform 0.45s cubic-bezier(0.4, 0.2, 0.2, 1);
}

.fc-card.flipped .fc-card-inner { transform: rotateY(180deg); }

.fc-face {
  position: absolute;
  inset: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 26px 22px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-lg);
  background: var(--bg-2);
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  overflow: auto;
}

.fc-face-back { transform: rotateY(180deg); background: var(--accent-light); border-color: var(--accent); }

.fc-face-tag {
  font-size: 0.7rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-3);
}

.fc-face-back .fc-face-tag { color: var(--accent-dark); }
[data-theme="dark"] .fc-face-back .fc-face-tag { color: var(--accent); }

.fc-face-text {
  font-size: clamp(1.05rem, 3vw, 1.5rem);
  font-weight: 500;
  line-height: 1.45;
  color: var(--text);
  text-align: center;
  white-space: pre-wrap;
  word-break: break-word;
}

.fc-status { margin: 12px 0 0; text-align: center; font-size: 0.8125rem; color: var(--text-2); min-height: 1.2em; }

.fc-study-controls {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  margin-top: 14px;
  flex-wrap: wrap;
}

.fc-study-controls .btn { min-width: 44px; justify-content: center; }
.fc-again:hover { border-color: var(--warning); color: var(--warning); background: var(--warning-light); }
[data-theme="dark"] .fc-again:hover { background: transparent; }

.fc-study-options {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 16px;
  margin-top: 18px;
  padding-top: 16px;
  border-top: 1px solid var(--border);
  flex-wrap: wrap;
}

.fc-toggle { display: flex; align-items: center; gap: 7px; font-size: 0.875rem; color: var(--text-2); cursor: pointer; }
.fc-toggle input { accent-color: var(--accent); width: 15px; height: 15px; cursor: pointer; }

.fc-keys { text-align: center; margin-top: 14px; }

.fc-keys kbd {
  display: inline-block;
  padding: 1px 6px;
  border: 1px solid var(--border-2);
  border-radius: 4px;
  background: var(--bg-2);
  font-family: var(--font-mono);
  font-size: 0.75rem;
  color: var(--text-2);
}

@media (max-width: 620px) {
  .fc-add-fields { grid-template-columns: 1fr; }
  .fc-row { grid-template-columns: 22px 1fr 32px; }
  .fc-row .fc-back-input { grid-column: 2 / 3; }
  .fc-row-del { grid-row: 1 / 3; grid-column: 3 / 4; }
  .fc-row-num { grid-row: 1 / 3; }
}

/* ── Print sheet ── */
.fc-print-sheet { display: none; }

@media print {
  body { background: #fff; }

  /* Everything except the generated card sheet is left off the page */
  .site-header,
  .site-footer,
  .tool-page { display: none !important; }

  .fc-print-sheet {
    display: block !important;
    padding: 0;
    color: #000;
  }

  .fc-print-title { font-size: 14pt; margin: 0 0 10pt; }

  .fc-print-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8pt;
  }

  .fc-print-card {
    border: 1pt solid #000;
    border-radius: 3pt;
    break-inside: avoid;
    page-break-inside: avoid;
    overflow: hidden;
  }

  .fc-print-half {
    min-height: 70pt;
    padding: 8pt;
    font-size: 10pt;
    line-height: 1.35;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    word-break: break-word;
  }

  .fc-print-front { font-weight: 700; border-bottom: 1pt dashed #999; }
}
</style>

<!-- Flashcard maker JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var DECK_KEY = 'tp-flashcards-deck';
  var OPT_KEY  = 'tp-flashcards-options';

  var tabs        = document.querySelectorAll('.fc-tab');
  var panelBuild  = document.getElementById('fc-panel-build');
  var panelStudy  = document.getElementById('fc-panel-study');

  var titleInput  = document.getElementById('fc-deck-title');
  var frontInput  = document.getElementById('fc-front');
  var backInput   = document.getElementById('fc-back');
  var addBtn      = document.getElementById('fc-add');

  var importToggle = document.getElementById('fc-import-toggle');
  var importBody   = document.getElementById('fc-import-body');
  var importText   = document.getElementById('fc-import-text');
  var importSep    = document.getElementById('fc-import-sep');
  var importAdd    = document.getElementById('fc-import-add');
  var importRepl   = document.getElementById('fc-import-replace');

  var deckCount   = document.getElementById('fc-deck-count');
  var listEl      = document.getElementById('fc-list');
  var emptyEl     = document.getElementById('fc-empty');
  var shuffleDeck = document.getElementById('fc-shuffle-deck');
  var exportBtn   = document.getElementById('fc-export');
  var printBtn    = document.getElementById('fc-print');
  var clearBtn    = document.getElementById('fc-clear');

  var progressText = document.getElementById('fc-progress-text');
  var knownText    = document.getElementById('fc-known-text');
  var progressBar  = document.getElementById('fc-progress-bar');
  var progressFill = document.getElementById('fc-progress-fill');
  var cardEl       = document.getElementById('fc-card');
  var cardFront    = document.getElementById('fc-card-front');
  var cardBack     = document.getElementById('fc-card-back');
  var statusEl     = document.getElementById('fc-status');

  var prevBtn   = document.getElementById('fc-prev');
  var nextBtn   = document.getElementById('fc-next');
  var againBtn  = document.getElementById('fc-again');
  var knowBtn   = document.getElementById('fc-know');
  var resetBtn  = document.getElementById('fc-reset-progress');

  var optShuffle    = document.getElementById('fc-opt-shuffle');
  var optBackFirst  = document.getElementById('fc-opt-back');
  var optUnfinished = document.getElementById('fc-opt-unfinished');

  var printSheet = document.getElementById('fc-print-sheet');

  var deck    = { title: '', cards: [] };   // cards: { f, b, known }
  var options = { shuffle: false, backFirst: false, unfinished: false };

  var order   = [];      // indices into deck.cards, in study order
  var pos     = 0;
  var flipped = false;
  var activeTab = 'build';

  /* ── Persistence ── */
  function loadDeck() {
    try {
      var d = JSON.parse(localStorage.getItem(DECK_KEY));
      if (d && Array.isArray(d.cards)) {
        deck.title = typeof d.title === 'string' ? d.title : '';
        deck.cards = d.cards.filter(function (c) {
          return c && typeof c.f === 'string';
        }).map(function (c) {
          return { f: c.f, b: typeof c.b === 'string' ? c.b : '', known: !!c.known };
        });
      }
    } catch (e) {}
  }

  function saveDeck() {
    try { localStorage.setItem(DECK_KEY, JSON.stringify(deck)); } catch (e) {}
  }

  function loadOptions() {
    try {
      var o = JSON.parse(localStorage.getItem(OPT_KEY));
      if (o && typeof o === 'object') {
        for (var k in options) if (typeof o[k] === 'boolean') options[k] = o[k];
      }
    } catch (e) {}
  }

  function saveOptions() {
    try { localStorage.setItem(OPT_KEY, JSON.stringify(options)); } catch (e) {}
  }

  /* ── Tabs ── */
  function setTab(tab) {
    activeTab = tab;
    tabs.forEach(function (t) {
      var on = t.dataset.tab === tab;
      t.classList.toggle('active', on);
      t.setAttribute('aria-selected', on ? 'true' : 'false');
    });
    panelBuild.classList.toggle('hidden', tab !== 'build');
    panelStudy.classList.toggle('hidden', tab !== 'study');
    if (tab === 'study') { buildOrder(true); renderStudy(); }
  }

  tabs.forEach(function (t) {
    t.addEventListener('click', function () { setTab(t.dataset.tab); });
  });

  /* ── Deck editing ── */
  function addCard(front, back) {
    front = (front || '').trim();
    back  = (back  || '').trim();
    if (!front && !back) return false;
    deck.cards.push({ f: front, b: back, known: false });
    return true;
  }

  function renderDeck() {
    var n = deck.cards.length;
    deckCount.textContent = n === 1 ? '1 card' : n + ' cards';
    emptyEl.classList.toggle('hidden', n > 0);

    listEl.innerHTML = '';
    deck.cards.forEach(function (card, i) {
      listEl.appendChild(buildRow(card, i));
    });
  }

  function buildRow(card, i) {
    var li = document.createElement('li');
    li.className = 'fc-row' + (card.known ? ' is-known' : '');

    var num = document.createElement('span');
    num.className = 'fc-row-num';
    num.textContent = String(i + 1);

    var front = document.createElement('input');
    front.type = 'text';
    front.className = 'fc-input fc-front-input';
    front.value = card.f;
    front.setAttribute('aria-label', 'Front of card ' + (i + 1));
    front.addEventListener('input', function () {
      card.f = front.value;
      saveDeck();
    });

    var back = document.createElement('input');
    back.type = 'text';
    back.className = 'fc-input fc-back-input';
    back.value = card.b;
    back.setAttribute('aria-label', 'Back of card ' + (i + 1));
    back.addEventListener('input', function () {
      card.b = back.value;
      saveDeck();
    });

    var del = document.createElement('button');
    del.type = 'button';
    del.className = 'fc-row-del';
    del.title = 'Delete card ' + (i + 1);
    del.setAttribute('aria-label', 'Delete card ' + (i + 1));
    del.innerHTML = '<svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true"><path d="M3 4.5h10"/><path d="M6.5 4.5V3h3v1.5"/><path d="M4.5 4.5l.6 8a1 1 0 0 0 1 .9h3.8a1 1 0 0 0 1-.9l.6-8"/></svg>';
    del.addEventListener('click', function () {
      deck.cards.splice(i, 1);
      saveDeck();
      renderDeck();
    });

    li.appendChild(num);
    li.appendChild(front);
    li.appendChild(back);
    li.appendChild(del);
    return li;
  }

  addBtn.addEventListener('click', function () {
    if (!addCard(frontInput.value, backInput.value)) {
      statusMsg('Type something on the front or back first.', frontInput);
      return;
    }
    frontInput.value = '';
    backInput.value  = '';
    frontInput.focus();
    saveDeck();
    renderDeck();
  });

  function ctrlEnter(e) {
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
      e.preventDefault();
      addBtn.click();
    }
  }

  frontInput.addEventListener('keydown', ctrlEnter);
  backInput.addEventListener('keydown', ctrlEnter);

  titleInput.addEventListener('input', function () {
    deck.title = titleInput.value;
    saveDeck();
  });

  /* Brief feedback on a button or field */
  function statusMsg(text, focusEl) {
    if (focusEl) focusEl.focus();
    var prev = deckCount.textContent;
    deckCount.textContent = text;
    setTimeout(function () { if (deckCount.textContent === text) deckCount.textContent = prev; }, 1800);
  }

  /* ── Import ── */
  importToggle.addEventListener('click', function () {
    var hidden = importBody.classList.toggle('hidden');
    importToggle.setAttribute('aria-expanded', hidden ? 'false' : 'true');
    if (!hidden) importText.focus();
  });

  var SEPARATORS = {
    tab:   /\t+/,
    comma: /\s*,\s*/,
    dash:  /\s+[-–—]\s+/,
    colon: /\s*:\s*/,
    pipe:  /\s*\|\s*/
  };

  /* Split one line into [front, back] using the chosen separator */
  function splitLine(line, sep) {
    var keys = sep === 'auto' ? ['tab', 'dash', 'pipe', 'colon', 'comma'] : [sep];
    for (var i = 0; i < keys.length; i++) {
      var re = SEPARATORS[keys[i]];
      if (!re || !re.test(line)) continue;
      var parts = line.split(re);
      var front = parts.shift().trim();
      var back  = parts.join(keys[i] === 'comma' ? ', ' : ' ').trim();
      if (front || back) return [front, back];
    }
    return [line.trim(), ''];
  }

  function parseImport(text, sep) {
    var cards = [];
    text.split(/\r?\n/).forEach(function (line) {
      if (!line.trim()) return;
      var pair = splitLine(line, sep);
      if (pair[0] || pair[1]) cards.push({ f: pair[0], b: pair[1], known: false });
    });
    return cards;
  }

  function runImport(replace) {
    var cards = parseImport(importText.value, importSep.value);
    if (!cards.length) {
      statusMsg('Nothing to import — paste some lines first.', importText);
      return;
    }
    if (replace) deck.cards = cards;
    else deck.cards = deck.cards.concat(cards);
    importText.value = '';
    saveDeck();
    renderDeck();
    statusMsg(cards.length === 1 ? '1 card imported' : cards.length + ' cards imported');
  }

  importAdd.addEventListener('click', function () { runImport(false); });
  importRepl.addEventListener('click', function () { runImport(true); });

  /* ── Deck actions ── */
  function shuffleArray(arr) {
    for (var i = arr.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var tmp = arr[i]; arr[i] = arr[j]; arr[j] = tmp;
    }
    return arr;
  }

  shuffleDeck.addEventListener('click', function () {
    if (deck.cards.length < 2) return;
    shuffleArray(deck.cards);
    saveDeck();
    renderDeck();
  });

  clearBtn.addEventListener('click', function () {
    if (!deck.cards.length) return;
    if (!window.confirm('Delete every card in this deck? This cannot be undone.')) return;
    deck.cards = [];
    saveDeck();
    renderDeck();
  });

  /* CSV export — RFC 4180 quoting */
  function csvCell(value) {
    return '"' + String(value).replace(/"/g, '""') + '"';
  }

  exportBtn.addEventListener('click', function () {
    if (!deck.cards.length) { statusMsg('Add some cards before exporting.'); return; }

    var rows = ['Front,Back'];
    deck.cards.forEach(function (c) {
      rows.push(csvCell(c.f) + ',' + csvCell(c.b));
    });

    var name = (deck.title.trim() || 'flashcards')
      .toLowerCase()
      .replace(/[^a-z0-9]+/g, '-')
      .replace(/^-+|-+$/g, '') || 'flashcards';

    // BOM keeps accented characters readable when opened in Excel
    var blob = new Blob(['﻿' + rows.join('\r\n')], { type: 'text/csv;charset=utf-8' });
    var url  = URL.createObjectURL(blob);
    var a    = document.createElement('a');
    a.href = url;
    a.download = name + '.csv';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    setTimeout(function () { URL.revokeObjectURL(url); }, 1000);
  });

  /* Print — build a fold-over card sheet, then hand off to the browser */
  printBtn.addEventListener('click', function () {
    if (!deck.cards.length) { statusMsg('Add some cards before printing.'); return; }

    printSheet.innerHTML = '';

    if (deck.title.trim()) {
      var h = document.createElement('h1');
      h.className = 'fc-print-title';
      h.textContent = deck.title.trim();
      printSheet.appendChild(h);
    }

    var grid = document.createElement('div');
    grid.className = 'fc-print-grid';

    deck.cards.forEach(function (c) {
      var card = document.createElement('div');
      card.className = 'fc-print-card';

      var front = document.createElement('div');
      front.className = 'fc-print-half fc-print-front';
      front.textContent = c.f;

      var back = document.createElement('div');
      back.className = 'fc-print-half fc-print-back';
      back.textContent = c.b;

      card.appendChild(front);
      card.appendChild(back);
      grid.appendChild(card);
    });

    printSheet.appendChild(grid);
    window.print();
  });

  /* ── Study ── */
  function buildOrder(keepPosition) {
    var current = order.length ? order[Math.min(pos, order.length - 1)] : -1;

    order = [];
    deck.cards.forEach(function (c, i) {
      if (options.unfinished && c.known) return;
      order.push(i);
    });

    if (options.shuffle) shuffleArray(order);

    var at = keepPosition ? order.indexOf(current) : -1;
    pos = at >= 0 ? at : 0;
    flipped = false;
  }

  function currentCard() {
    if (!order.length) return null;
    return deck.cards[order[pos]] || null;
  }

  function knownCount() {
    return deck.cards.filter(function (c) { return c.known; }).length;
  }

  function setFlipped(state) {
    flipped = state;
    cardEl.classList.toggle('flipped', flipped);
  }

  function renderStudy() {
    var total = deck.cards.length;
    var known = knownCount();

    knownText.textContent = known + ' known';
    var pct = total ? Math.round((known / total) * 100) : 0;
    progressFill.style.width = pct + '%';
    progressBar.setAttribute('aria-valuenow', String(pct));

    var card = currentCard();
    var hasCards = !!card;

    [prevBtn, nextBtn, againBtn, knowBtn].forEach(function (b) { b.disabled = !hasCards; });
    cardEl.disabled = !hasCards;

    if (!hasCards) {
      progressText.textContent = '0 / ' + total;
      cardFront.textContent = total
        ? (options.unfinished ? 'Every card is marked as known. Untick “Only unfinished cards”, or reset your progress, to study again.' : 'This deck is empty.')
        : 'No cards yet — add some on the Build deck tab.';
      cardBack.textContent = '';
      setFlipped(false);
      statusEl.textContent = '';
      return;
    }

    progressText.textContent = (pos + 1) + ' / ' + order.length + (options.unfinished && order.length !== total ? ' left' : '');

    // "Show back first" swaps which side of the card starts face up
    cardFront.textContent = (options.backFirst ? card.b : card.f) || '(blank)';
    cardBack.textContent  = (options.backFirst ? card.f : card.b) || '(blank)';

    setFlipped(false);
    statusEl.textContent = card.known
      ? 'Marked as known. Click the card, or press Space, to flip it.'
      : 'Click the card, or press Space, to flip it.';
  }

  function move(step) {
    if (!order.length) return;
    pos = (pos + step + order.length) % order.length;
    renderStudy();
  }

  function mark(known) {
    var card = currentCard();
    if (!card) return;
    card.known = known;
    saveDeck();

    if (options.unfinished && known) {
      // The card leaves the rotation — rebuild without it, keeping our place
      var at = pos;
      buildOrder(false);
      pos = order.length ? Math.min(at, order.length - 1) : 0;
      renderStudy();
    } else {
      move(1);
    }
    renderDeck();
  }

  cardEl.addEventListener('click', function () { if (currentCard()) setFlipped(!flipped); });
  prevBtn.addEventListener('click', function () { move(-1); });
  nextBtn.addEventListener('click', function () { move(1); });
  againBtn.addEventListener('click', function () { mark(false); });
  knowBtn.addEventListener('click', function () { mark(true); });

  resetBtn.addEventListener('click', function () {
    deck.cards.forEach(function (c) { c.known = false; });
    saveDeck();
    renderDeck();
    buildOrder(false);
    renderStudy();
  });

  [['shuffle', optShuffle], ['backFirst', optBackFirst], ['unfinished', optUnfinished]].forEach(function (pair) {
    pair[1].addEventListener('change', function () {
      options[pair[0]] = pair[1].checked;
      saveOptions();
      buildOrder(pair[0] === 'backFirst');
      renderStudy();
    });
  });

  /* Keyboard shortcuts — study tab only, and never while typing */
  document.addEventListener('keydown', function (e) {
    if (activeTab !== 'study' || e.ctrlKey || e.metaKey || e.altKey) return;

    var t = e.target;
    var tag = t && t.tagName;
    if (tag === 'INPUT' || tag === 'TEXTAREA' || tag === 'SELECT' || (t && t.isContentEditable)) return;

    if (e.key === ' ' || e.key === 'Spacebar') {
      if (t === cardEl) return;   // the button handles its own Space
      e.preventDefault();
      if (currentCard()) setFlipped(!flipped);
    } else if (e.key === 'ArrowRight') {
      e.preventDefault(); move(1);
    } else if (e.key === 'ArrowLeft') {
      e.preventDefault(); move(-1);
    } else if (e.key === '1') {
      e.preventDefault(); mark(false);
    } else if (e.key === '2') {
      e.preventDefault(); mark(true);
    }
  });

  /* ── Init ── */
  loadDeck();
  loadOptions();

  titleInput.value = deck.title;
  optShuffle.checked    = options.shuffle;
  optBackFirst.checked  = options.backFirst;
  optUnfinished.checked = options.unfinished;

  renderDeck();
  buildOrder(false);
  renderStudy();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
