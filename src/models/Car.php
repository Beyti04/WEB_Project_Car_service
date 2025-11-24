<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

class Car
{
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public int $model_id,
        public int $year,
        public string $vin,
        public int $owner
    )
    {
        $this->db = Database::getInstance();
    }


    public function save(): bool {
        $sql = "INSERT INTO car (model_id, year, vin, owner) 
                VALUES (?, ?, ?, ?)";
        
        try {
            $stmt = $this->db->prepare($sql);
            $success = $stmt->execute([
                $this->model_id,
                $this->year,
                $this->vin,
                $this->owner
            ]);

            if ($success) {
                $this->id = (int)$this->db->lastInsertId();
            }
            return $success;
        } catch (PDOException $e) {
            error_log("Car Save Error: " . $e->getMessage());
            return false;
        }
    }

    public static function findByVin(string $vin): ?Car {
        $db = Database::getInstance();
        $sql = "SELECT * FROM car WHERE vin = ? LIMIT 1";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$vin]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Car(
                    id: (int)$data['id'],
                    model_id: (int)$data['model_id'],
                    year: (int)$data['year'],
                    vin: $data['vin'],
                    owner: (int)$data['owner']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("Car Find Error: " . $e->getMessage());
            return null;
        }
    }

    public static function getCarsByOwner(int $ownerId): array {
        $db = Database::getInstance();
        $sql = "SELECT * FROM car WHERE owner = ?";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$ownerId]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $cars = [];
            foreach ($rows as $data) {
                $cars[] = new Car(
                    id: (int)$data['id'],
                    model_id: (int)$data['model_id'],
                    year: (int)$data['year'],
                    vin: $data['vin'],
                    owner: (int)$data['owner']
                );
            }
            return $cars;
        } catch (PDOException $e) {
            error_log("Car Get By Owner Error: " . $e->getMessage());
            return [];
        }
    }

    public function getBrands(): ?array {
        $db = Database::getInstance();
        $sql = "SELECT * FROM car_brand ";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$this->model_id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return [
                    'id' => (int)$data['id'],
                    'brand' => $data['brand_name']
                ];
            }
            return null;
        } catch (PDOException $e) {
            error_log("Car Brand Details Error: " . $e->getMessage());
            return null;
        }
    }

    public function getModels($car_brand): ?array {
        $db = Database::getInstance();
        $sql = "SELECT * FROM car_model WHERE brand_id = $car_brand";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$this->model_id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return [
                    'id' => (int)$data['id'],
                    'make' => $data['make'],
                    'model' => $data['model']
                ];
            }
            return null;
        } catch (PDOException $e) {
            error_log("Car Model Details Error: " . $e->getMessage());
            return null;
        }
    }

    public static function getCarById(int $id): ?Car {
        $db = Database::getInstance();
        $sql = "SELECT * FROM car WHERE id = ? LIMIT 1";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Car(
                    id: (int)$data['id'],
                    model_id: (int)$data['model_id'],
                    year: (int)$data['year'],
                    vin: $data['vin'],
                    owner: (int)$data['owner']
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("Car Fetch By ID Error: " . $e->getMessage());
            return null;
        }
    }

    public function delete(): bool {
        $sql = "DELETE FROM car WHERE id = ?";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$this->id]);
        } catch (PDOException $e) {
            error_log("Car Delete Error: " . $e->getMessage());
            return false;
        }
    }

    public function update(): bool {
        $sql = "UPDATE car SET model_id = ?, year = ?, vin = ? WHERE id = ?";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $this->model_id,
                $this->year,
                $this->vin,
                $this->id
            ]);
        } catch (PDOException $e) {
            error_log("Car Update Error: " . $e->getMessage());
            return false;
        }
    }
}