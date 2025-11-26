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
use App\Controllers\VehicleController;
use App\Controllers\EmployeeController;
use App\Controllers\ClientController;
use App\Controllers\ServiceController;
use App\Controllers\MaterialController;
use Config\Database;


Database::getInstance();

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

    case 'myVehicles':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        // Зареждаме страницата за управление на превозни средства
        require __DIR__ . '/../src/views/userVehicleManager.php';
        break;

    case 'addVehicle':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        (new VehicleController())->addVehicle();
        // Зареждаме страницата за добавяне на превозно средство
        require __DIR__ . '/../src/views/userVehicleManager.php';
        break;

    case 'removeVehicle':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $carId = (int)($_GET['car_id'] ?? 0);
        (new VehicleController())->removeVehicle($carId);
        break;

    case 'editVehicle':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        // Зареждаме страницата за редактиране на превозно средство
        require __DIR__ . '/../src/views/editVehicle.php';
        break;

    case 'updateVehicle':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $carId = (int)($_GET['car_id'] ?? 0);
        (new VehicleController())->updateVehicle($carId, (int)($_POST['model'] ?? 0), (int)($_POST['year'] ?? 0), trim($_POST['vin'] ?? ''));
        break;

    case 'selectVehicle':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $carId = (int)($_GET['car_id'] ?? 0);
        (new VehicleController())->selectVehicle($carId);
        break;
    // ТАБЛА (DASHBOARDS)
    case 'userDashboard':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        // Зареждаме клиентското табло
        if ($_SESSION['user_role'] === 'Client' || $_SESSION['user_role'] === '') {
            require __DIR__ . '/../src/views/userDashboard.php';
            break;
        } elseif ($_SESSION['user_role'] === 'Employee') {
            require __DIR__ . '/../src/views/employeeDashboard.php';
            break;
        }
        break;


    case 'employeeManager':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/employeeManager.php';
        break;

    case 'newEmployee':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/addEmployee.php';
        break;

    case 'addEmployee':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        (new EmployeeController())->addEmployee();
        require __DIR__ . '/../src/views/employeeManager.php';
        break;

    case 'editEmployee':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/editEmployee.php';
        break;

    case 'updateEmployee':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $employeeId = (int)($_GET['employee_id'] ?? 0);
        EmployeeController::updateEmployee($employeeId, trim($_POST['first_name'] ?? ''), trim($_POST['last_name'] ?? ''), trim($_POST['email'] ?? ''), trim($_POST['phone'] ?? ''), (int)($_POST['role_id'] ?? 0));
        header("Location: index.php?action=employeeManager");
        exit;
        break;

    case 'removeEmployee':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $employeeId = (int)($_GET['employee_id'] ?? 0);
        EmployeeController::removeEmployee($employeeId);
        header("Location: index.php?action=employeeManager");
        exit;
        break;

    case 'clientManager':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/clientManager.php';
        break;

    case 'newClient':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/addClient.php';
        break;

    case 'newMaterial':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/addMaterial.php';
        break;

    case 'addClient':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        (new ClientController())->addClient();
        require __DIR__ . '/../src/views/clientManager.php';
        break;

    case 'editClient':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/editClient.php';
        break;

    case 'updateClient':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $clientId = (int)($_GET['client_id'] ?? 0);
        ClientController::updateClient($clientId, trim($_POST['first_name'] ?? ''), trim($_POST['last_name'] ?? ''), trim($_POST['email'] ?? ''), trim($_POST['phone'] ?? ''));
        header("Location: index.php?action=clientManager");
        exit;
        break;

    case 'removeClient':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $clientId = (int)($_GET['client_id'] ?? 0);
        ClientController::removeClient($clientId);
        header("Location: index.php?action=clientManager");
        exit;
        break;

    case 'serviceManager':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/serviceManager.php';
        break;

    case 'newService':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/addService.php';
        break;

    case 'addService':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        (new ServiceController())->addService();
        require __DIR__ . '/../src/views/serviceManager.php';
        break;

    case 'inventoryManager':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require __DIR__ . '/../src/views/inventoryManager.php';
        break;

    case 'addMaterial':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        (new MaterialController())->addMaterial();
        require __DIR__ . '/../src/views/inventoryManager.php';
        break;

    case 'editMaterial':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        // Зареждаме страницата за редактиране на материал
        require __DIR__ . '/../src/views/editMaterial.php';
        break;

    case 'removeMaterial':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $materialId = (int)($_GET['material_id'] ?? 0);
        MaterialController::removeMaterial($materialId);
        header("Location: index.php?action=inventoryManager");
        exit;
        break;

    case 'adminDashboard':
        require __DIR__ . '/../src/views/adminDashboard.php';
        break;

    case 'userAppointmentManager':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        // Зареждаме страницата за управление на срещи
        require __DIR__ . '/../src/views/userAppointmentManager.php';
        break;

    case 'requestService':
        // Проверяваме дали е логнат
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        // Зареждаме страницата за управление на срещи
        require __DIR__ . '/../src/views/requestService.php';
        break;

    case 'getModels':
        $brandId = (int)($_GET['brand_id'] ?? 0);

        $models = \App\Models\CarModel::getModelsByBrand($brandId);

        // Връщаме данните като JSON (формат, който JavaScript разбира)
        header('Content-Type: application/json');
        echo json_encode($models);
        exit;
        break;

    case 'getServices':
        $serviceGroupId = (int)($_GET['service_group_id'] ?? 0);
        $services = \App\Models\Service::getServicesByGroupId($serviceGroupId);

        // Връщаме данните като JSON (формат, който JavaScript разбира)
        header('Content-Type: application/json');
        echo json_encode($services);
        exit;
        break;

    case 'removeService':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $serviceId = (int)($_GET['service_id'] ?? 0);
        ServiceController::removeService($serviceId);
        header("Location: index.php?action=serviceManager");
        exit;
        break;

    case 'editService':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        // Зареждаме страницата за редактиране на услуга
        require __DIR__ . '/../src/views/editService.php';
        break;

    case 'updateMaterial':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $materialId = (int)($_GET['material_id'] ?? 0);

        MaterialController::updateMaterial($materialId, trim($_POST['material_name'] ?? ''), (int)($_POST['quantity'] ?? 0), floatval($_POST['price'] ?? 0), (int)($_POST['material_group_id'] ?? 0));
        require __DIR__ . '/../src/views/inventoryManager.php';
        break;

    case 'updateService':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $serviceId = (int)($_GET['id'] ?? 0);

        (new ServiceController())->updateService($serviceId, trim($_POST['service_name'] ?? ''), floatval($_POST['price'] ?? 0), (int)($_POST['service_group_id'] ?? 0));
        require __DIR__ . '/../src/views/serviceManager.php';
        break;

    case 'admin':
        // Тук по-късно ще сложим проверка за роля 'admin'
        require __DIR__ . '/../views/adminDashboard.php';
        break;

    default:
        echo "404 Not Found";
        break;
}
