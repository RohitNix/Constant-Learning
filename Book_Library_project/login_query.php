<?php
if(isset($_REQUEST['login'])){
     include('connection.php');
       $connection = connect_db('localhost','root','','book_library');
       $login_email = $_REQUEST['login_email'];
       $login_password = $_REQUEST['login_password'];
       $query_1 = mysqli_query($connection,"SELECT * FROM student_register WHERE user_email = '$login_email'");
       $login_password="";
       $login_email="";
       if(mysqli_num_rows($query_1)>0){
               foreach($query_1 as $value){
                        if($login_password == $value['password']){
                              header('location:home.php');
                        }else{
                        	echo "Incorrect password !!"; 
                            $login_password = true;
                        }
               }
       }else{
       	 echo"Please enter proper email ";
         $login_email = true;
         //header('location:register_login.php');
       }
}

?>