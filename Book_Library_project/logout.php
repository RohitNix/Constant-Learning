<?php
   session_start();
      include('connection.php');
      $connection = connect_db('localhost','root','','book_library');
      $date = $_SESSION['user_login_date'];
      $time = $_SESSION['user_login_time'];
      mysqli_query($connection,"UPDATE login_info SET logout_time = CURRENT_TIME() WHERE login_time='$time' AND login_date='$date'") or die($connection);

   $_SESSION['user_name']="";
   $_SESSION['phone_number']="";
   $_SESSION['user_email']="";

   unset($_SESSION['user_name']);       
   unset($_SESSION['phone_number']);       
   unset($_SESSION['user_email']);       
                                            
   header('location:home.php');
                                            
?>