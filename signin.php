<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$email = $_POST["uid"];
$pass = $_POST["upass"];
$epass = md5($pass);
$select = mysqli_query($conn, "SELECT * FROM `MyGuests` WHERE `email` = '".$email."' AND `pass` = '".$epass."'") or exit(mysqli_error($conn));
if(mysqli_num_rows($select)) {
    echo "logged In!";
}
else{
    echo "email or password is incorrect!";
}

$conn->close();
?>