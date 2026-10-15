<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
$_SESSION['usaha'] = $_SESSION['usaha'] ?? 'Usaha Saya';
$_SESSION['alamat'] = $_SESSION['alamat'] ?? '';
$_SESSION['telepon'] = $_SESSION['telepon'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/favicon.png" type="image/png">
<title>KULIKO - Dashboard</title>

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
    --red: #d9534f;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f4f6fb;
    color: --var(--ink);
}

.container{
    max-width:1200px;
    margin:auto;
    padding:20px;
}

/* Header */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
}

.logo{
    font-size:24px;
    font-weight:bold;
    color:#1f4fa3;
}

.store{
    background:white;
    padding:10px 15px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}

/* Greeting */
.top-grid{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:15px;
    margin-bottom:15px;
}

.card{
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}

.card h2{
    margin-bottom:8px;
}

.subtitle{
    color:#777;
    font-size:14px;
}

/* Stats */
.stats{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:15px;
    margin-bottom:20px;
}

.stat-card{
    background:white;
    padding:15px;
    border-radius:20px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}

.stat-icon{
    font-size:28px;
    margin-bottom:8px;
}

.stat-title{
    font-size:13px;
    color:#777;
}

.stat-value{
    font-size:24px;
    font-weight:bold;
}

.up{
    color:#19b36b;
    font-size:13px;
}

.down{
    color:#e44;
    font-size:13px;
}

/* Sales */
.sales-card{
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
    margin-bottom:20px;
}

.sales-header{
    display:flex;
    justify-content:space-between;
    margin-bottom:15px;
}

.sales-value{
    font-size:42px;
    font-weight:bold;
    color:#1f4fa3;
}

.chart{
    height:220px;
    background:linear-gradient(to top,#dff7ec,#ffffff);
    border-radius:15px;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#888;
    margin-top:20px;
}

/* Quick Action */
.quick{
    background:white;
    padding:20px;
    border-radius:20px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
    margin-bottom:20px;
}

.quick-header{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}

.quick-grid{
    display:grid;
    grid-template-columns:repeat(5,1fr);
    gap:15px;
}

.quick-item{
    text-align:center;
}

.quick-icon{
    width:60px;
    height:60px;
    margin:auto;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#edf3ff;
    font-size:24px;
    margin-bottom:8px;
}

/* Insight */
.insight{
    background:#eef5ff;
    border-radius:20px;
    padding:20px;
}

.insight h3{
    margin-bottom:10px;
}

/* Bottom Nav */
.bottom-nav{
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    background:white;
    border-top:1px solid #ddd;
    display:flex;
    justify-content:space-around;
    padding:10px 0;
}

.nav-item{
    text-align:center;
    font-size:14px;
}

/* Tablet */
@media(max-width:768px){

    .top-grid{
        grid-template-columns:1fr;
    }

    .stats{
        grid-template-columns:1fr;
    }

    .quick-grid{
        grid-template-columns:repeat(3,1fr);
    }

    .sales-value{
        font-size:32px;
    }
}

/* HP */
@media(max-width:480px){

    .container{
        padding:15px;
        padding-bottom:90px;
    }

    .logo{
        font-size:20px;
    }

    .quick-grid{
        grid-template-columns:repeat(2,1fr);
    }

    .sales-value{
        font-size:28px;
    }

    .chart{
        height:180px;
    }
}
#nav-produk {
    text-decoration: none;
    color: #777;
}
.active {
    color: #1e4fa8;
    text-decoration: none;
}
.item-cepat {
    text-decoration: none;
    color: #333;
}

