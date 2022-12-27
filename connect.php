<?php
$servername = "localhost";
$username = "root";
$password = "1995timo";
$dbname = "imanilink";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    printf("Unable to connect to the database:<br /> %s", $conn->connect_error);
}