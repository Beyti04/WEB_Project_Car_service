<?php
namespace App\Models;

use Config\Database;
use PDO, PDOException;

class Status
{
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public string $name
    ) {
        $this->db = Database::getInstance();
    }

    public static function getAllStatuses(): array
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM status ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
?>