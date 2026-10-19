# ExploreHub — Platform Eksplorasi Petualangan Indonesia

ExploreHub adalah platform eksplorasi petualangan dan ekowisata Indonesia dengan satu identitas visual editorial/adventure yang menggabungkan frontend modern (JavaScript API), backend Server-Side Rendering (PHP SSR), dan arsitektur Object-Oriented Programming (OOP PHP).

## 🎨 Arah Visual
Semua halaman memakai satu palet utama editorial: cream/paper (`#f4efe4`, `#fbf8f0`) + forest (`#173d32`) + terracotta/sand (`#d76b2d`) + lime (`#c9d85d`) sebagai aksen.

---

## 📑 Halaman & Modul
- `public/program-prioritas.php` — Dashboard Program Prioritas Petualangan ExploreHUB (Sprint 05 OOP PHP & SSR).
- `public/index.php` — Landing page editorial & katalog SSR dinamis (Week 5 PHP).
- `public/index.html` — Landing page editorial & katalog petualangan live REST API (Modul 2).
- `public/maps.html` — Peta eksplorasi interaktif berbasis Leaflet.
- `public/booking.php` / `public/booking.html` — Halaman formulir reservasi dinamis & konfirmasi WhatsApp.
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
  - `getBookingUrl()` ➜ menyusun link reservasi dinamis ke `booking.php` membawa query parameter.
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
  <?php endforeach; ?>
  ```
- **Sesuai Target Slide 7 sampai Slide 9:**
  Fokus penuh pada pemenuhan target pembelajaran Sprint 05: Class, Object, Property & Method, Constructor, Encapsulation, dan Dynamic Content Generation dengan Object.

---

## 🐘 Implementasi Modul 3 / Week 5: PHP Prosedural & Server-Side Rendering (SSR)
- **Task 01 (Create PHP Page):** Variabel PHP `$namaPlatform`, `$periodeImplementasi`, `$judulProgram`, `$subjudulProgram`, `$statusProgram`.
- **Task 02 (Process Data with PHP):** Pemrosesan JSON dataset, conditional badge, loop penomoran `foreach`.
- **Task 03 (Build Dynamic SSR Content):** Dynamic grid kartu destinasi hasil render server pada `index.php` dan pemrosesan form pada `booking.php`.

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
- **`http://localhost:8000/public/program-prioritas.php`** (Dashboard Program Prioritas PHP OOP)
- **`http://localhost:8000/public/index.php`** (Landing Page ExploreHub)

### Menggunakan XAMPP Apache Langsung
1. Buka **XAMPP Control Panel** dan klik **Start** pada Apache.
2. Akses di browser: **`http://localhost/ExploreHub/public/program-prioritas.php`**.
