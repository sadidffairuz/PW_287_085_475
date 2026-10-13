# ExploreHub — Week 5 PHP Procedural (Server-Side Rendering)

ExploreHub merupakan platform eksplorasi pengalaman wisata Indonesia. Implementasi Week 5 melanjutkan struktur dan gaya visual Week 4/Sprint 02, dengan PHP prosedural untuk membentuk HTML di server.

## Task 01 — Create PHP Page
- `public/index.php` menggunakan variabel PHP: `$namaPlatform`, `$periodeImplementasi`, `$judulKatalog`, `$subjudulKatalog`, dan `$statusKatalog`.
- `public/booking.php` menggunakan variabel PHP untuk data form dan status hasil validasi.

## Task 02 — Process Data with PHP
- Data dari `assets/data/destinations.json` dibaca dengan `file_get_contents()` dan `json_decode(..., true)` menjadi array multidimensi PHP.
- `array_slice()` menentukan enam program prioritas yang ditampilkan.
- Conditional `if` menentukan status katalog, kategori badge, serta status ketersediaan berdasarkan harga.
- `foreach` menghasilkan kartu dan nomor urut dinamis (`01`, `02`, dan seterusnya).
- Booking diproses dengan `$_SERVER['REQUEST_METHOD']`, `$_POST`, conditional validasi, serta `htmlspecialchars()` untuk menampilkan data dengan aman.

## Task 03 — Build Dynamic Server-Side Content
- Grid destinasi pada `index.php` dibuat dengan PHP `foreach`; HTML yang diterima browser sudah berisi kartu hasil render server.
- Landing page diperbarui dengan arahan visual cinematic lodge: palet gelap teal, aksen pasir, fotografi alam, galeri editorial, serta grid pengalaman dinamis. UI peta dan booking tetap tersedia sebagai halaman terpisah.
- Form booking di `booking.php` mengirim data menggunakan POST, menampilkan pesan validasi atau ringkasan pesanan hasil pemrosesan PHP.
- Prototype belum menyimpan booking ke database; tombol WhatsApp menggunakan nomor contoh yang harus diganti sebelum rilis.

## Cara menjalankan
Pastikan PHP CLI tersedia. Buka terminal di folder `apps/explorehub`, lalu jalankan:

```powershell
php -S localhost:8000 -t public
```

Buka `http://localhost:8000/index.php`. Untuk mencoba booking, pilih tombol Pesan pada kartu atau buka `http://localhost:8000/booking.php`.

> Jangan membuka file PHP dengan klik ganda atau Live Server biasa. PHP harus dijalankan melalui server PHP agar kode diproses di sisi server.
