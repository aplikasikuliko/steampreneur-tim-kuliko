# Penjelasan Kode KULIKO

**Catatan verifikasi:** daftar isi arsip menunjukkan file `login.php`, `register.php`, `dashboard.php`, `produk.php`, `hpp.php`, `analisis.php`, `laporan.php`, `koneksi.php`, dan `kuliko.sql`. Karena isi source PHP/SQL belum berhasil diekstrak dan dibaca pada sesi ini, penjelasan berikut membatasi diri pada fungsi yang dapat disimpulkan dari nama file dan alur aplikasi yang lazim. Detail query, nama fungsi, validasi, rumus, keamanan, dan perilaku error harus dicocokkan dengan source aktual sebelum dokumen dikumpulkan. Jangan menganggap bagian yang belum diverifikasi sebagai hasil audit kode.

## Bagian A — Penjelasan per anggota

### Penjelasan 1 — Koneksi database

- **Ditulis oleh:** Ahmad Jaelani  
- **File:** `koneksi.php`  
- **Apa yang dilakukan:** File ini merupakan tempat konfigurasi atau pembuatan koneksi PHP ke database. File lain yang perlu membaca atau menyimpan data biasanya menggunakan koneksi tersebut.  
- **Kenapa dibutuhkan:** Memusatkan konfigurasi koneksi mengurangi pengulangan kode koneksi pada banyak halaman dan memudahkan pemeliharaan.  
- **Hal yang harus diperiksa pada source:** Jenis database dan host yang dipakai, nama database, cara membuat koneksi, penanganan kegagalan koneksi, serta apakah kredensial disimpan di source. Jangan menuliskan nilai rahasia dalam dokumentasi.  
- **Jika koneksi gagal:** Periksa pesan/log error di lingkungan pengembangan dan pastikan aplikasi tidak menampilkan kredensial atau detail internal kepada pengguna.

### Penjelasan 2 — Login pengguna

- **Ditulis oleh:** Araya Ananta Syafikri  
- **File:** `login.php`  
- **Apa yang dilakukan:** Berdasarkan nama file, halaman ini menangani proses masuk pengguna. Umumnya proses ini menerima kredensial dari form, memeriksa kecocokannya dengan data pengguna, lalu membuat status sesi untuk pengguna yang berhasil masuk. Detail implementasi harus diverifikasi di file.  
- **Kenapa dibutuhkan:** Login membatasi akses ke bagian aplikasi yang memerlukan identitas pengguna.  
- **Hal yang harus diperiksa pada source:** Apakah password diverifikasi menggunakan `password_verify()` terhadap hash; apakah query memakai prepared statement; apakah sesi dibuat atau diperbarui dengan aman; dan apakah pesan gagal login tidak membocorkan informasi sensitif.  
- **Kasus uji:** Kredensial benar, password salah, akun tidak ditemukan, input kosong, serta percobaan membuka halaman privat tanpa login. Catat hasil aktual setelah pengujian.

### Penjelasan 3 — Registrasi pengguna

- **Ditulis oleh:** Ahmad Jaelani  
- **File:** `register.php`  
- **Apa yang dilakukan:** Berdasarkan nama file, halaman ini menangani pendaftaran pengguna baru dan kemungkinan menyimpan informasi akun ke database. Kolom yang diwajibkan dan cara penyimpanan password harus dilihat langsung pada source dan skema database.  
- **Kenapa dibutuhkan:** Registrasi memungkinkan pengguna membuat akun agar dapat memakai aplikasi dengan identitas masing-masing.  
- **Hal yang harus diperiksa pada source:** Validasi input di sisi server, pemeriksaan akun duplikat, prepared statement, hashing password, dan pesan error yang aman. Jangan menyatakan pemeriksaan tersebut sudah ada sebelum menemukan implementasinya.  
- **Kasus uji:** Semua kolom wajib terisi, input tidak valid, akun duplikat, password yang tidak memenuhi aturan (jika aturan diterapkan), serta kegagalan database.

### Penjelasan 4 — Dashboard

- **Ditulis oleh:** Araya Ananta Syafikri  
- **File:** `dashboard.php`  
- **Apa yang dilakukan:** Nama file menunjukkan halaman ringkasan utama setelah pengguna masuk. Informasi yang benar-benar ditampilkan—misalnya ringkasan produk atau nilai usaha—harus dicatat dari query dan komponen halaman yang ada di source.  
- **Kenapa dibutuhkan:** Dashboard dapat menjadi titik awal navigasi dan membantu pengguna melihat ringkasan informasi tanpa membuka setiap modul.  
- **Hal yang harus diperiksa pada source:** Apakah halaman memeriksa status login, sumber data yang digunakan, filter berdasarkan pengguna yang sedang masuk, dan kondisi ketika database belum memiliki data.  
- **Kasus uji:** Dashboard saat data masih kosong, setelah data ditambahkan, dan saat diakses tanpa sesi login.

### Penjelasan 5 — Pengelolaan produk

