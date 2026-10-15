# Catatan Code Review

Minta AI me-review kode kalian, lalu putuskan saran mana yang diterima.
Menolak saran AI dengan alasan yang jelas adalah hal yang baik.

**Prompt review yang dipakai:**

> Review keamanan dan kualitas proyek PHP KULIKO secara hati-hati. Periksa `login.php`, `register.php`, `koneksi.php`, `produk.php`, `hpp.php`, `analisis.php`, `laporan.php`, `dashboard.php`, serta `kuliko.sql` jika isi berkas tersedia. Cari risiko SQL injection, penyimpanan dan verifikasi password, pengelolaan session, validasi input di sisi server, otorisasi akses, XSS/output escaping, penanganan error database, dan konsistensi perhitungan bisnis. Untuk setiap temuan, sebutkan bukti berupa file/baris atau potongan kode, dampak, tingkat risiko, saran perbaikan, dan tes untuk memverifikasi perbaikan. Jangan menganggap risiko sebagai bug terkonfirmasi tanpa bukti kode, jangan mengubah kode, dan jangan mengarang hasil tes.

**Status review:** Prompt di atas dicatat untuk digunakan dalam review. Arsip sumber yang tersedia terdeteksi sebagai RAR, tetapi isi file belum berhasil dibaca dalam sesi ini. Karena itu, belum ada saran yang bisa diklaim sebagai temuan terkonfirmasi, dan tidak ada perubahan kode yang diklaim telah dilakukan.

| No | Saran dari AI | Diterima / ditolak | Alasan | Bagian kode yang berubah |
|---|---|---|---|---|
| 1 | Periksa seluruh query database dan gunakan prepared statements (misalnya PDO atau mysqli prepared statements) untuk input yang masuk ke query. | Belum diputuskan | Ini pemeriksaan keamanan yang penting, tetapi perlu membaca isi `koneksi.php` dan file yang menjalankan query sebelum menyatakan ada kerentanan atau memutuskan perubahan. | Belum ada; kode belum diubah |
| 2 | Periksa penggunaan `password_hash()` / `password_verify()` dan konfigurasi session setelah login, termasuk regenerasi session ID. | Belum diputuskan | Harus diverifikasi pada `login.php` dan `register.php`; tidak boleh menyimpulkan password atau session tidak aman tanpa melihat implementasinya. | Belum ada; kode belum diubah |
| 3 | Periksa otorisasi pada setiap halaman dan operasi data, serta pastikan pengguna tidak dapat mengakses atau mengubah data pengguna lain. | Belum diputuskan | Perlu meninjau pemeriksaan session dan query di `dashboard.php`, `produk.php`, `hpp.php`, `analisis.php`, dan `laporan.php` terlebih dahulu. | Belum ada; kode belum diubah |
| 4 | Periksa validasi input server-side, escaping keluaran HTML, dan penanganan error database agar tidak membocorkan informasi sensitif. | Belum diputuskan | Ini daftar pemeriksaan, bukan klaim bahwa kerentanan tersebut sudah ditemukan. Keputusan perlu didasarkan pada bukti kode dan tes. | Belum ada; kode belum diubah |
| 5 | Buat tes untuk rumus HPP, analisis, dan laporan, termasuk nilai kosong, nol, negatif, dan input tidak valid. | Belum diputuskan | Aturan bisnis dan hasil yang diharapkan harus dipastikan dari kode serta kebutuhan aplikasi sebelum menulis ekspektasi tes. | Belum ada; kode belum diubah |

Penjelasan kode ditulis terpisah di `08-penjelasan-kode.md`.
