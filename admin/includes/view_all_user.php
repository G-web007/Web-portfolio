<?php 

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM `user` WHERE id = {$the_user_id}";
    $delete_user = mysqli_query($conn, $query);
    confirm($delete_user);
    $_SESSION['SuccessMessage'] = "Successfully Deleted!";
    // header("Location: user.php?source=view_all_user");
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <?php echo successMessage();?>
            <div class="card">
                <h5 class="card-header bg-primary text-white">All Users</h5>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Image</th>
                                <th>File</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php 
                            $query = "SELECT * FROM user ORDER BY `id` DESC";
                            $user_query = mysqli_query($conn, $query);
                            confirm($user_query);
                            foreach($user_query as $data){
                                $user_id       = test_input($data['id']);
                                $user_name     = test_input($data['name']);
                                $user_position = test_input($data['title']);
                                $user_image    = test_input($data['image']);
                                $user_file     = test_input($data['link']);
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $user_id;?></td>
                                <td><?php echo $user_name;?></td>
                                <td><?php echo $user_position;?></td>
                                <td><img src="../images/<?php echo $user_image;?>" class="rounded mx-auto d-block" alt="" width="50"></td>
                                <td><?php echo $user_file;?></a></td>
                                <td class="text-center"><a href="user.php?source=edit_user&edit=<?php echo $user_id;?>"><i class="fas fa-edit text-primary"></i></a></td>
                                <td class="text-center"><a href="user.php?delete=<?php echo $user_id;?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                            </tr>
                        </tbody>
                        <?php };?>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>