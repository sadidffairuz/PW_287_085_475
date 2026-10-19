<?php
/**
 * ==============================================================================
 * ExploreHub — Platform Eksplorasi Petualangan & Wisata Alam Indonesia
 * Pertemuan 6 Web Programming: From Procedural to Object-Oriented (Sprint 05)
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * 
 * PEMENUHAN TUGAS:
 * • Task 01: Create a Class (Class AdventureProgram & Class ExploreHub)
 * • Task 02: Add Properties and Methods (Encapsulation private, Constructor & Methods)
 * • Task 03: Generate Dynamic Content with Object (SSR dynamic grid cards via Object Methods)
 * ==============================================================================
 */

// Load Class Definitions (Task 01)
require_once __DIR__ . '/../classes/AdventureProgram.php';
require_once __DIR__ . '/../classes/ExploreHub.php';

// ==============================================================================
// TASK 01 & TASK 02: INSTANSIASI OBJECT DARI CLASS EXPLOREHUB
// ==============================================================================
$exploreHub = new ExploreHub(
    "ExploreHub",
    "Musim Petualangan & Cuaca Tropis Optimal (2026)",
    "Jelajahi Indonesia, Satu Petualangan Setiap Perjalanan",
    "Buka & Reservasi Aktif",
    "Kota Batu & Labuan Bajo, Indonesia",
    "+62 812-3456-7890 (WhatsApp Official)"
);

// ==============================================================================
// TASK 01 & TASK 02: INSTANSIASI 8 OBJECT DARI CLASS ADVENTUREPROGRAM
// ==============================================================================
$exploreHub->addProgram(new AdventureProgram(
    "EXP-01",
    "Rafting Sungai Brantas Extreme",
    "air",
    "Air & Sungai",
    "Kota Batu, Jawa Timur",
    "Jawa Timur",
    125000,
    4.9,
    184,
    "2.5 Jam",
    "Sedang - Menantang",
    "Tersedia",
    "40 Peserta / Hari",
    "Instruktur Berlisensi Internasional",
    "https://images.unsplash.com/photo-1530866495561-507c1c9b4b4f?auto=format&fit=crop&w=900&q=80",
    "Taklukkan jeram berbatu Sungai Brantas dengan panorama tebing pegunungan dan perkebunan apel Kota Batu. Paket lengkap peralatan standar internasional dan makan siang prasmanan.",
    ["Peralatan Standar Internasional", "Rescue Team & Guide", "Makan Siang Prasmanan", "Dokumentasi Foto", "Asuransi"]
));

$exploreHub->addProgram(new AdventureProgram(
    "EXP-02",
    "Sunrise Trekking & Lautan Pasir Bromo",
    "alam",
    "Gunung & Alam",
    "Taman Nasional Bromo Tengger Semeru",
    "Jawa Timur",
    275000,
    4.95,
    320,
    "1 Hari Penuh",
    "Mudah - Sedang",
    "Hampir Penuh",
    "30 Peserta / Hari",
    "Ranger Suku Tengger",
    "https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?auto=format&fit=crop&w=900&q=80",
    "Menyaksikan golden sunrise legendaris di Penanjakan 1, dilanjutkan petualangan melintasi Lautan Pasir Berbisik dan kawah aktif Bromo dengan Jeep 4x4 Hardtop.",
    ["Jeep 4x4 Hardtop", "Tiket Masuk TNBTS", "Pemandu Lokal Tengger", "Kopi Hangat Puncak", "Masker Debu"]
));

$exploreHub->addProgram(new AdventureProgram(
    "EXP-03",
    "Lava Tour Jeep Offroad Merapi",
    "adrenalin",
    "Adrenalin & Adventure",
    "Kaliurang, Sleman, DI Yogyakarta",
    "Yogyakarta",
    450000,
    4.88,
    240,
    "2 Jam Manuver",
    "Menantang",
    "Tersedia",
    "25 Jeep / Hari",
    "Driver Offroad Handal",
    "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80",
    "Menerobos trek berbatu bekas aliran lahar erupsi Merapi, manuver air basah di Sungai Kuning, serta singgah di Bunker Kaliadem dan Museum Sisa Hartaku.",
    ["1 Unit Jeep 4x4 (4 Seat)", "Driver Berpengalaman", "Helm Pengaman", "Tiket Wisata", "Jas Hujan"]
));

