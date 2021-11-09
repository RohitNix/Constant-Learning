            <div class="card shadow p-3 mb-5 bg-white rounded admin_sidebar" style="height: 659px; border-color: #1B91CF;">
              <div class="list-group list-group-flush mx-5 ">
                <ul class="list-group list-group-flush">
                                   <li class="list-group-item text-center"><a href="#" class="admin_sidebar align-content-center"><?php if($_SESSION['profile'] != 1){?><img src="<?php echo $_SESSION['profile'];?>" style="height: 90px;width: 96px;border-radius: 61px"><?php }else{?><img src="../images/default.jpg" style="height: 90px;width: 96px;border-radius: 61px"><?php }?></a>
                    <p class="mt-2 font-weight-bold" style="font-family: 'Ubuntu', sans-serif;"><?php echo $_SESSION['admin_name'];?></p>
                  </li>
                  
                  <li class="list-group-item"><a href="index.php" class="admin_sidebar">Admin</a></li>
                  <li class="list-group-item"><a href="admin_books.php" class="admin_sidebar">Add Books</a></li>
                  <li class="list-group-item"><a href="admin_blogs.php" class="admin_sidebar">Add Blogs</a></li>
                  <li class="list-group-item"><a href="admin_users.php" class="admin_sidebar">CRM Users.</a></li>
                  <li class="list-group-item"><a href="admin_profile.php" class="admin_sidebar">Update Profile</a></li>
                  <li class="list-group-item"><a href="index.php" class="admin_sidebar disabled">Notification</a></li>
                </ul>
              </div>
            </div>