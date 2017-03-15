<?php
    

$servername = "localhost";      //connections set up
$connUsername = "jrg2";
$password = "password";
$dbname = "jrg2";


session_start();

$username = $_SESSION["username"];

$skillName=$_POST['skillName'];
$yearsXP=$_POST['yearsExp'];



$sql = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Update the data regardless if it has changed or not
	$sql = "INSERT INTO employeeskills (skillName, username, yearsOfXP) VALUES ('" . $skillName . "', '" . $username . "', " . $yearsXP . ")";

    $conn->exec($sql);

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
	// Returns the user to the edit profile screen
	echo"<script>location.href='edit-profile.php'</script>";
?>