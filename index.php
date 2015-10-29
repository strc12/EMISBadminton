<html>
<style>
	h1,h2{
		color:MediumBlue;
		text-align:center;
		}
	div{
		text-align:center;
		}
	body {
		background-color:beige;
		}
	ul{
		padding:0;
		
		}
	ul li{
		float: left;
		width:100px;
		text-align:center;
		}
	ul li a{
		display:block;
		padding:5px 10px;
		color:#333;
		background:#f2f2f2;
		text-decoration:none;
		border-style:ridge;
		}
	ul li a:link{
		border-color: #000;
		}
	
	ul li a:hover{
        color: #fff;
        background: #939393;
		border-color: #fff;
		}
		
	ins{
		font-size:200%;
		color:DarkGoldenRod;
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
	<title>East Midlands Independent Schools Badminton League</title>
</head>
<body>
	<h1>East Midlands Independent Schools Badminton League</h1>
	<h2>Season 2015/16</h2>
	<div>
	<ul>
			<li><a href="/index.php">Home</a></li>
			<li><a href="/leaguetable.php">Tables</a></li>
			<li><a href="/password.html">Admin</a></li>

			
    </ul>
	</div>
	<br><br><br>
	<ins>Current Fixtures</ins>
<h3>Filter:</h3>

	<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
	Team: <select name = "filterteam"> 
	<option value ="" selected disabled>Please select a team...</option>
<?php
	include "connect.php";
	$sqlquery = "SELECT name, league FROM team";
	$result = $mysqli->query($sqlquery);
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			echo "<option value='" . $row['name'] . "'>" . $row['name'] ." (".$row['league'].") </option>";
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

				if (($_POST['playedornot'] == "All") and (($hometeamname1== $_POST['filterteam']) or ($awayteamname2 == $_POST['filterteam']))) {
				
					if ($datenow<($row['FixtDate'])){
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate']))."</td><td>".$hometeamname1. " (". $hometeamleague.")</td> <td>" .$awayteamname2." (".$awayteamleague.")</td></tr>";

					} else {
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "  (Played) </td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>" .$awayteamname2." (".$awayteamleague.")</td></tr>";
					}
				
				} 
				
				if (($_POST['playedornot'] == "Played") and (($hometeamname1== $_POST['filterteam']) or ($awayteamname2 == $_POST['filterteam']))) {
				
					if ($datenow>($row['FixtDate'])){
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "  (Played) </td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>" .$awayteamname2." (".$awayteamleague.")</td></tr>";

					}
				
				} 
				if (($_POST['playedornot'] == "NotPlayed") and (($hometeamname1 == $_POST['filterteam']) or ($awayteamname2 == $_POST['filterteam']))) {
					if ($datenow<($row['FixtDate'])) {
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "</td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>".$awayteamname2." (".$awayteamleague.")</td></tr>";
					}
				}
				
			} else {
				if ($datenow<($row['FixtDate'])){
						echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate']))."</td><td>".$hometeamname1. "</td> <td>" .$awayteamname2."</td></tr>";

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
