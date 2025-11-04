<?php

use PDO;

class Service {
    private PDO $db;
    
    public function __construct(
        public ?int $id = null,
        public string $name,
        public float $price,
        public int $group_id_FK
    ) {
        $this->db = Database::getInstance();
    }

}       