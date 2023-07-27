<?php 

    if(isset($_POST['submit'])){
        $interest_title = test_input(ucwords($_POST['interest']));

        if(!empty($interest_title)){
            $query = "INSERT INTO `about_interest` (`interested_in`) VALUES ('$interest_title')";
            $add_interest = mysqli_query($conn, $query);
            confirm($add_interest);
            $_SESSION['SuccessMessage'] = "Successfully Added!";
        }else{
            $_SESSION['ErrorMessage'] = "Oops! Field cannot be empty!";
        }
    }

    if(isset($_GET['delete'])){
        $the_user_id = $_GET['delete'];

        $query = "DELETE FROM `about_interest` WHERE `id` = {$the_user_id}";
        $delete_interest = mysqli_query($conn, $query);
        confirm($delete_interest);
        $_SESSION['SuccessMessage'] = "Successfully Deleted!";
    }

?>

<div class="container-fluid">
    <div class="row">
        <div class="mx-auto d-block col-lg-5 mt-5 mb-5">
        <?php echo successMessage();?>
        <?php echo errorMessage();?>
            <div class="card">
                <h5 class="card-header bg-primary text-white">Interests</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="Name">Fascinate:</label>
                                <input type="text" class="form-control" name="interest" id="Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex mt-3">
                                <a href="index.php" class="btn btn-secondary btn-block flex-fill"><i class="fas fa-arrow-left"></i> Dashboard</a>
                            </div>
                            <div class="col-lg-6 d-flex mt-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-block flex-fill" id="btn-addbio"><i class="fas fa-check"></i> Add Interest</button>
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
                        <th class="text-center">Interests</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <?php 

                    $query = "SELECT * FROM `about_interest` ORDER BY `id` DESC LIMIT 5";
                    $interest_query = mysqli_query($conn, $query);
                    confirm($interest_query);
                    foreach($interest_query as $data){
                        $interest_id    = $data['id'];
                        $interested_in  = $data['interested_in'];
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $interest_id;?></td>
                        <td class="text-center"><a href="about.php?source=edit_interest&edit=<?php echo $interest_id;?>" class="text-decoration-none"><?php echo $interested_in;?></a></td>
                        <td class="text-center"><a class="text-danger" href="about.php?source=view_all_interests&delete=<?php echo $interest_id;?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
                <?php };?>
            </table>
        </div>
    </div><!-- Content Row -->
</div>