
<?php 

    if(isset($_POST['submit'])){
        $employment_roles = test_input(ucwords($_POST['roles']));

        if(!empty($employment_roles)){
            $query = "INSERT INTO `job_description` (`task`) VALUES ('$employment_roles')";
            $add_roles = mysqli_query($conn, $query);
            confirm($add_roles);
            $_SESSION['SuccessMessage'] = "Successfully Added!";
        }else{
            $_SESSION['ErrorMessage'] = "Oops! Field cannot be empty!";
        }
    }

    if(isset($_GET['delete'])){
        $the_delete_id = $_GET['delete'];

        $query = "DELETE FROM `job_description` WHERE `id` = {$the_delete_id}";
        $delete_interest = mysqli_query($conn, $query);
        confirm($delete_interest);
        $_SESSION['SuccessMessage'] = "Successfully Deleted!";
    }

?>

<div class="container-fluid">
    <div class="row">
        <div class="mx-auto d-block col-lg-5 mt-5">
        <?php echo successMessage();?>
        <?php echo errorMessage();?>
            <div class="card">
                <h5 class="card-header bg-dark text-white">Job Description</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="Name">Roles:</label>
                                <input type="text" class="form-control" name="roles" id="roles">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex mt-3">
                                <a href="index.php" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> Dashboard</a>
                            </div>
                            <div class="col-lg-6 d-flex mt-3">
                                <button type="submit" name="submit" class="btn btn-success btn-block flex-fill" id="btn-adddescription"><i class="fas fa-check"></i> Add Description</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mx-auto d-block col-lg-7 mt-5">
            <table class="table table-hover table-bordered" id="myTable">
                <thead class="thead-dark">
                    <tr class="">
                        <th>#</th>
                        <th class="text-center">Roles</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <?php 

                    $query = "SELECT * FROM `job_description` ORDER BY `id` DESC LIMIT 5";
                    $description_query = mysqli_query($conn, $query);
                    confirm($description_query);
                    foreach($description_query as $data){
                        $description_id    = $data['id'];
                        $description_task  = $data['task'];
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $description_id;?></td>
                        <td class="text-center"><a href="employment.php?source=view_description&edit=<?php echo $description_id;?>" class="text-decoration-none"><?php echo $description_task;?></a></td>
                        <td class="text-center"><a class="text-danger" href="employment.php?source=view_description&delete=<?php echo $description_id;?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
                <?php };?>
            </table>
        </div>
        <?php 
        
        if(isset($_GET['edit'])){
            $edit_description_id = $_GET['edit'];
        
            $query = "SELECT * FROM `job_description` WHERE `id` = {$edit_description_id}";
            $edit_query = mysqli_query($conn, $query);
            confirm($edit_query);
            foreach($edit_query as $data){
            $description_roles  = $data['task'];
            }

            if(isset($_POST['update'])){
                $task_roles = $_POST['roles'];

                $query = "SELECT * FROM `job_description` WHERE `task` = '{$task_roles}'";
                $check_query = mysqli_query($conn, $query);
                confirm($check_query);

                if(mysqli_num_rows($check_query) > 0){
                    $_SESSION['ErrorMessage'] = "Oops! You didn't make any changes!";
                }else{
                    $query = "UPDATE `job_description` SET `task`='{$task_roles}' WHERE `id`={$edit_description_id}";
                    $update_query = mysqli_query($conn, $query);
                    confirm($update_query);
                    $_SESSION['SuccessMessage'] = "Successfully Updated!";
                }
            }
            
        
        ?>
        <div class="col-lg-5 mt-5">
        <?php echo successMessage();?>
        <?php echo errorMessage();?>
            <div class="card">
                <h5 class="card-header bg-dark text-white">Edit Job Description</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="Name">Roles:</label>
                                <input type="text" class="form-control" name="roles" id="roles" value="<?php echo $description_roles;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex mt-3">
                                <a href="employment.php?source=view_description" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-recycle"></i> Refresh</a>
                            </div>
                            <div class="col-lg-6 d-flex mt-3">
                                <button type="submit" name="update" class="btn btn-primary btn-block flex-fill" id="btn-update_job"><i class="fas fa-check"></i> Update Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php };?>
    </div><!-- Content Row -->
</div>