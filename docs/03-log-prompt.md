# Log Prompt Pengembangan KULIKO

**Nama proyek:** KULIKO — Sistem Pendukung Keputusan (DSS) untuk UMKM  
**Alat AI yang dipakai:** ChatGPT (GPT-6)  
**Tujuan log:** Mencatat prompt penting yang digunakan selama pengembangan, hasil AI, dan keputusan tim.

> **Catatan pengisian:** Tabel ini merupakan draf berdasarkan riwayat pengembangan yang tersedia. Periksa dan sesuaikan tanggal, hasil pengujian, serta keputusan tim dengan kondisi sebenarnya. Jangan menandai fitur berhasil diuji jika belum diuji.

## Log Prompt

| No | Waktu | Langkah ke- | Prompt (ringkas) | Hasil dari AI | Keputusan tim (diterima / diubah / ditolak) dan alasannya |
| ----: | :---- | :---- | :---- | :---- | :---- |
| 1 | Belum dicatat | Pengembangan fitur HPP | Buat halaman tambah produk yang mendukung beberapa bahan baku dan input harga bahan untuk menghitung HPP. | Kode halaman HPP dengan input bahan dan perhitungan biaya. | Perlu dicatat setelah tim memeriksa halaman dan menguji perhitungan. |
| 2 | Belum dicatat | Pengembangan fitur analisis | Buat halaman analisis yang membaca data produk dan HPP untuk menghitung laba, margin, BEP, dan target laba jika datanya tersedia. | Kode halaman analisis berdasarkan data produk dan HPP yang tersimpan. | Perlu dicatat setelah hasil perhitungan dan integrasi diuji. |
| 3 | Belum dicatat | Pengembangan dashboard | Buat dashboard KULIKO yang menampilkan ringkasan usaha dari data produk dan HPP. | Kode dashboard dengan ringkasan indikator dan grafik. | Perlu dicatat setelah integrasi data dan tampilan diuji. |
| 4 | Belum dicatat | Pengembangan laporan | Buat halaman laporan bulanan dengan pemilihan periode, ringkasan pendapatan dan HPP, grafik, serta ekspor CSV. | Kode halaman laporan dengan penyimpanan data periode di browser dan ekspor CSV. | Perlu dicatat setelah penyimpanan, grafik, dan ekspor diuji. |
| 5 | Belum dicatat | Debugging laporan | Periksa dan perbaiki error JavaScript pada fungsi grafik laporan bulanan. | Saran revisi kode JavaScript untuk fungsi grafik. | Catat apakah revisi diterapkan dan apakah error benar-benar hilang setelah diuji. |
| 6 | Belum dicatat | Pengembangan perhitungan kerugian | Tambahkan perhitungan biaya bahan terbuang dan produk gagal sesuai rumus: (massa bahan terbuang × harga satuan) \+ (jumlah produk gagal × HPP per unit). | Kode perhitungan biaya kerugian untuk ditambahkan ke halaman HPP. | Periksa dengan contoh hitung manual dan catat hasil sebenarnya. |
| 7 | Belum dicatat | Pengembangan saran harga | Tambahkan saran harga jual berdasarkan HPP dan target margin keuntungan. | Kode rekomendasi harga jual dan estimasi laba berdasarkan target margin. | Periksa rumus, pembulatan harga, dan apakah harga rekomendasi diterapkan dengan benar. |
| 8 | Belum dicatat | Review keamanan | Tinjau keamanan `koneksi.php`, `login.php`, dan `register.php`. | Identifikasi risiko password teks biasa, SQL injection, dan pengelolaan sesi. | Terapkan prepared statements, `password_hash()`/`password_verify()`, dan perlindungan sesi; tandai selesai hanya setelah implementasi dan pengujian. |

## Catatan Evaluasi

- **Fitur yang sudah diuji:** Isi hanya setelah tim menjalankan pengujian dan mencatat hasilnya.  
- **Fitur yang perlu diperbaiki:** Catat bug, file terkait, dan langkah reproduksi.  
- **Keputusan tim:** Gunakan salah satu status berikut: `Diterima`, `Diubah`, atau `Ditolak`, lalu jelaskan alasannya.  
- **Tanggal dan waktu:** Isi berdasarkan riwayat percakapan atau catatan kerja yang benar-benar tersedia.  
- **Keamanan:** Jangan mencatat password asli, kredensial database, token, atau rahasia lain ke dalam log.

## Format untuk Menambahkan Entri Baru

| No | Waktu | Langkah ke- | Prompt (ringkas) | Hasil dari AI | Keputusan tim (diterima / diubah / ditolak) dan alasannya |
| ----: | :---- | :---- | :---- | :---- | :---- |
| 9 | Isi tanggal sebenarnya | Isi tahap pekerjaan | Ringkas prompt yang benar-benar diberikan | Ringkas hasil AI | Isi keputusan dan alasan berdasarkan pengujian |

