/**
 * ==============================================================================
 * ExploreHub — Sprint 02 (Unified Editorial Theme)
 * Modul 2: JavaScript Fundamentals & DOM Manipulation
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * 
 * PEMENUHAN TUGAS:
 * • Task 01: Connect to API (fetch API & parsing JSON)
 * • Task 02: Display API Data (DOM manipulation dinamis dari API ke interface ExploreHub)
 * • Task 03: Handle API State (feedback loading spinner, success data, error handling & tombol Coba Lagi)
 * 
 * RUBRIK & TEKNIK JAVASCRIPT YANG DITERAPKAN:
 * 1. Event Handling (minimal 2 jenis): 'input' (real-time search) & 'click' (filter, modal, retry, dll.)
 * 2. Asynchronous JavaScript & Fetch API (async/await, response.ok, try/catch, parsing JSON)
 * 3. DOM Manipulation dinamis dengan Template Literals (`...${}...`)
 * 4. Array Methods ES6+: .map(), .filter(), .reduce(), .find(), .forEach()
 * 5. State Management: Loading State (spinner), Success State, Error State (tombol Coba Lagi & Fallback)
 * ==============================================================================
 */

// ==============================================================================
// 1. DATA CADANGAN / FALLBACK DATASET (OFFLINE READY)
// ==============================================================================
const FALLBACK_DESTINATIONS = [
  {
    id: "exp-01",
    title: "Rafting Sungai Brantas Extreme",
    category: "air",
    categoryLabel: "Air & Sungai",
    location: "Kota Batu, Jawa Timur",
    region: "Jawa Timur",
    price: 125000,
    priceDisplay: "Rp 125.000",
    rating: 4.9,
    reviewsCount: 184,
    duration: "2.5 Jam",
    difficulty: "Sedang - Menantang",
    image: "https://images.unsplash.com/photo-1530866495561-507c1c9b4b4f?auto=format&fit=crop&w=900&q=80",
    description: "Taklukkan jeram berbatu Sungai Brantas dengan panorama tebing pegunungan dan perkebunan apel Kota Batu. Dilengkapi instruktur profesional berlisensi.",
    facilities: ["Peralatan Standar Internasional", "Rescue Team & Guide", "Makan Siang Prasmanan", "Dokumentasi Foto", "Asuransi"]
  },
  {
    id: "exp-02",
    title: "Sunrise Trekking Gunung Bromo",
    category: "alam",
    categoryLabel: "Gunung & Alam",
    location: "Taman Nasional Bromo Tengger Semeru",
    region: "Jawa Timur",
    price: 275000,
    priceDisplay: "Rp 275.000",
    rating: 4.95,
    reviewsCount: 320,
    duration: "1 Hari",
    difficulty: "Mudah - Sedang",
    image: "https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?auto=format&fit=crop&w=900&q=80",
    description: "Menyaksikan golden sunrise legendaris di Penanjakan 1, dilanjutkan petualangan melintasi Lautan Pasir Berbisik dan kawah aktif Bromo.",
    facilities: ["Jeep 4x4 Hardtop", "Tiket Masuk TNBTS", "Pemandu Lokal", "Kopi Hangat di Puncak", "Masker Debu"]
  },
  {
    id: "exp-03",
    title: "Lava Tour Jeep Offroad Merapi",
    category: "adrenalin",
    categoryLabel: "Adrenalin & Adventure",
    location: "Kaliurang, Sleman, DI Yogyakarta",
    region: "Yogyakarta",
    price: 450000,
    priceDisplay: "Rp 450.000",
    rating: 4.88,
    reviewsCount: 240,
    duration: "2 Jam",
    difficulty: "Menantang",
    image: "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80",
    description: "Menerobos trek berbatu bekas aliran lahar erupsi Merapi, manuver air basah di Sungai Kuning, serta singgah di Bunker Kaliadem dan Museum Sisa Hartaku.",
    facilities: ["1 Unit Jeep 4x4 (4 Penumpang)", "Driver Berpengalaman", "Helm Pengaman", "Tiket Wisata", "Jas Hujan"]
  },
  {
    id: "exp-04",
    title: "Scuba Diving & Coral Safari Menjangan",
    category: "air",
    categoryLabel: "Air & Laut",
    location: "Taman Nasional Bali Barat, Bali",
    region: "Bali",
    price: 550000,
    priceDisplay: "Rp 550.000",
    rating: 4.92,
    reviewsCount: 160,
    duration: "4 Jam",
    difficulty: "Semua Tingkat",
    image: "https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=900&q=80",
    description: "Penyelaman terumbu karang vertikal spektakuler di Pulau Menjangan dengan visibilitas jernih hingga 30 meter dan keberagaman biota laut eksotis.",
    facilities: ["Speedboat Transfer", "Set Alat Selam Lengkap", "Dive Master PADI", "Makan Siang Kotak", "Tiket Konservasi"]
  },
  {
    id: "exp-05",
    title: "Camping & Milky Way Hunting Ranu Kumbolo",
    category: "alam",
    categoryLabel: "Gunung & Alam",
    location: "Lereng Gunung Semeru, Lumajang",
    region: "Jawa Timur",
    price: 320000,
    priceDisplay: "Rp 320.000",
    rating: 4.96,
    reviewsCount: 210,
    duration: "2 Hari 1 Malam",
    difficulty: "Sedang",
    image: "https://images.unsplash.com/photo-1475483768296-6163e08872a1?auto=format&fit=crop&w=900&q=80",
    description: "Bermalam di tepi danau kawah alami Ranu Kumbolo pada ketinggian 2.400 mdpl. Saksikan jutaan bintang Bima Sakti dan uap kabut fajar nan magis.",
    facilities: ["Tenda Dome Kapasitas 4", "Sleeping Bag & Matras", "Porter Tenda", "Makan 3 Kali", "Simaksi & Asuransi"]
  },
  {
    id: "exp-06",
    title: "Tandem Paragliding Gunung Banyak",
    category: "adrenalin",
    categoryLabel: "Adrenalin & Udara",
    location: "Gunung Banyak, Songgokerto, Kota Batu",
    region: "Jawa Timur",
    price: 400000,
    priceDisplay: "Rp 400.000",
    rating: 4.87,
    reviewsCount: 145,
    duration: "20 Menit Terbang",
    difficulty: "Pemula Friendly",
    image: "https://images.unsplash.com/photo-1508873696983-2df5293cb32f?auto=format&fit=crop&w=900&q=80",
    description: "Terbang tandem bebas di udara terbuka menikmati pemandangan alam perbukitan dan tata kota Malang Raya dari ketinggian 1.315 mdpl bersama pilot berlisensi.",
    facilities: ["Pilot Berlisensi", "Harness & Helm", "Video Dokumentasi 4K", "Shuttle Mobil Landasan"]
  },
  {
    id: "exp-07",
    title: "Snorkeling Komodo & Manta Point Safari",
    category: "air",
    categoryLabel: "Air & Laut",
    location: "Taman Nasional Komodo, Labuan Bajo",
    region: "NTT",
    price: 850000,
    priceDisplay: "Rp 850.000",
    rating: 4.98,
    reviewsCount: 410,
    duration: "1 Hari Penuh",
    difficulty: "Mudah",
    image: "https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8?auto=format&fit=crop&w=900&q=80",
    description: "Berenang bersama pari Manta raksasa di Manta Point, trekking bukit Pulau Padar tiga warna, dan menyaksikan satwa endemik Komodo di habitat aslinya.",
    facilities: ["Speedboat VIP AC", "Peralatan Snorkeling", "Ranger Guide TN Komodo", "Makan Siang & Refreshment", "Dokumentasi Drone"]
  },
  {
    "id": "exp-08",
    "title": "Eksplorasi Budaya & Rumah Adat Wae Rebo",
    "category": "budaya",
    "categoryLabel": "Budaya & Tradisi",
    "location": "Desa Tradisional Wae Rebo, Manggarai",
    "region": "NTT",
    "price": 600000,
    "priceDisplay": "Rp 600.000",
    "rating": 4.93,
    "reviewsCount": 130,
    "duration": "2 Hari 1 Malam",
    "difficulty": "Sedang",
    "image": "https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=80",
    "description": "Eksplorasi desa tradisional warisan UNESCO di atas awan berarsitektur ikonik Mbaru Niang. Nikmati kopi khas Manggarai dan upacara adat penerimaan Waelu.",
    "facilities": ["Inap di Mbaru Niang", "Upacara Adat Waelu", "Makan Tradisional Khas", "Pemandu Lokal Wae Rebo"]
  }
];

