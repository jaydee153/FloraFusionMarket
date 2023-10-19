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
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    
    <title>Update Profile</title>
</head>

<body class="bg-gray-100">
    <div id="userinfo">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div class="flex items-center">
                    <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion
                        Market</span>
                </div>
                <div class="flex items-center md:order-2">
                    <ul class="flex space-x-4">
                        <li><a href="wishlist.php" class="text-gray"><i class="fas fa-heart"></i></a></li>
                        <li><a href="mycart.php" class="text-gray"><i class="fas fa-shopping-cart"></i></a></li>
                        <!-- Profile Dropdown Trigger -->
                        <li>
                            <button id="profile-menu-button"><img src="../assets/img/defaultProfilePicture.jpg"
                                    alt="default" width="36" height="36" class="rounded-full"></i></button>
                        </li>
                    </ul>
                </div>
                <!-- Profile Dropdown -->
                <ul id="profile-menu"
                    class="absolute mt-3 top-5 right-0 hidden bg-white text-gray-800 shadow-md rounded-lg w-48 space-y-2 py-2">
                    <li><a href="tracker.php"><i class="mr-2 text-blue-500 fas fa-map-marker-alt"></i>Order Tracker</a></li>
                    <li><a href="his_purchase.php"><i class="mr-2 text-green-500 fas fa-shopping-cart"></i>Purchase
                            History</a></li>
                    <li><a href="upd_profile.php"><i class="mr-2 text-purple-500 fas fa-user-edit"></i>Update Profile</a>
                    </li>
                    <li><a href="#"><i class="mr-2 text-red-500 fas fa-trash-alt"></i>Delete Account</a></li>
                    <li><a href="../includes/logout.php"><i class="mr-2 text-gray-500 fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                </ul>
                <!-- End Profile Dropdown -->
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="index.php"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                        </li>
                        <li>
                            <a href="products.php"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Product</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-gray-200 p-8 rounded shadow-md w-full max-w-2xl">
        <h2 class="text-2xl font-semibold mb-4 text-center">Update Personal Information</h2>
        <div class="bg-white p-8 rounded shadow-md w-full max-w-2xl flex">
            <!-- Left Side (Personal Information) -->
            <div class="w-1/2 pr-4">
                <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="profileImage">
                    Profile Image
                </label>
                <div class="relative inline-block">
                    <label for="file" class="cursor-pointer">
                        <img src="../assets/img/bleulock.jpg" alt="Your Profile" class="w-32 h-32 rounded-full object-cover mb-2">
                        <div>
                            <i class="fas fa-upload text-gray-400 text-2xl"></i>
                        </div>
                    </label>
                    <input type="file" id="file" name="file" class="hidden">
                </div>
            </div>



                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <p class="border rounded w-full py-2 px-3" id="name" type="text">Janah Darielyn P. Germo</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="border rounded w-full py-2 px-3" id="email" type="email" placeholder="Enter your email" name="email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="border rounded w-full py-2 px-3" id="password" type="password" placeholder="Enter your password" name="password">
                </div>
            </div>

            <!-- Right Side (Address and Contact Information) -->
            <div class="w-1/2 pl-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="currentAddress">
                        Current Address
                    </label>
                    <input class="border rounded w-full py-2 px-3" id="currentAddress" type="text" placeholder="Enter your current address" name="currentAddress">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="permanentAddress">
                        Permanent Address
                    </label>
                    <p class="border rounded w-full py-2 px-3" id="permanentAddress" type="text">Dapitan Cordova</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contactNo">
                        Contact No.
                    </label>
                    <input class="border rounded w-full py-2 px-3" id="contactNo" type="text" placeholder="Enter your contact number" name="contactNo">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                    <div class="mt-2">
                        <p id="gender">
                            Female
                        </p>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">
                        Birthday
                    </label>
                    <input class="border rounded w-full py-2 px-3" id="birthday" type="date" name="birthday">
                </div>
                <div class="mt-6 ml-28 text-center">
            <button @click="CSInfo" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Update</button>
        </div>
            </div>
        </div>
        
    </div>
</div>


    <link rel="stylesheet" href="../assets/css/sweetalert.js">
    <script src="../assets/drop_down.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/userinfo.js"></script>
</body>
</html>