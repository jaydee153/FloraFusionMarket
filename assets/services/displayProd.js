const { createApp } = Vue;
createApp({
    data(){
        return{
            image: '',
            id: 0,
            name: '',
            qty: '',
            price: '',
            desc: '',
            up: [],
            userProduct: [],
            search: '',
            
        }
    },
    methods:{
        addUserProduct:function(e){
            e.preventDefault();
            var form = e.currentTarget;  
            const vue = this;
            var data = new FormData(form); 
            data.append("method","AddProduct");
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function(r) {
                if(r.data == 200) {
                    vue.getUserProduct();
                    toastr.success('Successfully Added');
                    window.location.reload();
                }
            })
        },
        getUserProduct:function(){
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProducts");
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function(r){
                vue.userProduct = [];
                for(const v of r.data){
                    vue.userProduct.push({
                        id : v.product_ID,
                        image : v.product_image,
                        name: v.product_name,
                        price: v.product_price,
                        qty: v.product_qty,
                        desc: v.product_des,
                        data: v.created_date,
                    })
                }
            })
        },
    },
    computed:{
        searchData(){
            if(!this.search){
                return this.userProduct;
            }
            return this.userProduct.filter(up => up.name.toLowerCase().includes(this.search.toLowerCase()) );
        }
    },
    created:function(){
        this.getUserProduct();
    }
}).mount('#displayProd')