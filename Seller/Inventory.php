<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./index.php');
    $role = $_SESSION['role'];
    if ($role == 1) {
        header('location: /FloraFusion/Customer/index.php');
    } else if ($role == 2) {
        header('location: /FloraFusion/seller/index.php');
    } else {
        echo "You Need To logged in!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Inventory</title>
</head>

<body>
    <div class="flex" id="product">
    <div class="bg-green-300 text-black p-4">
        <div class="bg-green-300 text-black h-screen w-64 flex flex-col">
            <div class="p-4">
                <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
                <h2 class="text-2xl font-semibold">FloraFusion Market</h2>
            </div>
            <ul class="flex flex-col space-y-2 p-4">
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/index.php" class="flex items-center space-x-2">
                        <i class="fas fa-tachometer-alt h-5 w-5 fill-current"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/Inventory.php" class="flex items-center space-x-2">
                        <i class="fas fa-box h-5 w-5 fill-current"></i>
                        <span>Inventory</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/orders.php" class="flex items-center space-x-2">
                        <i class="fas fa-shopping-cart h-5 w-5 fill-current"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/sales_rep.php" class="flex items-center space-x-2">
                        <i class="fas fa-chart-bar h-5 w-5 fill-current"></i>
                        <span>Sales Report</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/sold_his.php" class="flex items-center space-x-2">
                        <i class="fas fa-history h-5 w-5 fill-current"></i>
                        <span>Sold History</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="../includes/logout.php" class="flex items-center space-x-2">
                        <i class="fas fa-sign-out-alt h-5 w-5 text-red-500"></i>
                        <span>Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

     

        <div class="flex-1 bg-white p-4 shadow-md">
        <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>"
                                    alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
        <!-- <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i> -->
            <h2 class="text-xl font-semibold mb-4 mt-20">Category</h2>
            <div class="flex justify-between items-center mb-4">
                <div class="relative ml-auto">
                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md mr-3"
                        data-bs-toggle="modal" data-bs-target="#addprod">+</button>
                    <input type="search" v-model="search"
                        class="border border-gray-300 rounded-md px-3 py-2 pr-10 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="Search">
                </div>
            </div>

            <!-- table -->
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
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md ml-2"><a href="inventoryprod.php">Update</a></button>
                            <button @click="deleteProduct(product.product_ID)"
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Delete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Modal for Add Category -->
        <div class="modal fade" id="addprod" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4">
                    <div class="modal-header">
                        <h5 class="modal-title text-2xl font-semibold mb-4" id="addprod">Add Category</h5>
                    </div>
                    <form @submit="addproducts" class="productform">
                        <!-- Category Name -->
                        <input type="text" placeholder="Category Name" class="mt-1 p-2 w-full border rounded"
                            name="name">
                        <!-- Add Button -->
                        <div class="d-flex flex-row-reverse">
                            <button
                                class="bg-green-500 mt-3 text-white rounded-md py-2 px-4 mx-2 my-2 hover:bg-green-600">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    <!-- Modal for Update Plant -->
    <!-- <div class="modal fade" id="updateprod" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title text-2xl font-semibold mb-4" id="updateprod">Update Category</h5>
                </div>
                <form> -->
                    <!-- Total Products -->
                    <!-- <input type="number" placeholder="Total Products" class="mt-1 p-2 w-full border rounded" name="qty"
                        id="qytUpt"> -->
                    <!-- Total Price -->
                    <!-- <input type="number" placeholder="Total Price" class="mt-1 p-2 w-full border rounded" name="price"
                        id="priceUpt"> -->
                    <!-- Update Button -->
                    <!-- <div class="d-flex flex-row-reverse">
                        <button type="submit" @click="updateProduct"
                            class="bg-blue-500 text-white rounded-md py-2 px-4 mx-2 my-2 hover:bg-blue-600"
                            data-bs-dismiss="modal" aria-label="Close">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    </div>
    <script src="../assets/css/sweetalert.js"></script>
    <script src="../assets/css/bootstrap.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/product.js"></script>
</body>

</html>