KULIKO — Know Your Cost. Grow Your Business.
KULIKO adalah PWA untuk membantu UMKM kuliner mengelola resep, menghitung HPP, memahami margin dan BEP, mencatat penjualan serta pemborosan, dan mengekspor laporan. Paket source saat ini merupakan prototipe front-end: data akun dan usaha disimpan di browser perangkat melalui localStorage, bukan database server.
Alur inti
Buka aplikasi dan ikuti onboarding.
Daftar akun lokal atau masuk dengan akun lokal yang sudah dibuat di perangkat/browser yang sama.
Isi profil usaha; aplikasi menyiapkan data contoh untuk membantu melihat fitur.
Kelola produk, resep, harga bahan, tenaga kerja, overhead, markup, dan harga jual.
Tinjau HPP, margin, BEP, dan simulasi harga.
Catat penjualan dan waste.
Buka laporan dan ekspor CSV.
Cara menjalankan
Prasyarat
Browser modern seperti Google Chrome atau Firefox.
Python 3 untuk server lokal sederhana, atau Node.js dan Firebase CLI jika akan menggunakan Firebase Hosting.
Tidak ada npm install yang diperlukan untuk source statis yang disertakan.
Menjalankan lokal
Dari folder kuliko-pwa/public:

python3 -m http.server 8080

Lalu buka http://localhost:8080. Service worker dapat diuji pada localhost atau hosting HTTPS.
Pemeriksaan sintaks JavaScript
Jika Node.js tersedia, dari root proyek jalankan:

node --check kuliko-pwa/public/js/app.js

Perintah ini hanya memeriksa sintaks, bukan memastikan seluruh fitur benar.
Hosting Firebase
Petunjuk lebih lengkap ada di kuliko-pwa/PANDUAN_HOSTING.md. Ringkasnya: pasang firebase-tools, login, pilih project dengan firebase use --add, lalu jalankan firebase deploy --only hosting dari folder kuliko-pwa. Jangan menimpa file public/index.html.
Akun/data contoh
Tidak ada akun demo dengan username dan password tetap yang dikirim bersama paket. Buat akun lokal melalui halaman Daftar. Data contoh produk/penjualan/waste disiapkan setelah profil usaha disimpan. Jangan gunakan kata sandi penting karena akun ini hanya akun lokal prototipe.
Fitur yang tampak pada source
Welcome screen dan onboarding.
Daftar/masuk lokal dan profil usaha.
Dashboard ringkasan.
CRUD produk/resep dan pencarian/filter produk.
Perhitungan HPP, markup/harga rekomendasi, margin, dan BEP.
Pencatatan penjualan dan waste.
Ringkasan waste dan estimasi emisi berbasis konstanta kode.
Laporan laba rugi, arus kas, penjualan, HPP, ringkasan bulanan, dan ekspor CSV.
Manifest, ikon, service worker, cache shell, serta dukungan prompt instalasi PWA.
Batasan yang diketahui
Data akun dan usaha tersimpan pada perangkat/browser yang sama; tidak sinkron lintas perangkat dan dapat hilang jika data browser dihapus.
Autentikasi lokal menggunakan hash SHA-256 + salt yang dibuat dengan Math.random; ini bukan pengganti autentikasi server dan tidak layak dipakai untuk akun produksi. Gunakan kata sandi unik yang tidak dipakai di layanan lain.
Login Google, lupa kata sandi berbasis email, backend/database, sinkronisasi, dan API Smart Waste Map Cinangka belum ada.
Data contoh dibuat untuk demonstrasi; jangan dianggap transaksi nyata.
Estimasi emisi memakai faktor tetap 1,9 kg CO₂e/kg dalam kode. Faktor ini perlu diverifikasi sumbernya sebelum dipakai sebagai klaim ilmiah.
Ekspor CSV sudah dirapikan agar satu pemanggilan membuat satu tautan unduh, URL object dibersihkan, kutip/koma di-escape, dan teks berawalan formula spreadsheet dinetralkan. Tetap perlu uji unduhan nyata pada browser.
Paket revisi menyertakan smoke test otomatis tests/smoke.test.cjs (5 test terakhir lulus); uji browser/perangkat dan U01–U15 tetap belum terverifikasi.
Struktur folder paket
File/folder
Isi
docs/01-spesifikasi.md
Spesifikasi final dan status implementasi
docs/02-rencana.md
Rencana kerja
docs/03-log-prompt.md
Log prompt AI
docs/04-kasus-uji.md
Kasus uji manual
docs/05-kesalahan-ai.md
Temuan/risiko dari hasil AI dan inspeksi
docs/06-catatan-review.md
Catatan code review
docs/07-refleksi.md
Refleksi tim yang perlu divalidasi
docs/08-penjelasan-kode.md
Penjelasan fungsi kode dan pertanyaan pemahaman
docs/analisis-change-request.md
Analisis pencarian, filter, dan CSV
docs/catatan-bug.md
Kandidat bug dan template Bug Hunt
kuliko-pwa/
Source PWA yang diserahkan
docs/bukti/
Folder untuk screenshot pengujian asli

Hasil pemeriksaan versi paket ini
Pemeriksaan otomatis berbasis Node.js ditambahkan di tests/smoke.test.cjs. Jalankan dari root proyek dengan node --test tests/smoke.test.cjs; pengujian ini memeriksa rumus inti, pengamanan CSV, dan keberadaan validasi pada source. Pemeriksaan sintaks juga dijalankan pada app.js dan sw.js, serta firebase.json divalidasi sebagai JSON.

Pengujian browser/perangkat, unduhan CSV nyata, pemasangan PWA, dan mode offline belum diverifikasi secara visual/manual. Jangan menandai U01–U15 lulus hanya berdasarkan smoke test. Simpan bukti nyata dengan nama yang sesuai di docs/bukti/ setelah pengujian perangkat dilakukan.
Sumber dan lisensi
Source aplikasi berasal dari arsip kuliko-pwa.zip yang diserahkan bersama tugas ini. Lisensi pihak ketiga tidak dapat dipastikan dari arsip yang tersedia; tambahkan sumber/lisensi untuk setiap font, ikon, library, gambar, atau kode eksternal yang digunakan setelah memeriksa asalnya. Ikon utama pada source tampak dibuat sebagai path SVG inline.
Tim
Nama
Peran
Revaluna Budiyanti
Koordinator / dokumentasi
Araya Ananta Syafikri
Pengembang
Ahmad Jaelani
QA / pengujian
Ahmad Jaelani
UI/UX / riset


Ganti placeholder nama/peran dengan data tim sebenarnya. Jangan mencantumkan nomor telepon, alamat rumah, atau email pribadi.
