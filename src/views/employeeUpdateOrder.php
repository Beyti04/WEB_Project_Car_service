<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Employee Dashboard - TU Service</title>
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

<body class="font-display bg-background-light dark:bg-background-dark text-[#333333] dark:text-gray-200">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col w-64 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark p-4 shrink-0">
            <a href="index.php?action=employeeDashboard" class="flex items-center gap-3 mb-8">
                <div class="bg-primary/20 rounded-lg p-2 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">AutoManager</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Employee Portal</p>
                </div>
            </a>
            <nav class="flex flex-col gap-2 flex-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=userDashboard">
                    <span class="material-symbols-outlined">dashboard</span>
                    <p class="text-sm font-bold leading-normal">Dashboard</p>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="index.php?action=employeeAppointments">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p class="text-sm font-medium leading-normal">Appointments</p>
                </a>

            </nav>
            <div class="flex flex-col gap-4 mt-4">
                <a href="index.php?action=logout" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined">logout</span>
                    <p class="text-sm font-medium leading-normal">Logout</p>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-end whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark px-10 py-3 bg-card-light dark:bg-card-dark">
                <div class="flex flex-1 justify-end gap-4 items-center">
                    <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Employee avatar image" style='background-image: url("https://via.placeholder.com/40");'></div>
                        <div class="flex flex-col text-sm">
                            <p class="font-bold">
                                <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>
                            </p>
                            <p class="text-text-secondary-light dark:text-text-secondary-dark">Employee</p>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-10">
                <div class="flex justify-center">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-full max-w-6xl">
                        <form class="lg:col-span-2 flex flex-col gap-6">
                            <!-- Active Service Requests -->
                            <?php

                            use App\Models\Order;
                            use App\Models\Status;

                            $currentOrder = Order::getCurrentOrder($_GET['order_id']);
                            ?>
                            <div class="rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                                <div class="flex items-center gap-4 py-4">
                                    <span class="material-symbols-outlined text-base">receipt_long</span>
                                    <h2>Order #<?php echo $currentOrder['order_id'] ?></h2>
                                </div>
                                <div class="flex-2 items-center w-full">
                                    <div class="flex flex-col gap-6 items-start">
                                        <div class="flex-1">
                                            <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">Client</p>
                                            <p class="font-bold text-xl mb-3"><?php echo $currentOrder['client_name']
                                                                                ?></p>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm">
                                                <?php echo $currentOrder['year'] . ' ' . $currentOrder['brand_name'] . ' ' . $currentOrder['model_name']
                                                ?>
                                            </p>
                                            <p class="font-bold text-xl mb-3"><?php echo $currentOrder['service'] ?></p>
                                        </div>
                                    </div>

                                    <div class="flex-1 py-4 w-full">
                                        <div class="flex items-center justify-between mb-1">
                                            <?php
                                            $statuses = Status::getAllStatuses();
                                            array_shift($statuses);
                                            // Determine progress width and color based on current order status
                                            if ($currentOrder['status'] == 'В изчакване') {
                                                $progressWidth = 0;
                                            } elseif ($currentOrder['status'] == 'Приета') {
                                                $progressWidth = 20;
                                            } elseif ($currentOrder['status'] == 'Диагностика') {
                                                $progressWidth = 40;
                                            } elseif ($currentOrder['status'] == 'Ремонт') {
                                                $progressWidth = 60;
                                            } elseif ($currentOrder['status'] == 'Тестване') {
                                                $progressWidth = 80;
                                            }
                                            ?>

                                            <select name="status" class="w-48 border border-border-light dark:border-border-dark rounded-lg p-1 text-sm font-bold text-primary focus:outline-none">
                                                <?php foreach ($statuses as $status): ?>
                                                    <option value="<?= $status->id ?>" <?= ($currentOrder['status'] == $status->status) ? 'selected' : '' ?>>
                                                        <?= $status->status ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>


                                        </div>
                                        <div class="w-full bg-background-light dark:bg-background-dark rounded-full h-2.5">
                                            <div class="bg-primary h-2.5 rounded-full" style="width: <?php echo $progressWidth ?>%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Service History -->
                            <?php

                            use App\Models\Material;
                            use App\Models\MaterialGroup;

                            $materials = Material::getAllMaterials();
                            $materialGroups = MaterialGroup::getAllMaterialGroups();
                            ?>
                            <div class="rounded-xl border border-border-light dark:border-border-dark p-6 bg-card-light dark:bg-card-dark">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-lg font-bold leading-normal">Materials</h2>
                                </div>

                                <!-- Dropdown to select group -->
                                <div class="mb-4">
                                    <select id="materialGroupSelect" class="w-full p-2 border border-border-light dark:border-border-dark rounded-lg text-text-light dark:text-text-dark">
                                        <option value="" selected disabled>Select Material Group</option>
                                        <?php foreach ($materialGroups as $group) : ?>
                                            <option value="group-<?php echo $group->id ?>"><?php echo $group->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Scrollable container -->
                                <div class="flex flex-col gap-4 max-h-80 overflow-y-auto" id="materialsContainer">
                                    <?php
                                    foreach ($materialGroups as $group) :
                                    ?>
                                        <p class="text-sm font-semibold text-text-secondary-light dark:text-text-secondary-dark" id="group-<?php echo $group->id ?>">
                                            <?php echo $group->name ?>
                                        </p>
                                        <?php foreach ($materials as $material) : ?>
                                            <?php if ($material->group_id == $group->id) : ?>
                                                <div class="flex flex-col gap-2">
                                                    <label class="flex items-center gap-3 p-3 border border-border-light dark:border-border-dark rounded-lg cursor-pointer hover:bg-primary/10">
                                                        <input type="checkbox" name="materials[]" value="<?php echo $material->id ?>" class="form-checkbox text-primary h-4 w-4" />
                                                        <span class="text-text-light dark:text-text-dark"><?php echo $material->name ?></span>
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="flex justify-end mt-6">
                                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary/90 transition-colors font-bold">
                                    Update Order
                                </button>
                            </div>

                            <script>
                                const select = document.getElementById('materialGroupSelect');
                                const container = document.getElementById('materialsContainer');

                                select.addEventListener('change', function() {
                                    const groupId = this.value;
                                    if (!groupId) return;
                                    const target = document.getElementById(groupId);
                                    if (target) {
                                        // Scroll the container to the target group
                                        container.scrollTop = target.offsetTop - container.offsetTop;
                                    }
                                });
                            </script>


                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>