.sales-input-label{display:flex;align-items:center;gap:8px;font-size:13px;color:#666;flex-wrap:wrap}
.sales-input-label input{width:150px;padding:8px 10px;border:1px solid #d8deea;border-radius:9px;font:inherit}
.chart{display:flex;align-items:flex-end;justify-content:space-around;padding:18px 18px 28px;gap:10px;overflow:hidden}
.chart-empty{align-self:center;color:#888;text-align:center;font-size:14px}
.chart-bar-wrap{height:100%;flex:1;display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:6px;min-width:0}
.chart-bar{width:min(48px,75%);min-height:4px;background:linear-gradient(180deg,#4f83e5,#1f4fa3);border-radius:8px 8px 2px 2px;transition:height .25s}
.chart-label{font-size:11px;color:#777}
.quick-item a{display:block;height:100%;border-radius:12px;padding:4px}
.quick-item a:hover{background:#f5f8ff}
.bottom-nav{z-index:10}
.container{padding-bottom:100px}
@media(max-width:480px){.sales-header{gap:12px;flex-direction:column}.sales-input-label input{width:130px}.bottom-nav{font-size:12px}.nav-item{font-size:12px}}
</style>
</head>
<body>

<div class="container">
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="img/title.png" alt="KULIKO" style="height: 150px;">
        </div>
        <div class="store">
            <select>
                <option><?php echo htmlspecialchars((string)($_SESSION['usaha'] ?? 'Usaha Saya'), ENT_QUOTES, 'UTF-8'); ?></option>
            </select>
        </div>
    </div>

    <!-- Greeting -->
    <div class="top-grid">

        <div class="card">
            <h2><span id="greeting">Selamat datang</span>, <?php echo htmlspecialchars((string)($_SESSION['username'] ?? 'Pengguna'), ENT_QUOTES, 'UTF-8'); ?>!</h2>
            <p class="subtitle">
                Yuk pantau performa usaha Anda hari ini.
            </p>
        </div>

        <div class="card">
            <h3>🏪 <?php echo htmlspecialchars((string)($_SESSION['usaha'] ?? 'Usaha Saya'), ENT_QUOTES, 'UTF-8'); ?></h3>
            <p class="subtitle">Usaha Kuliner</p>
        </div>

    </div>

    <!-- Statistik -->
    <div class="stats">

        <div class="stat-card">
            <div class="stat-icon">🏆</div>
            <div class="stat-title">HPP per Porsi</div>
            <div class="stat-value" id="stat-hpp">—</div>
            <div class="subtitle" id="stat-hpp-note">Berdasarkan data produk tersimpan</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📈</div>
            <div class="stat-title">Margin Keuntungan</div>
            <div class="stat-value" id="stat-margin">—</div>
            <div class="subtitle">Estimasi dari harga jual dan HPP</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">🎯</div>
            <div class="stat-title">BEP Bulanan</div>
            <div class="stat-value" id="stat-bep">—</div>
            <div class="subtitle">Estimasi porsi untuk menutup biaya tetap</div>
        </div>

    </div>

    <!-- Penjualan -->
    <div class="sales-card">

        <div class="sales-header">
            <h2>Ringkasan Penjualan</h2>
            <label for="sales-input" class="sales-input-label">Penjualan bulan ini <input id="sales-input" type="number" min="0" step="1000" value="0" aria-label="Total penjualan bulan ini dalam rupiah"></label>
        </div>

        <p>Total Penjualan Bulan Ini</p>

        <div class="sales-value" id="sales-value">Rp 0</div>
        <p class="subtitle" id="sales-note">Masukkan total penjualan untuk menyimpan ringkasan bulan ini.</p>
        <div class="chart" id="sales-chart" role="img" aria-label="Grafik penjualan mingguan">
            <div class="chart-empty">Grafik penjualan akan tampil setelah data penjualan diisi.</div>
        </div>

    </div>

    <!-- Aksi Cepat -->
    <div class="quick">

        <div class="quick-header">
            <h2>Aksi Cepat</h2>
            <span class="subtitle">Pilih fitur</span>
        </div>

        <div class="quick-grid">

            <div class="quick-item">
                <a href="hpp.php" class="item-cepat">
                    <div class="quick-icon">🧮</div>
                    Hitung HPP
                </a>
            </div>

            <div class="quick-item">
                <a href="analisis.php" class="item-cepat">
                    <div class="quick-icon">📊</div>
                    Analisis
                </a>
            </div>

            <div class="quick-item">
                <a href="harga.html" class="item-cepat">
                    <div class="quick-icon">💡</div>
                    Harga
                </a>
            </div>

            <div class="quick-item">
                <a href="laporan.php" class="item-cepat">
                    <div class="quick-icon">📋</div>
                    Laporan
                </a>
            </div>

            <div class="quick-item">
                <a href="produk.php" class="item-cepat">
                    <div class="quick-icon">📦</div>
                    Produk
                </a>
            </div>

        </div>

    </div>

    <!-- Insight -->
    <div class="insight">
        <h3>✨ Insight Hari Ini</h3>
        <p id="insight-text">
            Tambahkan data produk dan HPP agar dashboard dapat menampilkan ringkasan usaha yang lebih relevan.
        </p>
    </div>

</div>

<!-- Bottom Navigation -->
<div class="bottom-nav">

    <div class="nav-item">
        <a href="#" class="active">
            🏠<br>Dashboard
        </a>
    </div>

    <div class="nav-item">
        <a href="produk.php" id="nav-produk">
            📦<br>Produk
        </a>
    </div>

    <div class="nav-item">
        <a href="hpp.php" id="nav-produk">
            🧮<br>HPP
        </a>
    </div>

    <div class="nav-item">
        <a href="analisis.php" id="nav-produk">
            📊<br>Analisis
        </a>
    </div>

    <div class="nav-item">
        <a href="laporan.php" id="nav-produk">
            📄<br>Laporan
        </a>
    </div>

</div>

<script>
(() => {
  'use strict';
  const $ = (id) => document.getElementById(id);
  const rupiah = (n) => new Intl.NumberFormat('id-ID', {
    style: 'currency', currency: 'IDR', maximumFractionDigits: 0
  }).format(Number.isFinite(n) ? n : 0);
  const readJson = (key, fallback) => {
    try {
      const value = JSON.parse(localStorage.getItem(key));
      return value ?? fallback;
    } catch (_) { return fallback; }
  };
  const getProducts = () => {
    const value = readJson('kuliko_produk_resep_v1', []);
    if (Array.isArray(value)) return value;
    if (value && Array.isArray(value.produk)) return value.produk;
    if (value && Array.isArray(value.products)) return value.products;
    return [];
  };
  const getHppData = () => readJson('kuliko_hpp_data_v1', {});
  const numeric = (...values) => {
    for (const value of values) {
      const n = Number(value);
      if (Number.isFinite(n) && n >= 0) return n;
    }
    return 0;
  };
  function productStats() {
    const products = getProducts();
    const hppData = getHppData();
    const hppById = hppData && typeof hppData === 'object'
      ? (hppData.products || hppData.items || hppData) : {};
    let hppSum = 0, marginSum = 0, count = 0, bep = 0;
    products.forEach((p) => {
      if (!p || typeof p !== 'object') return;
      const saved = (p.id != null && hppById && typeof hppById === 'object') ? hppById[p.id] : null;
      let ingredientCost = 0;
      if (Array.isArray(p.ingredients)) {
        ingredientCost = p.ingredients.reduce((sum, ing) => {
          const qty = numeric(ing.qty, ing.quantity);
          const price = numeric(ing.price, ing.unitPrice, ing.cost);
          return sum + (qty * price);
        }, 0);
      }
      const hpp = numeric(
        saved && saved.hpp, saved && saved.totalHpp, saved && saved.hppPerPortion,
        p.hpp, p.hppPerPorsi, p.costPerPortion, ingredientCost
      );
      const price = numeric(p.sellingPrice, p.hargaJual, p.price);
      if (hpp > 0 || price > 0) {
        hppSum += hpp;
        if (price > 0) marginSum += Math.max(0, ((price - hpp) / price) * 100);
        count++;
      }
      const fixed = numeric(saved && saved.fixedCost, saved && saved.overhead, p.fixedCost, p.overhead);
      const contribution = price - hpp;
      if (fixed > 0 && contribution > 0) bep += Math.ceil(fixed / contribution);
    });
    return { count, averageHpp: count ? hppSum / count : 0, averageMargin: count ? marginSum / count : 0, bep };
  }
  function renderChart(total) {
    const chart = $('sales-chart');
    chart.replaceChildren();
    if (total <= 0) {
      const empty = document.createElement('div');
      empty.className = 'chart-empty';
      empty.textContent = 'Masukkan total penjualan untuk melihat visualisasi penjualan.';
      chart.appendChild(empty);
      return;
    }
    // Pembagian ilustratif; bukan data transaksi harian yang tercatat.
    const ratios = [0.16, 0.21, 0.18, 0.25, 0.20];
    const labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Lainnya'];
    ratios.forEach((ratio, i) => {
      const wrap = document.createElement('div');
      wrap.className = 'chart-bar-wrap';
      const value = document.createElement('div');
      value.className = 'chart-bar';
      value.style.height = Math.max(4, ratio * 145) + 'px';
      value.title = rupiah(total * ratio);
      const label = document.createElement('div');
      label.className = 'chart-label';
      label.textContent = labels[i];
      wrap.append(value, label);
      chart.appendChild(wrap);
    });
  }
  function render() {
    const stats = productStats();
    $('stat-hpp').textContent = stats.count ? rupiah(stats.averageHpp) : 'Belum ada data';
    $('stat-hpp-note').textContent = stats.count ? `${stats.count} produk dianalisis` : 'Tambahkan produk/HPP terlebih dahulu';
    $('stat-margin').textContent = stats.count ? `${stats.averageMargin.toLocaleString('id-ID',{maximumFractionDigits:1})}%` : 'Belum ada data';
    $('stat-bep').textContent = stats.bep ? `${stats.bep.toLocaleString('id-ID')} porsi` : '—';
    const savedSales = numeric(localStorage.getItem('kuliko_dashboard_sales_v1'));
    const input = $('sales-input');
    if (document.activeElement !== input) input.value = savedSales || '';
    $('sales-value').textContent = rupiah(savedSales);
    $('sales-note').textContent = savedSales > 0 ? 'Total penjualan yang Anda masukkan untuk bulan ini.' : 'Masukkan total penjualan bulan ini pada kolom di atas.';
    renderChart(savedSales);
    const insight = stats.count
      ? `Dashboard membaca ${stats.count} produk. Rata-rata margin estimasi ${stats.averageMargin.toLocaleString('id-ID',{maximumFractionDigits:1})}%. Pastikan harga bahan dan harga jual selalu diperbarui.`
      : 'Belum ada data produk yang terbaca. Isi halaman Produk dan Hitung HPP terlebih dahulu agar ringkasan dashboard lebih akurat.';
    $('insight-text').textContent = insight;
  }
  const hour = new Date().getHours();
  $('greeting').textContent = hour < 11 ? 'Selamat pagi' : hour < 15 ? 'Selamat siang' : hour < 18 ? 'Selamat sore' : 'Selamat malam';
  $('sales-input').addEventListener('input', (event) => {
    const value = Math.max(0, Number(event.target.value) || 0);
    try { localStorage.setItem('kuliko_dashboard_sales_v1', String(value)); } catch (_) {}
    $('sales-value').textContent = rupiah(value);
    $('sales-note').textContent = value > 0 ? 'Total penjualan yang Anda masukkan untuk bulan ini.' : 'Masukkan total penjualan bulan ini pada kolom di atas.';
    renderChart(value);
  });
  window.addEventListener('storage', render);
  render();
})();
</script>

</body>
</html>