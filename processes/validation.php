<?php
session_start();
include("connection.php");


if(isset($_GET['user'])){
    $user = $_GET['user'];
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($user == 'student'){
        $q = " select * from student_user  where email = '$email' && password = '$password' ";
    }//end of if
    else{
        $q = " select * from teacher_user  where email = '$email' && password = '$password' ";
        $_SESSION['instructor'] = $email;
    }
}


$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	
	$_SESSION['username'] = $email;
	echo ("<script LANGUAGE='JavaScript'>
    
    window.location.href='../index.php';
    </script>");

}
else{
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('This account is not registered, please register first');
    window.location.href='../register.php';
    </script>");
}



?>