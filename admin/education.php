<?php ob_start();?>
<?php session_start();?>
<?php include "../includes/session.php"?>
<?php include "../includes/db.php"?>
<?php include "../includes/functions.php"?>
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
                            case "add_education":
                            include "includes/add_education.php";
                            break;
                            case "edit_education":
                            include "includes/edit_education.php";
                            break;
                            default:
                            include "includes/View_all_education.php";
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