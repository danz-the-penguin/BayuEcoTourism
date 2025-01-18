<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $user_type = $_POST['user_type']; // 'admin' or 'user'

    // Prepare and bind
    if ($user_type === 'admin') {
        $stmt = $conn->prepare("INSERT INTO Admins (username, password, email) VALUES (?, ?, ?)");
    } else {
        $stmt = $conn->prepare("INSERT INTO Users (username, password, email) VALUES (?, ?, ?)");
    }
    $stmt->bind_param("sss", $username, $password, $email);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="Email" required>
        <select name="user_type" required>
            <option value="user">User </option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Register</button>
    </form>
    <?php
    // Display message
    if (!empty($message)) {
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>
