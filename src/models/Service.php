<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

class Service
{
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
        $stmt = $this->db->prepare("INSERT INTO services (name, base_price, group_id) VALUES (:name, :price, :group_id_FK)");
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
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function getServiceById(int $id): ?Service
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM services WHERE id = ? LIMIT 1";
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Service(
                    id: (int)$data['id'],
                    name: $data['name'],
                    price: (float)$data['base_price'],
                    group_id_FK: (int)$data['group_id']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("Service Fetch By ID Error: " . $e->getMessage());
            return null;
        }
    }

    public static function getServicesByGroupId(int $groupId): array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT id, name, group_id FROM services WHERE group_id = :group_id");
        $stmt->execute([':group_id' => $groupId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteById(int $id): void
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM services WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function update(): void
    {
        if ($this->id === null) {
            throw new \Exception("Cannot update a service without an ID.");
        }

        $stmt = $this->db->prepare("UPDATE services SET name = :name, base_price = :price, group_id = :group_id WHERE id = :id");
        $stmt->execute([
            ':name' => $this->name,
            ':price' => $this->price,
            ':group_id' => $this->group_id_FK,
            ':id' => $this->id
        ]);
    }
}
