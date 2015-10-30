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
	<title>Results - East Midlands Independent Schools Badminton League</title>
	<?php
	function lookupname ($lookupid) {
		include 'connect.php';
		
		$sqlquery = "SELECT FirstName from players where PlayerID = '$lookupid'";
		$result = $mysqli -> query($sqlquery);
		
		if ($result -> num_rows>0) {
			while ($rows = $result -> fetch_assoc()) {
				echo $rows['FirstName'];
			}
		}
		mysqli_close($mysqli);
	}
	?>
</head>
<body>
	<h1>East Midlands Independent Schools Badminton League</h1>
	<h2>Season 2014/15</h2>
	<div>
	<ul>
			<li><a href="/logout.html">Log Out</a></li>
			<li><a href="/teams.php">Teams</a>

			<li><a href="/Fixtures.php">Fixtures</a></li>
			<li><a href="/players.php">Players</a></li>
			<li><a href="/results.php">Results</a></li>
			<li><a href="/schools.php">Schools</a></li>
			<li><a href="/reset.php">Reset</a></li>
    </ul>
	</div><br><br><br>
	
<?php
	session_start();
	echo $_SESSION['hometeam'] . " v " . $_SESSION['awayteam'] . " " . $_SESSION['fixtdate'];
	$homegamestotal = 0;
	$awaygamestotal = 0;
	$homepointstotal=0;
	$awaypointstotal=0;

	
