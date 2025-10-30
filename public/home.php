<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>AutoManager Pro - Car Service Management System</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0A2540",
                        "secondary": "#FFC107",
                        "background-light": "#F6F9FC",
                        "background-dark": "#101922",
                        "text-light": "#333333",
                        "text-dark": "#E0E0E0"
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
    <div class="relative flex min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <!-- TopNavBar -->
            <header class="sticky top-0 z-50 flex items-center justify-center whitespace-nowrap border-b border-solid border-gray-200/50 dark:border-gray-700/50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm">
                <div class="flex items-center justify-between w-full max-w-6xl px-4 sm:px-6 lg:px-8 py-3">
                    <div class="flex items-center gap-4 text-primary dark:text-white">
                        <div class="size-8 text-primary dark:text-secondary">
                            <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_6_543)">
                                    <path d="M42.1739 20.1739L27.8261 5.82609C29.1366 7.13663 28.3989 10.1876 26.2002 13.7654C24.8538 15.9564 22.9595 18.3449 20.6522 20.6522C18.3449 22.9595 15.9564 24.8538 13.7654 26.2002C10.1876 28.3989 7.13663 29.1366 5.82609 27.8261L20.1739 42.1739C21.4845 43.4845 24.5355 42.7467 28.1133 40.548C30.3042 39.2016 32.6927 37.3073 35 35C37.3073 32.6927 39.2016 30.3042 40.548 28.1133C42.7467 24.5355 43.4845 21.4845 42.1739 20.1739Z" fill="currentColor"></path>
                                    <path clip-rule="evenodd" d="M7.24189 26.4066C7.31369 26.4411 7.64204 26.5637 8.52504 26.3738C9.59462 26.1438 11.0343 25.5311 12.7183 24.4963C14.7583 23.2426 17.0256 21.4503 19.238 19.238C21.4503 17.0256 23.2426 14.7583 24.4963 12.7183C25.5311 11.0343 26.1438 9.59463 26.3738 8.52504C26.5637 7.64204 26.4411 7.31369 26.4066 7.24189C26.345 7.21246 26.143 7.14535 25.6664 7.1918C24.9745 7.25925 23.9954 7.5498 22.7699 8.14278C20.3369 9.32007 17.3369 11.4915 14.4142 14.4142C11.4915 17.3369 9.32007 20.3369 8.14278 22.7699C7.5498 23.9954 7.25925 24.9745 7.1918 25.6664C7.14534 26.143 7.21246 26.345 7.24189 26.4066ZM29.9001 10.7285C29.4519 12.0322 28.7617 13.4172 27.9042 14.8126C26.465 17.1544 24.4686 19.6641 22.0664 22.0664C19.6641 24.4686 17.1544 26.465 14.8126 27.9042C13.4172 28.7617 12.0322 29.4519 10.7285 29.9001L21.5754 40.747C21.6001 40.7606 21.8995 40.931 22.8729 40.7217C23.9424 40.4916 25.3821 39.879 27.0661 38.8441C29.1062 37.5904 31.3734 35.7982 33.5858 33.5858C35.7982 31.3734 37.5904 29.1062 38.8441 27.0661C39.879 25.3821 40.4916 23.9425 40.7216 22.8729C40.931 21.8995 40.7606 21.6001 40.747 21.5754L29.9001 10.7285ZM29.2403 4.41187L43.5881 18.7597C44.9757 20.1473 44.9743 22.1235 44.6322 23.7139C44.2714 25.3919 43.4158 27.2666 42.252 29.1604C40.8128 31.5022 38.8165 34.012 36.4142 36.4142C34.012 38.8165 31.5022 40.8128 29.1604 42.252C27.2666 43.4158 25.3919 44.2714 23.7139 44.6322C22.1235 44.9743 20.1473 44.9757 18.7597 43.5881L4.41187 29.2403C3.29027 28.1187 3.08209 26.5973 3.21067 25.2783C3.34099 23.9415 3.8369 22.4852 4.54214 21.0277C5.96129 18.0948 8.43335 14.7382 11.5858 11.5858C14.7382 8.43335 18.0948 5.9613 21.0277 4.54214C22.4852 3.8369 23.9415 3.34099 25.2783 3.21067C26.5973 3.08209 28.1187 3.29028 29.2403 4.41187Z" fill="currentColor" fill-rule="evenodd"></path>
                                </g>
                                <defs>
                                    <clippath id="clip0_6_543">
                                        <rect fill="white" height="48" width="48"></rect>
                                    </clippath>
                                </defs>
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">AutoManager Pro</h2>
                    </div>
                    <div class="flex flex-1 justify-end items-center gap-8">
                        <div class="hidden md:flex items-center gap-9">
                            <a class="text-sm font-medium leading-normal hover:text-primary dark:hover:text-secondary" href="#">Features</a>
                            <a class="text-sm font-medium leading-normal hover:text-primary dark:hover:text-secondary" href="#">Contact</a>
                        </div>
                        <div class="flex gap-2">
                            <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-transparent border border-primary text-primary dark:border-white dark:text-white dark:hover:bg-white/10 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/10 transition-colors" href="login.php">
                                <span class="truncate">Log In</span>
                            </a>
                            <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white dark:bg-secondary dark:text-primary text-sm font-bold leading-normal tracking-[0.015em] hover:opacity-90 transition-opacity" href="register.php">
                                <span class="truncate">Sign Up</span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex flex-col items-center">
                <!-- HeroSection -->
                <section class="w-full flex justify-center py-10 md:py-20">
                    <div class="w-full max-w-6xl px-4 sm:px-6 lg:px-8">
                        <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat rounded-xl items-start justify-end px-4 pb-10 md:px-10" data-alt="A modern, clean, and well-lit auto workshop with a car on a hydraulic lift." style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.6) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBsgwOkxEhBfvdQgvaQKHYk-Vb6-5Nq0PftgmflTz4AYxP6PvxoJ51kR9n7rA_K_MkyQFgBOcvbK2evgMM7Du8eKLkD2X684SukgGkqfd2q5jPg6aS8dVGmGMoKe5g_3Qiv-11n05OqU2DIEgCqBrDnkTxoajOUx1KRzgufDI9vWnIy1SjJVEWrEyMWwO6jMuhblk_Q1O7amKZv6ZuUU5qMz_cH8Tu7TjKVTOA2fPDyI45GX6QWvudUufDY_Io1k51TipNCl6YkFbo");'>
                            <div class="flex flex-col gap-2 text-left max-w-2xl">
                                <h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] md:text-5xl">The All-in-One Platform for Your Auto Service Center</h1>
                                <h2 class="text-white text-base font-normal leading-normal md:text-lg">Manage bookings, communicate with clients, and optimize your workshop's efficiency.</h2>
                            </div>
                            <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-white dark:bg-secondary dark:text-primary text-base font-bold leading-normal tracking-[0.015em] hover:opacity-90 transition-opacity">
                                <span class="truncate">Get Started Free</span>
                            </button>
                        </div>
                    </div>
                </section>
                <!-- Features Section -->
                <section class="w-full flex flex-col items-center py-16 md:py-24">
                    <div class="w-full max-w-6xl px-4 sm:px-6 lg:px-8">
                        <h2 class="text-primary dark:text-white text-3xl font-bold leading-tight tracking-[-0.015em] text-center mb-12">Everything you need to run your workshop smoothly</h2>
                        <!-- TextGrid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50 p-6 flex-col items-start text-left">
                                <div class="p-3 rounded-lg bg-primary/10 dark:bg-secondary/20 text-primary dark:text-secondary">
                                    <span class="material-symbols-outlined text-3xl">build_circle</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h3 class="text-text-light dark:text-white text-lg font-bold leading-tight">Streamline Operations</h3>
                                    <p class="text-gray-600 dark:text-text-dark text-sm font-normal leading-normal">For Employees: Easily manage jobs, assign tasks to technicians, and track parts inventory in real-time.</p>
                                </div>
                            </div>
                            <div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50 p-6 flex-col items-start text-left">
                                <div class="p-3 rounded-lg bg-primary/10 dark:bg-secondary/20 text-primary dark:text-secondary">
                                    <span class="material-symbols-outlined text-3xl">monitoring</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h3 class="text-text-light dark:text-white text-lg font-bold leading-tight">Powerful Business Insights</h3>
                                    <p class="text-gray-600 dark:text-text-dark text-sm font-normal leading-normal">For Managers: Access detailed reporting and analytics to understand your performance and drive growth.</p>
                                </div>
                            </div>
                            <div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50 p-6 flex-col items-start text-left">
                                <div class="p-3 rounded-lg bg-primary/10 dark:bg-secondary/20 text-primary dark:text-secondary">
                                    <span class="material-symbols-outlined text-3xl">verified_user</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h3 class="text-text-light dark:text-white text-lg font-bold leading-tight">Enhance Client Trust</h3>
                                    <p class="text-gray-600 dark:text-text-dark text-sm font-normal leading-normal">For Clients: Provide transparent service history, clear communication, and simple online appointment booking.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Testimonial Section -->
                <section class="w-full flex justify-center py-16 md:py-24 bg-white dark:bg-background-dark/50">
                    <div class="w-full max-w-3xl px-4 sm:px-6 lg:px-8 text-center">
                        <p class="text-primary dark:text-white text-2xl font-medium leading-relaxed italic">"This system cut our admin time in half! The efficiency gains are incredible."</p>
                        <p class="mt-4 text-text-light dark:text-text-dark text-base font-bold">John Doe</p>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Manager, Precision Auto Works</p>
                    </div>
                </section>
            </main>
            <!-- Footer -->
            <footer class="w-full flex justify-center py-8 border-t border-gray-200 dark:border-gray-800">
                <div class="w-full max-w-6xl px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">© 2024 AutoManager Pro. All rights reserved.</p>
                    <div class="flex gap-4">
                        <a class="text-sm text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-secondary" href="#">Privacy Policy</a>
                        <a class="text-sm text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-secondary" href="#">Terms of Service</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>