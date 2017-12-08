<?php
	require ('db_credentials.php');
	require ('web_utils.php');

	$stylesheet = 'sportsstats.css';

	$vopponet = $_POST['Opponet'] ? $_POST['Opponet'] : "untitled";
    $vplayer = $_POST['Player'] ? $_POST['Player'] : "untitled";
    $vnumber = $_POST['Number'] ? $_POST['Number'] : "untitled";
    $vposition = $_POST['Position'];
    $vfieldgoals = $_POST['FieldGoals'] ? $_POST['FieldGoals'] : "untitled";
    $vthreepoints = $_POST['ThreePoints'] ? $_POST['ThreePoints'] : "untitled";
    $vrebounds = $_POST['Rebounds'] ? $_POST['Rebounds'] : "untitled";
    $vturnovers = $_POST['Turnovers'] ? $_POST['Turnovers'] : "untitled";
    $vassista = $_POST['Assists'] ? $_POST['Assists'] : "untitled";
    $vsteals = $_POST['Steals'] ? $_POST['Steals'] : "untitled";
    $vtimeplayedinmin = $_POST['TimePlayedInMin'] ? $_POST['TimePlayedInMin'] : "untitled";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		print generatePageHTML("Stats (Error)", generateErrorPageHTML($conn->connect_error), $stylesheet);
		exit;
	}

	$opponet = $conn->real_escape_string($vopponet);
    $player = $conn->real_escape_string($vplayer);
    $number = $conn->real_escape_string($vnumber);
    $position = $conn->real_escape_string($vposition);
    $fieldgoals = $conn->real_escape_string($vfieldgoals);
    $threepoints = $conn->real_escape_string($vthreepoints);
    $rebounds = $conn->real_escape_string($vrebounds);
    $turnovers = $conn->real_escape_string($vturnovers);
    $assists = $conn->real_escape_string($vassista);
    $steals = $conn->real_escape_string($vsteals);
    $timeplayedinmin = $conn->real_escape_string($vtimeplayedinmin);

	$sql = "INSERT INTO PLAYERS (Name, Number, Position, FieldGoals, ThreePoints, Rebounds, Turnovers, Assists, Steals, TimePlayedInMin) VALUES ('$opponet', '$player', '$number', '$position', '$fieldgoals', '$threepoints', '$rebounds', '$turnovers', '$assists', '$steals', '$timeplayedinmin')";

	$result = $conn->query($sql);
	if ($result) {
		// insert successfull, redirect browser to index.php to see list of tasks
		redirect("index.php");
	} else {
		print generatePageHTML("Add Player (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
		exit;
	}


	function generateErrorPageHTML($error) {
	$html = <<<EOT
<h1>Stats</h1>
<p>An error occurred: $error</p>
<p><a class='statButton' href='player_Form.html'>Add Stat</a><a class='statButton' href='index.php'>View Stats</a></p>
EOT;

	return $html;
	}
?>
