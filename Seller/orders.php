<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./index.php');
    $role = $_SESSION['role'];
    if ($role == 1) {
        header('location: /FloraFusionmarket/Customer/index.php');
    } else if ($role == 2) {
        header('location: /FloraFusionmarket/seller/index.php');
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
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <title>Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="../assets/css/jquery.js"></script>
</head>

<body>
    <div class="flex">
        <!-- Navigation on the left -->
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

        <!-- Content on the right -->
        <div class="flex-1 bg-white p-4 shadow-md">
            <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img
                    src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>"
                    alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
            <!-- <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i> -->
            <div class="flex justify-between items-center mb-4 mt-20">
                <div class="mb-4">
                    <div class="flex space-x-4">
                        <!-- <button class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-md">All
                            Orders</button>
                        <button
                            class="bg-yellow-300 hover:bg-yellow-400 text-yellow-700 px-4 py-2 rounded-md">Pending</button>
                        <button
                            class="bg-green-300 hover:bg-green-400 text-green-700 px-4 py-2 rounded-md">Completed</button> -->
                    </div>
                </div>
                <div class="relative ml-auto">
                    <!-- <input type="text" v-model="search"
                        class="border border-gray-300 rounded-md px-3 py-2 pr-10 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="Search"> -->
                </div>
            </div>

            <table id="der" class="w-1/2 min-w-full divide-y divide-gray-800 border border-gray-800">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody id="orders" class="bg-white divide-y divide-gray-200">

                </tbody>
            </table>
        </div>
    </div>



    <!-- Modal for Order Details -->
    <div class="modal fade view-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-2xl text-center font-semibold mb-4">Order Details</h2>
                    <!-- Order Number-->
                    <div class=" d-flex">
                        <p><strong>Order Number: &nbsp; <p class="d-flex" id="orderNumber"></p></strong></p>
                    </div>

                    <!-- Date -->
                    <div class="d-flex">
                        <p><strong>Date: &nbsp;</strong>
                        <p class="d-flex" id="orderDate"></p>
                    </div>

                    <!-- Customer name -->
                    <div class="d-flex">
                        <p><strong>Customer Name: &nbsp;</strong>
                        <p id="cname"></p>
                        </p>
                    </div>
                    <!-- address -->
                    <div class="d-flex">
                        <p><strong>Address: &nbsp;</strong>
                        <p id="add"></p>
                        </p>
                    </div>
                    <!-- Contact number -->
                    <div class="d-flex">
                        <p><strong>Contact Number: &nbsp;</strong>
                        <p id="cnum"></p>
                        </p>
                    </div>

                    <!-- Product Table -->
                    <table id="product-info" class="table-auto w-full mb-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Product Name</th>
                                <th class="px-4 py-2">Quantity</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- Mode of Payment and Total Amount -->
                    <div class="mb-4">
                        <p><strong>Mode of Payment:</strong>{{ COD}}</p>
                        <p><strong>Total Amount:</strong>{{ 150}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="delivered" class="btn btn-success">Delivered</button>
                    <!-- <button id="canceldeliver" class="btn btn-danger">Cancel</button> -->
                </div>
            </div>
        </div>
    </div>



    <script src="../assets/viewDetailsModal.js"></script>
    <script src="../assets/css/toastr.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>