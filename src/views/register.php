<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Create an Account - Car Service Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#005A9C",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                        "validation-error": "#D93025"
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

<body class="bg-background-light dark:bg-background-dark font-display">
    <div class="relative flex min-h-screen w-full flex-col items-center justify-center p-4">
        <div class="w-full max-w-md space-y-8">
            <!-- Header Section -->
            <div class="text-center">
                <a href="index.php" class="flex justify-center items-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-primary text-4xl">directions_car</span>
                    <h1 class="text-2xl font-bold text-[#111418] dark:text-white">AutoManager Pro</h1>
                </a>
                <div class="flex flex-col gap-3">
                    <p class="text-[#111418] dark:text-gray-200 text-4xl font-black leading-tight tracking-[-0.033em]">Create an Account</p>
                    <p class="text-[#617589] dark:text-gray-400 text-base font-normal leading-normal">Manage your car service operations seamlessly.</p>
                </div>
            </div>
            <!-- Form Container -->
            <div class="bg-white dark:bg-background-dark dark:border dark:border-gray-700/50 p-8 rounded-xl shadow-sm space-y-6">
                <form class="space-y-6" action="../../public/index.php?action=registerSubmit" method="POST">
                    <div class="flex flex-col sm:flex-row sm:gap-4 space-y-6 sm:space-y-0">
                        <!-- First Name -->
                        <label class="flex flex-col min-w-40 flex-1">
                            <p class="text-[#111418] dark:text-gray-300 text-base font-medium leading-normal pb-2">First Name</p>
                            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white dark:bg-gray-800 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#dbe0e6] dark:border-gray-700 bg-white focus:border-primary h-14 placeholder:text-[#617589] dark:placeholder:text-gray-500 p-[15px] text-base font-normal leading-normal" placeholder="Enter your first name" name="first_name" value="" />
                        </label>
                        <!-- Last Name -->
                        <label class="flex flex-col min-w-40 flex-1">
                            <p class="text-[#111418] dark:text-gray-300 text-base font-medium leading-normal pb-2">Last Name</p>
                            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white dark:bg-gray-800 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#dbe0e6] dark:border-gray-700 bg-white focus:border-primary h-14 placeholder:text-[#617589] dark:placeholder:text-gray-500 p-[15px] text-base font-normal leading-normal" placeholder="Enter your last name" name="last_name" value="" />
                        </label>
                    </div>
                    <!-- Phone -->
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#111418] dark:text-gray-300 text-base font-medium leading-normal pb-2">Phone</p>
                        <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white dark:bg-gray-800 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#dbe0e6] dark:border-gray-700 bg-white focus:border-primary h-14 placeholder:text-[#617589] dark:placeholder:text-gray-500 p-[15px] text-base font-normal leading-normal" placeholder="Enter your phone number" name="phone" value="" />
                    </label>
                    <!-- Email -->
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#111418] dark:text-gray-300 text-base font-medium leading-normal pb-2">Email</p>
                        <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white dark:bg-gray-800 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-validation-error bg-white focus:border-primary h-14 placeholder:text-[#617589] dark:placeholder:text-gray-500 p-[15px] text-base font-normal leading-normal" placeholder="Enter your email" name="email" value="" />
                        <p class="text-validation-error text-sm mt-1">Email is invalid</p>
                    </label>
                    <!-- Password -->
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#111418] dark:text-gray-300 text-base font-medium leading-normal pb-2">Password</p>
                        <div class="relative flex w-full flex-1 items-center">
                            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white dark:bg-gray-800 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#dbe0e6] dark:border-gray-700 bg-white focus:border-primary h-14 placeholder:text-[#617589] dark:placeholder:text-gray-500 p-[15px] pr-12 text-base font-normal leading-normal" placeholder="Create a strong password" name="password" type="password" value="" />
                            <button class="absolute right-0 mr-4 text-[#617589] dark:text-gray-400" type="button">
                                <span class="material-symbols-outlined">visibility_off</span>
                            </button>
                        </div>
                        <div class="flex items-center gap-2 mt-2 text-xs text-gray-500">
                            <span class="material-symbols-outlined text-sm">info</span>
                            <span>8+ characters, one number, one uppercase letter.</span>
                        </div>
                    </label>
                    <!-- Confirm Password -->
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#111418] dark:text-gray-300 text-base font-medium leading-normal pb-2">Confirm Password</p>
                        <div class="relative flex w-full flex-1 items-center">
                            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white dark:bg-gray-800 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-validation-error bg-white focus:border-primary h-14 placeholder:text-[#617589] dark:placeholder:text-gray-500 p-[15px] pr-12 text-base font-normal leading-normal" placeholder="Confirm your password" name="confirm_password" type="password" value="" />
                            <button class="absolute right-0 mr-4 text-[#617589] dark:text-gray-400" type="button">
                                <span class="material-symbols-outlined">visibility_off</span>
                            </button>
                        </div>
                        <p class="text-validation-error text-sm mt-1">Passwords do not match</p>
                    </label>
                    <!-- Register Button -->
                    <button class="flex w-full items-center justify-center rounded-lg bg-primary h-14 px-6 text-base font-semibold text-white shadow-sm hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" type="submit">
                        Register
                    </button>
                </form>
            </div>
            <!-- Login Link -->
            <p class="text-center text-sm text-[#617589] dark:text-gray-400">
                Already have an account?
                <a class="font-medium text-primary hover:underline" href="../views/login.php">Log in</a>
            </p>
        </div>
    </div>
</body>

</html>