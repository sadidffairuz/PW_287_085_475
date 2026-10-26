# PW_287_085_475 — ExploreHub & BatuRafting

Repository Tugas Mata Kuliah **Pemrograman Web**  
Laboratorium Informatika Universitas Muhammadiyah Malang  
Kelompok: **287 — 085 — 475**

---

## 🧭 ExploreHub — Sprint 02, Modul 3, OOP & MVC Architecture (Branch: `ExploreHUB` & `main`)
Platform eksplorasi dan reservasi petualangan wisata Indonesia dengan desain editorial, peta interaktif, integrasi **Fetch API & Dynamic DOM Manipulation** (Modul 2), **PHP SSR** (Modul 3), **Object-Oriented Programming (OOP PHP)** (Sprint 05), serta arsitektur **Model-View-Controller (MVC)**.

### 🏛️ 1. From OOP to MVC (Model-View-Controller — Tema ExploreHUB)
- **Task 01: Design the MVC Structure**
  - **Model Layer (`apps/explorehub/app/models/`):**
    - `AdventureProgram.php`: Entity model untuk objek paket petualangan dengan private properties (Encapsulation), constructor, getters, format rupiah, dan status badge dinamis.
    - `ExploreHubModel.php`: Data repository dan logika bisnis pengelola koleksi paket, pencarian, penyaringan kategori, dan kalkulasi agregat.
  - **Controller Layer (`apps/explorehub/app/controllers/`):**
    - `BaseController.php`: Base controller dengan template view renderer (`extract($data)`) dan json response helper.
    - `ExploreHubController.php`: Controller utama pengatur alur request, interaksi model, dan pemanggilan view template.
  - **View Layer (`apps/explorehub/app/views/`):**
    - `layouts/header.php` & `layouts/footer.php`: Reusable presentation layouts.
    - `program/index.php` & `program/card.php`: Presentation views bebas logika bisnis.
- **Task 02: Build the Controller**
  - Mengambil parameter HTTP GET (`kategori` dan `q`).
  - Berinteraksi dengan `ExploreHubModel` untuk mengambil filtered data dan aggregasi statistik.
  - Mengirimkan (passing) data terstruktur ke view melalui `$this->renderView('program/index', $data)`.
- **Task 03: Connect Model, Controller & View**
  - Front Controller `public/program-prioritas.php` menerima request dan memanggil `(new ExploreHubController())->index()`.
  - Controller menghubungkan data dari Model ke View secara rapi dan modular.

### 🧱 2. Sprint 05: Object-Oriented Programming (OOP PHP — Tema ExploreHUB)
- **Task 01: Create a Class (Blueprint Representasi Data)**
  - Class `AdventureProgram` (`apps/explorehub/classes/AdventureProgram.php`): Blueprint entitas paket petualangan.
  - Class `ExploreHub` (`apps/explorehub/classes/ExploreHub.php`): Blueprint platform manager pengelola profil & koleksi paket petualangan (analogi Class `President` pada slide Pertemuan 6).
- **Task 02: Add Properties and Methods (Encapsulation, Constructor & Getters)**
  - **Encapsulation**: Properti berakses `private` (`$id`, `$name`, `$category`, `$location`, `$price`, `$rating`, `$status`, `$programs`, dll.) terlindungi dari manipulasi langsung.
  - **Constructor**: `__construct()` dengan type hinting untuk instansiasi objek terstruktur.
  - **Public Methods**: `getName()`, `getPrice()`, `getFormattedPrice()`, `getStatusBadge()`, `getBookingUrl()`, `getProfile()`, `getPrograms()`, `filterPrograms()`, `getTotalPrograms()`, `getPriceRange()`, `getAveragePrice()`.
- **Task 03: Generate Dynamic Content with Object (SSR Grid Cards via Object)**
  - Instansiasi 8 objek `AdventureProgram` dan objek platform `$exploreHub`.
  - Implementasi penuh memenuhi kriteria target pembelajaran Slide 7 sampai Slide 9 (Class, Properties, Methods, Constructor, Encapsulation, Dynamic SSR Cards).

### ✨ 3. Modul 3 (PHP Prosedural & Server-Side Rendering — Tema ExploreHUB)
- **Task 01: Create PHP Page (Variabel PHP ExploreHUB)**
  - Menginisialisasi variabel PHP yang relevan dengan ekosistem ExploreHUB: `$namaPlatform` ("ExploreHub"), `$tagline`, `$statusLayanan` ("Buka & Reservasi Aktif"), `$musimPetualangan`, `$pusatOperasional`, `$kontakLayanan`, dan `$programPrioritas`.
