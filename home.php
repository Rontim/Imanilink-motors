<?php
require "connect.php";
session_start();

$query = "SELECT * FROM vehicles ORDER BY mileage DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/header.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/CSS/home.css" type="text/css">
    <title>Home</title>
</head>

<body>
    <div class="cover">
        <div class="top">
            <div class="blur">
                <header> <?php include "header.php";?><br>
                </header>
                <section class="welcome">
                    <div class="inner">
                        <header>
                            <h1>Experience the thrill of the open road with us</h1>
                        </header>
                        <hr>
                        <div id="message">
                            <h1>let the car find you</h1>
                            <button>CONTACT US <span class="arrows">➥</span><i class="fa fa-arrow-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="page">
            <div class="feature"> <?php

                $count = 0;
                while (($row = $result->fetch_assoc()) && ($count < 6)) {
                    echo <<< html
                    <div class="car-grid" style="background: url({$row["imagePATH"]}.jpg);background-size: cover;
                    background-position: center;">
                        <div class="car" id="id0$count">
                            <div class="car-content">
                                <p><i class="fas fa-dashboard"></i>{$row["mileage"]}Km / {$row["transmission"]}</p>
                                <hr>
                                <h3>{$row["make"]}</h3>
                                <h3>{$row["year"]}  {$row["model"]}</h3>
                                <p>Ksh {$row["price"]}<p>
                                <p> {$row["fuel-type"]}</p>
                                <form action="featured_more.php" method="GET">
                                    <input type="hidden" name="carId" value="{$row["car_id"]}">
                                    <button type="submit"> VIEW CAR <span class="arrows">➣</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    html;
                    $count++;
                }
            ?> <a href="cars.php"><button class="viewAll-btn">View all<span class="arrows">➥</span></button></a>
            </div>
            <hr id="divider">
            </section>
            <section id="about">
                <div class="h1">
                    <h1>About Us</h1>
                    <hr>
                </div>
                <p> At our dealership, we believe in providing our customers with an exceptional car buying experience.
                    Our team of knowledgeable sales consultants is here to answer any questions you may have and help
                    you find the perfect car for your needs and budget. We offer a range of financing options and
                    trade-in services to make the process as smooth and stress-free as possible. </p>
                <a href="about.php">
                    <button class="aboutbtn">Learn more ⇒</button>
                </a>
            </section>
        </div>
        <hr id="divider">
        <footer id="footer">
            <p> &COPY; 2023 imanilink motors</p>
        </footer>
    </div>
    <script src="hamburger.js"></script>
</body>

</html>