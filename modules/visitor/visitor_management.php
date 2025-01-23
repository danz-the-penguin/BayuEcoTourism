<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visitor Management</title>
</head>
<body>
    <h1>Visitor Management</h1>
    <form action="add_visitor.php" method="POST">
 ```php
        <input type="text" name="name" placeholder="Visitor Name" required>
        <input type="text" name="contact_info" placeholder="Contact Info" required>
        <button type="submit">Add Visitor</button>
    </form>

    <h2>All Visitors</h2>
    <ul>
        <?php
        $visitorService = new VisitorService($db);
        $visitors = $visitorService->getAllVisitors();
        foreach ($visitors as $visitor) {
            echo "<li>{$visitor['name']} - Contact: {$visitor['contact_info']}</li>";
        }
        ?>
    </ul>
</body>
</html>
