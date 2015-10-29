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
Select School:-
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="POST">
	<select name="dropdown"> 
	
	
<?php //create dropdown list
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
		echo 'NO RESULTS';	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
	

?>

</select>
<br>
<br>
Name: <input type="text" name="name"><br><br>
Gender :<select name="gender">
  <option value="M">M</option>
  <option value="F">F</option>
</select><br><br>
<input type="submit"  name = "add" value="add player"><br>
<input type="submit"  name = "delete" value="Delete ALL players" onclick='return confirm("Are you sure you want to delete all fixtures?")'><br>
<?php

$name = $gender = "";
// CONNECT TO THE DATABASE
include 'connect.php';
if (isset($_POST['delete'])) {
	mysqli_query($mysqli,'TRUNCATE TABLE Players;');
	
}
if ($_POST) {
$errors=array();
  if (empty($_POST["name"])) {
    $errors['name1'] = "Name is required";
  } else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
      $errors['name1'] = "Only letters and white space allowed"; 
		}
  if (empty($_POST["gender"])) {
     $errors['gender'] = "Gender  is required";
  } 
	$school = $_POST['dropdown'];
	$sID = "select schoolid from schools where name='$school'";
	$ans = $mysqli->query($sID) or die($mysqli->error.__LINE__);
	if($ans->num_rows > 0) {
		while($rows = $ans->fetch_assoc()) {
		
			//code for drop down list
			$schooltofind= $rows['schoolid'];
		}
	}
	else {
		echo 'NO Players';	
	} 
if (count($errors)==0){ //writes player to DB if validated
	$sql = "INSERT INTO Players VALUES ('$_POST[name]', '$_POST[gender]','$schooltofind',NULL)";

	if (mysqli_query($mysqli, $sql)) {
		echo "<br>New Player created successfully";
	} else {
		echo "Error:" . $sql . "<br>" . mysqli_error($mysqli);
}
	
}
 
	$sID = mysqli_real_escape_string($sID);

	$query = "SELECT Players.name, Players.sex, schools.name as schools from Players, schools where Players.schoolID = schools.schoolid and schools.schoolID = '$schooltofind'";
	
	
	$dave = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA to display all players now registered
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
