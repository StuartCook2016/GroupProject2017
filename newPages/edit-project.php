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

        <title>Edit Project</title>

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
		<?php
			$username = $_SESSION["username"];

			var_dump($_POST);
			//Project ID Required
			$projID = $_POST['projID'];


			# Run the query, store result in a string and store number of rows returned 
			$result= mysqli_query($conn,"SELECT `projID`, `projName`, `startDate`, `endDate`, `finished`, `doorNumber`,`street`,`city`,`postcode`,`country`,`details` FROM projects WHERE managerUsername='$username' AND projID = '$projID'") or die("Error: ".mysqli_error($conn));
  
     
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
												<!-- Tab panes -->
												<div class="tab-content">													
													<div role="tabpanel" class="tab-pane active" id="manager-menu">
														<div class="employee-profile-details">
															<div class="single-employee-profile">
																<form name = "frm11" method = "post" action = "editedProject.php">
																	<div class="user-profile-details">
																		<h2>Edit Project</h2>
																		<div class="users-profiles">
																			<div class="single-users-profile">
																			<!-- project name-->
																				<label for="pname">Project Name:</label>
																				<input class="ptypes" id="ptype" name="projName" type="text" value="<?php echo $row['projName']?>">
																			</div>
																			<div class="single-users-profile">
																				<label for="plocation">Door Number:</label>
																				<input class="ptypes" id="doorNumber" name="doorNumber" type="text" value="<?php echo $row['doorNumber']?>">
																			</div>
																			  <div class="single-users-profile">
																				<label for="plocation">Street:</label>
																				<input class="ptypes" id="street" name="street" type="text"value="<?php echo $row['street']?>"> 
																			</div>
																			<div class="single-users-profile">
																				<label for="plocation">City:</label>
																				<input class="ptypes" id="city" name="city" type="text" value="<?php echo $row['city']?>">
																			</div>
																			<div class="single-users-profile">
																				<label for="finished">Finished:</label>
																				<input class="fnames form-control" id="finished" name="finished" type="text" 
																					value="<?php echo $row["finished"];?>">
																			</div>
																			
																		</div>
																		<div class="users-profiles project-name">
																			<div class="single-users-profile">
																			<!-- start date uses jquery for date picker already-->
																				<label for="pname">Start Date:</label>
																				<input id="datepicker-example1" class="pnames" id="pname" name="startDate" type="text" value="<?php echo $row['startDate']?>">
																			</div>
																			   
																			<div class="single-users-profile">
																				<label for="p-type">End Date:</label>
																				<input id="datepicker-example2" class="p-types" id="p-type" name="endDate" type="text" value="<?php echo $row['endDate']?>">
																			</div>
																			 <div class="single-users-profile">
																				<label for="plocation">Country:</label>
																				<input class="ptypes" id="pLocation" name="projectLocation" type="text" value="<?php echo $row['country']?>">
																			</div>
																			  <div class="single-users-profile">
																				<label for="plocation">Postcode:</label>
																				<input class="ptypes" id="postcode" name="postcode" type="text" value="<?php echo $row['postcode']?>">
																			</div>
																		</div>																			

																		<div class="user-profile-skrill">
																			<div class="user-skill-details">
																				<textarea class="pprojects" id="pproject" name="details" placeholder="Additional Project Information"><?php echo $row['details']?></textarea>
																			</div>
																		</div>
																		<div class="search-button">
																			<!--this is for submitting the changes -->
																			<input type="hidden" name="projID" value="<?php echo $row['projID']?>">
																			<input type="submit" name ="Submit" value ="Submit Profile Changes">																			
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