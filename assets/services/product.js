const { createApp } = Vue;
createApp({
    data(){
        return{
            productID: '',
            product_ID: '',
            name: '',
            qty: '',
            image: '',
            price: '',
            desc: '',
            products : [],
            search: []
        }
    },
    methods:{
        addproducts: function(e) {
            e.preventDefault();
            var form = e.currentTarget;  // Get the form element
            const vue = this;
            var data = new FormData(form);  // Create FormData from the form element
            data.append("method", "AddProduct");
            axios.post('../includes/router.php', data)
                .then(function(r) {
                    if(r.data == 200) {
                        vue.GetProduct();
                        window.location.reload();
                    }
                });
        },
        GetProduct:function(){
            var vue = this;
            var data = new FormData();
            data.append("method", "getAllProducts");
            axios.post('../includes/router.php', data)
            .then(function(r){
                vue.products = [];
                for(var v of r.data){
                    vue.products.push({
                        id : v.product_ID,
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
        searchproduct:function(search){
            var data = new FormData();
            const vue = this;
            data.append("method","searchProduct");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.products = [];
                for(var v of r.data){
                    if(v.name.toLowerCase().includes(search.toLowerCase()) ||
                    v.qty.toString().includes(search.toString())) {
                        vue.products.push({
                            name : v.product_name,
                            qty : v.product_qty
                        })
                    }
                }
            })
        },
        getProductById:function(productID){
            var data = new FormData();
            var vue = this;
            data.append("method","getProductById");
            data.append("product_ID",productID);
            axios.post('../includes/router.php',data)
            .then(function(r){
                console.log(r.data);
                for(var v of r.data){
                    vue.products.push({
                        id : v.product_ID,
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
        updateProduct:function(product_ID){
            
            if(confirm('Are you sure you want to update')){
                const vue = this;
                var data = new FormData();
                data.append("method","getUpdateProduct");
                data.append("product_ID",product_ID);
                axios.post('../includes/router.php',data)
                alert(r.data)
                .then(function(r){
                    if(r.data == "SuccessfullyUpdated"){
                        vue.GetProduct();
                        alert("SuccessfullyUpdated");
                    }
                })
            }
        }
    },
    created:function(){
        this.GetProduct();
    }
}).mount('#product')