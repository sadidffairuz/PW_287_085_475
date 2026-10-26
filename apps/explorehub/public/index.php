<?php
/**
 * Week 7 — MVC entry point.
 * The public page delegates the request to HomeController.
 */
require_once __DIR__ . '/../app/Controllers/HomeController.php';

$controller = new HomeController();
$controller->index();
