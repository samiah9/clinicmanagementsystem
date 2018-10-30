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
	<title>Add Patient</title>
</head>
<body>

<center>
   <h1>clinic management</h1>
   <p>better health care</p>
   <a href="addpatients.php">add patient</a> /
   <a href="adddoctors.php">add doctor</a> /
   <a href="psearch.php">search patients</a> /
   <a href="checkup.php">check up</a> /
</center>

<center>
  <h1 class="">add patient</h1>
  <fieldset>
   <legend>Patient Details</legend>
   <form action="" method="post">
   	 <input type="text" name="surname" placeholder ="enter surname ">
   	  <br> <br>

     <input type="text" name="fname" placeholder ="enter firstname ">
   	  <br> <br>

   	 <input type="text" name="lname" placeholder ="enter last name ">
   	  <br> <br>

     <input type="text" name="phone" placeholder ="enter phoneno. ">
   	  <br> <br>

   	 <input type="text" name="residence" placeholder ="enter residenceno ">
   	  <br> <br>

     <input type="text" name="patient_id" placeholder ="enter patient_idNo">
   	  <br> <br>

     <input type="text" name="email" placeholder ="enter email ">
   	  <br><br>
   	  
   	  <label>select gender</label>
       <input type="radio" name="gender" value="male">male
       <input type="radio" name="gender" value="female">female
       <br> <br>

       <input type="submit" value="Save patient info">


   </form>
</fieldset>
</center>
</body>
</html>

<?php
 //this is the logic:provide the constructor with form values
if (empty($_POST)) {
	exit();//quit executing php code untill,form button is clicked

}
 $object= new patient($_POST ['surname'],
                      $_POST ['fname'],
                      $_POST ['lname'],
                      $_POST ['phone'],
                      $_POST ['residence' ],
                      $_POST ['patient_id'],
                      $_POST ['email' ],
                      $_POST ['gender']);
        $object ->save(); #trigger save function

class patient{
   function __construct($surname,$fname,$lname,$phone,$residence,$patient_id,$gender,$email){
    $this->surname =$surname;
    $this->fname = $fname;
    $this->lname=$lname;
    $this->phone = $phone;
    $this->residence= $residence;
    $this->patient_id = $patient_id;
    $this->email = $email;
    $this->gender = $gender;
  
     }//end function
   
   function save(){
    $conn= mysqli_connect("localhost","root","","clinic_db");

    //save to table
    $response = mysqli_query($conn,"INSERT INTO `table_patients`(`surname`, `fname`, `lname`, `phone`, 
    `residence`, `patient_id`, `gender`, `email`) VALUES ('$this->surname','$this->fname',
    '$this->lname','$this->phone','$this->residence','$this->patient_id','$this->email',
    '$this->gender')");
     
     //testing the response 
     if ($response==true) {
     echo "Succesfully saved record";
      }


     else{
      echo "record failed.check your Details";
     }
   }//end function

}

?>
