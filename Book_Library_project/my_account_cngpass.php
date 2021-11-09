<?php
session_start();
include('connection.php');
$connection = connect_db('localhost','root','','book_library');
$pass_match="";
$old_pass="";
$update ="";
$query_1=[];
if(isset($_REQUEST['update_password'])){

  $old_password = $_REQUEST['old_password'];
   $query_1=mysqli_query($connection,"SELECT * FROM student_register WHERE password = '$old_password'");
   if(mysqli_num_rows($query_1)>0){
    $new_pass = $_REQUEST['new_password'];
    $confirm = $_REQUEST['c_new_password'];
    $old_pass = true;
    if($new_pass == $confirm){
      $pass_match =true;
        include('updation_query.php');
       $update= update_student_password($_REQUEST['c_new_password'],$_SESSION['user_id'],$connection);
      }

}
}


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
      <?php  include('navbar.php');?>
            
      
      
      <div class="container my-4 " style="height: 60px;"></div>
         <div class="container">
                        <h1 style="font-family: 'Ubuntu', sans-serif;" class="font-weight-bold mb-4">My Account : <?php echo $_REQUEST['menu'];?></h1>
            <div class="row">

              <div class="col-md-4 card shadow p-3 mb-5 bg-white rounded">    
                <?php include 'account_sidebar.php';?>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-7 "> 
                <?php
      if(!empty($query_1)){ 
      if($old_pass != true){
        echo"<div class='alert alert-danger' id='alert' role='alert'>
                  <strong>Error!</strong>please enter correct old password. 
               </div>"; 
      }elseif ($pass_match == false) {
        echo"<div class='alert alert-danger' id='alert' role='alert'>
                  <strong>Error!</strong>Password doesn,t match.. 
               </div>"; 
      }elseif($update == false){
        echo"Some thing wrong we are working on it :(";
      }else{             
         echo"<div class='alert alert-success ' id='alert' role='alert'>
                  <strong>Success!</strong>Password updated successfully. 
               </div>"; 
      }
    }
      ?>
                <div class="card shadow p-3 mb-5 bg-white rounded">//
                
              <div class="row text-center ml-2"><h3>Update Your Password:</h3></div>   
              <form action="#" method="post" name="Update_User">
               <div class="form-row">
                 <div class="form-group col-md-4">
                  <label for="inputPassword4"  class="form_design font-weight-bold"  >Old Password</label>
                  <input type="password" class="form-control form_design  " name="old_password" id="inputPassword4" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4" class="form_design font-weight-bold" >New Password</label>
                  <input type="password" class="form-control required form_design " name="new_password" id="inputEmail4" required>
                </div>
                 <div class="form-group col-md-4">
                  <label for="inputPassword4" class="form_design font-weight-bold" >Confirm New Password</label>
                  <input type="password" class="form-control required form_design " name="c_new_password" id="inputPassword4" required>
                  
                </div>
             
              </div>
              <input  class="btn btn-block" style="background-color: #9bc472;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;" type="submit" name="update_password" value="Update" /><br /><br />
              </form>
              </div>
            </div>
            </div>    
           
         </div>
      <?php include('footer.php');?>
    </body>
  </html>
 <script type="text/javascript">
   setTimeout(function(){
      $('#alert').remove();
   }, 5000);
 </script>