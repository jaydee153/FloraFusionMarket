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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../assets/css/toastr.css">
    <title>Cart</title>
</head>

<body class="bg-gray-100">
    <div id="cart">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div class="flex items-center">
                    <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3 rounded-full" alt="Plant Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion
                        Market</span>
                </div>
                <div class="flex items-center md:order-2">
                    <ul class="flex space-x-4">
                        <li><a href="wishlist.php" class="text-gray"><i class="fas fa-heart"></i></a></li>
                        <li><a href="mycart.php" class="text-gray"><i class="fas fa-shopping-cart"></i></a></li>
                        <!-- Profile Dropdown Trigger -->
                        <li>
                        <button id="profile-menu-button"><img src="/florafusion/assets/img/<?php echo $_SESSION['image']?>" alt="default" width="46" height="36" class="rounded-full"></i></button>
                        </li>
                    </ul>
                </div>
                <!-- Profile Dropdown -->
                <ul id="profile-menu"
                    class="absolute mt-3 top-5 right-0 hidden bg-white text-gray-800 shadow-md rounded-lg w-48 space-y-2 py-2">
                    <li><a href="tracker.php"><i class="mr-2 text-blue-500 fas fa-map-marker-alt"></i>Order Tracker</a>
                    </li>
                    <li><a href="his_purchase.php"><i class="mr-2 text-green-500 fas fa-shopping-cart"></i>Purchase
                            History</a></li>
                    <li><a href="upd_profile.php"><i class="mr-2 text-purple-500 fas fa-user-edit"></i>Update
                            Profile</a></li>
                    <li><a href="#"><i class="mr-2 text-red-500 fas fa-trash-alt"></i>Delete Account</a></li>
                    <li><a href="../includes/logout.php"><i
                                class="mr-2 text-gray-500 fas fa-sign-out-alt"></i>Logout</a></li>
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
                        <li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="max-w-5xl mx-auto mt-8 p-4 bg-white rounded shadow">
            <h2 class="text-2xl font-semibold mb-4 text-center">My Cart</h2>

            <!-- Cart Table -->
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 px-4 text-left">Plant Name</th>
                        <th class="py-2 px-4 text-left">Price</th>
                        <th class="py-2 px-4 text-left">Quantity</th>
                        <th class="py-2 px-4 text-left">Total Price</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="border-b" v-for="c in carts">
                        <td class="py-2 px-4">
                            <h3 class="text-lg font-semibold mt-2">{{ c.p_name }}</h3>
                        </td>
                        <td class="py-2 px-4">P{{ c.p_price }}</td>
                        <!-- <td class="py-2 px-4">
                            <div class="flex items-center">
                                <button @click="minus(c.p_quantity, c.id)" class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" :id="c.id" class="w-12 text-center border rounded focus:outline-none"
                                    :value="c.p_quantity">
                                <button  @click="plus(c.p_quantity, c.id)" class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </td> -->

                        <td class="py-2 px-4">
                            <div class="flex items-center">
                                <button @click="minus(c.p_quantity, c.id)" class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span class="w-12 text-center">{{ c.p_quantity }}</span>
                                <button @click="plus(c.p_quantity, c.id)" class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </td>

                        <td class="py-2 px-4">{{ c.p_totalPrice }}</td>
                        <td class="py-2 px-4">
                            <button class="text-red-500 hover:text-red-700 focus:outline-none" @click="deleteCart(c.id)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Cart Total -->
            <div class="mt-4 flex justify-end items-center">
                <div class="text-xl font-semibold mr-4">{{ c.p_totalPrice}}</div>
                <button id="order-details-button"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
                    Checkout
                </button>
                <?php include '../Customer/paymentMethod.php'; ?>
            </div>
        </div>
    </div>
    <script src="../assets/css/jquery.js"></script>
    <script src="../assets/css/toastr.js"></script>
    <script src="../assets/modal_cart.js"></script>
    <script src="../assets/paymentMethod.js"></script>
    <script src="../assets/drop_down.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/cart.js"></script>
</body>

</html>