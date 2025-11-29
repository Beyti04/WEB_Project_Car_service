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

    public function getOrderByCarId(int $car_id): array
    {
        try {
            $sql = "
                SELECT o.id AS order_id, o.opened_at, o.full_price, c.id AS car_id, c.make, c.model FROM orders o
                JOIN car c ON o.car_id=c.id
                JOIN employees e ON o.employee_id=e.id
                WHERE o.car_id = :car_id
                ORDER BY o.opened_at DESC
            ";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([':car_id' => $car_id]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $orders = [];
            foreach ($rows as $r) {
                $orders[] = [
                    'id' => isset($r['order_id']) ? (int)$r['order_id'] : null,
                    'opened_at' => $r['opened_at'] ?? null,
                    'full_price' => isset($r['full_price']) ? (float)$r['full_price'] : 0.0,
                    'car' => $r['car_id'] ? [
                        'id' => (int)$r['car_id'],
                        'make' => $r['car_make'] ?? null,
                        'model' => $r['car_model'] ?? null,
                        'plate' => $r['car_plate'] ?? null,
                    ] : null,
                    'employee' => $r['emp_id'] ? [
                        'id' => (int)$r['emp_id'],
                        'first_name' => $r['emp_first'] ?? null,
                        'last_name' => $r['emp_last'] ?? null,
                    ] : null,
                ];
            }

            return $orders;
        } catch (PDOException $e) {
            // Log error in real app; return empty array on failure
            return [];
        }
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
        $sql = "SELECT o.id as order_id,o.opened_at, s.status,sg.name AS service_group,b.brand_name, m.model_name,cli.id AS client_id, CONCAT(cli.first_name, ' ', cli.last_name) AS client_name FROM orders o
            JOIN status s ON o.status_id = s.id
            JOIN car c ON o.car_id = c.id
            JOIN car_model m ON c.model_id = m.id
            JOIN car_brand b ON m.brand_id = b.id
            JOIN clients cli ON c.owner = cli.id
            JOIN order_service os ON o.id = os.order_id
            JOIN services sv ON os.service_id = sv.id
            JOIN service_groups sg ON sv.group_id = sg.id
             WHERE employee_id = ?";

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
}
