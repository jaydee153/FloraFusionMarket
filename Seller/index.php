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
    <title>Seller Dashboard</title>
</head>
<body>
<div class="flex">
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
    <div class="flex-1 bg-white p-4 shadow-md">
        <div class="flex justify-between items-center mb-4 py-2 ">
            <div class="bg-green-500 p-4 rounded-md text-black">
                <h3 class="text-xl font-semibold">Number of Plants</h3>
                <p class="text-4xl">150</p>
            </div>
            <div class="bg-blue-500 p-4 rounded-md text-black">
                <h3 class="text-xl font-semibold">Number of Orders</h3>
                <p class="text-4xl">150</p>
            </div>
        </div>
    </div>
</div>

</div>







</body>
</html>
