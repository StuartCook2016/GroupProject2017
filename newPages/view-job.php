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

        <title>View Job</title>

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

		<div class="employee-menu-area">
			<div class="container">
				<div class="row">
					<div class="main-employee-menu clearfix">
						<div class="col-md-12 col-sm-12">
							<div class="employee-menu">								 
								<!-- Tab panes -->					
								<?php													
									
									echo "<div class='user-profile-details'>";
									
									$jobID = $_POST["jobID"];								
												
									$sql1 = "SELECT * FROM job WHERE jobID = " . $jobID;
									$result1 = $conn->query($sql1);
									
									$sql2 = "SELECT city, country FROM projects AS p, job AS j WHERE p.projID = j.projID AND j.jobID =" . $jobID;
									$result2 = $conn->query($sql2);
									
									$sql3 = "SELECT skillName, yearsOfXP FROM job AS j, jobskills AS s WHERE s.jobID = j.jobID AND j.jobID =" . $jobID;
									$result3 = $conn->query($sql3);
									
									//if there are results of every query
									if($result1->num_rows > 0 && $result2->num_rows > 0 
										&& $result3->num_rows > 0) {
									
										$row1 = $result1->fetch_assoc();
										$row2 = $result2->fetch_assoc();
										
										//Contains the details of the job passed by previous page
										echo "<div class='users-profiles project-name'>";
											echo "<div class='single-users-profile'>";
												echo "<label for='jobTitle'>Job Title:</label>";
												echo "<input class='jobNames' id='jobTitle' name='job-title' type='text' 
													value='" . $row1['title'] ."' readonly='true'>";
											echo "</div>";
											echo "<div class='single-users-profile'>";
												echo "<label for='contractType'>Contract Type:</label>";
												echo "<input class='cTypes' id='contractType' name='contract-type' type='text'
													value='" . $row1['contractType'] . "' readonly='true'>";
											echo "</div>";											
										echo "</div>";
										
										echo "<div class='users-profiles project-name'>";
											echo "<div class='single-users-profile'>";
												echo "<label for='startDate'>Start Date:</label>";
												echo "<input class='sdates' id='startDate' name='start-date' type='text'
													value='" . $row1['startDate'] . "' readonly='true'>";
											echo "</div>";
											echo "<div class='single-users-profile'>";
												echo "<label for='endDate'>End Date:</label>";
												echo "<input class='sdates' id='endDate' name='end-date' type='text'
													value='" . $row1['endDate'] . "' readonly='true'>";
											echo "</div>";											
										echo "</div>";
										echo "<div class='users-profiles project-name'>";
											echo "<div class='single-users-profile'>";
												echo "<label for='jobLocation'>Job Location:</label>";
												echo "<input class='locations' id='jobLocation' name='location' type='text'
													value='" . $row2['city'] . "' readonly='true'>";
											echo "</div>";											
											echo "<div class='single-users-profile'>";
												echo "<label></label>";
												echo "<input class='locations' id='jobLocation' name='location' type='text'
													value='" . $row2['country'] . "' readonly='true'>";
											echo "</div>";											
										echo "</div>";
										
										echo "<div class='users-profiles project-name'>";
											echo "<div class='single-users-profile'>";
												echo "<label for='salary'>Salary:</label>";
												echo "<input class='salary' id='salary' name='salary' type='text'
													value='" . $row1['salary'] . "' readonly='true'>";
											echo "</div>";
										echo "</div>";
									echo "</div>";
									echo "<div class='user-profile-details'>";
										echo "<div class='user-skill-details'>";
											echo "<label for='details'>Job Description:</label>";																		
											echo "<textarea class='details' id='details' name='details' readonly='true'>"
												  . $row1['details'] . "</textarea>";
										echo "</div>";
									echo "</div>";
										
										
										echo "<div class='employee-menu-details'>";											
											echo "<div class='single-employee-form'>";
												
												echo "<table align='center'>";
													echo "<tr>";
														echo "<th>Skills Required</th>";
														echo "<th>Years of Experience Required</th>";
													echo "</tr>";
												

													$activeFlag = 0;
													while($row3 = $result3->fetch_assoc()) {																			
														
														//Used to display alternating colours in table rows
														if($activeFlag % 2 == 0) {
															echo "<tr>";
														} else {
															echo "<tr class='active'>";
														}														
															echo "<td>" . $row3['skillName'] . "</td>";
															echo "<td>" . $row3['yearsOfXP'] . "</td>";
														echo "</tr>";
														
														$activeFlag++;
													}			

												echo "</table>";
											echo "</div>";
										echo "</div>";										
										
										//Button allows user to apply to project
										//This needs to be changed
										echo "<div class='apply-button'>";
											echo "<button type='submit'>Apply to Job</button>";
										echo "</div>";
									
									} else {
										echo "Something went wrong.</br></br></br>";
									}
											
									echo "</div>";
									
									//info about current project text
									echo "<div class='user-profile-skill'>";	
										echo "<div class='two-button'>";
											echo "<div class='submit-change'>";
												echo "<div class='return-button'>";
													echo "<a href='job-search.php'>Return to Job Search</a>";
												echo "</div>";
											echo "</div>";											
										echo "</div>";										                                          
									echo "</div>";									
								?>								
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
