<!-- modal -->
<div id="order-details-modal" class="fixed inset-0 z-10 flex items-center justify-center hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <h2 class="text-2xl font-semibold mb-4">Order Details</h2>


            <form id="order-details-form">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="order-number">
                        Order Number
                    </label>
                    <p>
                        001
                    </p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="order-date">
                        Date
                    </label>
                    <!-- <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="order-date" type="text" placeholder="Date"> -->
                        <p>
                        January 19, 2023
                        </p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="customer-info">
                        Customer Info
                    </label>
                    <!-- <textarea
                        class="form-textarea border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="customer-info" placeholder="Customer Info"></textarea> -->
                        <p>
                        JJA, jja@gmail.com
                        </p>
                </div>


                <table class="w-full border-collapse mb-4">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4 text-left">Plant Name</th>
                            <th class="py-2 px-4 text-left">Qty</th>
                            <th class="py-2 px-4 text-left">Price</th>
                            <th class="py-2 px-4 text-left">Total Price</th>
                        </tr>
                    </thead>
                    <tbody id="order-items">
                        
                <tr class="border-b">
                    <td class="py-2 px-4">
                        <h3 class="text-lg font-semibold mt-2">Snake Plant</h3>
                    </td>
                    <td class="py-2 px-4">
                        <div class="flex items-center">
                            <!-- <button class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="w-12 text-center border rounded focus:outline-none" value="1">
                            <button class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                <i class="fas fa-plus"></i>
                            </button> -->
                            <p>1</p>
                        </div>
                    </td>
                    <td class="py-2 px-4">199</td>
                    <td class="py-2 px-4">199</td>
                </tr>

                
                <tr class="border-b">
                    <td class="py-2 px-4">
                        <h3 class="text-lg font-semibold mt-2">Fiddle Leaf Fig</h3>
                    </td>
                    <td class="py-2 px-4">
                        <div class="flex items-center">
                            <!-- <button class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="w-12 text-center border rounded focus:outline-none" value="1">
                            <button class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                <i class="fas fa-plus"></i>
                            </button> -->
                            <p>1</p>
                        </div>
                    </td>
                    <td class="py-2 px-4">199</td>
                    <td class="py-2 px-4">199</td>
                </tr>
                    </tbody>
                </table>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="total-amount">
                        Total Amount
                    </label>
                    <!-- <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="total-amount" type="text" placeholder="Total Amount"> -->
                        <p>
                            398.00
                        </p>
                </div>


                <div class="mb-4">
                    <div class="container mx-auto mt-8 p-4">
                        <h1 class="text-2xl font-semibold mb-4">Select Payment Method</h1>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="mode-of-payment">
                                Mode of Payment
                            </label>
                            <select
                                class="form-select border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="mode-of-payment">
                                <option value="gcash">GCash</option>
                                <option value="cod">Cash on Delivery</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button id="place-order-button" type="button"
                                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>