<?php
    require ('db_credentials.php');
	require ('web_utils.php');
    $stylesheet = 'sportsstats.css';

    $id = $_POST['id'];

    $opponet = $stat['Opponet'];
    $score = $stat['Score'];
    $opponetScore = $stat['OpponetScore'];
    $date = ($stat['GameDate']);
    $winOrLose = $stat['WinOrLose'];
    $homeOrAway = $stat['HomeOrAway'];
    $regularOrPostSeason = $stat['RegularOrPostSeason'];

    $body = <<<EOT
<h1>Stats</h1>
<form action="update_stat.php" method="post">

<input type='hidden' name='action' value='update' /><input type='hidden' name='id' value='$id' />

<p>Opponent<br />
<input type="text" name="Opponet" value="{$opponet}" placeholder="Opponent" maxlength="255" size="80"></p>

<p>Score<br />
<input type="number" name="Score" value="$score" min="0"></p>

<p>Opponent Score<br />
<input type="number" name="OpponentScore" value="$stat[OpponetScore]" min="0"></p>

<p>Date<br />
<input type="date" name="Date" value="$stat[GameDate]"></p>

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


    print generatePageHTML("Stats", $body, $stylesheet);
?>
