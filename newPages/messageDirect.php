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
	
		
	$broadcast = $_POST['broadcast'];
	$broadcast = $conn->real_escape_string($broadcast);
		 
			
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