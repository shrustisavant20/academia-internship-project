<?php 
session_start();
error_reporting(0);

include('../processes/connection.php');

$cid=$_GET['id'];
$ret=mysqli_query($con,"select status from courses where id = '$cid' ");
while ($row=mysqli_fetch_array($ret)) 
{
    $status = $row['status'];
}
if($status == "draft"){
    $ret=mysqli_query($con,"update courses set status = 'live'  where id='$cid'");
}
else{
    $ret=mysqli_query($con,"update courses set status = 'draft'  where id='$cid'");
}


if($ret){
    header('location: manage-courses.php');
}
?>