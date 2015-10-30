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
	
	<h3>For the Teams League Table: <a href="/leaguetable.php">CLICK HERE</a><br><br>
	
	<ins>Top 20 Players in the League</ins>
	
<?php
	include 'connect.php';
	echo '<table style="width:30%">';
	echo '<tr>';
	echo '<th>Position</th>';
	echo '<th>Player Name</th>';
	echo '<th>Games Won</th>';
	echo '</tr>';
	$count = 0;
	
	$sqlquery = "SELECT * from players order by gameswon desc limit 20";
	$results = $mysqli -> query($sqlquery);
	
	if ($results -> num_rows >0) {
		while ($rows = $results -> fetch_assoc()) {
			$queryschoolID = $rows['SchoolID'];
			$schoolquery = "SELECT schoolname from schools where SchoolID = '$queryschoolID'";
			$schoolresult = $mysqli -> query($schoolquery);
			while ($schoolrows = $schoolresult -> fetch_assoc()) {
				$foundschoolname = $schoolrows ['schoolname'];
			}
			
			$count = $count + 1;
			echo '<tr>';
			echo '<td>' . $count . '</td>';
			echo "<td>" . $rows['FirstName'] . " " . $rows['LastName'] . " (" . $foundschoolname . ")</td>";
			echo "<td>" . $rows['gameswon'] . "</td>";
			echo '</tr>';
		}
	}
?>
	
	
</body>
</html>
