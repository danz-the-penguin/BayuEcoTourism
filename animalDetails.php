<?php
//include db config
session_start();
include("config/config.php");

if(isset($_GET['id'])){
	$animalID = $_GET['id'];
	$sql_animal = "SELECT * FROM animal WHERE animalID = $animalID";
}

$result = mysqli_query($conn, $sql_animal);
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
            width: 250px;
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
            height: 250px;
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
		<!-- <h1>Home</h1> 	
		<img class="image" src="img/coffeeblog.png"> -->
	</header>
	<!-- User Nav section-->
	<?php
		include("includes/userNav.php");
	?>
	<!-- Main container for sticky footer -->
	<div class="container">
		<!-- Navigation Menu -->		
    <?php
      include("includes/topNav.php");
      include("userAuth/modalForm.php");
    ?>

<main>
    <h2 style="text-align: center;">Details</h2>
    <div class="section">
        <table border="1" align="center">
            <tr>
                <td><a href="explore.php?cat=0">All</a></td>
                <?php
                // Fetch categories from the database
                $sql_categories = "SELECT * FROM category";
                $result_categories = mysqli_query($conn, $sql_categories);

                // Dynamically generate category links
                while ($row = mysqli_fetch_assoc($result_categories)) {
                    echo '<td><a href="explore.php?cat=' . $row['categoryID'] . '">' . htmlspecialchars($row['categoryName']) . '</a></td>';
                }

                // Free result set
                mysqli_free_result($result_categories);
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
                echo '<img src="' . $row["animalImg"] . '" alt="' . $row["animalName"] . '">';
                echo '<h3>' . $row["animalName"] . '</h3>';
                echo '<p> RM ' . $row["animalPrice"] . '</p>';
                echo '<form method="post" action="cart_action.php?action=add&id=' . $row['animalID'] . '">';

                // Dropdown for visitor type
                echo '<label for="visitorType">Visitor Type:</label>';
                echo '<select name="visitorType" id="visitorType" required>';
                echo '<option value="Malaysian">Malaysian</option>';
                echo '<option value="Non-Malaysian">Non-Malaysian</option>';
                echo '</select><br><br>';

                // Dropdown for ticket category
                echo '<label for="ticketCategory">Ticket Category: </label>';
                echo '<select name="ticketCategory" id="ticketCategory" required>';
                echo '<option value="Child">Child</option>';
                echo '<option value="Adult">Adult</option>';
                echo '</select><br><br>';
                
                // Quantity input
                echo '<label for="quantity">Quantity:</label>';
                echo '<input type="number" name="quantity" id="quantity" value="1" min="1" max="999"/><br><br>';

                // Submit button 
                echo '<button type="submit"><i class="fa fa-ticket" style="font-size:20px"></i> Book Ticket</button>';
                echo '</form>';
                echo '<br></div>';
            }
        } else {
            echo "No animals found.";
        }
       // Free result set
      mysqli_free_result($result);
      //close connection
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
	</script>
</body>
</html>