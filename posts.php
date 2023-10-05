<?php 

$title = 'Post Page';

include('includes/header.php') 

?>

    <!-- Start Post Table -->
    <div class="container">

        <h1 class="text-center text-warning m-5">Posts Table</h1>

        <table class="table table-striped">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Written By</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($posts as $key => $post): ?>
                    <tr>
                        <th scope="row">
                            <?php echo $post['id']; ?>
                        </th>
                        <td>
                            <?php echo $post['title']; ?>
                        </td>
                        <td>
                            <?php echo $post['description']; ?>
                        </td>
                        <td>
                            <?php echo $post['written-by']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
    <!-- End Post Table -->

<?php include('includes/footer.php') ?>