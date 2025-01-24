<?php
session_start();
include("../config/config.php");
?>
<html>
<head>
<title>Login Action</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" type="text/css" href="mystyle.css" media="screen" />
</head>
<body>
<!-- <h2>Login Information</h2> -->
<?php
//login values from login form
$userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
$userPwd = mysqli_real_escape_string($conn, $_POST['userPwd']);

$sql = "SELECT * FROM user WHERE userEmail='$userEmail' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {	
	//check password hash
	$row = mysqli_fetch_assoc($result);
	if (password_verify($_POST['userPwd'],$row['userPwd'])) {
  		echo '<script type="text/javascript">		
			alert("Login successful!");
		</script>';
		$_SESSION["UID"] = $row["userID"];//the first record set, bind to userID
		$_SESSION["userName"] = $row["userName"];
		$_SESSION["userRoles"] = $row["userRoles"];
		$_SESSION['loggedin_time'] = time();  
		
		echo '<script type="text/javascript">
			window.location.href = "' . BASE_URL . 'index.php";
        </script>';
    	exit(); // Make sure to exit after performing the redirection		
    } else {
    echo 'Login error, user email and password is incorrect.<br>';//user email & pwd not correct	
	echo '<a href="' . BASE_URL . 'index.php"> | Login |</a> &nbsp;&nbsp;&nbsp; <br>';
    }		
} else {
		echo "Login error, user <b>$userEmail</b> does not exist. <br>";//user not exist
		echo '<a href="' . BASE_URL . 'index.php"> | Login |</a>&nbsp;&nbsp;&nbsp; <br>';	
} 

mysqli_close($conn);
?>
</body>
</html>