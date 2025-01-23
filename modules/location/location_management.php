<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Location Management</title>
</head>
<body>
    <h1>Location Management</h1>
    <form action="add_location.php" method="POST">
        <input type="text" name="name" placeholder="Location Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Add Location</button>
    </form>

    <h2>All Locations</h2>
    <ul>
        <?php
        $locationService = new LocationService($db);
        $locations = $locationService->getAllLocations();
        foreach ($locations as $location) {
            echo "<li>{$location['name']} - {$location['description']}</li>";
        }
        ?>
    </ul>
</body>
</html>
