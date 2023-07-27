<?php 

if(isset($_POST['submit'])){
    $educational_from       = test_input(ucwords($_POST['from']));
    $educational_end        = test_input(ucwords($_POST['end']));
    $educational_course     = test_input(ucwords($_POST['course']));
    $educational_school     = test_input(ucwords($_POST['school']));
    $educational_location   = test_input(ucwords($_POST['location']));
    $educational_status     = test_input(ucwords($_POST['status']));

    if(!empty($educational_from) && !empty($educational_end) && !empty($educational_school) && !empty($educational_location) && !empty($educational_status)){

       $query = "INSERT INTO `education_section`(`start_year`, `end_year`, `course`, `school`, `location`, `status`) VALUES ('$educational_from','$educational_end','$educational_course','$educational_school','$educational_location','$educational_status')";
       $add_education = mysqli_query($conn, $query);
       confirm($add_education);
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
                <h5 class="card-header bg-info text-white">Add Education</h5>
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
                                <label for="Position">Course:</label>
                                <input type="text" class="form-control" name="course" id="course">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="Name">School:</label>
                                <input type="text" class="form-control" name="school" id="school">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="Position">Location:</label>
                                <input type="text" class="form-control" name="location" id="location">
                            </div>
                            <div class="mx-auto d-block form-group col-md-4">
                                <label for="Position">Education Level:</label>
                                <input type="text" class="form-control" name="status" id="status">
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6 d-flex mt-3">
                                    <a href="education.php?source=view_all_education" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> Education Background</a>
                                </div>
                                <div class="col-lg-6 d-flex mt-3">
                                    <button type="submit" name="submit" class="btn btn-info btn-block flex-fill" id="btn-addUser"><i class="fas fa-check"></i> Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>