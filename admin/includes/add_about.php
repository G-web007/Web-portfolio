<?php 

if(isset($_POST['submit'])){
    $about_name       = test_input(ucwords($_POST['name']));
    $about_subtitle   = test_input(ucwords($_POST['subtitle']));
    $about_email      = test_input($_POST['email']);
    $about_address    = test_input(ucwords($_POST['address']));
    $about_phone      = test_input(ucwords($_POST['phone']));
    $about_degree     = test_input(ucwords($_POST['degree']));

    if(!empty($about_name) && !empty($about_subtitle) && !empty($about_email) && !empty($about_address) && !empty($about_phone) && !empty($about_degree)){

       $query = "INSERT INTO `about_section`(`subtitle`, `name`, `email`, `address`, `degree`, `phone`) VALUES ('$about_subtitle','$about_name','$about_email','$about_address','$about_degree','$about_phone')";
       $add_bio = mysqli_query($conn, $query);
       confirm($add_bio);
       $_SESSION['SuccessMessage'] = "Successfully Added";
    }else{
        $_SESSION['ErrorMessage'] = "Sorry! Field cannot be empty";
    }
}


?>

<div class="container-fluid">
    <div class="row">
        <div class="mx-auto d-block col-lg-10 mt-5 mb-5">
        <?php echo successMessage();?>
        <?php echo errorMessage();?>
    
            <div class="card">
                <h5 class="card-header bg-primary text-white">Add Biography</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-10 mx-auto" d-block>
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" name="name" id="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Email">Email:</label>
                                <input type="email" class="form-control" name="email" id="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>
                            <div class="form-group col-md-4 mx-auto d-block">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" name="phone" id="phone" pattern="^(09|\+639)\d{9}$">
                            </div>
                            <div class="form-group col-md-4 mx-auto d-block">
                                <label for="degree">Degree</label>
                                <input type="text" class="form-control" name="degree" id="degree">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="subtitle">Subtitle</label>
                                <textarea name="subtitle" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex mt-3">
                                <a href="about.php?source=view_biography" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> View Biography</a>
                            </div>
                            <div class="col-lg-6 d-flex mt-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-block flex-fill" id="btn-addbio"><i class="fas fa-check"></i> Add Bio</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>