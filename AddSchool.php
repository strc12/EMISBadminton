		<?php


// CONNECT TO THE DATABASE
	include 'connect.php';

	$sql = "INSERT INTO schools VALUES ('$_POST[school]', '$_POST[teacher]',NULL,0,0,0,0)";

	if (mysqli_query($mysqli, $sql)) {
		echo "New School created successfully";
	} else {
		echo "Error:" . $sql . "<br>" . mysqli_error($mysqli);
}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
	

?>