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
    <link rel="stylesheet" href="../assets/css/purchase.css">
    <title>Purchase History</title>
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
                    <button id="profile-menu-button"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>" alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
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

    <div class="max-w-5xl mx-auto mt-8 p-4 bg-white rounded shadow">
        <h2 class="text-2xl text-center font-semibold mb-4">Purchase History</h2>

        <!-- Purchase History Table -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="py-2 px-4 text-left">Order No.</th>
                    <th class="py-2 px-4 text-left">Date</th>
                    <th class="py-2 px-4 text-left">Time</th>
                    <th class="py-2 px-4 text-left">Paid By</th>
                    <th class="py-2 px-4 text-left">Total Price</th>
                    <th class="py-2 px-4 text-left">Status</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Purchase History Item 1 -->
                <tr class="border-b">
                    <td class="py-2 px-4">001</td>
                    <td class="py-2 px-4">2023-08-15</td>
                    <td class="py-2 px-4">10:30 AM</td>
                    <td class="py-2 px-4">GCash</td>
                    <td class="py-2 px-4">198</td>
                    <td class="py-2 px-4">Delivered</td>
                    <td class="py-2 px-4">
                        <button class="text-red-500 hover:text-red-700 focus:outline-none">
                            Delete
                        </button>

        <button id="openModalButton" class="text-blue-500 hover:text-blue-700 ml-2 focus:outline-none">Rate
    </button>
                    </td>
                </tr>

                <!-- Purchase History Item 2 (Add more items as needed) -->
                <!-- <tr class="border-b">
                    <td class="py-2 px-4">56789</td>
                    <td class="py-2 px-4">2023-08-10</td>
                    <td class="py-2 px-4">2:45 PM</td>
                    <td class="py-2 px-4">PayPal</td>
                    <td class="py-2 px-4">199</td>
                    <td class="py-2 px-4">Shipped</td>
                    <td class="py-2 px-4">
                        <button class="text-red-500 hover:text-red-700 focus:outline-none">
                            Delete
                        </button>
                        <button class="text-blue-500 hover:text-blue-700 ml-2 focus:outline-none" onclick="openRatingModal('Fiddle Leaf Fig')">
                            Rate
                        </button>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <!-- Rating Modal (Initially hidden) -->
    <div id="ratingModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h3 class="text-lg font-semibold mb-2">Rate Product: <span id="productName"></span></h3>
            <div class="mb-4">
                <div class="text-gray-600">Rating:</div>
                <div class="mt-2 space-x-2">
                    <input type="radio" id="rating5" name="rating" value="5" class="form-radio text-blue-500">
                    <label for="rating5" class="text-lg">5</label>

                    <input type="radio" id="rating4" name="rating" value="4" class="form-radio text-blue-500">
                    <label for="rating4" class="text-lg">4</label>

                    <input type="radio" id="rating3" name="rating" value="3" class="form-radio text-blue-500">
                    <label for="rating3" class="text-lg">3</label>

                    <input type="radio" id="rating2" name="rating" value="2" class="form-radio text-blue-500">
                    <label for="rating2" class="text-lg">2</label>

                    <input type="radio" id="rating1" name="rating" value="1" class="form-radio text-blue-500">
                    <label for="rating1" class="text-lg">1</label>
                </div>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-600">Your Message:</label>
                <textarea id="message" class="w-full border rounded py-2 px-3 mt-1 focus:outline-none focus:ring focus:border-blue-500" rows="3"></textarea>
            </div>
            <div>
                <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none" onclick="submitRating()">
                    Submit
                </button>
                <button class="text-red-500 hover:text-red-700 ml-2 focus:outline-none" onclick="closeRatingModal()">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <?php include '../Customer/rateModal.php'; ?>
     <script src="../assets/rateModal.js"></script>
    <script src="../assets/drop_down.js"></script>
</body>
</html>
