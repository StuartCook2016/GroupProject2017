<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>Employee Menu</title>

        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link href='css/font-awesome.min.css' rel='stylesheet'>
        <link href='style.css' rel='stylesheet'>
        <link href='css/responsive.css' rel='stylesheet'>

        <link href='https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext' rel='stylesheet'> 


        <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->
    </head>
    <body>

		<div class='header-area'>
			<div class='container'>
				<div class='row'>
					<div class='main-header clearfix'>
						<div class='col-md-5 col-sm-5'>
							<div class='header'>
								<div class='header-logo'>
								<img src='img/logo.png' alt=''>
								</div>
							</div>
						</div>
						<div class='col-md-5 col-sm-5'>
							<div class='header'>
								<div class='header-logo'>
									<h1>Employee Menu</h1>
								</div>
							</div>
						</div>
						<div class='col-md-2 col-sm-2'>
							<div class='header'>
								<div class='header-logo'>
								<!--log user out-->
									<a href = 'projectLogin.php'>Logout</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class='employee-menu-area'>
			<div class='container'>
				<div class='row'>
					<div class='main-employee-menu clearfix'>
						<div class='col-md-12 col-sm-12'>
							<div class='employee-menu'>
								  <!-- Nav tabs -->
								<ul class='nav nav-tabs' role='tablist'>
									<li role='presentation' class='active'>
										<a href='#employee-view' aria-controls='employee-view' role='tab' data-toggle='tab'>Employee View</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class='tab-content'>
									<div role='tabpanel' class='tab-pane active' id='employee-view'>
										<div class='employee-menu-describe'>
											<div class='single-employee'>
												<!--button links to these pages-->
												<form name='frm3' method ='post' action ='your-profile.php'>
													<div class='view-profile-employee'>											
														<input type='submit' name ='Submit' value ='View Profile'>
													</div>
												</form>
												<div class='view-current-project'>
													<a href='current-project.php'>View Current Projects</a>
												</div>
												<div class='view-for-project'>
													<a href='project-search.html'>Search For Projects</a>
												</div>
												<div class='view-application'>
													<a href='current-application.php'>View Applications</a>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <script src='js/jquery.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src='js/main.js'></script>
    </body>
</html>
