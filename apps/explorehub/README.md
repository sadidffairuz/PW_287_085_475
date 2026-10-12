# ExploreHub — Platform Eksplorasi Petualangan Indonesia

ExploreHub adalah platform eksplorasi petualangan dan ekowisata Indonesia dengan satu identitas visual editorial/adventure yang menggabungkan frontend modern (JavaScript API) dan backend Server-Side Rendering (PHP SSR).

## 🎨 Arah Visual
Semua halaman memakai satu palet utama editorial: cream/paper (`#f4efe4`, `#fbf8f0`) + forest (`#173d32`) + terracotta/sand (`#d76b2d`) + lime (`#c9d85d`) sebagai aksen.

---

## 📑 Halaman & Modul
- `public/index.html` — Landing page editorial & katalog petualangan live REST API (Modul 2).
- `public/program-prioritas.php` — Dashboard Program Prioritas Petualangan ExploreHUB (Modul 3 PHP SSR).
- `public/index.php` — Entry point PHP server-side di folder public.
- `index.php` — Root entry point yang mengarahkan langsung ke dashboard PHP.
- `public/maps.html` — Peta eksplorasi interaktif berbasis Leaflet.
- `public/booking.html` — Halaman formulir reservasi dinamis & konfirmasi WhatsApp.
- `assets/data/destinations.json` — Dataset REST API petualangan Indonesia.

---

## 🐘 Implementasi Modul 3: PHP Prosedural & Server-Side Rendering (SSR)

### • Task 01: Create PHP Page (Variabel PHP Sesuai Tema ExploreHUB)
- **Lokasi File:** `public/program-prioritas.php` dan `public/index.php`.
- **Variabel Utama PHP yang Dideklarasikan:**
  ```php
  $namaPlatform      = "ExploreHub";
  $tagline           = "Jelajahi Indonesia, Satu Petualangan Setiap Perjalanan";
  $statusLayanan     = "Buka & Reservasi Aktif";
  $musimPetualangan  = "Musim Kemarau & Cuaca Tropis Optimal (2026)";
  $pusatOperasional  = "Kota Batu & Labuan Bajo, Indonesia";
  $kontakLayanan     = "+62 812-3456-7890 (WhatsApp Official)";
  $tanggalPembaruan  = date("d F Y");
  $programPrioritas  = [ ... ];
  ```
- Variabel ditampilkan pada hero section, kartu identitas ExploreHUB, serta ringkasan metrik statistik operasional.

### • Task 02: Process Data with PHP (Array Multidimensi, Conditional Badge & Loop Penomoran)
- **Array Multidimensi (`$programPrioritas`):**  
  Menyimpan daftar paket petualangan prioritas dengan struktur bersarang (ID, nama paket, kategori, lokasi, harga, rating, ulasan, durasi, tingkat kesulitan, status ketersediaan, kapasitas kuota harian, pemandu, gambar cover, deskripsi, dan array fasilitas).
- **Conditional Status & Badge (`renderStatusBadge($status)`):**  
  Menggunakan struktur kondisional `switch/case` PHP untuk merender badge visual otomatis berdasarkan ketersediaan slot:
  - `Tersedia` ➜ Badge hijau emerald (`.badge-tersedia`)
  - `Slot Terbatas` ➜ Badge amber keemasan (`.badge-terbatas`)
  - `Hampir Penuh` ➜ Badge merah terracotta (`.badge-penuh`)
  - `Musim Terbaik` ➜ Badge biru laut (`.badge-musim`)
  - `Promo Spesial` ➜ Badge ungu lavender (`.badge-promo`)
- **Loop Penomoran:**  
  Menggunakan perulangan `foreach ($programTampil as $item)` dengan format penomoran dua digit berurut:
  ```php
  $nomorUrut = sprintf("%02d", $nomorIndex++); // Output: #01, #02, #03, dst.
  ```
- **Kalkulasi Agregat:**  
  Menghitung total paket (`count()`), rentang harga termurah dan termahal (`min()`, `max()`), rata-rata biaya (`array_sum() / count()`), serta format mata uang rupiah (`formatRupiah()`).

### • Task 03: Build Dynamic Server-Side Content (SSR Dynamic Grid Cards)
- **Server-Side Rendering (SSR):** Seluruh kartu program prioritas di-generate langsung dari server PHP sebelum dikirim ke browser client.
- **Harmoni Tema Editorial ExploreHub:**  
  Melanjutkan desain tema editorial ExploreHub yang elegan, responsif, dan menyatu dengan alur reservasi.
- **Fitur SSR Interaktif:**
  - **Filter Kategori Server-Side (`?kategori=air`, `?kategori=alam`, `?kategori=adrenalin`, `?kategori=budaya`).**
  - **Pencarian Query Form GET (`?q=...`):** Menyaring nama aktivitas, kota, atau daerah secara instan di server.
  - **Direct Booking Integration:** Tombol *"Pesan Sekarang →"* otomatis mengoper nama aktivitas dan lokasi ke formulir `booking.html`.
  - **Panel Inspeksi Kode PHP:** Menampilkan nilai variabel dan pemrosesan array secara transparan di bagian bawah halaman untuk mempermudah evaluasi oleh dosen/asisten lab.

---

## ⚡ Implementasi Modul 2: JavaScript DOM & Fetch API
- **Task 01 (Connect to API):** `async/await fetch()` ke REST API endpoint dengan pengecekan `response.ok` dan parsing `await response.json()`.
- **Task 02 (Display API Data):** Template literals & DOM dynamic grid kartu destinasi dengan array method (`.map()`, `.filter()`, `.find()`, `.forEach()`).
- **Task 03 (Handle API State):** Loading spinner feedback, error box dengan tombol **Coba Lagi**, offline fallback, dan tombol simulasi error.

---

## 🚀 Panduan Menjalankan

### Menggunakan Terminal (PHP Built-in Server)
```powershell
cd "D:\KULIAH\PEMROGRAMAN WEB\ExploreHub_Sprint02_Editorial_UnifiedTheme"
C:\xampp\php\php.exe -S localhost:8000
```
Buka browser dan akses:
- **`http://localhost:8000/public/program-prioritas.php`** (Dashboard Program Prioritas PHP)
- **`http://localhost:8000/public/index.html`** (Landing Page ExploreHub)

### Menggunakan XAMPP Langsung
1. Buka **XAMPP Control Panel** dan klik **Start** pada Apache.
2. Akses di browser: **`http://localhost/ExploreHub/public/program-prioritas.php`**.
