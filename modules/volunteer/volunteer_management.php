<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Management</title>
</head>
<body>
    <h1>Volunteer Management</h1>
    <form action="add_volunteer.php" method="POST">
        <input type="text" name="name" placeholder="Volunteer Name" required>
        <input type="text" name="contact_info" placeholder="Contact Info" required>
        <input type="text" name="availability" placeholder="Availability" required>
        <button type="submit">Add Volunteer</button>
    </form>

    <h2>All Volunteers</h2>
    <ul>
        <?php
        $volunteerService = new VolunteerService($db);
        $volunteers = $volunteerService->getAllVolunteers();
        foreach ($volunteers as $volunteer) {
            echo "<li>{$volunteer['name']} - Contact: {$volunteer['contact_info']} - Availability: {$volunteer['availability']}</li>";
        }
        ?>
    </ul>
</body>
</html>
