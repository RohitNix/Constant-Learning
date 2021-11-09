<?php
  include('connection.php');
   $connection = connect_db('localhost','root','','book_library');
  if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    mysqli_query($connection,"DELETE FROM books_data WHERE Book_id = '$id'");
    header('location:view.php');
  }
  
?>