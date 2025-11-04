<?php

use PDO;

class Client {
    private PDO $db;
    
    public function __construct(
        public ?int $id = null,
        public string $first_name,
        public string $last_name,
        public string $phone_number,
        public string $email
    ) {
        $this->db = Database::getInstance();
    }

}