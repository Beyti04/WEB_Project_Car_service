<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Service Order Management - TU Service</title>
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
                        "text-light": "#333333",
                        "text-dark": "#EAEAEA",
                        "text-secondary-light": "#808080",
                        "text-secondary-dark": "#A0AEC0",
                        "border-light": "#dbe0e6",
                        "border-dark": "#3A475A",
                        "card-light": "#FFFFFF",
                        "card-dark": "#1A2836"
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
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">TU Service</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Employee View</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userDashboard">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=emptyOrders">
                    <span class="material-symbols-outlined text-primary">receipt_long</span>
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

                    <!-- Table -->
                    <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <?php

                                use App\Models\Order;

                                $orders = Order::getOrdersWithNoEmployee();
                                ?>
                                <thead class="bg-gray-50 dark:bg-gray-700/50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Order ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Client Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Car (Make &amp; Model)</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Service Group</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date Opened</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php
                                    if (!$orders) {
                                        echo '<tr><td colspan="7" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">No service orders available.</td></tr>';
                                    }

                                    foreach ($orders as $order) {

                                    ?>
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 font-mono"><?php echo $order['id']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white"><?php echo $order['client_name']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['car_data'][0] . ' ' . $order['car_data'][1]; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['service_group']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800"><?php echo $order['status'] ?></span>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['opened_at']; ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                                <a href="index.php?action=takeOrder&order_id=<?php echo $order['id']; ?>">
                                                    <div class="flex items-center gap-2">
                                                        <button class="w-full flex items-center justify-center gap-2 h-10 px-4 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-sm font-bold hover:bg-primary/10 transition-colors">Take Order</button>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div id="pagination-controls" class="flex items-center justify-center p-4 gap-2"></div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const itemsPerPage = 5;
                            const tableBody = document.querySelector('tbody');
                            const rows = Array.from(tableBody.querySelectorAll('tr'));
                            const paginationContainer = document.getElementById('pagination-controls');

                            let currentPage = 1;
                            const totalPages = Math.ceil(rows.length / itemsPerPage);

                            function showPage(page) {
                                rows.forEach(row => row.style.display = 'none');

                                const start = (page - 1) * itemsPerPage;
                                const end = start + itemsPerPage;

                                rows.slice(start, end).forEach(row => row.style.display = '');

                                updateButtons(page);
                            }

                            function updateButtons(page) {
                                paginationContainer.innerHTML = '';

                                const prevBtn = document.createElement('button');
                                prevBtn.innerHTML = '<span class="material-symbols-outlined text-xl">chevron_left</span>';
                                prevBtn.className = `flex size-10 items-center justify-center rounded-full hover:bg-gray-200 dark:hover:bg-gray-800 ${page === 1 ? 'text-gray-300 cursor-not-allowed' : 'text-[#111418] dark:text-gray-400'}`;
                                prevBtn.disabled = page === 1;
                                prevBtn.onclick = () => {
                                    if (currentPage > 1) {
                                        currentPage--;
                                        showPage(currentPage);
                                    }
                                };
                                paginationContainer.appendChild(prevBtn);

                                for (let i = 1; i <= totalPages; i++) {
                                    if (i === 1 || i === totalPages || (i >= page - 1 && i <= page + 1)) {
                                        const btn = document.createElement('button');
                                        btn.innerText = i;

                                        if (i === page) {
                                            btn.className = 'text-sm font-bold flex size-10 items-center justify-center text-white rounded-full bg-primary';
                                        } else {
                                            btn.className = 'text-sm font-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800';
                                        }

                                        btn.onclick = () => {
                                            currentPage = i;
                                            showPage(currentPage);
                                        };
                                        paginationContainer.appendChild(btn);
                                    } else if (i === page - 2 || i === page + 2) {
                                        const span = document.createElement('span');
                                        span.innerText = '...';
                                        span.className = 'text-sm font-normal flex size-10 items-center justify-center text-[#111418] dark:text-white';
                                        paginationContainer.appendChild(span);
                                    }
                                }

                                const nextBtn = document.createElement('button');
                                nextBtn.innerHTML = '<span class="material-symbols-outlined text-xl">chevron_right</span>';
                                nextBtn.className = `flex size-10 items-center justify-center rounded-full hover:bg-gray-200 dark:hover:bg-gray-800 ${page === totalPages ? 'text-gray-300 cursor-not-allowed' : 'text-[#111418] dark:text-gray-400'}`;
                                nextBtn.disabled = page === totalPages;
                                nextBtn.onclick = () => {
                                    if (currentPage < totalPages) {
                                        currentPage++;
                                        showPage(currentPage);
                                    }
                                };
                                paginationContainer.appendChild(nextBtn);
                            }

                            showPage(1);
                        });
                    </script>
                </div>
            </main>
        </div>
</body>

</html>