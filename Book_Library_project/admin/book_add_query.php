<?php
$connection = mysqli_connect('localhost','root','','book_library');

$book_id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $seller_name = $_POST['seller_name'];
    $genre = $_POST['genre'];
    $disc = $_POST['disc'];
    $p_year = $_POST['p_year'];
    $goodreads = round($_POST['Goodreads']);
    $kindle = round($_POST['Kindle']);
    //echo "<pre>";
     //print_r($_FILES['book_image']); 
     $folder = "../data_image/".$_FILES['book_image']['name'];
     //echo $folder;
    move_uploaded_file($_FILES['book_image']['tmp_name'],$folder);
    $image = "data_image/".$_FILES['book_image']['name'];
        
     $insertion =  mysqli_query($connection,"INSERT INTO books_data(Book_id,Author_name,book_name,seller_name,geners,disc,image,Goodreads,kindle,publising_year) VALUES('$book_id','$author_name','$book_name','$seller_name','$genre','$disc','$image','$goodreads','$kindle','$p_year')") or die(mysqli_error($connection));
     if($insertion){
      echo"<div class='alert alert-success mt-2' id='alert' role='alert'>
                <strong>Success! </strong>Book Inserted Successfully. 
           </div>";
}else{
     echo"<div class='alert alert-danger mt-2' id='alert' role='alert'>
                <strong>Error! </strong> We are reported the issue againt you insertion. 
            </div>";
}

?>