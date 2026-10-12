<?php
/**
 * ==============================================================================
 * ExploreHub — Platform Eksplorasi Petualangan & Wisata Alam Indonesia
 * Modul 3: PHP Prosedural, Pemrosesan Data & Server-Side Rendering (SSR)
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * 
 * PEMENUHAN TUGAS:
 * • Task 01: Create PHP page
 *   Variabel PHP sesuai tema ExploreHUB:
 *   - $namaPlatform, $tagline, $statusLayanan, $musimPetualangan, $pusatOperasional, $programPrioritas
 * 
 * • Task 02: Process Data with PHP
 *   - Array Multidimensi ($programPrioritas berisi data paket petualangan bersarang)
 *   - Conditional Status / Badge (switch/case penentu warna & label ketersediaan slot)
 *   - Loop Penomoran ($index + 1 dengan format berurut #01, #02, #03...)
 * 
 * • Task 03: Build Dynamic Server-Side Content
 *   - Server-Side Rendering (SSR) dynamic grid cards Program Prioritas ExploreHUB
 *   - Melanjutkan struktur tema editorial ExploreHub (cream/paper + forest + terracotta/sand)
 *   - Filter kategori server-side (?kategori=...), search form GET (?q=...), integrasi booking
 * ==============================================================================
 */

// --------------------------------------------------------------------------
// TASK 01: INISIALISASI VARIABEL PHP (SESUAI TEMA EXPLOREHUB)
// --------------------------------------------------------------------------
$namaPlatform      = "ExploreHub";
$tagline           = "Jelajahi Indonesia, Satu Petualangan Setiap Perjalanan";
$statusLayanan     = "Buka & Reservasi Aktif";
$musimPetualangan  = "Musim Kemarau & Cuaca Tropis Optimal (2026)";
$pusatOperasional  = "Kota Batu & Labuan Bajo, Indonesia";
$kontakLayanan     = "+62 812-3456-7890 (WhatsApp Official)";
$tanggalPembaruan  = date("d F Y");

