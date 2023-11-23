<?php

require_once "config.php";

$allEmployees = 'SELECT * FROM `employees`';

$execute = mysqli_query($my_connection, $allEmployees);

$row = mysqli_fetch_assoc($execute);

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
                <th scope="col">Employee Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Hire Date</th>
                <th scope="col">Salary</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($execute)): ?>
                <tr>
                    <th scope="row">
                        <?= $row['employee_id'] ?>
                    </th>
                    <td>
                        <?= $row['first_name'] ?>
                    </td>
                    <td>
                        <?= $row['last_name'] ?>
                    </td>
                    <td>
                        <?= $row['email'] ?>
                    </td>
                    <td>
                        <?= $row['phone_number'] ?>
                    </td>
                    <td>
                        <?= $row['hire_date'] ?>
                    </td>
                    <td>
                        <?= $row['salary'] ?>
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