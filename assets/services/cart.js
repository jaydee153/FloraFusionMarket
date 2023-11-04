const { createApp } = Vue;
createApp({
    data(){
        return{
            p_name: '',
            p_price: '',
            p_quantity: '',
            p_totalPrice: '',
            id: 0,
            inte: 1,
            c: [],
            carts: [],
            order_id:0,
            product_id: 0,
            date: '',
            name:'',
            email:'',
            permanent_add: '',
            contact_no: '',
            orders:[],
        }
    },
    methods: {
      decrement(item) {
        if (item.p_quantity > 1) {
          item.p_quantity--;
          this.updateTotalPrice(item);
        }
      },
      increment(item) {
        item.p_quantity++;
        this.updateTotalPrice(item);
      },
      updateTotalPrice(item) {
        item.p_totalPrice = item.p_price * item.p_quantity;
      },
    // methods:{
    //     plus(num, id){
    //         let price = document.getElementById(id).value++;
    //         var vue = this;
    //         var data = new FormData();
    //         data.append('method', 'updateCartIdPrice');
    //         data.append('price', price);
    //         data.append('id', id);
    //         axios.post('/florafusionmarket/includes/router.php',data)
    //             .then(function(r){
    //                 if(r.data == 200){
    //                     toastr.success('Successfully increase the Quantity');
    //                 }
    //                 window.location.reload();
    //                 // if(r.data = 'SuccessfullyUpdated'){
    //                 //     vue.displayCart();
    //                 // }else{
    //                 //     alert(1);
    //                 // }
    //             })
    //     },
    //     minus(num, id){
    //         let price = document.getElementById(id).value--;
    //         var vue = this;
    //         var data = new FormData();
    //         data.append('method', 'updateCartIdPrice');
    //         data.append('price', price);
    //         data.append('id', id);
    //         axios.post('/florafusionmarket/includes/router.php',data)
    //             .then(function(r){
    //                 if(r.data == 200){
    //                     toastr.success('Successfully increase the Quantity');
    //                 }
    //                 // if(r.data = 'SuccessfullyUpdated'){
    //                 //     // vue.displayCart();
    //                 // }else{
    //                 //     alert(1);
    //                 // }
    //             })
    //     },
        displayCart:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","DisplayCart");
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function(r){
                vue.carts = [];
                for(var v of r.data){
                    vue.carts.push({
                        p_name : v.product_name,
                        p_price : v.product_price,
                        p_quantity : v.quantity,
                        p_totalPrice : v.totalPrice,
                        id : v.cart_id,
                    })
                }
            })
        },
        deleteCart:function(id){
            const vue = this;
            var data = new FormData();
            data.append("method","DeleteCart");
            data.append("id",id)
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function(r){
                if(r.data == 200){
                    vue.displayCart();
                    toastr.success('Deleted to Cart');
                }
            })
        },
        checkOut:function(product_id){
            const vue = this;
            var data = new FormData();
            data.append("method","checkOut");
            data.append("product_id",product_id);
            axios.post('../includes/router.php',data)
            .then(function(r){
                if(r.data == 200){
                    toastr.success('CheckOut');
                }
            })
        },
        DisplayOrder:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayOrderInfo");
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function (r){
                vue.orders = [];
                for(var r of r.data){
                    vue.orders.push({
                        order_id : v.order_id,
                        date: v.order_date,
                        name:v.name,
                        email: v.email,
                        permanent_add: v.permanent_add,
                        contact_no: v.contact_no,
                        p_name : v.product_name,
                        p_quantity: v.quantity,
                        p_price: v.product_price,
                        p_totalPrice: v.totalPrice
                    })
                }
            })
        }
    },
    created:function(){
        this.displayCart();
        this.DisplayOrder();
    }
}).mount('#cart')