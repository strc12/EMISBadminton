<DOCTYPE! HTML>
<html>
<head>
</head>
<body>
<form action ="school.html" method ="POST">
	<select name="dropdown">
	
	
		<?php


// CONNECT TO THE DATABASE
	$DB_NAME = 'badminton';
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = 'squirt72';
	
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$query = "SELECT name FROM schools";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		
			//code for drop down list
			echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
			
		}
	}
	else {
		echo 'NO RESULTS';	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
	

?>
</select>
<input type="submit" value="Submit"><br>
</form>
</body>
</html>
