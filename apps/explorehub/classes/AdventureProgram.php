<?php
/**
 * ==============================================================================
 * ExploreHub — Class AdventureProgram
 * Pertemuan 6 Web Programming: From Procedural to Object-Oriented (Sprint 05)
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * 
 * • Task 01: Create a Class (Blueprint Representasi Data Paket Petualangan)
 * • Task 02: Add Properties and Methods (Encapsulation private, Constructor & Methods)
 * ==============================================================================
 */

if (!class_exists('AdventureProgram')) {
    class AdventureProgram
    {
        // ----------------------------------------------------------------------
        // Task 02: Properties (Encapsulation: Private Access Modifier)
        // ----------------------------------------------------------------------
        private string $id;
        private string $name;
        private string $category;
        private string $categoryLabel;
        private string $location;
        private string $region;
        private int $price;
        private float $rating;
        private int $reviews;
        private string $duration;
        private string $difficulty;
        private string $status;
        private string $dailyQuota;
        private string $guide;
        private string $image;
        private string $description;
        private array $facilities;

        /**
         * Task 02: Constructor untuk Inisialisasi Object
         */
        public function __construct(
            string $id,
            string $name,
            string $category,
            string $categoryLabel,
            string $location,
            string $region,
            int $price,
            float $rating,
            int $reviews,
            string $duration,
            string $difficulty,
            string $status,
            string $dailyQuota,
            string $guide,
            string $image,
            string $description,
            array $facilities = []
        ) {
            $this->id            = $id;
            $this->name          = $name;
            $this->category      = $category;
            $this->categoryLabel = $categoryLabel;
            $this->location      = $location;
            $this->region        = $region;
            $this->price         = $price;
            $this->rating        = $rating;
            $this->reviews       = $reviews;
            $this->duration      = $duration;
            $this->difficulty    = $difficulty;
            $this->status        = $status;
            $this->dailyQuota    = $dailyQuota;
            $this->guide         = $guide;
            $this->image         = $image;
            $this->description   = $description;
            $this->facilities    = $facilities;
        }

        // ----------------------------------------------------------------------
        // Task 02: Getter Methods (Encapsulation)
        // ----------------------------------------------------------------------
        public function getId(): string { return $this->id; }
        public function getName(): string { return $this->name; }
        public function getCategory(): string { return $this->category; }
        public function getCategoryLabel(): string { return $this->categoryLabel; }
        public function getLocation(): string { return $this->location; }
        public function getRegion(): string { return $this->region; }
        public function getPrice(): int { return $this->price; }
        public function getRating(): float { return $this->rating; }
        public function getReviews(): int { return $this->reviews; }
        public function getDuration(): string { return $this->duration; }
        public function getDifficulty(): string { return $this->difficulty; }
        public function getStatus(): string { return $this->status; }
        public function getDailyQuota(): string { return $this->dailyQuota; }
        public function getGuide(): string { return $this->guide; }
        public function getImage(): string { return $this->image; }
        public function getDescription(): string { return $this->description; }
        public function getFacilities(): array { return $this->facilities; }

        // ----------------------------------------------------------------------
        // Task 02: Presentation & Behavior Methods
        // ----------------------------------------------------------------------

        /**
         * Format mata uang Rupiah
         */
        public function getFormattedPrice(): string
        {
            return "Rp " . number_format($this->price, 0, ',', '.');
        }

        /**
         * Render badge status ketersediaan secara bersyarat (conditional badge)
         */
        public function getStatusBadge(): string
        {
            $statusKey = strtolower(trim($this->status));
            switch ($statusKey) {
                case 'tersedia':
                    return '<span class="php-status-badge badge-tersedia"><span class="badge-dot"></span> Tersedia</span>';
                case 'slot terbatas':
                    return '<span class="php-status-badge badge-terbatas"><span class="badge-dot"></span> Slot Terbatas</span>';
                case 'hampir penuh':
                    return '<span class="php-status-badge badge-penuh"><span class="badge-dot"></span> Hampir Penuh</span>';
                case 'musim terbaik':
                    return '<span class="php-status-badge badge-musim"><span class="badge-dot"></span> Musim Terbaik</span>';
                case 'promo spesial':
                    return '<span class="php-status-badge badge-promo"><span class="badge-dot"></span> Promo Spesial</span>';
                default:
                    return '<span class="php-status-badge badge-default">' . htmlspecialchars($this->status) . '</span>';
            }
        }

        /**
         * URL link pemesanan dinamis membawa nama aktivitas dan lokasi
         */
        public function getBookingUrl(): string
        {
            return "booking.html?activity=" . urlencode($this->name) . "&destination=" . urlencode($this->location);
        }

        /**
         * Ringkasan profil paket petualangan
         */
        public function getProfile(): string
        {
            return $this->name . " — " . $this->location . " (" . $this->getFormattedPrice() . ")";
        }
    }
}
