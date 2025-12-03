<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Reset Password - TU Service</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: { colors: { "primary": "#005A9C", "background-light": "#F7FAFC", "background-dark": "#101922" } }
            }
        }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display">
    <div class="flex min-h-screen w-full flex-col items-center justify-center p-4">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center">
                <span class="material-symbols-outlined text-6xl text-primary">lock_reset</span>
                <h1 class="mt-4 text-3xl font-bold text-gray-900 dark:text-white">Reset Password</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Enter your email and define a new password.</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="p-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <form class="space-y-6" action="index.php?action=resetPassword" method="POST">
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                        <div class="mt-1 relative">
                            <span class="material-symbols-outlined absolute left-3 top-2.5 text-gray-400">email</span>
                            <input type="email" name="email" id="email" required 
                                   class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md bg-white dark:bg-gray-900 dark:text-white focus:ring-primary focus:border-primary sm:text-sm" 
                                   placeholder="you@example.com">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                        <div class="mt-1 relative">
                            <span class="material-symbols-outlined absolute left-3 top-2.5 text-gray-400">lock</span>
                            <input type="password" name="password" id="password" required 
                                   class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md bg-white dark:bg-gray-900 dark:text-white focus:ring-primary focus:border-primary sm:text-sm" 
                                   placeholder="New Password">
                        </div>
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                        <div class="mt-1 relative">
                            <span class="material-symbols-outlined absolute left-3 top-2.5 text-gray-400">lock_clock</span>
                            <input type="password" name="confirm_password" id="confirm_password" required 
                                   class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md bg-white dark:bg-gray-900 dark:text-white focus:ring-primary focus:border-primary sm:text-sm" 
                                   placeholder="Confirm Password">
                        </div>
                    </div>

                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Update Password
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <a href="index.php?action=login" class="text-sm font-medium text-primary hover:underline">
                        Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>