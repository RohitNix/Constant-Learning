<?php
  $connection =mysqli_connect('localhost','root','','book_library');
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_phone = $_POST['admin_phone'];
    $admin_id = $_POST['admin_id'];
   // echo "<pre>";
    //print_r($_FILES['admin_image']);
    $folder = "data_image_admin/".$_FILES['admin_image']['name'];
    move_uploaded_file($_FILES['admin_image']['tmp_name'], $folder);
    //$image = "data_image/".$_FILES['admin_image']['name'];
   $data =  mysqli_query($connection,"UPDATE admin_register SET admin_name = '$admin_name' , admin_email = '$admin_email' , admin_phone = '$admin_phone' , image = '$folder' WHERE admin_id = '$admin_id' ")or die(mysqli_error($connection));
   if($data){
      echo"<div class='alert alert-success mt-2' id='alert' role='alert'>
                <strong>Success! </strong>Profile Updated Successfully. 
           </div>";
}else{
     echo"<div class='alert alert-danger mt-2' id='alert' role='alert'>
                <strong>Error! </strong>Something Wrong. 
            </div>";
}

?>