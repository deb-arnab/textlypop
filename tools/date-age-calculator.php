<?php
$tool_slug   = 'date-age-calculator';
$tool_name   = 'Date-Age Calculator';

$page_title  = 'Age Calculator — Days Between Two Dates | TextlyPop';
$meta_desc   = 'Work out the exact difference between two dates, or your age in years, months, days and hours. Includes weekday counts and your next birthday. Free.';
$canonical_url = 'https://textlypop.com/tools/date-age-calculator';
$og_title    = 'Free Date Difference & Age Calculator — TextlyPop';
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
  "name": "Date & Age Calculator",
  "url": "https://textlypop.com/tools/date-age-calculator",
  "description": "Calculate the exact difference between two dates, or your precise age in years, months, days, weeks and hours, with weekday counts and next birthday.",
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
      "name": "How do I calculate the difference between two dates?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Choose a start date and an end date, and the calculator shows the gap between them broken down into years, months and days, as well as the total number of days, weeks, hours and minutes. It also counts how many of those days are weekdays and how many are weekend days, which is useful for working out deadlines and project durations. If you enter the dates in the wrong order it simply reverses them, and there is an option to include the end date itself in the count when you want the span to be inclusive."
      }
    },
    {
      "@type": "Question",
      "name": "How is my exact age calculated?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Enter your date of birth and the calculator works out how much time has passed until today, expressed the natural way as a number of full years, then the leftover months, then the leftover days. It counts complete calendar periods, so you are 30 years old right up until the day before your 31st birthday, exactly as age is reckoned in everyday life. Alongside the years, months and days it also shows your total age in days, weeks and hours, the day of the week you were born, and a countdown to your next birthday."
      }
    },
    {
      "@type": "Question",
      "name": "Why isn't the number of months just the total days divided by 30?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Because calendar months are not all the same length — they range from 28 to 31 days — so dividing by an average of 30 would give a misleading result. This calculator counts real calendar months instead. Going from the 15th of one month to the 15th of the next is exactly one month whether that month had 28 days or 31, which matches how people actually think about durations. That is why the years-months-days figure is the accurate way to express a span, while the total-days figure is there separately for when you need a single raw number."
      }
    },
    {
      "@type": "Question",
      "name": "Does the calculator account for leap years?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Every calculation uses the real calendar, so the extra day in each leap year is counted automatically and February is treated as 29 days in leap years and 28 otherwise. This matters for total-day counts across long spans and for people born on the 29th of February, whose birthday only falls on that exact date once every four years. In common years the calculator treats such a birthday as landing at the end of February, which is the usual convention for marking a leap-day birthday."
      }
    },
    {
      "@type": "Question",
      "name": "How do I count only working days between two dates?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The date difference result includes a weekday count, which is the number of Monday-to-Friday days in the span, along with a separate weekend count. That gives you the working days for scheduling and deadline estimates without counting Saturdays and Sundays. Bear in mind that it does not know about public holidays, which vary by country and region, so for an exact working-day total you may need to subtract any national holidays that fall inside the period yourself."
      }
    },
    {
      "@type": "Question",
      "name": "Is my data private?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Every calculation happens in your browser, so the dates you enter — including your date of birth — are never uploaded, logged or stored on any server. Nothing leaves your device, and the tool keeps working even if you go offline after the page has loaded. That makes it safe to use for personal and sensitive dates without any privacy concern."
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
        ['name' => 'Choose the mode', 'text' => 'Pick Date difference to compare two dates, or Age to calculate an age from a date of birth.'],
        ['name' => 'Enter the dates', 'text' => 'Select your start and end dates, or a date of birth and the date to measure the age at.'],
        ['name' => 'Read the breakdown', 'text' => 'See the result in years, months and days, plus totals in weeks, days and hours.'],
        ['name' => 'Copy the result', 'text' => 'Copy the full breakdown to your clipboard to use elsewhere.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Date &amp; age calculator</h1>
    <p>Find the exact time between two dates, or your precise age — in years, months, days, weeks and hours. Calendar-accurate, with weekday counts and your next birthday.</p>
  </div>

  <div class="dc-tool" id="dc-tool">

    <!-- Mode tabs -->
    <div class="dc-tabs" role="tablist" aria-label="Calculator mode">
      <button class="dc-tab active" data-mode="diff" role="tab" aria-selected="true">Date difference</button>
      <button class="dc-tab" data-mode="age" role="tab" aria-selected="false">Age calculator</button>
    </div>

    <!-- Difference panel -->
    <div class="dc-panel" id="dc-panel-diff">
      <div class="dc-inputs">
        <div class="dc-field">
          <label class="dc-label" for="dc-start">Start date</label>
          <input type="date" id="dc-start" class="dc-date">
          <span class="dc-echo" id="dc-echo-start"></span>
        </div>
        <div class="dc-field">
          <label class="dc-label" for="dc-end">End date</label>
          <input type="date" id="dc-end" class="dc-date">
          <span class="dc-echo" id="dc-echo-end"></span>
        </div>
      </div>
      <label class="dc-check"><input type="checkbox" id="dc-inclusive"> <span>Include the end date in the count</span></label>

      <div class="dc-result" id="dc-diff-result">
        <div class="dc-headline" id="dc-diff-headline">—</div>
        <div class="dc-note hidden" id="dc-diff-note"></div>
        <div class="dc-grid" id="dc-diff-grid"></div>
      </div>
    </div>

    <!-- Age panel -->
    <div class="dc-panel hidden" id="dc-panel-age">
      <div class="dc-inputs">
        <div class="dc-field">
          <label class="dc-label" for="dc-dob">Date of birth</label>
          <input type="date" id="dc-dob" class="dc-date">
          <span class="dc-echo" id="dc-echo-dob"></span>
        </div>
        <div class="dc-field">
          <label class="dc-label" for="dc-asof">Age at date</label>
          <input type="date" id="dc-asof" class="dc-date">
          <span class="dc-echo" id="dc-echo-asof"></span>
        </div>
      </div>

      <div class="dc-result" id="dc-age-result">
        <div class="dc-headline" id="dc-age-headline">—</div>
        <div class="dc-note hidden" id="dc-age-note"></div>
        <div class="dc-grid" id="dc-age-grid"></div>
        <div class="dc-birthday hidden" id="dc-birthday"></div>
      </div>
    </div>

    <div class="dc-actions">
      <button class="btn btn-primary" id="dc-copy">Copy result</button>
    </div>

    <div class="dc-toast" id="dc-toast" aria-live="polite"></div>

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

    <h2>About date and age calculation</h2>
    <p>Working out how much time lies between two dates is one of those tasks that feels like it should be simple and rarely is. Months have different lengths, leap years add a day, and "one month later" means something different depending on where you start. A date calculator handles all of that for you: give it two dates and it returns the gap in the way people naturally express it — a number of years, months and days — as well as the raw totals in days, weeks and hours for when you need a single figure. The age calculator is the same idea pointed at a date of birth, turning it into an exact age and a countdown to the next birthday.</p>

    <h2>History of the calendar</h2>
    <p>The calendar we use to measure all of this has a long history of correction. Julius Caesar introduced the Julian calendar in 46 BC, adding a leap day every four years to keep the year roughly aligned with the seasons. But the Julian year was about eleven minutes too long, and over centuries the drift added up to ten full days. Pope Gregory XIII reformed it in 1582, creating the Gregorian calendar still in use today, which refined the leap-year rule so that century years are only leap years if divisible by 400 — which is why 2000 was a leap year but 1900 was not. That single rule is what a reliable date calculator must get right to count long spans correctly, and it is exactly the arithmetic this tool performs.</p>

    <h2>How date difference is calculated</h2>
    <p>There are two honest ways to express the time between dates, and a good calculator shows both. The first is the calendar breakdown: count the whole years from the start date, then the whole months, then the remaining days, clamping sensibly at the end of short months. This is how ages and anniversaries work — from the 15th of one month to the 15th of the next is one month, regardless of that month's length. The second is the total count: the exact number of days between the two dates, which can then be divided into weeks or multiplied into hours and minutes. The calendar breakdown is the intuitive answer, while the total is the precise one, and the two describe the same span from different angles.</p>

    <h2>Common uses for a date calculator</h2>
    <p>People reach for a date calculator constantly. Parents and teachers work out a child's exact age in years and months. Project managers count the working days to a deadline. Couples count down to a wedding or an anniversary, and expectant parents track weeks. Finance and legal work often hinges on the precise number of days between dates for interest, notice periods or contract terms. Travellers check how long a trip lasts or how many days remain on a visa. In each case the same underlying question — how much time is between these two points — is easy to get slightly wrong by hand and effortless to get exactly right with a tool that knows the calendar's rules.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I calculate the difference between two dates?</p>
      <p class="faq-a">Choose a start date and an end date, and the calculator shows the gap between them broken down into years, months and days, as well as the total number of days, weeks, hours and minutes. It also counts how many of those days are weekdays and how many are weekend days, which is useful for working out deadlines and project durations. If you enter the dates in the wrong order it simply reverses them, and there is an option to include the end date itself in the count when you want the span to be inclusive.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How is my exact age calculated?</p>
      <p class="faq-a">Enter your date of birth and the calculator works out how much time has passed until today, expressed the natural way as a number of full years, then the leftover months, then the leftover days. It counts complete calendar periods, so you are 30 years old right up until the day before your 31st birthday, exactly as age is reckoned in everyday life. Alongside the years, months and days it also shows your total age in days, weeks and hours, the day of the week you were born, and a countdown to your next birthday.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why isn't the number of months just the total days divided by 30?</p>
      <p class="faq-a">Because calendar months are not all the same length — they range from 28 to 31 days — so dividing by an average of 30 would give a misleading result. This calculator counts real calendar months instead. Going from the 15th of one month to the 15th of the next is exactly one month whether that month had 28 days or 31, which matches how people actually think about durations. That is why the years-months-days figure is the accurate way to express a span, while the total-days figure is there separately for when you need a single raw number.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does the calculator account for leap years?</p>
      <p class="faq-a">Yes. Every calculation uses the real calendar, so the extra day in each leap year is counted automatically and February is treated as 29 days in leap years and 28 otherwise. This matters for total-day counts across long spans and for people born on the 29th of February, whose birthday only falls on that exact date once every four years. In common years the calculator treats such a birthday as landing at the end of February, which is the usual convention for marking a leap-day birthday.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">How do I count only working days between two dates?</p>
      <p class="faq-a">The date difference result includes a weekday count, which is the number of Monday-to-Friday days in the span, along with a separate weekend count. That gives you the working days for scheduling and deadline estimates without counting Saturdays and Sundays. Bear in mind that it does not know about public holidays, which vary by country and region, so for an exact working-day total you may need to subtract any national holidays that fall inside the period yourself.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my data private?</p>
      <p class="faq-a">Yes. Every calculation happens in your browser, so the dates you enter — including your date of birth — are never uploaded, logged or stored on any server. Nothing leaves your device, and the tool keeps working even if you go offline after the page has loaded. That makes it safe to use for personal and sensitive dates without any privacy concern.</p>
    </div>

  </div>

</div>

<!-- Date & age calculator CSS -->
<style>
.dc-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
  overflow: hidden;
  position: relative;
}

/* Tabs */
.dc-tabs { display: flex; border-bottom: 1px solid var(--border); background: var(--bg-2); }

.dc-tab {
  flex: 1;
  padding: 13px 16px;
  border: none;
  background: transparent;
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.9375rem;
  font-weight: 600;
  cursor: pointer;
  border-bottom: 2px solid transparent;
  transition: color var(--transition), border-color var(--transition), background var(--transition);
}

.dc-tab:hover { color: var(--text); }
.dc-tab.active { color: var(--accent); border-bottom-color: var(--accent); background: var(--bg); }

/* Panels */
.dc-panel { padding: 20px 16px; }

.dc-inputs { display: flex; gap: 14px; flex-wrap: wrap; }

.dc-field { flex: 1; min-width: 160px; display: flex; flex-direction: column; gap: 6px; }

.dc-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--text-3);
}

