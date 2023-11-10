<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment</title>
    <!-- Include QR Code Generator Library -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
]    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 p-4 flex flex-col items-center">
        <h1 class="text-2xl font-semibold mb-4">GCash Payment</h1>
        <div id="gcashQRCode" class="mt-4"></div>
        
        
       <div class="mt-4">
            <a href="tracker.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
                Proceed
            </a>
        </div>
    </div>

    <script>
        const gcashQRCodeContainer = document.getElementById('gcashQRCode');

        const qrCodeData = 'gcash://sendTo=09554593878&amount=1';
        
        
        const qrcode = new QRCode(gcashQRCodeContainer, {
            text: qrCodeData,
            width: 128,
            height: 128
        });
    </script>
</body>
</html>