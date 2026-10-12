<?php
/**
 * ==============================================================================
 * ExploreHub — Platform Eksplorasi Pariwisata & Program Prioritas Nasional
 * Modul 3: PHP Prosedural, Pemrosesan Data & Server-Side Content (SSR)
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * 
 * PEMENUHAN TUGAS:
 * • Task 01: Create PHP page
 *   Variabel PHP: $namaPresiden, $periode, $statusProgram, $programPrioritas, dll.
 * 
 * • Task 02: Process Data with PHP
 *   - Array Multidimensi ($programPrioritas berisi data program bersarang)
 *   - Conditional Status / Badge (switch/if penentu warna dan ikon status)
 *   - Loop Penomoran ($index + 1 dengan format nomor berurut 01, 02, 03...)
 * 
 * • Task 03: Build Dynamic Server-Side Content
 *   - Server-Side Rendering (SSR) dynamic grid cards Program Prioritas
 *   - Melanjutkan struktur tema editorial ExploreHub (cream/paper + forest + sand)
 *   - Filter kategori server-side (?kategori=...), statistik dinamis, modal detail
 * ==============================================================================
 */

// --------------------------------------------------------------------------
// TASK 01: INISIALISASI VARIABEL PHP UTAMA
// --------------------------------------------------------------------------
$namaPresiden     = "Prabowo Subianto";
$wakilPresiden    = "Gibran Rakabuming Raka";
$periode          = "2024 - 2029";
$namaKabinet      = "Kabinet Merah Putih";
$statusProgram    = "Aktif Berjalan";
$visiPemerintahan = "Bersama Indonesia Maju Menuju Indonesia Emas 2045";
$portalName       = "ExploreHub — National Priority & Tourism Dashboard";
$tanggalUpdate    = date("d F Y");

