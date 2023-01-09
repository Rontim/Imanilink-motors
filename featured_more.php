<?php
  require "connect.php";
  session_start();

  if (isset($_SERVER["REQUEST_METHOD"]) == "GET"){
      $carId = $_GET["carId"];
      $query = "SELECT * FROM vehicles WHERE car_id = {$_GET["carId"]}";
      $result = $conn->query($query);
      $row = $result->fetch_assoc();

  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <?php
        echo <<<title
        <title>{$row["make"]} {$row["model"]} {$row["year"]}</title>
        title;
    ?>
    <link rel="stylesheet" href="/CSS/header.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="/Images/favicon.ico">
    <link rel="stylesheet" href="/CSS/home.css" type="text/css">
    <link rel="stylesheet" href="./CSS/more.css" type="text/CSS">
</head>

<body>
    <header> <?php include "header.php";?><br>
    </header>
    <div class="card"> <?php
            echo <<< div
            <div class="image">
                <img src="{$row["imagePATH"]}.jpg">
            </div>
            <div class="details">
                <table>
                    <tr>
                        <th>Make</th>
                        <td class="bc">{$row["make"]}</td>
                    </tr>
                    <tr>
                        <th class="bc">Model</th>
                        <td>{$row["model"]}</td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td class="bc">{$row["year"]}</td>
                    </tr>
                    <tr>
                        <th>Engine Type</th>
                        <td>{$row["engine_type"]}</td>
                    </tr>
                    <tr>
                        <th>Fuel Info</th>
                        <td>{$row["fuel_type"]}</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>{$row["fuel_capacity"]}</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>{$row["fuel_economy"]}</td>
                    </tr>
                    <tr>
                        <th>Transmission</th>
                        <td class="bc">{$row["year"]}</td>
                    </tr>
                    <tr>
                        <th class="bc">Price</th>
                        <td>Ksh {$row["price"]}</td>
                    </tr>
                    <tr>
                        <th>Mileage</th>
                        <td class="bc">{$row["mileage"]} Km</td>
                    </tr>
                </table>
            </div>
            div;
        ?> </div>
    <script src="hamburger.js"></script>
</body>

</html>