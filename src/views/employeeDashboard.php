<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Employee Dashboard - TU Service</title>
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
                        "success": "#2ECC71",
                        "warning": "#F39C12",
                        "danger": "#E74C3C",
                        "info": "#3498DB",
                        "text-light": "#333333",
                        "text-dark": "#EAEAEA",
                        "text-secondary-light": "#808080",
                        "text-secondary-dark": "#A0AEC0",
                        "border-light": "#dbe0e6",
                        "border-dark": "#3A475A",
                        "card-light": "#FFFFFF",
                        "card-dark": "#1A2836",
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
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-[#333333] dark:text-gray-200">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
            <a href="index.php?action=employeeDashboard" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">TU Service</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Employee View</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=employeeDashboard">
                    <span class="material-symbols-outlined text-primary">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=emptyOrders">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Service Requests</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=employeeAppointments">
                    <span class="material-symbols-outlined">calendar_month</span>
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
                                <?php

                                use App\Controllers\EmployeeController;

                                echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>
                            </p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Employee</p>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-10 flex justify-center">
                <!-- Centered container -->
                <div class="w-full max-w-6xl">

                    <div class="flex flex-wrap justify-between gap-4 mb-8 items-center">
                        <div class="flex flex-col gap-1">
                            <p class="text-3xl font-bold leading-tight tracking-tight">
                                Welcome back, <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>!
                            </p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark text-base font-normal leading-normal">
                                Here's an overview of your tasks and requests.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-3 flex flex-col gap-6">

                            <!-- Active Service Requests -->
                            <div class="rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                                <h2 class="text-lg font-bold leading-normal mb-4">Active Appointments</h2>

                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-6 items-start">

                                        <?php

                                        use App\Models\Order;

                                        $activeOrders = Order::getOrderByEmployeeId($_SESSION['user_id']);

                                        foreach ($activeOrders as $order) {
                                            if ($order['status'] == 'Приета') {
                                                $progressWidth = 20;
                                                $color = 'text-primary';
                                            } elseif ($order['status'] == 'Диагностика') {
                                                $progressWidth = 40;
                                                $color = 'text-yellow-500';
                                            } elseif ($order['status'] == 'Ремонт') {
                                                $progressWidth = 60;
                                                $color = 'text-orange-500';
                                            } elseif ($order['status'] == 'Тестване') {
                                                $progressWidth = 80;
                                                $color = 'text-purple-500';
                                            }
                                        ?>

                                            <div class="flex flex-col md:flex-row gap-4 w-full">
                                                <div class="flex-1">
                                                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">
                                                        <?php echo htmlspecialchars($order['brand_name']) . " " . htmlspecialchars($order['model_name']) ?>
                                                    </p>
                                                    <p class="font-bold text-xl mb-3">
                                                        <?php echo htmlspecialchars($order['service_name']) ?>
                                                    </p>
                                                    <div class="flex items-center gap-2 text-sm text-text-secondary-light dark:text-text-secondary-dark">
                                                        <span class="material-symbols-outlined text-base">receipt_long</span>
                                                        <span>Order #<?php echo htmlspecialchars($order['order_id']) ?></span>
                                                    </div>
                                                </div>

                                                <div class="flex-1 w-full">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <p class="font-bold <?php echo $color ?>">
                                                            <?php echo $order['status'] ?>
                                                        </p>
                                                    </div>

                                                    <div class="w-full bg-background-light dark:bg-background-dark rounded-full h-2.5">
                                                        <div class="bg-primary h-2.5 rounded-full"
                                                            style="width: <?php echo $progressWidth ?>%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                            <!-- Service History -->
                            <div class="rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-lg font-bold leading-normal">Previous Appointments</h2>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="w-full text-left">
                                        <thead class="text-xs text-text-secondary-light dark:text-text-secondary-dark uppercase">
                                            <tr>
                                                <th class="py-3 pr-6">Date</th>
                                                <th class="py-3 px-6">Service</th>
                                                <th class="py-3 px-6">Vehicle</th>
                                                <th class="py-3 px-6">Client</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $orders = EmployeeController::getPreviousAppointments($_SESSION['user_id']);
                                            foreach ($orders as $order) {
                                            ?>
                                                <tr class="border-b border-border-light dark:border-border-dark">
                                                    <td class="py-4 pr-6 font-medium"><?php echo htmlspecialchars($order['opened_at']) ?></td>
                                                    <td class="py-4 px-6"><?php echo htmlspecialchars($order['service_name']) ?></td>
                                                    <td class="py-4 px-6">
                                                        <?php echo htmlspecialchars($order['year']) . " " . htmlspecialchars($order['brand_name']) . " " . htmlspecialchars($order['model_name']) ?>
                                                    </td>
                                                    <td class="py-4 px-6 text-text-secondary-light dark:text-text-secondary-dark">
                                                        <?php echo htmlspecialchars($order['client_name']) ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>
</body>

</html>