
<?php
  include('signup_process.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="zxx"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Bingo One page parallax responsive HTML Template ">
  
  <meta name="author" content="Themefisher.com">

  <title>www.Coinsglobal.com</title>

<!-- Mobile Specific Meta
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
  
  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font.v-2/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

  

</head>

<body id="body">

 <!--
  Start Preloader
  ==================================== -->
  <div id="preloader">
    <div class="preloader">
      <div class="sk-circle1 sk-child"></div>
      <div class="sk-circle2 sk-child"></div>
      <div class="sk-circle3 sk-child"></div>
      <div class="sk-circle4 sk-child"></div>
      <div class="sk-circle5 sk-child"></div>
      <div class="sk-circle6 sk-child"></div>
      <div class="sk-circle7 sk-child"></div>
      <div class="sk-circle8 sk-child"></div>
      <div class="sk-circle9 sk-child"></div>
      <div class="sk-circle10 sk-child"></div>
      <div class="sk-circle11 sk-child"></div>
      <div class="sk-circle12 sk-child"></div>
    </div>
  </div> 
  <!--
  End Preloader
  ==================================== -->


  
<!--
Fixed Navigation
==================================== -->
<section class="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="currency-status">
                    <li>
                        <a href="#">
                            <i class="tf-ion-arrow-down-b down-status"></i>
                            <span>BTC/USD</span>
                            <span>15046.07</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="tf-arrow-dropup up-status"></i>
                            <span>ETH/USD</span>
                            <span >843.0005</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="tf-arrow-dropup up-status"></i>
                            <span>BCH/USD</span>
                            <span>2648.1377</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="tf-arrow-dropup up-status"></i>
                            <span>BTG/USD</span>
                            <span>278.0000</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="tf-arrow-dropup down-status"></i>
                            <span>DASH/USD</span>
                            <span>1131.8100</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="tf-arrow-dropup down-status"></i>
                            <span>XRP/USD</span>
                            <span>2.1956</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="tf-arrow-dropup up-status"></i>
                            <span>ZEC/USD</span>
                            <span>2.1956</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="header  navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/coinsglobal.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="tf-ion-android-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="About.html">About</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="Rules.html">Rules</a>
                          </li>
                            <li class="nav-item">
                                <a class="nav-link" href="faq.html">F.A.Q</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Support</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">Sign In</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="signup.html">Sign Up <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
            </div>
        </div>
    </div>
</section>



<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="block text-center">
          <form class="text-left " name="regform" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <h4 class="text-center" style="color: black;">Create Your Account</h4>
            <div class="form-group">
            <?php echo"$first_name_err"; ?>
              <input type="text" class="form-control"  placeholder="Your First Name" name="first_name" value="<?php echo"$first_name";?>">
            </div>
            <div class="form-group">
            <?php echo"$last_name_err"; ?>
              <input type="text" class="form-control" placeholder="Your Last Name" name="last_name" value="<?php echo"$last_name";?>">
            </div>
            <div class="form-group">
            <?php echo"$username_err"; ?>
              <input type="text" class="form-control"  placeholder="Your username" name="username" value="<?php echo"$username";?>">
            </div>
            <div class="form-group">
            <?php echo"$password_err"; ?>
              <input type="password" class="form-control"  placeholder="Password" name="password" value="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  placeholder="Confirm password" name="password2" value="">
            </div>
            <div class="form-group">
            <?php echo"$email_err"; ?>
              <input type="text" class="form-control"  placeholder="email" name="email" value="<?php echo"$email";?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Confirm email" name="email2" value="">
            </div>
         <center><h4 class="wallet">Your Wallets</h4></center>   
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Bitcoin Address">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="LITECOIN Address">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="ETH Address">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="BCH Address">
            </div>       
          <div class="form-group__checkbox">
            <input type="checkbox" name="agree" value="1">
            <span>I agree with <a href="Rules.html" style="color: blue;">terms and conditions</a></span>
          </div>
          <button type="submit" class="btn btn-main" style="margin-left: 10rem;" name="signup-btn">Sign Up</button>
          </form>
          <p class="mt-20">Already have an account ?<a href="login.html"> Login</a></p>
          
        </div>
      </div>
    </div>
  </div>
</section>
<section>
 
</section>
<footer id="footer" class="bg-one">
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3">
          <h3>Our Services</h3>
          <ul>
            <li><a href="#">Easy and Secure</a></li>
            <li><a href="#">Instant Payment</a></li>
            <li><a href="#">Strong Network</a></li>
            <li><a href="#">Professional team</a></li>
            <li><a href="#">24/7 Support</a></li>
            <li><a href="#">Stable Income</a></li>
          </ul>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="About.html">About</a></li>
            <li><a href="faq.html">FAQ’s</a></li>
            <li><a href="contact.html">Support</a></li>
          </ul>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <h3>Contacts</h3>
            <ul>
              <li><a href="">Email:</a></li>
              <li><a href="mailto:coinsglobalinvestment@gmail.com">coinsglobalinvestment@gmail.com</a></li>

            </ul>
          </div>
      </div>
    </div> <!-- end container -->
  </div>
  <div class="footer-bottom">
    <h5>Copyright 2017 @ Coinsglobal</h5>
  </div>
</footer> <!-- end footer -->


    <!-- end Footer Area
    ========================================== -->

    
    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/dist/js/popper.min.js"></script>
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <!-- Smooth Scroll js -->
    <script src="plugins/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    
    <!-- Custom js -->
    <script src="js/script.js"></script>

  </body>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  </html>
 