<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

class Employee
{
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public string $first_name,
        public string $last_name,
        public string $phone_number,
        public int $role_id,
        public string $email,
        public string $password
    ) {
        $this->db = Database::getInstance();
    }

    public function registerUser(): bool
    {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO employees (first_name, last_name, phone_number, role_id, email, password) 
                VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $this->db->prepare($sql);
            $success = $stmt->execute([
                $this->first_name,
                $this->last_name,
                $this->phone_number,
                $this->role_id,
                $this->email,
                $hashedPassword
            ]);

            if ($success) {
                $this->id = (int)$this->db->lastInsertId();
            }
            return $success;
        } catch (PDOException $e) {
            error_log("Employee Save Error: " . $e->getMessage());
            return false;
        }
    }

    public static function findByEmail(string $email): ?Employee
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM employees WHERE email = ?";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$email]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Employee(
                    id: (int)$data['id'],
                    first_name: $data['first_name'],
                    last_name: $data['last_name'],
                    phone_number: $data['phone_number'],
                    role_id: (int)$data['role_id'],
                    email: $data['email'],
                    password: $data['password']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("Employee Find Error: " . $e->getMessage());
            return null;
        }
    }

    public static function getAllEmployees(): ?array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM employees";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $employees ?: null;
        } catch (PDOException $e) {
            error_log("Employee Find Error: " . $e->getMessage());
            return null;
        }
    }

    public static function getEmployeeById(int $id): ?Employee
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM employees WHERE id = ?";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Employee(
                    id: (int)$data['id'],
                    first_name: $data['first_name'],
                    last_name: $data['last_name'],
                    phone_number: $data['phone_number'],
                    role_id: (int)$data['role_id'],
                    email: $data['email'],
                    password: $data['password']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("Employee Find Error: " . $e->getMessage());
            return null;
        }
    }

    public function updateEmployee(): bool
    {
        $sql = "UPDATE employees SET first_name = ?, last_name = ?, phone_number = ?, role_id = ?, email = ? WHERE id = ?";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $this->first_name,
                $this->last_name,
                $this->phone_number,
                $this->role_id,
                $this->email,
                $this->id
            ]);
        } catch (PDOException $e) {
            error_log("Employee Update Error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteEmployee(): bool
    {
        $sql = "DELETE FROM employees WHERE id = ?";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$this->id]);
        } catch (PDOException $e) {
            error_log("Employee Delete Error: " . $e->getMessage());
            return false;
        }
    }

    public function takeOrder(int $orderId): bool
    {
        $sql = "UPDATE orders SET employee_id = ?,status_id = 2 WHERE id = ?";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $this->id,
                $orderId
            ]);
        } catch (PDOException $e) {
            error_log("Take Order Error: " . $e->getMessage());
            return false;
        }
    }

    public function cancelOrder(int $orderId)
    {
        $sql = "UPDATE orders SET status_id =(SELECT id FROM status WHERE status = 'Отказана') WHERE id = ?";
        $sqlAuditLog = "INSERT INTO audit_logs (user_id,action,entity,entity_id,created_at) VALUES (?,?,?,?,NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$orderId]);

        $stmt = $this->db->prepare($sqlAuditLog);
        $stmt->execute([$_SESSION['user_id'], "Canceled order", "orders", $orderId]);
    }

    public function getPastAppointments(): array
    {
        $sql = "SELECT o.opened_at, sv.name AS service_name,c.year,b.brand_name,m.model_name, CONCAT(cli.first_name,' ',cli.last_name) AS client_name FROM orders o
              JOIN order_service os ON os.order_id=o.id
              JOIN services sv ON sv.id=os.service_id
              JOIN car c ON c.id=o.car_id
              JOIN car_model m ON m.id=c.model_id
              JOIN car_brand b ON b.id=m.brand_id
              JOIN clients cli ON cli.id=c.owner
              JOIN status s ON s.id=o.status_id
              WHERE employee_id=$this->id AND s.status IN ('Готова','Отказана')
              ORDER BY o.opened_at ASC";

        $db = Database::getInstance();

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $orders ?? [];
    }
}
