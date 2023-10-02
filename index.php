<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../FloraFusionMarket/assets/css/tailwind.css">
    
    <title>Home</title>
</head>
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
<section id="section1" class="bg-green-300 py-8">
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
      <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 mb-10 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
        <a href="login.php">
          Order now
        </a>
      </button>
    </div>
    </div>
    <div class="md:text-right mb-10 ml-6">
      <img src="../FloraFusion/assets/img/plant.jpeg" alt="plant" class="rounded-lg h-64 mt-10 mb-10 ml-6">
    </div>
  </div>
  </section>
<!-- section 2 -->
  <section id="section2" class="bg-white py-8">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold mb-4">Featured Products</h2>
      <div class="max-w-5xl mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <!-- Product 1 -->
            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../FloraFusion/assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                   
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- product 2-->
            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../FloraFusion/assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                  </div>
            </div>
            <!-- product 3-->
            <div class="bg-white rounded shadow-md overflow-hidden">
                <div class="aspect-w-3 aspect-h-4">
                    <img src="../FloraFusion/assets/img/plant.jpeg" alt="Plant Product" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600">Easy to care for indoor plant.</p>
                    <div class="mt-2">
                        <span class="text-blue-500 font-semibold">199</span>
                        <span class="text-gray-500 ml-2 line-through">199</span>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        </button>
                    </div>
                  </div>
            </div>
    </div>
  </section>
<!-- section 3 -->
  <section id="section3" class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold mb-4">What our Customers Say</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <div class="bg-white shadow rounded-lg p-4">
          <h3 class="text-xl font-semibold mb-2">John Doe</h3>
          <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut lacus metus. Sed et imperdiet turpis, id blandit ante.</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
          <h3 class="text-xl font-semibold mb-2">Jane Smith</h3>
          <p class="text-gray-700 mb-4">Nulla venenatis ipsum a felis faucibus, ut fermentum metus tincidunt.</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
          <h3 class="text-xl font-semibold mb-2">Michael Johnson</h3>
          <p class="text-gray-700 mb-4">Fusce tincidunt dui in nisl egestas, in fringilla nunc auctor. Sed convallis tortor non libero eleifend aliquet.</p>
        </div>
      </div>
    </div>
  </section>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script> -->
<script src="assets/loginModal.js"></script>
</body>
</html>



