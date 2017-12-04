<?php
        require ('db_credentials.php');
	    require ('web_utils.php');

        $stylesheet = 'sportsstats.css';

        $id = $_POST['id'];

		$message = "";

		if (!$id) {
			$message = "No task was specified to delete.";
		} else {
			// Create connection

			$mysqli = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($mysqli->connect_error) {
				$message = $mysqli->connect_error;
			} else {
				$id = $mysqli->real_escape_string($id);
				$sql = "DELETE FROM GAMES WHERE GameID = $id";
				if ( $result = $mysqli->query($sql) ) {
					redirect("index.php");
				} else {
					print generatePageHTML("Stats (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
                    exit;
				}
				$mysqli->close();
			}
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
