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
	<title>Schools - East Midlands Independent Schools Badminton League</title>
		<?php
	function refreshschools() {
	echo '<br>';
	echo '<h3>Current Schools are: </h3>';
	include 'connect.php';
	$query = "SELECT schoolname FROM schools";
	$result = $mysqli->query($query);
	
	if ($result-> num_rows >0) {
	while($row = $result-> fetch_assoc()) {
		echo "<ul style = 'list-style-type:square'>";
		echo "<li>";
		echo $row ["schoolname"];
		echo "</li>";
		echo "</ul>";

	}
	} else {
	echo 'NO SCHOOLS HAVE BEEN ADDED!';
	}
	mysqli_close($mysqli);
	exit();
	}
	?>
</head>
<body>
	<h1>East Midlands Independent Schools Badminton League</h1>
	<h2>Schools</h2>
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
	</div>
	
	<br><br>
	<h3>New School</h3>
	
	<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
	Name: <input type="text" name="schoolname"> <br><br>
	<input type="submit" name="submitnewschool" value="Add New School">
	</form>
<?php



if ($_POST['submitnewschool']) {


	include 'connect.php' ;
	$sqlquery = "INSERT INTO schools VALUES (NULL, '$_POST[schoolname]')";
	
	if (mysqli_query($mysqli, $sqlquery)) {
			echo '<script type="text/javascript">';
			echo ' alert("School Added!")';
			echo '</script>';
		} else {
			echo "Error:" . $sqlquery . "<br>" . mysqli_error($mysqli);
	}

	
	mysqli_close($mysqli);
	refreshschools();
	exit();
	
	}
	
	
?>
<?php

refreshschools();

?>
</body>

</html>