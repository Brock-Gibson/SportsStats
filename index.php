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
    $conn->close();

	print generatePageHTML("Stats", generateStatsTableHTML($stats), $stylesheet);


//Function to make the table
	function generateStatsTableHTML($stats) {
		$html = "<h1>Game Stats</h1>\n";

        $html .= "<form id='form1' method='post'>";
        $html .= "<input type='button' onclick=submitForm('http://brockgibson.epizy.com/stat_Form.html') value='Add Game'/>";
        $html .= "<input type='button' onclick=submitForm('delete_stat.php') value='Delete Game'/>";
        $html .= "<input type='button' onclick=submitForm('update_stat_page.php') value='Update Game'/>";
        $html .= "<input type='button' onclick=submitForm('player_Form.php') value='Add Player' />";
        $html .= "<input type='button' onclick=submitForm('update_stat_page.php') value='View Players'/> <br>";

		if (count($stats) < 1) {
			$html .= "<p>No games to display!</p>\n";
			return $html;
		}

		$html .= "<table>\n";
		$html .= "<tr><th>Select Game</th><th>Opponet</th><th>Score</th><th>Opponet Score</th><th>Date</th><th>Win/Lose</th><th>Home/Away</th><th>Regular/Post Season</th></tr>\n";

		foreach ($stats as $stat) {
			$id = $stat['GameID'];
			$opponet = $stat['Opponet'];
			$score = $stat['Score'];
            $opponetScore = $stat['OpponetScore'];
			$date = ($stat['GameDate']);
            $winOrLose = $stat['WinOrLose'];
            $homeOrAway = $stat['HomeOrAway'];
            $regularOrPostSeason = $stat['RegularOrPostSeason'];


			$html .= "<tr><td><input type='radio' name='id' value='$id' /></td><td>$opponet</td><td>$score</td><td>$opponetScore</td><td>$date</td><td>$winOrLose</td><td>$homeOrAway</td><td>$regularOrPostSeason</td></tr>\n";
		}
		$html .= "</form></table>\n";

		return $html;
	}
?>
