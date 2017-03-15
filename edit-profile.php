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
                                <h1>Edit Profile</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="header">
                            <div class="header-logo">
                            <!-- log user out-->
                                <button type="submit">Logout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
session_start();

$username = $_SESSION["username"];


$con=mysqli_connect("localhost","jrg2","password","jrg2");
      // Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

# Run the query, store result in a string and store number of rows returned 
     $result= mysqli_query($con,"SELECT `firstName`, `lastName`, `emailAddress`, `contactNumber`,`country`,`additionalInfo` FROM employee WHERE username='$username'") or die("Error: ".mysqli_error($con));
  
     
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
                                    <a href="#employee-view" aria-controls="employee-view" role="tab" data-toggle="tab">Employee View</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="employee-view">
                                    <div class="employee-profile-details">
                                        <div class="single-employee-profile">
                                            <form name = "frm5" method = "post" action = "editedProfile_db.php">
                                                <div class="user-profile-details">
                                                    <div class="users-profiles">
                                                    <!--able to edit all of these-->
                                                        <div class="single-users-profile">
                                                            <label for="fname">First Name:</label>
                                                            <input class="fnames" id="fname" name="first-name" type="text" value="<?php echo $row['firstName']?>">
                                                        </div>
													 <div class="users-profiles">
                                                        <div class="single-users-profile">
                                                            <label for="lname">Last Name:</label>
                                                            <input class="lnames" id="lname" name="last-name" type="text" value="<?php echo $row['lastName']?>">
                                                        </div>
                                                        <div class="single-users-profile">
                                                            <label for="e-mail">Email Address:</label>
                                                            <input class="emails" id="e-mail" name="email-address" type="text" value="<?php echo $row['emailAddress']?>">
                                                        </div>
                                                        <div class="single-users-profile">
                                                            <label for="clocation">Current Location:</label>
                                                            <input class="locations" id="clocation" name="location" type="text" value="<?php echo $row['country']?>">
                                                        </div>
                                                        <div class="user-radio-button">
                                                            <label for="wrlocate">Willing to relocate</label>
                                                            <input type="radio" id="wrlocate" name="gender" value="yes" checked> Yes
                                                            <input type="radio" id="wrlocate" name="gender" value="no"> No
                                                        </div>
                                                    </div>

                                                        <div class="single-users-profile">
                                                            <label for="cnumber">Contact Number:</label>
                                                            <input class="cnumbers" id="cnumber" name="contact-number" type="text" value="<?php echo $row['contactNumber']?>">
                                                        </div>
                                                        <div class="single-users-profile">
                                                            <label for="plocation">Preferred Location:</label>
                                                            <input class="plocations" id="plocation" name="preferred-location" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                   
                                                        <textarea class="pprojects" id="pproject" name="past-project" placeholder="Past Projects"style="resize: none;"></textarea>
                                                        <textarea class="ainformaitons" id="ainformaiton" name="additional-informaiton" style="resize: none;"><?php echo $row['additionalInfo']?></textarea>
                                                    </div>
                                                    <div class="two-button">
                                                        <div class="submit-change">
                                                            <!--this is for submitting the changes -->

                                                            <input type="submit" name ="Submit" value ="Submit Changes">
                                                        
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
														
														<input type="submit" id="myCheck" onclick="addSkill();" value="Click to add Skill"></input>
														<br>
														<textarea class="uskill" name="addedskill" id="addedskill" placeholder="Skills" style="resize: none;" readonly ></textarea>
														
														<script>
														

														function addSkill(){
														var skill = document.getElementById('skill').value;
														var exp = document.getElementById('exp').value;
														var old = ",\n" + document.getElementById('addedskill').value;
											
														document.getElementById("addedskill").innerHTML = skill + "," + exp + " " + "experience" + " " + old;
														
														};
														
														</script>
								
														<br>
														</form>
                                                        <div class="return-employee">
                                                            <div class="return-button">
                                                                <a href="employee-menu.html">Return to Employee Menu</a>
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
    </div>
<?php
	  }
	}
?>	

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
