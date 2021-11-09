<?php
$connection = mysqli_connect('localhost','root','','book_library');
//echo $_POST['blog_title'];
   $id = $_POST['blog_id'];
   $title = $_POST['blog_title'];
   $_FILES['blog_image'];
 //  echo "<pre>";
 // print_r ($_FILES['blog_image']);
  $folder = "../data_image/".$_FILES['blog_image']['name'];
  move_uploaded_file($_FILES['blog_image']['tmp_name'],$folder);
  $image = "data_image/".$_FILES['blog_image']['name'];
   $blog = $_POST['blog'];
   $main_query = mysqli_query($connection,"UPDATE blogs SET blog_title = '$title', blog_body = '$blog' , blog_image = '$image'");
   if($main_query){
      echo"<div class='alert alert-success mt-2' id='alert' role='alert'>
                <strong>Success! </strong>Blog Updated Successfully. 
           </div>";
}else{
     echo"<div class='alert alert-danger mt-2' id='alert' role='alert'>
                <strong>Error! </strong>Something Wrong. 
            </div>";
}
?>