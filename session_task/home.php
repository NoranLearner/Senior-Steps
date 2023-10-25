<?php

session_start();

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

    <?php if (!isset($_SESSION['user_email']) ) :?>

    <a class="btn btn-outline-success" href="register.php">Register</a>

    <a class="btn btn-outline-info" href="login.php">Login</a>

    <?php else:?>

    <a class="btn btn-outline-danger" href="logout.php">Logout</a>

    <?php endif;?>

    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['user_email']) && isset($_SESSION['user_password'])) :?>
        <h3>UserName : <?= $_SESSION['user_name']?></h3>
        <h3>UserEmail : <?= $_SESSION['user_email']?></h3>
        <h3>UserPassword : <?= $_SESSION['user_password']?></h3>
    <?php elseif(isset($_SESSION['user_email']) && isset($_SESSION['user_password'])): ?>
        <h3>UserEmail : <?= $_SESSION['user_email']?></h3>
        <h3>UserPassword : <?= $_SESSION['user_password']?></h3>
    <?php else:?>
        <h3>Please Enter User Date</h3>
        <?php header("Refresh:3; url=login.php"); ?>
    <?php endif;?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>