<html>
    <head><title>Admin Dashboard</title>
    </head>

    <body>
    </body>
    <h1> Welcome admin create and manage your users from here</h1>
    
    <?php
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// this php code is used to change the destination of the page to be redirected to
if(isset($_POST['register'])){ //check if form was submitted
  $name=$_POST["name"];
  $code=$_POST["code"];
  $email=$_POST["email"]; 
  echo $name;
  $sql = "INSERT INTO users (name, Validation_Code, Email)
VALUES ('$name', '$code', '$email')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);



$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['deleteuser'])){ //check if form was submitted
  $id=$_POST["id"];

// sql to delete a record

$sql = "DELETE FROM users WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
}

mysqli_close($conn);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// this php code is used to change the destination of the page to be redirected to
if(isset($_POST['update_email'])){ //check if form was submitted
  $id2=$_POST["id2"];
  $new_email=$_POST["new_email"];
  $sql = "UPDATE users SET email='$new_email' WHERE id='$id2'";
  

    if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully to ";
} else {
  echo "Error updating record: " . $conn->error;
}
}
if(isset($_POST['update_Validation_Code'])){ //check if form was submitted
  $id3=$_POST["id3"];
  $new_Validation_Code=$_POST["new_Validation_Code"];
  $sql = "UPDATE users SET Validation_Code='$new_Validation_Code' WHERE id='$id3'";
  

    if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully to ";
} else {
  echo "Error updating record: " . $conn->error;
}
}
if(isset($_POST['update_name'])){ //check if form was submitted
  $id4=$_POST["id4"];
  $new_name=$_POST["new_name"];
  $sql = "UPDATE users SET name='$new_name' WHERE id='$id4'";
  

    if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully to ";
} else {
  echo "Error updating record: " . $conn->error;
}
}

$conn->close();

  ?>

    <form name=myform action="" method="post">
        Name: <input type="text" name="name" placeholder="name">
        Validation Code: <input type="text" name="code" placeholder="code">
        Email: <input type="text" name="email" placeholder="email">
        <input type="submit" class="button" value="Register!" name="register">
            </form>
            <br>
            <p> The follwoing are the current users, their ID's and Validation codes</p>
            <?php
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            
            //this is the sql code to show all the data in the database
            $sql = "SELECT id, name, Validation_Code, number, Email, ip, date, time, Latitude, Longitude FROM users ORDER BY id ASC";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
            
              echo "<table border='1'>";
                        echo "<tr>";
                            echo "<th>User id</th>";
                            echo "<th>User name</th>";
                            echo "<th>Validation Code</th>";
                            echo "<th>number</th>";
                            echo "<th>User Email</th>";
                            echo "<th>User IP address</th>";
                            echo "<th>Date</th>";
                            echo "<th>Time</th>";
                            echo "<th>Latitude</th>";
                            echo "<th>Longitude</th>";
                            
                        echo "</tr>";
                        
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
              
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['Validation_Code'] . "</td>";
                echo "<td>" . $row['number'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['ip'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['Latitude'] . "</td>";
                echo "<td>" . $row['Longitude'] . "</td>";
            echo "</tr>";
              }
              echo "</table>";
                    
                    mysqli_free_result($result);
            } else {
                echo "0 results <br>";
            }
            ?>
            <br>
            <p>Delete a user below by entering their ID</p>

            <form name=delete action="" method="POST">
                ID: <input type="text" name="id" placeholder="ID">
                <input type="submit" class="button" value="delete" name="deleteuser">

            </form>
            <br>
            <p> Change the email of a user by entering their ID and the new email </p>
            <form name=change_email action="" method="POST">
                ID: <input type="text" name="id2" placeholder="ID">
                New email: <input type="text" name="new_email" placeholder="New email">
                <input type="submit" class="button" value="Change email" name="update_email">

            </form>
            <br>
            <p> Change the validation code of a user by entering their ID and the new Validation Code </p>
            <form name=change_validation_code action="" method="POST">
                ID: <input type="text" name="id3" placeholder="ID">
               New Validation Code: <input type="text" name="new_Validation_Code" placeholder="New Validation Code">
               <input type="submit" class="button" value="Update Validation Code" name="update_Validation_Code">
            </form>
            <br>
            <p> Change the name of a user by entering their ID and the new name </p>
            <form name=change_name action="" method="POST">
                ID: <input type="text" name="id4" placeholder="ID">
                New name: <input type="text" name="new_name" placeholder="New name">
                <input type="submit" class="button" value="Update name" name="update_name">

            </form>
    </body>


</html>
