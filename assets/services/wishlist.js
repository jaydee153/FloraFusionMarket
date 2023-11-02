const { createApp } = Vue;
createApp({
    data(){
        return{
            product_name: '',
            product_price: '',
            product_image: '',
            id: 0,
            wishlist: []
        }
    },
    methods:{
        dipslayWishlist:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","dipslayWishlist");
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function(r){
                vue.wishlist = [];
                for(var v of r.data){
                    vue.wishlist.push({
                        product_name : v.product_name,
                        product_price: v.product_price,
                        product_image : v.product_image
                    })
                }
            })
        },
        deleteWishlist:function(id){
            const vue = this;
            var data = new FormData();
            data.append("method","deleteWishlist");
            data.append("id",id);
            axios.post('../includes/router.php',data)
            .then(function(r){
                if(r.data == 200){
                    vue.dipslayWishlist();
                    toastr.success('Deleted To Wishlist');
                }
            })
        }
    },
    created:function(){
        this.dipslayWishlist();
    }
}).mount('#wishlist')