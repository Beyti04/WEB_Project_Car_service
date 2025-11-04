<?php

use PDO;

class ServiceGroup {
    private PDO $db;

    public function __construct(
        public ?int $id = null,
        public string $name
    ) {
        $this->db = Database::getInstance();
    }

}
