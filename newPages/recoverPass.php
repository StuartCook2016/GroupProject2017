<?php

	$conn = new mysqli("localhost", "jrg2", "password", "jrg2");
	
	//Check connection
	if($conn->connect_error) {
		die("Connection to MySQL failed %s </br>" . $conn->connect_error);
	}
	
	$username = $_POST["username"];
	$email = $_POST["email"];
	
	$verificationQuery = "SELECT * FROM employee WHERE username='" . $username . "' AND emailAddress='" . $email . "'";
	$result = $conn->query($verificationQuery);
	
	if($result->num_rows > 0) {
		
		session_start();
		
		$_SESSION['tempUsername'] = $username;
		
		?>
		<!DOCTYPE html>
		<html lang='en'>
			<head>
				<meta charset='utf-8'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>

				<title>Enter New Password</title>

				<link href='css/bootstrap.min.css' rel='stylesheet'>
				<link href='css/font-awesome.min.css' rel='stylesheet'>
				<link href='login.css' rel='stylesheet'>
				<link href='css/responsive.css' rel='stylesheet'>

				<link href='https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext' rel='stylesheet'> 

				<!--[if lt IE 9]>
				<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
				<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
				<![endif]-->
			</head>
			<body>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class='login-area'>
					<div class='container'>
						<form name="frm6" method="post" action="confirmPass.php">
							<div class='row'>
								<div class='col-md-4 col-sm-4'></div>
								<div class='col-md-6 col-sm-6'>
									<p>Enter New Password</p>
									<style>
										p {	color: white;
											font-size:35px;
										  }
									</style>
									<!--user enters username and password-->
									<div class='user-name'>
										<input class='password form-control' name='newPass' type='password'  placeholder='Enter a new password' maxLength='25'>
									</div>
									<div class='user-password'>
										<input class='password form-control' name='newPassConfirm' type='password' placeholder='Confirm a new passwrod' maxLength='25'>
									</div>
								</div>
								<div class='col-md-2 col-sm-2'></div>
							</div>
							
							<div class='row'>
								<div class='col-md-4 col-sm-4'></div>
								<div class='col-md-6 col-sm-6'>
									<div class='login-button'>
										<!-- this button logs user into right account-->
										<input type='submit' name='Submit' value='Submit'>
									</div>
								</div>
								<div class='col-md-2 col-sm-2'></div>
							</div>
						</form>						
					</div>
					<div class='col-md-2 col-sm-2'></div>
				</div>

				<script src='js/jquery.min.js'></script>
				<script src='js/bootstrap.min.js'></script>
				<script src='js/main.js'></script>
			</body>
		</html>
	<?php
	} else {
		header("Location:projectLogin.php");
	}
	?>