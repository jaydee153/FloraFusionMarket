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
    <title>sales Report</title>
</head>
<body>
    <div class="flex p-8 space-x-8">
    <div class=" bg-green-300 text-black p-4">
        <div class="bg-green-300 text-black h-screen w-64 flex flex-col">
    <div class="p-4">
    <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
        <h2 class="text-2xl font-semibold">FloraFusion Market</h2>
    </div>
    <ul class="flex flex-col space-y-2 p-4">
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="../Seller/index.php" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0H2C.9 0 0 .9 0 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8l-6-6zm-2 18H4v-2h6v2zm0-4H4v-2h6v2zm0-4H4V8h6v2zm5-6l-5-5v5h5zm-2 0H2V2h7v4z"/>
                </svg>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="../Seller/Inventory.php" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2H2V2zm18 5H0v11a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7zM2 14h16V8H2v6z"/>
                </svg>
                <span>Inventory</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="../Seller/orders.php" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2H2V2zm18 5H0v11a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7zM2 14h16V8H2v6z"/>
                </svg>
                <span>Orders</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="../Seller/sales_rep.php" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2H2V2zm18 5H0v11a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7zM2 14h16V8H2v6z"/>
                </svg>
                <span>Sales Report</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="../Seller/sold_his.php" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2H2V2zm18 5H0v11a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7zM2 14h16V8H2v6z"/>
                </svg>
                <span>Sold History</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="../includes/logout.php" class="flex items-center space-x-2">
            <i class="mr-2 text-red-500 fas fa-sign-out-alt"></i>
                <span>Log out</span>
            </a>
        </li>
        
    </ul>
</div>
</div>
<div>
<div class="flex-1 bg-white p-4 shadow-md">
    <h2 class="text-xl font-semibold mb-4">Sales Report of the Month of</h2>

    <!-- Search bar -->
    <div class="flex justify-between items-center mb-4">
        <div class="relative ml-auto">
        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md" id="openAddModal">+</button>
            <input type="text" v-model="search" class="border border-gray-300 rounded-md px-3 py-2 pr-10 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500" placeholder="Search">
        </div>
    </div>
    
    <!-- Sales report table -->
    <table class="min-w-full divide-y divide-gray-800 border border-gray-800 ">
        <thead class="bg-gray-50">
            <tr v-for="record in searchRecord">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Month</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ January }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ 2023 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                <button id="viewSalesButton" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md ml-2">View</button>
                    <button id="updateSalesButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Update</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php include '../Seller/sales_Modal.php'; ?>
</div>
<script src="../assets/salesrep_modal.js"></script>
<script src="../assets/salesrep_Up_modal.js"></script>
</body>
</html>
