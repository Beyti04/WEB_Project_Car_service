<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Employee Management - TU Service</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#1173d4",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
        }

        .material-symbols-outlined.fill {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="font-display bg-background-light dark:bg-background-dark">
    <div class="relative flex min-h-screen w-full">
        <!-- Side Navigation Bar -->
        <aside class="flex flex-col w-64 bg-white border-r border-border-light p-4 shrink-0">
            <a href="#" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Admin View</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=adminDashboard">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=adminDashboard">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">Schedule</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=orders">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Orders</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=clientManager">
                    <span class="material-symbols-outlined">group</span>
                    <p class="text-sm font-medium leading-normal">Clients</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=employeeManager">
                    <span class="material-symbols-outlined text-primary">badge</span>
                    <p class="text-sm font-medium leading-normal">Employees</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=serviceManager">
                    <span class="material-symbols-outlined">build</span>
                    <p class="text-sm font-medium leading-normal">Services</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=inventoryManager">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <p class="text-sm font-medium leading-normal">Inventory</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">assessment</span>
                    <p class="text-sm font-medium leading-normal">Reports</p>
                </a>
            </nav>
            <div class="flex flex-col gap-4">
                <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                    <span class="truncate">Create New Order</span>
                </button>
                <div class="flex flex-col gap-1">
                    <a href="index.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Logout</p>
                    </a>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col">
            <!-- TopNavBar -->
            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-border-light px-10 py-3 bg-white">
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-background-light text-text-light hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar image" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuADijiRLLPR2eRQXqbVqSmI5KeUFyXAg8F2zmY2mwfb1Pgm6eF-NmHWlSRm0xVvnz3wcPCkB7pflS81XhFJqdUyEEk4srBqEw81WqNgyxpAXWyBF4WXayX_79fjNwvjFvRP2mygTB8JtFtvmgwCmXAkWO1vUyZ6xTjfEnPmwsZD1QhwGVWu-iSAwpmnxmU_NGK7U5sH-U54t-zfth88S-uqzwxhC_4dJgAlM1nGXJJ3Wb2EztyredxX5Mc4g-N4vxPoQmZFTCyPxOs');"></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold"><?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></p>
                            <p class="text-text-secondary-light">Admin</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-8">
                <div class="w-full max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                        <div class="flex flex-col">
                            <h1 class="text-3xl font-bold leading-tight tracking-tight">Employee Management</h1>
                            <p class="text-[#617589] dark:text-gray-400 text-base font-normal leading-normal mt-2">View, add, and manage employee records.</p>
                        </div>
                        <a href="index.php?action=newEmployee">
                        <button class="flex items-center gap-2 min-w-[84px] cursor-pointer justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90">
                            <span class="material-symbols-outlined" style="font-size: 20px;">add</span>
                            <span class="truncate">Add New Employee</span>
                        </button>
                        </a>
                    </div>
                    <!-- Toolbar and Filters -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <!-- SearchBar -->
                        <div class="lg:col-span-2">
                            <label class="flex flex-col w-full h-12">
                                <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                                    <div class="text-gray-500 dark:text-gray-400 flex bg-white dark:bg-gray-800 items-center justify-center pl-4 rounded-l-lg border border-gray-300 dark:border-gray-700 border-r-0">
                                        <span class="material-symbols-outlined mr-2">search</span>
                                    </div>
                                    <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-gray-900 dark:text-gray-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 h-full placeholder:text-gray-500 dark:placeholder:text-gray-400 px-4 text-base font-normal leading-normal"
                                        placeholder="Search by name, email...">
                                </div>
                            </label>
                        </div>

                        <!-- Role Dropdown -->
                        <div class="w-full">
                            <div class="relative h-12">
                                <select class="flex w-full flex-1 items-stretch rounded-lg h-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-200 pl-4 pr-10 text-base font-normal leading-normal focus:outline-0 focus:ring-2 focus:ring-primary/50 appearance-none">
                                    <option disabled selected>All Roles</option>
                                    <?php

                                    use App\Models\Role;

                                    $roles = Role::getAllRoles();
                                    foreach ($roles as $role):
                                        if ($role['role_name'] === 'Client' || $role['role_name'] === 'Admin') {
                                            continue;
                                        }
                                    ?>
                                        <option value="<?= htmlspecialchars($role['id']) ?>"><?= htmlspecialchars($role['role_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Data Table -->
                    <div class="mt-6 bg-white dark:bg-[#18212a] rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                        <div class="overflow-x-auto">

                            <?php

                            use App\Models\Employee;

                            $employees = Employee::getAllEmployees();
                            ?>

                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-900/50">
                                    <tr>
                                        <th class="px-6 py-3" scope="col">Employee Name</th>
                                        <th class="px-6 py-3" scope="col">Role</th>
                                        <th class="px-6 py-3" scope="col">Email Address</th>
                                        <th class="px-6 py-3" scope="col">Phone Number</th>
                                        <th class="px-6 py-3 text-right" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $roles = Role::getAllRoles();
                                    $roleNames = [];
                                    foreach ($roles as $role) {
                                        $roleNames[$role['id']] = $role['role_name'];
                                    }
                                    ?>
                                    <?php if ($employees): ?>
                                        <?php foreach ($employees as $employee): ?>
                                            <tr class="bg-white dark:bg-[#18212a] border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900/50">
                                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"><?= htmlspecialchars($employee['first_name'] . ' ' . $employee['last_name']) ?></td>
                                                <td class="px-6 py-4"><?= htmlspecialchars($roleNames[$employee['role_id']] ?? 'Unknown') ?></td>
                                                <td class="px-6 py-4"><?= htmlspecialchars($employee['email']) ?></td>
                                                <td class="px-6 py-4"><?= htmlspecialchars($employee['phone_number']) ?></td>
                                                <td class="px-6 py-4 text-right flex justify-end gap-2">
                                                    <a href="index.php?action=editEmployee&id=<?= htmlspecialchars($employee['id']) ?>">
                                                    <button class="p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">edit</span></button>
                                                    </a>
                                                    <a href="index.php?action=removeEmployee&employee_id=<?= htmlspecialchars($employee['id']) ?>">
                                                    <button class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">delete</span></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No employees found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="flex items-center justify-center p-4">
                        <a class="flex size-10 items-center justify-center text-[#111418] dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#">
                            <span class="material-symbols-outlined text-xl">chevron_left</span>
                        </a>
                        <a class="text-sm font-bold leading-normal tracking-[0.015em] flex size-10 items-center justify-center text-white rounded-full bg-primary" href="#">1</a>
                        <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800" href="#">2</a>
                        <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800" href="#">3</a>
                        <span class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full" href="#">...</span>
                        <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800" href="#">10</a>
                        <a class="flex size-10 items-center justify-center text-[#111418] dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#">
                            <span class="material-symbols-outlined text-xl">chevron_right</span>
                        </a>
                    </div>

                </div>
            </main>
        </div>
    </div>
</body>

</html>