<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Management</title>
</head>
<body>
    <h1>Membership Management</h1>
    <form action="add_membership.php" method="POST">
        <input type="number" name="user_id" placeholder="User  ID" required>
        <select name="type">
            <option value="standard">Standard</option>
            <option value="premium">Premium</option>
        </select>
        <input type="date" name="start_date" required>
        <input type="date" name="end_date" required>
        <button type="submit">Add Membership</button>
    </form>

    <h2>All Memberships</h2>
    <ul>
        <?php
        $membershipService = new Membership Service($db);
        $memberships = $membershipService->getAllMemberships();
        foreach ($memberships as $membership) {
            echo "<li>User ID: {$membership['user_id']} - Type: {$membership['type']} - Validity: {$membership['start_date']} to {$membership['end_date']}</li>";
        }
        ?>
    </ul>
</body>
</html>
