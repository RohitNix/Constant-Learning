<?php
   session_start();
   if (!isset($_SESSION['user_name'])) {
       header('location:login.php');
}else{
    include('connection.php');
    $connection = connect_db('localhost','root','','book_library');
    $user_id=$_SESSION['user_id'];
    $query_1 = mysqli_query($connection,"SELECT * FROM session_fav WHERE user_id ='$user_id' ")or die(mysqli_error($connection));
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
            <div class="container-fluid  ">
                <h2 class=" mb-4 font-weight-bold" style="font-family: 'Ubuntu', sans-serif;"> Your Favorites : </h2>
                <div class="row mb-4">
                  <?php foreach($query_1 as $value_1){
                       $book_name = $value_1['book_name'];
                       $query_2 = mysqli_query($connection,"SELECT * FROM books_data WHERE book_name='$book_name'");
                       foreach($query_2 as $value){
                       ?>
                       
                  <div class="col-md-3 ">
                    <a href="book_detail.php?author_name =  " class="auth">
                      <?php echo "<a href=book_detail.php?book_id=".$value['Book_id'].">";?>
                     <div class="card px-2 py-3 shadow p-3 mb-5 bg-white rounded">
                      
                    <?php
                     echo"<img src=".$value['image']." class='img-fluid ' style='height: 310px; width: 313px;' >";
                     ?>
                    
                     <p class="font-weight-bold text-center mt-2 text-dark " style="font-family: 'Ubuntu', sans-serif;"><?php echo $value['book_name']?></p>
                   <p class="text-dark" style="font-family: 'Ubuntu', sans-serif; margin-bottom: 6px;" ><strong>Author Name : </strong><?php echo $value['Author_name']?> </p>
                   <p class="text-dark" style="font-family: 'Ubuntu', sans-serif; margin-bottom: 6px;" ><strong>Published By : </strong>Sunshine.Pvt.Ltd </p>
                  <?php echo"<a href='remove_fav.php?name=".$value['book_name']."'><button type='button' class='btn btn-drp btn-block'>Remove From Favorites</button></a>";?>              
                  </div>
                  <?php echo "</a>"?>
                  </div>
                    <?php } }}?>
               </div>
            </div>
     <?php include('footer.php');?>
   </body>
 </html>