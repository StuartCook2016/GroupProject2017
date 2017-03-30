<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create A Project</title>

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
                                <h1>Create A Project</h1>
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
                                    <a href="#manager-menu" aria-controls="manager-menu" role="tab" data-toggle="tab">Manager Menu</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                <div role="tabpanel" class="tab-pane active" id="manager-menu">
                                    <div class="employee-profile-details">
                                        <div class="single-employee-profile">
                                            <form name = "frm10" method = "post" action = "createdProject.php">
                                                <div class="user-profile-details">
                                                    <div class="users-profiles">
                                                        <div class="single-users-profile">
                                                        <!-- project name-->
                                                            <label for="pname">Project Name:</label>
                                                            <input class="ptypes" id="ptype" name="projectName" type="text">
                                                        </div>
                                                        <div class="single-users-profile">
                                                        <!-- start date uses jquery for date picker already-->
                                                            <label for="pname">Start Date:</label>
                                                            <input id="datepicker-example1" class="pnames" id="pname" name="startDate" type="text">
                                                        </div>
														   <div class="users-profiles">
                                                        <div class="single-users-profile">
                                                            <label for="p-type">End Date:</label>
                                                            <input id="datepicker-example2" class="p-types" id="p-type" name="endDate" type="text">
                                                        </div>
                                                    </div>
                                                        <!--location and skill combo box-->
                                                        <div class="single-users-profile">
                                                            <label for="plocation">Door Number:</label>
															<input class="ptypes" id="doorNumber" name="doorNumber" type="text">
														</div>
                                                        <div class="single-users-profile">
                                                            <label for="plocation">Street:</label>
															<input class="ptypes" id="street" name="street" type="text">
														</div>
														<div class="single-users-profile">
                                                            <label for="plocation">City:</label>
															<input class="ptypes" id="city" name="city" type="text">
														</div>
														<div class="single-users-profile">
                                                            <label for="plocation">Country:</label>
															<input class="ptypes" id="pLocation" name="projectLocation" type="text">
														</div>
														<div class="single-users-profile">
                                                            <label for="plocation">Postcode:</label>
															<input class="ptypes" id="postcode" name="postcode" type="text">
														</div>
														

                                                <div class="user-profile-skrill">
                                                    <div class="user-skill-details">
                                                        <textarea class="pprojects" id="pproject" name="post-project" placeholder="Additional Project Information"></textarea>
                                                    </div>
                                                    <div class="two-button">
                                                        <div class="submit-change">
                                                            
                                                            <!-- this should submit project to be reviewed by hr/posted-->
                                                                <input type="submit" name ="Submit" value ="Submit Project">
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
