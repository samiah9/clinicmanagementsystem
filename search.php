 <!DOCTYPE html>
 <html>
 <head><title>search</title>
  <link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body>
 <center>
  <h1>Search </h1>

</center>
 </body>
 </html>
















<?php
  
    
    $object = new Traffic();
    $object->search();


    class Traffic{
     function __construct(){


     }
     function search(){
       $conn= mysqli_connect("localhost","root","","clinic_db");
        $response = mysqli_query($conn,"SELECT * FROM table_traffic");  

         //count your response 
      if (mysqli_num_rows($response)==0) {
      	echo "No road found,Try Again";
      	exit();
      }
       
       else {

       	//get all colms for the first row found 
       	echo "<table border=0 width =100% class='table table-dark'>";
       while( $colm = mysqli_fetch_array($response))
       {
       	echo "<tr>";
        echo "<td> $colm[0] </td>";
        echo "<td> $colm[1] </td>";
        echo "</tr>";
        }//end while 
        echo "</table>";
       }//end else
     

     }//end function

    }//end class








?>