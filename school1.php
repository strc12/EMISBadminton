<doctype! HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
//$nameErr = $teacherErr = "";
$name = $teacher = "";

if ($_POST) {
$errors=array();
  if (empty($_POST["school"])) {
    $errors['school1'] = "School Name is required";
  } else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["school"])) {
      $errors['school1'] = "Only letters and white space allowed"; 
		}
  
  

  if (empty($_POST["teacher"])) {
     $errors['teacher1'] = "teacher Name is required";
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["teacher"])) {
     $errors['teacher1'] = "Only letters and white space allowed"; 
	}
	

  if (count($errors)==0){
// CONNECT TO THE DATABASE
	include 'connect.php';

	$sql = "INSERT INTO schools VALUES ('$_POST[school]', '$_POST[teacher]',NULL)";

	if (mysqli_query($mysqli, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error:" . $sql . "<br>" . mysqli_error($mysqli);
}
	
// CLOSE CONNECTION
	mysqli_close($mysqli);
	echo"yay";

  header("Location: index.html");
  exit();
  }
 }
?>
	
<form action =<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method ="POST"> 
	School:<input type="text" name="school"><span class="error" value="<?php if(isset($_POST['school']))echo $_POST['school'];?>"> <?php if(isset($errors['school1']))echo $errors['school1'];?></span><br>
	Teacher:<input type="text" name="teacher"><span class="error"value="<?php if(isset($_POST['teacher']))echo $_POST['teacher'];?>"> <?php if(isset($errors['teacher1']))echo $errors['teacher1'];?></span><br><br>
	<input type="submit" value="Submit"><br>

</form>
<?php
echo $name;
ECHO "<br>";
echo $teacher;
?>
</body>
</html>
