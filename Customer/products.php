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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../assets/css/toastr.css">
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.css"> -->

    <title>Products</title>
</head>
<style>
    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 999;
    }

    .modal-content {
        background-color: #fff;
        width: 80%;
        max-width: 600px;
        margin: 2rem auto;
        padding: 1rem;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Center content horizontally */
    }

    /* Close button */
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    /* Table-like layout */
    .table {
        display: table;
        width: 100%;
        margin-top: 10px;
    }

    .table-row {
        display: table-row;
    }

    .table-cell {
        display: table-cell;
        padding: 10px;
    }
</style>
<body>
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
                        <button id="profile-menu-button"><img src="/florafusion/assets/img/<?php echo $_SESSION['image']?>" alt="default" width="46" height="36" class="rounded-full"></i></button>
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

      

        <!-- Category Drop-down and Search Bar -->
        <div class="flex justify-between items-center mb-4 ml-20">
            <div class="relative w-1/3 ml-20">
                <select name="plant" id="plant"
                    class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <!-- Add mx-auto and ml-20 here -->
                    <option value="">All Categories</option>
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <div class="ml-auto">
                <input
                    class="appearance-none block bg-white text-gray-700 border border-gray-300 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mr-20"
                    id="search" v-model="search" type="text" placeholder="Search products...">
            </div>
        </div>


<div id="product">
  <section id="section2" class="bg-white py-8">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold mb-4">Featured Products</h2>
      <div class="max-w-5xl mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
          <div class="p-2 w-64 m-2" v-for="product in productsFromIndex" :key="product.product_ID">
            <div class="bg-white rounded-lg shadow-md relative">
              <img @click="fnGetDataProducts(product.product_ID)" data-bs-toggle="modal" data-bs-target="#View" :src="'/florafusion/assets/img/' + product.image" alt="plant" class="w-full h-36 object-cover cursor-pointer">
              <div class="p-3 text-center">
                <h3 class="text-lg font-semibold mb-2">{{ product.name }}</h3>
                <p class="text-gray-600">{{ product.des }}</p>
                <div class="mt-2">
                  <span class="text-blue-500 font-semibold">₱{{ product.price }}</span>
                  <span class="text-gray-500 ml-2 line-through">{{ product.oldPrice }}</span>
                </div>
                <div class="mt-3 flex justify-center">
                  <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600" @click="addToCart(product.product_ID)">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                  </button>
                  <button class="text-gray-500 hover:text-red-500 ml-2" @click="addToWishlist(product.product_ID)">
                    <i class="fas fa-heart"></i> Add to Wishlist
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal for Update Plant -->
  <div class="modal fade" id="View" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h5 class="modal-title text-2xl font-semibold mb-4">View</h5>
        </div>
        <form>
        <img :src="image" alt="Plant Product" class="cursor-pointer" style="width:500px; height:300px; object-fit: cover;">
          <div class="table">
            <div class="table-row">
              <div class="table-cell">
                <h2 class="text-2xl font-semibold" name="name" id="name">{{ name }}</h2> 
              </div>
              <div class="table-cell">
                <p class="text-lg font-bold text-green-500" name="price" id="price">{{ price }}</p>
              </div>
              <div class="table-cell">
                <a href="#" class="bg-red-500 text-white px-4 py-2 rounded-full" name="wishlist" id="wishlist" @click="addToWishlist(product_ID)">Add to Wishlist</a>
              </div>
              <div class="table-cell">
                <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-full" @click="addToCart(product_ID)">Add to Cart</a>
              </div>
            </div>
          </div> 

          <p class="my-4" name="desc" id="desc">Description: <br> {{ desc }}</p>
          <h3 class="text-xl font-semibold my-2" name="review" id="review">Reviews:</h3>
          <!-- You can display user reviews here -->
          <div class="border-t border-gray-300">
            <div class="flex items-center my-2">
              <div class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"></div>
              <div class="ml-2">
                <p class="text-gray-800 font-semibold" name="username" id="username">{{ username }}</p>
                <p class="text-gray-600" name="comment" id="comment">{{ comment }}</p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


    <script src="../assets/css/jquery.js"></script>
    <script src="../assets/css/toastr.js"></script>
    <script src="../assets/css/bootstrap.js"></script>
    <script src="../assets/productsmodal.js"></script>
    <script src="../assets/drop_down.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/product.js"></script>
    <!-- <script src="../assets/services/displayProd.js"></script> -->
</body>

</html>