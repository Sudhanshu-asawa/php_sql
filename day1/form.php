<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <style>
        body {
            width: 100%
        }

        p {
            width: 450px;
            text-align: center;
            color: #ffffff;
            font-size: 40px;
            padding: 2%;
            background: linear-gradient(90deg, #020024 0%, #340979 37%, #00d4ff 94%);

        }

        div {

            margin: 10% 0% 0% 30%;
        }
    </style>

</body>

</html>


<?php
$dbname="userinfo";
$conn = mysqli_connect("localhost", "admin", "admin");

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
} else {
    $createdb = "CREATE DATABASE IF NOT EXISTS `userinfo` ";
    $usedatabase = "USE userinfo";
    $createtb = "CREATE TABLE IF NOT EXISTS `admininfo`(`id` INT(6) PRIMARY KEY, `username` VARCHAR(15), `password` VARCHAR(15))";
    $inserttb = "INSERT INTO `admininfo`(`id`,`username`,`password` ) VALUES ('1','admin','admin')";
    if (mysqli_query($conn, $createdb)) {
        echo "Database created ";
        if (mysqli_query($conn, $usedatabase)) {
            mysqli_select_db($conn,$dbname);
            mysqli_query($conn, $createtb);
            echo "Table Created ";
            if (mysqli_query($conn, $inserttb)) {
                echo "table data inserted ";
            } else {
                echo "Table data not inserted";
            }

        } else {
            echo "Table not created";

        }

    } else {
        echo "Database not created";
    }
    $username=$_POST["username"];
    $password=$_POST["password"];


    $query = "SELECT `username`,`password` FROM admininfo ";
    $result = mysqli_query($conn, $query);
    echo "<div>";
    $pass = false;
    $user = False;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["username"] == $username) {
                $user = true;
                if ($row["password"] == $password) {
                    $pass = true;

                    break;
                }
            }
        }
    }
    if ($user) {
        if ($pass) {
            header("Location: home.php", true, 301);
        } else {
            echo "<p>Invalid Password</p> ";
        }
    } else {
        echo "<p>Invalid Username</p> ";
    }
    echo "</div>";
}


mysqli_close($conn);
?>