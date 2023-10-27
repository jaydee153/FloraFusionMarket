const { createApp } = Vue;
createApp({
    data(){
        return{
            customer: [],
            seller : [],
            customerLength : 0,
            sellerLength : 0,
        }
    },
    methods:{
        getCustomer:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayCustomerInfo");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.customer = [];
                for(const v of r.data){
                    vue.customer.push({
                        id: v.id,
                        name: v.name,
                        role: v.role,
                        status: v.status,
                        image: v.image,
                        contact_no: v.contact_no,
                        permanent_add: v.permanent_add,
                    })
                }
                vue.customerLength = r.data.length;
                return vue.customerLength;
            })
        },
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
                vue.sellerLength = r.data.length;
                return this.sellerLength;
            })
        }
    },
    created:function(){
        this.getCustomer();
        this.displaySellerInfo();
    }
}).mount('#adminIndex')