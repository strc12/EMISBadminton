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
	table, th, td {
		border-style:ridge;
		border-color:DarkGoldenRod;
		border-width: 1px;
		}
	th, td{
		padding: 5px;
		text-align:center;
		}
	input[type="text"] {
		width:25px;
	}

</style>
<head>
	<title>Results - East Midlands Independent Schools Badminton League</title>
<?php
function playerdropdown ($school, $gender, $position) {
	include 'connect.php';
	
	echo "<select name = '$position'>";
	echo "<option value = '' selected disabled>Please select a player...</option>";
	$sqlquery = "SELECT FirstName, PlayerID from players where SchoolID = '$school' and Gender = '$gender'";
	$playerresult = $mysqli -> query($sqlquery);
	
	if ($playerresult -> num_rows > 0) {
		
		while ($playerrows = $playerresult -> fetch_assoc()) {
			echo '<option value = "' . $playerrows['PlayerID'] . '">'. $playerrows['FirstName'] . '</option>';
			
			
		}
	} else {
	echo 'NO PLAYERS!';
	}
	
	mysqli_close($mysqli);
	echo "</select>";
}
?>

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
	
	<h3>Input Results</h3>
	<form action ="confirmresults.php" method="POST">
<?php
	include 'connect.php';
	session_start();
	
	$fixtureid = $_POST['selectfixture'];
	$_SESSION['fixtid'] = $fixtureid;
	$sqlquery = "SELECT * from fixtures where FixtureID = '$fixtureid'";
	$result = $mysqli -> query($sqlquery);
	
	if ($result -> num_rows > 0) {
		while ($rows = $result -> fetch_assoc()) {
			$foundhomeid = $rows['HomeTeamID'];
			$_SESSION['hometeamid'] = $foundhomeid;
			$foundawayid = $rows['AwayTeamID'];
			$_SESSION['awayteamid'] = $foundawayid;
			$foundhomeschoolid = $rows['HomeSchoolID'];
			$foundawayschoolid = $rows['AwaySchoolID'];
			$homeresult = $mysqli -> query("SELECT name from team where teamid = '$foundhomeid'");
			$awayresult = $mysqli -> query("SELECT name from team where teamid = '$foundawayid'");
			while ($homerows = $homeresult -> fetch_assoc()) {
				$hometeamname = $homerows['name'];
				$_SESSION['hometeam'] = $hometeamname;
			}
			while ($awayrows = $awayresult -> fetch_assoc()) {
				$awayteamname = $awayrows['name'];
				$_SESSION['awayteam'] = $awayteamname;
				
			}
			echo $hometeamname . ' v ' . $awayteamname . ' ' . date("d-m-Y", strtotime($rows['FixtDate']));
			$_SESSION['fixtdate'] = date("d-m-Y", strtotime($rows['FixtDate']));
		}
	}
	echo '<br><br>';
	echo '<h3>Players</h3>';
	echo '<table style = "width:60%">';
	echo '<tr>';
	echo '<th colspan="2">Home Players</th>';
	echo '<th colspan="2">Away Players</th>';
	echo '</tr>';
	
	mysqli_close($mysqli);
	
	
