<?php
  include('connection.php');
  $connection = connect_db('localhost','root','','book_library');
  $data = mysqli_query($connection,"SELECT * FROM books_data");
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
      <div class="container my-4 " style="height: 60px;">
      </div>
      <div class="container border-bottom pb-5">
        <div class="row">
          
          <div class="row">
            <div class="container text-center my-4">
              <h1 class="font-weight-bold" style="font-family: 'Ubuntu', sans-serif;">Welcome ! update your books here.</h1>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2 text-center">
              <h5 class="font-weight-bold " style="font-family: 'Ubuntu', sans-serif;">Upload ID</h5>
              <img src="images/upload.png" class="img-fluid mt-2" style="height: 150px;">
            </div>
            <div class="col-md-1 mt-5 ml-2">
              <img src="images/right-arrow.png" class="img-fluid mt-4" style="height: 52px; width: 62px;">
            </div>
            <div class="col-md-2 text-center">
              <h5 class="font-weight-bold ml-3" style="font-family: 'Ubuntu', sans-serif";>Processing</h5>
              <img src="images/work-process.png" class="img-fluid mt-2" style="height: 150px;">
            </div>
            <div class="col-md-1 mt-5 ml-2">
              <img src="images/right-arrow.png" class="img-fluid mt-4" style="height: 52px; width: 62px;">
            </div>
            <div class="col-md-2 text-center">
              <h5 class="font-weight-bold ml-3" style="font-family: 'Ubuntu', sans-serif";>Updated Table.</h5>
              <img src="images/data-table.png" class="img-fluid mt-2" style="height: 150px;">
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid pb-5 mt-3">
        <div class="row pt-5">
          <div class="col-md-3">
            <h3 class="font-weight-bold text-center" style="font-family: 'Ubuntu', sans-serif;">Enter ID</h3>
            <div class="card mt-3">
              <div class="card-body">
                <form action="updation_form.php" method="post" name="update_id">
                  <input class="form-control" name="id" placeholder="Enter Id" style="font-family: 'Ubuntu', sans-serif; "/><br />
                  <input  class="btn btn-block" style="background-color: #9bc472;color: white;font-family: 'Ubuntu', sans-serif;" type="submit" name="update" value="Send" /><br /><br />
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <h3 class="font-weight-bold text-center" style="font-family: 'Ubuntu', sans-serif;">Updated Data</h3>
            <div class="card mt-3">
              <div class="card-body">
                <table class="table">
                  <thead class="thead-light" style="font-family: 'Ubuntu', sans-serif; ">
                    <tr>
                      <th scope="col">Book Id</th>
                      <th scope="col">Author Name</th>
                      <th scope="col">Book Name / Genre</th>
                      <th scope="col">Discription</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php foreach($data as $value){?>
                      <tr>
                        <th  scope="row" style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['Book_id'];?></th>
                        <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['Author_name'];?></td>
                        <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['book_name'];?></td>
                        <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['disc'];?></td>
                     </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer.php');?>
    </body>
  </html>