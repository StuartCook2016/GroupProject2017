<?php
    session_start();

	if (!isset($_SESSION['username'])) {
		header('Location: projectLogin.php');
		exit; 
	}

	$servername = "localhost";
	$connUsername = "jrg2";
	$password = "password";
	$database = "jrg2";
	
	$conn = new mysqli($servername, $connUsername, $password, $database);
	
	//Check connection
	if($conn->connect_error) {
		die("Connection to MySQL failed %s </br>" . $conn->connect_error);
	}
	
	$projID = $_POST['projID'];
	
	//Get all employee's on this project
	$recieverQuery = "SELECT t1.username FROM "
					. "(SELECT username FROM job AS j, projects AS p WHERE j.projID=" . $projID . " AND j.projID=p.projID) t1"
					. "INNER JOIN "
					. "(SELECT e.username FROM employee AS e, job AS j WHERE e.username=j.username) t2"
					. "ON t1.username = t2.username";
	
	$resultReceiverQuery = $conn->query($recieverQuery);
	
	//if there are results
	if($resultReceiverQuery->num_rows > 0) {
		
		$broadcast = $_POST['broadcast'];
		$broadcast = $conn->real_escape_string($broadcast);
		
		while($row = $resultReceiverQuery->fetch_assoc()) {
			
			$sendMessageQuery = "INSERT INTO messages "
								. "(senderUsername, receiverUsername, message, dateSent) "
								. "VALUES "
								. "('" . $_SESSION['username'] . "', '" . $row['username'] . "', '" . $broadcast . "', " . date("Y/m/d") . ")";
			$resultSendMessageQuery = $conn->query($sendMessageQuery);
		}
		
		$_SESSION['broadcast'] = 'success';
	} else {
		$_SESSION['broadcast'] = 'failed';
	}
	
	
	header('Location: view-project.php');
?>