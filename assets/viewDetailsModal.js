
// table display orders
$(document).ready(function() {
  var data = new FormData();
  data.append("method", "displayAllOrders");

  axios.post('../includes/router.php', data)
      .then(function(r) {
          var parent = document.querySelector('#orders');
          var data = r.data;
          console.log(data);
          parent.innerHTML = '';          

          data.forEach(function(order) {
              var row = document.createElement('tr');
              row.innerHTML = `
                <td>${order.order_id}</td>
                <td>${order.user_name}</td>
                <td>${order.order_date}</td>
                <td>P${order.total_amount}</td>
                <td><span ${order.status=='0' ? "class='badge bg-danger text-white'" : "class='badge bg-success text-white'"}>${order.status == '0' ? "Pending" : "Delivered"}</span></td>
               
                <td>
                    <button class="btn btn-primary view-order" data-id="${order.order_id}" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>
                    <button class="btn btn-danger delete-order" data-id="${order.order_id}">Delete</button>
                </td>
              `;
              parent.appendChild(row);
          });
          $('#der').DataTable({
              "paging": true,
              "searching": true,
              "lengthMenu": [10, 25, 50, 100],
              "order": [[0, 'asc']]
          });
      })
      .catch(function(error) {
          console.error(error);
      });
});


// delete orders detatails
$(document).on('click', '.delete-order', function() {
  var id=$(this).data('id');
  var data = new FormData();
  data.append('method', 'deletesellersOrders');
  data.append('id', id);

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

      axios.post('../includes/router.php', data)
      .then(function(response) {
        if (response.status === 200) {
          Swal.fire("Saved!", "", "success").then(() => {
            location.reload();
          });
        } else {
          Swal.fire("Error", "Failed to save changes", "error");
        }
      })
      .catch(function(error) {
        console.error(error);
        Swal.fire("Error", "An error occurred", "error");
      });
    } 
  else if (result.isDenied) {
    Swal.fire("Delete Cancel", "", "warning").then(() => {
      location.reload();
    });
    }
  });



 

 
});


// view  orders detatails
$(document).on('click', '.view-order', function() {
  var id= $(this).data('id');
  var data = new FormData();
  data.append('method', 'viewsellersOrders');
  data.append('id', id);
  axios.post('../includes/router.php', data)
      .then(function(r) {
            var data = r.data;
            console.log(data);

            var parenttable = document.querySelector('#product-info');
            data.forEach(function(order){
             var orderid =document.getElementById('orderNumber');
             orderid.innerHTML= order.order_id;

             var cname =document.getElementById('cname');
             cname.innerHTML= order.order_name;
  
             var orderdate=document.getElementById('orderDate');
             orderdate.innerHTML= order.order_date;

             var add=document.getElementById('add');
             add.innerHTML= order.current_add;

             var delivered = document.getElementById('delivered');
             delivered.setAttribute('data-id', order.order_id);
             
             var add=document.getElementById('cnum');
             add.innerHTML= order.contact_no;

             var child = document.createElement('tr');

             child.innerHTML = `     <tr>
             <td class="border px-4 py-2">${order.product_name}</td>
             <td class="border px-4 py-2">${order.quantity}</td>
             <td class="border px-4 py-2">${order.product_price}</td>
             <td class="border px-4 py-2">${order.total_amount}</td>
           </tr>`;

           parenttable.appendChild(child);
            });
      })
      .catch(function(error) {
          console.error(error);
      });
});


// doUpdateStatus

$(document).on('click', '#delivered', function() {
  var id = $(this).data('id');
  alert(id);
  var data = new FormData();
  data.append('method', 'updatestatusOrders');
  data.append('id', id);

  Swal.fire({
    title: "Do you want to deliver this product?",
    showDenyButton: true,
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      axios.post('../includes/router.php', data)
        .then(function(response) {
          if (response.status === 200) {
            Swal.fire("Saved!", "", "success").then(() => {
              location.reload();
            });
          } else {
            Swal.fire("Error", "Failed to save changes", "error");
          }
        })
        .catch(function(error) {
          console.error(error);
          Swal.fire("Error", "An error occurred", "error");
        });
    } else if (result.isDenied) {
      Swal.fire("Delivered Cancel", "", "warning").then(() => {
        location.reload();
      });
    }
  });
});