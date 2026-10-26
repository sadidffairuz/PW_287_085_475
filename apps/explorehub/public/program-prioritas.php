<?php
/**
 * ==============================================================================
 * ExploreHub — Front Controller / Route: Program Prioritas
 * From OOP to MVC — Task 03: Connect Model, Controller & View
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * 
 * Flow:
 * 1. User mengakses route ini (melalui browser / query parameter)
 * 2. Front Controller memuat Model, BaseController, dan ExploreHubController
 * 3. ExploreHubController menangani request, mengambil data dari ExploreHubModel,
 *    dan merender View template (app/views/program/index.php)
 * ==============================================================================
 */

// Autoload / Require Model Layer
require_once __DIR__ . '/../app/models/AdventureProgram.php';
require_once __DIR__ . '/../app/models/ExploreHubModel.php';

// Autoload / Require Controller Layer
require_once __DIR__ . '/../app/controllers/BaseController.php';
require_once __DIR__ . '/../app/controllers/ExploreHubController.php';

// Inisialisasi Controller dan eksekusi Action
$controller = new ExploreHubController();
$controller->index();
