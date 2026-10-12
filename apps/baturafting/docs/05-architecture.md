# Arsitektur Aplikasi — BatuRafting

## 1. Arsitektur Frontend (Sprint 02)
- **Struktur Halaman**:
  - `public/`: Antarmuka pengunjung (katalog layanan, destinasi wisata, simulasi booking, galeri, kontak)
  - `admin/`: Antarmuka pengelola (monitoring reservasi, jadwal, paket, laporan)
  - `auth/`: Antarmuka otentikasi pengguna
- **Styling Layer**:
  - **Tailwind CSS v4** (`assets/css/input.css` & `assets/css/output.css`)
  - Standalone custom rules (`assets/css/style.css`)
- **Interaction Layer**:
  - Vanilla JavaScript DOM Manipulation & Event Handling (`assets/js/main.js`)
