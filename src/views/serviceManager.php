<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Car Service Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet" />
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

<body class="font-display bg-background-light dark:bg-background-dark">
    <div class="relative flex min-h-screen w-full">
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
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=adminDashboard">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">Schedule</p>
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
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=serviceManager">
                    <span class="material-symbols-outlined text-primary">build</span>
                    <p class="text-sm font-medium leading-normal">Services</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=inventoryManager">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <p class="text-sm font-medium leading-normal">Inventory</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">assessment</span>
                    <p class="text-sm font-medium leading-normal">Reports</p>
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

        <!-- Main Content -->
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

            <main class="flex-1 p-6 lg:p-8">
                <div class="mx-auto max-w-7xl">
                    <!-- PageHeading -->
                    <div class="flex flex-wrap justify-between gap-4 items-center mb-6">
                        <div class="flex flex-col gap-1">
                            <h1 class="text-[#111418] dark:text-white text-3xl font-bold tracking-tight">Service Management</h1>
                            <p class="text-[#617589] dark:text-gray-400 text-base font-normal leading-normal">Manage the types of services offered by the car service.</p>
                        </div>
                        <a href="index.php?action=newService">
                        <button class="flex min-w-[84px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                            <span class="material-symbols-outlined text-xl">add</span>
                            <span class="truncate">Add New Service</span>
                        </button>
                        </a>
                    </div>
                    <!-- Toolbar / Filters -->
                    <div class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- SearchBar -->
                            <div class="lg:col-span-2">
                                <label class="flex flex-col w-full h-12">
                                    <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                                        <div class="text-gray-500 dark:text-gray-400 flex bg-white dark:bg-gray-800 items-center justify-center pl-4 rounded-l-lg border border-gray-300 dark:border-gray-700 border-r-0">
                                            <span class="material-symbols-outlined mr-2 text-2xl">search</span>
                                        </div>
                                        <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-gray-900 dark:text-gray-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 h-full placeholder:text-gray-500 dark:placeholder:text-gray-400 px-4 text-base font-normal leading-normal"
                                            placeholder="Search by service name...">
                                    </div>
                                </label>
                            </div>

                            <!-- Category Dropdown -->
                            <div class="w-full">
                                <div class="relative h-12">
                                    <select class="flex w-full flex-1 items-stretch rounded-lg h-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-200 pl-4 pr-10 text-base font-normal leading-normal focus:outline-0 focus:ring-2 focus:ring-primary/50 appearance-none">
                                        <option disabled selected>All Categories</option>
                                        <?php

                                        use App\Models\Service;
                                        use App\Models\ServiceGroup;

                                        $serviceGroups = ServiceGroup::getAllServiceGroups();
                                        $groupNames = [];
                                        foreach ($serviceGroups as $group) {
                                            $groupNames[$group->id] = $group->name;
                                        }

                                        foreach ($serviceGroups as $group) {
                                            echo '<option value="' . htmlspecialchars($group->id) . '">' . htmlspecialchars($group->name) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Data Table -->
                    <div class="bg-white dark:bg-[#1C2A36] rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                    <tr>
                                        <th class="px-6 py-3" scope="col">
                                            <div class="flex items-center gap-1 cursor-pointer">Service Name <span class="material-symbols-outlined text-base">unfold_more</span></div>
                                        </th>
                                        <th class="px-6 py-3" scope="col">
                                            <div class="flex items-center gap-1 cursor-pointer">Category <span class="material-symbols-outlined text-base">unfold_more</span></div>
                                        </th>
                                        <th class="px-6 py-3" scope="col">
                                            <div class="flex items-center gap-1 cursor-pointer">Base Price <span class="material-symbols-outlined text-base">unfold_more</span></div>
                                        </th>
                                        <th class="px-6 py-3" scope="col"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $services = Service::getAllServices();
                                    foreach ($services as $service) {
                                        echo '<tr class="bg-white dark:bg-[#1C2A36] border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">';
                                        echo '<th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">' . htmlspecialchars($service->name) . '</th>';
                                        echo '<td class="px-6 py-4">' . htmlspecialchars($groupNames[$service->group_id] ?? '') . '</td>';
                                        echo '<td class="px-6 py-4">$' . htmlspecialchars($service->base_price) . '</td>';
                                    ?>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex gap-4 justify-end">
                                                <a href="index.php?action=editService&service_id=<?php echo htmlspecialchars($service->id); ?>">
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined">edit</span></button>
                                                </a>
                                                <a href="index.php?action=removeService&service_id=<?php echo htmlspecialchars($service->id); ?>">
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
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
                </div>
                <!-- Pagination -->
                <div class="flex items-center justify-center p-4">
                    <a class="flex size-10 items-center justify-center text-[#111418] dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#">
                        <span class="material-symbols-outlined text-xl">chevron_left</span>
                    </a>
                    <a class="text-sm font-bold leading-normal tracking-[0.015em] flex size-10 items-center justify-center text-white rounded-full bg-primary" href="#">1</a>
                    <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800" href="#">2</a>
                    <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800" href="#">3</a>
                    <span class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full" href="#">...</span>
                    <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#111418] dark:text-white rounded-full hover:bg-gray-200 dark:hover:bg-gray-800" href="#">10</a>
                    <a class="flex size-10 items-center justify-center text-[#111418] dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#">
                        <span class="material-symbols-outlined text-xl">chevron_right</span>
                    </a>
                </div>

        </div>
        </main>
    </div>
    <!-- Modal for Add/Edit Service -->
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden" id="service-modal">
        <div class="bg-white dark:bg-[#1C2A36] rounded-xl shadow-xl w-full max-w-lg m-4">
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add New Service</h3>
                <button class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" type="button">
                    <span class="material-symbols-outlined">close</span>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form class="p-6 space-y-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="service-name">Service Name</label>
                    <input class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" id="service-name" name="service-name" placeholder="e.g., Premium Oil Change" required="" type="text" />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="base-price">Base Price ($)</label>
                    <input class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" id="base-price" name="base-price" placeholder="e.g., 79.99" required="" type="number" />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="service-category">Service Category</label>
                    <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" id="service-category">
                        <option selected="">Choose a category</option>
                        <option value="MA">Maintenance</option>
                        <option value="BR">Brakes</option>
                        <option value="DI">Diagnostics</option>
                        <option value="EL">Electrical</option>
                    </select>
                </div>
            </form>
            <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" type="button">Cancel</button>
                <button class="text-white bg-primary hover:bg-primary/90 focus:ring-4 focus:outline-none focus:ring-primary/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save Service</button>
            </div>
        </div>
    </div>
    </div>
</body>

</html>