const { createApp } = Vue;
createApp({
    data() {
        return {

        }
    },
    methods: {
        CSInfo:function(){
            var data = new FormData();
            data.append("method","addUserInfo");
            data.append("image",document.getElementById('file').file);
            data.append("currentAddress", document.getElementById('currentAddress').value);
            data.append("permanentAddress",document.getElementById('permanentAddress').value);
            data.append("contactNo",document.getElementById('contactNo').value);
            data.append("gender",document.getElementById('gender').value);
            data.append("birthday",document.getElementById('birthday').value);
            axios.post('../includes/router.php',data)
            .then(function(r){
                alert(r.data);
            })
        },

    }
}).mount('#userinfo')