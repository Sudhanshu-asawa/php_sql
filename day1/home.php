
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <style>
        body {
            width: 100% ;
            background-color: aliceblue;
        }

        p {
            width: 450px;
            text-align: center;
            color: #ffffff;
            font-size: 20px;
            padding: 2%;
            background: linear-gradient(90deg, #020024 0%, #340979 37%, #00d4ff 94%);

        }

        div {

            margin: 10% 0% 0% 14%;
        }

        input {
            width: 22%;
            margin-left: 2%;
            display: inline-block;
            text-align: center;
            color: #ffffff;
            font-size: 20px;
            padding: 2%;

            background: linear-gradient(90deg, #020024 0%, #340979 37%, #00d4ff 94%);
        }

        .form {
            width: 70%;
        }
    </style>

    <div class="form">
        <form id="myform" method="post" >
            <input type="submit" value="Show Table" onclick="document.forms['myform'].action='show.php'">
            <input type="submit" value="Update Table" onclick="document.forms['myform'].action='update.php'">
            <input type="submit" value="Delete Rows" onclick="document.forms['myform'].action='delete.php'">
            <input type="submit" value="Insert Rows" onclick="document.forms['myform'].action='insert.php'">

        </form>
    </div>

</body>

</html>