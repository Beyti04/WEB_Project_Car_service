<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

class Material
{
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public string $name,
        public int $stock,
        public float $unit_price,
        public int $group_id_FK
    ) {
        $this->db = Database::getInstance();
    }

    public function save(): void
    {
        $stmt = $this->db->prepare("INSERT INTO materials (name, stock, unit_price, group_id) VALUES (:name, :stock, :unit_price, :group_id_FK)");
        $stmt->execute([
            ':name' => $this->name,
            ':stock' => $this->stock,
            ':unit_price' => $this->unit_price,
            ':group_id_FK' => $this->group_id_FK
        ]);
        $this->id = (int)$this->db->lastInsertId();
    }

    public static function deleteById(int $materialId): void
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM materials WHERE id = :id");
        $stmt->execute([':id' => $materialId]);
    }

    public static function getAllMaterials(): array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM materials";
        try {
            $stmt = $db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            error_log("Get All Materials Error: " . $e->getMessage());
            return [];
        }
    }

    public static function getMaterialById(int $id): ?self
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM materials WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $material = $stmt->fetch();
        return $material ?: null;
    }

    public static function getMaterialsByGroupId(int $groupId): array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT id, name, group_id FROM materials WHERE group_id = :group_id");
        $stmt->execute([':group_id' => $groupId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function decreaseStock(int $materialId, int $amount): bool
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE materials SET stock = stock - :amount WHERE id = :id AND stock >= :amount");
        return $stmt->execute([
            ':amount' => $amount,
            ':id' => $materialId
        ]);
    }

    public static function increaseStock(int $materialId, int $amount): bool
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE materials SET stock = stock + :amount WHERE id = :id");
        return $stmt->execute([
            ':amount' => $amount,
            ':id' => $materialId
        ]);
    }

    public static function editMaterial(int $materialId, string $name, int $stock, float $unitPrice, int $groupId): bool
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE materials SET name = :name, stock = :stock, unit_price = :unit_price, group_id_FK = :group_id WHERE id = :id");
        return $stmt->execute([
            ':name' => $name,
            ':stock' => $stock,
            ':unit_price' => $unitPrice,
            ':group_id' => $groupId,
            ':id' => $materialId
        ]);
    }
}