// --------------------------------------------------------------------------
// TASK 02: ARRAY MULTIDIMENSI PROGRAM PRIORITAS
// --------------------------------------------------------------------------
$programPrioritas = [
    [
        "id"               => "PRG-01",
        "nama"             => "Pengembangan Destinasi Wisata Super Prioritas & Ekowisata",
        "kategori"         => "pariwisata",
        "kategori_label"   => "Pariwisata & Kemaritiman",
        "sektor"           => "Ekonomi Kreatif & Wisata Bahari",
        "lokasi"           => "Labuan Bajo, Danau Toba, Borobudur, Mandalika, Likupang",
        "anggaran"         => 18500000000000, // Rp 18.5 Triliun
        "progres"          => 82,
        "status"           => "Aktif Berjalan",
        "deskripsi"        => "Pengembangan infrastruktur konektivitas bertaraf global, pelestarian ekosistem alam, serta digitalisasi pemandu lokal dan pelaku UMKM wisata di 5 DPSP.",
        "target_selesai"   => "Q4 2026",
        "penanggung_jawab" => "Kementerian Pariwisata & Ekonomi Kreatif",
        "gambar"           => "https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8?auto=format&fit=crop&w=900&q=80",
        "capaian"          => ["Kenaikan kunjungan wisatawan 38%", "Digitalisasi 2.400 desa wisata", "Sertifikasi 12.000 pemandu lokal"]
    ],
    [
        "id"               => "PRG-02",
        "nama"             => "Swasembada & Lumbung Pangan Nusantara (Food Estate)",
        "kategori"         => "pangan",
        "kategori_label"   => "Kedaulatan Pangan",
        "sektor"           => "Pertanian & Perkebunan Modern",
        "lokasi"           => "Merauke, Sumatera Selatan, Kalimantan Tengah",
        "anggaran"         => 34200000000000, // Rp 34.2 Triliun
        "progres"          => 67,
        "status"           => "Sedang Berjalan",
        "deskripsi"        => "Pencetakan sawah produktif baru, revitalisasi saluran irigasi primer, serta mekanisasi pertanian modern untuk menjamin kemandirian pangan tanpa impor.",
        "target_selesai"   => "Q2 2027",
        "penanggung_jawab" => "Kementerian Pertanian",
        "gambar"           => "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=900&q=80",
        "capaian"          => ["Cetak sawah 420.000 Ha", "Distribusi bibit unggul bersertifikat", "Modernisasi alsintan di 15 sentra"]
    ],
    [
        "id"               => "PRG-03",
        "nama"             => "Makan Bergizi Gratis Generasi Emas (MBG)",
        "kategori"         => "sdm",
        "kategori_label"   => "Kesehatan & Gizi SDM",
        "sektor"           => "Kesehatan & Pendidikan Anak",
        "lokasi"           => "38 Provinsi Seluruh Indonesia",
        "anggaran"         => 71000000000000, // Rp 71 Triliun
        "progres"          => 88,
        "status"           => "Aktif Berjalan",
        "deskripsi"        => "Penyaluran asupan nutrisi seimbang harian bagi 82,9 juta anak sekolah, santri pesantren, dan ibu hamil guna menekan stunting dan menyerap bahan pangan lokal.",
        "target_selesai"   => "Berkelanjutan (2024 - 2029)",
        "penanggung_jawab" => "Badan Gizi Nasional (BGN)",
        "gambar"           => "https://images.unsplash.com/photo-1498837167922-ddd27525d352?auto=format&fit=crop&w=900&q=80",
        "capaian"          => ["Pilot project di 140 kabupaten/kota", "Pemberdayaan 18.000 dapur lokal", "Penurunan angka stunting balita"]
    ],
    [
        "id"               => "PRG-04",
        "nama"             => "Hilirisasi Mineral Kritis & Ekosistem EV Hijau",
        "kategori"         => "energi",
        "kategori_label"   => "Energi & Industri",
        "sektor"           => "Sumber Daya Mineral & Energi Terbarukan",
        "lokasi"           => "Morowali, Halmahera Tengah, Konawe",
        "anggaran"         => 46500000000000, // Rp 46.5 Triliun
        "progres"          => 94,
        "status"           => "Siap Diresmikan",
        "deskripsi"        => "Pengembangan pabrik pengolahan nikel dan bauksit terintegrasi pembangkit hijau untuk melipatgandakan nilai ekspor komoditas dan memimpin rantai baterai EV global.",
        "target_selesai"   => "Q1 2027",
        "penanggung_jawab" => "Kementerian ESDM & Kementerian Investasi/BKPM",
        "gambar"           => "https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=900&q=80",
        "capaian"          => ["Smelter HPAL fase 2 tuntas 95%", "Penyerap 125.000 tenaga kerja", "Investasi hilirisasi naik 210%"]
    ],
    [
        "id"               => "PRG-05",
        "nama"             => "Konektivitas Tol Laut & Logistik Kepulauan Terluar",
        "kategori"         => "infrastruktur",
        "kategori_label"   => "Infrastruktur & Maritim",
        "sektor"           => "Transportasi & Logistik Nasional",
        "lokasi"           => "Maluku, Papua, Nusa Tenggara, Kepulauan Riau",
        "anggaran"         => 26800000000000, // Rp 26.8 Triliun
        "progres"          => 74,
        "status"           => "Sedang Berjalan",
        "deskripsi"        => "Memperluas trayek kapal perintis dan tol laut terjadwal untuk menekan disparitas harga logistik sembako antara Jawa dan pulau-pulau perbatasan terluar.",
        "target_selesai"   => "Q3 2027",
        "penanggung_jawab" => "Kementerian Perhubungan & Pelni",
        "gambar"           => "https://images.unsplash.com/photo-1518241353330-0f7941c2d9b5?auto=format&fit=crop&w=900&q=80",
        "capaian"          => ["41 trayek tol laut beroperasi", "Disparitas harga turun 19.4%", "Dermaga rakyat baru di 24 pulau"]
    ],
    [
        "id"               => "PRG-06",
        "nama"             => "Digitalisasi Desa Wisata & Pelestarian Warisan Budaya",
        "kategori"         => "pariwisata",
        "kategori_label"   => "Pariwisata & Budaya",
        "sektor"           => "Ekonomi Digital Kreatif",
        "lokasi"           => "Desa Wae Rebo, Baduy, Tana Toraja, Panglipuran",
        "anggaran"         => 8200000000000, // Rp 8.2 Triliun
        "progres"          => 96,
        "status"           => "Selesai Tahap 1",
        "deskripsi"        => "Integrasi ekosistem reservasi ExploreHub ke sanggar adat dan komunitas lokal nusantara berbasis pelestarian kearifan lokal ramah lingkungan.",
        "target_selesai"   => "Q4 2026",
        "penanggung_jawab" => "Kemenparekraf & Kemkominfo",
        "gambar"           => "https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=80",
        "capaian"          => ["Platform ExploreHub live di 350 desa", "Workshop pemuda digital adat", "Pelestarian 82 situs cagar budaya"]
    ]
];

