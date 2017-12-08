<?php
        require ('db_credentials.php');
	    require ('web_utils.php');
        $stylesheet = 'sportsstats.css'
        $id = $_POST['id'];
		$message = "";
		if (!$id) {
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
				$sql = "DELETE FROM PlAYERS WHERE GameID = $id";
				if ( $result = $mysqli->query($sql) ) {
                        redirect("index.php");
                    }
				} else {
					print generatePageHTML("Delete Player (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
                    exit;
				}
				$mysqli->close();
			}
		}
?>
