<?php
/**
 * Week 7 — MVC View.
 * Presentation only: receives prepared variables from HomeController.
 */
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($namaPlatform) ?> — Temukan tempat untuk berhenti sejenak</title>
  <meta name="description" content="Temukan pengalaman alam dan petualangan Indonesia bersama ExploreHub.">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/lodge.css">
</head>
<body>
<header class="topbar">
  <a class="brand" href="index.php"><span class="brand-symbol">E</span><span>explore<span class="brand-light">hub</span><small>JOURNEYS WITH MEANING</small></span></a>
  <nav><a href="#pengalaman">Pengalaman</a><a href="#galeri">Inspirasi</a><a href="maps.html">Peta lokasi</a><a href="#cerita">Cerita tamu</a></nav>
  <a class="nav-cta" href="booking.php">Rencanakan perjalanan <span>↗</span></a>
</header>
<main>
  <section class="hero" id="home">
    <div class="hero-shade"></div>
    <div class="hero-copy">
      <p class="eyebrow"><span></span> FIND YOUR OWN KIND OF WONDER</p>
      <h1>Tempat indah.<br><em>Waktu yang melambat.</em></h1>
      <p class="hero-text">Dari kabin di tengah hutan sampai petualangan di bawah langit terbuka — temukan sisi Indonesia yang ingin kamu kenang.</p>
      <div class="hero-actions"><a class="btn-gold" href="#pengalaman">Temukan pengalaman <span>↗</span></a><a class="play-link" href="#tentang"><span class="play-icon">▶</span> Kenali ExploreHub</a></div>
    </div>
    <div class="hero-note"><span class="note-line"></span><span>INDONESIA, IN YOUR OWN RHYTHM</span><span class="note-count">01 <i>/</i> 06</span></div>
    <div class="hero-float"><div class="float-image"></div><div class="float-caption"><small>THE QUIET ESCAPE</small><strong>Biarkan alam<br>mengatur waktumu.</strong><a href="#galeri">Lihat inspirasi ↗</a></div></div>
    <div class="hero-bottom-label"><span>EST. FOR THE CURIOUS</span><span>SCROLL TO EXPLORE ↓</span></div>
  </section>

  <section class="intro-band" id="tentang">
    <div class="intro-kicker">01 / A DIFFERENT WAY TO TRAVEL</div>
    <div class="intro-main"><h2>Perjalanan bukan cuma<br>tentang <em>ke mana kamu pergi.</em></h2><p>Ini tentang udara pagi yang dingin, cerita dari orang lokal, dan momen kecil yang ingin kamu simpan lebih lama. ExploreHub membantumu menemukan pengalaman yang terasa personal.</p></div>
    <div class="intro-stats"><div><strong>01</strong><span>Pilih pengalaman</span></div><div><strong>02</strong><span>Temukan tempat</span></div><div><strong>03</strong><span>Buat cerita</span></div></div>
  </section>

  <section class="sleep-section" id="galeri">
    <div class="sleep-photo"></div><div class="sleep-content"><p class="eyebrow"><span></span> SLOW DOWN, LOOK AROUND</p><h2>Di bawah bintang,<br><em>kamu menemukan jeda.</em></h2><p>Bangun dengan kabut pegunungan, menghabiskan sore di tepi danau, atau menikmati langit yang terasa lebih dekat dari biasanya.</p><a class="text-cta" href="#pengalaman">Cari pelarian berikutnya <span>↗</span></a></div>
    <div class="photo-caption">RANU KUMBOLO · EAST JAVA <span>07° 58′ S / 112° 55′ E</span></div>
  </section>

  <section class="gallery-section">
    <div class="section-heading"><div><p class="eyebrow dark">02 / THE ART OF GETTING LOST</p><h2>Berangkat untuk melihat.<br><em>Pulang membawa cerita.</em></h2></div><p>Setiap tempat punya caranya sendiri untuk membuatmu jatuh hati. Mulai dari laut yang jernih sampai jalan kecil di antara pepohonan.</p></div>
    <div class="gallery-grid">
      <a class="gallery-tile tile-large" href="#pengalaman"><img src="https://images.unsplash.com/photo-1510798831971-661eb04b3739?auto=format&fit=crop&w=1200&q=85" alt="Kabin nyaman di tengah hutan"><span>01 — STAY CLOSE TO NATURE</span><strong>Bangun di tengah alam</strong></a>
      <a class="gallery-tile tile-tall" href="#pengalaman"><img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=85" alt="Pegunungan diselimuti kabut"><span>02 — ABOVE THE CLOUDS</span><strong>Kejar garis cakrawala</strong></a>
      <a class="gallery-tile tile-small" href="#pengalaman"><img src="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=85" alt="Ombak laut biru"><span>03 — FOLLOW THE TIDE</span><strong>Ikuti suara lautan</strong></a>
      <a class="gallery-tile tile-small second-small" href="#pengalaman"><img src="https://images.unsplash.com/photo-1475483768296-6163e08872a1?auto=format&fit=crop&w=900&q=85" alt="Tenda di alam terbuka"><span>04 — SLEEP UNDER STARS</span><strong>Jauh dari keramaian</strong></a>
    </div>
  </section>

  <!-- WEEK 5 TASK 03: SSR dynamic grid, each card is generated by PHP foreach. -->
  <section class="experiences-section" id="pengalaman">
    <div class="section-heading light-heading"><div><p class="eyebrow"><span></span> <?= e($periodeImplementasi) ?> · EXPLOREHUB COLLECTION</p><h2><?= e($judulProgram) ?><br><em><?= e($subjudulProgram) ?></em></h2></div><div class="collection-status"><span class="status-dot <?= count($programPrioritas) ? 'is-live' : '' ?>"></span><strong><?= e($statusProgram) ?></strong><small><?= count($programPrioritas) ?> pengalaman · Server-side rendered</small></div></div>
    <div class="experience-grid">
      <?php if (!empty($programPrioritas)): ?>
        <?php foreach ($programPrioritas as $index => $destinasi): ?>
          <?php
            // Week 6 Task 03: each card reads values and behavior from a Destination object.
            $tersedia = $destinasi->isAvailable();
          ?>
          <article class="experience-card">
            <div class="experience-image"><img src="<?= e($destinasi->getImage()) ?>" alt="<?= e($destinasi->getTitle()) ?>" loading="lazy"><span class="experience-number"><?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?></span><span class="category-pill"><?= e($destinasi->getCategoryLabel()) ?></span><span class="rating">★ <?= e($destinasi->getFormattedRating()) ?></span></div>
            <div class="experience-info"><p class="location">⌖ &nbsp;<?= e($destinasi->getLocation()) ?></p><h3><?= e($destinasi->getTitle()) ?></h3><p class="experience-desc"><?= e($destinasi->getDescription()) ?></p><div class="card-details"><span>◷ <?= e($destinasi->getDuration()) ?></span><span>↗ <?= e($destinasi->getDifficulty()) ?></span></div><div class="experience-card-bottom"><div><small>MULAI DARI</small><strong><?= e($destinasi->getFormattedPrice()) ?></strong><span class="availability <?= $tersedia ? 'available' : 'unavailable' ?>"><?= e($destinasi->getStatusLabel()) ?></span></div><a href="booking.php?activity=<?= rawurlencode($destinasi->getCategoryLabel()) ?>&amp;destination=<?= rawurlencode($destinasi->getLocation()) ?>" aria-label="Pesan <?= e($destinasi->getTitle()) ?>">↗</a></div></div>
          </article>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="empty-state">Pengalaman belum tersedia. Silakan kembali lagi nanti.</p>
      <?php endif; ?>
    </div>
    <div class="center-action"><a class="btn-outline" href="booking.php">Rencanakan perjalananmu <span>↗</span></a></div>
    <p class="ssr-note">Katalog ini dibuat secara dinamis menggunakan object PHP dari class <code>Destination</code>, method, dan perulangan <code>foreach</code>.</p>
  </section>

  <section class="locations-section">
    <div class="location-art"><img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=1100&q=85" alt="Pemandangan kepulauan Indonesia"><span class="map-stamp">THE<br>INDONESIAN<br>ARCHIPELAGO</span></div>
    <div class="location-copy"><p class="eyebrow"><span></span> 03 / A WORLD OF ISLANDS</p><h2>Dari satu pulau<br>ke <em>seribu kemungkinan.</em></h2><p>Jelajahi tempat baru dengan bantuan peta. Temukan aktivitas di sekitar tujuanmu dan lanjutkan ke halaman pemesanan dengan lebih mudah.</p><a class="btn-gold" href="maps.html">Jelajahi peta Indonesia <span>↗</span></a><div class="location-foot"><span>17.000+ PULAU</span><span>SATU TEMPAT UNTUK MEMULAI</span></div></div>
  </section>

  <section class="guest-section" id="cerita"><div class="guest-heading"><p class="eyebrow dark">04 / NOTES FROM THE ROAD</p><h2>Cerita kecil,<br><em>kenangan yang tinggal.</em></h2><p>Setiap perjalanan meninggalkan sesuatu — sudut pandang baru, teman baru, atau alasan untuk kembali.</p></div><div class="guest-cards"><article><span class="quote-mark">“</span><p>Rasanya menyenangkan bisa menemukan aktivitas dan informasi destinasi tanpa harus membuka banyak situs berbeda.</p><div class="guest-person"><span>AR</span><div><strong>Andra R.</strong><small>Weekend explorer</small></div></div></article><article><span class="quote-mark">“</span><p>Perjalanan ke alam selalu mengingatkanku untuk memperlambat langkah dan menikmati hal sederhana.</p><div class="guest-person"><span>NS</span><div><strong>Nadia S.</strong><small>Nature enthusiast</small></div></div></article><article><span class="quote-mark">“</span><p>Bagian favoritku adalah mencari pengalaman baru yang belum pernah terpikirkan sebelumnya.</p><div class="guest-person"><span>DP</span><div><strong>Dimas P.</strong><small>Curious traveler</small></div></div></article></div><p class="testimonial-note">Contoh tampilan testimoni untuk prototipe UI.</p></section>

  <section class="final-cta"><div><p class="eyebrow"><span></span> YOUR NEXT CHAPTER STARTS HERE</p><h2>Tempat baru sedang<br><em>menunggumu.</em></h2></div><a class="btn-gold" href="booking.php">Mulai rencanakan <span>↗</span></a></section>
</main>
<footer class="footer"><a class="brand" href="index.php"><span class="brand-symbol">E</span><span>explore<span class="brand-light">hub</span><small>JOURNEYS WITH MEANING</small></span></a><p>Jelajahi Indonesia. Temukan ceritamu.</p><div><a href="#pengalaman">Pengalaman</a><a href="maps.html">Peta</a><a href="booking.php">Booking</a></div><small>© 2026 ExploreHub · Proyek Pemrograman Web · <?= e($periodeImplementasi) ?></small></footer>
</body></html>
