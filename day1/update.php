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
        <form action="" method="post">

            <label for="id">Enter ID</label>
            <input required type="text" name="id">
            <label for="posttitle">Enter Post Title</label>
            <input type="text" name="updatetitle">
            <label for="postdes">Enter Post Description</label>
            <input type="text" name="updatedes">
            <input name='submit'
                style="font-size:x-large; background: linear-gradient(90deg, #020024 0%, #340979 37%, #00d4ff 94%);"
                type="submit" value="Update Table">
        </form>
    </div>

</body>
<?php


include 'db-config.php';
if (isset($_POST['submit'])) {


    $updatetitle = $_POST["updatetitle"];
    $updatedes = $_POST["updatedes"];
    $id = $_POST["id"];
    $check = "SELECT `id` FROM `post`";
    $result1 = mysqli_query($conn, $check);
    $num = $result1->num_rows;
    for ($i = 0; $i < $num; $i++) {
        $arr = mysqli_fetch_assoc($result1);
        if ($arr['id'] == $id) {
            if ($updatedes != null) {
                $des_sql = "UPDATE post SET PostDescription='$updatedes' WHERE id='$id'";
                mysqli_query($conn, $des_sql);
            }
            if ($updatetitle != null) {
                $title_sql = "UPDATE post SET PostTitle='$updatetitle' WHERE id='$id'";
                mysqli_query($conn, $title_sql);
            }
            if ($updatedes == null && $updatetitle == null) {
                echo "<script>alert('Enter any field to update')</script>";
                exit;
            }
            header('location: show.php', true, 301);
        }
    }
    echo "<script>alert('Insert valid ID ')</script>";

}

?>

</html>