const { createApp } = Vue;
createApp({
  data() {
    return {
      
    };
  },
  methods: {
    CSInfo: function () {
      var data = new FormData();
      data.append("method", "addUserInfo");
      data.append("file", document.getElementById('file').files[0]);
      data.append("name", document.getElementById('name').value);
      data.append("email", document.getElementById('email').value);
      data.append("current_add", document.getElementById('current_add').value);
      data.append("permanent_add", document.getElementById('permanent_add').value);
      data.append("contact_no", document.getElementById('contact_no').value);
      data.append("gender", document.getElementById('gender').value);
      data.append("birthday", document.getElementById('birthday').value);

      axios.post('../includes/router.php', data)
        .then(function (r) {
          // Simple browser alert for success
          alert('Successfully updated');
          window.location.reload(); // Reload the page

        })
        .catch(function (error) {
          // Simple browser alert for error
          alert('An error occurred while processing your request.');
        });
    }
  }
}).mount('#userinfo');
