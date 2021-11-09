<?php
include('connection.php');
   $connection = connect_db('localhost','root','','book_library');
if(isset($_REQUEST['blog_id'])){
     $id = $_REQUEST['blog_id'];
     $data = mysqli_query($connection,"SELECT * FROM blogs WHERE id = '$id'");
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
      <div class="container-fluid">
      	<div style="height:60px;"></div>
          <div class="row mt-5">
          	<div class="col-md-2 "></div>
          		<?php foreach ($data as $value){?>
          		<div class="col-md-8">
          			<div class="card px-2 py-3 shadow p-3 mb-5 bg-white rounded ">
                        <?php echo "<img src=".$value['blog_image']." class = 'image-fluid' style='height:450px;'>";?>
                         <h4 style="font-family: 'Ubuntu', sans-serif;" class="font-weight-bold my-3"><?php echo $value['blog_title'];?></h4>
                         <p style="font-family: 'Ubuntu', sans-serif;"><?php echo $value['blog_body'];?></p>
          			</div>
          		</div>
          	<?php } ?>
          	</div>
          </div>
          <?php include('footer.php');?>
    </body>
 </html>