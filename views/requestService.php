<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Request New Service - AutoManager</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#1173d4",
                        "background-light": "#f6f7f8",
                        "text-light": "#333333",
                        "text-secondary-light": "#808080",
                        "border-light": "#dbe0e6",
                        "card-light": "#FFFFFF"
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem"
                    }
                }
            }
        };
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="font-display bg-background-light text-text-light">
    <div class="flex h-screen">
        <aside class="flex flex-col w-64 bg-card-light border-r border-border-light p-4 shrink-0">
            <a href="userDashboard.php" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light text-sm font-normal leading-normal">Client Portal</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="userDashboard.php">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="userVehicleManager.php">
                    <span class="material-symbols-outlined">directions_car</span>
                    <p class="text-sm font-medium leading-normal">My Vehicles</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">My Appointments</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="userDashboard.php#service_history">
                    <span class="material-symbols-outlined">history</span>
                    <p class="text-sm font-medium leading-normal">Service History</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Billing</p>
                </a>
            </nav>
            <div class="flex flex-col gap-4 mt-4">
                <a href="requestService.php">
                    <button class="flex w-full items-center justify-center h-10 px-4 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors">
                        Request New Service
                    </button>
                </a>
                <a href="index.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined">logout</span>
                    <p class="text-sm font-medium leading-normal">Logout</p>
                </a>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-y-auto">
            <header class="flex items-center justify-end border-b border-border-light px-10 py-3 bg-card-light">
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex items-center justify-center h-10 w-10 bg-background-light text-text-light rounded-lg hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full w-10 h-10" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuADijiRLLPR2eRQXqbVqSmI5KeUFyXAg8F2zmY2mwfb1Pgm6eF-NmHWlSRm0xVvnz3wcPCkB7pflS81XhFJqdUyEEk4srBqEw81WqNgyxpAXWyBF4WXayX_79fjNwvjFvRP2mygTB8JtFtvmgwCmXAkWO1vUyZ6xTjfEnPmwsZD1QhwGVWu-iSAwpmnxmU_NGK7U5sH-U54t-zfth88S-uqzwxhC_4dJgAlM1nGXJJ3Wb2EztyredxX5Mc4g-N4vxPoQmZFTCyPxOs");'></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold">Sarah Connor</p>
                            <p class="text-text-secondary-light text-sm">Client</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-8 flex-1">
                <div class="max-w-4xl mx-auto">
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-text-light">Request New Service</h1>
                        <p class="text-text-secondary-light mt-1">Fill out the form below to book a new appointment for your vehicle.</p>
                    </div>

                    <div class="bg-card-light p-8 rounded-lg shadow-sm border border-border-light">
                        <form action="#" method="POST" class="space-y-8">
                            <!-- Vehicle selection -->
                            <div>
                                <label class="block text-sm font-medium text-text-light mb-2" for="vehicle">Select Vehicle</label>
                                <div class="relative">
                                    <select id="vehicle" name="vehicle" class="w-full pl-10 pr-4 py-2.5 rounded border border-border-light bg-card-light focus:ring-primary focus:border-primary">
                                        <option>2022 Toyota Highlander</option>
                                        <option>2020 Honda Civic</option>
                                        <option>2023 Ford F-150</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="material-symbols-outlined text-text-secondary-light">directions_car</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Service Type selection -->
                            <div>
                                <label class="block text-sm font-medium text-text-light mb-2" for="serviceType">Choose Service Type</label>
                                <div class="relative">
                                    <select id="serviceType" name="serviceType" class="w-full pl-4 pr-4 py-2.5 rounded border border-border-light bg-card-light focus:ring-primary focus:border-primary">
                                        <option value="" disabled selected>Select a service type</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="diagnostics">Diagnostics</option>
                                        <option value="climate-control">Climate Control</option>
                                        <option value="engine-repair">Engine Repair</option>
                                        <option value="transmission">Transmission</option>
                                        <option value="suspension">Suspension</option>
                                        <option value="brakes">Brakes</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Multiple Services selection -->
                            <div>
                                <label class="block text-sm font-medium text-text-light mb-2">Choose Services</label>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    <label class="flex items-center space-x-3 p-4 border border-border-light rounded-lg cursor-pointer hover:border-primary">
                                        <input type="checkbox" name="services[]" value="oil-change" class="form-checkbox text-primary focus:ring-primary" />
                                        <span class="text-sm font-medium">Oil Change</span>
                                    </label>
                                    <label class="flex items-center space-x-3 p-4 border border-border-light rounded-lg cursor-pointer hover:border-primary">
                                        <input type="checkbox" name="services[]" value="tire-rotation" class="form-checkbox text-primary focus:ring-primary" />
                                        <span class="text-sm font-medium">Tire Rotation</span>
                                    </label>
                                    <label class="flex items-center space-x-3 p-4 border border-border-light rounded-lg cursor-pointer hover:border-primary">
                                        <input type="checkbox" name="services[]" value="brake-inspection" class="form-checkbox text-primary focus:ring-primary" />
                                        <span class="text-sm font-medium">Brake Inspection</span>
                                    </label>
                                    <label class="flex items-center space-x-3 p-4 border border-border-light rounded-lg cursor-pointer hover:border-primary">
                                        <input type="checkbox" name="services[]" value="state-inspection" class="form-checkbox text-primary focus:ring-primary" />
                                        <span class="text-sm font-medium">State Inspection</span>
                                    </label>
                                    <label class="flex items-center space-x-3 p-4 border border-border-light rounded-lg cursor-pointer hover:border-primary">
                                        <input type="checkbox" name="services[]" value="battery-check" class="form-checkbox text-primary focus:ring-primary" />
                                        <span class="text-sm font-medium">Battery Check</span>
                                    </label>
                                    <label class="flex items-center space-x-3 p-4 border border-border-light rounded-lg cursor-pointer hover:border-primary">
                                        <input type="checkbox" name="services[]" value="other" class="form-checkbox text-primary focus:ring-primary" />
                                        <span class="text-sm font-medium">Other</span>
                                    </label>
                                </div>
                            </div>



                            <!-- Date & Time -->
                            <div>
                                <label class="block text-sm font-medium text-text-light mb-2">Preferred Date & Time</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="relative">
                                        <input type="date" id="date" name="date" class="w-full pl-10 pr-4 py-2.5 rounded border border-border-light bg-card-light focus:ring-primary focus:border-primary" />
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="material-symbols-outlined text-text-secondary-light">calendar_today</span>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <select id="time" name="time" class="w-full pl-10 pr-4 py-2.5 rounded border border-border-light bg-card-light focus:ring-primary focus:border-primary">
                                            <option>9:00 AM</option>
                                            <option>10:00 AM</option>
                                            <option>11:00 AM</option>
                                            <option>1:00 PM</option>
                                            <option>2:00 PM</option>
                                            <option>3:00 PM</option>
                                            <option>4:00 PM</option>
                                        </select>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="material-symbols-outlined text-text-secondary-light">schedule</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-text-secondary-light mt-2">We will confirm the final appointment time via email.</p>
                            </div>

                            <!-- Notes -->
                            <div>
                                <label class="block text-sm font-medium text-text-light mb-2" for="notes">Additional Notes (Optional)</label>
                                <textarea id="notes" name="notes" rows="4" placeholder="e.g. I hear a strange noise when turning right..." class="w-full rounded border border-border-light bg-card-light focus:ring-primary focus:border-primary"></textarea>
                            </div>

                            <div class="pt-4 border-t border-border-light flex justify-end">
                                <button type="submit" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                                    Submit Request
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </main>
    </div>
</body>

</html>