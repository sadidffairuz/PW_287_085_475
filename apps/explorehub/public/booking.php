<?php
// TASK 01 — Variabel PHP untuk halaman dan proses reservasi ExploreHub.
$namaPlatform = 'ExploreHub';
$judulHalaman = 'Rencanakan perjalanan tanpa ribet.';
$daftarAktivitas = ['Rafting', 'Camping', 'Offroad', 'Trekking', 'Diving & Snorkeling', 'Paralayang', 'Outbound', 'Wisata Alam', 'Air & Laut', 'Gunung & Alam', 'Adrenalin', 'Budaya & Tradisi'];
$aktivitas = trim($_POST['activity'] ?? $_GET['activity'] ?? '');
$destinasi = trim($_POST['destination'] ?? $_GET['destination'] ?? '');
$tanggal = trim($_POST['date'] ?? '');
$jumlahPeserta = trim($_POST['people'] ?? '2');
$namaPemesan = trim($_POST['name'] ?? '');
$nomorTelepon = trim($_POST['phone'] ?? '');
$catatan = trim($_POST['notes'] ?? '');
$errors = [];
$bookingTerkirim = false;

// TASK 02 — Conditional untuk validasi data form yang dikirim dengan method POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($aktivitas === '') $errors[] = 'Silakan pilih pengalaman yang ingin dipesan.';
    if ($destinasi === '') $errors[] = 'Destinasi wajib diisi.';
    if ($tanggal === '') {
        $errors[] = 'Tanggal perjalanan wajib dipilih.';
    } elseif ($tanggal < date('Y-m-d')) {
        $errors[] = 'Tanggal perjalanan tidak boleh berada di masa lalu.';
    }
    if (filter_var($jumlahPeserta, FILTER_VALIDATE_INT) === false || (int) $jumlahPeserta < 1) $errors[] = 'Jumlah peserta minimal 1 orang.';
    if ($namaPemesan === '') $errors[] = 'Nama pemesan wajib diisi.';
    if ($nomorTelepon === '') $errors[] = 'Nomor WhatsApp wajib diisi.';
    if (!$errors) $bookingTerkirim = true;
}

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking — <?= e($namaPlatform) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="booking-page">
  <header class="booking-nav">
    <a class="brand light-brand" href="index.php"><span class="brand-mark">EH</span><span>Explore<span>Hub</span></span></a>
    <nav><a href="index.php">Beranda</a><a href="maps.html">Peta</a><a href="index.php#pengalaman">Pengalaman</a></nav>
    <a class="whatsapp-top" href="https://wa.me/6281234567890?text=Halo%20ExploreHub%2C%20saya%20ingin%20bertanya%20tentang%20booking." target="_blank" rel="noopener">◉ WhatsApp</a>
  </header>
  <main class="booking-main">
    <section class="booking-intro">
      <p class="eyebrow">RESERVASI PENGALAMAN · PHP SERVER-SIDE</p>
      <h1>Rencanakan perjalanan<br><em>tanpa ribet.</em></h1>
      <p>Pilih destinasi, tanggal, dan jumlah peserta. Data form diproses oleh PHP di server sebelum hasilnya dikirim kembali sebagai HTML.</p>
      <div class="booking-trust"><span>01 Pilih</span><span>02 Validasi PHP</span><span>03 Konfirmasi</span></div>
    </section>
    <section class="booking-card">
      <div class="booking-card-top"><div><small>EXPLOREHUB BOOKING</small><h2><?= $bookingTerkirim ? 'Ringkasan reservasi' : 'Mulai reservasi' ?></h2></div><span class="status-pill">● <?= $bookingTerkirim ? 'Data valid' : 'Form aktif' ?></span></div>
      <?php if ($errors): ?>
        <div class="php-alert" role="alert"><strong>Periksa kembali data kamu:</strong><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div>
      <?php endif; ?>
      <?php if ($bookingTerkirim): ?>
        <div class="booking-success"><span class="success-icon">✓</span><div><small>PERMINTAAN SIAP</small><h3>Terima kasih, <?= e($namaPemesan) ?>!</h3><p>Permintaan <?= e($aktivitas) ?> di <?= e($destinasi) ?> untuk <?= e($jumlahPeserta) ?> peserta pada <?= e(date('d-m-Y', strtotime($tanggal))) ?> sudah divalidasi di sisi server.</p>
        <p><strong>Nomor WhatsApp:</strong> <?= e($nomorTelepon) ?></p><?php if ($catatan !== ''): ?><p><strong>Catatan:</strong> <?= e($catatan) ?></p><?php endif; ?>
        <?php $pesanWA = "Halo ExploreHub, saya {$namaPemesan} ingin konfirmasi {$aktivitas} di {$destinasi}, tanggal {$tanggal}, untuk {$jumlahPeserta} peserta. WhatsApp saya {$nomorTelepon}. Catatan: {$catatan}"; ?>
        <a class="button button-green" href="https://wa.me/6281234567890?text=<?= rawurlencode($pesanWA) ?>" target="_blank" rel="noopener">Konfirmasi via WhatsApp →</a>
        <p class="form-note">Prototype Week 5: data sudah diproses oleh PHP, tetapi belum disimpan ke database.</p><p><a href="booking.php">Buat reservasi lain</a></p></div></div>
      <?php else: ?>
      <form id="bookingForm" method="POST" action="booking.php">
        <div class="form-group full"><label for="activity">Pengalaman</label><select id="activity" name="activity" required><option value="">Pilih pengalaman</option><?php foreach ($daftarAktivitas as $pilihan): ?><option value="<?= e($pilihan) ?>" <?= $aktivitas === $pilihan ? 'selected' : '' ?>><?= e($pilihan) ?></option><?php endforeach; ?></select></div>
        <div class="form-grid">
          <div class="form-group"><label for="destination">Destinasi</label><input id="destination" name="destination" type="text" placeholder="Kota / daerah" value="<?= e($destinasi) ?>" required></div>
          <div class="form-group"><label for="date">Tanggal</label><input id="date" name="date" type="date" min="<?= date('Y-m-d') ?>" value="<?= e($tanggal) ?>" required></div>
          <div class="form-group"><label for="people">Jumlah peserta</label><input id="people" name="people" type="number" min="1" value="<?= e($jumlahPeserta) ?>" required></div>
          <div class="form-group"><label for="name">Nama pemesan</label><input id="name" name="name" type="text" placeholder="Nama lengkap" value="<?= e($namaPemesan) ?>" required></div>
          <div class="form-group"><label for="phone">Nomor WhatsApp</label><input id="phone" name="phone" type="tel" placeholder="08xxxxxxxxxx" value="<?= e($nomorTelepon) ?>" required></div>
          <div class="form-group"><label for="notes">Catatan <span>(opsional)</span></label><input id="notes" name="notes" type="text" placeholder="Contoh: butuh jemputan" value="<?= e($catatan) ?>"></div>
        </div>
        <button class="submit-booking" type="submit">Validasi &amp; Siapkan Booking →</button>
        <p class="form-note">* Form dikirim dengan POST dan divalidasi oleh PHP. Data belum tersimpan ke database.</p>
      </form>
      <?php endif; ?>
    </section>
  </main>
</body></html>
