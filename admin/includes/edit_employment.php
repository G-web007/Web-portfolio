<?php 

    if(isset($_GET['edit'])){
        $the_employment_id = $_GET['edit'];
    }

    $query = "SELECT * FROM `employment_section` WHERE `id` = {$the_employment_id}";
    $edit_query = mysqli_query($conn, $query);
    confirm($edit_query);
    foreach($edit_query as $item){
        $employment_id       = test_input(ucwords($item['id']));
        $employment_from     = test_input(ucwords($item['from_year']));
        $employment_end      = test_input(ucwords($item['end_year']));
        $employment_position = test_input(ucwords($item['position']));
        $employment_company  = test_input(ucwords($item['company']));
        $employment_location = test_input(ucwords($item['location'])); 

    }

    if(isset($_POST['update'])){
        $employment_from     = test_input(ucwords($_POST['from']));
        $employment_end      = test_input(ucwords($_POST['end']));
        $employment_position = test_input(ucwords($_POST['position']));
        $employment_company  = test_input(ucwords($_POST['company']));
        $employment_location = test_input(ucwords($_POST['location'])); 

        $query = "SELECT * FROM `employment_section` WHERE `from_year` = '$employment_from' AND `end_year` = '$employment_end' AND `position` = '$employment_position' AND `company` = '$employment_company' AND `location` = '$employment_location'";
        $check_employment_query = mysqli_query($conn, $query);
        confirm($check_employment_query);

        if(mysqli_num_rows($check_employment_query) > 0){
            $_SESSION['ErrorMessage'] = "Oops! You didn't make any changes!";
        }else{
            $query = "UPDATE `employment_section` SET `from_year`='$employment_from',`end_year`='$employment_end',`position`='$employment_position',`company`='$employment_company',`location`='$employment_location' WHERE `id`={$the_employment_id}";
            $update_query = mysqli_query($conn, $query);
            confirm($update_query);
            $_SESSION['SuccessMessage'] = "Successfully Updated!";
        }
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="mx-auto d-block col-lg-10 mt-5">
        <?php echo successMessage();?>
        <?php echo errorMessage();?>
            <div class="card">
                <h5 class="card-header bg-success text-white">Edit Employment</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="Name">From (Year):</label>
                                <input type="number" min="1900" max="2099" step="1" name="from" value="<?php echo $employment_from;?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Name">End (Year):</label>
                                <input type="number" min="1900" max="2099" step="1" name="end" value="<?php echo $employment_end;?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Position">Position:</label>
                                <input type="text" class="form-control" name="position" id="position" value="<?php echo $employment_position;?>">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="Name">Company:</label>
                                <input type="text" class="form-control" name="company" id="company" value="<?php echo $employment_company;?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="Position">Location:</label>
                                <input type="text" class="form-control" name="location" id="location" value="<?php echo $employment_location;?>">
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6 d-flex mt-3">
                                    <a href="employment.php?source=view_employment" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> Employment</a>
                                </div>
                                <div class="col-lg-6 d-flex mt-3">
                                    <button type="submit" name="update" class="btn btn-success btn-block flex-fill" id="btn-update"><i class="fas fa-check"></i> Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>