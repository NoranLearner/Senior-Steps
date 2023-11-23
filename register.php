<?php 

require_once "config.php";

// var_dump($my_connection);

// $query = "INSERT INTO users ( username , email , password , type , gender) VALUES ('$_POST[name]' , '$_POST[email]', '$_POST[pass]' , '$_POST[type]', '$_POST[gender]') ";

$query = "INSERT INTO users ( username , email , password , type) VALUES ('$_POST[name]' , '$_POST[email]', '$_POST[pass]' , '$_POST[type]') ";

// $query = "INSERT INTO users ( username , email , password , type) VALUES ('nn', 'nn@gmail.com', '1234', '')";

// var_dump($query);

$ex = mysqli_query($my_connection, $query);

// header('location:users.php');

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

    <div class="container">

        <form method="post">

            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="pass">
            </div>

            <div class="mb-3">
                <label for="exampleInputType" class="form-label">Type</label>
                <input type="text" class="form-control" id="exampleInputType" name="type">
            </div>

            <!-- <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1"> Male </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2"> Female </label>
            </div> -->

            <button type="submit" class="btn btn-primary">Add</button>

        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>