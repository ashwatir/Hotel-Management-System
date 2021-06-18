<?php
   include('db.php');
  session_start();
  date_default_timezone_set("Asia/Calcutta");
   if(isset($_POST['login_user'])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT * FROM login WHERE username = '$myusername' and pw = '$mypassword'";
      $results = mysqli_query($db, $sql);	
	if (mysqli_num_rows($results)) {
		# code...
		$_SESSION['user'] = $myusername;
		$_SESSION['success'] = "YOU are now logged in";
		header('location: home.php');
	} else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>