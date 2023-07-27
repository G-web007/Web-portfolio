<?php ob_start()?>
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
                            case "add_about":
                            include "includes/add_about.php";
                            break;
                            case "edit_about":
                            include "includes/edit_about.php";
                            break;
                            case "edit_interest":
                            include "includes/edit_interest.php";
                            break;
                            case "view_all_interests":
                            include "includes/view_all_interest.php";
                            break;
                            default:
                            include "includes/view_biography.php";
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