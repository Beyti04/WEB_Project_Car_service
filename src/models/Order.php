<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

class Order
{
    private PDO $db;
    public ?int $id = null;
    public $car = null; // associative array or null
    public string $opened_at;
    public $employee = null; // associative array or null
    public float $full_price;

    public function __construct(PDO $db, array $data = [])
    {
        $this->db = $db;
        $this->id = $data['id'] ?? null;
        $this->opened_at = $data['opened_at'] ?? date('Y-m-d H:i:s');
        $this->full_price = isset($data['full_price']) ? (float)$data['full_price'] : 0.0;
        $this->car = $data['car'] ?? null;
        $this->employee = $data['employee'] ?? null;
    }

    public static function getOrdersWithNoEmployee(): array
    {
        try {
            $sql = "SELECT o.id as order_id,o.opened_at, s.status,sg.name AS service_group,b.brand_name, m.model_name,cli.id AS client_id, CONCAT(cli.first_name, ' ', cli.last_name) AS client_name FROM orders o
            JOIN status s ON o.status_id = s.id
            JOIN car c ON o.car_id = c.id
            JOIN car_model m ON c.model_id = m.id
            JOIN car_brand b ON m.brand_id = b.id
            JOIN clients cli ON c.owner = cli.id
            JOIN order_service os ON o.id = os.order_id
            JOIN services sv ON os.service_id = sv.id
            JOIN service_groups sg ON sv.group_id = sg.id
            WHERE o.employee_id IS NULL AND s.status = 'В изчакване'
        ";

            $db = Database::getInstance();
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $orders = [];

            foreach ($rows as $r) {
                $orders[] = [
                    'id' => $r['order_id'],
                    'status' => $r['status'],
                    'service_group' => $r['service_group'],
                    'client_name' => $r['client_name'],
                    'client_id' => $r['client_id'],
                    'car_data' => [$r['brand_name'], $r['model_name']],
                    'opened_at' => $r['opened_at'],

                ];
            }

            return $orders;
        } catch (PDOException $e) {
            return [];
        }
    }

