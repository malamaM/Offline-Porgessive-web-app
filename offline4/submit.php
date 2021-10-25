<?php
 
/*
* Write your logic to manage the data
* like storing data in database
*/
        $check_code="";
        $entry= $_SERVER['REMOTE_ADDR'];
        $latitude=$_POST["latitude"];
        $longitude=$_POST["longitude"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_app";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $code=$_POST["code"];
        
        $sql = "SELECT Validation_Code FROM users where Validation_Code=$code";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $check_code= $row["Validation_Code"];
            
        
          }
        } else {
          echo "0 results";
        }
        
        if ($code==$check_code){
         
$number= $_POST['number'];
 echo $number;
 $sql = "SELECT number FROM users where Validation_Code=$code";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
     $check_number= $row["number"];
     
 
   }
 } else {
   echo "0 results";
 }
 if ($check_number==0){
   $date=date("Y/m/d");
   $time=date("h:i:sa");
 $sql = "UPDATE users SET number='$number' WHERE Validation_Code=$code";
  

    if ($conn->query($sql) === TRUE) {
  //echo "Record updated successfully to ";
} else {
  echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE users SET time='$time' WHERE Validation_Code=$code";
  

    if ($conn->query($sql) === TRUE) {
  //echo "Record updated successfully to ";
} else {
  echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE users SET ip='$entry' WHERE Validation_Code='$code'";
        if (mysqli_query($conn, $sql)) {
          // echo "Record updated successfully";
         } else {
           echo "Error updating record: " . mysqli_error($conn);
         }
         $sql = "UPDATE users SET latitude='$latitude' WHERE Validation_Code='$code'";
        if (mysqli_query($conn, $sql)) {
          // echo "Record updated successfully";
         } else {
           echo "Error updating record: " . mysqli_error($conn);
         }
        $sql = "UPDATE users SET longitude='$longitude' WHERE Validation_Code='$code'";
        if (mysqli_query($conn, $sql)) {
          // echo "Record updated successfully";
         } else {
           echo "Error updating record: " . mysqli_error($conn);
         }
$sql = "UPDATE users SET date='$date' WHERE Validation_Code=$code";
  

    if ($conn->query($sql) === TRUE) {
  //echo "Record updated successfully to ";
} else {
  echo "Error updating record: " . $conn->error;
}

          exit();
        }
        else {echo "code already entered";
          exit();}
        }
        
        else {
          echo "Not valid code";
        }
          
// POST Data

exit;
 
?>