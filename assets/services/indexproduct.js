// Assets->services (create js name index product.js) -> 

var data = new FormData();
data.append("method", "displayallprod");
axios.post('/florafusionmarket/includes/router.php', data)
.then(function(r){
    var data = r.data;
    var parent = document.querySelector('#section2');
    // data = data.slice(0,3);
    
    data.forEach(product => {
      var child = document.createElement('div');
      child.className = 'container mx-auto px-4';
      child.innerHTML = `
        <div class="max-w-5xl mx-auto p-4">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <div class="p-2 w-64 m-2">
              <div class="bg-white rounded-lg shadow-md relative">
                <img data-bs-toggle="modal"  data-id =" ${product.product_ID}" data-bs-target="#View" src="/florafusionmarket/assets/img/${product.product_image}" alt="plant" class="w-full h-36 object-cover cursor-pointer">
                <div class="p-3 text-center"> 
                  <h3 class="text-lg font-semibold mb-2">${product.product_name}</h3>
                  <p class="text-gray-600">${product.product_des}</p>
                  <div class="mt-2">
                    <span class="text-blue-500 font-semibold">${product.product_price}</span>
                    <span class="text-gray-500 ml-2 line-through">${product.oldPrice}</span>
                  </div>
                  <div class="mt-3 flex justify-center">
                    <button class="text-red-500 hover:text-gray-500">
                      <i class="fas fa-heart"></i>
                    </button>
                    <button class="text-green-600 hover:text-gray-500 ml-2" onclick="addToCart(${product.product_ID})">
                      <i class="fas fa-cart-plus"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`;
    
      parent.appendChild(child);
    });    
})



$(document).on('click','.cursor-pointer',function(){
  var id = $(this).data('id');
  var data = new FormData();
  data.append("method", "displayIndip");
  data.append('id',id);
  axios.post('/florafusionmarket/includes/router.php', data)
  .then(function(r){
      var data = r.data;
      console.log(data);

      data.forEach((view)=>{
        var image = document.getElementById('image');
        image.textContent = view.product_image;

       var indiname = document.getElementById('indi-name');
       indiname.textContent = view.product_name;

       var indiprice = document.getElementById('indi-price');
       indiprice.textContent = view.product_price;


       var indidesc = document.getElementById('indi-desc');
       indidesc.textContent = view.product_des;


      })
  });

});