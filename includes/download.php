<?php 
$file = $_POST['file'] ."resume.pdf";
header("content-disposition: attachment; filename=" .urlencode($file));
$resume = fopen($file, "r");

while(!feof($resume)){
    echo fread($resume, 8192);
    flush();
}
fclose($resume);
?>