<?php
$tool_slug   = 'timezone-converter';
$tool_name   = 'Time Zone Converter';

$page_title  = 'Time Zone Converter — Convert Time Zones | TextlyPop';
$meta_desc   = 'Convert any time between time zones instantly and compare several cities at once, with automatic Daylight Saving and UTC offsets. Free, no signup.';
$canonical_url = 'https://textlypop.com/tools/timezone-converter';
$og_title    = 'Free Time Zone Converter & World Clock — TextlyPop';
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
  "name": "Time Zone Converter",
  "url": "https://textlypop.com/tools/timezone-converter",
  "description": "Convert any time between time zones instantly. Compare multiple cities at once, with automatic Daylight Saving, UTC offsets and day differences.",
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
      "name": "How do I convert a time from one time zone to another?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Set the date and time you want to convert and choose the time zone it is in — by default it uses your own device's time zone and the current moment. Then add the cities or zones you want to see it in, and each one shows the matching local time instantly, along with its UTC offset and whether it lands on the previous or next day. You can add as many target zones as you like to compare a meeting time across a whole team at once, and everything recalculates the moment you change the source time."
      }
    },
    {
      "@type": "Question",
      "name": "What is UTC and how is it different from GMT?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "UTC, Coordinated Universal Time, is the modern global time standard that every time zone is defined against as an offset, such as UTC+5:30 or UTC−8. GMT, Greenwich Mean Time, is the older standard based on the sun's position at the Greenwich meridian, and for everyday purposes the two are the same clock time. The technical difference is that UTC is kept precise by atomic clocks and is the reference used by computers and aviation, while GMT is a time zone still used by name in the UK and a few other places. When you see UTC+0, GMT and UTC agree exactly."
      }
    },
    {
      "@type": "Question",
      "name": "Does this converter handle Daylight Saving Time automatically?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The converter uses the full IANA time zone database built into your browser, which knows the exact Daylight Saving rules for every zone and every date. That means it applies the correct offset for the specific day you enter — so a time in New York in January uses Eastern Standard Time, while the same city in July uses Eastern Daylight Time an hour ahead. It also handles zones that have abolished or changed their Daylight Saving rules over the years, because the database is kept up to date with those changes."
      }
    },
    {
      "@type": "Question",
      "name": "Why are some time zone offsets not whole hours?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Although most zones sit a whole number of hours from UTC, several are offset by 30 or even 45 minutes. India runs at UTC+5:30 as a single nationwide zone, Nepal uses the unusual UTC+5:45, and parts of Australia use UTC+9:30. These half-hour and quarter-hour offsets exist for geographic and political reasons — a country may choose a compromise time that suits the whole territory rather than splitting into several zones. The converter accounts for all of them precisely, so a conversion into Kathmandu or Mumbai shows the correct minutes, not just the hour."
      }
    },
    {
      "@type": "Question",
      "name": "What time zone does the converter use by default?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It starts with your device's own time zone as the source and the current date and time, which it reads from your operating system's clock — so out of the box it is ready to convert your local time into other places. You can change the source zone to anywhere in the world if you are planning around a time in another city, and you can press the Now button at any point to jump back to the present moment. Your chosen list of comparison zones is remembered in your browser for next time."
      }
    },
    {
      "@type": "Question",
      "name": "Is my data private and does it work offline?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Completely. All the calculations happen in your browser using its built-in time zone data, so no dates, times or locations are ever sent to a server, logged or stored anywhere but your own device. Because nothing depends on a network request, the converter keeps working even if you go offline after the page has loaded. The only thing saved is your list of preferred time zones, and that is kept privately in your browser's local storage so your setup is ready the next time you visit."
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
        ['name' => 'Set the source time', 'text' => 'Choose the date and time to convert and the time zone it is in — it defaults to your local zone and now.'],
        ['name' => 'Add time zones', 'text' => 'Add the cities or zones you want to compare against, as many as you need.'],
        ['name' => 'Read the results', 'text' => 'Each zone shows the matching local time, its UTC offset and any day difference, updating live.'],
        ['name' => 'Copy the schedule', 'text' => 'Copy the full list of converted times to share a meeting time across a team.'],
    ]
) ?>
</script>

<script type="application/ld+json">
<?= get_breadcrumb_schema($tool_name, $tool_slug) ?>
</script>