?>
	<form action = "sqlresults.php" method="POST">
	<h3>Confirm Results</h3>
	<h3>Players</h3>
	
	<table style="width:60%">
	<tr>
	<th colspan="2">Home Players</th>
	<th colspan="2">Away Players</th>
	</tr>
	
	<tr>
	<td>Man 1</td>
	<td><?php lookupname($_POST['homeman1']); $_SESSION['homeman1id'] = $_POST['homeman1'];?></td>
	<td>Man 1</td>
	<td><?php lookupname($_POST['awayman1']); $_SESSION['awayman1id'] = $_POST['awayman1'];?></td>
	</tr>
	
	<tr>
	<td>Man 2</td>
	<td><?php lookupname($_POST['homeman2']); $_SESSION['homeman2id'] = $_POST['homeman2'];?></td>
	<td>Man 2</td>
	<td><?php lookupname($_POST['awayman2']); $_SESSION['awayman2id'] = $_POST['awayman2'];?></td>
	</tr>
	
	<tr>
	<td>Man 3</td>
	<td><?php lookupname($_POST['homeman3']); $_SESSION['homeman3id'] = $_POST['homeman3'];?></td>
	<td>Man 3</td>
	<td><?php lookupname($_POST['awayman3']); $_SESSION['awayman3id'] = $_POST['awayman3'];?></td>
	</tr>
	
	<tr>
	<td>Lady 1</td>
	<td><?php lookupname($_POST['homelady1']); $_SESSION['homelady1id'] = $_POST['homelady1'];?></td>
	<td>Lady 1</td>
	<td><?php lookupname($_POST['awaylady1']); $_SESSION['awaylady1id'] = $_POST['awaylady1'];?></td>
	</tr>
	
	<tr>
	<td>Lady 2</td>
	<td><?php lookupname($_POST['homelady2']); $_SESSION['homelady2id'] = $_POST['homelady2'];?></td>
	<td>Lady 2</td>
	<td><?php lookupname($_POST['awaylady2']); $_SESSION['awaylady2id'] = $_POST['awaylady2'];?></td>
	</tr>
	
	<tr>
	<td>Lady 3</td>
	<td><?php lookupname($_POST['homelady3']); $_SESSION['homelady3id'] = $_POST['homelady3'];?></td>
	<td>Lady 3</td>
	<td><?php lookupname($_POST['awaylady3']); $_SESSION['awaylady3id'] = $_POST['awaylady3'];?></td>
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
	<td><?php echo $_POST['point1-h1'];$homepointstotal = $homepointstotal + $_POST['point1-h1'];?></td>
	<td><?php echo $_POST['point1-a1'];$awaypointstotal = $awaypointstotal + $_POST['point1-a1'];?></td>
	<td><?php if ($_POST['point1-h1']>$_POST['point1-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homelady1games = $homelady1games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point1-a1']>$_POST['point1-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awaylady1games = $awaylady1games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td>2</td>
	<td>M1</td>
	<td>v</td>
	<td>M1</td>
	<td><?php echo $_POST['point2-h1'];$homepointstotal = $homepointstotal + $_POST['point2-h1'];?></td>
	<td><?php echo $_POST['point2-a1'];$awaypointstotal = $awaypointstotal + $_POST['point2-a1'];?></td>
	<td><?php if ($_POST['point2-h1']>$_POST['point2-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman1games = $homeman1games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point2-a1']>$_POST['point2-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman1games = $awayman1games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td rowspan="2">3</td>
	<td rowspan="2">M2+M3</td>
	<td rowspan="2">v</td>
	<td rowspan="2">M2+M3</td>
	<td><?php echo $_POST['point3-h1'];$homepointstotal = $homepointstotal + $_POST['point3-h1'];?></td>
	<td><?php echo $_POST['point3-a1'];$awaypointstotal = $awaypointstotal + $_POST['point3-a1'];?></td>
	<td><?php if ($_POST['point3-h1']>$_POST['point3-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman2games = $homeman2games + 1;$homeman3games = $homeman3games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point3-a1']>$_POST['point3-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman2games = $awayman2games + 1;$awayman3games = $awayman3games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td><?php echo $_POST['point3-h2'];$homepointstotal = $homepointstotal + $_POST['point3-h2'];?></td>
	<td><?php echo $_POST['point3-a2'];$awaypointstotal = $awaypointstotal + $_POST['point3-a2'];?></td>
	<td><?php if ($_POST['point3-h2']>$_POST['point3-a2']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman2games = $homeman2games + 1;$homeman3games = $homeman3games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point3-a2']>$_POST['point3-h2']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman2games = $awayman2games + 1;$awayman3games = $awayman3games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td rowspan="2">4</td>
	<td rowspan="2">L2+L3</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L2+L3</td>
	<td><?php echo $_POST['point4-h1'];$homepointstotal = $homepointstotal + $_POST['point4-h1'];?></td>
	<td><?php echo $_POST['point4-a1'];$awaypointstotal = $awaypointstotal + $_POST['point4-a1'];?></td>
	<td><?php if ($_POST['point4-h1']>$_POST['point4-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homelady2games = $homelady2games + 1;$homelady3games = $homelady3games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point4-a1']>$_POST['point4-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awaylady2games = $awaylady2games + 1;$awaylady3games = $awaylady3games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td><?php echo $_POST['point4-h2'];$homepointstotal = $homepointstotal + $_POST['point4-h2'];?></td>
	<td><?php echo $_POST['point4-a2'];$awaypointstotal = $awaypointstotal + $_POST['point4-a2'];?></td>
	<td><?php if ($_POST['point4-h2']>$_POST['point4-a2']) {echo "1";$homegamestotal = $homegamestotal + 1;$homelady2games = $homelady2games + 1;$homelady3games = $homelady3games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point4-a2']>$_POST['point4-h2']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awaylady2games = $awaylady2games + 1;$awaylady3games = $awaylady3games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td rowspan="2">5</td>
	<td rowspan="2">M1+M2</td>
	<td rowspan="2">v</td>
	<td rowspan="2">M1+M2</td>
	<td><?php echo $_POST['point5-h1'];$homepointstotal = $homepointstotal + $_POST['point5-h1'];?></td>
	<td><?php echo $_POST['point5-a1'];$awaypointstotal = $awaypointstotal + $_POST['point5-a1'];?></td>
	<td><?php if ($_POST['point5-h1']>$_POST['point5-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman1games = $homeman1games + 1;$homeman2games = $homeman2games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point5-a1']>$_POST['point5-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman1games = $awayman1games + 1;$awayman2games = $awayman2games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td><?php echo $_POST['point5-h2'];$homepointstotal = $homepointstotal + $_POST['point5-h2'];?></td>
	<td><?php echo $_POST['point5-a2'];$awaypointstotal = $awaypointstotal + $_POST['point5-a2'];?></td>
	<td><?php if ($_POST['point5-h2']>$_POST['point5-a2']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman1games = $homeman1games + 1;$homeman2games = $homeman2games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point5-a2']>$_POST['point5-h2']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman1games = $awayman1games + 1;$awayman2games = $awayman2games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td rowspan="2">6</td>
	<td rowspan="2">L1+L2</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L1+L2</td>
	<td><?php echo $_POST['point6-h1'];$homepointstotal = $homepointstotal + $_POST['point6-h1'];?></td>
	<td><?php echo $_POST['point6-a1'];$awaypointstotal = $awaypointstotal + $_POST['point6-a1'];?></td>
	<td><?php if ($_POST['point6-h1']>$_POST['point6-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homelady1games = $homelady1games + 1;$homelady2games = $homelady2games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point6-a1']>$_POST['point6-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awaylady1games = $awaylady1games + 1;$awaylady2games = $awaylady2games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td><?php echo $_POST['point6-h2'];$homepointstotal = $homepointstotal + $_POST['point6-h2'];?></td>
	<td><?php echo $_POST['point6-a2'];$awaypointstotal = $awaypointstotal + $_POST['point6-a2'];?></td>
	<td><?php if ($_POST['point6-h2']>$_POST['point6-a2']) {echo "1";$homegamestotal = $homegamestotal + 1;$homelady1games = $homelady1games + 1;$homelady2games = $homelady2games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point6-a2']>$_POST['point6-h2']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awaylady1games = $awaylady1games + 1;$awaylady2games = $awaylady2games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td rowspan="2">7</td>
	<td rowspan="2">L3+M3</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L3+M3</td>
	<td><?php echo $_POST['point7-h1'];$homepointstotal = $homepointstotal + $_POST['point7-h1'];?></td>
	<td><?php echo $_POST['point7-a1'];$awaypointstotal = $awaypointstotal + $_POST['point7-a1'];?></td>
	<td><?php if ($_POST['point7-h1']>$_POST['point7-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman3games = $homeman3games + 1;$homelady3games = $homelady3games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point7-a1']>$_POST['point7-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman3games = $awayman3games + 1;$awaylady3games = $awaylady3games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td><?php echo $_POST['point7-h2'];$homepointstotal = $homepointstotal + $_POST['point7-h2'];?></td>
	<td><?php echo $_POST['point7-a2'];$awaypointstotal = $awaypointstotal + $_POST['point7-a2'];?></td>
	<td><?php if ($_POST['point7-h2']>$_POST['point7-a2']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman3games = $homeman3games + 1;$homelady3games = $homelady3games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point7-a2']>$_POST['point7-h2']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman3games = $awayman3games + 1;$awaylady3games = $awaylady3games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td rowspan="2">8</td>
	<td rowspan="2">L1+M1</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L1+M1</td>
	<td><?php echo $_POST['point8-h1'];$homepointstotal = $homepointstotal + $_POST['point8-h1'];?></td>
	<td><?php echo $_POST['point8-a1'];$awaypointstotal = $awaypointstotal + $_POST['point8-a1'];?></td>
	<td><?php if ($_POST['point8-h1']>$_POST['point8-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman1games = $homeman1games + 1;$homelady1games = $homelady1games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point8-a1']>$_POST['point8-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman1games = $awayman1games + 1;$awaylady1games = $awaylady1games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td><?php echo $_POST['point8-h2'];$homepointstotal = $homepointstotal + $_POST['point8-h2'];?></td>
	<td><?php echo $_POST['point8-a2'];$awaypointstotal = $awaypointstotal + $_POST['point8-a2'];?></td>
	<td><?php if ($_POST['point8-h2']>$_POST['point8-a2']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman1games = $homeman1games + 1;$homelady1games = $homelady1games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point8-a2']>$_POST['point8-h2']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman1games = $awayman1games + 1;$awaylady1games = $awaylady1games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td rowspan="2">9</td>
	<td rowspan="2">L3+M2</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L3+M2</td>
	<td><?php echo $_POST['point9-h1'];$homepointstotal = $homepointstotal + $_POST['point9-h1'];?></td>
	<td><?php echo $_POST['point9-a1'];$awaypointstotal = $awaypointstotal + $_POST['point9-a1'];?></td>
	<td><?php if ($_POST['point9-h1']>$_POST['point9-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman2games = $homeman2games + 1;$homelady3games = $homelady3games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point9-a1']>$_POST['point9-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman2games = $awayman2games + 1;$awaylady3games = $awaylady3games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td><?php echo $_POST['point9-h2'];$homepointstotal = $homepointstotal + $_POST['point9-h2'];?></td>
	<td><?php echo $_POST['point9-a2'];$awaypointstotal = $awaypointstotal + $_POST['point9-a2'];?></td>
	<td><?php if ($_POST['point9-h2']>$_POST['point9-a2']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman2games = $homeman2games + 1;$homelady3games = $homelady3games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point9-a2']>$_POST['point9-h2']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman2games = $awayman2games + 1;$awaylady3games = $awaylady3games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td rowspan="2">10</td>
	<td rowspan="2">L2+M3</td>
	<td rowspan="2">v</td>
	<td rowspan="2">L2+M3</td>
	<td><?php echo $_POST['point10-h1'];$homepointstotal = $homepointstotal + $_POST['point10-h1'];?></td>
	<td><?php echo $_POST['point10-a1'];$awaypointstotal = $awaypointstotal + $_POST['point10-a1'];?></td>
	<td><?php if ($_POST['point10-h1']>$_POST['point10-a1']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman3games = $homeman3games + 1;$homelady2games = $homelady2games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point10-a1']>$_POST['point10-h1']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman3games = $awayman3games + 1;$awaylady2games = $awaylady2games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td><?php echo $_POST['point10-h2'];$homepointstotal = $homepointstotal + $_POST['point10-h2'];?></td>
	<td><?php echo $_POST['point10-a2'];$awaypointstotal = $awaypointstotal + $_POST['point10-a2'];?></td>
	<td><?php if ($_POST['point10-h2']>$_POST['point10-a2']) {echo "1";$homegamestotal = $homegamestotal + 1;$homeman3games = $homeman3games + 1;$homelady2games = $homelady2games + 1;}else{echo"0";}?></td>
	<td><?php if ($_POST['point10-a2']>$_POST['point10-h2']) {echo "1";$awaygamestotal = $awaygamestotal + 1;$awayman3games = $awayman3games + 1;$awaylady2games = $awaylady2games + 1;}else{echo"0";}?></td>
	</tr>
	
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td>Total</td>
	<td><?php echo $homepointstotal?></td>
	<td><?php echo $awaypointstotal;?></td>
	<td><?php echo $homegamestotal;?></td>
	<td><?php echo $awaygamestotal;?></td>
	</tr>
	
	</table>
	<?php
		$_SESSION['homepointstotal'] = $homepointstotal;
		$_SESSION['awaypointstotal'] = $awaypointstotal;
		$_SESSION['homegamestotal'] = $homegamestotal;
		$_SESSION['awaygamestotal'] = $awaygamestotal;
		
		$homeman1points = $_POST['point2-h1'] + $_POST['point5-h1'] + $_POST['point5-h2'] + $_POST['point8-h1'] + $_POST['point8-h2'];
		$homeman2points = $_POST['point3-h1'] + $_POST['point3-h2'] + $_POST['point5-h1'] + $_POST['point5-h2'] + $_POST['point9-h1'] + $_POST['point9-h2'];
		$homeman3points = $_POST['point3-h1'] + $_POST['point3-h2'] + $_POST['point7-h1'] + $_POST['point7-h2'] + $_POST['point10-h1'] + $_POST['point10-h2'];
		$homelady1points = $_POST['point1-h1'] + $_POST['point6-h1'] + $_POST['point6-h2'] + $_POST['point8-h1'] + $_POST['point8-h2'];
		$homelady2points = $_POST['point4-h1'] + $_POST['point4-h2'] + $_POST['point6-h1'] + $_POST['point6-h2'] + $_POST['point10-h1'] + $_POST['point10-h2'];
		$homelady3points = $_POST['point4-h1'] + $_POST['point4-h2'] + $_POST['point7-h1'] + $_POST['point7-h2'] + $_POST['point9-h1'] + $_POST['point9-h2'];
		
		$_SESSION['hman1points'] = $homeman1points;
		$_SESSION['hman2points'] = $homeman2points;
		$_SESSION['hman3points'] = $homeman3points;
		$_SESSION['hlady1points'] = $homelady1points;
		$_SESSION['hlady2points'] = $homelady2points;
		$_SESSION['hlady3points'] = $homelady3points;
		
		$awayman1points = $_POST['point2-a1'] + $_POST['point5-a1'] + $_POST['point5-a2'] + $_POST['point8-a1'] + $_POST['point8-a2'];
		$awayman2points = $_POST['point3-a1'] + $_POST['point3-a2'] + $_POST['point5-a1'] + $_POST['point5-a2'] + $_POST['point9-a1'] + $_POST['point9-a2'];
		$awayman3points = $_POST['point3-a1'] + $_POST['point3-a2'] + $_POST['point7-a1'] + $_POST['point7-a2'] + $_POST['point10-a1'] + $_POST['point10-a2'];
		$awaylady1points = $_POST['point1-a1'] + $_POST['point6-a1'] + $_POST['point6-a2'] + $_POST['point8-a1'] + $_POST['point8-a2'];
		$awaylady2points = $_POST['point4-a1'] + $_POST['point4-a2'] + $_POST['point6-a1'] + $_POST['point6-a2'] + $_POST['point10-a1'] + $_POST['point10-a2'];
		$awaylady3points = $_POST['point4-a1'] + $_POST['point4-a2'] + $_POST['point7-a1'] + $_POST['point7-a2'] + $_POST['point9-a1'] + $_POST['point9-a2'];
		
		$_SESSION['aman1points'] = $awayman1points;
		$_SESSION['aman2points'] = $awayman2points;
		$_SESSION['aman3points'] = $awayman3points;
		$_SESSION['alady1points'] = $awaylady1points;
		$_SESSION['alady2points'] = $awaylady2points;
		$_SESSION['alady3points'] = $awaylady3points;
		
		$_SESSION['hman1games'] = $homeman1games;
		$_SESSION['hman2games'] = $homeman2games;
		$_SESSION['hman3games'] = $homeman3games;
		$_SESSION['hlady1games'] = $homelady1games;
		$_SESSION['hlady2games'] = $homelady2games;
		$_SESSION['hlady3games'] = $homelady3games;
		
		$_SESSION['aman1games'] = $awayman1games;
		$_SESSION['aman2games'] = $awayman2games;
		$_SESSION['aman3games'] = $awayman3games;
		$_SESSION['alady1games'] = $awaylady1games;
		$_SESSION['alady2games'] = $awaylady2games;
		$_SESSION['alady3games'] = $awaylady3games;
	?>
	<br>
	
	<input type="submit" name="savetodatabase" value = "Confirm and Save to Database">
	
	</form>
	
	
	
</body>
</html>	