<?php
session_start();
include("connection.php");


if(isset($_GET['user'])){


    $user = $_GET['user'];

    if($user == 'student'){
        echo "i am a ". $user. "<br>";

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        $qy = " select * from student_user where email = '$email'";
        
        $result = mysqli_query($con, $qy);
        
        $num = mysqli_num_rows($result);
        
        if($num == 1){
            
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('This email is already registered!');
            window.location.href='index.php';
            </script>");
        
        }
        else{
        
        //$qy = "insert  into user (fname,lname, email, phone,password) values ('$fname' ,'$lname' '$email', $phone ,'$password')";
         $q = "INSERT INTO `student_user` (`fname`, `lname`, `email`, `password`, `date_of_reg`, `status` ) VALUES ('$fname', '$lname', '$email', '$password', NOW(), 'enable')";    
        echo $q;
            mysqli_query($con, $q); 
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Account registered successfully Please login to continue');
           window.location.href='../index.php';
            </script>");
        
        }


    } //end of if
    else{
        echo "i am a ". $user. "<br>" ;

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $orgname = $_POST['orgname'];
        $phone = $_POST['phone'];
        
        
        
        
        $qy = " select * from teacher_user where email = '$email'";
        
        $result = mysqli_query($con, $qy);
        
        $num = mysqli_num_rows($result);
        
        if($num == 1){
            
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('This email is already registered!');
            window.location.href='index.php';
            </script>");
        
        }
        else{
        
        //$qy = "insert  into user (fname,lname, email, phone,password) values ('$fname' ,'$lname' '$email', $phone ,'$password')";
         $q = "INSERT INTO `teacher_user` (`fname`, `lname`, `org_name`, `email`, `phone`, `password`, `date_of_reg`, `status` ) VALUES ('$fname', '$lname', '$orgname', '$email', '$phone', '$password', NOW(), 'enable')";    
        echo $q;
            mysqli_query($con, $q); 
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Account registered successfully Please login to continue');
           window.location.href='../index.php';
            </script>");
        
        }


    }
   


} //end of big if





?>