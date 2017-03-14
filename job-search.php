<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project Search</title>

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
								  <!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active">
										<a href="#employee-view" aria-controls="employee-view" role="tab" data-toggle="tab">Employee View</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<?php
										echo "<div role='tabpanel' tab-pane active id='employee-view'>";
											echo "<div class='col-md-3 col-sm-3'>";
												echo "<div class='left-search-area'>";
													echo "<form action=''>";
														echo "<div class='single-left-search'>";
															//search job title
															echo "<label for='jobTitle'>Job Title:</label>";
															
															//This needs to be filled from Database with all Job Titles
															
															echo "<select>";
															echo "</select>";
														echo "</div>";
														//Contract Type is searched combo box
														echo "<div class='single-left-search'>";
															echo"<label for='contractType'>Contract Type:</label>";
															echo "<select>";
																  echo "<option value='Full-Time'>Full-Time</option>";
																  echo "<option value='Part-Time'>Part-Time</option>";
															echo "</select>";
														echo "</div>";
														//location is searched combo box
														//Need to rethink this
														echo "<div class='single-left-search'>";
															echo "<label for='location'>Location:</label>";
															//Fill this from database
															//<select>
															//</select>
														echo "</div>";
														//salary is searched combo box
														echo "<div class='single-left-search'>";
															"<label for='location'>Salary:</label>";
															/*
															This needs to be two input boxes and calculate database entries inside range
															Or can do the idea Stuart mentioned
															*/
														echo "</div>";
														//start and end date (both using jquery works as a calendar picker at the moment )
														echo "<div class='single-left-search'>";
															echo "<label for='sdate'>Start Date:</label>";
															echo "<input id='datepicker-example1' class='sdates' id='sdate' name='start-date' type='text'>";
														echo "</div>";
														echo "<div class='single-left-search'>";
															echo "<label for='edate'>End Date:</label>";
															echo "<input id='datepicker-example2' class='edates' id='edate' name='end-date' type='text'>";
														echo "</div>";

														echo "<div class='search-button'>";
															//button returns the results of the search
															echo "<input type='submit' value='Search'></button>";
														echo "</div>";
													echo "</form>";
												echo "</div>";
											echo "</div>";
											echo "<div class='col-md-9 col-sm-9'>";
												echo "<div class='employee-menu-details price-hide'>";
												echo "<div class='single-employee-form none'>";
													
													$servername = "localhost";
													$username = "root";
													$password = "root";
													$database = "jrg2";
													
													$conn = new mysqli($servername, $username, $password, $database);
													
													//Check connection
													if($conn->connect_error) {
														die("Connection to MySQL failed %s </br>" . $conn->connect_error);
													}
													
													$sql = "SELECT * FROM job";
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
														
															$rowCount = 1;
															while($row = $result->fetch_assoc()) {
																
																echo "<tr>";
																	echo "<td>" . $row['title'] . "</td>";
																	echo "<td>" . $row['contractType'] . "</td>"; 
																	echo "<td>" . $row['startDate'] . "</td>";
																	echo "<td>" . $row['endDate'] . "</td>";
																	echo "<td></td>"; //To echo location once developed
																	echo "<td>" . $row['salary'] . "</td>";
																	
																	echo "<td>";
																		echo "<form action='view-job.php' method='post'>";
																			echo "<input type='hidden' name='jobID' value='" . $rowCount . "'>";
																			echo "<input type='submit' value='View'>";
																		echo "</form>";
																	echo "</td>";
																echo "</tr>";
																
																$rowCount++;
															}
														
														echo "</table>";
													
													} else {
														echo "There were no projects that matched your search. </br>";
													}
													
												echo "</div>";
											echo "</div>";
											echo "</div>";
											echo "<div class='return-button main'>";
												echo "<a href='employee-menu.html'>Return to Main Menu</a>";
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
    </body>
</html>
