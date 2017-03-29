<?php
    

$servername = "localhost";      //connections set up
$connUsername = "jrg2";
$password = "password";
$dbname = "jrg2";

session_start();

$username = $_SESSION["username"];

$projectName=$_POST['projectName'];
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];
$doorNumber=$_POST['doorNumber'];
$street=$_POST['street'];
$city=$_POST['city'];
$postcode=$_POST['postcode'];
$projectLocation=$_POST['projectLocation'];




try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Insert Project
    $sql = "INSERT INTO projects (projID, managerUsername, projName, startDate, endDate, finished, doorNumber, street, city, postcode, country, details) VALUES ('NULL', '$username', '$projectName', '$startDate', '$endDate', 'N', '$doorNumber', '$street', '$city', '$postcode', '$projectLocation', 'Testing')";

	

    $conn->exec($sql);
   

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	echo "Project Created";
	echo '<a href="manager-menu.php">Click here</a>';
?>