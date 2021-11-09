<?php
function connect_db($hostname,$username,$password,$database){
  $connection = mysqli_connect($hostname,$username,$password,$database)or die(mysql_error());
  return $connection;
}
?>