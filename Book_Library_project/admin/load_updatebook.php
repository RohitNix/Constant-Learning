<?php 
$connection = mysqli_connect('localhost','root','','book_library');
if($_REQUEST['upd_id']){
   $id = $_REQUEST['upd_id'];
  $data = mysqli_query($connection,"SELECT * FROM books_data WHERE Book_id = '$id' ");
}
?>        <div id="success_msg"></div>
           <div class="container text-center my-5">
            <h4 class="font-weight-bold" style="font-family: 'Ubuntu', sans-serif;">Welcome ! Update your books here.</h4>
          </div>
          <form id="update_book" enctype="multipart/form-data"  method="post">
            <?php 
                 if(mysqli_num_rows($data)>0){
            foreach($data as $value){ ?>

            <label for="inputEmail4" class="font-weight-bold form_design ">Please enter Book name</label>
            <input class="form-control required form_design" name="book_name" id="book_name"required value="<?php echo $value['book_name']?>" /><br />
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputPassword4"  class="form_design font-weight-bold"  >Book Id</label>
                <input type="number" class="form-control form_design " name="id" id="book_id" required hidden value="<?php echo $value['Book_id']?>" >
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="form_design font-weight-bold"  >Name of the Author</label>
                <input type="text" class="form-control required form_design " name="author_name" id="author_name" required value="<?php echo $value['Author_name']?>" >
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="form_design font-weight-bold"  >Publishing Company</label>
                <input type="text" class="form-control required form_design " name="seller_name" id="pub_name" required value="<?php echo $value['seller_name']?>" >
              </div>
            </div>
            <label for="inputEmail4" class="form_design font-weight-bold" >Genres</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="genre" name="gener" value="Horror">
              <label class="form-check-label form_design font-weight-bold " for="inlineCheckbox1" >Horror</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="genre" name="gener" value="Romantic">
              <label class="form-check-label form_design font-weight-bold" for="inlineCheckbox2" >Romantic</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="genre" name="gener" value="Motivation">
              <label class="form-check-label form_design font-weight-bold" for="inlineCheckbox2" >Motivation</label>
            </div></br>
                         <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPassword4"  class="form_design font-weight-bold"  >Good Reads Rating </label>
                  <input type="text" class="form-control form_design  " name="Goodreads" id="good_read" value="<?php echo $value['Goodreads']?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4" class="form_design font-weight-bold" >Amajon Kindle Rating</label>
                  <input type="text" class="form-control required form_design " name="Kindle" id="kindle" value="<?php echo $value['kindle']?>" required>
                </div>
                 <div class="form-group col-md-4">
                  <label for="inputPassword4" class="form_design font-weight-bold"  >Publishing Year</label>
                  <input type="number" class="form-control required form_design " name="p_year" id="pub_year" value="<?php echo $value['publising_year']?>" required>
                </div>
              </div>
            <label for="inputEmail4" class="font-weight-bold form_design ">Please Upload image</label>
              <input type = "file"class="form-control required form_design" id="image" name="update_image" required /><br />
            <textarea class="form-control required" name="disc"  placeholder="Description about the book..." style="height:150px ;font-family: 'Ubuntu', sans-serif;font-size: 13px;" value="<?php echo $value['disc']?>" id="disc" ></textarea><br />
            <input  class="btn btn-block" style="background-color:#1B91CF;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;" type="submit" name="updated_book" id="edit_submit" value="Send" /><br /><br />
          <?php }} else {
                echo "Please enter proper id";
          } ?>
          </form>
  