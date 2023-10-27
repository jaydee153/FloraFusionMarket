const { createApp }  = Vue;
createApp({
    data(){
        return{
            seller : [],
            sellerLength : 0
        }
    },
    methods:{
        displaySellerInfo:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displaySellerInfo");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.seller = [];
                for(const v of r.data){
                    vue.seller.push({
                        id: v.id,
                        name: v.name,
                        role: v.role,
                        status: v.status,
                        image: v.image,
                        contact_no: v.contact_no,
                        permanent_add: v.permanent_add,
                    })
                }
                vue,sellerLength = r.data.length;
                return this.sellerLength;
            })
        }
    },
    created:function(){
        this.displaySellerInfo();
    }
}).mount('#sellerInfo')