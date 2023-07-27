<?php 

    if(isset($_GET['edit'])){
        $the_user_id = $_GET['edit'];
    }

    $query = "SELECT * FROM user WHERE `id` = {$the_user_id}";
    $edit_query = mysqli_query($conn, $query);
    confirm($edit_query);
    foreach($edit_query as $data){
        $user_id       = test_input($data['id']);
        $user_name     = test_input(ucwords($data['name']));
        $user_position = test_input(ucwords($data['title']));
        $user_image    = test_input($data['image']);
        $user_file     = test_input($data['link']);
    }

    if(isset($_POST['edit_user'])){
        $user_name = test_input($_POST['name']);
        $user_position = test_input($_POST['position']);
        $user_image = $_FILES["image"]["name"];
        $user_image_temp = $_FILES["image"]["tmp_name"];
        $user_file = $_FILES["file"]["name"];
        $user_file_temp = $_FILES["file"]["tmp_name"];
    
        move_uploaded_file($user_image_temp, "../images/$user_image");
        move_uploaded_file($user_file_temp, "../files/$user_file");

        if(empty($user_image) && empty($user_file)){
            $query = "SELECT * FROM `user` WHERE `id`='{$the_user_id}'";
            $select_image_file_query = mysqli_query($conn, $query);
            confirm($select_image_file_query);
            foreach($edit_query as $data){
                $user_image    = test_input($data['image']);
                $user_file     = test_input($data['link']);
            }
        }

        // Checking not make any changes
        $query = "SELECT * FROM `user` WHERE `name`='{$user_name}' AND `title`='{$user_position}' AND `image`='{$user_image}' AND `link`='{$user_file}'";
        $check_query = mysqli_query($conn, $query);
        confirm($check_query);
        // Checking not make any changes

        if(mysqli_num_rows($check_query) > 0){
            $_SESSION['ErrorMessage'] = "Oops! You did not make any changes!";
        }else{
            $query = "UPDATE `user` SET `title`='{$user_position}',`image`='{$user_image}',`name`='{$user_name}',`link`='{$user_file}' WHERE `id` = {$the_user_id}";
            $update_query = mysqli_query($conn, $query);
            confirm($update_query);
            $_SESSION['SuccessMessage'] = "Successfully Updated!";
        }    
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="mx-auto d-block col-lg-10 mt-5 mb-5">
        <?php echo successMessage();?>
        <?php echo errorMessage();?>
            <div class="card">
                <h5 class="card-header bg-primary text-white">Edit User</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" name="name" id="Name" value="<?php echo $user_name;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Position">Position</label>
                                <input type="text" class="form-control" name="position" id="Position" value="<?php echo $user_position;?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6 text-center">
                                <div class="form-group">
                                    <label for="imageselect" class="mb-3 mt-3">Selected Image:</label><br>
                                    <img src="../images/<?php echo $user_image;?>" alt="" width="100" class="rounded-circle">
                                </div>
                            </div>
                            <div class="form-group col-md-5 mx-auto d-block">
                                <div class="form-group">
                                    <label for="imageselect" class="mb-3 mt-3">Select Image:</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="imageselect" name="image" accept="image/jpeg, image/gif, image/png">
                                        <label class="input-group-text" for="imageselect">Upload</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 text-center">
                                <div class="form-group">
                                    <label for="file" class="mb-3 mt-3">Selected File:</label><br>
                                    <a href="../includes/<?php echo $user_file;?>"><?php echo $user_file;?></a>
                                </div>
                            </div>
                            <div class="form-group col-md-5 mx-auto d-block">
                                <div class="form-group">
                                    <label for="file" class="mb-3 mt-3">Select File:</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
                                        <label class="input-group-text" for="file">Upload</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 d-flex mt-3">
                                <a href="user.php?source=view_all_user" class="btn btn-info btn-block flex-fill"><i class="fas fa-arrow-left"></i> Dashboard</a>
                            </div>
                            <div class="col-lg-6 d-flex mt-3">
                                <button type="submit" name="edit_user" class="btn btn-success btn-block flex-fill" id="btn-edit_user"><i class="fas fa-check"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>