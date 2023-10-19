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
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Orders</title>
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
        <div class="flex justify-between items-center mb-4">
            <div class="mb-4">
                <div class="flex space-x-4">
                    <button class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-md">All Orders</button>
                    <button class="bg-yellow-300 hover:bg-yellow-400 text-yellow-700 px-4 py-2 rounded-md">Pending</button>
                    <button class="bg-green-300 hover:bg-green-400 text-green-700 px-4 py-2 rounded-md">Completed</button>
                </div>
            </div>
            <div class="relative ml-auto">
                <input type="text" v-model="search" class="border border-gray-300 rounded-md px-3 py-2 pr-10 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500" placeholder="Search">
            </div>
        </div>
        
        <table class="w-1/2 min-w-full divide-y divide-gray-800 border border-gray-800">
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
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="order in orderSearch">
                    <td class="px-6 py-4 whitespace-nowrap">{{ order.ID }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ order.name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ order.date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ order.price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ order.status == 1 ? 'Pending' : 'Completed' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button id="viewOrderButton" class="bg-green-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md view-order-details">View</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal for Order Details -->
<div id="orderDetailsModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
  <div class="modal-container">
    <div class="modal-content bg-white p-6 rounded-lg shadow-lg">
      <div class="flex justify-end">
        <button class="text-gray-500 hover:text-gray-700" onclick="closeModal('orderDetailsModal')">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <h2 class="text-2xl text-center font-semibold mb-4">Order Details</h2>
      <!-- Order Number and Date -->
      <div class="mb-4">
        <p><strong>Order Number:</strong>{{order_id}}</p>
        <p><strong>Date:</strong>{{order_date}}</p>
      </div>
      <!-- Customer Information -->
      <div class="mb-4">
        <p><strong>Customer Name:</strong>{{ JJA}}</p>
        <p><strong>Address:</strong>{{ Dapitan Cordova Cebu}}</p>
        <p><strong>Contact Number:</strong>{{ 09123456789}}</p>
      </div>
      <!-- Product Table -->
      <table class="table-auto w-full mb-4">
        <thead>
          <tr>
            <th class="px-4 py-2">Product Name</th>
            <th class="px-4 py-2">Quantity</th>
            <th class="px-4 py-2">Price</th>
            <th class="px-4 py-2">Total Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border px-4 py-2">{{ Cactus }}</td>
            <td class="border px-4 py-2">{{ 2 }}</td>
            <td class="border px-4 py-2">{{ 100 }}</td>
            <td class="border px-4 py-2">{{ 50 }}</td>
          </tr>
          <!-- Add more rows for other products if needed -->
        </tbody>
      </table>
      <!-- Mode of Payment and Total Amount -->
      <div class="mb-4">
        <p><strong>Mode of Payment:</strong>{{ COD}}</p>
        <p><strong>Total Amount:</strong>{{ 150}}</p>
      </div>
      <!-- Delivered Button -->
      <button class="bg-green-500 text-white rounded-md py-2 px-4 hover:bg-green-600">Delivered</button>
    </div>
  </div>
</div>  
<script src="../assets/viewDetailsModal.js"></script>
</body>
</html>
