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
            product_ID: 0,
            selectedId: 0,
            search: '',
        }
    },
    methods:{
        GetProductFromIndex:function(){
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProductFromIndex");
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
        this.GetProductFromIndex();
    }
}).mount('#adminInventory')