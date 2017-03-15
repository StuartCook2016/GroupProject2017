
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

# Run the query, store result in a string and store number of rows returned 
     $result= mysqli_query($con,"select position from accdetails where username='$username' AND passwd='$userpass'") or die("Error: ".mysqli_error($con));
  
     
		    // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
      if($rowcount !=0)
	{
		echo("Result set has $rowcount rows<br>");
	  while ($row = mysqli_fetch_assoc($result))
	{
		
		$level=$row["position"];
			//echo $level;
 
		if($level == 'staff') #user level is sent to user menu
			{
				$_SESSION["username"] = $username;
				header("Location:employeeMenu.php");
			}
		if($level == 'manager')
		{
				$_SESSION["username"] = $username;
				header("Location:manager-menu.html");
		}
	}
}
			else
			{
				header("Location:incorrect_password.php"); #failed login gets error message and another chance to login
			}


	?>