<div class="tool-page">

  <?php render_breadcrumb(e($tool_name)); ?>

  <div class="tool-page-header">
    <h1>Time zone converter</h1>
    <p>Convert a time across the world at a glance. Automatic Daylight Saving, exact UTC offsets and day differences — all worked out in your browser.</p>
  </div>

  <div class="tz-tool" id="tz-tool">

    <!-- Source control -->
    <div class="tz-source">
      <div class="tz-source-row">
        <div class="tz-field">
          <label class="tz-field-label" for="tz-datetime">Convert this time</label>
          <input type="datetime-local" id="tz-datetime" class="tz-datetime">
        </div>
        <div class="tz-field tz-field-grow">
          <label class="tz-field-label" for="tz-source-zone">In time zone</label>
          <select id="tz-source-zone" class="tz-select"></select>
        </div>
        <button class="btn btn-ghost tz-now" id="tz-now">Now</button>
      </div>
      <label class="tz-24">
        <input type="checkbox" id="tz-24h"> <span>24-hour clock</span>
      </label>
    </div>

    <!-- Targets -->
    <div class="tz-targets-head">
      <span class="tz-targets-title">Shows in</span>
      <div class="tz-targets-actions">
        <button class="btn btn-ghost tz-add" id="tz-add">+ Add time zone</button>
        <button class="btn btn-copy" id="tz-copy">Copy all</button>
      </div>
    </div>

    <div class="tz-cards" id="tz-cards"></div>

    <!-- Copy toast -->
    <div class="tz-toast" id="tz-toast" aria-live="polite"></div>

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

    <h2>About time zones and UTC</h2>
    <p>A time zone is a region of the world that keeps the same official clock time, defined as an offset from Coordinated Universal Time (UTC), the global reference standard. When it is noon UTC, it is 5:30 in the afternoon in India (UTC+5:30) and 4 o'clock in the morning in Los Angeles (UTC−8). Converting between zones sounds like simple arithmetic, but it is complicated by Daylight Saving Time, offsets that are not whole hours, and rules that change from year to year and country to country. A converter removes all of that friction: you enter a moment and a place, and it shows you the equivalent local time everywhere else, correct for that exact date.</p>

    <h2>History of time zones</h2>
    <p>For most of history every town kept its own local time, set by the sun, so noon in one city was a few minutes off from the next. The railways changed that: trains needed a shared timetable, and by the 1840s Britain had adopted a single standard time. The idea of dividing the whole world into standard zones was championed by the Canadian engineer Sir Sandford Fleming in the 1870s, and in 1884 the International Meridian Conference in Washington established the Greenwich meridian as the world's prime meridian, the reference point from which zones are measured. Daylight Saving Time arrived later, first adopted nationally by Germany in 1916 to save fuel during the First World War. Today the practical rules for every zone are collected in the IANA time zone database, first assembled by Arthur David Olson in the 1980s and now relied upon by virtually every computer and phone — including the one in your browser powering this tool.</p>

    <h2>How to convert between time zones</h2>
    <p>The reliable way to convert a time is to think in terms of a single absolute moment. You take the wall-clock time in the source zone, add or subtract that zone's offset from UTC to find the underlying UTC instant, and then apply each target zone's offset to that instant to get its local time. The subtle part is that a zone's offset is not fixed — it depends on whether Daylight Saving is in effect on that particular date — so the same city can be an hour different in summer than in winter. This converter does the whole calculation for you using your browser's built-in time zone rules, which is why it handles Daylight Saving, half-hour offsets and day changes automatically rather than relying on a static table of numbers.</p>

    <h2>Why time zone conversion is tricky</h2>
    <p>Several quirks trip up manual conversions. Daylight Saving Time shifts many zones by an hour for part of the year, and the switch-over dates differ between countries — Europe and the United States do not change on the same weekend. Some places sit on 30- or 45-minute offsets, so the minutes matter, not just the hour. Converting across midnight lands you on a different calendar day, which is easy to get wrong when scheduling. And the rules themselves change: countries adopt, abolish or shift Daylight Saving, and occasionally redraw their zones entirely. Because this tool draws on a continuously updated time zone database rather than fixed offsets, it stays correct through all of these complications, which is exactly what makes automated conversion more trustworthy than doing the sums by hand.</p>

    <h2>Frequently asked questions</h2>

    <div class="faq-item">
      <p class="faq-q">How do I convert a time from one time zone to another?</p>
      <p class="faq-a">Set the date and time you want to convert and choose the time zone it is in — by default it uses your own device's time zone and the current moment. Then add the cities or zones you want to see it in, and each one shows the matching local time instantly, along with its UTC offset and whether it lands on the previous or next day. You can add as many target zones as you like to compare a meeting time across a whole team at once, and everything recalculates the moment you change the source time.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What is UTC and how is it different from GMT?</p>
      <p class="faq-a">UTC, Coordinated Universal Time, is the modern global time standard that every time zone is defined against as an offset, such as UTC+5:30 or UTC−8. GMT, Greenwich Mean Time, is the older standard based on the sun's position at the Greenwich meridian, and for everyday purposes the two are the same clock time. The technical difference is that UTC is kept precise by atomic clocks and is the reference used by computers and aviation, while GMT is a time zone still used by name in the UK and a few other places. When you see UTC+0, GMT and UTC agree exactly.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Does this converter handle Daylight Saving Time automatically?</p>
      <p class="faq-a">Yes. The converter uses the full IANA time zone database built into your browser, which knows the exact Daylight Saving rules for every zone and every date. That means it applies the correct offset for the specific day you enter — so a time in New York in January uses Eastern Standard Time, while the same city in July uses Eastern Daylight Time an hour ahead. It also handles zones that have abolished or changed their Daylight Saving rules over the years, because the database is kept up to date with those changes.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Why are some time zone offsets not whole hours?</p>
      <p class="faq-a">Although most zones sit a whole number of hours from UTC, several are offset by 30 or even 45 minutes. India runs at UTC+5:30 as a single nationwide zone, Nepal uses the unusual UTC+5:45, and parts of Australia use UTC+9:30. These half-hour and quarter-hour offsets exist for geographic and political reasons — a country may choose a compromise time that suits the whole territory rather than splitting into several zones. The converter accounts for all of them precisely, so a conversion into Kathmandu or Mumbai shows the correct minutes, not just the hour.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">What time zone does the converter use by default?</p>
      <p class="faq-a">It starts with your device's own time zone as the source and the current date and time, which it reads from your operating system's clock — so out of the box it is ready to convert your local time into other places. You can change the source zone to anywhere in the world if you are planning around a time in another city, and you can press the Now button at any point to jump back to the present moment. Your chosen list of comparison zones is remembered in your browser for next time.</p>
    </div>

    <div class="faq-item">
      <p class="faq-q">Is my data private and does it work offline?</p>
      <p class="faq-a">Completely. All the calculations happen in your browser using its built-in time zone data, so no dates, times or locations are ever sent to a server, logged or stored anywhere but your own device. Because nothing depends on a network request, the converter keeps working even if you go offline after the page has loaded. The only thing saved is your list of preferred time zones, and that is kept privately in your browser's local storage so your setup is ready the next time you visit.</p>
    </div>

  </div>

