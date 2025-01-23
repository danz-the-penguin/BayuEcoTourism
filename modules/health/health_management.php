<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Management</title>
</head>
<body>
    <h1>Animal Health Management</h1>
    <form action="add_health_record.php" method="POST">
        <input type="number" name="animal_id" placeholder="Animal ID" required>
        <input type="date" name="date" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Add Health Record</button>
    </form>

    <h2>All Health Records</h2>
    <ul>
        <?php
        $healthRecordService = new HealthRecordService($db);
        $records = $healthRecordService->getAllHealthRecords();
        foreach ($records as $record) {
            echo "<li>Animal ID: {$record['animal_id']} - Date: {$record['date']} - {$record['description']}</li>";
        }
        ?>
    </ul>
</body>
</html>
