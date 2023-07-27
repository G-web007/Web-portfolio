<?php 

if(isset($_POST['submit'])){
    $user_name       = test_input(ucwords($_POST['name']));
    $user_position   = test_input(ucwords($_POST['position']));
    $user_image      = $_FILES["image"]["name"];
    $user_image_temp = $_FILES["image"]["tmp_name"];
    $user_file       = $_FILES["file"]["name"];
    $user_file_temp  = $_FILES["file"]["tmp_name"];

    if(!empty($user_name) && !empty($user_position) && !empty($user_image) && !empty($user_file)){
        move_uploaded_file($user_image_temp, "../images/$user_image");
        move_uploaded_file($user_file_temp, "../files/$user_file");

        $query = "INSERT INTO `user`(`name`, `title`, `image`, `link`) VALUES('{$user_name}','{$user_position}','{$user_image}','{$user_file}')";
        $add_query = mysqli_query($conn, $query);
        confirm($add_query);
        $_SESSION['SuccessMessage'] = "Successfully Added!";
    }else{
        $_SESSION['ErrorMessage'] = "Oops! Field cannot be empty!";
    }
}


?>

<div class="container-fluid">
    <div class="row">
        <div class="mx-auto d-block col-lg-10 mt-5 mb-5">
            <?php echo successMessage();?>
            <?php echo errorMessage();?>
            <div class="card">
                <h5 class="card-header bg-primary text-white">Add User</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" name="name" id="Name" placeholder="Enter your name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Position">Position</label>
                                <input type="text" class="form-control" name="position" id="Position" placeholder="Enter your position">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="imageselect" class="mb-3 mt-3">Select Image:</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="imageselect" name="image" accept="image/jpeg, image/gif, image/png">
                                        <label class="input-group-text" for="imageselect">Upload</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="file" class="mb-3 mt-3">Select File:</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
                                        <label class="input-group-text" for="file">Upload</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6 d-flex mt-3">
                                    <a href="user.php?source=view_all_user" class="btn btn-info btn-block flex-fill"><i class="fas fa-arrow-left"></i> View Users</a>
                                </div>
                                <div class="col-lg-6 d-flex mt-3">
                                    <button type="submit" name="submit" class="btn btn-success btn-block flex-fill" id="btn-addUser"><i class="fas fa-check"></i> Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>