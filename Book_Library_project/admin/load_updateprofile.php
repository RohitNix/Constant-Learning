<?php
  $connection = mysqli_connect('localhost','root','','book_library');
    if($_REQUEST['profile_id']){
       $id = $_REQUEST['profile_id'];
       $data = mysqli_query($connection,"SELECT * FROM admin_register WHERE admin_id = '$id'");
    }
?>
<div id = "success_msg"></div>
<?php foreach($data as $value){?>
<form name="admin_register" method="post" id="admin_update" enctype="multipart/form-data">
  <label for="inputEmail4" class="font-weight-bold form_design ">Please enter your User Name</label>
  <input class="form-control required form_design" type="text" value="<?php echo $value['admin_name'];?>"   name="admin_name" required/><br />
  <input type="text" name="admin_id" hidden value="<?php echo $value['admin_id'];?>">
  
  <label for="inputEmail4" class="font-weight-bold form_design ">Please enter your Email.</label>
  <input class="form-control required form_design" type="email" value="<?php echo $value['admin_email'];?>"  name="admin_email" required/><br />
  
  <label for="inputEmail4" class="font-weight-bold form_design ">Please enter your Phone Number</label>
  <input class="form-control required form_design" type="number" value="<?php echo $value['admin_phone'];?>"  name="admin_phone" required/><br />
  <label for="inputEmail4" class="font-weight-bold form_design ">Please Upload image</label>
  <input type = "file"class="form-control required form_design"  name="admin_image"  /><br />
  <input type="submit" name="admin_register" class="btn btn-block" id="profile_update" style="background-color: #1B91CF;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;">
</form>
<?php }?>