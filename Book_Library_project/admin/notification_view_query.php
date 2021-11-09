<?php
$connection = mysqli_connect('localhost','root','','book_library');
$id =  $_REQUEST['notification_id'];
$query_1 = mysqli_query($connection,"SELECT * FROM user_contact_us WHERE id = '$id'");
?>
<div class="card shadow p-3 mb-5 bg-white rounded">
	<?php foreach ($query_1 as $value) { ?>
	    <p><?php echo $value['user_name']; ?></p>
	    <p><?php echo $value['user_email']; ?></p>
	    <p><?php echo $value['dispcription']; ?></p>
	<?php } ?>
   <p> </p>
</div>	