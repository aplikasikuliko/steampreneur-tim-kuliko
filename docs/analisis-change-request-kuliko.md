# Analisis Change Request --- KULIKO (Proyek PHP)

**Change request:** menambahkan pencarian, filter, dan ekspor CSV pada
halaman daftar atau rekap KULIKO.\
**Tujuan dokumen:** mencatat analisis dampak dan rencana pengujian
sebelum perubahan kode dilakukan.

## 1. Ringkasan permintaan

Pengguna perlu menemukan data dengan cepat saat jumlah data bertambah,
lalu mengunduh hasil yang relevan untuk diolah di Excel.

Kriteria penerimaan: 1. Ada kotak pencarian pada halaman daftar atau
rekap. Hasil tersaring saat teks diketik dan pencarian tidak membedakan
huruf besar/kecil. 2. Ada minimal satu filter berdasarkan kategori,
status, atau rentang tanggal. 3. Pencarian dan filter dapat digunakan
secara bersamaan. 4. Jika tidak ada hasil yang cocok, tampil pesan
**"Data tidak ditemukan"**. 5. Tombol **Unduh CSV** mengekspor data yang
sedang tampil setelah pencarian dan filter diterapkan. Baris pertama
berisi nama kolom. 6. Nilai angka di CSV tidak memakai simbol mata uang
atau pemisah ribuan, misalnya `15000`, bukan `Rp15.000`. 7. Semua kasus
uji lama tetap lulus.

## 2. Pemilihan halaman yang akan diubah

  -----------------------------------------------------------------------
  Kandidat                Peran berdasarkan nama  Pertimbangan
                          berkas                  
  ----------------------- ----------------------- -----------------------
  `produk.php`            Daftar/kelola produk    Kandidat awal jika
                                                  halaman ini menampilkan
                                                  tabel produk yang dapat
                                                  dicari dan difilter,
                                                  misalnya berdasarkan
                                                  nama atau kategori.

  `laporan.php`           Rekap/laporan           Kandidat awal yang kuat
                                                  untuk ekspor CSV jika
                                                  halaman ini menampilkan
                                                  baris data laporan dan
                                                  periode tanggal.

  `analisis.php`          Analisis usaha          Dipertimbangkan hanya
                                                  jika halaman ini
                                                  menampilkan
                                                  daftar/rekap data yang
                                                  sesuai untuk pencarian
                                                  dan filter.

  `dashboard.php`         Ringkasan               Bukan pilihan utama
                                                  jika hanya berisi kartu
                                                  ringkasan dan tidak
                                                  memiliki tabel data.

  `kuliko.sql`            Skema database          Periksa nama tabel dan
                                                  kolom yang tersedia
                                                  sebelum menetapkan
                                                  filter; jangan
                                                  mengasumsikan kolom
                                                  kategori, status, atau
                                                  tanggal ada.
  -----------------------------------------------------------------------

**Keputusan implementasi yang disarankan:** pilih satu halaman yang
benar-benar menampilkan daftar atau rekap. Periksa terlebih dahulu
`produk.php`, `laporan.php`, dan `kuliko.sql`; gunakan halaman dengan
data baris yang paling sesuai. Jangan menambahkan fitur ke beberapa
halaman sekaligus tanpa kebutuhan yang jelas.

