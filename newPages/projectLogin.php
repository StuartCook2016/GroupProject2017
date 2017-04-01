<?php
	session_start();
	// Remove all session variables
	$_SESSION = array();
	// Destroy the session
	session_destroy();
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>Login</title>

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
				<form name="frm6" method="post" action="storedPass_db.php">
					<div class='row'>
						<div class='col-md-2 col-sm-2'></div>
						<div class='col-md-8 col-sm-8'>
							<div class="login-login">
								<img src="img/logo.png">
							</div>
						</div>
						<div class='col-md-2 col-sm-2'></div>
					</div>
					<div class='row'>
						<div class='col-md-4 col-sm-4'></div>
						<div class='col-md-6 col-sm-6'>
							<div class="login-login">
								<h2>Login</h2>
							</div>
						</div>
						<div class='col-md-2 col-sm-2'></div>
					</div>
					<div class='row'>
						<div class='col-md-4 col-sm-4'></div>
						<div class='col-md-6 col-sm-6'>
							<!--user enters username and password-->
							<div class='user-name'>
								<input class='name form-control' name='username' type='text'  placeholder='Enter your username' maxLength='20'>
							</div>
							<div class='user-password'>
								<input class='password form-control' name='passwd' type='password' placeholder='Enter your password' maxLength='25'>
							</div>
						</div>
						<div class='col-md-2 col-sm-2'></div>
					</div>
					
					<div class='row'>
						<div class='col-md-4 col-sm-4'></div>
						<div class='col-md-6 col-sm-6'>
							<div class='login-button'>
								<!-- this button logs user into right account-->
								<input type='submit' name='Submit' value='Login'>
							</div>
						</div>
						<div class='col-md-2 col-sm-2'></div>
					</div>
				</form>
				<div class='row'>
					<div class='col-md-4 col-sm-4'></div>
					<div class='col-md-6 col-sm-6'>
						<!-- should take to recover.html-->
						<a href='recover.html'>Forgotten Password?</a>
					</div>
				</div>
			</div>
			<div class='col-md-2 col-sm-2'></div>
		</div>

        <script src='js/jquery.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src='js/main.js'></script>
    </body>
</html>
