<?php
// Include DB config and start session
session_start();
include("../config/config.php");

// Check if user is logged in
if (!isset($_SESSION["UID"])) {
    echo "You must be logged in to edit your profile.";
    exit;
}
?>

<!DOCTYPE html>
<html>
    
<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="mystyle.css" media="screen" />
</head>

<body>
    <header>
        <div class="header">
            <h1>Edit Profile</h1>
        </div>
    </header>


    <main>
        <form action="editAction.php" method="post">
            <label for="userName">Username:</label>
            <input type="text" id="userName" name="userName" value="<?php echo htmlspecialchars($user['userName']); ?>" required><br><br>
    
            <label for="userEmail">User Email:</label>
            <input type="email" id="userEmail" name="userEmail" value="<?php echo htmlspecialchars($user['userEmail']); ?>" required><br><br>
    
            <label for="userPwd">New Password:</label>
            <input type="password" id="userPwd" name="userPwd" maxlength="8"><br><br>
    
            <label for="confirmPwd">Confirm New Password:</label>
            <input type="password" id="confirmPwd" name="confirmPwd"><br><br>
    
            <input type="submit" value="Update">
            <input type="reset" value="Reset"></br>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>
