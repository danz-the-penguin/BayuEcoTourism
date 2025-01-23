<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Management</title>
</head>
<body>
    <h1>Zoo Maintenance Management</h1>
    <form action="add_maintenance.php" method="POST">
        <textarea name="description" placeholder="Maintenance Description" required></textarea>
        <input type="date" name="scheduled_date" required>
        <select name="status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
        <button type="submit">Schedule Maintenance</button>
    </form>

    <h2>All Maintenance Records</h2>
    <ul>
        <?php
        $maintenanceService = new MaintenanceService($db);
        $records = $maintenanceService->getAllMaintenanceRecords();
        foreach ($records as $record) {
            echo "<li>Description: {$record['description']} - Scheduled Date: {$record['scheduled_date']} - Status: {$record['status']}</li>";
        }
        ?>
    </ul>
</body>
</html>
