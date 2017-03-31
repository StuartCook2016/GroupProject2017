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

	$username=$_POST['username'];
	$projID=$_POST['projID'];
	$jobTitle=$_POST['jobTitle'];
	$startDate=$_POST['startDate'];
	$endDate=$_POST['endDate'];
	$contractType=$_POST['contractType'];
	$salary=$_POST['salary'];
	$details=$_POST['details'];


	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
		$details = $conn->quote($details);
		$jobTitle = $conn->quote($jobTitle);
		$salary = $conn->quote($salary);

		if(empty($username))
		{
		//Insert Job
		$sql = "INSERT INTO job (jobID, projID, username, title, contractType, startDate, endDate, salary, details) VALUES (NULL, '$projID', NULL, $jobTitle, '$contractType', '$startDate', '$endDate', $salary, $details)";
		}
		else
		{
		 $sql = "INSERT INTO job (jobID, projID, username, title, contractType, startDate, endDate, salary, details) VALUES (NULL, '$projID', $username, $jobTitle, '$contractType', '$startDate', '$endDate', $salary, $details)";	
		}

		$conn->exec($sql);
	   

	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
		$_SESSION['projID'] = $projID;
		header("Location:view-job.php");
?>