<div class="flex items-center md:order-2" id="CSLoginRegister">
    <!-- Login Button -->
    <button id="loginButton" class="bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600">Login</button>

    <!-- Modal for Login -->
    <div id="loginModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="modal-container">
            <div class="modal-content bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Login</h2>
                <form onsubmit="return login()" @submit="login">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="text" id="email" name="email" class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="login-password" class="block text-sm font-medium text-gray-600">Password</label>
                        <input type="password" id="login-password" name="password"
                            class="mt-1 p-2 w-full border rounded">
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
                </form>
                <div class="mt-4 text-sm text-gray-600" onclick="toggleModal('loginModal', 'createAccountModal')">
                    Don't have an account? <a href="#" id="create-account-link"
                        class="text-blue-500 hover:underline">Create one</a>.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Create Account -->
    <div id="createAccountModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
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
                <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Sign
                    Up</button>
            </form>
            <div class="mt-4 text-sm text-gray-600">
                Already have an account? <a href="#" id="login" class="text-blue-500 hover:underline"
                    onclick="toggleModal('createAccountModal', 'loginModal')">Login</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>




<script src="assets/services/axios.js"></script>
<script src="assets/services/vue.3.js"></script>
<script src="assets/services/CSLogin.js"></script>
<!-- <script src="assets/CSRegister.js"></script> -->