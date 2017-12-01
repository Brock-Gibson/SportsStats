<?php
	require ('db_credentials.php');
	require ('web_utils.php');

	$stylesheet = 'sportsstats.css';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		print generatePageHTML("Stats (Error)", "<p>Connection failed: " . $conn->connect_error . "</p>", $stylesheet);
		exit;
	}

	$sql = "SELECT * FROM GAMES";
	$result = $conn->query($sql);
	$stats = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($stats, $row);
		}
	}

	print generatePageHTML("Stats", generateStatsTableHTML($stats), $stylesheet);


//Function to make the table
	function generateStatsTableHTML($stats) {
		$html = "<h1>Game Stats</h1>\n";

        $html .= "<p><a class='statButton' href='stat_Form.html'>+ Add Game</a></p>\n";

		if (count($stats) < 1) {
			$html .= "<p>No games to display!</p>\n";
			return $html;
		}

		$html .= "<table>\n";
		$html .= "<tr><th>id</th><th>Opponet</th><th>Score</th><th>Opponet Score</th><th>Date</th><th>Win/Lose</th><th>Home/Away</th><th>Regular/Post Season</th></tr>\n";

		foreach ($stats as $stat) {
			$id = $stat['GameID'];
			$opponet = $stat['Opponet'];
			$score = $stat['Score'];
            $opponetScore = $stat['OpponetScore'];
			$date = ($stat['GameDate']);
            $winOrLose = $stat['WinOrLose'];
            $homeOrAway = $stat['HomeOrAway'];
            $regularOrPostSeason = $stat['RegularOrPostSeason'];


			$html .= "<tr><td>$id</td><td>$opponet</td><td>$score</td><td>$opponetScore</td><td>$date</td><td>$winOrLose</td><td>$homeOrAway</td><td>$regularOrPostSeason</td></tr>\n";
		}
		$html .= "</table>\n";

		return $html;
	}
?>
