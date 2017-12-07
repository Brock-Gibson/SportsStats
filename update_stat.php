<?php
    require ('db_credentials.php');
	require ('web_utils.php');
    $stylesheet = 'sportsstats.css';

    $id = $_POST['id'];

	$vopponet = $_POST['Opponet'] ? $_POST['Opponet'] : "untitled";
    $vscore = $_POST['Score'] ? $_POST['Score'] : "untitled";
    $vopponetScore = $_POST['OpponentScore'] ? $_POST['OpponentScore'] : "untitled";
    $vdate = $_POST['Date'] ? $_POST['Date'] : "untitled";
    $vwinOrLose = $_POST['winOrLose'];
    $vhomeOrAway = $_POST['homeOrAway'];
    $vregularOrPostSeason = $_POST['regularOrPostSeason'];


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		print generatePageHTML("Stats (Error)", generateErrorPageHTML($conn->connect_error), $stylesheet);
		exit;
	}


//escape values

	$opponet = $conn->real_escape_string($vopponet);
	$score = $conn->real_escape_string($vscore);
    $opponetScore = $conn->real_escape_string($vopponetScore);
    $date = $conn->real_escape_string($vdate);
    $winOrLose = $conn->real_escape_string($vwinOrLose);
    $homeOrAway = $conn->real_escape_string($vhomeOrAway);
    $regularOrPostSeason = $conn->real_escape_string($vregularOrPostSeason);

    $sql = "UPDATE GAMES SET Opponet='$opponet', Score='$score', OpponetScore='$opponetScore', GameDate='$date', WinOrLose='$winORLose', HomeOrAway='$homeOrAway', RegularOrPostSeason='$regularOrPostSeason' WHERE GameID = $id";

    $result = $conn->query($sql);
	if ($result) {
		// insert successfull, redirect browser to index.php to see list of tasks
		redirect("index.php");
	} else {
		print generatePageHTML("Update Game (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
		exit;
	}


	function generateErrorPageHTML($error) {
	$html = <<<EOT
<h1>Stats</h1>
<p>An error occurred: $error</p>
<p><a class='statButton' href='stat_Form.html'>Add Stat</a><a class='statButton' href='index.php'>View Stats</a></p>
EOT;

	return $html;
	}
?>
