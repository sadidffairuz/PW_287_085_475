
document.addEventListener("DOMContentLoaded", () => {
  // Mobile navigation
  const navToggle = document.querySelector("#navToggle");
  const navLinks = document.querySelector("#navLinks");

  if (navToggle && navLinks) {
    navToggle.addEventListener("click", () => {
      navLinks.classList.toggle("open");
      const expanded = navLinks.classList.contains("open");
      navToggle.setAttribute("aria-expanded", expanded);
    });
  }

  // Sprint 02: complete interaction
  // User selects a package, date, and participant count.
  // JavaScript calculates an estimate and updates the DOM
  // without reloading the page.
  const bookingForm = document.querySelector("#bookingForm");
  const bookingMessage = document.querySelector("#bookingMessage");

  if (bookingForm && bookingMessage) {
    bookingForm.addEventListener("submit", (event) => {
      event.preventDefault();

      const packageSelect = document.querySelector("#package");
      const dateInput = document.querySelector("#bookingDate");
      const participantsInput = document.querySelector("#participants");

      const packageName = packageSelect.value;
      const packagePrice = Number(packageSelect.selectedOptions[0]?.dataset.price || 0);
      const date = dateInput.value;
      const participants = Number(participantsInput.value);

      if (!packageName || !date || participants < 1) {
        bookingMessage.className = "form-message show error";
        bookingMessage.textContent = "Lengkapi paket, tanggal, dan jumlah peserta terlebih dahulu.";
        return;
      }

      const total = packagePrice * participants;
      const formattedTotal = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        maximumFractionDigits: 0
      }).format(total);

      const selectedDate = new Date(`${date}T00:00:00`);
      const readableDate = selectedDate.toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric"
      });

      bookingMessage.className = "form-message show success";
      bookingMessage.innerHTML = `
        <strong>Jadwal tersedia untuk simulasi booking.</strong><br>
        ${packageName} · ${participants} peserta · ${readableDate}<br>
        Estimasi biaya: <strong>${formattedTotal}</strong>.
        <br><small>Ini masih prototype Sprint 02; belum ada pembayaran atau penyimpanan booking ke database.</small>
      `;
    });
  }

  // Simple "detail program" interaction for service cards
  document.querySelectorAll("[data-service-detail]").forEach((button) => {
    button.addEventListener("click", () => {
      const targetId = button.dataset.serviceDetail;
      const detail = document.querySelector(`#${targetId}`);
      if (!detail) return;

      detail.hidden = !detail.hidden;
      button.textContent = detail.hidden ? "Lihat Detail" : "Sembunyikan Detail";
    });
  });
});