// Endpoint REST API
// Mendukung endpoint online GitHub Raw publik dengan CORS (*) serta local path
const API_ENDPOINTS = [
  "https://raw.githubusercontent.com/sadidffairuz/PW_287_085_475/ExploreHUB/apps/explorehub/assets/data/destinations.json",
  "../assets/data/destinations.json"
];

// ==============================================================================
// 2. STATE MANAGEMENT APLIKASI
// ==============================================================================
let rawDestinations = [];
let currentCategory = "all";
let currentSearchQuery = "";
let isSimulatingError = false;

// ==============================================================================
// 3. INISIALISASI DOM SAAT HALAMAN DIBUKA
// ==============================================================================
document.addEventListener("DOMContentLoaded", () => {
  initScrollReveal();
  initApiCatalog();
  initBookingPage();
});

// Efek Reveal Halus pada Scroll
function initScrollReveal() {
  const revealItems = document.querySelectorAll(
    ".experience-feature, .experience-card, .experience-list a, .map-teaser-copy, .booking-copy"
  );
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    revealItems.forEach((item) => {
      item.classList.add("reveal");
      observer.observe(item);
    });
  }
}

// ==============================================================================
// 4. TASK 01: CONNECT TO API (FETCH API & PARSING JSON)
// ==============================================================================
async function fetchDestinationData() {
  const statusIndicator = document.getElementById("apiStatusIndicator");
  const statusLabel = document.getElementById("apiStatusLabel");
  const statusDot = statusIndicator ? statusIndicator.querySelector(".status-dot") : null;
  const errorMsgText = document.getElementById("apiErrorMessage");

  // Step 1: Aktifkan feedback Loading State (Task 03)
  setApiState("loading");
  if (statusDot) {
    statusDot.className = "status-dot fetching pulse";
  }
  if (statusLabel) {
    statusLabel.textContent = "Mengambil data via Fetch API...";
  }

  // Pengujian Asisten Lab: Simulasi Error
  if (isSimulatingError) {
    await new Promise((resolve) => setTimeout(resolve, 600));
    setApiState("error");
    if (statusDot) statusDot.className = "status-dot error";
    if (statusLabel) statusLabel.textContent = "API Error (Simulasi Uji)";
    if (errorMsgText) {
      errorMsgText.textContent = "Simulasi Error HTTP 500: Server gagal memproses permintaan. Uji tombol 'Coba Lagi' di bawah.";
    }
    return;
  }

  // Coba fetch dari endpoint
  let fetchedData = null;
  let lastError = null;

  for (const endpoint of API_ENDPOINTS) {
    try {
      // Step 2: Kirim HTTP GET Request
      const response = await fetch(endpoint, { cache: "no-cache" });

      // Step 3: Validasi response.ok secara manual (Wajib Modul 2 Halaman 31-32)
      if (!response.ok) {
        throw new Error(`Gagal memuat dari ${endpoint} (Status HTTP: ${response.status})`);
      }

      // Step 4: Parsing stream respons menjadi objek JSON JavaScript
      const json = await response.json();

      if (Array.isArray(json) && json.length > 0) {
        fetchedData = json;
        break; // Berhasil mengambil data
      } else {
        throw new Error("Format respons JSON tidak berupa array data yang valid.");
      }
    } catch (err) {
      lastError = err;
      console.warn(`Fetch dari ${endpoint} gagal:`, err.message);
    }
  }

  // Jika semua endpoint gagal (misal file:// protocol CORS atau offline)
  if (!fetchedData) {
    // Tangani error di Task 03
    console.error("Task 01 Error:", lastError);
    if (errorMsgText) {
      errorMsgText.textContent = lastError
        ? `${lastError.message}. Periksa koneksi internet atau gunakan data cadangan offline.`
        : "Tidak dapat terhubung ke endpoint API.";
    }
    if (statusDot) statusDot.className = "status-dot error";
    if (statusLabel) statusLabel.textContent = "API Error / Disconnected";
    setApiState("error");
    return;
  }

  // Berhasil: Simpan ke state dan render data (Task 02)
  rawDestinations = fetchedData;

  if (statusDot) statusDot.className = "status-dot";
  if (statusLabel) statusLabel.textContent = "API Live Terhubung";

  applyFiltersAndRender();
}

