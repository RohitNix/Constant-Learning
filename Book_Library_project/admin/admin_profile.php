<?php
  //include('connection.php');
    session_start();
    if(!isset($_SESSION['admin_name'])){
       header('location : admin_login.php');
    }else{
    $connection = mysqli_connect('localhost','root','','book_library');
    $limit = 5;
    if(isset($_GET['page'])){
       $pg = $_GET['page'];
    }else{
       $pg = 1;
    }
    $start_page = ($pg-1)* $limit;
    //mysqli_query($connection,"DELETE FROM books_data WHERE Book_id = '$id'");
    $data = mysqli_query($connection,"SELECT * FROM admin_register ORDER BY admin_id ASC LIMIT $start_page,$limit ") or die(mysqli_error($connection));
  }
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
        <div class="row " id="view_data">
          <div class="col-md-3">
            <?php include 'admin_sidebar.php';?>
          </div>
          <div class="col-md-9" id="add_form"  >
            <div class="row">
              <div class="col-md-3"><h5 class="mt-5 font-weight-bold" style="font-family: 'Ubuntu', sans-serif;">Books data</h5></div>
              <div class="col-md-7 "></div>
               <div class="col-md-2 pl-5"><button class="btn btn-sm mt-5" id="show_add" style="background-color: #1B91CF; color: white;">Add Book</button></div>
            </div>

            <div class="card mt-3">
              <div class="card-body" id="main_page">
                <table class="table">
                  <thead class="" style="font-family: 'Ubuntu', sans-serif; ">
                    <tr>
                      <th scope="col">Admin Name</th>
                      <th scope="col">Admin Email</th>
                      <th scope="col">Admin Phone</th>
                      <th scope="col">Admin Profile Pic</th>
                    </tr>
                  </thead>
                  <tbody id="tdata">
                    <?php foreach($data as $value){?>
                            <tr id="deleting_row<?php echo $value['admin_id'];?>" style="cursor:pointer">
                                 <td style="font-family: 'Ubuntu', sans-serif; font-size:12px; cursor:pointer; "><?php echo $value['admin_name'];?></td>
                                 <td style="font-family: 'Ubuntu', sans-serif; font-size:12px;"><?php echo $value['admin_email'];?></td>
                                 <td style="font-family: 'Ubuntu', sans-serif; font-size:12px;"><?php echo $value['admin_phone'];?></td>
                                  <td style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><img src="<?php echo $value['image'];?>" style="height: 44px; width: 54px;"></td>
                                  <?php //echo "<td><button id='del_btn' onclick='delete_table(".$value['Book_id'].")'><img src='../images/delete_data.png' style='height: 25px;'></button></td>";//?>
                                  <?php echo"<td class='pl-4'><input type='image' id='delete_profile' src='../images/delete_data.png' style='height: 20px;' data-id='".$value['admin_id']."'></td>";?>
                                  <?php echo "<td><input type ='image' id='update_profile' src='../images/edit.png' style='height: 20px;' data-id='".$value['admin_id']."'></td>";?>
                                  <?php //echo "<td><button id='dela_btn' data-id='".$value['Book_id']."'><img src='../images/delete_data.png' style='height: 25px;'></button></td>";//?>
                                  <?php //echo "<td><a href=updation_form.php?id=".$value['Book_id']."><img src='../images/edit.png' style='height: 25px;'></a></td>";//?>
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
                              <a class="page-link" href="admin_books.php?page=<?php echo $pg-1;?>" aria-label="Previous">
                                <span aria-hidden="true" style="color: #1B91CF;">&laquo;</span>
                              </a>
                            </li>
                            <?php } ?>
                               <?php
                                 $query_2 = mysqli_query($connection,"SELECT * FROM admin_register");
                                  $total_data = mysqli_num_rows($query_2);
                                  $total_page = ceil($total_data/$limit);
                            
                                  for($i=1;$i<=$total_page;$i++){
                            
                                   if($i==$pg){
                                         echo "<li class='page-item active'><a class='page-link' style='color: white;border-color: #1B91CF; background-color: #1B91CF; ' href='admin_profile.php?page=".$i."'>$i</a></li>";
                                   }else{
                                          echo "<li class='page-item'><a class='page-link' style='color: #1B91CF;' href='admin_profile.php?page=".$i."'>$i</a></li>";
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
                              <a class="page-link" href="admin_books.php?page=<?php echo $pg+1;?>" aria-label="Previous">
                                <span aria-hidden="true" style="color: #1B91CF;">&raquo;</span>
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
        </div>
        <!-- Ajax Call for updating section -->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script>
          $(document).on("click","#update_profile",function(){
             var id = $(this).data("id");
             $.ajax({
               url : "load_updateprofile.php?profile_id="+id,
               type : "post",
               success : function(data){
                  $("#add_form").html(data);
                  //$('#view_data').hide();
               }
             });
          });

          $(document).on("submit","#admin_update",function(e){
            e.preventDefault();
            $.ajax({
                 url : "profile_update_query.php",
                 type : "post",
                 data : new FormData(this),
                 contentType: false,
                 cache: false,
                 processData:false,
                 success : function(data){
                  $("#success_msg").fadeIn().html(data); 
                  setTimeout(function(){
                    $("#success_msg").fadeOut("slow");
                  },3000);

                 }
            });

          });
          $(document).on("click","#delete_profile",function(){
            var profile_id = $(this).data("id");
            var ele = this;
            $.ajax({
                  url : "profile_delete_query.php?del_id="+profile_id,
                  type : "post",
                  success : function(data){
                      if(data == 1){
                         $(ele).closest("tr").fadeOut();
                      }
                  }
            });
          });
        </script>
  </body>