<?php
namespace App\Models;

use Config\Database;
use PDO;

class Service {
    private PDO $db;
    
    public function __construct(
        public ?int $id = null,
        public string $name,
        public float $price,
        public int $group_id_FK
    ) {
        $this->db = Database::getInstance();
    }


    public function save(): void
    {
        $stmt = $this->db->prepare("INSERT INTO services (name, price, group_id_FK) VALUES (:name, :price, :group_id_FK)");
        $stmt->execute([
            ':name' => $this->name,
            ':price' => $this->price,
            ':group_id_FK' => $this->group_id_FK
        ]);
        $this->id = (int)$this->db->lastInsertId();
    }

    public static function getAllServices(): array
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM services");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getServiceById(int $id): ?self
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $service = $stmt->fetch();
        return $service ?: null;
    }

    public static function getServicesByGroupId(int $groupId): array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT id, name, group_id FROM services WHERE group_id = :group_id");
        $stmt->execute([':group_id' => $groupId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}       