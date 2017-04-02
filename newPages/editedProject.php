<?php
    

$servername = "localhost";      //connections set up
$connUsername = "jrg2";
$password = "password";
$dbname = "jrg2";

session_start();

$username = $_SESSION["username"];

$projName=$_POST['projName'];
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];
$doorNumber=$_POST['doorNumber'];
$street=$_POST['street'];
$city=$_POST['city'];
$postcode=$_POST['postcode'];
$projectLocation=$_POST['projectLocation'];
$details=$_POST['details'];
$finished=$_POST['finished'];

$projID=$_POST['projID'];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$projName = $conn->quote($projName);
	$street = $conn->quote($street);
	$city = $conn->quote($city);
	$projectLocation = $conn->quote($projectLocation);
	$details = $conn->quote($details);
	$finished = $conn->quote($finished);
	
	//Update Project
    $sql = "UPDATE projects SET projName = $projName, startDate = '$startDate', endDate = '$endDate', finished = $finished, doorNumber = '$doorNumber', street = $street, city = $city, postcode = '$postcode', country = $projectLocation, details = $details WHERE managerUsername = '$username' AND projID='$projID'";
	

    $conn->exec($sql);
   

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

	header("Location:manage-project.php");
?>