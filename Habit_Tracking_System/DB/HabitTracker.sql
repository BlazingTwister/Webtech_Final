Drop database if exists HabitTracker;

create database HabitTracker;
use HabitTracker;

--
-- Database: `HabitTracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE Users (
    userID INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    fname VARCHAR(50) NOT NULL,
	lname VARCHAR(50) NOT NULL,
	gender INT(11) NOT NULL,
	email VARCHAR(100) NOT NULL,
    passwd VARCHAR(100) NOT NULL
    
);

--
-- Table structure for table `Habits`
--


CREATE TABLE Habits (
    habitID INT PRIMARY KEY AUTO_INCREMENT,
    userID INT,
    habitName VARCHAR(100) NOT NULL,
    reminderType VARCHAR(50),
    reminderTime TIME, -- Store time as needed
    reminderDay VARCHAR(20),
    FOREIGN KEY (userID) REFERENCES Users(userID),
    UNIQUE KEY unique_habit_name (habitName)
);

--
-- Table structure for table `Reminder`
--


CREATE TABLE Reminder (
    freqID INT PRIMARY KEY AUTO_INCREMENT,
    rType varchar(50)
);

--
-- Table structure for table `HabitProgress`
--

CREATE TABLE GoalProgress (
    progressID INT PRIMARY KEY AUTO_INCREMENT,
    habitName VARCHAR(20),
    userID INT,
    sDate DATE,
    completionStat VARCHAR(50),
    currentNo INT,
    targetNo INT,
    completionPercentage INT, -- Store percentage for partial completion
    FOREIGN KEY (userID) REFERENCES Users(userID),
    UNIQUE KEY unique_habit_name (habitName)
);

--
-- Table structure for table `Reminder`
--


CREATE TABLE CompletionStatus (
    csID INT PRIMARY KEY AUTO_INCREMENT,
    cStatus varchar(50)
);

--
-- Table structure for table `Goals`
--

CREATE TABLE Goals (
    goalID INT PRIMARY KEY AUTO_INCREMENT,
    habitID INT,
    userID INT,
    goalDescription VARCHAR(255),
    targetFrequency VARCHAR(20),
    targetNumberOfTimes INT,
    FOREIGN KEY (habitID) REFERENCES Habits(habitID),
    FOREIGN KEY (userID) REFERENCES Users(userID),
    UNIQUE KEY unique_habit_goal (habitID)
);

--
-- Table structure for table `Days of the week`
--

CREATE TABLE DaysOfWeek (
    dayID INT PRIMARY KEY AUTO_INCREMENT,
    dayN VARCHAR(20) NOT NULL
);

-- Insert data into the Days table
INSERT INTO DaysOfWeek (dayN) VALUES ('Monday');
INSERT INTO DaysOfWeek (dayN) VALUES ('Tuesday');
INSERT INTO DaysOfWeek (dayN) VALUES ('Wednesday');
INSERT INTO DaysOfWeek (dayN) VALUES ('Thursday');
INSERT INTO DaysOfWeek (dayN) VALUES ('Friday');
INSERT INTO DaysOfWeek (dayN) VALUES ('Saturday');
INSERT INTO DaysOfWeek (dayN) VALUES ('Sunday');



-- Insert data into the Reminder table
insert into Reminder (rType)
values ('none'), ('daily'), ('weekly'), ('monthly');

-- Insert data into the Completion table
insert into CompletionStatus (cStatus)
VALUES ('Completed'), ('Missed'), ('In Progress'), ('Incomplete');