?>
	
	<tr>
	<td>Man 1</td>
	<td><?php playerdropdown($foundhomeschoolid, 'Male', 'homeman1');?></td>
	<td>Man 1</td>
	<td><?php playerdropdown($foundawayschoolid, 'Male', 'awayman1');?></td>
	</tr>
	
	<tr>
	<td>Man 2</td>
	<td><?php playerdropdown($foundhomeschoolid, 'Male', 'homeman2');?></td>
	<td>Man 2</td>
	<td><?php playerdropdown($foundawayschoolid, 'Male', 'awayman2');?></td>
	</tr>
	
	<tr>
	<td>Man 3</td>
	<td><?php playerdropdown($foundhomeschoolid, 'Male', 'homeman3');?></td>
	<td>Man 3</td>
	<td><?php playerdropdown($foundawayschoolid, 'Male', 'awayman3');?></td>
	</tr>
	
	<tr>
	<td>Lady 1</td>
	<td><?php playerdropdown($foundhomeschoolid, 'Female', 'homelady1');?></td>
	<td>Lady 1</td>
	<td><?php playerdropdown($foundawayschoolid, 'Female', 'awaylady1');?></td>
	</tr>
	
	<tr>
	<td>Lady 2</td>
	<td><?php playerdropdown($foundhomeschoolid, 'Female', 'homelady2');?></td>
	<td>Lady 2</td>
	<td><?php playerdropdown($foundawayschoolid, 'Female', 'awaylady2');?></td>
	</tr>
	
	<tr>
	<td>Lady 3</td>
	<td><?php playerdropdown($foundhomeschoolid, 'Female', 'homelady3');?></td>
	<td>Lady 3</td>
	<td><?php playerdropdown($foundawayschoolid, 'Female', 'awaylady3');?></td>
	</tr>
	</table>
	<br><br>
	<h3>Scores</h3>
	
	<table style = "width:60%">
	<tr>
	<th rowspan="2">Match No.</th>
	<th rowspan="2"><?php echo $_SESSION['hometeam'];?></th>
	<th rowspan="2"> </th>
	<th rowspan="2"><?php echo $_SESSION['awayteam'];?></th>
	<th colspan = "2">Points</th>
	<th colspan="2">Games</th>
	</tr>
	
	<tr>
	<td><?php echo $_SESSION['hometeam'];?></td>
	<td><?php echo $_SESSION['awayteam'];?></td>
	<td><?php echo $_SESSION['hometeam'];?></td>
	<td><?php echo $_SESSION['awayteam'];?></td>
	</tr>
	
	<tr>
	<td>1</td>
	<td>L1</td>
	<td>v</td>
	<td>L1</td>
	<td><input type="text" name="point1-h1"></td>
	<td><input type="text" name="point1-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td>2</td>
	<td>M1</td>
	<td>v</td>
	<td>M1</td>
	<td><input type="text" name="point2-h1"></td>
	<td><input type="text" name="point2-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td rowspan="2">3</td>
	<td rowspan="2">M2+M3</td>
	<td rowspan="2">v</td>
	<td rowspan="2">M2+M3</td>
	<td><input type="text" name="point3-h1"></td>
	<td><input type="text" name="point3-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td><input type="text" name="point3-h2"></td>
	<td><input type="text" name="point3-a2"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td rowspan="2">4</td>
	<td rowspan="2">L2+L3</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L2+L3</td>
	<td><input type="text" name="point4-h1"></td>
	<td><input type="text" name="point4-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td><input type="text" name="point4-h2"></td>
	<td><input type="text" name="point4-a2"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td rowspan="2">5</td>
	<td rowspan="2">M1+M2</td>
	<td rowspan="2">v</td>
	<td rowspan="2">M1+M2</td>
	<td><input type="text" name="point5-h1"></td>
	<td><input type="text" name="point5-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td><input type="text" name="point5-h2"></td>
	<td><input type="text" name="point5-a2"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td rowspan="2">6</td>
	<td rowspan="2">L1+L2</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L1+L2</td>
	<td><input type="text" name="point6-h1"></td>
	<td><input type="text" name="point6-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td><input type="text" name="point6-h2"></td>
	<td><input type="text" name="point6-a2"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td rowspan="2">7</td>
	<td rowspan="2">L3+M3</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L3+M3</td>
	<td><input type="text" name="point7-h1"></td>
	<td><input type="text" name="point7-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td><input type="text" name="point7-h2"></td>
	<td><input type="text" name="point7-a2"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td rowspan="2">8</td>
	<td rowspan="2">L1+M1</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L1+M1</td>
	<td><input type="text" name="point8-h1"></td>
	<td><input type="text" name="point8-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td><input type="text" name="point8-h2"></td>
	<td><input type="text" name="point8-a2"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td rowspan="2">9</td>
	<td rowspan="2">L3+M2</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L3+M2</td>
	<td><input type="text" name="point9-h1"></td>
	<td><input type="text" name="point9-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td><input type="text" name="point9-h2"></td>
	<td><input type="text" name="point9-a2"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td rowspan="2">10</td>
	<td rowspan="2">L2+M3</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L2+M3</td>
	<td><input type="text" name="point10-h1"></td>
	<td><input type="text" name="point10-a1"></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td><input type="text" name="point10-h2"></td>
	<td><input type="text" name="point10-a2"></td>
	<td></td>
	<td></td>
	</tr>
	</table>
	
	<input type="submit" value="Submit" name="inputresult">
	

	
	</form>
</body>
</html>