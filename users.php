<?php

require_once "config.php";

// var_dump($my_connection);

$allUsers = 'SELECT * FROM `users`';

// var_dump($allUsers);

$execute2 = mysqli_query($my_connection, $allUsers);

// var_dump($execute2);

// $row = mysqli_fetch_assoc($execute2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Type</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($execute2)): ?>
                <tr>
                    <th scope="row">
                        <?= $row['id'] ?>
                    </th>
                    <td>
                        <?= $row['username'] ?>
                    </td>
                    <td>
                        <?= $row['email'] ?>
                    </td>
                    <td>
                        <?= $row['password'] ?>
                    </td>
                    <td>
                        <?= $row['type'] ?>
                    </td>
                    <td>
                        <?= $row['gender'] ?>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>