<?php
    require "connect.php";
    session_start();

    $make = 'all';
    $year = 'all';

    if (isset($_GET['make'])) {
    $make = $_GET['make'];
    $year = $_GET['year'];
    }

    $sql = "SELECT * FROM vehicles WHERE 1=1";

    // if ($make == 'all' && $year =='all'){
    //     $sql .= " WHERE 1=1";
    // }

    if ($make != 'all') {
    $sql .= " make='$make'";
    }


    if ($year != 'all') {
    $sql .= " AND year='$year'";
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
    <title>Document</title>
</head>

<body> <?php
        $quary = "SELECT * FROM vehicles";
        $res = $conn->query($quary);
        echo <<< form
            <form class="filters" action="cars.php" method="GET">
            <label for="Make">Make </label>
            <select id="type" name="make">
                <option value='all'>All</option>
        form;
        while ($row = $res->fetch_assoc()){
            echo <<< make
                <option value='{$row["make"]}'>{$row["make"]}</option>
            make;
        }
        ?> </select>
    <label for="year">Year </label>
    <select id="year" name="year">
        <option value='all'>All</option><?php
            $quary = "SELECT * FROM vehicles order by year";
            $res2 = $conn->query($quary);
            while ($row = $res2->fetch_assoc()){
                echo <<< make
                    <option value='{$row["year"]}'>{$row["year"]}</option>
                make;
            }
        ?>
    </select>
    <button type="submit">Filter</button>
    </form>
    <!-- Car list --> <?php
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="car">';
        echo '<img src="' . $row['imagePATH'] . '.jpg" alt="' . $row['model'] . '" style="width:50%;">';
        echo '<h3>' . $row['model'] . '</h3>';
        // echo '<p>' . $row['description'] . '</p>';
        // echo '<p>Location: ' . $row['location'] . '</p>';
        echo '<button class="btn-secondary">View details</button>';
        echo '</div>';
      }

      // Close the connection
      mysqli_close($conn);
    ?> <script src="hamburger.js"></script>
</body>

</html>