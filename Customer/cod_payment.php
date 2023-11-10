<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash on Delivery Payment</title>
    <!-- Include QR Code Generator Library -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
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
        const gcashQRCodeContainer = document.getElementById('gcashQRCode');

        const qrCodeData = '00020101021126580014PH.QRPH.ORG0113Flora Fusion520441155802PH5913Flora Fusion6015Makati City6304B7C7';

        // Create QR code image
        const qrCodeImage = new Image();
        qrCodeImage.src = '377236032_6742738852473502_9124539127692614252_n.jpg';

        // Replace QR code div with image tag
        gcashQRCodeContainer.parentNode.replaceChild(qrCodeImage, gcashQRCodeContainer);
    </script>
</body>
</html>