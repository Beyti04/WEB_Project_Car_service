<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

class CarModel
{
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public int $brand_id,
        public string $model_name
    ) {
        $this->db = Database::getInstance();
    }

    public static function getModelById(int $id): ?CarModel
    {
        $sql = "SELECT * FROM car_model WHERE id = ?";

        try {
            $db=Database::getInstance();
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $modelData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($modelData) {
                return new CarModel(
                    id: (int)$modelData['id'],
                    brand_id: (int)$modelData['brand_id'],
                    model_name: $modelData['model_name']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("CarModel Fetch By ID Error: " . $e->getMessage());
            return null;
        }
    }

    public static function getModelsByBrand(int $brand_id): array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM car_model WHERE brand_id = ?";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$brand_id]);
            $models = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $models;
        } catch (PDOException $e) {
            error_log("CarModel Fetch By Brand Error: " . $e->getMessage());
            return [];
        }
    }
}
