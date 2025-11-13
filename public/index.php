<?php
session_start();

use Controllers\AuthController;

$action = $_GET['action'] ?? 'home'; // По подразбиране home

// Рутиране
switch ($action) {
    case 'home':
        // Зареждаме началната страница (бившото index.php с картинките)
        require __DIR__ . '/../views/home.php';
        break;

    // АУТЕНТИКАЦИЯ
    case 'login':
        (new AuthController())->showLoginForm();
        break;
        
    case 'loginSubmit':
        (new AuthController())->login();
        break;
        
    case 'register':
        (new AuthController())->showRegisterForm();
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