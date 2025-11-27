<?php

namespace App\Controllers;

use App\Models\Employee;

class EmployeeController
{
    public function addEmployee(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=employeeManager");
            exit;
        }

        $first_name = trim($_POST['first_name'] ?? '');
        $last_name = trim($_POST['last_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone_number = trim($_POST['phone'] ?? '');
        $role_id = (int)($_POST['role_id'] ?? 0);
        $password = trim($_POST['password'] ?? '');
        if (empty($first_name) || empty($last_name) || empty($email) || empty($role_id) || empty($password)) {
            $error = "Моля, попълнете всички задължителни полета!";
            require __DIR__ . '/../../src/views/addEmployee.php';
            return;
        }
        $employee = new Employee(
            id: null,
            first_name: $first_name,
            last_name: $last_name,
            phone_number: $phone_number,
            role_id: $role_id,
            email: $email,
            password: $password
        );
        if ($employee->registerUser()) {
            header("Location: index.php?action=employeeManager");
            exit;
        } else {
            $error = "Неуспешно добавяне на служител!";
            require __DIR__ . '/../../src/views/addEmployee.php';
        }
    }
    public static function updateEmployee(int $employeeId, $first_name, $last_name, $email, $phone_number, $role_id): void
    {
        $employee = Employee::getEmployeeById($employeeId);
        if ($employee) {
            $employee->first_name = $first_name;
            $employee->last_name = $last_name;
            $employee->email = $email;
            $employee->phone_number = $phone_number;
            $employee->role_id = $role_id;
            $employee->updateEmployee();
        }
    }

    public static function removeEmployee(int $employeeId): void
    {
        $employee = Employee::getEmployeeById($employeeId);
        if ($employee) {
            $employee->deleteEmployee();
        }
    }

    public static function takeOrder(int $employeeId, int $orderId): void
    {
        $employee = Employee::getEmployeeById($employeeId);
        if ($employee) {
            $employee->takeOrder($orderId);
        }
    }
}
