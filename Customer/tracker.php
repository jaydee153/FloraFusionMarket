<?php 
     session_start();  
    if(!isset($_SESSION['id'])){
        header('location: ./index.php');
        $role = $_SESSION['role'];
        if($role == 1){
            header('location: /FloraFusion/Customer/index.php');
        }else if($role == 2){
            header('location: /FloraFusion/seller/index.php');
        }else{
            echo "You Need To logged in!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Tracker</title>
    <style>
        .step-container {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body class="bg-gray-100">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center">
                <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion Market</span>
            </div>
            <div class="flex items-center md:order-2">
                <ul class="flex space-x-4">
                    <li><a href="wishlist.php" class="text-gray"><i class="fas fa-heart"></i></a></li>
                    <li><a href="mycart.php" class="text-gray"><i class="fas fa-shopping-cart"></i></a></li>
                    <!-- Profile Dropdown Trigger -->
                    <li>
                    <button id="profile-menu-button"><img src="/florafusion/assets/img/defaultProfilePicture.jpg" alt="default" width="36" height="36" class="rounded-full"></i></button>
                    </li>
                </ul>
            </div>
            <!-- Profile Dropdown -->
            <ul id="profile-menu" class="absolute mt-3 top-5 right-0 hidden bg-white text-gray-800 shadow-md rounded-lg w-48 space-y-2 py-2">
                <li><a href="tracker.php"><i class="mr-2 text-blue-500 fas fa-map-marker-alt"></i>Order Tracker</a></li>
                <li><a href="his_purchase.php"><i class="mr-2 text-green-500 fas fa-shopping-cart"></i>Purchase History</a></li>
                <li><a href="upd_profile.php"><i class="mr-2 text-purple-500 fas fa-user-edit"></i>Update Profile</a></li>
                <li><a href="#"><i class="mr-2 text-red-500 fas fa-trash-alt"></i>Delete Account</a></li>
                <li><a href="../includes/logout.php"><i class="mr-2 text-gray-500 fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
            <!-- End Profile Dropdown -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                    </li>
                    <li>
                        <a href="products.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto mt-8 text-center p-4 bg-white rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Order Tracker</h2>

        <div class="flex space-x-4 items-center step-container">
            <div class="flex flex-col items-center">
                <i class="fas fa-shopping-cart text-blue-500 text-2xl"></i>
                <p class="text-sm text-gray-600 mt-2">Order Placed</p>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-sync text-blue-500 text-2xl"></i>
                <p class="text-sm text-gray-600 mt-2">Processing</p>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-truck text-blue-500 text-2xl"></i>
                <p class="text-sm text-gray-600 mt-2">Shipped</p>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                <p class="text-sm text-gray-600 mt-2">Delivered</p>
            </div>
        </div>
    </div>
    

    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-2xl font-semibold mb-4 text-center">Order Details</h1>
        <div class="mb-4">
            <p><strong>Order Number:</strong> #12345</p>
            <p><strong>Date:</strong> January 19, 2023</p>
            <p><strong>Customer Info:</strong> JJA, jja@gmail.com</p>
        </div>

        <!-- Plant Details Table -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Plant Details</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-3 bg-gray-100 border border-gray-300">Plant Name</th>
                        <th class="py-2 px-3 bg-gray-100 border border-gray-300">Quantity</th>
                        <th class="py-2 px-3 bg-gray-100 border border-gray-300">Price</th>
                        <th class="py-2 px-3 bg-gray-100 border border-gray-300">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data -->
                    <tr>
                        <td class="py-2 px-3 border border-gray-300">Snake Plant</td>
                        <td class="py-2 px-3 border border-gray-300">2</td>
                        <td class="py-2 px-3 border border-gray-300">10.00</td>
                        <td class="py-2 px-3 border border-gray-300">20.00</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3 border border-gray-300">Succulent</td>
                        <td class="py-2 px-3 border border-gray-300">3</td>
                        <td class="py-2 px-3 border border-gray-300">15.00</td>
                        <td class="py-2 px-3 border border-gray-300">45.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Mode of Payment -->
        <div class="mb-4">
            <p><strong>Mode of Payment:</strong> Cash on Delivery</p>
        </div>

        <!-- Total Amount -->
        <div>
            <p class="text-xl font-semibold"><strong>Total Amount:</strong> 165.00</p>
        </div>
        <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none"><a href="index.php">Back</a>
                
            </button>
    </div>

    <script src="../assets/drop_down.js"></script>
</body>
</html>
