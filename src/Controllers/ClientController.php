<?php

namespace App\Controllers;

use App\Models\Client;

class ClientController
{
    public function addClient(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=clientManager");
            exit;
        }

        $first_name = trim($_POST['first_name'] ?? '');
        $last_name = trim($_POST['last_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone_number = trim($_POST['phone'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
            $error = "Моля, попълнете всички задължителни полета!";
            require __DIR__ . '/../../src/views/addClient.php';
            return;
        }

        $client = new Client(
            id: null,
            first_name: $first_name,
            last_name: $last_name,
            phone_number: $phone_number,
            email: $email,
            password: $password
        );

        if ($client->registerUser()) {
            header("Location: index.php?action=clientManager");
            exit;
        } else {
            $error = "Неуспешно добавяне на клиент!";
            require __DIR__ . '/../../src/views/addClient.php';
        }
    }

    public static function updateClient(int $clientId, $first_name, $last_name, $email, $phone_number): void
    {
        $client = Client::getClientById($clientId);
        if ($client) {
            $client->first_name = $first_name;
            $client->last_name = $last_name;
            $client->email = $email;
            $client->phone_number = $phone_number;
            $client->updateClient();
        }
    }

    public static function removeClient(int $clientId): void
    {
        $client = Client::getClientById($clientId);
        if ($client) {
            $client->deleteClient();
        }
    }

    public static function createClientOrder(int $clientId, $vehicle, $service, $date): void
    {
        $client = Client::getClientById($clientId);
        if ($client) {
            $db = \Config\Database::getInstance();
            $query = "SELECT base_price FROM services WHERE id = ?";

            $stmt = $db->prepare($query);
            $stmt->execute([$service]);
            $basePrice = $stmt->fetchColumn();

            $query = "INSERT INTO orders (car_id, status_id, opened_at, closed_at, employee_id, full_price) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $db->prepare($query);
            $stmt->execute([$vehicle, 1, $date, null, null, $basePrice]);

            $queryService = "INSERT INTO order_service (order_id, service_id,price) VALUES (?, ?, ?)";

            $stmt = $db->prepare($queryService);
            $orderId = $db->lastInsertId();
            $stmt->execute([$orderId, $service, $basePrice]);
            $serviceId = $db->lastInsertId();

            $queryAuditLog = "INSERT INTO audit_logs (user_id,action,entity,entity_id,created_at) VALUES (?,?,?,?,NOW())";

            $stmt = $db->prepare($queryAuditLog);
            $stmt->execute([$clientId, "Created order for vehicle: $vehicle", "orders", $orderId]);
            $stmt->execute([$clientId, "Created service order for order: $orderId", "order_service", $serviceId]);
        }
    }

