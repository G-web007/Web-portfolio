<?php 

if(isset($_GET['edit'])){
    $the_about_id = $_GET['edit'];
}
    $query = "SELECT * FROM `about_section` WHERE `id` = {$the_about_id}";
    $show_query = mysqli_query($conn, $query);
    confirm($show_query);
    foreach($show_query as $item){
        $about_name     = $item['name'];
        $about_subtitle = $item['subtitle'];
        $about_email    = $item['email'];
        $about_address  = $item['address'];
        $about_phone    = $item['phone'];
        $about_degree   = $item['degree'];
    }

    if(isset($_POST['update'])){
        $about_name     = $_POST['name'];
        $about_subtitle = $_POST['subtitle'];
        $about_email    = $_POST['email'];
        $about_address  = $_POST['address'];
        $about_phone    = $_POST['phone'];
        $about_degree   = $_POST['degree'];

        $query = "SELECT * FROM `about_section` WHERE `subtitle` = '$about_subtitle' AND `name` = '$about_name' AND `email` = '$about_email' AND `address` = '$about_address' AND `degree` = '$about_degree' AND `phone` = '$about_phone'";
        $check_query = mysqli_query($conn, $query);
        confirm($check_query);

        if(mysqli_num_rows($check_query) > 0){
            $_SESSION['ErrorMessage'] = "Oops! You don't make any changes";
        }else{
            $query = "UPDATE `about_section` SET `subtitle`='$about_subtitle',`name`='$about_name',`email`='$about_email',`address`='$about_address',`degree`='$about_degree',`phone`='$about_phone' WHERE `id`={$the_about_id}";
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
                <h5 class="card-header bg-primary text-white">Edit Biography</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" name="name" id="Name" value="<?php echo $about_name;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Email">Email:</label>
                                <input type="email" class="form-control" name="email" id="Email" value="<?php echo $about_email;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $about_address;?>">
                            </div>
                            <div class="form-group col-md-4 mx-auto d-block">
                                <label for="phone">Phone:</label>
                                <input type="tel" class="form-control" name="phone" id="phone" pattern="^(09|\+639)\d{9}$" value="<?php echo $about_phone;?>">
                            </div>
                            <div class="form-group col-md-4 mx-auto d-block">
                                <label for="degree">Degree:</label>
                                <input type="text" class="form-control" name="degree" id="degree" value="<?php echo $about_degree;?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="subtitle">Subtitle</label>
                                <textarea class="form-control" rows="10" cols="20" name="subtitle"><?php echo $about_subtitle;?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex mt-3">
                                <a href="about.php?source=view_biography" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> View Biography</a>
                            </div>
                            <div class="col-lg-6 d-flex mt-3">
                                <button type="submit" name="update" class="btn btn-primary btn-block flex-fill" id="btn-addbio"><i class="fas fa-check"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>