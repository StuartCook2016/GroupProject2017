<html>
 <head>
     <title>Edited Profile</title>
     <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
     <meta name="HandheldFriendly" content="true" />
     <meta name="MobileOptimized" content="320" />
     <meta name="Viewport" content="width=device-width" />
  </head>
  <body>

<?php
session_start();

$username = $_SESSION["username"];

//$username=$_POST['username'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$emailAddress=$_POST['emailAddress'];
$currentLocation=$_POST['country'];
$contactNumber=$_POST['contactNumber'];

$con=mysqli_connect("localhost","jrg2","password","jrg2");
      // Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

# Run the query, store result in a string and store number of rows returned 
	 $result= mysqli_query($con,"UPDATE employee SET firstName = '$firstName', lastName = '$lastName', emailAddress = '$emailAddress', contactNumber = '$contactNumber', country = '$currentLocation' WHERE username = '$username'") or die("Error: ".mysqli_error($con));
     
		    // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
      if($rowcount !=0)
	{
		echo("Result set has $rowcount rows<br>");
	  while ($row = mysqli_fetch_assoc($result))
	{

	}
}

	?>

	
	
</body>

</html>