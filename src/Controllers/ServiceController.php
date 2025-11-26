<?php

namespace App\Controllers;
use App\Models\Service;

class ServiceController
{
    public function addService(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=serviceManager");
            exit;
        }

        $name = trim($_POST['service_name'] ?? '');
        $price = floatval($_POST['service_price'] ?? 0);
        $groupId = (int)($_POST['service_group_id'] ?? 0);

        if (empty($name) || empty($groupId) || $price <= 0) {
            $error = "Моля, попълнете всички задължителни полета!";
            require __DIR__ . '/../../src/views/addService.php';
            return;
        }

        $service = new Service(
            id: null,
            name: $name,
            price: $price,
            group_id_FK: $groupId 
        );

        if ($service->save()) {
            header("Location: index.php?action=serviceManager");
            exit;
        } else {
            $error = "Неуспешно добавяне на услуга!";
            require __DIR__ . '/../../src/views/addService.php';
        }
    }
}