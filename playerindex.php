<?php

    require ('db_credentials.php');
	require ('web_utils.php');

	$stylesheet = 'sportsstats.css';

    $id = $_POST['id'];

    if (!$id) {
        $message = "No game was selected to see players";
        print generatePageHTML("View Players (Error)", generateErrorPageHTML($message), $stylesheet);
        exit;
    }

    $conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		print generatePageHTML("View Players (Error)", "<p>Connection failed: " . $conn->connect_error . "</p>", $stylesheet);
		exit;
	}

	$sql = "SELECT * FROM PLAYERS WHERE GameID = $id";
	$result = $conn->query($sql);
	$players = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($players, $row);
		}
	}
    $conn->close();

    print generatePageHTML("Players", generatePlayersTableHTML($players), $stylesheet);


    function generatePlayersTableHTML($players) {
    $html = "<h1>Player Stats</h1>\n";

    $html .= "<form id='form1' method='post'>";
    $html .= "<input type='button' onclick=submitForm('index.php') value='View Games'/>";
    $html .= "<input type='button' onclick=submitForm('player_Form.php') value='Add Player'/>";
    $html .= "<input type='button' onclick=submitForm('delete_player.php') value='Delete Player'/>";

    if (count($players) < 1) {
        $html .= "<p>No Players to display!</p>\n";
        return $html;
    }

    $html .= "\n<table>\n";
    $html .= "<tr><th>Select Player</th><th>Name</th><th>Number</th><th>Position</th><th>Field Goals</th><th>Three Points</th><th>Rebounds</th><th>Turnovers</th><th>Assists</th><th>Steals</th><th>Time Played (Min)</th></tr>\n";

    foreach ($players as $player) {
        $playerid = $player['playerID'];
        $gameid = $player['GameID'];
        $name = $player['Name'];
        $number = $player['Number'];
        $position = $player['Position'];
        $fieldgoals = $player['FieldGoals'];
        $threepoints = $player['ThreePoints'];
        $rebounds = $player['Rebounds'];
        $turnovers = $player['Turnovers'];
        $assists = $player['Assists'];
        $steals = $player['Steals'];
        $timeplayed = $player['TimePlayedInMin'];


        $html .= "<tr><td><input type='radio' name='playerid' value='$playerid'/><td>$name</td><td>$number</td><td>$position</td><td>$fieldgoals</td><td>$threepoints</td><td>$rebounds</td><td>$turnovers</td><td>$assists</td><td>$steals</td><td>$timeplayed</td></tr>\n";
    }

    $html .= "<input type='hidden' name='id' value='$gameid'/>";
    $html .= "</form></table>\n";

    return $html;
}


?>
