<!DOCTYPE html>

<html class="light" lang="en">
<?php
use App\Models\CarBrand;
?>
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>My Vehicles - Car Service Management</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet" />
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
                        "destructive": "#D93025"
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

<body class="font-display bg-background-light dark:bg-background-dark text-[#333333] dark:text-gray-200">
    <div class="flex h-screen">
        <!-- SideNavBar -->
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
            <a href="userDashboard.php" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Client Portal</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a href="userDashboard.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary">
                    <span class="material-symbols-outlined">directions_car</span>
                    <p class="text-sm font-medium leading-normal">My Vehicles</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">My Appointments</p>
                </a>
                <a href="userDashboard.php#service_history" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined">history</span>
                    <p class="text-sm font-medium leading-normal">Service History</p>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Billing</p>
                </a>
            </nav>
            <div class="flex flex-col gap-4">
                <a href="requestService.php">
                <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                    <span class="truncate">Request New Service</span>
                </button>
                </a>
                <div class="flex flex-col gap-1">
                    <a href="index.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
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
                            <p class="font-bold">Sarah Connor</p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Client</p>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-10">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    <!-- Left Column: Vehicle List -->
                    <div class="xl:col-span-2">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                            <h1 class="text-3xl font-bold leading-tight tracking-tight">My Vehicles</h1>
                        </div>
                        <!-- Vehicle Cards -->
                        <div class="space-y-4">
                            <!-- Card 1 -->
                            <div class="flex flex-col md:flex-row items-stretch justify-between gap-4 rounded-lg bg-white dark:bg-gray-800 p-4 shadow-[0_0_4px_rgba(0,0,0,0.1)] dark:shadow-none border border-transparent dark:border-gray-700">
                                <div class="flex flex-1 flex-col justify-between gap-4">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-base font-bold leading-tight text-[#111418] dark:text-white">Honda Civic</p>
                                        <p class="text-sm font-normal leading-normal text-[#617589] dark:text-gray-400">2021 • VIN: ************5432</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700 px-4 text-sm font-medium leading-normal text-[#111418] dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                            <span class="truncate">Edit</span>
                                        </button>
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-transparent px-4 text-sm font-medium leading-normal text-destructive hover:bg-destructive/10 transition-colors">
                                            <span class="truncate">Remove</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="flex flex-col md:flex-row items-stretch justify-between gap-4 rounded-lg bg-white dark:bg-gray-800 p-4 shadow-[0_0_4px_rgba(0,0,0,0.1)] dark:shadow-none border border-transparent dark:border-gray-700">
                                <div class="flex flex-1 flex-col justify-between gap-4">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-base font-bold leading-tight text-[#111418] dark:text-white">Ford F-150</p>
                                        <p class="text-sm font-normal leading-normal text-[#617589] dark:text-gray-400">2019 • VIN: ************5432</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700 px-4 text-sm font-medium leading-normal text-[#111418] dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                            <span class="truncate">Edit</span>
                                        </button>
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-transparent px-4 text-sm font-medium leading-normal text-destructive hover:bg-destructive/10 transition-colors">
                                            <span class="truncate">Remove</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row items-stretch justify-between gap-4 rounded-lg bg-white dark:bg-gray-800 p-4 shadow-[0_0_4px_rgba(0,0,0,0.1)] dark:shadow-none border border-transparent dark:border-gray-700">
                                <div class="flex flex-1 flex-col justify-between gap-4">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-base font-bold leading-tight text-[#111418] dark:text-white">Ford F-150</p>
                                        <p class="text-sm font-normal leading-normal text-[#617589] dark:text-gray-400">2019 • VIN: ************5432</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700 px-4 text-sm font-medium leading-normal text-[#111418] dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                            <span class="truncate">Edit</span>
                                        </button>
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-transparent px-4 text-sm font-medium leading-normal text-destructive hover:bg-destructive/10 transition-colors">
                                            <span class="truncate">Remove</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row items-stretch justify-between gap-4 rounded-lg bg-white dark:bg-gray-800 p-4 shadow-[0_0_4px_rgba(0,0,0,0.1)] dark:shadow-none border border-transparent dark:border-gray-700">
                                <div class="flex flex-1 flex-col justify-between gap-4">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-base font-bold leading-tight text-[#111418] dark:text-white">Ford F-150</p>
                                        <p class="text-sm font-normal leading-normal text-[#617589] dark:text-gray-400">2019 • VIN: ************5432</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700 px-4 text-sm font-medium leading-normal text-[#111418] dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                            <span class="truncate">Edit</span>
                                        </button>
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-transparent px-4 text-sm font-medium leading-normal text-destructive hover:bg-destructive/10 transition-colors">
                                            <span class="truncate">Remove</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row items-stretch justify-between gap-4 rounded-lg bg-white dark:bg-gray-800 p-4 shadow-[0_0_4px_rgba(0,0,0,0.1)] dark:shadow-none border border-transparent dark:border-gray-700">
                                <div class="flex flex-1 flex-col justify-between gap-4">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-base font-bold leading-tight text-[#111418] dark:text-white">Ford F-150</p>
                                        <p class="text-sm font-normal leading-normal text-[#617589] dark:text-gray-400">2019 • VIN: ************5432</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700 px-4 text-sm font-medium leading-normal text-[#111418] dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                            <span class="truncate">Edit</span>
                                        </button>
                                        <button class="flex h-8 w-fit min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-transparent px-4 text-sm font-medium leading-normal text-destructive hover:bg-destructive/10 transition-colors">
                                            <span class="truncate">Remove</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Empty State Example (can be shown conditionally) -->
                            <!-- 
                        <div class="flex flex-col items-center justify-center text-center p-12 bg-white dark:bg-gray-800 rounded-lg border border-dashed border-gray-300 dark:border-gray-600">
                           <span class="material-symbols-outlined text-6xl text-gray-400 dark:text-gray-500">add_circle</span>
                           <h3 class="mt-4 text-lg font-medium text-[#111418] dark:text-white">No vehicles added yet</h3>
                           <p class="mt-1 text-sm text-[#617589] dark:text-gray-400">Click 'Add New Vehicle' to get started.</p>
                        </div>
                        -->
                        </div>
                    </div>
                    <!-- Right Column: Add/Edit Form Panel -->
                    <div class="xl:col-span-1">
                        <div class="sticky top-8 bg-white dark:bg-gray-800 rounded-lg shadow-[0_0_4px_rgba(0,0,0,0.1)] dark:shadow-none border border-transparent dark:border-gray-700 p-6">
                            <h2 class="text-xl font-bold text-[#111418] dark:text-white mb-6">Add a New Vehicle</h2>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-[#333333] dark:text-gray-300 mb-1" for="make">Make</label>
                                 <select class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-[#333333] dark:text-white focus:border-primary focus:ring-primary" id="year" name="year">
                                        <?php
                                        foreach (CarBrand::getAllBrands() as $row) {
                                            echo "<option value=" . htmlspecialchars($row['id']) . ">" . htmlspecialchars($row['brand_name']) . "</option>";
                                        }
                                        ?>
                                    </select>    
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-[#333333] dark:text-gray-300 mb-1" for="model">Model</label>
                                    <select class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-[#333333] dark:text-white focus:border-primary focus:ring-primary" id="year" name="year">
                                        <?php
                                        
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-[#333333] dark:text-gray-300 mb-1" for="year">Year</label>
                                    <select class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-[#333333] dark:text-white focus:border-primary focus:ring-primary" id="year" name="year">
                                        <?php
                                        for ($i = 1960; $i <= date("Y"); $i++) {
                                            echo "<option>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-[#333333] dark:text-gray-300 mb-1" for="vin">VIN</label>
                                    <input class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-[#333333] dark:text-white focus:border-primary focus:ring-primary" id="vin" name="vin" placeholder="17-digit vehicle identification number" type="text" />
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Usually found on your dashboard or driver-side door jamb.</p>
                                </div>
                                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <button class="flex h-10 min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700 px-4 text-sm font-medium text-[#111418] dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors" type="button">Cancel</button>
                                    <button class="flex h-10 min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-primary px-4 text-sm font-bold text-white hover:bg-primary/90 transition-colors" type="submit">Save Vehicle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Confirmation Modal (dialog) -->
                <!-- 
            <div class="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center p-4">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg max-w-md w-full p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-destructive/10 rounded-full p-2">
                           <span class="material-symbols-outlined text-destructive text-2xl">warning</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-[#111418] dark:text-white">Remove Vehicle?</h3>
                            <p class="text-sm text-[#617589] dark:text-gray-400 mt-1">
                                Are you sure you want to remove the <strong>Honda Civic (ABC-123)</strong>? This action cannot be undone.
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button class="flex h-10 min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700 px-4 text-sm font-medium text-[#111418] dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">Cancel</button>
                        <button class="flex h-10 min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-destructive px-4 text-sm font-bold text-white hover:bg-destructive/90 transition-colors">Confirm Remove</button>
                    </div>
                </div>
            </div> 
            -->
            </main>
        </div>
    </div>
</body>

</html>