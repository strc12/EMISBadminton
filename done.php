
<?php
session_start();

// CONNECT TO THE DATABASE
	$fixtureid=$_SESSION['fixtureid'];
echo $fixtureid."<br>";

	$team2=$_SESSION['awayteam'];
	$team1=$_SESSION['hometeam'];
	$awaygametotal=$_SESSION['awaygametotal'];
	$homegametotal=$_SESSION['homegametotal'];
	$ptsfor=$_SESSION['ptsfor'];
	$ptsagainst=$_SESSION['ptsagainst'];
	echo $ptsfor."<br>";
	echo $ptsagainst."<br>";
	echo $awaygametotal."<br>";
	echo $homegametotal."<br>";
	include 'connect.php';
	$sql = "UPDATE schools SET gamesplayed = gamesplayed +1, pointsfor= pointsfor +$ptsfor, pointsagainst = pointsagainst+$ptsagainst, gameswon = gameswon+$homegametotal, gameslost=gameslost+$awaygametotal WHERE name='$team1'";
	$sql1 = "UPDATE schools SET gamesplayed = gamesplayed +1, pointsfor= pointsfor +$ptsagainst, pointsagainst = pointsagainst+$ptsfor, gameswon = gameswon+$awaygametotal, gameslost=gameslost+$homegametotal WHERE name='$team2'";
	$sql2 = "UPDATE fixtures SET resultentered =1, awayscoregames = $awaygametotal, homescoregames=$homegametotal WHERE fixtureid=$fixtureid";
	mysqli_query($mysqli, $sql);
	mysqli_query($mysqli, $sql1);
	
	mysqli_query($mysqli, $sql2);
// CLOSE CONNECTION
	mysqli_close($mysqli);
	header("Location: index.php");
	exit();
?>

