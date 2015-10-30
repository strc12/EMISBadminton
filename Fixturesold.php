<html>
<style>
	h1, h2{
		color:MediumBlue;
		text-align:center;
		}
	body{
		background-color:beige;
		}
	ins{
		font-size:200%;
		color:DarkGoldenRod;
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

</style>
<head>
	<title>Fixtures - East Midlands Independent Schools Badminton League</title>
</head>
<body>
	<h1>East Midlands Independent Schools Badminton League</h1>
	<h2>Fixtures</h2>
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
	</div>
	<br><br>
	<h3>Enter Fixtures</h3>
	<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
	Home Team:   <select name = "hometeam"> <br><br>
	<option value= "" selected disabled>Please select a team...</option>
	
<?php
	//populating the drop down list
	include 'connect.php';
	

	$sqlquery = "SELECT name, league FROM team";
	$result = $mysqli->query($sqlquery);
	
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			echo "<option value='" . $row['name'] .$row['league']. "'>" . $row['name'] ." (".$row['league'].") </option>";
		}
	}
	
	
	echo '</select>';
	echo '<br><br>';
	echo 'Away Team: <select name = "awayteam">';
	echo '<option value = "" selected disabled>Please select a team...</option>';
	
	$sqlquery = "SELECT name, league FROM team";
	$result = $mysqli->query($sqlquery);
	
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			echo "<option value='" . $row['name'] . $row['league']."'>" . $row['name'] ." (".$row['league'].") </option>";
			}
		}
	echo '</select>';
	mysqli_close();
?>
	<br><br>
	Date: <input type = "date" name = "fixturedate" value = "<?php echo date ("Y-m-d")?>">
	<br><br>

	<input type = "submit" value = "Add New Fixture" name = "addfixture">
	</form>
<?php

// Adding fixtures into the database
if ($_POST['addfixture']) {

	include 'connect.php' ;
	$hleague =substr(($_POST['hometeam']),-1,1);
	$hteam = substr(($_POST['hometeam']),0,-1);
	$queryID = "SELECT teamid, SchoolID, league FROM team where name = '$hteam' and league = '$hleague'";
	$result = $mysqli -> query($queryID);
	
	if ($result -> num_rows >0) {
		while ($rows = $result -> fetch_assoc()) {
		
			$foundhomeID = $rows['teamid'];
			$foundhomeschoolID = $rows['SchoolID'];
		}
	}
	$aleague=substr(($_POST['awayteam']),-1,1);
	$ateam =substr(($_POST['awayteam']),0,-1);
	$queryID = "SELECT teamid, SchoolID, league FROM team where name = '$ateam' and league ='$aleague'";
	$result = $mysqli -> query($queryID);
	
	if ($result -> num_rows >0) {
		while ($rows = $result -> fetch_assoc()) {
		
			$foundawayID = $rows['teamid'];
			$foundawayschoolID = $rows['SchoolID'];
		}
		}
	
	$sqlquery = "INSERT INTO fixtures VALUES (NULL, '$foundhomeID', '$foundawayID', '$_POST[fixturedate]', 0, '$foundhomeschoolID', '$foundawayschoolID')" ;
	if (mysqli_query($mysqli, $sqlquery)) {
			echo '<script type="text/javascript">';
			echo ' alert("Fixture Added!")';
			echo '</script>';
		} else {
			echo "Error:" . $sqlquery . "<br>" . mysqli_error($mysqli);
	}
	mysqli_close($mysqli);
}
?>
<br><br>


<ins>Current Fixtures</ins>
<h3>Filter:</h3>

	<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
	Team: <select name = "filterteam"> 
	<option value ="" selected disabled>Please select a team...</option>
	
<?php
	// Showing and filtering data according to user-defined filters
	include 'connect.php';
	
	
	$sqlquery = "SELECT name, league, teamid FROM team";
	$result = $mysqli->query($sqlquery);
	
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			
			echo "<option value='" . $row['teamid'] . "'>" . $row['name'] ." (".$row['league'].") </option>";
		}
	}
	
	
	echo '</select> <br><br>';
	echo '<input type = "radio" name = "playedornot" value = "All" checked>Show All Fixtures';
	echo '<input type = "radio" name = "playedornot" value = "Played">Show Only Played Fixtures';
	echo '<input type = "radio" name = "playedornot" value = "NotPlayed">Show Only Unplayed Fixtures <br>';
	echo '<input type = "submit" name = "refreshtable" value = "Refresh"><br><br>';

	$sqlquery = "SELECT * FROM fixtures order by FixtDate desc";
	$result = $mysqli->query($sqlquery);
	


	if ($result ->num_rows>0) {
	
		echo '<table style = "width:50%">';
		echo '<tr>';
		echo '<th>Date</th>';
		echo '<th>Home Team</th>';
		echo '<th>Away Team</th>';
		echo '</tr>';
		$datenow = date('Y-m-d');

		while($row = $result -> fetch_assoc()) {
			$homeid = $row ['HomeTeamID'];
			$awayid = $row ['AwayTeamID'];

			$homeresult = $mysqli -> query("SELECT name, league FROM team where teamid = '$homeid'");
			$awaynamequery = $mysqli -> query("SELECT name, league FROM team where teamid = '$awayid'");
			
			while ($teamname1 = $homeresult->fetch_assoc()) {
				$hometeamname1 = $teamname1 ['name'];
				$hometeamleague = $teamname1 ['league'];
				
				}
			while ($teamname2 = $awaynamequery -> fetch_assoc()) {
				$awayteamname2 = $teamname2 ['name'];
				$awayteamleague = $teamname2 ['league'];
				}
			
			
			
			
			if ($_POST['refreshtable']) {

				if (($_POST['playedornot'] == "All") and (($homeid== $_POST['filterteam']) or ($awayid == $_POST['filterteam']))) {
				
					if ($datenow<($row['FixtDate'])){
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate']))."</td><td>".$hometeamname1. " (". $hometeamleague.")</td> <td>" .$awayteamname2." (".$awayteamleague.")</td></tr>";

					} else {
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "  (Played) </td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>" .$awayteamname2." (".$awayteamleague.")</td></tr>";
					}
				
				} 
				
				if (($_POST['playedornot'] == "Played") and (($homeid== $_POST['filterteam']) or ($awayid == $_POST['filterteam']))) {
				
					if ($datenow>($row['FixtDate'])){
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "  (Played) </td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>" .$awayteamname2." (".$awayteamleague.")</td></tr>";

					}
				
				} 
				if (($_POST['playedornot'] == "NotPlayed") and (($homeid == $_POST['filterteam']) or ($awayid == $_POST['filterteam']))) {
					if ($datenow<($row['FixtDate'])) {
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "</td><td>".$hometeamname1." (". $hometeamleague.")</td><td>".$awayteamname2." (".$awayteamleague.")</td></tr>";
					}
				}
				
			} else {
				if ($datenow<($row['FixtDate'])){
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate']))."</td><td>".$hometeamname1. " (". $hometeamleague.")</td> <td>" .$awayteamname2." (".$awayteamleague.")</td></tr>";

					} else {
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "  (Played) </td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>" .$awayteamname2." (".$awayteamleague.")</td></tr>";
					}
				}
			
		
		}
	} else {
		
		echo '<font style="color:DarkGoldenRod;">NO FIXTURES!</font>';
		}
	


	mysqli_close($mysqli);
	
?>
</form>
</body>

</html>
