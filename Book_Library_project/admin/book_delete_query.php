<?php
$connection = mysqli_connect('localhost','root','','book_library');
$id = $_REQUEST['main_id'];
$data = mysqli_query($connection,"DELETE FROM books_data WHERE Book_id = '$id'");
if($data){
	echo 1;	
}else{
	echo 0;
}

?>