const { createApp } = Vue;
createApp({
    data(){
        return{
            name: '',
            image: '',
            price: '',
            desc: '',
            product: [],
            products : [],
            productsFromIndex : [],
            product_ID: 0,
            selectedId: 0,
            search: '',
        }
    },
    methods:{
        addproducts: function(e) {
            e.preventDefault();
            var form = e.currentTarget;  
            const vue = this;
            var data = new FormData(form); 
            data.append("method", "AddProduct");
            
            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function(r) {
                    if (r.data == 200) {
                        vue.GetProduct();
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Created',
                            showConfirmButton: false,
                            timer: 1500  
                        }).then(function() {
                            window.location.reload();
                        });
                    }
                });
        },     
        GetProduct:function(){
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProducts");
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function(r){
                vue.products = [];
                for(const v of r.data){
                    vue.products.push({
                        product_ID : v.product_ID,
                        image : v.product_image,
                        name: v.product_name,
                        price: v.product_price,
                        qty: v.product_qty,
                        des: v.product_des,
                        data: v.created_date,
                    })
                }
            })
        },      
        GetProductFromIndex:function(){
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProductFromIndex");
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function(r){
                vue.productsFromIndex = [];
                for(const v of r.data){
                    vue.productsFromIndex.push({
                        product_ID : v.product_ID,
                        image : v.product_image,
                        name: v.product_name,
                        price: v.product_price,
                        qty: v.product_qty,
                        des: v.product_des,
                        data: v.created_date,
                    })
                }
            })
        },      
        fnGetDataProducts: function(product_ID) {
            const vue = this;
            var data = new FormData();
            data.append("method", "getProductById");
            data.append("product_ID", product_ID); 
            axios.post('/florafusionmarket/includes/router.php', data)
              .then(function(response) {
                if (response.data.length > 0) {
                  var product = response.data[0]; 
                  vue.name = product.product_name;
                  vue.desc = product.product_des; 
                  vue.price = product.product_price;
                  vue.product_ID = product.product_ID;
                  vue.image = '/florafusionmarket/assets/img/' + product.product_image;
               
                } else {
                  console.error('No data returned from the server.');
                }
              })
              .catch(function(error) {
                console.error('Error:', error);
              });
          },
          
        getProductById:function(product_ID){
            const vue = this;
            var data = new FormData();
            data.append("method", "getProductById");
            data.append("product_ID",product_ID);
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function(r){
                for(var v of r.data){
                    vue.qty = v.product_qty;
                    vue.price = v.product_price;
                    vue.product_ID = v.product_ID;
                }
            })
            .catch(function(error) {
                console.error(error);
            });
        },
        GETselectedId:function(id){
            this.selectedId = id;
        },
        updateProduct:function(){
            // if(confirm('Are you sure you want to update')){
                const vue = this;
                var data = new FormData();
                data.append("method","getThisUpdateProduct");
                data.append("product_ID",vue.selectedId);
                data.append("qty",document.getElementById('qytUpt').value);
                data.append("price",document.getElementById('priceUpt').value);
                axios.post('../includes/router.php',data)
                .then(function(r){
                    alert(r.data);
                    if(r.data == "SuccessfullyUpdated"){
                        vue.GetProduct();
                        alert("SuccessfullyUpdated");
                    }
                })
            // }
        },

        deleteProduct: function(id) {
            Swal.fire({
                title: 'Are you sure you want to delete this product?',
                // text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF0000', 
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    const vue = this;
                    var data = new FormData();
                    data.append("method", "deleteProduct");
                    data.append("product_ID", id);
                    axios.post('../includes/router.php', data)
                        .then(function(r) {
                            if (r.data == 200) {
                                vue.GetProduct();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully Deleted',
                                    showConfirmButton: false,
                                    timer: 1500  
                                }).then(function() {
                                
                                    window.location.reload();
                                });
                            }
                        });
                }
            });
        },
        addToCart:function(product_ID){
            const vue = this;
            var data = new FormData();
            data.append("method","addToCart");
            data.append("product_ID",product_ID)
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function(r){
                if(r.data == 200){
                    toastr.success('Successfully addded to Cart');
                }
            })
        },
        addToWishlist:function(product_ID){
            const vue = this;
            var data = new FormData();
            data.append("method","addToWishlist");
            data.append("product_ID",product_ID)
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function(r){
                if(r.data == 200){
                    toastr.success('Successfully addded to Wishlist');
                }
            })
        },
    },        
    computed:{
        searchData(){
            if(!this.search){
                return this.products;
            }
            return this.products.filter(product => product.name.toLowerCase().includes(this.search.toLowerCase()) );
        }
    },
    created:function(){
        this.GetProduct();
        this.getProductById();
        this.GetProductFromIndex();
    }
}).mount('#product')