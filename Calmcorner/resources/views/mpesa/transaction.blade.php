
<!-- resources/views/mpesa/transaction.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>M-Pesa Transaction</title>
</head>
<body>
    <h1>M-Pesa Transaction Details</h1>

    @if(!empty($transaction))  <!-- Check if the transaction data is available -->

    <div>
        <h2>Transaction ID: {{ $transaction['id'] ?? '12375' }}</h2>
        <p>Amount: {{ $transaction['amount'] ?? '2578' }}</p>
        <p>Status: {{ $transaction['status'] ?? 'N/A' }}</p>
        <p>Date: {{ $transaction['date'] ?? '02/02/24' }}</p>
        <p>Receiver: {{ $transaction['receiver'] ?? 'suma' }}</p>
        <p>Sender: {{ $transaction['sender'] ?? 'Bossy' }}</p>
    </div>

    @else
        <p>No transaction data available.</p>
    @endif

    <button id="refresh-data">Refresh Data</button>

    <script>
        // Safely escape the transaction ID
      
        const transactionId = '{{ $transaction['id'] ?? 'NA'}}';

        document.getElementById('refresh-data').addEventListener('click', function() {
            fetch(`/mpesa/transaction/${transactionId}`)
                .then(response => response.json())
                .then(data => {
                    // Update the view with new data
                    document.querySelector('h2').innerText = `Transaction ID: ${data.id}`;
                    document.querySelector('p:nth-of-type(1)').innerText = `Amount: ${data.amount}`;
                    document.querySelector('p:nth-of-type(2)').innerText = `Status: ${data.status}`;
                    document.querySelector('p:nth-of-type(3)').innerText = `Date: ${data.date}`;
                    document.querySelector('p:nth-of-type(4)').innerText = `Receiver: ${data.receiver}`;
                    document.querySelector('p:nth-of-type(5)').innerText = `Sender: ${data.sender}`;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
