<?php
    require "connect.php";
    session_start();

    $make = 'all';
    $year = 'all';
    $model = 'all';

    if (isset($_GET['make'])) {
        $make = $_GET['make'];
        $year = $_GET['year'];
    }

    if (isset($_GET['model'])) {
        $model = $_GET['model'];
    }

    $sql = "SELECT * FROM vehicles WHERE 1=1";

    if ($make == 'all' && $year =='all' && $model){
         $sql .= " ORDER BY make";
    }

    if ($make != 'all') {
    $sql .= " AND make='$make'";
    }


    if ($year != 'all') {
    $sql .= " AND year='$year'";
    }

    if ($model != 'all') {
        $sql .= " AND model='$model'";
    }

    $result = mysqli_query($conn, $sql);


    if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
    }


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
    <title>Cars Page</title>
</head>

<body>
    <header> <?php include "header.php";?><br>
    </header> <?php
        $quary = "SELECT make FROM vehicles";
        $res = $conn->query($quary);
        echo <<< form
            <form class="filters" action="cars.php" method="GET">
            <label for="Make">Make </label>
            <select id="type" name="make">
                <option value='all'>All</option>
        form;
        while ($row = $res->fetch_column()){
            echo <<< make
                <option value='{$row}'>{$row}</option>
            make;
        }
        ?> </select>
    <label for="year">Year </label>
    <select id="year" name="year">
        <option value='all'>All</option><?php
            $quary = "SELECT year FROM vehicles order by year";
            $res2 = $conn->query($quary);

            while ($row = $res2->fetch_column()){
                echo <<< make
                    <option value='{$row}'>{$row}</option>
                make;
            }
        ?>
    </select> <?php
        if ($make != 'all') {
            echo <<< model
                <label for="model">Model </label>
                <select id="model" name="model">
                    <option value='all'>All</option>
            model;
            $quary = "SELECT model FROM vehicles WHERE make = '$make'";
            $res3 = $conn->query($quary);

            while ($row = $res3->fetch_column()){
                echo <<< make
                    <option value='{$row}'>{$row}</option>
                make;
            }
        }
    ?> </select>
    <button type="submit">Filter</button>
    </form>
    <div class="cars-page"> <?php
    while ($row = mysqli_fetch_array($result)) {
        echo <<< car
            <div class="cars">
                <div id="img" style="background-image: url('{$row['imagePATH']}.jpg');background-position: center;
                background-repeat: no-repeat;
                background-size: 96% 96%;">
                    <div id="right">
                        <h3>{$row['make']} {$row['model']}</h3>
                        <form action='featured_more.php' method='GET'>
                            <input type='hidden' name='carId' value='{$row['car_id']}'>
                            <button type='submit'> VIEW CAR <span class='arrows'>➣</span></button>
                        </form>
                    </div>
                </div>

            </div>
            car;
      }

      // Close the connection
      mysqli_close($conn);

    ?> </div>
    <footer id="footer">
        <p> &COPY; 2023 imanilink motors</p>
    </footer>
    <script src="hamburger.js"></script>
</body>

</html>