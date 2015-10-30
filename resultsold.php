<html>
<style>
	h1, h2{
		color:MediumBlue;
		text-align:center;
		}
	body{
		background-color:beige;
		}
		
	ul#menu{
		padding:0;
		
		}
	ul#menu li{
		float: left;
		width:100px;
		text-align:center;
		}
	ul#menu li a{
		display:block;
		padding:5px 10px;
		color:#333;
		background:#f2f2f2;
		text-decoration:none;
		border-style:ridge;
		}
	ul#menu li a:link{
		border-color: #000;
		}
	ul#menu li a:hover{
        color: #fff;
        background: #939393;
		border-color: #fff;
		}

</style>
<head>
	<title>Results - East Midlands Independent Schools Badminton League</title>
</head>
<body>
	<h1>East Midlands Independent Schools Badminton League</h1>
	<h2>Results</h2>
	<div>
	<ul id="menu">
			<li><a href="/logout.html">Log Out</a></li>
			<li><a href="/teams.php">Teams</a>

			<li><a href="/Fixtures.php">Fixtures</a></li>
			<li><a href="/players.php">Players</a></li>
			<li><a href="/results.php">Results</a></li>
			<li><a href="/schools.php">Schools</a></li>
			<li><a href="/reset.php">Reset</a></li>
    </ul>
	</div><br><br><br>
	<h3>Enter Results</h3>
	<form action ="inputresults.php" method ="POST">
	Select Fixture:   <select name = "selectfixture"> <br><br>
	<option value= "" selected disabled>Please select a fixture...</option>
	
<?php

	include 'connect.php';
	
	$sqlquery = "SELECT * from fixtures order by FixtDate desc";
	$result = $mysqli -> query($sqlquery);
	
	if ($result -> num_rows>0) {
		while ($rows = $result -> fetch_assoc()) {
			$FixtID = $rows['FixtureID'];
			$foundfixtdate = $rows['FixtDate'];
			$foundhomeID = $rows['HomeTeamID'];
			$foundawayID = $rows['AwayTeamID'];
			$played = $rows['Played'];
			//Look for home name from ID
			$queryname = "SELECT name, league from team where teamid = '$foundhomeID'";
			$nameresult = $mysqli -> query($queryname);
			if ($nameresult -> num_rows>0) {
				while ($namerows = $nameresult -> fetch_assoc()) {
					$foundhomename = $namerows['name'].' '.$namerows['league'];
				}
			}
			//Look for away name from ID
			$queryname = "SELECT name, league from team where teamid ='$foundawayID'";
			$nameresult = $mysqli -> query($queryname);
			if ($nameresult -> num_rows >0) {
				while ($namerows = $nameresult -> fetch_assoc()) {
					$foundawayname = $namerows['name'].' '.$namerows['league'];
				}
			}
			if ($played == 0) {
				echo '<option value = "' . $FixtID . '">' . $foundhomename . ' v ' . $foundawayname . ' ' . date("d-m-Y" , strtotime($foundfixtdate)).'</option>';
			}
		}
		
	}
	
	echo '</select>';
	
	mysqli_close();
	
	

?>

	<br><br>
	<input type = "submit" value = "Input Results" name = "inputresults">
	
</form>
	
	
</body>

</html>
