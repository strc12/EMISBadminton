<html>
<style>
	h1, h2{
		color:MediumBlue;
		text-align:center;
		}
	body{
		background-color:beige;
		}
		
	ul#menu{
		padding:0;
		
		}
	ul#menu li{
		float: left;
		width:100px;
		text-align:center;
		}
	ul#menu li a{
		display:block;
		padding:5px 10px;
		color:#333;
		background:#f2f2f2;
		text-decoration:none;
		border-style:ridge;
		}
	ul#menu li a:link{
		border-color: #000;
		}
	ul#menu li a:hover{
        color: #fff;
        background: #939393;
		border-color: #fff;
		}

</style>
<head>
	<title>Players - East Midlands Independent Schools Badminton League</title>
</head>
<body>
	<h1>East Midlands Independent Schools Badminton League</h1>
	<h2>Players</h2>
	<div>
	<ul id="menu">
			<li><a href="/logout.html">Log Out</a></li>
			<li><a href="/teams.php">Teams</a>

			<li><a href="/Fixtures.php">Fixtures</a></li>
			<li><a href="/players.php">Players</a></li>
			<li><a href="/results.php">Results</a></li>
			<li><a href="/schools.php">Schools</a></li>
			<li><a href="/reset.php">Reset</a></li>
    </ul>
	</div><br><br><br>
	
	<h3>Enter New Players</h3>
	
<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
	Player First Name: <input type = "text" name = "firstname"><br><br>
	Player Last Name: <input type = "text" name = "lastname"> <br><br>
	School Name: <select name = "schooldropdown"><br><br>
	<option value = "" selected disabled> Please select a school...</option>
	
<?php
	include 'connect.php';
	

	$sqlquery = "SELECT schoolname FROM schools";
	$result = $mysqli->query($sqlquery);
	
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			echo '<option value="' . $row['schoolname'] . '">' . $row['schoolname'] . '</option>';
		}
	}
	
	echo '</select>';
	echo '<br><br>';
	echo 'Gender: <select name = "genderdropdown">';
	echo '<option value = "Male">Male</option>';
	echo '<option value = "Female">Female</option>';
	echo '</select><br><br>';
	echo '<input type = "submit" value = "Add New Player" name = "addplayer">';
	
	
	if ($_POST['addplayer']) {
		$schooltofind = $_POST['schooldropdown'];
		$sqlquery = "SELECT SchoolID from schools where schoolname = '$schooltofind'";
		$result = $mysqli -> query($sqlquery);
		
		if ($result -> num_rows > 0) {
			while ($rows = $result -> fetch_assoc()) {
				$foundschoolID = $rows['SchoolID'];
			}
		}
		
		$sqlquery = "INSERT into players values (NULL, '$foundschoolID', '$_POST[firstname]', '$_POST[lastname]', '$_POST[genderdropdown]', 0, 0, 0, 0)"; 
		if (mysqli_query($mysqli, $sqlquery)) {
			echo '<script type="text/javascript">';
			echo ' alert("Player Added!")';
			echo '</script>';
		} else {
			echo "Error:" . $sqlquery . "<br>" . mysqli_error($mysqli);
		}
		
		mysqli_close($mysqli);
	}
	


?>
	
</form>
</body>

</html>