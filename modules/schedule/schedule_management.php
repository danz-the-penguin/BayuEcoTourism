<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule Management</title>
</head>
<body>
    <h1>Schedule Management</h1>
    <form action="add_schedule.php" method="POST">
        <input type="text" name="event_name" placeholder="Event Name" required>
        <input type="time" name="event_time" required>
        <button type="submit">Add Schedule</button>
    </form>

    <h2>All Schedules</h2>
    <ul>
        <?php
        $scheduleService = new ScheduleService($db);
        $schedules = $scheduleService->getAllSchedules();
        foreach ($schedules as $schedule) {
            echo "<li>{$schedule['event_name']} at {$schedule['event_time']}</li>";
        }
        ?>
    </ul>
</body>
</html>
