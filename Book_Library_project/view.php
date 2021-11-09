<?php
include('connection.php');
$connection = connect_db('localhost','root','','book_library');
$limit = 5;
if(isset($_GET['page'])){
$pg = $_GET['page'];
}else{
$pg = 1;
}
$start_page = ($pg-1)* $limit;
//mysqli_query($connection,"DELETE FROM books_data WHERE Book_id = '$id'");
$data = mysqli_query($connection,"SELECT * FROM books_data ORDER BY Book_id ASC LIMIT $start_page,$limit ") or die(mysqli_error($connection));
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
      <div class="container-fluid mt-5 mb-5">
        <div class="container text-center mt-2">
          <h1 class="font-weight-bold" style="font-family: 'Ubuntu', sans-serif;">Here ! You can showcase books.</h1>
        </div>
        <div class="row">
          <div class="col-md-4 mt-5">
            <img src="images/view_final.jpg" class="img-fluid">
          </div>
          <div class="col-md-8 mt-4 pt-3">
            <div class="card mt-3">
              <div class="card-body">
                <table class="table">
                  <thead class="" style="font-family: 'Ubuntu', sans-serif; ">
                    <tr>
                      <th scope="col">Book Id</th>
                      <th scope="col">Author Name</th>
                      <th scope="col">Book Name / Genre</th>
                      <th scope="col">Discription</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $value){?>
                    <tr>
                      <th  scope="row" style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['Book_id'];?></th>
                      <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['Author_name'];?></td>
                      <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $value['book_name'];?></td>
                      <?php $half_value = substr($value['disc'], 0, 96);
                      // echo $half_value."<br>";
                      // $decs = substr($half_value,0, strrpos($half_value,'   ')).'....';
                    
                      $decs = substr($half_value,0, strrpos($half_value, ' ')).'<a href=book_detail.php?book_id='.$value['Book_id'].'><img src="images/plus.png" style="height: 19px; width: 19px;" class="ml-2"></a>';?>
                      <td style="font-family: 'Ubuntu', sans-serif; "><?php echo $decs;?></td>
                        <?php echo "<td><a href=del.php?id=".$value['Book_id']."><img src='images/delete_data.png' style='height: 25px;' class='pl-3'></a></td>";?>
                        <?php echo "<td><a href=updation_form.php?id=".$value['Book_id']."><img src='images/edit.png' style='height: 25px;'></a></td>";?>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="container text-center">
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-4">
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <?php if($pg==1){?>
                            <li class="page-item disabled ">
                              <a class=" pagin page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true" >&laquo;</span>
                              </a>
                            </li>
                            <?php }else{?>
                            <li class="page-item">
                              <a class="page-link" href="view.php?page=<?php echo $pg-1;?>" aria-label="Previous">
                                <span aria-hidden="true" style="color: #9bc472;">&laquo;</span>
                              </a>
                            </li>
                            <?php } ?>
                            <?php
                            $query_2 = mysqli_query($connection,"SELECT * FROM books_data");
                            $total_data = mysqli_num_rows($query_2);
                            $total_page = ceil($total_data/$limit);
                            
                            for($i=1;$i<=$total_page;$i++){
                            
                            if($i==$pg){
                            echo "<li class='page-item active'><a class='page-link' style='color: white;border-color: #9bc472; background-color: #9bc472; ' href='view.php?page=".$i."'>$i</a></li>";
                            }else{
                            echo "<li class='page-item'><a class='page-link' style='color: #9bc472;' href='view.php?page=".$i."'>$i</a></li>";
                            }
                            ?>
                            
                            <?php }?>
                            
                            
                            <?php if($pg==$total_page){?>
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                            <?php }else{?>
                            <li class="page-item">
                              <a class="page-link" href="view.php?page=<?php echo $pg+1;?>" aria-label="Previous">
                                <span aria-hidden="true" style="color: #9bc472;">&raquo;</span>
                              </a>
                            </li>
                            <?php } ?>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('footer.php');?>
      </body>
    </html>