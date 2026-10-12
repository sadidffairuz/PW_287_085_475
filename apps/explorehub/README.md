# ExploreHub — Platform Eksplorasi Wisata & Program Prioritas

ExploreHub adalah platform eksplorasi wisata Indonesia terpadu dengan satu identitas visual editorial/adventure, menggabungkan frontend modern (JavaScript API) dan backend Server-Side Rendering (PHP SSR).

## 🎨 Arah Visual
Semua halaman memakai satu palet utama: cream/paper (`#f4efe4`, `#fbf8f0`) + forest (`#173d32`) + terracotta/sand (`#d76b2d`) sebagai aksen.

---

## 📑 Halaman & Modul
- `public/index.html` — Landing page editorial & katalog petualangan live REST API (Modul 2).
- `public/program-prioritas.php` — Dashboard Program Prioritas Nasional & Sinergi Pariwisata (Modul 3 PHP SSR).
- `public/index.php` — Entry point PHP server-side di folder public.
- `index.php` — Root entry point yang mengarahkan ke dashboard PHP.
- `public/maps.html` — Peta eksplorasi interaktif berbasis Leaflet.
- `public/booking.html` — Halaman formulir reservasi dinamis & konfirmasi WhatsApp.
- `assets/data/destinations.json` — Dataset REST API petualangan Indonesia.

---

## 🐘 Implementasi Modul 3: PHP Prosedural & Server-Side Rendering (SSR)

### • Task 01: Create PHP Page
- **Lokasi File:** `public/program-prioritas.php` dan `public/index.php`.
- **Variabel Utama PHP yang Dideklarasikan:**
  - `$namaPresiden = "Prabowo Subianto";`
  - `$wakilPresiden = "Gibran Rakabuming Raka";`
  - `$periode = "2024 - 2029";`
  - `$statusProgram = "Aktif Berjalan";`
  - `$namaKabinet = "Kabinet Merah Putih";`
  - `$visiPemerintahan = "Bersama Indonesia Maju Menuju Indonesia Emas 2045";`
  - `$programPrioritas = [ ... ];`
- Variabel ditampilkan secara elegan pada profil header dan ringkasan metrik statistik.

### • Task 02: Process Data with PHP
- **Array Multidimensi:**
  Variabel `$programPrioritas` menyimpan kumpulan data program secara terstruktur (ID, nama, kategori, sektor, lokasi, alokasi anggaran, persentase progres, status, target waktu, deskripsi, gambar cover, dan daftar capaian).
- **Conditional Status & Badge (`renderStatusBadge($status)`):**
  Menggunakan struktur seleksi kondisional PHP (`switch/case`) untuk menentukan warna, ikon, dan styling status badge secara otomatis:
  - `Aktif Berjalan` (Hijau emerald dengan live dot)
  - `Sedang Berjalan` (Biru laut)
  - `Siap Diresmikan` (Amber keemasan)
  - `Selesai Tahap 1` (Hijau daun)
  - `Dalam Perencanaan` (Oranye terracotta)
- **Loop Penomoran:**
  Menggunakan perulangan `foreach ($programTampil as $item)` dengan penomoran berurut format dua digit (`sprintf("%02d", $nomorIndex++)`) sehingga menghasilkan `#01 PRIORITAS`, `#02 PRIORITAS`, dst.
- **Kalkulasi Agregat:**
  Menggunakan fungsi bawaan PHP seperti `count()`, `array_sum()`, `array_column()`, dan pemformatan mata uang rupiah (`formatRupiahSingkat()`).

### • Task 03: Build Dynamic Server-Side Content (SSR)
- **Server-Side Rendering (SSR):**
  Seluruh konten kartu program prioritas di-generate langsung dari server PHP sebelum dikirimkan ke browser client.
- **Keselarasan Struktur & Tema:**
  Melanjutkan desain tema editorial ExploreHub yang menyatu dengan bagian katalog destinasi dan peta petualangan.
- **Fitur Interaktif Server-Side:**
  - Filter kategori berbasis GET request (`?kategori=pariwisata`, `?kategori=pangan`, dll.).
  - Fitur pencarian kata kunci berbasis form GET (`?q=...`).
  - Bar progres visual dinamis (`style="width: <?= $item['progres']; ?>%;"`).
  - Integrasi tombol pemesanan dan sinergi langsung ke `booking.html`.
  - Panel inspeksi kode sumber PHP di bagian bawah halaman untuk kemudahan verifikasi oleh asisten lab / dosen penguji.

---

## ⚡ Implementasi Modul 2: JavaScript DOM & Fetch API
- **Task 01 (Connect to API):** `async/await fetch()` ke REST API endpoint dengan pengecekan `response.ok` dan `await response.json()`.
- **Task 02 (Display API Data):** Template literals & DOM dynamic grid kartu destinasi dengan array method (`.map()`, `.filter()`, `.find()`, `.forEach()`).
- **Task 03 (Handle API State):** Loading spinner feedback, error box dengan tombol **Coba Lagi**, offline fallback, dan tombol simulasi error.

---

## 🚀 Panduan Menjalankan

### Cara 1: Menggunakan PHP Built-in Server (Sangat Disarankan)
Buka terminal di folder `D:\KULIAH\PEMROGRAMAN WEB\ExploreHub_Sprint02_Editorial_UnifiedTheme` lalu jalankan:
```bash
php -S localhost:8000
```
Buka browser dan akses:
- **`http://localhost:8000/public/program-prioritas.php`** (Halaman Program Prioritas PHP)
- **`http://localhost:8000/public/index.html`** (Halaman Landing Page JS API)

### Cara 2: Menggunakan XAMPP / Laragon
1. Salin folder ke direktori `htdocs` (XAMPP) atau `www` (Laragon).
2. Nyalakan service Apache.
3. Buka browser pada `http://localhost/ExploreHub_Sprint02_Editorial_UnifiedTheme/public/program-prioritas.php`.
