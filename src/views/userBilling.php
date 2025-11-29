<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Client Dashboard - AutoManager</title>
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
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
            <a href="index.php?action=userDashboard" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Client Portal</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=userDashboard">
                    <span class="material-symbols-outlined text-primary">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=myVehicles">
                    <span class="material-symbols-outlined">directions_car</span>
                    <p class="text-sm font-medium leading-normal">My Vehicles</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userAppointmentManager">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">My Appointments</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userDashboard#service_history">
                    <span class="material-symbols-outlined">history</span>
                    <p class="text-sm font-medium leading-normal">Service History</p>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Billing</p>
                </a>
            </nav>
            <div class="flex flex-col gap-4">
                <a href="index.php?action=requestService">
                    <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                        <span class="truncate">Request New Service</span>
                    </button>
                </a>
                <div class="flex flex-col gap-1">
                    <a href="index.php?action=logout" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Logout</p>
                    </a>
                </div>
            </div>
        </aside>
        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-end whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark px-10 py-3 bg-card-light dark:bg-card-dark">
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar image" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuADijiRLLPR2eRQXqbVqSmI5KeUFyXAg8F2zmY2mwfb1Pgm6eF-NmHWlSRm0xVvnz3wcPCkB7pflS81XhFJqdUyEEk4srBqEw81WqNgyxpAXWyBF4WXayX_79fjNwvjFvRP2mygTB8JtFtvmgwCmXAkWO1vUyZ6xTjfEnPmwsZD1QhwGVWu-iSAwpmnxmU_NGK7U5sH-U54t-zfth88S-uqzwxhC_4dJgAlM1nGXJJ3Wb2EztyredxX5Mc4g-N4vxPoQmZFTCyPxOs");'></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold">
                                <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>
                            </p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Client</p>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-1 overflow-y-auto p-20">


                <!-- Orders List -->
                <div class="space-y-4 p-10">
                    <!-- Page Title -->
                    <div class="mb-8 px-20">
                        <h2 class="text-2xl font-bold text-text-light dark:text-text-dark">My Orders & Billing</h2>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark">
                            View the details of completed service orders and their material costs.
                        </p>
                    </div>
                    <?php

                    use App\Controllers\ClientController;

                    $orders = ClientController::getFinishedOrders($_SESSION['user_id']);

                    if (!empty($orders)): ?>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


                        <!-- Desktop Table -->
                        <div class="hidden md:flex flex-col gap-6 mt-6 px-20">
                            <?php foreach ($orders as $order): ?>
                                <div class="relative bg-white dark:bg-card-dark rounded-xl border border-border-light dark:border-border-dark shadow-lg p-6 hover:shadow-xl transition">



                                    <!-- PDF Icon + Title -->
                                    <div class="flex items-center gap-4 mb-4">
                                        <div class="bg-red-600/10 p-4 rounded-xl">
                                            <span class="material-symbols-outlined text-red-600 text-4xl">picture_as_pdf</span>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-text-light dark:text-text-dark">
                                                Order #<?php echo htmlspecialchars($order['order_id']); ?>
                                            </h3>
                                            <p class="text-sm text-text-secondary-light dark:text-text-secondary-dark">
                                                Completed: <?php echo htmlspecialchars($order['closed_at']); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="space-y-2 text-sm">

                                        <p><strong>Vehicle:</strong><br>
                                            <?php echo htmlspecialchars($order['car_year']) . " " . htmlspecialchars($order['brand_name']) . " " . htmlspecialchars($order['model_name']); ?>
                                        </p>

                                        <p><strong>Service:</strong><br>
                                            <?php echo htmlspecialchars($order['service_name']) . ": €" . htmlspecialchars($order['base_price']); ?>
                                        </p>

                                        <p><strong>Materials Used:</strong></p>
                                        <ul class="list-disc ml-5">
                                            <?php foreach ($order['materials'] as $m): ?>
                                                <li>
                                                    <?php echo htmlspecialchars($m['name']); ?> —
                                                    €<?php echo number_format($m['price'], 2); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>

                                        <p class="pt-2"><strong>Total:</strong>
                                            $<?php echo number_format($order['full_price'], 2); ?>
                                        </p>
                                    </div>

                                    <!-- Open Button -->
                                    <a href="index.php?action=downloadPDF&id=<?php echo $order['order_id']; ?>" class="mt-5 block text-center w-60 bg-primary text-white font-bold rounded-lg py-2 hover:bg-primary/90 transition">
                                        Download PDF
                                    </a>

                                </div>
                            <?php endforeach; ?>
                        </div>

                </div>
            </main>
        </div>

    <?php else: ?>

        <p class="text-center text-text-secondary-light dark:text-text-secondary-dark">
            No completed orders yet.
        </p>

    <?php endif; ?>

    </div>

    </main>
    </div>
    </div>
</body>

</html>