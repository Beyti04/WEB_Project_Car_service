<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Dashboard - TU Service</title>
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

<body class="font-display bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
    <div class="flex h-screen">
        <!-- SideNavBar -->
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
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
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=orders">
                    <span class="material-symbols-outlined">receipt_long</span>
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
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=auditLog">
                    <span class="material-symbols-outlined text-primary">inventory_2</span>
                    <p class="text-sm font-medium leading-normal">Audit Log</p>
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
            <main class="flex-1 overflow-y-auto p-8">
                <div class="mx-auto max-w-7xl">
                    <div class="flex flex-col gap-6 mb-6">
                        <div class="flex justify-between items-center">
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Audit Log</h1>
                        </div>

                        <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                            
                            <div class="flex bg-gray-100 dark:bg-gray-700 p-1 rounded-lg">
                                <button id="tab-employee" onclick="switchTab('employee')" class="px-4 py-2 text-sm font-medium rounded-md transition-colors bg-white dark:bg-gray-600 text-primary shadow-sm">
                                    Employee Logs
                                </button>
                                <button id="tab-client" onclick="switchTab('client')" class="px-4 py-2 text-sm font-medium rounded-md transition-colors text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">
                                    Client Logs
                                </button>
                            </div>

                            <div class="relative w-full md:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-gray-500 text-xl">search</span>
                                </div>
                                <input type="text" id="globalSearch" 
                                       class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-sm focus:ring-primary focus:border-primary dark:text-white dark:placeholder-gray-400" 
                                       placeholder="Search logs...">
                            </div>
                        </div>
                    </div>

                    <?php
                    use App\Models\Order;
                    // Fetch data once
                    $employeeLogs = Order::getAuditLogEmployees();
                    $clientLogs = Order::getAuditLogClients();
                    ?>

                    <div id="view-employee" class="transition-opacity duration-300">
                        <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm" id="table-employee">
                                    <thead class="bg-gray-50 dark:bg-gray-700/50 text-xs text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        <tr>
                                            <th class="px-6 py-4 font-medium">Employee</th>
                                            <th class="px-6 py-4 font-medium">Action</th>
                                            <th class="px-6 py-4 font-medium">Entity</th>
                                            <th class="px-6 py-4 font-medium">Entity ID</th>
                                            <th class="px-6 py-4 font-medium text-right">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <?php foreach ($employeeLogs as $log): ?>
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors">
                                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    <?php echo htmlspecialchars($log['employee_name']); ?>
                                                </td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                        <?php echo htmlspecialchars($log["action"]); ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-300"><?php echo htmlspecialchars($log["entity"]); ?></td>
                                                <td class="px-6 py-4 font-mono text-gray-500 dark:text-gray-400">#<?php echo htmlspecialchars($log["entity_id"]); ?></td>
                                                <td class="px-6 py-4 text-right text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($log["created_at"]); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="pagination-employee" class="flex items-center justify-center p-4 gap-2 border-t border-gray-200 dark:border-gray-700"></div>
                        </div>
                    </div>

                    <div id="view-client" class="hidden transition-opacity duration-300">
                        <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm" id="table-client">
                                    <thead class="bg-gray-50 dark:bg-gray-700/50 text-xs text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        <tr>
                                            <th class="px-6 py-4 font-medium">Client</th>
                                            <th class="px-6 py-4 font-medium">Action</th>
                                            <th class="px-6 py-4 font-medium">Entity</th>
                                            <th class="px-6 py-4 font-medium">Entity ID</th>
                                            <th class="px-6 py-4 font-medium text-right">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <?php foreach ($clientLogs as $log): ?>
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors">
                                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    <?php echo htmlspecialchars($log['client_name']); ?>
                                                </td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                        <?php echo htmlspecialchars($log["action"]); ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-300"><?php echo htmlspecialchars($log["entity"]); ?></td>
                                                <td class="px-6 py-4 font-mono text-gray-500 dark:text-gray-400">#<?php echo htmlspecialchars($log["entity_id"]); ?></td>
                                                <td class="px-6 py-4 text-right text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($log["created_at"]); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="pagination-client" class="flex items-center justify-center p-4 gap-2 border-t border-gray-200 dark:border-gray-700"></div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script>
        let currentTab = 'employee';

        function switchTab(tabName) {
            currentTab = tabName;
            
            const viewEmployee = document.getElementById('view-employee');
            const viewClient = document.getElementById('view-client');
            const btnEmployee = document.getElementById('tab-employee');
            const btnClient = document.getElementById('tab-client');
            const searchInput = document.getElementById('globalSearch');

            searchInput.value = ''; 

            if(tabName === 'employee') employeeTableController.filter(''); 
            else clientTableController.filter('');

            if (tabName === 'employee') {
                viewEmployee.classList.remove('hidden');
                viewClient.classList.add('hidden');
                
                btnEmployee.classList.add('bg-white', 'dark:bg-gray-600', 'text-primary', 'shadow-sm');
                btnEmployee.classList.remove('text-gray-500', 'dark:text-gray-300', 'hover:text-gray-700');
                
                btnClient.classList.remove('bg-white', 'dark:bg-gray-600', 'text-primary', 'shadow-sm');
                btnClient.classList.add('text-gray-500', 'dark:text-gray-300', 'hover:text-gray-700');
            } else {
                viewEmployee.classList.add('hidden');
                viewClient.classList.remove('hidden');

                btnClient.classList.add('bg-white', 'dark:bg-gray-600', 'text-primary', 'shadow-sm');
                btnClient.classList.remove('text-gray-500', 'dark:text-gray-300', 'hover:text-gray-700');

                btnEmployee.classList.remove('bg-white', 'dark:bg-gray-600', 'text-primary', 'shadow-sm');
                btnEmployee.classList.add('text-gray-500', 'dark:text-gray-300', 'hover:text-gray-700');
            }
        }

        class TableController {
            constructor(tableId, paginationId, itemsPerPage = 5) {
                this.tableBody = document.querySelector(`#${tableId} tbody`);
                this.paginationContainer = document.getElementById(paginationId);

                this.allRows = Array.from(this.tableBody.querySelectorAll('tr'));
                this.filteredRows = [...this.allRows];
                this.currentPage = 1;
                this.itemsPerPage = itemsPerPage;

                this.render();
            }

            filter(searchTerm) {
                const term = searchTerm.toLowerCase();
                
                this.filteredRows = this.allRows.filter(row => {
                    return row.innerText.toLowerCase().includes(term);
                });

                this.currentPage = 1;
                this.render();
            }

            render() {
                this.allRows.forEach(row => row.style.display = 'none');

                const totalPages = Math.ceil(this.filteredRows.length / this.itemsPerPage) || 1;
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;

                this.filteredRows.slice(start, end).forEach(row => row.style.display = '');

                this.renderButtons(totalPages);
            }

            renderButtons(totalPages) {
                this.paginationContainer.innerHTML = '';

                const prevBtn = this.createButton('chevron_left', this.currentPage > 1, () => {
                    if (this.currentPage > 1) { this.currentPage--; this.render(); }
                });
                this.paginationContainer.appendChild(prevBtn);

                for (let i = 1; i <= totalPages; i++) {
                    if (i === 1 || i === totalPages || (i >= this.currentPage - 1 && i <= this.currentPage + 1)) {
                        const btn = document.createElement('button');
                        btn.innerText = i;
                        if (i === this.currentPage) {
                            btn.className = 'flex size-8 items-center justify-center text-white rounded-lg bg-primary font-bold text-sm';
                        } else {
                            btn.className = 'flex size-8 items-center justify-center text-gray-700 dark:text-white rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 text-sm';
                        }
                        btn.onclick = () => { this.currentPage = i; this.render(); };
                        this.paginationContainer.appendChild(btn);
                    } else if (i === this.currentPage - 2 || i === this.currentPage + 2) {
                        const span = document.createElement('span');
                        span.innerText = '...';
                        span.className = 'text-gray-500 px-1';
                        this.paginationContainer.appendChild(span);
                    }
                }

                const nextBtn = this.createButton('chevron_right', this.currentPage < totalPages, () => {
                    if (this.currentPage < totalPages) { this.currentPage++; this.render(); }
                });
                this.paginationContainer.appendChild(nextBtn);
            }

            createButton(icon, enabled, onClick) {
                const btn = document.createElement('button');
                btn.innerHTML = `<span class="material-symbols-outlined text-lg">${icon}</span>`;
                btn.className = `flex size-8 items-center justify-center rounded-lg transition-colors ${enabled ? 'hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300' : 'text-gray-300 cursor-not-allowed'}`;
                btn.disabled = !enabled;
                btn.onclick = onClick;
                return btn;
            }
        }

        let employeeTableController;
        let clientTableController;

        document.addEventListener('DOMContentLoaded', function() {
            employeeTableController = new TableController('table-employee', 'pagination-employee', 5);
            clientTableController = new TableController('table-client', 'pagination-client', 5);

            const searchInput = document.getElementById('globalSearch');
            searchInput.addEventListener('input', (e) => {
                const term = e.target.value;
                if (currentTab === 'employee') {
                    employeeTableController.filter(term);
                } else {
                    clientTableController.filter(term);
                }
            });
        });
    </script>
</body>
</html>