<?php
session_start();
        include('connection.php');
       $connection = connect_db('localhost','root','','book_library');
       mysqli_query($connection,"INSERT INTO login_info (session_id, login_date, login_time) VALUES ('2', CURRENT_DATE(), CURRENT_TIME())")or die(mysqli_error($connection));

?>