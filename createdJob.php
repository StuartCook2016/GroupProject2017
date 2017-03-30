<?php
    

$servername = "localhost";      //connections set up
$connUsername = "jrg2";
$password = "password";
$dbname = "jrg2";

$username=$_POST['username'];
$jobTitle=$_POST['jobTitle'];
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];
$doorNumber=$_POST['contractType'];
$street=$_POST['salary'];





try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUsername, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	if($username = NULL)
	{
    //Insert Job
    $sql = "INSERT INTO job (jobID, projID, username, title, contractType, startDate, endDate, salary, details) VALUES ('NULL', '$username', '$projectName', '$startDate', '$endDate', 'N', '$doorNumber', '$street', '$city', '$postcode', '$projectLocation', 'Testing')";
	}
	else
	{
	 $sql = "INSERT INTO job (jobID, projID, username, title, contractType, startDate, endDate, salary, details) VALUES ('NULL', '$username', '$projectName', '$startDate', '$endDate', 'N', '$doorNumber', '$street', '$city', '$postcode', '$projectLocation', 'Testing')";	
	}
	

    $conn->exec($sql);
   

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	echo "Project Created";
	echo '<a href="manager-menu.php">Click here</a>';
?>