- **Task 02: Process Data with PHP**
  - **Array Multidimensi**: Array bersarang `$programPrioritas` menyimpan entitas paket petualangan alam & outdoor ExploreHUB (Rafting Brantas, Bromo Trekking, Offroad Merapi, Diving Menjangan, Camping Ranu Kumbolo, Paralayang Batu, Komodo Snorkeling, Wae Rebo).
  - **Conditional Status / Badge**: Fungsi `renderStatusBadge($status)` berbasis `switch/case` untuk render badge ketersediaan slot (*Tersedia*, *Slot Terbatas*, *Hampir Penuh*, *Musim Terbaik*, *Promo Spesial*).
  - **Loop Penomoran**: Perulangan `foreach` dengan penomoran berurut format dua digit (`#01`, `#02`, dst.) menggunakan `sprintf("%02d", $index)`.
  - **Kalkulasi Agregat**: `count()`, `min()`, `max()`, `array_sum()`, dan pemformatan mata uang rupiah.
- **Task 03: Build Dynamic Server-Side Content (SSR)**
  - Server-Side Rendering (SSR) dinamis kartu program petualangan prioritas melanjutkan struktur dan identitas visual editorial ExploreHub (cream/paper + forest + terracotta/sand).
  - Filter kategori server-side (`?kategori=air`, `?kategori=alam`, `?kategori=adrenalin`, `?kategori=budaya`) dan pencarian query string (`?q=...`).
  - Integrasi pemesanan langsung ke `booking.html` dan panel inspeksi variabel kode sumber PHP.

### ✨ 4. Modul 2 (JavaScript DOM Manipulation & Fetch API)
- **Task 01: Connect to API**
  - Mengambil data via `async/await fetch()` dengan validasi manual `response.ok` dan `await response.json()`.
- **Task 02: Display API Data**
  - Render dinamis kartu petualangan DOM dengan template literals dan array methods (`.map()`, `.filter()`, `.find()`, `.forEach()`).
- **Task 03: Handle API State**
  - Loading spinner feedback, success data counter, error handling dengan tombol **↻ Coba Lagi** (`#apiRetryBtn`), offline fallback, dan tombol simulasi error.

---

## 🌊 BatuRafting — Sprint 02 (Tailwind CSS & JavaScript DOM)
Website prototype penyedia aktivitas wisata rafting, outbound, dan paintball di Kota Batu.

### ✨ Fitur BatuRafting:
1. **HTML5 Semantic & Layout Responsif**
2. **Tailwind CSS v4 Integration** (`input.css` -> `output.css`)
3. **JavaScript DOM**: Mobile navigation toggle, form kalkulasi booking paket, accordion fasilitas.
4. **Dokumentasi Lengkap**: Charter, requirements, testing, UI/UX, dll.

---

## 📁 Struktur Repositori

```text
PW_287_085_475/
├── apps/
│   ├── baturafting/            # Aplikasi BatuRafting
│   │   ├── admin/              # Halaman dashboard & manajemen admin
│   │   ├── assets/             # CSS & JS BatuRafting
│   │   ├── auth/               # Halaman login, register, forgot-password
│   │   ├── docs/               # Dokumentasi lengkap BatuRafting
│   │   ├── public/             # Halaman publik (index, booking, service, dll.)
│   │   └── package.json
│   └── explorehub/             # Aplikasi ExploreHub (Sprint 02, Modul 3, OOP & MVC)
│       ├── app/                # Lapisan MVC (Model-View-Controller)
│       │   ├── models/         # AdventureProgram.php & ExploreHubModel.php
│       │   ├── controllers/    # BaseController.php & ExploreHubController.php
│       │   └── views/          # layouts/ (header, footer) & program/ (index, card)
│       ├── assets/
│       │   ├── css/style.css   # Styling editorial theme, API catalog & SSR
│       │   ├── data/           # destinations.json (REST API dataset)
│       │   └── js/             # main.js (Modul 2 JS API) & map.js
│       ├── classes/            # Classes OOP (Sprint 05)
│       ├── docs/               # design-direction.md
│       ├── public/             # program-prioritas.php (Front Controller MVC), index.php, maps.html, booking.html
│       ├── index.php           # Entry point root PHP
│       └── README.md
├── 1.html                      # Sprint 01 landing page
├── 2.css                       # Sprint 01 stylesheet
└── README.md                   # Dokumentasi utama repositori
```

---

## 🚀 Panduan Menjalankan

### ExploreHub (MVC, OOP & REST API)
1. **Mode PHP Server:**
   ```powershell
   cd apps/explorehub
   C:\xampp\php\php.exe -S localhost:8000
   ```
   Akses `http://localhost:8000/public/program-prioritas.php` di browser.
2. **Mode Frontend Langsung:**
   Buka `apps/explorehub/public/index.html` langsung di browser atau via Live Server.

### BatuRafting
1. Masuk ke folder `apps/baturafting/public/`.
2. Buka `index.html` pada browser.
