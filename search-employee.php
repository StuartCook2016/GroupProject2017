<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>Search For Employee</title>

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
						<div class='col-md-4 col-sm-4'>
							<div class='header'>
								<div class='header-logo'>
									<img src='img/logo.png' alt=''>
								</div>
							</div>
						</div>
						<div class='col-md-6 col-sm-6'>
							<div class='header'>
								<div class='header-logo'>
									<h1>Search For Employee</h1>
								</div>
							</div>
						</div>
						<div class='col-md-2 col-sm-2'>
							<div class='header'>
								<div class='header-logo'>
									<!-- log user out-->
									<button type='submit'>Logout</button>
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
										<a href='#manager-view' aria-controls='manager-view' role='tab' data-toggle='tab'>Manager View</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class ='tab-content'>
									<div role='tabpanel' id='manager-view'>
										<div class='col-md-3 col-sm-3'>
											<div class='left-search-area'>
												<form action='search-employee.php' method='post'>
													<div class='single-left-search'>												
														<!-- user put in employee name to search for-->															
														<label for='employeeFName'>First Name:</label>
														<input class='employeeFName' id='employeeFName' name='employeeFName' type='text' maxlength='35'>
													</div>
													<div class='single-left-search'>												
														<!-- user put in employee name to search for-->															
														<label for='employeeLName'>Last Name:</label>
														<input class='employeeLName' id='employeeLName' name='employeeLName' type='text' maxlength='35'>
													</div>
													<div class='single-left-search'>
														<label for='employeeUsername'>Username:</label>														
														<input class='employeeUsername' id='employeeUsername' name='employeeUsername' type='text' maxlength='20'>													
													</div>
													<div class='single-left-search'>
														<label for='sdate'>Location:</label>												
													</div>				
													<div class='single-left-search'>														
														<label for='skillReq'>Required Skill:</label>
														<?php
															
															//Start the session
															session_start();
															
															//Get the username of logged in user
															$username = $_SESSION['username'];															
															
															$servername = "localhost";
															$connUsername = "jrg2";
															$password = "password";
															$database = "jrg2";
															
															$conn = new mysqli($servername, $connUsername, $password, $database);
															
															//Check connection
															if($conn->connect_error) {
																die("Connection to MySQL failed %s </br>" . $conn->connect_error);
															}
															
															$skillsQuery = "SELECT * FROM skills";
															$result = $conn->query($skillsQuery);
															
															if($result->num_rows > 0) {
															
																echo "<select id='skillReq' name='skillReq'>";
																
																//Add Any as option so user does not have to choose
																//specific skill required
																echo "<option>Any</option>";
															
																//Add each skill as an option
																while($row = $result->fetch_assoc()) {
																	echo "<option>" . $row['skillName'] . "</option>";
																}
															
																echo"</select>";
															}															
														?>
													</div>													
													<div class='single-left-search'>												
														<label for='empProject'>Employed in Project:</label>
														 <?php

															//Only return projects the user is manager of
															$projectsQuery = "SELECT * FROM projects AS p WHERE p.managerUsername ='" . $username . "'";
															$result = $conn->query($projectsQuery);
															
															if($result->num_rows > 0) {
															
																echo "<select id='empProject' name='empProject'>";
																
																//Add Any as option so user does not have to choose
																//specific project
																echo "<option>Any</option>";
															
																//Add each project as an option
																while($row = $result->fetch_assoc()) {
																	echo "<option>" . $row['projName'] . "</option>";
																}
															
																echo"</select>";
															}															
														 ?>														  															
													</div>
													<div class='single-left-search'>													
														<!--willing to relocate-->														
														<label for='wrlocate'>Employee Willing to Relocate:</label>
														<!-- Still to implement this -->
														<!-- Still to implement this -->
														<!-- Still to implement this -->
														<!-- Still to implement this -->
													</div>
													<div class='search-button'>
														<!--button returns the results of the search-->
														<input class='blueButton' type='submit' value='Search'>
													</div>											
												</form>	
											</div>
										</div>
										<div class='col-md-9 col-sm-9'>
											<div class='employee-menu-details'>
												<div class='single-employee-form'>								
													<?php
													
														//Used to store query used to display results
														$sql = "";														
														
														var_dump($_POST);
														//Check if all required POST variables are set and not empty
														//Cannot perform empty check on first 3 since they can be empty
														if(isset($_POST['employeeFName']) &&
															isset($_POST['employeeLName']) &&
															isset($_POST['employeeUsername']) &&
															isset($_POST['skillReq']) && !empty($_POST['skillReq']) &&
															isset($_POST['empProject']) && !empty($_POST['empProject'])) {
															//location check needs to be added to above condition
														
															$employeeFName = $_POST['employeeFName'];
															$employeeLName = $_POST['employeeLName'];
															$employeeUsername = $_POST['employeeUsername'];
															$skillReq = $_POST['skillReq'];
															$empProject = $_POST['empProject'];
															
															$sql = "SELECT * FROM employee AS e, job AS j, projects AS p WHERE 
																e.username = j.username AND j.projID = p.projID";
															
															//if the user has input a first name 
															if(!empty($employeeFName)) {																
																//append section of query containing employee first name
																$sql = $sql . " AND e.firstName = '" . $employeeFName . "'";
															}
															
															//if the user has input a last name 
															if(!empty($employeeLName)) {
																//append section of query containing employee last name
																$sql = $sql . " AND e.lastName = '" . $employeeLName . "'";																																
															}
															
															//if the user has input a username 
															if(!empty($employeeUsername)) {
																//append section of query containing employee last name
																$sql = $sql . " AND e.username = '" . $employeeLName . "'";																										
															}
															
															//if the project specified is not any
															if(strcasecmp($empProject, 'any') != 0) {
																$sql = $sql . " AND p.projName = " . $empProject;
															
															}
															
															//if the skill required specified is not any
															if(strcasecmp($skillReq, 'any') != 0) {									
																//Query becomes a join if user requests a specific skill
																$sql = "SELECT * FROM ( " . $sql . ") t1 INNER JOIN ( SELECT * FROM jobskills AS s WHERE s.skillName = '" . $skillReq . "') t2 ON t1.jobID = t2.jobID";
															}
															
															
															
															
														//The POST variables are not set	
														} else {
															echo "Please enter search criteria";
															echo "</br>"; echo "</br>";
														}
														
														//Query must be constructed to exectute this section
														if(strcasecmp($sql, "") != 0) {
															
															$result = $conn->query($sql);
															
															//if there are results
															if($result->num_rows > 0) {
															
																echo "<table align='center'>";
																	echo "<tr>";
																		echo "<th>Username</th>";																
																		echo "<th>First Name</th>";
																		echo "<th>Last Name</th>";																																		
																		echo "<th>Email Address</th>";
																		echo "<th>Contact Number</th>";
																echo "</tr>";
															
																while($row = $result->fetch_assoc()) {
																
																	echo "<tr>";						
																		echo "<td>" . $row['username'] . "</td>";
																		echo "<td>" . $row['firstName'] . "</td>";
																		echo "<td>" . $row['lastName'] . "</td>";																	
																		echo "<td>" . $row['emailAddress'] . "</td>";
																		echo "<td>" . $row['contactNumber'] . "</td>";
																		
																		echo "<td>";
																				echo "<form action='view-profile.php' method='post'>";
																					echo "<input type='hidden' name='employeeUsernameClicked' value='" . $row['username'] . "'>";
																					echo "<input class='blueButton' type='submit' value='View Profile'>";
																				echo "</form>";
																		echo "</td>";
																	echo "</tr>";	
																}
																																
																echo "</table>";
																echo "</br>"; echo "</br>";															
															} else {
																echo "There were no employees that matched your search criteria. </br>";
															}
														}	
													?>
												</div>
											</div>
										</div>
											
										<div class='return-button'>
											<div class='return-button'>
												<a class='blueButton' href='manager-menu.php'>Return to Main Menu</a>
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
		
		<!-- inline styling to links and buttons look the same as logout button -->
		<style>
			.blueButton { 
				background: #085394 none repeat scroll 0 0;
				border: 2px solid #000;
				box-shadow: 3px 3px 0 -1px rgba(0, 0, 0, 1);
				color: #fff;
				font-size: 15px;
				font-weight: 700;
				padding: 2px 8px 0;
			}
		</style>
    </body>
</html>