    public static function getCurrentClientAppointments(int $clientId): array
    {
        $client = Client::getClientById($clientId);
        if (!$client) {
            return [];
        }

        $query = "SELECT o.id as order_id, o.opened_at, s.status, c.year as car_year, cb.brand_name, cm.model_name, sv.name as service_name
                  FROM orders o
                  JOIN status s ON o.status_id = s.id
                  JOIN order_service os ON o.id = os.order_id
                  JOIN services sv ON os.service_id = sv.id
                  JOIN car c ON o.car_id = c.id
                  JOIN car_model cm ON c.model_id = cm.id
                  JOIN car_brand cb ON cm.brand_id = cb.id
                  WHERE c.owner = :client_id AND s.status NOT IN ('Готова', 'Отказана')
                  ORDER BY o.opened_at DESC";

        $db = \Config\Database::getInstance();
        $stmt = $db->prepare($query);
        $stmt->execute([':client_id' => $clientId]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $rows;
    }

    public static function getPastClientAppointments(int $clientId): array
    {
        $client = Client::getClientById($clientId);
        if (!$client) {
            return [];
        }

        $query = "SELECT o.id as order_id, o.opened_at,o.closed_at, s.status, c.year as car_year, cb.brand_name, cm.model_name, sv.name as service_name
                  FROM orders o
                  JOIN status s ON o.status_id = s.id
                  JOIN order_service os ON o.id = os.order_id
                  JOIN services sv ON os.service_id = sv.id
                  JOIN car c ON o.car_id = c.id
                  JOIN car_model cm ON c.model_id = cm.id
                  JOIN car_brand cb ON cm.brand_id = cb.id
                  WHERE c.owner = :client_id AND s.status IN ('Готова', 'Отказана')
                  ORDER BY o.opened_at DESC";

        $db = \Config\Database::getInstance();
        $stmt = $db->prepare($query);
        $stmt->execute([':client_id' => $clientId]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $rows;
    }

    public static function getFinishedOrders(int $clientId): array
    {
        $client = Client::getClientById($clientId);

        if (!$client) {
            return [];
        }

        $query = "SELECT o.id as order_id, o.opened_at,o.closed_at,o.full_price, c.year as car_year, cb.brand_name, cm.model_name, sv.name as service_name,sv.base_price
                  FROM orders o
                  JOIN status s ON s.id=o.status_id
                  JOIN order_service os ON o.id = os.order_id
                  JOIN services sv ON os.service_id = sv.id
                  JOIN car c ON o.car_id = c.id
                  JOIN car_model cm ON c.model_id = cm.id
                  JOIN car_brand cb ON cm.brand_id = cb.id
                  WHERE c.owner = :client_id AND s.id = 6
                  ORDER BY o.opened_at DESC";

        $db = \Config\Database::getInstance();
        $stmt = $db->prepare($query);
        $stmt->execute([':client_id' => $clientId]);
        $orders = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $sqlMaterials = "SELECT m.name,om.quantity,om.price FROM order_materials om
                         JOIN materials m ON om.material_id=m.id
                         WHERE om.order_id=?";

        $stmt = $db->prepare($sqlMaterials);
        foreach ($orders as &$order) {
            $stmt->execute([$order['order_id']]);
            $order['materials'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $orders;
    }

    public static function getOrderById(int $clientId, int $orderId)
    {
        $client = Client::getClientById($clientId);

        if (!$client) {
            return [];
        }

        $query = "SELECT o.id as order_id, o.opened_at,o.closed_at,o.full_price, c.year as car_year,c.vin, CONCAT(e.first_name, ' ', e.last_name) AS employee_name, cb.brand_name, cm.model_name, sv.name as service_name,sv.base_price
                  FROM orders o
                  JOIN employees e ON e.id = o.employee_id
                  JOIN status s ON s.id=o.status_id
                  JOIN order_service os ON o.id = os.order_id
                  JOIN services sv ON os.service_id = sv.id
                  JOIN car c ON o.car_id = c.id
                  JOIN car_model cm ON c.model_id = cm.id
                  JOIN car_brand cb ON cm.brand_id = cb.id
                  WHERE o.id=:order_id AND s.id = 6
                  ORDER BY o.opened_at DESC";

        $db = \Config\Database::getInstance();
        $stmt = $db->prepare($query);
        $stmt->execute([':order_id' => $orderId]);
        $order = $stmt->fetch(\PDO::FETCH_ASSOC);

        $sqlMaterials = "SELECT m.name,om.quantity,om.price FROM order_materials om
                         JOIN materials m ON om.material_id=m.id
                         WHERE om.order_id=?";

        $stmt = $db->prepare($sqlMaterials);

        $stmt->execute([$order['order_id']]);
        $order['materials'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $order;
    }

    public static function cancelOrder(int $orderId): void
    {
        $db = \Config\Database::getInstance();
        $query = "UPDATE orders SET status_id = (SELECT id FROM status WHERE status = 'Отказана'), closed_at = NOW(), full_price = 0 WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$orderId]);

        $queryAuditLog = "INSERT INTO audit_logs (user_id,action,entity,entity_id,created_at) VALUES (?,?,?,?,NOW())";
        $stmt = $db->prepare($queryAuditLog);
        $stmt->execute([$_SESSION['user_id'], "Canceled order", "orders", $orderId]);
    }
}
