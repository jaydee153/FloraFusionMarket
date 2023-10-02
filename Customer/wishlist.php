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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Wishlist</title>
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
                    <li>
                </ul>
            </div>
        </div>
    </nav>

   <!-- product wishlist -->
   <div class="p-6">
    <h2 class="text-2xl font-semibold mb-4 text-center">My Wishlist</h2>
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-8 p-4">
    <!-- <h2 class="text-2xl font-semibold mb-4 text-center">My Wishlist</h2> -->
        <!-- Wishlist Product 1 -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <img src="../assets/img/plant.jpeg" alt="Plant Product" class="mx-auto w-32 h-32 object-cover rounded-md">
            <div class="text-center mt-2">
                <h3 class="text-lg font-semibold">Snake Plant</h3>
                <p class="text-gray-600">119.99</p>
            </div>
            <div class="flex justify-center mt-4 space-x-4">
                <button class="text-gray-600 hover:text-red-500"><i class="fas fa-heart"></i></button>
                <button class="text-gray-600 hover:text-green-500"><a href="mycart.php"><i class="fas fa-cart-plus"></i></a></button>
            </div>
        </div>
    </div>
</div>

    <script src="../assets/drop_down.js"></script>
</body>
</html>