    public static function getOrderByEmployeeId(int $employeeId): array
    {
        $db = Database::getInstance();
        $sql = "SELECT o.id as order_id,o.opened_at, s.status,sv.name AS service_name,b.brand_name, m.model_name,cli.id AS client_id, CONCAT(cli.first_name, ' ', cli.last_name) AS client_name FROM orders o
            JOIN status s ON o.status_id = s.id
            JOIN car c ON o.car_id = c.id
            JOIN car_model m ON c.model_id = m.id
            JOIN car_brand b ON m.brand_id = b.id
            JOIN clients cli ON c.owner = cli.id
            JOIN order_service os ON o.id = os.order_id
            JOIN services sv ON os.service_id = sv.id
            JOIN service_groups sg ON sv.group_id = sg.id
             WHERE employee_id = ? AND s.id NOT IN (6,7)";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$employeeId]);
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $orders ?: [];
        } catch (PDOException $e) {
            error_log("Get Orders by Employee ID Error: " . $e->getMessage());
            return [];
        }
    }

    public static function getCurrentOrder(int $orderId): array
    {
        $db = Database::getInstance();

        $sql = "SELECT o.id as order_id,o.opened_at, s.status,sv.name AS service,b.brand_name, m.model_name,c.year,cli.id AS client_id, CONCAT(cli.first_name, ' ', cli.last_name) AS client_name FROM orders o
            JOIN status s ON o.status_id = s.id
            JOIN car c ON o.car_id = c.id
            JOIN car_model m ON c.model_id = m.id
            JOIN car_brand b ON m.brand_id = b.id
            JOIN clients cli ON c.owner = cli.id
            JOIN order_service os ON o.id = os.order_id
            JOIN services sv ON os.service_id = sv.id
            JOIN service_groups sg ON sv.group_id = sg.id
            WHERE order_id  =?";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$orderId]);
            $order = $stmt->fetch(PDO::FETCH_ASSOC);

            return $order ?: [];
        } catch (PDOException $e) {
            error_log("Get Current order Error:" . $e->getMessage());
            return [];
        }
    }

    public static function updateOrder(int $orderId, $materials, $status)
    {
        $db = Database::getInstance();

        $sqlPrice = "SELECT unit_price FROM materials WHERE id=?";
        $sqlGetOrderFullPrice = "SELECT full_price FROM orders where id=$orderId";
        $sqlUpdateOrderFullPrice = "UPDATE orders SET full_price=? where id=?";
        $sql = "INSERT INTO order_materials (order_id,material_id, quantity, price) VALUES ($orderId,?,?,?)";
        $sqlAuditLog = "INSERT INTO audit_logs (user_id,action,entity,entity_id,created_at) VALUES (?,?,?,?,NOW())";
        $sqlGetStatus = "SELECT status_id FROM orders WHERE id=$orderId";

        if (!empty($materials)) {
            foreach ($materials as $material) {
                $stmt = $db->prepare($sqlPrice);
                $stmt->execute([$material['id']]);
                $price = $stmt->fetch(PDO::FETCH_ASSOC);
                $price = (float)$price['unit_price'] * (int)$material['quantity'];

                $stmt = $db->prepare($sql);
                $stmt->execute([$material['id'], $material['quantity'], $price]);

                $materialOrderId = $db->lastInsertId();

                $stmt = $db->prepare($sqlAuditLog);
                $stmt->execute([$_SESSION['user_id'], "Employee updated order materials for order: $orderId", "order_materials", $materialOrderId]);

                $stmt = $db->prepare($sqlGetOrderFullPrice);
                $stmt->execute();
                $orderPrice = $stmt->fetch(PDO::FETCH_ASSOC);
                $orderPrice = (float)$orderPrice['full_price'] + $price;

                $stmt = $db->prepare($sqlUpdateOrderFullPrice);
                $stmt->execute([$orderPrice, $orderId]);

                $sqlGetMaterialAvailable = "SELECT stock FROM materials WHERE id=?";
                $stmt = $db->prepare($sqlGetMaterialAvailable);
                $stmt->execute([$material['id']]);
                $quantity = $stmt->fetch(PDO::FETCH_ASSOC);
                $quantity = (int)$quantity['stock'] - (int)$material['quantity'];

                $sqlUpdateMaterialQuantity = "UPDATE materials SET stock =? WHERE id=?";
                $stmt = $db->prepare($sqlUpdateMaterialQuantity);
                $stmt->execute([$quantity, $material['id']]);
            }
        }

        $stmt = $db->prepare($sqlGetStatus);
        $stmt->execute();
        $currentStatus = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($currentStatus['status_id'] != $status) {

            if ($status == 6) {
                $sqlSetStatus = "UPDATE orders SET status_id = ?,closed_at=NOW() WHERE id=?";
                $stmt = $db->prepare($sqlSetStatus);
                $stmt->execute([$status, $orderId]);


                $stmt = $db->prepare($sqlAuditLog);
                $stmt->execute([$_SESSION['user_id'], "Employee updated order status to: $status", "orders", $orderId]);
            } else {
                $sqlSetStatus = "UPDATE orders SET status_id = ? WHERE id=?";
                $stmt = $db->prepare($sqlSetStatus);
                $stmt->execute([$status, $orderId]);

                $stmt = $db->prepare($sqlAuditLog);
                $stmt->execute([$_SESSION['user_id'], "Employee updated order status to: $status", "orders", $orderId]);
            }
        }
    }

    public static function getAllOrders(): array
    {
        $sql = "SELECT o.id as order_id,o.opened_at, CONCAT(cli.first_name,' ',cli.last_name) as client_name,c.year,b.brand_name,m.model_name,s.status,CONCAT(e.first_name,' ',e.last_name) as employee_name FROM orders o
        LEFT JOIN status s ON s.id=o.status_id
        LEFT JOIN employees e ON e.id=o.employee_id
        LEFT JOIN car c ON c.id=o.car_id
        LEFT JOIN clients cli ON cli.id=c.owner
        LEFT JOIN car_model m ON m.id=c.model_id
        LEFT JOIN car_brand b ON b.id=m.brand_id";

        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllCurrentOrders(): array
    {
        $sql = "SELECT o.id as order_id,o.opened_at, CONCAT(cli.first_name,' ',cli.last_name) as client_name,c.year,b.brand_name,m.model_name,s.status,CONCAT(e.first_name,' ',e.last_name) as employee_name,sv.name as service_name FROM orders o
        LEFT JOIN status s ON s.id=o.status_id
        LEFT JOIN employees e ON e.id=o.employee_id
        LEFT JOIN car c ON c.id=o.car_id
        LEFT JOIN clients cli ON cli.id=c.owner
        LEFT JOIN car_model m ON m.id=c.model_id
        LEFT JOIN car_brand b ON b.id=m.brand_id
        LEFT JOIN order_service os ON os.order_id=o.id
        LEFT JOIN services sv ON sv.id=os.service_id
        WHERE s.status NOT IN ('Готова','Отказана')
        ORDER BY o.opened_at DESC";

        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getActiveOrdersCount(): int
    {
        $sql = "SELECT COUNT(*) AS active_orders_count
            FROM orders o
            LEFT JOIN status s ON s.id = o.status_id
            WHERE s.status NOT IN ('В изчакване','Готова','Отказана')";

        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$row['active_orders_count'];
    }

    public static function getPendingAppointmentsCount(): int
    {
        $sql = "SELECT COUNT(*) AS pending_orders_count
            FROM orders o
            LEFT JOIN status s ON s.id = o.status_id
            WHERE s.status = 'В изчакване'";

        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$row['pending_orders_count'];
    }

    public static function getTotalRevenue(): float
    {
        $sql = "SELECT SUM(o.full_price) AS total_price
        FROM orders o
        JOIN status s ON s.id = o.status_id
        WHERE s.status = 'Готова'";

        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (float)$row["total_price"];
    }

    public static function getAuditLogEmployees(): array
    {
        $sql = "SELECT a.id, CONCAT(e.first_name,' ',e.last_name) as employee_name, a.action, a.entity,a.entity_id,a.created_at FROM audit_logs a
                JOIN employees e ON e.id=a.user_id
                WHERE a.action LIKE 'Employee%'";

        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAuditLogClients(): array
    {
        $sql = "SELECT a.id, CONCAT(cli.first_name,' ',cli.last_name) as client_name, a.action, a.entity,a.entity_id,a.created_at FROM audit_logs a
                JOIN clients cli ON cli.id=a.user_id
                WHERE a.action LIKE 'Client%'";

        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
