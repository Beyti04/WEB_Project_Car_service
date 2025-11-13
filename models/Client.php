<?php

use Config\Database;
use PDO;

class Client {
    private PDO $db;
    
    public function __construct(
        public ?int $id = null,
        public string $first_name,
        public string $last_name,
        public string $phone_number,
        public string $email,
        public string $password
    ) {
        $this->db = Database::getInstance();
    }

    public function registerUser(string $password): bool {
        if($this->userFound()) {
            return false;
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO clients (first_name, last_name, phone_number, email, 'password') VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$this->first_name, $this->last_name, $this->phone_number, $this->email, $this->hashPassword($password)]);
    }

    public function loginUser(string $password): bool {
        if($this->userFound() === false) {
            return false;
        }
        $stmt=$this->db->prepare("SELECT password FROM clients WHERE email = ?");
        $stmt->execute([$this->email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data && password_verify($password, $data['password'])) {
            return true;
        }
        return false;
    }

    public function userFound(): bool {
        $stmt = $this->db->prepare("SELECT id FROM clients WHERE email = ?");
        $stmt->execute([$this->email]);
        return $stmt->rowCount() > 0;
    }

     public function hashPassword(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function getUserFromDB(string $email): ?Client {
        $stmt = $this->db->prepare("SELECT * FROM clients WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Client(
                id: $data['id'],
                first_name: $data['first_name'],
                last_name: $data['last_name'],
                phone_number: $data['phone_number'],
                email: $data['email'],
                password: $data['password']
            );
        }
        return null;
    }
}