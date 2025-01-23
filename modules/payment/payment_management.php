<!DOCTYPE html>
<html lang="en">
<head <meta charset="UTF-8">
    <title>Payment Management</title>
</head>
<body>
    <h1>Payment Management</h1>
    <form action="process_payment.php" method="POST">
        <input type="number" name="booking_id" placeholder="Booking ID" required>
        <input type="number" name="amount" placeholder="Amount" required>
        <select name="payment_status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="refunded">Refunded</option>
        </select>
        <button type="submit">Process Payment</button>
    </form>

    <h2>All Payments</h2>
    <ul>
        <?php
        $paymentService = new PaymentService($db);
        $payments = $paymentService->getAllPayments();
        foreach ($payments as $payment) {
            echo "<li>Payment ID: {$payment['paymentId']} - Amount: {$payment['amount']} - Status: {$payment['payment_status']}</li>";
        }
        ?>
    </ul>
</body>
</html>
