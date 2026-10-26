<?php
/**
 * ==============================================================================
 * ExploreHub — View Layout: Header
 * From OOP to MVC — Task 03: View Layer
 * ==============================================================================
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Program Prioritas Petualangan — <?= htmlspecialchars($platform['name'] ?? 'ExploreHub'); ?> (PHP MVC)</title>
  <meta name="description" content="<?= htmlspecialchars($platform['tagline'] ?? ''); ?> - Model View Controller Architecture">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    /* STYLING KHUSUS EXPLOREHUB MVC DASHBOARD */
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

    /* PROFILE CARD HERO (ANALOGI TAMPILAN MVC) */
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
      <span><?= htmlspecialchars($platform['name'] ?? 'ExploreHub'); ?></span>
    </a>
    <nav>
      <a href="index.html#jelajah">Jelajah</a>
      <a href="index.html#pengalaman">Pengalaman</a>
      <a href="index.html#eksplorasi-api">Live API</a>
      <a href="program-prioritas.php" style="color:var(--lime);font-weight:800;">Program Prioritas (MVC)</a>
      <a href="maps.html">Peta</a>
      <a href="booking.html">Booking</a>
    </nav>
    <div class="nav-actions">
      <a class="nav-button" href="index.html">← Kembali ke Jelajah</a>
    </div>
  </header>
