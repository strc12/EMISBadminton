<?php
		
		session_start();
		include 'connect.php';
		$homequery = "UPDATE team set matchesplayed = matchesplayed + 1, gameswon = gameswon + '$_SESSION[homegamestotal]', gamesloss = gamesloss + '$_SESSION[awaygamestotal]', pointswon = pointswon + '$_SESSION[homepointstotal]', pointsloss = pointsloss + '$_SESSION[awaypointstotal]' where teamid = '$_SESSION[hometeamid]'";
		$awayquery = "UPDATE team set matchesplayed = matchesplayed + 1, gameswon = gameswon + '$_SESSION[awaygamestotal]', gamesloss = gamesloss + '$_SESSION[homegamestotal]', pointswon = pointswon + '$_SESSION[awaypointstotal]', pointsloss = pointsloss + '$_SESSION[homepointstotal]' where teamid = '$_SESSION[awayteamid]'";
		$fixturequery = "UPDATE fixtures set Played = 1 where FixtureID = '$_SESSION[fixtid]'";
				
		mysqli_query($mysqli, $homequery);
		mysqli_query($mysqli, $awayquery);
		mysqli_query($mysqli, $fixturequery);
				
		$hman1query = "UPDATE players set gameswon = gameswon + '$_SESSION[hman1games]', gamesloss = gamesloss + '$_SESSION[aman1games]', pointswon = pointswon + '$_SESSION[hman1points]', pointsloss = pointsloss + '$_SESSION[aman1points]' where PlayerID = '$_SESSION[homeman1id]'";
		$hman2query = "UPDATE players set gameswon = gameswon + '$_SESSION[hman2games]', gamesloss = gamesloss + '$_SESSION[aman2games]', pointswon = pointswon + '$_SESSION[hman2points]', pointsloss = pointsloss + '$_SESSION[aman2points]' where PlayerID = '$_SESSION[homeman2id]'";
		$hman3query = "UPDATE players set gameswon = gameswon + '$_SESSION[hman3games]', gamesloss = gamesloss + '$_SESSION[aman3games]', pointswon = pointswon + '$_SESSION[hman3points]', pointsloss = pointsloss + '$_SESSION[aman3points]' where PlayerID = '$_SESSION[homeman3id]'";			
		$hlady1query = "UPDATE players set gameswon = gameswon + '$_SESSION[hlady1games]', gamesloss = gamesloss + '$_SESSION[alady1games]', pointswon = pointswon + '$_SESSION[hlady1points]', pointsloss = pointsloss + '$_SESSION[alady1points]' where PlayerID = '$_SESSION[homelady1id]'";
		$hlady2query = "UPDATE players set gameswon = gameswon + '$_SESSION[hlady2games]', gamesloss = gamesloss + '$_SESSION[alady2games]', pointswon = pointswon + '$_SESSION[hlady2points]', pointsloss = pointsloss + '$_SESSION[alady2points]' where PlayerID = '$_SESSION[homelady2id]'";
		$hlady3query = "UPDATE players set gameswon = gameswon + '$_SESSION[hlady3games]', gamesloss = gamesloss + '$_SESSION[alady3games]', pointswon = pointswon + '$_SESSION[hlady3points]', pointsloss = pointsloss + '$_SESSION[alady3points]' where PlayerID = '$_SESSION[homelady3id]'";
				
		mysqli_query($mysqli, $hman1query);
		mysqli_query($mysqli, $hman2query);
		mysqli_query($mysqli, $hman3query);
		mysqli_query($mysqli, $hlady1query);
		mysqli_query($mysqli, $hlady2query);
		mysqli_query($mysqli, $hlady3query);
				
		$aman1query = "UPDATE players set gameswon = gameswon + '$_SESSION[aman1games]', gamesloss = gamesloss + '$_SESSION[hman1games]', pointswon = pointswon + '$_SESSION[aman1points]', pointsloss = pointsloss + '$_SESSION[hman1points]' where PlayerID = '$_SESSION[awayman1id]'";
		$aman2query = "UPDATE players set gameswon = gameswon + '$_SESSION[aman2games]', gamesloss = gamesloss + '$_SESSION[hman2games]', pointswon = pointswon + '$_SESSION[aman2points]', pointsloss = pointsloss + '$_SESSION[hman2points]' where PlayerID = '$_SESSION[awayman2id]'";
		$aman3query = "UPDATE players set gameswon = gameswon + '$_SESSION[aman3games]', gamesloss = gamesloss + '$_SESSION[hman3games]', pointswon = pointswon + '$_SESSION[aman3points]', pointsloss = pointsloss + '$_SESSION[hman3points]' where PlayerID = '$_SESSION[awayman3id]'";
		$alady1query = "UPDATE players set gameswon = gameswon + '$_SESSION[alady1games]', gamesloss = gamesloss + '$_SESSION[hlady1games]', pointswon = pointswon + '$_SESSION[alady1points]', pointsloss = pointsloss + '$_SESSION[hlady1points]' where PlayerID = '$_SESSION[awaylady1id]'";
		$alady2query = "UPDATE players set gameswon = gameswon + '$_SESSION[alady2games]', gamesloss = gamesloss + '$_SESSION[hlady2games]', pointswon = pointswon + '$_SESSION[alady2points]', pointsloss = pointsloss + '$_SESSION[hlady2points]' where PlayerID = '$_SESSION[awaylady2id]'";
		$alady3query = "UPDATE players set gameswon = gameswon + '$_SESSION[alady3games]', gamesloss = gamesloss + '$_SESSION[hlady3games]', pointswon = pointswon + '$_SESSION[alady3points]', pointsloss = pointsloss + '$_SESSION[hlady3points]' where PlayerID = '$_SESSION[awaylady3id]'";
				
		mysqli_query($mysqli, $aman1query);
		mysqli_query($mysqli, $aman2query);
		mysqli_query($mysqli, $aman3query);
		mysqli_query($mysqli, $alady1query);
		mysqli_query($mysqli, $alady2query);
		mysqli_query($mysqli, $alady3query);
				
		mysqli_close($mysqli);
		header("Location: results.php");
		exit();
	
?>