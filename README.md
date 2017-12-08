# SportsStats: A PHP driven stats application
Members: **Brock Gibson and Nick Riley**

This is basic application to keep track of various sports stats in games.

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
Reference-style: 
![alt text][logo]

[logo]:  https://github.com/Brockerboy/SportsStats/blob/master/SportsStatsERD.png
"ERD"
    