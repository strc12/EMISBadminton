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
</body>
<?php 
session_start();
$_SESSION["homelady1"]=$_POST["homelady1"];
$_SESSION["awaylady1"]=$_POST["awaylady1"];
$_SESSION["homelady2"]=$_POST["homelady2"];
$_SESSION["homelady3"]=$_POST["homelady3"];
$_SESSION["awaylady2"]=$_POST["awaylady2"];
$_SESSION["awaylady3"]=$_POST["awaylady3"];
$_SESSION["homeman1"]=$_POST["homeman1"];
$_SESSION["homeman2"]=$_POST["homeman2"];
$_SESSION["homeman3"]=$_POST["homeman3"];
$_SESSION["awayman1"]=$_POST["awayman1"];
$_SESSION["awayman2"]=$_POST["awayman2"];
$_SESSION["awayman3"]=$_POST["awayman3"];

echo $_SESSION['hometeam']." v ".$_SESSION['awayteam']. " - ". $_SESSION['matchdate'];
function validatescore($score){
	if ($score >21) {
		return false;;
	}else{
	return true;}
}
?> 
<br>

<table style = 'width:80%'>
<tr>
<th colspan="2">Home Players</th>
<th colspan="2">Away Players</th>
</tr>
<tr>
<td colspan "2">Man1</td>
<td colspan "2"><?php echo $_POST["homeman1"];?></td>
<td colspan "2">Man1</td>
<td colspan "2"><?php echo $_POST["awayman1"];?></td>
</tr>
<tr>
<td colspan "2">Man2</td>
<td colspan "2"><?php echo $_POST["homeman2"];?></td>
<td colspan "2">Man2</td>
<td colspan "2"><?php echo $_POST["awayman2"];?></td>
</tr>
<tr>
<td colspan "2">Man3</td>
<td colspan "2"><?php echo $_POST["homeman3"];?></td>
<td colspan "2">Man3</td>
<td colspan "2"><?php echo $_POST["awayman3"];?></td>
</tr>

