<?php 
	require_once 'admin/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <!-- normalize css -->
    <link rel = "stylesheet" href = "resources/normalize.css">
    <!-- font -->
    <link rel = "stylesheet" href = "resources/font.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- magnific popup -->
    <link rel = "stylesheet" href = "resources/Magnific-Popup-master/dist/magnific-popup.css">
    <!-- owl carousel -->
    <link rel = "stylesheet" href = "resources/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
    <link rel = "stylesheet" href = "resources/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <!-- animate css -->
    <link rel = "stylesheet" href = "resources/animate.css-main/animate.css">
    <!-- custom (main) css -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/addroom.css">
    <style>
        .header{
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.7)), url("assets/cover.jpg");
        }

    </style>
    
</head>
<body>
   <!-- header -->
   <header class = "header" id = "intro">
      <nav class = "navbar">
        <div class = "container">
          <div class = "brand-and-toggler">
            <a href = "index.html" class = "navbar-brand">
              Design<span>.</span>Diva
            </a>
            <button type = "button" class = "navbar-toggler" id = "navbar-toggler">
              <i class = "fas fa-bars"></i>
            </button>
          </div>

          <div class = "navbar-collapse">
            <ul class = "navbar-nav">
              <li class = "nav-item">
                <a href = "index.html#intro" class = "nav-link">intro</a>
              </li>
              <li class = "nav-item">
                <a href = "index.html#detail" class = "nav-link">info</a>
              </li>
              <li class = "nav-item">
                <a href = "index.html#team" class = "nav-link">gallery</a>
              </li>

              <li class = "nav-item">
                <a href = "index.html#contact" class = "nav-link">contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
  <div class="wrapper">
    <div class="title">

        

    </div>
  </div>
   </header> 
</body>
</html>

<?php
	require_once 'admin/db.php';
	if(ISSET($_POST['add_guest'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contactno = $_POST['contactno'];
		$checkin = $_POST['date'];
		$db->query("INSERT INTO `guest` (firstname, lastname, address, contactno) VALUES('$firstname', '$lastname', '$address', '$contactno')") or die("mysqli_error()");
		$query = $db->query("SELECT * FROM `guest` WHERE `firstname` = '$firstname' && `lastname` = '$lastname' && `contactno` = '$contactno'") or die("mysqli_error()");
		$fetch = $query->fetch_array();
		$query2 = $db->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `room_id` = '$_REQUEST[room_id]' && `status` = 'Pending'") or die("mysqli_error()");
		$row = $query2->num_rows;
		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Must be present date')</script>";
			}else{
				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'>Not Available Date</label><br />";
							$q_date = $db->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die("mysqli_error()");
							while($f_date = $q_date->fetch_array()){
								echo "<ul>
										<li>	
											<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
										</li>
									</ul>";
							}
						"</div>";
				}else{	
						if($guest_id = $fetch['guest_id']){
							$room_id = $_REQUEST['room_id'];
							$db->query("INSERT INTO `transaction`(guest_id, room_id, status, checkin) VALUES('$guest_id', '$room_id', 'Pending', '$checkin')") or die("mysqli_error()");
							header("location:reply_reserve.php");
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
			}	
	}	
?>