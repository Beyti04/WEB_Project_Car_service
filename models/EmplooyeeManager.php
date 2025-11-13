<?php

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
