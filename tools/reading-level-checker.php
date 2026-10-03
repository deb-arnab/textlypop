<?php
$tool_slug   = 'reading-level-checker';
$tool_name   = 'Reading Level Checker';

$page_title  = 'Flesch Kincaid Test — Free Readability Score | TextlyPop';
$meta_desc   = 'Free Flesch Kincaid test and readability calculator. Get your grade level, Flesch Reading Ease score and Gunning Fog Index instantly. No signup.';
$canonical_url = 'https://textlypop.com/tools/reading-level-checker';
$og_title    = 'Flesch-Kincaid Reading Level Checker — TextlyPop';
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
  "name": "Reading Level Checker",
  "url": "https://textlypop.com/tools/reading-level-checker",
  "description": "Free Flesch-Kincaid reading level checker. Get your Flesch-Kincaid grade level, reading ease score and Gunning Fog Index instantly in your browser.",
  "applicationCategory": "UtilitiesApplication",
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
      "name": "What is a good Flesch Reading Ease score?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "For most writing aimed at a general audience, 60 to 70 is the sweet spot — standard prose comfortably readable by nearly every adult. Above 70 reads as easy and conversational; 30 to 50 signals college-level difficulty; below 30 is dense academic or legal territory. Match the score to your audience rather than chasing 100."
      }
    },
    {
      "@type": "Question",
      "name": "What reading level should my blog post be?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Target grade 6 to 8 on the Flesch-Kincaid scale, roughly a Reading Ease of 60 to 70. Most newspapers write at this level because it lets readers absorb ideas at full speed. Content at this level also tends to perform better for SEO — visitors stay longer when reading feels effortless."
      }
    },
    {
      "@type": "Question",
      "name": "How do I lower my reading level score?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Two changes do most of the work: shorten sentences toward a 15-to-20-word average, and swap multi-syllable words for plain synonyms — use not utilize, show not demonstrate. Beyond that, prefer active voice, break long paragraphs, and avoid nominalizations. Re-check the score after each editing pass."
      }
    },
    {
      "@type": "Question",
      "name": "What reading level does the average adult read at?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Literacy research places the average US adult's comfortable reading level around 7th to 8th grade, and roughly one in five adults reads below a 6th-grade level. The NIH recommends patient materials at a 6th-to-7th-grade level, which is why write-for-grade-8 is the default advice for public content."
      }
    },
    {
      "@type": "Question",
      "name": "Are readability formulas accurate?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "They are reliable indicators, not judges of quality. Formulas measure only sentence length and word length, so they cannot detect jargon made of short words or muddled logic. Use the scores as a smoke alarm: a grade level far above your audience is worth fixing, while small differences between drafts mean little."
      }
    },
    {
      "@type": "Question",
      "name": "What is the Flesch Kincaid test?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The Flesch Kincaid test is a pair of readability formulas that estimate how hard a piece of writing is to read, using only average sentence length and average syllables per word. Flesch Reading Ease returns a 0-100 score where higher is easier; Flesch Kincaid Grade Level returns a US school grade. Rudolf Flesch published the Reading Ease formula in 1948 and J. Peter Kincaid adapted it for the US Navy in 1975."
      }
    },
    {
      "@type": "Question",
      "name": "How is the Flesch Kincaid grade level calculated?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The formula is 0.39 x (words / sentences) + 11.8 x (syllables / words) - 15.59. It counts total words, sentences and syllables, then weights average sentence length and average syllables per word. Flesch Reading Ease uses the same inputs with different constants: 206.835 - 1.015 x (words / sentences) - 84.6 x (syllables / words)."
      }
    },
    {
      "@type": "Question",
      "name": "What is a good readability score for web content?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A Flesch Reading Ease score of 60 to 70, which corresponds to roughly grade 8 to 9, suits most general web audiences. Plain-language rules for government, health and insurance writing often require grade 8 or below. Technical documentation written for specialists can sit higher without being a problem, because the audience already knows the vocabulary."
      }
    }
  ]
}
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'HowTo',
  'name' => 'How to Check the Reading Level of Your Text',
  'description' => 'Analyze the readability and grade level of any text using TextlyPop reading level checker.',
  'step' => [
    ['@type'=>'HowToStep','position'=>1,'name'=>'Paste your text','text'=>'Type or paste your text into the input box. The reading level analysis updates instantly as you type.'],
    ['@type'=>'HowToStep','position'=>2,'name'=>'Read your scores','text'=>'The tool displays Flesch Reading Ease, Flesch-Kincaid Grade Level, Gunning Fog Index, and an overall readability grade.'],
    ['@type'=>'HowToStep','position'=>3,'name'=>'Check the breakdown','text'=>'View the detailed breakdown showing word count, sentence count, average sentence length, and average syllables per word.'],
    ['@type'=>'HowToStep','position'=>4,'name'=>'Improve your score','text'=>'Use shorter sentences and simpler words to improve readability. The scores update in real time as you edit your text.'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type'=>'ListItem','position'=>1,'name'=>'TextlyPop','item'=>'https://textlypop.com'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Tools','item'=>'https://textlypop.com/#tools'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Reading Level Checker','item'=>'https://textlypop.com/tools/reading-level-checker'],
  ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Flesch Kincaid reading level checker</h1>
    <p>Paste any text and instantly get your Flesch Kincaid grade level, Flesch Reading Ease readability score and Gunning Fog Index.</p>
  </div>

  <div class="rl-tool" id="rl-tool">

    <!-- Textarea -->
    <div class="rl-input-wrap">
      <textarea
        id="rl-input"
        class="rl-textarea"
        placeholder="Paste your text here to analyze its reading level…"
        aria-label="Text to analyze for reading level"
        data-save-key="reading-level-checker"
        spellcheck="true"></textarea>
      <div class="rl-input-footer">
        <span id="rl-word-count">0 words</span>
        <button class="btn btn-clear" data-targets="rl-input">Clear</button>
      </div>
    </div>

    <!-- Score cards -->
    <div class="rl-scores" id="rl-scores" aria-live="polite">

      <div class="rl-score-card rl-score-main" id="rl-grade-card">
        <div class="rl-score-badge" id="rl-grade-badge">—</div>
        <div class="rl-score-label">Overall grade</div>
        <div class="rl-score-desc" id="rl-grade-desc">Paste text to analyze</div>
      </div>

      <div class="rl-score-card">
        <div class="rl-score-num" id="rl-ease-num">—</div>
        <div class="rl-score-label">Flesch Reading Ease</div>
        <div class="rl-score-bar-wrap">
          <div class="rl-score-bar">
            <div class="rl-score-bar-fill" id="rl-ease-bar"></div>
          </div>
        </div>
        <div class="rl-score-desc" id="rl-ease-desc">0–100, higher is easier</div>
      </div>

      <div class="rl-score-card">
        <div class="rl-score-num" id="rl-fk-num">—</div>
        <div class="rl-score-label">Flesch-Kincaid Grade</div>
        <div class="rl-score-bar-wrap">
          <div class="rl-score-bar">
            <div class="rl-score-bar-fill" id="rl-fk-bar"></div>
          </div>
        </div>
        <div class="rl-score-desc" id="rl-fk-desc">US school grade level</div>
      </div>

      <div class="rl-score-card">
        <div class="rl-score-num" id="rl-fog-num">—</div>
        <div class="rl-score-label">Gunning Fog Index</div>
        <div class="rl-score-bar-wrap">
          <div class="rl-score-bar">
            <div class="rl-score-bar-fill" id="rl-fog-bar"></div>
          </div>
        </div>
        <div class="rl-score-desc" id="rl-fog-desc">Years of education needed</div>
      </div>

    </div>

    <!-- Detailed stats -->
    <div class="rl-stats" id="rl-stats" aria-live="polite">
      <div class="rl-stat">
        <span class="rl-stat-num" id="rl-words">0</span>
        <span class="rl-stat-label">Words</span>
      </div>
      <div class="rl-stat">
        <span class="rl-stat-num" id="rl-sentences">0</span>
        <span class="rl-stat-label">Sentences</span>
      </div>
      <div class="rl-stat">
        <span class="rl-stat-num" id="rl-syllables">0</span>
        <span class="rl-stat-label">Syllables</span>
      </div>
      <div class="rl-stat">
        <span class="rl-stat-num" id="rl-avg-sent">0</span>
        <span class="rl-stat-label">Avg sentence length</span>
      </div>
      <div class="rl-stat">
        <span class="rl-stat-num" id="rl-avg-syl">0</span>
        <span class="rl-stat-label">Avg syllables/word</span>
      </div>
      <div class="rl-stat">
        <span class="rl-stat-num" id="rl-complex">0%</span>
        <span class="rl-stat-label">Complex words</span>
      </div>
    </div>

  </div>

  <!-- Send to another tool -->
  <div class="send-to-wrap mt-16">
    <span class="send-to-label">Send text to:</span>
    <button class="send-to-btn" data-from="rl-input" data-to-tool="word-counter">Word counter</button>
    <button class="send-to-btn" data-from="rl-input" data-to-tool="sentence-counter">Sentence counter</button>
    <button class="send-to-btn" data-from="rl-input" data-to-tool="find-and-replace">Find and replace</button>
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

    <h2>The history of readability formulas</h2>
    <p>Readability measurement began as a practical problem. In 1948, Austrian-born writing consultant Rudolf Flesch published his Reading Ease formula to help journalists write for wider audiences — the Associated Press adopted it to keep newspaper writing accessible. In 1975, J. Peter Kincaid recalculated it for the US Navy, which needed to match technical manuals to the reading levels of recruits; his version reports a school grade instead of a 0–100 score, and the pair became known as Flesch-Kincaid. The formulas analyze just two things — sentence length and syllables per word — yet predict comprehension well enough that Microsoft Word, Google Docs and most writing tools still use them today, and some US states require insurance policies to meet minimum Flesch scores by law.</p>

    <h2>Flesch-Kincaid Grade Level explained</h2>
    <p>The Flesch-Kincaid Grade Level translates readability into the US school grade system. A score of 8 means an eighth grader can understand the text. Most newspapers target grades 6 to 8. Plain language guidelines for government documents often specify grade 8 or below. Technical documentation and academic papers commonly score at grade 12 or above. The Flesch-Kincaid formula uses average sentence length and average syllables per word to produce a grade level.</p>

    <h2>Flesch Reading Ease explained</h2>
    <p>The Flesch Reading Ease score is the other half of the Flesch-Kincaid system. It ranges from 0 to 100 — higher means easier. A score of 90 to 100 is very easy, understood by an average 11-year-old. A score of 60 to 70 is standard, appropriate for 13 to 15 year olds and the target for most web content. A score of 30 to 50 is difficult — college level. Below 30 is very confusing and suitable only for academic journals and legal documents.</p>

    <h2>The Flesch Kincaid formulas</h2>
    <p>Both halves of the Flesch Kincaid system are arithmetic on three counts: total words, total sentences, and total syllables. No dictionary of difficult words is involved, which is why the formulas are reproducible by hand and why every tool that implements them agrees to within a fraction of a point.</p>
    <p>Flesch Reading Ease is <code>206.835 − 1.015 × (words ÷ sentences) − 84.6 × (syllables ÷ words)</code>, producing a readability score on a 0–100 scale where higher is easier. Flesch Kincaid Grade Level is <code>0.39 × (words ÷ sentences) + 11.8 × (syllables ÷ words) − 15.59</code>, producing a US school grade. The two constants differ but the inputs do not, which is why the scores move in lockstep: shortening sentences or choosing shorter words improves both at once.</p>
    <p>Note that the grade level formula is not bounded. Very long sentences packed with polysyllabic words can produce a grade of 20 or more, well past any real school year — that is the formula telling you the text is dense rather than describing an actual class.</p>

    <h2>Flesch Kincaid score bands at a glance</h2>
    <p>The two scales run in opposite directions, which is the most common source of confusion: a high Reading Ease number is good news, a high Grade Level number is not.</p>
    <div class="table-scroll">
      <table class="seo-table">
        <thead>
          <tr><th>Reading Ease</th><th>Grade level</th><th>Difficulty</th><th>Typical of</th></tr>
        </thead>
        <tbody>
          <tr><td>90–100</td><td>5th grade</td><td>Very easy</td><td>Children's books, simple instructions</td></tr>
          <tr><td>80–89</td><td>6th grade</td><td>Easy</td><td>Popular fiction, consumer guidance</td></tr>
          <tr><td>70–79</td><td>7th grade</td><td>Fairly easy</td><td>Tabloid journalism, marketing copy</td></tr>
          <tr><td>60–69</td><td>8th–9th grade</td><td>Standard</td><td>Most web content, plain-language targets</td></tr>
          <tr><td>50–59</td><td>10th–12th grade</td><td>Fairly difficult</td><td>Quality broadsheet journalism</td></tr>
          <tr><td>30–49</td><td>College</td><td>Difficult</td><td>Technical documentation, trade press</td></tr>
          <tr><td>0–29</td><td>College graduate</td><td>Very confusing</td><td>Academic journals, legal contracts</td></tr>
        </tbody>
      </table>
    </div>
    <p>Grade 8 and a Reading Ease around 60–70 is the usual target for general audiences, and it is the level most plain-language policies specify. Health, government and insurance writing is frequently held to grade 8 or below by regulation.</p>

    <h2>Gunning Fog Index explained</h2>
    <p>The Gunning Fog Index estimates the years of formal education required to understand text on first reading. It weights heavily toward complex words — those with three or more syllables. A score of 12 corresponds to a US high school senior. A score of 17 corresponds to a college graduate. The Wall Street Journal targets a Fog Index of around 11. Time magazine aims for 10. If your Fog Index is above 12 for general web content, reducing complex words will have the biggest impact.</p>

    <h2>Improving a readability score</h2>
    <p>Because the formulas only see sentence length and syllable count, only two edits move the numbers. Splitting long sentences is the faster of the two: one 40-word sentence broken into three drops the grade level by several points on its own. Replacing long words with short ones — "use" for "utilise", "help" for "facilitate", "about" for "approximately" — moves the syllables-per-word term and tends to make the prose better rather than merely simpler.</p>
    <p>Two cautions are worth keeping in mind. The formulas cannot judge meaning, so text that scores well can still be incoherent, and deliberately chopping sentences to chase a number produces a staccato result that reads worse than what you started with. And a heading-heavy page scores artificially well, because each heading counts as a very short sentence. Treat the score as a check on your draft, not a target to optimise against.</p>
    <p>Two counts feed everything here, and both are worth seeing directly: the <a href="/tools/word-counter">word counter</a> reports words and characters, and the <a href="/tools/sentence-counter">sentence counter</a> reports sentence count and average sentence length — the single number that moves readability most. If the same long word keeps recurring, the <a href="/tools/word-frequency-counter">word frequency counter</a> will find it.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is a good Flesch Reading Ease score?</p>
      <p class="faq-a">For most writing aimed at a general audience, 60 to 70 is the sweet spot — standard prose comfortably readable by 13-to-15-year-olds and, by extension, nearly every adult. Above 70 reads as easy and conversational, which suits marketing copy and consumer help content. Scores of 30 to 50 signal college-level difficulty, and below 30 is dense academic or legal territory that general readers will abandon. Rather than chasing 100, match the score to your audience: a research summary can sit at 45 while a product page should not.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What reading level should my blog post be?</p>
      <p class="faq-a">Target grade 6 to 8 on the Flesch-Kincaid scale, which corresponds to a Reading Ease of roughly 60 to 70. That is not "dumbing down" — most newspapers write at this level, because it lets readers absorb ideas at full speed instead of decoding sentences. Content written at this level also tends to perform better for SEO: visitors stay longer and bounce less when reading feels effortless. Reserve higher grade levels for genuinely specialist audiences who expect technical vocabulary.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I lower my reading level score?</p>
      <p class="faq-a">Two changes do most of the work: shorten sentences toward a 15-to-20-word average, and swap multi-syllable words for plain synonyms — "use" not "utilize", "show" not "demonstrate", "buy" not "purchase". Beyond that, prefer active voice, break long paragraphs, and avoid nominalizations ("decide" rather than "make a decision"). Re-check the score after each editing pass; watching the grade level fall sentence by sentence is the fastest way to build a plain-language instinct.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What reading level does the average adult read at?</p>
      <p class="faq-a">Literacy research consistently places the average US adult's comfortable reading level around 7th to 8th grade, and roughly one in five adults reads below a 6th-grade level. Health and government agencies write to this reality — the NIH recommends patient materials at a 6th-to-7th-grade level, and plain-language laws hold federal documents to similar standards. This is why "write for grade 8" is the default advice for any content meant for the general public.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Are readability formulas accurate?</p>
      <p class="faq-a">They are reliable indicators, not judges of quality. Formulas measure only structure — sentence length and word length — so they cannot detect jargon made of short words, muddled logic, or graceful long sentences. A grade-8 score does not guarantee clear writing, and Hemingway would score "easy" while saying profound things. Use the scores as a smoke alarm: a grade level far above your audience is a real problem worth fixing, while small score differences between drafts mean little.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is the Flesch Kincaid test?</p>
      <p class="faq-a">The Flesch Kincaid test is a pair of readability formulas that estimate how hard a piece of writing is to read, using nothing but average sentence length and average syllables per word. Flesch Reading Ease returns a score from 0 to 100 where higher means easier, and Flesch Kincaid Grade Level returns a US school grade instead. Rudolf Flesch published the Reading Ease formula in 1948 for the Associated Press, and J. Peter Kincaid recalculated it for the US Navy in 1975 so technical manuals could be matched to recruits' reading levels — which is why the two names are joined. Paste your text above and both scores are calculated at once.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How is the Flesch Kincaid grade level calculated?</p>
      <p class="faq-a">The grade level formula is <code>0.39 × (words ÷ sentences) + 11.8 × (syllables ÷ words) − 15.59</code>. It needs only three counts from your text — total words, total sentences and total syllables — and weights average sentence length and average syllables per word against each other. Flesch Reading Ease runs on exactly the same three counts with different constants: <code>206.835 − 1.015 × (words ÷ sentences) − 84.6 × (syllables ÷ words)</code>. Because syllable counting in English is irregular, different tools occasionally disagree by a few tenths of a grade on the same passage; the difference is never large enough to change what you would do about it.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is a good readability score for web content?</p>
      <p class="faq-a">Aim for a Flesch Reading Ease of roughly 60 to 70, which is about grade 8 to 9 — comfortable for a general audience reading on a phone without much patience. Plain-language rules for government, health and insurance writing frequently mandate grade 8 or below, and several US states set minimum Flesch scores for insurance policies by law. Writing for specialists is the legitimate exception: technical documentation can sit at grade 12 or higher without being a failure, because the vocabulary that raises the score is vocabulary the audience already has.</p>
    </div>

  </div>

</div>

<!-- Reading level CSS -->
<style>
.rl-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--bg);
}

