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

$uname = $_POST["uname"];
$email = $_POST["uid"];
$pass = $_POST["upass"];
$conpass = $_POST["uconpass"];

$select = mysqli_query($conn, "SELECT `email` FROM `MyGuests` WHERE `email` = '".$email."'") or exit(mysqli_error($conn));
if(mysqli_num_rows($select)) {
    exit('This email is already being used');
}
else
{

if($pass == $conpass)
{
    $epass = md5($pass);
$sql = "INSERT INTO MyGuests (uname, email, pass, conpass)
VALUES ('$uname', '$email', '$epass', '$conpass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else
{
    echo "password and confirm password should be same";
}
}

$conn->close();
?>