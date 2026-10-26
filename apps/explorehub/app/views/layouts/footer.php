<?php
/**
 * ==============================================================================
 * ExploreHub — View Layout: Footer
 * From OOP to MVC — Task 03: View Layer
 * ==============================================================================
 */
?>
  <!-- SITE FOOTER -->
  <footer class="site-footer">
    <div class="footer-brand"><span class="brand-mark">EH</span><strong><?= htmlspecialchars($platform['name'] ?? 'ExploreHub'); ?></strong></div>
    <p><?= htmlspecialchars($platform['tagline'] ?? ''); ?> · Arsitektur MVC (Model-View-Controller)</p>
    <div class="footer-links">
      <a href="index.html">Beranda</a>
      <a href="program-prioritas.php">Program Prioritas (MVC)</a>
      <a href="maps.html">Peta</a>
      <a href="booking.html">Booking</a>
    </div>
    <small>© <?= date('Y'); ?> ExploreHub · Praktikum Pemrograman Web Laboratorium Informatika UMM</small>
  </footer>

</body>
</html>
