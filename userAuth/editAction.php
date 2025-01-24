<?php
session_start();
include("../config/config.php");

if (!isset($_SESSION["UID"])) {
    echo "You must be logged in to update your profile.";
    exit;
}

$userID = $_SESSION["UID"];
$userName = $_POST["userName"];
$userEmail = $_POST["userEmail"];
$userPwd = $_POST["userPwd"];
$confirmPwd = $_POST["confirmPwd"];

// Validate input
if (empty($userName) || empty($userEmail)) {
    echo "Username and email are required.";
    exit;
}

if (!empty($userPwd)) {
    if ($userPwd !== $confirmPwd) {
        echo "Passwords do not match.";
        exit;
    }
    $hashedPwd = password_hash($userPwd, PASSWORD_DEFAULT);
    $query = "UPDATE users SET userName = ?, userEmail = ?, userPwd = ? WHERE userID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $userName, $userEmail, $hashedPwd, $userID);
} else {
    $query = "UPDATE users SET userName = ?, userEmail = ? WHERE userID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $userName, $userEmail, $userID);
}

if ($stmt->execute()) {
    echo "Profile updated successfully.";
} else {
    echo "Error updating profile: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
