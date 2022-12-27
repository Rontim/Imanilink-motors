<?php
require "connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["username"])) {
        if (isset($_POST)) {
            $userName = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];

            $query = " SELECT * FROM Account
            WHERE username = '$userName'
            AND email = '$email'
            AND password = '$password'";

            $result = $conn->query($query);
            $row = $result->fetch_assoc();

            if (isset($row)) {
                $_SESSION["username"] = $row["username"];
                echo $_SESSION["username"];
                header("location: home.php");
            } else {
                header("location: login.php?error_message=Invalid username or password or email enter the correct details");
                die();
                // echo "unsuccessful";
            }
        }
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_SESSION["username"])) {
        header("Location: index.html");
    }
}