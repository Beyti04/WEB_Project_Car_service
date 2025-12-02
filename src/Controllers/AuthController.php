<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Role;

class AuthController
{
    public function showRegister(): void
    {
        require __DIR__ . '/../../src/views/register.php';
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=register");
            exit;
        }
        $fname = trim($_POST['first_name'] ?? '');
        $lname = trim($_POST['last_name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $role_id = $_POST['role_id_FK'] ?? '';
        $email = trim($_POST['email'] ?? '');
        $pass  = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (empty($fname) || empty($email) || empty($pass)) {
            $error = "Моля, попълнете всички задължителни полета!";
            header("Location: index.php?action=register&error=" . urlencode($error));
            return;
        }

        if(strlen($phone) != 10 && !empty($phone)) {
            $error = "Невалиден телефонен номер!";
            header("Location: index.php?action=register&error=" . urlencode($error));
            return;
        }

        if ($pass !== $confirm) {
            $error = "Паролите не съвпадат!";
            header("Location: index.php?action=register&error=" . urlencode($error));
            return;
        }

        if (Client::findByEmail($email)) {
            $error = "Този имейл вече е регистриран!";
            header("Location: index.php?action=register&error=" . urlencode($error));
            return;
        }

        if (Employee::findByEmail($email)) {
            $error = "Този имейл вече е регистриран!";
            header("Location: index.php?action=register&error=" . urlencode($error));
            return;
        }

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
        $roles = Role::getAllRoles();
        $roleName = '';
        foreach ($roles as $role) {
            if ($role['id'] === $employee->role_id) {
                $roleName = $role['role_name'];
                break;
            }
        }

        if ($employee && password_verify($pass, $employee->password) && $roleName === 'Admin') {
            $_SESSION['user_id'] = $employee->id;
            $_SESSION['user_role'] = 'Admin';
            $_SESSION['user_name'] = $employee->first_name;

            header("Location: index.php?action=adminDashboard");
            exit;
        } elseif ($employee && password_verify($pass, $employee->password)) {
            $_SESSION['user_id'] = $employee->id;
            $_SESSION['user_role'] = 'Employee';
            $_SESSION['user_name'] = $employee->first_name;

            header("Location: index.php?action=userDashboard");
            exit;
        }


        header("Location: index.php?action=login&error=Invalid email or password");
        exit;
    }



    public function logout(): void
    {
        session_destroy();
        header("Location: index.php?action=home");
        exit;
    }
}