// --------------------------------------------------------------------------
// TASK 02: CONDITIONAL STATUS / BADGE HELPER
// --------------------------------------------------------------------------
function renderStatusBadge($status) {
    $s = strtolower(trim($status));
    switch ($s) {
        case 'aktif berjalan':
            return '<span class="php-status-badge badge-aktif"><span class="badge-dot"></span> Aktif Berjalan</span>';
        case 'sedang berjalan':
        case 'berjalan':
            return '<span class="php-status-badge badge-berjalan"><span class="badge-dot"></span> Sedang Berjalan</span>';
        case 'siap diresmikan':
            return '<span class="php-status-badge badge-resmi"><span class="badge-dot"></span> Siap Diresmikan</span>';
        case 'selesai tahap 1':
        case 'selesai':
            return '<span class="php-status-badge badge-selesai"><span class="badge-dot"></span> Selesai Tahap 1</span>';
        case 'dalam proses':
        case 'perencanaan':
            return '<span class="php-status-badge badge-proses"><span class="badge-dot"></span> Dalam Perencanaan</span>';
        default:
            return '<span class="php-status-badge badge-default">' . htmlspecialchars($status) . '</span>';
    }
}

function formatRupiahSingkat($nominal) {
    if ($nominal >= 1000000000000) {
        return "Rp " . number_format($nominal / 1000000000000, 1, ',', '.') . " Triliun";
    } elseif ($nominal >= 1000000000) {
        return "Rp " . number_format($nominal / 1000000000, 1, ',', '.') . " Miliar";
    }
    return "Rp " . number_format($nominal, 0, ',', '.');
}

// --------------------------------------------------------------------------
// TASK 02: PENGOLAHAN DATA DENGAN ARRAY FILTER & STATISTIK
// --------------------------------------------------------------------------
$filterKategori = isset($_GET['kategori']) ? trim($_GET['kategori']) : 'all';
$filterQuery    = isset($_GET['q']) ? trim($_GET['q']) : '';

// Array filtering multidimensi
$programTampil = array_filter($programPrioritas, function ($item) use ($filterKategori, $filterQuery) {
    $matchKategori = ($filterKategori === 'all' || $item['kategori'] === $filterKategori);
    $matchQuery    = empty($filterQuery) || 
                     (stripos($item['nama'], $filterQuery) !== false) || 
                     (stripos($item['lokasi'], $filterQuery) !== false) ||
                     (stripos($item['sektor'], $filterQuery) !== false);
    return $matchKategori && $matchQuery;
});

