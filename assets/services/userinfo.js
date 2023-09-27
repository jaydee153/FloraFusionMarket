const { createApp } = Vue;
createApp({
    data() {
        return {
            image: '',
            name: '',
            current_add: '',
            permanent_add: '',
            contact_number: '',
            gender: '',
            birthday: '',
        }
    },
    methods: {
        updateInfo: function () {
            if (confirm("Are you sure you want to Update ?")) {
                e.preventDefault();
                var form = e.currentTarget;
                var vue = this;
                var data = new FormData(form);
                data.append("method", "updateInfo");
                axios.post('./includes/router.php', data)
                .then(function (r) {
                    if (r.data == "Successfully Inserted") {
                        // alert('Successfully');
                        alert(r.data);
                        vue.GetProduct();
                        document.querySelector(".insertInfo").reset();
                    }
                })
            }
        }
    }
}).mount('#userinfo')