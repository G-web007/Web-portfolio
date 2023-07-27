<?php ob_start();?>
<?php session_start();?>
<?php include "../includes/session.php"?>
<?php include "../includes/db.php"?>
<?php include "../includes/functions.php"?>
<?php include "includes/admin_header.php"?>
<?php ob_start();?>
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
                            case "add_employment":
                            include "includes/add_employment.php";
                            break;
                            case "edit_employment":
                            include "includes/edit_employment.php";
                            break;
                            case "edit_description":
                            include "includes/edit_description.php";
                            break;
                            case "view_description":
                            include "includes/view_description.php";
                            break;
                            default:
                            include "includes/View_employment.php";
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