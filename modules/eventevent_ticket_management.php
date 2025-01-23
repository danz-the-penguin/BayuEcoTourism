<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Ticket Management</title>
</head>
<body>
    <h1>Event Ticket Management</h1>
    <form action="add_event_ticket.php" method="POST">
        <input type="number" name="event_id" placeholder="Event ID" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="number" name="availability" placeholder="Availability" required>
        <button type="submit">Add Event Ticket</button>
    </form>

    <h2>All Event Tickets</h2>
    <ul>
        <?php
        $eventTicketService = new EventTicketService($db);
        $tickets = $eventTicketService->getAllEventTickets();
        foreach ($tickets as $ticket) {
            echo "<li>Event ID: {$ticket['event_id']} - Price: {$ticket['price']} - Availability: {$ticket['availability']}</li>";
        }
        ?>
    </ul>
</body>
</html>
