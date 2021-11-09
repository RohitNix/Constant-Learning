<?php
include('connection.php');
  $connection = connect_db('localhost','root','','book_library');
  $data=[];
    if(isset($_REQUEST['keyval'])){
      $key = $_REQUEST['keyval'];
      $data = mysqli_query($connection,"SELECT * FROM books_data WHERE MATCH (Author_name,book_name) against ('$key')");
  }else{
       echo "No Data";
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
            <h3 class="font-weight-bold text-center" style="font-family: 'Ubuntu', sans-serif;">Searching result for <em>"<?php echo $_REQUEST['keyval']; ?>"</em></h3>
            <div class="card mt-3">
              <div class="card-body">
                <?php 
                  if(mysqli_num_rows($data)!=0){ ?>
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
                    
                 <?php 
                   foreach($data as $value){?>
                    <tr>
                      <th  scope="row" style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['Book_id'];?></th>
                      <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['Author_name'];?></td>
                      <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['book_name'];?></td>
                      <?php $half_value = substr($value['disc'], 0, 96);
                      // echo $half_value."<br>";
                      $decs = substr($half_value,0, strrpos($half_value,'   ')).'....';
                    
                      $decs = substr($half_value,0, strrpos($half_value, ' ')).'<a href=book_detail.php?book_id='.$value['Book_id'].'><img src="images/plus.png" style="height: 19px; width: 19px;" class="ml-2"></a>';?>
                      <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $decs;?></td>
                    </tr>
                    <?php }}else{ ?>
                      <h4 class="font-weight-bold text-center" style="font-family: 'Ubuntu', sans-serif;">No result for <em>"<?php echo $_REQUEST['keyval']; ?>"</em></h4>
                    <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        