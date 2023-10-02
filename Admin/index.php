<?php 
     session_start();  
    if(!isset($_SESSION['id'])){
        header('location: index.php');
        $role = $_SESSION['role'];
         if($role == 0){
          header('location: /FloraFusion/Admin/index.php');
        }else{
            echo "You Need To Logged in!";
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
    <title>Admin Dashboard</title>
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
            <a href="../Admin/index.php" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0H2C.9 0 0 .9 0 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8l-6-6zm-2 18H4v-2h6v2zm0-4H4v-2h6v2zm0-4H4V8h6v2zm5-6l-5-5v5h5zm-2 0H2V2h7v4z"/>
                </svg>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="#" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2H2V2zm18 5H0v11a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7zM2 14h16V8H2v6z"/>
                </svg>
                <span>Inventory</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="#" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2H2V2zm18 5H0v11a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7zM2 14h16V8H2v6z"/>
                </svg>
                <span>User Profiles</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-2 rounded-md cursor-pointer">
            <a href="#" class="flex items-center space-x-2">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2H2V2zm18 5H0v11a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7zM2 14h16V8H2v6z"/>
                </svg>
                <span>Seller Profiles</span>
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




</body>
</html>
