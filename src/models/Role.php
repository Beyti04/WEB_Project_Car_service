<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

class Role {
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public string $role_name
    ) {
        $this->db = Database::getInstance();
    }

   public static function getAllRoles(): array {
        $db = Database::getInstance();
        $sql = "SELECT * FROM role";
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $roles ?: [];
        } catch (PDOException $e) {
            error_log("Role Fetch Error: " . $e->getMessage());
            return [];
        }
    }
}