<!-- resources/views/mpesa/payment_response.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Response</title>
</head>
<body>
    <h1>Payment Response</h1>

   

    <!-- Optionally add additional formatting or logic to handle the response -->
    

    <p>Transaction ID: {{ $transaction['id'] ?? '12375' }}</p>
        <p>Amount: {{ $transaction['amount'] ?? '2578' }}</p>
        <p>Status: {{ $transaction['status'] ?? 'N/A' }}</p>
</body>
</html>
