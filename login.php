<?php

session_start();

$userNameErr = '';
$emailErr = '';
$roleErr = '';
$passwordErr = '';

var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ----------- Start User Name ------------- //
    if (empty($_POST['username'])) {
        $userNameErr = 'Username cannot be empty.';
    }
    // ----------- End User Name ------------- //

    // ----------- Start Email ------------- //
    if (empty($_POST['email'])) {
        $emailErr = 'Email cannot be empty.';
    }
    // ----------- End Email ------------- //

    // ----------- Start Role ------------- //
    if (empty($_POST['role_admin']) && empty($_POST['role_user'])) {
        $roleErr = 'Must Check on Role cannot be empty.';
    }
    // ----------- End Role ------------- //

    // ----------- Start Password ------------- //
    if (empty($_POST['password'])) {
        $passwordErr = 'Password cannot be empty.';
    }
    // ----------- End Password ------------- //

    if ($_POST['username'] == $_SESSION['username'] || $_POST['email'] == $_SESSION['email']) {

        if ($_POST['password'] == $_SESSION['password']) {

            if (isset($_SESSION['role_admin']) && isset($_SESSION['role_user'])) {
                header('location:dashboard.php');
            } else {
                header('location:front.php');
            }

        } else {
            $passwordErr = 'You entered incorrect password';
        }

    } else {
        $userNameErr = 'You entered incorrect username';
        $emailErr = 'You entered incorrect email';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="mt-3">
            <?php if (!isset($_SESSION['username']) || !isset($_SESSION['email'])): ?>
                <a href="register.php" class="btn btn-success">Register</a>
                <a href="login.php" class="btn btn-secondary">Login</a>
            <?php else: ?>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            <?php endif; ?>
        </div>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <!-- For User Name -->
            <div class="mt-3">
                <label for="exampleInputName" class="form-label">UserName</label>
                <input type="text" class="form-control" id="exampleInputName" name="username">
                <span class="text-danger">
                    <?= $userNameErr; ?>
                </span>
            </div>

            <!-- For Email -->
            <div class="mt-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email">
                <span class="text-danger">
                    <?= $emailErr; ?>
                </span>
            </div>

            <!-- For Role -->
            <div class="form-check mt-3">
                <input class="form-check-input" type="radio" name="role_admin" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1"> Admin </label>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="radio" name="role_user" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2"> User </label>
            </div>
            <span class="text-danger">
                <?= $roleErr; ?>
            </span>

            <!-- For Password -->
            <div class="mt-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="password">
                <span class="text-danger">
                    <?= $passwordErr; ?>
                </span>
            </div>

            <!-- For Submit -->
            <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>