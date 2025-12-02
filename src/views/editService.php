<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Service - TU Service</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
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
                        "destructive": "#D93025",
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
                    }
                },
            },
        }
    </script>
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-[#333333] dark:text-gray-200">
    <?php

    use App\Models\ServiceGroup;
    use App\Models\Service;

    $serviceId = $_GET['service_id'] ?? null;
    $service = Service::getServiceById((int)$serviceId);
    $serviceGroup = ServiceGroup::getAllServiceGroups();
    $groupNames = [];
    foreach ($serviceGroup as $group) {
        $groupNames[$group->id] = $group->name;
    }


    ?>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col w-64 bg-white border-r border-border-light p-4 shrink-0">
            <a href="index.php?action=adminDashboard" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">build</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">TU Service</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Admin Portal</p>
                </div>
            </a>

            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=adminDashboard">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=serviceManager">
                    <span class="material-symbols-outlined">build</span>
                    <p class="text-sm font-medium leading-normal">Services</p>
                </a>
            </nav>

            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <a href="index.php?action=logout" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Logout</p>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Layout -->
        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-between whitespace-nowrap border-b border-border-light px-10 py-3 bg-white">
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

            <main class="p-10">
                <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow border dark:border-gray-700">
                    <h1 class="text-3xl font-bold mb-6">Edit Service</h1>

                    <form action="index.php?action=updateService&id=<?php echo htmlspecialchars($service->id); ?>" method="POST" class="space-y-4">

                        <div>
                            <label class="text-sm font-medium mb-1">Service Name</label>
                            <input type="text" name="service_name" required
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                value="<?php echo htmlspecialchars($service->name ?? ''); ?>">
                        </div>

                        <div>
                            <label class="text-sm font-medium mb-1">Service Group</label>
                            <select name="service_group_id" required
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
                                <?php
                                $serviceGroups = ServiceGroup::getAllServiceGroups();
                                foreach ($serviceGroups as $group) {
                                    echo '<option value="' . htmlspecialchars($group->id) . '">' . htmlspecialchars($group->name) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label class="text-sm font-medium mb-1">Price</label>
                            <input type="text" name="price" required
                                class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                value="<?php echo htmlspecialchars($service->price ?? ''); ?>">
                        </div>

                        <div class="flex justify-end gap-3 pt-4 border-t dark:border-gray-700">
                            <a href="index.php?action=serviceManager"
                                class="px-4 h-10 flex items-center rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200">
                                Cancel
                            </a>

                            <button type="submit"
                                class="px-4 h-10 rounded-lg bg-primary text-white font-bold hover:bg-primary/90">
                                Edit Service
                            </button>
                        </div>

                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>