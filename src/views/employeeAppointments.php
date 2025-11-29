<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Service Order Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet" />
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
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
    <div class="flex h-screen">
        <!-- SideNavBar -->
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
            <a href="index.php?action=employeeDashboard" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Employee Portal</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userDashboard">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=emptyOrders">
                    <span class="material-symbols-outlined ">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Service Requests</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=employeeAppointments">
                    <span class="material-symbols-outlined text-primary">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">Appointments</p>
                </a>

            </nav>
            <div class="flex flex-col gap-4 mt-4">
                <a href="index.php?action=logout" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined">logout</span>
                    <p class="text-sm font-medium leading-normal">Logout</p>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-end whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark px-10 py-3 bg-card-light dark:bg-card-dark">
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Employee avatar image" style='background-image: url("https://via.placeholder.com/40");'></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold">
                                <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>
                            </p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Employee</p>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main Content -->
            <main class="flex-1 flex flex-col overflow-y-auto">
                <div class="p-8">
                    <!-- PageHeading -->
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                        <h1 class="text-gray-900 dark:text-white text-3xl font-bold leading-tight">Service Order Management</h1>
                    </div>
                    <!-- Search and Filter Bar -->
                    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-center">
                            <div class="lg:col-span-2">
                                <label class="flex flex-col min-w-40 h-12 w-full">
                                    <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                                        <div class="text-gray-500 dark:text-gray-400 flex bg-background-light dark:bg-gray-700 items-center justify-center pl-4 rounded-l-lg">
                                            <span class="material-symbols-outlined">search</span>
                                        </div>
                                        <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary/50 border-none bg-background-light dark:bg-gray-700 h-full placeholder:text-gray-500 dark:placeholder:text-gray-400 px-4 text-sm" placeholder="Search by client, car, order ID..." value="" />
                                    </div>
                                </label>
                            </div>
                            <div class="flex items-center gap-3 overflow-x-auto">
                                <button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-background-light dark:bg-gray-700 px-4 w-full">
                                    <p class="text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal">Status: All</p>
                                    <span class="material-symbols-outlined text-gray-500 dark:text-gray-400 text-base">expand_more</span>
                                </button>
                            </div>
                            <div class="flex items-center gap-3 overflow-x-auto">
                                <button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-background-light dark:bg-gray-700 px-4 w-full">
                                    <p class="text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal">Employee</p>
                                    <span class="material-symbols-outlined text-gray-500 dark:text-gray-400 text-base">expand_more</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <?php

                                use App\Models\Order;

                                $orders = Order::getOrderByEmployeeId($_SESSION['user_id'] ?? 0);
                                ?>
                                <thead class="bg-gray-50 dark:bg-gray-700/50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Order ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Client Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Car (Make &amp; Model)</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Service group</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date Opened</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php

                                    foreach ($orders as $order) {

                                    ?>
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 font-mono"><?php echo $order['order_id']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white"><?php echo $order['client_name']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['brand_name'] . ' ' . $order['model_name']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['service_group']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800"><?php echo $order['status']?></span>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['opened_at']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center gap-2">
                                                    <a href="index.php?action=orderMaterials&order_id=<?php echo $order['order_id']?>">
                                                    <button class="text-gray-500 hover:text-primary dark:text-gray-400 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                                    </a>
                                                    <button class="text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">Cancel</span></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6 px-1">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">20</span> results</p>
                        <div class="flex items-center gap-2">
                            <button class="flex items-center justify-center h-8 w-8 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50" disabled="">
                                <span class="material-symbols-outlined text-lg">chevron_left</span>
                            </button>
                            <button class="flex items-center justify-center h-8 w-8 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <span class="material-symbols-outlined text-lg">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
</body>

</html>