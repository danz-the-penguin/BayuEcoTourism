<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marketing Management</title>
</head>
<body>
    <h1>Zoo Marketing Management</h1>
    <form action="add_campaign.php" method="POST">
        <input type="text" name="name" placeholder="Campaign Name" required>
        <input type="date" name="start_date" required>
        <input type="date" name="end_date" required>
        <input type="number" name="budget" placeholder="Budget" required>
        <button type="submit">Add Campaign</button>
    </form>

    <h2>All Campaigns</h2>
    < ```php
    <ul>
        <?php
        $marketingCampaignService = new MarketingCampaignService($db);
        $campaigns = $marketingCampaignService->getAllCampaigns();
        foreach ($campaigns as $campaign) {
            echo "<li>{$campaign['name']} - Start: {$campaign['start_date']} - End: {$campaign['end_date']} - Budget: {$campaign['budget']}</li>";
        }
        ?>
    </ul>
</body>
</html>
