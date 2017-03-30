<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit A Job</title>

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
                                <h1>Edit a Job</h1>
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
<?php


$jobID=$_POST['jobID'];

$con=mysqli_connect("localhost","jrg2","password","jrg2");
      // Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

# Run the query, store result in a string and store number of rows returned 
     $result= mysqli_query($con,"SELECT `title`,`username`,`contractType`, `startDate`, `endDate`,`salary`,`details` FROM job WHERE jobID='$jobID'") or die("Error: ".mysqli_error($con));
  
     
		    // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
      if($rowcount !=0)
	{
	  while ($row = mysqli_fetch_assoc($result))
		 
	  if (mysqli_num_rows($result) != 0) {
			
	  
?>
    <div class="employee-menu-area">
        <div class="container">
            <div class="row">
                <div class="main-employee-menu clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="employee-menu">
                              <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                             
                                <li role="presentation" class="active">
                                    <a href="#manager-menu" aria-controls="manager-menu" role="tab" data-toggle="tab">Manager Menu</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                <div role="tabpanel" class="tab-pane active" id="manager-menu">
                                    <div class="employee-profile-details">
                                        <div class="single-employee-profile">
                                            <form name = "frm16" method = "post" action = "editedJob.php">
                                                <div class="user-profile-details">
                                                    <div class="users-profiles">
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
															<?php
															
															$contractQuery = "SELECT contractType FROM job";
															
															$resultQuery = $conn->query($contractQuery);
															
															if($resultQuery->num_rows > 0) {
																
																echo "<select id='contractType' name='contractType'>";
																
																while($rowQuery = $resultQuery->fetch_assoc()) {
																	
																	if(strcasecmp($row['contractType'], $resultQuery['contractType']) == 0) {
																		echo "<option selected='selected'>" . $row['contractType'] . "</option>";
																	} else {
																		echo "<option>" . $row['contractType'] . "</option>";
																	}															
																	
																}
																
																echo "</select>";
																
															}
															?>
														</div>
                                                        <div class="single-users-profile">
                                                        <!-- start date uses jquery for date picker already-->
                                                            <label for="pname">Start Date:</label>
                                                            <input id="datepicker-example1" class="pnames" id="pname" name="startDate" type="text" value = "<?php echo $row['startDate']?>">
                                                        </div>
														   <div class="users-profiles">
                                                        <div class="single-users-profile">
                                                            <label for="p-type">End Date:</label>
                                                            <input id="datepicker-example2" class="p-types" id="p-type" name="endDate" type="text" value = "<?php echo $row['endDate']?>">
                                                        </div>
                                                    </div>

                                                          <div class="single-users-profile">
                                                            <label for="plocation">Salary:</label>
															<input class="ptypes" id="street" name="salary" type="text"value = "<?php echo $row['salary']?>">
														</div>
													
														<input type = "hidden" name = "jobID" value ="<?php echo $jobID?>">

                                                <div class="user-profile-skrill">
                                                    <div class="user-skill-details">
                                                        <textarea class="pprojects" id="pproject" name="details" value = "<?php echo $row['details']?>" ></textarea>
                                                    </div>
                                                    <div class="two-button">
                                                        <div class="submit-change">
                                                            
                                                            <!-- this should submit project to be reviewed by hr/posted-->
                                                                <input type="submit" name ="Submit" value ="Submit Job">
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
                                                        <div class="return-employee">
                                                            <div class="return-button">
                                                                <a href="manager-menu.html">Main Menu</a>
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

        


        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="js/core.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>