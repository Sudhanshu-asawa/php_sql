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

    h1 {
        width: 90%;
        margin: 2%;
        font-family: 'Times New Roman', Times, serif;

    }
</style>

<body>
    <div>

        <form  method="post">
            <h1>Admin Details Form</h1>

            <label for="id">Enter ID</label>
            <input required type="text" name="id">
            <label for="posttitle">Enter Post Title</label>
            <input required type="text" name="posttitle">
            <label for="postdes">Enter Post Description</label>
            <input required type="text" name="postdes">
            <input
                style="font-size:x-large; background: linear-gradient(90deg, #020024 0%, #340979 37%, #00d4ff 94%); color: white;"
                type="submit" name="submit" value="Insert Values in Table">
        </form>
    </div>

</body>

<?php
include 'db-config.php';
if (isset($_POST['submit'])) {


    
    $id = $_POST["id"];
    $posttitle = $_POST["posttitle"];
    $postdes = $_POST["postdes"];
    //Insert data into the table
    $inserttb = "INSERT INTO `$tbname`(`id`,`PostTitle`,`PostDescription`) VALUES ('$id','$posttitle','$postdes')";
    if (mysqli_query($conn, $inserttb)) {
        header("Location: home.php", true, 301);
    } else {
        echo "<script>alert('Insert valid ID into table')</script>";
    }
    echo "</div>";
}

?>

</html>