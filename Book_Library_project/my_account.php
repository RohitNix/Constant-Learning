<?php
session_start();
include('connection.php');
$connection = connect_db('localhost','root','','book_library');
$update_profile="";

if(isset($_REQUEST['update_user'])){
  include('updation_query.php');

 $update_profile = update_student($_REQUEST['update_username'],$_REQUEST['update_useremail'],$_REQUEST['update_pnumber'],$_SESSION['user_id'],$connection);
 }
  $id = $_SESSION['user_id'];
  $query_1 = mysqli_query($connection,"SELECT * FROM student_register WHERE user_id='$id' ");


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
      crossorigin="anonymous">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&family=Gowun+Batang&family=Merriweather:wght@300&family=Ubuntu&display=swap" rel="stylesheet">
      <title>Book Library</title>
    </head>
    <body>
      <?php include('navbar.php');?>
      <div class="container my-4 " style="height: 60px;"></div>
         <div class="container">
                        <h1 style="font-family: 'Ubuntu', sans-serif;" class="font-weight-bold mb-4">My Account : <?php echo $_REQUEST['menu'];?></h1>
            <div class="row">

              <div class="col-md-4 card shadow p-3 mb-5 bg-white rounded">    
                <?php include 'account_sidebar.php';?>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-7"> 
                <?php 
                    if(!empty($update_profile)){
                      if($update_profile == true){
                          echo"<div class='alert alert-success mt-2' id='alert' role='alert'>
                                    <strong>Success! </strong>Profile updated successfully. 
                                 </div>";
                      }else{
                          echo"<div class='alert alert-danger mt-2' id='alert' role='alert'>
                                    <strong>Error! </strong>Something Wrong. 
                                 </div>";
                      }
                  }

                  ?>
                <div class="card shadow p-3 mb-5 bg-white rounded">
              <div class="row text-center ml-2"><h3>Update Your Details:</h3></div>   
              <form action="#" method="post" name="Update_User">
               <div class="form-row">
                <?php foreach($query_1 as $value){?>
                 <div class="form-group col-md-4">
                  
                  <label for="inputPassword4"  class="form_design font-weight-bold"  >User name</label>
                  <input type="text" class="form-control form_design  " name="update_username" id="inputPassword4" value="<?php echo $value['user_name'];?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4" class="form_design font-weight-bold" >User Email</label>
                  <input type="text" class="form-control required form_design " name="update_useremail" id="inputEmail4" value="<?php echo $value['user_email'];?>" required>
                </div>
                 <div class="form-group col-md-4">
                  <label for="inputPassword4" class="form_design font-weight-bold" >Phone Number</label>
                  <input type="number" class="form-control required form_design " name="update_pnumber" id="inputPassword4" value="<?php echo $value['phone'];?>" required>
                  
                </div>
             <?php }?>
              </div>
              <input  class="btn btn-block" style="background-color: #9bc472;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;" type="submit" name="update_user" value="Update" /><br /><br />
              </form>
              </div>
            </div>
            </div>    
           
         </div>
      <?php include('footer.php');?>
    </body>
  </html>
  <script src="js/jquery.js"></script>
  <script type="text/javascript">

   setTimeout(function(){
       $("#alert").fadeOut('slow');
     },4000);  
  </script>