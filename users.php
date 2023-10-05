<?php 

$title = 'User Page';

include('includes/header.php') 

?>

    <!-- Start User Table -->
    <div class="container">

        <h1 class="text-center text-success m-5">Users Table</h1>

        <table class="table table-striped">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($users as $key => $user): ?>
                    <tr>
                        <th scope="row">
                            <?php echo $user['id']; ?>
                        </th>
                        <td>
                            <?php echo $user['name']; ?>
                        </td>
                        <td>
                            <?php echo $user['email']; ?>
                        </td>
                        <td>
                            <?php echo $user['phone']; ?>
                        </td>
                        <td>
                            <?php echo $user['address']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
    <!-- End User Table -->

<?php include('includes/footer.php') ?>