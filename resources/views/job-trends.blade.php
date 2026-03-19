@include('auth.header')
<body class="content">
    <div class="container-fuild">
        @include('auth.topmenu')
        
        <div class="more-info" style="margin:0 !important;">
    <div class="container">
        <div class="row">

            <style>
                .jt { padding: 1.5rem 0; font-family: inherit; }
                .jt-head { margin-bottom: 1.25rem; }
                .jt-title { font-size: 1.5rem; font-weight: 500; color: #111827; }
                .jt-sub { font-size: 0.8125rem; color: #6b7280; margin-top: 3px; }

                .jt-toolbar { display: flex; flex-wrap: wrap; gap: 10px; align-items: center; margin-bottom: 1.25rem; }

                .jt-sel-w { position: relative; }
                .jt-sel-w::after {
                    content: ''; position: absolute; right: 10px; top: 50%;
                    transform: translateY(-50%);
                    border: 4px solid transparent; border-top-color: #9ca3af;
                    pointer-events: none;
                }
                .jt-sel {
                    appearance: none; -webkit-appearance: none;
                    background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px;
                    padding: 7px 28px 7px 11px; font-size: 0.8125rem;
                    color: #111827; cursor: pointer; min-width: 148px;
                    transition: border-color 0.15s;
                }
                .jt-sel:focus { outline: none; border-color: #6366f1; }

                .jt-toggles { display: flex; gap: 4px; margin-left: auto; }
                .jt-tog {
                    background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px;
                    padding: 6px 12px; font-size: 0.75rem; color: #6b7280; cursor: pointer;
                    transition: all 0.15s;
                }
                .jt-tog.active {
                    background: #fff; border-color: #d1d5db;
                    color: #111827; font-weight: 500;
                    box-shadow: 0 1px 2px rgba(0,0,0,0.06);
                }

                .jt-presets { display: flex; flex-wrap: wrap; gap: 4px; margin-bottom: 0; }
                .jt-preset {
                    background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px;
                    padding: 6px 11px; font-size: 0.75rem; color: #6b7280;
                    cursor: pointer; white-space: nowrap; transition: all 0.15s;
                }
                .jt-preset:hover { border-color: #d1d5db; color: #111827; }
                .jt-preset.active {
                    background: #fff; border-color: #d1d5db;
                    color: #111827; font-weight: 500;
                    box-shadow: 0 1px 2px rgba(0,0,0,0.06);
                }

                .jt-custom-row {
                    display: flex; align-items: center; gap: 6px;
                    flex-wrap: wrap; margin-top: 10px;
                }
                .jt-custom-row.hidden { display: none; }
                .jt-date-lbl { font-size: 0.75rem; color: #6b7280; }
                .jt-date-inp {
                    background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px;
                    padding: 7px 10px; font-size: 0.75rem; color: #111827;
                    transition: border-color 0.15s;
                }
                .jt-date-inp:focus { outline: none; border-color: #6366f1; }
                .jt-apply {
                    background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px;
                    padding: 6px 14px; font-size: 0.75rem; color: #111827; cursor: pointer;
                    transition: border-color 0.15s;
                }
                .jt-apply:hover { border-color: #d1d5db; }

                .jt-range-label {
                    font-size: 0.75rem; color: #6b7280;
                    margin-top: 10px; margin-bottom: 1.25rem;
                }
                .jt-range-label span { color: #111827; font-weight: 500; }

                .jt-stats {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                    gap: 10px; margin-bottom: 1.25rem;
                }
                .jt-stat { background: #f3f4f6; border-radius: 8px; padding: 12px 14px; }
                .jt-stat-lbl { font-size: 0.6875rem; color: #6b7280; margin-bottom: 3px; }
                .jt-stat-val { font-size: 1.25rem; font-weight: 500; color: #111827; }

                .jt-body {
                    display: grid;
                    grid-template-columns: 1fr 250px;
                    gap: 14px; align-items: start;
                }
                .jt-card {
                    background: #fff; border: 1px solid #e5e7eb;
                    border-radius: 12px; padding: 1.1rem;
                }
                .jt-legend { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 12px; font-size: 0.75rem; color: #6b7280; min-height: 18px; }
                .jt-leg-item { display: flex; align-items: center; gap: 5px; }
                .jt-leg-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }
                .jt-chart-wrap { position: relative; width: 100%; height: 260px; }

                .jt-lb-title { font-size: 0.8125rem; font-weight: 500; color: #111827; margin-bottom: 12px; }
                .jt-lb-row { display: flex; align-items: center; gap: 8px; margin-bottom: 10px; }
                .jt-lb-rank { font-size: 0.6875rem; color: #9ca3af; width: 14px; text-align: right; flex-shrink: 0; }
                .jt-lb-label { font-size: 0.75rem; color: #111827; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 76px; flex-shrink: 0; }
                .jt-lb-bar-wrap { flex: 1; background: #f3f4f6; border-radius: 3px; height: 6px; overflow: hidden; }
                .jt-lb-bar { height: 6px; border-radius: 3px; transition: width 0.4s ease; }
                .jt-lb-count { font-size: 0.6875rem; color: #6b7280; min-width: 30px; text-align: right; flex-shrink: 0; }

                .jt-empty {
                    display: flex; flex-direction: column; align-items: center;
                    justify-content: center; height: 260px; gap: 10px;
                }
                .jt-empty-icon {
                    width: 40px; height: 40px; border-radius: 50%;
                    background: #f3f4f6; display: flex; align-items: center;
                    justify-content: center;
                }
                .jt-empty-icon svg { width: 20px; height: 20px; }
                .jt-empty-title { font-size: 0.875rem; font-weight: 500; color: #374151; }
                .jt-empty-sub { font-size: 0.75rem; color: #9ca3af; text-align: center; }
                .jt-empty-lb {
                    display: flex; flex-direction: column; align-items: center;
                    justify-content: center; padding: 2rem 1rem; gap: 6px; text-align: center;
                }
                .jt-stat-val.empty { color: #d1d5db; }

                @media (max-width: 680px) {
                    .jt-body { grid-template-columns: 1fr; }
                    .jt-toggles { margin-left: 0; }
                    .jt-chart-wrap { height: 220px; }
                    .jt-title { font-size: 1.25rem; }
                }
            </style>

            <div class="jt">
                <div class="jt-head">
                    <div class="jt-title">Job trends</div>
                    <div class="jt-sub">Postings over time — filter by period, type, and chart style</div>
                </div>

                <div class="jt-toolbar">
                    <div class="jt-sel-w">
                        <select class="jt-sel" id="typeFilter">
                            <option value="all">All postings</option>
                            <option value="company">By company</option>
                            <option value="category">By category</option>
                        </select>
                    </div>
                    <div class="jt-toggles">
                        <button class="jt-tog active" data-ct="line">Line</button>
                        <button class="jt-tog" data-ct="bar">Bar</button>
                        <button class="jt-tog" data-ct="area">Area</button>
                    </div>
                </div>

                <div class="jt-presets" id="presets">
                    <button class="jt-preset active" data-p="today">Today</button>
                    <button class="jt-preset" data-p="yesterday">Yesterday</button>
                    <button class="jt-preset " data-p="week">Last week</button>
                    <button class="jt-preset" data-p="month">This month</button>
                    <button class="jt-preset" data-p="quarter">Quarter</button>
                    <button class="jt-preset" data-p="6months">6 months</button>
                    <button class="jt-preset" data-p="year">Year</button>
                    <button class="jt-preset" data-p="custom">Custom</button>
                </div>

                <div class="jt-custom-row hidden" id="customRow">
                    <span class="jt-date-lbl">From</span>
                    <input type="date" class="jt-date-inp" id="dateFrom">
                    <span class="jt-date-lbl">to</span>
                    <input type="date" class="jt-date-inp" id="dateTo">
                    <button class="jt-apply" id="applyBtn">Apply</button>
                </div>

                <div class="jt-range-label" id="rangeLabel"></div>

                <div class="jt-stats">
                    <div class="jt-stat"><div class="jt-stat-lbl">Total postings</div><div class="jt-stat-val" id="statTotal">—</div></div>
                    <div class="jt-stat"><div class="jt-stat-lbl">Peak day</div><div class="jt-stat-val" id="statPeak">—</div></div>
                    <div class="jt-stat"><div class="jt-stat-lbl">Daily avg</div><div class="jt-stat-val" id="statAvg">—</div></div>
                    <div class="jt-stat"><div class="jt-stat-lbl">Segments</div><div class="jt-stat-val" id="statSegs">—</div></div>
                </div>

                <div class="jt-body">
                    <div class="jt-card">
                        <div class="jt-legend" id="jtLegend"></div>
                        <div class="jt-chart-wrap">
                            <canvas id="jobChart"></canvas>
                        </div>
                    </div>
                    <div class="jt-card">
                        <div class="jt-lb-title" id="lbTitle">Top segments</div>
                        <div id="leaderboard"></div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                let chart, currentChartType = 'line', activePreset = 'week';

                const PALETTE = [
                    '#3D7EE8','#E86A3D','#2AAF6F','#9B5EE8',
                    '#E8C23D','#3DC4E8','#E83D7E','#7EE83D',
                    '#E83D3D','#3DE8C4'
                ];

                const fmtISO  = d => d.toISOString().split('T')[0];
                const fmtDisp = d => d.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });

                function getPresetRange(p) {
                    const now = new Date(); now.setHours(0, 0, 0, 0);
                    const to = new Date(now), from = new Date(now);
                    if      (p === 'yesterday') { from.setDate(from.getDate() - 1); to.setDate(to.getDate() - 1); }
                    else if (p === 'week')      { from.setDate(from.getDate() - 6); }
                    else if (p === 'month')     { from.setDate(1); }
                    else if (p === 'quarter')   { from.setMonth(from.getMonth() - 2); from.setDate(1); }
                    else if (p === '6months')   { from.setMonth(from.getMonth() - 5); from.setDate(1); }
                    else if (p === 'year')      { from.setFullYear(from.getFullYear() - 1); from.setDate(from.getDate() + 1); }
                    return { from, to };
                }

                const emptyIcon = `<svg viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h18v4H3z"/><path d="M3 7v14h18V7"/><path d="M9 12h6M9 16h4"/></svg>`;

                function showEmptyState(from, to) {
                    if (chart) { chart.destroy(); chart = null; }

                    document.getElementById('jtLegend').innerHTML = '';
                    document.querySelector('.jt-chart-wrap').innerHTML =
                        `<div class="jt-empty">
                            <div class="jt-empty-icon">${emptyIcon}</div>
                            <div class="jt-empty-title">No postings found</div>
                            <div class="jt-empty-sub">There are no job postings for<br>this period.</div>
                        </div>`;

                    document.getElementById('leaderboard').innerHTML =
                        `<div class="jt-empty-lb">
                            <div style="font-size:0.75rem;color:#9ca3af;">No data for this period</div>
                        </div>`;

                    ['statTotal','statPeak','statAvg','statSegs'].forEach(id => {
                        const el = document.getElementById(id);
                        el.textContent = '—';
                        el.classList.add('empty');
                    });

                    document.getElementById('rangeLabel').innerHTML =
                        `Showing <span>${fmtDisp(from)}</span> — <span>${fmtDisp(to)}</span>`;
                }

                function buildLeaderboard(grouped, type) {
                    const totals = Object.entries(grouped)
                        .map(([k, v]) => ({ key: k, total: Object.values(v).reduce((a, b) => a + b, 0) }))
                        .sort((a, b) => b.total - a.total)
                        .slice(0, 7);
                    const max = totals[0]?.total || 1;
                    const typeLabel = type === 'company' ? 'Top companies'
                                    : type === 'category' ? 'Top categories' : 'All postings';
                    document.getElementById('lbTitle').textContent = typeLabel;
                    document.getElementById('leaderboard').innerHTML = totals.map((item, i) =>
                        `<div class="jt-lb-row">
                            <span class="jt-lb-rank">${i + 1}</span>
                            <span class="jt-lb-label" title="${item.key}">${item.key}</span>
                            <div class="jt-lb-bar-wrap">
                                <div class="jt-lb-bar" style="width:${Math.round(item.total / max * 100)}%;background:${PALETTE[i % PALETTE.length]};"></div>
                            </div>
                            <span class="jt-lb-count">${item.total.toLocaleString()}</span>
                        </div>`
                    ).join('');
                }

                function buildChart(data, type, chartType, from, to) {
                    if (!data || data.length === 0) {
                        showEmptyState(from, to);
                        return;
                    }

                    const labels = [...new Set(data.map(i => i.date))];
                    const grouped = {};
                    data.forEach(item => {
                        let key = 'All postings';
                        if (type === 'company')  key = item.company;
                        if (type === 'category') key = item.category;
                        if (!grouped[key]) grouped[key] = {};
                        grouped[key][item.date] = (grouped[key][item.date] || 0) + item.total;
                    });

                    const keys = Object.keys(grouped);
                    const isArea = chartType === 'area', isBar = chartType === 'bar';

                    const datasets = keys.map((key, i) => ({
                        label: key,
                        data: labels.map(d => grouped[key][d] || 0),
                        borderColor: PALETTE[i % PALETTE.length],
                        backgroundColor: isBar ? PALETTE[i % PALETTE.length] + 'cc' : PALETTE[i % PALETTE.length] + '22',
                        borderWidth: isBar ? 0 : 2,
                        pointRadius: (!isBar && labels.length <= 20) ? 3 : 0,
                        pointHoverRadius: isBar ? 0 : 5,
                        fill: isArea, tension: 0.35
                    }));

                    if (chart) chart.destroy();

                    const canvasWrap = document.querySelector('.jt-chart-wrap');
                    canvasWrap.innerHTML = '<canvas id="jobChart"></canvas>';

                    chart = new Chart(document.getElementById('jobChart'), {
                        type: isBar ? 'bar' : 'line',
                        data: { labels, datasets },
                        options: {
                            responsive: true, maintainAspectRatio: false,
                            interaction: { mode: 'index', intersect: false },
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    backgroundColor: '#fff', borderColor: 'rgba(0,0,0,0.1)',
                                    borderWidth: 1, titleColor: '#111', bodyColor: '#555', padding: 10,
                                    callbacks: { label: ctx => ` ${ctx.dataset.label}: ${ctx.parsed.y}` }
                                }
                            },
                            scales: {
                                x: { grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { color: '#9ca3af', font: { size: 11 }, maxRotation: 45, autoSkip: true, maxTicksLimit: 14 } },
                                y: { grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { color: '#9ca3af', font: { size: 11 } }, beginAtZero: true }
                            }
                        }
                    });

                    document.getElementById('jtLegend').innerHTML = keys.map((k, i) =>
                        `<span class="jt-leg-item"><span class="jt-leg-dot" style="background:${PALETTE[i % PALETTE.length]}"></span>${k}</span>`
                    ).join('');

                    buildLeaderboard(grouped, type);

                    const allTotals = labels.map(d => Object.values(grouped).reduce((s, g) => s + (g[d] || 0), 0));
                    const total = allTotals.reduce((a, b) => a + b, 0);

                    ['statTotal','statPeak','statAvg','statSegs'].forEach(id => document.getElementById(id).classList.remove('empty'));
                    document.getElementById('statTotal').textContent = total.toLocaleString();
                    document.getElementById('statPeak').textContent  = Math.max(...allTotals).toLocaleString();
                    document.getElementById('statAvg').textContent   = Math.round(total / labels.length).toLocaleString();
                    document.getElementById('statSegs').textContent  = keys.length;
                    document.getElementById('rangeLabel').innerHTML  =
                        `Showing <span>${fmtDisp(from)}</span> — <span>${fmtDisp(to)}</span>`;
                }

                function loadWithRange(from, to) {
                    const type = document.getElementById('typeFilter').value;
                    fetch(`/job-trends/data?from=${fmtISO(from)}&to=${fmtISO(to)}`)
                        .then(res => res.json())
                        .then(data => buildChart(data, type, currentChartType, from, to));
                }

                function loadPreset(p) {
                    if (p === 'custom') return;
                    const { from, to } = getPresetRange(p);
                    loadWithRange(from, to);
                }

                function reloadCurrent() {
                    if (activePreset === 'custom') {
                        const from = new Date(document.getElementById('dateFrom').value);
                        const to   = new Date(document.getElementById('dateTo').value);
                        if (!isNaN(from) && !isNaN(to) && from <= to) loadWithRange(from, to);
                    } else {
                        loadPreset(activePreset);
                    }
                }

                document.querySelectorAll('.jt-preset').forEach(btn => {
                    btn.addEventListener('click', () => {
                        document.querySelectorAll('.jt-preset').forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
                        activePreset = btn.dataset.p;
                        const customRow = document.getElementById('customRow');
                        if (activePreset === 'custom') {
                            customRow.classList.remove('hidden');
                            const { from, to } = getPresetRange('week');
                            document.getElementById('dateFrom').value = fmtISO(from);
                            document.getElementById('dateTo').value   = fmtISO(to);
                            document.getElementById('dateTo').max     = fmtISO(new Date());
                        } else {
                            customRow.classList.add('hidden');
                            loadPreset(activePreset);
                        }
                    });
                });

                document.getElementById('applyBtn').addEventListener('click', () => {
                    const from = new Date(document.getElementById('dateFrom').value);
                    const to   = new Date(document.getElementById('dateTo').value);
                    if (!isNaN(from) && !isNaN(to) && from <= to) loadWithRange(from, to);
                });

                document.getElementById('typeFilter').addEventListener('change', reloadCurrent);

                document.querySelectorAll('.jt-tog').forEach(btn => {
                    btn.addEventListener('click', () => {
                        document.querySelectorAll('.jt-tog').forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
                        currentChartType = btn.dataset.ct;
                        reloadCurrent();
                    });
                });

                loadPreset('week');
            </script>

        </div>
    </div>
</div>
        
        @include('auth.footer')
    </div>
    @include('auth.footer-script')
</body>

</html>