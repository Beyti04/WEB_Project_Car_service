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

    public static function deleteById(int $id): void
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM materials WHERE id = :id");
        $stmt->execute([':id' => $id]);
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

    public static function getMaterialById(int $id): ?Material
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM materials WHERE id = ? LIMIT 1";
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Material(
                    id: (int)$data['id'],
                    name: $data['name'],
                    stock: (int)$data['stock'],
                    unit_price: (float)$data['unit_price'],
                    group_id_FK: (int)$data['group_id']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("Material Fetch By ID Error: " . $e->getMessage());
            return null;
        }
    }

    public function update(): bool
    {
        if ($this->id === null) {
            throw new \Exception("Cannot update a material without an ID.");
        }

        $stmt = $this->db->prepare("UPDATE materials SET name = :name, stock = :stock, unit_price = :unit_price, group_id = :group_id_FK WHERE id = :id");
        return $stmt->execute([
            ':name' => $this->name,
            ':stock' => $this->stock,
            ':unit_price' => $this->unit_price,
            ':group_id_FK' => $this->group_id_FK,
            ':id' => $this->id
        ]);
    }
}
