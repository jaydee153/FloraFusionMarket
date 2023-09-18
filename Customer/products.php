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
    
    <title>Products</title>
</head>
<body>
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
                        <a href="products.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Product</a>
                    </li>
                    <li>
                        <a href="reviews.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        </div>
    </header>

    

    <!-- Category Drop-down and Search Bar -->
    <div class="flex justify-between items-center mb-4 ml-20">
    <div class="relative w-1/3 ml-20">
        <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"> <!-- Add mx-auto and ml-20 here -->
            <option value="">All Categories</option>
            <option value="category1">Category 1</option>
            <option value="category2">Category 2</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
    <div class="ml-auto">
        <input class="appearance-none block bg-white text-gray-700 border border-gray-300 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mr-20" id="search" type="text" placeholder="Search products...">
    </div>
</div>


    
    <div class="max-w-5xl mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <!-- Product 1 -->
            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- product 2-->
            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- product 3-->
            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Add more products -->
        </div>
    </div>


    <script src="../assets/drop_down.js"></script>
</body>
</html>