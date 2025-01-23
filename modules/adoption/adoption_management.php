<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adoption Management</title>
</head>
<body>
    <h1>Animal Adoption Management</h1>
    <form action="add_adoption.php" method="POST">
        <input type="number" name="animal_id" placeholder="Animal ID" required>
        <input type="number" name="user_id" placeholder="User  ID" required>
        <input type="date" name="adoption_date" required>
        <button type="submit">Adopt Animal</button>
    </form>

    <h2>All Adoptions</h2>
    <ul>
        <?php
        $adoptionService = new AdoptionService($db);
        $adoptions = $adoptionService->getAllAdoptions();
        foreach ($adoptions as $adoption) {
            echo "<li>Animal ID: {$adoption['animal_id']} - User ID: {$adoption['user_id']} - Date: {$adoption['adoption_date']}</li>";
        }
        ?>
    </ul>
</body>
</html>
