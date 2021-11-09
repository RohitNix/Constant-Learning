<?php
  //include('connection.php');
    $connection = mysqli_connect('localhost','root','','book_library');
    $limit = 5;
    if(isset($_GET['page'])){
       $pg = $_GET['page'];
    }else{
       $pg = 1;
    }
    $start_page = ($pg-1)* $limit;
    //mysqli_query($connection,"DELETE FROM books_data WHERE Book_id = '$id'");
    $data = mysqli_query($connection,"SELECT * FROM blogs ORDER BY id ASC LIMIT $start_page,$limit ") or die(mysqli_error($connection));
?>
<!DOCTYPE html>
<html>
  
  </script>
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
        <div class="row " id="view_blog">
          <div class="col-md-3 mt-5">
            <?php include 'admin_sidebar.php';?>
            </div>
          <div class="col-md-9 mt-4" id="add_blog" >
            <div class="row mt-4">
              <div class="col-md-3"><h5 class="mt-5 font-weight-bold" style="font-family: 'Ubuntu', sans-serif;">Books data</h5></div>
              <div class="col-md-7 "></div>
               <div class="col-md-2 pl-5"><button class="btn btn-sm mt-5" id="show_add" style="background-color: #1B91CF; color: white;">Add Blog</button></div>
            </div>

            <div class="card mt-3">
              <div class="card-body" id="main_page">
                <table class="table">
                  <thead class="" style="font-family: 'Ubuntu', sans-serif; ">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Blog Title</th>
                      <th scope="col">Blog</th>
                      <th scope="col">Image</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tdata">
                    <?php foreach($data as $value){?>
                            <tr id="deleting_row<?php// echo $value['Book_id'];?>">
                                <th  scope="row" style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $value['id'];?></th>
                                 <td style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $value['blog_title'];?></td>
                                 <!--<td style="font-family: 'Ubuntu', sans-serif; font-size:12px;"><?php //echo $value['blog_body'];?></td>-->
                                 <?php $half_value = substr($value['blog_body'], 0,60);

                                        
                                        // $decs = substr($half_value,0, strrpos($half_value,'   ')).'....';
                      
                                  $decs = substr($half_value,0, strrpos($half_value, ' ')).'<a href=../blog_detail.php?blog_id='.$value['id'].'><img src="../images/plus.png" style="height: 19px; width: 19px;" class="ml-2"></a>';?>
                                  <td style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $decs;?></td>
                                  <?php //echo "<td><button id='del_btn' onclick='delete_table(".$value['Book_id'].")'><img src='../images/delete_data.png' style='height: 25px;'></button></td>";//?>
                                  <?php echo"<td class='pl-4'><input type='image' id='delete_btn' src='../images/delete_data.png' style='height: 20px;' data-id='".$value['id']."'></td>";?>
                                  <?php echo "<td><input type ='image' id='update_btn' src='../images/edit.png' style='height: 20px;' data-id='".$value['id']."'></td>";?>
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
                              <a class="page-link" href="admin_blogs.php?page=<?php echo $pg-1;?>" aria-label="Previous">
                                <span aria-hidden="true" style="color: #1B91CF;">&laquo;</span>
                              </a>
                            </li>
                            <?php } ?>
                               <?php
                                 $query_2 = mysqli_query($connection,"SELECT * FROM blogs");
                                  $total_data = mysqli_num_rows($query_2);
                                  $total_page = ceil($total_data/$limit);
                            
                                  for($i=1;$i<=$total_page;$i++){
                            
                                   if($i==$pg){
                                         echo "<li class='page-item active'><a class='page-link' style='color: white;border-color: #1B91CF; background-color: #1B91CF; ' href='admin_blogs.php?page=".$i."'>$i</a></li>";

                                   }else{
                                          echo "<li class='page-item'><a class='page-link' style='color: #1B91CF;' href='admin_blogs.php?page=".$i."'>$i</a></li>";
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
                              <a class="page-link" href="admin_blogs.php?page=<?php echo $pg+1;?>" aria-label="Previous">
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
        <!-- Ajax Calls -->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script>
        // ajax call for adding and showing //

         $(document).on("click","#show_add",function(){
            $.ajax({
                url : "load_addblog.php",
                type : "GET",
                success : function(data){
                     $("#add_blog").html(data);
                    // $("#view_blog").hide();
                }
            });
         });
         
        $(document).on("submit","#admin_blog",function(e){
           e.preventDefault();
           $.ajax({
                url : "blog_add_query.php",
                type : "POST",
                data : new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success : function(data){
                      $("#admin_blog")[0].reset();
                     $('#error_msg').fadeIn().html(data);
                      setTimeout(function(){
                       $("#error_msg").fadeOut('slow');
                       }, 5000);  
                            
                }
                                     
         });   
            
                 
  });


        // ajax call for delrting the row //  
       $(document).on("click","#delete_btn",function(){
          var blog_id = $(this).data("id");
          var element = $(this);
          $.ajax({
              url : "blog_delete_query.php?blog_id="+blog_id,
              type : "GET",
              success : function(data){
                  if(data == 1){
                         $(element).closest("tr").fadeOut();
                  }
              }
          });
       });
       // ajax call for the updation section (showing form) //
       $(document).on("click","#update_btn",function(){
        var update_id = $(this).data("id");
           $.ajax({
               url : "load_updateblog?update_id="+update_id,
               type : "GET",
               success : function(data){
                  $("#add_blog").html(data);
                  //$("#view_blog").hide();

               }

           });
       });

       $(document).on("submit","#update_blog",function(e){
           e.preventDefault();
           $.ajax({
                url : "blog_update_query.php",
                type : "POST",
                data : new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success : function(data){
                    $("#error_msg").fadeIn().html(data);
                    setTimeout(function(){
                      $("#error_msg").fadeOut("slow");
                    },5000);
                     //                   
                }
           });
           

        });
      
     
    </script>
  </body>
  </html>
  
