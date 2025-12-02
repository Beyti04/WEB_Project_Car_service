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
        <aside class="flex flex-col w-64 bg-white border-r border-border-light p-4 shrink-0">

            <a href="#" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">TU Service</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Admin View</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=adminDashboard">
                    <span class="material-symbols-outlined ">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=orders">
                    <span class="material-symbols-outlined text-primary">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Orders</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=clientManager">
                    <span class="material-symbols-outlined">group</span>
                    <p class="text-sm font-medium leading-normal">Clients</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=employeeManager">
                    <span class="material-symbols-outlined">badge</span>
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
            </nav>
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <a href="index.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Logout</p>
                    </a>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- TopNavBar -->
            <header class="flex items-center justify-between whitespace-nowrap border-b border-border-light px-10 py-3 bg-white">
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar image" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuADijiRLLPR2eRQXqbVqSmI5KeUFyXAg8F2zmY2mwfb1Pgm6eF-NmHWlSRm0xVvnz3wcPCkB7pflS81XhFJqdUyEEk4srBqEw81WqNgyxpAXWyBF4WXayX_79fjNwvjFvRP2mygTB8JtFtvmgwCmXAkWO1vUyZ6xTjfEnPmwsZD1QhwGVWu-iSAwpmnxmU_NGK7U5sH-U54t-zfth88S-uqzwxhC_4dJgAlM1nGXJJ3Wb2EztyredxX5Mc4g-N4vxPoQmZFTCyPxOs");'></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold"><?php

                                                    use App\Models\Order;

                                                    echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Admin</p>
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
                                <div class="relative w-full">
                                    <select class="flex h-10 items-center justify-between gap-x-2 rounded-lg bg-background-light dark:bg-gray-700 px-4 w-full text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal border border-border-light dark:border-border-dark appearance-none cursor-pointer">
                                        <option value="" selected>Status</option>
                                        <?php

                                        use App\Models\Status;

                                        $statuses = Status::getAllStatuses();
                                        foreach ($statuses as $status) {
                                            echo '<option value="' . htmlspecialchars($status->status) . '">' . htmlspecialchars($status->status) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 overflow-x-auto">
                                <div class="relative w-full">
                                    <select class="flex h-10 items-center justify-between gap-x-2 rounded-lg bg-background-light dark:bg-gray-700 px-4 w-full text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal border border-border-light dark:border-border-dark appearance-none cursor-pointer">
                                        <option value="" selected>Assigned Employee</option>
                                        <?php

                                        use App\Models\Employee;

                                        $employees = Employee::getAllEmployees();
                                        var_dump($employees);
                                        foreach ($employees as $employee) {
                                            echo '<option value="' . htmlspecialchars($employee["first_name"]) .' '. htmlspecialchars($employee["last_name"])  . '">' . htmlspecialchars($employee["first_name"]) .' '. htmlspecialchars($employee["last_name"]) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700/50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Order ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Client Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Car</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Assigned Employee</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date Opened</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php
                                    $orders = Order::getAllOrders();
                                    foreach ($orders as $order) {
                                        if ($order['status'] == 'Приета') {
                                            $color = 'text-blue-700 dark:text-primary-300 bg-blue-100 dark:bg-blue-500/50';
                                        } elseif ($order['status'] == 'Диагностика') {
                                            $color = 'text-yellow-700 dark:text-yellow-300 bg-yellow-100 dark:bg-yellow-900/50';
                                        } elseif ($order['status'] == 'Ремонт') {
                                            $color = 'text-orange-700 dark:text-orange-300 bg-orange-100 dark:bg-orange-900/50';
                                        } elseif ($order['status'] == 'Тестване') {
                                            $color = 'text-purple-700 dark:text-purple-300 bg-purple-100 dark:bg-purple-900/50';
                                        } elseif ($order['status'] == 'В изчакване') {
                                            $color = 'text-lightgray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900/50';
                                        } elseif ($order['status'] == 'Готова') {
                                            $color = 'text-green-700 dark:text-green-300 bg-green-100 dark:bg-green-900/50';
                                        } else {
                                            $color = 'text-red-700 dark:text-red-300 bg-red-100 dark:bg-red-900/50';
                                        }
                                    ?>
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 font-mono">#<?php echo $order['order_id'] ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white"><?php echo $order['client_name'] ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['year'] . ' ' . $order['brand_name'] . ' ' . $order['model_name'] ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $color ?>"><?php echo $order['status'] ?></span>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['employee_name'] != NULL ? $order['employee_name'] : "N/A" ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['opened_at'] ?></td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center gap-2">
                                                    <a href="index.php?action=editOrderAdmin&order_id=<?php echo $order['order_id'] ?>">
                                                        <button class="text-gray-500 hover:text-primary dark:text-gray-400 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                                    </a>
                                                    <button class="text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">delete</span></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pagination -->
                </div>
                <div id="pagination-controls" class="flex items-center justify-center p-4 gap-2"></div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // --- CONFIGURATION ---
                        const itemsPerPage = 5;

                        // --- DOM ELEMENTS ---
                        const tableBody = document.querySelector('tbody');
                        // Get all rows, excluding "No orders" message if present
                        const allRows = Array.from(tableBody.querySelectorAll('tr')).filter(row => !row.innerText.includes('No service orders assigned'));
                        const paginationContainer = document.getElementById('pagination-controls');

                        // INPUTS
                        const searchInput = document.querySelector('input[placeholder*="Search"]');

                        // Selects: [0] is Status, [1] is Employee (based on your HTML structure)
                        const selects = document.querySelectorAll('select');
                        const statusFilter = selects[0];
                        const employeeFilter = selects[1];

                        // --- STATE ---
                        let currentPage = 1;
                        let filteredRows = [...allRows];

                        // --- CORE FUNCTIONS ---

                        // 1. Filter Logic
                        function applyFilters() {
                            const searchText = searchInput.value.toLowerCase();
                            const selectedStatus = statusFilter.value; // e.g. "Ремонт"
                            const selectedEmployee = employeeFilter.value; // e.g. "John"

                            filteredRows = allRows.filter(row => {
                                // Column Indices based on your HTML:
                                // 0: ID, 1: Client, 2: Car, 3: Status, 4: Employee, 5: Date

                                const clientText = row.children[1].textContent.toLowerCase();
                                const carText = row.children[2].textContent.toLowerCase();
                                const idText = row.children[0].textContent.toLowerCase();
                                const statusText = row.children[3].textContent.trim();
                                const employeeText = row.children[4].textContent.trim();

                                // 1. Search (matches Client, Car, or ID)
                                const matchesSearch = clientText.includes(searchText) ||
                                    carText.includes(searchText) ||
                                    idText.includes(searchText);

                                // 2. Status Filter
                                // If value is empty or default, ignore filter
                                const matchesStatus = !selectedStatus || (statusText === selectedStatus);

                                // 3. Employee Filter
                                const matchesEmployee = !selectedEmployee || (employeeText === selectedEmployee);

                                return matchesSearch && matchesStatus && matchesEmployee;
                            });

                            // Reset to page 1
                            currentPage = 1;
                            renderTable();
                        }

                        // 2. Render Table
                        function renderTable() {
                            // Hide all original rows
                            allRows.forEach(row => row.style.display = 'none');

                            // Calculate pagination for filtered rows
                            const totalPages = Math.ceil(filteredRows.length / itemsPerPage) || 1;
                            const start = (currentPage - 1) * itemsPerPage;
                            const end = start + itemsPerPage;

                            // Show visible rows
                            const rowsToShow = filteredRows.slice(start, end);
                            rowsToShow.forEach(row => row.style.display = '');

                            // Update buttons
                            renderPaginationButtons(totalPages);
                        }

                        // 3. Render Buttons
                        function renderPaginationButtons(totalPages) {
                            paginationContainer.innerHTML = '';

                            // Previous
                            const prevBtn = createButton('chevron_left', currentPage > 1, () => {
                                if (currentPage > 1) {
                                    currentPage--;
                                    renderTable();
                                }
                            });
                            paginationContainer.appendChild(prevBtn);

                            // Page Numbers
                            for (let i = 1; i <= totalPages; i++) {
                                if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                                    const btn = document.createElement('button');
                                    btn.innerText = i;

                                    if (i === currentPage) {
                                        btn.className = 'text-sm font-bold flex size-10 items-center justify-center text-white rounded-full bg-primary';
                                    } else {
                                        btn.className = 'text-sm font-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800';
                                    }

                                    btn.onclick = () => {
                                        currentPage = i;
                                        renderTable();
                                    };
                                    paginationContainer.appendChild(btn);
                                } else if (i === currentPage - 2 || i === currentPage + 2) {
                                    const span = document.createElement('span');
                                    span.innerText = '...';
                                    span.className = 'text-sm font-normal flex size-10 items-center justify-center text-[#111418] dark:text-white';
                                    paginationContainer.appendChild(span);
                                }
                            }

                            // Next
                            const nextBtn = createButton('chevron_right', currentPage < totalPages, () => {
                                if (currentPage < totalPages) {
                                    currentPage++;
                                    renderTable();
                                }
                            });
                            paginationContainer.appendChild(nextBtn);
                        }

                        // Helper
                        function createButton(icon, enabled, onClick) {
                            const btn = document.createElement('button');
                            btn.innerHTML = `<span class="material-symbols-outlined text-xl">${icon}</span>`;
                            btn.className = `flex size-10 items-center justify-center rounded-full ${enabled ? 'hover:bg-gray-200 dark:hover:bg-gray-800 text-[#111418] dark:text-gray-400' : 'text-gray-300 cursor-not-allowed'}`;
                            btn.disabled = !enabled;
                            btn.onclick = onClick;
                            return btn;
                        }

                        // --- EVENT LISTENERS ---
                        searchInput.addEventListener('input', applyFilters);
                        statusFilter.addEventListener('change', applyFilters);
                        employeeFilter.addEventListener('change', applyFilters);

                        // --- INIT ---
                        renderTable();
                    });
                </script>
        </div>
        </main>
    </div>
</body>

</html>