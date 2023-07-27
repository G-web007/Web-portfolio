<?php include "includes/db.php";?>
<?php include "includes/functions.php";?>
<?php 

// Displaying User
    $query = "SELECT * FROM user WHERE `name` = 'Vincent Y. Ygbuhay'";
    $user_query = mysqli_query($conn, $query);
    confirm($user_query);
    foreach($user_query as $data){
        $user_id    = test_input($data['id']);
        $user_title = test_input($data['title']);
        $user_image = test_input($data['image']);
        $user_name  = ucwords($data['name']);
        $user_link  = test_input($data['link']);
    }
// Displaying User

// Form Contact
if(isset($_POST['send'])){
    $contact_name = $_POST['name'];
    $contact_email = $_POST['email'];
    $contact_message = $_POST['message'];

    if(!empty($contact_name) && !empty($contact_email) && !empty($contact_message)){
        $query = "SELECT * FROM `contact` WHERE name = '$contact_name' AND email = '$contact_email' AND message = '$contact_message'";
        $select_message = mysqli_query($conn, $query);
        confirm($select_message);

        if(mysqli_num_rows($select_message) > 0){
            $message[] = 'Message sent already!';
        }else{
            mysqli_query($conn, "INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$contact_name','$contact_email','$contact_message')") or die("Query Failed");
            $message[] = 'Message sent succesfully!';
        }
    }else{
        $message[] = 'Field cannot be empty!';
    }    
}// Form Contact
?>
<!-- Header -->
<?php include "includes/header.php"?>
<!-- Header -->
<?php 
if(isset($message)){
    foreach($message as $message){
        echo "<div class='message' data-aos='zoom-out'><span> $message </span><i class='fas fa-times' onclick='this.parentElement.remove();'></i></div>";
    }
}
?>
<div class="container">
    <!-- Section 1 -->
    <section class="section-1 center" id="section-1">
        <h1 class="section-1-heading"><?php echo $user_title;?></h1>
        <img src="images/<?php echo $user_image;?>" alt="Vincent Y. Ygbuhay" class="profile-image" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
        <h3 class="f-name"><?php echo $user_name;?></h3>
        <a href="includes/download.php?file=<?php echo $user_link?>" class="section-1-btn">Download CV</a>
    </section><!-- Section 1 -->

    <!-- Navbar -->
    <?php include "includes/navigation.php"?>
    <!-- Navbar -->

    <!-- section 2 -->
    <?php include "includes/about.php"?>
    <!-- section 2 -->

    <!-- Section 3 -->
    <?php include "includes/resume.php"?>
    <!-- Section 3 -->

    <!-- Section 4 -->
    <?php include "includes/contact.php"?>
    <!-- Section 4 -->
<!-- Footer -->
<?php include "includes/footer.php"?>
<!-- Footer -->