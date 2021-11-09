<?php
include('connection.php');
$connection = connect_db('localhost','root','','book_library');
   $id = $_POST['name'];
   $name = $_POST['phone'];
   $email = $_POST['email'];
   $text = $_POST['text'];
   $phone = $_POST['phone'];
   $query =  mysqli_query($connection,"INSERT INTO user_contact_us(user_name,user_email,dispcription,phone) VALUES ('$name','$email','$text','$phone')");
    if($query){
      echo"<div class='alert alert-success mt-2' id='alert' role='alert'>
                <strong>Success! </strong>Our executive will soon in touch with you.
           </div>";
}else{
     echo"<div class='alert alert-danger mt-2' id='alert' role='alert'>
                <strong>Error! </strong> We are reported the issue againt your subbmission.. 
            </div>";
}

?>