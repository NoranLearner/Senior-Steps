<?php

$allError = $salutationError = $firstNameError = $lastNameError = $genderError = $emailError = $birthDateError = $addressError= "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $salutation = $_GET['salutation'];
    $firstName = $_GET['first_name'];
    $lastName = $_GET['last_name'];
    $gender = $_GET['gender'];
    $email = $_GET['email'];
    $birthDate = $_GET['birth_date'];
    $address = $_GET['address'];
    
    if (empty($salutation) && empty($firstName) && empty($lastName) && empty($gender) && empty($email) && empty($birthDate) && empty($address)) {
        $allError = "Enter Valid Data In Form";
    } elseif (empty($salutation)) {
        $salutationError = "Salutation Is Required";
    } elseif (empty($firstName)) {
        $firstNameError = "First Name Is Required";
    } elseif (empty($lastName)) {
        $lastNameError = "Last Name Is Required";
    } elseif (empty($gender)) {
        $genderError = "Gender Is Required";
    } elseif (empty($email)) {
        $emailError = "Email Is Required";
    } elseif (empty($birthDate)) {
        $birthDateError = "Birth Date Is Required";
    } elseif (empty($address)) {
        $addressError = "Address Is Required";
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

        <form method="get" action=" <?php echo $_SERVER['PHP_SELF'];?> ">

            <h4 class="error text-center"> <?php echo $allError;?> </h4>

            <div class="caption mb-3">Personal Details</div>

            <div class="row mb-3">
                <label for="inputSalutation" class="col-sm-2 col-form-label">Salutation:</label>
                <div class="col-sm-10">
                    <select id="inputSalutation" class="form-select" name="salutation">
                        <option selected>--None--</option>
                        <option>Salutation One</option>
                        <option>Salutation Two</option>
                        <option>Salutation Three</option>
                    </select>
                </div>
                <p class="error text-center"> <?php echo $salutationError; ?> </p>
            </div>

            <div class="row mb-3">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputFirstName" name="first_name">
                </div>
                <p class="error text-center"> <?php echo $firstNameError; ?> </p>
            </div>

            <div class="row mb-3">
                <label for="inputLastName" class="col-sm-2 col-form-label">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLastName" name="last_name">
                </div>
                <p class="error text-center"> <?php echo $lastNameError; ?> </p>
            </div>

            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Gender:</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="gridRadios1" value="option1" name="gender">
                        <label class="form-check-label" for="gridRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="gridRadios2" value="option2" name="gender">
                        <label class="form-check-label" for="gridRadios2">
                            Female
                        </label>
                    </div>
                </div>
                <p class="error text-center"> <?php echo $genderError; ?> </p>
            </fieldset>

            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email">
                </div>
                <p class="error text-center"> <?php echo $emailError; ?> </p>
            </div>

            <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth:</label>
                <div class="col-sm-10">
                    <!-- <input type="email" class="form-control" id="inputDate"> -->
                    <input type="date" class="form-control" id="inputDate" placeholder="MM/DD/YYY" name="birth_date">
                </div>
                <p class="error text-center"> <?php echo $birthDateError; ?> </p>
            </div>

            <div class="row mb-3">
                <label for="inputAddress" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="inputAddress" rows="3" name="address"></textarea>
                </div>
                <p class="error text-center"> <?php echo $addressError; ?> </p>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>