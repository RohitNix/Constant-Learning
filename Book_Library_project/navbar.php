<?php session_start ();
if (!isset($_SESSION['user_name'])) {
   $session = false;
}
else
{
$session=true;
}
?>
   <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #9bc472;">
      <a href="bootstrap.html" class="navbar-brand">Constant Knowledge</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-5" id="mymenu">
        <ul class="navbar-nav  custom-nav">
          <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
         <!--  <li class="nav-item"><a href="add.php" class="nav-link">Add Books</a></li>
          <li class="nav-item"><a href="view.php" class="nav-link">Veiw Books</a></li>
          <li class="nav-item"><a href="delete.php" class="nav-link">Delete Books</a></li> -->
          <li class="nav-item"><a href="update.php" class="nav-link">Update Books</a></li>
          <li class="nav-item"><a href="search.php" class="nav-link">Search Books</a></li>
        </ul>
      </div>
      <?php
      if($session==true){
        echo"<div class='dropdown'>
                  <button class='btn btn-drp btn-sm dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Welcome : ".$_SESSION['user_name']."
                  </button>
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                    <a class='dropdown-item' href='logout.php'  style='font-family:  'Ubuntu', sans-serif;'' >My Account</a>
                    <a class='dropdown-item' href='favorite_page.php' target='_blank' style='font-family:  'Ubuntu', sans-serif;'' >Favorites</a>
                    <a class='dropdown-item' href='my_account.php' target='_blank'  style='font-family:  'Ubuntu', sans-serif;'' >Shared</a>
                    <a class='dropdown-item' href='logout.php' target='_blank'  style='font-family:  'Ubuntu', sans-serif;'' >Logout</a>
               </div>";
      }else{
        echo"<ul class='navbar-nav custom-nav'>
                  <li class='nav-item'><a href='register_login.php' class='nav-link'>Register</a></li>
                  <li class='nav-item'><a href='login.php' class='nav-link'>Login</a></li>
               </ul>";
      }
        ?>
    </nav>