</div>

<!-- Time zone converter CSS -->
<style>
.tz-tool {
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg);
  overflow: hidden;
  position: relative;
}

/* Source */
.tz-source { padding: 16px; background: var(--bg-2); border-bottom: 1px solid var(--border); }

.tz-source-row { display: flex; gap: 12px; align-items: flex-end; flex-wrap: wrap; }

.tz-field { display: flex; flex-direction: column; gap: 5px; }
.tz-field-grow { flex: 1; min-width: 200px; }

.tz-field-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--text-3);
}

.tz-datetime, .tz-select {
  padding: 10px 12px;
  border: 1px solid var(--border-2);
  border-radius: var(--radius-md);
  background: var(--bg);
  color: var(--text);
  font-family: var(--font);
  font-size: 0.9375rem;
  outline: none;
  transition: border-color var(--transition);
}

.tz-datetime:focus, .tz-select:focus { border-color: var(--accent); }
.tz-select { width: 100%; cursor: pointer; }
.tz-now { flex-shrink: 0; }

.tz-24 { display: inline-flex; align-items: center; gap: 7px; margin-top: 12px; font-size: 0.8125rem; color: var(--text-2); cursor: pointer; }
.tz-24 input { accent-color: var(--accent); width: 14px; height: 14px; cursor: pointer; }

/* Targets header */
.tz-targets-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  gap: 10px;
  flex-wrap: wrap;
}

.tz-targets-title {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-3);
}

.tz-targets-actions { display: flex; gap: 8px; }

/* Cards */
.tz-cards { display: flex; flex-direction: column; }

.tz-card {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 14px 16px;
  border-top: 1px solid var(--border);
}

.tz-card-main { flex: 1; min-width: 0; display: flex; flex-direction: column; gap: 6px; }

