<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./index.php');
    $role = $_SESSION['role'];
    if ($role == 1) {
        header('location: /FloraFusionmarket/Customer/index.php');
    } else if ($role == 2) {
        header('location: /FloraFusionmarket/seller/index.php');
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Sold History</title>
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
        <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>"
                                    alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
    <!-- <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i> -->
    
<h2 class="text-xl font-semibold mt-20">Sold History</h2>
<div class="flex p-8 space-x-8">
    

      <!--  <div class="relative group"> 
           <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" /> 
           <div class="absolute top-0 right-0 bg-white border rounded-full w-6 h-6 flex items-center justify-center group-hover:block hidden"> 
               <i class="text-gray-800 fas fa-user"></i> 
               </div>
                </div>  -->

        
        
       
        <div class="w-60 relative">
            <input type="text" class="w-full border rounded-md py-2 px-3 pl-10" placeholder="Search...">
        </div>
         <!-- Sorting Options -->
    <div class="flex justify-end mr-8">
        <label class="mr-2">Sort By:</label>
        <select class="border rounded-md py-2 px-3 focus:outline-none focus:shadow-outline">
            <option value="date">Date</option>
            <option value="category">Category</option>
        </select>
    </div>
    </div>
    
   
    
    
    <table class="w-full border-collapse mt-4 mx-8"> 
        <thead> 
            <tr class="border-b"> 
                <th class="py-2 px-4 text-left">Category</th> 
                <th class="py-2 px-4 text-left">Plant Name</th> 
                <th class="py-2 px-4 text-left">Qty</th> 
                <th class="py-2 px-4 text-left">Price</th> 
                <th class="py-2 px-4 text-left">Total Price</th> 
                <th class="py-2 px-4 text-left">Date</th> 
            </tr> 
        </thead> 
        <tbody> 
            <!-- Sales history data will be dynamically added here --> 
        </tbody> 
        </table> 
                    <div class="flex justify-between mx-8 mt-4"> <div>
             <p class="font-semibold">Unit Sold: 
             <span id="unit-sold">0</span></p>
              </div> 
              <div> 
                  <p class="font-semibold">Total Sales: 
                  <span id="total-sales">0.00</span>
                  </p> 
                  </div>
                   </div>
    
    
    <div class="flex justify-end mt-4 mr-8">
        <button id="generate-sales-report" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
            Generate Sales Report
        </button>
    </div>
</div>
</div>

</body>
</html>
