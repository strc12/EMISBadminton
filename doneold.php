<!doctype html>
<html>
<head>
<style>
table, th, td{
	border:1px solid blue;
	border-collapse:collapse;}
th,td{

	padding:5px;
	text-align:center;}
tr.rowhigh{
	background-color:lightgrey;
}
input[type="text"]{
	width:20px;
}
</style>
	<title> Score sheet</title>
</head>
<body>


<?php 
session_start();
echo $_SESSION['hometeam']." v ".$_SESSION['awayteam']. " - ". $_SESSION['matchdate'];
?> 
<br>

<table style = 'width:80%'>
<tr>
<th colspan="2">Home Players</th>
<th colspan="2">Away Players</th>
</tr>
<tr>
<td colspan "2">Man1</td>
<td colspan "2"><?php echo $_SESSION["homeman1"];?></td>
<td colspan "2">Man1</td>
<td colspan "2"><?php echo $_SESSION["awayman1"];?></td>
</tr>
<tr>
<td colspan "2">Man2</td>
<td colspan "2"><?php echo $_SESSION["homeman2"];?></td>
<td colspan "2">Man2</td>
<td colspan "2"><?php echo $_SESSION["awayman2"];?></td>
</tr>
<tr>
<td colspan "2">Man3</td>
<td colspan "2"><?php echo $_SESSION["homeman3"];?></td>
<td colspan "2">Man3</td>
<td colspan "2"><?php echo $_SESSION["awayman3"];?></td>
</tr>
<tr>
<td colspan "2">Lady1</td>
<td colspan "2"><?php echo $_SESSION["homelady1"];?></td>
<td colspan "2">Lady1</td>
<td colspan "2"><?php echo $_SESSION["awaylady1"];?></td>
</tr>
<tr>
<td colspan "2">Lady2</td>
<td colspan "2"><?php echo $_SESSION["homelady2"];?></td>
<td colspan "2">Lady2</td>
<td colspan "2"><?php echo $_SESSION["awaylady2"];?></td>
</tr>
<tr>
<td colspan "2">Lady3</td>
<td colspan "2"><?php echo $_SESSION["homelady3"];?></td>
<td colspan "2">Lady3</td>
<td colspan "2"><?php echo $_SESSION["awaylady3"];?></td>
</tr> 
</table>
<form action =<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method ="POST">
<table style = 'width:80%'>
<tr>
<th>Match No</th>
<th>Home</th>
<th> v </th>
<th>Away</th>
<th>Home Points</th>
<th>Away Points</th>
<th>Home Games</th>
<th>Away Games</th>
</tr>
<tr>
<td>1</td>
<td><?php echo $_SESSION["homelady1"]?></td>
<td>v</td>
<td><?php echo $_SESSION["awaylady1"]?></td>
<td><?php echo $_POST["1-h"]?></td>
<td><?php echo $_POST["1-a"]?></td>
<td><?php if($_POST["1-h"]>$_POST["1-a"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["1-h"]<$_POST["1-a"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td>2</td>
<td><?php echo $_SESSION["homeman1"]?></td>
<td>v</td>
<td><?php echo $_SESSION["awayman1"]?></td>
<td><?php echo $_POST["2-h"]?></td>
<td><?php echo $_POST["2-a"]?></td>
<td><?php if($_POST["2-h"]>$_POST["2-a"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["2-h"]<$_POST["2-a"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr class="rowhigh">
<td rowspan="2">3</td>
<td><?php echo $_SESSION["homeman2"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_SESSION["awayman2"];?></td>
<td><?php echo $_POST["3-h1"]?></td>
<td><?php echo $_POST["3-a1"]?></td>
<td><?php if($_POST["3-h1"]>$_POST["3-a1"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["3-h1"]<$_POST["3-a1"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr class ="rowhigh">
<td><?php echo $_SESSION["homeman3"];?></td>
<td><?php echo $_SESSION["awayman3"];?></td>
<td><?php echo $_POST["3-h2"]?></td>
<td><?php echo $_POST["3-a2"]?></td>
<td><?php if($_POST["3-h2"]>$_POST["3-a2"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["3-h2"]<$_POST["3-a2"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td rowspan="2">4</td>
<td><?php echo $_SESSION["homelady2"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_SESSION["awaylady3"];?></td>
<td><?php echo $_POST["4-h1"]?></td>
<td><?php echo $_POST["4-a1"]?></td>
<td><?php if($_POST["4-h1"]>$_POST["4-a1"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["4-h1"]<$_POST["4-a1"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td><?php echo $_SESSION["homelady2"];?></td>
<td><?php echo $_SESSION["awaylady3"];?></td>
<td><?php echo $_POST["4-h2"]?></td>
<td><?php echo $_POST["4-a2"]?></td>
<td><?php if($_POST["4-h2"]>$_POST["4-a2"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["4-h2"]<$_POST["4-a2"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr class="rowhigh">
<td rowspan="2">5</td>
<td><?php echo $_SESSION["homeman1"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_SESSION["awayman1"];?></td>
<td><?php echo $_POST["5-h1"]?></td>
<td><?php echo $_POST["5-a1"]?></td>
<td><?php if($_POST["5-h1"]>$_POST["5-a1"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["5-h1"]<$_POST["5-a1"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr class ="rowhigh">
<td><?php echo $_SESSION["homeman2"];?></td>
<td><?php echo $_SESSION["awayman2"];?></td>
<td><?php echo $_POST["5-h2"]?></td>
<td><?php echo $_POST["5-a2"]?></td>
<td><?php if($_POST["5-h2"]>$_POST["5-a2"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["5-h2"]<$_POST["5-a2"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td rowspan="2">6</td>
<td><?php echo $_SESSION["homelady1"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_SESSION["awaylady1"];?></td>
<td><?php echo $_POST["6-h1"]?></td>
<td><?php echo $_POST["6-a1"]?></td>
<td><?php if($_POST["6-h1"]>$_POST["6-a1"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["6-h1"]<$_POST["6-a1"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td><?php echo $_SESSION["homelady2"];?></td>
<td><?php echo $_SESSION["awaylady2"];?></td>
<td><?php echo $_POST["6-h2"]?></td>
<td><?php echo $_POST["6-a2"]?></td>
<td><?php if($_POST["6-h2"]>$_POST["6-a2"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["6-h2"]<$_POST["6-a2"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr class="rowhigh">
<td rowspan="2">7</td>
<td><?php echo $_SESSION["homeman3"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_SESSION["awayman3"];?></td>
<td><?php echo $_POST["7-h1"]?></td>
<td><?php echo $_POST["7-a1"]?></td>
<td><?php if($_POST["7-h1"]>$_POST["7-a1"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["7-h1"]<$_POST["7-a1"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr class="rowhigh">
<td><?php echo $_SESSION["homelady3"];?></td>
<td><?php echo $_SESSION["awaylady3"];?></td>
<td><?php echo $_POST["7-h2"]?></td>
<td><?php echo $_POST["7-a2"]?></td>
<td><?php if($_POST["7-h2"]>$_POST["7-a2"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["7-h2"]<$_POST["7-a2"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td rowspan="2">8</td>
<td><?php echo $_SESSION["homeman1"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_SESSION["awayman1"];?></td>
<td><?php echo $_POST["8-h1"]?></td>
<td><?php echo $_POST["8-a1"]?></td>
<td><?php if($_POST["8-h1"]>$_POST["8-a1"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["8-h1"]<$_POST["8-a1"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td><?php echo $_SESSION["homelady1"];?></td>
<td><?php echo $_SESSION["awaylady1"];?></td>
<td><?php echo $_POST["8-h2"]?></td>
<td><?php echo $_POST["8-a2"]?></td>
<td><?php if($_POST["8-h2"]>$_POST["8-a2"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["8-h2"]<$_POST["8-a2"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr class="rowhigh">
<td rowspan="2">9</td>
<td><?php echo $_SESSION["homeman2"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_SESSION["awayman2"];?></td>
<td><?php echo $_POST["9-h1"]?></td>
<td><?php echo $_POST["9-a1"]?></td>
<td><?php if($_POST["9-h1"]>$_POST["9-a1"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["9-h1"]<$_POST["9-a1"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr class ="rowhigh">
<td><?php echo $_SESSION["homelady3"];?></td>
<td><?php echo $_SESSION["awaylady3"];?></td>
<td><?php echo $_POST["9-h2"]?></td>
<td><?php echo $_POST["9-a2"]?></td>
<td><?php if($_POST["9-h2"]>$_POST["9-a2"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["9-h2"]<$_POST["9-a2"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td rowspan="2">10</td>
<td><?php echo $_SESSION["homeman3"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_SESSION["awayman3"];?></td>
<td><?php echo $_POST["10-h1"]?></td>
<td><?php echo $_POST["10-a1"]?></td>
<td><?php if($_POST["10-h1"]>$_POST["10-a1"]){echo "1";$homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["10-h1"]<$_POST["10-a1"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td><?php echo $_SESSION["homelady2"];?></td>
<td><?php echo $_SESSION["awaylady2"];?></td>
<td><?php echo $_POST["10-h2"]?></td>
<td><?php echo $_POST["10-a2"]?></td>
<td><?php if($_POST["10-h2"]>$_POST["10-a2"]){echo "1"; $homegametotal=$homegametotal+"1";}else{echo"0";}?></td>
<td><?php if($_POST["10-h2"]<$_POST["10-a2"]){echo "1";$awaygametotal=$awaygametotal+"1";}else{echo"0";}?></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td>Totals</td>
<?php
//echo
//if (!isset($_SESSION['ptsfor'])){
//echo"sessino";
//$ptsfor=$_POST["10-h2"]+$_POST["10-h1"]+$_POST["9-h2"]+$_POST["9-h1"]+$_POST["8-h2"]+$_POST["8-h1"]+$_POST["7-h2"]+$_POST["7-h1"]+$_POST["6-h2"]+$_POST["6-h1"]+$_POST["5-h2"]+$_POST["5-h1"]+$_POST["4-h2"]+$_POST["4-h1"]+$_POST["3-h2"]+$_POST["3-h1"]+$_POST["2-h"]+$_POST["1-h"];
//$ptsagainst=$_POST["10-a2"]+$_POST["10-a1"]+$_POST["9-a2"]+$_POST["9-a1"]+$_POST["8-a2"]+$_POST["8-a1"]+$_POST["7-a2"]+$_POST["7-a1"]+$_POST["6-a2"]+$_POST["6-a1"]+$_POST["5-a2"]+$_POST["5-a1"]+$_POST["4-a2"]+$_POST["4-a1"]+$_POST["3-a2"]+$_POST["3-a1"]+$_POST["2-a"]+$_POST["1-a"];
//$_SESSION['ptsfor']=$ptsfor;
//$_SESSION['ptsagainst']=$ptsagainst;
//$_SESSION['awaygametotal']=$awaygametotal;
//$_SESSION['homegametotal']=$homegametotal;
//}
?>
<td><?php echo $_POST["10-h2"]+$_POST["10-h1"]+$_POST["9-h2"]+$_POST["9-h1"]+$_POST["8-h2"]+$_POST["8-h1"]+$_POST["7-h2"]+$_POST["7-h1"]+$_POST["6-h2"]+$_POST["6-h1"]+$_POST["5-h2"]+$_POST["5-h1"]+$_POST["4-h2"]+$_POST["4-h1"]+$_POST["3-h2"]+$_POST["3-h1"]+$_POST["2-h"]+$_POST["1-h"]?></td>
<td><?php echo $_POST["10-a2"]+$_POST["10-a1"]+$_POST["9-a2"]+$_POST["9-a1"]+$_POST["8-a2"]+$_POST["8-a1"]+$_POST["7-a2"]+$_POST["7-a1"]+$_POST["6-a2"]+$_POST["6-a1"]+$_POST["5-a2"]+$_POST["5-a1"]+$_POST["4-a2"]+$_POST["4-a1"]+$_POST["3-a2"]+$_POST["3-a1"]+$_POST["2-a"]+$_POST["1-a"]?></td>
<td><?php echo $homegametotal ?></td>
<td><?php echo $awaygametotal ?></td>
</tr>
</table>
</table>

<input name='updatescores' type='submit' value='Confirm and Update Database' >
</form>
<br>

<a href="enterresult.php"> Back </a>

<?php
//
// CONNECT TO THE DATABASE
	$fixtureid=$_SESSION['fixtureid'];
	$team2=$_SESSION['awayteam'];
	$team1=$_SESSION['hometeam'];
	echo $fixtureid;
	echo"<br>";
	$awaygametotal=$_SESSION['awaygametotal'];
	echo"<br>";
	$homegametotal=$_SESSION['homegametotal'];
	echo"<br>";
	$ptsfor=$_SESSION['ptsfor'];
	echo"<br>";
	$ptsagainst=$_SESSION['ptsagainst'];
	echo"<br>";
	include 'connect.php';
	$sql = "UPDATE schools SET pointsfor= pointsfor +$ptsfor, pointsagainst = pointsagainst+$ptsagainst, gameswon = gameswon+$homegametotal, gameslost=gameslost+$awaygametotal WHERE name='$team1'";
	$sql1 = "UPDATE schools SET pointsfor= pointsfor +$ptsagainst, pointsagainst = pointsagainst+$ptsfor, gameswon = gameswon+$awaygametotal, gameslost=gameslost+$homegametotal WHERE name='$team2'";
	$sql2 = "UPDATE fixtures SET resultentered =1, awayscoregames = $awaygametotal, homescoregames=$homegametotal WHERE fixtureid=$fixtureid";
	mysqli_query($mysqli, $sql);
	mysqli_query($mysqli, $sql1);
	echo $sql2;
	echo"<br>";
	echo $sql;
	echo"<br>";
	echo $sql1;
	echo"<br>";
	mysqli_query($mysqli, $sql2);
// CLOSE CONNECTION
	mysqli_close($mysqli);
	header("Location: index.html");
	exit();
?>
</body>
<html>

