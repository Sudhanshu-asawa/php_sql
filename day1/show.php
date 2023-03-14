<?php
include 'db-config.php';
$columns = ['id', 'PostTitle', 'PostDescription'];
$fetchData = fetch_data($conn, $tbname, $columns);
function fetch_data($conn, $tbname, $columns)
{
    $columnName = implode(", ", $columns);
    $query = "SELECT " . $columnName . " FROM $tbname" . " ORDER BY id";
    $result = $conn->query($query);
    if ($result == true) {
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $msg = $row;
        } else {
            $msg = "No Data Found";
        }
    } else {
        $msg = mysqli_error($conn);
    }

    return $msg;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body{
        background-color: aliceblue;
    }
    .col-sm-8 {
        margin: 8% 0% 0% 15%;
    }
</style>

<body>

    <div class="col-sm-8">
        <h1>Post Table Records</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Post Title</th>
                    <th>Post Description</th>
            </thead>
            <tbody>
                <?php
                if (is_array($fetchData)) {
                    foreach ($fetchData as $data) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $data['id']; ?>
                            </td>
                            <td>
                                <?php echo $data['PostTitle'] ?? ''; ?>
                            </td>
                            <td>
                                <?php echo $data['PostDescription'] ?? ''; ?>
                            </td>
                        </tr>
                        <?php

                    }
                } ?>
            </tbody>
        </table>
        <a href="home.php">Back To Home</a>

    </div>

</body>

</html>