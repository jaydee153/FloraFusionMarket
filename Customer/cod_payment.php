<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash on Delivery Payment</title>
    <!-- Add Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include QR Code Generator Library -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 p-4 flex flex-col items-center">
        <h1 class="text-2xl font-semibold mb-4">Cash on Delivery Payment</h1>
        <li>Please scan QR Code for 50% Down Payment. And please prepare the 50% exact amount in cash for your order.</li>
            <li>Our delivery person will collect the payment when delivering your order.</li>
            
        <div id="codQRCode" class="mt-4"></div>
        
       <div class="mt-4">
            <a href="tracker.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
                Proceed
            </a>
        </div>
    </div>

    <script>
        const codQRCodeContainer = document.getElementById('codQRCode');

        
        const qrCodeData = 'COD Payment Instructions: Please prepare the exact amount in cash.';

       
        const qrcode = new QRCode(codQRCodeContainer, {
            text: qrCodeData,
            width: 128,
            height: 128
        });
    </script>
</body>
</html>