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
                        <br>
                  <br>
                      <h3>For the Players League table: <a href="/playerleaguetable.php">CLICK HERE</a></h3>

                      <ins>Teams League A Table</ins><br>

                    <?php
                      include 'connect.php';
                      echo '<table style="width:50%">';
                      echo '<tr>';
                      echo '<th>Position</th>';
                      echo '<th>Team Name</th>';
                      echo '<th>Games played</th>';
                      echo '<th>Games Won</th>';
		      echo '<th>Games Lost</th>';
		      echo '<th>Points for</th>';
		      echo '<th>Poinst against</th>';
                      echo '</tr>';

                      $Acount = 0;

                      $Asqlquery = "SELECT * from team where league = 'A' order by gameswon desc";
                      $Aresults = $mysqli -> query($Asqlquery);
                      if ($Aresults -> num_rows > 0) {
                        while ($Arows = $Aresults -> fetch_assoc()) {
                          $Acount = $Acount + 1;
                          echo '<tr>';
                          echo '<td>' . $Acount . '</td>';
                          echo '<td>' . $Arows['name'] . '</td>';
			  echo '<td>' . $Arows['matchesplayed'] . '</td>';
                          echo '<td>' . $Arows['gameswon'] . '</td>';
                          echo '<td>' . $Arows['gamesloss'] . '</td>';
			  echo '<td>' . $Arows['pointswon'] . '</td>';
			  echo '<td>' . $Arows['pointsloss'] . '</td>';
                          echo '</tr>';

                        }
                      }
                      echo '</table>';
                      echo '<ins>Teams League B Table</ins><br>';
                      echo '<table style="width:50%">';
                      echo '<tr>';
                      echo '<th>Position</th>';
                      echo '<th>Team Name</th>';
                      echo '<th>Games played</th>';
                      echo '<th>Games Won</th>';
		      echo '<th>Games Lost</th>';
		      echo '<th>Points for</th>';
		      echo '<th>Poinst against</th>';
                      echo '</tr>';

                      $Bcount = 0;

                      $Bsqlquery = "SELECT * from team where league ='B' order by gameswon desc";
                      $Bresults = $mysqli ->query($Bsqlquery);
                      if ($Bresults -> num_rows > 0) {
                        while ($Brows = $Bresults -> fetch_assoc()) {
                          $Bcount = $Bcount + 1;
                          echo '<tr>';
                          echo '<td>' . $Bcount . '</td>';
                          echo '<td>' . $Brows['name'] . '</td>';
			  echo '<td>' . $Brows['matchesplayed'] . '</td>';
                          echo '<td>' . $Brows['gameswon'] . '</td>';
                          echo '<td>' . $Brows['gamesloss'] . '</td>';
			  echo '<td>' . $Brows['pointswon'] . '</td>';
			  echo '<td>' . $Brows['pointsloss'] . '</td>';
                          echo '<tr>';
                        }
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
