<?php
session_start();
$_SESSION['usaha'] = $_SESSION['usaha'] ?? 'Usaha Saya';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - KULIKO</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: #f5f7fb;
            color: #263247;
            font-family: Arial, sans-serif
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px 20px 100px
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #1f4fa3
        }

        .header-actions,
        .hero-actions,
        .chart-header,
        .list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap
        }

        .store {
            background: white;
            border-radius: 12px;
            padding: 12px 15px
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin: 28px 0 18px
        }

        .hero h1 {
            margin-bottom: 8px
        }

        .hero p,
        .muted {
            color: #6d7788
        }

        .btn-primary,
        .btn-outline,
        button,
        select,
        input {
            font: inherit
        }

        .btn-primary,
        .btn-outline {
            border: 0;
            border-radius: 12px;
            padding: 12px 16px;
            cursor: pointer
        }

        .btn-primary {
            background: #1f4fa3;
            color: white
        }

        .btn-outline {
            background: white;
            color: #1f4fa3;
            border: 1px solid #d6dfef
        }

        .filter-grid,
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
            margin: 20px 0
        }

        .filter-box,
        .stat-card,
        .chart-card,
        .report-list {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .045)
        }

        .filter-box small,
        .stat-card small {
            color: #6d7788
        }

        .filter-box h3 {
            margin: 8px 0
        }

        .stats-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr))
        }

        .stat-card h2 {
            font-size: clamp(19px, 2.5vw, 26px);
            margin: 10px 0
        }

        .green {
            color: #15945b;
            font-size: 13px
        }

        .chart-card,
        .report-list {
            margin: 20px 0
        }

        .chart-header {
            margin-bottom: 14px
        }

        canvas {
            width: 100%;
            height: 280px;
            display: block
        }

        .report-item {
            padding: 16px 4px;
            border-bottom: 1px solid #edf0f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px
        }

        .report-item:last-child {
            border-bottom: 0
        }

        .report-item button {
            padding: 8px 12px;
            border: 1px solid #d6dfef;
            background: white;
            border-radius: 9px;
            color: #1f4fa3;
            cursor: pointer
        }

        .entry-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 15px
        }

        .field label {
            display: block;
            font-size: 13px;
            color: #596579;
            margin-bottom: 6px
        }

        .field input,
        .field select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d6dfef;
            border-radius: 10px;
            background: white
        }

        .entry-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 15px
        }

        .notice {
            font-size: 13px;
            color: #697586;
            margin-top: 12px
        }

        .bottom-nav {
            position: fixed;
            z-index: 5;
            bottom: 0;
            left: 0;
            width: 100%;
            background: white;
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #ddd;
            padding: 10px 4px
        }

        .bottom-nav a {
            text-decoration: none;
            color: #777;
            font-size: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px
        }

        .bottom-nav .active {
            color: #1f4fa3
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: #0007;
            z-index: 10;
            align-items: center;
            justify-content: center;
            padding: 16px
        }

        .modal.open {
            display: flex
        }

        .modal-content {
            background: white;
            padding: 22px;
            border-radius: 18px;
            width: min(420px, 100%)
        }

        .modal-content h2 {
            margin-top: 0
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 16px
        }

        .empty {
            color: #7a8494;
            font-size: 14px
        }

        @media(max-width:800px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }

            .hero {
                align-items: flex-start;
                flex-direction: column
            }

            .hero-actions {
                width: 100%
            }
        }

        @media(max-width:480px) {
            .container {
                padding: 15px 12px 95px
            }

            .stats-grid,
            .filter-grid,
            .entry-grid {
                grid-template-columns: 1fr
            }

            .logo {
                font-size: 23px
            }

            .bottom-nav a {
                font-size: 10px
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logo"><img src="img/title.png" alt="KULIKO" style="height: 150px;"></div>
            <div class="header-actions"><button class="btn-outline" id="notifyBtn" type="button"
                    title="Info laporan">🔔</button>
                <div class="store">🏪 <span id="storeName"><?php echo htmlspecialchars((string)($_SESSION['usaha'] ?? 'Usaha Saya'), ENT_QUOTES, 'UTF-8'); ?></span></div>
            </div>
        </header>
        <section class="hero">
            <div>
                <h1>Laporan</h1>
                <p class="muted">Pantau kinerja dan keuangan usaha Anda dalam periode tertentu.</p>
            </div>
            <div class="hero-actions"><button class="btn-outline" id="exportBtn" type="button">⬇ Export
                    Laporan</button><button class="btn-primary" id="periodBtn" type="button">📅 Pilih Periode</button>
            </div>
        </section>
        <section class="filter-grid">
            <div class="filter-box"><small>Periode Laporan</small>
                <h3 id="periodLabel">—</h3>
                <div class="muted" id="periodHint">Pilih periode untuk melihat ringkasan.</div>
            </div>
            <div class="filter-box"><small>Bandingkan Dengan</small>
                <h3 id="compareLabel">—</h3>
                <div class="muted" id="compareHint">Perbandingan memakai data yang tersimpan.</div>
            </div>
        </section>
        <section class="stats-grid">
            <div class="stat-card">
                <div>💵</div><small>Total Pendapatan</small>
                <h2 id="revenueValue">Rp 0</h2><span id="revenueChange" class="green">Belum ada pembanding</span>
            </div>
            <div class="stat-card">
                <div>🏷️</div><small>Total Laba Bersih*</small>
                <h2 id="profitValue">Rp 0</h2><span id="profitChange" class="green">—</span>
            </div>
            <div class="stat-card">
                <div>🎯</div><small>Margin Keuntungan</small>
                <h2 id="marginValue">0%</h2><span id="marginChange" class="green">—</span>
            </div>
            <div class="stat-card">
                <div>📦</div><small>Total HPP</small>
                <h2 id="hppValue">Rp 0</h2><span id="hppChange" class="green">—</span>
            </div>
        </section>
        <section class="chart-card">
            <div class="chart-header">
                <h2>Ringkasan Kinerja</h2><select id="chartMode" aria-label="Rentang grafik">
                    <option value="monthly">Bulanan</option>
                    <option value="weekly">Enam bulan terakhir</option>
                    <option value="yearly">Tahunan</option>
                </select>
            </div><canvas id="reportChart" aria-label="Grafik pendapatan dan laba"></canvas>
            <p class="notice">Grafik menggunakan data laporan bulanan yang kamu masukkan di bawah.</p>
        </section>
        <section class="chart-card">
            <h2>Data Laporan</h2>
            <p class="muted">Masukkan pendapatan dan total HPP untuk periode terpilih. Data disimpan di browser
                perangkat ini.</p>
            <div class="entry-grid">
                <div class="field"><label for="revenueInput">Total pendapatan (Rp)</label><input id="revenueInput"
                        type="number" min="0" step="1000" placeholder="Contoh: 12560000"></div>
                <div class="field"><label for="hppInput">Total HPP (Rp)</label><input id="hppInput" type="number"
                        min="0" step="1000" placeholder="Contoh: 8204000"></div>
            </div>
            <div class="entry-actions"><button class="btn-primary" id="saveBtn" type="button">Simpan Data
                    Periode</button><button class="btn-outline" id="clearBtn" type="button">Kosongkan Form</button>
            </div>
            <p class="notice">*Laba bersih di halaman ini dihitung sederhana sebagai pendapatan dikurangi HPP. Biaya
                operasional, pajak, dan transaksi detail belum dihitung otomatis.</p>
        </section>
        <section class="report-list">
            <div class="list-header">
                <h2>Laporan Tersedia</h2><span class="muted">Unduh sesuai kebutuhan</span>
            </div>
            <div class="report-item"><span>📄 Laporan Laba Rugi</span><button data-report="profit">Export CSV</button>
            </div>
            <div class="report-item"><span>📊 Laporan Penjualan</span><button data-report="sales">Export CSV</button>
            </div>
            <div class="report-item"><span>📦 Laporan HPP</span><button data-report="hpp">Export CSV</button></div>
            <div class="report-item"><span>💰 Ringkasan Keuangan</span><button data-report="cash">Export CSV</button>
            </div>
        </section>
    </div>
    <nav class="bottom-nav"><a href="dashboard.php">🏠<span>Dashboard</span></a><a
            href="produk.php">📦<span>Produk</span></a><a href="hpp.php">🧮<span>Hitung HPP</span></a><a
            href="analisis.php">📊<span>Analisis</span></a><a href="#" class="active">📄<span>Laporan</span></a></nav>
    <div class="modal" id="periodModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal-content">
            <h2 id="modalTitle">Pilih Periode</h2>
            <div class="field"><label for="monthInput">Bulan laporan</label><input type="month" id="monthInput"></div>
            <div class="modal-actions"><button class="btn-outline" id="cancelPeriod" type="button">Batal</button><button
                    class="btn-primary" id="applyPeriod" type="button">Terapkan</button></div>
        </div>
    </div>
    <script>
        (function () {
            const $ = id => document.getElementById(id);
            const STORE_KEY = 'kuliko_laporan_bulanan_v1';
            const fmt = n => 'Rp ' + Math.round(Number(n) || 0).toLocaleString('id-ID');
            const monthNow = () => { const d = new Date(); return d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') };
            const monthLabel = key => { if (!key) return '—'; const [y, m] = key.split('-').map(Number); return new Date(y, m - 1, 1).toLocaleDateString('id-ID', { month: 'long', year: 'numeric' }) };
            let selected = monthNow(), records = load();
            function load() { try { const x = JSON.parse(localStorage.getItem(STORE_KEY) || '{}'); return x && typeof x === 'object' ? x : {} } catch (e) { return {} } }
            function saveStore() { localStorage.setItem(STORE_KEY, JSON.stringify(records)) }
            function prevMonth(key) { const [y, m] = key.split('-').map(Number); const d = new Date(y, m - 2, 1); return d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') }
            function data(key) { const x = records[key] || {}; const revenue = Math.max(0, Number(x.revenue) || 0), hpp = Math.max(0, Number(x.hpp) || 0); return { revenue, hpp, profit: revenue - hpp, margin: revenue ? ((revenue - hpp) / revenue * 100) : 0 } }
            function pctChange(cur, prev) { if (!prev) return null; if (prev === 0) return cur === 0 ? 0 : null; return (cur - prev) / Math.abs(prev) * 100 }
            function changeText(cur, prev) { const p = pctChange(cur, prev); if (p === null) return 'Belum ada data pembanding'; return (p >= 0 ? '▲ ' : '▼ ') + Math.abs(p).toLocaleString('id-ID', { maximumFractionDigits: 1 }) + '% dari periode sebelumnya' }
            function setChange(id, cur, prev) { $(id).textContent = changeText(cur, prev); $(id).style.color = prev === 0 || pctChange(cur, prev) === null ? '#7a8494' : cur >= prev ? '#15945b' : '#d44' }
            function render() {
                const d = data(selected), p = data(prevMonth(selected));
                $('periodLabel').textContent = monthLabel(selected); $('compareLabel').textContent = monthLabel(prevMonth(selected));
                $('periodHint').textContent = records[selected] ? 'Data periode tersimpan' : 'Belum ada data untuk periode ini.';
                $('compareHint').textContent = records[prevMonth(selected)] ? 'Data periode sebelumnya tersedia' : 'Belum ada data periode sebelumnya.';
                $('revenueValue').textContent = fmt(d.revenue); $('profitValue').textContent = fmt(d.profit); $('marginValue').textContent = d.margin.toLocaleString('id-ID', { maximumFractionDigits: 1 }) + '%'; $('hppValue').textContent = fmt(d.hpp);
                setChange('revenueChange', d.revenue, p.revenue); setChange('profitChange', d.profit, p.profit); setChange('marginChange', d.margin, p.margin); setChange('hppChange', d.hpp, p.hpp);
                $('revenueInput').value = records[selected]?.revenue ?? ''; $('hppInput').value = records[selected]?.hpp ?? '';
                drawChart();
            }
            function drawChart() {
                const canvas = $('reportChart'), rect = canvas.getBoundingClientRect(), ratio = window.devicePixelRatio || 1;
                canvas.width = Math.max(300, rect.width) * ratio; canvas.height = 280 * ratio;
                const ctx = canvas.getContext('2d'); ctx.scale(ratio, ratio); const w = canvas.width / ratio, h = 280;
                ctx.clearRect(0, 0, w, h);
                let keys = [];
                if ($('chartMode').value === 'yearly') { for (let m = 1; m <= 12; m++)keys.push(selected.slice(0, 4) + '-' + String(m).padStart(2, '0')) }
                else { for (let i = 5; i >= 0; i--) { const [y, m] = selected.split('-').map(Number); const d = new Date(y, m - 1 - i, 1); keys.push(d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0')) } }
                const vals = keys.map(k => data(k)); const max = Math.max(1, ...vals.map(v => Math.max(v.revenue, v.profit, 0)));
                const left = 42, right = 12, top = 20, bottom = 42, plotW = w - left - right, plotH = h - top - bottom;
                ctx.font = '11px Arial'; ctx.strokeStyle = '#e9edf4'; ctx.fillStyle = '#778196'; ctx.lineWidth = 1;
                for (let i = 0; i <= 4; i++) { const y = top + plotH * i / 4; ctx.beginPath(); ctx.moveTo(left, y); ctx.lineTo(w - right, y); ctx.stroke(); ctx.fillText((max * (1 - i / 4) / 1000000).toLocaleString('id-ID', { maximumFractionDigits: 1 }) + ' jt', 2, y + 4) }
                const groupW = plotW / keys.length, bw = Math.max(3, Math.min(18, groupW * .28));
                keys.forEach((k, i) => { const x = left + i * groupW + groupW / 2; const v = vals[i]; const rh = v.revenue / max * plotH, ph = Math.max(0, v.profit) / max * plotH; ctx.fillStyle = '#4d7bd6'; ctx.fillRect(x - bw - 2, top + plotH - rh, bw, rh); ctx.fillStyle = '#28ae7b'; ctx.fillRect(x + 2, top + plotH - ph, bw, ph); ctx.fillStyle = '#667085'; ctx.textAlign = 'center'; const label = $('chartMode').value === 'yearly' ? k.slice(5) : k.slice(5); ctx.fillText(label, x, h - 20) });
                ctx.textAlign = 'left'; ctx.fillStyle = '#4d7bd6'; ctx.fillRect(left, h - 10, 9, 9); ctx.fillStyle = '#667085'; ctx.fillText('Pendapatan', left + 13, h - 2); ctx.fillStyle = '#28ae7b'; ctx.fillRect(left + 100, h - 10, 9, 9); ctx.fillStyle = '#667085'; ctx.fillText('Laba (pendapatan − HPP)', left + 113, h - 2);
            }
            function csvEscape(v) { return '"' + String(v ?? '').replace(/"/g, '""') + '"' }
            function downloadCSV(filename, rows) { const content = '\ufeff' + rows.map(r => r.map(csvEscape).join(';')).join('\r\n'); const blob = new Blob([content], { type: 'text/csv;charset=utf-8;' }); const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href = url; a.download = filename; a.click(); URL.revokeObjectURL(url) }
            function exportAll() { const keys = Object.keys(records).sort(); const rows = [['Periode', 'Pendapatan (Rp)', 'HPP (Rp)', 'Laba sederhana (Rp)', 'Margin (%)']]; keys.forEach(k => { const d = data(k); rows.push([monthLabel(k), d.revenue, d.hpp, d.profit, d.margin.toFixed(2)]) }); if (!keys.length) rows.push([monthLabel(selected), 0, 0, 0, '0.00']); downloadCSV('laporan-kuliko.csv', rows) }
            function exportReport(type) { const keys = Object.keys(records).sort(); let headers, rows = []; if (type === 'profit') { headers = ['Periode', 'Pendapatan (Rp)', 'HPP (Rp)', 'Laba sederhana (Rp)', 'Margin (%)']; keys.forEach(k => { const d = data(k); rows.push([monthLabel(k), d.revenue, d.hpp, d.profit, d.margin.toFixed(2)]) }) } else if (type === 'sales') { headers = ['Periode', 'Total pendapatan (Rp)']; keys.forEach(k => rows.push([monthLabel(k), data(k).revenue])) } else if (type === 'hpp') { headers = ['Periode', 'Total HPP (Rp)']; keys.forEach(k => rows.push([monthLabel(k), data(k).hpp])) } else { headers = ['Periode', 'Pendapatan (Rp)', 'HPP (Rp)', 'Selisih pendapatan-HPP (Rp)']; keys.forEach(k => { const d = data(k); rows.push([monthLabel(k), d.revenue, d.hpp, d.profit]) }) } if (!rows.length) { const d = data(selected); rows.push([monthLabel(selected), d.revenue, d.hpp, d.profit, d.margin.toFixed(2)].slice(0, headers.length)) } downloadCSV('laporan-' + type + '-kuliko.csv', [headers, ...rows]) }
            $('saveBtn').addEventListener('click', () => { const revenue = Number($('revenueInput').value), hpp = Number($('hppInput').value); if ($('revenueInput').value === '' || $('hppInput').value === '' || !Number.isFinite(revenue) || !Number.isFinite(hpp) || revenue < 0 || hpp < 0) { alert('Isi pendapatan dan HPP dengan angka 0 atau lebih.'); return } records[selected] = { revenue, hpp, updatedAt: new Date().toISOString() }; try { saveStore(); render(); alert('Data laporan berhasil disimpan di browser ini.') } catch (e) { alert('Data tidak bisa disimpan. Periksa pengaturan penyimpanan browser.') } });
            $('clearBtn').addEventListener('click', () => { $('revenueInput').value = ''; $('hppInput').value = '' });
            $('periodBtn').addEventListener('click', () => { $('monthInput').value = selected; $('periodModal').classList.add('open') });
            $('cancelPeriod').addEventListener('click', () => $('periodModal').classList.remove('open'));
            $('applyPeriod').addEventListener('click', () => { if (!$('monthInput').value) { alert('Pilih bulan terlebih dahulu.'); return } selected = $('monthInput').value; $('periodModal').classList.remove('open'); render() });
            $('periodModal').addEventListener('click', e => { if (e.target === $('periodModal')) $('periodModal').classList.remove('open') });
            $('exportBtn').addEventListener('click', exportAll);
            document.querySelectorAll('[data-report]').forEach(b => b.addEventListener('click', () => exportReport(b.dataset.report)));
            $('chartMode').addEventListener('change', drawChart); window.addEventListener('resize', drawChart);
            $('notifyBtn').addEventListener('click', () => alert('Laporan siap. Simpan data pendapatan dan HPP untuk mulai membangun riwayat laporan.'));
            try { const prod = JSON.parse(localStorage.getItem('kuliko_produk_resep_v1') || '[]'); if (Array.isArray(prod) && prod.length) { $('storeName').textContent = 'Usaha Kuliner · ' + prod.length + ' produk' } } catch (e) { }
            render();
        })();
    </script>
</body>

</html>