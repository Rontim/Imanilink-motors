<?php
$username = $firstName = $lastName = $password = $gender = $email = $phone = $location = '';
require 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $password = test_input($_POST["password"]);
    $gender = test_input($_POST["gender"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $location = test_input($_POST["location"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$stmt = $conn->prepare("INSERT INTO Account (username, firstName, lastName, password, gender, email, phone, location) VALUES(?, ?, ?, ?, ?, ?,?, ?)");
$stmt->bind_param("ssssssss", $username, $firstName, $lastName, $password, $gender, $email, $phone, $location);
$stmt->execute();

if (!($conn->connect_error)) {
    header("location: success.html");
}