// --------------------------------------------------------------------------
// TASK 02: ARRAY MULTIDIMENSI PROGRAM PETUALANGAN PRIORITAS
// --------------------------------------------------------------------------
$programPrioritas = [
    [
        "id"             => "EXP-01",
        "nama"           => "Rafting Sungai Brantas Extreme",
        "kategori"       => "air",
        "kategori_label" => "Air & Sungai",
        "lokasi"         => "Kota Batu, Jawa Timur",
        "region"         => "Jawa Timur",
        "harga"          => 125000,
        "rating"         => 4.9,
        "ulasan"         => 184,
        "durasi"         => "2.5 Jam",
        "kesulitan"      => "Sedang - Menantang",
        "status"         => "Tersedia",
        "kuota_harian"   => "40 Peserta / Hari",
        "pemandu"        => "Instruktur Berlisensi Internasional",
        "gambar"         => "https://images.unsplash.com/photo-1530866495561-507c1c9b4b4f?auto=format&fit=crop&w=900&q=80",
        "deskripsi"      => "Taklukkan jeram berbatu Sungai Brantas dengan pemandangan tebing alam dan perkebunan apel Kota Batu. Paket lengkap peralatan standar internasional dan makan siang prasmanan.",
        "fasilitas"      => ["Peralatan Standar Internasional", "Rescue Team & Guide", "Makan Siang Prasmanan", "Dokumentasi Foto", "Asuransi"]
    ],
    [
        "id"             => "EXP-02",
        "nama"           => "Sunrise Trekking & Lautan Pasir Bromo",
        "kategori"       => "alam",
        "kategori_label" => "Gunung & Alam",
        "lokasi"         => "Taman Nasional Bromo Tengger Semeru",
        "region"         => "Jawa Timur",
        "harga"          => 275000,
        "rating"         => 4.95,
        "ulasan"         => 320,
        "durasi"         => "1 Hari Penuh",
        "kesulitan"      => "Mudah - Sedang",
        "status"         => "Hampir Penuh",
        "kuota_harian"   => "30 Peserta / Hari",
        "pemandu"        => "Ranger Suku Tengger",
        "gambar"         => "https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?auto=format&fit=crop&w=900&q=80",
        "deskripsi"      => "Menyaksikan golden sunrise legendaris di Penanjakan 1, dilanjutkan petualangan melintasi Lautan Pasir Berbisik dan kawah aktif Bromo dengan Jeep 4x4 Hardtop.",
        "fasilitas"      => ["Jeep 4x4 Hardtop", "Tiket Masuk TNBTS", "Pemandu Lokal Tengger", "Kopi Hangat Puncak", "Masker Debu"]
    ],
    [
        "id"             => "EXP-03",
        "nama"           => "Lava Tour Jeep Offroad Merapi",
        "kategori"       => "adrenalin",
        "kategori_label" => "Adrenalin & Adventure",
        "lokasi"         => "Kaliurang, Sleman, DI Yogyakarta",
        "region"         => "Yogyakarta",
        "harga"          => 450000,
        "rating"         => 4.88,
        "ulasan"         => 240,
        "durasi"         => "2 Jam Manuver",
        "kesulitan"      => "Menantang",
        "status"         => "Tersedia",
        "kuota_harian"   => "25 Jeep / Hari",
        "pemandu"        => "Driver Offroad Handal",
        "gambar"         => "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80",
        "deskripsi"      => "Menerobos trek berbatu bekas aliran lahar erupsi Merapi, manuver air basah di Sungai Kuning, serta singgah di Bunker Kaliadem dan Museum Sisa Hartaku.",
        "fasilitas"      => ["1 Unit Jeep 4x4 (4 Seat)", "Driver Berpengalaman", "Helm Pengaman", "Tiket Wisata", "Jas Hujan"]
    ],
    [
        "id"             => "EXP-04",
        "nama"           => "Scuba Diving & Coral Safari Menjangan",
        "kategori"       => "air",
        "kategori_label" => "Air & Laut",
        "lokasi"         => "Taman Nasional Bali Barat, Bali",
        "region"         => "Bali",
        "harga"          => 550000,
        "rating"         => 4.92,
        "ulasan"         => 160,
        "durasi"         => "4 Jam Eksplorasi",
        "kesulitan"      => "Semua Tingkatan",
        "status"         => "Slot Terbatas",
        "kuota_harian"   => "15 Diver / Hari",
        "pemandu"        => "Dive Master PADI Bersertifikat",
        "gambar"         => "https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=900&q=80",
        "deskripsi"      => "Penyelaman terumbu karang vertikal spektakuler di Pulau Menjangan dengan visibilitas jernih hingga 30 meter dan keberagaman biota laut eksotis nusantara.",
        "fasilitas"      => ["Speedboat Transfer", "Set Alat Selam Lengkap", "Dive Master PADI", "Makan Siang Kotak", "Tiket Konservasi"]
    ],
    [
        "id"             => "EXP-05",
        "nama"           => "Camping & Milky Way Hunting Ranu Kumbolo",
        "kategori"       => "alam",
        "kategori_label" => "Gunung & Alam",
        "lokasi"         => "Lereng Gunung Semeru, Lumajang",
        "region"         => "Jawa Timur",
        "harga"          => 320000,
        "rating"         => 4.96,
        "ulasan"         => 210,
        "durasi"         => "2 Hari 1 Malam",
        "kesulitan"      => "Sedang",
        "status"         => "Musim Terbaik",
        "kuota_harian"   => "20 Tenda / Malam",
        "pemandu"        => "Guide & Porter Gunung",
        "gambar"         => "https://images.unsplash.com/photo-1475483768296-6163e08872a1?auto=format&fit=crop&w=900&q=80",
        "deskripsi"      => "Bermalam di tepi danau kawah alami Ranu Kumbolo pada ketinggian 2.400 mdpl. Saksikan jutaan bintang Bima Sakti dan uap kabut fajar nan magis.",
        "fasilitas"      => ["Tenda Dome Kapasitas 4", "Sleeping Bag & Matras", "Porter Tenda", "Makan 3 Kali", "Simaksi & Asuransi"]
    ],
    [
        "id"             => "EXP-06",
        "nama"           => "Tandem Paragliding Gunung Banyak",
        "kategori"       => "adrenalin",
        "kategori_label" => "Adrenalin & Udara",
        "lokasi"         => "Gunung Banyak, Songgokerto, Kota Batu",
        "region"         => "Jawa Timur",
        "harga"          => 400000,
        "rating"         => 4.87,
        "ulasan"         => 145,
        "durasi"         => "20 Menit Terbang",
        "kesulitan"      => "Pemula Ramah",
        "status"         => "Tersedia",
        "kuota_harian"   => "18 Penerbangan / Hari",
        "pemandu"        => "Pilot Paralayang Berlisensi FASI",
        "gambar"         => "https://images.unsplash.com/photo-1508873696983-2df5293cb32f?auto=format&fit=crop&w=900&q=80",
        "deskripsi"      => "Terbang tandem bebas di udara terbuka menikmati pemandangan alam perbukitan dan lanskap kota Batu dari ketinggian 1.315 mdpl bersama pilot berlisensi.",
        "fasilitas"      => ["Pilot Berlisensi FASI", "Harness & Helm", "Video Dokumentasi 4K", "Shuttle Mobil Landasan"]
    ],
    [
        "id"             => "EXP-07",
        "nama"           => "Snorkeling Komodo & Manta Point Safari",
        "kategori"       => "air",
        "kategori_label" => "Air & Laut",
        "lokasi"         => "Taman Nasional Komodo, Labuan Bajo",
        "region"         => "NTT",
        "harga"          => 850000,
        "rating"         => 4.98,
        "ulasan"         => 410,
        "durasi"         => "1 Hari Penuh",
        "kesulitan"      => "Mudah",
        "status"         => "Promo Spesial",
        "kuota_harian"   => "20 Peserta / Trip",
        "pemandu"        => "Ranger Guide TN Komodo",
        "gambar"         => "https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8?auto=format&fit=crop&w=900&q=80",
        "deskripsi"      => "Berenang bersama pari Manta raksasa di Manta Point, trekking bukit Pulau Padar tiga warna, dan menyaksikan satwa endemik Komodo di habitat aslinya.",
        "fasilitas"      => ["Speedboat VIP AC", "Peralatan Snorkeling", "Ranger Guide TN Komodo", "Makan Siang & Buah", "Dokumentasi Drone"]
    ],
    [
        "id"             => "EXP-08",
        "nama"           => "Eksplorasi Budaya & Rumah Adat Wae Rebo",
        "kategori"       => "budaya",
        "kategori_label" => "Budaya & Tradisi",
        "lokasi"         => "Desa Tradisional Wae Rebo, Manggarai",
        "region"         => "NTT",
        "harga"          => 600000,
        "rating"         => 4.93,
        "ulasan"         => 130,
        "durasi"         => "2 Hari 1 Malam",
        "kesulitan"      => "Sedang",
        "status"         => "Slot Terbatas",
        "kuota_harian"   => "12 Tamu / Malam",
        "pemandu"        => "Pemandu Adat Wae Rebo",
        "gambar"         => "https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=80",
        "deskripsi"      => "Eksplorasi desa tradisional warisan UNESCO di atas awan berarsitektur ikonik Mbaru Niang. Nikmati kopi khas Manggarai dan upacara adat penerimaan Waelu.",
        "fasilitas"      => ["Inap di Mbaru Niang", "Upacara Adat Waelu", "Makan Tradisional Khas", "Pemandu Lokal Wae Rebo"]
    ]
];

