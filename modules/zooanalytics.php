<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'zmsdb';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch zoo schedules
$scheduleQuery = "SELECT * FROM tblschedules ORDER BY DateTime ASC";
$scheduleResult = $conn->query($scheduleQuery);

// Fetch visitor analytics
$analyticsQuery = "SELECT 
    SUM(NoAdult) AS TotalAdults,
    SUM(NoChildren) AS TotalChildren,
    COUNT(DISTINCT TicketID) AS TotalBookings,
    (SUM(NoAdult) + SUM(NoChildren)) AS TotalVisitors
FROM (
    SELECT TicketID, NoAdult, NoChildren FROM tblticindian
    UNION ALL
    SELECT TicketID, NoAdult, NoChildren FROM tblticforeigner
) AS CombinedTickets";

$analyticsResult = $conn->query($analyticsQuery);
$analyticsData = $analyticsResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Schedule Management & Analytics</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f9f9f9; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
        h1, h2 { color: #333; }
    </style>
</head>
<body>

<div class="container">
    <h1>Zoo Schedule Management</h1>
    <table>
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Date & Time</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($scheduleResult->num_rows > 0) {
                while ($row = $scheduleResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EventName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['DateTime']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No schedules available</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h1>Visitor Analytics</h1>
    <table>
        <thead>
            <tr>
                <th>Total Adults</th>
                <th>Total Children</th>
                <th>Total Bookings</th>
                <th>Total Visitors</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($analyticsData['TotalAdults'] ?? 0); ?></td>
                <td><?php echo htmlspecialchars($analyticsData['TotalChildren'] ?? 0); ?></td>
                <td><?php echo htmlspecialchars($analyticsData['TotalBookings'] ?? 0); ?></td>
                <td><?php echo htmlspecialchars($analyticsData['TotalVisitors'] ?? 0); ?></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
