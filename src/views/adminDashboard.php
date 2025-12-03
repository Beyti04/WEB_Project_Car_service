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
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=adminDashboard">
                    <span class="material-symbols-outlined text-primary">dashboard</span>
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
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=auditLog">
                    <span class="material-symbols-outlined">inventory_2</span>
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
            <!-- Main dashboard content -->
            <main class="flex-1 overflow-y-auto p-10">
                <!-- PageHeading -->
                <div class="flex flex-wrap justify-between gap-4 mb-8 items-center">
                    <div class="flex flex-col gap-1">
                        <p class="text-3xl font-bold leading-tight tracking-tight">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>!</p>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-base font-normal leading-normal">Here's what's happening with your shop today.</p>
                    </div>
                </div>
                <!-- Stats -->
                <?php

                use App\Models\Order;

                $activeOrders = Order::getActiveOrdersCount();
                $pendingOrders = Order::getPendingAppointmentsCount();
                $totalIncome = Order::getTotalRevenue();

                ?>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark">
                        <p class="text-base font-medium leading-normal text-text-secondary-light dark:text-text-secondary-dark">Total Revenue (MTD)</p>
                        <p class="tracking-light text-3xl font-bold leading-tight">€<?php echo $totalIncome ?></p>
                    </div>
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark">
                        <p class="text-base font-medium leading-normal text-text-secondary-light dark:text-text-secondary-dark">Active Orders</p>
                        <p class="tracking-light text-3xl font-bold leading-tight"><?php echo $activeOrders ?></p>
                    </div>
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark">
                        <p class="text-base font-medium leading-normal text-text-secondary-light dark:text-text-secondary-dark">Pending Appointments</p>
                        <p class="tracking-light text-3xl font-bold leading-tight"><?php echo $pendingOrders ?></p>
                    </div>
                </div>
                <!-- Charts and Lists -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Revenue Chart -->
                    <div class="lg:col-span-2 flex flex-col gap-2 rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg font-bold leading-normal">Revenue Overview</p>
                                <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">Last 30 Days</p>
                            </div>
                            <div class="flex gap-1 bg-background-light dark:bg-background-dark p-1 rounded-lg">
                                <button class="px-3 py-1 text-xs font-bold rounded-md bg-card-light dark:bg-card-dark shadow-sm">30D</button>
                                <button class="px-3 py-1 text-xs font-bold rounded-md text-text-secondary-light dark:text-text-secondary-dark">7D</button>
                                <button class="px-3 py-1 text-xs font-bold rounded-md text-text-secondary-light dark:text-text-secondary-dark">24H</button>
                            </div>
                        </div>
                        <div class="flex min-h-[250px] flex-1 flex-col justify-end py-4">
                            <svg fill="none" height="100%" preserveaspectratio="none" viewbox="0 0 546 150" width="100%" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 109C20.8462 109 20.8462 21 41.6923 21C62.5385 21 62.5385 41 83.3846 41C104.231 41 104.231 93 125.077 93C145.923 93 145.923 33 166.769 33C187.615 33 187.615 101 208.462 101C229.308 101 229.308 61 250.154 61C271 61 271 45 291.846 45C312.692 45 312.692 121 333.538 121C354.385 121 354.385 149 375.231 149C396.077 149 396.077 1 416.923 1C437.769 1 437.769 81 458.615 81C479.462 81 479.462 129 500.308 129C521.154 129 521.154 25 542 25V149H0V109Z" fill="url(#paint0_linear_rev)"></path>
                                <path d="M0 109C20.8462 109 20.8462 21 41.6923 21C62.5385 21 62.5385 41 83.3846 41C104.231 41 104.231 93 125.077 93C145.923 93 145.923 33 166.769 33C187.615 33 187.615 101 208.462 101C229.308 101 229.308 61 250.154 61C271 61 271 45 291.846 45C312.692 45 312.692 121 333.538 121C354.385 121 354.385 149 375.231 149C396.077 149 396.077 1 416.923 1C437.769 1 437.769 81 458.615 81C479.462 81 479.462 129 500.308 129C521.154 129 521.154 25 542 25" stroke="#1173d4" stroke-linecap="round" stroke-width="3"></path>
                                <defs>
                                    <lineargradient gradientunits="userSpaceOnUse" id="paint0_linear_rev" x1="271" x2="271" y1="1" y2="149">
                                        <stop stop-color="#1173d4" stop-opacity="0.3"></stop>
                                        <stop offset="1" stop-color="#1173d4" stop-opacity="0"></stop>
                                    </lineargradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <!-- Upcoming Appointments -->
                    <?php
                    $orders = Order::getAllCurrentOrders();
                    ?>
                    <div class="flex flex-col gap-4 rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                        <p class="text-lg font-bold leading-normal">Upcoming Appointments</p>

                        <div class="flex flex-col gap-4">
                            <?php
                            $orderCount = count($orders);

                            if ($orderCount > 0) {
                                $maxItems = min(3, $orderCount);

                                for ($i = 0; $i < $maxItems; $i++) {
                            ?>
                                    <div class="flex items-start gap-4 p-3 rounded-lg">
                                        <!-- Date Badge -->
                                        <div class="px-3 py-3 bg-primary text-white font-bold rounded-lg text-center min-w-[80px]">
                                            <?php echo date('d.m.Y', strtotime($orders[$i]['opened_at'])); ?>
                                        </div>

                                        <!-- Details -->
                                        <div class="flex-1 flex flex-col">
                                            <p class="font-bold truncate"><?php echo $orders[$i]['client_name']; ?></p>
                                            <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm break-words">
                                                <?php echo $orders[$i]['year'] . ' ' . $orders[$i]['brand_name'] . ' ' . $orders[$i]['model_name'] . ' - ' . $orders[$i]['service_name']; ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                        </div>
                    


                    <a href="index.php?action=orders">
                        <button class="w-full text-center py-2 text-sm font-bold text-primary hover:bg-primary/10 rounded-lg transition-colors">
                            View Full Schedule
                        </button>
                    </a>
</div>
                <?php
                            } else {
                                echo "<p class='text-center'>No Current Orders</p>";
                            }
                ?>
                </div>


            </main>
        </div>
    </div>
</body>

</html>