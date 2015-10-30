<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>East Midlands Independent Schools Badminton League</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
<link rel="shortcut icon" href="\images\favicon.ico" />
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    Select from options
                </li>
                <li><a href="/logout.html">Log Out</a></li>
                <li><a href="/teams.php">Teams</a>
                <li><a href="/Fixtures.php">Fixtures</a></li>
                <li><a href="/players.php">Players</a></li>
                <li><a href="/results.php">Results</a></li>
                <li><a href="/schools.php">Schools</a></li>
                <li><a href="/reset.php">Reset</a></li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>East Midlands Independent Schools Badminton League</h1>
                        <h2>Season 2015/16</h2>
                        <h2>Admin Section</h2>

                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                      </br>


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



                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
