<?php
session_start();
$check_email = [];
$password_isvalid = "";
$email_isvalid = "";
  $connection = mysqli_connect('localhost','root','','book_library');
      if(isset($_POST['admin_login'])){ 
        $email = $_POST['admin_email'];
       // echo $email;
        $check_email = mysqli_query($connection,"SELECT * FROM admin_register WHERE admin_email = '$email'");
        if(mysqli_num_rows($check_email)<1){
             $email_isvalid = true;
             // echo "check_email";
        }else{
        foreach($check_email as $value){
              if($_POST['admin_pass'] != $value['admin_password']){
               $password_isvalid = true;
                 //  echo"check_password";

              }else{
                $_SESSION['admin_id'] = $value['admin_id'];
               $_SESSION['admin_email'] = $value['admin_email'];
               $_SESSION['admin_name'] = $value['admin_name'];
               $_SESSION['admin_phone'] = $value['admin_phone'];
               $_SESSION['profile'] = $value['image'];

              header('location:index.php');
              }
        }
   }
}
?>
<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
      crossorigin="anonymous">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/admin_style.css">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&family=Gowun+Batang&family=Merriweather:wght@300&family=Ubuntu&display=swap" rel="stylesheet">
      <title>Book Library</title>
    </head>
    <body>
      <?php// include'admin_navbar.php';?>
      <div style="height:100px;"></div>
      <div class="container">
       <!-- <div id="error_msg"></div>-->
       
        <div class="row">
          <div class="col-md-4"></div>

        
           <div class="col-md-4 px-2">
            <?php 
                  if(!empty($check_email)){
                      if($email_isvalid == true){
                          echo "<p id = 'success_msg' style = 'color: red; font-family: Ubuntu',sans-serif; '>Error ! Please enter proper email</p>";
                      }else{
                        echo "";
                      }
                   if($password_isvalid == true){
                         echo "<p id = 'success_msg' style = 'color: red; font-family: 'Ubuntu',sans-serif; '>Error ! Password Wrong</p>";
                   }else{
                    echo"";
                   }
            }?>
     
             <form name="admin_login" method="post" id="admin_register ">
                <label for="inputEmail4" class="font-weight-bold form_design ">Please enter your Email.</label>
              <input class="form-control required form_design" type="email" name="admin_email" required/><br />             
                <label for="inputEmail4" class="font-weight-bold form_design ">Password</label>
              <input class="form-control required form_design" type="password" id="admin_pass" name="admin_pass" required/><br />
              <input type="submit" name="admin_login" class="btn btn-block"   style="background-color: #1B91CF;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;">
             </form>
           </div> 
         </div>
        

      </div>

    </body>
    </html>