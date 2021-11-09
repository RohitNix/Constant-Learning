<?php
$connection = mysqli_connect('localhost','root','','book_library');
$folder = "../data_image/".$_FILES['blog_image']['name'];
move_uploaded_file($_FILES['blog_image']['tmp_name'], $folder);
$image = "data_image/".$_FILES['blog_image']['name'];
$blog_title = $_POST['blog_title'];
$blog_body = $_POST['blog'];
$insert = mysqli_query($connection,"INSERT INTO blogs (blog_title,blog_body,blog_image) VALUES ('$blog_title','$blog_body','$image')");
if($insert){
    echo"<div class='alert alert-success mt-2' id='alert' role='alert'>
                <strong>Success! </strong>Blog Inserted successfully. 
           </div>";
}else{
	  echo"<div class='alert alert-danger mt-2' id='alert' role='alert'>
                                    <strong>Error! </strong>Something Wrong. 
                                 </div>";
}


