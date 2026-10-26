<?php
/**
 * ==============================================================================
 * ExploreHub — Model: ExploreHubModel (Data Repository & Business Logic)
 * From OOP to MVC — Task 01: Design the MVC structure & Model Layer
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * ==============================================================================
 */

require_once __DIR__ . '/AdventureProgram.php';

if (!class_exists('ExploreHubModel')) {
    class ExploreHubModel
    {
        private array $platformInfo;
        /** @var AdventureProgram[] */
        private array $programs = [];

        public function __construct()
        {
            $this->initPlatformInfo();
            $this->initPrograms();
        }

        /**
         * Inisialisasi metadata platform ExploreHUB
         */
        private function initPlatformInfo(): void
        {
            $this->platformInfo = [
                'name'           => 'ExploreHub',
                'period'         => 'Musim Petualangan & Cuaca Tropis Optimal (2026)',
                'tagline'        => 'Jelajahi Indonesia, Satu Petualangan Setiap Perjalanan',
                'status'         => 'Buka & Reservasi Aktif',
                'operationalHub' => 'Kota Batu & Labuan Bajo, Indonesia',
                'contact'        => '+62 812-3456-7890 (WhatsApp Official)',
                'summary'        => 'Platform terpadu kurasi aktivitas outdoor, ekowisata, dan petualangan menantang dari Sabang sampai Merauke berbasis arsitektur MVC (Model-View-Controller).'
            ];
        }

        /**
         * Inisialisasi koleksi data objek AdventureProgram (Repository)
         */
        private function initPrograms(): void
        {
            $this->programs = [
                new AdventureProgram(
                    "EXP-01",
                    "Rafting Sungai Brantas Extreme",
                    "air",
                    "Air & Sungai",
                    "Kota Batu, Jawa Timur",
                    "Jawa Timur",
                    125000,
                    4.9,
                    184,
                    "2.5 Jam",
                    "Sedang - Menantang",
                    "Tersedia",
                    "40 Peserta / Hari",
                    "Instruktur Berlisensi Internasional",
                    "https://images.unsplash.com/photo-1530866495561-507c1c9b4b4f?auto=format&fit=crop&w=900&q=80",
                    "Taklukkan jeram berbatu Sungai Brantas dengan panorama tebing pegunungan dan perkebunan apel Kota Batu. Paket lengkap peralatan standar internasional dan makan siang prasmanan.",
                    ["Peralatan Standar Internasional", "Rescue Team & Guide", "Makan Siang Prasmanan", "Dokumentasi Foto", "Asuransi"]
                ),
                new AdventureProgram(
                    "EXP-02",
                    "Sunrise Trekking & Lautan Pasir Bromo",
                    "alam",
                    "Gunung & Alam",
                    "Taman Nasional Bromo Tengger Semeru",
                    "Jawa Timur",
                    275000,
                    4.95,
                    320,
                    "1 Hari Penuh",
                    "Mudah - Sedang",
                    "Hampir Penuh",
                    "30 Peserta / Hari",
                    "Ranger Suku Tengger",
                    "https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?auto=format&fit=crop&w=900&q=80",
                    "Menyaksikan golden sunrise legendaris di Penanjakan 1, dilanjutkan petualangan melintasi Lautan Pasir Berbisik dan kawah aktif Bromo dengan Jeep 4x4 Hardtop.",
                    ["Jeep 4x4 Hardtop", "Tiket Masuk TNBTS", "Pemandu Lokal Tengger", "Kopi Hangat Puncak", "Masker Debu"]
                ),
                new AdventureProgram(
                    "EXP-03",
                    "Lava Tour Jeep Offroad Merapi",
                    "adrenalin",
                    "Adrenalin & Adventure",
                    "Kaliurang, Sleman, DI Yogyakarta",
                    "Yogyakarta",
                    450000,
                    4.88,
                    240,
                    "2 Jam Manuver",
                    "Menantang",
                    "Tersedia",
                    "25 Jeep / Hari",
                    "Driver Offroad Handal",
                    "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80",
                    "Menerobos trek berbatu bekas aliran lahar erupsi Merapi, manuver air basah di Sungai Kuning, serta singgah di Bunker Kaliadem dan Museum Sisa Hartaku.",
                    ["1 Unit Jeep 4x4 (4 Seat)", "Driver Berpengalaman", "Helm Pengaman", "Tiket Wisata", "Jas Hujan"]
                ),
                new AdventureProgram(
                    "EXP-04",
                    "Scuba Diving & Coral Safari Menjangan",
                    "air",
                    "Air & Laut",
                    "Taman Nasional Bali Barat, Bali",
                    "Bali",
                    550000,
                    4.92,
                    160,
                    "4 Jam Eksplorasi",
                    "Semua Tingkatan",
                    "Slot Terbatas",
                    "15 Diver / Hari",
                    "Dive Master PADI Bersertifikat",
                    "https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=900&q=80",
                    "Penyelaman terumbu karang vertikal spektakuler di Pulau Menjangan dengan visibilitas jernih hingga 30 meter dan keberagaman biota laut eksotis nusantara.",
                    ["Speedboat Transfer", "Set Alat Selam Lengkap", "Dive Master PADI", "Makan Siang Kotak", "Tiket Konservasi"]
                ),
                new AdventureProgram(
                    "EXP-05",
                    "Camping & Milky Way Hunting Ranu Kumbolo",
                    "alam",
                    "Gunung & Alam",
                    "Lereng Gunung Semeru, Lumajang",
                    "Jawa Timur",
                    320000,
                    4.96,
                    210,
                    "2 Hari 1 Malam",
                    "Sedang",
                    "Musim Terbaik",
                    "20 Tenda / Malam",
                    "Guide & Porter Gunung",
                    "https://images.unsplash.com/photo-1475483768296-6163e08872a1?auto=format&fit=crop&w=900&q=80",
                    "Bermalam di tepi danau kawah alami Ranu Kumbolo pada ketinggian 2.400 mdpl. Saksikan jutaan bintang Bima Sakti dan uap kabut fajar nan magis.",
                    ["Tenda Dome Kapasitas 4", "Sleeping Bag & Matras", "Porter Tenda", "Makan 3 Kali", "Simaksi & Asuransi"]
                ),
                new AdventureProgram(
                    "EXP-06",
                    "Tandem Paragliding Gunung Banyak",
                    "adrenalin",
                    "Adrenalin & Udara",
                    "Gunung Banyak, Songgokerto, Kota Batu",
                    "Jawa Timur",
                    400000,
                    4.87,
                    145,
                    "20 Menit Terbang",
                    "Pemula Ramah",
                    "Tersedia",
                    "18 Penerbangan / Hari",
                    "Pilot Paralayang Berlisensi FASI",
                    "https://images.unsplash.com/photo-1508873696983-2df5293cb32f?auto=format&fit=crop&w=900&q=80",
                    "Terbang tandem bebas di udara terbuka menikmati pemandangan alam perbukitan dan lanskap kota Batu dari ketinggian 1.315 mdpl bersama pilot berlisensi.",
                    ["Pilot Berlisensi FASI", "Harness & Helm", "Video Dokumentasi 4K", "Shuttle Mobil Landasan"]
                ),
                new AdventureProgram(
                    "EXP-07",
                    "Snorkeling Komodo & Manta Point Safari",
                    "air",
                    "Air & Laut",
                    "Taman Nasional Komodo, Labuan Bajo",
                    "NTT",
                    850000,
                    4.98,
                    410,
                    "1 Hari Penuh",
                    "Mudah",
                    "Promo Spesial",
                    "20 Peserta / Trip",
                    "Ranger Guide TN Komodo",
                    "https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8?auto=format&fit=crop&w=900&q=80",
                    "Berenang bersama pari Manta raksasa di Manta Point, trekking bukit Pulau Padar tiga warna, dan menyaksikan satwa endemik Komodo di habitat aslinya.",
                    ["Speedboat VIP AC", "Peralatan Snorkeling", "Ranger Guide TN Komodo", "Makan Siang & Buah", "Dokumentasi Drone"]
                ),
                new AdventureProgram(
                    "EXP-08",
                    "Eksplorasi Budaya & Rumah Adat Wae Rebo",
                    "budaya",
                    "Budaya & Tradisi",
                    "Desa Tradisional Wae Rebo, Manggarai",
                    "NTT",
                    600000,
                    4.93,
                    130,
                    "2 Hari 1 Malam",
                    "Sedang",
                    "Slot Terbatas",
                    "12 Tamu / Malam",
                    "Pemandu Adat Wae Rebo",
                    "https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=80",
                    "Eksplorasi desa tradisional warisan UNESCO di atas awan berarsitektur ikonik Mbaru Niang. Nikmati kopi khas Manggarai dan upacara adat penerimaan Waelu.",
                    ["Inap di Mbaru Niang", "Upacara Adat Waelu", "Makan Tradisional Khas", "Pemandu Lokal Wae Rebo"]
                )
            ];
        }

        // ======================================================================
        // DATA ACCESS & BUSINESS LOGIC METHODS
        // ======================================================================

        public function getPlatformInfo(): array
        {
            return $this->platformInfo;
        }

        public function getProfileSummary(): string
        {
            return $this->platformInfo['name'] . " — " . $this->platformInfo['period'];
        }

        /**
         * @return AdventureProgram[]
         */
        public function getAllPrograms(): array
        {
            return $this->programs;
        }

        /**
         * Filter data berdasarkan kategori dan kata kunci pencarian
         * @return AdventureProgram[]
         */
        public function getFilteredPrograms(string $category = 'all', string $query = ''): array
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

        public function getProgramById(string $id): ?AdventureProgram
        {
            foreach ($this->programs as $program) {
                if ($program->getId() === $id) {
                    return $program;
                }
            }
            return null;
        }

        public function getTotalPrograms(): int
        {
            return count($this->programs);
        }

        public function getPriceRange(): string
        {
            if (empty($this->programs)) {
                return "Rp 0";
            }
            $prices = array_map(fn(AdventureProgram $p) => $p->getPrice(), $this->programs);
            return "Rp " . number_format(min($prices), 0, ',', '.') . " - Rp " . number_format(max($prices), 0, ',', '.');
        }

        public function getAveragePrice(): string
        {
            if (empty($this->programs)) {
                return "Rp 0";
            }
            $prices = array_map(fn(AdventureProgram $p) => $p->getPrice(), $this->programs);
            $avg = round(array_sum($prices) / count($prices));
            return "Rp " . number_format($avg, 0, ',', '.');
        }

        public function getCategories(): array
        {
            return [
                'all'       => 'Semua Program',
                'air'       => '🌊 Air & Laut',
                'alam'      => '🏔️ Gunung & Alam',
                'adrenalin' => '⚡ Adrenalin',
                'budaya'    => '🏛️ Budaya & Adat'
            ];
        }
    }
}
