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

        <title>View Project</title>

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
						<a class='navbar-brand' href='menu.php'>Brand</a>
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

		<?php
			
			//check projID has been posted
			if(isset($_POST['projID']) && !empty($_POST['projID'])) {
				$projID = $_POST["projID"];
			} else {
				//projID is in SESSION
				$projID = $_SESSION["projID"];
			}
			
		
			$projectsQuery = "SELECT * FROM projects WHERE projID=" . $projID;
			$resultProjectsQuery = $conn->query($projectsQuery);
			
			if($resultProjectsQuery->num_rows > 0) {

				$row = $resultProjectsQuery->fetch_assoc();
			?>
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
														<div class="user-profile-details">
															<div class="users-profiles project-name">
																<!-- Project Name -->
																<div class="single-users-profile">
																	<label for="projName">Project Name:</label>
																	<input class="fnames form-control" id="projName" name="projName" type="text" 
																		value="<?php echo $row["projName"];?>" readonly="true">
																</div>																
																<!-- Start Date -->
																<div class="single-users-profile">
																	<label for="startDate">Start Date:</label>
																	<input class="fnames form-control" id="startDate" name="startDate" type="text" 
																		value="<?php echo $row["startDate"];?>" readonly="true">
																</div>
																<!-- End Date -->
																<div class="single-users-profile">
																	<label for="startDate">End Date:</label>
																	<input class="fnames form-control" id="endDate" name="endDate" type="text" 
																		value="<?php echo $row["endDate"];?>" readonly="true">
																</div>
																<!-- Finished -->
																<div class="single-users-profile">
																	<label for="finished">Finished:</label>
																	<input class="fnames form-control" id="finished" name="finished" type="text" 
																		value="<?php echo $row["finished"];?>" readonly="true">
																</div>
															</div>
															<div class="users-profiles project-name">
																<!-- Manager Username -->
																<div class="single-users-profile">
																	<label for="managerUsername">Manager Username:</label>
																	<input class="fnames form-control" id="managerUsername" name="managerUsername" type="text" 
																		value="<?php echo $row["managerUsername"];?>" readonly="true">
																</div>
																<!-- Project Location - City -->
																<div class="single-users-profile">
																	<label for="plocation">Project Location:</label>
																	<input class="plocations form-control" id="plocation1" name="project-location1" type="text" 
																		value="<?php echo $row["city"];?>" readonly="true">
																</div>
																<!-- Project Location - Country -->
																<div class="single-users-profile">
																	<label></label>
																	<input class="plocations form-control" id="plocation2" name="project-location2" type="text" 
																		value="<?php echo $row["country"];?>" readonly="true">
																</div>

																<?php
																//If the logged in user is the manager of the project
																if(strcasecmp($username, $row["managerUsername"]) == 0) {
																?>
																	<div class="search-button">
																		<form action="edit-project.php" method="post">
																			<input type="submit" value="Edit Project">
																		</form>
																	</div>																	
																
																	<div class="search-button">
																		<form action="create-job.php" method="post">
																			<input type="submit" value="Add Job">
																		</form>
																	</div>
																<?php
																}
																?>
															</div>
														</div>
														<div class="user-profile-skrill">
															<div class="user-skill-details">
																<div class="single-employee-form">
																	<table align="center">
																		<tr>
																			<th>Username</th>
																			<th>Job Title</th>
																			<th>Send Message</th>
																			<th>View Profile</th>
																		</tr>
																		
																		<?php																							
																			$employeeQuery = "SELECT t1.username, t2.title FROM "
																							. "(SELECT j.username FROM job AS j, projects AS p WHERE j.projID=" . $projID . " AND j.projID=p.projID) t1 "
																							. "INNER JOIN "
																							. "(SELECT e.username, title FROM employee AS e, job AS j WHERE e.username=j.username) t2 "
																							. "ON t1.username = t2.username";
																			$resultEmployeeQuery = $conn->query($employeeQuery);
																			
																			//if there are results
																			if($resultEmployeeQuery->num_rows > 0) {

																				$activeFlag = 0;
																				while($rowEmployeeQuery = $resultEmployeeQuery->fetch_assoc()) {
																					
																					//Used to display alternating colours in table rows
																					if($activeFlag % 2 == 0) {
																						echo "<tr>";
																					} else {
																						echo "<tr class='active'>";
																					}																					
																						echo "<td>" . $rowEmployeeQuery['username'] . "</td>";
																						echo "<td>" . $rowEmployeeQuery['title'] . "</td>";
																						
																						//If the logged in user is the manager of the project
																						if(strcasecmp($username, $row["managerUsername"]) == 0) {
																							//Used to send a message directly to an employee
																							echo "<td>";
																								echo "<form action='#' method='post'>";
																									echo "<input type='hidden' name='chosenUsername' value='" . $rowEmployeeQuery['username'] . "'>";
																									echo "<input type='submit' value='Message'>";
																								echo "</form>";
																							echo "</td>";
																							
																							//Used to view employees profile
																							echo "<td>";
																								echo "<form action='view-profile.php' method='post'>";
																									echo "<input type='hidden' name='chosenUsername' value='" . $rowEmployeeQuery['username'] . "'>";
																									echo "<input type='submit' value='View'>";
																								echo "</form>";
																							echo "</td>";
																						}
																					echo "</tr>";
																					
																					$activeFlag++;
																				}
																			}
																		?>
																	</table>
																	</br>
																	</br>
																</div>
																<div class="single-employee-form">
																	<table align="center">
																		<tr>
																			<th>Job Title</th>
																			<th>Username</th>
																			<th>Contract Type</th>
																			<th>Start Date</th>
																			<th>End Date</th>
																			<th>View Job</th>
																		</tr>
																		
																		<?php
																			/*$jobsQuery = "SELECT j.jobID, j.title, j.username, j.contractType, j.startDate, j.endDate FROM "
																						. "job AS j, projects AS p "
																						. "WHERE j.projID=p.projID "
																						. "AND j.projID=" . $projID;*/
																						
																			//Simpler version of above query
																			$jobsQuery = "SELECT jobID, title, username, contractType, startDate, endDate FROM "
																						. "job AS j "
																						. "WHERE j.projID=" . $projID;
																			
																			$resultJobsQuery = $conn->query($jobsQuery);
																			
																			//if there are results
																			if($resultJobsQuery->num_rows > 0){
																				
																				$activeFlag = 0;
																				while($rowJobsQuery = $resultJobsQuery->fetch_assoc()) {
																					
																					//Used to display alternating colours in table rows
																					if($activeFlag % 2 == 0) {
																						echo "<tr>";
																					} else {
																						echo "<tr class='active'>";
																					}
																					
																						echo "<td>" . $rowJobsQuery['title'] . "</td>";
																						echo "<td>" . $rowJobsQuery['username'] . "</td>";
																						echo "<td>" . $rowJobsQuery['contractType'] . "</td>";
																						echo "<td>" . $rowJobsQuery['startDate'] . "</td>";
																						echo "<td>" . $rowJobsQuery['endDate'] . "</td>";
																						
																						echo "<td>";
																							echo "<form action='view-job.php' method='post'>";
																								echo "<input type='hidden' name='jobID' value='" . $rowJobsQuery['jobID'] . "'>";
																								echo "<input type='submit' value='View'>";
																							echo "</form>";
																						echo "</td>";
																					echo "</tr>";
																						
																					$activeFlag++;
																				}
																			}																		
																		?>
																	</table>
																</div>
																</br>
																</br>
																<div single-employee-form>
																	<label for="broadcast">Broadcast a message</label>
																	<form action="messageBroadcast.php" method="post">
																		<?php			
																		
																		if(isset($_SESSION['broadcast'])) {
																			
																			if(strcasecmp($_SESSION['broadcast'], "success") == 0) {
																				echo "<textarea class='ainformaitons' id='broadcast' name='broadcast' style='resize: none;'>Your message has been sent</textarea>";
																				unset($_SESSION['broadcast']);
																			} else if(strcasecmp($_SESSION['broadcast'], "failed") == 0) {
																				echo "<textarea class='ainformaitons' id='broadcast' name='broadcast' style='resize: none;'>Your message failed to send. Please try againt</textarea>";
																				unset($_SESSION['broadcast']);
																			}																			
																		} else {
																			echo "<textarea class='ainformaitons' id='broadcast' name='broadcast' style='resize: none;'></textarea>";
																		}
																		
																		echo "<input type='hidden' name='projID' value='" . $projID . "'>";
																		?>
																		<div class="search-button">
																		<!--this is for submitting the broadcast -->
																		<input type="submit" name ="Submit" value ="Send Broadcast">																			
																	</div>	
																	</form>
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
		<?php
			}
			unset($_SESSION['projID']);
		?>
		
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