<section class="section-3" id="section-3">
    <h1 class="heading" data-aos="fade-up"> <span>Resume</span></h1>
    <div class="row">
        <div class="box-container">
            <h3 class="title" data-aos="fade-up">Education</h3>
            <?php 
                // Displaying User
                $query = "SELECT * FROM `education_section` LIMIT 3";
                $education_query = mysqli_query($conn, $query);
                confirm($education_query);
                foreach($education_query as $data){
                    $educ_id       = test_input(ucwords($data['id']));
                    $educ_from     = test_input(ucwords($data['start_year']));
                    $educ_end     = test_input(ucwords($data['end_year']));
                    $educ_course   = test_input(ucwords($data['course']));
                    $educ_school   = test_input(ucwords($data['school']));
                    $educ_location = test_input(ucwords($data['location']));
                    $educ_status   = test_input(ucwords($data['status']));
                // Displaying User
            ?>
            <div class="box" data-aos="fade-right">
                <span>(<?php echo $educ_from;?> - <?php echo $educ_end;?>)</span>
                <h3>Course: <?php echo $educ_course;?></h3>
                <p>Education Status: <?php echo $educ_status;?></p>
                <p>School/University: <?php echo $educ_school;?></p>
                <p>Location: <?php echo $educ_location;?></p>
            </div>
            <?php };?>
        </div>
        <div class="box-container">
            <h3 class="title" data-aos="fade-up">Employment History</h3>
            <?php 
                // Displaying User
                $query = "SELECT * FROM `employment_section` LIMIT 3";
                $employment_query = mysqli_query($conn, $query);
                confirm($employment_query);
                foreach($employment_query as $data){
                    $employment_id       = test_input(ucwords($data['id']));
                    $employment_from     = test_input(ucwords($data['from_year']));
                    $employment_end      = test_input(ucwords($data['end_year']));
                    $employment_position = test_input(ucwords($data['position']));
                    $employment_company  = test_input(ucwords($data['company']));
                    $employment_location = test_input(ucwords($data['location']));
                // Displaying User
            ?>
            <div class="box" data-aos="fade-left">
                <span>( <?php echo $employment_from;?> - <?php echo $employment_end;?> )</span>
                <h3><?php echo $employment_position;?>r</h3>
                <p><?php echo $employment_company;?></p>
                <p><?php echo $employment_location;?></p>
            </div>
            <?php };?>
        </div>    
    </div>
</section>