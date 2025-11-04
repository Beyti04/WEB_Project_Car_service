<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Inventory Management - Car Service</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
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
        <aside class="flex-shrink-0 w-64 bg-white dark:bg-background-dark dark:border-r dark:border-gray-700/50">
            <div class="flex h-full min-h-[700px] flex-col justify-between p-4">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3 p-2">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Admin user avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDz3i4WBb_jWZ37TwjU_9kQt96keMtVlwuk7ok5pj8B1g35_75x8akR5r8IpuHn7IUt_Jmxc1WDe5BfCJIcXISUCvOxibg9sASlMz6AqluatkRVvn3HDFRqv_lfa2QfsNbHX5dMmzNBtg4v-OzHwyVOs-ugoEORRZNDiZGbdU-WJTlXWfAml3_xKDjGWQ3IyEmL2Cd357AuTpKgeVc6A0RnrqwI7jRQqoHXXebh_oGbo_uBp424PlNy8FLwQ_iSzLjCsK7171hafxE");'></div>
                        <div class="flex flex-col">
                            <h1 class="text-gray-900 dark:text-gray-100 text-base font-medium leading-normal">Alex Johnson</h1>
                            <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Administrator</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mt-4">
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-primary/10 hover:text-primary dark:hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined">dashboard</span>
                            <p class="text-sm font-medium leading-normal">Dashboard</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-primary/10 hover:text-primary dark:hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined">event</span>
                            <p class="text-sm font-medium leading-normal">Appointments</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary dark:bg-primary/20" href="#">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
                            <p class="text-sm font-medium leading-normal">Inventory</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-primary/10 hover:text-primary dark:hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined">group</span>
                            <p class="text-sm font-medium leading-normal">Customers</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-primary/10 hover:text-primary dark:hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined">bar_chart</span>
                            <p class="text-sm font-medium leading-normal">Reports</p>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-primary/10 hover:text-primary dark:hover:text-primary transition-colors" href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <p class="text-sm font-medium leading-normal">Settings</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-primary/10 hover:text-primary dark:hover:text-primary transition-colors" href="#">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Log Out</p>
                    </a>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 p-6 lg:p-10">
            <div class="mx-auto max-w-7xl">
                <!-- PageHeading -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                    <p class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Inventory Management</p>
                    <!-- Modified ToolBar Button -->
                    <button class="flex items-center justify-center rounded-lg h-11 bg-primary text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em] px-5 transition-transform active:scale-95">
                        <span class="material-symbols-outlined text-xl">add_circle</span>
                        <span class="truncate">Add New Material</span>
                    </button>
                </div>
                <!-- Search and Filter Bar -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                    <!-- SearchBar -->
                    <div class="lg:col-span-2">
                        <label class="flex flex-col w-full h-12">
                            <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                                <div class="text-gray-500 dark:text-gray-400 flex bg-white dark:bg-gray-800 items-center justify-center pl-4 rounded-l-lg border border-gray-300 dark:border-gray-700 border-r-0">
                                    <span class="material-symbols-outlined">search</span>
                                </div>
                                <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-gray-900 dark:text-gray-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 h-full placeholder:text-gray-500 dark:placeholder:text-gray-400 px-4 text-base font-normal leading-normal" placeholder="Search by material name..." />
                            </div>
                        </label>
                    </div>
                    <!-- Filter Dropdown -->
                    <div class="w-full">
                        <div class="relative h-12">
                            <select class="form-select w-full h-full appearance-none rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 pl-4 pr-10 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/50">
                                <option>All Groups</option>
                                <option>Oils</option>
                                <option>Filters</option>
                                <option>Brakes</option>
                                <option>Tires</option>
                                <option>Fluids</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 dark:text-gray-400">
                                <span class="material-symbols-outlined">expand_more</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chips (Active Filters) -->
                <div class="flex gap-3 mb-6 overflow-x-auto pb-2">
                    <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-primary/20 pl-4 pr-2 text-primary">
                        <p class="text-sm font-medium leading-normal">All Groups</p>
                        <span class="material-symbols-outlined text-base">close</span>
                    </button>
                    <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 pl-4 pr-2 text-gray-700 dark:text-gray-300">
                        <p class="text-sm font-medium leading-normal">Oils</p>
                    </button>
                    <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 pl-4 pr-2 text-gray-700 dark:text-gray-300">
                        <p class="text-sm font-medium leading-normal">Filters</p>
                    </button>
                    <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 pl-4 pr-2 text-gray-700 dark:text-gray-300">
                        <p class="text-sm font-medium leading-normal">Brakes</p>
                    </button>
                </div>
                <!-- Inventory Table -->
                <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-gray-50 dark:bg-gray-700/50 text-xs text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-4 font-medium" scope="col">Material Name</th>
                                    <th class="px-6 py-4 font-medium" scope="col">Group</th>
                                    <th class="px-6 py-4 font-medium" scope="col">Stock</th>
                                    <th class="px-6 py-4 font-medium" scope="col">Unit Price</th>
                                    <th class="px-6 py-4 font-medium text-right" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Synthetic Engine Oil 5W-30</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Oils</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                            <span>120</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">$8.50</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-xl">edit</span></button>
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-xl">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Cabin Air Filter CAF-102</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Filters</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                            <span>75</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">$15.00</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-xl">edit</span></button>
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-xl">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Ceramic Brake Pads BP-45</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Brakes</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        <div class="flex items-center gap-2 font-semibold text-amber-600 dark:text-amber-400">
                                            <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                            <span>8</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">$45.75</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-xl">edit</span></button>
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-xl">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">DOT 4 Brake Fluid</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Fluids</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                            <span>32</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">$12.20</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-xl">edit</span></button>
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-xl">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">All-Season Tire 225/65R17</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Tires</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                            <span>48</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">$120.00</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-xl">edit</span></button>
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-xl">delete</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="flex items-center justify-between mt-6 px-2">
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        Showing <span class="font-semibold text-gray-800 dark:text-gray-200">1-5</span> of <span class="font-semibold text-gray-800 dark:text-gray-200">42</span>
                    </span>
                    <div class="inline-flex items-center gap-2">
                        <button class="flex items-center justify-center h-9 w-9 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <span class="material-symbols-outlined text-xl">chevron_left</span>
                        </button>
                        <button class="flex items-center justify-center h-9 w-9 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <span class="material-symbols-outlined text-xl">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>