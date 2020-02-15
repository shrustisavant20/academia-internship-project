<!DOCTYPE html>
<html lang="en">
<?php
// error_reporting(0);

include('processes/connection.php');
?>

<head>
  <title>Academics &mdash; Website by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">

<style>
.col-md-6{
 border: 0px solid; 
}
.img-fluid{
  width: 100%;
  height: auto
}
</style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <?php 
  include('includes/header.php');
  ?>
    

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">
              <?php
              $cid=$_GET['id']; 
              $data = mysqli_fetch_array(mysqli_query($con,"select title from courses where id='$cid'")); 
              echo $data['title'];
              ?>  
            </h2>
              <p>Learning is a continuous process   -Raju Potharaju</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="courses.php">Courses</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Courses</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
              <?php
                $cid=$_GET['id'];
                $ret=mysqli_query($con,"select * from courses where id='$cid'");
                
                while ($row=mysqli_fetch_array($ret)) {

                    ?> 
            <div class="row">
                <div class="col-md-5 mb-4">
                    <p> 
                      <?php echo'  <img src="data:image/jpeg;base64,'.base64_encode($row['poster'] ).'" alt="Image" class="img-fluid"> '; ?>
                   
                    </p>
                    <strong class="text-black d-block">Why learn?</strong>
                        <p><?php echo $row['tagline'] ?></p>
                        <strong class="text-black d-block">Course description</strong>
                        <p><?php echo $row['description'] ?></p>
                </div>


                <div class="col-lg-5 ml-auto align-self-center">
                        <h2 class="section-title-underline mb-3">
                            <span>Course Details</span>
                        </h2>
                        
                        <p> <strong class="text-black d-block">Teacher:</strong> 
                              <?php echo $row['teacher_name'] ?>
                         </p>



                        <p><strong class="text-black d-block">Days to and from:</strong>
                         <?php 
                         $s1 =new DateTime($row['start_date']);
                         $s2 =new DateTime($row['end_date']);
                         $startdate = date_format($s1, 'd-F-Y');
                         $enddate = date_format($s2, 'd-F-Y');
                         echo $startdate;
                        ?> &mdash; 
                         <?php echo $enddate ?>

                         </p>
                        
                        <p><strong class="text-black d-block">Hours:</strong> 

                        <?php $s3 = new DateTime( $row['start_time']);
                              $s4 = new DateTime( $row['end_time']);
                                $starttime = date_format($s3, 'h.i A');
                                $endtime = date_format($s4, 'h:i A');
                                echo $starttime;

                        ?> &mdash; 
                        <?php echo $endtime ?> 
                      </p>



                        
                        <p>
                        <strong class="text-black d-block"> Days of the week </strong>
                        <ul class="ul-check primary list-unstyled">
                            <p>
                              <?php 
                                      $string =  $row['days_of_week'];
                                      $token = $token = strtok($string, " "); 
                                      while($token != false){
                                      echo' <li> '.$token.' </li> ';
                                        $token = strtok(" ");
                                      }
                                  ?>
                              </p>
                        </ul>
                        </p>
                        <p>
                            <a href="#" class="btn btn-primary rounded-0 btn-lg px-5">Enroll</a>
                        </p>
    
                    </div>
            </div>
          <?php } ?>
        </div>
    </div>

    <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-mortarboard"></span>
              <h3>Our Philosphy</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea? Dolore, amet reprehenderit.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-school-material"></span>
              <h3>Academics Principle</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                Dolore, amet reprehenderit.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-library"></span>
              <h3>Key of Success</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                Dolore, amet reprehenderit.</p>
            </div>
          </div>
        </div>
      </div>
      

      <?php
      include('includes/footer.php')
    ?>
    

  </div>
  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>