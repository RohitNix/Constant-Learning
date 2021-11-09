<?php
include('connection.php');
$connection = connect_db('localhost','root','','book_library');
$id = 4;

/*$data = mysqli_query($connection,"SELECT * FROM login_info WHERE login_time_id ='$id'");
foreach ($data as $value) {
                    $login = $value['login_time'];
                   // 
                    $expl = explode(":", $login);
                    echo"<pre>";
                    print_r($expl);

                    $logout = explode(":", $value['logout_time']);
                    print_r($logout);
                    echo"<pre>";
                  //echo $logout."<br>";
                 // echo $login;
                    $main_data = $logout[0]-$expl[0].":".$logout[1]-$expl[1].":".$logout[2]-$expl[2];
                   // echo $main_data;
                    $login = is_string($main_data);
                    //echo $login;
 
                    $input = $value['login_date']);
                    $date = strtotime($input);
                    echo date('h:i:s', $date);


              //    $diff=$logout-$login;
                //  date_default_timezone_set('Asia/Kolkata');
                // echo date("h:i:s", strtotime($diff)); 
                 // $logout=round($diff/60)." minutes ".($diff%60)." seconds <br>";
                 // echo $logout;
}
/*<?php
      $endday =  date("d", strtotime($propertydetail['endbidtime']));
              $endmonth =  date("F", strtotime($propertydetail['endbidtime']));
              $endyear =  date("Y", strtotime($propertydetail['endbidtime']));
               $endtime =  date("h:i:s", strtotime($propertydetail['endbidtime'])); 
     ?>  

     <?php
      $startday =  date("d", strtotime($propertydetail['startbidtime']));
              $startmonth =  date("F", strtotime($propertydetail['startbidtime']));
              $startyear =  date("Y", strtotime($propertydetail['startbidtime']));
               $startime =  date("h:i:s", strtotime($propertydetail['startbidtime'])); 

               */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
<form method="post">
  Username
  <input type="text" name="username" autofocus="" autocapitalize="none" autocomplete="username" required="" id="id_username">
  Password
  <input type="password" name="password" autocomplete="current-password" required="" id="id_password">
  <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</body>
<script type="text/javascript">
	const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</html>
