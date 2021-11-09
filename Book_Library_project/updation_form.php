<?php
  if(isset($_REQUEST['id'])){
      include('connection.php');
      $connection = connect_db('localhost','root','','book_library');
      $id = $_REQUEST['id'];
      // query for CREATE TABLE //
      echo $id;
     /*$query_1 = mysqli_query($connection,"CREATE TABLE books_data(Book_id VARCHAR(250) PRIMARY KEY,Author_name VARCHAR(250) NOT NULL,book_name VARCHAR(250) NOT NULL,seller_name VARCHAR(250) NOT NULL,geners VARCHAR(250) NOT NULL,disc TEXT)") or die(mysqli_error($connection));*/
     $data = mysqli_query($connection,"SELECT * FROM books_data WHERE Book_id = '$id' ");
     if(isset($_POST['updated_book'])){
      include('updation_query.php');
     $book_id = $_POST['id']; 
     $book_name = $_POST['book_name']; 
     $author_name = $_POST['author_name']; 
     $seller_name = $_POST['seller_name'];
     $genre = $_POST['gener'];
     $disc = $_POST['disc'];
     $p_year = $_POST['p_year'];
     $goodreads = round($_POST['Goodreads']);
     $kindle = round($_POST['Kindle']);
     $_FILES['update_image'];
     $folder = "data_image/".$_FILES['update_image']['name'];
    // echo $disc;
     //echo $genre;
     move_uploaded_file($_FILES['update_image']['tmp_name'], $folder) or die();
      update_book($book_id,$book_name,$author_name,$seller_name,$genre,$disc,$p_year,$goodreads,$kindle,$folder,$connection);
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
    <div>
     <?php// include('navbar.php');?>
    </div>
    <div class="container my-4" style="height: 60px;">
    </div> 
    <div class="container my-4">
      <div class="row">
        <div class="container text-center my-4">
          <h1 class="font-weight-bold" style="font-family: 'Ubuntu', sans-serif;">Welcome ! add your books here.</h1>
        </div>
        <div class="col-md-4">
          <img src="images/add_page.jpg" class="img-fluid">
        </div>
        <div class="col-md-8 add_book_form">
          <form action="updation_form.php" method="post" name="Add_Book" enctype="multipart/form-data">

            <?php 
                 if(mysqli_num_rows($data)>0){
            foreach($data as $value){ ?>

            <label for="inputEmail4" class="font-weight-bold form_design ">Please enter Book name</label>
            <input class="form-control required form_design" name="book_name" required value="<?php echo $value['book_name']?>" /><br />
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputPassword4"  class="form_design font-weight-bold"  >Book Id</label>
                <input type="number" class="form-control form_design  " name="id" id="inputPassword4" required value="<?php echo $value['Book_id']?>" >
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="form_design font-weight-bold"  >Name of the Author</label>
                <input type="text" class="form-control required form_design " name="author_name" id="inputEmail4" required value="<?php echo $value['Author_name']?>" >
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="form_design font-weight-bold"  >Publishing Company</label>
                <input type="text" class="form-control required form_design " name="seller_name" id="inputPassword4" required value="<?php echo $value['seller_name']?>" >
              </div>
            </div>
            <label for="inputEmail4" class="form_design font-weight-bold" >Genres</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="gener" value="Horror">
              <label class="form-check-label form_design font-weight-bold " for="inlineCheckbox1" >Horror</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="gener" value="Romantic">
              <label class="form-check-label form_design font-weight-bold" for="inlineCheckbox2" >Romantic</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="gener" value="Motivation">
              <label class="form-check-label form_design font-weight-bold" for="inlineCheckbox2" >Motivation</label>
            </div></br>
                         <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPassword4"  class="form_design font-weight-bold"  >Good Reads Rating </label>
                  <input type="text" class="form-control form_design  " name="Goodreads" id="inputPassword4" value="<?php echo $value['Goodreads']?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4" class="form_design font-weight-bold" >Amajon Kindle Rating</label>
                  <input type="text" class="form-control required form_design " name="Kindle" id="inputEmail4" value="<?php echo $value['kindle']?>" required>
                </div>
                 <div class="form-group col-md-4">
                  <label for="inputPassword4" class="form_design font-weight-bold"  >Publishing Year</label>
                  <input type="number" class="form-control required form_design " name="p_year" id="inputPassword4" value="<?php echo $value['publising_year']?>" required>
                </div>
              </div>
            <label for="inputEmail4" class="font-weight-bold form_design ">Please Upload image</label>
              <input type = "file"class="form-control required form_design" name="update_image" required /><br />
            <textarea class="form-control required" name="disc"  placeholder="Description about the book..." style="height:150px ;font-family: 'Ubuntu', sans-serif;font-size: 13px;" value="<?php echo $value['disc']?>" ></textarea><br />
            <input  class="btn btn-block" style="background-color: #9bc472;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;" type="submit" name="updated_book" value="Send" /><br /><br />
          <?php }} else {
                echo "Please enter proper id";
          } ?>
          </form>
      </div>
    </div>
  </div>
  

<?php include('footer.php');?>
</body>
</html>