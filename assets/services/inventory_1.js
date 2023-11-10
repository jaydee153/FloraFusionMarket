$(document).ready(function() {
    var data = new FormData();
    data.append("method", "displayAllinve");
    axios.post('/florafusionmarket/includes/router.php', data)
        .then(function(r) {
            var data = r.data;
            var parent = document.querySelector('#inventorytable');
            data.forEach((item)=>{
                var child = document.createElement('tbody');

                    child.innerHTML = `
                    <tr>
                    <td scope="row"><img class="rounded" style="height:100px; width:150px; object-fit:cover !important;"  src="../assets/img/${item.product_image}"></td>
                    <td>${item.product_name}</td>
                    <td>${item.product_qty}</td>
                    <td><button class="btn btn-primary updateprod" data-id="${item.pid}" data-bs-toggle="modal" data-bs-target="#updateproduct">Update</button> 
                    <button class="btn btn-danger deleteprod" data-id="${item.pid}">Delete</button></td>
                    </tr>
                    `;

                    parent.appendChild(child);
                     
            $('#inventorytable').DataTable();
            }) 
        });
});

//add inventory sellers
$(document).ready(function () {
    $('#addprod').on('submit', function (e) {
        e.preventDefault();
        var data = new FormData(this); 
        data.append("method", "addSellprod");
        axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (r) {
                console.log(r);
                if(r){
                    Swal.fire({
                        position: "center",
                        confirmButtonText: "Okay",
                        icon: "success",
                        title: "Product has been saved",
                        showConfirmButton: false,
                        timer: 1500
                      }).then((result) => {
                        if(result){
                            location.reload();
                        }
                      })
                }
                else{
                    alert("not Added");
                }
            })
            .catch(function (error) {
                console.error(error);
            });
    });
});

// update inventory sellers
$(document).ready(function () {
   $(document).on('click','.updateprod',function(){
        var id = $(this).data('id');
    $('#updateprod').on('submit', function (e) {
        e.preventDefault();
        var data = new FormData(this); 
        data.append('id',id);
        data.append("method", "updateinve");
        axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (r) {
                   if(r){
                    Swal.fire({
                        position: "center",
                        confirmButtonText: "Okay",
                        icon: "success",
                        title: "Product has been updated",
                        showConfirmButton: false,
                        timer: 1500
                      }).then((result) => {
                        if(result){
                            location.reload();
                        }
                      })
                    }
                    else{
                        Swal.fire({
                            position: "center",
                            confirmButtonText: "Okay",
                            icon: "error",
                            title: "Update failed",
                            showConfirmButton: false,
                            timer: 1500
                          }).then((result) => {
                            if(result){
                                location.reload();
                            }
                          })
                    }
            })
            .catch(function (error) {
                console.error(error);
            });
    });
   })


});




//get update info
$(document).on('click','.updateprod',function(){
    var id=$(this).data('id');

    var data = new FormData(); 
    data.append("method", "displayUPAllinve");
    data.append("id",id);
    axios.post('/florafusionmarket/includes/router.php', data)
        .then(function (r) {
            

            var data = r.data;


            data.forEach((item)=>{

                console.log(item.product_des);
                var pnames = document.querySelector('.upname');
                pnames.value= item.product_name;
               
                var upprices = document.querySelector('.upprice');
                upprices.value= item.product_price;

                var upquantitys = document.querySelector('.upquantity');
                upquantitys.value= item.product_qty;

                var upquantitys = document.querySelector('.upquantity');
                upquantitys.value= item.product_qty;

                // not function 
                var upimages = document.querySelector('.upimage');
                upimages.value= item.product_image;

                var updescs = document.querySelector('.updesc');
                updescs.value= item.product_des;


                
            });
            

        })
        .catch(function (error) {
            console.error(error);
        });

});

//delete inventory
$(document).on('click','.deleteprod',function(){
    var id = $(this).data('id');
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            var data = new FormData(); 
            data.append("method", "deleteIn");
            data.append("id",id);
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function(r){
                if(r){
                    Swal.fire({
                        title: "Deleted!",
                        text: "This product has been deleted.",
                        icon: "success"
                      }).then((result)=>{
                        if(result){
                            location.reload();
                        }
                      });
                }
                else{
                    Swal.fire({
                        title: "Deleted!",
                        text: "Failed",
                        icon: "Error"
                      });
                }
               
        
            });
        }
      });
});