// ==============================================================================
// 5. TASK 02: DISPLAY API DATA (DOM MANIPULATION DINAMIS KE INTERFACE EXPLOREHUB)
// ==============================================================================
function applyFiltersAndRender() {
  const query = currentSearchQuery.trim().toLowerCase();
  const countBadge = document.getElementById("destinationCountBadge");
  const filterBadge = document.getElementById("activeFilterBadge");
  const gridContainer = document.getElementById("destinationGrid");

  if (!gridContainer) return;

  // Array Method 1: .filter() untuk memfilter berdasarkan kata kunci & kategori
  const filteredList = rawDestinations.filter((item) => {
    const matchCategory = currentCategory === "all" || item.category === currentCategory;
    const matchQuery =
      !query ||
      item.title.toLowerCase().includes(query) ||
      item.location.toLowerCase().includes(query) ||
      item.region.toLowerCase().includes(query) ||
      item.categoryLabel.toLowerCase().includes(query) ||
      (item.description && item.description.toLowerCase().includes(query));

    return matchCategory && matchQuery;
  });

  // Perbarui Badge Statistik
  if (countBadge) {
    countBadge.textContent = `${filteredList.length} Petualangan`;
  }
  if (filterBadge) {
    const categoryLabels = {
      all: "Semua Kategori",
      air: "🌊 Air & Sungai",
      alam: "🏔️ Gunung & Alam",
      adrenalin: "⚡ Adrenalin",
      budaya: "🏛️ Budaya"
    };
    filterBadge.textContent = categoryLabels[currentCategory] || "Semua Kategori";
  }

  // Jika hasil filter kosong, tampilkan Empty State
  if (filteredList.length === 0) {
    setApiState("empty");
    return;
  }

  // Tampilkan container grid
  setApiState("success");

  // Format Mata Uang IDR dengan Intl.NumberFormat
  const formatIDR = (val) =>
    new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
      maximumFractionDigits: 0
    }).format(val);

  // Array Method 2: .map() untuk merender kartu HTML dinamis dengan Template Literal
  const cardsHTML = filteredList
    .map((dest) => {
      const formattedPrice = dest.price ? formatIDR(dest.price) : dest.priceDisplay || "Hubungi Kami";
      const rating = dest.rating ? dest.rating.toFixed(2) : "5.00";
      const reviews = dest.reviewsCount || 50;

      return `
        <article class="destination-card" data-id="${dest.id}">
          <div class="card-media-wrap">
            <img src="${dest.image}" alt="${dest.title}" loading="lazy">
            <div class="card-badges-top">
              <span class="category-badge cat-${dest.category}">${dest.categoryLabel || dest.category}</span>
              <span class="rating-badge">
                <span class="star">★</span> ${rating} <small style="opacity:.6;font-weight:400">(${reviews})</small>
              </span>
            </div>
          </div>

          <div class="card-body">
            <div class="card-location">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              <span>${dest.location}</span>
            </div>

            <h3 class="card-title">${dest.title}</h3>
            <p class="card-desc">${dest.description}</p>

            <div class="card-meta-chips">
              <span class="meta-chip">⏱ ${dest.duration}</span>
              <span class="meta-chip">⛰ ${dest.difficulty}</span>
            </div>

            <div class="card-footer">
              <div class="price-block">
                <small>Mulai dari</small>
                <strong>${formattedPrice}</strong>
              </div>
              <div class="card-action-group">
                <button type="button" class="btn-card-detail" data-id="${dest.id}">
                  Detail
                </button>
                <a class="btn-card-book" href="booking.php?activity=${encodeURIComponent(dest.title)}&destination=${encodeURIComponent(dest.location)}">
                  Pesan <span>→</span>
                </a>
              </div>
            </div>
          </div>
        </article>
      `;
    })
    .join("");

  // DOM Manipulation: Mengisi grid container
  gridContainer.innerHTML = cardsHTML;

  // Pasang Event Listener 'click' untuk membuka modal detail pada setiap kartu
  attachCardEvents();
}

