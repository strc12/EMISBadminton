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
                    <h3>For the Teams League Table: <a href="/leaguetable.php">CLICK HERE</a><br><br>

                    <ins>Players performance in the League</ins></h3>

                  <?php
                    include 'connect.php';
                    echo '<table class="table-striped table-bordered table-condensed" >';
                    echo '<tr>';
                    echo '<th>Position</th>';
                    echo '<th>Player Name</th>';
                    echo '<th>Win Percentage</th>';
                    echo '<th>Games won</th>';
                    echo '<th>Games Lost</th>';
                    echo '<th>Points for</th>';
                    echo '<th>Points against</th>';
                    echo '</tr>';
                    $count = 0;

                    $sqlquery = "SELECT * from players where ((gameswon+gamesloss)>0) order by (gameswon/(gameswon+gamesloss)) desc";
                    $results = $mysqli -> query($sqlquery);

                    if ($results -> num_rows >0) {
                      while ($rows = $results -> fetch_assoc()) {
                        $queryschoolID = $rows['SchoolID'];
                        $schoolquery = "SELECT schoolname from schools where SchoolID = '$queryschoolID'";
                        $schoolresult = $mysqli -> query($schoolquery);
                        while ($schoolrows = $schoolresult -> fetch_assoc()) {
                          $foundschoolname = $schoolrows ['schoolname'];
                        }

                        $count = $count + 1;
                        echo '<tr>';
                        echo '<td>' . $count . '</td>';
                        echo "<td>" . $rows['FirstName'] . " " . $rows['LastName'] . " (" . $foundschoolname . ")</td>";
			$percent=round((($rows['gameswon'] /($rows['gameswon'] +$rows['gamesloss'] ))*100),2);
                        echo "<td>" . $percent . "%</td>";
                        echo "<td>" . $rows['gameswon'] . "</td>";
                        echo "<td>" . $rows['gamesloss'] . "</td>";
                        echo "<td>" . $rows['pointswon'] . "</td>";
                        echo "<td>" . $rows['pointsloss'] . "</td>";
                        echo '</tr>';
                      }
                    }
                  ?>

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
