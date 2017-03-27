<?php
	session_start();

	if (!isset($_SESSION['username'])) {
	  header('Location: projectLogin.php');
	  exit; 
	}
?>

<html>
 <head>
     <title>Password fail</title>
     <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
     <meta name="HandheldFriendly" content="true" />
     <meta name="MobileOptimized" content="320" />
     <meta name="Viewport" content="width=device-width" />
  </head>
  <body>

<?php



print("The information you have entered is incorrect. Please click the link below to return to the Login Screen.");
?>

<p><a href="projectLogin.html">Return to Login Screen </a></p>


</body>

</html>
