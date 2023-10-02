const { createApp } = Vue;
createApp({
    data(){
        return{
            username: '',
            comment: '',
            id : '',
            name : '',
            qty: '',
            image: '',
            price: '',
            desc: '',
            search: '',
            plants: [],
        }
    },
    methods:{
        displayProduct:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayAll");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.plants = [];
                for(var v of r.data){
                    vue.plants.push({
                        id : v.plantsID,
                        name : v.plantsName,
                        qty : v.plantsQty,
                        image : v.plantsImage,
                        price : v.plantsPrice,
                        desc : v.plantsDesc,
                        username : v.plantsUsername,
                        comment: v.plantsComment,
                    })
                }
            })
        }
    },
    computed:{

    },
    created:function(){
        this.displayProduct();
    }
}).mount('#displayProd')