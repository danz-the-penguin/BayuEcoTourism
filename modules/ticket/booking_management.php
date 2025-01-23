<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Management</title>
</head>
<body>
    <h1>Booking Management</h1>
    <form action="add_booking.php" method="POST">
        <input type="number" name="user_id" placeholder="User  ID" required>
        <input type="date" name="booking_date" required>
        <input type="number" name="number_of_people" placeholder="Number of People" required>
        <button type="submit">Book Ticket</button>
    </form>

    <h2>All Bookings</h2>
    <ul>
        <?php
        $bookingService = new BookingService($db);
        $bookings = $bookingService->getAllBookings();
        foreach ($bookings as $booking) {
            echo "<li>Booking ID: {$booking['bookingId']} - User ID: {$booking['user_id']}</li>";
        }
        ?>
    </ul>
</body>
</html>
