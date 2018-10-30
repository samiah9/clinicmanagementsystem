<?php 

session_start();
 //check if theres a session

 if (isset($_SESSION['username'])) {
  //pull it out
 $username=$_SESSION['username'];
 echo "welcome :$username";
 echo "<a href= 'logout.php'>logout</a>";
 }

 elseif(!isset($_SESSION['username'])){
  header("location:login.php");
  exit();
 }




 ?>

<?php
  $patient_id = $_GET['patient_id'];

     $conn = mysqli_connect("localhost","root","","clinic_db");
      $response = mysqli_query($conn,"DELETE FROM table_patients 
      	WHERE patient_id = '$patient_id'");


echo "Deleted";

?>