<?php
 $connection = mysqli_connect('localhost','root','','book_library');
   if($_REQUEST['blog_id']){
       $id = $_REQUEST['blog_id'];
      $data = mysqli_query($connection,"DELETE FROM blogs WHERE id = '$id'");
      if($data){
      	  echo 1;
      } else{
      	  echo 0;
      }
   }/*else if($_REQUEST['update_id']){
  echo ($_REQUEST['update_id']);
}
*/
?>