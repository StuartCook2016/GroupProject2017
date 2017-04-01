<?php
	session_start();

	if (!isset($_SESSION['tempUsername'])) {
	  header('Location: projectLogin.php');
	  exit; 
	}
	
	$newPass = $_POST["newPass"];
	$newPassConfirm = $_POST["newPassConfirm"];
	
	//If the passwords are the same
	if(strcmp($newPass, $newPassConfirm) == 0) {
		
		$conn = mysqli_connect("localhost","jrg2","password","jrg2");
		
		//Check connection
		if($conn->connect_error) {
			die("Connection to MySQL failed %s </br>" . $conn->connect_error);
		}
		
		$username = $_SESSION['tempUsername'];
		
		//"UPDATE accdetails SET passwd='$newPass' WHERE username='
		$changePassQuery = "UPDATE accdetails SET passwd='" . $newPass . "' WHERE username='" . $username . "'";
		$result = $conn->query($changePassQuery);

		//If query was performed successfully
		if($result) {
			?>		
			<!DOCTYPE html>
			<html lang='en'>
				<head>
					<meta charset='utf-8'>
					<meta http-equiv='X-UA-Compatible' content='IE=edge'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>

					<title>Confirm Password</title>

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
							<div class='row'>
								<div class='col-md-4 col-sm-4'></div>
								<div class='col-md-6 col-sm-6'>
									<p>Your password has been changed successfully</p>
									<style>
										p {	color: white;
											font-size:20px;
										  }
									</style>									
								</div>
								<div class='col-md-2 col-sm-2'></div>
							</div>							
							<div class='row'>
								<div class='col-md-4 col-sm-4'></div>
								<div class='col-md-6 col-sm-6'>
									<a href="projectLogin.php">Click here to go to Login screen</a>
									<style>
										a {	color: cyan;
											font-size:20px;
										  }
									</style>
								</div>
								<div class='col-md-2 col-sm-2'></div>
							</div>											
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
							<div class='row'>
								<div class='col-md-4 col-sm-4'></div>
								<div class='col-md-6 col-sm-6'>
									<p>Unable to change password</p>
									<style>
										p {	color: white;
											font-size:20px;
										  }
									</style>									
								</div>
								<div class='col-md-2 col-sm-2'></div>
							</div>							
							<div class='row'>
								<div class='col-md-4 col-sm-4'></div>
								<div class='col-md-6 col-sm-6'>
									<a href="projectLogin.php">Click here to go to Login screen</a>
									<style>
										a {	color: cyan;
											font-size:20px;
										  }
									</style>
								</div>
								<div class='col-md-2 col-sm-2'></div>
							</div>											
						</div>
						<div class='col-md-2 col-sm-2'></div>
					</div>

					<script src='js/jquery.min.js'></script>
					<script src='js/bootstrap.min.js'></script>
					<script src='js/main.js'></script>
				</body>
			</html>
		<?php
		}	
	} else {
		//Passwords did not match
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
						<div class='row'>
							<div class='col-md-4 col-sm-4'></div>
							<div class='col-md-6 col-sm-6'>
								<p>Passwords did not match</p>
								<style>
									p {	color: white;
										font-size:20px;
									  }
								</style>									
							</div>
							<div class='col-md-2 col-sm-2'></div>
						</div>							
						<div class='row'>
							<div class='col-md-4 col-sm-4'></div>
							<div class='col-md-6 col-sm-6'>
								<a href="recover.html">Click here to go to change password screen</a>
								<style>
									a {	color: cyan;
										font-size:20px;
									  }
								</style>
							</div>
							<div class='col-md-2 col-sm-2'></div>
						</div>											
					</div>
					<div class='col-md-2 col-sm-2'></div>
				</div>

				<script src='js/jquery.min.js'></script>
				<script src='js/bootstrap.min.js'></script>
				<script src='js/main.js'></script>
			</body>
		</html>
	<?php
	}
?>