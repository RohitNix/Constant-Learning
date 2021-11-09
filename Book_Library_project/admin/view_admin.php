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
    $data = mysqli_query($connection,"SELECT * FROM books_data ORDER BY Book_id ASC LIMIT $start_page,$limit ") or die(mysqli_error($connection));
?>
<table class="table">
                  <thead class="" style="font-family: 'Ubuntu', sans-serif; ">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Author Name</th>
                      <th scope="col">Book Name / Genre</th>
                      <th scope="col">Discription</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tdata">
                    <?php foreach($data as $value){?>
                            <tr id="deleting_row<?php echo $value['Book_id'];?>">
                                <th  scope="row" style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $value['Book_id'];?></th>
                                 <td style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $value['Author_name'];?></td>
                                 <td style="font-family: 'Ubuntu', sans-serif; font-size:12px;"><?php echo $value['book_name'];?></td>
                                 <?php $half_value = substr($value['disc'], 0,80);

                                        
                                        // $decs = substr($half_value,0, strrpos($half_value,'   ')).'....';
                      
                                  $decs = substr($half_value,0, strrpos($half_value, ' ')).'<a href=../book_detail.php?book_id='.$value['Book_id'].'><img src="../images/plus.png" style="height: 19px; width: 19px;" class="ml-2"></a>';?>
                                  <td style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $decs;?></td>
                                  <?php //echo "<td><button id='del_btn' onclick='delete_table(".$value['Book_id'].")'><img src='../images/delete_data.png' style='height: 25px;'></button></td>";//?>
                                  <?php echo"<td class='pl-4'><input type='image' id='delete_btn' src='../images/delete_data.png' style='height: 20px;' data-id='".$value['Book_id']."'></td>";?>
                                  <?php echo "<td><input type ='image' id='update_btn' src='../images/edit.png' style='height: 20px;' data-id='".$value['Book_id']."'></td>";?>
                                  <?php //echo "<td><button id='dela_btn' data-id='".$value['Book_id']."'><img src='../images/delete_data.png' style='height: 25px;'></button></td>";//?>
                                  <?php //echo "<td><a href=updation_form.php?id=".$value['Book_id']."><img src='../images/edit.png' style='height: 25px;'></a></td>";//?>
                            </tr>
                      <?php } ?>
                    </tbody>
                  </table>