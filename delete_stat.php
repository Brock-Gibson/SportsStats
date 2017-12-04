<?
        $id = $_POST['id'];

		$message = "";

		if (!$id) {
			$message = "No task was specified to delete.";
		} else {
			// Create connection
			require('db_credentials.php');
			$mysqli = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($mysqli->connect_error) {
				$message = $mysqli->connect_error;
			} else {
				$id = $mysqli->real_escape_string($id);
				$sql = "DELETE FROM GAMES WHERE id = $id";
				if ( $result = $mysqli->query($sql) ) {
					redirect("index.php");
				} else {
					print generatePageHTML("Stats (Error)", generateErrorPageHTML($conn->error . " using SQL: $sql"), $stylesheet);
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
