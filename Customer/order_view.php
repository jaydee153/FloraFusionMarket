<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Add Tailwind CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
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
    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-2xl font-semibold mb-4">Order Details</h1>
        <div class="mb-4">
            <p><strong>Order Number:</strong>{{ o.order_id }}</p>
            <p><strong>Date:</strong> {{ o.order_date }}</p>
            <p><strong>Customer Info:</strong>{{ o.name }}, {{ o.email }}, {{ o.permanent_add }} {{ o.contact_no }} </p>
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
                        <td class="py-2 px-3 border border-gray-300">{{ o.product_name }}</td>
                        <td class="py-2 px-3 border border-gray-300">{{ o.quantity }}</td>
                        <td class="py-2 px-3 border border-gray-300">{{ o.product_price }}</td>
                        <td class="py-2 px-3 border border-gray-300">{{ o.totalPrice }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Total Amount -->
        <div>
            <p class="text-xl font-semibold"><strong>Total Amount:</strong>{{ o.totalPrice }}</p>
        </div>
        <!-- Mode of Payment -->
        <div class="mb-4">
            <select class="form-select border rounded full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="role" >
                <option value="1">Cash on Dilevery</option>
                <option value="2">Gcash</option>
            </select>
        </div>

        <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Submit</button>
    </div>

    <script src="../assets/drop_down.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>