.rl-textarea {
  width: 100%;
  min-height: 200px;
  padding: 16px;
  border: none;
  background: transparent;
  font-family: var(--font);
  font-size: 1rem;
  color: var(--text);
  line-height: 1.7;
  resize: vertical;
  outline: none;
  display: block;
}

.rl-textarea::placeholder { color: var(--text-3); }

.rl-input-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border-top: 1px solid var(--border);
  background: var(--bg-2);
  font-size: 0.8125rem;
  color: var(--text-3);
}

/* Score cards grid */
.rl-scores {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}

.rl-score-card {
  padding: 18px 14px;
  border-right: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  gap: 6px;
}

.rl-score-card:last-child { border-right: none; }

.rl-score-main {
  background: var(--accent-light);
}
[data-theme="dark"] .rl-score-main { background: var(--accent-dim); }

/* Overall grade badge */
.rl-score-badge {
  font-size: 1.75rem;
  font-weight: 800;
  color: var(--accent);
  line-height: 1;
  min-height: 2rem;
  display: flex;
  align-items: center;
}

/* Score number */
.rl-score-num {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--accent);
  line-height: 1;
  font-variant-numeric: tabular-nums;
}

.rl-score-label {
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--text-2);
  text-transform: uppercase;
  letter-spacing: 0.04em;
}

