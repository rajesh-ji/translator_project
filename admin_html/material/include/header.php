
<?php include('include/config.php');
$_SESSION['user_id']=1;
$user_id = $_SESSION['user_id']; 

$query = mysqli_query($conn, "select * from users where id = '$user_id'");
$rd = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin Template</title>
    
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css"> -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">


    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <b>
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                <span>
                
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                       
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>                         
                    <ul class="navbar-nav my-lg-0">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $rd['name']?></h4>
                                                <p class="text-muted"><?php echo $rd['email']?></p><a href="profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="include/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            
            <div class="scroll-sidebar">
            
                <div class="user-profile" style="background: url(../assets/images/background/user-info.jpg) no-repeat;">
            
                    <div class="profile-img"> <img src="../assets/images/users/profile.png" alt="user" /> </div>
            
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        <?php echo $rd['name']?>
                    </a>
                        <div class="dropdown-menu animated flipInY"> <a href="profile.php" class="dropdown-item"><i class="ti-user"></i> My Profile</a> <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>  
                            <a href="include/logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> </div>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                        <li> <a href="index.php" class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li> <a href="request.php" class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Request</span></a>
                        </li>
                        <li> <a href="Translator.php" class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Translator</span></a>
                        </li>
                        <li> <a  class=" waves-effect waves-dark" href="user.php" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">User</span></a>
                        </li>
                        <li> <a  class=" waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Transaction</span></a>
                         <ul aria-expanded="false" class="collapse">
                         <li><a href="Transaction.php">Amount Pay</a></li>
                         <li><a href="Transaction.php">Timing Of Transaction</a></li>
                         </ul>
                        </li>
                        <li> <a href="" class=" waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">My Service</span></a>
                        <ul aria-expanded="false" class="collapse">
                         <li><a href="language.php?type=lang_list">Language List</a></li>
                         <li><a href="language.php?type=lang_form">Language Service</a></li>
                         <li><a href="lang_conversion.php">Language Conversion</a></li>
                         
                         </ul>
                        </li>
                        <!-- <li> <a href="index3.html#" class=" waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Report</span></a> -->
                            </li>
                        <li> <a href="profile.php" class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Profile</span></a>
                            </li>
                    </ul>
                </nav>
                
            </div>
            
            
            <div class="sidebar-footer">
            <a href="profile.php" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
            <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
            <a href="include/logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            
        </aside>

    
    