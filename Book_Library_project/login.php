<?php
session_start();
if(isset($_REQUEST['login'])){
     include('connection.php');
       $connection = connect_db('localhost','root','','book_library');
       $login_email = $_REQUEST['login_email'];
       $login_password = $_REQUEST['login_password'];
      // echo $login_email;
      // echo $login_password;
       $query_1 = mysqli_query($connection,"SELECT * FROM student_register WHERE user_email = '$login_email' AND password='$login_password'");
       if(mysqli_num_rows($query_1)>0)
       {
        foreach($query_1 as $value){
               $_SESSION['user_name']=$value['user_name'];
               $_SESSION['phone_number']=$value['phone'];
               $_SESSION['user_email']=$value['user_email'];
               $_SESSION['user_id']=$value['user_id'];
               $sess_id = $_SESSION['user_id'];
               $date = date("Y-m-d");
               date_default_timezone_set('Asia/Kolkata');
               $time= date('H:i:sa');
                $_SESSION['user_login_time'] = $time;
                $_SESSION['user_login_date'] = $date;

              // echo $date."<br>";
              //echo $time;
               mysqli_query($connection,"INSERT INTO login_info (session_id, login_date, login_time, logout_time) VALUES ('$sess_id', CURRENT_DATE(), CURRENT_TIME(), CURRENT_TIME())")or die(mysqli_error($connection));
               $_SESSION['logout_time'] = $time;
               header('location:home.php');
              
                       
               }
             } else{
                          echo "Either email or password may be wrong."; 
                        }
      
        }
        
               


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom3.css">
  <title>Book Library</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #9bc472;">
      <a href="bootstrap.html" class="navbar-brand">Constant Knowledge</a>
      <span class="navbar-text">Read and Explore</span>
    </nav>
    <div class="container my-4  " style="height: 10px;">
    </div> 
     <div class="container mt-5 border-bottom " id="login">
      <div class="row pt-5">
        <div class="col-sm-1">
        </div>
          <div class="col-sm-10">
            <div class="card shadow p-3 mb-5 bg-white rounded">
              <div class="row px-3 py-3">
                
                <div class="col-sm-6 ">
                  <img src="images/bookshelf.png" class="img-fluid pt-2" style="height:  254px;">
                </div>
                <div class="col-sm-6 text-left ">
                  <h3 class="form_heading" style="font-family: 'Ubuntu', sans-serif;">Login</h3>
                  <form action="login.php" method="post" name="login" >
                    <div class="form_group mt-4 " class="form_group">
                      <img src="images/login_icons/man-user.png" style="height: 12px; width: 13px;">
                      <input type="email" name="login_email" id="login_email" value=""  placeholder="Username" style="font-family: 'Ubuntu', sans-serif;">
                      
                    </div>
                   
                    <?php
                        /*if(isset($login_email) &&$login_email ==true) {?>
                            <p class="emsg"  style="font-family: 'Ubuntu', sans-serif;">Invalid Email .</p>
                            <?php
                        }*/
                    ?>
                    
                    <div class="form_group mt-4"class="form_group">
                      <img src="images/login_icons/padlock.png" style="height: 12px; width: 13px;">
                      <input type="password" name="login_password" id="login_password" value=""  placeholder="Password" style="font-family: 'Ubuntu', sans-serif;">
                      <i class="far fa-eye" id="togglePassword" style="margin-left: -12px; cursor: pointer;"></i>
                    </div> 
                    <?php
                    /*
                        if(isset($login_pass) &&$login_pass ==true) { ?>
                           <p class="emsg"  style="font-family: 'Ubuntu', sans-serif;">Incorrect Password .</p>
                      <?php  }*/
                    ?>
                     <input type="submit" class="btn " style="background-color:  #9bc472; color: white ;font-family: 'Ubuntu', sans-serif ;" value="login" name="login" >
                     <a href="register_login.php" class="btn " style="background-color:  #9bc472; color: white ;font-family: 'Ubuntu', sans-serif;" value="Register" name="register">Register</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <script type="text/javascript">
         const togglePassword = document.querySelector('#togglePassword');
         const password = document.querySelector('#login_password');
             togglePassword.addEventListener('click', function (e) {
                     // toggle the type attribute
                      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                       password.setAttribute('type', type);
                      // toggle the eye slash icon
                        this.classList.toggle('fa-eye-slash');
            });

      </script>
  </body>
  </html>