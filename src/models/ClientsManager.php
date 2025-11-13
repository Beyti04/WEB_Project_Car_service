<?php

use Config\Database;
use PDO;

class ClientsManager{
    private PDO $db;

    public array $clients = [];

    public function __construct() {
        $this->db = Database::getInstance();
        $stmt = $this->db->query("SELECT * FROM clients");
        $this->clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeClientById(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM clients WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->reloadClients();

        return true;
    }

    public function editClientById(int $id, string $first_name, string $last_name, string $phone_number, string $email): bool {
        $stmt = $this->db->prepare("UPDATE clients SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number, email = :email WHERE id = :id");
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->reloadClients();

        return true;
    }

    public function reloadClients(): void {
        $stmt = $this->db->query("SELECT * FROM clients");
        $this->clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}