.rl-score-bar-wrap { width: 100%; }

.rl-score-bar {
  height: 4px;
  background: var(--bg-3);
  border-radius: 2px;
  overflow: hidden;
  width: 100%;
}

.rl-score-bar-fill {
  height: 100%;
  border-radius: 2px;
  width: 0%;
  transition: width 0.4s ease, background 0.4s ease;
}

.rl-score-bar-fill.easy   { background: var(--accent); }
.rl-score-bar-fill.ok     { background: #d69e2e; }
.rl-score-bar-fill.hard   { background: #e53e3e; }

.rl-score-desc {
  font-size: 0.7rem;
  color: var(--text-3);
  line-height: 1.3;
}

/* Stats row */
.rl-stats {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  border-top: 1px solid var(--border);
}

.rl-stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 14px 6px;
  border-right: 1px solid var(--border);
  text-align: center;
}

.rl-stat:last-child { border-right: none; }

.rl-stat-num {
  font-size: 1.125rem;
  font-weight: 700;
  color: var(--text);
  line-height: 1;
  margin-bottom: 4px;
  font-variant-numeric: tabular-nums;
}

.rl-stat-label {
  font-size: 0.625rem;
  color: var(--text-3);
  text-transform: uppercase;
  letter-spacing: 0.04em;
  font-weight: 500;
  line-height: 1.3;
}

/* Mobile */
@media (max-width: 768px) {
  .rl-scores { grid-template-columns: 1fr 1fr; }
  .rl-score-card:nth-child(2) { border-right: none; }
  .rl-score-card:nth-child(3),
  .rl-score-card:nth-child(4) { border-top: 1px solid var(--border); }
  .rl-score-card:nth-child(4) { border-right: none; }
  .rl-stats { grid-template-columns: repeat(3, 1fr); }
  .rl-stat:nth-child(3) { border-right: none; }
  .rl-stat:nth-child(4),
  .rl-stat:nth-child(5),
  .rl-stat:nth-child(6) { border-top: 1px solid var(--border); }
}

@media (max-width: 480px) {
  .rl-scores { grid-template-columns: 1fr 1fr; }
  .rl-stats { grid-template-columns: repeat(2, 1fr); }
  .rl-stat:nth-child(2n) { border-right: none; }
  .rl-stat:nth-child(n+3) { border-top: 1px solid var(--border); }
}
</style>

<!-- Reading level JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var input     = document.getElementById('rl-input');
  var wordCount = document.getElementById('rl-word-count');

  var gradeBadge  = document.getElementById('rl-grade-badge');
  var gradeDesc   = document.getElementById('rl-grade-desc');
  var easeNum     = document.getElementById('rl-ease-num');
  var easeBar     = document.getElementById('rl-ease-bar');
  var easeDesc    = document.getElementById('rl-ease-desc');
  var fkNum       = document.getElementById('rl-fk-num');
  var fkBar       = document.getElementById('rl-fk-bar');
  var fkDesc      = document.getElementById('rl-fk-desc');
  var fogNum      = document.getElementById('rl-fog-num');
  var fogBar      = document.getElementById('rl-fog-bar');
  var fogDesc     = document.getElementById('rl-fog-desc');

  var statWords   = document.getElementById('rl-words');
  var statSents   = document.getElementById('rl-sentences');
  var statSyls    = document.getElementById('rl-syllables');
  var statAvgSent = document.getElementById('rl-avg-sent');
  var statAvgSyl  = document.getElementById('rl-avg-syl');
  var statComplex = document.getElementById('rl-complex');

  /* ── Syllable counter (English heuristic) ── */
  function countSyllables(word) {
    word = word.toLowerCase().replace(/[^a-z]/g, '');
    if (!word.length) return 0;
    if (word.length <= 3) return 1;

    word = word.replace(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '');
    word = word.replace(/^y/, '');
    var matches = word.match(/[aeiouy]{1,2}/g);
    return matches ? Math.max(1, matches.length) : 1;
  }

  /* ── Count sentences ── */
  function countSentences(text) {
    var matches = text.match(/[^.!?]*[.!?]+/g);
    return matches ? matches.length : (text.trim().length > 0 ? 1 : 0);
  }

  /* ── Analyze ── */
  function analyze() {
    var text = input.value.trim();

    if (!text || text.split(/\s+/).filter(Boolean).length < 5) {
      reset();
      wordCount.textContent = text ? text.split(/\s+/).filter(Boolean).length + ' words (need at least 5)' : '0 words';
      return;
    }

    var words     = text.split(/\s+/).filter(Boolean);
    var wordCount_n = words.length;
    var sentences = Math.max(1, countSentences(text));
    var sylCounts = words.map(function(w){ return countSyllables(w); });
    var totalSyls = sylCounts.reduce(function(a, b){ return a + b; }, 0);
    var complexWords = sylCounts.filter(function(s){ return s >= 3; }).length;

    var avgSentLen  = (wordCount_n / sentences).toFixed(1);
    var avgSylWord  = (totalSyls / wordCount_n).toFixed(2);
    var complexPct  = Math.round((complexWords / wordCount_n) * 100);

    /* Flesch Reading Ease */
    var ease = 206.835
      - (1.015 * (wordCount_n / sentences))
      - (84.6  * (totalSyls / wordCount_n));
    ease = Math.max(0, Math.min(100, ease));

    /* Flesch-Kincaid Grade Level */
    var fk = (0.39 * (wordCount_n / sentences))
           + (11.8 * (totalSyls / wordCount_n))
           - 15.59;
    fk = Math.max(0, fk);

    /* Gunning Fog */
    var fog = 0.4 * ((wordCount_n / sentences) + 100 * (complexWords / wordCount_n));
    fog = Math.max(0, fog);

    /* Overall grade label */
    var grade, gradeText, gradeColor;
    if (ease >= 70)       { grade = 'Easy';      gradeText = 'Easy to read. Suitable for general audiences.'; }
    else if (ease >= 60)  { grade = 'Standard';  gradeText = 'Standard reading level. Good for most web content.'; }
    else if (ease >= 50)  { grade = 'Moderate';  gradeText = 'Fairly difficult. Consider simplifying some sentences.'; }
    else if (ease >= 30)  { grade = 'Difficult'; gradeText = 'Difficult. Best for educated or specialist readers.'; }
    else                  { grade = 'Very hard'; gradeText = 'Very difficult. Consider a major rewrite for general audiences.'; }

    /* Update UI */
    wordCount.textContent = wordCount_n.toLocaleString() + ' words';

    gradeBadge.textContent = grade;
    gradeDesc.textContent  = gradeText;

    easeNum.textContent  = ease.toFixed(1);
    easeBar.style.width  = ease + '%';
    easeBar.className    = 'rl-score-bar-fill ' + (ease >= 60 ? 'easy' : ease >= 40 ? 'ok' : 'hard');
    easeDesc.textContent = getEaseDesc(ease);

    fkNum.textContent  = fk.toFixed(1);
    var fkPct = Math.min(100, (fk / 20) * 100);
    fkBar.style.width  = fkPct + '%';
    fkBar.className    = 'rl-score-bar-fill ' + (fk <= 8 ? 'easy' : fk <= 12 ? 'ok' : 'hard');
    fkDesc.textContent = 'Grade ' + Math.round(fk) + ' — ' + getFKDesc(fk);

    fogNum.textContent  = fog.toFixed(1);
    var fogPct = Math.min(100, (fog / 20) * 100);
    fogBar.style.width  = fogPct + '%';
    fogBar.className    = 'rl-score-bar-fill ' + (fog <= 10 ? 'easy' : fog <= 14 ? 'ok' : 'hard');
    fogDesc.textContent = getFogDesc(fog);

    statWords.textContent   = wordCount_n.toLocaleString();
    statSents.textContent   = sentences.toLocaleString();
    statSyls.textContent    = totalSyls.toLocaleString();
    statAvgSent.textContent = avgSentLen;
    statAvgSyl.textContent  = avgSylWord;
    statComplex.textContent = complexPct + '%';
  }

  function getEaseDesc(score) {
    if (score >= 90) return 'Very easy — age 11+';
    if (score >= 80) return 'Easy — age 11+';
    if (score >= 70) return 'Fairly easy — age 13+';
    if (score >= 60) return 'Standard — age 13–15';
    if (score >= 50) return 'Fairly difficult — age 15+';
    if (score >= 30) return 'Difficult — college level';
    return 'Very confusing — academic';
  }

  function getFKDesc(grade) {
    if (grade <= 6)  return 'Elementary school';
    if (grade <= 8)  return 'Middle school';
    if (grade <= 10) return 'High school';
    if (grade <= 12) return 'High school senior';
    if (grade <= 16) return 'College level';
    return 'Post-graduate';
  }

  function getFogDesc(score) {
    if (score <= 8)  return 'Easy — general audience';
    if (score <= 10) return 'Acceptable — Time magazine level';
    if (score <= 12) return 'High school level';
    if (score <= 14) return 'College level';
    if (score <= 16) return 'College graduate';
    return 'Very academic';
  }

  function reset() {
    gradeBadge.textContent = '—';
    gradeDesc.textContent  = 'Paste text to analyze';
    easeNum.textContent    = '—';
    fkNum.textContent      = '—';
    fogNum.textContent     = '—';
    [easeBar, fkBar, fogBar].forEach(function(b){ b.style.width = '0%'; });
    easeDesc.textContent   = '0–100, higher is easier';
    fkDesc.textContent     = 'US school grade level';
    fogDesc.textContent    = 'Years of education needed';
    statWords.textContent  = statSents.textContent = statSyls.textContent = '0';
    statAvgSent.textContent = statAvgSyl.textContent = '0';
    statComplex.textContent = '0%';
  }

  input.addEventListener('input', analyze);
  analyze();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
