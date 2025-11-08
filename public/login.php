<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login - Car Service Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <style>
        .form-input:focus-within .input-icon,
        .form-input:focus .input-icon {
            color: #005a9c;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#005A9C", // Updated primary color
                        "background-light": "#F7FAFC",
                        "background-dark": "#101922",
                        "text-light": "#2D3748",
                        "text-dark": "#E2E8F0",
                        "border-light": "#E2E8F0",
                        "border-dark": "#4A5568",
                        "error": "#E53E3E"
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
    <div class="relative flex min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <main class="flex flex-1">
                <div class="flex flex-1 flex-col justify-center lg:flex-row">
                    <!-- Left Branding Column -->
                    <div class="relative hidden flex-1 items-center justify-center bg-gray-800 lg:flex">
                        <img alt="A mechanic working on a car engine in a well-lit workshop" class="absolute inset-0 h-full w-full object-cover opacity-30" data-alt="A mechanic working on a car engine in a well-lit workshop" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApj0SgDYIKYqvuGY8so6z9hhPI8nw5kpNoEvxoVTyswsyKfwLz0doTiU6tEN_Hm9b9vTOetEm0BlT1mawBTR3YW7Z_16Y5btVoA8N7VeFvnCm6rry4UaQTNVMM6iuglqeCKkxu5lCCYdZGS5Z19fT4c3QfgekddWSX0SS_CKS9aVVO0jTONDjcX4GidE8l1jwlqhsU0rYtKY-ffAyWYk3O9VVYuWChiQagT1ZfjVm2mor2v_Ho0FvXFmYpr4v2aqR9IwKWM13KB70" />
                        <a href="index.php" class="relative z-10 p-12 text-center text-white">
                            <span aria-hidden="true" class="material-symbols-outlined mb-4 text-7xl text-primary">directions_car</span>
                            <h1 class="font-display text-4xl font-bold tracking-tight">AutoManager Pro</h1>
                            <p class="mt-4 max-w-md text-lg text-gray-300">Streamline your garage operations. Efficient, powerful, and reliable service management at your fingertips.</p>
                        </a>
                    </div>
                    <!-- Right Login Form Column -->
                    <div class="flex w-full flex-1 items-center justify-center bg-background-light py-12 px-4 dark:bg-background-dark sm:px-6 lg:w-auto lg:max-w-2xl lg:flex-none">
                        <div class="w-full max-w-md space-y-8">
                            <!-- Logo for mobile/smaller screens -->
                            <div class="flex justify-center lg:hidden">
                                <span aria-hidden="true" class="material-symbols-outlined text-6xl text-primary">directions_car</span>
                            </div>
                            <!-- Headline -->
                            <div class="text-center">
                                <h1 class="text-text-light dark:text-text-dark font-display text-3xl font-bold tracking-tight">Welcome Back</h1>
                                <p class="mt-2 text-base text-gray-600 dark:text-gray-400">Sign in to manage your services</p>
                            </div>
                            <!-- Form Container -->
                            <div class="flex flex-col gap-y-6">
                                <!-- Username or Email Field -->
                                <div class="flex flex-col">
                                    <label class="text-text-light dark:text-text-dark pb-2 text-sm font-medium" for="email-address">Username or Email</label>
                                    <div class="relative">
                                        <span aria-hidden="true" class="material-symbols-outlined pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 input-icon">person</span>
                                        <input autocomplete="email" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg border border-border-light bg-white py-3 pl-12 pr-4 text-base font-normal text-text-light placeholder:text-gray-500 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-border-dark dark:bg-background-dark dark:text-text-dark" id="email-address" name="email" placeholder="Enter your username or email" required="" type="email" />
                                    </div>
                                </div>
                                <!-- Password Field -->
                                <div class="flex flex-col">
                                    <label class="text-text-light dark:text-text-dark pb-2 text-sm font-medium" for="password">Password</label>
                                    <div class="relative">
                                        <span aria-hidden="true" class="material-symbols-outlined pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 input-icon">lock</span>
                                        <input autocomplete="current-password" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg border border-border-light bg-white py-3 pl-12 pr-4 text-base font-normal text-text-light placeholder:text-gray-500 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-border-dark dark:bg-background-dark dark:text-text-dark" id="password" name="password" placeholder="Enter your password" required="" type="password" />
                                    </div>
                                </div>
                                <!-- Remember Me & Forgot Password -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-background-dark" id="remember-me" name="remember-me" type="checkbox" />
                                        <label class="ml-2 block text-sm text-gray-900 dark:text-gray-300" for="remember-me">Remember me</label>
                                    </div>
                                    <div class="text-sm">
                                        <a class="font-medium text-primary hover:text-primary/80" href="#">Forgot Password?</a>
                                    </div>
                                </div>
                                <!-- Login Button -->
                                <div>
                                    <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-primary px-5 py-3 text-base font-bold leading-normal text-white transition hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-background-dark" type="submit">
                                        <span class="truncate">Sign In</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Footer -->
                            <div class="text-center">
                                <p class="text-sm text-gray-500 dark:text-gray-400">© 2024 AutoManager Pro. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>