// Hitung metrik statistik dinamis dengan PHP
$totalSemuaProgram  = count($programPrioritas);
$totalTampil        = count($programTampil);
$totalAnggaran      = array_sum(array_column($programPrioritas, 'anggaran'));
$rataRataProgres    = round(array_sum(array_column($programPrioritas, 'progres')) / $totalSemuaProgram);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Program Prioritas Nasional — ExploreHub (PHP SSR)</title>
  <meta name="description" content="Dashboard Program Prioritas Nasional & Sinergi Pariwisata Indonesia - Modul 3 PHP Server-Side Rendering">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    /* Styling khusus Server-Side Rendering (SSR) & Program Prioritas */
    .php-hero{
      background: linear-gradient(135deg, rgba(16,42,34,0.95), rgba(36,89,71,0.92)),
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
    .php-hero-card{
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.18);
      border-radius: 24px;
      padding: 32px 36px;
      box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    }
    .presiden-tag{
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(215,107,45,0.25);
      border: 1px solid rgba(215,107,45,0.5);
      color: #ffd2b3;
      padding: 6px 14px;
      border-radius: 999px;
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      margin-bottom: 16px;
    }
    .presiden-title{
      font: 800 clamp(32px, 3.8vw, 50px)/1.08 Manrope, sans-serif;
      margin: 0 0 10px;
      letter-spacing: -0.04em;
    }
    .presiden-subtitle{
      font-size: 15px;
      color: rgba(255,255,255,0.82);
      line-height: 1.7;
      margin: 0 0 24px;
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

    /* STATS SUMMARY BAR */
    .php-stats-section{
      background: var(--paper);
      padding: 30px 7vw;
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
      font: 800 24px Manrope, sans-serif;
      color: var(--forest);
    }

    /* STATUS BADGES */
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
    .badge-aktif{ background: #e6f9f0; color: #047857; }
    .badge-berjalan{ background: #e0f2fe; color: #0369a1; }
    .badge-resmi{ background: #fef3c7; color: #b45309; }
    .badge-selesai{ background: #dcfce7; color: #15803d; }
    .badge-proses{ background: #ffedd5; color: #c2410c; }
    .badge-default{ background: #f3f4f6; color: #374151; }

    /* SSR PROGRAM GRID */
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
      padding: 10px 16px;
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
      height: 200px;
      overflow: hidden;
      background: #245947;
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
      background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.7) 100%);
    }
    .program-number-badge{
      position: absolute;
      top: 14px;
      left: 14px;
      z-index: 2;
      background: var(--sand);
      color: #fff;
      font: 800 12px Manrope;
      padding: 5px 11px;
      border-radius: 999px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.25);
    }
    .program-status-wrap{
      position: absolute;
      top: 14px;
      right: 14px;
      z-index: 2;
    }
    .program-body{
      padding: 24px 26px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }
    .program-sektor-label{
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--sand);
      margin-bottom: 6px;
    }
    .program-title{
      font: 700 21px/1.3 Manrope, sans-serif;
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
    .progress-wrapper{
      margin-bottom: 20px;
    }
    .progress-head{
      display: flex;
      justify-content: space-between;
      font-size: 11px;
      font-weight: 800;
      color: var(--forest);
      margin-bottom: 6px;
    }
    .progress-bar-bg{
      height: 8px;
      background: #e2e8e5;
      border-radius: 999px;
      overflow: hidden;
    }
    .progress-bar-fill{
      height: 100%;
      background: linear-gradient(90deg, var(--forest), var(--sand));
      border-radius: 999px;
      transition: width 1s ease;
    }
    .program-footer{
      border-top: 1px solid rgba(23,36,29,0.08);
      padding-top: 16px;
      margin-top: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .budget-tag small{
      display: block;
      font-size: 10px;
      font-weight: 800;
      color: #79877e;
      text-transform: uppercase;
    }
    .budget-tag strong{
      font: 800 16px Manrope;
      color: var(--forest);
    }
    .btn-detail-ssr{
      background: var(--forest);
      color: #fff;
      padding: 9px 16px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 800;
      text-decoration: none;
      transition: background 0.2s;
    }
    .btn-detail-ssr:hover{
      background: var(--forest-2);
    }

    /* CODE INSPECTOR PANEL UNTUK DOSEN / ASISTEN LAB */
    .php-inspector-section{
      background: #17241d;
      color: #f1f5f3;
      padding: 70px 7vw;
      border-top: 2px solid var(--sand);
    }
    .inspector-header h2{
      font: 800 32px Manrope;
      color: #fff;
      margin: 0 0 10px;
    }
    .inspector-header p{
      color: #a4b4ab;
      max-width: 600px;
      margin: 0 0 30px;
      font-size: 14px;
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
      <span>Explore<span>Hub</span></span>
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

  <!-- TASK 01: HERO SECTION DENGAN VARIABEL PHP -->
  <section class="php-hero">
    <div class="php-hero-grid">
      <div>
        <span class="presiden-tag">★ PROGRAM PRIORITAS PEMERINTAH RI</span>
        <h1 class="presiden-title">
          Pembangunan &amp; Pariwisata<br>
          <em>Menuju Indonesia Emas.</em>
        </h1>
        <p class="presiden-subtitle">
          Integrasi program pembangunan strategis nasional di bawah kepemimpinan 
          <strong><?= htmlspecialchars($namaPresiden); ?></strong> &amp; 
          <strong><?= htmlspecialchars($wakilPresiden); ?></strong> 
          bersama ekosistem pariwisata terpadu ExploreHub.
        </p>

        <div class="meta-pills-row">
          <div class="meta-pill-item">
            Presiden: <strong><?= htmlspecialchars($namaPresiden); ?></strong>
          </div>
          <div class="meta-pill-item">
            Periode: <strong><?= htmlspecialchars($periode); ?></strong>
          </div>
          <div class="meta-pill-item">
            Kabinet: <strong><?= htmlspecialchars($namaKabinet); ?></strong>
          </div>
          <div class="meta-pill-item">
            Status: <strong><?= htmlspecialchars($statusProgram); ?></strong>
          </div>
        </div>
      </div>

      <div class="php-hero-card">
        <h3 style="margin:0 0 12px;font:700 20px Manrope;color:#fff;">Visi Strategis Nasional</h3>
        <p style="font-size:14px;color:rgba(255,255,255,0.85);line-height:1.7;margin:0 0 18px;">
          "<?= htmlspecialchars($visiPemerintahan); ?>"
        </p>
        <div style="border-top:1px solid rgba(255,255,255,0.15);padding-top:14px;font-size:12px;color:rgba(255,255,255,0.7);">
          📅 Pembaruan Data Terakhir: <strong><?= htmlspecialchars($tanggalUpdate); ?></strong><br>
          🏛️ Disinkronisasi dengan Portal Data Terbuka ExploreHub
        </div>
      </div>
    </div>
  </section>

  <!-- TASK 02: STATS SUMMARY DENGAN PERHITUNGAN PHP -->
  <section class="php-stats-section">
    <div class="stats-container">
      <div class="stat-box">
        <small>TOTAL PROGRAM STRATEGIS</small>
        <strong><?= $totalSemuaProgram; ?> Program Prioritas</strong>
      </div>
      <div class="stat-box">
        <small>TOTAL ALOKASI ANGGARAN</small>
        <strong><?= formatRupiahSingkat($totalAnggaran); ?></strong>
      </div>
      <div class="stat-box">
        <small>RATA-RATA PROGRES NASIONAL</small>
        <strong><?= $rataRataProgres; ?>% Selesai</strong>
      </div>
      <div class="stat-box">
        <small>STATUS IMPLEMENTASI</small>
        <?= renderStatusBadge($statusProgram); ?>
      </div>
    </div>
  </section>

  <!-- TASK 03: SSR DYNAMIC GRID CARDS PROGRAM PRIORITAS -->
  <main class="program-section">
    <div class="program-filter-bar">
      <!-- Filter Kategori PHP SSR -->
      <div class="filter-pills-form">
        <a class="ssr-filter-btn <?= ($filterKategori === 'all') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=all">Semua Program</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'pariwisata') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=pariwisata">🌴 Pariwisata &amp; Budaya</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'pangan') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=pangan">🌾 Kedaulatan Pangan</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'sdm') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=sdm">🍱 Gizi &amp; SDM</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'energi') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=energi">⚡ Energi &amp; Hilirisasi</a>
        <a class="ssr-filter-btn <?= ($filterKategori === 'infrastruktur') ? 'active' : ''; ?>" 
           href="program-prioritas.php?kategori=infrastruktur">🚢 Tol Laut &amp; Logistik</a>
      </div>

      <!-- Pencarian Kata Kunci PHP SSR -->
      <form class="search-filter-form" method="GET" action="program-prioritas.php">
        <input type="hidden" name="kategori" value="<?= htmlspecialchars($filterKategori); ?>">
        <input type="text" name="q" placeholder="Cari program, sektor, kota..." value="<?= htmlspecialchars($filterQuery); ?>">
        <button type="submit">Cari</button>
      </form>
    </div>

    <?php if (empty($programTampil)): ?>
      <div style="background:#fff;padding:60px 20px;border-radius:20px;text-align:center;border:1px dashed rgba(23,36,29,0.2);">
        <h3 style="font:700 22px Manrope;color:var(--forest);margin:0 0 8px;">Tidak Ada Program Ditemukan</h3>
        <p style="color:#66776c;font-size:14px;margin:0 0 20px;">Tidak ditemukan program prioritas dengan kata kunci "<?= htmlspecialchars($filterQuery); ?>".</p>
        <a class="btn-detail-ssr" href="program-prioritas.php">Tampilkan Semua Program</a>
      </div>
    <?php else: ?>
      <!-- SSR Dynamic Grid Container -->
      <div class="program-grid">
        <?php 
        // TASK 02: LOOP PENOMORAN ($index + 1 dengan format 01, 02, 03...)
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
                <!-- Conditional Status Badge PHP -->
                <?= renderStatusBadge($item['status']); ?>
              </div>
            </div>

            <div class="program-body">
              <span class="program-sektor-label"><?= htmlspecialchars($item['kategori_label']); ?></span>
              <h3 class="program-title"><?= htmlspecialchars($item['nama']); ?></h3>
              <p class="program-desc"><?= htmlspecialchars($item['deskripsi']); ?></p>

              <!-- Progress Bar Dinamis PHP -->
              <div class="progress-wrapper">
                <div class="progress-head">
                  <span>Progres Lapangan</span>
                  <span><?= $item['progres']; ?>%</span>
                </div>
                <div class="progress-bar-bg">
                  <div class="progress-bar-fill" style="width: <?= $item['progres']; ?>%;"></div>
                </div>
              </div>

              <!-- Metadata List -->
              <div class="program-meta-list">
                <div class="meta-row">
                  <span>Sektor Fokus:</span>
                  <strong><?= htmlspecialchars($item['sektor']); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Lokasi:</span>
                  <strong><?= htmlspecialchars($item['lokasi']); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Penanggung Jawab:</span>
                  <strong><?= htmlspecialchars($item['penanggung_jawab']); ?></strong>
                </div>
                <div class="meta-row">
                  <span>Target Selesai:</span>
                  <strong><?= htmlspecialchars($item['target_selesai']); ?></strong>
                </div>
              </div>

              <!-- Capaian Highlights -->
              <div style="margin-bottom:18px;">
                <span style="font-size:11px;font-weight:800;color:#6b7970;text-transform:uppercase;">Capaian Strategis:</span>
                <ul style="margin:6px 0 0;padding-left:18px;font-size:12px;color:#3f5045;line-height:1.6;">
                  <?php foreach ($item['capaian'] as $capaian): ?>
                    <li><?= htmlspecialchars($capaian); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>

              <div class="program-footer">
                <div class="budget-tag">
                  <small>Alokasi Anggaran</small>
                  <strong><?= formatRupiahSingkat($item['anggaran']); ?></strong>
                </div>
                <a class="btn-detail-ssr" href="booking.html?activity=<?= urlencode($item['nama']); ?>&destination=<?= urlencode($item['lokasi']); ?>">
                  Sinergi Wisata →
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>

  <!-- CODE INSPECTOR UNTUK PENILAIAN ASISTEN LAB / DOSEN -->
  <section class="php-inspector-section">
    <div class="inspector-header">
      <h2>Inspeksi Variabel &amp; Pemrosesan PHP (Modul 3)</h2>
      <p>
        Bagian ini menyajikan bukti implementasi <strong>Task 01</strong> (deklarasi variabel), 
        <strong>Task 02</strong> (pemrosesan array multidimensi, conditional badge, loop penomoran), 
        serta <strong>Task 03</strong> (server-side rendering dynamic grid cards) secara transparan.
      </p>
    </div>

    <div class="inspector-grid">
      <!-- Task 01 Inspector -->
      <div class="code-card">
        <h4>Task 01: Variabel Utama PHP</h4>
        <pre>
$namaPresiden     = "<?= htmlspecialchars($namaPresiden); ?>";
$wakilPresiden    = "<?= htmlspecialchars($wakilPresiden); ?>";
$periode          = "<?= htmlspecialchars($periode); ?>";
$namaKabinet      = "<?= htmlspecialchars($namaKabinet); ?>";
$statusProgram    = "<?= htmlspecialchars($statusProgram); ?>";
$visiPemerintahan = "<?= htmlspecialchars($visiPemerintahan); ?>";
$totalProgram     = <?= $totalSemuaProgram; ?>;
$totalAnggaran    = <?= $totalAnggaran; ?>; // <?= formatRupiahSingkat($totalAnggaran); ?>
        </pre>
      </div>

      <!-- Task 02 & Task 03 Inspector -->
      <div class="code-card">
        <h4>Task 02 &amp; Task 03: Data Processing &amp; SSR Grid</h4>
        <pre>
// Array Multidimensi: <?= $totalSemuaProgram; ?> program terdaftar
// Loop Penomoran: #01 sampai #<?= sprintf("%02d", $totalSemuaProgram); ?>
// Conditional Status:
   - renderStatusBadge("Aktif Berjalan")
   - renderStatusBadge("Sedang Berjalan")
   - renderStatusBadge("Siap Diresmikan")
   - renderStatusBadge("Selesai Tahap 1")
// SSR Dynamic Content:
   - Filter Kategori Aktif: "<?= htmlspecialchars($filterKategori); ?>"
   - Program Tampil di Layar: <?= $totalTampil; ?> kartu
        </pre>
      </div>
    </div>
  </section>

  <!-- SITE FOOTER -->
  <footer class="site-footer">
    <div class="footer-brand"><span class="brand-mark">EH</span><strong>ExploreHub</strong></div>
    <p>Portal Sinergi Pariwisata Indonesia &amp; Program Prioritas Nasional · Modul 3 PHP SSR</p>
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