## 3. Dampak perubahan

  --------------------------------------------------------------------------
  Bagian                  File kandidat              Perubahan/rencana
  ----------------------- -------------------------- -----------------------
  Spesifikasi             `docs/01-spesifikasi.md`   Tambahkan perilaku
                                                     pencarian, filter yang
                                                     dipilih, pesan saat
                                                     hasil kosong, dan
                                                     aturan format CSV.

  Halaman daftar/rekap    `produk.php` atau          Tambahkan kontrol
                          `laporan.php`              pencarian dan filter,
                                                     terapkan kondisi secara
                                                     bersamaan, dan
                                                     tampilkan pesan kosong.
                                                     Lokasi pasti ditentukan
                                                     setelah kode dibaca.

  Ekspor CSV              Halaman terpilih atau      Ekspor hanya baris yang
                          berkas PHP khusus jika     sesuai dengan
                          arsitektur proyek          pencarian/filter aktif;
                          membutuhkannya             sertakan header kolom;
                                                     format angka sebagai
                                                     nilai mentah tanpa
                                                     format mata uang.

  Query/database          `koneksi.php`, halaman     Periksa cara query
                          terpilih, `kuliko.sql`     dibuat dan kolom yang
                                                     tersedia. Jika input
                                                     pencarian/filter
                                                     dipakai di query SQL,
                                                     gunakan prepared
                                                     statements; jangan
                                                     menyisipkan input
                                                     pengguna langsung ke
                                                     SQL.

  Kasus uji               `docs/04-kasus-uji.md`     Tambahkan kasus untuk
                                                     pencarian, filter,
                                                     kombinasi keduanya,
                                                     hasil kosong, CSV,
                                                     karakter khusus, dan
                                                     regresi.

  Petunjuk penggunaan     `README.md` atau           Jelaskan halaman yang
                          dokumentasi README yang    memiliki fitur, cara
                          dipakai proyek             memakai
                                                     pencarian/filter, isi
                                                     CSV, lokasi unduhan,
                                                     dan batasan yang sudah
                                                     diverifikasi.

  Bukti                   `docs/bukti/` (jika        Simpan tangkapan layar
                          mengikuti struktur         hasil pencarian,
                          challenge)                 filter, hasil kosong,
                                                     dan bukti hasil change
                                                     request.
  --------------------------------------------------------------------------

## 4. Rencana perilaku fitur

### Pencarian

-   Pencarian memeriksa kolom teks yang relevan pada halaman terpilih,
    misalnya nama produk atau nama item laporan.
-   Pencocokan tidak membedakan huruf besar dan kecil.
-   Ketika kata kunci berubah, hasil pada daftar diperbarui.
-   Jika input pencarian kosong, pencarian tidak membatasi hasil; filter
    yang aktif tetap berlaku.

### Filter

-   Gunakan filter yang sesuai dengan kolom yang benar-benar ada di
    halaman/database. Kandidat: kategori produk atau rentang tanggal
    laporan.
-   Pencarian dan filter harus diterapkan bersama dengan logika **AND**:
    sebuah baris ditampilkan hanya jika memenuhi keduanya.
-   Sediakan opsi untuk menghapus filter/mengembalikan tampilan ke
    seluruh data yang relevan.

### Hasil kosong

-   Jika tidak ada baris yang memenuhi pencarian dan filter, tampilkan
    teks persis **"Data tidak ditemukan"**.
-   Jangan menampilkan pesan tersebut jika masih ada hasil yang cocok.

### Ekspor CSV

-   Ekspor data yang sama dengan yang sedang ditampilkan setelah
    pencarian dan filter aktif diterapkan.
-   Baris pertama berisi header/nama kolom yang jelas.
-   Nilai angka ditulis tanpa `Rp`, simbol mata uang, atau pemisah
    ribuan.
-   Field teks yang berisi koma, tanda kutip, atau baris baru harus
    di-escape sesuai format CSV.
-   Untuk mencegah formula spreadsheet dijalankan dari teks tak
    tepercaya, pertimbangkan mitigasi formula injection pada nilai teks;
    pastikan mitigasi tidak mengubah nilai numerik yang memang
    dimaksudkan sebagai angka.
-   Gunakan nama berkas yang mudah dikenali, misalnya
    `kuliko-produk.csv` atau `kuliko-laporan.csv`, sesuai halaman yang
    dipilih.
-   Jika ekspor dilakukan melalui endpoint PHP, pastikan respons hanya
    berisi CSV dan header HTTP unduhan ditetapkan dengan benar.

