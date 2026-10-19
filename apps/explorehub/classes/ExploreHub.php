<?php
/**
 * ==============================================================================
 * ExploreHub — Class ExploreHub (Platform Manager & Entity)
 * Pertemuan 6 Web Programming: From Procedural to Object-Oriented (Sprint 05)
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * 
 * • Task 01: Create a Class (Representasi Platform ExploreHUB analogi Class President)
 * • Task 02: Add Properties and Methods (Encapsulation, Constructor, getProfile, getPrograms)
 * • Task 03: Generate Dynamic Content with Object
 * ==============================================================================
 */

require_once __DIR__ . '/AdventureProgram.php';

if (!class_exists('ExploreHub')) {
    class ExploreHub
    {
        // ----------------------------------------------------------------------
        // Task 02: Properties (Encapsulation: Private Access Modifier)
        // ----------------------------------------------------------------------
        private string $name;           // Nama platform / entitas utama
        private string $period;         // Periode operasional / musim (sesuai property $period di slide)
        private string $tagline;        // Tagline platform
        private string $status;         // Status layanan (Buka & Reservasi Aktif)
        private string $operationalHub; // Pusat operasional
        private string $contact;        // Kontak resmi
        /** @var AdventureProgram[] Koleksi objek paket petualangan */
        private array $programs;        // Daftar program (sesuai property $programs di slide)

        /**
         * Task 02: Constructor untuk Inisialisasi Object
         */
        public function __construct(
            string $name,
            string $period,
            string $tagline,
            string $status,
            string $operationalHub,
            string $contact,
            array $programs = []
        ) {
            $this->name           = $name;
            $this->period         = $period;
            $this->tagline        = $tagline;
            $this->status         = $status;
            $this->operationalHub = $operationalHub;
            $this->contact        = $contact;
            $this->programs       = $programs;
        }

        // ----------------------------------------------------------------------
        // Task 02: Getter Methods (Encapsulation)
        // ----------------------------------------------------------------------
        public function getName(): string { return $this->name; }
        public function getPeriod(): string { return $this->period; }
        public function getTagline(): string { return $this->tagline; }
        public function getStatus(): string { return $this->status; }
        public function getOperationalHub(): string { return $this->operationalHub; }
        public function getContact(): string { return $this->contact; }

        /**
         * Task 02: Method getProfile() sesuai struktur Slide 2, 3, 5, 10
         */
        public function getProfile(): string
        {
            return $this->name . " — " . $this->period;
        }

        /**
         * Task 02: Method getPrograms() sesuai struktur Slide 3, 8, 10
         * @return AdventureProgram[]
         */
        public function getPrograms(): array
        {
            return $this->programs;
        }

        /**
         * Menambahkan object AdventureProgram ke dalam koleksi
         */
        public function addProgram(AdventureProgram $program): void
        {
            $this->programs[] = $program;
        }

        /**
         * Task 02: Filter & Pencarian Program secara OOP
         * @return AdventureProgram[]
         */
        public function filterPrograms(string $category = 'all', string $query = ''): array
        {
            $category = strtolower(trim($category));
            $query    = strtolower(trim($query));

            return array_values(array_filter($this->programs, function (AdventureProgram $item) use ($category, $query) {
                $matchCat = ($category === 'all' || empty($category) || strtolower($item->getCategory()) === $category);
                $matchQuery = empty($query) ||
                    (stripos($item->getName(), $query) !== false) ||
                    (stripos($item->getLocation(), $query) !== false) ||
                    (stripos($item->getCategoryLabel(), $query) !== false) ||
                    (stripos($item->getDescription(), $query) !== false);

                return $matchCat && $matchQuery;
            }));
        }

        /**
         * Total jumlah program prioritas
         */
        public function getTotalPrograms(): int
        {
            return count($this->programs);
        }

        /**
         * Rentang harga paket (min - max)
         */
        public function getPriceRange(): string
        {
            if (empty($this->programs)) {
                return "Rp 0";
            }
            $prices = array_map(fn(AdventureProgram $p) => $p->getPrice(), $this->programs);
            return "Rp " . number_format(min($prices), 0, ',', '.') . " - Rp " . number_format(max($prices), 0, ',', '.');
        }

        /**
         * Rata-rata biaya paket per orang
         */
        public function getAveragePrice(): string
        {
            if (empty($this->programs)) {
                return "Rp 0";
            }
            $prices = array_map(fn(AdventureProgram $p) => $p->getPrice(), $this->programs);
            $avg = round(array_sum($prices) / count($prices));
            return "Rp " . number_format($avg, 0, ',', '.');
        }
    }
}
