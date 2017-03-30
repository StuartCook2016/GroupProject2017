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
					. "(SELECT username FROM job AS j, projects AS p WHERE j.projID=" . $projID . " AND j.projID=p.projID) t1 "
					. "INNER JOIN "
					. "(SELECT DISTINCT e.username FROM employee AS e, job AS j WHERE e.username=j.username) t2 "
					. "ON t1.username = t2.username";
	
	echo $recieverQuery;
	
	$resultReceiverQuery = $conn->query($recieverQuery);
	
	//if there are results
	if($resultReceiverQuery->num_rows > 0) {
		
		$broadcast = $_POST['broadcast'];
		$broadcast = $conn->real_escape_string($broadcast);
		
		while($row = $resultReceiverQuery->fetch_assoc()) {
			echo "</br>";
			$sendMessageQuery = "INSERT INTO messages "
								. "(senderUsername, receiverUsername, message, dateSent) "
								. "VALUES "
								. "('" . $_SESSION['username'] . "', '" . $row['username'] . "', '" . $broadcast . "', '" . gmdate("Y/m/d") . "')";
			
			echo $sendMessageQuery;
			$resultSendMessageQuery = $conn->query($sendMessageQuery);
		}
		
		$_SESSION['broadcast'] = 'success';
	} else {
		$_SESSION['broadcast'] = 'failed';
	}
	
	$_SESSION['projID'] = $projID;
	
	header('Location: view-project.php');
?>