// --------------------------------------------------------------------------
// TASK 02: CONDITIONAL STATUS / BADGE HELPER DENGAN SWITCH / CASE
// --------------------------------------------------------------------------
function renderStatusBadge($status) {
    $s = strtolower(trim($status));
    switch ($s) {
        case 'tersedia':
            return '<span class="php-status-badge badge-tersedia"><span class="badge-dot"></span> Tersedia</span>';
        case 'slot terbatas':
            return '<span class="php-status-badge badge-terbatas"><span class="badge-dot"></span> Slot Terbatas</span>';
        case 'hampir penuh':
            return '<span class="php-status-badge badge-penuh"><span class="badge-dot"></span> Hampir Penuh</span>';
        case 'musim terbaik':
            return '<span class="php-status-badge badge-musim"><span class="badge-dot"></span> Musim Terbaik</span>';
        case 'promo spesial':
            return '<span class="php-status-badge badge-promo"><span class="badge-dot"></span> Promo Spesial</span>';
        default:
            return '<span class="php-status-badge badge-default">' . htmlspecialchars($status) . '</span>';
    }
}

function formatRupiah($nominal) {
    return "Rp " . number_format($nominal, 0, ',', '.');
}

// --------------------------------------------------------------------------
// TASK 02: PENGOLAHAN DATA DENGAN ARRAY FILTER & STATISTIK AGREGAT
// --------------------------------------------------------------------------
$filterKategori = isset($_GET['kategori']) ? trim($_GET['kategori']) : 'all';
$filterQuery    = isset($_GET['q']) ? trim($_GET['q']) : '';

