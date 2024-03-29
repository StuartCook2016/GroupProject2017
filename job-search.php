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
									<img src="img/logo.png" alt="">
								</div>
							</div>
						</div>
						<div class="col-md-5 col-sm-5">
							<div class="header">
								<div class="header-logo">
									<h1>Job Search</h1>
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
									
										echo "<div role='tabpanel' id='employee-view'>";
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

															//location is searched combo box
															//Need to rethink this
															echo "<div class='single-left-search'>";
																echo "<label for='location'>Location:</label>";
																//Fill this from database
																//<select id='location'>
																
																	//Add Any as option so user does not have to choose 
																	//specific location
																	//echo "<option>Any</option>";
																	
																//</select>
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
																		value='" . $_POST["minSalary"] . "' min='" . $_POST["minSalary"] . "'>";																
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
																		value='" . $_POST["maxSalary"] . "' min='" . $_POST["maxSalary"] . "'>";																
																	} else {																
																		echo "<input id='maxSalary' name='maxSalary' step='1000' type='number'
																		value='" . $row['salary'] . "' min='" . $row['salary'] . "'>";
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
														if(isset($_POST['jobTitle']) && !empty($_POST['jobTitle']) &&
															isset($_POST['contractType']) && !empty($_POST['contractType']) &&
															isset($_POST['skillReq']) && !empty($_POST['skillReq']) &&
															isset($_POST['minSalary']) && !empty($_POST['minSalary']) &&
															isset($_POST['maxSalary']) && !empty($_POST['maxSalary']) &&
															isset($_POST['start-date1']) && !empty($_POST['start-date1']) &&
															isset($_POST['start-date2']) && !empty($_POST['start-date2']) &&
															isset($_POST['end-date1']) && !empty($_POST['end-date1']) &&
															isset($_POST['end-date2']) && !empty($_POST['end-date2'])) {
															//location check needs to be added to above condition
														
															$jobTitle = $_POST["jobTitle"];
															$contractType = $_POST["contractType"];
															$skillReq = $_POST["skillReq"];															
															$minSalary = $_POST["minSalary"];
															$maxSalary = $_POST["maxSalary"];
															$minStartDate = $_POST["start-date1"];
															$maxStartDate = $_POST["start-date2"];
															$minEndDate = $_POST["end-date1"];
															$maxEndDate = $_POST["end-date2"];														
														
															$sql = "SELECT * FROM job AS j WHERE";
																														
															//Used to determine wether to add 'AND' to sql query
															$appendCounter = 0;
															//if the title specified is not any
															if(strcasecmp($jobTitle, 'any') != 0) {
															
																//append section of query containing title
																$sql = $sql . " j.title = '" . $jobTitle . "'";
																$appendCounter++;
															}

															//if the contract type  specified is not any
															if(strcasecmp($contractType, 'any') != 0) {
															
																if($appendCounter > 0) {
																	//append section of query containing contractType
																	$sql = $sql . " AND j.contractType = '" . $contractType . "'";
																} else {
																	$sql = $sql . " j.contractType = '" . $contractType . "'";
																	$appendCounter++;
																}																
															}
															
															if($appendCounter > 0) {
																//append section of query calculating salaries within range
																$sql = $sql . " AND j.salary BETWEEN " . $minSalary . " AND " . $maxSalary;
															} else {
																//append section of query calculating salaries within range
																$sql = $sql . " j.salary BETWEEN " . $minSalary . " AND " . $maxSalary;
																$appendCounter++;
															}
															
															//append section of query calculating if dates are within range
															$sql = $sql . " AND j.startDate BETWEEN '" . $minStartDate . "' AND '" . $maxStartDate . "'";
															$sql = $sql . " AND j.endDate BETWEEN '" . $minEndDate . "' AND '" . $maxEndDate . "'";
															
																																												
															//if the skill required specified is not any
															if(strcasecmp($skillReq, 'any') != 0) {									
																//Query becomes a join if user requests a specific skill
																$sql = "SELECT * FROM ( " . $sql . ") t1 INNER JOIN ( SELECT * FROM jobskills AS s WHERE s.skillName = '" . $skillReq . "') t2 ON t1.jobID = t2.jobID";
															}
																											
														//The POST variables are not set
														} else {															
															$sql = "SELECT * FROM job";
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
																	echo "<th>Location</th>";
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
																		echo "<td></td>"; //To echo location once developed
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
															echo "There were no projects that matched your search criteria. </br>";
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

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="js/core.js"></script>
        <script src="js/main.js"></script>
		
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
