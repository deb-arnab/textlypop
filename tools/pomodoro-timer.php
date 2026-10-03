<?php
$tool_slug   = 'pomodoro-timer';
$tool_name   = 'Pomodoro Timer';

$page_title  = 'Pomodoro Timer — Free Online Focus Timer | TextlyPop';
$meta_desc   = 'A free online Pomodoro timer with custom focus and break lengths, auto-cycling, sound alerts and desktop notifications. Beat procrastination. No signup.';
$canonical_url = 'https://textlypop.com/tools/pomodoro-timer';
$og_title    = 'Free Pomodoro Focus Timer — TextlyPop';
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
  "name": "Pomodoro Timer",
  "url": "https://textlypop.com/tools/pomodoro-timer",
  "description": "Free online Pomodoro timer with customizable focus and break lengths, auto-cycling, sound alerts and desktop notifications.",
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
      "name": "What is the Pomodoro Technique?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The Pomodoro Technique is a time-management method that breaks work into focused intervals — traditionally 25 minutes — separated by short breaks. Each interval is called a pomodoro. You work with full concentration until the timer rings, take a five-minute break, and after four pomodoros you take a longer break of 15 to 30 minutes. The structure turns a vague, intimidating task into a series of short, winnable sprints, and the regular breaks keep your attention fresh instead of letting it drain away over a long unbroken stretch."
      }
    },
    {
      "@type": "Question",
      "name": "Can I change the length of the focus and break periods?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. While 25 minutes of focus with 5-minute short breaks and a 15-minute long break is the classic setup, this timer lets you adjust every interval in the settings, along with how many pomodoros come before a long break. Some people focus better with 50-minute deep-work blocks and 10-minute breaks, while others prefer shorter 15-minute sprints. Your settings are saved in your browser, so your preferred configuration is remembered the next time you open the timer."
      }
    },
    {
      "@type": "Question",
      "name": "Does the timer keep accurate time if I switch tabs or lock my screen?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The countdown is calculated from a fixed end time rather than by counting ticks, so even when a background tab is slowed down by the browser to save power, the display snaps back to the correct remaining time the moment you return, and a session that should have finished will be marked complete. The one thing a heavily throttled background tab can delay is the exact instant the end-of-session sound plays, so keeping the tab visible, or enabling desktop notifications, gives you the most reliable alert."
      }
    },
    {
      "@type": "Question",
      "name": "Will I get an alert when a session ends?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "When a focus or break period finishes, the timer plays a short chime generated in your browser — no sound file is downloaded — and you can turn that sound off in the settings if you prefer to work silently. You can also enable desktop notifications, which ask your permission once and then pop up a system notification when each session ends, so you can look away from the tab and still know exactly when it is time to switch between working and resting."
      }
    },
    {
      "@type": "Question",
      "name": "What should I do during the breaks?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The break is for genuinely disengaging from the task so your mind can recover, which is what makes the next pomodoro productive. Stand up, stretch, look at something far away to rest your eyes, get water, or walk around — anything that is not the work you were just doing. It is best to avoid starting something absorbing like social media or email during a five-minute break, because those rarely stop cleanly at five minutes and pull your attention away from the rhythm the technique depends on."
      }
    },
    {
      "@type": "Question",
      "name": "Is my data private and does the timer work offline?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Completely private. The timer runs entirely in your browser, and your settings and today's completed count are stored only in your own browser's local storage — nothing is sent to a server or shared with anyone. Because there is no server involved, the timer also keeps working if you lose your internet connection: once the page has loaded you can go offline and it will run exactly the same, which makes it handy for focused work without distractions."
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
        ['name' => 'Set your task', 'text' => 'Optionally type what you are working on so you have a clear focus for the session.'],
        ['name' => 'Press Start', 'text' => 'Click Start to begin a 25-minute focus session. The ring counts down and the tab title shows the time remaining.'],
        ['name' => 'Take a break', 'text' => 'When the session ends you are moved to a short break. After four focus sessions you get a longer break.'],
        ['name' => 'Adjust the settings', 'text' => 'Open settings to customise focus and break lengths, auto-start, sound and notifications to suit how you work.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Pomodoro timer</h1>
    <p>Focus in short, timed sprints with automatic breaks. Customisable lengths, sound alerts and desktop notifications — all in your browser.</p>
  </div>

  <div class="pm-tool" id="pm-tool">

    <!-- Mode tabs -->
    <div class="pm-modes" role="group" aria-label="Timer mode">
      <button class="pm-mode-btn active" data-mode="focus" aria-pressed="true">Focus</button>
      <button class="pm-mode-btn" data-mode="short" aria-pressed="false">Short break</button>
      <button class="pm-mode-btn" data-mode="long" aria-pressed="false">Long break</button>
    </div>

    <!-- Task -->
    <div class="pm-task-wrap">
      <input
        type="text"
        id="pm-task"
        class="pm-task"
        placeholder="What are you focusing on? (optional)"
        aria-label="Current task"
        data-save-key="pomodoro-task"
        maxlength="120"
        autocomplete="off">
    </div>

    <!-- Timer ring -->
    <div class="pm-timer">
      <div class="pm-ring-wrap">
        <svg class="pm-ring" viewBox="0 0 200 200" aria-hidden="true">
          <circle class="pm-ring-track" cx="100" cy="100" r="90" fill="none" stroke-width="10"/>
          <circle class="pm-ring-progress" id="pm-ring-progress" cx="100" cy="100" r="90" fill="none" stroke-width="10" stroke-linecap="round"/>
        </svg>
        <div class="pm-time-center">
          <div class="pm-time" id="pm-time" role="timer" aria-live="off">25:00</div>
          <div class="pm-mode-label" id="pm-mode-label">Focus</div>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <div class="pm-controls">
      <button class="btn btn-primary pm-start" id="pm-start">Start</button>
      <button class="btn btn-ghost" id="pm-reset" title="Reset current session" aria-label="Reset current session">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <path d="M3 12a9 9 0 1 0 3-6.7L3 8"/><path d="M3 3v5h5"/>
        </svg>
      </button>
      <button class="btn btn-ghost" id="pm-skip" title="Skip to next session" aria-label="Skip to next session">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <polygon points="5 4 15 12 5 20 5 4"/><line x1="19" y1="5" x2="19" y2="19"/>
        </svg>
      </button>
    </div>

    <!-- Status line -->
    <div class="pm-status" id="pm-status" aria-live="polite">Ready to focus</div>

    <!-- Stats -->
    <div class="pm-stats">
      <div class="pm-stat">
        <span class="pm-stat-num" id="pm-stat-round">1</span>
        <span class="pm-stat-label">Round</span>
      </div>
      <div class="pm-stat">
        <span class="pm-stat-num" id="pm-stat-done">0</span>
        <span class="pm-stat-label">Pomodoros today</span>
      </div>
      <div class="pm-stat">
        <span class="pm-stat-num" id="pm-stat-mins">0</span>
        <span class="pm-stat-label">Minutes focused</span>
      </div>
    </div>

    <!-- Settings -->
    <div class="pm-settings-wrap">
      <button class="pm-settings-toggle" id="pm-settings-toggle" aria-expanded="false">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
        </svg>
        Settings
      </button>

      <div class="pm-settings hidden" id="pm-settings">
        <div class="pm-set-grid">
          <label class="pm-set">
            <span>Focus (min)</span>
            <input type="number" id="pm-set-focus" min="1" max="180" value="25">
          </label>
          <label class="pm-set">
            <span>Short break (min)</span>
            <input type="number" id="pm-set-short" min="1" max="60" value="5">
          </label>
          <label class="pm-set">
            <span>Long break (min)</span>
            <input type="number" id="pm-set-long" min="1" max="60" value="15">
          </label>
          <label class="pm-set">
            <span>Rounds before long break</span>
            <input type="number" id="pm-set-rounds" min="2" max="12" value="4">
          </label>
        </div>
        <div class="pm-set-toggles">
          <label class="pm-toggle"><input type="checkbox" id="pm-set-autobreak" checked> <span>Auto-start breaks</span></label>
          <label class="pm-toggle"><input type="checkbox" id="pm-set-autofocus"> <span>Auto-start next focus</span></label>
          <label class="pm-toggle"><input type="checkbox" id="pm-set-sound" checked> <span>Sound alert</span></label>
          <label class="pm-toggle"><input type="checkbox" id="pm-set-notify"> <span>Desktop notifications</span></label>
        </div>
        <button class="btn btn-ghost pm-reset-stats" id="pm-reset-stats">Reset today's count</button>
      </div>
    </div>

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

    <h2>About the Pomodoro Technique</h2>
    <p>The Pomodoro Technique is one of the best-known time-management methods in the world, built on a simple idea: concentration is easier to sustain in short, protected bursts than across a long, open-ended stretch. You pick one task, work on it with undivided attention for a set interval — a pomodoro — and then rest briefly before the next one. The timer does the discipline for you. Instead of asking whether you feel like working, you only have to commit to a single 25-minute block, which is short enough that starting feels manageable even when the overall task is daunting. The regular breaks are not a reward tacked on the end; they are part of the method, giving your attention time to recover so each block is as sharp as the last.</p>

    <h2>History of the Pomodoro Technique</h2>
    <p>The technique was created in the late 1980s by Francesco Cirillo, then a university student in Italy struggling to concentrate on his studies. He challenged himself to focus for just ten minutes and grabbed the tomato-shaped kitchen timer on his desk to measure it — and because the Italian word for tomato is <em>pomodoro</em>, the method and its intervals took that name. Cirillo refined the approach over the following years, settling on the now-familiar 25-minute work blocks with short breaks, and published it more widely in the 2000s. It spread rapidly through the software-development and productivity communities and has since become a staple studied in books, apps and classrooms around the world, all traceable back to one student and a kitchen timer.</p>

    <h2>How the Pomodoro Technique works</h2>
    <p>The classic cycle has four steps. First, choose a single task and start a 25-minute focus session, working only on that task until the timer rings. Second, take a five-minute short break to step away completely. Third, repeat — each completed 25-minute block is one pomodoro. Fourth, after four pomodoros, take a longer break of 15 to 30 minutes before starting the cycle again. This timer automates the whole loop: it moves you from focus to break and back, counts your completed pomodoros, and inserts the long break at the right point, so you never have to reset anything by hand. If a distraction pops into your head mid-session, the traditional advice is to jot it down and deal with it later rather than breaking focus.</p>

    <h2>What the Pomodoro Technique is used for</h2>
    <p>Students use it to study for exams without burning out, breaking dense material into blocks with recovery time between them. Writers and creators use it to get past the blank page, since committing to a single 25-minute session is far less intimidating than committing to "write the chapter". Developers and knowledge workers use it to protect deep-focus time from the constant pull of messages and meetings, and to make large projects feel measurable — progress becomes a countable stack of pomodoros rather than a vague sense of effort. Anyone prone to procrastination benefits from the way the technique lowers the barrier to starting, which is usually the hardest part of any task.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">What is the Pomodoro Technique?</p>
      <p class="faq-a">The Pomodoro Technique is a time-management method that breaks work into focused intervals — traditionally 25 minutes — separated by short breaks. Each interval is called a pomodoro. You work with full concentration until the timer rings, take a five-minute break, and after four pomodoros you take a longer break of 15 to 30 minutes. The structure turns a vague, intimidating task into a series of short, winnable sprints, and the regular breaks keep your attention fresh instead of letting it drain away over a long unbroken stretch.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Can I change the length of the focus and break periods?</p>
      <p class="faq-a">Yes. While 25 minutes of focus with 5-minute short breaks and a 15-minute long break is the classic setup, this timer lets you adjust every interval in the settings, along with how many pomodoros come before a long break. Some people focus better with 50-minute deep-work blocks and 10-minute breaks, while others prefer shorter 15-minute sprints. Your settings are saved in your browser, so your preferred configuration is remembered the next time you open the timer.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the timer keep accurate time if I switch tabs or lock my screen?</p>
      <p class="faq-a">Yes. The countdown is calculated from a fixed end time rather than by counting ticks, so even when a background tab is slowed down by the browser to save power, the display snaps back to the correct remaining time the moment you return, and a session that should have finished will be marked complete. The one thing a heavily throttled background tab can delay is the exact instant the end-of-session sound plays, so keeping the tab visible, or enabling desktop notifications, gives you the most reliable alert.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Will I get an alert when a session ends?</p>
      <p class="faq-a">When a focus or break period finishes, the timer plays a short chime generated in your browser — no sound file is downloaded — and you can turn that sound off in the settings if you prefer to work silently. You can also enable desktop notifications, which ask your permission once and then pop up a system notification when each session ends, so you can look away from the tab and still know exactly when it is time to switch between working and resting.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What should I do during the breaks?</p>
      <p class="faq-a">The break is for genuinely disengaging from the task so your mind can recover, which is what makes the next pomodoro productive. Stand up, stretch, look at something far away to rest your eyes, get water, or walk around — anything that is not the work you were just doing. It is best to avoid starting something absorbing like social media or email during a five-minute break, because those rarely stop cleanly at five minutes and pull your attention away from the rhythm the technique depends on.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my data private and does the timer work offline?</p>
      <p class="faq-a">Completely private. The timer runs entirely in your browser, and your settings and today's completed count are stored only in your own browser's local storage — nothing is sent to a server or shared with anyone. Because there is no server involved, the timer also keeps working if you lose your internet connection: once the page has loaded you can go offline and it will run exactly the same, which makes it handy for focused work without distractions.</p>
    </div>

  </div>

</div>

<!-- Pomodoro timer CSS -->
<style>
.pm-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
  padding: 22px 20px 24px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
}

/* Mode tabs */
.pm-modes { display: flex; gap: 6px; flex-wrap: wrap; justify-content: center; }

.pm-mode-btn {
  padding: 8px 16px;
  border: 1px solid var(--border-2);
  border-radius: 22px;
  background: var(--bg);
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.875rem;
  font-weight: 500;
  cursor: pointer;
  transition: background var(--transition), border-color var(--transition), color var(--transition);
}

.pm-mode-btn:hover { border-color: var(--accent); }
.pm-mode-btn.active { background: var(--accent); border-color: var(--accent); color: #fff; }
.pm-tool.mode-short .pm-mode-btn.active { background: var(--pm-short); border-color: var(--pm-short); }
.pm-tool.mode-long  .pm-mode-btn.active { background: var(--pm-long);  border-color: var(--pm-long); }

/* Task */
.pm-task-wrap { width: 100%; max-width: 420px; }

.pm-task {
  width: 100%;
  padding: 9px 14px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  text-align: center;
  outline: none;
  transition: border-color var(--transition);
}

.pm-task:focus { border-color: var(--accent); }
.pm-task::placeholder { color: var(--text-3); }

/* Ring */
.pm-timer { padding: 4px 0; }

.pm-ring-wrap {
  position: relative;
  width: 260px;
  height: 260px;
  max-width: 72vw;
  max-height: 72vw;
}

.pm-ring { width: 100%; height: 100%; transform: rotate(-90deg); }

.pm-ring-track { stroke: var(--bg-3); }

.pm-ring-progress {
  stroke: var(--accent);
  transition: stroke-dashoffset 0.3s linear, stroke 0.3s ease;
}

.pm-tool.mode-short .pm-ring-progress { stroke: var(--pm-short); }
.pm-tool.mode-long  .pm-ring-progress { stroke: var(--pm-long); }

.pm-time-center {
  position: absolute;
  inset: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 4px;
}

.pm-time {
  font-family: var(--font-mono);
  font-size: 3.4rem;
  font-weight: 700;
  color: var(--text);
  font-variant-numeric: tabular-nums;
  line-height: 1;
  letter-spacing: -0.01em;
}

.pm-mode-label {
  font-size: 0.8125rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-3);
}

/* Controls */
.pm-controls { display: flex; align-items: center; gap: 10px; }

.pm-start { min-width: 130px; justify-content: center; font-size: 1rem; padding: 11px 28px; }

.pm-controls .btn-ghost {
  width: 44px;
  height: 44px;
  padding: 0;
  justify-content: center;
  border-radius: 50%;
}

/* Status */
.pm-status { font-size: 0.875rem; color: var(--text-2); min-height: 1.2em; text-align: center; }

/* Stats */
.pm-stats {
  display: flex;
  gap: 8px;
  width: 100%;
  max-width: 420px;
}

.pm-stat {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 2px;
  padding: 12px 6px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
}

.pm-stat-num { font-size: 1.4rem; font-weight: 700; color: var(--text); font-variant-numeric: tabular-nums; }
.pm-stat-label { font-size: 0.7rem; color: var(--text-3); text-transform: uppercase; letter-spacing: 0.05em; text-align: center; }

/* Settings */
.pm-settings-wrap { width: 100%; max-width: 420px; }

.pm-settings-toggle {
  display: flex;
  align-items: center;
  gap: 7px;
  margin: 0 auto;
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

.pm-settings-toggle:hover { color: var(--accent); border-color: var(--accent); }

.pm-settings {
  margin-top: 14px;
  padding: 16px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.pm-set-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

.pm-set { display: flex; flex-direction: column; gap: 5px; }
.pm-set span { font-size: 0.8125rem; color: var(--text-2); }

.pm-set input {
  padding: 7px 10px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-sm);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  outline: none;
  transition: border-color var(--transition);
}

.pm-set input:focus { border-color: var(--accent); }

.pm-set-toggles { display: flex; flex-direction: column; gap: 9px; }

.pm-toggle { display: flex; align-items: center; gap: 8px; font-size: 0.875rem; color: var(--text); cursor: pointer; }
.pm-toggle input { accent-color: var(--accent); width: 15px; height: 15px; cursor: pointer; }

.pm-reset-stats { align-self: flex-start; font-size: 0.8125rem; padding: 6px 12px; }

@media (max-width: 480px) {
  .pm-time { font-size: 2.8rem; }
  .pm-stat-num { font-size: 1.2rem; }
}
</style>

<!-- Pomodoro palette (light + dark handled by variables) -->
<style>
:root { --pm-short: #2f9e70; --pm-long: #3b7dd8; }
[data-theme="dark"] :root, [data-theme="dark"] { --pm-short: #48c896; --pm-long: #5b9df0; }
</style>

<!-- Pomodoro timer JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var tool       = document.getElementById('pm-tool');
  var timeEl     = document.getElementById('pm-time');
  var modeLabel  = document.getElementById('pm-mode-label');
  var ring       = document.getElementById('pm-ring-progress');
  var startBtn   = document.getElementById('pm-start');
  var resetBtn   = document.getElementById('pm-reset');
  var skipBtn    = document.getElementById('pm-skip');
  var statusEl   = document.getElementById('pm-status');
  var modeBtns   = document.querySelectorAll('.pm-mode-btn');

  var statRound  = document.getElementById('pm-stat-round');
  var statDone   = document.getElementById('pm-stat-done');
  var statMins   = document.getElementById('pm-stat-mins');

  var settingsToggle = document.getElementById('pm-settings-toggle');
  var settingsPanel  = document.getElementById('pm-settings');
  var setFocus   = document.getElementById('pm-set-focus');
  var setShort   = document.getElementById('pm-set-short');
  var setLong    = document.getElementById('pm-set-long');
  var setRounds  = document.getElementById('pm-set-rounds');
  var setAutoBreak = document.getElementById('pm-set-autobreak');
  var setAutoFocus = document.getElementById('pm-set-autofocus');
  var setSound   = document.getElementById('pm-set-sound');
  var setNotify  = document.getElementById('pm-set-notify');
  var resetStats = document.getElementById('pm-reset-stats');

  var SET_KEY  = 'tp-pomodoro-settings';
  var STAT_KEY = 'tp-pomodoro-stats';

  var RADIUS = 90;
  var CIRC   = 2 * Math.PI * RADIUS;
  ring.style.strokeDasharray = CIRC.toFixed(2);

  var LABELS = { focus: 'Focus', short: 'Short break', long: 'Long break' };

  var settings = {
    focus: 25, short: 5, long: 15, rounds: 4,
    autoBreaks: true, autoFocus: false, sound: true, notify: false
  };

  var state = {
    mode: 'focus',
    running: false,
    remaining: 25 * 60 * 1000,   // ms
    endTime: 0,
    roundsSinceLong: 0,          // completed focus sessions in the current cycle
    tick: null
  };

  var baseTitle = document.title;
  var audioCtx = null;

  /* ── Persistence ── */
  function loadSettings() {
    try {
      var s = JSON.parse(localStorage.getItem(SET_KEY));
      if (s && typeof s === 'object') {
        for (var k in settings) if (s[k] !== undefined) settings[k] = s[k];
      }
    } catch (e) {}
  }

  function saveSettings() {
    try { localStorage.setItem(SET_KEY, JSON.stringify(settings)); } catch (e) {}
  }

  function todayKey() {
    var d = new Date();
    return d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
  }

  function loadStats() {
    var stats = { date: todayKey(), done: 0, mins: 0 };
    try {
      var s = JSON.parse(localStorage.getItem(STAT_KEY));
      if (s && s.date === todayKey()) stats = s;
    } catch (e) {}
    return stats;
  }

  function saveStats(stats) {
    try { localStorage.setItem(STAT_KEY, JSON.stringify(stats)); } catch (e) {}
  }

  var stats = loadStats();

  /* ── Duration helpers ── */
  function durationMs(mode) {
    var mins = mode === 'focus' ? settings.focus : mode === 'short' ? settings.short : settings.long;
    return Math.max(1, mins) * 60 * 1000;
  }

  /* ── Rendering ── */
  function fmt(ms) {
    var total = Math.max(0, Math.round(ms / 1000));
    var m = Math.floor(total / 60);
    var s = total % 60;
    return (m < 10 ? '0' + m : m) + ':' + (s < 10 ? '0' + s : s);
  }

  function render() {
    var total = durationMs(state.mode);
    var remaining = state.running ? Math.max(0, state.endTime - Date.now()) : state.remaining;
    var text = fmt(remaining);
    timeEl.textContent = text;
    modeLabel.textContent = LABELS[state.mode];

    var frac = total > 0 ? remaining / total : 0;
    ring.style.strokeDashoffset = (CIRC * (1 - frac)).toFixed(2);

    document.title = state.running ? (text + ' · ' + LABELS[state.mode] + ' — TextlyPop') : baseTitle;

    startBtn.textContent = state.running ? 'Pause' : (state.remaining < total ? 'Resume' : 'Start');
    statRound.textContent = (state.roundsSinceLong % settings.rounds) + 1;
    statDone.textContent = stats.done;
    statMins.textContent = stats.mins;

    tool.classList.toggle('mode-short', state.mode === 'short');
    tool.classList.toggle('mode-long', state.mode === 'long');
  }

  function renderMode() {
    modeBtns.forEach(function (b) {
      var active = b.dataset.mode === state.mode;
      b.classList.toggle('active', active);
      b.setAttribute('aria-pressed', active ? 'true' : 'false');
    });
  }

  /* ── Audio chime ── */
  function ensureAudio() {
    if (!audioCtx) {
      try { audioCtx = new (window.AudioContext || window.webkitAudioContext)(); } catch (e) { audioCtx = null; }
    }
    if (audioCtx && audioCtx.state === 'suspended') audioCtx.resume();
  }

  function chime() {
    if (!settings.sound || !audioCtx) return;
    var now = audioCtx.currentTime;
    [880, 1108, 1318].forEach(function (freq, i) {
      var osc = audioCtx.createOscillator();
      var gain = audioCtx.createGain();
      osc.type = 'sine';
      osc.frequency.value = freq;
      osc.connect(gain);
      gain.connect(audioCtx.destination);
      var t = now + i * 0.17;
      gain.gain.setValueAtTime(0.0001, t);
      gain.gain.exponentialRampToValueAtTime(0.28, t + 0.02);
      gain.gain.exponentialRampToValueAtTime(0.0001, t + 0.15);
      osc.start(t);
      osc.stop(t + 0.17);
    });
  }

  /* ── Notifications ── */
  function notify(title, body) {
    if (!settings.notify || !('Notification' in window)) return;
    if (Notification.permission === 'granted') {
      try { new Notification(title, { body: body, silent: true }); } catch (e) {}
    }
  }

  /* ── Timer engine ── */
  function startTimer() {
    ensureAudio();
    state.endTime = Date.now() + state.remaining;
    state.running = true;
    clearInterval(state.tick);
    state.tick = setInterval(function () {
      var remaining = state.endTime - Date.now();
      if (remaining <= 0) { complete(); return; }
      render();
    }, 200);
    statusEl.textContent = LABELS[state.mode] + ' in progress…';
    render();
  }

  function pauseTimer() {
    if (!state.running) return;
    state.remaining = Math.max(0, state.endTime - Date.now());
    state.running = false;
    clearInterval(state.tick);
    statusEl.textContent = 'Paused';
    render();
  }

  function toggleTimer() {
    if (state.running) pauseTimer();
    else startTimer();
  }

  function setMode(mode, autoStart) {
    state.mode = mode;
    state.running = false;
    clearInterval(state.tick);
    state.remaining = durationMs(mode);
    renderMode();
    render();
    if (autoStart) startTimer();
    else statusEl.textContent = mode === 'focus' ? 'Ready to focus' : 'Time for a break';
  }

  function complete() {
    clearInterval(state.tick);
    state.running = false;
    chime();

    var finished = state.mode;
    var next, autoStart;

    if (finished === 'focus') {
      stats.done += 1;
      stats.mins += settings.focus;
      saveStats(stats);
      state.roundsSinceLong += 1;
      if (state.roundsSinceLong >= settings.rounds) {
        state.roundsSinceLong = 0;
        next = 'long';
      } else {
        next = 'short';
      }
      autoStart = settings.autoBreaks;
      notify('Focus session complete', 'Time for a ' + (next === 'long' ? 'long' : 'short') + ' break.');
    } else {
      next = 'focus';
      autoStart = settings.autoFocus;
      notify('Break over', 'Back to focus — you can do this.');
    }

    setMode(next, autoStart);
  }

  /* ── Skip: advance without counting the current session ── */
  function skip() {
    clearInterval(state.tick);
    state.running = false;
    var next;
    if (state.mode === 'focus') {
      next = (state.roundsSinceLong + 1 >= settings.rounds) ? 'long' : 'short';
    } else {
      next = 'focus';
    }
    setMode(next, false);
  }

  function resetCurrent() {
    clearInterval(state.tick);
    state.running = false;
    state.remaining = durationMs(state.mode);
    statusEl.textContent = state.mode === 'focus' ? 'Ready to focus' : 'Time for a break';
    render();
  }

  /* ── Wire controls ── */
  startBtn.addEventListener('click', toggleTimer);
  resetBtn.addEventListener('click', resetCurrent);
  skipBtn.addEventListener('click', skip);

  modeBtns.forEach(function (b) {
    b.addEventListener('click', function () { setMode(b.dataset.mode, false); });
  });

  /* ── Settings ── */
  settingsToggle.addEventListener('click', function () {
    var hidden = settingsPanel.classList.toggle('hidden');
    settingsToggle.setAttribute('aria-expanded', hidden ? 'false' : 'true');
  });

  function applySettingInputs() {
    settings.focus  = clampInt(setFocus.value, 1, 180, 25);
    settings.short  = clampInt(setShort.value, 1, 60, 5);
    settings.long   = clampInt(setLong.value, 1, 60, 15);
    settings.rounds = clampInt(setRounds.value, 2, 12, 4);
    settings.autoBreaks = setAutoBreak.checked;
    settings.autoFocus  = setAutoFocus.checked;
    settings.sound  = setSound.checked;
    settings.notify = setNotify.checked;
    saveSettings();
    if (!state.running) { state.remaining = durationMs(state.mode); }
    render();
  }

  function clampInt(v, min, max, dflt) {
    var n = parseInt(v, 10);
    if (isNaN(n)) return dflt;
    return Math.max(min, Math.min(max, n));
  }

  [setFocus, setShort, setLong, setRounds, setAutoBreak, setAutoFocus, setSound].forEach(function (el) {
    el.addEventListener('change', applySettingInputs);
  });

  setNotify.addEventListener('change', function () {
    if (setNotify.checked && 'Notification' in window && Notification.permission === 'default') {
      Notification.requestPermission().then(function (perm) {
        if (perm !== 'granted') { setNotify.checked = false; }
        applySettingInputs();
      });
    } else {
      applySettingInputs();
    }
  });

  resetStats.addEventListener('click', function () {
    stats = { date: todayKey(), done: 0, mins: 0 };
    saveStats(stats);
    state.roundsSinceLong = 0;
    render();
    statusEl.textContent = "Today's count reset";
  });

  /* Keep the display honest when returning to a throttled tab */
  document.addEventListener('visibilitychange', function () {
    if (!document.hidden && state.running) {
      if (state.endTime - Date.now() <= 0) complete();
      else render();
    }
  });

  /* ── Init ── */
  loadSettings();
  setFocus.value = settings.focus;
  setShort.value = settings.short;
  setLong.value  = settings.long;
  setRounds.value = settings.rounds;
  setAutoBreak.checked = settings.autoBreaks;
  setAutoFocus.checked = settings.autoFocus;
  setSound.checked = settings.sound;
  setNotify.checked = settings.notify && ('Notification' in window) && Notification.permission === 'granted';
  settings.notify = setNotify.checked;

  state.remaining = durationMs('focus');
  renderMode();
  render();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
