         <div id = "success_msg"></div>
           <div class="container text-center my-5">
            <h4 class="font-weight-bold" style="font-family: 'Ubuntu', sans-serif;">Welcome ! Add your books here.</h4>
          </div>
                <form action="#" method="post" name="Add_Book" id="admin_insert" enctype="multipart/form-data">
              <label for="inputEmail4" class="font-weight-bold form_design ">Please enter Book name</label>
              <input class="form-control required form_design" name="book_name" required/><br />
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPassword4"  class="form_design font-weight-bold"  >Book Id</label>
                  <input type="number" class="form-control form_design  " name="id" id="inputPassword4" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4" class="form_design font-weight-bold"  >Name of the Author</label>
                  <input type="text" class="form-control required form_design " name="author_name" id="inputEmail4" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4" class="form_design font-weight-bold"  >Publishing Company</label>
                  <input type="text" class="form-control required form_design " name="seller_name" id="inputPassword4" required>
                </div>
              </div>
              <label for="inputEmail4" class="form_design font-weight-bold" >Genres</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="genre" value="Horror">
                <label class="form-check-label form_design font-weight-bold " for="inlineCheckbox1" >Horror</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="genre" value="Romantic">
                <label class="form-check-label form_design font-weight-bold" for="inlineCheckbox2" >Romantic</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="genre" value="Motivation">
                <label class="form-check-label form_design font-weight-bold" for="inlineCheckbox2" >Motivation</label>
              </div></br>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPassword4"  class="form_design font-weight-bold"  >Good Reads Rating </label>
                  <input type="text" class="form-control form_design  " name="Goodreads" id="inputPassword4" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4" class="form_design font-weight-bold" >Amajon Kindle Rating</label>
                  <input type="text" class="form-control required form_design " name="Kindle" id="inputEmail4" required>
                </div>
                 <div class="form-group col-md-4">
                  <label for="inputPassword4" class="form_design font-weight-bold"  >Publishing Year</label>
                  <input type="number" class="form-control required form_design " name="p_year" id="inputPassword4" required>
                </div>
              </div>
              <label for="inputEmail4" class="font-weight-bold form_design ">Please Upload image</label>
              <input type = "file"class="form-control required form_design" name="book_image"  /><br />
              <textarea class="form-control required" name="disc"  placeholder="Description about the book..." style="height:150px ;font-family: 'Ubuntu', sans-serif;font-size: 13px;"></textarea><br />
              <input  class="btn btn-block" style="background-color: #1B91CF;color: white; font-family: 'Ubuntu', sans-serif;font-size: 13px;" type="submit" name="submit_book" value="Send" /><br /><br />
            </form>

  