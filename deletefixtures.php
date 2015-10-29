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
	Fixture <select name ="fixture" >
	<option value="" selected disabled>Please select a fixture...</option>
<?php //create dropdown list of fixtures
		// CONNECT TO THE DATABASE

include 'connect.php';//hides connection details

	$query = "SELECT * from fixtures order by matchdate";
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
			}
			while($schoolname = $sch2->fetch_assoc()){
			$awayname=$schoolname['name'];
			}
			//list of players and genders
			echo '<option value="' . $row['fixtureid'] . '">' .$homename." v ". $awayname . " - " .date("d-m-Y", strtotime($row['matchdate'])).'</option>';
			
		}
		
	}
	else {
		echo 'NO RESULTS';	
	}
	



if (isset($_POST['delete'])) {
	$temp = $_POST['fixture'];
	
	mysqli_query($mysqli,"delete from fixtures where fixtureid = '$temp';");
	mysqli_close($mysqli);
	header('Location:deletefixtures.php');
}
	
	
// CLOSE CONNECTION
	mysqli_close($mysqli);


?>
</select>
<input name='delete' type='submit' value='Delete' onclick='return confirm("Are you sure you want to delete selected fixture?")'>
<br>
<a href="admin.html"> Admin Menu</a>
	
</body>
</html>