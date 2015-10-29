<doctype! HTML>
<html>
<head>
<script>
function myFunction()
{
alert("Team Added!"); // this is the message in ""
}
</script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php

$name = $teacher = "";

if ($_POST) {
$errors=array();
  if (empty($_POST["team"])) {
    $errors['team1'] = "School Name is required";
  } else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["team"])) {
      $errors['team1'] = "Only letters and white space allowed"; 
		}
  
  

  if (empty($_POST["teacher"])) {
     $errors['teacher1'] = "teacher Name is required";
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["teacher"])) {
     $errors['teacher1'] = "Only letters and white space allowed"; 
	}
	

  if (count($errors)==0){
// CONNECT TO THE DATABASE
	include 'connect.php';

	$sql = "INSERT INTO schools VALUES ('$_POST[team]', '$_POST[teacher]',NULL,0,0,0,0,0)";

	if (mysqli_query($mysqli, $sql)) {
		echo "<script> myFunction();</script>";
	} else {
		echo "Error:" . $sql . "<br>" . mysqli_error($mysqli);
}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
	header("Location: school.php");
	exit();
  }
 }
?>
<p> Enter teams in the format School A/B<p>	
<form action =<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method ="POST"> 
	School:<input type="text" name="team"><span class="error" value="<?php if(isset($_POST['team']))echo $_POST['team'];?>"> <?php if(isset($errors['team1']))echo $errors['team1'];?></span><br>
	Teacher:<input type="text" name="teacher"><span class="error"value="<?php if(isset($_POST['teacher']))echo $_POST['teacher'];?>"> <?php if(isset($errors['teacher1']))echo $errors['teacher1'];?></span><br><br>
	<input type="submit" value="Submit"><br>

</form>
<?php
?>
<a href="admin.html"> Admin Menu</a>
</body>
</html>
