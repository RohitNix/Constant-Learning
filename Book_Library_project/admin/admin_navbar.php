<?php
  session_start();
  if(!isset($_SESSION['admin_name'])){
      $session = false;
  }else{
      $session = true;
  }
?>
<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color:  #1B91CF;">
      <a href="bootstrap.html" class="navbar-brand">Constant Knowledge</a>
      <span class="navbar-text">Admin Panel</span>
      <?php if($session == true){
       echo ""; 
       echo"<div class='dropdown ml-auto'>";
                  if($_SESSION['profile'] != 1){
                echo "<img src='".$_SESSION['profile']."' style='height: 40px;width: 42px;border-radius: 26px;' >";
                 }else{
                 echo "<img src='../images/default.jpg' style='height: 40px;width: 42px;border-radius: 26px;' >";
                 }
                echo "<button class='btn btn-drp btn-sm dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:white; font-family: Ubuntu', sans-serif';>Welcome : ".$_SESSION['admin_name']."
                  </button><div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                    <a class='dropdown-item' href='logout.php'  style='font-family:  'Ubuntu', sans-serif;'' >My Account</a>
                    <a class='dropdown-item' href='favorite_page.php' target='_blank' style='font-family:  'Ubuntu', sans-serif;'' >Favorites</a>
                    <a class='dropdown-item' href='my_account.php' target='_blank'  style='font-family:  'Ubuntu', sans-serif;'' >Shared</a>
                    <a class='dropdown-item' href='logout.php' target='_blank'  style='font-family:  'Ubuntu', sans-serif;'' >Logout</a>
               </div>";

    }else{
      echo"<button type='button' class='navbar-toggler ml-auto' data-toggle='collapse' data-target='#mymenu'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse ml-5' id='mymenu'>";
    }
?>
        
      </div>
    </nav>