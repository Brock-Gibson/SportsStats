<?php
	require ('db_credentials.php');
	require ('web_utils.php');

	$stylesheet = 'sportsstats.css';

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
//prevent insertion attack
	$opponet = $conn->real_escape_string($vopponet);
	$score = $conn->real_escape_string($vscore);
    $opponetScore = $conn->real_escape_string($vopponetScore);
    $date = $conn->real_escape_string($vdate);
    $winOrLose = $conn->real_escape_string($vwinOrLose);
    $homeOrAway = $conn->real_escape_string($vhomeOrAway);
    $regularOrPostSeason = $conn->real_escape_string($vregularOrPostSeason);
//send sql info inside sql variable
	$sql = "INSERT INTO GAMES (Opponet, Score, OpponetScore, GameDate, WinOrLose, HomeOrAway, RegularOrPostSeason) VALUES ('$opponet', '$score', '$opponetScore', '$date', '$winOrLose', '$homeOrAway', '$regularOrPostSeason')";

	$result = $conn->query($sql);
	if ($result) {
		// insert successfull, redirect browser to index.php to see list of tasks
		redirect("index.php");
	} else {
		print generatePageHTML("Add Game (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
		exit;
	}

?>