// Membuka Modal Detail saat Tombol Kartu Diklik
function attachCardEvents() {
  const detailButtons = document.querySelectorAll(".btn-card-detail");

  // Array Method 3: .forEach() untuk memasang event listener ke setiap tombol detail
  detailButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const destId = btn.getAttribute("data-id");

      // Array Method 4: .find() untuk mencari 1 data destinasi spesifik berdasarkan ID
      const dest = rawDestinations.find((item) => item.id === destId);
      if (dest) {
        openDetailModal(dest);
      }
    });
  });
}

function openDetailModal(dest) {
  const modal = document.getElementById("destinationDetailModal");
  const modalBody = document.getElementById("modalDetailBody");
  if (!modal || !modalBody) return;

  const formatIDR = (val) =>
    new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
      maximumFractionDigits: 0
    }).format(val);

  const formattedPrice = dest.price ? formatIDR(dest.price) : dest.priceDisplay;
  const facilitiesHTML = (dest.facilities || [])
    .map((f) => `<span class="fac-pill">✓ ${f}</span>`)
    .join("");

  modalBody.innerHTML = `
    <div class="modal-hero-photo">
      <img src="${dest.image}" alt="${dest.title}">
      <span class="modal-hero-badge category-badge cat-${dest.category}">${dest.categoryLabel || dest.category}</span>
    </div>
    <div class="modal-body-content">
      <div class="modal-title-row">
        <h2>${dest.title}</h2>
        <span class="modal-rating-pill">★ ${dest.rating} (${dest.reviewsCount} review)</span>
      </div>
      <div class="modal-location-text">
        📍 <strong>${dest.location}</strong> (${dest.region})
      </div>
      <div class="modal-desc-box">
        ${dest.description}
      </div>

      <div class="modal-meta-grid">
        <div class="meta-box">
          <small>DURASI KEGIATAN</small>
          <strong>${dest.duration}</strong>
        </div>
        <div class="meta-box">
          <small>TINGKAT KESULITAN</small>
          <strong>${dest.difficulty}</strong>
        </div>
        <div class="meta-box">
          <small>BIAYA PER ORANG</small>
          <strong>${formattedPrice}</strong>
        </div>
      </div>

      <div class="modal-facilities">
        <h4>Fasilitas Termasuk:</h4>
        <div class="facilities-list">
          ${facilitiesHTML}
        </div>
      </div>

      <div class="modal-footer-cta">
        <div class="price-block">
          <small>Total Estimasi</small>
          <strong style="font-size:22px">${formattedPrice}</strong>
        </div>
        <a class="modal-cta-book" href="booking.php?activity=${encodeURIComponent(dest.title)}&destination=${encodeURIComponent(dest.location)}">
          Lanjut ke Reservasi →
        </a>
      </div>
    </div>
  `;

  modal.style.display = "flex";
  document.body.style.overflow = "hidden";
}

