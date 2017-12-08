<?php
        require ('db_credentials.php');
	    require ('web_utils.php');
        $stylesheet = 'sportsstats.css';
        $playerid = $_POST['playerid'];
		$message = "";
		if (!$playerid) {
			$message = "No player was specified to delete.";
            print generatePageHTML("Delete Player (Error)", generateErrorPageHTML($message), $stylesheet);
            exit;
		} else {
			// Create connection
			$mysqli = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($mysqli->connect_error) {
				$message = $mysqli->connect_error;
			} else {
				$id = $mysqli->real_escape_string($id);
				$sql = "DELETE FROM PLAYERS WHERE playerID = $playerid";
				if ( $result = $mysqli->query($sql) ) {
                        redirect("index.php");
                    }
				else {
					print generatePageHTML("Delete Player (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
                    exit;
				}
				$mysqli->close();
			}
		}
?>
