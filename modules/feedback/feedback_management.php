<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Management</title>
</head>
<body>
    <h1>Feedback Management</h1>
    <form action="add_feedback.php" method="POST">
        <input type="number" name="user_id" placeholder="User  ID" required>
        <input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)" required>
        <textarea name="comments" placeholder="Comments" required></textarea>
        <button type="submit">Submit Feedback</button>
    </form>

    <h2>All Feedback</h2>
    <ul>
        <?php
        $feedbackService = new FeedbackService($db);
        $feedbacks = $feedbackService->getAllFeedback();
        foreach ($feedbacks as $feedback) {
            echo "<li>User ID: {$feedback['user_id']} - Rating: {$feedback['rating']} - Comments: {$feedback['comments']}</li>";
        }
        ?>
    </ul>
</body>
</html>
