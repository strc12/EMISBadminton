<!doctype html>
<html>
<head>
<style>
table, th, td{
	border:1px solid blue;}
th,td{
	padding:5px;
	text-align:center;}
</style>
	<title> Score sheet</title>
	
</head>
<body>
</body>
<table style = 'width:80%'>
<tr>
<th>Position</th>
<th>School</th>
<th>Games played</th>
<th>Points for</th>
<th>Points against</th>
<th>Games lost</th>
<th> Games won</th>
</tr>

<?php
	
	$position ="1";
	include 'connect.php';//hides connection details
	$query = "SELECT * FROM schools order by gameswon DESC, pointsfor DESC";
	$result2 = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA
	if($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
		
			//code for table
			echo "<tr>";
			echo "<td>".$position."</td><td>".$row['name'] . "</td><td> " . $row['gamesplayed']. "</td><td> " . $row['pointsfor']."</td><td> " . $row['pointsagainst']."</td><td> " . $row['gameslost']."</td><td> " . $row['gameswon']."</td>" ;
			echo "</tr>";
			$position = $position +"1";
		}
	}
	else {
		echo 'NO Players';	
	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
	
	echo "</select>";	

	
	
?>

<br>

</table>
<br>

<a href="index.php"> Back </a>
<html>