.dc-date {
  padding: 10px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  outline: none;
  transition: border-color var(--transition);
}

.dc-date:focus { border-color: var(--accent); }

.dc-echo { font-size: 0.78rem; color: var(--accent); min-height: 1.1em; font-weight: 500; }

.dc-check { display: inline-flex; align-items: center; gap: 8px; margin-top: 14px; font-size: 0.875rem; color: var(--text-2); cursor: pointer; }
.dc-check input { accent-color: var(--accent); width: 15px; height: 15px; cursor: pointer; }

/* Result */
.dc-result { margin-top: 20px; }

.dc-headline {
  font-size: 1.75rem;
  font-weight: 700;
  color: var(--text);
  line-height: 1.2;
  text-align: center;
  padding: 18px 12px;
  background: var(--accent-light);
  border-radius: var(--radius-md);
}

[data-theme="dark"] .dc-headline { background: var(--accent-dim); }

.dc-note {
  margin-top: 10px;
  font-size: 0.8125rem;
  color: var(--text-3);
  text-align: center;
}

.dc-grid {
  margin-top: 16px;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
  gap: 8px;
}

.dc-stat {
  padding: 12px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  text-align: center;
}

.dc-stat-num { display: block; font-size: 1.25rem; font-weight: 700; color: var(--text); font-variant-numeric: tabular-nums; }
.dc-stat-label { display: block; font-size: 0.72rem; color: var(--text-3); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 3px; }

