<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liostasi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <a href = "#intro" class = "nav-link">intro</a>
              </li>
              <li class = "nav-item">
                <a href = "#detail" class = "nav-link">info</a>
              </li>
              <li class = "nav-item">
                <a href = "#team" class = "nav-link">gallery</a>
              </li>

              <li class = "nav-item">
                <a href = "#contact" class = "nav-link">contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class = "hero-div center container">
        <h1>WELCOME TO LIOSTASI
          HOTEL & SUITES</h1>
        <p class = "animate__animated animate__fadeInUp animate__slow">Sea View Luxury Boutique Hotel In Ios, Greece</p>

        <div class = "hero-btns animate__animated animate__fadeInUp animate__slow">
          <button onclick="location.href = 'rooms.php'" type = "button" class = "btn-trans">book now</button>
          <!-- <button type = "button" class = "btn-white">meet our people</button> -->
        </div>
      </div>
    </header>
    <!-- end of header -->

    <!-- detail section -->
    <section class = "detail" id="detail">
      <div class = "container">
        <div class="tit">
          <h1 class = "wow animate__animated animate__bounceIn animate__slow">THE HOTEL</h1>
          <p>The Liostasi Hotel & Suites experience is a mindful fusion of impeccable services and heartwarming hospitality that inspires effortless-chic leisure.

            Its authentic Cycladic character and breathtaking sea views highlight a carefully curated collection of art and design, composing a refined ambience of casual elegance and unpretentious luxury.</p>
        </div>
        <div class = "row">
          <div class = "detail-item wow animate__animated animate__fadeInLeft animate__slow">
            
            <img src="assets/4.jpg" alt="">
          </div>

          <div class = "detail-item wow animate__animated animate__fadeInUp animate__s">
           
            <img src="assets/5.jpg" alt="">
            </div>

          <div class = "detail-item wow animate__animated animate__fadeInRight animate__slow">
            <img src="assets/6.jpg" alt="">
            </div>
        </div>
      </div>
    </section>
    <!-- end of detial section -->
    
    <!-- features section -->
    <section class = "feature" id = "feature">
      <div class = "container">
        <div class = "row">
          <div class = "feature-left wow animate__animated animate__fadeInUp animate__slow">
            <img src = "assets/1.jpg" alt = "">
          </div>
          <div class = "feature-right wow animate__animated animate__fadeInUp animate__slow">
            <div class = "title">
              <h2>EXPLORE</h2>
              <p class = "text">Wild spaces, inspired design</p>
            </div>

            <div class = "feature-item">
              <span><i class = "fas fa-clone"></i></span>
              <div>
                
                <p class = "text">The Okavango Delta provides the palette of inspiration for the interiors of Xigera Safari Lodge, with even the smallest details showing a deep connection to the natural world beyond the lodge. Meticulously created and crafted, in every sense the décor pays homage to both the human and natural heritage of this remarkable corner of Africa.</p>
              </div>
            </div>

            <div class = "feature-item">
              <span><i class = "fas fa-clone"></i></span>
              <div>
                
                <p class = "text">Conceptualised by Toni Tollman, Philip Fourie and Anton de Kock – in collaboration with award-winning South African gallery Southern Guild – the Xigera Design Collection is breathtaking in both its scope and bold vision.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of features section -->

    <!-- sample video section -->
    <section class = "video">
      <div class = "container">
        <a class = "center popup-youtube" href = "https://www.youtube.com/watch?v=_Sg50YLjqLU">
          <i class = "fas fa-play"></i>
        </a>
        <h2 class = "wow animate__animated animate__fadeInUp animate__slow">Have a glance</h2>
        <p class = "wow animate__animated animate__fadeInUp animate__slow">Sleek, boutique hotel with breathtaking views of the Aegean. </p>
      </div>
    </section>
    <!-- end of sample video section -->

    <!-- team section -->
    <section class = "team" id = "team">
      <div class = "container">
        <div class = "title">
          <h2 class = "wow animate__animated animate__bounceIn animate__slow">GALLERY</h2>
          <p class = "text">Take a tour through our gallery and be inspired to visit us.</p>
        </div>

        <div class = "row owl-carousel owl-theme wow animate__animated animate__fadeInUp animate__slow">
        <?php
					require_once 'admin/db.php';
					$query = $db->query("SELECT * FROM `gallery` ORDER BY `id` ASC") or die("mysql_error()");
					while($fetch = $query->fetch_array()){
		?>

          <div class = "team-item">
            <div class = "team-img">
              <img src = "assets/<?php echo $fetch['photo']?>" alt = "">
            </div>
          </div>
        
          <?php
					}
				?>
        </div>
      </div>
    </section>
    <!-- end of team section -->
    
    

    

    <!-- contact section -->
    <section class = "contact" id = "contact">
      <div class = "container">
        <div class = "title">
          <h2 class = "wow animate__animated animate__bounceIn animate__slow">Contact Us</h2>
          <p class = "text">Have any questions? We are here to help!</p>
        </div>

        <div class = "row wow animate__animated animate__fadeInUp animate__slow">
          <div class = "contact-left">
            <h2>Send Message Here</h2>
            <form action="process.php" method="post">

              <?php 
                            $Msg = "";
                            if(isset($_GET['error']))
                            {
                                $Msg = " Please Fill in the Blanks ";
                                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


                               <script>
                                 swal({
                                    title: "Email Not Sent",
                                    text: "Please Fill in the Blanks",
                                    icon: "error",
                                    button: "OK",
                                  });
                               </script>';
                            }

                            if(isset($_GET['success']))
                            {
                                $Msg = " Your Message Has Been Sent ";
                                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


                               <script>
                                 swal({
                                    title: "Email Sent",
                                    
                                    icon: "success",
                                    button: "DONE",
                                  });
                               </script>';
                            }
                        
                        ?>

              <input type = "text" class = "form-control" name="name" placeholder="Name">
              <input type = "email" class = "form-control" name="Email" placeholder="Email">
              <textarea placeholder="Message" name="msg" rows = "6"></textarea>
              <button type = "submit" class = "submit-btn" name="btn-send">Send Now</button>
            </form>
          </div>

          <div class = "contact-right">
            <div>
              <h2>Address</h2>
              <p class = "text">Ios Cyclades, 84001, Greece Ios Cyclades, 840 01, Greece</p>
            </div>
            <div>
              <h2>Call Us</h2>
              <p class = "text">+30 2286 092140</p>
            </div>
            <div>
              <h2>Send Email</h2>
              <p class = "text">hotel@liostasi.com</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of contact section -->

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