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
                    <span class="material-symbols-outlined text-primary text-2xl">engineering</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Employee Portal</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=employeeDashboard">
                    <span class="material-symbols-outlined text-primary">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=manageClients">
                    <span class="material-symbols-outlined">groups</span>
                    <p class="text-sm font-medium leading-normal">Manage Clients</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=manageVehicles">
                    <span class="material-symbols-outlined">directions_car</span>
                    <p class="text-sm font-medium leading-normal">Manage Vehicles</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=manageAppointments">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">Appointments</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=serviceRequests">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Service Requests</p>
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
                                <?php echo htmlspecialchars($_SESSION['employee_name'] ?? ''); ?>
                            </p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Employee</p>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-10">
                <div class="flex flex-wrap justify-between gap-4 mb-8 items-center">
                    <div class="flex flex-col gap-1">
                        <p class="text-3xl font-bold leading-tight tracking-tight">Welcome back, <?php echo htmlspecialchars($_SESSION['employee_name'] ?? ''); ?>!</p>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-base font-normal leading-normal">Here's an overview of your tasks and requests.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 flex flex-col gap-6">
                        <!-- Active Service Requests -->
                        <div class="rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                            <h2 class="text-lg font-bold leading-normal mb-4">Active Service Requests</h2>
                            <div class="flex flex-col gap-4">
                                <div class="flex flex-col sm:flex-row gap-6 items-start">
                                    <div class="flex-1">
                                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">2022 Toyota Highlander</p>
                                        <p class="font-bold text-xl mb-3">Oil Change &amp; Tire Rotation</p>
                                        <div class="flex items-center gap-2 text-sm text-text-secondary-light dark:text-text-secondary-dark">
                                            <span class="material-symbols-outlined text-base">receipt_long</span>
                                            <span>Order #ORD-2024-1138</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 w-full">
                                        <div class="flex items-center justify-between mb-1">
                                            <p class="font-bold text-primary">In Progress</p>
                                            <p class="text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark">Est. completion: 4:30 PM</p>
                                        </div>
                                        <div class="w-full bg-background-light dark:bg-background-dark rounded-full h-2.5">
                                            <div class="bg-primary h-2.5 rounded-full" style="width: 65%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Service History -->
                        <div class="rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-bold leading-normal">Service History</h2>
                                <a class="text-sm font-bold text-primary hover:underline" href="#">View All</a>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead class="text-xs text-text-secondary-light dark:text-text-secondary-dark uppercase">
                                        <tr>
                                            <th class="py-3 pr-6" scope="col">Date</th>
                                            <th class="py-3 px-6" scope="col">Service</th>
                                            <th class="py-3 px-6" scope="col">Client</th>
                                            <th class="py-3 pl-6 text-right" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-border-light dark:border-border-dark">
                                            <td class="py-4 pr-6 font-medium">Jun 15, 2023</td>
                                            <td class="py-4 px-6">Brake Pad Replacement</td>
                                            <td class="py-4 px-6 text-text-secondary-light dark:text-text-secondary-dark">John Doe</td>
                                            <td class="py-4 pl-6 text-right font-medium">Completed</td>
                                        </tr>
                                        <tr class="border-b border-border-light dark:border-border-dark">
                                            <td class="py-4 pr-6 font-medium">Jan 10, 2023</td>
                                            <td class="py-4 px-6">Annual Inspection</td>
                                            <td class="py-4 px-6 text-text-secondary-light dark:text-text-secondary-dark">Jane Smith</td>
                                            <td class="py-4 pl-6 text-right font-medium">Completed</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Appointments -->
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-4 rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                            <h2 class="text-lg font-bold leading-normal">Upcoming Appointment</h2>
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="flex flex-col items-center justify-center p-3 rounded-lg bg-primary/10 w-16 h-16 shrink-0">
                                        <p class="text-primary font-bold text-lg">DEC</p>
                                        <p class="text-primary/80 font-bold text-2xl">21</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">10:00 AM - State Inspection</p>
                                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">2022 Toyota Highlander</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="w-full flex items-center justify-center gap-2 h-10 px-4 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-sm font-bold hover:bg-primary/10 transition-colors">Reschedule</button>
                                    <button class="w-full flex items-center justify-center gap-2 h-10 px-4 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-sm font-bold text-danger hover:bg-danger/10 hover:border-danger/20 transition-colors">Cancel</button>
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
