# PW_287_085_475 — ExploreHub & BatuRafting

Repository Tugas Mata Kuliah **Pemrograman Web**  
Laboratorium Informatika Universitas Muhammadiyah Malang  
Kelompok: **287 — 085 — 475**

---

## 🧭 ExploreHub — Sprint 02 & Modul 3 (Branch: `ExploreHUB`)
Platform eksplorasi dan reservasi petualangan wisata Indonesia dengan desain editorial, peta interaktif, integrasi **Fetch API & Dynamic DOM Manipulation** (Modul 2), serta **PHP Prosedural & Server-Side Rendering (SSR)** (Modul 3).

### ✨ 1. Modul 3 (PHP Prosedural & Server-Side Rendering)
- **Task 01: Create PHP Page**
  - Menginisialisasi variabel PHP: `$namaPresiden` ("Prabowo Subianto"), `$wakilPresiden`, `$periode` ("2024 - 2029"), `$statusProgram` ("Aktif Berjalan"), `$namaKabinet`, `$visiPemerintahan`, dan `$programPrioritas`.
- **Task 02: Process Data with PHP**
  - **Array Multidimensi**: Array bersarang `$programPrioritas` menyimpan seluruh entitas program prioritas strategis (ID, nama, sektor, lokasi, anggaran, progres, status, target waktu, gambar, capaian).
  - **Conditional Status / Badge**: Fungsi `renderStatusBadge($status)` berbasis `switch/case` kondisional untuk render badge visual otomatis (*Aktif Berjalan*, *Sedang Berjalan*, *Siap Diresmikan*, *Selesai Tahap 1*).
  - **Loop Penomoran**: Perulangan `foreach` dengan kalkulasi penomoran format dua digit (`#01`, `#02`, dst.) menggunakan `sprintf("%02d", $index)`.
  - **Kalkulasi Agregat**: `count()`, `array_sum()`, `array_column()`, dan format rupiah dinamis.
- **Task 03: Build Dynamic Server-Side Content (SSR)**
  - Server-Side Rendering (SSR) dinamis kartu program prioritas melanjutkan struktur dan identitas visual editorial ExploreHub (cream/paper + forest + sand).
  - Filter kategori server-side (`?kategori=...`) dan pencarian query string (`?q=...`).
  - Bar progres visual dinamis dan panel kode inspeksi transparan.

### ✨ 2. Modul 2 (JavaScript DOM Manipulation & Fetch API)
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
│   └── explorehub/             # Aplikasi ExploreHub (Sprint 02 & Modul 3)
│       ├── assets/
│       │   ├── css/style.css   # Styling editorial theme, API catalog & SSR
│       │   ├── data/           # destinations.json (REST API dataset)
│       │   └── js/             # main.js (Modul 2 JS API) & map.js
│       ├── docs/               # design-direction.md
│       ├── public/             # index.html, program-prioritas.php, index.php, maps.html, booking.html
│       ├── index.php           # Entry point root PHP
│       └── README.md
├── 1.html                      # Sprint 01 landing page
├── 2.css                       # Sprint 01 stylesheet
└── README.md                   # Dokumentasi utama repositori
```

---

## 🚀 Panduan Menjalankan

### ExploreHub (PHP Modul 3 & JS API Modul 2)
1. **Mode PHP Server:**
   ```bash
   cd apps/explorehub
   php -S localhost:8000
   ```
   Akses `http://localhost:8000/public/program-prioritas.php` di browser.
2. **Mode Frontend Langsung:**
   Buka `apps/explorehub/public/index.html` langsung di browser atau via Live Server.

### BatuRafting
1. Masuk ke folder `apps/baturafting/public/`.
2. Buka `index.html` pada browser.
