<?php 
session_start();
error_reporting(0);

include('../processes/connection.php');

$cid=$_GET['id'];
$ret=mysqli_query($con,"delete from courses where id='$cid'");

if($ret){
    header('location: manage-courses.php');
}
?>