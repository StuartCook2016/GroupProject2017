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

$jobID=$_POST['jobID'];
$skillName=$_POST['skillName'];
$yearsXP=$_POST['yearsExp'];



$sql = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Update the data regardless if it has changed or not
	$sql = "INSERT INTO jobskills (skillName, jobID, yearsOfXP) VALUES ('" . $skillName . "', '" . $jobID. "', " . $yearsXP . ")";

    $conn->exec($sql);

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
	$_SESSION['jobID'] = $jobID;
	// Returns the user to the edit profile screen
	echo"<script>location.href='editJob.php'</script>";
?>