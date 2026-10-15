<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>KULIKO - Produk & Resep</title>
    <style>
        :root {
            --blue: #1e4fa8;
            --blue2: #edf3ff;
            --ink: #172033;
            --muted: #687386;
            --line: #e7ebf2;
            --bg: #f4f6fb;
            --green: #159766;
            --red: #c43c4b
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
            gap: 16px
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            color: var(--blue);
            letter-spacing: .5px
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .store,
        .notif {
            background: white;
            border: 1px solid var(--line);
            padding: 12px 15px;
            border-radius: 12px
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin: 28px 0
        }

        .hero h1 {
            margin: 0 0 8px;
            font-size: 28px
        }

        .hero p {
            color: var(--muted);
            margin: 0;
            line-height: 1.5
        }

        .btn-primary,
        .btn-secondary,
        .btn-danger {
            border: 0;
            border-radius: 11px;
            padding: 12px 16px;
            font-weight: 700
        }

        .btn-primary {
            background: var(--blue);
            color: white
        }

        .btn-secondary {
            background: var(--blue2);
            color: var(--blue)
        }

        .btn-danger {
            background: #fff0f1;
            color: var(--red)
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px
        }

        .card-stat {
            background: white;
            padding: 20px;
            border-radius: 18px;
            border: 1px solid var(--line)
        }

        .stat-icon {
            font-size: 22px
        }

        .card-stat small {
            display: block;
            color: var(--muted);
            margin-top: 10px
        }

        .card-stat h2 {
            font-size: 27px;
            margin: 8px 0 4px
        }

        .card-stat p {
            font-size: 13px;
            color: var(--muted);
            margin: 0
        }

        .filter-area {
            display: grid;
            grid-template-columns: minmax(180px, 2fr) 1fr;
            gap: 10px;
            margin: 22px 0
        }

        .filter-area input,
        .filter-area select,
        .field input,
        .field select {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #dfe4ed;
            border-radius: 11px;
            background: white;
            outline: none
        }

        .filter-area input:focus,
        .field input:focus,
        .field select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px #1e4fa81a
        }

        .table-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden
        }

        .table-header,
        .product-row {
            display: grid;
            grid-template-columns: minmax(210px, 2fr) 1fr 1fr .8fr 1fr;
            gap: 12px;
            align-items: center;
            padding: 16px 18px
        }

        .table-header {
            background: #fafbfe;
            font-size: 12px;
            color: var(--muted);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .35px
        }

        .product-row {
            border-top: 1px solid var(--line);
            font-size: 14px
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0
        }

        .food-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            border-radius: 13px;
            background: #f1f4fa;
            display: grid;
            place-items: center;
            font-size: 22px
        }

        .product-info h4 {
            margin: 0 0 5px;
            font-size: 14px
        }

        .product-info small {
            color: var(--muted)
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: var(--blue2);
            color: var(--blue)
        }

        .green {
            color: var(--green);
            font-weight: 700
        }

        .status {
            color: var(--green);
            font-weight: 700
        }

        .row-actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap
        }

        .tiny-btn {
            border: 1px solid var(--line);
            background: white;
            border-radius: 8px;
            padding: 7px 9px;
            font-size: 12px;
            color: #344054
        }

        .empty {
            padding: 36px 20px;
            text-align: center;
            color: var(--muted)
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

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 20;
            background: #10182880;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 16px
        }

        .modal-backdrop.show {
            display: flex
        }

        .modal {
            background: white;
            width: min(760px, 100%);
            max-height: 92vh;
            overflow: auto;
            border-radius: 20px;
            box-shadow: 0 20px 60px #10182840
        }

        .modal-head {
            padding: 20px 24px;
            border-bottom: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px
        }

        .modal-head h2 {
            font-size: 21px;
            margin: 0
        }

        .close-btn {
            border: 0;
            background: #f2f4f7;
            border-radius: 10px;
            padding: 8px 11px;
            font-size: 18px
        }

        .modal-body {
            padding: 22px 24px
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 7px
        }

        .field.full {
            grid-column: 1/-1
        }

        .hint {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.5;
            margin-top: 6px
        }

        .ingredients-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin: 24px 0 12px
        }

        .ingredients-title h3 {
            font-size: 16px;
            margin: 0
        }

        .ingredient-head,
        .ingredient-row {
            display: grid;
            grid-template-columns: minmax(120px, 1.5fr) .7fr .8fr 1fr 34px;
            gap: 8px;
            align-items: center
        }

        .ingredient-head {
            font-size: 11px;
            color: var(--muted);
            font-weight: 700;
            padding: 0 2px 7px
        }

        .ingredient-row {
            margin-bottom: 9px
        }

        .ingredient-row input,
        .ingredient-row select {
            width: 100%;
            min-width: 0;
            padding: 10px 8px;
            border: 1px solid #dfe4ed;
            border-radius: 9px;
            background: white
        }

        .remove-ingredient {
            border: 0;
            border-radius: 8px;
            background: #fff0f1;
            color: var(--red);
            height: 35px;
            font-size: 18px
        }

        .cost-preview {
            background: #f5f8ff;
            border: 1px solid #e0e9ff;
            border-radius: 13px;
            padding: 14px 16px;
            margin-top: 18px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: center
        }

        .cost-preview small {
            display: block;
            color: var(--muted);
            margin-bottom: 4px
        }

        .cost-preview strong {
            font-size: 18px;
            color: var(--blue)
        }

        .modal-foot {
            padding: 16px 24px;
            border-top: 1px solid var(--line);
            display: flex;
            justify-content: flex-end;
            gap: 10px
        }

        .toast {
            position: fixed;
            z-index: 50;
            bottom: 88px;
            left: 50%;
            transform: translateX(-50%);
            background: #172033;
            color: white;
            padding: 12px 18px;
            border-radius: 10px;
            display: none;
            box-shadow: 0 6px 24px #10182833
        }

        .toast.show {
            display: block
        }

        .detail-list {
            display: grid;
            gap: 9px
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid var(--line);
            font-size: 14px
        }

        .detail-item:last-child {
            border-bottom: 0
        }

        @media(max-width:760px) {
            .container {
                padding: 16px 13px 100px
            }

            .header {
                align-items: flex-start
            }

            .store {
                font-size: 12px;
                padding: 10px
            }

            .notif {
                padding: 10px
            }

            .hero {
                align-items: flex-start;
                flex-direction: column
            }

            .hero h1 {
                font-size: 24px
            }

            .stats {
                grid-template-columns: 1fr
            }

            .card-stat {
                padding: 15px
            }

            .filter-area {
                grid-template-columns: 1fr
            }

            .table-header {
                display: none
            }

            .product-row {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
                padding: 16px
            }

            .product-info {
                grid-column: 1/-1
            }

            .product-row>div:nth-child(2)::before {
                content: "Kategori: ";
                color: var(--muted);
                font-size: 12px
            }

            .product-row>div:nth-child(3)::before {
                content: "HPP: ";
                color: var(--muted);
                font-size: 12px
            }

            .product-row>div:nth-child(4)::before {
                content: "Margin: ";
                color: var(--muted);
                font-size: 12px
            }

            .product-row>div:nth-child(5) {
                grid-column: 1/-1
            }

            .row-actions {
                margin-top: 4px
            }

            .form-grid {
                grid-template-columns: 1fr
            }

            .field.full {
                grid-column: auto
            }

            .modal-head,
            .modal-body,
            .modal-foot {
                padding-left: 16px;
                padding-right: 16px
            }

            .ingredient-head {
                display: none
            }

            .ingredient-row {
                grid-template-columns: 1fr 1fr 1fr 34px;
                background: #f8f9fc;
                padding: 10px;
                border-radius: 10px
            }

            .ingredient-row .ing-name {
                grid-column: 1/4
            }

            .ingredient-row .ing-price {
                grid-column: 1/3
            }

            .ingredient-row .ing-total {
                grid-column: 3/4;
                align-self: center;
                font-size: 12px
            }

            .remove-ingredient {
                grid-column: 4;
                grid-row: 1
            }

            .bottom-nav {
                gap: 0;
                justify-content: space-around
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
            <div class="logo">
                <img src="img/title.png" alt="KULIKO" style="height: 150px;">
            </div>
            <div class="header-right"><button class="notif" aria-label="Notifikasi">🔔</button>
                <div class="store">🏪 <?php echo $_SESSION['usaha']; ?></div>
            </div>
        </header>
        <section class="hero">
            <div>
                <h1>Produk & Resep</h1>
                <p>Kelola produk/menu, komposisi resep, dan biaya bahan untuk menghitung HPP.</p>
            </div><button class="btn-primary" id="addProductBtn">＋ Tambah Produk</button>
        </section>
        <section class="stats">
            <div class="card-stat">
                <div class="stat-icon">🛒</div><small>Total Produk</small>
                <h2 id="totalProducts">0</h2>
                <p>produk tersimpan</p>
            </div>
            <div class="card-stat">
                <div class="stat-icon">🍲</div><small>Total Resep</small>
                <h2 id="totalRecipes">0</h2>
                <p>produk dengan resep</p>
            </div>
            <div class="card-stat">
                <div class="stat-icon">🥕</div><small>Total Bahan Unik</small>
                <h2 id="totalIngredients">0</h2>
                <p>jenis bahan tersimpan</p>
            </div>
        </section>
        <section class="filter-area"><input id="searchInput" type="search"
                placeholder="Cari produk atau menu..."><select id="categoryFilter">
                <option value="">Semua Kategori</option>
                <option>Makanan</option>
                <option>Minuman</option>
                <option>Camilan</option>
                <option>Lainnya</option>
            </select></section>
        <section class="table-card">
            <div class="table-header">
                <div>Produk/Menu</div>
                <div>Kategori</div>
                <div>HPP / porsi</div>
                <div>Margin</div>
                <div>Aksi</div>
            </div>
            <div id="productList"></div>
        </section>
    </div>
    <nav class="bottom-nav">
        <a href="dashboard.php">🏠<span>Dashboard</span></a>
        <a href="#" class="active">📦<span>Produk</span></a>
        <a href="hpp.php">🧮<span>Hitung HPP</span></a>
        <a href="analisis.php">📊<span>Analisis</span></a>
        <a href="laporan.php">📄<span>Laporan</span></a>
    </nav>

    <div class="modal-backdrop" id="productModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal">
            <div class="modal-head">
                <h2 id="modalTitle">Tambah Produk</h2><button type="button" class="close-btn" id="closeModal"
                    aria-label="Tutup">✕</button>
            </div>
            <form id="productForm">
                <div class="modal-body">
                    <div class="form-grid">
                        <div class="field"><label for="productName">Nama produk *</label><input id="productName"
                                required maxlength="100" placeholder="Contoh: Bakso Spesial"></div>
                        <div class="field"><label for="productCategory">Kategori *</label><select id="productCategory"
                                required>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Camilan">Camilan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select></div>
                        <div class="field"><label for="sellingPrice">Harga jual per porsi (Rp) *</label><input
                                id="sellingPrice" type="number" min="0" step="1" required placeholder="15000"></div>
                        <div class="field"><label for="productNote">Catatan (opsional)</label><input id="productNote"
                                maxlength="200" placeholder="Ukuran porsi, catatan resep..."></div>
                    </div>
                    <div class="ingredients-title">
                        <h3>Komposisi bahan</h3><button type="button" class="btn-secondary" id="addIngredientBtn">＋
                            Tambah Bahan</button>
                    </div>
                    <p class="hint">Masukkan jumlah yang dipakai untuk satu porsi, satuan, dan harga beli bahan per
                        satuan. Total biaya bahan dihitung otomatis: jumlah × harga satuan.</p>
                    <div class="ingredient-head"><span>Nama bahan *</span><span>Jumlah
                            *</span><span>Satuan</span><span>Harga / satuan (Rp) *</span><span></span></div>
                    <div id="ingredientRows"></div>
                    <div class="cost-preview">
                        <div><small>Total HPP bahan / porsi</small><strong id="hppPreview">Rp 0</strong></div>
                        <div style="text-align:right"><small>Estimasi margin kotor</small><strong
                                id="marginPreview">—</strong></div>
                    </div>
                    <div class="hint">HPP di halaman ini adalah total biaya bahan berdasarkan jumlah yang digunakan.
                        Biaya kemasan, tenaga kerja, gas/listrik, dan biaya operasional lain belum termasuk kecuali
                        ditambahkan sebagai bahan.</div>
                </div>
                <div class="modal-foot"><button type="button" class="btn-secondary"
                        id="cancelModal">Batal</button><button type="submit" class="btn-primary">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-backdrop" id="detailModal" role="dialog" aria-modal="true" aria-labelledby="detailTitle">
        <div class="modal">
            <div class="modal-head">
                <h2 id="detailTitle">Detail Produk</h2><button class="close-btn" id="closeDetail">✕</button>
            </div>
            <div class="modal-body" id="detailBody"></div>
            <div class="modal-foot"><button class="btn-primary" id="closeDetailBottom">Tutup</button></div>
        </div>
    </div>
    <div class="toast" id="toast" role="status"></div>
    <script>

        (function () {
            'use strict';
            const STORAGE_KEY = 'kuliko_produk_resep_v1';
            const $ = id => document.getElementById(id);
            const money = value => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(Number(value) || 0);
            const safe = value => String(value ?? '').replace(/[&<>"']/g, ch => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[ch]));
            let products = loadProducts(), editingId = null, toastTimer;
            function loadProducts() { try { const data = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]'); return Array.isArray(data) ? data : [] } catch (e) { return [] } }
            function persist() { try { localStorage.setItem(STORAGE_KEY, JSON.stringify(products)); return true } catch (e) { notify('Penyimpanan browser penuh atau tidak tersedia.'); return false } }
            function notify(message) { const el = $('toast'); el.textContent = message; el.classList.add('show'); clearTimeout(toastTimer); toastTimer = setTimeout(() => el.classList.remove('show'), 2600) }
            function hpp(product) { return (product.ingredients || []).reduce((sum, item) => sum + (Number(item.qty) || 0) * (Number(item.price) || 0), 0) }
            function margin(product) { const sell = Number(product.sellingPrice) || 0; return sell > 0 ? ((sell - hpp(product)) / sell * 100) : null }
            function ingredientRow(item = { name: '', qty: '', unit: 'gram', price: '' }) { const row = document.createElement('div'); row.className = 'ingredient-row'; row.innerHTML = `<input class="ing-name" aria-label="Nama bahan" placeholder="Contoh: Daging sapi" maxlength="100" required value="${safe(item.name)}"><input class="ing-qty" aria-label="Jumlah bahan" type="number" min="0.0001" step="any" placeholder="100" required value="${safe(item.qty)}"><select class="ing-unit" aria-label="Satuan"><option ${item.unit === 'gram' ? 'selected' : ''}>gram</option><option ${item.unit === 'kg' ? 'selected' : ''}>kg</option><option ${item.unit === 'ml' ? 'selected' : ''}>ml</option><option ${item.unit === 'liter' ? 'selected' : ''}>liter</option><option ${item.unit === 'buah' ? 'selected' : ''}>buah</option><option ${item.unit === 'pcs' ? 'selected' : ''}>pcs</option><option ${item.unit === 'sendok' ? 'selected' : ''}>sendok</option><option ${item.unit === 'porsi' ? 'selected' : ''}>porsi</option><option ${item.unit === 'lainnya' ? 'selected' : ''}>lainnya</option></select><input class="ing-price" aria-label="Harga bahan per satuan" type="number" min="0" step="1" placeholder="50000" required value="${safe(item.price)}"><button type="button" class="remove-ingredient" title="Hapus bahan" aria-label="Hapus bahan">×</button>`; row.querySelectorAll('input,select').forEach(el => el.addEventListener('input', updatePreview)); row.querySelector('.remove-ingredient').addEventListener('click', () => { row.remove(); updatePreview() }); $('ingredientRows').appendChild(row); updatePreview() }
            function readIngredients() { return [...$('ingredientRows').querySelectorAll('.ingredient-row')].map(row => ({ name: row.querySelector('.ing-name').value.trim(), qty: Number(row.querySelector('.ing-qty').value) || 0, unit: row.querySelector('.ing-unit').value, price: Number(row.querySelector('.ing-price').value) || 0 })) }
            function updatePreview() { const total = readIngredients().reduce((sum, item) => sum + item.qty * item.price, 0); $('hppPreview').textContent = money(total); const sell = Number($('sellingPrice').value) || 0; $('marginPreview').textContent = sell > 0 ? ((sell - total) / sell * 100).toLocaleString('id-ID', { maximumFractionDigits: 1 }) + '%' : '—' }
            function openForm(product = null) { editingId = product?.id || null; $('productForm').reset(); $('ingredientRows').innerHTML = ''; $('modalTitle').textContent = product ? 'Edit Produk' : 'Tambah Produk'; $('productName').value = product?.name || ''; $('productCategory').value = product?.category || 'Makanan'; $('sellingPrice').value = product?.sellingPrice ?? ''; $('productNote').value = product?.note || ''; if (product?.ingredients?.length) product.ingredients.forEach(ingredientRow); else ingredientRow(); $('productModal').classList.add('show'); setTimeout(() => $('productName').focus(), 50) }
            function closeForm() { $('productModal').classList.remove('show'); editingId = null }
            function render() { const query = $('searchInput').value.trim().toLocaleLowerCase('id-ID'), category = $('categoryFilter').value; const filtered = products.filter(p => (!category || p.category === category) && (!query || p.name.toLocaleLowerCase('id-ID').includes(query) || (p.ingredients || []).some(i => i.name.toLocaleLowerCase('id-ID').includes(query)))); $('totalProducts').textContent = products.length; $('totalRecipes').textContent = products.filter(p => p.ingredients?.length).length; const unique = new Set(products.flatMap(p => (p.ingredients || []).map(i => i.name.trim().toLocaleLowerCase('id-ID')).filter(Boolean))); $('totalIngredients').textContent = unique.size; const list = $('productList'); list.innerHTML = ''; if (!filtered.length) { list.innerHTML = `<div class="empty">${products.length ? 'Produk tidak ditemukan. Coba ubah pencarian atau kategori.' : 'Belum ada produk. Klik “Tambah Produk” untuk memasukkan produk dan bahan resep pertama.'}</div>`; return } filtered.forEach(p => { const row = document.createElement('div'); row.className = 'product-row'; const m = margin(p); row.innerHTML = `<div class="product-info"><div class="food-icon">${p.category === 'Minuman' ? '🥤' : p.category === 'Camilan' ? '🍪' : p.category === 'Makanan' ? '🍜' : '📦'}</div><div><h4>${safe(p.name)}</h4><small>${(p.ingredients || []).length} bahan${p.note ? ' · ' + safe(p.note) : ''}</small></div></div><div><span class="badge">${safe(p.category)}</span></div><div>${money(hpp(p))}</div><div class="${m !== null && m >= 0 ? 'green' : ''}">${m === null ? '—' : m.toLocaleString('id-ID', { maximumFractionDigits: 1 }) + '%'}</div><div><div class="status">${Number(p.sellingPrice) > 0 ? 'Aktif' : 'Perlu harga jual'}</div><div class="row-actions"><button class="tiny-btn" data-action="detail" data-id="${safe(p.id)}">Detail</button><button class="tiny-btn" data-action="edit" data-id="${safe(p.id)}">Edit</button><button class="tiny-btn" data-action="delete" data-id="${safe(p.id)}">Hapus</button></div></div>`; list.appendChild(row) }) }
            $('addProductBtn').addEventListener('click', () => openForm()); $('addIngredientBtn').addEventListener('click', () => ingredientRow()); $('closeModal').addEventListener('click', closeForm); $('cancelModal').addEventListener('click', closeForm); $('sellingPrice').addEventListener('input', updatePreview); $('searchInput').addEventListener('input', render); $('categoryFilter').addEventListener('change', render);
            $('productModal').addEventListener('click', e => { if (e.target === $('productModal')) closeForm() });
            $('productForm').addEventListener('submit', e => { e.preventDefault(); const name = $('productName').value.trim(), ingredients = readIngredients(); if (!name) { notify('Nama produk wajib diisi.'); return } if (!ingredients.length) { notify('Tambahkan minimal satu bahan.'); return } if (ingredients.some(i => !i.name || i.qty <= 0 || i.price < 0)) { notify('Periksa nama, jumlah, dan harga setiap bahan.'); return } const product = { id: editingId || ('p_' + Date.now().toString(36) + '_' + Math.random().toString(36).slice(2, 7)), name, category: $('productCategory').value, sellingPrice: Number($('sellingPrice').value), note: $('productNote').value.trim(), ingredients, updatedAt: new Date().toISOString() }; if (editingId) { products = products.map(p => p.id === editingId ? product : p) } else products.unshift(product); if (persist()) { closeForm(); render(); notify(editingId ? 'Produk berhasil diperbarui.' : 'Produk berhasil ditambahkan.') } });
            $('productList').addEventListener('click', e => { const button = e.target.closest('button[data-action]'); if (!button) return; const product = products.find(p => p.id === button.dataset.id); if (!product) return; if (button.dataset.action === 'edit') openForm(product); if (button.dataset.action === 'delete') { if (confirm(`Hapus produk "${product.name}"? Tindakan ini tidak dapat dibatalkan.`)) { products = products.filter(p => p.id !== product.id); persist(); render(); notify('Produk dihapus.') } } if (button.dataset.action === 'detail') showDetail(product) });
            function showDetail(p) { const m = margin(p); $('detailTitle').textContent = p.name; $('detailBody').innerHTML = `<div class="detail-list"><div class="detail-item"><span>Kategori</span><strong>${safe(p.category)}</strong></div><div class="detail-item"><span>Harga jual / porsi</span><strong>${money(p.sellingPrice)}</strong></div><div class="detail-item"><span>Total HPP bahan / porsi</span><strong>${money(hpp(p))}</strong></div><div class="detail-item"><span>Laba kotor estimasi / porsi</span><strong>${money((Number(p.sellingPrice) || 0) - hpp(p))}</strong></div><div class="detail-item"><span>Margin kotor</span><strong>${m === null ? '—' : m.toLocaleString('id-ID', { maximumFractionDigits: 1 }) + '%'}</strong></div></div><h3 style="font-size:16px;margin:24px 0 8px">Rincian bahan</h3><div class="detail-list">${(p.ingredients || []).map(i => `<div class="detail-item"><span>${safe(i.name)}<br><small style="color:#687386">${i.qty} ${safe(i.unit)} × ${money(i.price)}</small></span><strong>${money(i.qty * i.price)}</strong></div>`).join('')}</div>${p.note ? `<p class="hint">Catatan: ${safe(p.note)}</p>` : ''}<p class="hint">Perhitungan ini hanya mencakup biaya bahan yang dicatat pada resep.</p>`; $('detailModal').classList.add('show') }
            $('closeDetail').addEventListener('click', () => $('detailModal').classList.remove('show')); $('closeDetailBottom').addEventListener('click', () => $('detailModal').classList.remove('show')); $('detailModal').addEventListener('click', e => { if (e.target === $('detailModal')) $('detailModal').classList.remove('show') }); document.addEventListener('keydown', e => { if (e.key === 'Escape') { closeForm(); $('detailModal').classList.remove('show') } });
            render();
        })();

    </script>
</body>

</html>