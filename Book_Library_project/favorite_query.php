<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:login.php');
}else{
include('connection.php'); 
$connection = connect_db('localhost','root','','book_library');
  if(isset($_REQUEST['name'])){
	     	$book_name=$_REQUEST['name'];
	     	$user_id = $_SESSION['user_id'];
     	echo $book_name;
	    $query_1=mysqli_query($connection,"INSERT INTO session_fav(user_id,book_name)VALUES('$user_id','$book_name')");
	    header('location:favorite_page.php');


}

}

?>