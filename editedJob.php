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
    
    //Update Project
    $sql = "UPDATE projects SET projName = '$projectName', startDate = '$startDate', endDate = '$endDate', doorNumber = '$doorNumber', street = '$street', city = '$city', postcode = 'postcode', country = '$country' WHERE username = '$username' AND projName = '$projectName'";
	


	

    $conn->exec($sql);
   

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	echo "Project Created";
	echo '<a href="manager-menu.php">Click here</a>';
?>