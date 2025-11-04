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
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="flex min-h-screen">
            <!-- SideNavBar -->
            <div class="flex flex-col gap-4 p-4 bg-white dark:bg-[#1C2A36] border-r border-gray-200 dark:border-gray-700 w-64 shrink-0">
                <div class="flex gap-3 items-center">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Admin user avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA0Z3L_BpKuKvz26FzYXuG4Mx1CUAYN-hQe5af6uRO8sJA1N8bTjrCsBEVqcLWbQc5ZFNDjDqr3BiIFBYUDbkMG92I0nLMVSLPnCRkxO-O0Wzd7wGFkLFAjhG5fih-KmK6yAAjUci3Y6R2N4cGA5csPX3geNaFLGarxIfaNGZhgv4mEfF9b5-R0rsTv_h9IWI5awXN9ae0hW6ZvJ5AbMYYw4GCNotmGbq0cKgUXbijyl2aeZUwDaqazTbWZlCDcEMa3_QbqeVAIXlM");'></div>
                    <div class="flex flex-col">
                        <h1 class="text-[#111418] dark:text-white text-base font-medium leading-normal">Admin User</h1>
                        <p class="text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">admin@carservice.com</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2 grow">
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" href="#">
                        <span class="material-symbols-outlined text-2xl">dashboard</span>
                        <p class="text-sm font-medium leading-normal">Dashboard</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" href="#">
                        <span class="material-symbols-outlined text-2xl">calendar_month</span>
                        <p class="text-sm font-medium leading-normal">Appointments</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary dark:bg-primary/20 dark:text-white" href="#">
                        <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">build</span>
                        <p class="text-sm font-medium leading-normal">Service Management</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" href="#">
                        <span class="material-symbols-outlined text-2xl">group</span>
                        <p class="text-sm font-medium leading-normal">Customers</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" href="#">
                        <span class="material-symbols-outlined text-2xl">bar_chart</span>
                        <p class="text-sm font-medium leading-normal">Reports</p>
                    </a>
                </div>
                <div class="flex flex-col gap-1">
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" href="#">
                        <span class="material-symbols-outlined text-2xl">settings</span>
                        <p class="text-sm font-medium leading-normal">Settings</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" href="#">
                        <span class="material-symbols-outlined text-2xl">logout</span>
                        <p class="text-sm font-medium leading-normal">Log out</p>
                    </a>
                </div>
            </div>
            <!-- Main Content -->
            <main class="flex-1 p-6 lg:p-8">
                <div class="mx-auto max-w-7xl">
                    <!-- PageHeading -->
                    <div class="flex flex-wrap justify-between gap-4 items-center mb-6">
                        <div class="flex flex-col gap-1">
                            <p class="text-[#111418] dark:text-white text-3xl font-bold tracking-tight">Service Management</p>
                            <p class="text-[#617589] dark:text-gray-400 text-base font-normal leading-normal">Manage the types of services offered by the car service.</p>
                        </div>
                        <button class="flex min-w-[84px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                            <span class="material-symbols-outlined text-xl">add</span>
                            <span class="truncate">Add New Service</span>
                        </button>
                    </div>
                    <!-- Toolbar / Filters -->
                    <div class="bg-white dark:bg-[#1C2A36] rounded-xl p-4 mb-6 border border-gray-200 dark:border-gray-700">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- SearchBar -->
                            <div class="md:col-span-2">
                                <label class="flex flex-col w-full">
                                    <div class="flex w-full flex-1 items-stretch rounded-lg h-10">
                                        <div class="text-[#617589] dark:text-gray-400 flex bg-background-light dark:bg-background-dark items-center justify-center pl-3 rounded-l-lg">
                                            <span class="material-symbols-outlined text-2xl">search</span>
                                        </div>
                                        <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-[#111418] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border-none bg-background-light dark:bg-background-dark h-full placeholder:text-[#617589] dark:placeholder:text-gray-500 px-2 text-base font-normal leading-normal" placeholder="Search by service name..." value="" />
                                    </div>
                                </label>
                            </div>
                            <!-- Chips / Filter Dropdown -->
                            <div>
                                <button class="flex w-full h-10 shrink-0 items-center justify-between gap-x-2 rounded-lg bg-background-light dark:bg-background-dark pl-4 pr-2 border border-gray-200 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                                    <p class="text-[#111418] dark:text-white text-sm font-medium leading-normal">Category: All</p>
                                    <span class="material-symbols-outlined text-2xl text-[#111418] dark:text-white">expand_more</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Data Table -->
                    <div class="bg-white dark:bg-[#1C2A36] rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                    <tr>
                                        <th class="p-4" scope="col"><input class="form-checkbox rounded border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-primary focus:ring-primary/50" type="checkbox" /></th>
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
                                    <tr class="bg-white dark:bg-[#1C2A36] border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="w-4 p-4"><input class="form-checkbox rounded border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-primary focus:ring-primary/50" type="checkbox" /></td>
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">Standard Oil Change</th>
                                        <td class="px-6 py-4">Maintenance</td>
                                        <td class="px-6 py-4">$49.99</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex gap-4 justify-end">
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined">edit</span></button>
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-[#1C2A36] border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="w-4 p-4"><input class="form-checkbox rounded border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-primary focus:ring-primary/50" type="checkbox" /></td>
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">Brake Pad Replacement</th>
                                        <td class="px-6 py-4">Brakes</td>
                                        <td class="px-6 py-4">$199.99</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex gap-4 justify-end">
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined">edit</span></button>
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-[#1C2A36] border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="w-4 p-4"><input class="form-checkbox rounded border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-primary focus:ring-primary/50" type="checkbox" /></td>
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">Engine Diagnostic</th>
                                        <td class="px-6 py-4">Diagnostics</td>
                                        <td class="px-6 py-4">$89.00</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex gap-4 justify-end">
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined">edit</span></button>
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-[#1C2A36] border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="w-4 p-4"><input class="form-checkbox rounded border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-primary focus:ring-primary/50" type="checkbox" /></td>
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">Tire Rotation &amp; Balance</th>
                                        <td class="px-6 py-4">Tires</td>
                                        <td class="px-6 py-4">$75.50</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex gap-4 justify-end">
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined">edit</span></button>
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-[#1C2A36] hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="w-4 p-4"><input class="form-checkbox rounded border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-primary focus:ring-primary/50" type="checkbox" /></td>
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">Battery Check &amp; Replacement</th>
                                        <td class="px-6 py-4">Electrical</td>
                                        <td class="px-6 py-4">$150.00</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex gap-4 justify-end">
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined">edit</span></button>
                                                <button class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <nav aria-label="Table navigation" class="flex items-center justify-between p-4">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">1-5</span> of <span class="font-semibold text-gray-900 dark:text-white">100</span></span>
                            <ul class="inline-flex items-center -space-x-px">
                                <li><a class="px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white flex items-center" href="#"><span class="material-symbols-outlined text-xl">chevron_left</span></a></li>
                                <li><a class="px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="#">1</a></li>
                                <li><a aria-current="page" class="px-3 h-8 text-primary border border-gray-300 bg-primary/10 hover:bg-primary/20 dark:border-gray-700 dark:bg-gray-700 dark:text-white" href="#">2</a></li>
                                <li><a class="px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="#">3</a></li>
                                <li><a class="px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white flex items-center" href="#"><span class="material-symbols-outlined text-xl">chevron_right</span></a></li>
                            </ul>
                        </nav>
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