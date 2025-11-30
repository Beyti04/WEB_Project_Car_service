<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Client Management - TU Service</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet" />
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

<body class="font-display bg-background-light dark:bg-background-dark">
    <div class="flex h-screen">
        <!-- SideNavBar -->
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
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">Schedule</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=orders">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Orders</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=clientManager">
                    <span class="material-symbols-outlined text-primary">group</span>
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

            <main class="flex-1 p-8">
                <div class="w-full max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="flex flex-wrap justify-between items-center gap-4 mb-6 px-4">
                        <div class="flex flex-col">
                            <h1 class="text-3xl font-bold leading-tight tracking-tight">Client Management</h1>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between gap-4 px-4 py-3">
                        <div class="relative flex-1 min-w-[280px]">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500 text-xl">search</span>
                            <input class="w-full h-10 pl-10 pr-4 rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-background-dark text-sm focus:ring-2 focus:ring-primary focus:border-primary dark:text-white" placeholder="Search by name, email, or phone..." type="text" />
                        </div>
                        <div class="flex gap-2">
                            <a href="index.php?action=newClient">
                                <button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-primary text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-4 hover:bg-blue-700 dark:hover:bg-blue-600">
                                    <span class="material-symbols-outlined text-xl">add</span>
                                    <span class="truncate">Add New Client</span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="px-4 py-3 @container">
                        <div class="flex overflow-hidden rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-background-dark">
                            <table class="flex-1 w-full">
                                <thead>
                                    <tr class="bg-gray-50 dark:bg-gray-800/50">
                                        <th class="px-4 py-3 text-left text-[#111418] dark:text-gray-300 text-sm font-medium leading-normal w-1/3">Client Name</th>
                                        <th class="px-4 py-3 text-left text-[#111418] dark:text-gray-300 text-sm font-medium leading-normal w-1/3">Email</th>
                                        <th class="px-4 py-3 text-left text-[#111418] dark:text-gray-300 text-sm font-medium leading-normal w-1/4">Phone</th>
                                        <th class="px-4 py-3 text-left text-[#617589] dark:text-gray-400 text-sm font-medium leading-normal">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $clients = App\Models\Client::getAllClients();
                                    foreach ($clients as $client) {
                                        echo "<tr class='border-t border-t-[#dbe0e6] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800/50'>";
                                        echo "<td class='h-[72px] px-4 py-2 text-[#111418] dark:text-white text-sm font-normal leading-normal'>" . htmlspecialchars($client['first_name'] . ' ' . $client['last_name']) . "</td>";
                                        echo "<td class='h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal'>" . htmlspecialchars($client['email']) . "</td>";
                                        echo "<td class='h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal'>" . htmlspecialchars($client['phone_number']) . "</td>";
                                        echo "<td class='h-[72px] px-4 py-2'>";
                                    ?>
                                        <div class="flex gap-2 text-[#617589] dark:text-gray-400">
                                            <a href="index.php?action=editClient&client_id=<?php echo htmlspecialchars($client['id']); ?>">
                                                <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                            </a>
                                            <a href="index.php?action=removeClient&client_id=<?php echo htmlspecialchars($client['id']); ?>">
                                                <button class="p-2 rounded-md hover:bg-red-100 dark:hover:bg-red-900/50 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">delete</span></button>
                                            </a>
                                        </div>
                                        </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pagination Controls -->
                    <div id="pagination-controls" class="flex items-center justify-center p-4 gap-2"></div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const itemsPerPage = 5;
                            const tableBody = document.querySelector('tbody');
                            const rows = Array.from(tableBody.querySelectorAll('tr'));
                            const paginationContainer = document.getElementById('pagination-controls');
                            const totalPages = Math.ceil(rows.length / itemsPerPage);

                            function showPage(page) {
                                // Скриване на всички редове
                                rows.forEach(row => row.style.display = 'none');

                                // Показване на редовете за текущата страница
                                const start = (page - 1) * itemsPerPage;
                                const end = start + itemsPerPage;
                                rows.slice(start, end).forEach(row => row.style.display = '');

                                // Актуализиране на бутоните за навигация
                                updateButtons(page);
                            }

                            function updateButtons(page) {
                                paginationContainer.innerHTML = '';

                                // Бутон "Предишен"
                                const prevBtn = document.createElement('button');
                                prevBtn.innerHTML = '<span class="material-symbols-outlined text-xl">chevron_left</span>';
                                prevBtn.className = `flex size-10 items-center justify-center rounded-full hover:bg-gray-200 dark:hover:bg-gray-800 ${page === 1 ? 'text-gray-300 cursor-not-allowed' : 'text-[#111418] dark:text-gray-400'}`;
                                prevBtn.onclick = () => {
                                    if (page > 1) showPage(page - 1);
                                };
                                paginationContainer.appendChild(prevBtn);

                                for (let i = 1; i <= totalPages; i++) {
                                    const btn = document.createElement('button');
                                    btn.innerText = i;
                                    btn.className = `flex size-10 items-center justify-center rounded-full hover:bg-gray-200 dark:hover:bg-gray-800 ${i === page ? 'bg-primary text-white' : 'text-[#111418] dark:text-white'}`;
                                    btn.onclick = () => showPage(i);
                                    paginationContainer.appendChild(btn);
                                }

                                // Бутон "Следващ"
                                const nextBtn = document.createElement('button');
                                nextBtn.innerHTML = '<span class="material-symbols-outlined text-xl">chevron_right</span>';
                                nextBtn.className = `flex size-10 items-center justify-center rounded-full hover:bg-gray-200 dark:hover:bg-gray-800 ${page === totalPages ? 'text-gray-300 cursor-not-allowed' : 'text-[#111418] dark:text-gray-400'}`;
                                nextBtn.onclick = () => {
                                    if (page < totalPages) showPage(page + 1);
                                };
                                paginationContainer.appendChild(nextBtn);
                            }

                            // Показване на първата страница при зареждане
                            showPage(1);
                        });
                    </script>
                </div>
            </main>
        </div>
    </div>
</body>

</html>