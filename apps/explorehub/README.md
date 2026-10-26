# ExploreHub — Platform Eksplorasi Petualangan Indonesia

ExploreHub adalah platform eksplorasi petualangan dan ekowisata Indonesia dengan arsitektur modern yang memisahkan tanggung jawab data, logika aplikasi, dan presentasi menggunakan pola **Model-View-Controller (MVC)**.

## 🎨 Arah Visual
Semua halaman memakai satu palet utama editorial: cream/paper (`#f4efe4`, `#fbf8f0`) + forest (`#173d32`) + terracotta/sand (`#d76b2d`) + lime (`#c9d85d`) sebagai aksen.

---

## 🏛️ Arsitektur MVC (Model-View-Controller)

```text
ExploreHub_Sprint02_Editorial_UnifiedTheme/
├── app/
│   ├── models/
│   │   ├── AdventureProgram.php     # [MODEL] Entitas data paket petualangan (Encapsulation, Getters, Status Badges)
│   │   └── ExploreHubModel.php      # [MODEL] Repository platform, filtering data, search query & aggregasi statistik
│   ├── controllers/
│   │   ├── BaseController.php       # [CONTROLLER] Controller dasar dengan view renderer (extract data) & json helper
│   │   └── ExploreHubController.php # [CONTROLLER] Controller utama menangani request, memanggil model & merender view
│   └── views/
│       ├── layouts/
│       │   ├── header.php           # [VIEW LAYOUT] Header HTML, styling editorial & navigasi
│       │   └── footer.php           # [VIEW LAYOUT] Footer & hak cipta
│       └── program/
│           ├── index.php            # [VIEW TEMPLATE] Dashboard utama: Hero, Profil, Statistik, Filter, & Dynamic Grid
│           └── card.php             # [VIEW COMPONENT] Komponen kartu petualangan modular
├── public/
│   ├── index.php                    # Front Controller / Landing Page
│   ├── program-prioritas.php        # Front Controller / Route utama MVC Program Prioritas
│   ├── booking.html                 # Halaman formulir booking
│   └── maps.html                    # Peta eksplorasi interaktif Leaflet
├── assets/                          # CSS, JS, data JSON
└── README.md
```

---

## 🚀 Implementasi: From OOP to MVC

### 1. Task 01: Design the MVC Structure
Memisahkan kode program secara modular ke dalam 3 lapisan arsitektur:
- **Model Layer (`app/models/`):**
  - `AdventureProgram.php`: Entity model untuk objek paket petualangan dengan atribut `private` (Encapsulation), Constructor `__construct()`, method format harga (`getFormattedPrice()`), status badge dinamis (`getStatusBadge()`), dan link booking (`getBookingUrl()`).
  - `ExploreHubModel.php`: Data repository dan logika bisnis. Mengelola koleksi paket petualangan, pencarian kata kunci (`getFilteredPrograms()`), filter kategori, serta perhitungan statistik agregat (total paket, rentang harga `getPriceRange()`, dan rata-rata harga `getAveragePrice()`).
- **Controller Layer (`app/controllers/`):**
  - `BaseController.php`: Menyediakan method `renderView($viewPath, $data)` yang meng-ekstrak variabel secara dinamis ke view template.
  - `ExploreHubController.php`: Controller utama yang menerima HTTP Request, berinteraksi dengan Model, dan mengirimkan data ke View.
- **View Layer (`app/views/`):**
  - `layouts/header.php` & `layouts/footer.php`: Reusable layout presentation.
  - `program/index.php` & `program/card.php`: Template tampilan murni tanpa logika bisnis (*business-logic free*).

---

### 2. Task 02: Build the Controller
Membangun Controller untuk mengatur alur aplikasi (*Application Flow*):
- **Menangkap Input Request:**
  Controller mengekstrak parameter query HTTP GET (`kategori` dan `q`).
- **Berinteraksi dengan Model:**
  Controller memanggil method pada `ExploreHubModel`:
  ```php
  $platformInfo   = $this->model->getPlatformInfo();
  $programTampil  = $this->model->getFilteredPrograms($filterKategori, $filterQuery);
  $totalPrograms  = $this->model->getTotalPrograms();
  $priceRange     = $this->model->getPriceRange();
  $averagePrice   = $this->model->getAveragePrice();
  ```
- **Menghubungkan Data ke View:**
  Controller meneruskan data hasil olahan ke View melalui method `renderView()`:
  ```php
  $this->renderView('program/index', [
      'platform'      => $platformInfo,
      'programTampil' => $programTampil,
      'totalPrograms' => $totalPrograms,
      'priceRange'    => $priceRange,
      'averagePrice'  => $averagePrice,
      ...
  ]);
  ```

---

### 3. Task 03: Connect Model, Controller & View
Menghubungkan ketiga komponen MVC secara utuh:
1. **Front Controller (`public/program-prioritas.php`):**
   Menerima request pengguna, memuat autoload class, dan mengeksekusi `(new ExploreHubController())->index()`.
2. **Controller ⇄ Model:**
   Controller meminta data dari `ExploreHubModel`, yang mengembalikan array objek `AdventureProgram` yang telah difilter.
3. **Controller ⇄ View:**
   Controller mengirimkan data ke `app/views/program/index.php` melalui array asosiatif.
4. **View Rendering:**
   View mengekstrak variabel dan merender komponen HTML (hero, stats, filter bar, dynamic card grid) murni melalui template view:
   ```php
   <?php foreach ($programTampil as $prog): ?>
       <?php require __DIR__ . '/card.php'; ?>
   <?php endforeach; ?>
   ```

---

## 💻 Panduan Menjalankan

### Menggunakan Terminal (PHP Built-in Server)
```powershell
cd "D:\KULIAH\PEMROGRAMAN WEB\ExploreHub_Sprint02_Editorial_UnifiedTheme"
C:\xampp\php\php.exe -S localhost:8000
```
Buka browser:
- **`http://localhost:8000/public/program-prioritas.php`** (Dashboard MVC ExploreHUB)
- **`http://localhost:8000/public/index.php`** (Landing Page ExploreHUB)

### Menggunakan Apache XAMPP
1. Buka **XAMPP Control Panel** dan klik **Start** pada Apache.
2. Akses di browser: **`http://localhost/ExploreHub/public/program-prioritas.php`**.
