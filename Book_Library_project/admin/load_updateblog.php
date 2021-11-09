<?php
 $connection = mysqli_connect('localhost','root','','book_library');
   if($_REQUEST['update_id']){
       $id = $_REQUEST['update_id'];
      $data = mysqli_query($connection,"SELECT * FROM blogs WHERE id = '$id'");
  }
?>
<?php foreach ($data as $value){?>
	<div id ="error_msg"></div>
<form action="#" method="post" name="Add_Book" id="update_blog" enctype="multipart/form-data">
	
		
			
			<input type="text" class="form-control required form_design" id="id" name="blog_id" required hidden value="<?php echo $value['id']?>" /><br />
		
			<label for="inputEmail4" class="form_design font-weight-bold"  >Blog Title</label>
			<input type="text" class="form-control required form_design " name="blog_title" id="inputEmail4" value="<?php echo $value['blog_title'];?>" required>
	<label for="inputEmail4" class="font-weight-bold form_design ">Please Upload image</label>
	<input type = "file"class="form-control required form_design" name="blog_image"  /><br />
	<textarea class="form-control required" name="blog"  placeholder="Description about the book..." style="height:150px ;font-family: 'Ubuntu', sans-serif;font-size: 13px;" value="<?php echo $value['blog_body'];?>"></textarea><br />
	<input  class="btn btn-block" style="background-color: #1B91CF;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;" type="submit" name="submit_blog" id="submit_blog" value="Send" /><br />

	
	
</form>
<?php }?>