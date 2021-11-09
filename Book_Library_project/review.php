<?php
    include('connection.php');
    $connection = connect_db('localhost','root','','book_library');

  $data = mysqli_query($connection,"SELECT * FROM books_data WHERE Book_id = 13 ")or die(mysqli_error($connection));
  foreach($data as $value){
      $rating=$value['Goodreads'];
      for($i=1;$i<=$rating;$i++){
      	    echo "<img  src='images/favourite.png' style='height: 30px'>";
      }
  }

?>