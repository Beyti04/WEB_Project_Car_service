<?php
session_start();

spl_autoload_register(function ($class) {
    // Масив, описващ връзката Namespace => Папка
    $prefixes = [
        'App\\'    => __DIR__ . '/../src/',
        'Config\\' => __DIR__ . '/../config/' // Или където сте сложили Database.php
    ];

    foreach ($prefixes as $prefix => $base_dir) {
        // Проверява дали класът използва този prefix
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }

        // Взима името на класа без prefix-а
        $relative_class = substr($class, $len);

        // Превръща namespace пътя във файлов път (напр. Controllers\AuthController -> Controllers/AuthController.php)
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // Ако файлът съществува, го зарежда
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});

use App\Controllers\AuthController;

$action = $_GET['action'] ?? 'home'; // По подразбиране home

// Рутиране
switch ($action) {
    case 'home':
        // Зареждаме началната страница (бившото index.php с картинките)
        require __DIR__ . '../../src/views/home.php';
        break;

    // АУТЕНТИКАЦИЯ
    case 'login':
        (new AuthController())->showLogin();
        break;
        
    case 'loginSubmit':
        (new AuthController())->login();
        break;
        
    case 'register':
        (new AuthController())->showRegister();
        break;

    case 'registerSubmit':
        (new AuthController())->register();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;

    // ТАБЛА (DASHBOARDS)
    case 'dashboard':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        // Зареждаме клиентското табло
        require __DIR__ . '/../views/userDashboard.php';
        break;
    
    case 'admin':
         // Тук по-късно ще сложим проверка за роля 'admin'
         require __DIR__ . '/../views/adminDashboard.php';
         break;

    default:
        echo "404 Not Found";
        break;
}