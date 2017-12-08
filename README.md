# SportsStats: A PHP driven stats application
Members: **Brock Gibson and Nick Riley**

This is basic application to keep track of various sports stats in games. It is devided into two tables that are connected via a GameID. The GAMES table
contains info on the opponent, the home team score, opponent score, date, whether the home team won or lost, home game or away, and whether the game was regular or post season. Once the game exists you can add player data that is linked via the GameID mentioned earlier. From there you can add player data such as name, position, field goals, etc. Both tables can be added to, deleted from, are visible on the index.php or playerindex.php, and can be updated.

SIDE NOTE: The git extention in brackets was giving us issues so we both added on one account and signed commits with /Name to say who did what commits. For example this commit will have the comment "added more content info for the README file/Nick".

We used the text editor Brackets to develop, and used it's built in Git plugin which provided a easy interface for commiting changes and keeping track of our project

 ### Database Table Schema


>CREATE TABLE GAMES(
    GameID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Opponet VARCHAR(30) NOT NULL,
    Score INT NOT NULL,
    OpponetScore INT NOT NULL,
    Date DATE NOT NULL,
    WinOrLose VARCHAR(10) NOT NULL,
    HomeOrAway VARCHAR(10) NOT NULL,
    RegularOrPostSeason VARCHAR(15) NOT NULL
);

>CREATE TABLE PLAYERS(
    playerID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    GameID INT NOT NULL,
    Name VARCHAR(100) NOT NULL,
    Number INT NOT NULL,
    Position VARCHAR(20) NOT NULL,
    FieldGoals INT,
    ThreePoints INT,
    Rebounds INT,
    Turnovers INT,
    Assists INT,
    Steals INT,
    TimePlayedInMin INT
);

<!--This is a reference link to our Entity Relationship Diagram-->
Entity Relationship Diagram 
![alt text][logo]

[logo]:  https://github.com/Brockerboy/SportsStats/blob/master/SportsStatsERD.png
"ERD"
    