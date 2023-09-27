<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-80" id="CSLogin">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>
        <!-- <form onsubmit="return login()"> -->
            <form @submit="login">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="text" id="email" name="email" class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="mb-4">
                <label for="login-password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="login-password" name="password" class="mt-1 p-2 w-full border rounded">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
        </form>
        <div class="mt-4 text-sm text-gray-600">
            Don't have an account? <a href="register.php" id="create-account-link" class="text-blue-500 hover:underline">Create one</a>.
        </div>
    </div>

    <!-- Customer Details Modal (Initially hidden) -->
    <div class="modal" id="customerDetailsModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Customer Details</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <!-- Add your customer details fields here -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="current-address" class="block text-sm font-medium text-gray-600">Current Address</label>
                        <input type="text" id="current-address" name="current-address" class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="permanent-address" class="block text-sm font-medium text-gray-600">Permanent Address</label>
                        <input type="text" id="permanent-address" name="permanent-address" class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="contact-number" class="block text-sm font-medium text-gray-600">Contact Number</label>
                        <input type="text" id="contact-number" name="contact-number" class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-600">Gender</label>
                        <select id="gender" name="gender" class="mt-1 p-2 w-full border rounded">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="birthday" class="block text-sm font-medium text-gray-600">Birthday</label>
                        <input type="date" id="birthday" name="birthday" class="mt-1 p-2 w-full border rounded">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="saveCustomerDetails()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeCustomerDetailsModal()">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="assets/axios.js"></script>
    <script src="assets/vue.3.js"></script>
    <script src="assets/CSLogin.js"></script> -->
    <script src="assets/login_modal.js"></script>
    </body>
</html>