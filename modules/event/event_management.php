<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Management</title>
</head>
<body>
    <h1>Event Management</h1>
    <form action="add_event.php" method="POST">
        <input type="text" name="event_name" placeholder="Event Name" required>
        <input type="date" name="event_date" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Add Event</button>
    </form>

    <h2>All Events</h2>
    <ul>
        <?php
        $eventService = new EventService($db);
        $events = $eventService->getAllEvents();
        foreach ($events as $event) {
            echo "<li>{$event['event_name']} on {$event['event_date']} - {$event['description']}</li>";
        }
        ?>
    </ul>
</body>
</html>
