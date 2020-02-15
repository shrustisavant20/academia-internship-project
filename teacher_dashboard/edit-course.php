<?php
session_start();
error_reporting(0);

include('../processes/connection.php');
?>

<?php

if(isset($_POST['update']))
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
   	$cid = $_SESSION['newid'];

	$q = "UPDATE `courses` SET `title`= '$title',`tagline`= '$tagline',`description`= '$desc',`start_date`= '$start_date', 
    `end_date`= '$end_date', `days_of_week`= '$days',`start_time`= '$start_time', `end_time`= '$end_time',
    `price`= '$price', `status` = '$status'  WHERE id = '$cid' ";
   $m = $q;
   echo $q;
	$query = mysqli_query($con, $q);

	}
   if ($query) {
    	echo "<script>alert('Course has been Updated successfully');</script>"; 
   		echo "<script>window.location.href = 'manage-courses.php'</script>";   
    	$msg=" success";
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title> Edit Course </title>

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

.main-page{
	top: -50px;
	position: relative;
	border: 0px solid green;
	height: 70%;
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
							<h4>Edit Course:</h4>
						</div>
						<div class="form-body">
							<form method="post" action="edit-course.php"  enctype="multipart/form-data"  >
								<p style="font-size:16px; color:red" align="center"> <?php if($query){

								echo $msg;
							}  ?> </p>

					<?php
					session_start();
					$cid=$_GET['id'];
					$_SESSION['newid'] = $cid;
					$ret=mysqli_query($con,"select * from courses where id='$cid'");
					
					while ($row=mysqli_fetch_array($ret)) {

                    ?> 
                    
							 <div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Course Title
								<?php echo $_GET['id']; ?>  
								</label>
								 <input type="text" class="form-control"   name="title" value="<?php  echo $row['title'];?>" required="true">
							</div> 
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Course Tagline
								 <?php echo $cid; ?></label>
								 <input type="text" class="form-control"   name="tagline" value="<?php  echo $row['tagline'];?>" required="true">
							</div>
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Course Description brief </label>
								 <textarea name="desc" id="" cols="70"  rows="5" ><?php  echo $row['description'];?></textarea>
							</div>
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								Start Date</label>
								 <input type="date"    name="start_date" value="<?php  echo $row['start_date'];?>" required="true">
								 <label for="exampleInputEmail1">
								End Date</label>
								 <input type="date"   name="end_date" value="<?php  echo $row['end_date'];?>" required="true">
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
								 <input type="time"  name="start_time" value="<?php  echo $row['start_time'];?>"   required="true">
								 <label for="exampleInputEmail1">
								 Lecture End Time </label>
								 <input type="time" name="end_time"  value="<?php  echo $row['end_time'];?>"  required="true">
							</div>
						
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Price </label>
								 <input type="number" class="form-control"   name="price"  value="<?php  echo $row['price'];?>"  required="true">
							</div>
						
							<div class="form-group"> 
								 <label for="exampleInputEmail1">
								 Upload poster image</label>
								 <input type="file" class="form-control" id="image" name="image" placeholder="Show title" value="">
							</div>
							<input type="submit" name="update" id="update" value="UPDATE" class="btn btn-info" /> 
  						 
                        </form> 
                    <?php } ?>
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
      $('#update').click(function(){  
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
