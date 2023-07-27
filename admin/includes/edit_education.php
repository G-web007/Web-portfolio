<?php 

    if(isset($_GET['edit'])){
        $the_education_id = $_GET['edit'];
    }

    $query = "SELECT * FROM `education_section` WHERE `id` = {$the_education_id}";
    $education_query = mysqli_query($conn, $query);
    confirm($education_query);
    foreach($education_query as $item){
        $educational_from       = test_input(ucwords($item['start_year']));
        $educational_end        = test_input(ucwords($item['end_year']));
        $educational_course     = test_input(ucwords($item['course']));
        $educational_school     = test_input(ucwords($item['school']));
        $educational_location   = test_input(ucwords($item['location']));
        $educational_status     = test_input(ucwords($item['status']));

    }

    if(isset($_POST['update'])){
        $educational_from       = test_input(ucwords($_POST['from']));
        $educational_end        = test_input(ucwords($_POST['end']));
        $educational_course     = test_input(ucwords($_POST['course']));
        $educational_school     = test_input(ucwords($_POST['school']));
        $educational_location   = test_input(ucwords($_POST['location']));
        $educational_status     = test_input(ucwords($_POST['status']));

        $query = "SELECT * FROM `education_section` WHERE `start_year` = '$educational_from' AND `end_year` = '$educational_end' AND `course` = '$educational_course' AND `school` = '$educational_school' AND `location` = '$educational_location' AND `status` = '$educational_status'";
        $check_education_query = mysqli_query($conn, $query);
        confirm($check_education_query);

        if(mysqli_num_rows($check_education_query) > 0){
            $_SESSION['ErrorMessage'] = "Oops! You didn't make any changes!";
        }else{
            $query = "UPDATE `education_section` SET `start_year`='$educational_from',`end_year`='$educational_end',`course`='$educational_course',`school`='$educational_school',`location`='$educational_location',`status`='$educational_status' WHERE `id`={$the_education_id}";
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
                <h5 class="card-header bg-info text-white">Add Education</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="Name">From (Year):</label>
                                <input type="number" min="1900" max="2099" step="1" name="from" value="<?php echo $educational_from;?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Name">End (Year):</label>
                                <input type="number" min="1900" max="2099" step="1" name="end" value="<?php echo $educational_end;?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Position">Course:</label>
                                <input type="text" class="form-control" name="course" id="course" value="<?php echo $educational_course;?>">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="Name">School:</label>
                                <input type="text" class="form-control" name="school" id="school" value="<?php echo $educational_school;?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="Position">Location:</label>
                                <input type="text" class="form-control" name="location" id="location" value="<?php echo $educational_location;?>">
                            </div>
                            <div class="mx-auto d-block form-group col-md-4">
                                <label for="Position">Education Level:</label>
                                <input type="text" class="form-control" name="status" id="status" value="<?php echo $educational_status;?>">
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6 d-flex mt-3">
                                    <a href="education.php?source=view_all_education" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> Education Background</a>
                                </div>
                                <div class="col-lg-6 d-flex mt-3">
                                    <button type="submit" name="update" class="btn btn-info btn-block flex-fill" id="btn-addUser"><i class="fas fa-check"></i> Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>