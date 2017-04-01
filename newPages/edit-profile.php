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

        <title>Edit Profile</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
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

			$username = $_SESSION["username"];


			$con=mysqli_connect("localhost","jrg2","password","jrg2");
			
			// Check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			# Run the query, store result in a string and store number of rows returned 
			$result= mysqli_query($con,"SELECT `firstName`, `lastName`, `emailAddress`, `contactNumber`,`city`,`country`,`additionalInfo` FROM employee WHERE username='$username'") or die("Error: ".mysqli_error($con));
		  
			 
			// Return the number of rows in result set
			$rowcount=mysqli_num_rows($result);
			
			if($rowcount !=0) {
				while ($row = mysqli_fetch_assoc($result)) {				 
					if (mysqli_num_rows($result) != 0) {
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
																<form name = "frm5" method = "post" action = "editedProfile_db.php">
																	<div class="user-profile-details">
																		<h2>Edit Profile</h2>
																		<div class="users-profiles project-name">
																		<!--able to edit all of these-->
																			<div class="single-users-profile">
																				<label for="fname">First Name:</label>
																				<input class="fnames" id="fname" name="first-name" type="text" value="<?php echo $row['firstName']?>" maxlength='35'>
																			</div>																		
																			<div class="single-users-profile">
																				<label for="e-mail">Email Address:</label>
																				<input class="emails" id="e-mail" name="email-address" type="text" value="<?php echo $row['emailAddress']?>" maxlength='254'>
																			</div>
																			<div class="single-users-profile">
																				<label for="clocation">Current Location:</label>
																				<input class="locations" id="clocation1" name="location1" type="text" value="<?php echo $row['city']?>" maxlength='30'>
																			</div>
																			<!--Current Location - Country -->
																			<div class="single-users-profile">
																				<label></label>
																				<input class="plocations form-control" id="clocation2" name="location2" type="text" value="<?php echo $row['country']?>" maxlength='30'>
																			</div>																			
																		</div>
																		<div class="users-profiles project-name">
																			<!-- last name of employee -->
																			<div class="single-users-profile">
																				<label for="lname">Last Name:</label>
																				<input class="lnames form-control" id="lname" name="last-name" type="text"  value="<?php echo $row['lastName']?>" maxlength='35'>
																			</div>
																			<div class="single-users-profile">
																				<label for="cnumber">Contact Number:</label>
																				<input class="cnumbers" id="cnumber" name="contact-number" type="text" value="<?php echo $row['contactNumber']?>" maxlength='20'>
																			</div>
																		</div>
																	</div>
																	<div class="user-profile-skrill">	
																		<div class="user-skill-details">
																			<!--past projects-->
																			<div class='single-employee-form'>
																				<table align='center'>																				
																					<tr>
																						<th>Project Name</th>
																						<th>Job Within Project</th>
																						<th>Start Date</th>
																						<th>End Date</th>
																					</tr>
																					
																					<?php
																						$projectsQuery = "SELECT p.projID, p.projName, j.jobID, j.startDate, j.endDate, j.title FROM "
																										. "projects AS p, job AS j "
																										. "WHERE p.projID = j.projID "
																										. "AND j.username = '" . $username . "' "
																										. "AND p.finished = 'Y'";
																						$resultProjectsQuery = $con->query($projectsQuery);
																						
																						//if there are results
																						if($resultProjectsQuery->num_rows > 0) {
																							
																							$activeFlag = 0;
																							while($rowProjects = $resultProjectsQuery->fetch_assoc()) {
																							
																								//Used to display alternating colours in table rows
																								if($activeFlag % 2 == 0) {
																									echo "<tr>";
																								} else {
																									echo "<tr class='active'>";
																								}
																								
																									echo "<td>" . $rowProjects['projName'] . "</td>";
																									echo "<td>" . $rowProjects['title'] . "</td>";
																									echo "<td>" . $rowProjects['startDate'] . "</td>";
																									echo "<td>" . $rowProjects['endDate'] . "</td>";																								
																								echo "</tr>";
															
																								$activeFlag++;																						
																							}																	
																						}																					
																					?>																			
																				</table>																				
																			</div>
																			</br>
																			</br>																			
																			
																			<textarea class="ainformaitons" id="ainformaiton" name="additional-informaiton" style="resize: none;"><?php echo $row['additionalInfo']?></textarea>
																		</div>
																	</div>																	
																	<div class="search-button">
																		<!--this is for submitting the changes -->
																		<input type="submit" name ="Submit" value ="Submit Profile Changes">																			
																	</div>																	
																</form>
																<form name = "frm6" method = "post" action = "addingSkill.php">
																	<div class="user-profile-skill">
																		<div class="user-skill-details">
																		<!--text areas-->
																														
																			<?php
																				$skills = "SELECT * FROM skills";														
																				$resultSkills = $con->query($skills);
																				
																				if($resultSkills->num_rows > 0) {
																				
																					echo "<label for='skill' >Skills:</label>";
																					echo "<select class='uskill' id='skill' name='skillName'>";
																						
																						while($row = $resultSkills->fetch_assoc()) {												
																							echo "<option>" . $row['skillName'] . "</option>";																	
																						}
																					
																					echo "</select>";
																				}
																			?>
																			
																			<select class="uskill" id="exp" name="yearsExp">
																				<option> 0   </option>
																				<option> 1   </option>														
																				<option> 2   </option>
																				<option> 3   </option>
																				<option> 4   </option>
																				<option> 5   </option>
																				<option> 6   </option>
																				<option> 7   </option>
																				<option> 8   </option>
																				<option> 9   </option>
																				<option> 10+ </option>
																			</select>
																			
																			<div class="search-button">																			
																				<input type="submit" id="myCheck" onclick="addSkill();" value="Click to add Skill"></input>
																			</div>																			
																			</br>
																			
																			<!-- area to be populated by skills-->
																			<div class='single-employee-form'>
																				<table align='center'>
																					<tr>
																						<th>Skills</th>
																						<th>Years of Experience</th>
																					</tr>
																					
																					<?php
																						$skillsQuery = "SELECT skillName, yearsOfXP FROM employeeskills WHERE username='" . $username . "'";
																						$resultSkillsQuery = $con->query($skillsQuery);
																						
																						//if there are results
																						if($resultSkillsQuery->num_rows > 0) {
																							
																							$activeFlag = 0;
																							while($rowSkills = $resultSkillsQuery->fetch_assoc()) {
																							
																								//Used to display alternating colours in table rows
																								if($activeFlag % 2 == 0) {
																									echo "<tr>";
																								} else {
																									echo "<tr class='active'>";
																								}
																								
																									echo "<td>" . $rowSkills['skillName'] . "</td>";
																									echo "<td>" . $rowSkills['yearsOfXP'] . "</td>";
																								echo "</tr>";
															
																								$activeFlag++;																						
																							}																	
																						}
																					?>																			
																				</table>
																			</div>
																			</br>
																			</br>
																		</div>
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
		<?php
					}
				}
			}
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
        <script src="js/main.js"></script>
    </body>
</html>
