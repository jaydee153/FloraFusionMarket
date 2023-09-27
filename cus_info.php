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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Reviews</title>
</head>
<body class="bg-gray-100">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center">
                <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion Market</span>
            </div>
        </div>
    </nav>

   
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-gray-200 p-8 rounded shadow-md w-full max-w-md">
        <h1>
            Before proceeding, please fill up your information below.
        </h1>
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-semibold mb-4">Customer Details</h1>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="profileImage">
                Profile Image
            </label>
            <input type="file" id="profileImage">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input class="border rounded w-full py-2 px-3" id="name" type="text" placeholder="Enter your name">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="currentAddress">
                Current Address
            </label>
            <input class="border rounded w-full py-2 px-3" id="currentAddress" type="text" placeholder="Enter your current address">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="permanentAddress">
                Permanent Address
            </label>
            <input class="border rounded w-full py-2 px-3" id="permanentAddress" type="text" placeholder="Enter your permanent address">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="contactNo">
                Contact No.
            </label>
            <input class="border rounded w-full py-2 px-3" id="contactNo" type="text" placeholder="Enter your contact number">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Gender
            </label>
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-blue-500" name="gender" value="male">
                    <span class="ml-2">Male</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="radio" class="form-radio text-pink-500" name="gender" value="female">
                    <span class="ml-2">Female</span>
                </label>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">
                Birthday
            </label>
            <input class="border rounded w-full py-2 px-3" id="birthday" type="date">
        </div>
        <div class="mt-6">
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none" type="button">
                <a href="index.php">Proceed</a>
            </button>
        </div>
    </div>
</div>
</div>


    <script src="../assets/drop_down.js"></script>
</body>
</html>
