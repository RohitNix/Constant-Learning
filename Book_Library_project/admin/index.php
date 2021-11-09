<?php
$connection = mysqli_connect('localhost','root','','book_library');
session_start();
  if(!isset($_SESSION['admin_name'])){ 
       header('location:admin_login.php');
  }
  $query_1 = mysqli_query($connection,"SELECT * FROM user_contact_us WHERE notification_date = CURRENT_DATE()"); 
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
      <?php include'admin_navbar.php';?>
      <div style="height:60px;"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-white rounded" style="border-color: #1B91CF; height: 659px;">
              <div class="list-group list-group-flush mx-5 ">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item text-center"><a href="#" class="admin_sidebar align-content-center"><?php if($_SESSION['profile'] != 1){?><img src="<?php echo $_SESSION['profile'];?>" style="height: 90px;width: 96px;border-radius: 61px"><?php }else{?><img src="../images/default.jpg" style="height: 90px;width: 96px;border-radius: 61px"><?php }?></a>
                    <p class="mt-2 font-weight-bold" style="font-family: 'Ubuntu', sans-serif;"><?php echo $_SESSION['admin_name'];?></p>
                  </li>
                  
                  <li class="list-group-item"><a href="index.php" class="admin_sidebar">Admin</a></li>
                  <li class="list-group-item"><a href="admin_books.php" class="admin_sidebar">Add Books</a></li>
                  <li class="list-group-item"><a href="admin_blogs.php" class="admin_sidebar">Add Blogs</a></li>
                  <li class="list-group-item"><a href="admin_profile.php" class="admin_sidebar">Update Profile</a></li>
                  <li class="list-group-item"><a href="index.php" class="admin_sidebar" disabled>Notification</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-5">
             <div class="card  shadow p-3 mb-5 bg-white rounded ">
                <?php foreach ($query_1 as $value) { ?>
                    <p id="notification" data-id = "<?php echo $value['id'];?>" style="font-size: 13px;font-family: 'Ubuntu',sans-serif;"><?php echo "<strong> Notification From : </strong>" .$value['user_email']."<br>".$value['dispcription'];?></p>
               <?php }?>
             </div>
          </div>
          <div class="col-md-4" id="full_notification">
                
          </div>
        </div>
      </div>
       <script type="text/javascript" src="../js/jquery.js"></script>
        <script>
          $(document).on("click","#notification",function(){
             var id = $(this).data("id");
             $.ajax({
                    url : "notification_view_query.php?notification_id="+id,
                    type : "post",
                    success : function(data){
                          $("#full_notification").html(data);
                    }
             });
          });
        </script>
    </body>
  </html>