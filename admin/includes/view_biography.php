<?php 

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM `about_section` WHERE id = {$the_user_id}";
    $delete_about = mysqli_query($conn, $query);
    confirm($delete_about);
    $_SESSION["SuccessMessage"] = "Successfully Deleted!";
    // header("Location: about.php?source=view_biography");
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <?php echo successMessage();?>
            <h1>Biography</h1>
            <hr>
            <table class="table table-bordered table-hover table-reponsive{-sm|-md|-lg|-xl} w-auto" id="myTable">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Subtitle</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Degree</th>
                        <th>Phone</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php 
                    $query = "SELECT * FROM `about_section` ORDER BY `id` DESC";
                    $user_query = mysqli_query($conn, $query);
                    confirm($user_query);
                    foreach($user_query as $data){
                        $about_id       = test_input($data['id']);
                        $about_name     = test_input($data['name']);
                        $about_subtitle = test_input($data['subtitle']);
                        $about_email    = test_input($data['email']);
                        $about_address  = test_input($data['address']);
                        $about_degree   = test_input($data['degree']);
                        $about_phone    = test_input($data['phone']);

                        if(strlen($about_subtitle) > 50 ){
                            $about_subtitle = substr($about_subtitle, 0, 50) . '...';
                        }
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $about_id;?></td>
                        <td><?php echo $about_name;?></td>
                        <td><?php echo $about_subtitle;?></td>
                        <td><?php echo $about_email;?></a></td>
                        <td><?php echo $about_address;?></a></td>
                        <td><?php echo $about_degree;?></a></td>
                        <td><?php echo $about_phone;?></a></td>
                        <td class="text-center"><a href="about.php?source=edit_about&edit=<?php echo $about_id;?>"><i class="fas fa-edit text-primary"></i></a></td>
                        <td class="text-center"><a href="about.php?delete=<?php echo $about_id;?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                    </tr>
                </tbody>
                <?php };?>
            </table>
            <hr>
        </div>
    </div><!-- Content Row -->
</div>

