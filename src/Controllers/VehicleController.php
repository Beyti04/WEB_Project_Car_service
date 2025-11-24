<?php

namespace App\Controllers;

use App\Models\Car;

class VehicleController
{
    public function addVehicle(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=myVehicles");
            exit;
        }
        $model_id = (int)($_POST['model'] ?? 0);
        $year = (int)($_POST['year'] ?? 0);
        $vin = trim($_POST['vin'] ?? '');
        $owner = (int)($_SESSION['user_id'] ?? 0);

        if (empty($model_id) || empty($year) || empty($vin) || empty($owner)) {
            $error = "Моля, попълнете всички задължителни полета!";
            require __DIR__ . '/../../src/views/userVehicleManager.php';
            return;
        }

        if (empty($year) || $year < 1886 || $year > (int)date("Y") + 1) {
            $error = "Моля, въведете валидна година на производство!";
            require __DIR__ . '/../../src/views/userVehicleManager.php';
            return;
        }

        if (empty($vin) || strlen($vin) != 17) {
            $error = "Моля, въведете валиден VIN (17 символа)!";
            require __DIR__ . '/../../src/views/userVehicleManager.php';
            return;
        }

        Car::findByVin($vin);
        if (Car::findByVin($vin)) {
            $error = "Това превозно средство вече е регистрирано!";
            require __DIR__ . '/../../src/views/userVehicleManager.php';
            return;
        }

        $car = new Car(
            id: null,
            model_id: $model_id,
            year: $year,
            vin: $vin,
            owner: $_SESSION['user_id']
        );
        $car->save();
        // Зареждаме вашето View за добавяне на превозно средство
        require __DIR__ . '/../../src/views/userVehicleManager.php';
    }

    public function removeVehicle(int $carId): void
    {
        $car = Car::getCarById($carId);
        if ($car && $car->owner === ($_SESSION['user_id'] ?? 0)) {
            $car->delete();
        }
        header("Location: index.php?action=myVehicles");
        exit;
    }
}
