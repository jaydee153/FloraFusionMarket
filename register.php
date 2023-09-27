<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Registration Page</title>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-80" id="CSRegister">
        <h2 class="text-2xl font-semibold mb-4">Create Account</h2>
        <form @submit="Register">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="username" name="username" class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="text" id="email" name="email" class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="mb-4">
                <label for="account-type" class="block text-sm font-medium text-gray-600">Account Type</label>
                <select id="account-type" name="role" class="mt-1 p-2 w-full border rounded">
                    <option value="1">Become A Customer</option>
                    <option value="2">Become A Seller</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Sign Up</button>
        </form>
        <div class="mt-4 text-sm text-gray-600">
            Already have an account? <a href="login.php" id="login" class="text-blue-500 hover:underline">Login</a>
        </div>
    </div>
</body>
<!-- <script src="assets/vue.3.js"></script>
<script src="assets/axios.js"></script>
    <script src="assets/CSRegister.js"></script> -->
</html>