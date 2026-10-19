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
- `classes/AdventureProgram.php` — Class Blueprint paket petualangan (Sprint 05 OOP PHP).
- `classes/ExploreHub.php` — Class Platform Manager & koleksi paket (Sprint 05 OOP PHP).

---

## 🧱 Implementasi Sprint 05: Object-Oriented Programming (OOP) PHP

### • Task 01: Create a Class (Blueprint Representasi Data)
- **Class `AdventureProgram` (`classes/AdventureProgram.php`):**
  Blueprint representasi data paket petualangan outdoor & ekowisata Indonesia.
- **Class `ExploreHub` (`classes/ExploreHub.php`):**
  Blueprint entitas platform yang mengelola metadata organisasi, periode, status, serta koleksi objek program petualangan (analogi Class `President` pada slide Pertemuan 6).

### • Task 02: Add Properties and Methods (Encapsulation, Constructor & Behavior Methods)
- **Encapsulation (Private Properties):**
  Seluruh properti dideklarasikan dengan access modifier `private` (`$id`, `$name`, `$category`, `$location`, `$price`, `$rating`, `$reviews`, `$duration`, `$difficulty`, `$status`, `$dailyQuota`, `$guide`, `$image`, `$description`, `$facilities`, `$programs`, dll.) agar data terlindungi.
- **Constructor Injection:**
  Metode `__construct()` untuk inisialisasi properti saat instansiasi objek dengan validasi tipe data (*type hinting*).
- **Public Getter & Presentation Methods:**
  - `getName()`, `getPrice()`, `getRating()`, dll.
  - `getFormattedPrice()` ➜ memformat harga angka menjadi rupiah (contoh: `Rp 275.000`).
  - `getStatusBadge()` ➜ menghasilkan HTML badge dinamis (*Tersedia*, *Slot Terbatas*, *Hampir Penuh*, *Musim Terbaik*, *Promo Spesial*).
  - `getBookingUrl()` ➜ menyusun link reservasi dinamis ke `booking.html` membawa query parameter.
  - `getProfile()` ➜ mengembalikan profil ringkas platform sesuai kriteria slide Pertemuan 6 (`$this->name . " — " . $this->period`).
  - `getPrograms()` ➜ mengembalikan koleksi objek program petualangan.
  - `getTotalPrograms()`, `getPriceRange()`, `getAveragePrice()`, `filterPrograms()`.

### • Task 03: Generate Dynamic Content with Object (SSR Grid Cards Menggunakan Objek)
- **Instansiasi Objek:**
  Instansiasi 8 objek `AdventureProgram` dan objek utama `$exploreHub` dengan metode `$exploreHub->addProgram(...)`.
- **Render Dynamic Server-Side Content (SSR) Berbasis Method Objek:**
  Hero section, badge operasional, statistik ringkasan, dan kartu grid di-generate murni melalui pemanggilan method objek:
  ```php
  <?php foreach ($programTampil as $prog): ?>
    <h3><?= htmlspecialchars($prog->getName()); ?></h3>
    <div class="status"><?= $prog->getStatusBadge(); ?></div>
    <strong><?= $prog->getFormattedPrice(); ?></strong>
    <a href="<?= htmlspecialchars($prog->getBookingUrl()); ?>">Pesan Sekarang →</a>
- **Sesuai Target Slide 7 sampai Slide 9:**
  Fokus penuh pada pemenuhan target pembelajaran Sprint 05: Class, Object, Property & Method, Constructor, Encapsulation, dan Dynamic Content Generation dengan Object.

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
