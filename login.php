<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: home.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <div><?php
            if (isset($_GET["error_message"])) {
                $message = $_GET["error_message"];
                echo "<div class='server-error'>$message</div>";
            }
            ?></div>
    <form action="login_action.php" method="POST" name="login">
        <div class="user_name">
            <label for="user">Username:</label>
            <input type="text" name="username" class="user" placeholder="Enter you preffered username" required>
            <p class="message"></p>
        </div>
        <div class="email">
            <label for="email">Email:</label>
            <input type="email" required name="email" class="user" placeholder="E.g example@mail.com">
            <p class="message"></p>
        </div>
        <div class="password">
            <label for="password">Password:</label>
            <input type="password" name="password" class="user" required placeholder="Enter you preffered password">
            <p class="message"></p>
        </div>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>