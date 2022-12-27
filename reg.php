<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <h1>Rigistration</h1>
        <form action="reg_action.php" method="post" name="reg">
            <div class="user_name">
                <label for="user">Username:</label>
                <input type="text" name="username" class="user" placeholder="Enter you preffered username" required>
                <p class="message"></p>
            </div>
            <br>
            <div class="password">
                <label for="password">Password:</label>
                <input type="password" name="password" class="user" required placeholder="Enter you preffered password">
                <p class="message"></p>
            </div>
            <br>
            <div class="names">
                <label for="name">First name:</label>
                <input type="text" name="firstName" required class="user">
                <br>
                <label for="name">Last name: </label>
                <input type="text" name="lastName" required class="user" placeholder="Enter you last name">
                <p class="message"></p>
            </div>
            <br>
            <div class="email">
                <label for="email">Email:</label>
                <input type="email" required name="email" class="user" placeholder="E.g example@mail.com">
                <p class="message"></p>
            </div>
            <br>
            <div class="phone">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" required class="user" placeholder="E.g 0712345678">
                <p class="message"></p>
            </div>
            <br>
            <div class="gender">
                <label for="Female">Gender:</label>
                <input type="radio" name="gender" value="female"> female <input type="radio" name="gender" value="male">
                male <input type="radio" name="gender" value="other"> other <p class="message"></p>
            </div>
            <br>
            <div class="location">
                <label for="location">Location</label>
                <input type="tel" name="location" placeholder="Enter your nearest town">
                <p class="message"></p>
            </div>
            <br> <br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <script src="./validation.js"></script>
</body>

</html>