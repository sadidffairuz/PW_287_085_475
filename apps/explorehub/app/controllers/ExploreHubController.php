<?php
/**
 * ==============================================================================
 * ExploreHub — Controller: ExploreHubController
 * From OOP to MVC — Task 02: Build the Controller & Task 03: Connect Model, Controller & View
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * ==============================================================================
 */

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ExploreHubModel.php';

if (!class_exists('ExploreHubController')) {
    class ExploreHubController extends BaseController
    {
        private ExploreHubModel $model;

        /**
         * Constructor: Inisialisasi Model Layer
         */
        public function __construct()
        {
            $this->model = new ExploreHubModel();
        }

        /**
         * Action: index
         * Menangani request daftar program prioritas ExploreHUB
         * 1. Menangkap input request (query parameters)
         * 2. Berinteraksi dengan Model untuk mengambil data & agregasi
         * 3. Menghubungkan data model ke View template
         */
        public function index(): void
        {
            // 1. Menangkap parameter query dari HTTP GET
            $filterKategori = isset($_GET['kategori']) ? trim($_GET['kategori']) : 'all';
            $filterQuery    = isset($_GET['q']) ? trim($_GET['q']) : '';

            // 2. Mengambil data dari Model
            $platformInfo     = $this->model->getPlatformInfo();
            $profileSummary   = $this->model->getProfileSummary();
            $programTampil    = $this->model->getFilteredPrograms($filterKategori, $filterQuery);
            $totalPrograms    = $this->model->getTotalPrograms();
            $priceRange       = $this->model->getPriceRange();
            $averagePrice     = $this->model->getAveragePrice();
            $categories       = $this->model->getCategories();
            $tanggalPembaruan = date("d F Y");

            // 3. Menghubungkan (Passing) data dari Controller ke View
            $this->renderView('program/index', [
                'platform'         => $platformInfo,
                'profileSummary'   => $profileSummary,
                'programTampil'    => $programTampil,
                'filterKategori'   => $filterKategori,
                'filterQuery'      => $filterQuery,
                'totalPrograms'    => $totalPrograms,
                'priceRange'       => $priceRange,
                'averagePrice'     => $averagePrice,
                'categories'       => $categories,
                'tanggalPembaruan' => $tanggalPembaruan,
            ]);
        }

        /**
         * Action: detail
         * Menampilkan detail satu program petualangan
         */
        public function detail(string $id): void
        {
            $program = $this->model->getProgramById($id);

            if (!$program) {
                http_response_code(404);
                echo "<h3>[404] Program tidak ditemukan.</h3>";
                return;
            }

            $this->renderView('program/detail', [
                'platform' => $this->model->getPlatformInfo(),
                'program'  => $program
            ]);
        }

        /**
         * Action: api
         * Mengembalikan dataset program dalam format JSON
         */
        public function api(): void
        {
            $kategori = $_GET['kategori'] ?? 'all';
            $query    = $_GET['q'] ?? '';
            $programs = $this->model->getFilteredPrograms($kategori, $query);

            $result = array_map(function (AdventureProgram $p) {
                return [
                    'id'             => $p->getId(),
                    'name'           => $p->getName(),
                    'category'       => $p->getCategory(),
                    'categoryLabel'  => $p->getCategoryLabel(),
                    'location'       => $p->getLocation(),
                    'region'         => $p->getRegion(),
                    'price'          => $p->getPrice(),
                    'formattedPrice' => $p->getFormattedPrice(),
                    'rating'         => $p->getRating(),
                    'reviews'        => $p->getReviews(),
                    'duration'       => $p->getDuration(),
                    'difficulty'     => $p->getDifficulty(),
                    'status'         => $p->getStatus(),
                    'dailyQuota'     => $p->getDailyQuota(),
                    'guide'          => $p->getGuide(),
                    'image'          => $p->getImage(),
                    'description'    => $p->getDescription(),
                    'facilities'     => $p->getFacilities()
                ];
            }, $programs);

            $this->json([
                'status'  => 'success',
                'count'   => count($result),
                'data'    => $result
            ]);
        }
    }
}
