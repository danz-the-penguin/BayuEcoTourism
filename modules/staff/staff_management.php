<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Management</title>
</head>
<body>
    <h1>Staff Management</h1>
    <form action="add_staff.php" method="POST">
        <input type="text" name="name" placeholder="Staff Name" required>
        <input type="text" name="role" placeholder="Role" required>
        <button type="submit">Add Staff</button>
    </form>

    <h2>All Staff</h2>
    <ul>
        <?php
        $staffService = new StaffService($db);
        $staffMembers = $staffService->getAllStaff();
        foreach ($staffMembers as $staff) {
            echo "<li>{$staff['name']} - Role: {$staff['role']}</li>";
        }
        ?>
    </ul>
</body>
</html>
