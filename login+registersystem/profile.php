<?php
session_start();
if(isset($_SESSION['user_logged_in'])){
    // check for minimum PHP version
    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
        exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
    } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
        // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
        // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
        require_once('libraries/password_compatibility_library.php');
    }
    // include the config
    require_once('config/config.php');

    // include the to-be-used language, english by default. feel free to translate your project and include something else
    require_once('translations/en.php');

    $db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $query = $db_connection->prepare('SELECT * FROM users WHERE user_id = :user_id');
    $query->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $query->execute();
    $result_row = $query->fetchObject();
//    echo "<pre>";
//    var_dump($result_row);
//    die();

    $user_name = $result_row->user_name;
    $first_name = $result_row->user_name;
    $email = $result_row->user_email;
//    $about_me = $result_row->user_name;
    $facebook = $result_row->facebook;
    $twitter = $result_row->twitter;
}
else{
    die('You must be logged in to access page');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My account page</title>

    <!-- PACE LOAD BAR PLUGIN - This creates the subtle load bar effect at the top of the page. -->
    <link href="css/plugins/pace/pace.css" rel="stylesheet">
    <script src="js/plugins/pace/pace.js"></script>

    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->

    <!-- THEME STYLES - Include these on every page. -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">

    <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
    <link href="css/demo.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <nav class="navbar-top" role="navigation">

            <!-- begin BRAND HEADING -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                    <i class="fa fa-bars"></i> Menu
                </button>
                <div class="navbar-brand"> Bee Rating
                    <a href="index.html">
                        <img src="" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
            <!-- end BRAND HEADING -->

            <div class="nav-top">

                <!-- begin LEFT SIDE WIDGETS -->
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                        <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Hide Control Panel">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <!-- You may add more widgets here using <li> -->
                </ul>
                <!-- end LEFT SIDE WIDGETS -->

                <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->
                <ul class="nav navbar-right">

                  
                   
                    <!-- begin USER ACTIONS DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="profile.html">
                                    <i class="fa fa-user"></i> My Profile
                                </a>
                            </li>
                           
                            <li>
                                <a href="#">
                                    <i class="fa fa-bell"></i> My Reviews
                                    <span class="badge orange pull-right">9</span>
                                </a>
                            </li>
                           
                            
                            <li class="divider"></li>
                            
                            <li>
                                <a class="logout_open" href="#logout">
                                    <i class="fa fa-sign-out"></i> Logout
                                    <strong><?php echo $first_name; ?></strong>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.dropdown -->
                    <!-- end USER ACTIONS DROPDOWN -->

                </ul>
                <!-- /.nav -->
                <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

            </div>
            <!-- /.nav-top -->
        </nav>
        <!-- /.navbar-top -->
        <!-- end TOP NAVIGATION -->

        <!-- begin SIDE NAVIGATION -->
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
                        <img class="img-circle" src="img/profile-pic.jpg" alt="">
                        <p class="welcome">
                            <i class="fa fa-key"></i> Logged in as
                        </p>
                        <p class="name tooltip-sidebar-logout">
                            User
                            <span class="last-name"><?php echo $user_name; ?></span> <a style="color: inherit" class="logout_open" href="#logout" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->
                    <li class="nav-search">
                        <form role="form">
                            <input type="search" class="form-control" placeholder="Search For Products...">
                            <button class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>
                    <!-- end SIDE NAV SEARCH -->
                    <!-- begin DASHBOARD LINK -->
                    <li>
                        <a href="index.html">
                            <i class="fa fa-dashboard"></i> Home 
                        </a>
                    </li>
                    <!-- end DASHBOARD LINK -->


                    <!-- begin FORMS DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms">
                            <i class="fa fa-edit"></i> Add Reviews <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="forms">
                            <li>
                                <a href="record.html">
                                    <i class="fa fa-angle-double-right"></i> Record Review Video
                                </a>
                            </li>
                           
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Add Text Review
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end FORMS DROPDOWN -->
                   <!-- begin Reviews LINK -->
                    <li>
                        <a href="#">
                            <i class="fa fa-calendar"></i> View All My Reviews
                        </a>
                    </li>
                  
                    
                   
                    
                <!-- /.side-nav -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->

        <!-- begin MAIN PAGE CONTENT -->
        <div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Your Profile

                            </h1>
                           
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="portlet portlet-default">
                            <div class="portlet-body">
                                <ul id="userTab" class="nav nav-tabs">
                                    <li class="active"><a href="#overview" data-toggle="tab">Overview</a>
                                    </li>
                                    <li><a href="#profile-settings" data-toggle="tab">Update Profile</a>
                                    </li>
                                </ul>
                                <div id="userTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="overview">

                                        <div class="row">
                                            <div class="col-lg-2 col-md-3">
                                                <a href="#">
                                                    <span class="profile-edit">Edit</span>
                                                </a>
                                                <img class="img-responsive img-profile" src="img/profile-full.jpg" alt="">
                                               
                                            </div>
                                            <div class="col-lg-7 col-md-5">
                                                <h1><?php echo $first_name; ?></h1>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam placerat nunc ut tellus tristique, non posuere neque iaculis.</p>
                                                <ul class="list-inline">



                                                </ul>
                                                
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <h3>Contact Details</h3>
                                                
                                                <p><i class="fa fa-phone fa-muted fa-fw"></i> 0000000000</p>
                                                <p><i class="fa fa-building-o fa-muted fa-fw"></i> University of Manchester
                                                    <br>Manchester, UK M14 6ND</p>
                                                <p><i class="fa fa-envelope-o fa-muted fa-fw"></i>  <a href="#">email@domain.com</a>
                                                </p>
                                                <ul class="list-inline">
                                                    <li><a class="facebook-link" href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                                                    </li>
                                                    <li><a class="twitter-link" href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                                                    </li>
                                               
                                                  
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile-settings">

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <ul id="userSettings" class="nav nav-pills nav-stacked">
                                                    <li class="active"><a href="#basicInformation" data-toggle="tab"><i class="fa fa-user fa-fw"></i> Basic Information</a>
                                                    </li>
                                                    <li><a href="#profilePicture" data-toggle="tab"><i class="fa fa-picture-o fa-fw"></i> Profile Picture</a>
                                                    </li>
                                                    <li><a href="#changePassword" data-toggle="tab"><i class="fa fa-lock fa-fw"></i> Change Password</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-9">
                                                <div id="userSettingsContent" class="tab-content">
                                                    <div class="tab-pane fade in active" id="basicInformation">
                                                        <form role="form">
                                                            <h4 class="page-header">Personal Information:</h4>
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control" value="<?php echo $first_name; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control" value="">
                                                            </div>
                                                           
                                                            

                                                            <h4 class="page-header">Contact Details:</h4>
                                                            <div class="form-group">
                                                                <label><i class="fa fa-envelope-o fa-fw"></i> Email Address</label>
                                                                <input type="email" class="form-control" value="<?php echo $email; ?>">
                                                            </div>
                                                            
                                                            <h4 class="page-header">Profile Information:</h4>
                                                            <div class="form-group">
                                                                <label><i class="fa fa-info fa-fw"></i> About</label>
                                                                <textarea class="form-control" rows="3"></textarea>
                                                            </div>
                                                           
                                                            <h4 class="page-header">Social Profiles:</h4>
                                                            <div class="form-group">
                                                                <label><i class="fa fa-facebook fa-fw"></i> Facebook Profile URL</label>
                                                                <input type="url" class="form-control" value="<?php echo $facebook; ?>">
                                                            </div>                        
                                                            <div class="form-group">
                                                                <label><i class="fa fa-twitter fa-fw"></i> Twitter Username</label>
                                                                <input type="text" class="form-control" value="<?php echo $twitter; ?>">
                                                            </div>
                                                            <button type="submit" class="btn btn-default">Update Profile</button>
                                                            <button class="btn btn-green">Cancel</button>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="profilePicture">
                                                        <h3>Current Picture:</h3>
                                                        <img class="img-responsive img-profile" src="img/profile-full.jpg" alt="">
                                                        <br>
                                                        <form role="form">
                                                            <div class="form-group">
                                                                <label>Choose a New Image</label>
                                                                <input type="file">
                                                                <p class="help-block"><i class="fa fa-warning"></i> Image must be no larger than 500x500 pixels. Supported formats: JPG, GIF, PNG</p>
                                                                <button type="submit" class="btn btn-default">Update Profile Picture</button>
                                                                <button class="btn btn-green">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade in" id="changePassword">
                                                        <h3>Change Password:</h3>
                                                        <form role="form">
                                                            <div class="form-group">
                                                                <label>Old Password</label>
                                                                <input type="password" class="form-control" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>New Password</label>
                                                                <input type="password" class="form-control" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Re-Type New Password</label>
                                                                <input type="password" class="form-control" value="">
                                                            </div>
                                                            <button type="submit" class="btn btn-default">Update Password</button>
                                                            <button class="btn btn-green">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.portlet-body -->
                        </div>
                        <!-- /.portlet -->


                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.page-content -->

        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

    </div>
    <!-- /#wrapper -->

    <!-- GLOBAL SCRIPTS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
    <script src="js/plugins/popupoverlay/defaults.js"></script>
    <!-- Logout Notification Box -->
    <div id="logout">
        <div class="logout-message">
            <img class="img-circle img-logout" src="img/profile-pic.jpg" alt="">
            <h3>
                <i class="fa fa-sign-out text-green"></i> Ready to go?
            </h3>
            <p>Select "Logout" below if you are ready<br> to end your current session.</p>
            <ul class="list-inline">
                <li>
                    <a href="login.html" class="btn btn-green">
                        <strong>Logout</strong>
                    </a>
                </li>
                <li>
                    <button class="logout_close btn btn-green">Cancel</button>
                </li>
            </ul>
        </div>
    </div>
    <!-- /#logout -->
    <!-- Logout Notification jQuery -->
    <script src="js/plugins/popupoverlay/logout.js"></script>
    <!-- HISRC Retina Images -->
    <script src="js/plugins/hisrc/hisrc.js"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->

    <!-- THEME SCRIPTS -->
    <script src="js/flex.js"></script>

</body>

</html> 
