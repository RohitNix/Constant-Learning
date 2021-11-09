<?php
/*include('connection.php');
$connection = connect_db('localhost','root','','book_library');
  if(isset($_POST['updated_book'])){
  	 $book_id = $_POST['id']; 
     $book_name = $_POST['book_name']; 
     $author_name = $_POST['author_name']; 
     $seller_name = $_POST['seller_name'];
     $genre = $_POST['genre'];
     $disc = $_POST['disc'];
     $p_year = $_POST['p_year'];
     $goodreads = round($_POST['Goodreads']);
     $kindle = round($_POST['Kindle']);
     $_FILES['update_image'];
     $folder = "data_image/".$_FILES['update_image']['name'];
     move_uploaded_file($_FILES['update_image']['tmp_name'], $folder) or die();
     mysqli_query($connection,"UPDATE books_data SET book_name = '$book_name',Author_name = '$author_name',seller_name = '$seller_name',geners = 'genre',disc = '$disc' , image = '$folder', Goodreads = '$goodreads', kindle = '$kindle', publising_year = '$p_year' WHERE Book_id = '$book_id'")or die(mysqli_error($connection));
     header('location:view.php');
}
*/
function update_book($book_id,$book_name,$author_name,$seller_name,$genre,$dics,$p_year,$goodreads,$kindle,$folder,$connection){
  mysqli_query($connection,"UPDATE books_data SET book_name = '$book_name',Author_name = '$author_name',seller_name = '$seller_name',geners = 'genre',disc = '$dics' , image = '$folder', Goodreads = '$goodreads', kindle = '$kindle', publising_year = '$p_year' WHERE Book_id = '$book_id'")or die(mysqli_error($connection));
     header('location:view.php');
}

 function update_student($user_name,$user_email,$phone,$user_id,$connection){
        mysqli_query($connection,"UPDATE student_register SET user_name = '$user_name',user_email = '$user_email',phone = '$phone' WHERE user_id = '$user_id' ")or die(mysqli_query($connection));
         return true;
         header('location:my_account.php?menu=Update Profile');
        
     }
function update_student_password($password,$user_id,$connection){
      mysqli_query($connection,"UPDATE student_register SET password = '$password' WHERE user_id = '$user_id' ")or die(mysqli_query($connection));
       return true;
       header('location:my_account_cngpass.php?menu=Update Password');

}

?>