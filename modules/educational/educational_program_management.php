<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Educational Program Management</title>
</head>
<body>
    <h1>Educational Program Management</h1>
    <form action="add_program.php" method="POST">
        <input type="text" name="title" placeholder="Program Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="date" name="date" required>
        <button type="submit">Add Program</button>
    </form>

    <h2>All Programs</h2>
    <ul>
        <?php
        $educationalProgramService = new EducationalProgramService($db);
        $programs = $educationalProgramService->getAllPrograms();
        foreach ($programs as $program) {
            echo "<li>{$program['title']} - Date: {$program['date']} - {$program['description']}</li>";
        }
        ?>
    </ul>
</body>
</html>
