<?php ob_start();?>
<?php session_start();?>
<?php include "../includes/db.php"?>
<?php include "../includes/functions.php"?>
<?php include "../includes/session.php"?>
<?php include "includes/admin_header.php"?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include "includes/admin_sidebar.php"?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include "includes/admin_navigation.php"?>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <div class="row">
                        
                        <?php 

                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = '';
                        }
                        
                        switch($source){
                            case "add_user":
                            include "includes/add_user.php";
                            break;
                            case "edit_user":
                            include "includes/edit_user.php";
                            break;
                            default:
                            include "includes/view_all_user.php";
                            break;
                        }
                        ?>


                    </div><!-- Content Row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "includes/admin_footer.php"?>
            <!-- Footer -->