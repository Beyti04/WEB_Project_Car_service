<?php
namespace App\Models;

use Config\Database;
use PDO;

class MaterialGroup {
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public string $name
    ) {
        $this->db = Database::getInstance();
    }


    public static function getMaterialGroupById(int $id): ?self
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM material_groups WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $materialGroup = $stmt->fetch();
        return $materialGroup ?: null;
    }

    public static function getAllMaterialGroups(): array
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM material_groups");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}