# PW_287_085_475 — ExploreHub & BatuRafting

Repository Tugas Mata Kuliah **Pemrograman Web**  
Laboratorium Informatika Universitas Muhammadiyah Malang  
Kelompok: **287 — 085 — 475**

---

## 🧭 ExploreHub — Sprint 02 (Branch: `ExploreHUB`)
Platform eksplorasi dan reservasi petualangan wisata Indonesia dengan desain editorial, peta interaktif, serta integrasi **Fetch API & Dynamic DOM Manipulation** sesuai Modul 2.

### ✨ Implementasi Sprint 02 Modul 2 ExploreHub:
1. **Task 01: Connect to API (Fetch API & Parsing JSON)**
   - Mengambil data destinasi petualangan secara asynchronous (`async/await`) menggunakan `fetch()`.
   - Melakukan pengecekan manual `response.ok` sesuai ketentuan Modul 2 Bab 9.3 untuk menangkap status HTTP server.
   - Parsing response stream menjadi objek JavaScript menggunakan `await response.json()`.
   - Menggunakan error handling `try...catch` yang kuat.
2. **Task 02: Display API Data (DOM Manipulation Dinamis)**
   - Merender kartu petualangan dinamis ke interface ExploreHub menggunakan **Template Literals** (`` `...${...}...` ``).
   - Menggunakan array methods ES6+: `.map()`, `.filter()`, `.find()`, dan `.forEach()`.
   - Menampilkan detail informasi lengkap: gambar destinasi, badge kategori (Air, Alam, Adrenalin, Budaya), rating bintang & jumlah ulasan, kota & provinsi, deskripsi singkat, chip durasi & kesulitan, harga format rupiah (`Intl.NumberFormat`), dan tautan pemesanan ke `booking.html`.
   - Modal popup interaktif untuk melihat fasilitas lengkap dan detail aktivitas saat tombol *Detail* diklik.
   - Fitur pencarian real-time saat pengguna mengetik (event `input`) dan filter kategori (event `click`).
3. **Task 03: Handle API State (Loading Spinner, Success Data, Error Handling & Tombol Coba Lagi)**
   - **Loading State**: Feedback visual berupa spinner berputar elegan (`.spinner-editorial`) saat data sedang diambil dari API.
   - **Success State**: Menampilkan grid kartu petualangan dan badge status *API Live Terhubung* secara real-time.
   - **Error Handling & Tombol Coba Lagi**: Menampilkan pesan error elegan jika koneksi gagal, dilengkapi tombol **↻ Coba Lagi** (`#apiRetryBtn`) untuk mengambil ulang data serta tombol cadangan offline (`#apiFallbackBtn`).
   - **Tombol Simulasi Error**: Memudahkan asisten lab atau penguji menguji responsivitas penanganan error dan tombol Coba Lagi secara langsung.

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
│   └── explorehub/             # Aplikasi ExploreHub (Sprint 02)
│       ├── assets/
│       │   ├── css/style.css   # Styling editorial theme & API catalog
│       │   ├── data/           # destinations.json (REST API dataset)
│       │   └── js/             # main.js (Task 01, 02, 03) & map.js
│       ├── docs/               # design-direction.md
│       ├── public/             # index.html, maps.html, booking.html
│       └── README.md
├── 1.html                      # Sprint 01 landing page
├── 2.css                       # Sprint 01 stylesheet
└── README.md                   # Dokumentasi utama repositori
```

---

## 🚀 Panduan Menjalankan

### ExploreHub
1. Masuk ke folder `apps/explorehub/public/`.
2. Buka `index.html` langsung di browser atau jalankan dengan ekstensi **Live Server**.
3. Navigasikan ke menu **Live API** untuk melihat implementasi Task 01, 02, dan 03.

### BatuRafting
1. Masuk ke folder `apps/baturafting/public/`.
2. Buka `index.html` pada browser.