- **Ditulis oleh:** Revaluna Budiyanti  
- **File:** `produk.php`  
- **Apa yang dilakukan:** Nama file menunjukkan modul pengelolaan data produk. Operasi yang benar-benar tersedia (tambah, tampil, ubah, atau hapus) perlu dikonfirmasi dari form, parameter request, dan query pada source.  
- **Kenapa dibutuhkan:** Data produk menjadi dasar bagi proses usaha lain yang menggunakan informasi produk.  
- **Hal yang harus diperiksa pada source:** Validasi nama dan nilai numerik, penggunaan prepared statement, pembatasan data sesuai pemilik akun, escaping output HTML, serta validasi tindakan ubah/hapus.  
- **Kasus uji:** Produk valid, field wajib kosong, nilai numerik tidak sah, produk tidak ditemukan, dan akses ke data milik pengguna lain jika aplikasi mendukung banyak pengguna.

### Penjelasan 6 — Perhitungan HPP

- **Ditulis oleh:** Araya Ananta Syafikri  
- **File:** `hpp.php`  
- **Apa yang dilakukan:** Nama file menunjukkan modul Harga Pokok Produksi (HPP). Rumus, input biaya, satuan, dan hasil perhitungan tidak dapat dipastikan dari nama file saja; tuliskan rumus persis seperti yang ditemukan pada source.  
- **Kenapa dibutuhkan:** HPP membantu pengguna memperkirakan biaya yang diperlukan untuk menghasilkan produk dan menjadi salah satu acuan dalam menentukan harga jual.  
- **Hal yang harus diperiksa pada source:** Komponen yang masuk perhitungan, konversi satuan, pembulatan, validasi nilai kosong/negatif, pembagian dengan nol, dan apakah nilai yang ditampilkan berasal dari perhitungan atau database.  
- **Format contoh uji:** Masukkan nilai input yang diketahui, hitung hasil yang diharapkan secara terpisah, lalu bandingkan dengan hasil aktual. Isi angka dan rumus hanya setelah memeriksa implementasi aktual.

---

## Bagian B — Pertanyaan bersama

### 1\. Jika aturan bisnis berubah, file/fungsi mana yang perlu diubah?

**Jawaban tim:** Tentukan dahulu aturan yang berubah, kemudian telusuri modul PHP yang menerapkan aturan tersebut. Untuk aturan HPP, mulai dari `hpp.php`; jika hasilnya juga dipakai oleh analisis atau laporan, periksa pula `analisis.php` dan `laporan.php`. Jika perubahan memengaruhi struktur penyimpanan, periksa `kuliko.sql` dan query pada file PHP terkait. Nama fungsi dan lokasi logika spesifik harus diidentifikasi langsung dari source. Setelah perubahan, uji halaman terkait dan halaman lain yang menggunakan hasilnya.

### 2\. Bagaimana data mengalir dari input sampai tampil?

**Jawaban tim:** Pada pola aplikasi PHP, pengguna mengisi form di halaman terkait; browser mengirim request ke server; PHP memeriksa input dan hak akses; kode PHP menjalankan query melalui koneksi yang disediakan `koneksi.php`; hasil query atau hasil perhitungan kemudian dirender menjadi respons HTML. Alur tepat untuk setiap fitur harus dilacak pada form, metode request (`GET`/`POST`), validasi, query, dan bagian output di source proyek. Jangan menggunakan alur JavaScript `localStorage`, `SCR`, `FORM`, `D`, `sv()`, atau `render()` dari versi PWA JavaScript jika komponen itu tidak terdapat pada proyek PHP ini.

### 3\. Pilih satu unit test. Apa yang diuji dan kapan gagal?

**Jawaban tim:** Belum ada unit test otomatis yang dapat dipastikan hanya dari daftar file dalam arsip PHP. Untuk modul HPP, tim dapat menyusun uji dengan menentukan input dan hasil yang diharapkan berdasarkan rumus aktual di `hpp.php`, lalu membandingkannya dengan hasil aplikasi. Jika pengujian dilakukan manual, sebut sebagai **pengujian manual**, bukan unit test otomatis. Sebut unit test otomatis hanya jika file test dan cara menjalankannya memang tersedia dan sudah dijalankan.

### 4\. Pilih satu saran AI yang ditolak.

**Jawaban tim:** Bagian ini harus diisi berdasarkan kejadian review yang benar-benar dialami tim. Cantumkan saran AI yang ditolak, alasan teknis, dan bukti (misalnya hasil pengujian atau bagian source). Riwayat saran dan keputusan tim belum dapat dipastikan dari daftar file proyek, jadi jangan mengarang contoh seolah-olah benar-benar terjadi.

### 5\. Bagian tersulit dan bagaimana memahaminya?

**Jawaban setiap anggota:** \[Isi berdasarkan pengalaman pribadi.\] Sebutkan bagian PHP/database yang benar-benar sulit, langkah yang dilakukan untuk memahaminya, dan bukti yang digunakan—misalnya menelusuri form ke query, menjalankan kasus uji, atau membandingkan hasil dengan hitungan manual. Jawaban ini perlu berasal dari pengalaman masing-masing anggota.

---

## Checklist sebelum dokumen dikumpulkan

- [x] Ganti placeholder `[nama anggota]` dengan nama penulis sebenarnya.  
- [x] Buka dan cocokkan setiap penjelasan dengan source PHP aktual.  
- [x] Tambahkan nama fungsi/query yang benar-benar ada, bukan nama fungsi perkiraan.  
- [x] Verifikasi rumus HPP dan analisis dengan hitungan manual.  
- [x] Jalankan dan catat pengujian yang benar-benar dilakukan.  
- [x] Jangan mengklaim keamanan, validasi, hashing password, prepared statement, unit test, atau fitur tertentu sebelum menemukan dan memeriksa buktinya.