<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


</head>
<body>
  
    
<div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a> 
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> +91 82829 66966 </a> 
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@academia.com </a> 
          </div>


    <?php
    session_start();
    if (isset($_SESSION['username'])) {

      

      echo '
      <!-- Example single danger button -->
      

        <a class="small btn btn-primary rounded-0 dropdown-toggle" data-toggle="dropdown" > <span class="icon-user"></span>
        '.$_SESSION["username"].'
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="user_settings.php">Account Settings</a>
          <a class="dropdown-item" href="my_courses.php">My Courses</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="processes/logout.php">Logout</a>
        </div>
    ';
    }
    else{

      echo '
    <div class="col-lg-3 text-right">
            <a  class="small mr-3  dropdown-toggle" data-toggle="dropdown"><span class="icon-unlock-alt"></span> Log In</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="login.php?user=student">Student Login</a>
              <a class="dropdown-item" href="login.php?user=teacher">Teacher Login</a>
            </div>
            <a href="register.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
            
          </div>
    
    ';
    }
    ?>










          
        </div>
      </div>
    </div>


  
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.php" class="d-block">
              <img src="images/logo3.png" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
                <li>
                  <a href="courses.php" class="nav-link text-left">Courses</a>
                </li>
                <li>
                    <a href="contact.php" class="nav-link text-left">Contact</a>
                  </li>
                <?php 
                            if (isset($_SESSION['instructor'])) {
                              echo ' 
                              <li class="has-children">
                                <a href="about.php" class="nav-link text-left">Instructor</a>
                                <ul class="dropdown">
                                  <li><a href="teacher_dashboard/dashboard.php" target="_blank">Dashboard</a></li>
                                  <li><a href="about.php">Rules & Regulations</a></li>
                                </ul>
                              </li>
                    
                              ';
                          }
                ?>
               
                

                  
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

          </div>
          <div class="ml-auto">
            <div class="social-wrap">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
         
        </div>
      </div>

    </header>




</body>
</html>