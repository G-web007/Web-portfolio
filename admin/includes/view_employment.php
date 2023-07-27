<?php 

if(isset($_GET['delete'])){
    $the_employment_id = $_GET['delete'];

    $query = "DELETE FROM `employment_section` WHERE `id` = {$the_employment_id}";
    $delete_employment = mysqli_query($conn, $query);
    confirm($delete_employment);
    $_SESSION['SuccessMessage'] = "Successfully Deleted!";
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <?php echo successMessage();?>
            <div class="card">
                <h5 class="card-header bg-success text-white">Employment History</h5>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>From (Year)</th>
                                <th>End (Year)</th>
                                <th>Postion</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php 
                            $query = "SELECT * FROM `employment_section` ORDER BY `id` DESC";
                            $employment_query = mysqli_query($conn, $query);
                            confirm($employment_query);
                            foreach($employment_query as $data){
                                $employment_id       = test_input($data['id']);
                                $employment_from     = test_input($data['from_year']);
                                $employment_end      = test_input($data['end_year']);
                                $employment_position = test_input($data['position']);
                                $employment_company  = test_input($data['company']);
                                $employment_location = test_input($data['location']);  
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $employment_id;?></td>
                                <td><?php echo $employment_from;?></td>
                                <td><?php echo $employment_end;?></td>
                                <td><?php echo $employment_position;?></td>
                                <td><?php echo $employment_company;?></td>
                                <td><?php echo $employment_location;?></td>
                                <td class="text-center"><a href="employment.php?source=edit_employment&edit=<?php echo $employment_id;?>"><i class="fas fa-edit text-success"></i></a></td>
                                <td class="text-center"><a href="employment.php?source=view_employment&delete=<?php echo $employment_id;?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                            </tr>
                        </tbody>
                        <?php };?>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
</div>