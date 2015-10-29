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

	include 'connect.php';//hides connection details


	$query = "SELECT name FROM schools";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		
			//code for drop down list
			echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
			
		}
	}
	else {
		echo 'NO Players';	
	}
	
// CLOSE CONNECTION
	//mysqli_close($mysqli);
	

?>
</select>
<input type='submit' name='delete' value='Delete selected Team' onclick='return confirm("Are you sure you want to delete selected school?")'><br>
<input name='deleteall' type='submit' value='Delete All Teams' onclick='return confirm("Are you sure you want to delete all schools?")'>
<?php
if (isset($_POST['deleteall'])) {
	mysqli_query($mysqli,'TRUNCATE TABLE schools;');
	mysqli_close($mysqli);
	header('Location:editschools.php');//reload page
	
}
if (isset($_POST['delete'])) {
	$temp = $_POST['school'];
	echo $temp;
	mysqli_query($mysqli,"delete from schools where name = '$temp';");
	mysqli_close($mysqli);
	header('Location:editschools.php');
}

	
// CLOSE CONNECTION
	mysqli_close($mysqli);

?>

</form>
<a href="admin.html"> Admin Menu</a>
</body>
</html>
