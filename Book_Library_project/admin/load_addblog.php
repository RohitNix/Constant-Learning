
<div id = "error_msg" ></div>
 <form action="#" method="post" name="Add_Book" id="admin_blog" enctype="multipart/form-data">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="inputPassword4"  class="form_design font-weight-bold"  >Blog Id</label>
			<input type="number" class="form-control form_design  " name="id" id="inputPassword4" required>
		</div>
		<div class="form-group col-md-6">
			<label for="inputEmail4" class="form_design font-weight-bold"  >Blog Title</label>
			<input type="text" class="form-control required form_design " name="blog_title" id="inputEmail4" required>
		</div>
	</div>
	<label for="inputEmail4" class="font-weight-bold form_design ">Please Upload image</label>
	<input type = "file"class="form-control required form_design" name="blog_image"  /><br />
	<textarea class="form-control required" name="blog"  placeholder="Description about the book..." style="height:150px ;font-family: 'Ubuntu', sans-serif;font-size: 13px;"></textarea><br />
	<input  class="btn btn-block" style="background-color: #1B91CF;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;" type="submit" name="submit_blog" id="submit_blog" value="Send" /><br />
	
</form>