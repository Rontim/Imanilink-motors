<?php
require "connect.php";
session_start();

if (!isset($_SESSION["username"])){
    header("location: login.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/header.css" type="text/css">
    <link rel="stylesheet" href="/CSS/home.css" type="text/css">
    <title>Home</title>
</head>

<body>
    <div class="cover">
        <div class="top">
            <header> <?php include "header.php";?><br>
            </header>
            <section class="welcome">
                <div class="inner">
                    <header>
                        <h1>Experience the thrill of the open road with us</h1>
                    </header>
                    <hr>
                    <div id="message">
                        <p>let the car find you</p>
                        <button>CONTACT US </button>
                    </div>
                </div>
            </section>
        </div>
        <div class="page">
            <div class="feature"> <?php
                $query = "SELECT * FROM cars
                ORDER BY date_added DESC";

                $result = $conn->query($query);
                $row = $result->fetch_assoc();

                $count = 0;
                while ($count < 6) {
                    echo <<< html
                    <div class="car-grid" style="background: url({$row["imageurl"]}.jpg);background-size: cover;
                    background-position: center;">
                        <div class="car" id="id0$count">
                            <p>{$row["mileage"]}Km</p>
                            <hr>
                            <h3>{$row["model"]}</h3>
                            <p>Hello World<p>
                            <form action="featured_more.php" method="GET">
                                <input type="hidden" name="carId" value="{$row["car_id"]}">
                                <button type="submit"> View </button>
                            </form>
                        </div>
                    </div>
                    html;
                    $count++;
                }
            ?> </div>
            </section>
            <a href="cars.php"><button>View all</button></a>
            <section>
                <h2>Why choose us</h2>
                <ul>
                    <li>Wide selection of car models</li>
                    <li>Flexible rental options</li>
                    <li>Excellent customer service</li>
                </ul>
            </section>
        </div>
        <footer id="footer">
            <p> &COPY; 2023 imanilink motors</p>
        </footer>
    </div>
    <script src="hamburger.js"></script>
</body>

</html>