<?php

session_start();

$username = '';
$email = '';
$profile_image = '';
// $role_admin = '';
// $role_user = '';
$password = '';
$confirm_password = '';

$all_errors = [];
$userNameErr = '';
$emailErr = '';
$profileImageErr = '';
$roleErr = '';
$passwordErr = '';
$confirmPasswordErr = '';

$flag = 0;

$allowed_ext = ['png', 'jpg', 'jpeg'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // if (isset($_POST['username']) && isset($_POST['email']) && isset($_FILES['profile_image']) && isset($_POST['role']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

        // ----------- Start User Name ------------- //

        if (!empty($_POST['username'])) {

            $username = test_input($_POST['username']);

            if (strlen($username) >= 5 && strlen($username) <= 20) {

                if (preg_match('/^[A-Za-z0-9_]+$/', $username)) {

                    $flag++;

                    $_SESSION['username'] = $username;

                } else {
                    $all_errors['username_expression'] = 'Username can only contain letters, numbers, and underscores.';
                    $userNameErr = 'Username can only contain letters, numbers, and underscores.';
                }
            } else {
                $all_errors['username_length'] = 'Username must be between 5 and 20 characters long.';
                $userNameErr = 'Username must be between 5 and 20 characters long.';
            }
        } else {
            $all_errors['username_empty'] = 'Username cannot be empty.';
            $userNameErr = 'Username cannot be empty.';
        }

        // ----------- End User Name ------------- //


        // ----------- Start Email ------------- //

        if (!empty($_POST['email'])) {

            $email = test_input($_POST['email']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $flag++;

                $_SESSION['email'] = $email;

            } else {
                $all_errors['email_format'] = 'Invalid email format.';
                $emailErr = 'Invalid email format.';
            }
        } else {
            $all_errors['email_empty'] = 'Email cannot be empty.';
            $emailErr = 'Email cannot be empty.';
        }

        // ----------- End Email ------------- //


        // ----------- Start Profile Image ------------- //

        // sudo chmod 777 -R /opt/lampp/htdocs/exam_1

        if ($_FILES['profile_image']['error'] != 4) {

            $profile_image = $_FILES['profile_image'];

            $profile_image_name = uniqid() . $profile_image['name'];

            $profile_image_tmp = $profile_image['tmp_name'];

            $profile_image_size = $profile_image['size'];

            $profile_image_ext = explode('.', $profile_image_name);

            $img_f_ext = end($profile_image_ext);

            $ext = strtolower($img_f_ext);

            if ($profile_image_size < 2097152) {

                if (in_array($ext, $allowed_ext)) {

                    move_uploaded_file($profile_image_tmp, 'uploads/profile/' . $profile_image_name);

                    $flag++;

                    $_SESSION['profile_image_name'] = $profile_image_name;

                } else {
                    $all_errors['image_type'] = 'Invalid image type. Only JPEG, PNG, and JPG are allowed.';
                    $profileImageErr = 'Invalid image type. Only JPEG, PNG, and JPG are allowed.';
                }

            } else {
                $all_errors['image_size'] = 'Image is too large. Maximum size is 1.5 megabytes.';
                $profileImageErr = 'Image is too large. Maximum size is 1.5 megabytes.';
            }

        } else {
            $all_errors['image_upload'] = 'Error uploading image.';
            $profileImageErr = 'Error uploading image.';
        }

        // ----------- End Profile Image ------------- //


        // ----------- Start Role ------------- //

        if (!empty($_POST['role_admin']) || !empty($_POST['role_user'])) {

            $flag++;

            if (!empty($_POST['role_admin'])) {
                $_SESSION['role_admin'] = 'admin';
            }

            if (!empty($_POST['role_user'])) {
                $_SESSION['role_user'] = 'user';
            }

        } else {
            $all_errors['role_empty'] = 'Must Check on Role cannot be empty.';
            $roleErr = 'Must Check on Role cannot be empty.';
        }

        // ----------- End Role ------------- //


        // ----------- Start Password ------------- //

        if (!empty($_POST['password'])) {

            $password = test_input($_POST['password']);

            if (strlen($password) >= 8) {

                if (preg_match('/^[A-Za-z0-9_]+$/', $password)) {

                    $flag++;

                    $_SESSION['password'] = $password;

                } else {
                    $all_errors['password_expression'] = 'Password can only contain letters, numbers, and underscores.';
                    $passwordErr = 'Password can only contain letters, numbers, and underscores.';
                }

            } else {
                $all_errors['password_length'] = 'Password must be at least 8 characters long.';
                $passwordErr = 'Password must be at least 8 characters long.';
            }

        } else {
            $all_errors['password_empty'] = 'Password cannot be empty.';
            $passwordErr = 'Password cannot be empty.';
        }

        // ----------- End Password ------------- //


        // ----------- Start Confirm Password ------------- //

        if (!empty($_POST['confirm_password'])) {

            $confirm_password = test_input($_POST['confirm_password']);

            if ($confirm_password == $password) {

                $flag++;

            } else {
                $all_errors['confirm_password_match'] = 'Passwords do not match.';
                $confirmPasswordErr = 'Passwords do not match.';
            }

        } else {
            $all_errors['confirm_password_empty'] = 'Confirm Password cannot be empty.';
            $confirmPasswordErr = 'Confirm Password cannot be empty.';
        }

        // ----------- End Confirm Password ------------- //


        // ----------- If Not Error ------------- //

        if (empty($all_errors) && $flag == 6) {
            header('location:login.php');
        }
        // ----------- If Not Error ------------- //

    // }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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

        <!-- For Appear Errors -->
        <?php if(!empty($all_errors)): ?>
        <?php foreach($all_errors as $error): ?>
        <div class="alert alert-danger mt-3">
            <?= $error ?>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>


        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <!-- For User Name -->
            <div class="mt-3">
                <label for="exampleInputName" class="form-label">UserName</label>
                <input type="text" class="form-control" id="exampleInputName" name="username">
                <span class="text-danger"> <?= $userNameErr; ?> </span>
            </div>
            <!-- For Email -->
            <div class="mt-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email">
                <span class="text-danger"> <?= $emailErr;?> </span>
            </div>
            <!-- For Profile Image -->
            <div class="mt-3">
                <label for="formFile" class="form-label">Profile Image</label>
                <input class="form-control" type="file" id="formFile" name="profile_image">
                <span class="text-danger"> <?= $profileImageErr;?> </span>
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
            <span class="text-danger"> <?= $roleErr;?> </span>
            <!-- For Password -->
            <div class="mt-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="password">
                <span class="text-danger"> <?= $passwordErr;?> </span>
            </div>
            <!-- For Confirm Password -->
            <div class="mt-3">
                <label for="exampleInputConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputConfirmPassword" name="confirm_password">
                <span class="text-danger"> <?= $confirmPasswordErr;?> </span>
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