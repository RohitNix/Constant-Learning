<?php
include('connection.php'); 
$connection = connect_db('localhost','root','','book_library');
  if(isset($_REQUEST['name'])){
     	$book_name=$_REQUEST['name'];
     	echo $book_name;
	    mysqli_query($connection,"DELETE FROM session_fav WHERE book_name = '$book_name'");
      header('location:favorite_page.php');

}


?>