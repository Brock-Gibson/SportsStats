<?php
    require ('db_credentials.php');
	require ('web_utils.php');
    $stylesheet = 'sportsstats.css';

    $id = $_POST['id'];

    if (!$id) {
        $message = "No game was specified to update.";
        print generatePageHTML("Update Game (Error)", generateErrorPageHTML($message), $stylesheet);
        exit;
    }



    $body = <<<EOT
<h1>Update Game</h1>
<form action="update_stat.php" method="post">

<input type='hidden' name='action' value='update' /><input type='hidden' name='id' value='$id' />

<p>Opponent<br />
<input type="text" name="Opponet" value="" placeholder="Opponent" maxlength="255" size="80"></p>

<p>Score<br />
<input type="number" name="Score" value="$" min="0"></p>

<p>Opponent Score<br />
<input type="number" name="OpponentScore" value="" min="0"></p>

<p>Date<br />
<input type="date" name="Date" value=""></p>

 <p>Win or Lose<br />
    <select name="winOrLose">
        <option value="Win">Win</option>
        <option value="Lose">Lose</option>
</select>
</p>

<p>Home or Away<br />
    <select name="homeOrAway">
        <option value="Home">Home</option>
        <option value="Away">Away</option>
</select>
</p>

<p>Regular or Post Season<br />
    <select name="regularOrPostSeason">
        <option value="Regular">Regular</option>
        <option value="Post">Post</option>
</select>
</p>

<input type="submit" value="Submit">
</form>
EOT;


    print generatePageHTML("Update Game", $body, $stylesheet);
?>