.dc-birthday {
  margin-top: 16px;
  padding: 14px 16px;
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  background: var(--bg-2);
  font-size: 0.9375rem;
  color: var(--text-2);
  text-align: center;
}
.dc-birthday strong { color: var(--accent); }

.dc-actions { padding: 0 16px 18px; }
.dc-actions .btn { width: 100%; justify-content: center; }

/* Toast */
.dc-toast {
  position: fixed;
  left: 50%;
  bottom: 28px;
  transform: translateX(-50%) translateY(20px);
  background: var(--text);
  color: var(--bg);
  padding: 9px 18px;
  border-radius: 24px;
  font-size: 0.875rem;
  font-weight: 500;
  opacity: 0;
  pointer-events: none;
  transition: opacity var(--transition), transform var(--transition);
  z-index: 200;
  box-shadow: 0 6px 24px rgba(0,0,0,0.18);
}
.dc-toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }
</style>

<!-- Date & age calculator JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var DAY = 86400000;

  var tabs      = document.querySelectorAll('.dc-tab');
  var panelDiff = document.getElementById('dc-panel-diff');
  var panelAge  = document.getElementById('dc-panel-age');

  var startEl   = document.getElementById('dc-start');
  var endEl     = document.getElementById('dc-end');
  var inclEl    = document.getElementById('dc-inclusive');
  var diffHead  = document.getElementById('dc-diff-headline');
  var diffNote  = document.getElementById('dc-diff-note');
  var diffGrid  = document.getElementById('dc-diff-grid');

  var dobEl     = document.getElementById('dc-dob');
  var asofEl    = document.getElementById('dc-asof');
  var ageHead   = document.getElementById('dc-age-headline');
  var ageNote   = document.getElementById('dc-age-note');
  var ageGrid   = document.getElementById('dc-age-grid');
  var bdayEl    = document.getElementById('dc-birthday');

  var copyBtn   = document.getElementById('dc-copy');
  var toast     = document.getElementById('dc-toast');

  var echoStart = document.getElementById('dc-echo-start');
  var echoEnd   = document.getElementById('dc-echo-end');
  var echoDob   = document.getElementById('dc-echo-dob');
  var echoAsof  = document.getElementById('dc-echo-asof');

  var mode = 'diff';

  /* ── Date helpers (UTC midnight to avoid DST drift) ── */
  function parse(v) {
    if (!v) return null;
    var m = v.match(/^(\d{4})-(\d{2})-(\d{2})$/);
    if (!m) return null;
    return new Date(Date.UTC(+m[1], +m[2] - 1, +m[3]));
  }

  function todayUTC() {
    var d = new Date();
    return new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
  }

  function toInput(d) {
    var p = function (n) { return String(n).padStart(2, '0'); };
    return d.getUTCFullYear() + '-' + p(d.getUTCMonth() + 1) + '-' + p(d.getUTCDate());
  }

  function addMonths(date, months) {
    var mo = date.getUTCMonth() + months;
    var ny = date.getUTCFullYear() + Math.floor(mo / 12);
    var nm = ((mo % 12) + 12) % 12;
    var dim = new Date(Date.UTC(ny, nm + 1, 0)).getUTCDate();
    var nd = Math.min(date.getUTCDate(), dim);
    return new Date(Date.UTC(ny, nm, nd));
  }

  /* Anchor-based Y/M/D breakdown — verified to never produce negatives */
  function breakdown(from, to) {
    var y = to.getUTCFullYear() - from.getUTCFullYear();
    var m = to.getUTCMonth() - from.getUTCMonth();
    if (m < 0) { y--; m += 12; }
    var anchor = addMonths(from, y * 12 + m);
    if (anchor.getTime() > to.getTime()) {
      m--;
      if (m < 0) { y--; m += 12; }
      anchor = addMonths(from, y * 12 + m);
    }
    var d = Math.round((to.getTime() - anchor.getTime()) / DAY);
    return { y: y, m: m, d: d };
  }

  function countWeekdays(aMs, bMs) {
    var total = Math.round((bMs - aMs) / DAY);
    var fullWeeks = Math.floor(total / 7);
    var weekdays = fullWeeks * 5;
    var extra = total % 7;
    var dow = new Date(aMs).getUTCDay();
    for (var i = 0; i < extra; i++) {
      if (dow !== 0 && dow !== 6) weekdays++;
      dow = (dow + 1) % 7;
    }
    return weekdays;
  }

  function weekdayName(d) {
    return new Intl.DateTimeFormat('en-US', { weekday: 'long', timeZone: 'UTC' }).format(d);
  }

  function longDate(d) {
    return new Intl.DateTimeFormat('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZone: 'UTC' }).format(d);
  }

  function nf(n) { return n.toLocaleString(); }

  /* Echo a picked date back in an unambiguous written form (month as a word) */
  function echoFmt(d) {
    return new Intl.DateTimeFormat('en-US', { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric', timeZone: 'UTC' }).format(d);
  }
  function setEcho(el, inputEl) {
    var d = parse(inputEl.value);
    el.textContent = d ? '= ' + echoFmt(d) : '';
  }

  function ymdText(b) {
    var parts = [];
    parts.push(b.y + ' year' + (b.y === 1 ? '' : 's'));
    parts.push(b.m + ' month' + (b.m === 1 ? '' : 's'));
    parts.push(b.d + ' day' + (b.d === 1 ? '' : 's'));
    return parts.join(', ');
  }

  function statTile(num, label) {
    return '<div class="dc-stat"><span class="dc-stat-num">' + num + '</span><span class="dc-stat-label">' + label + '</span></div>';
  }

  /* ── Difference mode ── */
  function renderDiff() {
    setEcho(echoStart, startEl);
    setEcho(echoEnd, endEl);
    var a = parse(startEl.value);
    var b = parse(endEl.value);
    diffNote.classList.add('hidden');
    if (!a || !b) {
      diffHead.textContent = '—';
      diffGrid.innerHTML = '';
      return;
    }

    var from = a, to = b, reversed = false;
    if (from.getTime() > to.getTime()) { from = b; to = a; reversed = true; }

    if (inclEl.checked) to = new Date(to.getTime() + DAY);

    var bd = breakdown(from, to);
    var totalDays = Math.round((to.getTime() - from.getTime()) / DAY);

    diffHead.textContent = ymdText(bd);

    var notes = [];
    if (reversed) notes.push('Dates were in reverse order, so we measured from the earlier to the later date.');
    if (inclEl.checked) notes.push('End date is included in the count.');
    if (notes.length) { diffNote.textContent = notes.join(' '); diffNote.classList.remove('hidden'); }

    var weekdays = countWeekdays(from.getTime(), to.getTime());
    var weekends = totalDays - weekdays;
    var weeks = Math.floor(totalDays / 7);
    var remDays = totalDays % 7;

    diffGrid.innerHTML =
      statTile(nf(totalDays), 'Total days') +
      statTile(nf(weeks) + (remDays ? ' w ' + remDays + ' d' : ' weeks'), 'Weeks') +
      statTile(nf(weekdays), 'Weekdays') +
      statTile(nf(weekends), 'Weekend days') +
      statTile(nf(totalDays * 24), 'Total hours') +
      statTile(nf(totalDays * 1440), 'Total minutes');
  }

  /* ── Age mode ── */
  function renderAge() {
    setEcho(echoDob, dobEl);
    setEcho(echoAsof, asofEl);
    var dob = parse(dobEl.value);
    var asof = parse(asofEl.value) || todayUTC();
    ageNote.classList.add('hidden');
    bdayEl.classList.add('hidden');

    if (!dob) {
      ageHead.textContent = '—';
      ageGrid.innerHTML = '';
      return;
    }

    if (dob.getTime() > asof.getTime()) {
      ageHead.textContent = 'Not born yet';
      ageNote.textContent = 'The date of birth is after the age date. Pick an earlier birth date.';
      ageNote.classList.remove('hidden');
      ageGrid.innerHTML = '';
      return;
    }

    var bd = breakdown(dob, asof);
    ageHead.textContent = ymdText(bd) + ' old';

    var totalDays = Math.round((asof.getTime() - dob.getTime()) / DAY);
    var weeks = Math.floor(totalDays / 7);
    var totalMonths = bd.y * 12 + bd.m;

    ageGrid.innerHTML =
      statTile(nf(totalMonths), 'Total months') +
      statTile(nf(totalDays), 'Total days') +
      statTile(nf(weeks), 'Total weeks') +
      statTile(nf(totalDays * 24), 'Total hours');

    /* Next birthday */
    var by = asof.getUTCFullYear();
    var next = new Date(Date.UTC(by, dob.getUTCMonth(), dob.getUTCDate()));
    if (next.getTime() < asof.getTime()) next = new Date(Date.UTC(by + 1, dob.getUTCMonth(), dob.getUTCDate()));
    var daysToNext = Math.round((next.getTime() - asof.getTime()) / DAY);
    var turning = next.getUTCFullYear() - dob.getUTCFullYear();

    var bornOn = weekdayName(dob);
    var nextMsg;
    if (daysToNext === 0) {
      nextMsg = '🎉 Happy birthday! Turning <strong>' + turning + '</strong> today.';
    } else {
      nextMsg = 'Born on a <strong>' + bornOn + '</strong>. Next birthday in <strong>' + nf(daysToNext) +
        '</strong> day' + (daysToNext === 1 ? '' : 's') + ' (turning <strong>' + turning + '</strong> on ' +
        new Intl.DateTimeFormat('en-US', { weekday: 'long', month: 'long', day: 'numeric', timeZone: 'UTC' }).format(next) + ').';
    }
    bdayEl.innerHTML = nextMsg;
    bdayEl.classList.remove('hidden');
  }

  function render() {
    if (mode === 'diff') renderDiff();
    else renderAge();
  }

  /* ── Copy ── */
  function showToast(msg) {
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(function () { toast.classList.remove('show'); }, 1500);
  }

  copyBtn.addEventListener('click', function () {
    var text = '';
    if (mode === 'diff') {
      var a = parse(startEl.value), b = parse(endEl.value);
      if (!a || !b) return;
      var from = a, to = b;
      if (from.getTime() > to.getTime()) { from = b; to = a; }
      var toInc = inclEl.checked ? new Date(to.getTime() + DAY) : to;
      var bd = breakdown(from, toInc);
      var totalDays = Math.round((toInc.getTime() - from.getTime()) / DAY);
      text = 'From ' + longDate(from) + ' to ' + longDate(to) + '\n' +
        ymdText(bd) + '\n' + nf(totalDays) + ' total days · ' + nf(countWeekdays(from.getTime(), toInc.getTime())) + ' weekdays';
    } else {
      var dob = parse(dobEl.value); if (!dob) return;
      var asof = parse(asofEl.value) || todayUTC();
      if (dob.getTime() > asof.getTime()) return;
      var abd = breakdown(dob, asof);
      var days = Math.round((asof.getTime() - dob.getTime()) / DAY);
      text = 'Born ' + longDate(dob) + '\nAge: ' + ymdText(abd) + ' (' + nf(days) + ' days)';
    }
    navigator.clipboard.writeText(text).then(function () { showToast('Copied result'); });
  });

  /* ── Tabs ── */
  tabs.forEach(function (t) {
    t.addEventListener('click', function () {
      mode = t.dataset.mode;
      tabs.forEach(function (x) {
        var on = x === t;
        x.classList.toggle('active', on);
        x.setAttribute('aria-selected', on ? 'true' : 'false');
      });
      panelDiff.classList.toggle('hidden', mode !== 'diff');
      panelAge.classList.toggle('hidden', mode !== 'age');
      render();
    });
  });

  /* ── Events ── */
  [startEl, endEl, inclEl].forEach(function (el) { el.addEventListener('input', renderDiff); });
  [dobEl, asofEl].forEach(function (el) { el.addEventListener('input', renderAge); });

  /* ── Init with useful defaults ── */
  var today = todayUTC();
  startEl.value = toInput(new Date(Date.UTC(today.getUTCFullYear(), 0, 1)));  // Jan 1 this year
  endEl.value = toInput(today);
  dobEl.value = '2000-01-01';
  asofEl.value = toInput(today);

  renderDiff();
  renderAge();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
