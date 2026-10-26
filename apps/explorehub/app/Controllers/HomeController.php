<?php
/**
 * Week 7 — MVC Controller.
 * Handles the home-page request, prepares data, and loads the View.
 */
require_once __DIR__ . '/../Repositories/DestinationRepository.php';

class HomeController
{
    public function index(): void
    {
        $namaPlatform = 'ExploreHub';
        $periodeImplementasi = 'Week 7 · PHP MVC';
        $judulProgram = 'Pengalaman pilihan';
        $subjudulProgram = 'Temukan tempat yang membuatmu ingin tinggal lebih lama.';

        $repositoryDestinasi = new DestinationRepository();
        $programPrioritas = $repositoryDestinasi->getFeatured(6);
        $statusProgram = count($programPrioritas) > 0
            ? 'Pilihan tersedia'
            : 'Belum tersedia';

        require __DIR__ . '/../Views/home.php';
    }
}
