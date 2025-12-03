<?php

namespace App\Controllers;

use App\Models\Material;
use Config\Database;

class MaterialController
{
    public function addMaterial(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=inventoryManager");
            exit;
        }

        $name = trim($_POST['material_name'] ?? '');
        $quantity = (int)($_POST['quantity'] ?? 0);
        $unitPrice = floatval($_POST['price'] ?? 0);
        $groupId = (int)($_POST['material_group_id'] ?? 1);

        if (empty($name) || $quantity < 0 || $unitPrice <= 0) {
            $error = "Моля, попълнете всички задължителни полета!";
            header("Location: index.php?action=newMaterial&error=" . urlencode($error));
            exit;
        }

        $material = new Material(
            id: null,
            name: $name,
            stock: $quantity,
            unit_price: $unitPrice,
            group_id_FK: $groupId
        );

        if (!$material->save()) {
            header("Location: index.php?action=inventoryManager");
            exit;
        } else {
            $error = "Неуспешно добавяне на материал!";
            header("Location: index.php?action=newMaterial&error=" . urlencode($error));
            exit;
        }
    }
    
    public static function removeMaterial(int $materialId): void
    {
        Material::deleteById($materialId);
    }

    public static function updateMaterial(int $materialId, string $name, int $stock, float $unitPrice, int $groupId): void
    {
        $material = Material::getMaterialById($materialId);
        $sqlAuditLog = "INSERT INTO audit_logs (user_id,action,entity,entity_id,created_at) VALUES (?,?,?,?,NOW())";
        if ($material) {
            $material->name = $name;
            $material->stock = $stock;
            $material->unit_price = $unitPrice;
            $material->group_id_FK = $groupId;
            $material->update();

            $db=Database::getInstance();
            $stmt=$db->prepare($sqlAuditLog);
            $stmt->execute([$_SESSION['user_id'],"Employee updated material","materials",$materialId]);
        }
    }
}
