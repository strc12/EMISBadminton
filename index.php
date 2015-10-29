<doctype! HTML>
<html>
<style>
a{
border-style:inset;
border-width:4px;
padding:5px;
line-height:250%;
background-color:beige;
}
h3{
color:red;
}
h1,h2,h3,div{
	text-align:center;
}
table, th, td{
	border:1px solid blue;
	text-align:center;}
th,td{
	padding:1px;
	text-align:center;}
tr.done{
	background-color:#787229;}
#background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('images/badminton.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;
    opacity: 0.4;
    filter:alpha(opacity=80);
}
</style>
<head>

	<title>East Midlands Independent Schools Badminton League</title>
</head>

<body>

	<h1> East Midlands Independent schools Badminton League </h1>
	<h2> Season 2014/5</h2>
	<h3> Oakham, Oundle, Stamford. Uppingham</h3>
	<div>
	<a href="/password.html">Admin</a>
	<a href="/passwordresults.html">Enter Results</a>
	<a href="/viewfixtures.php">View Fixtures</a>
	<a href="/leaguetable.php">View League table</a>
	
	</div>

<?php
	include 'connect.php';
	$query = "SELECT * from fixtures order by matchdate";
	
	
	$dave = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA to display all players now registered
	if($dave->num_rows > 0) {
		echo "<h4>Fixtures  Currently are:";
		echo " <em>(Shaded cells yet to play)</em></h4>";
		echo "<table style = 'width:80%'>";
		echo "<tr>";
		echo "<th>Date</th>";		
		echo "<th>Home</th>";
		echo "<th>Away</th>";		
		echo "<th>Home games</th>";
		echo "<th>Away Games</th>";
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

			//list of matches and scores
			
	
			if ($d1>(strtotime($row['matchdate']))){
			echo "<tr><td>".date("d-m-Y", strtotime($row['matchdate']))."</td><td>".$homename. "</td> <td>" .$awayname."</td><td>" .$row['homescoregames']."</td><td>".$row['awayscoregames']."</td></tr>";
			}else{
			echo "<tr class='done'> <td>".date("d-m-Y", strtotime($row['matchdate']))."</td><td>".$homename. "</td> <td>" .$awayname."</td><td>" .$row['homescoregames']."</td><td>".$row['awayscoregames']."</td></tr>";
		}	}
		echo "</table>";
	}
	else {
		echo 'NO FIXTURES <br>';	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
?>
</body>
</html>
