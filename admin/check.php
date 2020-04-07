<?php
  include_once 'connect.php';

  session_start();

  if(isset($_POST['login'])){

    $user = $_POST['uid'];
    $pass = $_POST['pass'];

    $result = $conn->query("select * from sign where username = '$user'");

    if(mysqli_num_rows($result)){
      $row = $result->fetch_assoc();
      $pwd = $row['password'];
      $pwd = substr($pwd, 0, 60);
      $valid = password_verify($pass, $pwd);
      $us = strtoupper($user);

      if($valid){

        $_SESSION['username'] = $row['username'];
        $_SESSION['message'] =  "Welcome $us";
        $_SESSION['msg-type'] = 'info';

        header("Location: index.php");

      }else{
        echo "<script>alert('Password doesnt match');</script>";
        echo "<script>location.href='login.php'</script>";
      }

    }else{
      echo "<script>alert('Username doesnt exist');</script>";
      echo "<script>location.href='login.php'</script>";
    }

  }

 ?>
