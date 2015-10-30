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
                      <h3>Enter Results</h3>
                      <form action ="inputresults.php" method ="POST">
                      Select Fixture:   <select name = "selectfixture"> <br><br>
                      <option value= "" selected disabled>Please select a fixture...</option>

                      <?php

                      include 'connect.php';

                      $sqlquery = "SELECT * from fixtures order by FixtDate desc";
                      $result = $mysqli -> query($sqlquery);

                      if ($result -> num_rows>0) {
                        while ($rows = $result -> fetch_assoc()) {
                          $FixtID = $rows['FixtureID'];
                          $foundfixtdate = $rows['FixtDate'];
                          $foundhomeID = $rows['HomeTeamID'];
                          $foundawayID = $rows['AwayTeamID'];
                          $played = $rows['Played'];
                          //Look for home name from ID
                          $queryname = "SELECT name, league from team where teamid = '$foundhomeID'";
                          $nameresult = $mysqli -> query($queryname);
                          if ($nameresult -> num_rows>0) {
                            while ($namerows = $nameresult -> fetch_assoc()) {
                              $foundhomename = $namerows['name'].' '.$namerows['league'];
                            }
                          }
                          //Look for away name from ID
                          $queryname = "SELECT name, league from team where teamid ='$foundawayID'";
                          $nameresult = $mysqli -> query($queryname);
                          if ($nameresult -> num_rows >0) {
                            while ($namerows = $nameresult -> fetch_assoc()) {
                              $foundawayname = $namerows['name'].' '.$namerows['league'];
                            }
                          }
                          if ($played == 0) {
                            echo '<option value = "' . $FixtID . '">' . $foundhomename . ' v ' . $foundawayname . ' ' . date("d-m-Y" , strtotime($foundfixtdate)).'</option>';
                          }
                        }

                      }

                      echo '</select>';

                      mysqli_close();



                      ?>

                      <br><br>
                      <input type = "submit" value = "Input Results" name = "inputresults">

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
