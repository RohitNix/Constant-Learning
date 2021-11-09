<?php

 $connection=mysqli_connect('localhost','root','','book_library');
    $book_id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $seller_name = $_POST['seller_name'];
  //  $genre = $_POST['gener'];
    $disc = $_POST['disc'];
    $p_year = $_POST['p_year'];
    $goodreads = round($_POST['Goodreads']);
    $kindle = round($_POST['Kindle']);
    // echo "<pre>";
     //print_r($_FILES['update_image']);
     $folder = "../data_image/".$_FILES['update_image']['name'];
     move_uploaded_file($_FILES['update_image']['tmp_name'],$folder);
     $image = "data_image/".$_FILES['update_image']['name'];
 
 $update = mysqli_query($connection,"UPDATE books_data SET book_name = '$book_name',Author_name = '$author_name',seller_name = '$seller_name',disc = '$disc' , Goodreads = '$goodreads', kindle = '$kindle', publising_year = '$p_year', image = '$image' WHERE Book_id = '$book_id'");
  if($update){
    echo"<div class='alert alert-success mt-2' id='alert' role='alert'>
                <strong>Success! </strong>Book updated successfully. 
           </div>";
}else{
      echo"<div class='alert alert-danger mt-2' id='alert' role='alert'>
                                    <strong>Error! </strong>Something Wrong. 
                                 </div>";
}

?>