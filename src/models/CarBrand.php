<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

class CarBrand
{
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public string $make
    ) {
        $this->db = Database::getInstance();
    }

    public static function getBrandById(int $id): ?CarBrand {
        $db = Database::getInstance();
        $sql = "SELECT * FROM car_brand WHERE id = ?";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $brandData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($brandData) {
                return new CarBrand(
                    id: (int)$brandData['id'],
                    make: $brandData['brand_name']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("CarBrand Fetch Error: " . $e->getMessage());
            return null;
        }
    }

    public static function getAllBrands(): array {
        $db = Database::getInstance();
        $sql = "SELECT * FROM car_brand";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

            print_r($brands);

            return $brands;
        } catch (PDOException $e) {
            error_log("CarBrand Fetch Error: " . $e->getMessage());
            return [];
        }
    }
}
