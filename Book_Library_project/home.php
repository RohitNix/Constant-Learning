<?php
session_start ();
if (!isset($_SESSION['user_name'])) {
   $session = false;
}
else
{
$session=true;
}
include('connection.php');
$connection = connect_db('localhost','root','','book_library');
$data = mysqli_query($connection,"SELECT * FROM blogs ORDER BY id DESC LIMIT 2");

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
      <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #9bc472;">
        <a href="home.php" class="navbar-brand">Constant Knowledge</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-5" id="mymenu">
          <ul class="navbar-nav custom-nav">
            <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
          <!--  <li class="nav-item"><a href="add.php" class="nav-link">Add Books</a></li>-->
            <li class="nav-item"><a href="view.php" class="nav-link">Veiw Books</a></li>
            <li class="nav-item"><a href="delete.php" class="nav-link">Delete Books</a></li>
            <li class="nav-item"><a href="update.php" class="nav-link">Update Books</a></li>
            <li class="nav-item"><a href="search.php" class="nav-link">Search Books</a></li>
            <li class="nav-item"><a href="blog.php" class="nav-link">Blogs</a></li>

          </ul>
        </div>
        <?php
      if($session==true){
        echo"<div class='dropdown'>
                  <button class='btn btn-drp btn-sm dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Welcome : ".$_SESSION['user_name']."
                  </button>
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                    <a class='dropdown-item' href='my_account.php?menu=Update Profile'  style='font-family:  'Ubuntu', sans-serif;'' >My Account</a>
                    <a class='dropdown-item' href='favorite_page.php' target='_blank' style='font-family:  'Ubuntu', sans-serif;'' >Favorites</a>
                    <a class='dropdown-item' href='my_account.php' target='_blank'  style='font-family:  'Ubuntu', sans-serif;'' >Shared</a>
                    <a class='dropdown-item' href='register_login.php' style='font-family:  'Ubuntu', sans-serif;'' >Register</a>
                    <a class='dropdown-item' href='logout.php' target='_blank'  style='font-family:  'Ubuntu', sans-serif;'' >Logout</a>
               </div>";
      }else{
        echo"<ul class='navbar-nav custom-nav'>
                  <li class='nav-item'><a href='register_login.php' class='nav-link'>Register</a></li>
                  <li class='nav-item'><a href='login.php' class='nav-link'>Login</a></li>
               </ul>";
      }
        ?>
      
      </nav>
      <!-- Banner -->
      <header class="jumbotron back-image " style="background-image: url(images/final_banner.jpg);">
        <div style="margin-top:65px;">
          <h1 class="font-weight-bold text-uppercase " style=" color: #9bc472;">Welcome To Constant Knowledge</h1>
          <p class="font-italic font-weight-bold text-light">"Nothing is pleasanter than exploring a library"</p>
        </div>
      </header>
       <!-- Services -->
       <div class="container text-center border-bottom mb-5 pb-4">
        <h2 class="none" style="font-family: 'Merriweather',serif;">Our Services</h2>
        <div class="row mt-5">
          <div class="col-md-3"><img src="images/books_4.png" class="services"><p class="font-weight-bold">Reading</p></div>
          <div class="col-md-3"><img src="images/books_2.png" class="services"><p class="font-weight-bold">Borrow Book</p></div>
          <div class="col-md-3"><a href="book_shop.php"><img src="images/books_3.png" class="services"><p class="font-weight-bold text-dark">Buy Book</p></a></div>
          <div class="col-md-3"><img src="images/books_1.png" class="services"><p class="font-weight-bold">Multiple Generes</p></div>
        </div>
      </div>
        
      <!-- Writers -->
      <div class="container text-center border-bottom mb-5 pb-4">
        <h2 class="none" style="font-family: 'Merriweather',serif;">Writers Block</h2>
        <div class="row mt-5">
          <div class="col-md-3">
            <a href="writer_page.php?author_name=Robin Sharma">
            <div class="card">
            <img src="images/Robin_sharma.jpg" class="image-fluid">
        
            <p class="font-weight-bold mt-1 text-dark" style="font-family: 'Merriweather',serif;" >Robin Sharma</p></div></a>
          </div>
          <div class="col-md-3">
            <a href="writer_page.php?author_name=Chetan Bhagat"> 
            <div class="card">
            <img src="images/chetan_bhagar.jpg" class="image-fluid">
            
            <p class="font-weight-bold mt-1 text-dark" style="font-family: 'Merriweather',serif; ">Chetan Bhagat</p></div></a>
          </div>
          <div class="col-md-3">
            <a href="writer_page.php?author_name=Rohit Dawesar" class="auth">
            <div class="card">
            <img src="images/r_dawesar.jpg" class="image-fluid"><p class="font-weight-bold mt-1 text-dark" style="font-family: 'Merriweather',serif;">Rohit Dawesar</p></div>
          </a>
          </div>
         
          <div class="col-md-3">
             <a href="other_writer_page.php?author_name= other">
            <div class="card">
            <img src="images/default.jpg" class="image-fluid"><p class="font-weight-bold mt-1 text-dark" style="font-family: 'Merriweather',serif;">Others</p></div>
          </a>
          </div>
        </div>
      </div>
     
      <!-- Slient Feature -->
      <div class="container text-center my-4">
        <h2 class="font-weight-bold" style="font-family: 'Merriweather',serif;">Salient Features</h2>
      </div>
      <div class="container border-bottom pb-5">
        <div class="row ">
          <div class="col-md-6 col-sm-12 ">
            <img src="images/librarian.jpg" class="img-fluid">
          </div>
          <div class="col-md-6 col-sm-12">
            <h3 class="text-center features" >Qualified Library Staff</h3>
            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ducimus, modi aut consequatur dolore ut praesentium esse recusandae at amet. Dolorem eius obcaecati ratione, quas laborum consequatur inventore vitae nostrum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos asperiores magnam culpa ullam. Quasi voluptatem eveniet sed velit tempore eaque adipisci magnam recusandae quaerat praesentium illo, animi, sit ratione quo.</p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos asperiores magnam culpa ullam. Quasi
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente nisi atque  quis eum adipisci quo voluptas laboriosam quisquam sit, sint asperiores eius in!</p>
          </div>
        </div>
        <div class="row ">
          <div class="col-md-6 col-sm-12">
            <h2 class="text-center features">Reading Environment</h2>
            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ducimus, modi aut consequatur dolore ut praesentium esse recusandae at amet. Dolorem eius obcaecati ratione, quas laborum consequatur inventore vitae nostrum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos asperiores magnam culpa ullam. Quasi voluptatem eveniet sed velit tempore eaque adipisci magnam recusandae quaerat praesentium illo, animi, sit ratione quo.</p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos asperiores magnam culpa ullam. Quasi
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente nisi atque  quis eum adipisci quo voluptas laboriosam quisquam sit, sint asperiores eius in!</p>
          </div>
          <div class="col-md-6 col-sm-12 ">
            <img src="images/environment.jpg " class="img-fluid">
          </div>
          
        </div>
        
      </div>
      <!-- Google Reviews by the customer -->
      <div class="container text-center mt-4">
        <img src="images/Google_review_2.jpg" style="height: 135px; width: 249px;">
      </div>
      <div class="jumbotron text-center border-bottom" style="background-color: #9bc472">
        <div class="container">
          <h1 class="font-weight-bold">Reviews</h1>
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <img src="images/avtar1.jpeg" style="border-radius: 100px;">
                  <img src="images/5.1_star.jpg" style="height: 33px; width: 126px;" >
                  <h5 class="card-title features">Rohit Rao</h5>
                  <p class="card-title">Itaque illo explicabo voluptatum, saepe libero rerum, ad ducimus voluptas nesciunt debitis numquam.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <img src="images/avtar2.jpeg" style="border-radius: 100px;">
                  <img src="images/5.1_star.jpg" style="height: 33px; width: 126px;" >
                  <h5 class="card-title features">Arya Stark</h5>
                  <p class="card-title">Itaque illo explicabo voluptatum, saepe libero rerum, ad ducimus voluptas nesciunt debitis numquam.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <img src="images/avtar3.jpeg" style="border-radius: 100px;">
                  <img src="images/5.1_star.jpg" style="height: 33px; width: 126px;" >
                  <h5 class="card-title features">Tom Shelby</h5>
                  <p class="card-title">Itaque illo explicabo voluptatum, saepe libero rerum, ad ducimus voluptas nesciunt debitis numquam.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <img src="images/avtar4.jpeg" style="border-radius: 100px;">
                  <img src="images/5.1_star.jpg" style="height: 33px; width: 126px;" >
                  <h5 class="card-title features">Denerys</h5>
                  <p class="card-title">Itaque illo explicabo voluptatum, saepe libero rerum, ad ducimus voluptas nesciunt debitis numquam.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Contact us -->
      <div class="container">
        <h2 class="text-center" style="font-family: 'Merriweather',serif;">Contact Us</h2>
        <div class="row">
          <div class="col-md-8 form_design">
            <div id="success_msg"></div>
            <form action="#" method="post" name="contact_us" enctype="multipart/form-data" id="contact_us">
              <input class="form-control" name="name" placeholder="Name" <?php if($session==true){echo"value=".$_SESSION['user_name']."";}else{
                echo "";
              };?> ><br />
              <input class="form-control" name="phone" placeholder="Phone" <?php  if($session==true){ echo"value=".$_SESSION['phone_number']."";}else{echo"";}?>><br />
              <input class="form-control" name="email" placeholder="E-mail" <?php if($session==true){ echo"value=".$_SESSION['user_email']."";}else{echo"";}?>><br />
              <textarea class="form-control" name="text" placeholder="How can we help you?" style="height:150px;"></textarea><br />
              <input  class="btn btn-block" style="background-color: #9bc472;color: white; " type="submit" name="submit" value="Send" /><br /><br />
            </form>
          </div>
          <div class="col-sm-4 text-center">
            <strong>Headquater :</strong>
            VSIT Pvt Ltd, <br>
            Dehi,Dwarka <br>
            Dwarka - 124507 <br>
            Phone: +9518663896 <br>
            <a href="#" target="_blank">www.codemantra.com</a> <br>
            <br><br>
            <strong>Bahadurgarh Branch :</strong>
            Codsmss Dev Pvt Ltd, <br>
            Jhajjar,Govt Polytechnenic Jhajjar <br>
            Bahadurgarh - 124507 <br>
            Phone: +9518663896 <br>
            <a href="#" target="_blank">www.codemantra.com</a> <br>
          </div>
        </div>
      </div>
      <footer class="container-fluid bg-dark text-white" style="border-top: 3px solid #9bc472;">
        <div class="container">
          <div class="row py-2">
            <div class="col-sm-6 ">
              <span>Follow Us: </span>
              <a href="https://www.facebook.com/GeekyShow" target="_blank"><i class="fab   fa-facebook-f px-3"></i></a>
              <a href="https://twitter.com/Geekyshow1" target="_blank"><i class="fab fa-twitter pr-3"></i></a>
              <a href="https://www.youtube.com/user/GeekyShow1" target="_blank"><i class="fab fa-youtube pr-3"></i></a>
              <a href="#" target="_blank"><i class="fab fa-google-plus-g pr-3"></i></a>
              <a href="#" target="_blank"><i class="fas fa-rss pr-3"></i></a>
            </div>
            <div class="col-sm-6 text-right">
              <small> Designed by <a href="https://www.geekyshows.com" target="_blank">Rohit Rao(VSIT)</a> &copy; 2021. </small>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</div>
<script src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).on("submit","#contact_us",function(e){
    e.preventDefault();
    $.ajax({
      url : "insert_contact.php",
      data : new FormData(this),
      type : "post",
      contentType: false,
      cache: false,
      processData:false,
      success : function(data){
         $("#success_msg").fadeIn().html(data);
         setTimeout(function(){
             $("#success_msg").fadeOut("slow");
         },5000);
      }
    });
  });
</script>
</body>
</html>


