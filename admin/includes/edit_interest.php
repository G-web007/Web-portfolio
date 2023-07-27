<?php 

    if(isset($_GET['edit'])){
        $the_user_id = $_GET['edit'];
    }

    $query = "SELECT * FROM `about_interest` WHERE `id` = {$the_user_id}";
    $edit_interest_query = mysqli_query($conn, $query);
    confirm($edit_interest_query);
    foreach($edit_interest_query as $data){
        $interest_id    = $data['id'];
        $interested_in  = $data['interested_in'];
    }

    if(isset($_POST['update'])){
        $interested_in = $_POST['interest'];

        $query = "SELECT * FROM `about_interest` WHERE `interested_in` = '{$interested_in}'";
        $check_query = mysqli_query($conn, $query);
        confirm($check_query);

        if(mysqli_num_rows($check_query) > 0){
            $_SESSION['ErrorMessage'] = "Oops! You didn't make any changes!";
        }else{
            $query = "UPDATE `about_interest` SET `interested_in`='{$interested_in}' WHERE `id`={$the_user_id}";
            $update_query = mysqli_query($conn, $query);
            confirm($update_query);
            $_SESSION['SuccessMessage'] = "Successfully Updated!";
        }
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="mx-auto d-block col-lg-7 mt-5">
        <?php echo successMessage();?>
        <?php echo errorMessage();?>
            <div class="card">
                <h5 class="card-header bg-primary text-white">Edit Interests</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="Name">Fascinate:</label>
                                <input type="text" class="form-control" name="interest" id="Name" value="<?php echo $interested_in;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex mt-3">
                                <a href="about.php?source=view_all_interests" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> View Interests</a>
                            </div>
                            <div class="col-lg-6 d-flex mt-3">
                                <button type="submit" name="update" class="btn btn-primary btn-block flex-fill" id="btn-addbio"><i class="fas fa-check"></i> Update Interest</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>