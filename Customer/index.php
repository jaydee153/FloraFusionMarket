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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Home</title>
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
                    <button id="profile-menu-button"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>" alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
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
                        <a href="index.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="products.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- section1 -->
<section id="section1" class="bg-green-300 py-8 bg-cover bg-center h-screen flex items-center justify-center">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
    <div class="mt-10 ml-6">
      <h2 class="text-4xl font-bold text-center text-green-800 mt-10">FloraFusion Market</h2>
      <p class="text-green-800 text-center mt-10 ml-6 mr-6">
        Welcome to our plant online marketplace, where nature's wonders are just a click away. 
        Embark on a botanical adventure, transform your living spaces into tranquil havens, 
        and revel in the beauty and serenity that plants effortlessly bestow. Let the 
        enchantment begin!
      </p>
      <div class="flex justify-center mt-10">
      <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 mb-10 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
        <a href="products.php">
          Order now
        </a>
      </button>
    </div>
    </div>
    <div class="md:text-right mb-10 ml-6">
      <img src="../assets/img/plant.jpeg" alt="plant" class="rounded-lg h-64 mt-10 mb-10 ml-6">
    </div>
  </div>
  </section>
<!-- section 2-->

<div id="product">
  <section id="section2" class="bg-white py-8 bg-cover bg-center h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold mb-4 text-center">Featured Products</h2>
      <div class="max-w-5xl mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
          <div class="p-2 w-64 m-2" v-for="product in productsFromIndex" :key="product.product_ID">
            <div class="bg-white rounded-lg shadow-md relative">
              <img @click="fnGetDataProducts(product.product_ID)" data-bs-toggle="modal" data-bs-target="#View" :src="'/florafusionmarket/assets/img/' + product.image" alt="plant" class="w-full h-36 object-cover cursor-pointer">
              <div class="p-3 text-center">
                <h3 class="text-lg font-semibold mb-2">{{ product.name }}</h3>
                <p class="text-gray-600">{{ product.des }}</p>
                <div class="mt-2">
                  <span class="text-blue-500 font-semibold">P{{ product.price }}</span>
                  <span class="text-gray-500 ml-2 line-through">P{{ product.oldPrice }}</span>
                </div>
                <div class="mt-3 flex justify-center">
                  <button class="text-red-500 hover:text-gray-500">
                    <i class="fas fa-heart"></i>
                  </button>
                  <button class="text-green-600 hover:text-gray-500 ml-2" @click="addToCart(product.product_ID)">
                    <i class="fas fa-cart-plus"></i>
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
                <button class="bg-red-500 text-white px-4 py-2 rounded-full" name="wishlist" id="wishlist">Add to Wishlist</button>
              </div>
              <div class="table-cell">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-full" name="cart" id="cart">Add to Cart</button>
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

<!-- section 3 -->
<section id="section3" class="bg-gray-100 py-8 bg-cover bg-center h-screen flex items-center justify-center relative">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold mb-4 text-center">What our Customers Say</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <div v-for="(testimonial, index) in testimonials" :key="index" class="bg-white shadow rounded-lg p-4">
          <h3 class="text-xl font-semibold mb-2">{{ rate.name }}</h3>
          <div class="flex items-center mb-2">
            <div class="star-rating">
              &#9733; <!-- HTML entity for a solid star -->
            </div>
            <div class="ml-1 text-gray-700">{{ rate.ratings }} stars</div>
          </div>
          <p class="text-gray-700 mb-4">{{ rate.message }}</p>
        </div>
      </div>
      <button @click="showMore = !showMore" class="absolute bottom-4 right-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">See More</button>
    </div>
  </section>

  
  <script src="../assets/css/bootstrap.js"></script>
  <script src="../assets/productsmodal.js"></script>
    <script src="../assets/drop_down.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/product.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>



