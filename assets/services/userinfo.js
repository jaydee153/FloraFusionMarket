const { createApp } = Vue;
createApp({
    data() {
        return {

        }
    },
    methods: {
        CSInfo: function () {
            var data = new FormData();
            data.append("method", "addUserInfo");
            data.append("file", document.getElementById('file').files[0]);
            data.append("currentAddress", document.getElementById('currentAddress').value);
            data.append("permanentAddress", document.getElementById('permanentAddress').value);
            data.append("contactNo", document.getElementById('contactNo').value);
            data.append("gender", document.getElementById('gender').value);
            data.append("birthday", document.getElementById('birthday').value);
          
            axios.post('../includes/router.php', data)
              .then(function (r) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Successfully saved',
                  showConfirmButton: false, // Hide the "OK" button
                  timer: 2000, // Automatically close the alert after 2 seconds
                  onClose: function() {
                    window.location.reload(); // Reload the page after the alert is closed
                  }
                });
              })
              .catch(function (error) {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'An error occurred while processing your request.',
                });
              });
          },
    }
}).mount('#userinfo')