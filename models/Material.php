<?php

use PDO;

class Material {
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

}