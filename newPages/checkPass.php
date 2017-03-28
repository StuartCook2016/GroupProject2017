<?php
	session_start();

	if (!isset($_SESSION['username'])) {
	  header('Location: projectLogin.php');
	  exit; 
	}
	
	$newPass = $_POST["newPass"];
	$newPassConfirm = $_POST["newPassConfirm"];
	
	//If the passwords are the same
	if(strcmp($newPass, $newPassConfirm) == 0) {
		
		$conn = mysqli_connect("localhost","jrg2","password","jrg2");
		
		//Check connection
		if($conn->connect_error) {
			die("Connection to MySQL failed %s </br>" . $conn->connect_error);
		}
		
		$username = $_SESSION['username'];
		
		//"UPDATE accdetails SET passwd='$newPass' WHERE username='
		$changePassQuery = "UPDATE accdetails SET passwd='" . $newPass . "' WHERE username='" . $username . "'";
		$result = $conn->query($changePassQuery);
	
		//If query was performed successfully
		if($result) {
			header('Location:passwordSuccess.php');
		} else {
			header('Location:passwordFailed.php');
		}
	} else {
		header('Location:passwordFailed.php');
	}
?>