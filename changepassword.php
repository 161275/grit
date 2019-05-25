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

$username = $_POST['username'];
        $password = $_POST['password'];
        $epass = md5($password);
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $result = mysqli_query($conn, "SELECT `pass` FROM `MyGuests` WHERE 
`email` = '".$username."' AND `pass` = '".$epass."' ");
// echo mysqli_num_rows($result);
        // $result = mysqli_query($conn, "SELECT `pass` FROM `MyGuests` WHERE `email` = '".$username."'");
        if(mysqli_num_rows($result) == 0)
        {
        echo "The username or password you entered does not exist";
        }
        else{
        if($newpassword == $confirmnewpassword)
        {
            $epassnew = md5($newpassword);
            $sql=mysqli_query($conn, "UPDATE MyGuests SET pass='$epassnew' where email='$username'");
        }
        
        if($sql)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
       }
    }
       $conn->close();
      ?>