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

        <title>Edit Job</title>

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
									<form class='navbar-form navbar-left' name='messagesForm' action='your-messages.php' method='post'>										
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
		if(isset($_POST['jobID']) && !empty($_POST['jobID'])) {
			$jobID = $_POST["jobID"];
		} else {
			//projID is in SESSION
			$jobID = $_SESSION["jobID"];
		}

		$con=mysqli_connect("localhost","jrg2","password","jrg2");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		# Run the query, store result in a string and store number of rows returned 
		$result= mysqli_query($con,"SELECT `projID`, `title`,`username`,`contractType`, `startDate`, `endDate`,`salary`,`details` FROM job WHERE jobID=$jobID") or die("Error: ".mysqli_error($con));
  
     
		// Return the number of rows in result set
		$rowcount=mysqli_num_rows($result);
		if($rowcount !=0)
		{
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
												<form name = "frm11" method = "post" action = "editedJob.php">
													<div class="user-profile-details">
														<h2>Edit Job</h2>
														<div class="users-profiles project-name">
															<div class="single-users-profile">
															<!-- project name-->
																<label for="pname">Job Title:</label>
																<input class="ptypes" id="ptype" name="jobTitle" type="text" value = "<?php echo $row['title']?>">
															</div>
															<div class="single-users-profile">
															<!-- project name-->
																<label for="pname">Username:</label>
																<input class="ptypes" id="ptype" name="username" type="text" value = "<?php echo $row['username']?>">
															</div>
															 <!--location and skill combo box-->
															<div class="single-users-profile">
																
																<label for='contractType'>Contract Type:</label>
																<select id='contractType' name='contractType'>
																	
																	<?php
																	if(strcasecmp($row['contractType'], "Full-Time") == 0) {
																		echo "<option selected='selected' value='Full-Time'>Full-Time</option>";
																		echo "<option value='Part-Time'>Part-Time</option>";
																	} else {
																		echo "<option value='Full-Time'>Full-Time</option>";
																		echo "<option selected='selected' value='Part-Time'>Part-Time</option>";
																	}
																	?>																	
																</select>
															</div>
														</div>
														<div class="users-profiles project-name">
															<div class="single-users-profile">
															<!-- start date uses jquery for date picker already-->
																<label for="pname">Start Date:</label>
																<input id="datepicker-example1" class="pnames" id="pname" name="startDate" type="text" value = "<?php echo $row['startDate']?>">
															</div>
															
															<div class="single-users-profile">
																<label for="p-type">End Date:</label>
																<input id="datepicker-example2" class="p-types" id="p-type" name="endDate" type="text" value = "<?php echo $row['endDate']?>">
															</div>
															<div class="single-users-profile">
																<label for="plocation">Salary:</label>
																<input class="ptypes" id="street" name="salary" type="text"value = "<?php echo $row['salary']?>">
															</div>
														
															<input type = "hidden" name = "jobID" value ="<?php echo $jobID?>">
														</div>
														<div class="user-profile-skrill">
															<div class="user-skill-details">
																<textarea class="pprojects" id="pproject" name="details"><?php echo $row['details']?></textarea>
															</div>
														</div>
														<div class="search-button">
															<!--this is for submitting the changes -->
															<input type="hidden" name="projID" value="<?php echo $row['projID']?>">
															<input type="submit" name ="Submit" value ="Submit Job Changes">																			
														</div>	
													</div>
												</form>
												<form name = "frm18" method = "post" action = "addingJobSkill.php">
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
																<option> 10 </option>
															</select>
															<input type = "hidden" name = "jobID" value ="<?php echo $jobID?>">
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
																		$skillsQuery = "SELECT skillName, yearsOfXP FROM jobskills WHERE jobID='" . $jobID . "'";
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
        <script type="text/javascript" src="js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="js/core.js"></script>
        <script src="js/main.js"></script>