<?php
session_start();

if(isset($_SESSION['username'])){
    session_destroy();
    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='../index.php';
    </script>");
}