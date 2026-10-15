<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KULIKO — Hitung HPP</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <style>
        :root {
            --blue: #1f4fa3;
            --pale: #edf3ff;
            --ink: #172033;
            --muted: #6b7280;
            --line: #e7ebf2;
            --bg: #f4f6fb;
            --purple: #6b4fd1;
            --green: #159766;
            --red: #d9534f
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: var(--bg);
            font-family: Arial, sans-serif;
            color: var(--ink)
        }

        button,
        input,
        select {
            font: inherit
        }

        button {
            cursor: pointer
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 22px 22px 100px
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--blue)
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .notif,
        .store {
            background: white;
            border: 1px solid var(--line);
            padding: 12px 15px;
            border-radius: 13px
        }

        .hero {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px
        }

        .hero h1 {
            margin: 0 0 8px
        }

        .hero p {
            color: var(--muted);
            line-height: 1.5;
            margin: 0
        }

        .btn-primary,
        .btn-secondary {
            border: 0;
            padding: 13px 18px;
            border-radius: 12px;
            font-weight: 700
        }

        .btn-primary {
            background: var(--blue);
            color: white
        }

        .btn-secondary {
            background: var(--pale);
            color: var(--blue)
        }

        .product-select {
            margin-top: 25px
        }

        .product-select label {
            font-weight: 700
        }

        .product-dropdown {
            width: 100%;
            margin-top: 10px;
            padding: 16px 18px;
            border: 1px solid var(--line);
            border-radius: 15px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .product-dropdown select {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            color: var(--ink);
            font-weight: 700;
            font-size: 16px
        }

        .summary-card {
            margin-top: 20px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 20px
        }

        .summary-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px
        }

        .summary-header h3 {
            margin: 0
        }

        .summary-header span {
            font-size: 13px;
            color: var(--muted)
        }

        .summary-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 15px
        }

        .hpp-main {
            background: var(--pale);
            border-radius: 18px;
            padding: 20px
        }

        .hpp-main small,
        .info-box small {
            color: var(--muted)
        }

        .hpp-main h2 {
            color: var(--blue);
            font-size: clamp(25px, 3vw, 40px);
            margin: 12px 0
        }

        .hpp-main .sub {
            font-size: 12px;
            color: var(--muted)
        }

        .info-box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 8px;
            overflow-wrap: anywhere
        }

        .info-box h4 {
            color: var(--purple);
            font-size: 19px;
            margin: 0
        }

        .tabs {
            display: flex;
            gap: 26px;
            margin: 25px 0 18px;
            overflow: auto;
            border-bottom: 1px solid var(--line)
        }

        .tab {
            white-space: nowrap;
            background: none;
            border: 0;
            padding: 10px 2px 13px;
            font-weight: 700;
            color: var(--muted)
        }

        .tab.active {
            color: var(--blue);
            border-bottom: 3px solid var(--blue)
        }

        .table-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 22px;
            overflow: hidden
        }

        .table-top {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px
        }

        .table-top h3 {
            margin: 0 0 7px
        }

        .table-top p {
            margin: 0;
            color: var(--muted);
            font-size: 13px
        }

        .add-btn {
            background: none;
            border: 0;
            color: var(--blue);
            font-weight: 700;
            padding: 10px
        }

        .table-header,
        .ingredient-row {
            display: grid;
            grid-template-columns: 2fr .8fr .8fr 1fr 1fr;
            gap: 12px;
            align-items: center;
            padding: 15px 20px
        }

        .table-header {
            background: #fafbfe;
            font-size: 12px;
            color: var(--muted);
            font-weight: 700
        }

        .ingredient-row {
            border-top: 1px solid var(--line);
            font-size: 14px
        }

        .ingredient-row input,
        .ingredient-row select {
            width: 100%;
            min-width: 0;
            border: 1px solid #dfe4ed;
            border-radius: 9px;
            padding: 9px;
            background: white
        }

        .ingredient-row .total {
            font-weight: 700
        }

        .row-name {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .empty {
            padding: 30px 20px;
            text-align: center;
            color: var(--muted)
        }

        .waste-grid { display:grid; grid-template-columns:1fr 1fr; gap:12px; padding:0 20px 20px; }
        .waste-grid label { display:block; font-size:13px; font-weight:700; margin-bottom:7px; }
        .waste-grid input { width:100%; padding:11px; border:1px solid #dfe4ed; border-radius:10px; }
        .formula-note { margin:0 20px 20px; padding:14px; background:#fff8e8; border-radius:12px; color:#72551b; font-size:13px; line-height:1.5; }
        .section-panel { display: none }

        .section-panel.active {
            display: block
        }

        .cost-list {
            padding: 0 20px 20px
        }

        .cost-entry {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 36px;
            gap: 10px;
            align-items: center;
            margin: 10px 0
        }

        .cost-entry input {
            width: 100%;
            padding: 11px;
            border: 1px solid #dfe4ed;
            border-radius: 10px
        }

        .cost-note {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.5;
            margin: 8px 20px 20px
        }

        .summary-detail {
            padding: 20px;
            display: grid;
            gap: 12px
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            border-bottom: 1px solid var(--line);
            padding-bottom: 12px
        }

        .summary-line.final {
            font-size: 18px;
            font-weight: 800;
            color: var(--blue);
            border: 0
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: #10182880;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 16px;
            z-index: 30
        }

        .modal-backdrop.show {
            display: flex
        }

        .modal {
            width: min(560px, 100%);
            background: white;
            border-radius: 20px;
            overflow: hidden
        }

        .modal-head,
        .modal-foot {
            padding: 17px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border-bottom: 1px solid var(--line)
        }

        .modal-foot {
            border-bottom: 0;
            border-top: 1px solid var(--line);
            justify-content: flex-end
        }

        .modal-head h3 {
            margin: 0
        }

        .modal-body {
            padding: 20px;
            display: grid;
            gap: 14px
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 7px
        }

        .field input {
            width: 100%;
            padding: 12px;
            border: 1px solid #dfe4ed;
            border-radius: 10px
        }

        .close-btn,
        .icon-btn {
            border: 1px solid var(--line);
            background: white;
            border-radius: 9px;
            padding: 8px 11px
        }

        .icon-btn {
            color: var(--red)
        }

        .toast {
            position: fixed;
            z-index: 60;
            bottom: 85px;
            left: 50%;
            transform: translateX(-50%);
            background: #172033;
            color: white;
            padding: 12px 18px;
            border-radius: 10px;
            display: none;
            max-width: 90%;
            text-align: center
        }

        .toast.show {
            display: block
        }

        .bottom-nav {
            position: fixed;
            z-index: 10;
            bottom: 0;
            left: 0;
            width: 100%;
            background: white;
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #ddd;
            padding: 11px 0
        }

        .bottom-nav a {
            text-decoration: none;
            color: #777;
            font-size: 12px;
            align-items: center;
            flex-direction: column;
            display: flex;
            gap: 4px;
            text-align: center
        }

        .bottom-nav .active {
            color: var(--blue);
            font-weight: 700
        }

        @media(max-width:780px) {
            .container {
                padding: 16px 12px 100px
            }

            .hero {
                align-items: flex-start;
                flex-direction: column
            }

            .summary-grid {
                grid-template-columns: 1fr 1fr
            }

            .hpp-main {
                grid-column: 1/-1
            }

            .table-header {
                display: none
            }

            .ingredient-row {
                grid-template-columns: 1fr 1fr;
                padding: 14px;
                gap: 9px
            }

            .ingredient-row .name-cell {
                grid-column: 1/-1
            }

            .ingredient-row .name-cell:before {
                content: "Bahan";
                display: block;
                font-size: 11px;
                color: var(--muted);
                margin-bottom: 4px
            }

            .ingredient-row .qty-cell:before {
                content: "Jumlah";
                display: block;
                font-size: 11px;
                color: var(--muted)
            }

            .ingredient-row .unit-cell:before {
                content: "Satuan";
                display: block;
                font-size: 11px;
                color: var(--muted)
            }

            .ingredient-row .price-cell:before {
                content: "Harga / satuan";
                display: block;
                font-size: 11px;
                color: var(--muted)
            }

            .ingredient-row .total-cell:before {
                content: "Total biaya";
                display: block;
                font-size: 11px;
                color: var(--muted)
            }

            .ingredient-row .action-cell {
                grid-column: 1/-1
            }

            .table-top {
                align-items: flex-start;
                flex-direction: column
            }

            .cost-entry { grid-template-columns: 1fr 1fr }
            .waste-grid { grid-template-columns:1fr; padding:0 14px 16px; }

            .cost-entry .cost-name {
                grid-column: 1/-1
            }

            .header-actions {
                gap: 5px
            }

            .store {
                font-size: 12px;
                padding: 10px
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <img src="img/title.png" alt="KULIKO" style="height: 150px;">
            </div>
            <div class="header-actions"><button class="notif" aria-label="Notifikasi">🔔</button>
                <div class="store">🏪 <?php echo $_SESSION['usaha']; ?></div>
            </div>
        </header>
        <section class="hero">
            <div>
                <h1>Hitung HPP</h1>
                <p>Hitung Harga Pokok Produksi per porsi untuk membantu menentukan harga jual dan mengevaluasi biaya
                    usaha.</p>
            </div><button class="btn-primary" id="newCalcBtn">＋ Hitung Baru</button>
        </section>
        <section class="product-select"><label for="productSelect">Pilih Produk</label>
            <div class="product-dropdown"><select id="productSelect" aria-label="Pilih produk"></select><span>▼</span>
            </div>
            <p id="productHint" style="font-size:12px;color:#6b7280"></p>
        </section>
        <section class="summary-card">
            <div class="summary-header">
                <h3>Ringkasan Hasil Perhitungan</h3><span>Per 1 porsi</span>
            </div>
            <div class="summary-grid">
                <div class="hpp-main"><small>Total HPP per Porsi</small>
                    <h2 id="totalHpp">Rp 0</h2><span class="sub" id="hppNote">Pilih produk untuk melihat
                        perhitungan</span>
                </div>
                <div class="info-box"><small>Total Biaya Bahan</small>
                    <h4 id="materialTotal">Rp 0</h4>
                </div>
                <div class="info-box"><small>Biaya Tenaga Kerja</small>
                    <h4 id="laborTotal">Rp 0</h4>
                </div>
                <div class="info-box"><small>Biaya Overhead</small>
                    <h4 id="overheadTotal">Rp 0</h4>
                </div>
            </div>
        </section>
        <section class="summary-card price-advice-card" aria-labelledby="priceAdviceTitle">
            <div class="summary-header">
                <h3 id="priceAdviceTitle">💡 Saran Harga Jual Terbaik</h3>
                <span>Berdasarkan HPP dan target margin</span>
            </div>
            <div class="waste-grid">
                <div class="field">
                    <label for="targetMargin">Target margin keuntungan (%)</label>
                    <input id="targetMargin" type="number" min="1" max="90" step="1" value="30" style="width:100%;padding:12px;border:1px solid #dfe4ed;border-radius:10px">
                </div>
                <div class="field">
                    <label>Harga jual rekomendasi</label>
                    <h2 id="suggestedPrice" style="color:var(--blue);margin:8px 0">Rp 0</h2>
                    <small style="color:var(--muted)">Dibulatkan ke atas ke Rp 500 terdekat</small>
                </div>
                <div class="field">
                    <label>Estimasi laba per porsi</label>
                    <h3 id="suggestedProfit" style="color:var(--green);margin:8px 0">Rp 0</h3>
                    <small id="suggestedMarginText" style="color:var(--muted)">Target margin 30%</small>
                </div>
                <div class="field" style="display:flex;align-items:end">
                    <button type="button" class="btn-primary" id="applySuggestedPrice" style="width:100%">Gunakan Harga Ini</button>
                </div>
            </div>
            <p class="cost-note" style="margin:12px 0 0">Saran ini merupakan estimasi berdasarkan HPP yang dicatat dan target margin pilihan. Pertimbangkan juga harga pesaing, daya beli pelanggan, serta biaya yang belum dimasukkan.</p>
        </section>

        <section class="tabs" role="tablist"><button class="tab active" data-tab="materials">Bahan Baku</button><button
                class="tab" data-tab="labor">Tenaga Kerja</button><button class="tab" data-tab="overhead">Overhead</button><button class="tab" data-tab="waste">Bahan Terbuang & Produk Gagal</button><button class="tab" data-tab="summary">Ringkasan</button></section>
        <section class="table-card section-panel active" id="panel-materials">
            <div class="table-top">
                <div>
                    <h3>Bahan Baku</h3>
                    <p>Bahan dari resep produk terpilih. Ubah jumlah dan harga untuk simulasi HPP.</p>
                </div><button class="add-btn" id="addMaterialBtn">＋ Tambah Bahan</button>
            </div>
            <div class="table-header"><span>Bahan</span><span>Jumlah</span><span>Satuan</span><span>Harga /
                    satuan</span><span>Total</span></div>
            <div id="materialsList"></div>
            <p class="cost-note">Pastikan satuan jumlah dan harga sesuai, misalnya 100 gram × Rp 80 per gram.</p>
        </section>
        <section class="table-card section-panel" id="panel-labor">
            <div class="table-top">
                <div>
                    <h3>Biaya Tenaga Kerja</h3>
                    <p>Masukkan biaya tenaga kerja yang dialokasikan untuk satu porsi.</p>
                </div><button class="add-btn" id="addLaborBtn">＋ Tambah Biaya</button>
            </div>
            <div class="cost-list" id="laborList"></div>
            <p class="cost-note">Contoh: upah produksi harian dibagi jumlah porsi yang dihasilkan.</p>
        </section>
        <section class="table-card section-panel" id="panel-overhead">
            <div class="table-top">
                <div>
                    <h3>Biaya Overhead</h3>
                    <p>Masukkan biaya pendukung produksi per porsi.</p>
                </div><button class="add-btn" id="addOverheadBtn">＋ Tambah Biaya</button>
            </div>
            <div class="cost-list" id="overheadList"></div>
            <p class="cost-note">Contoh: gas, listrik, air, dan kemasan. Masukkan alokasi biaya per porsi.</p>
        </section>
        <section class="table-card section-panel" id="panel-waste">
            <div class="table-top"><div><h3>Biaya Bahan Terbuang & Produk Gagal</h3><p>Catat bahan yang terbuang dan jumlah produk gagal untuk menghitung biaya kerugian.</p></div></div>
            <div class="waste-grid">
                <div><label for="wasteMass">Massa bahan terbuang (gram)</label><input id="wasteMass" type="number" min="0" step="any" value="0"></div>
                <div><label for="wasteUnitPrice">Harga bahan per gram (Rp)</label><input id="wasteUnitPrice" type="number" min="0" step="any" value="0"></div>
                <div><label for="failedCount">Jumlah produk gagal (porsi)</label><input id="failedCount" type="number" min="0" step="1" value="0"></div>
                <div><label for="failedHpp">HPP per produk (Rp)</label><input id="failedHpp" type="number" min="0" step="any" value="0"></div>
            </div>
            <div class="summary-detail">
                <div class="summary-line"><span>Biaya bahan terbuang (massa × harga satuan)</span><strong id="wasteMaterialCost">Rp 0</strong></div>
                <div class="summary-line"><span>Biaya produk gagal (jumlah × HPP per unit)</span><strong id="failedProductCost">Rp 0</strong></div>
                <div class="summary-line final"><span>Total biaya bahan terbuang & produk gagal</span><span id="wasteTotal">Rp 0</span></div>
            </div>
            <p class="formula-note"><strong>Rumus:</strong> Biaya kerugian = (massa bahan terbuang × harga satuan) + (jumlah produk gagal × HPP per unit). Nilai ini ikut ditambahkan ke total HPP perhitungan.</p>
        </section>
        <section class="table-card section-panel" id="panel-summary">
            <div class="table-top">
                <div>
                    <h3>Rincian Perhitungan</h3>
                    <p>Rangkuman biaya produksi dan estimasi keuntungan.</p>
                </div>
            </div>
            <div class="summary-detail" id="summaryDetail"></div>
        </section>
    </div>
    <nav class="bottom-nav"><a href="dashboard.php">🏠<span>Dashboard</span></a><a
            href="produk.php">📦<span>Produk</span></a><a class="active" href="#">🧮<span>Hitung HPP</span></a><a
            href="analisis.php">📊<span>Analisis</span></a><a href="laporan.php">📄<span>Laporan</span></a></nav>
    <div class="modal-backdrop" id="newModal" role="dialog" aria-modal="true" aria-labelledby="newModalTitle">
        <form class="modal" id="newForm">
            <div class="modal-head">
                <h3 id="newModalTitle">Hitung HPP Baru</h3><button type="button" class="close-btn"
                    id="closeNew">✕</button>
            </div>
            <div class="modal-body">
                <div class="field"><label for="newProductName">Nama produk / simulasi *</label><input
                        id="newProductName" required placeholder="Contoh: Bakso Spesial"></div>
                <div class="field"><label for="newSellPrice">Harga jual per porsi (Rp)</label><input id="newSellPrice"
                        type="number" min="0" step="1" placeholder="15000" value="0"></div>
                <p style="font-size:12px;color:#6b7280;margin:0">Simulasi baru tidak mengubah data produk utama.</p>
            </div>
            <div class="modal-foot"><button type="button" class="btn-secondary" id="cancelNew">Batal</button><button
                    type="submit" class="btn-primary">Buat Perhitungan</button></div>
        </form>
    </div>
    <div class="toast" id="toast" role="status"></div>
    <script>
        (function () {
            'use strict';
            const $ = id => document.getElementById(id), money = n => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(Number(n) || 0), esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
            const PRODUCT_KEY = 'kuliko_produk_resep_v1', HPP_KEY = 'kuliko_hpp_data_v1'; let products = [], activeId = '', calculations = {}, toastTimer;
            function read(key, fallback) { try { return JSON.parse(localStorage.getItem(key)) ?? fallback } catch (e) { return fallback } }
            function save() { try { localStorage.setItem(HPP_KEY, JSON.stringify(calculations)); return true } catch (e) { toast('Data tidak bisa disimpan di browser.'); return false } }
            function toast(msg) { $('toast').textContent = msg; $('toast').classList.add('show'); clearTimeout(toastTimer); toastTimer = setTimeout(() => $('toast').classList.remove('show'), 2600) }
            function uid() { return 'hpp_' + Date.now().toString(36) + '_' + Math.random().toString(36).slice(2, 7) }
            function base(p) { return { id: p.id, name: p.name, category: p.category || 'Lainnya', sellingPrice: Number(p.sellingPrice) || 0, materials: (p.ingredients || []).map(i => ({ id: uid(), name: i.name || '', qty: Number(i.qty) || 0, unit: i.unit || 'gram', price: Number(i.price) || 0 })), labor: [], overhead: [], waste: { mass: 0, unitPrice: 0, failedCount: 0, failedHpp: 0 }, source: 'product' } }
            function init() { products = read(PRODUCT_KEY, []); if (!Array.isArray(products)) products = []; calculations = read(HPP_KEY, {}); if (!calculations || Array.isArray(calculations) || typeof calculations !== 'object') calculations = {}; products.forEach(p => { if (!calculations[p.id]) calculations[p.id] = base(p); else { calculations[p.id].name = p.name; calculations[p.id].category = p.category; calculations[p.id].sellingPrice = Number(p.sellingPrice) || calculations[p.id].sellingPrice || 0 } }); if (!activeId || !calculations[activeId]) activeId = Object.keys(calculations)[0] || ''; save() }
            function ensure() { if (!activeId || !calculations[activeId]) { activeId = uid(); calculations[activeId] = { id: activeId, name: 'Simulasi HPP Baru', category: 'Simulasi', sellingPrice: 0, materials: [], labor: [], overhead: [], waste: { mass: 0, unitPrice: 0, failedCount: 0, failedHpp: 0 }, source: 'simulation' } } }
            function current() { return calculations[activeId] }
            function sums(c) { const w = c.waste || (c.waste = { mass: 0, unitPrice: 0, failedCount: 0, failedHpp: 0 }); const wasteMaterial = Math.max(0, Number(w.mass) || 0) * Math.max(0, Number(w.unitPrice) || 0); const failedProduct = Math.max(0, Number(w.failedCount) || 0) * Math.max(0, Number(w.failedHpp) || 0); return { materials: c.materials.reduce((s, i) => s + (Number(i.qty) || 0) * (Number(i.price) || 0), 0), labor: c.labor.reduce((s, i) => s + (Number(i.cost) || 0), 0), overhead: c.overhead.reduce((s, i) => s + (Number(i.cost) || 0), 0), wasteMaterial, failedProduct, waste: wasteMaterial + failedProduct } }
            function render() { const sel = $('productSelect'); sel.innerHTML = ''; const all = Object.values(calculations); if (!all.length) { sel.innerHTML = '<option value="">Belum ada produk</option>'; activeId = '' } else { all.forEach(c => { const o = document.createElement('option'); o.value = c.id; o.textContent = c.name + (c.source === 'simulation' ? ' · Simulasi' : ''); sel.appendChild(o) }); if (!calculations[activeId]) activeId = all[0].id; sel.value = activeId } const c = current(); $('productHint').textContent = c ? (c.source === 'simulation' ? 'Simulasi mandiri — tidak mengubah data produk utama.' : 'Data resep diambil dari halaman Produk & Resep; perubahan HPP disimpan terpisah.') : 'Tambahkan produk di halaman Produk & Resep atau klik Hitung Baru.'; const s = c ? sums(c) : { materials: 0, labor: 0, overhead: 0, wasteMaterial: 0, failedProduct: 0, waste: 0 }, total = s.materials + s.labor + s.overhead + s.waste; $('totalHpp').textContent = money(total); $('materialTotal').textContent = money(s.materials); $('laborTotal').textContent = money(s.labor); $('overheadTotal').textContent = money(s.overhead); $('hppNote').textContent = c && c.sellingPrice > 0 ? `Harga jual ${money(c.sellingPrice)} · laba kotor ${money(c.sellingPrice - total)}` : 'Belum termasuk biaya yang belum dicatat'; renderMaterials(c); renderCosts('labor', c); renderCosts('overhead', c); renderWaste(c, s); renderSummary(c, s, total) }
            function renderMaterials(c) { const root = $('materialsList'); root.innerHTML = ''; if (!c || !c.materials.length) { root.innerHTML = '<div class="empty">Belum ada bahan. Klik “Tambah Bahan” untuk mulai.</div>'; return } c.materials.forEach(i => { const row = document.createElement('div'); row.className = 'ingredient-row'; row.innerHTML = `<div class="name-cell"><div class="row-name"><input data-field="name" aria-label="Nama bahan" value="${esc(i.name)}" maxlength="100"></div></div><div class="qty-cell"><input data-field="qty" aria-label="Jumlah" type="number" min="0" step="any" value="${esc(i.qty)}"></div><div class="unit-cell"><select data-field="unit" aria-label="Satuan">${['gram', 'kg', 'ml', 'liter', 'buah', 'pcs', 'sendok', 'porsi', 'lainnya'].map(u => `<option ${u === i.unit ? 'selected' : ''}>${u}</option>`).join('')}</select></div><div class="price-cell"><input data-field="price" aria-label="Harga per satuan" type="number" min="0" step="1" value="${esc(i.price)}"></div><div class="total-cell"><span class="total">${money(i.qty * i.price)}</span></div><div class="action-cell"><button class="icon-btn" data-remove="${esc(i.id)}">Hapus</button></div>`; row.querySelectorAll('[data-field]').forEach(el => el.addEventListener('input', () => { const k = el.dataset.field; i[k] = ['name', 'unit'].includes(k) ? el.value : (Number(el.value) || 0); save(); render() })); row.querySelector('[data-remove]').addEventListener('click', () => { if (confirm(`Hapus bahan "${i.name}"?`)) { c.materials = c.materials.filter(x => x.id !== i.id); save(); render() } }); root.appendChild(row) }) }
            function renderCosts(type, c) { const root = $(type === 'labor' ? 'laborList' : 'overheadList'); root.innerHTML = ''; const arr = c ? c[type] : []; if (!arr || !arr.length) { root.innerHTML = '<div class="empty">Belum ada biaya. Tambahkan biaya yang dialokasikan untuk satu porsi.</div>'; return } arr.forEach(item => { const row = document.createElement('div'); row.className = 'cost-entry'; row.innerHTML = `<input class="cost-name" aria-label="Nama biaya" maxlength="100" placeholder="${type === 'labor' ? 'Contoh: Upah memasak' : 'Contoh: Gas dan listrik'}" value="${esc(item.name)}"><input type="number" min="0" step="1" aria-label="Biaya per porsi" value="${esc(item.cost)}"><strong>${money(item.cost)}</strong><button class="icon-btn" aria-label="Hapus biaya">×</button>`; const inputs = row.querySelectorAll('input'); inputs[0].addEventListener('input', () => { item.name = inputs[0].value; save() }); inputs[1].addEventListener('input', () => { item.cost = Number(inputs[1].value) || 0; save(); render() }); row.querySelector('button').addEventListener('click', () => { c[type] = c[type].filter(x => x.id !== item.id); save(); render() }); root.appendChild(row) }) }
            function renderWaste(c, s) { const w = c ? (c.waste || (c.waste = { mass: 0, unitPrice: 0, failedCount: 0, failedHpp: 0 })) : { mass: 0, unitPrice: 0, failedCount: 0, failedHpp: 0 }; ['wasteMass','wasteUnitPrice','failedCount','failedHpp'].forEach((id, idx) => { const keys = ['mass','unitPrice','failedCount','failedHpp']; const el = $(id); el.value = Number(w[keys[idx]]) || 0; el.oninput = () => { w[keys[idx]] = Math.max(0, Number(el.value) || 0); save(); const v = sums(c); $('wasteMaterialCost').textContent = money(v.wasteMaterial); $('failedProductCost').textContent = money(v.failedProduct); $('wasteTotal').textContent = money(v.waste); $('totalHpp').textContent = money(v.materials + v.labor + v.overhead + v.waste); $('materialTotal').textContent = money(v.materials); $('laborTotal').textContent = money(v.labor); $('overheadTotal').textContent = money(v.overhead); renderSummary(c, v, v.materials + v.labor + v.overhead + v.waste); }; }); $('wasteMaterialCost').textContent = money(s.wasteMaterial); $('failedProductCost').textContent = money(s.failedProduct); $('wasteTotal').textContent = money(s.waste); }
            function updatePriceAdvice() {
                const c = current();
                const s = c ? sums(c) : { materials: 0, labor: 0, overhead: 0, waste: 0 };
                const total = s.materials + s.labor + s.overhead + (s.waste || 0);
                let margin = Number($('targetMargin').value);
                if (!Number.isFinite(margin)) margin = 30;
                margin = Math.min(90, Math.max(1, margin));
                const raw = total / (1 - margin / 100);
                const recommended = Math.ceil(raw / 500) * 500;
                const profit = recommended - total;
                const actualMargin = recommended > 0 ? profit / recommended * 100 : 0;
                $('suggestedPrice').textContent = money(recommended);
                $('suggestedProfit').textContent = money(profit);
                $('suggestedMarginText').textContent = 'Margin aktual: ' + actualMargin.toLocaleString('id-ID', { maximumFractionDigits: 1 }) + '%';
                $('applySuggestedPrice').disabled = !c || total <= 0;
                $('applySuggestedPrice').style.opacity = (!c || total <= 0) ? '.55' : '1';
                $('applySuggestedPrice').dataset.price = String(recommended);
            }
            function renderSummary(c, s, total) { const sell = c ? Number(c.sellingPrice) || 0 : 0, profit = sell - total, margin = sell > 0 ? profit / sell * 100 : null; $('summaryDetail').innerHTML = `<div class="summary-line"><span>Biaya bahan baku</span><strong>${money(s.materials)}</strong></div><div class="summary-line"><span>Biaya tenaga kerja</span><strong>${money(s.labor)}</strong></div><div class="summary-line"><span>Biaya overhead</span><strong>${money(s.overhead)}</strong></div><div class="summary-line"><span>Biaya bahan terbuang & produk gagal</span><strong>${money(s.waste || 0)}</strong></div><div class="summary-line final"><span>Total HPP per porsi</span><span>${money(total)}</span></div><div class="summary-line"><span>Harga jual per porsi</span><strong>${money(sell)}</strong></div><div class="summary-line"><span>Estimasi laba kotor per porsi</span><strong style="color:${profit < 0 ? 'var(--red)' : 'var(--green)'}">${money(profit)}</strong></div><div class="summary-line"><span>Margin kotor</span><strong>${margin === null ? 'Masukkan harga jual' : margin.toLocaleString('id-ID', { maximumFractionDigits: 1 }) + '%'}</strong></div><p class="cost-note" style="margin:4px 0">Rumus HPP = bahan + tenaga kerja + overhead + biaya bahan terbuang/produk gagal. Margin = (harga jual − HPP) ÷ harga jual × 100%.</p>`; updatePriceAdvice() }
            $('productSelect').addEventListener('change', e => { activeId = e.target.value; render() });
            $('addMaterialBtn').addEventListener('click', () => { ensure(); current().materials.push({ id: uid(), name: '', qty: 0, unit: 'gram', price: 0 }); save(); render() });
            $('addLaborBtn').addEventListener('click', () => { ensure(); current().labor.push({ id: uid(), name: '', cost: 0 }); save(); render() });
            $('addOverheadBtn').addEventListener('click', () => { ensure(); current().overhead.push({ id: uid(), name: '', cost: 0 }); save(); render() });
            document.querySelectorAll('.tab').forEach(b => b.addEventListener('click', () => { document.querySelectorAll('.tab').forEach(x => x.classList.toggle('active', x === b)); document.querySelectorAll('.section-panel').forEach(p => p.classList.toggle('active', p.id === 'panel-' + b.dataset.tab)) }));
            function closeModal() { $('newModal').classList.remove('show') } $('newCalcBtn').addEventListener('click', () => { $('newForm').reset(); $('newModal').classList.add('show'); $('newProductName').focus() }); $('closeNew').addEventListener('click', closeModal); $('cancelNew').addEventListener('click', closeModal); $('newModal').addEventListener('click', e => { if (e.target === $('newModal')) closeModal() });
            $('newForm').addEventListener('submit', e => { e.preventDefault(); const name = $('newProductName').value.trim(); if (!name) { toast('Nama simulasi wajib diisi.'); return } activeId = uid(); calculations[activeId] = { id: activeId, name, category: 'Simulasi', sellingPrice: Number($('newSellPrice').value) || 0, materials: [], labor: [], overhead: [], waste: { mass: 0, unitPrice: 0, failedCount: 0, failedHpp: 0 }, source: 'simulation' }; save(); closeModal(); render(); toast('Simulasi dibuat. Tambahkan bahan dan biaya untuk menghitung HPP.') });
            $('targetMargin').addEventListener('input', updatePriceAdvice);
            $('applySuggestedPrice').addEventListener('click', () => { const c = current(); if (!c) { toast('Pilih atau buat produk terlebih dahulu.'); return } const price = Number($('applySuggestedPrice').dataset.price) || 0; if (price <= 0) { toast('Isi bahan dan biaya terlebih dahulu agar HPP lebih akurat.'); return } c.sellingPrice = price; save(); render(); toast('Harga jual rekomendasi diterapkan pada perhitungan ini.'); });
            document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal() }); init(); render();
        })();
    </script>
</body>

</html>