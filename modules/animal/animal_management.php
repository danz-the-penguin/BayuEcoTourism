<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animal Management</title>
</head>
<body>
    <h1>Animal Management</h1>
    <form action="add_animal.php" method="POST">
        <input type="text" name="species" placeholder="Species" required>
        <input type="text" name="habitat" placeholder="Habitat" required>
        <input type="time" name="feeding_time" required>
        <button type="submit">Add Animal</button>
    </form>

    <h2>All Animals</h2>
    <ul>
        <?php
        $animalService = new AnimalService($db);
        $animals = $animalService->getAllAnimals();
        foreach ($animals as $animal) {
            echo "<li>{$animal['species']} - {$animal['habitat']}</li>";
        }
        ?>
    </ul>
</body>
</html>
