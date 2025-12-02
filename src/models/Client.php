<?php

namespace App\Models;

use Config\Database;
use PDO, PDOException;

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

    public function registerUser(): bool {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO clients (first_name, last_name, phone_number, email, password) 
                VALUES (?, ?, ?, ?, ?)";
        
        try {
            $stmt = $this->db->prepare($sql);
            $success = $stmt->execute([
                $this->first_name,
                $this->last_name,
                $this->phone_number,
                $this->email,
                $hashedPassword
            ]);

            if ($success) {
                $this->id = (int)$this->db->lastInsertId();
            }
            return $success;
        } catch (PDOException $e) {
            error_log("Client Save Error: " . $e->getMessage());
            return false;
        }
    }
    
    public static function findByEmail(string $email): ?Client {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM clients WHERE email = ?");
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

    public static function getClientById(int $id): ?Client {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Client(
                id: (int)$data['id'],
                first_name: $data['first_name'],
                last_name: $data['last_name'],
                phone_number: $data['phone_number'],
                email: $data['email'],
                password: $data['password']
            );
        }
        return null;
    }

    public static function getAllClients(): array {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM clients");
        $clients = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clients[] = $data;
        }
        return $clients;
    }

    public function updateClient(): bool {
        $sql = "UPDATE clients SET first_name = ?, last_name = ?, phone_number = ?, email = ? WHERE id = ?";
        
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $this->first_name,
                $this->last_name,
                $this->phone_number,
                $this->email,
                $this->id
            ]);
        } catch (PDOException $e) {
            error_log("Client Update Error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteClient(): bool {
        $sql = "DELETE FROM clients WHERE id = ?";
        
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$this->id]);
        } catch (PDOException $e) {
            error_log("Client Delete Error: " . $e->getMessage());
            return false;
        }
    }
}