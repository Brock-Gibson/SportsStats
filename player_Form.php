<?php
    require ('db_credentials.php');
	require ('web_utils.php');
    $stylesheet = 'sportsstats.css';

    $id = $_POST['id'];

    if (!$id) {
        $message = "No game was selected to add a player too!";
        print generatePageHTML("Add Player (Error)", generateErrorPageHTML($message), $stylesheet);
        exit;
    }

    $body = <<<EOT
<h1>Add Player</h1>
<form action="add_player.php" method="post">

    <input type='hidden' name='action' value='update' /><input type='hidden' name='id' value='$id' />

    <p>Name <br />
    <input type="text" name="Player" value="" placeholder="" maxlength="99" size="80"></p>

    <p>Number <br />
    <input type="number" name="Number" value="" placeholder="" min="0" max="99" size="10"></p>

    <p>Position <br />
        <select name="Position">
            <option value="Point Guard">Point Guard</option>
            <option value="Shooting Guard">Shooting Guard</option>
            <option value="Small Forward">Small Forward</option>
            <option value="Power Forward">Power Forward</option>
            <option value="Center">Center</option>
        </select>
    </p>

    <p>Field Goals<br />
        <input type="number" name="FieldGoals" value="" placeholder="" min="0" size="10">
    </p>
    <p>Three Points<br />
        <input type="number" name="ThreePoints" value="" placeholder="" min="0" size="10">
    </p>
    <p>Rebounds<br />
        <input type="number" name="Rebounds" value="" placeholder="" min="0" size="10">
    </p>
    <p>Turn Overs<br />
        <input type="number" name="Turnovers" value="" placeholder="" min="0" size="10">
    </p>
    <p>Assists<br />
        <input type="number" name="Assists" value="" placeholder="" min="0" size="10">
    </p>
    <p>Steals<br />
        <input type="number" name="Steals" value="" placeholder="" min="0" size="10">
    </p>
    <p>TimePlayedInMin<br />
        <input type="number" name="TimePlayedInMin" value="" placeholder="" min="0" size="10">
    </p>

  <input type="submit" value="Submit">
</form>
EOT;

print generatePageHTML("Add Player", $body, $stylesheet);

?>
