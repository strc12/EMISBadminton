<DOCTYPE! HTML>
<html>
<head>
<style>
table, th, td{
	border:1px solid blue;}
th,td{
	padding:5px;
	text-align:center;}
</style>
</head>
<body>
Select School: 
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="POST">
	<select name="school">
	<option value="" selected disabled>Please select a team...</option>
	
	
<?php
		// CONNECT TO THE DATABASE
if (!isset($_POST['showplayers'])){
	include 'connect.php';//hides connection details


	$query = "SELECT name FROM schools";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {//fetches result of query stores in array
		
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
<input type='submit' name='showplayers' value='Show Players'><br>
<br>
	
	
	
<?php
		// CONNECT TO THE DATABASE
if (isset($_POST['showplayers'])) {
	echo "<select name='player'>";
	include 'connect.php';//hides connection details
	$temp = $_POST['school'];
	$query1 = "select * from schools where name = '$temp'";
	echo $query1;
	$result = $mysqli->query($query1) or die($mysqli->error.__LINE__);
	while($ans=$result->fetch_assoc()){
		$temp2=$ans['schoolid'];
	}
	echo "dgfg".$temp2;
	$query = "SELECT name FROM Players where schoolID = '$temp2'";
	$result2 = $mysqli->query($query) or die($mysqli->error.__LINE__);
	echo "<option value='' selected disabled>Please select a Player...</option>";

// GOING THROUGH THE DATA
	if($result->num_rows > 0) {
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
	echo"<input type='submit' name='delete' value='Delete selected Player' onclick='return confirm(\"Are you sure you want to delete this player?\")'><br>";

}
?>

<br>
<input name='deleteall' type='submit' value='Delete All Players' onclick='return confirm("Are you sure you want to delete all of the players?")'>
<br>
</form>
<?php
if (isset($_POST['deleteall'])) {
	mysqli_query($mysqli,'TRUNCATE TABLE Players;');
	mysqli_close($mysqli);
	header('Location:editschools.php');//reload page
	
}
if (isset($_POST['delete'])) {
	$temp = $_POST['player'];
//needs modifying to find correct player id rather than name
	include 'connect.php';
	mysqli_query($mysqli,"delete from Players where name = '$temp';");
	mysqli_close($mysqli);
	header('Location:editplayers.php');
}

	
// CLOSE CONNECTION
	mysqli_close($mysqli);

?>
<a href="admin.html"> Admin Menu</a>
</body>
</html>