<tr>
<td colspan "2">Lady1</td>
<td colspan "2"><?php echo $_POST["homelady1"];?></td>
<td colspan "2">Lady1</td>
<td colspan "2"><?php echo $_POST["awaylady1"];?></td>
</tr>
<tr>
<td colspan "2">Lady2</td>
<td colspan "2"><?php echo $_POST["homelady2"];?></td>
<td colspan "2">Lady2</td>
<td colspan "2"><?php echo $_POST["awaylady2"];?></td>
</tr>
<tr>
<td colspan "2">Lady3</td>
<td colspan "2"><?php echo $_POST["homelady3"];?></td>
<td colspan "2">Lady3</td>
<td colspan "2"><?php echo $_POST["awaylady3"];?></td>
</tr> 
<form action ="finalresult.php" method ="POST">
</table>
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
<td><?php echo $_POST["homelady1"];?></td>
<td>v</td>
<td><?php echo $_POST["awaylady1"];?></td>
<td><input type="text" name="1-h"></td>
<td><input type="text" name="1-a"></td>
<td></td>
<td></td>
</tr>
<tr>
<td>2</td>
<td><?php echo $_POST["homeman1"];?></td>
<td>v</td>
<td><?php echo $_POST["awayman1"];?></td>
<td><input type="text" name="2-h"></td>
<td><input type="text" name="2-a"></td>
<td></td>
<td></td>
</tr>
<tr class="rowhigh">
<td rowspan="2">3</td>
<td><?php echo $_POST["homeman2"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_POST["awayman2"];?></td>
<td><input type="text" name="3-h1"></td>
<td><input type="text" name="3-a1"></td>
<td></td>
<td></td>
</tr>
<tr class ="rowhigh">
<td><?php echo $_POST["homeman3"];?></td>
<td><?php echo $_POST["awayman3"];?></td>
<td><input type="text" name="3-h2"></td>
<td><input type="text" name="3-a2"></td>
<td></td>
<td></td>
</tr>
<tr>
<td rowspan="2">4</td>
<td><?php echo $_POST["homelady2"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_POST["awaylady2"];?></td>
<td><input type="text" name="4-h1"></td>
<td><input type="text" name="4-a1"></td>
<td></td>
<td></td>
</tr>
<tr>
<td><?php echo $_POST["homelady3"];?></td>
<td><?php echo $_POST["awaylady3"];?></td>
<td><input type="text" name="4-h2"></td>
<td><input type="text" name="4-a2"></td>
<td></td>
<td></td>
</tr>
<tr class="rowhigh">
<td rowspan="2">5</td>
<td><?php echo $_POST["homeman1"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_POST["awayman1"];?></td>
<td><input type="text" name="5-h1"></td>
<td><input type="text" name="5-a1"></td>
<td></td>
<td></td>
</tr>
<tr class ="rowhigh">
<td><?php echo $_POST["homeman2"];?></td>
<td><?php echo $_POST["awayman2"];?></td>
<td><input type="text" name="5-h2"></td>
<td><input type="text" name="5-a2"></td>
<td></td>
<td></td>
</tr>
<tr>
<td rowspan="2">6</td>
<td><?php echo $_POST["homelady1"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_POST["awaylady1"];?></td>
<td><input type="text" name="6-h1"></td>
<td><input type="text" name="6-a1"></td>
<td></td>
<td></td>
</tr>
<tr>
<td><?php echo $_POST["homelady2"];?></td>
<td><?php echo $_POST["awaylady2"];?></td>
<td><input type="text" name="6-h2"></td>
<td><input type="text" name="6-a2"></td>
<td></td>
<td></td>
</tr>
<tr class="rowhigh">
<td rowspan="2">7</td>
<td><?php echo $_POST["homeman3"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_POST["awayman3"];?></td>
<td><input type="text" name="7-h1"></td>
<td><input type="text" name="7-a1"></td>
<td></td>
<td></td>
</tr>
<tr class="rowhigh">
<td><?php echo $_POST["homelady3"];?></td>
<td><?php echo $_POST["awaylady3"];?></td>
<td><input type="text" name="7-h2"></td>
<td><input type="text" name="7-a2"></td>
<td></td>
<td></td>
</tr>
<tr>
<td rowspan="2">8</td>
<td><?php echo $_POST["homeman1"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_POST["awayman1"];?></td>
<td><input type="text" name="8-h1"></td>
<td><input type="text" name="8-a1"></td>
<td></td>
<td></td>
</tr>
<tr>
<td><?php echo $_POST["homelady1"];?></td>
<td><?php echo $_POST["awaylady1"];?></td>
<td><input type="text" name="8-h2"></td>
<td><input type="text" name="8-a2"></td>
<td></td>
<td></td>
</tr>
<tr class="rowhigh">
<td rowspan="2">9</td>
<td><?php echo $_POST["homeman2"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_POST["awayman2"];?></td>
<td><input type="text" name="9-h1" value ="<?php if (validatescore($_POST["9h-1"])){echo $_POST["9h-1"];}?>"></td>
<td><input type="text" name="9-a1" value="<?php if (validatescore($_POST["9a-1"])){echo $_POST["9h-1"];}?>"></td>
<td></td>
<td></td>
</tr>
<tr class ="rowhigh">
<td><?php echo $_POST["homelady3"];?></td>
<td><?php echo $_POST["awaylady3"];?></td>
<td><input type="text" name="9-h2"></td>
<td><input type="text" name="9-a2"></td>
<td></td>
<td></td>
</tr>
<tr>
<td rowspan="2">10</td>
<td><?php echo $_POST["homeman3"];?></td>
<td rowspan="2">v</td>
<td><?php echo $_POST["awayman3"];?></td>
<td><input type="text" name="10-h1"></td>
<td><input type="text" name="10-a1"></td>
<td></td>
<td></td>
</tr>
<tr>
<td><?php echo $_POST["homelady2"];?></td>
<td><?php echo $_POST["awaylady2"];?></td>
<td><input type="text" name="10-h2"></td>
<td><input type="text" name="10-a2"></td>
<td></td>
<td></td>
</tr>
</table>


</table>

<input name='Save' type='submit' value='Save' >
</form>
<br>

<a href="enterresult.php"> Back </a>
<html>

