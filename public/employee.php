<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Employee Management - Car Service System</title>
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
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
        }

        .material-symbols-outlined.fill {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-[#101922] dark:text-gray-200">
    <div class="relative flex min-h-screen w-full">
        <!-- Side Navigation Bar -->
        <aside class="flex w-64 flex-col border-r border-gray-200 dark:border-gray-800 bg-white dark:bg-[#18212a]">
            <div class="flex h-full flex-col justify-between p-4">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3 px-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Admin user avatar placeholder" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBaAOo2OGAgSBd8IzkHV-KJN_wzcIm9x0bEdkHDuDCBOnxzEQdKtYg5UlbjFPLwVfrXTKF4sZDBo-puECEYcCMHZ9Sam63b37QyXbexddaQPbwcR0Nmcvcbaoka_2IoP9WCBnZWEw8GCyTjErqvfAz-Oxko-tv-00_hbjIKcjPGN6rre-xw2KFfm4m6vZygl2FtmJf3arLJ9PZjOfaz7J5ZuGtsy5_APY5FtcViH6zunuNGtuph7zsNPamI5rpKxBsIEeA2xnOqWDQ");'></div>
                        <div class="flex flex-col">
                            <h1 class="text-[#111418] dark:text-gray-100 text-base font-medium leading-normal">Admin User</h1>
                            <p class="text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">Administrator</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mt-4">
                        <a class="flex items-center gap-3 px-3 py-2 text-[#617589] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg" href="#">
                            <span class="material-symbols-outlined">dashboard</span>
                            <p class="text-sm font-medium leading-normal">Dashboard</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 text-[#617589] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg" href="#">
                            <span class="material-symbols-outlined">calendar_month</span>
                            <p class="text-sm font-medium leading-normal">Appointments</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary-300" href="#">
                            <span class="material-symbols-outlined fill">group</span>
                            <p class="text-sm font-medium leading-normal">Employee Management</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 text-[#617589] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg" href="#">
                            <span class="material-symbols-outlined">warehouse</span>
                            <p class="text-sm font-medium leading-normal">Inventory</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 text-[#617589] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg" href="#">
                            <span class="material-symbols-outlined">assessment</span>
                            <p class="text-sm font-medium leading-normal">Reports</p>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <a class="flex items-center gap-3 px-3 py-2 text-[#617589] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg" href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <p class="text-sm font-medium leading-normal">Settings</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 text-[#617589] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg" href="#">
                        <span class="material-symbols-outlined">help</span>
                        <p class="text-sm font-medium leading-normal">Help</p>
                    </a>
                    <button class="flex mt-2 min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-gray-200 dark:bg-gray-800 text-[#111418] dark:text-gray-200 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-300 dark:hover:bg-gray-700">
                        <span class="truncate">Log Out</span>
                    </button>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="w-full max-w-7xl mx-auto">
                <!-- Page Header -->
                <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                    <div class="flex flex-col">
                        <h1 class="text-[#111418] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Employee Management</h1>
                        <p class="text-[#617589] dark:text-gray-400 text-base font-normal leading-normal mt-2">View, add, and manage employee records.</p>
                    </div>
                    <button class="flex items-center gap-2 min-w-[84px] cursor-pointer justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90">
                        <span class="material-symbols-outlined" style="font-size: 20px;">add</span>
                        <span class="truncate">Add New Employee</span>
                    </button>
                </div>
                <!-- Toolbar and Filters -->
                <div class="bg-white dark:bg-[#18212a] rounded-xl p-4 border border-gray-200 dark:border-gray-800">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <label class="flex flex-col w-full">
                                <div class="flex w-full flex-1 items-stretch rounded-lg h-12">
                                    <div class="text-[#617589] dark:text-gray-400 flex bg-background-light dark:bg-background-dark items-center justify-center pl-4 rounded-l-lg">
                                        <span class="material-symbols-outlined">search</span>
                                    </div>
                                    <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-gray-100 focus:outline-0 focus:ring-2 focus:ring-primary/50 border-none bg-background-light dark:bg-background-dark h-full placeholder:text-[#617589] dark:placeholder:text-gray-500 px-4 rounded-l-none pl-2 text-base font-normal leading-normal" placeholder="Search by name, email..." value="" />
                                </div>
                            </label>
                        </div>
                        <div class="flex items-center gap-3 overflow-x-auto">
                            <button class="flex h-12 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-background-light dark:bg-background-dark px-4">
                                <p class="text-[#111418] dark:text-gray-200 text-sm font-medium leading-normal">Role: All</p>
                                <span class="material-symbols-outlined text-[#617589] dark:text-gray-400" style="font-size: 20px;">expand_more</span>
                            </button>
                            <button class="flex h-12 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-background-light dark:bg-background-dark px-4">
                                <span class="material-symbols-outlined text-[#617589] dark:text-gray-400">filter_list</span>
                                <p class="text-[#111418] dark:text-gray-200 text-sm font-medium leading-normal">Filters</p>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Employee Data Table -->
                <div class="mt-6 bg-white dark:bg-[#18212a] rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-900/50">
                                <tr>
                                    <th class="p-4" scope="col">
                                        <div class="flex items-center">
                                            <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-all" type="checkbox" />
                                            <label class="sr-only" for="checkbox-all">checkbox</label>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3" scope="col">Employee Name</th>
                                    <th class="px-6 py-3" scope="col">Role</th>
                                    <th class="px-6 py-3" scope="col">Email Address</th>
                                    <th class="px-6 py-3" scope="col">Phone Number</th>
                                    <th class="px-6 py-3 text-right" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white dark:bg-[#18212a] border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900/50">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-table-1" type="checkbox" />
                                            <label class="sr-only" for="checkbox-table-1">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Olivia Rhye</td>
                                    <td class="px-6 py-4">Mechanic</td>
                                    <td class="px-6 py-4">olivia.rhye@example.com</td>
                                    <td class="px-6 py-4">(555) 123-4567</td>
                                    <td class="px-6 py-4 text-right flex justify-end gap-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">edit</span></button>
                                        <button class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-[#18212a] border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900/50">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-table-2" type="checkbox" />
                                            <label class="sr-only" for="checkbox-table-2">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Phoenix Baker</td>
                                    <td class="px-6 py-4">Service Advisor</td>
                                    <td class="px-6 py-4">phoenix.baker@example.com</td>
                                    <td class="px-6 py-4">(555) 234-5678</td>
                                    <td class="px-6 py-4 text-right flex justify-end gap-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">edit</span></button>
                                        <button class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-[#18212a] border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900/50">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-table-3" type="checkbox" />
                                            <label class="sr-only" for="checkbox-table-3">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Lana Steiner</td>
                                    <td class="px-6 py-4">Mechanic</td>
                                    <td class="px-6 py-4">lana.steiner@example.com</td>
                                    <td class="px-6 py-4">(555) 345-6789</td>
                                    <td class="px-6 py-4 text-right flex justify-end gap-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">edit</span></button>
                                        <button class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-[#18212a] border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900/50">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-table-4" type="checkbox" />
                                            <label class="sr-only" for="checkbox-table-4">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Demi Wilkinson</td>
                                    <td class="px-6 py-4">Admin</td>
                                    <td class="px-6 py-4">demi.wilkinson@example.com</td>
                                    <td class="px-6 py-4">(555) 456-7890</td>
                                    <td class="px-6 py-4 text-right flex justify-end gap-2">
                                        <button class="p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">edit</span></button>
                                        <button class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg"><span class="material-symbols-outlined" style="font-size: 20px;">delete</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="Table navigation" class="flex items-center justify-between p-4">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">1-4</span> of <span class="font-semibold text-gray-900 dark:text-white">100</span></span>
                        <ul class="inline-flex -space-x-px text-sm h-8">
                            <li>
                                <a class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="#">Previous</a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="#">1</a>
                            </li>
                            <li>
                                <a aria-current="page" class="flex items-center justify-center px-3 h-8 leading-tight text-primary bg-primary/10 border border-primary hover:bg-primary/20 hover:text-primary dark:border-gray-700 dark:bg-gray-700 dark:text-white" href="#">2</a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="#">3</a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</body>

</html>