const { createApp } = Vue;
createApp({
    data(){
        return{
            name: '',
            msg: "Hello world",
            image: '',
            price: '',
            desc: '',
            product: [],
            products : [],
            product_ID: 0,
            selectedId: 0,
            search: '',
        }
    },
    methods:{
        addproducts: function(e) {
            e.preventDefault();
            var form = e.currentTarget;  // Get the form element
            const vue = this;
            var data = new FormData(form);  // Create FormData from the form element
            data.append("method", "AddProduct");
            axios.post('/florafusion/includes/router.php', data)
                .then(function(r) {
                    if(r.data == 200) {
                        vue.GetProduct();
                        window.location.reload();
                    }
                });
        },
        GetProduct:function(){
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProducts");
            axios.post('/florafusion/includes/router.php', data)
            .then(function(r){
                vue.products = [];
                for(var v of r.data){
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

        deleteProduct:function(id){
            if(confirm("Are you sure you to Delete this Product")){
                const vue = this;
                var data = new FormData();
                data.append("method","deleteProduct");
                data.append("product_ID", id);
                axios.post('../includes/router.php', data)
                .then(function(r){
                    if(r.data == 200){
                        vue.GetProduct();
                        alert("Successfully Deleted");
                    }
                })
            }
        }
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
    }
}).mount('#product')