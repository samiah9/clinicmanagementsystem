<?php 
 
 session_start();
  if (isset($SESSION['username'])) {
 	$username = $SESSION['username'];
 	echo"Welcome :$username";
 }

  elseif (!isset($_SESSION['username'])) {
  	
  	# code...
  }





 ?>

<!DOCTYPE html>
<html>
<head>
	<title>search</title>
	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
  <center>
   <h1>clinic management</h1>
   <p>better health care</p>
   <a href="addpatients.php">add patient</a> /
   <a href="adddoctors.php">add doctor</a> /
   <a href="psearch.php">search patients</a> /.
   <a href="idsearch.php">search patient by id </a> /
   <a href="checkup.php">check up</a> /
</center>

<center>
  <h1>Search patients</h1>
  <fieldset>
   <legend>Patient Details</legend>
   <form action="" method="post">
   	 <input type="text" name="fname" placeholder ="enter fname ">
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
    
    $object = new PatientSearch($_POST['fname']);
    $object->search();


    class PatientSearch{
     function __construct($fname){
       $this->fname = $fname;

     }
     function search(){
       $conn= mysqli_connect("localhost","root","","clinic_db");
        $response = mysqli_query($conn,"SELECT * FROM table_patients
         WHERE fname = '$this->fname'");  

         //count your response 
      if (mysqli_num_rows($response)==0) {
      	echo "No patient found,Try Again";
      	exit();
      }
       
       else {

       	//get all colms for the first row found 
       	echo "<table border=1 width =100% class='table table-dark'>";
       while( $colm = mysqli_fetch_array($response))
       {
       	echo "<tr>";
        echo "<td> $colm[0] </td>";
        echo "<td> $colm[1] </td>";
        echo "<td> $colm[2] </td>";
        echo "<td> $colm[4] </td>";
        echo "<td> $colm[5] </td>";
        echo "<td> $colm[6] </td>";
        echo "<td> $colm[7] </td>";
        echo "<td> $colm[8] </td>";
        echo "</tr>";
        }//end while 
        echo "</table>";
       }//end else
     

     }//end function

    }//end class








?>