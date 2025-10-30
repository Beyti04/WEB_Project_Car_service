<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Client Management - Car Service</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet" />
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

<body class="font-display">
    <div class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
                    <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-[#dbe0e6] dark:border-gray-700 px-4 sm:px-6 md:px-10 py-3 bg-white dark:bg-background-dark rounded-xl">
                        <div class="flex items-center gap-4 text-[#111418] dark:text-white">
                            <div class="size-6 text-primary">
                                <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.5563 34.1455V13.8546C39.5563 15.708 36.8773 17.3437 32.7927 18.3189C30.2914 18.916 27.263 19.2655 24 19.2655C20.737 19.2655 17.7086 18.916 15.2073 18.3189C11.1227 17.3437 8.44365 15.708 8.44365 13.8546V34.1455C8.44365 35.9988 11.1227 37.6346 15.2073 38.6098C17.7086 39.2069 20.737 39.5564 24 39.5564C27.263 39.5564 30.2914 39.2069 32.7927 38.6098C36.8773 37.6346 39.5563 35.9988 39.5563 34.1455Z" fill="currentColor"></path>
                                    <path clip-rule="evenodd" d="M10.4485 13.8519C10.4749 13.9271 10.6203 14.246 11.379 14.7361C12.298 15.3298 13.7492 15.9145 15.6717 16.3735C18.0007 16.9296 20.8712 17.2655 24 17.2655C27.1288 17.2655 29.9993 16.9296 32.3283 16.3735C34.2508 15.9145 35.702 15.3298 36.621 14.7361C37.3796 14.246 37.5251 13.9271 37.5515 13.8519C37.5287 13.7876 37.4333 13.5973 37.0635 13.2931C36.5266 12.8516 35.6288 12.3647 34.343 11.9175C31.79 11.0295 28.1333 10.4437 24 10.4437C19.8667 10.4437 16.2099 11.0295 13.657 11.9175C12.3712 12.3647 11.4734 12.8516 10.9365 13.2931C10.5667 13.5973 10.4713 13.7876 10.4485 13.8519ZM37.5563 18.7877C36.3176 19.3925 34.8502 19.8839 33.2571 20.2642C30.5836 20.9025 27.3973 21.2655 24 21.2655C20.6027 21.2655 17.4164 20.9025 14.7429 20.2642C13.1498 19.8839 11.6824 19.3925 10.4436 18.7877V34.1275C10.4515 34.1545 10.5427 34.4867 11.379 35.027C12.298 35.6207 13.7492 36.2054 15.6717 36.6644C18.0007 37.2205 20.8712 37.5564 24 37.5564C27.1288 37.5564 29.9993 37.2205 32.3283 36.6644C34.2508 36.2054 35.702 35.6207 36.621 35.027C37.4573 34.4867 37.5485 34.1546 37.5563 34.1275V18.7877ZM41.5563 13.8546V34.1455C41.5563 36.1078 40.158 37.5042 38.7915 38.3869C37.3498 39.3182 35.4192 40.0389 33.2571 40.5551C30.5836 41.1934 27.3973 41.5564 24 41.5564C20.6027 41.5564 17.4164 41.1934 14.7429 40.5551C12.5808 40.0389 10.6502 39.3182 9.20848 38.3869C7.84205 37.5042 6.44365 36.1078 6.44365 34.1455L6.44365 13.8546C6.44365 12.2684 7.37223 11.0454 8.39581 10.2036C9.43325 9.3505 10.8137 8.67141 12.343 8.13948C15.4203 7.06909 19.5418 6.44366 24 6.44366C28.4582 6.44366 32.5797 7.06909 35.657 8.13948C37.1863 8.67141 38.5667 9.3505 39.6042 10.2036C40.6278 11.0454 41.5563 12.2684 41.5563 13.8546Z" fill="currentColor" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h2 class="text-[#111418] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">Car Service Management</h2>
                        </div>
                        <div class="flex flex-1 justify-end items-center gap-4 sm:gap-6 md:gap-8">
                            <div class="hidden md:flex items-center gap-8">
                                <a class="text-[#617589] dark:text-gray-400 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary" href="#">Dashboard</a>
                                <a class="text-[#617589] dark:text-gray-400 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary" href="#">Appointments</a>
                                <a class="text-primary dark:text-white text-sm font-bold leading-normal" href="#">Clients</a>
                            </div>
                            <div class="flex gap-2">
                                <button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f0f2f4] dark:bg-gray-700/50 text-[#111418] dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                                    <span class="material-symbols-outlined text-xl">notifications</span>
                                </button>
                                <button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f0f2f4] dark:bg-gray-700/50 text-[#111418] dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                                    <span class="material-symbols-outlined text-xl">dark_mode</span>
                                </button>
                            </div>
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar image" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCurOC9ShmFmbfVwmqAJDqDR7jAGssImaoW5zgGIjZMKxbSsaQ7YrvvwEqAlOgcR6Yjc8HiRtk0XUj7dmHljHkAonP3sG5SxqsC1vJBHQZAI44rlyw462Kjzj3fzWtrDnKqOojwfrE8tfOz-qLAmo5KtV-EaJ4xb4J5KFT2CVu10yp1uYEPvfnJaCmFXBv45vjw2A2sjU9QpV0lbbNZ4Wp0awnVA-whYRr5alDYYwtb8RiYb4IAYeuHft1wJV91CyoNvHwRP70Cw2E");'></div>
                        </div>
                    </header>
                    <main class="flex flex-col gap-6 pt-6">
                        <div class="flex flex-wrap justify-between items-center gap-4 p-4">
                            <p class="text-[#111418] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em] min-w-72">Client Management</p>
                        </div>
                        <div class="flex flex-col md:flex-row justify-between gap-4 px-4 py-3">
                            <div class="relative flex-1 min-w-[280px]">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500 text-xl">search</span>
                                <input class="w-full h-10 pl-10 pr-4 rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-background-dark text-sm focus:ring-2 focus:ring-primary focus:border-primary dark:text-white" placeholder="Search by name, email, or phone..." type="text" />
                            </div>
                            <div class="flex gap-2">
                                <button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-white dark:bg-background-dark border border-[#dbe0e6] dark:border-gray-700 text-[#111418] dark:text-white gap-2 text-sm font-medium leading-normal min-w-0 px-4 hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <span class="material-symbols-outlined text-lg">filter_list</span>
                                    <span class="truncate">Filter</span>
                                </button>
                                <button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-primary text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-4 hover:bg-blue-700 dark:hover:bg-blue-600">
                                    <span class="material-symbols-outlined text-xl">add</span>
                                    <span class="truncate">Add New Client</span>
                                </button>
                            </div>
                        </div>
                        <div class="px-4 py-3 @container">
                            <div class="flex overflow-hidden rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-background-dark">
                                <table class="flex-1 w-full">
                                    <thead>
                                        <tr class="bg-gray-50 dark:bg-gray-800/50">
                                            <th class="px-4 py-3 text-left text-[#111418] dark:text-gray-300 text-sm font-medium leading-normal w-1/3">Client Name</th>
                                            <th class="px-4 py-3 text-left text-[#111418] dark:text-gray-300 text-sm font-medium leading-normal w-1/3">Email</th>
                                            <th class="px-4 py-3 text-left text-[#111418] dark:text-gray-300 text-sm font-medium leading-normal w-1/4">Phone</th>
                                            <th class="px-4 py-3 text-left text-[#617589] dark:text-gray-400 text-sm font-medium leading-normal">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-t border-t-[#dbe0e6] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                            <td class="h-[72px] px-4 py-2 text-[#111418] dark:text-white text-sm font-normal leading-normal">John Doe</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">john.doe@example.com</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">(555) 123-4567</td>
                                            <td class="h-[72px] px-4 py-2">
                                                <div class="flex gap-2 text-[#617589] dark:text-gray-400">
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                                    <button class="p-2 rounded-md hover:bg-red-100 dark:hover:bg-red-900/50 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">delete</span></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-t border-t-[#dbe0e6] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                            <td class="h-[72px] px-4 py-2 text-[#111418] dark:text-white text-sm font-normal leading-normal">Jane Smith</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">jane.smith@example.com</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">(555) 987-6543</td>
                                            <td class="h-[72px] px-4 py-2">
                                                <div class="flex gap-2 text-[#617589] dark:text-gray-400">
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                                    <button class="p-2 rounded-md hover:bg-red-100 dark:hover:bg-red-900/50 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">delete</span></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-t border-t-[#dbe0e6] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                            <td class="h-[72px] px-4 py-2 text-[#111418] dark:text-white text-sm font-normal leading-normal">Michael Johnson</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">michael.j@example.com</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">(555) 555-1212</td>
                                            <td class="h-[72px] px-4 py-2">
                                                <div class="flex gap-2 text-[#617589] dark:text-gray-400">
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                                    <button class="p-2 rounded-md hover:bg-red-100 dark:hover:bg-red-900/50 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">delete</span></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-t border-t-[#dbe0e6] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                            <td class="h-[72px] px-4 py-2 text-[#111418] dark:text-white text-sm font-normal leading-normal">Emily Davis</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">emily.davis@example.com</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">(555) 234-5678</td>
                                            <td class="h-[72px] px-4 py-2">
                                                <div class="flex gap-2 text-[#617589] dark:text-gray-400">
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                                    <button class="p-2 rounded-md hover:bg-red-100 dark:hover:bg-red-900/50 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">delete</span></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-t border-t-[#dbe0e6] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                            <td class="h-[72px] px-4 py-2 text-[#111418] dark:text-white text-sm font-normal leading-normal">David Wilson</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">david.wilson@example.com</td>
                                            <td class="h-[72px] px-4 py-2 text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">(555) 876-5432</td>
                                            <td class="h-[72px] px-4 py-2">
                                                <div class="flex gap-2 text-[#617589] dark:text-gray-400">
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
                                                    <button class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary"><span class="material-symbols-outlined text-xl">edit</span></button>
                                                    <button class="p-2 rounded-md hover:bg-red-100 dark:hover:bg-red-900/50 hover:text-red-600 dark:hover:text-red-500"><span class="material-symbols-outlined text-xl">delete</span></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>