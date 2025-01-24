<?php
//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database configuration
session_start();
include("config/config.php");

// Fetch categories from the database
$sql_categories = "SELECT * FROM category";
$result_categories = mysqli_query($conn, $sql_categories);

// Fetch animals based on category filter
if (isset($_GET['cat']) && $_GET['cat'] != '0') {
    $categoryID = intval($_GET['cat']); // Sanitize input
    $sql_animal = "SELECT * FROM animal WHERE categoryID = ?";
    $stmt = $conn->prepare($sql_animal);
    $stmt->bind_param("i", $categoryID);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql_animal = "SELECT * FROM animal";
    $result = mysqli_query($conn, $sql_animal);
}

$rowcount = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lok Kawi Wildlife Park</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/newstyle.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .animal-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin: 20px;
    }

    .animal-card {
        width: 200px;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        background-color: #fff;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .animal-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .animal-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    .animal-card h3 {
        font-size: 1.2em;
        margin: 10px 0;
        color: #333;
    }

    .animal-card p {
        font-size: 0.9em;
        color: #666;
        margin: 0 10px 10px;
    }
  </style>
</head>

<body>
  <header>
    <!-- Header content -->
  </header>

  <!-- User Navigation -->
  <?php include("includes/userNav.php"); ?>

  <!-- Main container -->
  <div class="container">
    <!-- Top Navigation -->
    <?php include("includes/topNav.php"); ?>
    <?php include("userAuth/modalForm.php"); ?>

    <main>
      <h2 style="text-align: center;">Explores</h2>
      <div class="section">
        <table border="1" align="center">
          <tr>
            <td><a href="explore.php?cat=0" style="text-decoration: none;">All</a></td>
            <?php
            // Dynamically generate category links
            while ($row = mysqli_fetch_assoc($result_categories)) {
              echo '<td><a href="explore.php?cat=' . $row['categoryID'] . '" style="text-decoration: none;">' . $row['categoryName'] . '</a></td>';
            }
            ?>
          </tr>
        </table>
      </div>

      <div class="animal-container">
        <?php
        if ($rowcount > 0) {
          // Output each animal
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="animal-card">';
            echo '<img src="' . htmlspecialchars($row["animalImg"]) . '" alt="' . htmlspecialchars($row["animalName"]) . '">';
            echo '<h3>' . htmlspecialchars($row["animalName"]) . '</h3>';
            echo '<p>' . htmlspecialchars($row["animalDescription"]) . '</p>';

            // Ticket booking form
            echo '<form method="post" action="ticket_action.php?action=add&id=' . $row['animalID'] . '">';
            echo '<label for="visitorType">Visitor Type:</label>';
            echo '<select name="visitorType" id="visitorType" required>';
            echo '<option value="Malaysian">Malaysian</option>';
            echo '<option value="Non-Malaysian">Non-Malaysian</option>';
            echo '</select><br><br>';

            echo '<label for="ticketCategory">Ticket Category:</label>';
            echo '<select name="ticketCategory" id="ticketCategory" required>';
            echo '<option value="Child">Child</option>';
            echo '<option value="Adult">Adult</option>';
            echo '</select><br><br>';

            echo '<label for="quantity">Quantity:</label>';
            echo '<input type="number" name="quantity" value="1" min="1" max="999"/><br><br>';

            echo '<button type="submit"><i class="fa fa-ticket" style="font-size:20px"></i> Book Ticket</button>';
            echo '</form>';
            echo '</div>';
          }
        } else {
          echo '<p>No animals found.</p>';
        }

        // Free result set and close connection
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
      </div>
    </main>
  </div>

  <footer class="footer">
    <p>Copyright &copy; 2024 FCI</p>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const navLinks = document.querySelectorAll(".topnav a");
      const currentPath = window.location.pathname;

      navLinks.forEach(link => {
        if (link.href.includes(currentPath)) {
          link.classList.add("active");
        } else {
          link.classList.remove("active");
        }
      });
    });

    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }

    // Login & Registration Form Popup
    function openLoginPopup() {
      document.getElementById("login-popup").style.display = "block";
      document.getElementById("overlay").style.display = "block";
    }

    function closeLoginPopup() {
      document.getElementById("login-popup").style.display = "none";
      document.getElementById("overlay").style.display = "none";
    }

    function openRegPopup() {
      document.getElementById("reg-popup").style.display = "block";
      document.getElementById("overlay").style.display = "block";
    }

    function closeRegPopup() {
      document.getElementById("reg-popup").style.display = "none";
      document.getElementById("login-popup").style.display = "none";
      document.getElementById("overlay").style.display = "none";
    }
  </script>
</body>

</html>