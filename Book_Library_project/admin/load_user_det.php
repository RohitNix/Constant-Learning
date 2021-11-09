<?php
 $connection = mysqli_connect('localhost','root','','book_library');
 if($_REQUEST['user_id']){
    $id =$_REQUEST['user_id'];
    $query_1 = mysqli_query($connection,"SELECT * FROM student_register WHERE user_id = '$id'"); 
    $query_2 = mysqli_query($connection,"SELECT * FROM session_fav WHERE user_id = '$id'")or die(mysqli_error($connection));
    // process of the pagination starts here for the login and logout //

    $query_3 = mysqli_query($connection,"SELECT * FROM login_info WHERE session_id = '$id' ORDER BY login_time_id ASC "); 
    
  }
?>

      <div class="container">
        <div class="row">
          <div class="col-md-4 mt-4">
            <h3 class="text-center" style="font-family: 'Ubuntu', sans-serif;">User Details</h3>
            <div class="card shadow p-3 mb-5 bg-white rounded">
               <ul class="list-group list-group-flush mx-4">

                <?php
                 foreach ($query_1 as $value) {?>
                  <li class="list-group-item user_info_li text-center"><img src="../images/default.jpg" style="height: 112px;width: 118px;border-radius: 61px"></li>
                  <li class="list-group-item user_info_li"><p class="user_info"><strong>User Id : </strong><?php echo $value['user_id'];?></p></li>
                  <li class="list-group-item user_info_li"><p class="user_info"><strong>User Name : </strong><?php echo $value['user_name'];?></p></li>
                  <li class="list-group-item user_info_li"><p class="user_info"><strong>Email : </strong><?php echo $value['user_email'];?></p></li>
                  <li class="list-group-item user_info_li"><p class="user_info"><strong>Phone : </strong><?php echo $value['phone'];?></p></li>
                  

                 <?php }?>
               </ul>
            </div>
          </div>
          <div class="col-md-8 mt-4">
            <h3 class="text-center" style="font-family: 'Ubuntu', sans-serif;">User Favorites</h3>
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="row">
                  <?php foreach($query_2 as $value){
                       $book_name = $value['book_name'];
                       $book_data = mysqli_query($connection,"SELECT * FROM books_data WHERE book_name = '$book_name'")or die(mysqli_error());
                       foreach($book_data as $data){
                    ?>

                   <div class="col-md-3">
                      <div class="card shadow p-3 mb-5 bg-white rounded">
                        <img src="../<?php echo $data['image'];?>">
                        <p style="font-family: 'Ubuntu', sans-serif;font-size: 13px;" class="mt-2"><?php echo $data['book_name'];?></p>
                   </div>
                </div>
              <?php }} ?>
            </div> 
          </div>
        </div>
      </div>
          <div class="row">
             <div class="col-md-8">
              <h3 class="text-center" style="font-family: 'Ubuntu', sans-serif;">User Login Details</h3>
              <div class="card shadow p-3 mb-5 bg-white rounded mb-3" style="height: 295px;overflow: hidden;overflow-y: scroll;">
                <table class="table">
                  <thead class="" style="font-family: 'Ubuntu', sans-serif; ">
                    <tr>
                      <th scope="col">login Date</th>
                      <th scope="col">Login Time</th>
                      <th scope="col">Logged in Duration</th>
                      <th scope="col">Logout Time</th>
                    </tr>
                  </thead>
                  <tbody id="tdata">
                    <?php foreach($query_3 as $value){?>
                                <th  scope="row" style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $value['login_date'];?></th>
                                 <td style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $value['login_time'];?></td>
                                 <td style="font-family: 'Ubuntu', sans-serif; font-size:12px;"><?php echo"00:00:00";?></td>
                                  <td style="font-family: 'Ubuntu', sans-serif; font-size:12px; "><?php echo $value['logout_time'];?></td>
                            </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
             </div>
           </div>
          </div> 

  