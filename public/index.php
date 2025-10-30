<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>AutoManager Dashboard</title>
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

<body class="font-display bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
    <div class="relative flex min-h-screen w-full">
        <!-- SideNavBar -->
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Admin View</p>
                </div>
            </div>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="#">
                    <span class="material-symbols-outlined text-primary">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">Schedule</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Orders</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">group</span>
                    <p class="text-sm font-medium leading-normal">Clients</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">badge</span>
                    <p class="text-sm font-medium leading-normal">Employees</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">build</span>
                    <p class="text-sm font-medium leading-normal">Services</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
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
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <p class="text-sm font-medium leading-normal">Settings</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                        <span class="material-symbols-outlined">help</span>
                        <p class="text-sm font-medium leading-normal">Support</p>
                    </a>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- TopNavBar -->
            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark px-10 py-3 bg-card-light dark:bg-card-dark">
                <div class="flex items-center gap-8 w-full max-w-md">
                    <label class="flex flex-col w-full">
                        <div class="flex w-full flex-1 items-stretch rounded-lg h-10">
                            <div class="text-text-secondary-light dark:text-text-secondary-dark flex bg-background-light dark:bg-background-dark items-center justify-center pl-4 rounded-l-lg">
                                <span class="material-symbols-outlined">search</span>
                            </div>
                            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-text-light dark:text-text-dark focus:outline-0 focus:ring-2 focus:ring-primary/50 border-none bg-background-light dark:bg-background-dark h-full placeholder:text-text-secondary-light dark:placeholder:text-text-secondary-dark px-4 pl-2 text-base font-normal leading-normal" placeholder="Search orders, clients, VIN..." value="" />
                        </div>
                    </label>
                </div>
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar image" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuADijiRLLPR2eRQXqbVqSmI5KeUFyXAg8F2zmY2mwfb1Pgm6eF-NmHWlSRm0xVvnz3wcPCkB7pflS81XhFJqdUyEEk4srBqEw81WqNgyxpAXWyBF4WXayX_79fjNwvjFvRP2mygTB8JtFtvmgwCmXAkWO1vUyZ6xTjfEnPmwsZD1QhwGVWu-iSAwpmnxmU_NGK7U5sH-U54t-zfth88S-uqzwxhC_4dJgAlM1nGXJJ3Wb2EztyredxX5Mc4g-N4vxPoQmZFTCyPxOs");'></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold">John Doe</p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Admin</p>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main dashboard content -->
            <main class="flex-1 overflow-y-auto p-10">
                <!-- PageHeading -->
                <div class="flex flex-wrap justify-between gap-4 mb-8 items-center">
                    <div class="flex flex-col gap-1">
                        <p class="text-3xl font-bold leading-tight tracking-tight">Welcome back, John!</p>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-base font-normal leading-normal">Here's what's happening with your shop today.</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex min-w-[84px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-10 px-4 bg-background-light dark:bg-card-dark border border-border-light dark:border-border-dark text-text-light dark:text-text-dark text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/10 transition-colors">
                            <span class="material-symbols-outlined text-base">add_circle</span>
                            <span class="truncate">Add Client</span>
                        </button>
                        <button class="flex min-w-[84px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                            <span class="material-symbols-outlined text-base">note_add</span>
                            <span class="truncate">New Order</span>
                        </button>
                    </div>
                </div>
                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark">
                        <p class="text-base font-medium leading-normal text-text-secondary-light dark:text-text-secondary-dark">Total Revenue (MTD)</p>
                        <p class="tracking-light text-3xl font-bold leading-tight">$42,580</p>
                        <p class="text-success text-sm font-medium leading-normal">+5.2% vs last month</p>
                    </div>
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark">
                        <p class="text-base font-medium leading-normal text-text-secondary-light dark:text-text-secondary-dark">Active Orders</p>
                        <p class="tracking-light text-3xl font-bold leading-tight">14</p>
                        <p class="text-success text-sm font-medium leading-normal">+2 since yesterday</p>
                    </div>
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark">
                        <p class="text-base font-medium leading-normal text-text-secondary-light dark:text-text-secondary-dark">Pending Appointments</p>
                        <p class="tracking-light text-3xl font-bold leading-tight">8</p>
                        <p class="text-danger text-sm font-medium leading-normal">-1 from yesterday</p>
                    </div>
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark">
                        <p class="text-base font-medium leading-normal text-text-secondary-light dark:text-text-secondary-dark">Available Technicians</p>
                        <p class="tracking-light text-3xl font-bold leading-tight">4</p>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal">of 6 total</p>
                    </div>
                </div>
                <!-- Charts and Lists -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Revenue Chart -->
                    <div class="lg:col-span-2 flex flex-col gap-2 rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg font-bold leading-normal">Revenue Overview</p>
                                <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">Last 30 Days</p>
                            </div>
                            <div class="flex gap-1 bg-background-light dark:bg-background-dark p-1 rounded-lg">
                                <button class="px-3 py-1 text-xs font-bold rounded-md bg-card-light dark:bg-card-dark shadow-sm">30D</button>
                                <button class="px-3 py-1 text-xs font-bold rounded-md text-text-secondary-light dark:text-text-secondary-dark">7D</button>
                                <button class="px-3 py-1 text-xs font-bold rounded-md text-text-secondary-light dark:text-text-secondary-dark">24H</button>
                            </div>
                        </div>
                        <div class="flex min-h-[250px] flex-1 flex-col justify-end py-4">
                            <svg fill="none" height="100%" preserveaspectratio="none" viewbox="0 0 546 150" width="100%" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 109C20.8462 109 20.8462 21 41.6923 21C62.5385 21 62.5385 41 83.3846 41C104.231 41 104.231 93 125.077 93C145.923 93 145.923 33 166.769 33C187.615 33 187.615 101 208.462 101C229.308 101 229.308 61 250.154 61C271 61 271 45 291.846 45C312.692 45 312.692 121 333.538 121C354.385 121 354.385 149 375.231 149C396.077 149 396.077 1 416.923 1C437.769 1 437.769 81 458.615 81C479.462 81 479.462 129 500.308 129C521.154 129 521.154 25 542 25V149H0V109Z" fill="url(#paint0_linear_rev)"></path>
                                <path d="M0 109C20.8462 109 20.8462 21 41.6923 21C62.5385 21 62.5385 41 83.3846 41C104.231 41 104.231 93 125.077 93C145.923 93 145.923 33 166.769 33C187.615 33 187.615 101 208.462 101C229.308 101 229.308 61 250.154 61C271 61 271 45 291.846 45C312.692 45 312.692 121 333.538 121C354.385 121 354.385 149 375.231 149C396.077 149 396.077 1 416.923 1C437.769 1 437.769 81 458.615 81C479.462 81 479.462 129 500.308 129C521.154 129 521.154 25 542 25" stroke="#1173d4" stroke-linecap="round" stroke-width="3"></path>
                                <defs>
                                    <lineargradient gradientunits="userSpaceOnUse" id="paint0_linear_rev" x1="271" x2="271" y1="1" y2="149">
                                        <stop stop-color="#1173d4" stop-opacity="0.3"></stop>
                                        <stop offset="1" stop-color="#1173d4" stop-opacity="0"></stop>
                                    </lineargradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <!-- Upcoming Appointments -->
                    <div class="flex flex-col gap-4 rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                        <p class="text-lg font-bold leading-normal">Upcoming Appointments</p>
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-4">
                                <div class="flex flex-col items-center justify-center p-3 rounded-lg bg-primary/10 w-16 h-16">
                                    <p class="text-primary font-bold text-lg">10:00</p>
                                    <p class="text-primary/80 text-xs">AM</p>
                                </div>
                                <div>
                                    <p class="font-bold">Sarah Connor</p>
                                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">2022 Toyota Highlander - Oil Change</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex flex-col items-center justify-center p-3 rounded-lg bg-primary/10 w-16 h-16">
                                    <p class="text-primary font-bold text-lg">11:30</p>
                                    <p class="text-primary/80 text-xs">AM</p>
                                </div>
                                <div>
                                    <p class="font-bold">Kyle Reese</p>
                                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">2020 Ford F-150 - Brake Inspection</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex flex-col items-center justify-center p-3 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark w-16 h-16">
                                    <p class="font-bold text-lg">1:00</p>
                                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-xs">PM</p>
                                </div>
                                <div>
                                    <p class="font-bold">Ellen Ripley</p>
                                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">2018 Honda Civic - Tire Rotation</p>
                                </div>
                            </div>
                            <button class="w-full text-center py-2 text-sm font-bold text-primary hover:bg-primary/10 rounded-lg transition-colors">View Full Schedule</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>