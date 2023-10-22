<?php 
    //  session_start();  
    // if(!isset($_SESSION['id'])){
    //     header('location: index.php');
    //     $role = $_SESSION['role'];
    //      if($role == 0){
    //       header('location: /FloraFusion/Admin/index.php');
    //     }else{
    //         echo "You Need To Logged in!";
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="flex">
    <div class=" bg-green-300 text-black p-4">
        <div class="bg-green-300 text-black h-screen w-64 flex flex-col">
    <div class="p-4">
    <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
        <h2 class="text-2xl font-semibold">FloraFusion Market</h2>
    </div>
    <ul class="flex flex-col space-y-2 p-4">
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="../Admin/index.php" class="flex items-center space-x-2">
                        <i class="fas fa-chart-pie"></i> <!-- Font Awesome icon for Dashboard -->
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="cus_profile.php" class="flex items-center space-x-2">
                        <i class="fas fa-users"></i> <!-- Font Awesome icon for User Profiles -->
                        <span>Customer Profiles</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="seller_profile.php" class="flex items-center space-x-2">
                        <i class="fas fa-store"></i> <!-- Font Awesome icon for Seller Profiles -->
                        <span>Seller Profiles</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="inventory.php" class="flex items-center space-x-2">
                        <i class="fas fa-box-open"></i> <!-- Font Awesome icon for Inventory -->
                        <span>Inventory</span>
                    </a>
                </li>
                <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
                    <a href="../includes/logout.php" class="flex items-center space-x-2">
                        <i class="fas fa-sign-out-alt text-red-500"></i> <!-- Font Awesome icon for Log out -->
                        <span>Log out</span>
                    </a>
                </li>
            </ul>
</div>
</div>



<!-- Main Content -->
<div class="flex-1 p-28 relative">
    <!-- Profile Icon in the top right corner -->
    <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i>

    <!-- Right Side Content -->
    <div class="flex items-center">
        <!-- Number of Customers -->
        <div class="bg-white p-4 rounded-lg shadow-md mr-2">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-400 text-white p-3 rounded-full">
                    <!-- Add an icon or text to represent customers -->
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <p class="text-xl font-semibold">Customers</p>
                    <p class="text-3xl font-bold">1234</p> <!-- Replace with the actual number of customers -->
                </div>
            </div>
        </div>

        <!-- Number of Sellers -->
        <div class="bg-white p-4 rounded-lg shadow-md ml-2">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-400 text-white p-3 rounded-full">
                    <!-- Add an icon or text to represent sellers -->
                    <i class="fas fa-store"></i>
                </div>
                <div>
                    <p class="text-xl font-semibold">Sellers</p>
                    <p class="text-3xl font-bold">567</p> <!-- Replace with the actual number of sellers -->
                </div>
            </div>
        </div>
    </div>
    <!-- Chart container -->
  <div class="mt-6">
    <canvas id="myChart" width="400" height="200"></canvas>
  </div>
</div>


<script src="../assets/chart.js"></script>
</body>
</html>
