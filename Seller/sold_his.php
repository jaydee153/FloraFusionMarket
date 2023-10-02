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
    <title>Sold History</title>
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
<div class="flex p-8 space-x-8">
    
       
      <!--  <div class="relative group"> 
           <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" /> 
           <div class="absolute top-0 right-0 bg-white border rounded-full w-6 h-6 flex items-center justify-center group-hover:block hidden"> 
               <i class="text-gray-800 fas fa-user"></i> 
               </div>
                </div>  -->

        
        
       
        <div class="w-60 relative">
            <input type="text" class="w-full border rounded-md py-2 px-3 pl-10 focus:outline-none focus:shadow-outline" placeholder="Search...">
            <i class="absolute top-3 left-3 text-gray-400 fas fa-search"></i>
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