// Filter Array Multidimensi menggunakan array_filter
$programTampil = array_filter($programPrioritas, function ($item) use ($filterKategori, $filterQuery) {
    $matchKategori = ($filterKategori === 'all' || $item['kategori'] === $filterKategori);
    $matchQuery    = empty($filterQuery) || 
                     (stripos($item['nama'], $filterQuery) !== false) || 
                     (stripos($item['lokasi'], $filterQuery) !== false) ||
                     (stripos($item['kategori_label'], $filterQuery) !== false);
    return $matchKategori && $matchQuery;
});

// Hitung metrik agregat menggunakan fungsi PHP
$totalSemuaPaket  = count($programPrioritas);
$totalTampil      = count($programTampil);
$daftarHarga      = array_column($programPrioritas, 'harga');
$hargaTermurah    = min($daftarHarga);
$hargaTertinggi   = max($daftarHarga);
$rataRataHarga    = round(array_sum($daftarHarga) / $totalSemuaPaket);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Program Prioritas Petualangan — <?= htmlspecialchars($namaPlatform); ?> (PHP SSR)</title>
  <meta name="description" content="<?= htmlspecialchars($tagline); ?> - Dashboard Server-Side Rendering Modul 3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    /* STYLING KHUSUS EXPLOREHUB PROGRAM PRIORITAS (PHP SSR) */
    .php-hero{
      background: linear-gradient(125deg, rgba(23,61,50,0.95), rgba(36,89,71,0.90)),
                  url("https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=2200&q=85") center/cover;
      color: #fff;
      padding: 130px 7vw 80px;
      position: relative;
    }
    .php-hero-grid{
      display: grid;
      grid-template-columns: 1.25fr 0.75fr;
      gap: 50px;
      align-items: center;
    }
    .hero-editorial-badge{
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(215,107,45,0.28);
      border: 1px solid rgba(215,107,45,0.6);
      color: #ffcbb0;
      padding: 6px 14px;
      border-radius: 999px;
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 16px;
    }
    .hero-main-title{
      font: 800 clamp(34px, 4vw, 54px)/1.08 Manrope, sans-serif;
      margin: 0 0 12px;
      letter-spacing: -0.04em;
    }
    .hero-main-title em{
      font-family: Georgia, serif;
      color: var(--lime);
      font-weight: 400;
    }
    .hero-subtitle{
      font-size: 15px;
      color: rgba(255,255,255,0.85);
      line-height: 1.7;
      margin: 0 0 24px;
      max-width: 580px;
    }
    .meta-pills-row{
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .meta-pill-item{
      background: rgba(255,255,255,0.12);
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 600;
      color: #f1f5f3;
    }
    .meta-pill-item strong{
      color: #fff;
    }

    .php-info-card{
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.18);
      border-radius: 24px;
      padding: 30px 32px;
      box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    }
    .php-info-card h3{
      margin: 0 0 10px;
      font: 700 20px Manrope;
      color: #fff;
    }
    .php-info-card p{
      font-size: 13px;
      color: rgba(255,255,255,0.82);
      line-height: 1.7;
      margin: 0 0 18px;
    }

    /* SUMMARY STATS SECTION */
    .php-stats-section{
      background: var(--paper);
      padding: 32px 7vw;
      border-bottom: 1px solid rgba(23,36,29,0.1);
    }
    .stats-container{
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
    }
    .stat-box{
      background: #fff;
      border: 1px solid rgba(23,36,29,0.08);
      border-radius: 16px;
      padding: 20px 24px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.03);
    }
    .stat-box small{
      display: block;
      font-size: 11px;
      font-weight: 800;
      color: #6b7970;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-bottom: 6px;
    }
    .stat-box strong{
      font: 800 22px Manrope, sans-serif;
      color: var(--forest);
    }

    /* CONDITIONAL STATUS BADGES */
    .php-status-badge{
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 12px;
      border-radius: 999px;
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 0.04em;
    }
    .badge-dot{
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: currentColor;
    }
    .badge-tersedia{ background: #e6f9f0; color: #047857; }
    .badge-terbatas{ background: #fef3c7; color: #b45309; }
    .badge-penuh{ background: #fee2e2; color: #b91c1c; }
    .badge-musim{ background: #e0f2fe; color: #0369a1; }
    .badge-promo{ background: #f3e8ff; color: #7e22ce; }
    .badge-default{ background: #f3f4f6; color: #374151; }

    /* SSR DYNAMIC GRID SECTION */
    .program-section{
      background: var(--cream);
      padding: 80px 7vw 110px;
    }
    .program-filter-bar{
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      margin-bottom: 40px;
    }
    .filter-pills-form{
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }
    .ssr-filter-btn{
      background: #fff;
      border: 1px solid rgba(23,36,29,0.15);
      color: #33443a;
      padding: 10px 18px;
      border-radius: 999px;
      font-size: 13px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    .ssr-filter-btn:hover{
      border-color: var(--forest);
      color: var(--forest);
    }
    .ssr-filter-btn.active{
      background: var(--forest);
      color: #fff;
      border-color: var(--forest);
      box-shadow: 0 4px 12px rgba(23,61,50,0.2);
    }
    .search-filter-form{
      display: flex;
      gap: 8px;
    }
    .search-filter-form input{
      padding: 10px 18px;
      border-radius: 999px;
      border: 1px solid rgba(23,36,29,0.15);
      font-size: 13px;
      outline: none;
      min-width: 240px;
    }
    .search-filter-form button{
      background: var(--forest);
      color: #fff;
      border: 0;
      padding: 10px 20px;
      border-radius: 999px;
      font-weight: 700;
      font-size: 13px;
      cursor: pointer;
    }

    .program-grid{
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
      gap: 30px;
    }
    .program-card{
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid rgba(23,36,29,0.08);
      box-shadow: 0 10px 30px rgba(0,0,0,0.04);
      display: flex;
      flex-direction: column;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
    }
    .program-card:hover{
      transform: translateY(-6px);
      box-shadow: 0 24px 50px rgba(23,61,50,0.12);
    }
    .program-media{
      position: relative;
      height: 210px;
      overflow: hidden;
      background: #173d32;
    }
    .program-media img{
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .program-card:hover .program-media img{
      transform: scale(1.06);
    }
    .program-media:after{
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0.65) 100%);
    }
    .program-number-badge{
      position: absolute;
      top: 14px;
      left: 14px;
      z-index: 2;
      background: var(--sand);
      color: #fff;
      font: 800 11px Manrope;
      padding: 5px 11px;
      border-radius: 999px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.25);
      letter-spacing: 0.05em;
    }
    .program-status-wrap{
      position: absolute;
      top: 14px;
      right: 14px;
      z-index: 2;
    }
    .program-rating-badge{
      position: absolute;
      bottom: 14px;
      left: 14px;
      z-index: 2;
      background: rgba(255,255,255,0.92);
      color: #1a2920;
      padding: 4px 10px;
      border-radius: 999px;
      font: 800 11px Manrope;
    }
    .program-body{
      padding: 24px 26px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }
    .program-category-pill{
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--sand);
      margin-bottom: 6px;
    }
    .program-title{
      font: 700 21px/1.28 Manrope, sans-serif;
      color: var(--forest);
      margin: 0 0 10px;
      letter-spacing: -0.03em;
    }
    .program-desc{
      font-size: 13px;
      color: #55665d;
      line-height: 1.65;
      margin: 0 0 18px;
    }
    .program-meta-list{
      display: grid;
      gap: 10px;
      background: var(--paper);
      padding: 14px 16px;
      border-radius: 12px;
      margin-bottom: 18px;
      font-size: 12px;
    }
    .meta-row{
      display: flex;
      justify-content: space-between;
      color: #617267;
    }
    .meta-row strong{
      color: var(--ink);
    }
    .facilities-wrap{
      margin-bottom: 18px;
    }
    .facilities-wrap span.label{
      display: block;
      font-size: 11px;
      font-weight: 800;
      color: #6b7970;
      text-transform: uppercase;
      margin-bottom: 6px;
    }
    .facilities-chips{
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
    }
    .fac-chip{
      background: var(--cream);
      font-size: 11px;
      font-weight: 600;
      color: #384a3f;
      padding: 4px 9px;
      border-radius: 6px;
    }
    .program-footer{
      border-top: 1px solid rgba(23,36,29,0.08);
      padding-top: 16px;
      margin-top: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .price-box small{
      display: block;
      font-size: 10px;
      font-weight: 800;
      color: #79877e;
      text-transform: uppercase;
    }
    .price-box strong{
      font: 800 18px Manrope;
      color: var(--forest);
    }
    .btn-book-ssr{
      background: var(--forest);
      color: #fff;
      padding: 10px 18px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 800;
      text-decoration: none;
      transition: background 0.2s;
    }
    .btn-book-ssr:hover{
      background: var(--forest-2);
    }

    /* CODE INSPECTOR PANEL UNTUK EVALUASI DOSEN / ASISTEN LAB */
    .php-inspector-section{
      background: #17241d;
      color: #f1f5f3;
      padding: 70px 7vw;
      border-top: 2px solid var(--sand);
    }
    .inspector-header h2{
      font: 800 30px Manrope;
      color: #fff;
      margin: 0 0 10px;
    }
    .inspector-header p{
      color: #a4b4ab;
      max-width: 620px;
      margin: 0 0 30px;
      font-size: 14px;
      line-height: 1.6;
    }
    .inspector-grid{
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
    }
    .code-card{
      background: #0f1813;
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 14px;
      padding: 20px 24px;
      overflow-x: auto;
    }
    .code-card h4{
      color: var(--lime);
      margin: 0 0 12px;
      font-size: 13px;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }
    .code-card pre{
      margin: 0;
      font-family: Consolas, monospace;
      font-size: 13px;
      line-height: 1.6;
      color: #e5ede8;
    }

    @media(max-width: 1024px){
      .php-hero-grid{ grid-template-columns: 1fr; }
      .stats-container{ grid-template-columns: repeat(2, 1fr); }
      .inspector-grid{ grid-template-columns: 1fr; }
    }
    @media(max-width: 640px){
      .stats-container{ grid-template-columns: 1fr; }
      .program-grid{ grid-template-columns: 1fr; }
      .php-hero{ padding: 110px 24px 60px; }
      .program-section{ padding: 60px 24px 80px; }
      .search-filter-form input{ min-width: 100%; }
      .search-filter-form{ width: 100%; flex-direction: column; }
    }
  </style>
</head>
<body class="landing-page">

  <!-- SITE NAVIGATION -->
  <header class="site-nav">
    <a class="brand" href="index.html">
      <span class="brand-mark">EH</span>
      <span><?= htmlspecialchars($namaPlatform); ?></span>
    </a>
    <nav>
      <a href="index.html#jelajah">Jelajah</a>
      <a href="index.html#pengalaman">Pengalaman</a>
      <a href="index.html#eksplorasi-api">Live API</a>
      <a href="program-prioritas.php" style="color:var(--lime);font-weight:800;">Program Prioritas (PHP)</a>
      <a href="maps.html">Peta</a>
      <a href="booking.html">Booking</a>
    </nav>
    <div class="nav-actions">
      <a class="nav-button" href="index.html">← Kembali ke Jelajah</a>
    </div>
  </header>

  <!-- TASK 01: HERO SECTION DENGAN VARIABEL PHP TEMA EXPLOREHUB -->
  <section class="php-hero">
    <div class="php-hero-grid">
      <div>
        <span class="hero-editorial-badge">★ PROGRAM PRIORITAS EXPLOREHUB</span>
        <h1 class="hero-main-title">
          Petualangan Prioritas<br>
          <em>Terbaik di Indonesia.</em>
        </h1>
        <p class="hero-subtitle">
          <?= htmlspecialchars($tagline); ?>. Platform terpadu kurasi aktivitas outdoor, 
          ekowisata, dan petualangan menantang dari Sabang sampai Merauke yang siap dipesan secara real-time.
        </p>

        <!-- Variabel PHP Utama (Task 01) -->
        <div class="meta-pills-row">
          <div class="meta-pill-item">
            Platform: <strong><?= htmlspecialchars($namaPlatform); ?></strong>
          </div>
          <div class="meta-pill-item">
            Status Layanan: <strong><?= htmlspecialchars($statusLayanan); ?></strong>
          </div>
          <div class="meta-pill-item">
            Musim Wisata: <strong><?= htmlspecialchars($musimPetualangan); ?></strong>
          </div>
          <div class="meta-pill-item">
            Hub: <strong><?= htmlspecialchars($pusatOperasional); ?></strong>
          </div>
        </div>
      </div>

      <div class="php-info-card">
        <h3>Eksplorasi Tanpa Batas</h3>
        <p>
          Setiap program petualangan prioritas di bawah dikurasi dengan standar keamanan ketat, 
          didampingi instruktur bersertifikat, dan mendukung ekonomi masyarakat lokal secara berkelanjutan.
        </p>
        <div style="border-top:1px solid rgba(255,255,255,0.15);padding-top:14px;font-size:12px;color:rgba(255,255,255,0.7);">
          📅 Pembaruan Katalog: <strong><?= htmlspecialchars($tanggalPembaruan); ?></strong><br>
          📞 Hubungi Admin Reservasi: <strong><?= htmlspecialchars($kontakLayanan); ?></strong>
        </div>
      </div>
    </div>
  </section>

  <!-- TASK 02: RINGKASAN STATISTIK AGREGAT DENGAN PHP -->
  <section class="php-stats-section">
    <div class="stats-container">
      <div class="stat-box">
        <small>TOTAL PROGRAM PRIORITAS</small>
        <strong><?= $totalSemuaPaket; ?> Paket Pilihan</strong>
      </div>
      <div class="stat-box">
        <small>RENTANG HARGA PAKET</small>
        <strong><?= formatRupiah($hargaTermurah); ?> - <?= formatRupiah($hargaTertinggi); ?></strong>
      </div>
      <div class="stat-box">
        <small>RATA-RATA BIAYA / ORANG</small>
        <strong><?= formatRupiah($rataRataHarga); ?></strong>
      </div>
      <div class="stat-box">
        <small>STATUS OPERASIONAL</small>
        <span class="php-status-badge badge-tersedia"><span class="badge-dot"></span> <?= htmlspecialchars($statusLayanan); ?></span>
      </div>
    </div>
  </section>

  <!-- TASK 03: SSR DYNAMIC GRID CARDS PROGRAM PRIORITAS -->
  <main class="program-section">
    <div class="program-filter-bar">
      <!-- Filter Kategori Server-Side -->
      <div class="filter-pills-form">
        <a class="ssr-filter-btn <?= ($filterKategori === 'all') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=all">Semua Program</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'air') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=air">🌊 Air &amp; Laut</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'alam') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=alam">🏔️ Gunung &amp; Alam</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'adrenalin') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=adrenalin">⚡ Adrenalin</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'budaya') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=budaya">🏛️ Budaya &amp; Adat</a>
      </div>

      <!-- Pencarian Kata Kunci Server-Side (GET Form) -->
      <form class="search-filter-form" method="GET" action="program-prioritas.php">
        <input type="hidden" name="kategori" value="<?= htmlspecialchars($filterKategori); ?>">
        <input type="text" name="q" placeholder="Cari aktivitas, kota, daerah..." value="<?= htmlspecialchars($filterQuery); ?>">
        <button type="submit">Cari</button>
      </form>
    </div>

    <?php if (empty($programTampil)): ?>
      <div style="background:#fff;padding:60px 20px;border-radius:20px;text-align:center;border:1px dashed rgba(23,36,29,0.2);">
        <h3 style="font:700 22px Manrope;color:var(--forest);margin:0 0 8px;">Tidak Ada Program Ditemukan</h3>
        <p style="color:#66776c;font-size:14px;margin:0 0 20px;">Tidak ditemukan program petualangan dengan kata kunci "<?= htmlspecialchars($filterQuery); ?>".</p>
        <a class="btn-book-ssr" href="program-prioritas.php">Tampilkan Semua Petualangan</a>
      </div>
    <?php else: ?>
      <!-- SSR Dynamic Grid Container -->
      <div class="program-grid">
        <?php 
        // TASK 02: LOOP PENOMORAN ($index + 1 dengan format berurut #01, #02, #03...)
        $nomorIndex = 1;
        foreach ($programTampil as $item): 
            $nomorUrut = sprintf("%02d", $nomorIndex++);
        ?>
          <article class="program-card">
            <div class="program-media">
              <img src="<?= htmlspecialchars($item['gambar']); ?>" alt="<?= htmlspecialchars($item['nama']); ?>" loading="lazy">
              <!-- Loop Penomoran Badge -->
              <span class="program-number-badge">#<?= $nomorUrut; ?> PRIORITAS</span>
              
              <div class="program-status-wrap">
                <!-- Task 02: Conditional Status / Badge PHP -->
                <?= renderStatusBadge($item['status']); ?>
              </div>

              <div class="program-rating-badge">
                ★ <?= number_format($item['rating'], 2); ?> (<?= $item['ulasan']; ?> review)
              </div>
            </div>

            <div class="program-body">
              <span class="program-category-pill"><?= htmlspecialchars($item['kategori_label']); ?></span>
              <h3 class="program-title"><?= htmlspecialchars($item['nama']); ?></h3>
              <p class="program-desc"><?= htmlspecialchars($item['deskripsi']); ?></p>

              <!-- Metadata List Program -->
              <div class="program-meta-list">
                <div class="meta-row">
                  <span>Lokasi:</span>
                  <strong><?= htmlspecialchars($item['lokasi']); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Durasi &amp; Tingkat:</span>
                  <strong><?= htmlspecialchars($item['durasi']); ?> · <?= htmlspecialchars($item['kesulitan']); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Kapasitas Slot:</span>
                  <strong><?= htmlspecialchars($item['kuota_harian']); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Pemandu:</span>
                  <strong><?= htmlspecialchars($item['pemandu']); ?></strong>
                </div>
              </div>

              <!-- Fasilitas Paket -->
              <div class="facilities-wrap">
                <span class="label">Fasilitas Termasuk:</span>
                <div class="facilities-chips">
                  <?php foreach ($item['fasilitas'] as $f): ?>
                    <span class="fac-chip">✓ <?= htmlspecialchars($f); ?></span>
                  <?php endforeach; ?>
                </div>
              </div>

              <!-- Card Footer: Harga & Booking CTA -->
              <div class="program-footer">
                <div class="price-box">
                  <small>Biaya / Orang</small>
                  <strong><?= formatRupiah($item['harga']); ?></strong>
                </div>
                <a class="btn-book-ssr" href="booking.html?activity=<?= urlencode($item['nama']); ?>&destination=<?= urlencode($item['lokasi']); ?>">
                  Pesan Sekarang →
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>

  <!-- CODE INSPECTOR SECTION (UNTUK KEMUDAHAN PENILAIAN ASISTEN LAB / DOSEN) -->
  <section class="php-inspector-section">
    <div class="inspector-header">
      <h2>Inspeksi Variabel &amp; Pemrosesan Data PHP (Modul 3)</h2>
      <p>
        Bagian ini menyajikan kode dan nilai variabel pada server secara transparan sebagai bukti pemenuhan 
        <strong>Task 01</strong> (deklarasi variabel ExploreHUB), 
        <strong>Task 02</strong> (array multidimensi, conditional badge, loop penomoran), dan 
        <strong>Task 03</strong> (server-side rendering dynamic grid cards).
      </p>
    </div>

    <div class="inspector-grid">
      <!-- Task 01 Inspector -->
      <div class="code-card">
        <h4>Task 01: Variabel Utama Tema ExploreHUB</h4>
        <pre>
$namaPlatform     = "<?= htmlspecialchars($namaPlatform); ?>";
$tagline          = "<?= htmlspecialchars($tagline); ?>";
$statusLayanan    = "<?= htmlspecialchars($statusLayanan); ?>";
$musimPetualangan = "<?= htmlspecialchars($musimPetualangan); ?>";
$pusatOperasional = "<?= htmlspecialchars($pusatOperasional); ?>";
$kontakLayanan    = "<?= htmlspecialchars($kontakLayanan); ?>";
$totalPaket       = <?= $totalSemuaPaket; ?>;
$rataRataHarga    = <?= $rataRataHarga; ?>; // <?= formatRupiah($rataRataHarga); ?>
        </pre>
      </div>

      <!-- Task 02 & Task 03 Inspector -->
      <div class="code-card">
        <h4>Task 02 &amp; Task 03: Data Processing &amp; SSR Grid</h4>
        <pre>
// Array Multidimensi: <?= $totalSemuaPaket; ?> program petualangan bersarang
// Loop Penomoran: #01 sampai #<?= sprintf("%02d", $totalSemuaPaket); ?>
// Conditional Status & Badge:
   - renderStatusBadge("Tersedia")
   - renderStatusBadge("Slot Terbatas")
   - renderStatusBadge("Hampir Penuh")
   - renderStatusBadge("Musim Terbaik")
   - renderStatusBadge("Promo Spesial")
// SSR Dynamic Content:
   - Filter Kategori: "<?= htmlspecialchars($filterKategori); ?>"
   - Program Ditampilkan: <?= $totalTampil; ?> kartu dinamis
        </pre>
      </div>
    </div>
  </section>

  <!-- SITE FOOTER -->
  <footer class="site-footer">
    <div class="footer-brand"><span class="brand-mark">EH</span><strong><?= htmlspecialchars($namaPlatform); ?></strong></div>
    <p><?= htmlspecialchars($tagline); ?> · Modul 3 PHP Server-Side Rendering</p>
    <div class="footer-links">
      <a href="index.html">Beranda</a>
      <a href="program-prioritas.php">Program Prioritas (PHP)</a>
      <a href="maps.html">Peta</a>
      <a href="booking.html">Booking</a>
    </div>
    <small>© 2026 ExploreHub · Praktikum Pemrograman Web Laboratorium Informatika UMM</small>
  </footer>

</body>
</html>
