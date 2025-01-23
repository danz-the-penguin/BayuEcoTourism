<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
</head>
<body>
    <h1>User Management</h1>
    <form action="add_user.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="visitor">Visitor</option>
        </select>
        <button type="submit">Add User</button>
    </form>

    <h2>All Users</h2>
    <ul>
        <?php
        // Fetch and display users
        $userService = new UserService($db);
        $users = $userService->getAllUsers();
        foreach ($users as $user) {
            echo "<li>{$user['username']} - {$user['role']}</li>";
        }
        ?>
    </ul>
</body>
</html>
