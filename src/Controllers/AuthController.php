<?php

namespace App\Controllers;

use App\Models\Client;

class AuthController
{

    // --- РЕГИСТРАЦИЯ ---

    public function showRegister(): void
    {
        // Зареждаме вашето View за регистрация
        require __DIR__ . '/../../src/views/register.php';
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=register");
            exit;
        }
        // 1. Взимаме данните от POST заявката
        $fname = trim($_POST['first_name'] ?? '');
        $lname = trim($_POST['last_name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pass  = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';
        
        // 2. Валидация (Опростена)
        if (empty($fname) || empty($email) || empty($pass)) {
            $error = "Моля, попълнете всички задължителни полета!";
            require __DIR__ . '/../../src/views/register.php'; // Връщаме грешката във View-то
            return;
        }

        if ($pass !== $confirm) {
            $error = "Паролите не съвпадат!";
            require __DIR__ . '/../../src/views/register.php';
            return;
        }

        // 3. Проверка дали имейлът вече съществува
        if (Client::findByEmail($email)) {
            $error = "Този имейл вече е регистриран!";
            require __DIR__ . '/../../src/views/register.php';
            return;
        }

        // 4. Създаване на обекта и запис
        $client = new Client(null, $fname, $lname, $phone, $email, $pass);

        if ($client->registerUser()) {
            // Успех! Пренасочваме към вход
            require __DIR__ . '/../../src/views/userDashboard.php';
        } else {
            $error = "Възникна грешка при записа. Опитайте отново.";
            require __DIR__ . '/../../src/views/register.php';
        }
    }

    // --- ВХОД ---

    public function showLogin(): void
    {
        require __DIR__ . '/../../src/views/login.php';
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $pass  = $_POST['password'] ?? '';

        // 1. Намираме потребителя
        $client = Client::findByEmail($email);

        // 2. Проверяваме паролата
        if ($client && password_verify($pass, $client->password)) {
            // Успешен вход! Записваме в сесията.
            $_SESSION['user_id'] = $client->id;
            $_SESSION['user_role'] = 'client';
            $_SESSION['user_name'] = $client->first_name;

            require __DIR__ . '/../../src/views/userDashboard.php';
        } else {
            $error = "Грешен имейл или парола.";
            require __DIR__ . '/../../src/views/login.php';
        }
    }



    // --- ИЗХОД ---

    public function logout(): void
    {
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}
