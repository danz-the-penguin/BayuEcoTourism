<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feeding Schedule Management</title>
</head>
<body>
    <h1>Feeding Schedule Management</h1>
    <form action="add_feeding_schedule.php" method="POST">
        <input type="number" name="animal_id" placeholder="Animal ID" required>
        <input type="time" name="feeding_time" required>
        <button type="submit">Add Feeding Schedule</button>
    </form>

    <h2>All Feeding Schedules</h2>
    <ul>
        <?php
        $feedingScheduleService = new FeedingScheduleService($db);
        $feedingSchedules = $feedingScheduleService->getAllFeedingSchedules();
        foreach ($feedingSchedules as $schedule) {
            echo "<li>Animal ID: {$schedule['animal_id']} - Feeding Time: {$schedule['feeding_time']}</li>";
        }
        ?>
    </ul>
</body>
</html>
