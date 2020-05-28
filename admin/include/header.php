<?php include('include/config.php');
if(!isset($_SESSION['login_id'])){
    header('Location: login.php');
}
 $login_id = $_SESSION['login_id'];
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
.price-filter-active {
  background: #42B549;
  color: white;
}

.price-filter-active:hover {
  background: white;
  color: green;
}
</style>

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
                    <a class="navbar-brand" href="index.php">
                        <b>
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                <span>
                
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                
                         <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a> -->
                </div>
                
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                       
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>                         
                    <ul class="navbar-nav my-lg-0">
                        
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="users/<?php echo $rd['image']?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="users/<?php echo $rd['image']?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php  echo $rd['name']?></h4>
                                                <p class="text-muted"><?php  echo $rd['email']?></p><?php if($_SESSION['role_id']=='3'){ ?><a href="profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile </a> <?php }?></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <!-- <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li> -->
                                    <!-- <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li> -->
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
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
            
            <div class="profile-img"> <img src="users/<?php echo $rd['image']?>" alt="user"  /> </div>
    
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                <?php echo $rd['name']?>
            </a>
                <div class="dropdown-menu animated flipInY">
                    <!-- <a href="profile.php" class="dropdown-item"><i class="ti-user"></i> My Profile</a> 
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>   -->
                    <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                        <li> <a href="index.php" class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li> <a  class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Request</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="request.php">All Request</a></li>
                            <li><a href="carryfwd_request.php">Carry Forward request</a></li>
                            </ul>
                        </li>
                        <?php if($_SESSION['login_id']=='1'){?>
                        <li> <a href="translator.php" class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Translator</span></a>
                        </li>
                        <?php }?>
                        <?php if($_SESSION['login_id']=='1'){?>
                        <li> <a  class=" waves-effect waves-dark" href="user.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User</span></a>
                        </li>
                        <?php }?>
                      
                            <li> <a  class=" waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Transaction</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="Transaction.php">Amount Pay</a></li>
                            <li><a href="Transaction.php">Timing Of Transaction</a></li>
                            </ul>
                            </li>
                     
      
                        <!-- my service  -->
                        <li> <a  class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">My Service</span></a>
                                <ul aria-expanded="false" class="collapse">
                                <?php if($login_id==1){?>
                                 <li><a href="my_service.php">Language List</a></li>
                                 <!-- <li><a href="lang_list.php">Language Service</a></li>
                                 <li><a href="requestpanel.php">Translator Request</a></li> -->
                                 <?php } ?>
                                 <li><a href="lang_conversion.php">Conversion List</a></li>
                                 <?php if($login_id==1){?>
                                 <!-- <li><a href="my_service.php">Language List</a></li> -->
                                 <li><a href="lang_list.php">Language Service</a></li>
                                 <li><a href="requestpanel.php">Translator Request</a></li>
                                 <?php } ?>
                                 <?php if($login_id=='3'){?>
                                 <li><a href="userrequest.php">User Request</a></li>
                               <?php }?>
                                 
                                 </ul>
                        </li>
                        <!-- my service -->
                        
                        <!-- <li> <a href="index3.html#" class=" waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Report</span></a> -->
                        </li>
                        <!-- for admin -->
                        <?php if($login_id==3){ ?>
                        <li> 
                        <a href="profile.php" class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-face-profile"></i><span class="hide-menu">Profile</span></a>
                            </li> <?php }?>
                            <!-- for admin -->
                            <?php if($login_id==1 && $user_id==3){ ?>
                            <!-- admin can add subadmin -->
                            <!-- <li> <a href="subadmin.php" class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Add Subadmin</span></a>
                            </li> -->
                            <li> <a  class=" waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Sub Admin</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="subadmin.php">Add Subadmin</a></li>
                                 <li><a href="subadmiNListing.php">Subadmin</a></li>
                            </ul>
                            <?php }?>
                            <!-- subadmin tab close -->
                    </ul>
                </nav>
                
            </div>
            
            
            <!-- <div class="sidebar-footer">
            <a href="profile.php" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
            <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
            <a href="include/logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div> -->
            
        </aside>

    
    
    