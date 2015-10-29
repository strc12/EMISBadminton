<doctype! HTML>
<html>
<head>
<style>
table, th, td{
	border:1px solid blue;}
th,td{
	padding:5px;
	text-align:center;}
</style>
	<title>East Midlands Independent Schools Badminton League</title>
</head>
<body>
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="POST">
	Home Team <select name ="home" >
	<option value="" selected disabled>Please select a team...</option>
<?php //create dropdown list
		// CONNECT TO THE DATABASE

include 'connect.php';//hides connection details
$errors1=array();

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
		$errors['home']="No home team selected selected";
		//echo 'NO RESULTS';	
	}



	echo "</select>";
	echo"Away Team <select name = 'away'>";
	echo"<option value='' selected disabled>Please select a team...</option>";
	 //create dropdown list
		// CONNECT TO THE DATABASE

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
		$errors['away']="No away team selected selected";
		//echo 'NO RESULTS';	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
	


	echo "</select>";
    echo "Date <input type='date' id='datepicker' name='fixturedate' size='9' value='' /> ";
	echo"<input type='submit' value='Add fixture' name ='add'><br>";
	echo"<input name='delete' type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete all fixtures?\")'>";
echo"</form>";


$name = $gender = "";
// CONNECT TO THE DATABASE
include 'connect.php';
if (isset($_POST['add'])) {

  
	$school = $_POST['home'];
	$sID = "select schoolid from schools where name='$school'";
	$ans = $mysqli->query($sID) or die($mysqli->error.__LINE__);
	if($ans->num_rows > 0) {
		while($rows = $ans->fetch_assoc()) {
		
			//code for drop down list
			$hometofind= $rows['schoolid'];
		}
	}
	else {
		$errors['home']="No home team selected selected";
		echo $errors['home']."<br>";	
	} 
		$school = $_POST['away'];
	$sID = "select schoolid from schools where name='$school'";
	$ans = $mysqli->query($sID) or die($mysqli->error.__LINE__);
	if($ans->num_rows > 0) {
		while($rows = $ans->fetch_assoc()) {
		
			//code for drop down list
			$awaytofind= $rows['schoolid'];
		}
	}
	else {
		$errors['away']="No away team selected selected";
		echo $errors['away']."<br>";	
	} 

	if ($_POST['fixturedate'] == null){
	$errors['date']="no date selected";
	echo $errors['date']."<br>";	
	}
if (count($errors)==0){ //writes player to DB if validated
	$sql = "INSERT INTO fixtures VALUES ('$hometofind', '$awaytofind','$_POST[fixturedate]',NULL,NULL,NULL,0)";

	if (mysqli_query($mysqli, $sql)) {
		echo "<br>New fixture created successfully";
	} else {
		echo "Error:" . $sql . "<br>" . mysqli_error($mysqli);
}

}
} 
if (isset($_POST['delete'])) {
	mysqli_query($mysqli,'TRUNCATE TABLE fixtures;');
	
}
	$query = "SELECT * from fixtures order by matchdate";
	
	
	$dave = $mysqli->query($query) or die($mysqli->error.__LINE__);

// GOING THROUGH THE DATA to display all players now registered
	if($dave->num_rows > 0) {
		echo "<h2>Fixtures  Currently are:</h2>";
		echo "<table style = 'width:30%'>";
		echo "<tr>";
		echo "<th>Home</th>";
		echo "<th>Away</th>";		
		echo "<th>Date</th>";		
		echo "</tr>";
		while($row = $dave->fetch_assoc()) {
		$school1 = $row['homeschoolid'];
		$school2 = $row['awayschoolid'];
		$sch1 = $mysqli->query("select name from schools where schoolID='$school1'") or die($mysqli->error.__LINE__);
		$sch2 = $mysqli->query("select name from schools where schoolID='$school2'") or die($mysqli->error.__LINE__);

			while($schoolname = $sch1->fetch_assoc()){
			$homename=$schoolname['name'];
			}
			while($schoolname = $sch2->fetch_assoc()){
			$awayname=$schoolname['name'];
			}
			//list of players and genders
			echo "<tr>";
			
			echo "<td>".$homename. "</td> <td>" .$awayname."</td><td>" .date("d-m-Y", strtotime($row['matchdate']))."</td></tr>";
			
		}
		echo "</table>";
	}
	else {
		echo 'NO FIXTURES <br>';	
	}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);

?>

<a href="admin.html"> Admin Menu</a>
	
</body>
</html>
