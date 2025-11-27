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
        $stmt = $db->query("SELECT * FROM status");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function getStatusById(int $id): ?Status
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM status WHERE id = ? LIMIT 1";
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Status(
                    id: (int)$data['id'],
                    name: $data['name']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("Status Fetch By ID Error: " . $e->getMessage());
            return null;
        }
    }
}





?>