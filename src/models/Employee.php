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
}
