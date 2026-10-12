# ExploreHub — Sprint 02 Prototype

ExploreHub adalah platform eksplorasi wisata Indonesia dengan satu identitas visual editorial/adventure.

## 🎨 Arah Visual
Semua halaman memakai satu palet utama: cream/paper + forest + terracotta sebagai aksen.
Referensi visual digunakan untuk **komposisi, hierarki, framing foto, navigasi, dan cara menampilkan fitur**.

## 📑 Halaman
- `public/index.html` — landing page editorial & katalog petualangan live REST API.
- `public/maps.html` — halaman peta dengan panel informasi + area Leaflet map interaktif.
- `public/booking.html` — halaman reservasi dengan form dinamis & redirect WhatsApp.
- `assets/data/destinations.json` — dataset REST API untuk petualangan Indonesia.

## 🚀 Fitur Baru Sprint 02 (Modul 2 - JavaScript & API Integration)

### • Task 01: Connect to API (Fetch API & Parsing JSON)
- Menggunakan fungsi asynchronous `async/await` di `assets/js/main.js` (`fetchDestinationData()`).
- Melakukan HTTP request dengan method GET ke REST API endpoint.
- Validasi manual `response.ok` sesuai panduan Modul 2 Halaman 31-32 untuk menangkap error kode status HTTP (404, 500, dll.).
- Parsing stream data secara asynchronous menggunakan `await response.json()`.
- Error handling dengan blok `try...catch` dan pencatatan error di konsol.

### • Task 02: Display API Data (DOM Manipulation Dinamis)
- Menggunakan **Template Literal** (`` `...${...}...` ``) untuk merender kartu-kartu petualangan secara dinamis ke dalam grid container DOM (`#destinationGrid`).
- Menggunakan **Array Methods ES6+**:
  - `.filter()`: Menyaring petualangan berdasarkan kata kunci pencarian real-time dan kategori terpilih (Air, Alam, Adrenalin, Budaya).
  - `.map()`: Mentransformasikan array objek JSON ke dalam elemen kartu HTML.
  - `.find()`: Menemukan 1 objek destinasi spesifik berdasarkan ID saat tombol *Detail* diklik untuk membuka modal popup.
  - `.forEach()`: Memasang event listener ke seluruh elemen filter, tombol detail kartu, dan tombol aksi.
- Informasi lengkap kartu: foto beresolusi tinggi, badge kategori, badge rating bintang, lokasi & rute, deskripsi, chip durasi & kesulitan, harga dengan format mata uang rupiah (`Intl.NumberFormat`), tombol modal detail, dan tautan langsung ke halaman booking dengan query parameter otomatis.

### • Task 03: Handle API State (Loading Spinner, Error Handling & Tombol Coba Lagi)
- **Loading State**: Menampilkan animasi spinner berputar (`.spinner-editorial`) dan teks informatif saat proses pengambilan data dari API sedang berlangsung.
- **Success State**: Menampilkan grid kartu petualangan, status badge *API Live Connected*, dan ringkasan jumlah petualangan yang berhasil dimuat.
- **Error State**: Menampilkan notifikasi error box elegan jika terjadi kegagalan jaringan atau endpoint bermasalah, dilengkapi pesan error dinamis.
- **Tombol Coba Lagi (Retry Button)**: Tombol `#apiRetryBtn` yang memicu pemanggilan ulang `fetchDestinationData()` secara reaktif untuk memulihkan koneksi data.
- **Data Cadangan (Offline Fallback)**: Tombol cadangan data lokal `#apiFallbackBtn` untuk menjamin aplikasi 100% aman dan tetap dapat didemokan meskipun koneksi internet lab/kampus terputus.
- **Tombol Simulasi Error**: Tombol `#simulateErrorBtn` untuk memudahkan demonstrasi pengujian state error dan tombol Coba Lagi di hadapan asisten lab/dosen.

---

## 💻 Panduan Menjalankan
1. Buka folder `public/`.
2. Buka `index.html` langsung di browser atau jalankan dengan ekstensi **Live Server** di VS Code.
3. Kunjungi bagian **Live API** pada menu navigasi untuk melihat implementasi Task 01, Task 02, dan Task 03.
