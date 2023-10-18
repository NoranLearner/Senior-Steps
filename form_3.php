<?php

$allError = $nameError = $passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $name = $_GET["user_name"];

    $password = $_GET["pass"];

    if (empty($name) && empty($password)) {
        $allError = "Enter Valid Data In Form";
    } elseif (empty($name)) {
        $nameError = "User Name Is Required";
    } elseif (empty($password)) {
        $passwordError = "Password Is Required";
    } else{
        header("Location:home.php");
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .error{
            color: #ff0000;
        }
    </style>

</head>

<body>

    <div class="container mt-4">

        <h3 class="text-center">Login</h3>

        <form method="get" action=" <?php echo $_SERVER['PHP_SELF'];?> ">

            <h4 class="error text-center"> <?php echo $allError;?> </h4>

            <div class="mb-3">
                <label for="formGroupExampleInput1" class="form-label">Username:</label>
                <input type="text" class="form-control" id="formGroupExampleInput1" name="user_name">
                <p class="error text-center"> <?php echo $nameError; ?> </p>
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password:</label>
                <input type="password" class="form-control" id="formGroupExampleInput2" name="pass">
                <p class="error text-center"> <?php echo $passwordError; ?> </p>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>