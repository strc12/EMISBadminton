<html>
<style>

	h1,h2{
		color:MediumBlue;
		text-align:center;
		}
	div{
		text-align:center;
		}
	body {
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
		border-color: #fff;
        background: #939393;
		}
	

</style>
<head>
	<title>Teams - East Midlands Independent Schools Badminton League</title>
	<?php
	function refreshcurrentteam() {
	echo '<br>';
	echo '<h3>Current teams are: </h3>';
	include 'connect.php';
	$query = "SELECT name, league FROM team";
	$result = $mysqli->query($query);
	
	if ($result-> num_rows >0) {
	while($row = $result-> fetch_assoc()) {
		echo "<ul style = 'list-style-type:square'>";
		echo "<li>";
		echo $row ["name"] . ' ('. $row["league"].')';
		echo "</li>";
		echo "</ul>";

	}
	} else {
	echo 'NO TEAMS HAVE BEEN ADDED!';
	}
	mysqli_close($mysqli);
	exit();
	}
	?>
</head>

<body>
<h1>East Midlands Independent Schools Badminton League</h1>
<h2>Teams</h2>
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
<h3>Enter Team Name</h3>
<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
	Team Name:   <input type = "text" name = "teamname"><br><br>
	League:		<select name="leaguedropdown">
	<option value="A">A</option>
	<option value="B">B</option></select><br><br>
	School Name:   <select name="schooldropdown"> <br><br><br>
	<option value="" selected disabled>Please select a school...</option>
	

	

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
echo '<input type = "submit" value = "Submit" name = "submitteam">';

if ($_POST['submitteam']) {

	$schooltofind = ($_POST['schooldropdown']);
	$queryID = "SELECT SchoolID from schools where schoolname = '$schooltofind'";
	$result = $mysqli -> query($queryID);
	
	if ($result -> num_rows > 0) {
		while ($rows = $result -> fetch_assoc()) {
			$foundschoolID = $rows['SchoolID'];
			
		}
	}
	
	$sqlquery = "INSERT INTO team VALUES (NULL, '$_POST[teamname]',0,0,0,0,0,'$foundschoolID', '$_POST[leaguedropdown]')";
	
	if (mysqli_query($mysqli, $sqlquery)) {
			echo '<script type="text/javascript">';
			echo ' alert("Team Added!")';
			echo '</script>';
		} else {
			echo "Error:" . $sqlquery . "<br>" . mysqli_error($mysqli);
	}

	
	mysqli_close($mysqli);
	refreshcurrentteam();
	exit();
	
}
	
	
?>
<?php

refreshcurrentteam();

?>




</form>

</body>
</html>