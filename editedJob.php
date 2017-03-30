<?php
    

$servername = "localhost";      //connections set up
$connUsername = "jrg2";
$password = "password";
$dbname = "jrg2";



$jobID=$_POST['jobID'];
$username=$_POST['username'];
$jobTitle=$_POST['jobTitle'];
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];
$contractType=$_POST['contractType'];
$salary=$_POST['salary'];
$details=$_POST['details'];




try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Update Project
    $sql = "UPDATE job SET username = '$username', title = '$jobTitle', startDate = '$startDate', endDate = '$endDate', contractType = '$contractType', salary = '$salary', details = '$details' WHERE jobID = '$jobID'";
	
    $conn->exec($sql);
   

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
	echo '<a href="manager-menu.php">Click here</a>';
?>