<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div id="customerInfo">
        <div class="flex">
            <div class=" bg-green-300 text-black p-4">
                <div class="bg-green-300 text-black h-screen w-64 flex flex-col">
                    <div class="p-4">
                        <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
                        <h2 class="text-2xl font-semibold">FloraFusion Market</h2>
                    </div>
                    <ul class="flex flex-col space-y-2 p-4">
                        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                            <a href="../Admin/index.php" class="flex items-center space-x-2">
                                <i class="fas fa-chart-pie"></i> <!-- Font Awesome icon for Dashboard -->
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                            <a href="cus_profile.php" class="flex items-center space-x-2">
                                <i class="fas fa-users"></i> <!-- Font Awesome icon for User Profiles -->
                                <span>Customer Profiles</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                            <a href="seller_profile.php" class="flex items-center space-x-2">
                                <i class="fas fa-store"></i> <!-- Font Awesome icon for Seller Profiles -->
                                <span>Seller Profiles</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                            <a href="inventory.php" class="flex items-center space-x-2">
                                <i class="fas fa-box-open"></i> <!-- Font Awesome icon for Inventory -->
                                <span>Inventory</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                            <a href="../includes/logout.php" class="flex items-center space-x-2">
                                <i class="fas fa-sign-out-alt text-red-500"></i> <!-- Font Awesome icon for Log out -->
                                <span>Log out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-28 relative">
                <!-- Profile Icon in the top right corner -->
                <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i>

                <!-- Right Side Content -->
                <div class="flex items-center">
                    <p class="text-xl font-semibold">Customers</p>
                </div>

                <!-- Sellers Table -->
                <div class="mt-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contact Number
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Address
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Add your table rows for sellers here -->
                            <tr v-for="cus in customer">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ cus.id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img :src="'../assets/img/'+cus.image" alt="Seller Image" class="h-8 w-8">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{cus.name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ cus.contact_no }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ cus.permanent_add }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="bg-red-500 text-white p-2 rounded hover:bg-red-600">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows for other sellers as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/customerInfo.js"></script>
</body>

</html>