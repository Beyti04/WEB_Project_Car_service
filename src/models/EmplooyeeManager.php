<?php

namespace App\Models;

use Config\Database;
use PDO;

class EmployeeManager
{
    private PDO $db;

    public array $employees = [];

    public function __construct()
    {
        $this->db = Database::getInstance();
        $stmt = $this->db->query("SELECT * FROM employees");
        $this->employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEmployee(string $first_name, string $last_name, int $role_id_FK, string $email, string $password): bool
    {
        $stmt = $this->db->prepare("INSERT INTO employees (first_name, last_name, role_id_FK, email, password) VALUES (:first_name, :last_name, :role_id_FK, :email, :password)");
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':role_id_FK', $role_id_FK, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();
        $this->reloadEmployees();

        return true;
    }

    public static function findEmployeeByEmail(string $email): ?array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM employees WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        return $employee ?: null;
    }

    public function removeEmployeeById(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM employees WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->reloadEmployees();

        return true;
    }

    public function editEmployeeById(int $id, string $first_name, string $last_name, int $role_id_FK, string $email): bool
    {
        $stmt = $this->db->prepare("UPDATE employees SET first_name = :first_name, last_name = :last_name, role_id_FK = :role_id_FK, email = :email WHERE id = :id");
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':role_id_FK', $role_id_FK, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->reloadEmployees();

        return true;
    }

    public function reloadEmployees(): void
    {
        $stmt = $this->db->query("SELECT * FROM employees");
        $this->employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
