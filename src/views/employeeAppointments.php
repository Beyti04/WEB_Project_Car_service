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
                                <?php

                                use App\Models\Status;

                                echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>
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
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-center">
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
                                    <select id="statusFilter" name="statusFilter"
                                        class="flex h-10 items-center justify-between gap-x-2 rounded-lg bg-background-light dark:bg-gray-700 px-4 w-full text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal border border-border-light dark:border-border-dark appearance-none cursor-pointer">
                                        <option value="all" selected>Status</option>

                                        <?php
                                        $statuses = Status::getAllStatuses();
                                        array_shift($statuses);
                                        array_pop($statuses);

                                        foreach ($statuses as $status) {
                                        ?>
                                            <option value="<?php echo $status->id ?>">
                                                <?php echo $status->status ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <!-- Table -->
                        <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm mt-4">
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
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Service</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date Opened</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <?php
                                        if (!$orders) {
                                            echo '<tr><td colspan="7" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">No service orders assigned.</td></tr>';
                                        }

                                        foreach ($orders as $order) {
                                            if ($order['status'] == 'Приета') {
                                                $color = 'text-blue-700 dark:text-primary-300 bg-blue-100 dark:bg-blue-500/50';
                                            } elseif ($order['status'] == 'Диагностика') {
                                                $color = 'text-yellow-700 dark:text-yellow-300 bg-yellow-100 dark:bg-yellow-900/50';
                                            } elseif ($order['status'] == 'Ремонт') {
                                                $color = 'text-orange-700 dark:text-orange-300 bg-orange-100 dark:bg-orange-900/50';
                                            } elseif ($order['status'] == 'Тестване') {
                                                $color = 'text-purple-700 dark:text-purple-300 bg-purple-100 dark:bg-purple-900/50';
                                            } else {
                                                $color = 'text-lightgray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900/50';
                                            }

                                        ?>
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 font-mono"><?php echo $order['order_id']; ?></td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white"><?php echo $order['client_name']; ?></td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['brand_name'] . ' ' . $order['model_name']; ?></td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['service_name']; ?></td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $color ?>"><?php echo $order['status'] ?></span>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"><?php echo $order['opened_at']; ?></td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex items-center gap-2">
                                                        <a href="index.php?action=orderMaterials&order_id=<?php echo $order['order_id'] ?>">
                                                            <button class="text-gray-500 hover:text-primary dark:text-gray-400 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                                        </a>
                                                        <a href="index.php?action=cancelEmployeeOrder&order_id=<?php echo $order['order_id'] ?>">
                                                            <button class="text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">Cancel</span></button>
                                                        </a>
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
                        <!--<script>
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
                        </script>-->


                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const itemsPerPage = 5;
                                const statusColumnIndex = 4;

                                const tableBody = document.querySelector('tbody');
                                const allRows = Array.from(tableBody.querySelectorAll('tr')).filter(row => !row.innerText.includes('No service orders'));
                                const paginationContainer = document.getElementById('pagination-controls');
                                const statusFilter = document.getElementById('statusFilter');
                                const searchInput = document.querySelector('input[placeholder*="Search"]');

                                let currentPage = 1;
                                let filteredRows = [...allRows]; // Initialize with all rows

                                function updateTable() {
                                    const statusValue = statusFilter.value;
                                    const searchText = searchInput.value.toLowerCase();

                                    filteredRows = allRows.filter(row => {
                                        let statusMatch = true;
                                        if (statusValue !== 'all') {
                                            const selectedText = statusFilter.options[statusFilter.selectedIndex].text.trim();
                                            const rowStatusText = row.children[statusColumnIndex].textContent.trim();
                                            statusMatch = (rowStatusText === selectedText);
                                        }

                                        const rowText = row.innerText.toLowerCase();
                                        const searchMatch = rowText.includes(searchText);

                                        return statusMatch && searchMatch;
                                    });

                                    const totalPages = Math.ceil(filteredRows.length / itemsPerPage) || 1;
                                    if (currentPage > totalPages) currentPage = 1;

                                    renderRows();
                                    renderPagination(totalPages);
                                }

                                function renderRows() {
                                    allRows.forEach(row => row.style.display = 'none');

                                    const start = (currentPage - 1) * itemsPerPage;
                                    const end = start + itemsPerPage;
                                    const rowsToShow = filteredRows.slice(start, end);

                                    rowsToShow.forEach(row => row.style.display = '');
                                }

                                function renderPagination(totalPages) {
                                    paginationContainer.innerHTML = '';

                                    if (filteredRows.length === 0) {
                                        paginationContainer.innerHTML = '<span class="text-sm text-gray-500">No results found.</span>';
                                        return;
                                    }

                                    const prevBtn = createButton('chevron_left', currentPage > 1, () => {
                                        if (currentPage > 1) {
                                            currentPage--;
                                            updateTable();
                                        }
                                    });
                                    paginationContainer.appendChild(prevBtn);

                                    for (let i = 1; i <= totalPages; i++) {
                                        if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                                            const btn = document.createElement('button');
                                            btn.innerText = i;
                                            if (i === currentPage) {
                                                btn.className = 'flex size-10 items-center justify-center text-white rounded-full bg-primary font-bold text-sm';
                                            } else {
                                                btn.className = 'flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800 text-sm font-normal';
                                            }
                                            btn.onclick = () => {
                                                currentPage = i;
                                                updateTable();
                                            };
                                            paginationContainer.appendChild(btn);
                                        } else if (i === currentPage - 2 || i === currentPage + 2) {
                                            const span = document.createElement('span');
                                            span.innerText = '...';
                                            span.className = 'flex size-10 items-center justify-center text-[#111418] dark:text-white text-sm';
                                            paginationContainer.appendChild(span);
                                        }
                                    }

                                    const nextBtn = createButton('chevron_right', currentPage < totalPages, () => {
                                        if (currentPage < totalPages) {
                                            currentPage++;
                                            updateTable();
                                        }
                                    });
                                    paginationContainer.appendChild(nextBtn);
                                }

                                function createButton(icon, enabled, onClick) {
                                    const btn = document.createElement('button');
                                    btn.innerHTML = `<span class="material-symbols-outlined text-xl">${icon}</span>`;
                                    btn.className = `flex size-10 items-center justify-center rounded-full ${enabled ? 'hover:bg-gray-200 dark:hover:bg-gray-800 text-[#111418] dark:text-gray-400' : 'text-gray-300 cursor-not-allowed'}`;
                                    btn.disabled = !enabled;
                                    btn.onclick = onClick;
                                    return btn;
                                }

                                statusFilter.addEventListener('change', () => {
                                    currentPage = 1;
                                    updateTable();
                                });
                                searchInput.addEventListener('input', () => {
                                    currentPage = 1;
                                    updateTable();
                                });

                                updateTable();
                            });
                        </script>
                    </div>
            </main>
        </div>
</body>

</html>