<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>View Job</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/default.css" type="text/css">
        <link href="style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet"> 


        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
		<div class="header-area">
			<div class="container">
				<div class="row">
					<div class="main-header clearfix">
						<div class="col-md-5 col-sm-5">
							<div class="header">
								<div class="header-logo">
								   <a href=""><img src="img/logo.png" alt=""></a>
								</div>
							</div>
						</div>
						<div class="col-md-5 col-sm-5">
							<div class="header">
								<div class="header-logo">
									<!-- -->
									<!-- -->
									<!-- Can fill this name with actual job name-->
									<!-- -->
									<!-- -->
									<!-- -->
									<h1>Project Name</h1>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-2">
							<div class="header">
								<div class="header-logo">
									<!--log user out-->
									<button type="submit">Logout</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="employee-menu-area">
			<div class="container">
				<div class="row">
					<div class="main-employee-menu clearfix">
						<div class="col-md-12 col-sm-12">
							<div class="employee-menu">
								  <!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active">
										<a href="#employee-view" aria-controls="employee-view" role="tab" data-toggle="tab">Employee View</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="employee-view">
										<div class="employee-profile-details">
											<div class="single-employee-profile">
												<div class="user-profile-details">
													<?php
														
														$jobID = $_POST["jobID"];
														
														$servername = "localhost";
														$username = "root";
														$password = "root";
														$database = "jrg2";
														
														$conn = new mysqli($servername, $username, $password, $database);
														
														//Check connection
														if($conn->connect_error) {
															die("Connection to MySQL failed %s </br>" . $conn->connect_error);
														}
													
														//Contains the details of the job passed by previous page
														echo "<div class='users-profiles project-name'>";
															echo "<div class='single-users-profile'>";
																echo "<label for='jobTitle'>Job Title:</label>";
																echo "<input class='jobNames' id='jobTitle' name='job-title' type='text'>";
															echo "</div>";
															echo "<div class='single-users-profile'>";
																echo "<label for='startDate'>Start Date:</label>";
																echo "<input class='sdates' id='sdate' name='start-date' type='text'>";
															echo "</div>";
															echo "<div class='single-users-profile'>";
																echo "<label for='startDate'>Start Date:</label>";
																echo "<input class='sdates' id='sdate' name='start-date' type='text'>";
															echo "</div>";
															echo "<div class='single-users-profile'>";
																echo "<label for='jobLocation'>Job Location:</label>";
																echo "<input class='locations' id='jobLocation' name='location' type='text'>";
															echo "</div>";
														echo "</div>";
													
														echo "<div class='users-profiles project-name'>";
															echo "<div class='single-users-profile'>";
																echo "<label for='ptype'>Contract Type:</label>";
																echo "<input class='cTypes' id='contractType' name='contract-type' type='text'>";
															echo "</div>";
															echo "<div class='single-users-profile'>";
																echo "<label for='startdate'>End Date:</label>";
																echo "<input class='edates' id='endDate' name='end-date' type='text'>";
															echo "</div>";
														echo "</div>";							
													?>
												</div>
												
												<!-- info about current project text-->
												<div class="user-profile-skill">
													<div class="user-skill-details">
														<textarea class="uskill" id="skills" name="skill" placeholder="This area will contain informaiton regarding the current project."></textarea>
													</div>
													
													<!--Button allows user to apply to project
														This needs to be changed -->
													<div class='apply-button'>
														<button type='submit'>Apply to Project</button>
													</div>
															
													<div class="two-button">
														<div class="submit-change">
															<div class="return-button">
																<a href="project-search.html">Return to Project Search</a>
															</div>
														</div>
														<div class="return-employee">
															<div class="return-button">
																<a href="employee-menu.html">Return to Main Menu</a>
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
				</div>
			</div>
		</div>
		
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="js/core.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
