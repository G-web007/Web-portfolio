<?php 

function confirm($result){
    global $conn;
    if(!$result){
        die("Query Failed:" . mysqli_error($conn));
    }
}

function test_input($data){
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function generateRandomClass(){
    global $conn;
    $classes = ['fa fa-heart', 'fa fa-music', 'fa fa-star', 'fa fa-headphones', 'fa fa-gift', 'fa fa-leaf', 'fa fa-fire', 'fa fa-flask'];
    $randomIndex = !empty($classes) ? $classes[array_rand($classes)] : '';
    return $classes[$randomIndex];
}

function generateRandomColor(){
    global $conn;
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

?>

