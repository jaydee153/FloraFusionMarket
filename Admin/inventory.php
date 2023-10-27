<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Inventory</title>
</head>
<body>
<div class="flex" id="adminInventory">
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


<div class="flex-1 p-28 relative">
    <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i>


     <div class="flex-1 bg-white p-4 shadow-md">
            <h2 class="text-xl font-semibold mb-4">All Products</h2>
            <div class="flex justify-between items-center mb-4">
                <div class="relative ml-auto">
                    <input type="search" v-model="search"
                        class="border border-gray-300 rounded-md px-3 py-2 pr-10 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="Search">
                </div>
            </div>

           
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                            Products</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="tbl">
                    <tr v-for="product in searchData">
                        <td class="px-6 py-4 whitespace-nowrap">{{ product.name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ product.price }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md ml-2"><a href="inventory_prod.php">Update</a></button>
                            <button @click="deleteProduct(product.product_ID)"
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Delete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
   
   


<!-- <script src="../assets/css/sweetalert.js"></script> -->
    <script src="../assets/css/bootstrap.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/adminInventory.js"></script>
</body>
</html>

