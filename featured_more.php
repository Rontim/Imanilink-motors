<?php
  require "connect.php";
  session_start();

  if (isset($_SERVER["REQUEST_METHOD"]) == "GET"){
      $carId = $_GET["carId"];
      $query = "SELECT * FROM cars WHERE car_id = {$_GET["carId"]}";
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
        <title>{$row["model"]} {$row["year"]}</title>
        title;
    ?>
    <link rel="stylesheet" href="./CSS/more.css" type="text/CSS">
</head>

<body>
    <div class="card"> <?php
            echo <<< div
            <div class="image">
                <img src="{$row["imageurl"]}.jpg">
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
                        <th class="bc">Features</th>
                        <td class="df">{$row["features"]}</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>{$row["engine"]}</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>{$row["fuel"]}</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>{$row["color"]}</td>
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
</body>

</html>