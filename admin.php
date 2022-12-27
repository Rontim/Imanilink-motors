<?php
require "connect.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test($data)
    {
        $data = trim($data);
        // $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["make"])) {
        $makeErr = "Make is required";
    } else {
        $make = test($_POST["make"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $make)) {
            $makeErr = "Make name should contain only leters and whitespaces";
        }
    }

    if (empty($_POST["location"])) {
        $locationErr = "You have not entered the cars current location";
    } else {
        $location = test($_POST["location"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $make)) {
            $locationErr = "letters and white spaces allowed";
        }
    }

    if (empty($_POST["model"])) {
        $modelErr = "Model is required";
    } else {
        $model = test($_POST["model"]);
        if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $model)) {
            $modelErr = "Model shoul contain eithe letters or numbers and whitespaces";
        }
    }

    if (empty($_POST["year"])) {
        $yearErr = "Year is required";
    } else {
        $year = test($_POST["year"]);
        if (!preg_match("/^\d{4}$/", $year)) {
            $yearErr = "The year should only contain 4 integer numbers";
        }
    }

    if (empty($_POST["date"])) {
        $dateErr = "Date is required";
    } else {
        $date = date("Y-m-d", strtotime($_POST["date"]));
    }

    if (empty($_POST["price"])) {
        $priceErr = "Price is required";
    } else {
        $price = $_POST["price"];
        if (!preg_match("/^\d{1,3}(?:,?\d{3})*(?:\.\d{2})?$/", $price)) {
            $priceErr = "Invalid price input must have a decimal value of two i.e 1234.56";
        }
    }

    if (empty($_POST["color"])) {
        $colorErr = "Coror is required";
    } else {
        $color = $_POST["color"];
        if (!preg_match("/^[a-zA-Z]*$/", $color)) {
            $colorErr = "Color must contain letters only";
        }
    }

    if (empty($_POST["mileage"])) {
        $mileageErr = "Mileage is required";
    } else {
        $mileage = test($_POST["mileage"]);
        if (!preg_match("/^[0-9]*$/", $mileage)) {
            $mileageErr = "Must contian letters only";
        }
    }

    if (empty($_POST["fuel_type"])) {
        $fuelErr = "fule type is required";
    } else {
        $fuel = $_POST["fuel_type"];
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fuel)) {
            $fuelErr = "Letters and white spaces allowed";
        }
    }

    if (empty($_POST["transmission"])) {
        $transmissionErr = "Transmission is required";
    } else {
        $transmission = test($_POST["transmission"]);
    }

    if (empty($_POST["engine_stats"])) {
        $engineErr = "Engine stats is required";
    } else {
        $engine = $_POST["engine_stats"];
        // if (!preg_match("/^\(d{1,2}Km\/)[a-z]*$/", $engine)) {
        //     $engineErr = "Incorrect engine consumption rate";
        // }
    }

    if (empty($_POST["features"])) {
        $featuresErr = "Features is required";
    } else {
        $features = test($_POST["features"]);
    }

    if (empty($_POST["imageurl"])) {
        $imageurlErr = "You have not entered the image path";
    } else {
        $imageurl = $_POST["imageurl"];
        if (!preg_match("/^[\.\/a-zA-Z0-9\/]*[a-zA-Z0-9]*$/", $imageurl)) {
            $imageurlErr = "Invalid image url";
        }
    }

    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="/CSS/header.css" type="text/css">
    <link rel="stylesheet" href="./CSS/admin.css" type="text/css">
</head>

<body>
    <header><?php include "header.php"; ?></header>
    <div>
        <h1>The Admin Page</h1>
    </div>
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="make">Make:</label> <br>
            <input type="text" id="make" name="make"> <br>
            <span class="error"><?php echo $makeErr; ?></span>
            <br>
        </div>
        <div>
            <label for="model">Model:</label> <br>
            <input type="text" id="model" name="model"> <br>
            <span class="error"><?php echo $modelErr; ?></span>
            <br>
        </div>
        <div>
            <label for="year">Year:</label> <br>
            <input type="number" id="year" name="year"> <br>
            <span class="error"><?php echo $yearErr; ?></span>
            <br>
        </div>
        <div>
            <label for="year">Date added:</label> <br>
            <input type="date" id="date" name="date"> <br>
            <span class="error"><?php echo $dateErr; ?></span>
            <br>
        </div>
        <div>
            <label for="price">Price:</label> <br>
            <input type="number" id="price" name="price" step="0.01"> <br>
            <span class="error"><?php echo $priceErr; ?></span>
            <br>
        </div>
        <div>
            <label for="color">Color:</label> <br>
            <input type="text" id="color" name="color"> <br>
            <span class="error"><?php echo $colorErr; ?></span>
            <br>
        </div>
        <div>
            <label for="mileage">Mileage:</label> <br>
            <input type="number" id="mileage" name="mileage"> <br>
            <span class="error"><?php echo $mileageErr; ?></span>
            <br>
        </div>
        <div>
            <label for="fuel_type">Fuel Type:</label> <br>
            <input type="text" id="fuel_type" name="fuel_type"> <br>
            <span class="error"><?php echo $fuelErr; ?></span>
            <br>
        </div>
        <div>
            <label for="transmission">Transmission:</label> <br>
            <input type="text" id="transmission" name="transmission"> <br>
            <span class="error"><?php echo $transmissionErr; ?></span>
            <br>
        </div>
        <div>
            <label for="location">Location: </label> <br>
            <input type="text" id="location" name="location"><br>
            <span class="error"><?php echo $locationErr; ?></span>
            <br>
        </div>
        <div>
            <label for="engine_stats">Engine Stats:</label> <br>
            <input type="text" id="engine_stats" name="engine_stats"><br>
            <span class="error"><?php echo $engineErr; ?></span>
            <br>
        </div>
        <div>
            <label for="features">Features:</label> <br>
            <textarea id="features" name="features" maxlength="250"></textarea><br>
            <span class="error"><?php echo $featuresErr; ?></span>
            <br><br>
        </div>
        <div>
            <label for="imageurl">Image URL:</label> <br>
            <input type="text" id="imageurl" name="imageurl">
            <br>
            <span class="error"><?php echo $imageurlErr; ?></span>
            <br>
            <input id="submit" type="submit" value="+ Add">
        </div>
    </form> <?php
    $query = $conn->prepare("INSERT INTO cars(make, model, year, date_added, color, engine, transmission, mileage, price, location, features, fuel, imageurl) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);");
    $query->bind_param("ssisdsissssss", $make, $model, $year, $date, $color, $engine, $transmission, $mileage, $price, $location, $features, $fuel, $imageurl);
    $query->execute();
    ?>
</body>

</html>