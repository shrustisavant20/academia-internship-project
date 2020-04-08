<?php
session_start();
//echo strlen($_SESSION['instructor']); 
// if (strlen($_SESSION['instructor'])==0) {
// 	echo "entered if";
// 	header('location:logout.php');
// } 

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Students Details</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

<style>
.main-page{
	position: relative;
	top: 0px;
	border: 2px solid;
	height: 70%;
	overflow-y: auto;
}
</style>


</head> 
<body class="cbp-spmenu-push">
<div class="main-content">
		
	<?php include_once('includes/sidebar.php');?>
		
	<?php include_once('includes/header.php');?>
		<!-- main content start-->
		<div id="page-wrapper" class="row calender widget-shadow">
			<div class="main-page">
	
			
	<?php
include "includes/dbconnection.php";
$sql = "SELECT * FROM joined_courses";  
$result = mysqli_query($con, $sql);
?>				
							
									
<div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Student Details</h2><br /> 
    <table class="table table-bordered">
     <tr>  
                         <th>ID</th>  
                         <th>Course ID</th>  
                         <th>Student ID</th>  
       <th>Teacher ID</th>
       <th>Joining Date</th>
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["id"].'</td>  
         <td>'.$row["course_id"].'</td>  
         <td>'.$row["student_id"].'</td>  
         <td>'.$row["teacher_id"].'</td>  
         <td>'.$row["joining_date"].'</td>
       </tr>  
        ';  
     }
     ?>
    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div>									
													
															
																	
																			
																					
																									

</div>
<!--end of main page-->
		
<!--footer-->
	<?php include_once('includes/footer.php');?>
    <!--//footer-->
</div>
<!--end of page wrapper --->

</div>
<!--end of main content --->







	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>