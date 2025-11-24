<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Vehicle - Car Service Management</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
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
                        "destructive": "#D93025"
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    }
                },
            },
        }
    </script>
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-[#333333] dark:text-gray-200">
    <?php

    use App\Models\Car;
    use App\Models\CarBrand;
    use App\Models\CarModel;
    // Fetch vehicle info
    $carId = $_GET['car_id'] ?? null;
    $car = Car::getCarById($carId);

    if (!$car) {
        echo "<p class='text-red-500 p-10'>Vehicle not found.</p>";
        exit;
    }

    $carModel = CarModel::getModelById($car->model_id);
    $brand    = CarBrand::getBrandById($carModel->brand_id);
    ?>
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
            <a href="index.php?action=userDashboard" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Client Portal</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userDashboard">
                    <span class="material-symbols-outlined ">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="index.php?action=myVehicles">
                    <span class="material-symbols-outlined text-primary">directions_car</span>
                    <p class="text-sm font-medium leading-normal">My Vehicles</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userAppointmentManager">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">My Appointments</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userDashboard#service_history">
                    <span class="material-symbols-outlined">history</span>
                    <p class="text-sm font-medium leading-normal">Service History</p>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <p class="text-sm font-medium leading-normal">Billing</p>
                </a>
            </nav>
            <div class="flex flex-col gap-4">
                <a href="requestService.php">
                    <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                        <span class="truncate">Request New Service</span>
                    </button>
                </a>
                <div class="flex flex-col gap-1">
                    <a href="index.php?action=logout" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Logout</p>
                    </a>
                </div>
            </div>
        </aside>
        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-end whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark px-10 py-3 bg-card-light dark:bg-card-dark">
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar image" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuADijiRLLPR2eRQXqbVqSmI5KeUFyXAg8F2zmY2mwfb1Pgm6eF-NmHWlSRm0xVvnz3wcPCkB7pflS81XhFJqdUyEEk4srBqEw81WqNgyxpAXWyBF4WXayX_79fjNwvjFvRP2mygTB8JtFtvmgwCmXAkWO1vUyZ6xTjfEnPmwsZD1QhwGVWu-iSAwpmnxmU_NGK7U5sH-U54t-zfth88S-uqzwxhC_4dJgAlM1nGXJJ3Wb2EztyredxX5Mc4g-N4vxPoQmZFTCyPxOs");'></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold"> <?php

                                                    echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Client</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">

                <main class="p-10">
                    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow border dark:border-gray-700">
                        <h1 class="text-3xl font-bold mb-6">Edit Vehicle</h1>

                        <!-- Edit Vehicle Form -->
                        <form action="index.php?action=updateVehicle&car_id=<?php echo htmlspecialchars($car->id); ?>" method="POST" class="space-y-4">

                            <!-- Brand -->
                            <div>
                                <label class="text-sm font-medium mb-1">Make</label>
                                <select id="brands" name="brand"
                                    class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                    onchange="loadModels(this.value)" required>
                                    <?php
                                    $brands = CarBrand::getAllBrands();
                                    foreach ($brands as $b) {
                                        $selected = $b['id'] == $brand->id ? "selected" : "";
                                        echo "<option value='{$b['id']}' $selected>" . htmlspecialchars($b['brand_name']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Model -->
                            <div>
                                <label class="text-sm font-medium mb-1">Model</label>
                                <select id="model" name="model"
                                    class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600" required>
                                    <option selected value="<?php echo htmlspecialchars($carModel->id); ?>">
                                        <?php echo htmlspecialchars($carModel->model_name); ?>
                                    </option>
                                </select>
                            </div>

                            <!-- Year -->
                            <div>
                                <label class="text-sm font-medium mb-1">Year</label>
                                <select name="year"
                                    class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
                                    <?php
                                    for ($i = 1960; $i <= date("Y"); $i++) {
                                        $selected = ($car->year == $i) ? "selected" : "";
                                        echo "<option $selected>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- VIN -->
                            <div>
                                <label class="text-sm font-medium mb-1">VIN</label>
                                <input type="text" name="vin"
                                    class="w-full rounded-md bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                    value="<?php echo htmlspecialchars($car->vin); ?>" />
                            </div>

                            <!-- Actions -->
                            <div class="flex justify-end gap-3 pt-4 border-t dark:border-gray-700">
                                <a href="index.php?action=myVehicles"
                                    class="px-4 h-10 flex items-center rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200">
                                    Cancel
                                </a>

                                <button type="submit"
                                    class="px-4 h-10 rounded-lg bg-primary text-white font-bold hover:bg-primary/90">
                                    Save Changes
                                </button>
                            </div>
                        </form>

                    </div>
                </main>
            </div>
        </div>

        <script>
            function loadModels(brandId) {
                const modelSelect = document.getElementById('model');

                modelSelect.innerHTML = '<option disabled selected>Loading...</option>';
                modelSelect.disabled = true;

                fetch('index.php?action=getModels&brand_id=' + brandId)
                    .then(res => res.json())
                    .then(data => {
                        modelSelect.innerHTML = '';
                        modelSelect.disabled = false;

                        data.forEach(model => {
                            const option = document.createElement('option');
                            option.value = model.id;
                            option.textContent = model.model_name;

                            // Select current model when brand changes
                            if (model.id == <?php echo json_encode($carModel->id); ?>) {
                                option.selected = true;
                            }

                            modelSelect.appendChild(option);
                        });
                    });
            }
        </script>

</body>

</html>