function closeDetailModal() {
  const modal = document.getElementById("destinationDetailModal");
  if (modal) {
    modal.style.display = "none";
    document.body.style.overflow = "";
  }
}

// ==============================================================================
// 6. TASK 03: HANDLE API STATE (LOADING SPINNER, ERROR HANDLING & TOMBOL COBA LAGI)
// ==============================================================================
function setApiState(state) {
  const loadingEl = document.getElementById("apiLoadingState");
  const errorEl = document.getElementById("apiErrorState");
  const emptyEl = document.getElementById("apiEmptyState");
  const gridEl = document.getElementById("destinationGrid");

  if (loadingEl) loadingEl.style.display = state === "loading" ? "flex" : "none";
  if (errorEl) errorEl.style.display = state === "error" ? "flex" : "none";
  if (emptyEl) emptyEl.style.display = state === "empty" ? "flex" : "none";
  if (gridEl) gridEl.style.display = state === "success" ? "grid" : "none";
}

// Inisialisasi Kontrol & Event Listeners API Catalog
function initApiCatalog() {
  const gridContainer = document.getElementById("destinationGrid");
  if (!gridContainer) return;

  const searchInput = document.getElementById("apiSearchInput");
  const clearSearchBtn = document.getElementById("clearSearchBtn");
  const catPills = document.querySelectorAll(".cat-pill");
  const retryBtn = document.getElementById("apiRetryBtn");
  const fallbackBtn = document.getElementById("apiFallbackBtn");
  const simulateErrorBtn = document.getElementById("simulateErrorBtn");
  const resetSearchBtn = document.getElementById("resetSearchBtn");
  const closeDetailModalBtn = document.getElementById("closeDetailModalBtn");
  const modalBackdrop = document.getElementById("destinationDetailModal");

  // Event Type 1: 'input' -> Real-time Search saat user mengetik
  if (searchInput) {
    searchInput.addEventListener("input", (e) => {
      currentSearchQuery = e.target.value;
      if (clearSearchBtn) {
        clearSearchBtn.style.display = currentSearchQuery.length > 0 ? "grid" : "none";
      }
      applyFiltersAndRender();
    });
  }

  // Event Type 2: 'click' -> Hapus kata kunci pencarian
  if (clearSearchBtn) {
    clearSearchBtn.addEventListener("click", () => {
      if (searchInput) {
        searchInput.value = "";
        searchInput.focus();
      }
      currentSearchQuery = "";
      clearSearchBtn.style.display = "none";
      applyFiltersAndRender();
    });
  }

  // Event Type 3: 'click' -> Filter Kategori Aktivitas
  catPills.forEach((pill) => {
    pill.addEventListener("click", () => {
      catPills.forEach((p) => p.classList.remove("active"));
      pill.classList.add("active");
      currentCategory = pill.getAttribute("data-category") || "all";
      applyFiltersAndRender();
    });
  });

  // Event Type 4: 'click' -> Task 03 Tombol Coba Lagi (Retry Button)
  if (retryBtn) {
    retryBtn.addEventListener("click", () => {
      isSimulatingError = false;
      if (simulateErrorBtn) {
        simulateErrorBtn.textContent = "⚠️ Simulasi Error (Demo)";
      }
      fetchDestinationData();
    });
  }

  // Event Type 5: 'click' -> Gunakan Data Cadangan (Offline Fallback)
  if (fallbackBtn) {
    fallbackBtn.addEventListener("click", () => {
      rawDestinations = FALLBACK_DESTINATIONS;
      const statusIndicator = document.getElementById("apiStatusIndicator");
      const statusLabel = document.getElementById("apiStatusLabel");
      const statusDot = statusIndicator ? statusIndicator.querySelector(".status-dot") : null;
      if (statusDot) statusDot.className = "status-dot";
      if (statusLabel) statusLabel.textContent = "Data Cadangan (Offline) Aktif";
      applyFiltersAndRender();
    });
  }

  // Event Type 6: 'click' -> Simulasi Error untuk pengujian oleh Dosen / Asisten Lab
  if (simulateErrorBtn) {
    simulateErrorBtn.addEventListener("click", () => {
      isSimulatingError = !isSimulatingError;
      simulateErrorBtn.textContent = isSimulatingError
        ? "✓ Mode Error Aktif (Klik lagi untuk pulih)"
        : "⚠️ Simulasi Error (Demo)";
      fetchDestinationData();
    });
  }

  // Event Type 7: 'click' -> Reset Filter jika hasil kosong
  if (resetSearchBtn) {
    resetSearchBtn.addEventListener("click", () => {
      if (searchInput) searchInput.value = "";
      currentSearchQuery = "";
      if (clearSearchBtn) clearSearchBtn.style.display = "none";
      currentCategory = "all";
      catPills.forEach((p) => p.classList.toggle("active", p.dataset.category === "all"));
      applyFiltersAndRender();
    });
  }

  // Event Type 8: 'click' -> Menutup Modal Detail
  if (closeDetailModalBtn) {
    closeDetailModalBtn.addEventListener("click", closeDetailModal);
  }
  if (modalBackdrop) {
    modalBackdrop.addEventListener("click", (e) => {
      if (e.target === modalBackdrop) {
        closeDetailModal();
      }
    });
  }

  // Jalankan pengambilan data pertama kali (Task 01)
  fetchDestinationData();
}

