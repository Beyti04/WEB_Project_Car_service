<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Employee - Car Service Management</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#1173d4",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                        "destructive": "#D93025"
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    }
                },
            },
        }
    </script>
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-[#333333] dark:text-gray-200">
    <?php

    use App\Models\Employee;
    use App\Models\Role;

    $roles = Role::getAllRoles();
    $roleNames = [];
    foreach ($roles as $role) {
        if ($role['role_name'] != 'Client') {
            $roleNames[$role['id']] = $role['role_name'];
        }
    }


    ?>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
            <a href="index.php?action=adminDashboard" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">group</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Admin Portal</p>
                </div>
            </a>

            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=adminDashboard">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=employeeManager">
                    <span class="material-symbols-outlined text-primary">group</span>
                    <p class="text-sm font-medium leading-normal">Employees</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=appointments">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">Appointments</p>
                </a>
            </nav>

            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <a href="index.php?action=logout" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Logout</p>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Layout -->
        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark px-10 py-3 bg-card-light dark:bg-card-dark">
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar image" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuADijiRLLPR2eRQXqbVqSmI5KeUFyXAg8F2zmY2mwfb1Pgm6eF-NmHWlSRm0xVvnz3wcPCkB7pflS81XhFJqdUyEEk4srBqEw81WqNgyxpAXWyBF4WXayX_79fjNwvjFvRP2mygTB8JtFtvmgwCmXAkWO1vUyZ6xTjfEnPmwsZD1QhwGVWu-iSAwpmnxmU_NGK7U5sH-U54t-zfth88S-uqzwxhC_4dJgAlM1nGXJJ3Wb2EztyredxX5Mc4g-N4vxPoQmZFTCyPxOs");'></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold"><?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Admin</p>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-10">
                <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow border dark:border-gray-700">
                    <h1 class="text-3xl font-bold mb-6">Edit Employee</h1>

                    <form action="index.php?action=addEmployee" method="POST" class="space-y-4">

                        <div>
                            <label class="text-sm font-medium mb-1">First Name</label>
                            <input type="text" name="first_name" required
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                value="">
                        </div>

                        <div>
                            <label class="text-sm font-medium mb-1">Last Name</label>
                            <input type="text" name="last_name" required
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                value="">
                        </div>

                        <div>
                            <label class="text-sm font-medium mb-1">Email</label>
                            <input type="email" name="email" required
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                value="">
                        </div>

                        <div>
                            <label class="text-sm font-medium mb-1">Phone</label>
                            <input type="text" name="phone"
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                value="">
                        </div>

                        <div>
                            <label class="text-sm font-medium mb-1">Position</label>
                            <select name="role_id"
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
                                <?php foreach ($roleNames as $roleId => $roleName): ?>
                                    <option value="<?php echo htmlspecialchars($roleId); ?>">
                                        <?php echo htmlspecialchars($roleName); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm font-medium mb-1">Password</label>
                            <input type="password" name="password" required
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                value="">
                        </div>

                        <div class="flex justify-end gap-3 pt-4 border-t dark:border-gray-700">
                            <a href="index.php?action=employeeManager"
                                class="px-4 h-10 flex items-center rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200">
                                Cancel
                            </a>

                            <button type="submit"
                                class="px-4 h-10 rounded-lg bg-primary text-white font-bold hover:bg-primary/90">
                                Save Changes
                            </button>
                        </div>

                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>