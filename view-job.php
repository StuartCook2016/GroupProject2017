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
									<h1>View Job</h1>
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
											<?php	
												echo "<div class='single-employee-profile'>";
													echo "<div class='user-profile-details'>";														
														
															$jobID = $_POST["jobID"];															
															$servername = "localhost";
															$username = "jrg2";
															$password = "password";
															$database = "jrg2";
															
															$conn = new mysqli($servername, $username, $password, $database);
															
															//Check connection
															if($conn->connect_error) {
																die("Connection to MySQL failed %s </br>" . $conn->connect_error);
															}
															
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
																		echo "<label for='startDate'>Start Date:</label>";
																		echo "<input class='sdates' id='startDate' name='start-date' type='text'
																			value='" . $row1['startDate'] . "' readonly='true'>";
																	echo "</div>";
																	echo "<div class='single-users-profile'>";
																		echo "<label for='endDate'>End Date:</label>";
																		echo "<input class='sdates' id='endDate' name='end-date' type='text'
																			value='" . $row1['endDate'] . "' readonly='true'>";
																	echo "</div>";
																	echo "<div class='single-users-profile'>";
																		echo "<label for='jobLocation'>Job Location:</label>";
																		echo "<input class='locations' id='jobLocation' name='location' type='text'
																			value='" . $row2['city'] . "' readonly='true'>";
																		echo "<input class='locations' id='jobLocation' name='location' type='text'
																			value='" . $row2['country'] . "' readonly='true'>";
																	echo "</div>";																
																	echo "<div class='single-users-profile'>";
																		echo "<label for='contractType'>Contract Type:</label>";
																		echo "<input class='cTypes' id='contractType' name='contract-type' type='text'
																			value='" . $row1['contractType'] . "' readonly='true'>";
																	echo "</div>";
																	echo "<div class='single-users-profile'>";
																		echo "<label for='salary'>Salary:</label>";
																		echo "<input class='salary' id='salary' name='salary' type='text'
																			value='" . $row1['salary'] . "' readonly='true'>";
																	echo "</div>";																
																	echo "<div class='user-skill-details'>";
																		echo "<label for='details'>Details:</label>";																		
																		echo "<textarea class='details' id='details' name='details' readonly='true'>"
																			 . $row1['details'] . "</textarea>";
																	echo "</div>";
																																		
																	echo "<div class='user-skill-details'>";
																		echo "<table align='center'>";
																			echo "<tr>";
																				echo "<th>Skill Required</th>";
																				echo "<th>Years of Experience Required</th>";
																			echo "</tr>";
																		
																			while($row3 = $result3->fetch_assoc()) {																			
																				echo "<tr>";
																					echo "<td>" . $row3['skillName'] . "</td>";
																					echo "<td>" . $row3['yearsOfXP'] . "</td>";
																				echo "</tr>";
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
															echo "<div class='return-employee'>";
																echo "<div class='return-button'>";
																	echo "<a href='employeeMenu.php'>Return to Main Menu</a>";
																echo "</div>";
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
			</div>
		</div>
		
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="js/core.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