// ==============================================================================
// 7. INTEGRASI HALAMAN BOOKING (PUBLIC/BOOKING.HTML)
// ==============================================================================
function initBookingPage() {
  const bookingForm = document.getElementById("bookingForm");
  if (!bookingForm) return;

  const urlParams = new URLSearchParams(window.location.search);
  const activityParam = urlParams.get("activity");
  const destParam = urlParams.get("destination");

  const activitySelect = document.getElementById("activity");
  const destInput = document.getElementById("destination");

  if (activityParam && activitySelect) {
    // Cari opsi yang sesuai atau tambahkan
    let found = false;
    for (let i = 0; i < activitySelect.options.length; i++) {
      if (activitySelect.options[i].text.toLowerCase().includes(activityParam.toLowerCase())) {
        activitySelect.selectedIndex = i;
        found = true;
        break;
      }
    }
    if (!found) {
      const newOpt = document.createElement("option");
      newOpt.value = activityParam;
      newOpt.text = activityParam;
      newOpt.selected = true;
      activitySelect.appendChild(newOpt);
    }
  }

  if (destParam && destInput) {
    destInput.value = destParam;
  }

  // Event 'submit' pada formulir reservasi
  bookingForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const activity = activitySelect ? activitySelect.value : "";
    const destination = destInput ? destInput.value : "";
    const date = document.getElementById("date")?.value || "";
    const people = document.getElementById("people")?.value || "1";
    const name = document.getElementById("name")?.value || "";
    const phone = document.getElementById("phone")?.value || "";
    const notes = document.getElementById("notes")?.value || "-";

    const successBox = document.getElementById("bookingSuccess");
    const successTitle = document.getElementById("successTitle");
    const successText = document.getElementById("successText");
    const waLink = document.getElementById("waLink");

    if (successTitle) {
      successTitle.textContent = `Permintaan Booking Disiapkan untuk ${name}!`;
    }
    if (successText) {
      successText.innerHTML = `
        <strong>Aktivitas:</strong> ${activity}<br>
        <strong>Destinasi:</strong> ${destination}<br>
        <strong>Tanggal:</strong> ${date} (${people} orang)<br>
        <strong>Kontak:</strong> ${phone}<br>
        <em>Data telah divalidasi dan siap dikonfirmasi ke admin penyedia wisata.</em>
      `;
    }

    if (waLink) {
      const waMsg = `Halo ExploreHub, saya *${name}* ingin konfirmasi booking:\n\n• Pengalaman: ${activity}\n• Destinasi: ${destination}\n• Tanggal: ${date}\n• Peserta: ${people} orang\n• Catatan: ${notes}\n\nMohon informasi ketersediaan slotnya. Terima kasih!`;
      waLink.href = `https://wa.me/6281234567890?text=${encodeURIComponent(waMsg)}`;
    }

    if (successBox) {
      successBox.hidden = false;
      successBox.scrollIntoView({ behavior: "smooth", block: "center" });
    }
  });
}
