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

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=clientBilling">
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
            <main class="flex-1 overflow-y-auto p-10">
                <div class="flex flex-wrap justify-between gap-4 mb-8 items-center">
                    <div class="flex flex-col gap-1">
                        <p class="text-3xl font-bold leading-tight tracking-tight">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>!</p>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-base font-normal leading-normal">Here's a summary of your vehicle's status.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 flex flex-col gap-6">
                        <div class="rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                            <h2 class="text-lg font-bold leading-normal mb-4">Current Orders Status</h2>
                            <div class="block gap-6 items-start">

                                <?php

                                use App\Controllers\VehicleController;

                                if (!isset($_SESSION['selected_car_id'])) {
                                    echo '<p class="text-text-secondary-light text-center dark:text-text-secondary-dark">No vehicle selected. Please select a vehicle to view current orders.</p>';
                                } else {

                                    $currentAppointments = VehicleController::getCurrentAppointments((int)$_SESSION['selected_car_id'] ?? 0);

                                    if (empty($currentAppointments)) {
                                        echo '<p class="text-text-secondary-light text-center dark:text-text-secondary-dark">No current orders available.</p>';
                                    } else {

                                        foreach ($currentAppointments as $appointment) { ?>
                                            <div class="mb-6 last:mb-0">
                                                <div class="">
                                                    <div class="flex items-center  text-sm text-text-secondary-light dark:text-text-secondary-dark">
                                                        <span class="material-symbols-outlined text-base">receipt_long</span>
                                                        <span>Order #<?php echo htmlspecialchars($appointment['order_id']); ?></span>
                                                    </div>

                                                </div>
                                                <div class="flex-1 w-full">
                                                    <div class="flex items-center justify-between">
                                                        <p class="font-bold text-xl mb-3"><?php echo htmlspecialchars($appointment['service_name']); ?></p>
                                                        <?php
                                                        if ($appointment['status'] == 'В изчакване') {
                                                            $progressWidth = 0;
                                                            $color = 'text-gray-400';
                                                        } elseif ($appointment['status'] == 'Приета') {
                                                            $progressWidth = 20;
                                                            $color = 'text-primary';
                                                        } elseif ($appointment['status'] == 'Диагностика') {
                                                            $progressWidth = 40;
                                                            $color = 'text-yellow-500';
                                                        } elseif ($appointment['status'] == 'Ремонт') {
                                                            $progressWidth = 60;
                                                            $color = 'text-orange-500';
                                                        } elseif ($appointment['status'] == 'Тестване') {
                                                            $progressWidth = 80; {
                                                                $color = 'text-purple-500';
                                                            }
                                                        }

                                                        ?>
                                                        <p class="font-bold <?php echo $color; ?>"><?php echo htmlspecialchars($appointment['status']); ?></p>
                                                    </div>
                                                    <div class="w-full bg-background-light dark:bg-background-dark rounded-full h-2.5">
                                                        <div class="bg-primary h-2.5 rounded-full" style="width: <?php echo $progressWidth ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                        <a name="service_history">
                            <div class="rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-lg font-bold leading-normal">Service History</h2>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left">
                                        <thead class="text-xs text-text-secondary-light dark:text-text-secondary-dark uppercase">
                                            <tr>
                                                <th class="py-3 pr-6" scope="col">Date</th>
                                                <th class="py-3 px-6" scope="col">Service</th>
                                                <th class="py-3 pl-6 text-right" scope="col">Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!isset($_SESSION['selected_car_id'])) {
                                                echo '<tr><td colspan="4" class="py-4 px-6 text-center text-text-secondary-light dark:text-text-secondary-dark">No vehicle selected. Please select a vehicle to view service history.</td></tr>';
                                            } else {

                                                $serviceHistory = VehicleController::getVehicleServiceHistory($_SESSION['selected_car_id']);
                                                if (empty($serviceHistory)) {
                                                    echo '<tr><td colspan="4" class="py-4 px-6 text-center text-text-secondary-light dark:text-text-secondary-dark">No service history available.</td></tr>';
                                                } else {
                                                    foreach ($serviceHistory as $service) {
                                            ?>
                                                        <tr class="border-b border-border-light dark:border-border-dark">
                                                            <td class="py-4 pr-6 font-medium"><?php echo htmlspecialchars($service['closed_at']); ?></td>
                                                            <td class="py-4 px-6"><?php echo htmlspecialchars($service['service_name']); ?></td>
                                                            <?php if ($service['full_price'] == 0) {
                                                                $service['full_price'] = 'N/A';
                                                            } ?>
                                                            <td class="py-4 pl-6 text-right font-medium"><?php echo htmlspecialchars($service['full_price']); ?></td>
                                                        </tr>
                                            <?php }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="flex flex-col gap-6">
                        <?php

                        use App\Models\CarModel;
                        use App\Models\CarBrand;

                        $selectedCarHtml = "<p class='text-sm text-text-secondary-light dark:text-text-secondary-dark'>No vehicle selected</p>";

                        if (isset($_SESSION['selected_car_id'], $_SESSION['selected_car_model_id'], $_SESSION['selected_car_year'], $_SESSION['selected_car_vin'])) {
                            $carModel = CarModel::getModelById((int)$_SESSION['selected_car_model_id']);
                            $carBrand = CarBrand::getBrandById($carModel->brand_id);

                            $selectedCarHtml = "
                        <p class='font-bold text-base'>{$_SESSION['selected_car_year']} {$carBrand->make} {$carModel->model_name}</p>
                        <p class='text-sm text-text-secondary-light dark:text-text-secondary-dark'>VIN: " . $_SESSION['selected_car_vin'] . "</p>
                        ";
                        }
                        ?>

                        <div class="flex flex-col gap-4 rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                            <h2 class="text-lg font-bold leading-normal">Selected Vehicle</h2>
                            <div class="flex flex-col gap-2">
                                <?php echo $selectedCarHtml; ?>
                                <a href="index.php?action=myVehicles">
                                    <button class="w-full text-center mt-2 py-2 text-sm font-bold text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                        Manage Vehicles
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>