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
<p>Select School<p>
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="POST">
	<select name="dropdown">
	
	
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
	mysqli_close($mysqli);
	

?>
</select>
<input type="submit" value="Submit"><br>
<?php
if($_POST){
	include 'connect.php';//hides connection details
	$school = $_POST['dropdown'];
	$sID = "select schoolid from schools where name='$school'";
	//echo $sID;
	$ans = $mysqli->query($sID) or die($mysqli->error.__LINE__);
	if($ans->num_rows > 0) {
		while($rows = $ans->fetch_assoc()) {
		
			//code for drop down list
			$schooltofind= $rows['schoolid'];
			
		}
	}
	else {
		echo 'NO RESULTS';	
	}
	$sID = mysqli_real_escape_string($sID);

	$query = "SELECT Players.name, Players.sex, schools.name as schools from Players, schools where Players.schoolID = schools.schoolid and schools.schoolID = '$schooltofind'";
	
	
	$dave = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA
	if($dave->num_rows > 0) {
		echo "<h2>Players are:</h2>";
		echo "<table style = 'width:30%'>";
		echo "<tr>";
		echo "<th>Name</th>";
		echo "<th>Gender</th>";		
		echo "</tr>";
		while($row = $dave->fetch_assoc()) {
		
			//list of players and genders
			echo "<tr>";
			
			echo "<td>".$row['name']. "</td> <td>" .$row['sex'].'</td></tr>';
			
		}
		echo "</table>";
	}
	else {
		echo 'NO Players';	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
}
?>

</form>
<a href="admin.html"> Admin Menu</a>
</body>
</html>
