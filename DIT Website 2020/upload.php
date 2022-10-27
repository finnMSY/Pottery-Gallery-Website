<?php 
if (isset($_POST['submit'])) {
    $name_image = $_FILES['file']['name'];  
    $temp_name = $_FILES['file']['tmp_name'];  
    if(isset($name_image) and !empty($name_image)){
        $location = 'Images/';      
        if(move_uploaded_file($temp_name, $location.$name_image)){
            echo 'File uploaded successfully';
        }
    } else {
        echo 'You should select a file to upload !!';
    }
}
?>