.tz-card-zone-row { display: flex; align-items: center; gap: 8px; }
.tz-card-select {
  flex: 1;
  min-width: 0;
  padding: 5px 8px;
  border: 1px solid transparent;
  border-radius: var(--radius-sm);
  background: transparent;
  color: var(--text-2);
  font-family: var(--font);
  font-size: 0.8125rem;
  cursor: pointer;
  transition: border-color var(--transition), background var(--transition);
}
.tz-card-select:hover { border-color: var(--border-2); background: var(--bg-2); }
.tz-card-select:focus { border-color: var(--accent); background: var(--bg); outline: none; }

.tz-card-sub { font-size: 0.8125rem; color: var(--text-3); }

.tz-card-time-wrap { display: flex; align-items: baseline; gap: 10px; flex-shrink: 0; text-align: right; }
.tz-card-time { font-size: 1.6rem; font-weight: 700; color: var(--text); font-variant-numeric: tabular-nums; line-height: 1.1; white-space: nowrap; }

.tz-day-badge {
  display: inline-block;
  font-size: 0.7rem;
  font-weight: 700;
  padding: 2px 7px;
  border-radius: 20px;
  white-space: nowrap;
}
.tz-day-next { background: rgba(59, 125, 216, 0.15); color: #3b7dd8; }
.tz-day-prev { background: rgba(214, 158, 46, 0.18); color: #b7791f; }
[data-theme="dark"] .tz-day-next { color: #79aef5; }
[data-theme="dark"] .tz-day-prev { color: #e8b95e; }

.tz-remove {
  flex-shrink: 0;
  width: 30px;
  height: 30px;
  border: 1px solid var(--border-2);
  border-radius: 50%;
  background: transparent;
  color: var(--text-3);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: color var(--transition), border-color var(--transition);
}
.tz-remove:hover { color: var(--danger); border-color: var(--danger); }

.tz-empty { padding: 24px 16px; text-align: center; color: var(--text-3); font-size: 0.9375rem; border-top: 1px solid var(--border); }

/* Toast */
.tz-toast {
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
.tz-toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

@media (max-width: 560px) {
  .tz-card { flex-wrap: wrap; }
  .tz-card-time-wrap { text-align: left; width: 100%; order: 3; }
  .tz-now { width: 100%; justify-content: center; }
}
</style>

<!-- Time zone converter JavaScript -->
<script nonce="<?= csp_nonce() ?>">
(function () {
  'use strict';

  var dtEl       = document.getElementById('tz-datetime');
  var srcZoneEl  = document.getElementById('tz-source-zone');
  var nowBtn     = document.getElementById('tz-now');
  var h24El      = document.getElementById('tz-24h');
  var cardsEl    = document.getElementById('tz-cards');
  var addBtn     = document.getElementById('tz-add');
  var copyBtn    = document.getElementById('tz-copy');
  var toast      = document.getElementById('tz-toast');

  var LOCAL = Intl.DateTimeFormat().resolvedOptions().timeZone || 'UTC';

  var FALLBACK = ['UTC','America/New_York','America/Chicago','America/Denver','America/Los_Angeles','America/Sao_Paulo',
    'Europe/London','Europe/Paris','Europe/Berlin','Europe/Moscow','Africa/Johannesburg','Asia/Dubai',
    'Asia/Kolkata','Asia/Kathmandu','Asia/Bangkok','Asia/Shanghai','Asia/Singapore','Asia/Tokyo',
    'Australia/Sydney','Pacific/Auckland'];

  var ZONES = FALLBACK;
  try {
    if (typeof Intl.supportedValuesOf === 'function') {
      var list = Intl.supportedValuesOf('timeZone');
      if (list && list.length) ZONES = list.slice();
    }
  } catch (e) {}
  if (ZONES.indexOf('UTC') === -1) ZONES.unshift('UTC');

  var OPTIONS_HTML = ZONES.map(function (z) {
    return '<option value="' + z + '">' + z.replace(/_/g, ' ').replace(/\//g, ' / ') + '</option>';
  }).join('');

  var TARGET_KEY = 'tp-tz-targets';
  var H24_KEY = 'tp-tz-24h';

  var targets = loadTargets();
  var use24 = false;
  try { use24 = localStorage.getItem(H24_KEY) === '1'; } catch (e) {}

  function loadTargets() {
    try {
      var t = JSON.parse(localStorage.getItem(TARGET_KEY));
      if (t && t.length) return t.filter(function (z) { return ZONES.indexOf(z) !== -1; });
    } catch (e) {}
    return ['America/New_York', 'Europe/London', 'Asia/Kolkata', 'Asia/Tokyo'].filter(function (z) {
      return ZONES.indexOf(z) !== -1;
    });
  }

  function saveTargets() {
    try { localStorage.setItem(TARGET_KEY, JSON.stringify(targets)); } catch (e) {}
  }

  /* ── Core conversion (verified against known DST / half-hour cases) ── */
  function getOffsetMs(zone, date) {
    var p = new Intl.DateTimeFormat('en-US', {
      timeZone: zone, hourCycle: 'h23',
      year: 'numeric', month: '2-digit', day: '2-digit',
      hour: '2-digit', minute: '2-digit', second: '2-digit'
    }).formatToParts(date);
    var m = {};
    p.forEach(function (x) { m[x.type] = x.value; });
    var asUTC = Date.UTC(+m.year, +m.month - 1, +m.day, +m.hour, +m.minute, +m.second);
    return asUTC - date.getTime();
  }

  function wallToInstant(y, mo, d, h, mi, zone) {
    var wallUTC = Date.UTC(y, mo - 1, d, h, mi);
    var off = getOffsetMs(zone, new Date(wallUTC));
    var inst = wallUTC - off;
    var off2 = getOffsetMs(zone, new Date(inst));
    if (off2 !== off) inst = wallUTC - off2;
    return inst;
  }

  function sourceInstant() {
    var v = dtEl.value;
    if (!v) return Date.now();
    var m = v.match(/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/);
    if (!m) return Date.now();
    return wallToInstant(+m[1], +m[2], +m[3], +m[4], +m[5], srcZoneEl.value);
  }

  function ymdNumber(instant, zone) {
    var s = new Intl.DateTimeFormat('en-CA', {
      timeZone: zone, year: 'numeric', month: '2-digit', day: '2-digit'
    }).format(new Date(instant));
    var m = s.match(/(\d{4})-(\d{2})-(\d{2})/);
    return Date.UTC(+m[1], +m[2] - 1, +m[3]);
  }

  function offsetLabel(instant, zone) {
    try {
      var p = new Intl.DateTimeFormat('en-US', { timeZone: zone, timeZoneName: 'shortOffset' })
        .formatToParts(new Date(instant)).find(function (x) { return x.type === 'timeZoneName'; });
      return p ? p.value : '';
    } catch (e) { return ''; }
  }

  function abbrLabel(instant, zone) {
    try {
      var p = new Intl.DateTimeFormat('en-US', { timeZone: zone, timeZoneName: 'short' })
        .formatToParts(new Date(instant)).find(function (x) { return x.type === 'timeZoneName'; });
      return p ? p.value : '';
    } catch (e) { return ''; }
  }

  function formatTime(instant, zone) {
    return new Intl.DateTimeFormat('en-US', {
      timeZone: zone, hour: 'numeric', minute: '2-digit', hour12: !use24
    }).format(new Date(instant));
  }

  function formatDate(instant, zone) {
    return new Intl.DateTimeFormat('en-US', {
      timeZone: zone, weekday: 'short', month: 'short', day: 'numeric'
    }).format(new Date(instant));
  }

  /* ── Card DOM ── */
  function buildCards() {
    cardsEl.innerHTML = '';
    if (!targets.length) {
      var empty = document.createElement('div');
      empty.className = 'tz-empty';
      empty.textContent = 'No time zones added. Click “Add time zone” to compare a time.';
      cardsEl.appendChild(empty);
      return;
    }
    targets.forEach(function (zone, idx) {
      var card = document.createElement('div');
      card.className = 'tz-card';

      var main = document.createElement('div');
      main.className = 'tz-card-main';

      var zoneRow = document.createElement('div');
      zoneRow.className = 'tz-card-zone-row';
      var select = document.createElement('select');
      select.className = 'tz-card-select';
      select.innerHTML = OPTIONS_HTML;
      select.value = zone;
      select.addEventListener('change', function () {
        targets[idx] = select.value;
        saveTargets();
        updateTimes();
      });
      zoneRow.appendChild(select);
      main.appendChild(zoneRow);

      var sub = document.createElement('div');
      sub.className = 'tz-card-sub';
      main.appendChild(sub);

      var timeWrap = document.createElement('div');
      timeWrap.className = 'tz-card-time-wrap';
      var time = document.createElement('span');
      time.className = 'tz-card-time';
      var badge = document.createElement('span');
      timeWrap.appendChild(time);
      timeWrap.appendChild(badge);

      var remove = document.createElement('button');
      remove.className = 'tz-remove';
      remove.type = 'button';
      remove.setAttribute('aria-label', 'Remove time zone');
      remove.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
      remove.addEventListener('click', function () {
        targets.splice(idx, 1);
        saveTargets();
        buildCards();
        updateTimes();
      });

      card.appendChild(main);
      card.appendChild(timeWrap);
      card.appendChild(remove);

      card._sub = sub; card._time = time; card._badge = badge;
      cardsEl.appendChild(card);
    });
  }

  function updateTimes() {
    var instant = sourceInstant();
    var srcYmd = ymdNumber(instant, srcZoneEl.value);
    var cards = cardsEl.querySelectorAll('.tz-card');
    cards.forEach(function (card, i) {
      var zone = targets[i];
      card._time.textContent = formatTime(instant, zone);

      var off = offsetLabel(instant, zone);
      var abbr = abbrLabel(instant, zone);
      var meta = formatDate(instant, zone);
      if (off) meta += ' · ' + off;
      if (abbr && abbr !== off && !/^GMT/.test(abbr)) meta += ' (' + abbr + ')';
      card._sub.textContent = meta;

      var diff = Math.round((ymdNumber(instant, zone) - srcYmd) / 86400000);
      var badge = card._badge;
      badge.className = '';
      if (diff > 0) { badge.className = 'tz-day-badge tz-day-next'; badge.textContent = '+' + diff + ' day' + (diff > 1 ? 's' : ''); }
      else if (diff < 0) { badge.className = 'tz-day-badge tz-day-prev'; badge.textContent = diff + ' day' + (diff < -1 ? 's' : ''); }
      else { badge.textContent = ''; }
    });
  }

  /* ── Copy ── */
  function showToast(msg) {
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(function () { toast.classList.remove('show'); }, 1500);
  }

  copyBtn.addEventListener('click', function () {
    var instant = sourceInstant();
    var lines = ['Source: ' + prettyZone(srcZoneEl.value) + ' — ' + formatDate(instant, srcZoneEl.value) + ', ' + formatTime(instant, srcZoneEl.value) + ' ' + offsetLabel(instant, srcZoneEl.value)];
    targets.forEach(function (zone) {
      lines.push(prettyZone(zone) + ': ' + formatDate(instant, zone) + ', ' + formatTime(instant, zone) + ' ' + offsetLabel(instant, zone));
    });
    var text = lines.join('\n');
    navigator.clipboard.writeText(text).then(function () { showToast('Copied schedule'); });
  });

  function prettyZone(z) { return z.replace(/_/g, ' ').replace(/\//g, ' / '); }

  /* ── Add zone ── */
  addBtn.addEventListener('click', function () {
    var pick = ['UTC', 'America/Los_Angeles', 'Europe/Berlin', 'Asia/Dubai', 'Australia/Sydney'].filter(function (z) {
      return ZONES.indexOf(z) !== -1 && targets.indexOf(z) === -1;
    })[0] || ZONES.find(function (z) { return targets.indexOf(z) === -1; }) || 'UTC';
    targets.push(pick);
    saveTargets();
    buildCards();
    updateTimes();
  });

  /* ── Source events ── */
  dtEl.addEventListener('input', updateTimes);
  srcZoneEl.addEventListener('change', updateTimes);
  nowBtn.addEventListener('click', function () { setNow(); updateTimes(); });
  h24El.addEventListener('change', function () {
    use24 = h24El.checked;
    try { localStorage.setItem(H24_KEY, use24 ? '1' : '0'); } catch (e) {}
    updateTimes();
  });

  function setNow() {
    var d = new Date();
    var p = function (n) { return String(n).padStart(2, '0'); };
    dtEl.value = d.getFullYear() + '-' + p(d.getMonth() + 1) + '-' + p(d.getDate()) + 'T' + p(d.getHours()) + ':' + p(d.getMinutes());
  }

  /* ── Init ── */
  srcZoneEl.innerHTML = OPTIONS_HTML;
  srcZoneEl.value = ZONES.indexOf(LOCAL) !== -1 ? LOCAL : 'UTC';
  h24El.checked = use24;
  setNow();
  buildCards();
  updateTimes();

})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
