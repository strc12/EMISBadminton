<!doctype html>
<html>
<head>
	<title> Result entry service page</title>
</head>
<body>
</body>

<form action ="teamlist.php" method ="POST">
Select fixture: <select name ="fixture" >
	<option value="" selected disabled>Please select a fixture...</option>
<?php
include 'connect.php';//hides connection details

	$query = "SELECT * from fixtures where resultentered='0' order by matchdate";
	$dave = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA to display all players now registered
	if($dave->num_rows > 0) {

		while($row = $dave->fetch_assoc()) {
		$school1 = $row['homeschoolid'];
		$school2 = $row['awayschoolid'];
		$sch1 = $mysqli->query("select name from schools where schoolID='$school1'") or die($mysqli->error.__LINE__);
		$sch2 = $mysqli->query("select name from schools where schoolID='$school2'") or die($mysqli->error.__LINE__);

			while($schoolname = $sch1->fetch_assoc()){
			$homename=$schoolname['name'];
			}
			while($schoolname = $sch2->fetch_assoc()){
			$awayname=$schoolname['name'];
			}
			//list of fixtures
			echo '<option value="' . $row['fixtureid'] . '">' .$homename." v ". $awayname . " - " .date("d-m-Y", strtotime($row['matchdate'])).'</option>';
			
		}
	}
	else {
		echo 'NO RESULTS';	
	}
// CLOSE CONNECTION
	mysqli_close($mysqli);


?>
</select>
<input name='Select' type='submit' value='Enter Scores' >
<br>

</form>
<a href="index.php"> home </a>
<html>