## 5. Kasus uji baru

  --------------------------------------------------------------------------
  ID                Kriteria          Langkah/input      Hasil yang
                                                         diharapkan
  ----------------- ----------------- ------------------ -------------------
  CR01              Pencarian cocok   Ketik kata yang    Hanya baris yang
                                      diketahui ada pada cocok tampil.
                                      kolom teks di      
                                      halaman terpilih   

  CR02              Pencarian tidak   Cari istilah yang  Hasil tetap
                    peka kapitalisasi sama dengan        ditemukan.
                                      variasi huruf      
                                      besar/kecil        

  CR03              Filter tunggal    Pilih satu nilai   Hanya baris yang
                                      filter yang        memenuhi filter
                                      tersedia pada data tampil.

  CR04              Pencarian +       Masukkan kata      Semua baris yang
                    filter            kunci dan aktifkan tampil memenuhi
                                      filter secara      kedua kondisi.
                                      bersamaan          

  CR05              Hasil kosong      Gunakan kata       Tampil pesan
                                      kunci/filter yang  **"Data tidak
                                      tidak memiliki     ditemukan"** dan
                                      kecocokan          tidak ada baris
                                                         hasil.

  CR06              Ekspor hasil      Terapkan           Satu file CSV
                    tersaring         pencarian/filter   terunduh dan hanya
                                      lalu klik **Unduh  berisi baris hasil
                                      CSV** sekali       yang sedang tampil.

  CR07              Header CSV        Buka CSV yang      Baris pertama
                                      diunduh            berisi nama kolom.

  CR08              Angka CSV         Ekspor data dengan Nilai ditulis tanpa
                                      nilai angka yang   simbol mata
                                      diketahui          uang/pemisah
                                                         ribuan, misalnya
                                                         `15000`.

  CR09              Karakter khusus   Ekspor nilai teks  Kolom tetap terbaca
                                      yang berisi koma,  dengan benar di
                                      tanda kutip, atau  aplikasi
                                      baris baru         spreadsheet.

  CR10              Keamanan teks CSV Ekspor nilai teks  Nilai teks tidak
                                      yang diawali       dieksekusi sebagai
                                      karakter yang      formula saat
                                      dapat ditafsirkan  dibuka; perilaku
                                      spreadsheet        mitigasi
                                      sebagai formula    didokumentasikan.

  CR11              Regresi           Jalankan seluruh   Seluruh kasus lama
                                      kasus uji yang     tetap lulus.
                                      sudah ada          
  --------------------------------------------------------------------------

Catatan: contoh kasus di atas merupakan rencana. Data uji, hasil aktual,
status lulus, dan bukti harus diisi setelah pengujian sungguhan
dilakukan.

## 6. Risiko dan cara menguranginya

  -----------------------------------------------------------------------
  Risiko                  Dampak                  Mitigasi
  ----------------------- ----------------------- -----------------------
  Kolom filter            Filter tidak bekerja    Periksa `kuliko.sql`
  diasumsikan ada padahal atau query gagal        dan query halaman
  tidak ada di database                           sebelum memilih filter.

  Query SQL dibangun      Risiko SQL injection    Gunakan prepared
  dengan menggabungkan                            statements untuk nilai
  input pengguna                                  pencarian/filter.

  CSV mengekspor semua    Isi file tidak sesuai   Gunakan sumber data dan
  data, bukan hasil aktif dengan yang dilihat     kondisi filter yang
                          pengguna                sama untuk daftar dan
                                                  ekspor.

  Format angka masih      Angka dapat dianggap    Ekspor nilai numerik
  seperti `Rp15.000`      teks di spreadsheet     mentah dan uji file
                                                  hasil unduhan.

  Teks berkoma/kutip      Kolom bergeser ketika   Terapkan
  merusak kolom CSV       dibuka                  escaping/quoting CSV
                                                  yang benar.

  Perubahan mengganggu    Fitur inti rusak        Jalankan semua kasus
  fungsi lama                                     uji lama dan kasus
                                                  baru.

  Perubahan dilakukan     Urutan kerja challenge  Commit dokumen analisis
  sebelum analisis        tidak terbukti          terlebih dahulu,
  dicatat                                         kemudian baru commit
                                                  perubahan kode.