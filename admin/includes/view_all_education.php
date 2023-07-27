<?php 

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM education_section WHERE id = {$the_user_id}";
    $delete_user = mysqli_query($conn, $query);
    confirm($delete_user);
    $_SESSION['SuccessMessage'] = "Successfully Deleted!";
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <?php echo successMessage();?>
            <div class="card">
                <h5 class="card-header bg-info text-white">Educational Background</h5>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>From (Year)</th>
                                <th>End (Year)</th>
                                <th>Course</th>
                                <th>School</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php 
                            $query = "SELECT * FROM `education_section` ORDER BY `id` DESC";
                            $education_query = mysqli_query($conn, $query);
                            confirm($education_query);
                            foreach($education_query as $data){
                                $education_id       = test_input($data['id']);
                                $education_from     = test_input($data['start_year']);
                                $education_end      = test_input($data['end_year']);
                                $education_course   = test_input($data['course']);
                                $education_school   = test_input($data['school']);
                                $education_location = test_input($data['location']);
                                $education_status   = test_input($data['status']);
                                
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $education_id;?></td>
                                <td><?php echo $education_from;?></td>
                                <td><?php echo $education_end;?></td>
                                <td><?php echo $education_course;?></td>
                                <td><?php echo $education_school;?></td>
                                <td><?php echo $education_location;?></td>
                                <td><?php echo $education_status;?></td>
                                <td class="text-center"><a href="education.php?source=edit_education&edit=<?php echo $education_id;?>"><i class="fas fa-edit text-info"></i></a></td>
                                <td class="text-center"><a href="education.php?source=view_all_education&delete=<?php echo $education_id;?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                            </tr>
                        </tbody>
                        <?php };?>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>