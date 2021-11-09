<?php
 include('connection.php'); 
    $connection = connect_db('localhost','root','','book_library');
    $id = $_REQUEST['book_id'];
    // mysqli_query($connection,"DELETE FROM books_data WHERE Book_id = '$id'");
    $data = mysqli_query($connection,"SELECT * FROM books_data WHERE Book_id = '$id'") or die(mysqli_error($connection));

?>
<!DOCTYPE html>
<html>
  <head>
    <?php foreach($data as $meta){
       echo"<meta property='og:title' content='Now get latest Novels". $meta['book_name']." By ".$meta['Author_name']." />";
       echo"<meta property='og:image' content=".$meta['image']." />";
       echo"<meta property='og:description' content='Welcome to Constant Knowledge this website contains all the latest Novels of Legendary authors and best geners here you showcase and buy click here for explore more.' />";
       echo"<meta property='og:url' content='http://localhost/Book_Library_project/book_detail.php?book_id=".$meta['Book_id']." />";
       echo"<meta property='og:site_name' content='Contant Knowledge'/>";
    }?>
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
        
        <?php foreach($data as $value){?>
          <div class="row">
          <div class="col-md-7">
          <h1 class="font-weight-bold mb-3" style="font-family: 'Ubuntu', sans-serif;"><?php echo $value['book_name'];}?></h1></div>
          <div class="col-md-3"></div>
          <div class="col-md-1 text-right pl-2"><img src="images/printer.png" style="height: 35px;" onclick="window.print()"></div>
          <div class="col-md-1 text-right">
            <div class="dropdown">
              <button class="btn btn-drp btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Share
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="https://www.facebook.com/share.php?u=http://localhost/Book_Library_project/book_detail.php?book_id=<?php echo $value['Book_id'];?>" target="_blank" style="font-family:  'Ubuntu', sans-serif;" ><img src="images/facebook.png" style="height: 26px;">   Facebook</a>
                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=&text=<?php urlencode('hi hlo');?>http://localhost/Book_Library_project/book_detail.php?book_id=<?php echo $value['Book_id'];?>" style="font-family:  'Ubuntu', sans-serif;"><img src="images/whatsapp_clone.png" style="height: 26px;">   Whatsapp</a>
                <a class="dropdown-item" href="https://www.linkedin.com/shareArticle?mini=true&url=http://localhost/Book_Library_project/book_detail.php?book_id=<?php echo $value['Book_id'];?>" style="font-family:  'Ubuntu', sans-serif;"><img src="images/linkedin.png" style="height: 26px;">   Linkedin</a>
                <a class="dropdown-item" href="https://pinterest.com/pin/create/button/?url=http://localhost/Book_Library_project/book_detail.php?book_id=<?php echo $value['Book_id'];?>" style="font-family:  'Ubuntu', sans-serif;"><img src="images/pinterest.png" style="height: 26px;">   Pinterest</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <?php foreach($data as $value){?>
            <div  class="card shadow p-3 mb-5 bg-white rounded">
            
            <?php echo "<img src = ".$value['image']." class='image-fluid' style='height: 390px;'>";?>
            <div class="row">
              <div class="col-md-8">
            <h5 class="mt-3" style="font-family: 'Ubuntu', sans-serif;"><strong>Author :</strong><?php echo $value['Author_name'];?></h5>
            
          </div>
          <div class="col-md-4">
         <?php echo "<a href='favorite_query.php?name=".$value['book_name']."'><img src='images/favorite.png' class='float-right mt-1' style='height:46px;'></a>";?>
         </div>
          </div>
            <h5 class="" style="font-family: 'Ubuntu', sans-serif;"><strong >Published By :</strong><?php echo $value['seller_name'];?></h5>
            <h5 class="" style="font-family: 'Ubuntu', sans-serif;"><strong>Publishing Year :</strong><?php echo $value['publising_year'];//$value['Author_name'];?></h5>
            <div class="row">
              <div class="col-md-2">
                <img src="images/g_logo.png" style="height: 64px; width: 63px;" class="mt-3">
              </div>
              <div class="col-md-6 mt-4">
                <?php $rating=$value['Goodreads'];
                for($i=1;$i<=$rating;$i++){
                echo "<img src='images/favourite.png'' style='width: 30px;' class='ml-2'>";
                }?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <img src="images/amajon_kindle_1.png" style="height: 64px; width: 63px;" class="mt-3">
              </div>
              <div class="col-md-6 mt-4">
                <?php $rating=$value['kindle'];
                  for($i=1;$i<=$rating;$i++){
                     echo "<img src='images/favourite.png'' style='width: 30px;' class='ml-2'>";
                   }
                 ?>
              </div>
            </div>
            
            
          </div>
        </div>
        <div class="col-md-7">
          <div class="card shadow p-3 mb-5 bg-white rounded">
            <h2 class="mx-3 my-3" style="font-family: 'Ubuntu', sans-serif;"> Book Description </h2>
            <p class="mx-3 my-3" style="font-family: 'Ubuntu', sans-serif;"><?php echo $value['disc'];?></p>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
    <?php include('footer.php');?>
  </body>
</html>