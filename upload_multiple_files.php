<?php
// var_dump($_POST);
var_dump($_FILES);
$all_errors = [];
$allowed_ext = ['png', 'jpg', 'jpeg'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['my_images'])) {

        $count = count($_FILES['my_images']['size']);

        if ($_FILES['my_images']['error'][0] != 4) {

            $my_imgs = $_FILES['my_images'];
            $doc_root = $_SERVER['DOCUMENT_ROOT'] . '/task_7/uploads/';

            for ($i = 0; $i < $count; $i++) {

                $img_name = uniqid() . $my_imgs['name'][$i];
                $img_tmp = $my_imgs['tmp_name'][$i];
                $img_size = $my_imgs['size'][$i];

                $img_ext = explode('.', $img_name);
                $img_f_ext = end($img_ext);
                $ext = strtolower($img_f_ext);

                if ($img_size < 2097152) {

                    if (in_array($ext, $allowed_ext)) {

                        // move_uploaded_file($img_tmp, $doc_root.'profiles' . $img_name);
                        
                        move_uploaded_file($img_tmp, $img_name);

                    } else {
                        $all_errors["f_ext$i"] = 'Please Upload File Type png, jpg , jpeg';
                    }

                } else {
                    $all_errors["f_size$i"] = 'Please Upload Files Max 2 mega';
                }

            }

        } else {
            $all_errors['f_exist'] = 'Please Choose Files';
        }

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
</head>

<body>

    <div class="container">

        <?php if (!empty($all_errors)): ?>
            <?php foreach ($all_errors as $error): ?>
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <label class="form-label mt-4" for="customFile">Select image to upload:</label>
            <input type="file" name="my_images[]" class="form-control" id="customFile" multiple />
            <input type="submit" value="Upload Image" name="submit" class="mt-4">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>