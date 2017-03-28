<?php
	session_start();

	if (!isset($_SESSION['username'])) {
	  header('Location: projectLogin.php');
	  exit; 
	}
	
$servername = "localhost";      //connections set up
$connUsername = "jrg2";
$password = "password";
$dbname = "jrg2";

$username = $_SESSION["username"];

//$username=$_POST['username'];
$firstName=$_POST['first-name'];
$lastName=$_POST['last-name'];
$emailAddress=$_POST['email-address'];
$city=$_POST['location1'];
$country=$_POST['location2'];
$contactNumber=$_POST['contact-number'];
$additionalInfo=$_POST['additional-informaiton'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	//This allows user to enter special chars
	$additionalInfo = $conn->quote($additionalInfo);
	
    //Update the data regardless if it has changed or not
    $sql = "UPDATE employee SET firstName = '$firstName', lastName = '$lastName', emailAddress = '$emailAddress', contactNumber = '$contactNumber', city = '$city', country = '$country', additionalInfo = $additionalInfo WHERE username = '$username'";

    $conn->exec($sql);
   

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	echo "Profile Updated";
	echo '<a href="your-profile.php">Click here</a>';
?>