<?php
    require ('db_credentials.php');
	require ('web_utils.php');
    $stylesheet = 'sportsstats.css';

    $id = $_POST['id'];
//throws error if there is no id sent
    if (!$id) {
        $message = "No game was specified to update.";
        print generatePageHTML("Update Game (Error)", generateErrorPageHTML($message), $stylesheet);
        exit;
    }

//gets game data through POST
	$vopponet = $_POST['Opponet'] ? $_POST['Opponet'] : "untitled";
    $vscore = $_POST['Score'] ? $_POST['Score'] : "untitled";
    $vopponetScore = $_POST['OpponentScore'] ? $_POST['OpponentScore'] : "untitled";
    $vdate = $_POST['Date'] ? $_POST['Date'] : "untitled";
    $vwinOrLose = $_POST['winOrLose'];
    $vhomeOrAway = $_POST['homeOrAway'];
    $vregularOrPostSeason = $_POST['regularOrPostSeason'];

			// Create connection
			$mysqli = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($mysqli->connect_error) {
				print generatePageHTML("Stats (Error)", generateErrorPageHTML($mysqli->connect_error), $stylesheet);
		        exit;
			} else {
                //escapes data to prevent injection
                $opponet = $mysqli->real_escape_string($vopponet);
                $score = $mysqli->real_escape_string($vscore);
                $opponetScore = $mysqli->real_escape_string($vopponetScore);
                $date = $mysqli->real_escape_string($vdate);
                $winOrLose = $mysqli->real_escape_string($vwinOrLose);
                $homeOrAway = $mysqli->real_escape_string($vhomeOrAway);
                $regularOrPostSeason = $mysqli->real_escape_string($vregularOrPostSeason);

				$sql = "UPDATE GAMES SET Opponet='$opponet', Score='$score', OpponetScore='$opponetScore', GameDate='$date', WinOrLose='$winOrLose', HomeOrAway='$homeOrAway', RegularOrPostSeason='$regularOrPostSeason' WHERE GameID = $id";

                //sends sql query
				if ( $result = $mysqli->query($sql) ) {
					redirect("index.php");
				} else {
                    //error page if query fails
					print generatePageHTML("Update Game (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
                    exit;
				}
				$mysqli->close();
			}


?>
