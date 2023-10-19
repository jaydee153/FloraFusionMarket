<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../FloraFusionMarket/assets/css/tailwind.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
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
        max-width: 600px;
        margin: 2rem auto;
        padding: 1rem;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
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
  <a href="./index.php" class="flex items-center">
      <img src="../FloraFusion/assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion Market</span>
  </a>

  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="#section1" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
      </li>
      <li>
        <a href="#section2" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Product</a>
      </li>
      <li>
        <a href="#section3" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Reviews</a>
      </li>
    </ul>
  </div>
  <?php include 'loginregisterModal.php' ?>
  </div>
</nav>


<!-- section 1 -->
<section id="section1" class="bg-green-300 py-8 bg-cover bg-center h-screen flex items-center justify-center">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
    <div class="mt-10 ml-6">
      <h2 class="text-4xl font-bold mb-4 text-center text-green-800 mt-10">FloraFusion Market</h2>
      <p class="text-green-800 text-center mt-10 ml-6 mr-6">
        Welcome to our plant online marketplace, where nature's wonders are just a click away. 
        Embark on a botanical adventure, transform your living spaces into tranquil havens, 
        and revel in the beauty and serenity that plants effortlessly bestow. Let the 
        enchantment begin!
      </p>
      <div class="flex justify-center mt-10">
      <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 mb-10 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
    <i class="fas fa-shopping-cart w-5 h-5 mr-2 -ml-1"></i>
    <a href="loginregisterModal.php">Order now</a>
    </button>

    </div>
    </div>
    <div class="md:text-right mb-10 ml-6">
      <img src="../FloraFusion/assets/img/plant.jpeg" alt="plant" class="rounded-lg h-64 mt-10 mb-10 ml-6">
    </div>
  </div>
  </section>
<!-- section 2 -->

<div id="product">
  <section id="section2" class="bg-white py-8 bg-cover bg-center h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold mb-4">Featured Products</h2>
      <div class="max-w-5xl mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
          <div class="p-2 w-64 m-2" v-for="product in products" :key="product.product_ID">
            <div class="bg-white rounded-lg shadow-md relative">
              <img @click="fnGetDataProducts(product.product_ID)" data-bs-toggle="modal" data-bs-target="#View" :src="'/florafusion/assets/img/' + product.image" alt="plant" class="w-full h-36 object-cover cursor-pointer">
              <div class="p-3 text-center">
                <h3 class="text-lg font-semibold mb-2">{{ product.name }}</h3>
                <p class="text-gray-600">{{ product.des }}</p>
                <div class="mt-2">
                  <span class="text-blue-500 font-semibold">{{ product.price }}</span>
                  <span class="text-gray-500 ml-2 line-through">{{ product.oldPrice }}</span>
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
  <section id="section3" class="bg-gray-100 py-8 bg-cover bg-center h-screen flex items-center justify-center">
  <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-4">
    <h2 class="text-2xl font-semibold mb-4">Top 3 Store Seller Products</h2>

    <!-- Product 1 -->
    <div class="flex items-center mb-4">
        <img src="product1-image.jpg" alt="Product 1" class="w-20 h-20 object-cover rounded">
        <div class="ml-4">
            <h3 class="text-lg font-semibold">Product 1</h3>
            <p class="text-gray-600">Description of Product 1.</p>
            <div class="text-blue-500 font-semibold">Price: $100</div>
        </div>
    </div>

    <!-- Product 2 -->
    <div class="flex items-center mb-4">
        <img src="product2-image.jpg" alt="Product 2" class="w-20 h-20 object-cover rounded">
        <div class="ml-4">
            <h3 class="text-lg font-semibold">Product 2</h3>
            <p class="text-gray-600">Description of Product 2.</p>
            <div class="text-blue-500 font-semibold">Price: $80</div>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="flex items-center">
        <img src="product3-image.jpg" alt="Product 3" class="w-20 h-20 object-cover rounded">
        <div class="ml-4">
            <h3 class="text-lg font-semibold">Product 3</h3>
            <p class="text-gray-600">Description of Product 3.</p>
            <div class="text-blue-500 font-semibold">Price: $70</div>
        </div>
    </div>
</div>

  </section>

<script src="../assets/css/sweetalert.js"></script>
<script src="assets/css/bootstrap.js"></script>
  <script src="assets/productsmodal.js"></script>
    <script src="assets/drop_down.js"></script>
    <script src="assets/services/axios.js"></script>
    <script src="assets/services/vue.3.js"></script>
    <script src="assets/services/product.js"></script>
<script src="assets/loginModal.js"></script>

</body>
</html>



