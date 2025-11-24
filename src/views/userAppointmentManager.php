<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>My Service Appointments - AutoManager</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
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
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display">
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
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userDashboard">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=myVehicles">
                    <span class="material-symbols-outlined">directions_car</span>
                    <p class="text-sm font-medium leading-normal">My Vehicles</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=userAppointmentManager">
                    <span class="material-symbols-outlined text-primary">calendar_month</span>
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
                            <p class="font-bold"><?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Client</p>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Page Content -->
            <div class="flex-1 p-10 overflow-y-auto">
                <div class="max-w-5xl mx-auto">
                    <!-- Upcoming Appointments Section -->
                    <section>
                        <h2 class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] pb-3 pt-5">Upcoming Appointments</h2>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Card 1 -->
                            <div class="bg-white dark:bg-background-dark/80 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
                                <div class="p-6">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal mb-1.5">Mon, Oct 28, 2024 at 10:00 AM</p>
                                    <p class="text-gray-900 dark:text-white text-lg font-bold leading-tight tracking-[-0.015em] mb-3">Oil Change &amp; Tire Rotation</p>
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="material-symbols-outlined text-gray-500 dark:text-gray-400">directions_car</span>
                                        <p class="text-gray-600 dark:text-gray-300 text-base font-normal leading-normal">2023 Honda Civic</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900/50 px-3 py-1 text-xs font-medium text-green-700 dark:text-green-300">Confirmed</span>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/50 px-6 py-4 flex items-center justify-end gap-3">
                                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal hover:bg-gray-300 dark:hover:bg-gray-600">
                                        <span class="truncate">Cancel</span>
                                    </button>
                                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4 bg-primary text-white text-sm font-medium leading-normal hover:bg-primary/90">
                                        <span class="truncate">Modify</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="bg-white dark:bg-background-dark/80 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
                                <div class="p-6">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal mb-1.5">Wed, Nov 06, 2024 at 2:30 PM</p>
                                    <p class="text-gray-900 dark:text-white text-lg font-bold leading-tight tracking-[-0.015em] mb-3">Brake Inspection</p>
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="material-symbols-outlined text-gray-500 dark:text-gray-400">directions_car</span>
                                        <p class="text-gray-600 dark:text-gray-300 text-base font-normal leading-normal">2021 Toyota RAV4</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900/50 px-3 py-1 text-xs font-medium text-green-700 dark:text-green-300">Confirmed</span>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/50 px-6 py-4 flex items-center justify-end gap-3">
                                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4  bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal hover:bg-gray-300 dark:hover:bg-gray-600">
                                        <span class="truncate">Cancel</span>
                                    </button>
                                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4 bg-primary text-white text-sm font-medium leading-normal hover:bg-primary/90">
                                        <span class="truncate">Modify</span>
                                    </button>
                                </div>
                            </div>



                            <!-- Card 1 -->
                            <div class="bg-white dark:bg-background-dark/80 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
                                <div class="p-6">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal mb-1.5">Mon, Oct 28, 2024 at 10:00 AM</p>
                                    <p class="text-gray-900 dark:text-white text-lg font-bold leading-tight tracking-[-0.015em] mb-3">Oil Change &amp; Tire Rotation</p>
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="material-symbols-outlined text-gray-500 dark:text-gray-400">directions_car</span>
                                        <p class="text-gray-600 dark:text-gray-300 text-base font-normal leading-normal">2023 Honda Civic</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900/50 px-3 py-1 text-xs font-medium text-green-700 dark:text-green-300">Confirmed</span>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/50 px-6 py-4 flex items-center justify-end gap-3">
                                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal hover:bg-gray-300 dark:hover:bg-gray-600">
                                        <span class="truncate">Cancel</span>
                                    </button>
                                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4 bg-primary text-white text-sm font-medium leading-normal hover:bg-primary/90">
                                        <span class="truncate">Modify</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="bg-white dark:bg-background-dark/80 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
                                <div class="p-6">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal mb-1.5">Wed, Nov 06, 2024 at 2:30 PM</p>
                                    <p class="text-gray-900 dark:text-white text-lg font-bold leading-tight tracking-[-0.015em] mb-3">Brake Inspection</p>
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="material-symbols-outlined text-gray-500 dark:text-gray-400">directions_car</span>
                                        <p class="text-gray-600 dark:text-gray-300 text-base font-normal leading-normal">2021 Toyota RAV4</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900/50 px-3 py-1 text-xs font-medium text-green-700 dark:text-green-300">Confirmed</span>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/50 px-6 py-4 flex items-center justify-end gap-3">
                                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal hover:bg-gray-300 dark:hover:bg-gray-600">
                                        <span class="truncate">Cancel</span>
                                    </button>
                                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4 bg-primary text-white text-sm font-medium leading-normal hover:bg-primary/90">
                                        <span class="truncate">Modify</span>
                                    </button>
                                </div>
                            </div>
                            <!-- If no current appointments display this! -->
                            <div class="bg-white dark:bg-background-dark/80 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-700 flex flex-col items-center justify-center p-10 text-center min-h-[250px]">
                                <span class="material-symbols-outlined text-5xl text-gray-400 dark:text-gray-500 mb-4">event_busy</span>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">No Current Appointments</h3>
                                <p class="text-gray-500 dark:text-gray-400 mt-1 max-w-xs">Your service history will appear here once you complete more appointments.</p>
                            </div>
                        </div>
                    </section>
                    <!-- Past Appointments Section -->
                    <section class="mt-12">
                        <h2 class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] pb-3 pt-5">Past Appointments</h2>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Card 3 -->
                            <div class="bg-white dark:bg-background-dark/80 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden opacity-70">
                                <div class="p-6">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal mb-1.5">Fri, Aug 16, 2024 at 9:00 AM</p>
                                    <p class="text-gray-900 dark:text-white text-lg font-bold leading-tight tracking-[-0.015em] mb-3">Annual Maintenance</p>
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="material-symbols-outlined text-gray-500 dark:text-gray-400">directions_car</span>
                                        <p class="text-gray-600 dark:text-gray-300 text-base font-normal leading-normal">2023 Honda Civic</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900/50 px-3 py-1 text-xs font-medium text-blue-700 dark:text-blue-300">Completed</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Empty State Card -->
                            <div class="bg-white dark:bg-background-dark/80 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-700 flex flex-col items-center justify-center p-10 text-center min-h-[250px]">
                                <span class="material-symbols-outlined text-5xl text-gray-400 dark:text-gray-500 mb-4">event_busy</span>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">No More Past Appointments</h3>
                                <p class="text-gray-500 dark:text-gray-400 mt-1 max-w-xs">Your service history will appear here once you complete more appointments.</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            </main>
        </div>
</body>

</html>