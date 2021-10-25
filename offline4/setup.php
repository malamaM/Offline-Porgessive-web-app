<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname="web_app";
// Create connection to database
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database called simple_game which will hold all the tables related to the project

$sql = "CREATE DATABASE web_app";
if ($conn->query($sql) === TRUE) {
  echo "Database web_app created successfully <br>";
} else {
  echo "Error creating database: " . $conn->error;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table called gameplayers to store the information of the users registered
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(70) ,
Validation_Code VARCHAR(250),
Email VarChar(250),
number VARCHAR (250) Default 0,
ip VARCHAR (250),
date VARCHAR (250),
time VARCHAR (250),
Latitude VARCHAR (250),
Longitude VARCHAR (250)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Users created successfully <br>";
} else {
  echo "Error creating table: " . $conn->error;
}
