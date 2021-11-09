<?php
  $connection = mysqli_connect('localhost','root','','book_library');
  $password_isvalid = "";
  $insertion = "";
  $registration =[];
    if(isset($_POST['admin_register'])){
      $name = $_POST['admin_name'];
      $email = $_POST['admin_email'];
      $phone = $_POST['admin_phone'];
      $password = $_POST['admin_pass'];
      $confirm_pass = $_POST['admin_cpass'];
      if($password != $confirm_pass){
          $password_isvalid = false;
      }else{
        $registration =  mysqli_query($connection,"INSERT INTO admin_register(admin_name,admin_email,admin_phone,admin_password) VALUES ('$name','$email','$phone','$password')");
        $insertion = true;   
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
      <?php // include'admin_navbar.php';?>
      <div style="height:100px;"></div>
      <div class="container">
       <!-- <div id="error_msg"></div>-->
       
        <div class="row">
          <div class="col-md-4"></div>
        
           <div class="col-md-4 px-2">
            <?php if(!empty($registration)){
                   if($insertion == true){
                        echo "<p id = 'success_msg' style = 'color: green; font-family: 'Ubuntu',sans-serif; '>Success ! Admin Regestered Successfully.</p>";
                   }else{
                    echo "";
                   }
            }?>
            <p >
             <form name="admin_register" method="post" id="admin_register">
               <label for="inputEmail4" class="font-weight-bold form_design ">Please enter your User Name</label>
              <input class="form-control required form_design" type="text"  name="admin_name" required/><br />
              
                <label for="inputEmail4" class="font-weight-bold form_design ">Please enter your Email.</label>
              <input class="form-control required form_design" type="email" name="admin_email" required/><br />
             
                <label for="inputEmail4" class="font-weight-bold form_design ">Please enter your Phone Number</label>
              <input class="form-control required form_design" type="number" name="admin_phone" required/><br />
              
                <label for="inputEmail4" class="font-weight-bold form_design ">Password</label>
              <input class="form-control required form_design" type="password" id="admin_pass" name="admin_pass" required/><br />
              <div>
                <label for="inputEmail4" class="font-weight-bold form_design ">Confirm Password</label>
              <input class="form-control required form_design" type="password" id="admin_cpass" name="admin_cpass" required/><br />
            </div>
              <p id = "error_msg" style="margin-top : -19px; font-family: 'Ubuntu', sans-serif; color: red;"></p>
              
              <input type="submit" name="admin_register" class="btn btn-block"   style="background-color: #1B91CF;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;">
             </form>
           </div> 
         </div>
        

      </div>
              <!-- Ajax Call for deleting -->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script >
          $(document).on("blur","#admin_cpass",function(){
          var password = $("#admin_pass").val();
          var confirm_pass = $("#admin_cpass").val();
          if(password != confirm_pass){
            console.log("please check passwords");
            var msg="**password not matched.";
               $("#error_msg").html(msg);
          }else{
            $("#error_msg").html("");
          }

        });
          setTimeout(function(){
            $("#success_msg").fadeOut("slow");
          },4000)
        </script>
    </body>
    </html>