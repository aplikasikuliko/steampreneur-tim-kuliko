Spesifikasi Produk
Nama tim: Belum diisi Nama produk: KULIKO Alur inti yang dibangun: Pengguna masuk atau mendaftar, mengelola data produk, lalu menggunakan fitur HPP, analisis, dan laporan sesuai halaman yang tersedia di aplikasi.
1. Masalah
KULIKO ditujukan untuk membantu pengelolaan informasi biaya dan usaha. Masalah spesifik yang dialami calon pengguna belum divalidasi melalui wawancara dalam berkas proyek yang tersedia.
2. Pengguna
Pengguna sasaran yang tampak dari nama halaman aplikasi adalah pelaku usaha atau pengguna yang perlu mengelola produk, menghitung HPP, melihat analisis, dan membuat laporan. Kebutuhan ini masih perlu dikonfirmasi dengan pengguna nyata.
3. Hasil wawancara calon pengguna
Narasumber (tulis perannya saja, tanpa data pribadi, misalnya "pelaku usaha makanan"): Belum dilakukan / bukti belum tersedia. Cara wawancara (langsung / lewat pesan) dan tanggal: Belum diisi.

Pertanyaan kami
Jawaban narasumber
1. Berapa banyak jenis menu yang Anda jual dan berapa perkiraan porsi yang laku dalam sehari?
2. Bagaimana cara Anda mencatat pembelian bahan baku dan hasil penjualan harian saat ini?
3. Apakah Anda merasa kerepotan jika harus mencatat belanjaan dan penjualan secara berulang di buku atau tempat terpisah?
4. Bagaimana cara Anda menghitung modal per porsi dan menentukan harga jual makanan/minuman saat ini?
5. Jika ada bahan baku yang tersisa, rusak, atau basi, apakah biaya tersebut dihitung sebagai kerugian usaha?
6. Siapa yang sehari-hari bertanggung jawab mencatat keuangan dan stok barang di toko/warung Anda?
7. Jika ada aplikasi di HP yang bisa membantu usaha Anda, fitur mana yang PALING Anda butuhkan? (Boleh pilih maksimal 2)
8. Apakah fitur "coba-coba ubah harga" akan membantu Anda mengambil keputusan jika harga bahan di pasar naik?
9. Tampilan laporan keuangan seperti apa yang paling mudah Anda pahami di layar HP?
10. Perangkat dan koneksi apa yang paling sering Anda gunakan saat berjualan?
11. Jika aplikasi ini sudah siap diuji coba, apakah Anda bersedia mencoba dan memberikan masukan agar aplikasinya makin bagus?


1. 5 sampai 15 jenis menu (30 – 100 porsi / hari)
2. Dicatat manual di buku / kertas (catatan belanja dan penjualan terpisah)
3. Tidak repot / Sudah terbiasa
4. Dihitung detail dan memperkirakan sendiri
5. Hampir tidak ada barang yang terbuang/rusak
6. Sendiri (Pemilik usaha)
7. Cukup catat satu kali, modal, stok bahan, dan keuntungan langsung terhitung otomatis
8. Tidak terlalu butuh
9. Tabel angka-angka yang sangat detail
10. HP (Android/iPhone) menggunakan paket data internet dan WI-FI tempat usaha
11. Ragu-ragu / Membutuhkan penjelasan lebih lanjut


Jika tidak memungkinkan wawancara, tulis persona pengguna dan dasar asumsi kalian di sini. Persona sementara: pelaku usaha yang perlu mencatat produk, menghitung harga pokok produksi, melihat analisis, dan meninjau laporan. Ini merupakan asumsi dari nama halaman (produk.php, hpp.php, analisis.php, laporan.php), bukan hasil wawancara.
4. Fitur wajib (hanya untuk alur inti)
Akses halaman masuk dan pendaftaran melalui login.php dan register.php.
Mengelola data produk melalui produk.php.
Mengakses perhitungan HPP, analisis, dan laporan melalui hpp.php, analisis.php, dan laporan.php.
5. Di luar cakupan (tidak dikerjakan dalam challenge ini)
Fitur yang tidak terkonfirmasi di dalam kode dan skema database tidak dinyatakan sebagai fitur yang tersedia.
Integrasi pihak ketiga, sinkronisasi lintas perangkat, dan keamanan produksi belum dapat dipastikan dari daftar berkas saja.
6. Aturan bisnis dan perhitungan
Tuliskan rumus atau aturan yang harus diikuti aplikasi. Contoh: "Ongkir Rp10.000, gratis jika belanja minimal Rp50.000."

Halaman hpp.php menunjukkan adanya bagian perhitungan HPP, tetapi rumus, satuan, dan nilai ambang perlu diverifikasi langsung pada implementasi.
Aturan pada analisis.php dan laporan.php perlu dicocokkan dengan kode serta data yang digunakan sebelum dinyatakan benar.
7. Data yang disimpan
Data
Contoh isi
Disimpan di mana
Data aplikasi
Struktur tepat perlu diperiksa dari skema
Database SQL yang disertakan sebagai kuliko.sql
Koneksi database
Pengaturan koneksi
koneksi.php; pastikan kredensial tidak dipublikasikan
Data sesi/login
Detail belum diverifikasi
Perlu diperiksa pada login.php dan register.php

8. Kriteria "selesai"
Setiap kriteria harus bisa diuji (bisa dijawab ya atau tidak).

Aplikasi dapat dijalankan pada lingkungan PHP dan database yang sesuai, dengan petunjuk setup yang telah diuji.
Alur masuk/daftar dan pengelolaan produk diuji dengan input valid serta tidak valid.
Perhitungan HPP, analisis, dan laporan diverifikasi menggunakan data uji dengan hasil yang dihitung secara independen.
