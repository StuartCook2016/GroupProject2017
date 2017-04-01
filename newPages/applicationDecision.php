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
	
	$conn = new mysqli($servername, $connUsername, $password, $dbname);
	
	//Check connection
	if($conn->connect_error) {
		die("Connection to MySQL failed %s </br>" . $conn->connect_error);
	}
	
	$username = $_SESSION['username'];
	$jobID = $_POST['jobID'];
	$status = $_POST['status'];
	$decision = $_POST['decision'];
	
	var_dump($_POST);
	var_dump(strcasecmp($status, "accepted") == 0);
	var_dump(strcasecmp($decision, "accept"));
	if((strcasecmp($status, "accepted") == 0) && strcasecmp($decision, "accept") == 0) {
		//add the employee to the job
		//update but set username to be session username
		$addEmployeeQuery = "UPDATE job SET username = '$username' WHERE jobID = $jobID";
		echo $addEmployeeQuery;
		$resultEmployeeQuery = $conn->query($addEmployeeQuery);	
		//remove the application
		$removeApplication = "DELETE FROM applications WHERE jobID=$jobID AND username='$username'";
		echo $removeApplication;
	} else {
		//remove the application
		$removeApplication = "DELETE FROM applications WHERE jobID=$jobID AND username='$username'";
		echo $removeApplication;
	}
	
	
	
?>