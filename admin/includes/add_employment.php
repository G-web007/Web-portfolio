<?php 

if(isset($_POST['submit'])){
    $employment_from     = test_input(ucwords($_POST['from']));
    $employment_end      = test_input(ucwords($_POST['end']));
    $employment_position = test_input(ucwords($_POST['position']));
    $employment_company  = test_input(ucwords($_POST['company']));
    $employment_location = test_input(ucwords($_POST['location']));

    if(!empty($employment_from) && !empty($employment_end) && !empty($employment_position) && !empty($employment_company) && !empty($employment_location)){

       $query = "INSERT INTO `employment_section`(`from_year`, `end_year`, `position`, `company`, `location`) VALUES ('$employment_from','$employment_end','$employment_position','$employment_company','$employment_location')";
       $add_employment = mysqli_query($conn, $query);
       confirm($add_employment);
       $_SESSION['SuccessMessage'] = "Successfully Added!";
    }else{
        $_SESSION['ErrorMessage'] = "Oops! Field cannot be empty!";
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="mx-auto d-block col-lg-10 mt-5">
        <?php echo successMessage();?>
        <?php echo errorMessage();?>
            <div class="card">
                <h5 class="card-header bg-success text-white">Add Employment</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="Name">From (Year):</label>
                                <input type="number" min="1900" max="2099" step="1" name="from" value="2000" class="form-control"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Name">End (Year):</label>
                                <input type="number" min="1900" max="2099" step="1" name="end" value="2000" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Position">Position:</label>
                                <input type="text" class="form-control" name="position" id="position">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="Name">Company:</label>
                                <input type="text" class="form-control" name="company" id="company">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="Position">Location:</label>
                                <input type="text" class="form-control" name="location" id="location">
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6 d-flex mt-3">
                                    <a href="employment.php?source=view_employment" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> Education Background</a>
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