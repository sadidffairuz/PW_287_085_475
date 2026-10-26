<?php
/**
 * ==============================================================================
 * ExploreHub — Controller: BaseController
 * From OOP to MVC — Task 02: Build the Controller Layer
 * Laboratorium Informatika - Universitas Muhammadiyah Malang
 * ==============================================================================
 */

if (!class_exists('BaseController')) {
    abstract class BaseController
    {
        /**
         * Render view template dengan passing data dari controller
         * 
         * @param string $viewPath Relatif dari folder app/views/ (contoh: 'program/index')
         * @param array $data Variabel data asosiatif yang akan di-ekstrak ke view
         */
        protected function renderView(string $viewPath, array $data = []): void
        {
            // Ekstrak array asosiatif menjadi variabel lokal yang dapat diakses view
            extract($data);

            $viewFile = __DIR__ . '/../views/' . $viewPath . '.php';

            if (!file_exists($viewFile)) {
                http_response_code(404);
                echo "<h3>[MVC Error] View file not found: <code>app/views/{$viewPath}.php</code></h3>";
                return;
            }

            require $viewFile;
        }

        /**
         * Output JSON response untuk keperluan API / AJAX
         */
        protected function json(array $data, int $statusCode = 200): void
        {
            http_response_code($statusCode);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
}
