<?php
/**
 * ==============================================================================
 * ExploreHub — View Component: Program Card
 * From OOP to MVC — Task 03: View Layer
 * 
 * Menerima variabel:
 * - $prog: Instance of AdventureProgram
 * - $nomorUrut: Format string penomoran (#01, #02, dst.)
 * ==============================================================================
 */
/** @var AdventureProgram $prog */
?>
<article class="program-card">
  <div class="program-media">
    <img src="<?= htmlspecialchars($prog->getImage()); ?>" alt="<?= htmlspecialchars($prog->getName()); ?>" loading="lazy">
    <!-- Penomoran Dinamis -->
    <span class="program-number-badge">#<?= $nomorUrut; ?> PRIORITAS</span>
    
    <div class="program-status-wrap">
      <!-- Status Badge dari Method Model -->
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

    <!-- Metadata List Program dari Method Model -->
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

    <!-- Fasilitas Paket dari Array Model -->
    <div class="facilities-wrap">
      <span class="label">Fasilitas Termasuk:</span>
      <div class="facilities-chips">
        <?php foreach ($prog->getFacilities() as $fac): ?>
          <span class="fac-chip">✓ <?= htmlspecialchars($fac); ?></span>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Card Footer: Harga & Booking CTA dari Method Model -->
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
