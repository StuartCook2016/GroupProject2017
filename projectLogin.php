<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login Page</title>

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
                    <div class="col-md-6 col-sm-6">
                        <div class="header">
                            <div class="header-logo">
                                <img src="img/logo.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="header">
                            <div class="header-logo">
                                <h1>Login</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="main-login clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="login-details">
                            <form name="frm6" method="post" action="storedPass_db.php">
                            <!--user enters username and password-->
                                <div class="user-name">
                                    <label for="username">Enter Username:</label>
                                    <input class="name form-control" name="username" type = "text" maxlength = "20">
                                </div>
                                <div class="user-password">
                                    <label for="pass">Enter Password:</label>
									
									<!---->
                                     <input class="password form-control" name="passwd" type = "password" maxlength = "25">
                                </div>
                                <!-- should take to recover.html-->
                                <a href="recover.html">Forgotten Password</a>
                                <div class="login-button">
                                <!-- this button logs user into right account-->
                                    

                                    <input type="submit" name = "Submit" value = "Login">
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        


        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
