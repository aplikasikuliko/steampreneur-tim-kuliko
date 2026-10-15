# KULIKO

**KULIKO — Know Your Cost. Grow Your Business.**

KULIKO adalah aplikasi berbasis PHP untuk membantu pelaku usaha kuliner mengelola produk, menghitung Harga Pokok Produksi (HPP), menganalisis usaha, dan melihat laporan. Dokumentasi ini disusun berdasarkan nama berkas yang tersedia pada arsip `projek_kuliko.rar`. Detail implementasi yang tidak dapat dipastikan dari nama berkas ditandai sebagai hal yang perlu diperiksa.

> **Catatan cakupan:** arsip yang dirujuk berisi berkas PHP dan SQL (`index.php`, `register.php`, `koneksi.php`, `produk.php`, `hpp.php`, `analisis.php`, `laporan.php`, `dashboard.php`, dan `kuliko.sql`). README ini mendokumentasikan proyek PHP tersebut, bukan source PWA statis `kuliko-pwa`.

## Daftar isi

- [Fitur dan halaman](#fitur-dan-halaman)
- [Teknologi dan prasyarat](#teknologi-dan-prasyarat)
- [Struktur proyek](#struktur-proyek)
- [Instalasi dan menjalankan secara lokal](#instalasi-dan-menjalankan-secara-lokal)
- [Konfigurasi database](#konfigurasi-database)
- [Alur penggunaan](#alur-penggunaan)
- [Pengujian](#pengujian)
- [Keamanan](#keamanan)
- [Pemecahan masalah](#pemecahan-masalah)
- [Batasan dan hal yang perlu diverifikasi](#batasan-dan-hal-yang-perlu-diverifikasi)
- [Tim dan lisensi](#tim-dan-lisensi)

## Fitur dan halaman

Berdasarkan berkas yang tersedia, aplikasi memiliki bagian-bagian berikut. Rincian perilaku, kolom, validasi, dan hak akses perlu dicocokkan dengan isi kode sumber.

| Berkas | Peran yang ditunjukkan oleh nama berkas |
|---|---|
| `index.php` | Halaman awal atau halaman masuk aplikasi; pastikan fungsi tepatnya dengan memeriksa kode. |
| `register.php` | Halaman pendaftaran pengguna. |
| `dashboard.php` | Dashboard atau ringkasan informasi usaha. |
| `produk.php` | Pengelolaan data produk. |
| `hpp.php` | Perhitungan Harga Pokok Produksi (HPP). |
| `analisis.php` | Halaman analisis usaha. |
| `laporan.php` | Halaman laporan. |
| `koneksi.php` | Konfigurasi/koneksi ke database. |
| `kuliko.sql` | Skrip SQL untuk menyiapkan database dan/atau tabel. |
| `img/favicon.png` | Ikon favicon. |
| `img/title.png` | Gambar judul/branding yang digunakan aplikasi. |

Jangan menganggap fitur seperti ekspor laporan, autentikasi tertentu, pengelolaan resep, atau peran pengguna tersedia sebelum perilakunya dikonfirmasi dari kode.

## Teknologi dan prasyarat

- PHP dengan versi yang kompatibel dengan sintaks di source.
- MySQL atau MariaDB untuk database, jika sesuai dengan konfigurasi pada `koneksi.php` dan skrip `kuliko.sql`.
- Server web lokal, misalnya Apache melalui XAMPP/Laragon, atau PHP built-in server untuk pengembangan.
- Browser modern.
- Editor kode dan akses ke berkas proyek.

**Versi minimum PHP, nama database, dan ekstensi PHP yang diperlukan belum dikonfirmasi dari source.** Periksa kode dan konfigurasi sebelum menentukan versi produksi.

## Struktur proyek

```text
projek_kuliko/
├── analisis.php
├── dashboard.php
├── hpp.php
├── index.php
├── koneksi.php
├── kuliko.sql
├── laporan.php
├── produk.php
├── register.php
└── img/
    ├── favicon.png
    └── title.png
```

Struktur di atas mengikuti daftar berkas pada arsip yang tersedia. Jika terdapat berkas tersembunyi, konfigurasi server, atau dependensi lain yang tidak tercantum, tambahkan ke dokumentasi setelah memeriksa folder hasil ekstraksi.

## Instalasi dan menjalankan secara lokal

### 1. Siapkan lingkungan lokal

Pasang PHP dan MySQL/MariaDB, atau gunakan paket seperti XAMPP/Laragon yang menyediakan server web dan database. Jalankan layanan web dan database.

### 2. Ekstrak proyek

Ekstrak `projek_kuliko.rar`. Letakkan folder `projek_kuliko` di direktori web server lokal. Contoh lokasi pada XAMPP Windows:

```text
C:\xampp\htdocs\projek_kuliko\
```

Pastikan berkas `index.php`, `koneksi.php`, dan `kuliko.sql` ada di folder tersebut.

### 3. Buat database

1. Buka phpMyAdmin atau klien MySQL.
2. Buat database baru untuk KULIKO.
3. Pilih database tersebut, lalu impor berkas `kuliko.sql`.
4. Pastikan proses impor selesai tanpa error.

Nama database yang digunakan dalam contoh di atas hanyalah pilihan administrator; **nama database yang benar harus sama dengan konfigurasi di `koneksi.php`**.

### 4. Konfigurasikan koneksi

Buka `koneksi.php`, periksa host, nama database, username, password, dan cara koneksi yang digunakan. Sesuaikan dengan konfigurasi lokal. Jangan mengunggah kredensial database ke repositori publik.

### 5. Buka aplikasi

Jika menggunakan XAMPP, aktifkan Apache dan MySQL, lalu buka alamat lokal yang sesuai, misalnya:

```text
http://localhost/projek_kuliko/
```

Jika nama folder atau port berbeda, sesuaikan alamatnya. Jika halaman awal tidak terbuka, coba akses `index.php` secara langsung.

### Alternatif: PHP built-in server

Dari direktori proyek, jalankan:

```bash
php -S 127.0.0.1:8000
```

Kemudian buka `http://127.0.0.1:8000`. Cara ini cocok untuk pengembangan lokal; jangan gunakan PHP built-in server sebagai server produksi. Database tetap harus tersedia dan konfigurasi `koneksi.php` harus benar.

## Konfigurasi database

Berkas yang terkait database adalah:

- `kuliko.sql` — skema dan/atau data awal database.
- `koneksi.php` — pengaturan koneksi aplikasi.

Sebelum digunakan, periksa hal-hal berikut:

1. Nama database pada SQL dan konfigurasi PHP cocok.
2. Semua tabel yang dibutuhkan halaman aplikasi sudah dibuat.
3. Pengguna database memiliki hak akses minimum yang diperlukan.
4. Error koneksi tidak menampilkan password, query sensitif, atau detail server kepada pengguna akhir.
5. Backup database tersedia sebelum melakukan perubahan skema.

Nama tabel, kolom, relasi, dan data awal tidak dirinci di README ini karena perlu dibaca langsung dari `kuliko.sql`.

## Alur penggunaan

Alur berikut merupakan panduan umum berdasarkan halaman yang tersedia. Urutan dan syarat akses sebenarnya perlu diverifikasi saat aplikasi dijalankan.

1. Buka aplikasi melalui browser.
2. Jika aplikasi meminta akun, gunakan halaman pendaftaran yang disediakan dan ikuti alur masuk sesuai implementasi `index.php`/`register.php`.
3. Buka dashboard untuk melihat ringkasan yang tersedia.
4. Buka halaman produk untuk memeriksa atau mengelola produk.
5. Gunakan halaman HPP untuk memasukkan data yang diperlukan dan memeriksa hasil perhitungan.
6. Buka analisis untuk melihat informasi analitis yang disediakan aplikasi.
7. Buka laporan untuk meninjau laporan yang tersedia.
8. Verifikasi hasil perhitungan menggunakan data uji yang diketahui sebelum memakai hasilnya untuk keputusan usaha.

## Pengujian

Arsip yang tersedia belum menyertakan laporan hasil pengujian otomatis yang dapat dikonfirmasi melalui README ini. Lakukan pemeriksaan manual setelah instalasi:

- [ ] Aplikasi dapat dibuka tanpa error PHP.
- [ ] Koneksi database berhasil.
- [ ] Pendaftaran/masuk berjalan sesuai implementasi.
- [ ] Halaman dashboard dapat dibuka.
- [ ] Data produk dapat ditampilkan dan operasi perubahan data berjalan jika memang disediakan.
- [ ] Perhitungan HPP diuji dengan angka sederhana yang hasilnya sudah dihitung secara independen.
- [ ] Halaman analisis dan laporan menampilkan data yang sesuai database.
- [ ] Input kosong, angka negatif, format tidak valid, dan karakter khusus ditangani dengan benar.
- [ ] Pengguna tanpa izin tidak dapat mengakses atau mengubah data yang bukan haknya.
- [ ] Aplikasi tidak menampilkan pesan error internal atau kredensial database kepada pengguna.

Catat lingkungan pengujian, langkah, hasil aktual, hasil yang diharapkan, dan screenshot/bukti. Jangan menyatakan pengujian lulus sebelum benar-benar dijalankan.

## Keamanan

Sebelum aplikasi dipakai di lingkungan nyata, periksa dan terapkan pengamanan yang sesuai dengan source:

- **Kredensial:** jangan menyimpan password database yang dapat diakses publik atau memasukkan rahasia ke Git.
- **Password pengguna:** gunakan mekanisme hashing password yang sesuai, misalnya `password_hash()` dan `password_verify()` di PHP, jika autentikasi password diterapkan.
- **SQL injection:** gunakan prepared statements dengan parameter, bukan menyisipkan input langsung ke query SQL.
- **Validasi input:** validasi data di server; jangan mengandalkan validasi browser saja.
- **Output HTML:** lakukan escaping output sesuai konteks untuk mengurangi risiko XSS.
- **Otorisasi:** setiap halaman yang memerlukan login harus memeriksa sesi dan hak akses di sisi server.
- **Sesi:** gunakan pengaturan cookie sesi yang aman pada HTTPS dan regenerasi session ID setelah autentikasi.
- **CSRF:** lindungi operasi yang mengubah data dengan token CSRF.
- **Error dan log:** tampilkan pesan umum kepada pengguna; simpan detail diagnostik secara aman di log server.
- **HTTPS:** gunakan HTTPS ketika aplikasi dipasang di server yang dapat diakses melalui jaringan.
- **Backup:** lakukan backup database dan uji prosedur pemulihannya.

Daftar ini adalah rekomendasi pemeriksaan, **bukan pernyataan bahwa seluruh kontrol sudah diterapkan**. Keamanan aktual harus dinilai dengan membaca setiap berkas PHP dan menguji aplikasi.

## Pemecahan masalah

| Masalah | Hal yang perlu diperiksa |
|---|---|
| Koneksi database gagal | Layanan database aktif; host, port, nama database, username, dan password pada `koneksi.php` benar; database sudah diimpor. |
| `index.php` menampilkan error | Periksa log PHP/server; pastikan versi PHP kompatibel dan semua berkas yang diperlukan tersedia. Jangan membagikan kredensial atau detail sensitif dari log. |
| Tabel tidak ditemukan | Impor `kuliko.sql` ke database yang sama dengan database pada konfigurasi koneksi. |
| Gambar tidak muncul | Periksa ejaan nama berkas, huruf besar/kecil, dan path relatif ke `img/`. |
| Halaman kosong | Aktifkan logging error hanya di lingkungan pengembangan dan periksa log server; jangan menampilkan error detail di produksi. |
| Data tidak sesuai | Periksa input, query, relasi tabel, serta rumus yang digunakan. Uji dengan data sederhana yang hasilnya dapat diverifikasi. |

## Batasan dan hal yang perlu diverifikasi

- Dokumentasi ini menggunakan daftar berkas dari arsip dan isi README yang diberikan. Implementasi rinci di dalam PHP dan SQL belum dikonfirmasi pada dokumen ini.
- Belum dipastikan apakah seluruh operasi CRUD, validasi, autentikasi, otorisasi, dan ekspor laporan sudah diimplementasikan dengan benar.
- Versi PHP/MySQL minimum, nama database, tabel, dan kolom harus dicocokkan dengan source.
- Belum ada bukti di README ini tentang hasil pengujian browser, uji keamanan, atau pengujian beban.
- Jangan menggunakan data contoh sebagai catatan transaksi nyata tanpa verifikasi.

## Tim

Isi bagian ini sesuai kontribusi aktual tim. Jangan mencantumkan data kontak pribadi yang tidak diperlukan.

| Nama | Peran |
|---|---|
| Revaluna Budiyanti | Koordinator / dokumentasi *(perlu dikonfirmasi)* |
| Araya Ananta Syafikri | Pengembang *(perlu dikonfirmasi)* |
| Ahmad Jaelani | QA / pengujian *(perlu dikonfirmasi)* |
| Ahmad Jaelani | UI/UX / riset *(perlu dikonfirmasi)* |


**Status dokumentasi:** README ini merupakan dokumentasi awal yang disusun dari berkas proyek yang teridentifikasi. Perbarui setelah isi PHP, skema SQL, konfigurasi, serta hasil pengujian diverifikasi.
