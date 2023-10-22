<div id="order-details-modal" class="fixed inset-0 z-10 flex items-center justify-center hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
    <div class="modal-container bg-white w-10/12 md:max-w-2xl mx-auto rounded shadow-lg z-50 overflow-y-auto flex flex-col md:flex-row">
        <div class="modal-content py-4 text-left px-6 flex-1">
            <h2 class="text-2xl font-semibold mb-4">Order Details</h2>

            <form id="order-details-form">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="order-number">
                        Order Number
                    </label>
                    <p>001</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="order-date">
                        Date
                    </label>
                    <p>January 19, 2023</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="customer-info">
                        Customer Info
                    </label>
                    <p>JJA, jja@gmail.com</p>
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
                    <p>398.00</p>
                </div>
            </form>
        </div>

        <div class="payment-method-container flex-1 bg-gray-100 py-4 px-6">
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
  <button id="place-order-button" @click="placeOrder" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
    Place Order
  </button>
  <button id="cancel-order-button" class="bg-red-500 text-white py-2 px-4 rounded ml-2 hover:bg-red-600 focus:outline-none">
    Cancel
  </button>
</div>

        </div>
    </div>
</div>
