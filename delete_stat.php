<?php
        require ('db_credentials.php');
	    require ('web_utils.php');

        $stylesheet = 'sportsstats.css';

        $id = $_POST['id'];

		$message = "";
    //makes sure valid game id was passed to prevent all values from being deleted.
		if (!$id) {
			$message = "No game was specified to delete.";
            print generatePageHTML("Delete Game (Error)", generateErrorPageHTML($message), $stylesheet);
            exit;
		} else {
			// Create connection

			$mysqli = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($mysqli->connect_error) {
				$message = $mysqli->connect_error;
			} else {
				$id = $mysqli->real_escape_string($id);
				$sql = "DELETE FROM GAMES WHERE GameID = $id";
                $sql1 = "DELETE FROM PLAYERS WHERE GameID = $id";
				if ( $result = $mysqli->query($sql) ) {
                    if ( $result = $mysqli->query($sql1) ) {
                        redirect("index.php");
                    }
				} else {
                    //error page if sql fails
					print generatePageHTML("Delete Game (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
                    exit;
				}
				$mysqli->close();
			}
		}
?>
