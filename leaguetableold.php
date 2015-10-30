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
	<title>Tables - East Midlands Independent Schools Badminton League</title>
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
	</div><br><br><br>
	<h3>For the Players League table: <a href="/playerleaguetable.php">CLICK HERE</a></h3>

	<ins>Teams League A Table</ins><br>

<?php
	include 'connect.php';
	echo '<table style="width:30%">';
	echo '<tr>';
	echo '<th>Position</th>';
	echo '<th>Team Name</th>';
	echo '<th>Games Won</th>';
	echo '</tr>';

	$Acount = 0;

	$Asqlquery = "SELECT name, gameswon from team where league = 'A' order by gameswon desc";
	$Aresults = $mysqli -> query($Asqlquery);
	if ($Aresults -> num_rows > 0) {
		while ($Arows = $Aresults -> fetch_assoc()) {
			$Acount = $Acount + 1;
			echo '<tr>';
			echo '<td>' . $Acount . '</td>';
			echo '<td>' . $Arows['name'] . '</td>';
			echo '<td>' . $Arows['gameswon'] . '</td>';
			echo '</tr>';

		}
	}
	echo '</table>';
	echo '<ins>Teams League B Table</ins><br>';
	echo '<table style="width:30%">';
	echo '<tr>';
	echo '<th>Position</th>';
	echo '<th>Team Name</th>';
	echo '<th>Games Won</th>';
	echo '</tr>';

	$Bcount = 0;

	$Bsqlquery = "SELECT name, gameswon from team where league ='B' order by gameswon desc";
	$Bresults = $mysqli ->query($Bsqlquery);
	if ($Bresults -> num_rows > 0) {
		while ($Brows = $Bresults -> fetch_assoc()) {
			$Bcount = $Bcount + 1;
			echo '<tr>';
			echo '<td>' . $Bcount . '</td>';
			echo '<td>' . $Brows['name'] . '</td>';
			echo '<td>' . $Brows['gameswon'] . '</td>';
			echo '<tr>';
		}
	}
	mysqli_close($mysqli);
?>

</body>
</html>