$exploreHub->addProgram(new AdventureProgram(
    "EXP-04",
    "Scuba Diving & Coral Safari Menjangan",
    "air",
    "Air & Laut",
    "Taman Nasional Bali Barat, Bali",
    "Bali",
    550000,
    4.92,
    160,
    "4 Jam Eksplorasi",
    "Semua Tingkatan",
    "Slot Terbatas",
    "15 Diver / Hari",
    "Dive Master PADI Bersertifikat",
    "https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=900&q=80",
    "Penyelaman terumbu karang vertikal spektakuler di Pulau Menjangan dengan visibilitas jernih hingga 30 meter dan keberagaman biota laut eksotis nusantara.",
    ["Speedboat Transfer", "Set Alat Selam Lengkap", "Dive Master PADI", "Makan Siang Kotak", "Tiket Konservasi"]
));

$exploreHub->addProgram(new AdventureProgram(
    "EXP-05",
    "Camping & Milky Way Hunting Ranu Kumbolo",
    "alam",
    "Gunung & Alam",
    "Lereng Gunung Semeru, Lumajang",
    "Jawa Timur",
    320000,
    4.96,
    210,
    "2 Hari 1 Malam",
    "Sedang",
    "Musim Terbaik",
    "20 Tenda / Malam",
    "Guide & Porter Gunung",
    "https://images.unsplash.com/photo-1475483768296-6163e08872a1?auto=format&fit=crop&w=900&q=80",
    "Bermalam di tepi danau kawah alami Ranu Kumbolo pada ketinggian 2.400 mdpl. Saksikan jutaan bintang Bima Sakti dan uap kabut fajar nan magis.",
    ["Tenda Dome Kapasitas 4", "Sleeping Bag & Matras", "Porter Tenda", "Makan 3 Kali", "Simaksi & Asuransi"]
));

$exploreHub->addProgram(new AdventureProgram(
    "EXP-06",
    "Tandem Paragliding Gunung Banyak",
    "adrenalin",
    "Adrenalin & Udara",
    "Gunung Banyak, Songgokerto, Kota Batu",
    "Jawa Timur",
    400000,
    4.87,
    145,
    "20 Menit Terbang",
    "Pemula Ramah",
    "Tersedia",
    "18 Penerbangan / Hari",
    "Pilot Paralayang Berlisensi FASI",
    "https://images.unsplash.com/photo-1508873696983-2df5293cb32f?auto=format&fit=crop&w=900&q=80",
    "Terbang tandem bebas di udara terbuka menikmati pemandangan alam perbukitan dan lanskap kota Batu dari ketinggian 1.315 mdpl bersama pilot berlisensi.",
    ["Pilot Berlisensi FASI", "Harness & Helm", "Video Dokumentasi 4K", "Shuttle Mobil Landasan"]
));

$exploreHub->addProgram(new AdventureProgram(
    "EXP-07",
    "Snorkeling Komodo & Manta Point Safari",
    "air",
    "Air & Laut",
    "Taman Nasional Komodo, Labuan Bajo",
    "NTT",
    850000,
    4.98,
    410,
    "1 Hari Penuh",
    "Mudah",
    "Promo Spesial",
    "20 Peserta / Trip",
    "Ranger Guide TN Komodo",
    "https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8?auto=format&fit=crop&w=900&q=80",
    "Berenang bersama pari Manta raksasa di Manta Point, trekking bukit Pulau Padar tiga warna, dan menyaksikan satwa endemik Komodo di habitat aslinya.",
    ["Speedboat VIP AC", "Peralatan Snorkeling", "Ranger Guide TN Komodo", "Makan Siang & Buah", "Dokumentasi Drone"]
));

