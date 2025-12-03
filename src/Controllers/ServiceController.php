<?php

namespace App\Controllers;

use App\Models\Service;
use Config\Database;

class ServiceController
{


    public function addService(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=serviceManager");
            exit;
        }

        $name = trim($_POST['service_name'] ?? '');
        $price = floatval($_POST['price'] ?? 0);
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
            $db = Database::getInstance();
            $sqlAuditLog = "INSERT INTO audit_logs (user_id,action,entity,entity_id,created_at) VALUES (?,?,?,?,NOW())";
            $serviceId = $db->lastInsertId();
            $stmt = $db->prepare($sqlAuditLog);
            $stmt->execute([$_SESSION['user_id'], "Added new service", "services", $serviceId]);
            header("Location: index.php?action=serviceManager");
            exit;
        } else {
            $error = "Неуспешно добавяне на услуга!";
            require __DIR__ . '/../../src/views/addService.php';
        }
    }

    public static function removeService(int $serviceId): void
    {
        Service::deleteById($serviceId);
    }

    public static function updateService(int $serviceId, string $name, float $price, int $groupId): void
    {
        $service = Service::getServiceById($serviceId);
        if ($service) {
            $service->name = $name;
            $service->price = $price;
            $service->group_id_FK = $groupId;
            $service->update();
        }
    }
}
