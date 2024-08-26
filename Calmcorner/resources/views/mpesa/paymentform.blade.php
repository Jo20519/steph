<!-- resources/views/mpesa/payment_form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Plan</title>
</head>
<body>
    <h1>Start Payment Plan</h1>

    <form action="{{ url('/mpesa/payment') }}" method="POST">
        @csrf
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" required>
        <br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" required>
        <br>
        <button type="submit">Submit Payment</button>
    </form>
</body>
</html>
