<?php

$allError = $nameError = $passwordError = $cityError = $serverError = $roleError = $signUpError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST["user_name"];

    $password = $_POST["pass"];

    $city = $_POST["city"];

    $server = $_POST["server"];

    $role = $_POST["role"];

    $signUp = $_POST["sign_up"];

    if (empty($name) && empty($password) && empty($city) && empty($server) && empty($role) && empty($signUp)) {
        $allError = "Enter Valid Data In Form";
    } elseif (empty($name)) {
        $nameError = "User Name Is Required";
    } elseif (empty($password)) {
        $passwordError = "Password Is Required";
    } elseif (empty($city)) {
        $cityError = "City Is Required";
    } elseif (empty($server)){
        $serverError = "Server Is Required";
    } elseif(empty($role)){
        $roleError = "Role Is Required";
    } elseif (empty($signUp)) {
        $signUpError = "Sign Up Is Required";
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

        <form method="post" action=" <?php echo $_SERVER['PHP_SELF'];?> ">

            <h4 class="error text-center"> <?php echo $allError;?> </h4>

            <div class="row mb-3">
                <label for="inputName" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="user_name">
                </div>
                <p class="error text-center"> <?php echo $nameError; ?> </p>
            </div>

            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="pass">
                </div>
                <p class="error text-center"> <?php echo $passwordError; ?> </p>
            </div>

            <div class="row mb-3">
                <label for="inputCity" class="col-sm-2 col-form-label">City Of Employment:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCity" name="city">
                </div>
                <p class="error text-center"> <?php echo $cityError; ?> </p>
            </div>

            <div class="row mb-3">
                <label for="inputServer" class="col-sm-2 col-form-label">Web Server:</label>
                <div class="col-sm-10">
                    <select id="inputServer" class="form-select" name="server">
                        <option selected>--Choose a server--</option>
                        <option>Server One</option>
                        <option>Server Two</option>
                        <option>Server Three</option>
                    </select>
                </div>
                <p class="error text-center"> <?php echo $serverError; ?> </p>
            </div>

            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Please Specify Your Role:</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="gridRadios1" value="option1" name="role">
                        <label class="form-check-label" for="gridRadios1">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="gridRadios2" value="option2" name="role">
                        <label class="form-check-label" for="gridRadios2">
                            Engineer
                        </label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" id="gridRadios3" value="option3" name="role">
                        <label class="form-check-label" for="gridRadios3">
                            Manager
                        </label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" id="gridRadios4" value="option4" name="role">
                        <label class="form-check-label" for="gridRadios4">
                            Guest
                        </label>
                    </div>
                </div>
                <p class="error text-center"> <?php echo $roleError; ?> </p>
            </fieldset>

            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Single Sign-On To The Following:</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="sign_up">
                        <label class="form-check-label" for="gridCheck1">
                            Mail
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="sign_up">
                        <label class="form-check-label" for="gridCheck1">
                            Payroll
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="sign_up">
                        <label class="form-check-label" for="gridCheck1">
                            Self-Service
                        </label>
                    </div>
                </div>
                <p class="error text-center"> <?php echo $signUpError; ?> </p>
            </fieldset>


            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login</button>
                &nbsp;
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>