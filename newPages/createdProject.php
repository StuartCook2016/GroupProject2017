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

	$projectName=$_POST['projectName'];
	$startDate=$_POST['startDate'];
	$endDate=$_POST['endDate'];
	$doorNumber=$_POST['doorNumber'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$postcode=$_POST['postcode'];
	$projectLocation=$_POST['projectLocation'];
	$details=$_POST['details'];



	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//escape special characters
		$projectName = $conn->quote($projectName);
		$street = $conn->quote($street);
		$city = $conn->quote($city);
		$details = $conn->quote($details);
		$projectLocation = $conn->quote($projectLocation);
		
		//Insert Project
		$sql = "INSERT INTO projects (projID, managerUsername, projName, startDate, endDate, finished, doorNumber, street, city, postcode, country, details) VALUES (NULL, '$username', $projectName, '$startDate', '$endDate', 'N', '$doorNumber', $street, $city, '$postcode', $projectLocation, $details)";

		

		$conn->exec($sql);
	   

		}
	catch(PDOException $e)
		{
		echo $sql . "<br>" . $e->getMessage();
		}
		
		header("Location:managed-projects.php");
?>