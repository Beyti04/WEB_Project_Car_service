<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Role;

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
        $role_id = $_POST['role_id_FK'] ?? '';
        $email = trim($_POST['email'] ?? '');
        $pass  = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        // 2. Валидация (Опростена)
        if (empty($fname) || empty($email) || empty($pass)) {
            $error = "Моля, попълнете всички задължителни полета!";
            header("Location: index.php?action=register");
            return;
        }

        if ($pass !== $confirm) {
            $error = "Паролите не съвпадат!";
            header("Location: index.php?action=register");
            return;
        }

        // 3. Проверка дали имейлът вече съществува
        if (Client::findByEmail($email)) {
            $error = "Този имейл вече е регистриран!";
            header("Location: index.php?action=register");
            return;
        }

        if (Employee::findByEmail($email)) {
            $error = "Този имейл вече е регистриран!";
            header("Location: index.php?action=register");
            return;
        }

        // 4. Създаваме нов потребител
        $roles = Role::getAllRoles();
        $roleName = '';
        foreach ($roles as $role) {
            if ($role['id'] === (int)$role_id) {
                $roleName = $role['role_name'];
                break;
            }
        }
        if ($roleName === 'Client') {
            $user = new Client(
                id: null,
                first_name: $fname,
                last_name: $lname,
                phone_number: $phone,
                email: $email,
                password: $pass
            );
        } else {
            $user = new Employee(
                id: null,
                first_name: $fname,
                last_name: $lname,
                phone_number: $phone,
                role_id: (int)$role_id,
                email: $email,
                password: $pass
            );
        }
        $success = $user->registerUser();
        if ($success) {
            header("Location: index.php?action=userDashboard");
        } else {
            $error = "Грешка при регистрацията. Моля, опитайте отново.";
            header("Location: index.php?action=home");
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

        if (empty($email) || empty($pass)) {
            header("Location: index.php?action=login&error=empty");
            exit;
        }

        $client = Client::findByEmail($email) ?: null;

        if ($client && password_verify($pass, $client->password)) {
            $_SESSION['user_id'] = $client->id;
            $_SESSION['user_role'] = 'Client';
            $_SESSION['user_name'] = $client->first_name;

            header("Location: index.php?action=userDashboard");
            exit;
        }


        $employee = Employee::findByEmail($email) ?: null;

        if ($employee && password_verify($pass, $employee->password) && $employee->role_id===2) {
            // Успешен вход за служител! Записваме в сесията.
            $_SESSION['user_id'] = $employee->id;
            $_SESSION['user_role'] = 'Employee';
            $_SESSION['user_name'] = $employee->first_name;

            header("Location: index.php?action=employeeDashboard");
            exit;
        }
        elseif ($employee && password_verify($pass, $employee->password) && $employee->role_id===1) {
            // Успешен вход за администратор! Записваме в сесията.
            $_SESSION['user_id'] = $employee->id;
            $_SESSION['user_role'] = 'Admin';
            $_SESSION['user_name'] = $employee->first_name;

            header("Location: index.php?action=adminDashboard");
            exit;
        }

        header("Location: index.php?action=login");
        exit;
    }



    // --- ИЗХОД ---

    public function logout(): void
    {
        session_destroy();
        header("Location: index.php?action=home");
        exit;
    }
}
