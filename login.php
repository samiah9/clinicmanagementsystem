<!DOCTYPE html>
<html>
<head>
	<title>search</title>
	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<center>
  <h1>login form</h1>
  <fieldset>
   <legend>login details</legend>
   <form action="" method="post">
   	 <input type="text" name="username" placeholder ="enter username ">
   	  <br> <br>

      <input type="password" name="password" placeholder ="enter password ">
      <br> <br>

   	 <input type="submit" value="login">
   </form>
</fieldset>
</center>
</body>
</html>

<?php 
if (empty($_POST)) {
    exit();//quit if button is not clicked
    }//end if 

  $object = new UserLogin($_POST['username'],
                          $_POST['password']);
    $object->login();

  class UserLogin{
    function __construct($username,$password){
     $this->username=$username;
     $this->password=$password;
    }//END FUNCTION

     function login(){
       $conn= mysqli_connect("localhost","root","","clinic_db");
        $response = mysqli_query($conn,"SELECT * FROM table_users
         WHERE username = '$this->username'AND password = '$this->password' 
         AND status='active'");  

         //count your response 
      if (mysqli_num_rows($response)==0) {
        echo "Login failed! Try again";
        exit();
      }//end if
     elseif (mysqli_num_rows($response)==1) {
       echo "login successful,welcome";
       //create session
        session_start();
        $_SESSION['username']= $this->username;//store username
        $_SESSION['time']= date("y/m/d.h:m:s");//store date/time
          //sessions are stored and available to all other php files
            //We need to know the role of logged in user 
              $colm = mysqli_fetch_array($response);
              $_SESSION['role'] = $colm[2];//store role in session

        header("location:addpatients.php");
     }//end elseif


     else {
      echo "something went wrong contact admin";
     }

     }//end function 

  }//end class




 ?>