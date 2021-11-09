<?php
  if(isset($_REQUEST['register'])){
          include('connection.php');
          $data=[];
    $connection = connect_db('localhost','root','','book_library');
    $user_name = $_REQUEST['user_name'];
    $user_email = $_REQUEST['mail'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    $query_1=[];

    $query_1=mysqli_query($connection,"SELECT * FROM student_register WHERE user_email = '$user_email'")or die(mysqli_error($connection));
    if(mysqli_num_rows($query_1)>0){
       $mail_error=true;
    }else{
    //echo $user_name;
    //echo $student_register ;
    //echo $password;
    //echo $user_email;
   $data = mysqli_query($connection,"INSERT INTO student_register (user_name,user_email,phone,password) VALUES ('$user_name','$user_email','$phone','$password')")or die(mysqli_error($connection));
   if($data){
        $register = true;
   }
 }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom3.css">
  <title>Book Library</title>
  </head>
  <body>
   <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #9bc472;">
      <a href="bootstrap.html" class="navbar-brand">Constant Knowledge</a>
      <span class="navbar-text">Read and Explore</span>
    </nav>
    <div class="container my-4 " style="height: 10px;">
    </div> 
    <div class="container mt-5 border-bottom">
      <div class="row pt-5">
        <div class="col-sm-1">
        </div>

          <div class="col-sm-10">
            <?php 
            if(!empty($query_1)){
              
                   echo"<div class='alert alert-danger' id='alert' role='alert'>
                            <strong>Error! </strong>This Email Id is already registered ! Try Another.
                          </div>";
            }


            if(!empty($data)){


              if($register == true){

                  echo"<div class='alert alert-success' id='alert' role='alert'>
                            <strong>Success! </strong>User registered successfully. 
                        </div>"; 
                 }else{
                       echo"<div class='alert alert-danger' id='alert' role='alert'>
                                 <strong>Error! </strong>Something wrong while registering ! Try Again 
                              </div>"; 
                 }
              
            }
              ?>
            <div class="card shadow p-3 mb-5 bg-white rounded">
              <div class="row px-3 py-3">
                <div class="col-sm-6 text-left ">
                  <h3 class="form_heading" style="font-family: 'Ubuntu', sans-serif;">Sign up</h3>
                  <form action="register_login.php" method="post" name="register_form" style="font-family: 'Ubuntu', sans-serif;" >
                    <div class="form_group mt-4 " class="form_group">
                      <img src="images/login_icons/man-user.png" style="height: 12px; width: 13px;">
                      <input type="text" name="user_name" id="uname" value=""  placeholder="Username" style="font-family: 'Ubuntu', sans-serif;">
                    </div>
                    <p class="emsg" id="uerror" style="font-family: 'Ubuntu', sans-serif;"></p>
                    <div class="form_group mt-4 " class="form_group">
                      <img src="images/login_icons/email.png" style="height: 12px; width: 13px;">
                      <input type="email" name="mail" id="email" value=""  placeholder="Email" style="font-family: 'Ubuntu', sans-serif;">
                    </div>
                    <p class="emsg" id="eerror" style="font-family: 'Ubuntu', sans-serif;"></p>
                    <div class="form_group mt-4"class="form_group">
                      <img src="images/login_icons/call.png" style="height: 12px; width: 13px;">
                      <input type="number" name="phone" id="phone" value=""  placeholder="Phone" style="font-family: 'Ubuntu', sans-serif;">
                    </div>
                    <p class="emsg" id="perror" style="font-family: 'Ubuntu', sans-serif;"></p>
                    <div class="form_group mt-4"class="form_group">
                      <img src="images/login_icons/padlock.png" style="height: 12px; width: 13px;">
                      <input type="password" name="password" id="password" value=""  placeholder="Password" style="font-family: 'Ubuntu', sans-serif;">
                      <i class="far fa-eye" id="togglePassword" style="margin-left: -12px; cursor: pointer;"></i>
                    </div>
                    <p class="emsg" id="pserror" style="font-family: 'Ubuntu', sans-serif;"></p>
                    <div class="form_group mt-4"class="form_group">
                      <img src="images/login_icons/password.png" style="height: 12px; width: 13px;">
                      <input type="password" name="cpassword" id="cpassword" value=""  placeholder="Confirm Password" style="font-family: 'Ubuntu', sans-serif;">
                      <i class="far fa-eye" id="togglecpassword" style="margin-left: -12px; cursor: pointer;"></i>
                    </div>
                    <p class="emsg" id="cpserror" style="font-family: 'Ubuntu', sans-serif;"></p>
                    <input type="submit" class="btn " style="background-color:  #9bc472; color: white ;font-family: 'Ubuntu', sans-serif;" value="Register" name="register">
                      <a href="login.php" class="btn " style="background-color:  #9bc472; color: white ;font-family: 'Ubuntu', sans-serif;" value="Register" name="register">Login</a>
                  </form>
                </div>
                <div class="col-sm-6 mt-2">
                  <img src="images/books.png" class="img-fluid pt-5" style="height: 285px;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <script src="js/jquery.js"></script>
      <script>
        $(document).ready(function(){
          $("#uname").blur(function(){
            var regex =/^[a-zA-Z]([0-9a-zA-Z]){2,10}$/;
            if(!$("#uname").val().match(regex)){
              var msg="**invalid username.";
              console.log("there is some issue with name");
              $("#uerror").html(msg);
            } else{
                document.getElementById("uerror").innerHTML = "";
                console.log("fixed !!");
            }
          });
          $("#email").blur(function(){
            var regex =/^([_\-\.0-9a-zA-z]+)@([_\-\.0-9a-zA-z]+)\.([a-zA-Z]){2,7}$/;
            if(!$("#email").val().match(regex)){
              var msg="**invalid email.";
              $("#eerror").html(msg);
            }else{
              document.getElementById("eerror").innerHTML = "";
            }
          });
          $("#phone").blur(function(){
            var regex =/^([0-9]){10}$/;
            if(!$("#phone").val().match(regex)){
              var msg="**invalid phone.";
              $("#perror").html(msg);
            }else{
              document.getElementById("perror").innerHTML = "";
            }
          });
          $("#password").blur(function(){
            var regex =/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
            if(!$("#password").val().match(regex)){
              var msg="**invalid password.";
              $("#pserror").html(msg);
              alert("**Minimum eight characters, at least one letter, one number and one special character");
            }else{
              document.getElementById("pserror").innerHTML = "";
            }
          });
          $("#cpassword").blur(function(){
            if($("#cpassword").val() == $("#password").val()){
              var msg="**password not matched.";
              $("#cpserror").html(msg);
            }else{
              document.getElementById("cpserror").innerHTML = "";
            }
          });
        });
        setTimeout(function(){
          $('#alert').remove();
         }, 5000);

      </script>
      <!--  this query is for the login functionality -->


  </body>
  <script type="text/javascript">
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
   const togglecPassword = document.querySelector('#togglecpassword');
  const cpassword = document.querySelector('#cpassword');
 
  togglecPassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    cpassword.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

  
</script>
  </html>