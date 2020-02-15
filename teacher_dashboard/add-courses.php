<?php
session_start();
//error_reporting(0);

include('../processes/connection.php');
?>

<?php

if(isset($_POST['insert']))
  {

	$title =$_POST['title'];
    $tagline =$_POST['tagline'];
	$desc = $_POST['desc'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$days = $_POST['days'];
	$days = implode(" ", $days);
    $start_time =$_POST['start_time'];
    $end_time =$_POST['end_time']; 
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$price = $_POST['price'];
	$teacher_name = $_SESSION['instructor'];
	$status = "draft";
	$q = " INSERT INTO `courses`(`title`, `tagline`, `description`, `start_date`, `end_date`, `days_of_week`, `start_time`, `end_time`, `poster`,  `price`, `teacher_name`, `status`) 
	VALUES ('$title','$tagline', '$desc', '$start_date', '$end_date', '$days', '$start_time', '$end_time', '$file', '$price', '$teacher_name', '$status') ";
	
	$msg = $q;
	$query = mysqli_query($con, $q);

	}
   if ($query) {
    	echo "<script>alert('Course has been Drafted');</script>"; 
   		echo "<script>window.location.href = 'add-courses.php'</script>";   
    	$msg=" success";
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title> Add Courses </title>

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
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
.forms{
	border: 0px solid;
	width: 50%;
	height: 99%;
	left: 20% !important;
	position: relative;
	overflow-y: auto;
} 
form{
	border-radius: 40px;
}
.main-page{
	top: -50px;
	position: relative;
	border: 0px solid green;
	height: 70%;
}
.main-content{
	border: 0px solid red;
}
#page-wrapper{
	border: 0px solid orange;
}
</style>

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php  include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php   include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">

					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Add Course:</h4>
						</div>
						<div class="form-body">
							<form method="post" action="add-courses.php"  enctype="multipart/form-data"  >
								<p style="font-size:16px; color:red" align="center"> <?php if($q){

								echo $msg;
							}  ?> </p>

  
							 <div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Course Title</label>
								 <input type="text" class="form-control"   name="title" placeholder="Eg. Java" value="" required="true">
							</div> 
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Course Tagline</label>
								 <input type="text" class="form-control"   name="tagline" placeholder=" Eg. Learn Java from Zero to hero " value="" required="true">
							</div>
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Course Description brief </label>
								 <textarea name="desc" id="" cols="70" rows="5"></textarea>
							</div>
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								Start Date</label>
								 <input type="date"    name="start_date" required="true">
								 <label for="exampleInputEmail1">
								End Date</label>
								 <input type="date"   name="end_date" required="true">
							</div>
						
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								Days of the week </label>
								<hr>
								<div class="checkboxes">
									<label for="">	
									<input type="checkbox"  name="days[]" value="monday"    >
									Monday
									</label>
									
								</div>
								<div class="checkboxes">
									<label for="">
									<input type="checkbox"  name="days[]" value="tuesday"    >
									Tuesday
									</label>
								</div>
								<div class="checkboxes">
									<label for="">
									<input type="checkbox"  name="days[]" value="wednesday"    >
									Wednesday
									</label>
								</div>
								<div class="checkboxes">
									<label for="">
									<input type="checkbox"  name="days[]" value="thursday"    >
									Thursday
									</label>
								</div>
								<div class="checkboxes">
									<label for="">
									<input type="checkbox"  name="days[]" value="friday"    >
									Friday
									</label>
								</div>
								<div class="checkboxes">
									<label for="">	
									<input type="checkbox"  name="days[]" value="saturday"    >
									Saturday
									</label>
								</div>
								<div class="checkboxes">
									<label for="">
									<input type="checkbox"  name="days[]" value="sunday"    >
									Sunday
									</label>
								</div>	
								<hr>
							</div>
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Lecture Start Time </label>
								 <input type="time"  name="start_time"    required="true">
								 <label for="exampleInputEmail1">
								 Lecture End Time </label>
								 <input type="time" name="end_time"    required="true">
							</div>
						
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Price </label>
								 <input type="number" class="form-control"   name="price"    required="true">
							</div>
						
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Upload poster image</label>
								 <input type="file" class="form-control" id="image" name="image" placeholder="Show title" value="">
							</div>
							<input type="submit" name="insert" id="insert" value="DRAFT" class="btn btn-info" /> 
  						 
						</form> 
						</div>
						
					</div>
				
				
			</div>
		</div>
		 <?php include('includes/footer.php');?>
	</div>
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

<!-- form validations 
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  

-->









</body>
</html>
