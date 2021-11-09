<?php
$connection = mysqli_connect('localhost','root','','book_library');
if(isset($_REQUEST['del_id'])){
  $id = $_REQUEST['del_id'];
  $delete = mysqli_query($connection,"DELETE FROM admin_register WHERE admin_id = '$id'");
  if($delete){
       echo 1;
  }else{
  	echo 0;
  }
}
?>