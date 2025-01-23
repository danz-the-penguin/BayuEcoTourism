<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sponsorship Management</title>
</head>
<body>
    <h1>Sponsorship Management</h1>
    <form action="add_sponsorship.php" method="POST">
        <input type="text" name="sponsor_name" placeholder="Sponsor Name" required>
        <input type="number" name="amount" placeholder="Amount" required>
        <input type="number" name="duration" placeholder="Duration (months)" required>
        <button type="submit">Add Sponsorship</button>
    </form>

    <h2>All Sponsorships</h2>
    <ul>
        <?php
        $sponsorshipService = new SponsorshipService($db);
        $sponsorships = $sponsorshipService->getAllSponsorships();
        foreach ($sponsorships as $sponsorship) {
            echo "<li>Sponsor: {$sponsorship['sponsor_name']} - Amount: {$sponsorship['amount']} - Duration: {$sponsorship['duration']} months</li>";
        }
        ?>
    </ul>
</body>
</html>
