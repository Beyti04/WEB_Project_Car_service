<?php

use PDO;

class Employee {
    private PDO $db;
    
    public function __construct(
        public ?int $id = null,
        public string $first_name,
        public string $last_name,
        public int $role_id_FK
    ) {
        $this->db = Database::getInstance();
    }
}