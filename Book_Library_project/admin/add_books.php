<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
      crossorigin="anonymous">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="../css/style.css">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&family=Gowun+Batang&family=Merriweather:wght@300&family=Ubuntu&display=swap" rel="stylesheet">
      <title>Book Library</title>
    </head>
    <body>
       <div class="container">
       	 <div class="row">
       	 	<div class="col-md-4"></div>
       	 	<div class="col-md-8">
       	 		<form action="#" method="post" name="Add_Book" enctype="multipart/form-data">
              <label for="inputEmail4" class="font-weight-bold form_design ">Please enter Book name</label>
              <input class="form-control required form_design" name="book_name" required/><br />
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPassword4"  class="form_design font-weight-bold"  >Book Id</label>
                  <input type="number" class="form-control form_design  " name="id" id="inputPassword4" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4" class="form_design font-weight-bold"  >Name of the Author</label>
                  <input type="text" class="form-control required form_design " name="author_name" id="inputEmail4" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4" class="form_design font-weight-bold"  >Publishing Company</label>
                  <input type="text" class="form-control required form_design " name="seller_name" id="inputPassword4" required>
                </div>
              </div>
              <label for="inputEmail4" class="form_design font-weight-bold" >Genres</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="genre" value="Horror">
                <label class="form-check-label form_design font-weight-bold " for="inlineCheckbox1" >Horror</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="genre" value="Romantic">
                <label class="form-check-label form_design font-weight-bold" for="inlineCheckbox2" >Romantic</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="genre" value="Motivation">
                <label class="form-check-label form_design font-weight-bold" for="inlineCheckbox2" >Motivation</label>
              </div></br>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPassword4"  class="form_design font-weight-bold"  >Good Reads Rating </label>
                  <input type="text" class="form-control form_design  " name="Goodreads" id="inputPassword4" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4" class="form_design font-weight-bold" >Amajon Kindle Rating</label>
                  <input type="text" class="form-control required form_design " name="Kindle" id="inputEmail4" required>
                </div>
                 <div class="form-group col-md-4">
                  <label for="inputPassword4" class="form_design font-weight-bold"  >Publishing Year</label>
                  <input type="number" class="form-control required form_design " name="p_year" id="inputPassword4" required>
                </div>
              </div>
              <label for="inputEmail4" class="font-weight-bold form_design ">Please Upload image</label>
              <input type = "file"class="form-control required form_design" name="book_image" required /><br />
              <textarea class="form-control required" name="disc"  placeholder="Description about the book..." style="height:150px ;font-family: 'Ubuntu', sans-serif;font-size: 13px;"></textarea><br />
              <input  class="btn btn-block" style="background-color: #9bc472;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;" type="submit" name="submit_book" value="Send" /><br /><br />
            </form>
       	 	</div>
       	 </div>
       </div>
    </body>