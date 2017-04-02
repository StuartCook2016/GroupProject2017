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

        <title>Job Search</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/default.css" type="text/css">
		<link href="style2.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
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
									<?php
									
										$servername = "localhost";
										$username = "jrg2";
										$password = "password";
										$database = "jrg2";
													
										$conn = new mysqli($servername, $username, $password, $database);
													
										//Check connection
										if($conn->connect_error) {
											die("Connection to MySQL failed %s </br>" . $conn->connect_error);
										}
									?>
										<div role='tabpanel' tab-pane active" id='employee-view'>
											<h2>Search for Jobs</h2>
									<?php
											echo "<div class='col-md-3 col-sm-3'>";
												echo "<div class='left-search-area'>";
													echo "";
														echo "<form action='job-search.php' method='post'>";
															echo "<div class='single-left-search'>";
																//search job title
																echo "<label for='jobTitle'>Job Title:</label>";
																
																$sql = "SELECT DISTINCT title FROM job ORDER BY title";
																$result = $conn->query($sql);
																
																if($result->num_rows > 0) {
																
																	echo "<select id='jobTitle' name='jobTitle'>";
																	
																	//Add Any as option so user does not have to choose 
																	//specific title
																	echo "<option>Any</option>";
																	
																	//Add each job title as an option
																	while($row = $result->fetch_assoc()) {
																		
																		//If there are post variables then remember the search parameters
																		if(isset($_POST["jobTitle"]) && $_POST["jobTitle"] === $row['title']) {
																			echo "<option selected='selected'>" . $row['title'] . "</option>";																	
																		} else {																
																			echo "<option>" . $row['title'] . "</option>";
																		}
																	}
																	
																	echo "</select>";
																}
															
															echo "</div>";
															
															echo "<div class='single-left-search'>";
																//Contract Type is searched combo box
																echo"<label for='contractType'>Contract Type:</label>";
																
																$sql = "SELECT DISTINCT contractType FROM job";
																$result = $conn->query($sql);
																
																if($result->num_rows > 0) {
																
																	echo "<select id='contractType' name='contractType'>";
																	
																	//Add Any as option so user does not have to choose 
																	//specific contract type
																	echo "<option>Any</option>";
																	
																	//Add each contract type as an option
																	while($row = $result->fetch_assoc()) {
																		
																		//If there are post variables then remember the search parameters
																		if(isset($_POST["contractType"]) && $_POST["contractType"] === $row['contractType']) {
																			echo "<option selected='selected'>" . $row['contractType'] . "</option>";																	
																		} else {																
																			echo "<option>" . $row['contractType'] . "</option>";
																		}						
																	}
																	
																	echo "</select>";
																}
											
															echo "</div>";
															
															echo "<div class='single-left-search'>";
																//Skill required is searched combo box
																echo"<label for='skillReq'>Skill Required:</label>";
																
																$sql = "SELECT * FROM skills";
																$result = $conn->query($sql);
																
																if($result->num_rows > 0) {
																
																	echo "<select id='skillReq' name='skillReq'>";
																	
																	//Add Any as option so user does not have to choose 
																	//specific skill
																	echo "<option>Any</option>";
																	
																	//Add each skill as an option
																	while($row = $result->fetch_assoc()) {
																		
																		//If there are post variables then remember the search parameters
																		if(isset($_POST["skillReq"]) && $_POST["skillReq"] === $row['skillName']) {
																			echo "<option selected='selected'>" . $row['skillName'] . "</option>";																	
																		} else {																
																			echo "<option>" . $row['skillName'] . "</option>";
																		}
																	}
																	
																	echo "</select>";
																}										
															echo "</div>";

															//city is searched combo box
															echo "<div class='single-left-search'>";
																echo "<label for='city'>City:</label>";
																
																$sql = "SELECT DISTINCT city FROM "
																	. "job AS j, projects AS p " 
																	. "WHERE j.projID=p.projID "
																	. "ORDER BY city";
																$result = $conn->query($sql);
																
																if($result->num_rows > 0) {
																	
																	echo "<select id='city' name='city'>";
																	
																	//Add Any as option so user does not have to choose 
																	//specific city
																	echo "<option>Any</option>";
																	
																	//Add each city as an option
																	while($row = $result->fetch_assoc()) {
																		
																		//If there are post variables then remember the search parameters
																		if(isset($_POST["city"]) && $_POST["city"] === $row['city']) {
																			echo "<option selected='selected'>" . $row['city'] . "</option>";																	
																		} else {																
																			echo "<option>" . $row['city'] . "</option>";
																		}
																	}
																	
																	echo "</select>";
																}
															echo "</div>";
															
															//country is searched combo box
															echo "<div class='single-left-search'>";
																echo "<label for='country'>Country:</label>";
																
																$sql = "SELECT DISTINCT country FROM "
																	. "job AS j, projects AS p " 
																	. "WHERE j.projID=p.projID "
																	. "ORDER BY country";
																$result = $conn->query($sql);
																
																if($result->num_rows > 0) {
																	
																	echo "<select id='country' name='country'>";
																	
																	//Add Any as option so user does not have to choose 
																	//specific country
																	echo "<option>Any</option>";
																	
																	//Add each country as an option
																	while($row = $result->fetch_assoc()) {
																		
																		//If there are post variables then remember the search parameters
																		if(isset($_POST["country"]) && $_POST["country"] === $row['country']) {
																			echo "<option selected='selected'>" . $row['country'] . "</option>";																	
																		} else {																
																			echo "<option>" . $row['country'] . "</option>";
																		}
																	}
																	
																	echo "</select>";
																}
															echo "</div>";															
															
															echo "<div class='single-left-search'>";
																//salary is searched combo box
																														
																$min = "SELECT salary FROM job ORDER BY salary ASC LIMIT 1";
																$resultMin = $conn->query($min);
																
																$max = "SELECT salary FROM job ORDER BY salary DESC LIMIT 1";
																$resultMax = $conn->query($max);
																
																if($resultMin->num_rows > 0 && $resultMax->num_rows > 0){
																
																	$row = $resultMin->fetch_assoc();													
																	//set min salary to min in db
																	echo "<label for='minSalary'>Min Salary:</label>";
																	
																	//If there are post variables then remember the search parameters
																	if(isset($_POST["minSalary"])) {
																		echo "<input id='minSalary' name='minSalary' step='1000' type='number'
																		value='" . $_POST["minSalary"] . "' min='" . $row["salary"] . "'>";																
																	} else {																
																		echo "<input id='minSalary' name='minSalary' step='1000' type='number'
																		value='" . $row['salary'] . "' min='" . $row['salary'] . "'>";
																	}
			
																	$row = $resultMax->fetch_assoc();																
																	//set max salary to max in db
																	echo "<label for='maxSalary'>Max Salary:</label>";
																	
																	//If there are post variables then remember the search parameters
																	if(isset($_POST["maxSalary"])) {
																		echo "<input id='maxSalary' name='maxSalary' step='1000' type='number'
																		value='" . $_POST["maxSalary"] . "' max='" . $row['salary'] . "'>";																
																	} else {																
																		echo "<input id='maxSalary' name='maxSalary' step='1000' type='number'
																		value='" . $row['salary'] . "' max='" . $row['salary'] . "'>";
																	}
																}									
															echo "</div>";
																											
															echo "<div class='single-left-search'>";
															
																$minStartDate = "SELECT startDate FROM job ORDER BY startDate ASC LIMIT 1";
																$resultStartMin = $conn->query($minStartDate);
																$maxStartDate = "SELECT startDate FROM job ORDER BY startDate DESC LIMIT 1";
																$resultStartMax = $conn->query($maxStartDate);
										
										
																$minEndDate = "SELECT endDate FROM job ORDER BY endDate ASC LIMIT 1";
																$resultEndMin = $conn->query($minEndDate);
																$maxEndDate = "SELECT endDate FROM job ORDER BY endDate DESC LIMIT 1";
																$resultEndMax = $conn->query($maxEndDate);
																
																if($resultStartMin->num_rows > 0 && 
																	$resultStartMax->num_rows > 0 &&
																	$resultEndMin->num_rows > 0 &&
																	$resultEndMax->num_rows > 0) {
																 
																 
																	$row = $resultStartMin->fetch_assoc();
																	echo "<p><b>Starting between these dates:</b></p>";
																	//set start date to earliest start date in db																
																	echo "<label for='datepicker-example1'>Start Date:</label>";																
																	
																	//If there are post variables then remember the search parameters
																	if(isset($_POST["start-date1"])) {
																		echo "<input id='datepicker-example1' class='sdates' name='start-date1' type='text'
																		value='" . $_POST["start-date1"] . "'>";																
																	} else {																
																		echo "<input id='datepicker-example1' class='sdates' name='start-date1' type='text'
																		value='" . $row['startDate'] . "'>";
																	}
																	
																		
																	$row = $resultStartMax->fetch_assoc();
																	//set start date to latest start date in db
																	echo "<label for='datepicker-example2'>Start Date:</label>";
																	
																	//If there are post variables then remember the search parameters
																	if(isset($_POST["start-date2"])) {
																		echo "<input id='datepicker-example2' class='sdates' name='start-date2' type='text'
																		value='" . $_POST["start-date2"] . "'>";																
																	} else {																
																		echo "<input id='datepicker-example2' class='sdates' name='start-date2' type='text'
																		value='" . $row['startDate'] . "'>";
																	}
																	
																	
																	
																	$row = $resultEndMin->fetch_assoc();
																	echo "<p><b>Ending between these dates:</b></p>";
																	//set end date to earliest end date in db
																	echo "<label for='datepicker-example3''>End Date:</label>";
																	//If there are post variables then remember the search parameters
																	if(isset($_POST["end-date1"])) {
																		echo "<input id='datepicker-example3' class='edates' name='end-date1' type='text'
																		value='" . $_POST["end-date1"] . "'>";																
																	} else {																
																		echo "<input id='datepicker-example3' class='edates' name='end-date1' type='text'
																		value='" . $row['endDate'] . "'>";
																	}
																	
																	
																	$row = $resultEndMax->fetch_assoc();
																	//set end date to latest end date in db
																	echo "<label for='datepicker-example4''>End Date:</label>";
																	//If there are post variables then remember the search parameters
																	if(isset($_POST["end-date2"])) {
																		echo "<input id='datepicker-example4' class='edates' name='end-date2' type='text'
																		value='" . $_POST["end-date2"] . "'>";																
																	} else {																
																		echo "<input id='datepicker-example4' class='edates' name='end-date2' type='text'
																		value='" . $row['endDate'] . "'>";
																	}
																}															
															echo "</div>";	
															
															echo "<div class='search-button'>";
																//button returns the results of the search
																echo "<input type='submit' value='Search'>";
															echo "</div>";
														echo "</form>";
													echo "";
												echo "</div>";
											echo "</div>";
											echo "<div class='col-md-9 col-sm-9'>";
												echo "<div class='employee-menu-details'>";
													echo "<div class='single-employee-form'>";								
														//Used to store query used to display results
														$sql = "";
														
														//Check if all required POST variables are set and not empty
														if(isset($_POST['jobTitle'])) {
															
														
															$jobTitle = $_POST["jobTitle"];
															$contractType = $_POST["contractType"];
															$skillReq = $_POST["skillReq"];															
															$minSalary = $_POST["minSalary"];
															$maxSalary = $_POST["maxSalary"];
															$minStartDate = $_POST["start-date1"];
															$maxStartDate = $_POST["start-date2"];
															$minEndDate = $_POST["end-date1"];
															$maxEndDate = $_POST["end-date2"];	
															$city = $_POST['city'];
															$country = $_POST['country'];
														
															$sql = "SELECT j.jobID, j.title, j.contractType, j.startDate, j.endDate, p.city, p.country, j.salary FROM "
																	. "job AS j, projects AS p "
																	. "WHERE j.username IS NULL "
																	. "AND j.projID=p.projID";
															
															//if the title specified is not any
															if(strcasecmp($jobTitle, 'any') != 0) {
															
																//append section of query containing title
																$sql = $sql . " AND j.title = '" . $jobTitle . "'";																
															}

															//if the contract type  specified is not any
															if(strcasecmp($contractType, 'any') != 0) {															
																
																//append section of query containing contractType
																$sql = $sql . " AND j.contractType = '" . $contractType . "'";
																																
															}
															
															//if the city specified is not any
															if(strcasecmp($city, 'any') != 0) {
																//append section of query containing city
																$sql = $sql . " AND p.city = '" . $city . "'";
															}
															
															//if the country specified is not any
															if(strcasecmp($country, 'any') != 0) {
																//append section of query containing country
																$sql = $sql . " AND p.country = '" . $country . "'";
															}
															
															//append section of query calculating salaries within range
															$sql = $sql . " AND j.salary BETWEEN " . $minSalary . " AND " . $maxSalary;													
															
																														//append section of query calculating if dates are within range
															$sql = $sql . " AND j.startDate BETWEEN '" . $minStartDate . "' AND '" . $maxStartDate . "'";
															$sql = $sql . " AND j.endDate BETWEEN '" . $minEndDate . "' AND '" . $maxEndDate . "'";
															
																																												
															//if the skill required specified is not any
															if(strcasecmp($skillReq, 'any') != 0) {									
																//Query becomes a join if user requests a specific skill
																$sql = "SELECT t1.jobID, t1.title, t1.contractType, t1.startDate, t1.endDate, t1.city, t1.country, t1.salary FROM ( " . $sql . ") t1 INNER JOIN ( SELECT * FROM jobskills AS s WHERE s.skillName = '" . $skillReq . "') t2 ON t1.jobID = t2.jobID";
															}
																								
														//The POST variables are not set
														} else {															
															$sql = "SELECT * FROM job AS j, projects AS p WHERE j.username IS NULL AND j.projID = p.projID";
														}
														
														$result = $conn->query($sql);
														
														//if there are results
														if($result->num_rows > 0) {
															
															echo "<table align='center'>";
																echo "<tr>";
																	echo "<th>Job Title</th>";
																	echo "<th>Contract Type</th>";
																	echo "<th>Start Date</th>";
																	echo "<th>End Date</th>";
																	echo "<th>City</th>";
																	echo "<th>Country</th>";
																	echo "<th>Salary</th>";
																	echo "<th>View</th>";
																echo "</tr>";
															
																//Used as a counter for table rows
																$activeFlag = 0;																
																while($row = $result->fetch_assoc()) {
																	
																	//Used to display alternating colours in table rows
																	if($activeFlag % 2 == 0) {
																		echo "<tr>";
																	} else {
																		echo "<tr class='active'>";
																	}
																		echo "<td>" . $row['title'] . "</td>";
																		echo "<td>" . $row['contractType'] . "</td>"; 
																		echo "<td>" . $row['startDate'] . "</td>";
																		echo "<td>" . $row['endDate'] . "</td>";
																		echo "<td>" . $row['city'] . "</td>";
																		echo "<td>" . $row['country'] . "</td>";
																		echo "<td>" . $row['salary'] . "</td>";
																		
																		echo "<td>";
																			echo "<form action='view-job.php' method='post'>";
																				echo "<input type='hidden' name='jobID' value='" . $row['jobID'] . "'>";
																				echo "<input type='submit' value='View'>";
																			echo "</form>";
																		echo "</td>";
																	echo "</tr>";

																	$activeFlag++;
																}																
														
															echo "</table>";
															echo "</br>"; echo "</br>";
														} else {
															echo "There were no jobs that matched your search criteria. </br>";
														}
														
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
