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
    <link rel="stylesheet" href="css/rooms.css">
    
</head>
<body>
   <!-- header -->
   <header class = "header" id = "intro">
      <nav class = "navbar">
        <div class = "container">
          <div class = "brand-and-toggler">
            <a href = "index.php" class = "navbar-brand">
            Lio<span>sta</span>si
            </a>
            <button type = "button" class = "navbar-toggler" id = "navbar-toggler">
              <i class = "fas fa-bars"></i>
            </button>
          </div>

          <div class = "navbar-collapse">
            <ul class = "navbar-nav">
              <li class = "nav-item">
                <a href = "index.php#intro" class = "nav-link">intro</a>
              </li>
              <li class = "nav-item">
                <a href = "index.php#detail" class = "nav-link">info</a>
              </li>
              <li class = "nav-item">
                <a href = "index.php#team" class = "nav-link">gallery</a>
              </li>

              <li class = "nav-item">
                <a href = "index.php#contact" class = "nav-link">contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class = "hero-div center container">
        <h1>SUITES</h1>
        <p class = "animate__animated animate__fadeInUp animate__slow">Gracefully set on a hillside, overlooking the Aegean Sea, Liostasi is designed to offer high-end hospitality in harmony with the liberating serenity of seascape. Our 28 artfully curated rooms & suites, reflect our welcoming narrative that revolves around a life changing holiday experience; inspiring guests to tune in a world of indulging well-being and relaxation.</p>

        <div class = "hero-btns animate__animated animate__fadeInUp animate__slow">
          <button onclick="location.href = '#pricing'" type = "button" class = "btn-trans">discover</button>
          <!-- <button type = "button" class = "btn-white">meet our people</button> -->
        </div>
      </div>
   </header> 
   <section class = "pricing" id = "pricing">
      <div class = "container">
        <div class = "title">
          <h2 class = "wow animate__animated animate__bounceIn animate__slow">Our Suites</h2>
          <p class = "text">More Ease. More Affordable.</p>
        </div>

        <div class = "row wow animate__animated animate__fadeInUp animate__slow">
        <?php
					require_once 'admin/db.php';
					$query = $db->query("SELECT * FROM `room` ORDER BY `price` ASC") or die("mysql_error()");
					while($fetch = $query->fetch_array()){
				?>

          <div class = "pricing-item">
              <img src="photo/<?php echo $fetch['photo']?>" alt="">
            <h2><?php echo $fetch['room_type']?></h2>
            <div class = "price">
              <span><?php echo "Rs ".$fetch['price']?></span>
              <span class = "text">per day</span>
            </div>
           
            <div class="res">
                <a style="border: 1px solid #1BBC9C;
        padding: 3px 10px;
        background-color: #1BBC9C;
        color: white;" href = "add_reserve.php?room_id=<?php echo $fetch['room_id']?>" class = "btn btn-info heffect">Reserve</a>
						
            </div>
          </div>
          <?php
					}
				?>
          
        </div>
      </div>
    </section>

    <!-- footer -->
    <footer class = "footer center">
      <div class = "container">
        <p class = "text">Copyright &copy; Liostasi Website by Ashwati Rao | All Rights Reserved</p>
        <div class = "footer-links">
          <a href = "#" class = "center">
            <i class = "fab fa-facebook-f"></i>
          </a>
          <a href = "#" class = "center">
            <i class = "fab fa-instagram"></i>
          </a>
          <a href = "#" class = "center">
            <i class = "fab fa-linkedin"></i>
          </a>
          <a href = "#" class = "center">
            <i class = "fab fa-twitter"></i>
          </a>
          <a href = "#" class = "center">
            <i class = "fab fa-pinterest"></i>
          </a>
        </div>
      </div>
    </footer>
    <!-- end of footer -->
  

    <!-- jQuery -->
    <script src = "resources/jquery-3.5.1.js"></script>
    <!-- magnific popup -->
    <script src = "resources/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>
    <!-- owl carousel -->
    <script src = "resources/OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <!-- wow js -->
    <script src = "resources/WOW-master/dist/wow.js"></script>
    <!-- custom js -->
    <script src="js/script.js" ></script>
    
</body>
</html>