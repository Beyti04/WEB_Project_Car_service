<?php

namespace App\Controllers;

use App\Models\Client;

class ClientController
{
    public function addClient(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=clientManager");
            exit;
        }

        $first_name = trim($_POST['first_name'] ?? '');
        $last_name = trim($_POST['last_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone_number = trim($_POST['phone'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
            $error = "Моля, попълнете всички задължителни полета!";
            require __DIR__ . '/../../src/views/addClient.php';
            return;
        }

        $client = new Client(
            id: null,
            first_name: $first_name,
            last_name: $last_name,
            phone_number: $phone_number,
            email: $email,
            password: $password
        );

        if ($client->registerUser()) {
            header("Location: index.php?action=clientManager");
            exit;
        } else {
            $error = "Неуспешно добавяне на клиент!";
            require __DIR__ . '/../../src/views/addClient.php';
        }
    }

    public static function updateClient(int $clientId, $first_name, $last_name, $email, $phone_number): void
    {
        $client = Client::getClientById($clientId);
        if ($client) {
            $client->first_name = $first_name;
            $client->last_name = $last_name;
            $client->email = $email;
            $client->phone_number = $phone_number;
            $client->updateClient();
        }
    }

    public static function removeClient(int $clientId): void
    {
        $client = Client::getClientById($clientId);
        if ($client) {
            $client->deleteClient();
        }
    }
}
