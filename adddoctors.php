<!DOCTYPE html>
<html>
<head>
<center>
	<title>Add Doctors</title>
</head>
<body>

<center>
   <h1>clinic management</h1>
   <p>better health care</p>
   <a href="addpatients.php">add patient</a>
   <a href="adddoctors.php">add doctor</a>
   <a href="psearch.php">search patients</a>
   <a href="checkup.php">check up</a>
</center>
<fieldset>
<h1>Add Doctors</h1>

   <form action="adddoctors.php" method="post">
   	 <input type="text" name="doctor_id" placeholder ="enter doctor_id">
   	  <br> <br>

     <input type="text" name="surname" placeholder ="enter surnamename">
   	  <br> <br>

   	 <input type="text" name="others" placeholder ="enter others">
   	  <br> <br>

     <input type="text" name="dept" placeholder ="enter dept.">
   	  <br> <br>

   	 <input type="text" name="proffession" placeholder ="enter proffession">
   	  <br> <br>

     <input type="text" name="exp" placeholder ="enter exp">
   	  <br> <br>
   	  
   	  <label>select gender</label>
       <input type="radio" name="gender" value="male">male
       <input type="radio" name="gender" value="female">female
       <br> <br>

       <input type="submit" value="Save doctors info">


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
$object= new patient($_POST ['doctor_id'],
                      $_POST ['surname'],
                      $_POST ['others'],
                      $_POST ['dept'],
                      $_POST ['proffession' ],
                      $_POST ['exp'],
                      $_POST ['gender']);
        $object ->save(); 

 class patient{
   function __construct($doctor_id,$surname,$others,$dept,$proffession,$exp,$gender){
    $this->doctor_id =$doctor_id;
    $this->surname = $surname;
    $this->others=$others;
    $this->dept = $dept;
    $this->proffession= $proffession;
    $this->exp = $exp;
    $this->gender = $gender;

  }

   function save(){
   $conn= mysqli_connect("localhost","root","","clinic_db");

    //save to table
     $response= mysqli_query($conn,"INSERT INTO `table_doctors`(`doctor_id`, `surname`, `others`,
      `dept`, `proffession`, `gender`, `exp`) VALUES ('$this->doctor_id','$this->surname',
    '$this->others','$this->dept','$this->proffession','$this->exp','$this->gender')");
     
     if ($response==true) {
     echo "Succesfully saved record";
      }


     else{
      echo "record failed.check your Details";
     }
   }//end function

}

?>


