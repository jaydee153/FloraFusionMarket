// const { createApp } = Vue;
// createApp({
//     data(){
//         return{
//             name: '',
//             image: '',
//             price: '',
//             desc: '',
//             product: [],
//             products : [],
//             product_ID: 0,
//             selectedId: 0,
//             search: '',
//         }
//     },
//     methods:{
//         fnGetDataProducts: function(product_ID) {
//             const vue = this;
//             var data = new FormData();
//             data.append("method", "getProductById");
//             data.append("product_ID", product_ID); 
//             axios.post('/florafusion/includes/router.php', data)
//               .then(function(response) {
//                 if (response.data.length > 0) {
//                   var product = response.data[0]; 
//                   vue.name = product.product_name;
//                   vue.desc = product.product_des; 
//                   vue.price = product.product_price;
//                   vue.product_ID = product.product_ID;
//                   vue.image = '/florafusion/assets/img/' + product.product_image;
               
//                 } else {
//                   console.error('No data returned from the server.');
//                 }
//               })
//               .catch(function(error) {
//                 console.error('Error:', error);
//               });
//           },
//     },
//     computed:{

//     },
// }).mount('#displayProd')