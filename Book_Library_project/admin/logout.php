<?php
session_start();
     $_SESSION['admin_id'] = "";
     $_SESSION['admin_email'] = "";
     $_SESSION['admin_name'] = "";
     $_SESSION['admin_phone'] = "";

     unset($_SESSION['admin_id']);       
     unset($_SESSION['admin_email']);       
     unset($_SESSION['admin_name']);  
     unset($_SESSION['admin_phone']);

     header('location:admin_login.php');  

?>