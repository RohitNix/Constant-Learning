<?php
session_start ();
if (!isset($_SESSION['user_id'])) {
   header('location:login.php');
}else{
include('connection.php');
$connection = connect_db('localhost','root','','book_library');
$id = $_SESSION['user_id'];

$data = mysqli_query($connection,"SELECT * FROM login_info WHERE session_id ='$id' ORDER BY login_time_id DESC");
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
      <?php include('navbar.php');?>
      <div class="container my-4 " style="height: 60px;"></div>
      <div class="container">
        <h1 style="font-family: 'Ubuntu', sans-serif;" class="font-weight-bold mb-4">My Account : <?php echo $_REQUEST['menu'];?></h1>
        <div class="row">
          <div class="col-md-4 card shadow p-3 mb-5 bg-white rounded">
            <?php include 'account_sidebar.php';?>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-7 card shadow p-3 mb-5 bg-white rounded">
            <div class="row text-center ml-2"><h3>Last Login</h3></div>
            <table class="table">
              <thead>
                
                <tr>
                  <th scope="col">Login Date</th>
                  <th scope="col">Login Time</th>
                  <th scope="col">Login Time Duration</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data as $value){
                 $logout = strtotime($value['logout_time']);
                  $login = strtotime($value['login_time']);
                  $diff=$logout-$login;
                  $main_data = date('h:i:s',$diff);
                 // $logout=round($diff/60)." minutes ".($diff%60)." seconds <br>";
                 // $logout_time = $_SESSION['logout_time'];
                  /*
                  $login = $value['login_time'];
                  $expl = explode(":", $login);
                  $logout = explode(":", $value['logout_time']);
                  $main_data = $logout[0]-$expl[0].":".$logout[1]-$expl[1].":".$logout[2]-$expl[2];
                  //$date = strtotime($main_data);
                   // echo date('h:i:s', $date);
                  */

                  echo"<tr>
                           <td>".$value['login_date']."</td>";
                         if($value['logout_time'] == $value['login_time']){
                         echo"<td>".$value['login_time']."</td>
                           <td>Currently Active</td>   
                       </tr>";
                         }else{
                   echo"<td>".$value['login_time']."</td>
                           <td>".$main_data."</td>   
                       </tr>";
                     }

                }?>
                
            
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
      <?php include('footer.php');?>
    </body>
  </html>