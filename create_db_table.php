<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE stud";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

$dbname = "stud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE TABLE student(
roll INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
f_name VARCHAR(30) NOT NULL,
l_name VARCHAR(30) NOT NULL,
phone VARCHAR(15) NOT NULL,
email VARCHAR(20),
addr VARCHAR(50),
gender VARCHAR(10) NOT NULL,
branch VARCHAR(10) NOT NULL,
sem INT(2) NOT NULL,
course1 VARCHAR(10) NOT NULL,
course2 VARCHAR(10) NOT NULL,
course3 VARCHAR(10) NOT NULL,
marks1 INT(2) DEFAULT 0,
marks2 INT(2) DEFAULT 0,
marks3 INT(2) DEFAULT 0
)";

if ($conn->query($sql) === TRUE) {
    echo "Table student created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>