$exploreHub->addProgram(new AdventureProgram(
    "EXP-08",
    "Eksplorasi Budaya & Rumah Adat Wae Rebo",
    "budaya",
    "Budaya & Tradisi",
    "Desa Tradisional Wae Rebo, Manggarai",
    "NTT",
    600000,
    4.93,
    130,
    "2 Hari 1 Malam",
    "Sedang",
    "Slot Terbatas",
    "12 Tamu / Malam",
    "Pemandu Adat Wae Rebo",
    "https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=80",
    "Eksplorasi desa tradisional warisan UNESCO di atas awan berarsitektur ikonik Mbaru Niang. Nikmati kopi khas Manggarai dan upacara adat penerimaan Waelu.",
    ["Inap di Mbaru Niang", "Upacara Adat Waelu", "Makan Tradisional Khas", "Pemandu Lokal Wae Rebo"]
));

// ------------------------------------------------------------------------------
// TASK 02: FILTERING & SEARCH MELALUI METHOD OBJECT $exploreHub
// ------------------------------------------------------------------------------
$filterKategori = isset($_GET['kategori']) ? trim($_GET['kategori']) : 'all';
$filterQuery    = isset($_GET['q']) ? trim($_GET['q']) : '';
$programTampil  = $exploreHub->filterPrograms($filterKategori, $filterQuery);
$tanggalPembaruan = date("d F Y");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Program Prioritas Petualangan — <?= htmlspecialchars($exploreHub->getName()); ?> (PHP OOP)</title>
  <meta name="description" content="<?= htmlspecialchars($exploreHub->getTagline()); ?> - Object-Oriented PHP Dashboard">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    /* STYLING KHUSUS EXPLOREHUB PROGRAM PRIORITAS (PHP OOP & SSR) */
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

    /* PROFILE CARD HERO (ANALOGI TAMPILAN SLIDE 9 & 10 PRESIDENTKU) */
    .php-info-card{
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(255,255,255,0.18);
      border-radius: 24px;
      padding: 30px 32px;
      box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    }
    .profile-card-header{
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 18px;
    }
    .profile-avatar-emblem{
      width: 58px;
      height: 58px;
      border-radius: 16px;
      background: linear-gradient(135deg, var(--sand), var(--lime));
      display: flex;
      align-items: center;
      justify-content: center;
      font: 800 24px Manrope;
      color: var(--forest);
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }
    .profile-card-header h3{
      margin: 0;
      font: 800 20px Manrope;
      color: #fff;
    }
    .profile-card-header p{
      margin: 4px 0 0;
      font-size: 12px;
      color: var(--lime);
      font-weight: 700;
    }
    .profile-method-quote{
      font-style: italic;
      color: #e2e8f0;
      background: rgba(0,0,0,0.3);
      padding: 10px 14px;
      border-radius: 8px;
      font-size: 13px;
      margin-bottom: 16px;
      border-left: 3px solid var(--lime);
    }
    .profile-program-pillars{
      margin-bottom: 16px;
    }
    .pillar-label{
      display: block;
      font-size: 10px;
      font-weight: 800;
      color: rgba(255,255,255,0.6);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: 8px;
    }
    .pillar-tags{
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
    }
    .pillar-tag{
      background: rgba(255,255,255,0.12);
      font-size: 11px;
      padding: 4px 10px;
      border-radius: 999px;
      color: #fff;
      font-weight: 600;
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

    @media(max-width: 1024px){
      .php-hero-grid{ grid-template-columns: 1fr; }
      .stats-container{ grid-template-columns: repeat(2, 1fr); }
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
      <span><?= htmlspecialchars($exploreHub->getName()); ?></span>
    </a>
    <nav>
      <a href="index.html#jelajah">Jelajah</a>
      <a href="index.html#pengalaman">Pengalaman</a>
      <a href="index.html#eksplorasi-api">Live API</a>
      <a href="program-prioritas.php" style="color:var(--lime);font-weight:800;">Program Prioritas (PHP OOP)</a>
      <a href="maps.html">Peta</a>
      <a href="booking.html">Booking</a>
    </nav>
    <div class="nav-actions">
      <a class="nav-button" href="index.html">← Kembali ke Jelajah</a>
    </div>
  </header>

  <!-- TASK 03: HERO SECTION DINAMIS DENGAN OBJECT EXPLOREHUB -->
  <section class="php-hero">
    <div class="php-hero-grid">
      <div>
        <span class="hero-editorial-badge">⚡ OBJECT-ORIENTED PHP (SPRINT 05)</span>
        <h1 class="hero-main-title">
          Petualangan Prioritas<br>
          <em><?= htmlspecialchars($exploreHub->getName()); ?></em>
        </h1>
        <p class="hero-subtitle">
          <?= htmlspecialchars($exploreHub->getTagline()); ?>. Platform terpadu kurasi aktivitas outdoor, 
          ekowisata, dan petualangan menantang dari Sabang sampai Merauke berbasis Object-Oriented PHP.
        </p>

        <!-- Variabel/Method Output dari Object $exploreHub -->
        <div class="meta-pills-row">
          <div class="meta-pill-item">
            Platform: <strong><?= htmlspecialchars($exploreHub->getName()); ?></strong>
          </div>
          <div class="meta-pill-item">
            Status: <strong><?= htmlspecialchars($exploreHub->getStatus()); ?></strong>
          </div>
          <div class="meta-pill-item">
            Musim / Periode: <strong><?= htmlspecialchars($exploreHub->getPeriod()); ?></strong>
          </div>
          <div class="meta-pill-item">
            Hub: <strong><?= htmlspecialchars($exploreHub->getOperationalHub()); ?></strong>
          </div>
        </div>
      </div>

      <!-- KARTU PROFIL OOP (ANALISIS SESUAI SLIDE 9 & 10 PRESIDENTKU) -->
      <div class="php-info-card">
        <div class="profile-card-header">
          <div class="profile-avatar-emblem">EH</div>
          <div>
            <h3><?= htmlspecialchars($exploreHub->getName()); ?></h3>
            <p><?= htmlspecialchars($exploreHub->getPeriod()); ?></p>
          </div>
        </div>

        <!-- Memanggil method $exploreHub->getProfile() sesuai standar slide -->
        <div class="profile-method-quote">
          "<?= htmlspecialchars($exploreHub->getProfile()); ?>"
        </div>

        <div class="profile-program-pillars">
          <span class="pillar-label">Program Pilar Petualangan:</span>
          <div class="pillar-tags">
            <span class="pillar-tag">🌊 Arung Jeram</span>
            <span class="pillar-tag">🏔️ Gunung Bromo</span>
            <span class="pillar-tag">⚡ Offroad Merapi</span>
            <span class="pillar-tag">🤿 Diving Menjangan</span>
          </div>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.15);padding-top:14px;font-size:12px;color:rgba(255,255,255,0.7);">
          📅 Pembaruan Katalog: <strong><?= htmlspecialchars($tanggalPembaruan); ?></strong><br>
          📞 Layanan Reservasi: <strong><?= htmlspecialchars($exploreHub->getContact()); ?></strong>
        </div>
      </div>
    </div>
  </section>

  <!-- TASK 03: SUMMARY STATS BERBASIS METHOD OBJECT ($exploreHub) -->
  <section class="php-stats-section">
    <div class="stats-container">
      <div class="stat-box">
        <small>TOTAL PROGRAM (OBJECT METHOD)</small>
        <strong><?= $exploreHub->getTotalPrograms(); ?> Paket Prioritas</strong>
      </div>
      <div class="stat-box">
        <small>RENTANG HARGA (OBJECT METHOD)</small>
        <strong><?= $exploreHub->getPriceRange(); ?></strong>
      </div>
      <div class="stat-box">
        <small>RATA-RATA HARGA (OBJECT METHOD)</small>
        <strong><?= $exploreHub->getAveragePrice(); ?></strong>
      </div>
      <div class="stat-box">
        <small>STATUS OPERASIONAL</small>
        <span class="php-status-badge badge-tersedia"><span class="badge-dot"></span> <?= htmlspecialchars($exploreHub->getStatus()); ?></span>
      </div>
    </div>
  </section>

  <!-- TASK 03: SSR DYNAMIC GRID CARDS MENGGUNAKAN METHOD OBJECT -->
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
        <p style="color:#66776c;font-size:14px;margin:0 0 20px;">Tidak ditemukan paket petualangan dengan kata kunci "<?= htmlspecialchars($filterQuery); ?>".</p>
        <a class="btn-book-ssr" href="program-prioritas.php">Tampilkan Semua Petualangan</a>
      </div>
    <?php else: ?>
      <!-- SSR Dynamic Grid Container dari Objek AdventureProgram -->
      <div class="program-grid">
        <?php 
        // TASK 03: Loop Penomoran (#01, #02...) & Mengakses Method dari Tiap Object
        $nomorIndex = 1;
        foreach ($programTampil as $prog): 
            $nomorUrut = sprintf("%02d", $nomorIndex++);
        ?>
          <article class="program-card">
            <div class="program-media">
              <img src="<?= htmlspecialchars($prog->getImage()); ?>" alt="<?= htmlspecialchars($prog->getName()); ?>" loading="lazy">
              <!-- Penomoran Dinamis -->
              <span class="program-number-badge">#<?= $nomorUrut; ?> PRIORITAS</span>
              
              <div class="program-status-wrap">
                <!-- Memanggil Method $prog->getStatusBadge() -->
                <?= $prog->getStatusBadge(); ?>
              </div>

              <div class="program-rating-badge">
                ★ <?= number_format($prog->getRating(), 2); ?> (<?= $prog->getReviews(); ?> review)
              </div>
            </div>

            <div class="program-body">
              <span class="program-category-pill"><?= htmlspecialchars($prog->getCategoryLabel()); ?></span>
              <h3 class="program-title"><?= htmlspecialchars($prog->getName()); ?></h3>
              <p class="program-desc"><?= htmlspecialchars($prog->getDescription()); ?></p>

              <!-- Metadata List Program dari Method Object -->
              <div class="program-meta-list">
                <div class="meta-row">
                  <span>Lokasi:</span>
                  <strong><?= htmlspecialchars($prog->getLocation()); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Durasi &amp; Tingkat:</span>
                  <strong><?= htmlspecialchars($prog->getDuration()); ?> · <?= htmlspecialchars($prog->getDifficulty()); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Kapasitas Slot:</span>
                  <strong><?= htmlspecialchars($prog->getDailyQuota()); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Pemandu:</span>
                  <strong><?= htmlspecialchars($prog->getGuide()); ?></strong>
                </div>
              </div>

              <!-- Fasilitas Paket dari Array Object -->
              <div class="facilities-wrap">
                <span class="label">Fasilitas Termasuk:</span>
                <div class="facilities-chips">
                  <?php foreach ($prog->getFacilities() as $fac): ?>
                    <span class="fac-chip">✓ <?= htmlspecialchars($fac); ?></span>
                  <?php endforeach; ?>
                </div>
              </div>

              <!-- Card Footer: Harga & Booking CTA dari Method Object -->
              <div class="program-footer">
                <div class="price-box">
                  <small>Biaya / Orang</small>
                  <strong><?= $prog->getFormattedPrice(); ?></strong>
                </div>
                <a class="btn-book-ssr" href="<?= htmlspecialchars($prog->getBookingUrl()); ?>">
                  Pesan Sekarang →
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>

  <!-- SITE FOOTER -->
  <footer class="site-footer">
    <div class="footer-brand"><span class="brand-mark">EH</span><strong><?= htmlspecialchars($exploreHub->getName()); ?></strong></div>
    <p><?= htmlspecialchars($exploreHub->getTagline()); ?> · Sprint 05 PHP Object-Oriented Programming (OOP)</p>
    <div class="footer-links">
      <a href="index.html">Beranda</a>
      <a href="program-prioritas.php">Program Prioritas (PHP OOP)</a>
      <a href="maps.html">Peta</a>
      <a href="booking.html">Booking</a>
    </div>
    <small>© 2026 ExploreHub · Praktikum Pemrograman Web Laboratorium Informatika UMM</small>
  </footer>

</body>
</html>
