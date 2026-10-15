# Kasus Uji

Bagian A diisi **sebelum** mulai membangun. Hasil yang diharapkan dihitung sendiri oleh tim (boleh dengan kalkulator), bukan oleh AI. Bagian B diisi setelah aplikasi diuji.

| ID | Kriteria yang diuji | Langkah / input | Hasil yang diharapkan | Hasil sebenarnya | Lulus? | Bukti (nama file tangkapan layar) |
| :---- | :---- | :---- | :---- | :---- | :---- | :---- |
| U01 | Halaman login | Masukkan akun uji yang valid | Akses diberikan sesuai aturan aplikasi | Sesuai yang di harapkan | Lulus | Login.png |
| U02 | Validasi pendaftaran | Kirim form dengan kolom wajib kosong | Form menolak input tidak lengkap dengan pesan yang jelas | Sesuai yang di harapkan | Lulus | Login \- error..png |
| U03 | Pengelolaan produk | Tambah produk dengan data uji valid | Produk tersimpan dan tampil kembali | Sesuai yang di harapkan | Lulus | Produk \- input.png |
| U04 | Perhitungan HPP | Masukkan data uji yang telah dihitung manual | Nilai HPP sesuai rumus yang benar-benar diterapkan dan spesifikasi | Sesuai yang di harapkani | Lulus | Hpp..png |
| U05 | Batas/input salah pada angka | Masukkan nilai kosong, negatif, atau teks pada kolom angka yang relevan | Input ditolak atau ditangani aman tanpa hasil menyesatkan | Sesuai dengan yang di harapkan | Lulus | Produk \- Input error.png |

## Unit test otomatis (jika ada)

Nama file test: Belum ditemukan pada paket proyek PHP yang diberikan. Jumlah test: Belum dijalankan.