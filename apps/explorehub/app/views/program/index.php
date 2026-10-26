<?php
/**
 * ==============================================================================
 * ExploreHub — View: Program Index (Main Dashboard)
 * From OOP to MVC — Task 03: Connect Model, Controller & View
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * 
 * Data yang di-passing dari ExploreHubController:
 * - $platform: array info metadata platform
 * - $profileSummary: string ringkasan profil platform
 * - $programTampil: AdventureProgram[] daftar paket hasil filter
 * - $filterKategori: string kategori aktif ('all', 'air', 'alam', 'adrenalin', 'budaya')
 * - $filterQuery: string kata kunci pencarian
 * - $totalPrograms: int total paket di model
 * - $priceRange: string rentang harga (min - max)
 * - $averagePrice: string rata-rata biaya paket
 * - $categories: array daftar kategori dan label
 * - $tanggalPembaruan: string tanggal saat ini
 * ==============================================================================
 */

// Load Header Layout
require __DIR__ . '/../layouts/header.php';
?>

  <!-- HERO SECTION: MENAMPILKAN DATA PLATFORM DARI CONTROLLER -->
  <section class="php-hero">
    <div class="php-hero-grid">
      <div>
        <span class="hero-editorial-badge">⚡ MODEL-VIEW-CONTROLLER (MVC ARCHITECTURE)</span>
        <h1 class="hero-main-title">
          Petualangan Prioritas<br>
          <em><?= htmlspecialchars($platform['name']); ?></em>
        </h1>
        <p class="hero-subtitle">
          <?= htmlspecialchars($platform['tagline']); ?>. <?= htmlspecialchars($platform['summary']); ?>
        </p>

        <!-- Meta Pills dari Data Controller -->
        <div class="meta-pills-row">
          <div class="meta-pill-item">
            Platform: <strong><?= htmlspecialchars($platform['name']); ?></strong>
          </div>
          <div class="meta-pill-item">
            Status: <strong><?= htmlspecialchars($platform['status']); ?></strong>
          </div>
          <div class="meta-pill-item">
            Musim / Periode: <strong><?= htmlspecialchars($platform['period']); ?></strong>
          </div>
          <div class="meta-pill-item">
            Hub: <strong><?= htmlspecialchars($platform['operationalHub']); ?></strong>
          </div>
        </div>
      </div>

      <!-- KARTU PROFIL EXPLOREHUB (MVC PRESENTATION) -->
      <div class="php-info-card">
        <div class="profile-card-header">
          <div class="profile-avatar-emblem">EH</div>
          <div>
            <h3><?= htmlspecialchars($platform['name']); ?></h3>
            <p><?= htmlspecialchars($platform['period']); ?></p>
          </div>
        </div>

        <div class="profile-method-quote">
          "<?= htmlspecialchars($profileSummary); ?>"
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
          📞 Layanan Reservasi: <strong><?= htmlspecialchars($platform['contact']); ?></strong>
        </div>
      </div>
    </div>
  </section>

  <!-- SUMMARY STATS SECTION: MENAMPILKAN AGREGASI DARI CONTROLLER & MODEL -->
  <section class="php-stats-section">
    <div class="stats-container">
      <div class="stat-box">
        <small>TOTAL PROGRAM (MODEL REPOSITORY)</small>
        <strong><?= $totalPrograms; ?> Paket Prioritas</strong>
      </div>
      <div class="stat-box">
        <small>RENTANG HARGA (CALCULATED IN MODEL)</small>
        <strong><?= $priceRange; ?></strong>
      </div>
      <div class="stat-box">
        <small>RATA-RATA BIAYA (CALCULATED IN MODEL)</small>
        <strong><?= $averagePrice; ?></strong>
      </div>
      <div class="stat-box">
        <small>STATUS OPERASIONAL</small>
        <span class="php-status-badge badge-tersedia"><span class="badge-dot"></span> <?= htmlspecialchars($platform['status']); ?></span>
      </div>
    </div>
  </section>

  <!-- MAIN PROGRAM SECTION: FILTER BAR & DYNAMIC GRID CARDS -->
  <main class="program-section">
    <div class="program-filter-bar">
      <!-- Filter Kategori Server-Side -->
      <div class="filter-pills-form">
        <?php foreach ($categories as $catKey => $catLabel): ?>
          <a class="ssr-filter-btn <?= ($filterKategori === $catKey) ? 'active' : ''; ?>" 
             href="program-prioritas.php?kategori=<?= urlencode($catKey); ?><?= !empty($filterQuery) ? '&q=' . urlencode($filterQuery) : ''; ?>">
            <?= $catLabel; ?>
          </a>
        <?php endforeach; ?>
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
      <!-- Grid Container: Render Objek AdventureProgram -->
      <div class="program-grid">
        <?php 
        $nomorIndex = 1;
        foreach ($programTampil as $prog): 
            $nomorUrut = sprintf("%02d", $nomorIndex++);
            // Include reusable card component
            require __DIR__ . '/card.php';
        endforeach; 
        ?>
      </div>
    <?php endif; ?>
  </main>

<?php
// Load Footer Layout
require __DIR__ . '/../layouts/footer.php';
?>
