<?php 
  session_start();
  session_unset($_SESSION['username']);
  session_destroy();//all session
  header("location:login.php");

 ?>