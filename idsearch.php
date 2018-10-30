
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

 <!DOCTYPE html>
<html>
<head>
	<title>search Id </title>
	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<center>
   <h1>clinic management</h1>
   <p>better health care</p>
   <a href="addpatients.php">back home</a>
</center>

<center>
  <h1>Search patients</h1>
  <fieldset>
   <legend>Patient details</legend>
   <form action="" method="post">
   	 <input type="text" name="patient_id" placeholder ="enter patient_id ">
   	  <br> <br>

   	 <input type="submit" value="Search patient">
   </form>
</fieldset>
</center>
</body> 
</html>

<?php

 if (empty($_POST)) {
	  exit();//quit if button is not clicked
    }//end if 
    
    $object = new PatientSearch($_POST['patient_id']);
    $object->search();



class PatientSearch{

   function __construct($patient_id) 
     {$this->patient_id = $patient_id;

       }//end function construct

    function search(){
       $conn= mysqli_connect("localhost","root","","clinic_db");
        $response = mysqli_query($conn,"SELECT * FROM table_patients
         WHERE patient_id = '$this->patient_id'");  

    if (mysqli_num_rows($response)==0) {
      	echo "No patient found with that id,Try Again";
      	exit();
      } //end if


     else {

       	//get all colms for the first row found 
       	echo "<table border=1 width =100% class='table table-dark'>";
       while( $colm = mysqli_fetch_array($response))
       {
       	echo "<tr>";
        echo "<td> $colm[0] </td>";
        echo "<td> $colm[1] </td>";
        echo "<td> $colm[2] </td>";
        echo "<td> $colm[3] </td>";
        echo "<td> $colm[4] </td>";
        echo "<td> <a href='delete.php?patient_id=$colm[5]'>delete</a> </td>";
        echo "<td> <a href='' class='btn btn_info'>allocate</a> </td>";        
        echo "</tr>";
        }//end while 
        echo "</table>";
       }//end else

       }//end function search
     }//end class










?>