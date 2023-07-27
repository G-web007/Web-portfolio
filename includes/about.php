<?php 
    // Displaying User
    $query = "SELECT * FROM `about_section` WHERE `id` = 1 LIMIT 6";
    $about_query = mysqli_query($conn, $query);
    confirm($about_query);
    foreach($about_query as $data){
        $about_id       = test_input(ucwords($data['id']));
        $about_title    = test_input(ucwords($data['subtitle']));
        $about_name     = test_input(ucwords($data['name']));
        $about_email  = test_input(ucwords($data['email']));
        $about_address  = test_input(ucwords($data['address']));
        $about_degree   = test_input(ucwords($data['degree']));
        $about_phone    = test_input(ucwords($data['phone']));
    }
    // Displaying User
?>

<section class="section-2" id="section-2">
    <h1 class="heading" data-aos="fade-up"> <span>biography</span></h1>
    <div class="biography">
        <p data-aos="fade-up"><?php echo $about_title;?></p>
        <div class="bio">
            <h3 data-aos="zoom-in"><span>Name: </span> <?php echo $about_name;?></h3>
            <h3 data-aos="zoom-in"><span>Email: </span> <?php echo $about_email;?></h3>
            <h3 data-aos="zoom-in"><span>Degree: </span> <?php echo $about_degree;?></h3>
            <h3 data-aos="zoom-in"><span>Phone: </span> <?php echo $about_phone;?></h3>
            <h3 data-aos="zoom-in"><span>Address: </span> <?php echo $about_address;?></h3>
        </div>
    </div>
    <div class="skills" data-aos="fade-up">
        <h1 class="heading"> <span>Interests</span></h1>
        <?php 
            // Displaying User
            $query = "SELECT * FROM `about_interest` LIMIT 5";
            $interest_query = mysqli_query($conn, $query);
            confirm($interest_query);
            foreach($interest_query as $data){
                $interest_id       = test_input(ucwords($data['id']));
                $interested_in    = test_input(ucwords($data['interested_in']));
            // Displaying User

        ?>
        <div class="progress">
            <div class="bar" data-aos="fade-left"> <h3><span><?php echo $interested_in;?></span> <span><i class="<?php generateRandomClass();?>" style="color: <?php echo generateRandomColor();?>;"></i></span></h3></div>
        </div>
        <?php }?>
    </div>
</section>

        