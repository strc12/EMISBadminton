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
                <li><a href="/index.php">Home</a></li>
          			<li><a href="/leaguetable.php">Tables</a></li>
          			<li><a href="/password.html">Admin</a></li>
                <li><a href="#">Contact</a></li>
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

                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                      </br>
                        <ins>Current Fixtures</ins>
                      <h3>Filter:</h3>

                      <form action ="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
                      Team: <select name = "filterteam">
                      <option value ="" selected disabled>Please select a team...</option>

                      <?php
                      // Showing and filtering data according to user-defined filters
                      include 'connect.php';


                      $sqlquery = "SELECT name, league, teamid FROM team";
                      $result = $mysqli->query($sqlquery);

                      if ($result -> num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {

                          echo "<option value='" . $row['teamid'] . "'>" . $row['name'] ." (".$row['league'].") </option>";
                        }
                      }


                      echo '</select> <br><br>';
                      echo '<input type = "radio" name = "playedornot" value = "All" checked>Show All Fixtures';
                      echo '<input type = "radio" name = "playedornot" value = "Played">Show Only Played Fixtures';
                      echo '<input type = "radio" name = "playedornot" value = "NotPlayed">Show Only Unplayed Fixtures <br>';
                      echo '<input type = "submit" name = "refreshtable" value = "Refresh"><br><br>';

                      $sqlquery = "SELECT * FROM fixtures order by FixtDate desc";
                      $result = $mysqli->query($sqlquery);



                      if ($result ->num_rows>0) {

                        echo '<table style = "width:50%">';
                        echo '<tr>';
                        echo '<th>Date</th>';
                        echo '<th>Home Team</th>';
			echo '<th>Home Score</th>';
                        echo '<th>Away Team</th>';
			echo '<th>Away Score</th>';
                        echo '</tr>';
                        $datenow = date('Y-m-d');

                        while($row = $result -> fetch_assoc()) {
                          $homeid = $row ['HomeTeamID'];
                          $awayid = $row ['AwayTeamID'];

                          $homeresult = $mysqli -> query("SELECT name, league FROM team where teamid = '$homeid'");
                          $awaynamequery = $mysqli -> query("SELECT name, league FROM team where teamid = '$awayid'");

                          while ($teamname1 = $homeresult->fetch_assoc()) {
                            $hometeamname1 = $teamname1 ['name'];
                            $hometeamleague = $teamname1 ['league'];
                            $hometeamscore = $row ['homegames'];


                            }
                          while ($teamname2 = $awaynamequery -> fetch_assoc()) {
                            $awayteamname2 = $teamname2 ['name'];
                            $awayteamleague = $teamname2 ['league'];
                            $awayteamscore = $row ['awaygames'];
                            }




                          if ($_POST['refreshtable']) {

                            if (($_POST['playedornot'] == "All") and (($homeid== $_POST['filterteam']) or ($awayid == $_POST['filterteam']))) {

                              if ($datenow<($row['FixtDate'])){
                                echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate']))."</td><td>".$hometeamname1. " (". $hometeamleague.")</td> <td>".$hometeamscore."</td><td>" .$awayteamname2." (".$awayteamleague.")</td><td>".$awayteamscore."</td></tr>";

                              } else {
                                echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "  (Played) </td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>".$hometeamscore."</td><td>" .$awayteamname2." (".$awayteamleague.")</td><td>".$awayteamscore."</td></tr>";
                              }

                            }

                            if (($_POST['playedornot'] == "Played") and (($homeid== $_POST['filterteam']) or ($awayid == $_POST['filterteam']))) {

                              if ($datenow>($row['FixtDate'])){
                                echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "  (Played) </td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>".$hometeamscore."</td><td>" .$awayteamname2." (".$awayteamleague.")</td><td>".$awayteamscore."</td></tr>";

                              }

                            }
                            if (($_POST['playedornot'] == "NotPlayed") and (($homeid == $_POST['filterteam']) or ($awayid == $_POST['filterteam']))) {
                              if ($datenow<($row['FixtDate'])) {
                                echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "</td><td>".$hometeamname1." (". $hometeamleague.")</td><td>".$hometeamscore."</td><td>".$awayteamname2." (".$awayteamleague.")</td><td>".$awayteamscore."</td></tr>";
                              }
                            }

                          } else {
                            if ($datenow<($row['FixtDate'])){
                                echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate']))."</td><td>".$hometeamname1. " (". $hometeamleague.")</td> <td>".$hometeamscore."</td><td>" .$awayteamname2." (".$awayteamleague.")</td><td>".$awayteamscore."</td></tr>";

                              } else {
                                echo "<tr><td>".date("d-m-Y", strtotime($row['FixtDate'])). "  (Played) </td><td>".$hometeamname1. " (". $hometeamleague.")</td><td>".$hometeamscore."</td><td>" .$awayteamname2." (".$awayteamleague.")</td><td>".$awayteamscore."</td></tr>";
                              }
                            }


                        }
                      } else {

                        echo '<font style="color:DarkGoldenRod;">NO FIXTURES!</font>';
                        }



                      mysqli_close($mysqli);

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
