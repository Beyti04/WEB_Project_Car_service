<?php
namespace App\Models;

use Config\Database;
use PDO;

class ServiceGroup {
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public string $name =''
    ) {
        $this->db = Database::getInstance();
    }

    public static function getAllServiceGroups(): array
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM service_groups");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
