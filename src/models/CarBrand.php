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

    public function save(): bool {
        $sql = "INSERT INTO car_brand (make) 
                VALUES (?)";
        
        try {
            $stmt = $this->db->prepare($sql);
            $success = $stmt->execute([
                $this->make
            ]);

            if ($success) {
                $this->id = (int)$this->db->lastInsertId();
            }
            return $success;
        } catch (PDOException $e) {
            error_log("CarBrand Save Error: " . $e->getMessage());
            return false;
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
