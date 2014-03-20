<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BeeRating Login</title>

    <!-- GLOBAL STYLES -->
    <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->

    <!-- THEME STYLES -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">

    <!-- THEME DEMO STYLES -->
    <link href="css/demo.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                <a class="navbar-brand" href="index.html">Bee Rating</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
      
                    
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1>Welcome To BeeRating</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong> Please Login!</strong>
                            </h4>
                        </div>
                        <div class="portlet-widgets">
                        <a href="register.html"><button class="btn btn-white btn-xs"> <i class="fa fa-plus-circle"></i> New User</button></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                    
                        <form accept-charset="UTF-8" role="form" action ="index.php" method ="post" name = "loginform">
                            <fieldset>
                                <div class="form-group">
                                 <input class="form-control" placeholder="Username" id="user_name" type="text" name = "user_name"/>
                                 </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="user_password" id = "user_password" type="password" autocomplete = "off" required />
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" id="user_rememberme" name="user_rememberme" />Remember Me
                                    </label>
                                </div>
                                <br>
                                <button class="btn btn-lg btn-green btn-block" type = "submit" name = "login" >Sign In</button>
                            </fieldset>
                            <br>
                            <p class="small">
                                <a href="#">Forgot your password?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <div class="container">

        <hr>

        <footer>
                <div class="col-lg-12 text-center">
             <ul class="list-unstyled list-inline list-social-icons">
    <li class="tooltip-social facebook-link"><a href="#facebook-profile" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a>
               </li>
               <li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a>
              </li>
              <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a>
             <li>
              </li>
             </li>
             <li><a href="about.html">About us</a>
                             <li>
                             </li>
                <li>
                <i class="fa fa-map-marker"></i>
                University of Manchester, School Of Computer Scinece, Kilburn Building. 
                <i>
                </li>
             </li>
          </div>
        </footer>

    </div>
    <!-- GLOBAL SCRIPTS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- HISRC Retina Images -->
    <script src="js/plugins/hisrc/hisrc.js"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->

    <!-- THEME SCRIPTS -->
    <script src="js/flex.js"></script>

</body>

</html>
