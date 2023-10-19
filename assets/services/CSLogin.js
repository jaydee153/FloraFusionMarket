 const { createApp } = Vue;
createApp({
    data(){
        return{
            name: '',
            email: '',
            password: '',
            role: ''
        }
    },
    methods:{
      login: function (e) {
        e.preventDefault();
      
        var data = new FormData(e.currentTarget);
        data.append("method", "Login");
      
        axios.post('../florafusionmarket/includes/router.php', data)
          .then(function (r) {
            if (r.data == 1) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Successfully Login',
                color:'green',
                showConfirmButton: false, 
                timer: 1500
              }).then(function () {
                window.location.href = "./Customer/index.php";
              });
            } else if (r.data == 2) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Successfully Login',
                showConfirmButton: false, 
                timer: 1500
              }).then(function () {
                window.location.href = "./Seller/index.php";
              });
            } else if (r.data == 0) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Welcome To Admin Dashboard',
                showConfirmButton: false, 
                timer: 1500 
              }).then(function () {
                window.location.href = "./Admin/index.php";
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Try Again To log in',
              });
            }
          })
          .catch(function (error) {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An error occurred while processing your request.',
            });
          });
    },
       
        Register:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            var vue = this;
            var data = new FormData(form);
            data.append("method","Register");
            axios.post('../florafusionmarket/includes/router.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert('Successfully Register');
                    // window.location.href ="cus_info.php";
                    window.location.reload();
                }
                else if(r.data == 2){
                    alert('Successfully Register');
                    // window.location.href ="cus_info.php";
                    window.location.reload();
                }
                else if(r.data == 3){
                    alert('Already Registered');
                }
                else{
                    // alert("Please Try Again");
                    alert(r.data);
                }
            });
        },
    }
}).mount('#CSLoginRegister')