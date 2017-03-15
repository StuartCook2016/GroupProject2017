<?php
    

$servername = "localhost";      //connections set up
$username = "jrg2";
$password = "password";
$dbname = "jrg2";


session_start();

$username = $_SESSION["username"];

//$username=$_POST['username'];
$firstName=$_POST['first-name'];
$lastName=$_POST['last-name'];
$emailAddress=$_POST['email-address'];
$country=$_POST['location'];
$contactNumber=$_POST['contact-number'];
$additionalInfo=$_POST['additional-informaiton'];



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Update the data regardless if it has changed or not
    $sql = "UPDATE employee SET firstName = '$firstName', lastName = '$lastName', emailAddress = '$emailAddress', contactNumber = '$contactNumber', country = '$country', additionalInfo = '$additionalInfo' WHERE username = '$username'";

    $conn->exec($sql);
   

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	echo "Profile Updated";
	echo '<a href="your-profile.php">Click here</a>';
?>