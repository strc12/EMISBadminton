<doctype! HTML>
<html>
<head>
<style>
table, th, td{
	border:1px solid blue;}
th,td{
	padding:2px;
	text-align:center;}
tr.done{
	background-color:#787229;}
</style>
	<title>East Midlands Independent Schools Badminton League</title>
</head>
<body>

<?php

$name = $gender = "";
// CONNECT TO THE DATABASE
include 'connect.php';
	$query = "SELECT * from fixtures order by matchdate";
	
	
	$dave = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA to display all players now registered
	if($dave->num_rows > 0) {
		echo "<h2>Fixtures  Currently are:</h2>";
		echo "<table style = 'width:30%'>";
		echo "<tr>";
		echo "<th>Home</th>";
		echo "<th>Away</th>";		
		echo "<th>Date</th>";		
		echo "</tr>";
		$d1=time();
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
			//list of players and genders
			if ($d1>(strtotime($row['matchdate']))){
			echo "<tr><td>".date("d-m-Y", strtotime($row['matchdate']))."</td><td>".$homename. "</td> <td>" .$awayname."</td></tr>";
			}else{
			echo "<tr class='done'> <td>".date("d-m-Y", strtotime($row['matchdate']))."</td><td>".$homename. "</td> <td>" .$awayname."</td></tr>";
		}	}
		
		echo "</table>";
	}
	else {
		echo 'NO RESULTS';	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);

?>
<a href="index.php"> Home</a>

	
</body>
</html>