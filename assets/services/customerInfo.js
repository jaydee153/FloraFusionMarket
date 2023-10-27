const { createApp }  = Vue;
createApp({
    data(){
        return{
            customer: [],
            customerLength : 0
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
        }
    },
    created:function(){
        this.getCustomer();
    }
}).mount('#customerInfo')