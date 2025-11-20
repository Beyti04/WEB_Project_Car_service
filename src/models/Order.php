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

    public function getOrderByCarId(int $car_id): array{
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

    
}
