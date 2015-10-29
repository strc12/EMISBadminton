<!doctype html>
<html>
<head>
<style>
table, th, td{
	border:1px solid blue;}
th,td{
	padding:5px;
	text-align:center;}
</style>
	<title> Score sheet</title>
	<?php
	function popdropdown($sch,$sex,$position){
	echo "<select name='$position'>";
	include 'connect.php';//hides connection details
	$query = "SELECT name FROM Players where schoolID = '$sch'and sex='$sex'";
	$result2 = $mysqli->query($query) or die($mysqli->error.__LINE__);
	echo "<option value='' selected disabled>Please select a Player...</option>";

// GOING THROUGH THE DATA
	if($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
		
			//code for drop down list
			echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
			
		}
	}
	else {
		echo 'NO Players';	
	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
	
	echo "</select>";	
}
	
	
	?>
</head>
<body>
</body>
<form action ="scoresheet.php" method ="POST">
<?php
session_start();

// CONNECT TO THE DATABASE
	include 'connect.php';
	$fixture1= $_POST['fixture'] ;
	$_SESSION['fixtureid']=$fixture1;
	$query = "SELECT * from fixtures where fixtureid='$fixture1'";
	$dave = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
// GOING THROUGH THE DATA to display all players now registered
	if($dave->num_rows > 0) {

		while($row = $dave->fetch_assoc()) {
		$school1 = $row['homeschoolid'];
		$school2 = $row['awayschoolid'];
		$sch1 = $mysqli->query("select name from schools where schoolID='$school1'") or die($mysqli->error.__LINE__);
		$sch2 = $mysqli->query("select name from schools where schoolID='$school2'") or die($mysqli->error.__LINE__);

			while($schoolname = $sch1->fetch_assoc()){
			$homename=$schoolname['name'];
			$_SESSION['hometeam']=$homename;
			}
			while($schoolname = $sch2->fetch_assoc()){
			$awayname=$schoolname['name'];
			$_SESSION['awayteam']=$awayname;
			}
			//fixture selected
			echo  $homename.' v '. $awayname . ' - ' .date("d-m-Y", strtotime($row['matchdate']));
			$_SESSION['matchdate'] = $row['matchdate'];
		}
		
	}
	else {
		echo 'NO RESULTS';	
	}
// CLOSE CONNECTION
	mysqli_close($mysqli);

?>
<br>
<table style = 'width:80%'>
<tr>
<th colspan="2">Home Players</th>
<th colspan="2">Away Players</th>
</tr>
<tr>
<td colspan "2">Man1</td>
<td colspan "2"><?php popdropdown($school1,'M','homeman1');?></td>
<td colspan "2">Man1</td>
<td colspan "2"><?php popdropdown($school2,'M','awayman1');?></td>
</tr>
<tr>
<td colspan "2">Man2</td>
<td colspan "2"><?php popdropdown($school1,'M','homeman2');?></td>
<td colspan "2">Man2</td>
<td colspan "2"><?php popdropdown($school2,'M','awayman2');?></td>
</tr>
<tr>
<td colspan "2">Man3</td>
<td colspan "2"><?php popdropdown($school1,'M','homeman3');?></td>
<td colspan "2">Man3</td>
<td colspan "2"><?php popdropdown($school2,'M','awayman3');?></td>
</tr>

<tr>
<td colspan "2">Lady1</td>
<td colspan "2"><?php popdropdown($school1,'F','homelady1');?></td>
<td colspan "2">Lady1</td>
<td colspan "2"><?php popdropdown($school2,'F','awaylady1');?></td>
</tr>
<tr>
<td colspan "2">Lady2</td>
<td colspan "2"><?php popdropdown($school1,'F','homelady2');?></td>
<td colspan "2">Lady2</td>
<td colspan "2"><?php popdropdown($school2,'F','awaylady2');?></td>
</tr>
<tr>
<td colspan "2">Lady3</td>
<td colspan "2"><?php popdropdown($school1,'F','homelady3');?></td>
<td colspan "2">Lady3</td>
<td colspan "2"><?php popdropdown($school2,'F','awaylady3');?></td>
</tr> 
</table>
<input name='Save' type='submit' value='Save' >
</form>
<br>

<a href="enterresult.php"> Back </a>
<html>

