<?php
use Config\Database;
use PDO;

class Materials_manager {
    private PDO $db;
    private array $materials = [];
    public function __construct() {
        $this->db = Database::getInstance();
        $stmt = $this->db->query("SELECT * FROM materials");
        $this->materials = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllMaterials(): array {
        return $this->materials;
    }

    public function getMaterialById(int $id): ?array {
        foreach ($this->materials as $material) {
            if ($material['id'] === $id) {
                return $material;
            }
        }
        return null;
    }

    public function getMaterialsByGroupId(int $group_id): array {
        $filteredMaterials = [];
        foreach ($this->materials as $material) {
            if ($material['group_id_FK'] === $group_id) {
                $filteredMaterials[] = $material;
            }
        }
        return $filteredMaterials;
    }

    public function updateStock(int $id, int $newStock): bool {
        $stmt = $this->db->prepare("UPDATE materials SET stock = :stock WHERE id = :id");
        $stmt->bindParam(':stock', $newStock, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->reloadMaterials();

        return true;
    }

    public function reloadMaterials(): void {
        $stmt = $this->db->query("SELECT * FROM materials");
        $this->materials = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStock(int $id, int $amount): bool {
        $material = $this->getMaterialById($id);
        if ($material) {
            $newStock = $material['stock'] + $amount;
            return $this->updateStock($id, $newStock);
        }
        return false;
    }

    public function reduceStock(int $id, int $amount): bool {
        $material = $this->getMaterialById($id);
        if ($material && $material['stock'] >= $amount) {
            $newStock = $material['stock'] - $amount;
        }
        else{
            $newStock = 0;
        }
        return $this->updateStock($id, $newStock);
    }

    public function changePrice(int $id, float $newPrice): bool {
        $stmt = $this->db->prepare("UPDATE materials SET unit_price = :price WHERE id = :id");
        $stmt->bindParam(':price', $newPrice);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->reloadMaterials();

        return true;
    }
}
?>