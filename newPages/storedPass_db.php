<?php
	session_start();

	$username=$_POST['username'];
	$userpass=$_POST['passwd'];
	$con=mysqli_connect("localhost","jrg2","password","jrg2");
      
	// Check connection
	if (mysqli_connect_errno())
    {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	//Run the query, store result in a string and store number of rows returned 
    $result= mysqli_query($con,"SELECT position FROM accdetails WHERE username='$username' AND passwd= BINARY '$userpass'") or die("Error: ".mysqli_error($con));
  
     
	//Return the number of rows in result set
	$rowcount=mysqli_num_rows($result);
    if($rowcount !=0)
	{
		echo("Result set has $rowcount rows<br>");
		while ($row = mysqli_fetch_assoc($result))
		{
			$_SESSION["username"] = $username;
			header("Location:menu.php");
		}
	} else
	{
		header("Location:incorrect_password.php"); #failed login gets error message and another chance to login
	}
?>

