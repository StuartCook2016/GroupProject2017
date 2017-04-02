<?php
	session_start();

	if (!isset($_SESSION['username'])) {
	  header('Location: projectLogin.php');
	  exit; 
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Your Applications</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/default.css" type="text/css">
        <link href="style.css" rel="stylesheet">
		<link href="style2.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet"> 


        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
		<div class='header-area'>
			<nav class='navbar navbar-default navbar-fixed-top'>
				<div class='container-fluid'>
				<!-- Brand and toggle get grouped for better mobile display -->
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
							<span class='sr-only'>Toggle navigation</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='menu.php'>HOME</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
						<ul class='nav navbar-nav'>
							<!-- these buttons take to profile, projects and search project (employee functions)-->
							<form class='navbar-form navbar-left' name='profileForm' action='your-profile.php' method='post'>
								<input type='submit' class='btn btn-default' name='profile' value='Profile'>
							</form>
							<form class='navbar-form navbar-left' name='currentProjectsForm' action='current-project.php' method='post'>
								<input type='submit' class='btn btn-default' name='currentProjects' value='Current Projects'>
							</form>
							<form class='navbar-form navbar-left' name='jobsForm' action='job-search.php' method='post'>
								<input type='submit' class='btn btn-default' name='jobs' value='Search For Jobs'>
							</form>
			
							<li class='dropdown'>
								<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Updates<span class='caret'></span></a>
								<ul class='dropdown-menu'>
									<form class='navbar-form navbar-left' name='messagesForm' action='' method='post'>										
										<li><input type='submit' class='btn btn-default' name='messages' value='Messages'></li>
									</form>
									<form class='navbar-form navbar-left' name='applicationsForm' action='current-application.php' method='post'>										
										<li><input type='submit' class='btn btn-default' name='applications' value='Applications'></li>
									</form>
								</ul>
							</li>
						
							<?php
								
								$servername = "localhost";
								$connUsername = "jrg2";
								$password = "password";
								$database = "jrg2";
								
								$conn = new mysqli($servername, $connUsername, $password, $database);
								
								//Check connection
								if($conn->connect_error) {
									die("Connection to MySQL failed %s </br>" . $conn->connect_error);
								}
								
								if(!isset($_SESSION["username"]) || empty($_SESSION["username"])) {									
									die("You do not have permission to access this page");					
								}
								
								$username = $_SESSION["username"];
								
								$positionQuery = "SELECT position FROM accdetails AS a WHERE a.username = '" . $username . "'";
								$result = $conn->query($positionQuery);
								
								if($result->num_rows > 0) {
									
									$row = $result->fetch_assoc();
									//if user is a manager then display manager functions
									if(strcasecmp($row["position"], "manager") == 0) {
										echo "<!--buttons to go to manager projects, create project, search employee-->";
										echo "<form class='navbar-form navbar-left' name='managedProjectsForm' action='manage-project.php' method='post'>";
											echo "<input type='submit' class='btn btn-default' name='managedProjects' value='Managed Projects'>";
										echo "</form>";
										echo "<form class='navbar-form navbar-left' name='createProjectForm' action='create-project.php' method='post'>";
											echo"<input type='submit' class='btn btn-default' name='createProjects' value='Create Project'>";
										echo "</form>";
										echo "<form class='navbar-form navbar-left' name='searchEmployeeForm' action='search-employee.php' method='post'>";
											echo "<input type='submit' class='btn btn-default' name='searchEmployee' value='Search For Employee'>";
										echo "</form>";	
									} else {
									}										
								} else {
								}									
							?>
						</ul>
						
						<div class='logout-button'>
							<ul class='nav navbar-nav navbar-right'>
								<!--log user out-->
								<form action="projectLogin.php">
									<input type="submit" class='btn btn-default logout' value="Logout"/>
								</form>
							</ul>
						</div>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>		
		</div>
		<div class="employee-menu-area">
			<div class="container">
				<div class="row">
					<div class="main-employee-menu clearfix">
						<div class="col-md-12 col-sm-12">
							<div class="employee-menu">
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="employee-view">
										<div class="employee-profile-details">
											<div class="single-employee-profile">
												<h2>Your Applications</h2>
												<div class="user-profile-skrill">
													<div class="user-skill-details">
														<div class="single-employee-form">
															<table>
																<tr>
																	<th>Job Title</th>
																	<th>Status</th>
																	<th>View Job</th>
																	<th>Accept</th>
																	<th>Decline</th>
																</tr>
																
																<?php
																	$username = $_SESSION['username'];
																	
																	$applicationsQuery = "SELECT * FROM "
																						. "applications AS a, job AS j "
																						. "WHERE a.jobID = j.jobID "
																						. "AND a.username = '" . $username . "'";
																						
																	$resultApplicationsQuery = $conn->query($applicationsQuery);
																	
																	$activeFlag = 0;
																	//if there are results
																	while($rowApplicationsQuery = $resultApplicationsQuery->fetch_assoc()) {
																			
																		//Used to display alternating colour in table rows
																		if($activeFlag % 2 == 0) {
																			echo "<tr>";
																		} else {
																			echo "<tr class='active'>";
																		}
																		
																		echo "<td>" . $rowApplicationsQuery['title'] . "</td>";
																		echo "<td>" . $rowApplicationsQuery['status'] . "</td>";
																		echo "<td>";
																			echo "<form action='view-job.php' method='post'>";
																				echo "<input type='hidden' name='jobID' value='" . $rowApplicationsQuery['jobID'] . "'>";
																				echo "<input type='submit' value='View'>";
																			echo "</form>";
																		echo "</td>";																		
																		
																		$status = $rowApplicationsQuery['status'];
																		if(strcasecmp($status, 'Accepted') == 0) {
																			echo "<td>";
																				echo "<form action='applicationDecision.php' method='post'>";
																					echo "<input type='hidden' name='jobID' value='" . $rowApplicationsQuery['jobID'] . "'>";
																					echo "<input type='hidden' name='status' value='" . $rowApplicationsQuery['status'] . "'>";
																					echo "<input type='hidden' name='decision' value='Accept'>";
																					echo "<input type='submit' value='Accept'>";
																				echo "</form>";
																			echo "</td>";
																			echo "<td>";
																				echo "<form action='applicationDecision.php' method='post'>";
																					echo "<input type='hidden' name='jobID' value='" . $rowApplicationsQuery['jobID'] . "'>";
																					echo "<input type='hidden' name='status' value='" . $rowApplicationsQuery['status'] . "'>";
																					echo "<input type='hidden' name='decision' value='Decline'>";
																					echo "<input type='submit' value='Decline'>";
																				echo "</form>";
																			echo "</td>";																			
																		} else if(strcasecmp($status, 'Pending') == 0) {
																			echo "<td>";
																			echo "</td>";
																			echo "<td>";
																			echo "</td>";
																		} else {
																			echo "<td>";
																			echo "</td>";
																			echo "<td>";
																				echo "<form action='applicationDecision.php' method='post'>";
																					echo "<input type='hidden' name='jobID' value='" . $rowApplicationsQuery['jobID'] . "'>";
																					echo "<input type='hidden' name='status' value='" . $rowApplicationsQuery['status'] . "'>";
																					echo "<input type='hidden' name='decision' value='Remove'>";
																					echo "<input type='submit' value='Remove'>";
																				echo "</form>";
																			echo "</td>";
																		}																			
																	}
																?>
															</table>																	
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
		
		<div class='footer-dark'>
			<footer>
				<div class='container'>
					<div class='row'>
						<a href='http://www2.macs.hw.ac.uk/~cdb3/Aegis%20Solutions/'>Powered by Aegis Solutions © 2016</a>
					</div>
				</div>
			</footer>
		</div>
		
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="js/core.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>