<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        width: 100%;
        margin: 2%;
        background-color: aliceblue;
        font-weight: bold;
    }

    label,
    input {
        width: 90%;
        margin: 2%;
        font-size: larger;

    }

    input {
        border-style: solid;
    }
</style>

<body>
    <div>
        <form method="post">

            <label for="id">Enter ID</label>
            <input required type="text" name="id">

            <input name="submit"
                style="font-size:x-large; background: linear-gradient(90deg, #020024 0%, #340979 37%, #00d4ff 94%);"
                type="submit" value="Delete Row">
        </form>
    </div>

</body>
<?php
include 'db-config.php';
if (isset($_POST['submit'])) {
    $id = $_POST["id"];
    $check = "SELECT `id` FROM `post`";
    $result1 = mysqli_query($conn, $check);
    $num=$result1->num_rows;
    for($i=0; $i<$num; $i++) {
        $arr = mysqli_fetch_assoc($result1);
        if ($arr['id'] == $id) {
            $delete_sql = "DELETE FROM `post` WHERE id='$id'";
            if (mysqli_query($conn, $delete_sql)) {
                header("Location: show.php", true, 301);
            } else {
                echo "<script>alert('Insert valid id ')</script>";
            }
            echo "</div>";

        }

    }
    echo "<script>alert('Insert valid ID ')</script>";





}

?>


</html>